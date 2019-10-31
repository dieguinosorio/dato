<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Response;
use App\User;
use App\Empresas;

class HomeController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {

        if(isset(\Auth::user()->id)){
           $empresas = User::find(\Auth::user()->id);
        }
        else{
           $empresas = User::all(); 
        }
        return view('home', array('empresas' => $empresas));
    }

    public function getImage($filename) {
        $file = Storage::disk('firmas')->get($filename);
        return new Response($file);
    }
    
    public function getImageSocial($filename) {
        $file = Storage::disk('images')->get($filename);
        return new Response($file);
    }
    
    public function getImagePublic($filename) {
        $file = Storage::disk('public')->get($filename);
        return new Response($file);
    }

    public function getImageSig(Request $request) {
        $a = $request->input('img_data');
        $id = $request->input('social');
        $data_uri = $a;
        $encoded_image = explode(",", $data_uri)[1];
        $decoded_image = base64_decode($encoded_image);
        $Guardo = false;
        if ($decoded_image) {
            //Le pongo un nombre unico
            $file_name = $id;
            //Guardo la imagen
            Storage::disk('firmas')->put($file_name . '.png', $decoded_image); //Con este guardamos la imagen en el disco virtual
            $Guardo = true;
        }
        
        $status = $Guardo == true? 200: 400;
        $message = $status == 200 ? $file_name.'.png':'La firma no ha sido guardada';
        return response()->json([
                    'status'=> $status,
                    'message'=> $message
        ]);
    }

    public function prueba() {
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
//        $Social = $request->input('social');
//        if ($Social != '') {
//            $Dato = "Social";
//            $Mensaje = "El campo se diligencio correctamente";
//            $Status = "200";
//        } else {
//            $Dato = "Social";
//            $Mensaje = "El campo social no se diligencio correctamente";
//            $Status = "400";
//        }
//
//        return response()->json([
//                    'Campo' => $Dato,
//                    'status' => $Status,
//                    'message' => $Mensaje
//        ]);
        $ValidApp = Empresas::where("social_security", 1152197700)->first();
        var_dump($ValidApp);
        die();
    }

    public function ValidarFormulario(Request $request) {
        //$Social = $request->input('social');
//        if ($Social == ''){
//            $Dato = "Social";
//            $Mensaje = "El campo social no se diligencio correctamente";
//            $Status = "400";
//        }
        $OpCity = $request->input('OpCity');
        $Firtsname = $request->input('Firtsname');
        $midname = $request->input('midname');
        $lastname = $request->input('lastname');
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
        $tpdoc = $request->input('tpdoc');
        $socialnum = $request->input('socialnum');
        $numdep = $request->input('numdep');
        $contactemer = $request->input('contactemer');
        $surnamecon = $request->input('surnamecon');
        $telcon = $request->input('telcon');
        $area = $request->input('area');
        $namesur = $request->input('namesur');
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
        $StrMensaje ='';
        if($OpCity==1){
            $StrMensaje.="<li>Selected your option citizen<li/>";
        }
        if($Firtsname =='') {
            $StrMensaje.="<li>Insert your firstname<li/>";
        }
        if($midname =='') {
            $StrMensaje.="<li>Insert your midname<li/>";
        }
        if($lastname =='') {
            $StrMensaje.="<li>Insert your lastname<li/>";
        }
        if($tel =='') {
            $StrMensaje.="<li>Insert your telephone<li/>";
        }
        if($gender =='(sel)') {
            $StrMensaje.="<li>Insert your gender <li/>";
        }
        if($fhbirth =='') {
            $StrMensaje.="<li>Insert your Date birth<li/>";
        }
        if($dir=='') {
            $StrMensaje.="<li>Selected your direction<li/>";
        }
        if($dir2=='') {
            $StrMensaje.="<li>Insert your direction 2<li/>";
        }
        if($city=='') {
           $StrMensaje.="<li>Insert your city<li/>"; 
        }
        if($state==1) {
            $StrMensaje.="<li>Insert your state<li/>";
        }
        if($zipcode=='') {
            $StrMensaje.="<li>Insert your zipcode<li/>";
        }
        if($marital=='(sel)') {
            $StrMensaje.="<li>Selected your marital status<li/>";
        }
        if($email=='') {
            $StrMensaje.="<li>Insert your email<li/>";
        }
        if($tpdoc=='(sel)') {
            $StrMensaje.="<li>select your option document identity<li/>";
        }
        if($socialnum=='') {
            $StrMensaje.="<li>Insert your social id<li/>";
        }
        if($numdep=='') {
            $StrMensaje.="<li>Insert your number dependients<li/>";
        }
        if($contactemer=='') {
            $StrMensaje.="<li>Insert name contact emergency<li/>";
        }
        if($surnamecon =='') {
            $StrMensaje.="<li>Insert surname contact emergency<li/>";
        }
        if($telcon=='') {
            $StrMensaje.="<li>Insert telephone contact emergency<li/>";
        }
        if($area==1) {
            $StrMensaje.="<li>Insert your area<li/>";
        }
        if($namesur=='') {
            $StrMensaje.="<li>Insert your name supervisor<li/>";
        }
//        if($job1) {
//            $StrMensaje.="<li>Insert your option citizen<li/>";
//        }
//        if($job2) {
//            $StrMensaje.="<li>Selected your option citizen<li/>";
//        }
//        if($job3) {
//            $StrMensaje.="<li>Selected your option citizen<li/>";
//        }
//        if($job4) {
//            $StrMensaje.="<li>Selected your option citizen<li/>";
//        }
//        if($job5) {
//            $StrMensaje.="<li>Selected your option citizen<li/>";
//        }
//        if($job6 ) {
//            $StrMensaje.="<li>Selected your option citizen<li/>";
//        }
//        if($job7 ) {
//            $StrMensaje.="<li>Selected your option citizen<li/>";
//        }
//        if($job8) {
//            $StrMensaje.="<li>Selected your option citizen<li/>";
//        }
//        if($job9) {
//            $StrMensaje.="<li>Selected your option citizen<li/>";
//        }
//        if($job10) {
//            $StrMensaje.="<li>Selected your option citizen<li/>";
//        }
        if($mil) {
            $StrMensaje.="<li>Selected your option (Are you eligible to work on military bases in USA)<li/>";
        }
        if($dem) {
            $StrMensaje.="<li>Selected your option (Have you ever been involved in a lawsuit with any previous employer)<li/>";
        }
        if($demc) {
            $StrMensaje.="<li>Selected your option (Have you ever been involved in a Workers Compensation Claim?)<li/>";
        }
        if($acept) {
            $StrMensaje.="<li>Selected your option (Are you willing to travel if there are qualified work positions in another city or state?)<li/>";
        }
        
        if($StrMensaje !=''){
            $status = 400;
        }
        else{
            $status = 200;
        }

        return response()->json([
                    'Campo' => '',
                    'status' => $status,
                    'message' => $StrMensaje =='' ? 'Congragulation':$StrMensaje
        ]);
    }
    
    public function configuration($Id){
        $Empresa = User::find($Id);
        return view('empresa.configuration', array('empresa' => $Empresa));
    }
    
    public function listaplications($Id){
        $Aplication = Empresas::where('id_company',$Id)->paginate(30);
        return view('empresa.list', array('aplicaciones' => $Aplication));
    }
    
    public function getImageCompany($filename) {
        $file = Storage::disk('public')->get($filename);
        return new Response($file);
    }
    
    public function UpdateBusines(Request $request){
        //Con este obtenemos el id del usr identificado.
        $Id = \Auth::user()->id;

        //Con esto obtenemos el objeto  del usr identificado
        $User = \Auth::user();

        //Validamos el formulario.
        $validate = $this->validate($request, [
            'name' => 'required|string|max:255',
//            'identity' => 'required|int',
//            'email' => 'required|string|email|max:255|unique:users,email,' . $Id, //Con unique:users,nick,'.$Id validamos que el email que vamos a guardar sea el nuestro o si no valide que no exista
        ]);

        //Recoger datos del formulario
        $name = $request->input('name');
        $identity= $request->input('identity');
        $email = $request->input('email');

        //Obtengo la imagen
        $image_path = $request->file('image_path');
        if ($image_path) {
            //Le pongo un nombre unico
            $imagen_nom = time() . $image_path->getClientOriginalName();
            //Guardo la imagen
            Storage::disk('public')->put($imagen_nom, File::get($image_path)); //Con este guardamos la imagen en el disco virtual
            $User->image = $imagen_nom;
        }

        $User->name = $name;
        $User->Identificacion = $identity;
        $User->email = $email;


        $User->update();
        return redirect()->route('home.config',['Id'=>$User->id])->with(['status' => 'Datos actualizados']);
    }
    
    public function getImageSignature($filename) {
        $file = Storage::disk('firmas')->get($filename);
        return new Response($file);
    }


}
