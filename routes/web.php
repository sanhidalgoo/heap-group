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

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/
Route::get('/admin', 'App\Http\Controllers\Admin\AdminController@')->name('admin.index');

Route::get('/admin/users', 'App\Http\Controllers\Admin\UserAdminController@index')->name('admin.users.index');
Route::get('/admin/users/create', 'App\Http\Controllers\Admin\UserAdminController@create')->name('admin.users.create');
Route::post('/admin/users/save', 'App\Http\Controllers\Admin\UserAdminController@save')->name('admin.users.save');
Route::post('/admin/users/delete', 'App\Http\Controllers\Admin\UserAdminController@delete')->name('admin.users.delete');
Route::get('/admin/users/{id}', 'App\Http\Controllers\Admin\UserAdminController@show')->name('admin.users.show');
Route::get('/admin/users/{id}/edit', 'App\Http\Controllers\Admin\UserAdminController@edit')->name('admin.users.edit');
Route::post('/admin/users/{id}/edit', 'App\Http\Controllers\Admin\UserAdminController@update')->name('admin.users.update');

Route::get('/admin/beers', 'App\Http\Controllers\Admin\BeerAdminController@index')->name('admin.beers.index');
Route::get('/admin/beers/create', 'App\Http\Controllers\Admin\BeerAdminController@create')->name('admin.beers.create');
Route::get('/admin/beers/save', 'App\Http\Controllers\Admin\BeerAdminController@save')->name('admin.beers.save');
Route::get('/admin/beers/delete', 'App\Http\Controllers\Admin\BeerAdminController@delete')->name('admin.beers.delete');
Route::get('/admin/beers/{id}', 'App\Http\Controllers\Admin\BeerAdminController@show')->name('admin.beers.show');
Route::get('/admin/beers/{id}/edit', 'App\Http\Controllers\Admin\BeerAdminController@edit')->name('admin.beers.edit');
Route::get('/admin/beers/{id}/edit', 'App\Http\Controllers\Admin\BeerAdminController@update')->name('admin.beers.update');

/*
|--------------------------------------------------------------------------
| User Routes
|--------------------------------------------------------------------------
*/
Route::get('/', 'App\Http\Controllers\User\HomeController@index')->name('home.index');
Route::get('/beers', 'App\Http\Controllers\User\BeerController@index')->name('user.beers.index');
Route::get('/beers/{id}', 'App\Http\Controllers\User\BeerController@show')->name('user.beers.show');
Route::get('/beers/{id}/reviews/create', 'App\Http\Controllers\User\ReviewController@create')->name('user.reviews.create');
Route::post('/beers/{id}/reviews/save', 'App\Http\Controllers\User\ReviewController@save')->name('user.reviews.save');
