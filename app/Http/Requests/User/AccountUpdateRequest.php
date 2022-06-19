<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class AccountUpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'first_name' => 'required|string|max:60',
            'last_name' => 'required|string|max:60',
            'email' => 'required|string|email|max:255|unique:users,email,'.$this->user()->id,
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Ad Soyad',
            'email' => 'E-Posta'
        ];
    }
}
