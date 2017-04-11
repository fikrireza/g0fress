<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTentangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('amd_tentang', function(Blueprint $table){
          $table->increments('id');
          $table->text('deskripsi_en');
          $table->text('deskripsi_id');
          $table->string('img_url');
          $table->integer('actor')->unsigned();
          $table->imestamps();
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
