<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Rotas Web Públicas
|--------------------------------------------------------------------------
|
| Aqui ficam as rotas que qualquer visitante pode acessar.
|
*/

Route::get('/', function () {
    return view('welcome');
});


/*
|--------------------------------------------------------------------------
| Rotas de Autenticação
|--------------------------------------------------------------------------
|
| Este arquivo, fornecido pelo Breeze, contém todas as rotas necessárias
| para login, registro, recuperação de senha e verificação de e-mail.
|
*/
require __DIR__.'/auth.php';