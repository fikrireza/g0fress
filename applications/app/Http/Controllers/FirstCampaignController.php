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
use Mail;
use Input;

class FirstCampaignController extends Controller
{

		public function signInPage()
    {
				if(Auth::check()){
					$cekEmail = Campaign1::where('email', '=', Auth::user()->email)->first();

					if($cekEmail){
						return redirect()->route('first-campaign-terimakasih');
					}
				}

        return view('pages.firstCampaign.sign-in-page');
    }

    public function pertanyaanPage()
    {
				if(!Auth::check()) {
					return redirect()->route('first-campaign-sign-in');
				}

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
			$message = [
				'email.unique' => $request->email.' telah terdaftar',
				'hp.required'	=> 'Hp Wajib diisi',
				'kota.required' => 'Kota wajib diisi'
			];

			// Cek inputan
			$validator = Validator::make($request->all(), [
        'nama' => 'required',
        'email' => 'required|email|unique:amd_campaign_1',
        'hp' => 'required',
        'kota' => 'required|not_in:--Pilih--',
        'pertanyaan_1' => 'required',
        'pertanyaan_2' => 'required',
        'pertanyaan_3' => 'required',
        'pertanyaan_4' => 'required|min:1',
      ], $message);

      if($validator->fails())
      {
        return redirect()->route('first-campaign-pertanyaan-dari-kami')->withErrors($validator)->withInput();
      }

			DB::transaction(function() use($request) {
				// Ambil Kupon yang masih berlaku
				$kupon = DB::select('SELECT id, kupon FROM amd_master_kupon
														WHERE id NOT IN (SELECT kupon_id FROM amd_campaign_1)
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

				$updateEmail = User::find($request->user_id);
				$updateEmail->email = $request->email;
				$updateEmail->update();


				// Kirim email
				$data = array([
					'nama' => $request->nama,
					'email' => $request->email,
					'kupon' => $kupon[0]->kupon
					]);

				Mail::send('mails.campaign1_kupon', ['data' => $data], function ($message) use($data){
						$message->from('no-reply@gofress.co.id', 'Gofress');
						$message->to($data[0]['email'],$data[0]['nama']);
						$message->subject('Hello Tukarkan Kupon Ini di Alfamart');
				});

			});

			return redirect()->route('first-campaign-terimakasih');
		}

		public function thanksPage()
    {
				if(!Auth::check()) {
					return redirect()->route('first-campaign-sign-in');
				}

				$cekEmail = Campaign1::join('amd_master_kupon', 'amd_master_kupon.id', '=', 'amd_campaign_1.kupon_id')
															->select('amd_master_kupon.kupon')
															->where('amd_campaign_1.email', '=', Auth::user()->email)->first();

				if(!$cekEmail)
				{
					return redirect()->route('first-campaign-sign-in');
				}

        return view('pages.firstCampaign.terimakasih', compact('cekEmail'));
    }

		public function testemail()
		{					
			$data = array([
				'email'	=> 'fikrirezaa@gmail.com',
				'nama'	=> 'Fikri Reza Alhadi',
				'kupon' => 'TESTEMAIL',
				]);

			Mail::send('mails.campaign1_kupon', ['title' => 'Hello Tukarkan Kupon Ini di Alfamart', 'data' => $data], function ($message) use($data)
			{
				$message->from('no-reply@gofress.co.id', 'Gofress');
				$message->to($data[0]['email'],$data[0]['nama']);
				$message->subject('Hello Tukarkan Kupon Ini di Alfamart');
			});

			return "bisa";
		}


}
