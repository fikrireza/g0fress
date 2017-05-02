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

        $pertanyaan_1 = DB::select("SELECT pertanyaan_1, count(pertanyaan_1) as jumlah
                              FROM amd_campaign_1
                              GROUP BY pertanyaan_1");

        $pertanyaan_2 = DB::select("SELECT pertanyaan_2, count(pertanyaan_2) as jumlah
                                    FROM amd_campaign_1
                                    GROUP BY pertanyaan_2");

        $pertanyaan_3 = DB::select("SELECT pertanyaan_3, count(pertanyaan_3) as jumlah
                                    FROM amd_campaign_1
                                    GROUP BY pertanyaan_3");

        $pertanyaan_4 = Campaign1::select('pertanyaan_4')->get();

        $pecah = explode(",", $pertanyaan_4);
        $pecah = str_replace('[{"pertanyaan_4":"', "", $pecah);
        $pecah = str_replace('"}', "", $pecah);
        $pecah = str_replace('{"pertanyaan_4":"', "", $pecah);
        $pecah = str_replace(']', "", $pecah);
        $pertanyaan_4 = array_count_values($pecah);

        return view('backend.campaign.index', compact('getCampaign', 'getKupon', 'getUserCampaign', 'getAllKupon', 'pertanyaan_1', 'pertanyaan_2', 'pertanyaan_3', 'pertanyaan_4'));
    }

    public function getPertanyaan_1()
    {
        $pertanyaan_1 = DB::select("SELECT pertanyaan_1, count(pertanyaan_1) as jumlah
                              FROM amd_campaign_1
                              GROUP BY pertanyaan_1");

        return json_encode($pertanyaan_1);
    }

    public function getPertanyaan_2()
    {
        $pertanyaan_2 = DB::select("SELECT pertanyaan_2, count(pertanyaan_2) as jumlah
                                    FROM amd_campaign_1
                                    GROUP BY pertanyaan_2");

        return json_encode($pertanyaan_2);
    }

    public function getPertanyaan_3()
    {
        $pertanyaan_3 = DB::select("SELECT pertanyaan_3, count(pertanyaan_3) as jumlah
                                    FROM amd_campaign_1
                                    GROUP BY pertanyaan_3");

        return json_encode($pertanyaan_3);
    }

    public function getPertanyaan_4()
    {
        $pertanyaan_4 = Campaign1::select('pertanyaan_4')->get();

        $pecah = explode(",", $pertanyaan_4);
        $pecah = str_replace('[{"pertanyaan_4":"', "", $pecah);
        $pecah = str_replace('"}', "", $pecah);
        $pecah = str_replace('{"pertanyaan_4":"', "", $pecah);
        $pecah = str_replace(']', "", $pecah);
        $pertanyaan_4 = array_count_values($pecah);

        return json_encode($pertanyaan_4);
    }
}
