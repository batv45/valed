<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    public function index()
    {

        return inertia('Account/Profile');
    }
}
