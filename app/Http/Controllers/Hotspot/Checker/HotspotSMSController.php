<?php

namespace App\Http\Controllers\Hotspot\Checker;

use App\Http\Controllers\Controller;
use App\Http\Requests\Hotspot\HotspotLoginSmsRequest;
use App\Http\Requests\Hotspot\HotspotSendSmsRequest;
use App\Models\Hotspot;
use App\Models\HotspotAccount;
use App\Services\Radius\RadiusService;
use Fowitech\Sms\Facades\Sms;
use Hash;

class HotspotSMSController extends Controller
{
    public function send(HotspotSendSmsRequest $request,$hotspot_id)
    {
//        $randomString = \Str::random(30);
        $randomNumber = random_int(101243, 987123);

        $hotspotAccount = HotspotAccount::firstOrCreate([
            'phone' => $request->getPhone()
        ],[
            'password' => \Str::random(8)
        ]);

        $hotspotAccount->update([
            'phone_verified_token' => Hash::make($randomNumber)
        ]);



        return response()->json([
            'sent' => true,
            'code' => $randomNumber, // TEST MODE
            'phone' => $request->getPhone()
        ]);
    }

    public function check(HotspotLoginSmsRequest $request,$hotspot_id)
    {
        $hotspot = Hotspot::findOrFail($hotspot_id);

        $hotspotAccount = HotspotAccount::where('phone', $request->getPhone())->firstOrFail();

        //
        if( !Hash::check($request->validated('code'),$hotspotAccount->phone_verified_token) ){
            return response()->json([
                'verified' => false,
                'phone' => $request->getPhone()
            ]);
        }

        if( $request->validated('account_id') > 0 ){
            $hotspotAccount = HotspotAccount::findOrFail($request->validated('account_id'));

            if( $hotspotAccount->phone != $request->getPhone() ){
                HotspotAccount::where('phone', $request->getPhone())->delete();
                $hotspotAccount->update([
                    'phone' => $request->getPhone(),
                    'phone_verified_at' => now()
                ]);
            }
        }else{
            $hotspotAccount->update([
                'phone_verified_at' => now()
            ]);
        }

        // Update account in radius table
        if($hotspotAccount){
            app(RadiusService::class)->saveHotspotAccount($hotspotAccount);
        }


        return response()->json([
            'verified' => true,
            'username' => $hotspotAccount->username,
            'password' => $hotspotAccount->password,
            'phone' => $request->getPhone()
        ]);

    }
}
