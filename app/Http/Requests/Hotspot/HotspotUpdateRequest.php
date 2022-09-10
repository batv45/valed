<?php

namespace App\Http\Requests\Hotspot;

use Illuminate\Foundation\Http\FormRequest;

class HotspotUpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'description' => 'nullable|string',
            'router_id' => 'required|int|exists:routers,id'
        ];
    }
}
