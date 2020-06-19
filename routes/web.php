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


Auth::routes();

Route::get('/','HomeController@index')->name('home.index');
Route::get('/home','HomeController@dashboard')->name('home.dashboard');


Route::get('/clients', 'ClientController@index')->name('clients.index');
Route::get('/clients/create', 'ClientController@create')->name('clients.create');
Route::post('/clients/save', 'ClientController@save')->name('clients.save');
Route::get('/clients/edit/{id}', 'ClientController@edit')->name('clients.edit');
Route::get('/clients/destroy/{id}', 'ClientController@destroy')->name('clients.destroy');
Route::get('/clients/print', 'ClientController@print')->name('clients.print');
Route::post('/clients/update', 'ClientController@update')->name('clients.update');
