<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Basics extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brands', function (Blueprint $table) {
            $table->increments('id');
            
            // columnas
            $table->string('detail');
            $table->boolean('flagstate')->default('1');

            // referencia al usuario
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');

            // timestamps create_at y update_at
            $table->timestamps();
        });
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            
            // columnas
            $table->string('detail');
            $table->boolean('flagstate')->default('1');

            // referencia al usuario
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');

            // timestamps create_at y update_at
            $table->timestamps();
        });
        Schema::create('packings', function (Blueprint $table) {
            $table->increments('id');
            
            // columnas
            $table->string('detail');
            $table->boolean('flagstate')->default('1');

            // referencia al usuario
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');

            // timestamps create_at y update_at
            $table->timestamps();
        });
        Schema::create('measurements', function (Blueprint $table) {
            $table->increments('id');
            
            // columnas
            $table->string('detail');
            $table->boolean('flagstate')->default('1');

            // referencia al usuario
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');

            // timestamps create_at y update_at
            $table->timestamps();
        });

        // enable to create products table

        Schema::create('tickets', function (Blueprint $table) {
            $table->increments('id');
            
            // columnas
            $table->boolean('flagstate')->default('1');
            $table->string('name');

            // referencia al usuario
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');

            // timestamps create_at y update_at
            $table->timestamps();
        });

        Schema::create('locations', function (Blueprint $table) {
            $table->increments('id');
            
            // columnas
            $table->char('type');
            $table->boolean('flagstate')->default('1');
            $table->string('name');

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
        // normalizacion
        Schema::dropIfExists('brands'); 
        Schema::dropIfExists('categories');
        Schema::dropIfExists('packings');
        Schema::dropIfExists('tickets');
        Schema::dropIfExists('measurements');
        // registro
        Schema::dropIfExists('locations');
    }
}
