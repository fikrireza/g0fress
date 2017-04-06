<?php

use Illuminate\Database\Seeder;
use App\Models\Kota;


class KotaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('kota')->insert(array(
          array('nama_kota'=>'ACEH'),
          array('nama_kota'=>'SUMATERA UTARA'),
          array('nama_kota'=>'SUMATERA BARAT'),
          array('nama_kota'=>'RIAU'),
          array('nama_kota'=>'JAMBI'),
          array('nama_kota'=>'SUMATERA SELATAN'),
          array('nama_kota'=>'BENGKULU'),
          array('nama_kota'=>'LAMPUNG'),
          array('nama_kota'=>'KEPULAUAN BANGKA BELITUNG'),
          array('nama_kota'=>'KEPULAUAN RIAU'),
          array('nama_kota'=>'DKI JAKARTA'),
          array('nama_kota'=>'JAWA BARAT'),
          array('nama_kota'=>'JAWA TENGAH'),
          array('nama_kota'=>'DAERAH ISTIMEWA YOGYAKARTA'),
          array('nama_kota'=>'JAWA TIMUR'),
          array('nama_kota'=>'BANTEN'),
          array('nama_kota'=>'BALI'),
          array('nama_kota'=>'NUSA TENGGARA BARAT'),
          array('nama_kota'=>'NUSA TENGGARA TIMUR'),
          array('nama_kota'=>'KALIMANTAN BARAT'),
          array('nama_kota'=>'KALIMANTAN TENGAH'),
        ));
    }
}
