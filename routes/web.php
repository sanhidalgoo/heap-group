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

Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home.index');
Route::get('/beers', 'App\Http\Controllers\BeerController@index')->name('beers.index');
Route::get('/beers/create', 'App\Http\Controllers\BeerController@create')->name('beers.create');
Route::post('/beers/save', 'App\Http\Controllers\BeerController@save')->name('beers.save');
Route::get('/beers/{id}', 'App\Http\Controllers\BeerController@show')->name('beers.show');
Route::post('/beers/delete/{id}', 'App\Http\Controllers\BeerController@delete')->name('beers.delete');
