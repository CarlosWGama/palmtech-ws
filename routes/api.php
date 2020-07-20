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

    //Usuários
    Route::group(['prefix' => 'usuarios'], function () {
        Route::put('/', 'Api\UsuariosController@atualizar');
    });
    
    //Pacientes
    Route::group(['prefix' => 'pacientes'], function () {
        Route::get('/', 'Api\PacientesController@listar');
        Route::put('/{id}', 'Api\PacientesController@atualizar');
        Route::delete('/{id}', 'Api\PacientesController@remover');
    });
    
    //Fotos
    Route::group(['prefix' => 'fotos'], function () {
        Route::get('/ultimas/{inicio}/{limite}', 'Api\FotosController@ultimas');
        Route::get('/minhas/{inicio}/{limite}', 'Api\FotosController@minhasFotos');
        Route::get('/{id}/{inicio}/{limite}', 'Api\FotosController@listar');
        Route::post('/', 'Api\FotosController@cadastrar');
    });
});