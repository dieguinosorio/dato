<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Response;
use App\User;

class HomeController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {

        $empresas = User::all();
        return view('home', array('empresas' => $empresas));
    }

    public function getImage($filename) {
        $file = Storage::disk('public')->get($filename);
        return new Response($file);
    }

    public function getImageSig(Request $request) {
        $a = $request->input('img_data');
        $id = $request->input('social');
        $data_uri = $a;
        $encoded_image = explode(",", $data_uri)[1];
        $decoded_image = base64_decode($encoded_image);
        if ($decoded_image) {
            //Le pongo un nombre unico
            $file_name = $id . "_" . time();
            //Guardo la imagen
            Storage::disk('firmas')->put($file_name . '.png', $decoded_image); //Con este guardamos la imagen en el disco virtual
        }
        return response()->json([
                    'like', "Entro" . $file_name,
                    'message', 'El like ha sido creado'
        ]);
    }

    public function prueba(Request $request) {
//        $a = $request->input('img_data');
//        $data_uri = $a;
//        $encoded_image = explode(",", $data_uri)[1];
//        $decoded_image = base64_decode($encoded_image);
//        //file_put_contents($file_name,$imagedata);
//        if ($decoded_image) {
//            //Le pongo un nombre unico
//            $file_name = time() . $file_name;
//            //Guardo la imagen
//            Storage::disk('firmas')->put('prueba.png', $decoded_image); //Con este guardamos la imagen en el disco virtual
//        }
        $Social = $request->input('social');
        if ($Social != '') {
            $Dato = "Social";
            $Mensaje = "El campo se diligencio correctamente";
            $Status = "200";
        } else {
            $Dato = "Social";
            $Mensaje = "El campo social no se diligencio correctamente";
            $Status = "400";
        }

        return response()->json([
                    'Campo' => $Dato,
                    'status' => $Status,
                    'message' => $Mensaje
        ]);
    }

    public function ValidarFormulario(Request $request) {
        //$Social = $request->input('social');
//        if ($Social == ''){
//            $Dato = "Social";
//            $Mensaje = "El campo social no se diligencio correctamente";
//            $Status = "400";
//        }
                $OpCity = $request->input('OpCity');
                $Firtsname= $request->input('Firtsname');
                $midname= $request->input('midname');
                $lastname= $request->input('lastname');
                $tel = $request->input('tel');
                $gender = $request->input('gender');
                $fhbirth = $request->input('fhbirth');
                $dir = $request->input('dir');
                $dir2 = $request->input('dir2');
                $city = $request->input('city');
                $state = $request->input('state');
                $zipcode = $request->input('zipcode');
                $marital = $request->input('marital');
                $email = $request->input('email');
                $tpdoc= $request->input('tpdoc');
                $socialnum = $request->input('socialnum');
                $numdep = $request->input('numdep');
                $contactemer = $request->input('contactemer');
                $surnamecon = $request->input('surnamecon');
                $telcon = $request->input('telcon');
                $area = $request->input('area');
                $namesur= $request->input('namesur');
                $job1 = $request->input('job1');
                $job2 = $request->input('job2');
                $job3 = $request->input('job3');
                $job4 = $request->input('job4');
                $job5 = $request->input('job5');
                $job6 = $request->input('job6');
                $job7 = $request->input('job7');
                $job8 = $request->input('job8');
                $job9 = $request->input('job9');
                $job10 = $request->input('job10');
                
                $mil = $request->input('mil');
                $dem = $request->input('dem');
                $demc = $request->input('demc');
//                clause:clause,
//                term:term,
//                image_path :image_path,
//                image_path2 :image_path2,
                $acept = $request->input('acept');

        return response()->json([
                    'Campo' => '',
                    'status' => 200,
                    'message' => $OpCity."-".$Firtsname."-".$midname."-".$lastname."-".$tel."-".$gender."-".$fhbirth."-".$dir."-".$dir2.
                     $city ."-".
                    $state ."-".
                    $zipcode ."-".
                    $marital ."-".
                    $email  ."-".
                    $tpdoc."-".
                    $socialnum ."-".
                    $numdep ."-".
                    $contactemer ."-".
                    $surnamecon ."-".
                    $telcon ."-".
                    $area ."-".
                    $namesur."-<li>".$job1."</li>-".$job2."-".$job3."-".$job4."-".$job5."-".$job6."-".$job7."-".$job8."-".$job9."-".$job10
            ]);
    }
}
