<?php

namespace App\Http\Controllers\Hotspot\Template;

use App\Http\Controllers\Controller;
use App\Models\Hotspot;
use Illuminate\Support\Facades\Storage;

class HotspotTemplateController extends Controller
{
    public function downloadLoginHtml($hotspot_id)
    {
        $hotspot = Hotspot::findOrFail($hotspot_id);

        $html = str_replace(['{{$title}}','{{$action}}'],[$hotspot->name. ' - Giriş',route('hotspot-login.index',$hotspot->id)],Storage::get('hotspot-template/login.html'));

        return \Response::make($html,200,[
            'Content-Type' => 'text/html',
            'Content-Disposition' => 'attachment; filename="login.html"'
        ]);

    }
}
