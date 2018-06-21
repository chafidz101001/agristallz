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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', 'FrontEndHomeController@getMaster')->name('frontEnd.master');

Route::get('/login', function(){
  return view('frontEnd.login');
});

Route::get('/kitchen', function(){
  return view('frontEnd.kitchen');
});

Route::get('/drinks', function(){
  return view('frontEnd.drinks');
});

Route::get('/about', function(){
  return view('frontEnd.about');
});

Route::get('/bread', function(){
  return view('frontEnd.bread');
});

Route::get('/frozen', function(){
  return view('frontEnd.frozen');
});

Route::get('/household', function(){
  return view('frontEnd.household');
});

Route::get('/kitchen', function(){
  return view('frontEnd.kitchen');
});

Route::get('/mail', function(){
  return view('frontEnd.mail');
});

Route::get('/pet', function(){
  return view('frontEnd.pet');
});

Route::get('/products', function(){
  return view('frontEnd.products');
});

Route::get('/vegetables', function(){
  return view('frontEnd.household');
});

Route::get('/single', function(){
  return view('frontEnd.single');
});
