<?php

namespace App\Http\Controllers\Hotspot\Template;

use App\Http\Controllers\Controller;
use App\Models\Hotspot;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class HotspotTemplateController extends Controller
{
    public function downloadLoginHtml($hotspot_id)
    {
        $hotspot = Hotspot::findOrFail($hotspot_id);
        $contents = Storage::get('hotspot-template/login.html');

        if (is_null($contents)){
            Log::alert('Varsayılan login.html dosyası bulunamadı!');
            abort(404, 'Varsayılan login.html dosyası bulunamadı!');
        }

        $html = str_replace(['{{$title}}','{{$action}}'],[$hotspot->name. ' - Giriş',route('hotspot-login.index',$hotspot->id)],$contents);

        return \Response::make($html,200,[
            'Content-Type' => 'text/html',
            'Content-Disposition' => 'attachment; filename="login.html"'
        ]);

    }
}
