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
	return view('welcome');
});

        // Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');

        // Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

        // Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

Route::get('/home', 'HomeController@index')->name('home');

//////////// FACEBOOK

Route::get('/facebook/agregar/{id?}', 'FacebookController@agregar');

Route::get('/facebook/clientes', 'FacebookController@clientes');

Route::get('/facebook/publicaciones/{id}', 'FacebookController@publicaciones')->where('id', '[0-9]+');;

Route::get('facebook/publicaciones/editar/{id}', 'FacebookController@editar');

Route::get('facebook/publicaciones/eliminar/{id}', 'FacebookController@eliminar');

Route::post('/facebook/store', 'FacebookController@store');

Route::post('/facebook/update', 'FacebookController@update');

Route::post('/facebook/publicaciones/informe', 'FacebookController@informe');

Route::get('facebook/publicaciones/informe/{id}', 'FacebookController@generarpdf');

Route::get('facebook/publicaciones/informe/{id}/pagado', 'FacebookController@informepagado');

Route::get('facebook/publicaciones/informe/{id}/eliminar', 'FacebookController@informeborrar');

Route::get('facebook/cliente/{id}/eliminar', 'FacebookController@clienteborrar');

Route::get('facebook/clientes/agregar', 'FacebookController@agregarcliente');

Route::post('/facebook/clientes/store', 'FacebookController@storecliente');


//////////// INGRESOS

Route::get('ingresos', 'IngresosController@index');

Route::post('ingresos', 'IngresosController@ingresos');

Route::get('ingresos/nuevo', 'IngresosController@nuevo');

Route::post('ingresos/store', 'IngresosController@store');

Route::get('ingresos/editar/{id}', 'IngresosController@editar');

Route::get('ingresos/eliminar/{id}', 'IngresosController@eliminar');

Route::post('ingresos/update', 'IngresosController@update');



Route::get('ingresos/recurrentes', 'IngresosController@ingresos_recurrentes');

Route::get('ingresos/recurrentes/nuevo', 'IngresosController@nuevo_recurrente');

Route::post('ingresos/recurrentes/store', 'IngresosController@store_recurrente');

Route::get('ingresos/recurrentes/editar/{id}', 'IngresosController@editar_recurrente');

Route::get('ingresos/recurrentes/eliminar/{id}', 'IngresosController@eliminar_recurrente');

Route::post('ingresos/recurrentes/update', 'IngresosController@update_recurrente');



//////////// EGRESOS

Route::get('egresos', 'EgresosController@index');

Route::post('egresos', 'EgresosController@egresos');

Route::get('egresos/nuevo', 'EgresosController@nuevo');

Route::post('egresos/store', 'EgresosController@store');

Route::get('egresos/editar/{id}', 'EgresosController@editar');

Route::get('egresos/eliminar/{id}', 'EgresosController@eliminar');

Route::post('egresos/update', 'EgresosController@update');


Route::get('egresos/recurrentes', 'EgresosController@egresos_recurrentes');

Route::get('egresos/recurrentes/nuevo', 'EgresosController@nuevo_recurrente');

Route::post('egresos/recurrentes/store', 'EgresosController@store_recurrente');

Route::get('egresos/recurrentes/editar/{id}', 'EgresosController@editar_recurrente');

Route::get('egresos/recurrentes/eliminar/{id}', 'EgresosController@eliminar_recurrente');

Route::post('egresos/recurrentes/update', 'EgresosController@update_recurrente');

//////////// OBJETIVOS

Route::get('objetivos', 'ObjetivosController@index');

Route::get('objetivos/nuevo', 'ObjetivosController@nuevo');

Route::get('objetivos/editar/{id}', 'ObjetivosController@editar');

Route::get('objetivos/eliminar/{id}', 'ObjetivosController@eliminar');

Route::post('objetivos/store', 'ObjetivosController@store');

Route::post('objetivos/update', 'ObjetivosController@update');


//////////// CRON JOBS

Route::get('cron/recurrentes', 'CronController@recurrentes');