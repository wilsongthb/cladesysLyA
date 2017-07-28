<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Outputs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('outputs', function (Blueprint $table) {
            $table->renameColumn('ticketnumber', 'ticket_number');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('outputs', function (Blueprint $table) {
            $table->renameColumn('ticket_number', 'ticketnumber');
        });
    }
}
