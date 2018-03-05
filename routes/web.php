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


Route::get('/', function () {
    return view('home');
});

// Rutas de autenticación
Auth::routes();

// Rutas publicas
Route::get('/gimnasios', 'GimnasiosController@publico')->name('gimnasios');


// Rutas Llamadas Asincrona
Route::get('/registro', 'AsincronoController@formularioRegistro');
Route::get('/editarPerfil', 'AsincronoController@formularioEditarPerfil');
Route::get('/mostrarGimnasios', 'GimnasiosController@mostrarGimnasios')->name('mostrarGimnasios');

// Rutas Validación Asincrona
Route::post('/register/validate', 'Auth\RegisterController@validacionRegisterAjax');
Route::post('/updatePerfil/validate', 'UserController@validacionUpdatePerfilAjax');
Route::post('/createGimnasios/validate', 'GimnasiosController@validacionCreateGimnasiosAjax');

// Rutas de la entidad Users
Route::group(['prefix' => '/{user}'], function (){
    Route::get('/', 'UserController@perfil')->name('user.perfil')->middleware('auth');
    Route::get('/edit', 'UserController@edit')->name('user.edit')->middleware('auth');
    Route::put('/edit', 'UserController@update')->name('user.update')->middleware('auth');
});

// Rutas de la entidad Gimnasios
Route::group(['prefix' => '/{user}/gimnasios'], function(){
    Route::get('/', 'GimnasiosController@show')->name('gimnasios.show');
    Route::get('/create', 'GimnasiosController@create')->name('gimnasios.form')->middleware();
    Route::post('/create', 'GimnasiosController@store')->name('gimnasios.create')->middleware();
    Route::get('/{gimnasios}/edit', 'GimnasiosController@edit')->name('gimnasios.edit')->middleware();
    Route::put('/{gimnasios}/edit', 'GimnasiosController@update')->name('gimnasios.update')->middleware();
    Route::get('/{gimnasio}', 'GimnasiosController@gestion')->name('gimnasios.gestion')->middleware();
});

// Rutas de la entidad Monitores
Route::group(['prefix' => '/{user}/gimnasios/{gimnasio}/monitores'], function (){
    Route::get('/', 'MonitoresController@show')->name('monitores.show')->middleware();
    Route::get('/create', 'MonitoresController@create')->name('monitores.form')->middleware();
    Route::post('create', 'MonitoresController@store')->name('monitores.create')->middleware();
//    Route::get('/{monitor}/edit', 'MonitoresController@edit')->name('monitores.edit')->middleware();
//    Route::put('/{monitor}/edit', 'MonitoresController@update')->name('monitores.update')->middleware();
});

// Rutas de la entidad Actividades
Route::group(['prefix' => '/{user}/gimnasios/{gimnasio}/actividades'], function (){
    Route::get('/', 'ActividadesController@show')->name('actividades.show')->middleware();
    Route::get('/create', 'ActividadesController@create')->name('actividades.form')->middleware();
    Route::post('/create', 'ActividadesController@store')->name('actividades.create')->middleware();
//    Route::get('/{actividad}/edit', 'ActividadesController@edit')->name('actividades.edit')->middleware();
//    Route::put('/{actividad}/edit', 'ActividadesController@update')->name('actividades.update')->middleware();
    Route::delete('', 'ActividadesController@destroy')->name('actividades.delete')->middleware('auth');
});

// Rutas de la entidad Productos
Route::group(['prefix' => '/{user}/gimnasios/{gimnasio}/productos'], function (){
    Route::get('/', 'ProductosController@show')->name('productos.show')->middleware();
    Route::get('/create', 'ProductosController@create')->name('productos.form')->middleware();
    Route::post('/create', 'ProductosController@store')->name('productos.create')->middleware();
//    Route::get('/{actividad}/edit', 'ProductosController@edit')->name('productos.edit')->middleware();
//    Route::put('/{actividad}/edit', 'ProductosController@update')->name('productos.update')->middleware();
});

// Rutas de la entidad Maquinas
Route::group(['prefix' => '/{user}/gimnasios/{gimnasio}/maquinas'], function (){
    Route::get('/', 'MaquinasController@show')->name('maquinas.show')->middleware();
    Route::get('/create', 'MaquinasController@create')->name('maquinas.form')->middleware();
    Route::post('/create', 'MaquinasController@store')->name('maquinas.create')->middleware();
//    Route::get('/{maquina}/edit', 'MaquinasController@edit')->name('maquinas.edit')->middleware();
//    Route::put('/{maquina}/edit', 'MaquinasController@update')->name('maquinas.update')->middleware();
});

// Rutas de la entidad Salas
Route::group(['prefix' => '/{user}/gimnasios/{gimnasio}/salas'], function (){
    Route::get('/', 'SalasController@show')->name('salas.show')->middleware();
    Route::get('/create', 'SalasController@create')->name('salas.form')->middleware();
    Route::post('/create', 'SalasController@store')->name('salas.create')->middleware();
//    Route::get('/{sala}/edit', 'SalasController@edit')->name('salas.edit')->middleware();
//    Route::put('/{sala}/edit', 'SalasController@update')->name('salas.update')->middleware();
});