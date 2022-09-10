<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HotspotAccount extends Model
{
    protected $fillable = [
        'name',
        'surname',
        'birth_year',
        'identity_number',
        'phone',
        'phone_verified_token',
        'phone_verified_at',
        'identity_verified_at',
        'password'
    ];

    public function getUsernameAttribute()
    {
        return $this->id . '@hotspot.net';
    }
}
