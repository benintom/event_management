<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCountriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('state', function(Blueprint $table){
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('district', function(Blueprint $table){

            $table->increments('id');
            $table->integer('state_id');
            $table->string('name');
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
        Schema::dropIfExists('countries');
    }
}
