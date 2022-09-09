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
    return view('welcome');
});

Route::get('/app', 'AppController@index')->name('app');
Route::get('/create', 'AppController@create')->name('create');
Route::get('/edit/{id}', 'AppController@edit')->name('edit');
Route::post('/store', 'AppController@store')->name('store');
Route::post('/update/{id}', 'AppController@update')->name('update');
Route::delete('/destroy/{id}', 'AppController@destroy')->name('destroy');
