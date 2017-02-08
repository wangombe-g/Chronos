<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cellar1Wine extends Model
{
    protected $connection = 'cellar1';
    protected $table ="wine";
}
