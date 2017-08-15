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
            Route::resource('inputs', 'logistic\inputsResource');
            Route::resource('input_details', 'logistic\input_detailsResource');
            Route::resource('product_options', 'logistic\ProductOptionsResource');
            Route::resource('outputs', 'logistic\OutputsResource');
            Route::resource('output_details', 'logistic\OutputDetailsResource');

            //GET UTILITIES
            Route::get('brands', 'logistic\utilitiesResource@brands');
            Route::get('categories', 'logistic\utilitiesResource@categories');
            Route::get('measurements', 'logistic\utilitiesResource@measurements');
            Route::get('packings', 'logistic\utilitiesResource@packings');
            Route::get('locations', 'logistic\utilitiesResource@locations');
            Route::get('product_options/{locations_id}/{products_id}', 'logistic\ProductOptionsResource@select');
            Route::get('stock', function(){
                return \DB::
                    table('input_details AS id')
                    ->select(
                        'id.*',
                        'p.detail'
                    )
                    ->leftJoin('products AS p', 'p.id', '=', 'id.products_id')
                    ->get();
            });
        });
        // temporal
        Route::resource('brands', 'logistic\brandsController');
        Route::resource('packings', 'logistic\packingsController');
        Route::resource('categories', 'logistic\categoriesController');
        Route::resource('locations', 'logistic\locationsController');
        Route::resource('measurements', 'logistic\measurementsController');

        Route::get('purchase_order/{orders_id}/{suppliers_id}', 'logistic\purchaseOrderController@pdfPurchaseOrder');

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

    // HOME
    Route::get('/home', function(){ 
        // return view('index');
        return redirect('/');
    });

    // GERENCIAL
    Route::group(['prefix' => 'managerial'], function(){
        /**
        * SPA in VueJS
        */
        Route::get('/', 'logistic\utilitiesResource@trabajando');
    });
    Route::get('/clinic', 'logistic\utilitiesResource@trabajando');
    Route::get('/protocols', 'logistic\utilitiesResource@trabajando');
    Route::get('/laboratories', 'logistic\utilitiesResource@trabajando');

});

Route::group(['prefix' => 'test'], function(){
    Route::get('/', 'testController@index');
});
