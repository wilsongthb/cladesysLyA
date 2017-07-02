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

// Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function(){
    Route::get('/home', function(){ return view('index'); });
    
    Route::group(['prefix' => 'logistic'], function(){
        Route::get('/', function(){ return view('logistic.index'); });

        Route::resource('brands', 'logistic\brandsController');
        Route::resource('packings', 'logistic\packingsController');
        Route::resource('categories', 'logistic\categoriesController');
        Route::resource('locations', 'logistic\locationsController');
        Route::resource('tickets', 'logistic\ticketsController');

        // single page aplication Angular JS 1.6.4
        Route::get('/ar/{p?}/{p1?}/{p3?}', function(){ return view('logistic.angular'); });// ruta especial, no le des mucha importancia
    });

    // provedor de vistas, util para el desarrollo con angular, pero puede ser una puerta abierta a errores
    Route::get('view/{view}', 'viewController@index');
});