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


Route::get('/teste-de-email', function () {
    Mail::raw('Estou testando o envio de e-mails, este funcionou!', function($message)
    {
        $message->subject('Teste de e-mail');
        $message->to('victorfrossard00@gmail.com', 'Victor Frossard');
    });
});
