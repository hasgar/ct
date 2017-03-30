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

Route::get('/messageSent', function () {
    return view('messageSent');
});

Route::auth();

Route::get('/', 'HomeController@index');
Route::get('/cakes', 'CakeController@index');
Route::get('/changeStatus/{id}/{t}/{status}', 'OrderController@changeStatus')->where('id', '[0-9]+')->where('status', '[0-9]+');
Route::get('/buy-cake-{emirate}', 'CakeController@index')->where('emirate', '[A-Za-z]+');
Route::get('/buy-{name}-cake-{emirate}-online-{id}', 'CakeController@cakeDetails')->where('id', '[0-9]+')->where('name', '[A-Za-z]+')->where('emirate', '[A-Za-z]+');
Route::get('/{name}-cake-{id}', 'CakeController@cakeDetails')->where('id', '[0-9]+')->where('emirate', '[A-Za-z]+');
Route::get('/checkout', 'OrderController@checkout');
Route::post('/addCakeToCart', 'OrderController@addToCart');
Route::post('/SendMessage', 'UserController@sendMessage');
Route::get('/removeFromCart/{id}', 'CartController@removeFromCart');
Route::post('/placeOrder', 'OrderController@placeOrder');
Route::get('/confirmed', 'OrderController@confirmed');
Route::get('/adminHome', 'AdminController@home')->middleware('isAdmin');
Route::get('/cake-{id}-view', 'AdminController@viewCake')->where('id', '[0-9]+')->middleware('isAdmin');
Route::post('/editCake', 'AdminController@editCake')->middleware('isAdmin');
   Route::get('/addCake', 'AdminController@addCakeForm')->middleware('isAdmin');
   Route::post('/addCake', 'AdminController@addCake')->middleware('isAdmin');
   Route::get('/order-{id}-view', 'AdminController@viewOrder')->where('id', '[0-9]+')->middleware('isAdmin');
   Route::get('/cake-{id}-delete', 'AdminController@deleteCake')->where('id', '[0-9]+')->middleware('isAdmin');
   Route::get('/viewUsers', 'AdminController@viewUsers')->middleware('isAdmin');
   Route::get('/viewCakes', 'AdminController@viewCakes')->middleware('isAdmin');
   Route::get('/viewSettings', 'AdminController@viewSettings')->middleware('isAdmin');
   Route::post('/changeSettings', 'AdminController@changeSettings')->middleware('isAdmin');
   Route::get('/slider-{id}-view', 'AdminController@viewSlider')->where('id', '[0-9]+')->middleware('isAdmin');
   Route::get('/viewSliders', 'AdminController@viewSliders')->middleware('isAdmin');
   Route::get('/addSlider', 'AdminController@addSliderForm')->middleware('isAdmin');
   Route::post('/editSlider', 'AdminController@editSlider')->middleware('isAdmin');
   Route::post('/addSlider', 'AdminController@addSlider')->middleware('isAdmin');
