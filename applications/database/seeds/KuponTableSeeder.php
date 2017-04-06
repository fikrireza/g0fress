<?php

use Illuminate\Database\Seeder;

use App\Models\Kupon;

class KuponTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('master_kupon')->insert(array(
          array('kupon'=>'A040037F0'),
          array('kupon'=>'A07060C8F'),
          array('kupon'=>'A7098DE7F'),
          array('kupon'=>'A9FA57B9F'),
          array('kupon'=>'AEB3D9210'),
          array('kupon'=>'A010A7A71'),
          array('kupon'=>'A739EE500'),
          array('kupon'=>'A9AAF361E'),
          array('kupon'=>'AE83BA96F'),
          array('kupon'=>'A299D366D'),
          array('kupon'=>'A2A9B0D12'),
          array('kupon'=>'A5B09A91C'),
          array('kupon'=>'A5D05DFE2'),
          array('kupon'=>'A5E03E49D'),
          array('kupon'=>'A7B6AFF43'),
          array('kupon'=>'AB13E417D'),
          array('kupon'=>'AB2387A02'),
          array('kupon'=>'AC0ACE573'),
          array('kupon'=>'AC5A6A8F2'),
          array('kupon'=>'AE0CFB32C'),
          array('kupon'=>'A0CF42DB3'),
        ));
    }
}
