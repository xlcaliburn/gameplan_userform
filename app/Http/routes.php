<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::get('/', 'HomeController@index');

Route::post('/', 'AdminController@store');

Route::post('admin/{user}/edit', 'AdminController@update');
Route::delete('admin/{user}/delete', 'AdminController@destroy');

Route::resource('admin', 'AdminController');