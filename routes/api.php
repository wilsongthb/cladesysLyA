<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::group(['middleware' => 'auth:api'], function(){

    // test route
    Route::get('/hola', function(){ return "logueado papu!!"; });

    Route::group(['prefix' => 'logistic'], function(){      
        Route::resource('products', 'logistic\productsResource');
        Route::get('brands', 'logistic\utilitiesResource@brands');
        Route::get('categories', 'logistic\utilitiesResource@categories');
        Route::get('measurements', 'logistic\utilitiesResource@measurements');
        Route::get('packings', 'logistic\utilitiesResource@packings');
        
        
        // Route::resource('brands', 'logistic\brandsController');
        // Route::resource('packings', 'logistic\packingsController');
        // Route::resource('categories', 'logistic\categoriesController');
    });
// });