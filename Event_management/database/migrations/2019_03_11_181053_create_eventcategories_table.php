<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventcategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eventcategories', function (Blueprint $table) {
           $table->increments('id');
             $table->string('name');
            $table->timestamps();
        });
         Schema::create('eventtopic', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('category_id');
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
        Schema::dropIfExists('eventcategories');
    }
}
