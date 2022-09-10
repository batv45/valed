<?php

namespace App\Http\Controllers\Hotspot\Checker;

use App\Http\Controllers\Controller;
use App\Http\Requests\Hotspot\HotspotLoginIdentityRequest;
use App\Models\Hotspot;
use App\Models\HotspotAccount;
use App\Services\Radius\RadiusService;
use Illuminate\Http\Request;

class HotspotIdentityController extends Controller
{
    public function check(HotspotLoginIdentityRequest $request, $hotspot_id)
    {
        $hotspot = Hotspot::findOrFail($hotspot_id);

        $hotspotAccount = HotspotAccount::firstOrCreate([
            'identity_number' => $request->input('identity_number')
        ],[
            'name' => $request->input('first_name'),
            'surname' => $request->input('last_name'),
            'birth_year' => $request->input('birth_year'),
            'password' => \Str::random(8)
        ]);

        // Update account in radius table
        if($hotspotAccount){
            app(RadiusService::class)->saveHotspotAccount($hotspotAccount);
        }

        $hotspotAccount->update([
            'identity_verified_at' => now()
        ]);

        $phone = $request->getPhone();
        if($phone){
            return redirect()->route('hotspot-login.index', [
                'hotspot' => $hotspot->id,
                'phone' => $phone,
                'account_id' => $hotspotAccount->id,
                'link-login-only' => request()->input('link-login-only'),
                'link-orig' => request()->input('link-orig')
            ]);
        }

        return view('hotspot.login.redirect',[
            'hotspot' => $hotspot,
            'username' => $hotspotAccount->username,
            'password' => $hotspotAccount->password
        ]);
    }
}
