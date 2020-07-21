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

Route::get('/', function() { return redirect()->route('login'); });

Route::get('/login', 'LoginController@index')->name('login');
Route::post('/logar', 'LoginController@logar')->name('logar');
Route::get('/logout', 'LoginController@logout')->name('logout');
Route::get('/nova-senha', 'LoginController@recuperarSenha')->name('senha.recuperar');
Route::post('/nova-senha', 'LoginController@salvarNovaSenha')->name('senha.nova');

Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

    Route::group(['prefix' => 'medicos'], function () {
        Route::get('/', 'MedicosController@index')->name('medicos.listar');
        Route::get('/novo', 'MedicosController@novo')->name('medicos.novo');
        Route::post('/cadastrar', 'MedicosController@cadastrar')->name('medicos.cadastrar');
        Route::get('/edicao/{id}', 'MedicosController@edicao')->name('medicos.edicao');
        Route::post('/editar/{id}', 'MedicosController@editar')->name('medicos.editar');
        Route::get('/excluir/{id?}', 'MedicosController@excluir')->name('medicos.excluir');
    });

    Route::group(['prefix' => 'pacientes'], function () {
        Route::get('/', 'PacientesController@index')->name('pacientes.listar');
        Route::get('/{id}', 'PacientesController@visualizar')->name('pacientes.visualizar');
        Route::get('/baixar/{id}', 'PacientesController@baixar')->name('fotos.baixar');
        Route::get('/excluir/{id?}', 'PacientesController@excluir')->name('pacientes.excluir');
    });

});

