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

Auth::routes();

Route::group(['middleware' => ['auth']], function() {
	Route::get('/admin/inicio', 'HomeController@index')->name('inicio');
	Route::get('/admin/ofimatica/ver', 'OfimaticaController@index')->name('ofimatica');

	Route::get('/admin/talento/personal', 'PersonaController@index')->name('personal');
	Route::get('/admin/talento/cargos', 'CargoController@index')->name('cargos');
	Route::get('/admin/talento/cargos/get', 'CargoController@getCargos');
	// rutas de los roles y permisos
	Route::get('/admin/roles', 'RolesController@index')->name('roles');
	Route::get('/admin/roles/get', 'RolesController@getRoles');
	Route::post('/admin/roles/delete', 'RolesController@deleteRol');
	Route::post('/admin/roles/permisos/get', 'RolesController@getPermissionsByRole');
	Route::post('/admin/roles/permisos/set', 'RolesController@setPermissionsByRole');
	Route::get('/admin/permisos/get', 'RolesController@getPermisos');
});
