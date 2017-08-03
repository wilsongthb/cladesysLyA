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
    // Route::get('/hola', function(){ return "logueado papu!!"; });


    Route::group(['prefix' => 'logistic'], function(){      
        Route::resource('products', 'logistic\productsResource');
        Route::resource('suppliers', 'logistic\suppliersResource');
        Route::resource('inputs', 'logistic\inputsResource');
        Route::resource('input_details', 'logistic\input_detailsResource');
        Route::resource('outputs', 'logistic\outputsResource');

        Route::get('brands', 'logistic\utilitiesResource@brands');
        Route::get('categories', 'logistic\utilitiesResource@categories');
        Route::get('measurements', 'logistic\utilitiesResource@measurements');
        Route::get('packings', 'logistic\utilitiesResource@packings');
        Route::get('locations', 'logistic\utilitiesResource@locations');
        
        Route::get('stock', function(){
            // $stock = \DB::table('products AS p')
            //     ->select(
            //         'p.detail',
            //         \DB::raw('(IFNULL(SUM(i_d.quantity), 0) - IFNULL(SUM(o_d)')
            //     )
                
            //     ->get();
            // return $stock;
        });
        // Route::get('tickets', 'logistic\utilitiesResource@tickets');
        
        
        // Route::resource('brands', 'logistic\brandsController');
        // Route::resource('packings', 'logistic\packingsController');
        // Route::resource('categories', 'logistic\categoriesController');
    });
// });