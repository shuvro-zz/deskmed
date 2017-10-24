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

Auth::routes();

//Grupo con middleware "guest", para páginas antes sin sesión iniciada
Route::group(['middleware' => 'guest'], function () {

    Route::get('/login', 'UsuarioController@login')->name('usuario.login');
    Route::post('/signin', 'UsuarioController@signIn')->name('usuario.signin');

    Route::get('/register', 'UsuarioController@register')->name('usuario.register');
    Route::post('/signup', 'UsuarioController@store')->name('usuario.signup');
});

//Grupo con middleware "auth", para páginas que requieran sesión iniciada
Route::group(['middleware' => 'auth'], function () {
    Route::get('/', 'HomeController@index')->name('home');

    Route::get('/logout', 'UsuarioController@logout')->name('usuario.logout');

    Route::get('/profile', 'UsuarioController@profile')->name('usuario.profile');

    Route::post('/edit/{id}', 'UsuarioController@edit')->name('usuario.edit');
});
