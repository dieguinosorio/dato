<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Empresas;
use App\User;

class EmpresasController extends Controller
{
    //
    public function index($id){
        $empresa = User::where('id',$id)->first();
        return view('registro.register',["empresa"=>$empresa]);
    }
    
    public function register(Request $request,$id){
        $validate = $this->validate($request, [
            'opciud' => 'required|in:A citizen of the United States,A noncitizen national of the United States,A lawful permanent resident,An alien authorized to work',
            
        ]);
        
        echo $request->input('opciud');
        echo $request->input('OpElgSi');
        die();
    }
}
