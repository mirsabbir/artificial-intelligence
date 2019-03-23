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

Route::get('/save-the-queen', function () {
    return view('save-the-queen');
});

Route::get('/form-validation', function () {
    return view('form-validation');
});

Route::get('/vacuum-cleaner', function () {
    return view('vacuum-cleaner');
});

Route::get('/4-connect', function () {
    return view('4-connect');
});

Route::get('/gender', function () {
  return view('gender');
});


  
  
  
  
