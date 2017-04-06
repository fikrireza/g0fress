<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Models\User;
use App\Models\Kota;
use App\Models\MasterKupon;
use App\Models\Campaign1;

use Auth;
use Validator;
use DB;


class FirstCampaignController extends Controller
{

	/**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
      $this->middleware('auth', ['except' => 'signInPage']);
  }

	public function signInPage()
    {
        return view('pages.firstCampaign.sign-in-page');
    }

    public function pertanyaanPage()
    {
				$cekEmail = Campaign1::where('email', '=', Auth::user()->email)->first();

				if($cekEmail){
					return redirect()->route('first-campaign-terimakasih');
				}

				$getProfil = User::where('id', '=', Auth::user()->id)->first();
				$getKota = Kota::get();

        return view('pages.firstCampaign.pertanyaan-dari-kami-page', compact('getProfil', 'getKota'));
    }

		public function pertanyaanPageStore(Request $request)
		{
			// Cek inputan
			$validator = Validator::make($request->all(), [
        'nama' => 'required',
        'email' => 'required|email',
        'hp' => 'required',
        'kota' => 'required|not_in:--Pilih--',
        'pertanyaan_1' => 'required',
        'pertanyaan_2' => 'required',
        'pertanyaan_3' => 'required',
        'pertanyaan_4' => 'required',
      ]);

      if($validator->fails())
      {
        return redirect()->route('first-campaign-pertanyaan-dari-kami')->withErrors($validator)->withInput();
      }

			// Ambil Kupon yang masih berlaku
			$kupon = DB::select('SELECT id, kupon FROM master_kupon
													WHERE id NOT IN (SELECT kupon_id FROM campaign_1)
													ORDER BY RAND() LIMIT 0,1');

			// Simpan ke database
			$set = new Campaign1;
			$set->nama = $request->nama;
			$set->email = $request->email;
			$set->hp = $request->hp;
			$set->kota = $request->kota;
			$set->pertanyaan_1 = $request->pertanyaan_1;
			$set->pertanyaan_2 = $request->pertanyaan_2;
			$set->pertanyaan_3 = $request->pertanyaan_3;
			$set->pertanyaan_4 = implode(',',$request->pertanyaan_4);
			$set->kupon_id = $kupon[0]->id;
			$set->save();

			$data = array([
          'email' => $request->email,
          'kupon' => $kupon[0]->kupon
        ]);

      Mail::send('campaign1_kupon', ['data' => $data], function($message) {
        $message->to(Input::get('email'), Input::get('nama'))->subject('Hello Tukarkan Kupon Ini di Alfamart');
      });

			return redirect()->route('first-campaign-terimakasih');
		}

		public function thanksPage()
    {
				$cekEmail = Campaign1::join('master_kupon', 'master_kupon.id', '=', 'campaign_1.kupon_id')
															->select('master_kupon.kupon')
															->where('campaign_1.email', '=', Auth::user()->email)->first();

				if(!$cekEmail)
				{
					return redirect()->route('first-campaign-sign-in');
				}

        return view('pages.firstCampaign.terimakasih', compact('cekEmail'));
    }


}
