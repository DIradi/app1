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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('ubications', 'UbicationController');
Route::get('/getUbications', 'UbicationController@getUbications')->name('getUbications');

Route::get('/index', 'UbicationController@index')->name('index');

Route::get('/edit', 'UbicationController@edit')->name('edit');

Route::resource('comentaries', 'ComentaryController');
Route::post('/comentary', 'ComentaryController@postNewComentary');
/*Route::get('/comentaries', 'ComentaryController@index')->name('index');*/
