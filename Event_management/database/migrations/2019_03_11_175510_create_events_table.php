<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('events', function (Blueprint $table) {
            //$table->increments('id');
            $table->increments('id');
            $table->integer('orgid');

            $table->string('eventname');
            $table->string('image');
            
            $table->string('description');
            $table->string('event_venue');
            $table->date('startdate');
            $table->date('enddate');
            $table->time('starttime');
            $table->time('endtime');




            $table->integer('seats');
            $table->integer('eventtypeid');
            $table->integer('eventcatid');


            $table->string('eventtopic');
            
            $table->string('instructions');
            $table->string('terms_and_condition');
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
        Schema::dropIfExists('events');
    }
}
