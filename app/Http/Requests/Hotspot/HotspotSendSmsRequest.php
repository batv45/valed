<?php

namespace App\Http\Requests\Hotspot;

use Illuminate\Foundation\Http\FormRequest;

class HotspotSendSmsRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'phone' => 'required|string',
            'account_id' => 'nullable|int'
        ];
    }

    public function getPhone(): string
    {
        return preg_replace('/\s+/', '', $this->validated('phone'));
    }
}
