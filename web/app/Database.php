<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Database extends Model
{
    protected $fillable = [
        'uuid', 'db_name', 'db_password', 'db_username', 'last_sync_date', 'status'
    ];

}
