<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::get("/", "usuariosController@principal");
Route::get("/registrarUsuarios", "usuariosController@registrar");
Route::post("/guardarUsuario", "usuariosController@guardar");
Route::get("/consultarUsuarios", "usuariosController@consultar");
Route::post("/consultar", "usuariosController@consultarUno");
Route::get("/consultar/{id}", "usuariosController@consultar2");
Route::get("/eliminarUsuario/{id}", "usuariosController@eliminar");

Route::get("/actualizarUsuario/{id}", "usuariosController@actualizar");
Route::post("/actualizaUsuario/{id}", "usuariosController@actualiza");



