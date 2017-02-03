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

Route::get('/contact-us', function () {
    return view('contact');
});

Route::get('/about-us', function () {
    return view('about');
});

Route::auth();
Route::get('/', 'HomeController@index');
Route::get('/cakes', 'CakeController@index');
Route::get('/changeStatus/{id}/{t}/{status}', 'OrderController@changeStatus')->where('id', '[0-9]+')->where('status', '[0-9]+');
Route::get('/buy-cake-{emirate}', 'CakeController@index')->where('emirate', '[A-Za-z]+');
Route::get('/buy-{name}-cake-{emirate}-online-{id}', 'CakeController@cakeDetails')->where('id', '[0-9]+')->where('name', '[A-Za-z]+')->where('emirate', '[A-Za-z]+');
Route::get('/{name}-cake-{id}', 'CakeController@cakeDetails')->where('id', '[0-9]+')->where('emirate', '[A-Za-z]+');
Route::get('/checkout', 'OrderController@checkout');
Route::get('/test', 'OrderController@test');
Route::post('/addCakeToCart', 'OrderController@addToCart');
Route::get('/removeFromCart/{id}', 'CartController@removeFromCart');
Route::post('/placeOrder', 'OrderController@placeOrder');
Route::get('/confirmed', 'OrderController@confirmed');
