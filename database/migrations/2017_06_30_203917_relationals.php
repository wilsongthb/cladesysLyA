<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Relationals extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            
            // columnas
            $table->string('detail');
            $table->char('status', '1');
            $table->char('barcode', '12');
            $table->boolean('flagstate');
            $table->string('imagepath'); // mas longitud

            // stock minimo del producto
            $table->integer('minstock');

            // packing
            $table->char('level'); // puede ser char tambien
            $table->integer('units');

            // referencia a brands
            $table->integer('brands_id')->unsigned();
            $table->foreign('brands_id')->references('id')->on('brands');

            // referencia a categories
            $table->integer('categories_id')->unsigned();
            $table->foreign('categories_id')->references('id')->on('categories');

            // referencia a packings
            $table->integer('packings_id')->unsigned();
            $table->foreign('packings_id')->references('id')->on('packings');

            // referencia al usuario
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');

            // timestamps create_at y update_at
            $table->timestamps();
        });

        Schema::create('suppliers', function (Blueprint $table) {
            $table->increments('id');
            
            // columnas
            $table->string('company_name');
            $table->string('contact_name');
            $table->string('identity');
            $table->string('address');
            $table->string('phone');
            $table->string('postal_code');
            $table->string('country');
            $table->string('region');
            $table->text('home_page'); // puede guardar hmtl?
            $table->string('email');
            $table->boolean('flagstate');

            // referencia a tickets
            $table->integer('tickets_id')->unsigned();
            $table->foreign('tickets_id')->references('id')->on('tickets');

            // referencia a locations
            $table->integer('locations_id')->unsigned();
            $table->foreign('locations_id')->references('id')->on('locations');

            // referencia al usuario
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');

            // timestamps create_at y update_at
            $table->timestamps();
        });

        Schema::create('inputs', function (Blueprint $table) {
            $table->increments('id');
            
            // columnas
            $table->char('type');
            $table->boolean('flagstate');
            $table->string('ticketnumber', '20');

            // referencia a tickets
            $table->integer('tickets_id')->unsigned();
            $table->foreign('tickets_id')->references('id')->on('tickets');

            // referencia a locations
            $table->integer('locations_id')->unsigned();
            $table->foreign('locations_id')->references('id')->on('locations');
            
            // referencia a suppliers
            $table->integer('suppliers_id')->unsigned();
            $table->foreign('suppliers_id')->references('id')->on('suppliers');

            // referencia al usuario
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');

            // timestamps create_at y update_at
            $table->timestamps();
        });

        Schema::create('input_details', function (Blueprint $table) {
            $table->increments('id');
            
            // columnas
            $table->float('unit_price', 11, 4);
            $table->integer('quantity');

            // referencia a inputs
            $table->integer('inputs_id')->unsigned();
            $table->foreign('inputs_id')->references('id')->on('inputs');

            // referencia a products
            $table->integer('products_id')->unsigned();
            $table->foreign('products_id')->references('id')->on('products');

            // referencia al usuario
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');

            // timestamps create_at y update_at
            $table->timestamps();
        });

        Schema::create('outputs', function (Blueprint $table) {
            $table->increments('id');
            
            // columnas
            $table->tinyInteger('status');
            $table->char('type');
            $table->string('ticketnumber', '20');

            // referencia a tickets
            $table->integer('tickets_id')->unsigned();
            $table->foreign('tickets_id')->references('id')->on('tickets');

            // referencia a locations
            $table->integer('locations_id')->unsigned();
            $table->foreign('locations_id')->references('id')->on('locations');

            // referencia al usuario
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');

            // timestamps create_at y update_at
            $table->timestamps();
        });

        Schema::create('output_details', function (Blueprint $table) {
            $table->increments('id');
            
            // columnas
            $table->float('unit_price', 11, 4);
            $table->integer('quantity');

            // referencia a input_details
            $table->integer('input_details_id')->unsigned();
            $table->foreign('input_details_id')->references('id')->on('input_details');

            // referencia a outputs
            $table->integer('outputs_id')->unsigned();
            $table->foreign('outputs_id')->references('id')->on('outputs');

            // referencia al usuario
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');

            // timestamps create_at y update_at
            $table->timestamps();
        });

        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            
            // columnas
            $table->date('shipping');
            $table->char('status');
            
            // referencia a locations
            $table->integer('locations_id')->unsigned();
            $table->foreign('locations_id')->references('id')->on('locations');

            // referencia al usuario
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');

            // timestamps create_at y update_at
            $table->timestamps();
        });

        Schema::create('order_details', function (Blueprint $table) {
            $table->increments('id');
            
            // columnas
            $table->integer('quantity');
            
            // referencia a orders
            $table->integer('orders_id')->unsigned();
            $table->foreign('orders_id')->references('id')->on('orders');

            // referencia al usuario
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');

            // timestamps create_at y update_at
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_details');
        Schema::dropIfExists('orders');
        Schema::dropIfExists('output_details');
        Schema::dropIfExists('outputs');
        Schema::dropIfExists('input_details');
        Schema::dropIfExists('inputs');
        Schema::dropIfExists('suppliers');
        Schema::dropIfExists('products');
    }
}
