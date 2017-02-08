<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CellarWine extends Model
{
    protected $connection = 'cellar';
    protected $table ="wine";
}
