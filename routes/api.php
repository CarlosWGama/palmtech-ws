<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
//Não autenticado
Route::post('/login', 'Api\UsuariosController@logar');
Route::put('/senha', 'Api\UsuariosController@recuperarSenha');


Route::group(['prefix' => 'pacientes'], function () {
    Route::post('/', 'Api\PacientesController@cadastrar');
});

//Autenticado
Route::group(['middleware' => ['jwt']], function () {   

    Route::group(['prefix' => 'usuarios'], function () {
        Route::put('/', 'Api\UsuariosController@atualizar');
    });
    
    Route::group(['prefix' => 'pacientes'], function () {
        Route::get('/', 'Api\PacientesController@listar');
        Route::put('/{id}', 'Api\PacientesController@atualizar');
        Route::delete('/{id}', 'Api\PacientesController@remover');
    }); 
});