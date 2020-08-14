<?php

use Illuminate\Support\Facades\Route;

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
    return view('starting_page');
});
Route::get('/cliente/id', function () {
    return view('cliente/indexId');
});

Route::get('/info', function () {
    return view('info');
});
/*
Route::get('/test/{name}/{age}','HobbyController@index');
*/

Route::resource('hobby','HobbyController');
Route::resource('cliente','ClienteController');
Route::resource('lista','ListaController');
Route::delete('cliente', function () {
    return view('starting_page');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::view('ajax','cliente');
