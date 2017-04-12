<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCampaign1Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('amd_campaign_1', function(Blueprint $table){
          $table->increments('id');
          $table->string('nama', 50);
          $table->string('email')->unique();
          $table->string('hp', 20);
          $table->string('kota');
          $table->string('pertanyaan_1');
          $table->string('pertanyaan_2');
          $table->string('pertanyaan_3');
          $table->string('pertanyaan_4');
          $table->integer('kupon_id')->unsigned();
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
