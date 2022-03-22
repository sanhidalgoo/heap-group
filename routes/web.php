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

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/
Auth::routes();

Route::middleware(['admin'])->group(function() {
    Route::get('/admin', 'App\Http\Controllers\HomeController@admin')->name('admin.home.index');

    Route::get('/admin/users', 'App\Http\Controllers\Admin\UserAdminController@index')->name('admin.users.index');
    Route::get('/admin/users/create', 'App\Http\Controllers\Admin\UserAdminController@create')->name('admin.users.create');
    Route::post('/admin/users/save', 'App\Http\Controllers\Admin\UserAdminController@save')->name('admin.users.save');
    Route::get('/admin/users/{id}', 'App\Http\Controllers\Admin\UserAdminController@show')->name('admin.users.show');
    Route::get('/admin/users/{id}/edit', 'App\Http\Controllers\Admin\UserAdminController@edit')->name('admin.users.edit');
    Route::post('/admin/users/{id}/edit', 'App\Http\Controllers\Admin\UserAdminController@update')->name('admin.users.update');
    Route::post('/admin/users/{id}/delete', 'App\Http\Controllers\Admin\UserAdminController@delete')->name('admin.users.delete');

    Route::get('/admin/beers', 'App\Http\Controllers\Admin\BeerAdminController@index')->name('admin.beers.index');
    Route::get('/admin/beers/create', 'App\Http\Controllers\Admin\BeerAdminController@create')->name('admin.beers.create');
    Route::post('/admin/beers/save', 'App\Http\Controllers\Admin\BeerAdminController@save')->name('admin.beers.save');
    Route::get('/admin/beers/{id}', 'App\Http\Controllers\Admin\BeerAdminController@show')->name('admin.beers.show');
    Route::get('/admin/beers/{id}/edit', 'App\Http\Controllers\Admin\BeerAdminController@edit')->name('admin.beers.edit');
    Route::post('/admin/beers/{id}/edit', 'App\Http\Controllers\Admin\BeerAdminController@update')->name('admin.beers.update');
    Route::post('/admin/beers/{id}/delete', 'App\Http\Controllers\Admin\BeerAdminController@delete')->name('admin.beers.delete');
});

/*
|--------------------------------------------------------------------------
| User Routes
|--------------------------------------------------------------------------
*/
Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home.index');
Route::get('/beers', 'App\Http\Controllers\User\BeerController@index')->name('user.beers.index');
Route::get('/beers/{id}', 'App\Http\Controllers\User\BeerController@show')->name('user.beers.show');
Route::get('/beers/{id}/reviews/create', 'App\Http\Controllers\User\ReviewController@create')->name('user.reviews.create');
Route::post('/beers/{id}/reviews/save', 'App\Http\Controllers\User\ReviewController@save')->name('user.reviews.save');
