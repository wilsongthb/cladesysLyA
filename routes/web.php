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
})->name('root');

Auth::routes();

Route::group(['middleware' => 'auth'], function(){
    // LOGISTIC
    Route::group(['prefix' => 'logistic'], function(){
        // API
        Route::group(['prefix' => 'api'], function(){
            Route::resource('products', 'logistic\productsResource');
            Route::resource('suppliers', 'logistic\suppliersResource');
            Route::resource('requeriments', 'logistic\requerimentsResource');
            Route::resource('order_details', 'logistic\order_detailsResource');
            Route::resource('quotations', 'logistic\quotationsResource');

            //GET UTILITIES
            Route::get('brands', 'logistic\utilitiesResource@brands');
            Route::get('categories', 'logistic\utilitiesResource@categories');
            Route::get('measurements', 'logistic\utilitiesResource@measurements');
            Route::get('packings', 'logistic\utilitiesResource@packings');
            Route::get('locations', 'logistic\utilitiesResource@locations');
        });
        // temporal
        Route::resource('brands', 'logistic\brandsController');
        Route::resource('packings', 'logistic\packingsController');
        Route::resource('categories', 'logistic\categoriesController');
        Route::resource('locations', 'logistic\locationsController');
        Route::resource('measurements', 'logistic\measurementsController');

        // WEB SPA
        Route::get('/{p?}/{p1?}/{p3?}/{p4?}', 'logistic\utilitiesResource@main')->name('logistic');
    });
    Route::get('view/{view}', 'viewController@index');

    // configuracion
    Route::get('config', 'sessionController@getConfig');
    Route::post('config', 'sessionController@setConfig');

    // host de archivos, imagenes
    Route::get('getimage','ImageController@getImage');
    Route::post('postimage','ImageController@postImage');
    Route::get('listimages', 'ImageController@lista');
    Route::get('/home', function(){ return view('index'); });

});

Route::group(['prefix' => 'test'], function(){
    Route::get('/', 'testController@index');
});
