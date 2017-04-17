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
          $table->string('judul_ID', 75);
          $table->string('judul_EN', 75);
          $table->text('deskripsi_EN');
          $table->text('deskripsi_ID');
          $table->string('img_url');
          $table->string('img_alt');
          $table->integer('actor')->unsigned();
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
