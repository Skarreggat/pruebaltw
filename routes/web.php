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

/*
Route::get('/', function () {
    
    return view('index');
});
 */

Route::get('/', 'EntradasController@index');

// Rutas de clientes
Route::group(['prefix' => 'clientes'], function(){
    Route::get('detalle/{id}', 'EntradasController@detalle_cliente');
    Route::get('formulario', 'EntradasController@formulario_cliente');
    Route::post('save', 'EntradasController@save_cliente');
    Route::get('editar/{id}', 'EntradasController@editar_cliente');
    Route::post('update', 'EntradasController@update_cliente');
    Route::get('delete/{id}', 'EntradasController@delete_cliente');
});

// Rutas de tratamientos
Route::group(['prefix' => 'tratamientos'], function(){
    Route::get('detalle/{id}', 'EntradasController@detalle_tratamiento');
    Route::get('formulario', 'EntradasController@formulario_tratamiento');
    Route::post('save', 'EntradasController@save_tratamiento');
    Route::get('editar/{id}', 'EntradasController@editar_tratamiento');
    Route::post('update', 'EntradasController@update_tratamiento');
    Route::get('delete/{id}', 'EntradasController@delete_tratamiento');
});
