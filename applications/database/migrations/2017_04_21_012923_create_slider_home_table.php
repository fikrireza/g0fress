<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSliderHomeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('amd_slider_home', function(Blueprint $table){
          $table->increments('id');
          $table->string('img_url');
          $table->string('img_alt');
          $table->integer('posisi')->unsigned();
          $table->date('tanggal_post');
          $table->integer('flag_publish')->unsigned()->default(0);
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
        //
    }
}
