<?php

namespace App\Models\Syslog;

use Illuminate\Database\Eloquent\Model;

class SystemEvent extends Model
{

    protected $connection = 'syslog';
    protected $table = 'SystemEvents';
    protected $primaryKey = 'ID';
    public $timestamps = false;

    protected $fillable = [
        'FromHost',
        'Message',
        'ReceivedAt',
        'DeviceReportedTime'
    ];
}
