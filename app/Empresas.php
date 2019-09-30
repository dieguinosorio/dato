<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresas extends Model
{
    //
    protected $table="users_forms";
    
    //Relacion one to many 
    public function usuario(){
        return $this->hasOne('App\User','id_company','Identificacion');
    }
}
