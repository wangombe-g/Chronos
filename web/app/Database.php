<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Database extends Model
{
    protected $fillable = [
        'uuid', 'db_name', 'db_password', 'db_username', 'client_uuid', 'last_sync_date'
    ];

    public function client()
    {
    	return $this->belongsTo('App\Client', 'uuid', 'client_uuid');
	}
}
