<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProgramEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('amd_program_events', function(Blueprint $table){
          $table->increments('id');
          $table->integer('program_events_kategori_id')->unsigned();
          $table->string('judul_promosi_ID', 75)->unique();
          $table->string('judul_promosi_EN', 75);
          $table->text('deskripsi_ID');
          $table->text('deskripsi_EN');
          $table->string('img_url');
          $table->string('img_alt');
          $table->string('video_url');
          $table->integer('show_homepage')->unsigned()->default(0);
          $table->date('tanggal_post');
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
