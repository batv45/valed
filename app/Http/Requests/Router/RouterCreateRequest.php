<?php

namespace App\Http\Requests\Router;

use Illuminate\Foundation\Http\FormRequest;

class RouterCreateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'ip_address' => 'required|ipv4|unique:routers',
            'api_port' => 'required|int',
            'api_username' => 'required|string',
            'api_password' => 'required|string'
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
