<?php

namespace App\Http\Controllers;

use App\Jobs\ChangeLocale;

class HomeController extends Controller
{
      /**
     * Change language.
     *
     * @param  App\Jobs\ChangeLocaleCommand $changeLocale
     * @param  String $lang
     * @return Response
     */
    public function language( $bhs, ChangeLocale $changeLocale)
    {
      $bhs = in_array($bhs, config('app.languages')) ? $bhs : config('app.fallback_locale');
      $changeLocale->lang = $bhs;
      $this->dispatch($changeLocale);

      return redirect()->back();
    }
}
