<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrgprofilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orgprofiles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('userid');
            $table->string('name');
            $table->integer('mobile');
            $table->string('logo');
            $table->string('address');
            $table->integer('stateid');

            $table->string('website');






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
        Schema::dropIfExists('orgprofiles');
    }
}
