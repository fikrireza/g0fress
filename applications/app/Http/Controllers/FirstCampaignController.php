<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;


class FirstCampaignController extends Controller
{

	public function signInPage()
    {
        return view('pages.firstCampaign.sign-in-page');
    }

    public function pertanyaanPage()
    {
        return view('pages.firstCampaign.pertanyaan-dari-kami-page');
    }

	public function thanksPage()
    {
        return view('pages.firstCampaign.terimakasih-page');
    }


}
