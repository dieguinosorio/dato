<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Concurrencies extends Model
{
    //
    protected $primaryKey ="iso";
    
    public $incrementing =false;
     
    protected $table="currencies";
}
