<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class AnalyticsFBController extends Controller
{

    public function index()
    {
      $fb = new \Facebook\Facebook([
        'app_id' => '180780819104546',
        'app_secret' => '217bc574afae3a1eb3768846ad3df464',
        'default_graph_version' => 'v2.8',
        'default_access_token' => 'EAACka1CBQyIBACmEsKtz6a8IGhGHfcwlmMZCDNhqdmYbZBuIpXR2a7YEKpvpphjfcl8nD6DehvTaXf8XQj5dyypdYRZAEyOcwJZA7iQXta4jyTT6ZCdEnfrTWvZAjixW2WiISZAs3AgCxg7SnH2N6EM4ZCFsAScsOjcZD',
        ]);

      $fb->setDefaultAccessToken('EAACka1CBQyIBACmEsKtz6a8IGhGHfcwlmMZCDNhqdmYbZBuIpXR2a7YEKpvpphjfcl8nD6DehvTaXf8XQj5dyypdYRZAEyOcwJZA7iQXta4jyTT6ZCdEnfrTWvZAjixW2WiISZAs3AgCxg7SnH2N6EM4ZCFsAScsOjcZD');

      $requestPageImpression = $fb->request('GET', '/amadeo.id/insights/page_impressions?since=1483228800&until=1490918400');

      $requestPageImpressionOrganic = $fb->request('GET', 'amadeo.id/insights/page_impressions_organic');

      $requestPageView = $fb->request('GET', 'amadeo.id/insights/page_views_total');

      $requestGenderAge = $fb->request('GET', 'amadeo.id/insights/page_fans_gender_age');

      $requestFanReach = $fb->request('GET', 'amadeo.id/insights/post_fan_reach');

      $requestPageEngagedUser = $fb->request('GET', 'amadeo.id/insights/page_engaged_users');

      $requestPostEngagedFan = $fb->request('GET', 'amadeo.id/insights/post_engaged_fan');

      $batch = [
          'page-impression' => $requestPageImpression,
          'page-impression-organic' => $requestPageImpressionOrganic,
          'page-page-view'  => $requestPageView,
          'page-gender-age' => $requestGenderAge,
          'page-fan-reach'  => $requestFanReach,
          'page-engaged-user' => $requestPageEngagedUser,
          'post-engaged-fan'  => $requestPostEngagedFan,
          ];

      echo '<h1>Make a batch request</h1>' . "\n\n";

      try {
        $responses = $fb->sendBatchRequest($batch);
      } catch(Facebook\Exceptions\FacebookResponseException $e) {
        echo 'Graph returned an error: ' . $e->getMessage();
        exit;
      } catch(Facebook\Exceptions\FacebookSDKException $e) {
        echo 'Facebook SDK returned an error: ' . $e->getMessage();
        exit;
      }

      foreach ($responses as $key => $response) {
        if ($response->isError()) {
          $e = $response->getThrownException();
          echo '<p>Error! Facebook SDK Said: ' . $e->getMessage() . "\n\n";
          echo '<p>Graph Said: ' . "\n\n";
          var_dump($e->getResponse());
        } else {
          echo "<p><b>(" . $key . ")</b> HTTP status code: " . $response->getHttpStatusCode() . "<br />\n";
          echo "Response: " . stripslashes(json_encode($response->getBody())) . "</p>\n\n";
          echo "<hr />\n\n";
        }
      }
    }

  public function testing()
    {
      return view('testing');
    }

  public function getJson(){
      $fb = new \Facebook\Facebook([
        'app_id' => '180780819104546',
        'app_secret' => '217bc574afae3a1eb3768846ad3df464',
        'default_graph_version' => 'v2.8',
        'default_access_token' => 'EAACka1CBQyIBACmEsKtz6a8IGhGHfcwlmMZCDNhqdmYbZBuIpXR2a7YEKpvpphjfcl8nD6DehvTaXf8XQj5dyypdYRZAEyOcwJZA7iQXta4jyTT6ZCdEnfrTWvZAjixW2WiISZAs3AgCxg7SnH2N6EM4ZCFsAScsOjcZD',
        ]);

      $fb->setDefaultAccessToken('EAACka1CBQyIBACmEsKtz6a8IGhGHfcwlmMZCDNhqdmYbZBuIpXR2a7YEKpvpphjfcl8nD6DehvTaXf8XQj5dyypdYRZAEyOcwJZA7iQXta4jyTT6ZCdEnfrTWvZAjixW2WiISZAs3AgCxg7SnH2N6EM4ZCFsAScsOjcZD');

       $requestPageImpression = $fb->request('GET', '/amadeo.id/insights/page_impressions?since=1483228800&until=1490918400');

      $requestPageImpressionOrganic = $fb->request('GET', 'amadeo.id/insights/page_impressions_organic');

      $requestPageView = $fb->request('GET', 'amadeo.id/insights/page_views_total');

      $requestGenderAge = $fb->request('GET', 'amadeo.id/insights/page_fans_gender_age');

      $requestFanReach = $fb->request('GET', 'amadeo.id/insights/post_fan_reach');

      $requestPageEngagedUser = $fb->request('GET', 'amadeo.id/insights/page_engaged_users');

      $requestPostEngagedFan = $fb->request('GET', 'amadeo.id/insights/post_engaged_fan');

      $batch = [
          'page-impression' => $requestPageImpression,
          'page-impression-organic' => $requestPageImpressionOrganic,
          'page-page-view'  => $requestPageView,
          'page-gender-age' => $requestGenderAge,
          'page-fan-reach'  => $requestFanReach,
          'page-engaged-user' => $requestPageEngagedUser,
          'post-engaged-fan'  => $requestPostEngagedFan,
          ];

      try {
        $responses = $fb->sendBatchRequest($batch);
      } 
      catch(Facebook\Exceptions\FacebookResponseException $e) {
        echo 'Graph returned an error: ' . $e->getMessage();
        exit;
      } 
      catch(Facebook\Exceptions\FacebookSDKException $e) {
        echo 'Facebook SDK returned an error: ' . $e->getMessage();
        exit;
      }

      $response = $responses->getResponses();

      foreach ($responses as $key => $response) {
        // page-impression
        if ($key == "page-impression") {
          $pageImpression = $response->getDecodedBody();
          foreach ($pageImpression as $key => $response) {
            if ($key == "data") {
              $checkObj = 0;
              $datas = $response;
              foreach ($datas as $data){
                if ($checkObj == 0) {
                  $pageImpressionDay = $data;
                }
                if ($checkObj == 1) {
                  $pageImpressionWeek = $data;
                }
                if ($checkObj == 2) {
                  $pageImpressionMonth = $data;
                }
                $checkObj++;
              }
            }
            if ($key == "paging") {
              $pageImpressionPaging = $response;
            }
          }
        }
        // end page-impression
        
        // page-impression-organic
        if ($key == "page-impression-organic") {
          $pageImpressionOrganic = $response->getDecodedBody();
          foreach ($pageImpressionOrganic as $key => $response) {
            if ($key == "data") {
              $checkObj = 0;
              $datas = $response;
              foreach ($datas as $data){
                if ($checkObj == 0) {
                  $pageImpressionOrganicDay = $data;
                }
                if ($checkObj == 1) {
                  $pageImpressionOrganicWeek = $data;
                }
                if ($checkObj == 2) {
                  $pageImpressionOrganicMonth = $data;
                }
                $checkObj++;
              }
            }
            if ($key == "paging") {
              $pageImpressionOrganicPaging = $response;
            }
          }
        }
        // end page-impression-organic
        
        // page-page-view
        if ($key == "page-page-view") {
          $pagePageView = $response->getDecodedBody();
          foreach ($pagePageView as $key => $response) {
            if ($key == "data") {
              $checkObj = 0;
              $datas = $response;
              foreach ($datas as $data){
                if ($checkObj == 0) {
                  $pagePageViewDay = $data;
                }
                if ($checkObj == 1) {
                  $pagePageViewWeek = $data;
                }
                if ($checkObj == 2) {
                  $pagePageViewMonth = $data;
                }
                $checkObj++;
              }
            }
            if ($key == "paging") {
              $pagePageViewPaging = $response;
            }
          }
        }
        // end page-page-view

        // page-engaged-user
        if ($key == "page-engaged-user") {
          $pageEngagedUser = $response->getDecodedBody();
          foreach ($pageEngagedUser as $key => $response) {
            if ($key == "data") {
              $checkObj = 0;
              $datas = $response;
              foreach ($datas as $data){
                if ($checkObj == 0) {
                  $pageEngagedUserDay = $data;
                }
                if ($checkObj == 1) {
                  $pageEngagedUserWeek = $data;
                }
                if ($checkObj == 2) {
                  $pageEngagedUserMonth = $data;
                }
                $checkObj++;
              }
            }
            if ($key == "paging") {
              $pageEngagedUserPaging = $response;
            }
          }
        }
        // end page-engaged-user


      }

      // page-impression
      foreach ($pageImpressionDay as $key => $response){
        if ($key == "values"){
          $pageImpressionDayDatas = $response;
        }
      }
      foreach ($pageImpressionWeek as $key => $response){
        if ($key == "values"){
          $pageImpressionWeekDatas = $response;
        }
      }
      foreach ($pageImpressionMonth as $key => $response){
        if ($key == "values"){
          $pageImpressionMonthDatas = $response;
        }
      }
      // end page-impression

      // page-impression-organic
      foreach ($pageImpressionOrganicDay as $key => $response){
        if ($key == "values"){
          $pageImpressionOrganicDayDatas = $response;
        }
      }
      foreach ($pageImpressionOrganicWeek as $key => $response){
        if ($key == "values"){
          $pageImpressionOrganicWeekDatas = $response;
        }
      }
      foreach ($pageImpressionOrganicMonth as $key => $response){
        if ($key == "values"){
          $pageImpressionOrganicMonthDatas = $response;
        }
      }
      // end page-impression-organic

      // page-page-view
      foreach ($pagePageViewDay as $key => $response){
        if ($key == "values"){
          $pagePageViewDayDatas = $response;
        }
      }
      foreach ($pagePageViewWeek as $key => $response){
        if ($key == "values"){
          $pagePageViewWeekDatas = $response;
        }
      }
      foreach ($pagePageViewMonth as $key => $response){
        if ($key == "values"){
          $pagePageViewMonthDatas = $response;
        }
      }
      // end page-page-view

      // page-engaged-user
      foreach ($pageEngagedUserDay as $key => $response){
        if ($key == "values"){
          $pageEngagedUserDayDatas = $response;
        }
      }
      foreach ($pageEngagedUserWeek as $key => $response){
        if ($key == "values"){
          $pageEngagedUserWeekDatas = $response;
        }
      }
      foreach ($pageEngagedUserMonth as $key => $response){
        if ($key == "values"){
          $pageEngagedUserMonthDatas = $response;
        }
      }
      // end page-engaged-user

      // dd($pageImpressionOrganic);
      return response()->json(
        compact(
          'pageImpressionDayDatas',
          'pageImpressionWeekDatas',
          'pageImpressionMonthDatas', 
          'pageImpressionPaging', 
          'pageImpressionOrganicDayDatas', 
          'pageImpressionOrganicWeekDatas', 
          'pageImpressionOrganicMonthDatas', 
          'pageImpressionOrganicPaging', 
          'pagePageViewDayDatas', 
          'pagePageViewWeekDatas', 
          'pagePageViewMonthDatas', 
          'pagePageViewPaging',
          'pageEngagedUserDayDatas',
          'pageEngagedUserWeekDatas',
          'pageEngagedUserMonthDatas',
          'pageEngagedUserPaging'
          )
      );
  }

}
