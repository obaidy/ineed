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
//search by category
Route::get('/search/{service}', 'SearchController@index');
//profile of provider
Route::get('/providers/{id?}', 'DisplayProfileController@index');

Route::get('/provider', 'ProviderController@index');

//edit Provider Information
Route::get('/form', 'ProviderInfo@index');
Route::post('/form', 'ProviderInfo@store');


