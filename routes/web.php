<?php

/* Rotas Cadastro públicas */
Route::get('/', 'CadastroController@create')->name('cadastros.create');
Route::post('/', 'CadastroController@store')->name('cadastros.store');
Route::get('/sucesso', 'CadastroController@sucesso')->name('cadastros.sucesso');

/* Rotas Cadastro Dashboard (Middleware Auth) */
Route::group(['middleware' => 'auth'], function () {
    Route::resource('cadastros', 'CadastroController')->except(['create', 'store']);
});

/* Rotas Auth */
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/login', 'AuthController@login')->name('login');
Route::post('/entrar', 'AuthController@entrar');
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

/* Registro de Usuário (Middleware Auth no Controller) */
Route::get('/register', 'Auth\RegisterController@register')->name('register');
Route::post('/register', 'Auth\RegisterController@create')->name('register');

/* Rotas de Usuário (Middleware Auth no Controller) */
Route::get 	('/usuarios',			'FuncionarioController@index');
Route::get 	('/usuarios/{id}/edit',			'FuncionarioController@edit');
Route::post ('/usuarios/{id}/update',			'FuncionarioController@update');
Route::get 	('/alterasenha',			'FuncionarioController@AlteraSenha');
Route::post	('/salvasenha',   		'FuncionarioController@SalvarSenha');

Route::group(['middleware' => 'apikey'], function() {
    Route::get('/api/cadastros', 'ApiController@cadastros');
    Route::get('/api/cadastros/{id}', 'ApiController@cadastroPorId');
});