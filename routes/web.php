<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    return view('/home');
//});
Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/company/{id}', 'EmpresasController@index')->name('company.index');
Route::post('/company/register{id}', 'EmpresasController@register')->name('company.register');

Route::get('/image/{file}', 'HomeController@getImage')->name('image.getimg');
Route::post('/signature/', 'HomeController@getImageSig')->name('image.signature');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/config/{Id?}', 'HomeController@configuration')->name('home.config');
Route::get('/list/{Id?}', 'HomeController@listaplications')->name('aplication.list');
Route::post('company/prueba/', 'HomeController@prueba')->name('prueba');
Route::post('company/validarform/', 'HomeController@ValidarFormulario')->name('validar.formulario');

Route::group(array('domain' => '{subdomain}.dato.com'), function () {
 
    Route::get('/', function ($subdomain) {
 
        $name = DB::table('users')->where('name', $subdomain)->get();
 
        dd($name);
 
    });
});