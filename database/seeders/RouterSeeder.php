<?php

namespace Database\Seeders;

use App\Models\Router;
use Illuminate\Database\Seeder;

class RouterSeeder extends Seeder
{
    public function run()
    {
        Router::create([
            'name' => 'test router',
            'identity' => 'test',
            'ip_address' => '192.168.1.99',
            'api_port' => '11',
            'api_username' => 'demo',
            'api_password' => '123'
        ]);
    }
}
