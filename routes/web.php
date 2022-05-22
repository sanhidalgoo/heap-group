<?php

// Authors: Santiago Hidalgo, Juan S. Díaz, David Calle

use Illuminate\Support\Facades\Route;
use Illuminate\Routing\Router;

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

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
    'as'            => config('admin.route.prefix') . '.',
], function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::resource('beers', BeerController::class);
    Route::resource('orders', OrderController::class);
    Route::resource('refund-orders', RefundOrderController::class);
    Route::resource('reviews', ReviewController::class);
});

/*
|--------------------------------------------------------------------------
| User Routes
|--------------------------------------------------------------------------
*/
Auth::routes();

Route::get('/', 'App\Http\Controllers\HomeController@index')->name('user.home.index');
Route::get('/beers', 'App\Http\Controllers\User\BeerController@index')->name('user.beers.index');
Route::get('/beers/ranking', 'App\Http\Controllers\User\BeerController@ranking')->name('user.beers.ranking');
Route::get('/beers/{id}', 'App\Http\Controllers\User\BeerController@show')->name('user.beers.show');
Route::get('/locale/{locale}', 'App\Http\Controllers\HomeController@setLocale')->name('user.locale');

Route::group([
    'namespace'     => 'App\\Http\\Controllers\\User',
    'middleware'    => ['auth'],
    'as'            => 'user.',
], function () {
    Route::get('/beers/{id}/reviews/create', 'ReviewController@create')->name('reviews.create');
    Route::post('/beers/{id}/reviews/save', 'ReviewController@save')->name('reviews.save');
    Route::post('/reviews/{id}/delete', 'ReviewController@delete')->name('reviews.delete');

    Route::get('/cart', 'CartController@index')->name("cart.index");
    Route::post('/cart/add/{id}', 'CartController@add')->name("cart.add");
    Route::post('/cart/remove/{id}', 'CartController@remove')->name("cart.remove");
    Route::post('/cart/increment/{id}', 'CartController@increment')->name("cart.increment");
    Route::post('/cart/decrement/{id}', 'CartController@decrement')->name("cart.decrement");
    Route::get('/cart/removeAll', 'CartController@removeAll')->name("cart.removeAll");
    Route::post('/cart/purchase', 'CartController@purchase')->name("cart.purchase");
    Route::get('/orders', 'OrderController@index')->name('orders.index');
    Route::get('/orders/refund/{id}', 'RefundOrderController@index')->name('orders.refund');
    Route::get('/orders/refund/{id}/save', 'RefundOrderController@save')->name('orders.refund.save');

    Route::post('/orders/save', 'OrderController@save')->name('orders.save');
    Route::get('/orders/{id}', 'OrderController@show')->name('orders.show');
    Route::get('/orders/{id}/download', 'OrderController@download')->name('orders.download');
});
