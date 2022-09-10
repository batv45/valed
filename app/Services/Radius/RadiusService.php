<?php

namespace App\Services\Radius;

use App\Models\HotspotAccount;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class RadiusService
{
    private string $db_connection;

    public function __construct(string $db_connection)
    {
        $this->db_connection = $db_connection;
    }

    public function saveHotspotAccount(HotspotAccount $account)
    {
        $this->getDB()->table('radcheck')->where('username',$account->username)->delete(); // delete old data
        $this->getDB()->table('radcheck')->insert([
            'username' => $account->username,
            'attribute' => 'SHA2-Password',
            'op' => ':=',
            'value' => hash('sha256',$account->password)
        ]);

    }

    // PRIVATE FUNCS
    private function table(string $table)
    {
        return $this->getDB()->table($table);
    }

    private function getDB(): \Illuminate\Database\Connection
    {
        return \DB::connection($this->db_connection);
    }

}
