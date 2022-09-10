<?php

namespace App\Http\Controllers\Account;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Contracts\Validation\Validator as ValidatorContract;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class ProfilePhotoController extends Controller
{

    /**
     * Update the user's profile photo.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function updateProfilePhoto(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'photo' => ['required', 'image', 'max:1024'],
        ])->setAttributeNames([
            'photo' => 'Fotoğraf dosya',

        ])->validateWithBag('updateProfilePhoto');

        Auth::user()->updateProfilePhoto($request->photo);

        flash('Profil fotoğrafınız güncellendi.')->success();
        return back();
    }
}
