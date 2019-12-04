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


Route::get('/imc', 'ImcController@index')->name('diagnostics');
Route::get('/imc/create', 'ImcController@create')->name('diagnostics.create');
Route::post('/imc/store', 'ImcController@store')->name('diagnostics.store');