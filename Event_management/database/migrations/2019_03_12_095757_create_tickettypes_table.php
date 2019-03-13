<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTickettypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickettypes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('eventid');
            $table->string('tickettype'); 
            $table->string('Ticketname');
            $table->integer('quantity');
            $table->integer('rate');
            $table->integer('servicecharge');
            $table->date('ticketstart');
            $table->date('ticketend');

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
        Schema::dropIfExists('tickettypes');
    }
}
