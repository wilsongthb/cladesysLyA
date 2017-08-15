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
    Route::group(['prefix' => 'logistic'], function(){
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
        Route::resource('brands', 'logistic\brandsController');
        Route::resource('packings', 'logistic\packingsController');
        Route::resource('categories', 'logistic\categoriesController');
        Route::resource('locations', 'logistic\locationsController');
        Route::resource('measurements', 'logistic\measurementsController');
        Route::get('purchase_order/{orders_id}/{suppliers_id}', 'logistic\purchaseOrderController@pdfPurchaseOrder');
        Route::get('/{p?}/{p1?}/{p3?}/{p4?}', 'logistic\utilitiesResource@main')->name('logistic');
        Route::get('/gentelella/{p?}/{p1?}/{p3?}/{p4?}', 'logistic\utilitiesResource@gentelella')->name('logistic');
    });
    Route::get('view/{view}', 'viewController@index');
    Route::get('config', 'sessionController@getConfig');
    Route::post('config', 'sessionController@setConfig');
    Route::get('getimage','ImageController@getImage');
    Route::post('postimage','ImageController@postImage');
    Route::get('listimages', 'ImageController@lista');
    Route::get('/home', function(){ 
        return redirect('/');
    });
    Route::group(['prefix' => 'managerial'], function(){
        Route::get('/', 'logistic\utilitiesResource@trabajando');
    });
    Route::get('/clinic', 'logistic\utilitiesResource@trabajando');
    Route::get('/biosecurity', 'logistic\utilitiesResource@trabajando');
    Route::get('/laboratories', 'logistic\utilitiesResource@trabajando');
});
Route::group(['prefix' => 'test'], function(){
    Route::get('/', 'testController@index');
});
