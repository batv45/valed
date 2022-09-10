<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hotspot extends Model
{

    protected $fillable = [
        'name',
        'description',
        'router_id',
        'mikrotik_ip_address',
    ];

    public function router(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Router::class);
    }


    public function syslogTable(): \Illuminate\Database\Query\Builder
    {
        return \DB::connection('syslog')->table('SystemEvents')->where('FromHost','192.168.1.111');
    }
}
