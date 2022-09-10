<?php

namespace Database\Seeders;

use App\Models\Hotspot;
use Illuminate\Database\Seeder;

class HotspotSeeder extends Seeder
{
    public function run()
    {
        Hotspot::insert([
            [
                'name' => 'BERGAMA WIFI'
            ],
            [
                'name' => 'SOMA WIFI'
            ],
            [
                'name' => 'DİKİLİ WIFI'
            ]
        ]);
    }
}
