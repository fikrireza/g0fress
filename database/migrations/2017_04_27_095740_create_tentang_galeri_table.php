<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTentangGaleriTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('amd_tentang_galeri', function(Blueprint $table){
          $table->increments('id');
          $table->string('img_url');
          $table->string('img_alt')->nullable();
          // 0 = certification; 1= achievements
          $table->integer('cer_ach')->default(0)->unsigned();
          $table->integer('flag_publish')->unsigned();
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
