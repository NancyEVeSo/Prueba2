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

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/Equipos', function(){return view('Equipo.Equipo');});
Route::resource('/Equipo', 'EquipoController');

Route::resource('/Jugadores', 'JugadorController');
Route::get('/Jugador', 'JugadorController@listarJugador');