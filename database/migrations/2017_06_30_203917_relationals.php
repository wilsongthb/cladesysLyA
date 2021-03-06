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
            // $table->char('status', '1')->default('1');
            $table->string('barcode', '30');
            $table->boolean('flagstate')->default('1');
            $table->string('image_path')->nullable(); // mas longitud

            // stock minimo del producto
            // $table->integer('minstock')->default('1');

            // packing
            $table->tinyInteger('level')->default('1'); // puede ser char tambien
            $table->integer('units')->default('1');

            // referencia a brands
            $table->integer('brands_id')->unsigned();
            $table->foreign('brands_id')->references('id')->on('brands');
            // referencia a categories
            $table->integer('categories_id')->unsigned();
            $table->foreign('categories_id')->references('id')->on('categories');

            // referencia a packings
            $table->integer('packings_id')->unsigned();
            $table->foreign('packings_id')->references('id')->on('packings');

            // referencia a measurements
            $table->integer('measurements_id')->unsigned();
            $table->foreign('measurements_id')->references('id')->on('measurements');

            // referencia al usuario
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');

            // timestamps create_at y update_at
            $table->timestamps();
        });

        Schema::create('suppliers', function (Blueprint $table) {
            $table->increments('id');
            
            // columnas
            $table->string('company_name')->nullable();
            $table->string('contact_name');
            $table->string('identity', 18)->nullable();
            $table->string('address')->nullable();
            $table->string('phone');
            $table->string('postal_code')->nullable();
            $table->string('country');
            $table->string('region');
            $table->string('home_page')->nullable(); // url
            $table->string('email')->nullable();
            $table->boolean('flagstate')->default('1');

            // campos innecesarios
            $table->string('account_number');
            $table->string('bank', 150);
            $table->string('observation')->nullable();
            $table->string('products_stock')->nullable(); // en json

            // referencia a tickets
            $table->integer('tickets_id')->unsigned()->nullable(); // usando el de config
            // $table->foreign('tickets_id')->references('id')->on('tickets');

            // referencia a locations
            // $table->integer('locations_id')->unsigned();
            // $table->foreign('locations_id')->references('id')->on('locations');

            // referencia al usuario
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');

            // timestamps create_at y update_at
            $table->timestamps();
        });

        Schema::create('inputs', function (Blueprint $table) {
            $table->increments('id');
            
            // columnas
            $table->boolean('flagstate')->default('1');
            $table->string('observation', 500)->nullable();
            // referencia a locations
            $table->integer('locations_id')->unsigned();
            $table->foreign('locations_id')->references('id')->on('locations');

            // referencia al usuario
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');

            // timestamps create_at y update_at
            $table->timestamps();
        });

        Schema::create('input_details', function (Blueprint $table) {
            $table->increments('id');
            
            // columnas
            $table->float('unit_price', 8, 2);
            $table->integer('quantity');
            $table->boolean('flagstate')->default('1');
            $table->date('expiration');
            $table->date('fabrication')->nullable();
            $table->string('lot', 20)->nullable();
            $table->string('ticket_number', '20');

            // referencia a tickets
            $table->integer('tickets_id')->unsigned();
            // $table->foreign('tickets_id')->references('id')->on('tickets');
            
            // referencia a suppliers
            $table->integer('suppliers_id')->unsigned();
            $table->foreign('suppliers_id')->references('id')->on('suppliers');

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

        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            
            // columnas
            $table->date('shipping'); // fecha de envio
            $table->char('status', 1)->default('1'); // estado del envio
            $table->boolean('flagstate')->default('1'); // estado, eliminado, activo
            
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
            $table->boolean('flagstate')->default('1');
            
            // referencia a orders
            $table->integer('orders_id')->unsigned();
            $table->foreign('orders_id')->references('id')->on('orders');

            // referencia al usuario
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');

            // timestamps create_at y update_at
            $table->timestamps();
        });

        
        Schema::create('product_options', function (Blueprint $table) {
            $table->increments('id');
            // tabla de relacion n a m de products y locations

            // columnas
            // STOCK
            $table->integer('minimum');
            $table->integer('permanent');
            // DURACION
            $table->integer('duration')->unsigned();// en dias
            // RELACIONES
            $table->integer('products_id')->unsigned();
            $table->foreign('products_id')->references('id')->on('products');
            $table->integer('locations_id')->unsigned();
            $table->foreign('locations_id')->references('id')->on('locations');

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
        Schema::dropIfExists('product_options');
        Schema::dropIfExists('order_details');
        Schema::dropIfExists('orders');
        
        Schema::dropIfExists('input_details');
        Schema::dropIfExists('inputs');
        Schema::dropIfExists('suppliers');
        Schema::dropIfExists('products');
    }
}
