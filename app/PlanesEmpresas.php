<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlanesEmpresas extends Model
{
    //
    public $timestamps = false;

    protected $table="planes_empresas";
    
    public function plan(){
        return $this->hasOne('App\Planes','id','id');
    }
}
