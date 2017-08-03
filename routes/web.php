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
})->name('Principal');

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function(){
    
    Route::get('config/{key}/{value}', 'sessionController@getConfig');
    Route::post('config', 'sessionController@setConfig');


    Route::get('getimage','ImageController@getImage');
    Route::post('postimage','ImageController@postImage');
    Route::get('listimages', 'ImageController@lista');
    Route::get('/home', function(){ return view('index'); });
    
    Route::group(['prefix' => 'logistic'], function(){
        // Route::get('/', function(){ return view('logistic.index'); });
        Route::get('/', function(){ return redirect('/logistic/ng'); });
        Route::resource('brands', 'logistic\brandsController');
        Route::resource('packings', 'logistic\packingsController');
        Route::resource('categories', 'logistic\categoriesController');
        Route::resource('locations', 'logistic\locationsController');
        Route::resource('measurements', 'logistic\measurementsController');

        // single page aplication Angular JS 1.6.4^
        Route::get('/ng/{p?}/{p1?}/{p3?}/{p4?}', function(){ return view('logistic.angular'); })->name('angular@routes');// ruta especial, no le des mucha importancia
    });

    // provedor de vistas, util para el desarrollo con angular, pero puede ser una puerta abierta a errores
    Route::get('view/{view}', 'viewController@index');
});

Route::group(['prefix' => 'test'], function(){
    Route::get('/', 'testController@index');
});