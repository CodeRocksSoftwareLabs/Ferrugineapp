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

Route::get('/login', 'UsuarioController@login')->name('login');
Route::post('/login', 'UsuarioController@authenticate')->name('login.authenticate');
Route::get('/logout', 'UsuarioController@logout')->name('logout');
Route::get('/nova-senha/{token}', 'UsuarioController@novaSenha')->name('usuarios.senha');
Route::post('/criar-senha', 'UsuarioController@criarSenha')->name('usuarios.criar-senha');


Route::group(['middleware' => 'autenticacao'], function () {

    Route::prefix('/clientes')->group(function () {
        Route::get('/', 'ClienteController@listar')->name('clientes.listar');
        Route::get('/novo', 'ClienteController@novo')->name('clientes.novo');
        Route::post('/criar', 'ClienteController@criar')->name('clientes.criar');
        Route::get('/{id}', 'ClienteController@carregar')->name('clientes.carregar');
        Route::get('/editar/{id}', 'ClienteController@editar')->name('clientes.editar');
        Route::post('/{id}', 'ClienteController@alterar')->name('clientes.alterar');
        Route::get('/excluir/{id}', 'ClienteController@excluir')->name('clientes.excluir');
    });

    Route::prefix('/agendamentos')->group(function () {
        Route::get('/listar', 'AgendamentoController@listar')->name('agendamentos.listar');
    });


    Route::prefix('/dashboard')->group(function () {
        Route::get('/', 'DashboardController@dashboard')->name('dashboard');
    });

    Route::prefix('/notificacoes')->group(function () {
        Route::get('/', 'NotificacaoController@notificacoes')->name('notificacoes.listar');
    });

    Route::prefix('/perfil')->group(function () {
        Route::get('/', 'UsuarioController@perfil')->name('perfil');
    });

    Route::group(['middleware' => 'admin'], function () {

        Route::prefix('/usuarios')->group(function () {
            Route::get('/', 'UsuarioController@listar')->name('usuarios.listar');
            Route::get('/novo', 'UsuarioController@novo')->name('usuarios.novo');
            Route::post('/criar', 'UsuarioController@criar')->name('usuarios.criar');
            Route::get('/{id}', 'UsuarioController@carregar')->name('usuarios.carregar');
            Route::get('/editar/{id}', 'UsuarioController@editar')->name('usuarios.editar');
            Route::post('/{id}', 'UsuarioController@alterar')->name('usuarios.alterar');
            Route::get('/excluir/{id}', 'UsuarioController@excluir')->name('usuarios.excluir');
        });

        Route::prefix('/relatorios')->group(function () {
            Route::get('/', 'UsuarioController@usuariosList')->name('relatorios.listar');
        });
    });

});
