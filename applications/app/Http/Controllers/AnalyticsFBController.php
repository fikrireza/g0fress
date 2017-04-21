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
}
