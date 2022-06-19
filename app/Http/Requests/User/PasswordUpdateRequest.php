<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules;

class PasswordUpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'password' => ['required', 'confirmed', Rules\Password::defaults()]
        ];
    }

    public function attributes()
    {
        return [
          'password' => 'Şifre'
        ];
    }
}
