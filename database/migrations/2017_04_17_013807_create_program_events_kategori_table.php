<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProgramEventsKategoriTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('amd_program_events_kategori', function(Blueprint $table){
          $table->increments('id');
          $table->string('judul_kategori_ID', 75)->unique();
          $table->string('judul_kategori_EN', 75);
          $table->string('img_url')->nullable();
          $table->string('img_alt')->nullable();
          $table->integer('flag_publish')->unsigned()->default(0);
          $table->string('slug');
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
