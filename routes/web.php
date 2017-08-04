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
    Route::group(['prefix' => 'logistic'], function(){
        // API
        Route::group(['prefix' => 'api'], function(){
            Route::resource('products', 'logistic\productsResource');
            Route::resource('suppliers', 'logistic\suppliersResource');
        });
        // temporal
        Route::resource('brands', 'logistic\brandsController');
        Route::resource('packings', 'logistic\packingsController');
        Route::resource('categories', 'logistic\categoriesController');
        Route::resource('locations', 'logistic\locationsController');
        Route::resource('measurements', 'logistic\measurementsController');

        // WEB SPA
        Route::get('/{p?}/{p1?}/{p3?}/{p4?}', function(){ 
            // ruta especial, ignora los argumentos y los pasa a angular-route
            return view('logistic.angular');
        })->name('logistic');
    });
    Route::get('view/{view}', 'viewController@index');

    
    Route::get('config/{key}/{value}', 'sessionController@getConfig');
    Route::post('config', 'sessionController@setConfig');


    Route::get('getimage','ImageController@getImage');
    Route::post('postimage','ImageController@postImage');
    Route::get('listimages', 'ImageController@lista');
    Route::get('/home', function(){ return view('index'); });


    
});

Route::group(['prefix' => 'test'], function(){
    Route::get('/', 'testController@index');
});