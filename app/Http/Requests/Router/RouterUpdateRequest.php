<?php

namespace App\Http\Requests\Router;

use Illuminate\Foundation\Http\FormRequest;

class RouterUpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'ip_address' => 'required|ipv4|unique:routers,ip_address,'.$this->route('router'),
            'api_port' => 'required|int',
            'api_username' => 'required|string',
            'api_password' => 'required|string',
            'log_prefix' => 'required|string',
            'identity' => 'required|string'
        ];
    }
}
