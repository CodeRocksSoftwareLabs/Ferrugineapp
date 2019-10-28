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

        Route::get('/api/{q}', 'ClienteController@buscarCliente')->name('clientes.api.buscar');
    });

    Route::prefix('/agendamentos')->group(function () {
        Route::get('/listar', 'AgendamentoController@listar')->name('agendamentos.listar');
        Route::get('/novo', 'AgendamentoController@novo')->name('agendamentos.novo');
        Route::get('/novo/{id}', 'AgendamentoController@novo')->name('agendamentos.novo.cliente');
        Route::post('/criar', 'AgendamentoController@criar')->name('agendamentos.criar');
        Route::get('/{id}', 'AgendamentoController@carregar')->name('agendamentos.carregar');
        Route::get('/editar/{id}', 'AgendamentoController@editar')->name('agendamentos.editar');
        Route::post('/{id}', 'AgendamentoController@alterar')->name('agendamentos.alterar');
        Route::get('/excluir/{id}', 'AgendamentoController@excluir')->name('agendamentos.excluir');
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
