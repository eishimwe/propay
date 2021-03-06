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

Route::get('people','PersonController@index');

Route::get('people_list','PersonController@people_list');

Route::get('add_person_form','PersonController@add_person_form');

Route::get('people/{id}/edit','PersonController@edit');

Route::post('people','PersonController@store');

Route::put('people','PersonController@update');

Route::delete('people/{person}','PersonController@destroy');






