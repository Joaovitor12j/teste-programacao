<?php

use Src\Route as Route;


Route::get(['set' => '/', 'as' => 'usuario.login'], 'UsuarioController@login');
Route::post(['set' => '/login-post', 'as' => 'usuario.login-post'], 'UsuarioController@loginPost');

Route::get(['set' => '/usuarios', 'as' => 'usuarios'], 'UsuarioController@index');
Route::get(['set' => '/usuarios/{id}', 'as' => 'usuarios'], 'UsuarioController@buscarUsuario');

Route::post(['set' => '/criar-usuario', 'as' => 'usuarios.post'], 'UsuarioController@criarUsuario');
Route::post(['set' => '/atualizar-usuario', 'as' => 'atualizar-usuarios.post'], 'UsuarioController@atualizar');
Route::get(['set' => '/deletar-usuario/{id}', 'as' => 'usuarios.deletar'], 'UsuarioController@excluir');

