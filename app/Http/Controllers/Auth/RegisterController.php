<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Response;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'identity' => 'required|int',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'image_path' => 'image|mimes:jpeg,jpg,png,gif|required|max:10000',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        //Obtengo la imagen
        $image_path = $data['image_path'];
        if ($image_path) {
            //Le pongo un nombre unico
            $imagen_nom = time() . $image_path->getClientOriginalName();
            //Guardo la imagen
            Storage::disk('public')->put($imagen_nom, File::get($image_path)); //Con este guardamos la imagen en el disco virtual
        }
        
        return User::create([
            'Identificacion'=>$data['identity'],
            'role'=>'user',
            'name' => $data['name'],
            'email' => $data['email'],
            'image' => $imagen_nom,
            'password' => Hash::make($data['password']),
        ]);
    }
}
