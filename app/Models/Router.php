<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Router extends Model
{
    protected $fillable = [
        'name', 'ip_address', 'api_port', 'api_username', 'api_password','log_prefix','identity'
    ];

    public function hotspot(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Hotspot::class);
    }

    public function updateIdentity()
    {
        try {
            $identity = collect(array_values($this->getRouterOS()->query('/system/identity/print')->read())[0]);

            $this->identity = $identity->get('name');
            $this->log_prefix = $identity->get('name');
            $this->save();
        }catch (\Exception $e){
        }
    }

    public function getClientStatusAttribute() : bool
    {
        try {
            $this->getRouterOS(1);

            return true;
        }catch (\Exception $e){
            return false;
        }
    }
    public function getRouterOS(int $timeout = 2)
    {
        return \RouterOS::client([
            'host' => $this->ip_address,
            'user' => $this->api_username,
            'pass' => $this->api_password,
            'port' => $this->api_port,
            'timeout' => $timeout,
        ]);
    }
}
