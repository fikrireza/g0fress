<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsAmdTentangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('amd_tentang', function(Blueprint $table){
        $table->renameColumn('judul_ID', 'tentang_ID');
        $table->renameColumn('judul_EN', 'tentang_EN');
        $table->string('visi_judul_ID')->after('deskripsi_ID');
        $table->string('visi_judul_EN')->after('visi_judul_ID');
        $table->string('visi_deskripsi_ID')->after('visi_judul_EN');
        $table->string('visi_deskripsi_EN')->after('visi_deskripsi_ID');
        $table->string('misi_judul_ID')->after('visi_deskripsi_EN');
        $table->string('misi_judul_EN')->after('misi_judul_ID');
        $table->string('misi_deskripsi_ID')->after('misi_judul_EN');
        $table->string('misi_deskripsi_EN')->after('misi_deskripsi_ID');
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
