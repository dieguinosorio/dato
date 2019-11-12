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
Route::get('/company/edit/{id}', 'AplicationController@loadAplication')->name('company.edit');
Route::post('/update/{id}', 'EmpresasController@UpdateApp')->name('company.update');
Route::get('/company/delete/{id}', 'EmpresasController@DeleteApp')->name('company.delete');

Route::get('/image/{file}', 'HomeController@getImage')->name('image.getimg');
Route::post('/signature/', 'HomeController@getImageSig')->name('image.signature');
Route::get('/image/signature/{firma}', 'HomeController@getImage')->name('get.signature');
Route::get('/image/socials/{imagen}', 'HomeController@getImageSocial')->name('get.social');
Route::get('/image/public/{imagen}', 'HomeController@getImagePublic')->name('get.public');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/config/{Id?}', 'HomeController@configuration')->name('home.config');
Route::get('avatar/{file}', 'HomeController@getImageCompany')->name('business.avatar');
Route::post('busines/update/{id}', 'HomeController@UpdateBusines')->name('business.update');
Route::get('business/plan/{Id}', 'PlansController@InformationPlant')->name('information.plan');
Route::get('business/filter/', 'EmpresasController@BusquedaEmpresa')->name('business.filter');

Route::get('formw/{Id?}', 'ImprimirDocumentos@generalW4')->name('format.wfor');
Route::get('formreg/{Id?}', 'ImprimirFormularioReg@formRegister')->name('format.reg');
Route::get('formw9/{Id?}', 'ImprimirFormatow9@general')->name('format.w9');
Route::get('formi9/{Id?}', 'ImprimirFormatoi9@general')->name('format.i9');



//Route::group(['prefix'=>'format'], function (){
//    Route::post('w4/{Id?}', 'ImprimirDocumentos@generalW4')->name('format.w4');
////    Route::post('config', 'UserController@Actualizar')->name('user.update');
////    Route::get('avatar/{file}', 'UserController@getImage')->name('user.avatar');
////    Route::get('profile/{user}', 'UserController@profile')->name('user.profile');
////    Route::get('gente/{search?}', 'UserController@users')->name('user.index');
//});


Route::get('/list/{Id?}', 'HomeController@listaplications')->name('aplication.list');
Route::get('/company/prueba/', 'HomeController@prueba')->name('prueba');
Route::post('company/validarform/', 'HomeController@ValidarFormulario')->name('validar.formulario');

Route::group(array('domain' => '{subdomain}.dato.com'), function () {
 
    Route::get('/', function ($subdomain) {
 
        $name = DB::table('users')->where('name', $subdomain)->get();
 
        dd($name);
 
    });
});



//Route::get('pdf', 'ImprimirDocumentos@generalW4')->name('prueba.pdf');