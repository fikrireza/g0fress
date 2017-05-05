<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeDataTypeAmdTentangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('amd_tentang', function (Blueprint $table) {
          $table->text('visi_deskripsi_ID')->change();
          $table->text('visi_deskripsi_EN')->change();
          $table->text('misi_deskripsi_ID')->change();
          $table->text('misi_deskripsi_EN')->change();
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
