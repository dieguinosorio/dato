<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Response;
use App\Empresas;
use App\User;
use App\OpResident;
use App\States;
use App\Areas;

class EmpresasController extends Controller {

    //
    public function index($id) {
        $empresa = User::where('id', $id)->first();
        $OpResident = OpResident::all();
        $States = States::all();
        $Areas = Areas::all();
        return view('registro.register', array("empresa" => $empresa,'OpResident'=>$OpResident,'states'=>$States,'areas'=>$Areas));
    }

    public function register(Request $request, $id) {
        $UserNew = new Empresas();
        $UserNew->id_company = $id;
        $UserNew->truework = $request->input("OpElgSi");
        $UserNew->op_resident = $request->input("opciud") ;
        $UserNew->firs_name= $request->input("firstname");
        $UserNew->mid_name= $request->input("midname");
        $UserNew->last_name= $request->input("lastname");
        $UserNew->tel= $request->input("tel");
        $UserNew->sex= $request->input("gender");
        $UserNew->fh_birth= $request->input("fhbirth");
        $UserNew->dir_home= $request->input("dir");
        $UserNew->dir_home2= $request->input("dir2");
        $UserNew->city= $request->input("city");
        $UserNew->state= $request->input("state");
        $UserNew->zip_code= $request->input("zipcode");
        $UserNew->marital_status= $request->input("marital");
        $UserNew->email= $request->input("email");
        $UserNew->opid= $request->input("tpdoc");
        $UserNew->num_dep= $request->input("numdep");
        $UserNew->contact_emerg= $request->input("contactemer");
        $UserNew->contact_lastname = $request->input("surnamecon");//Crear este campo en la bd
        $UserNew->phone_emerg= $request->input("telcon");
        $UserNew->area= $request->input("area");
        $UserNew->name_superv= $request->input("namesur");
        $UserNew->acustical= $request->input("job1");
        $UserNew->layout= $request->input("job2");
        $UserNew->drywall_metal= $request->input("job3");
        $UserNew->drywall_hanger= $request->input("job4");
        $UserNew->drywall_finisher= $request->input("job5");
        $UserNew->general_lab= $request->input("job6");
        $UserNew->plastert= $request->input("job7");
        $UserNew->concrete_form= $request->input("job8");
        $UserNew->concrete_finish= $request->input("job9");
        $UserNew->safety_job= $request->input("job10");
        $UserNew->work_in_militarbase= $request->input("mil");
        $UserNew->involucred_demand= $request->input("dem");
        $UserNew->workers_compensation= $request->input("demc");
        $UserNew->qualified_work_positions= $request->input("dispmov");
        $UserNew->clause= $request->input("clause");
        $UserNew->conditions= $request->input("term");
        $UserNew->firma= $request->input("signature");
        $image_path = $request->file('image_path');
        if ($image_path) {
            //Le pongo un nombre unico
            $imagen_nom = time() . $image_path->getClientOriginalName();
            //Guardo la imagen
            Storage::disk('images')->put($imagen_nom, File::get($image_path)); //Con este guardamos la imagen en el disco virtual
            $UserNew->doc_id1 = $imagen_nom;
        }
        $image_path2 = $request->file('image_path2');
        if ($image_path2) {
            //Le pongo un nombre unico
            $imagen_nom2 = time() . $image_path2->getClientOriginalName();
            //Guardo la imagen
            Storage::disk('images')->put($imagen_nom2, File::get($image_path2)); //Con este guardamos la imagen en el disco virtual
            $UserNew->doc_id2 = $imagen_nom2;
        }
        
        $UserNew->social_security= $request->input("socialnum");
        $UserNew->Acepto= $request->input("acept");
        $UserNew->fh_register=  date("Y-m-d H:i:s");
        $UserNew->save();
        var_dump($UserNew);
        die();
    }
}
