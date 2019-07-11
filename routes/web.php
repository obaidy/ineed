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
Route::post('/provider', 'ProviderController@store');

//edit Provider Information or accept/deny request
Route::get('/form', 'ProviderInfo@index');
Route::post('/form', 'ProviderInfo@store');

//submit request form
Route::post('/providers/{id}', 'DisplayProfileController@store_request');

