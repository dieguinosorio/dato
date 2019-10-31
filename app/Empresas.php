<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
class Empresas extends Model
{
    //
    public $timestamps = false;
    
    protected $primaryKey ="Id";

    protected $table="users_forms";
    
}
