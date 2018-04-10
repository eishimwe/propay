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

    return view('auth.login');
});


Auth::routes();

/*
|--------------------------------------------------------------------------
| PEOPLE Routes
|--------------------------------------------------------------------------
|
*/


Route::get('people/create','PersonController@create');

Route::post('people','PersonController@store');

Route::get('people','PersonController@index');

Route::get('people_list','PersonController@people_list');








Route::get('/home', 'HomeController@index')->name('home');
