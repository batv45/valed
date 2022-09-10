<?php

namespace App\Http\Requests\Hotspot;

use Illuminate\Foundation\Http\FormRequest;

class HotspotLoginSmsRequest extends FormRequest
{
    public function rules(): array
    {

        return [
            'code' => 'required|numeric|digits:6',
            'phone' => 'required|string',
            'account_id' => 'nullable|int'
        ];
    }
    public function getPhone(): string
    {
        return preg_replace('/\s+/', '', $this->validated('phone'));
    }
}
