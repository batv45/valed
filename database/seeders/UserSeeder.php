<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'first_name' => 'Batuhan',
            'last_name' => 'OK',
            'email' => 'asd@asd.com',
            'password' => bcrypt('123123')
        ])->markEmailAsVerified();
    }
}
