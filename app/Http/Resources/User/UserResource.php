<?php

namespace App\Http\Resources\User;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\User */
class UserResource extends JsonResource
{

    public static $wrap = null;
    /**
     * @param Request $request
     * @return array
     */
    public function toArray($request)
    {
        if (is_null($this->resource)) {
            return [];
        }

        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'email_verified_at' => $this->email_verified_at,
            'remember_token' => $this->remember_token,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'notifications_count' => $this->notifications_count,
            'tokens_count' => $this->tokens_count,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'full_name' => $this->full_name,
            'profile_photo_url' => $this->profile_photo_url
        ];
    }
}
