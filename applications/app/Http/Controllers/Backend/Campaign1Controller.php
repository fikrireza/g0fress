<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Campaign1;
use App\Models\MasterKupon;
use App\Models\Kota;
use App\Models\User;
use App\Models\SocialAccount;

use DB;
use Auth;

class Campaign1Controller extends Controller
{

    public function index()
    {
        $getCampaign = Campaign1::join('amd_kota as a', 'a.id', '=', 'amd_campaign_1.kota')
                                  ->join('amd_master_kupon as b', 'b.id', '=', 'amd_campaign_1.kupon_id')
                                  ->select('a.nama_kota', 'b.kupon', 'amd_campaign_1.*')
                                  ->get();

        $getKupon = DB::select('SELECT count(*) as sisa_kupon FROM amd_master_kupon
														WHERE id NOT IN (SELECT kupon_id FROM amd_campaign_1)');

        $getUserCampaign = Campaign1::count();
        $getAllKupon = MasterKupon::count();

        return view('backend.campaign.index', compact('getCampaign', 'getKupon', 'getUserCampaign', 'getAllKupon'));
    }

    public function getPertanyaan_1()
    {
        return $pertanyaan_1;
    }

    public function getPertanyaan_2()
    {
        return $pertanyaan_2;
    }

    public function getPertanyaan_3()
    {
        return $pertanyaan_3;
    }

    public function getPertanyaan_4()
    {
        return $pertanyaan_4;
    }
}
