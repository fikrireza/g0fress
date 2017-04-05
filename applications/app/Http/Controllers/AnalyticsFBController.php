<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class AnalyticsFBController extends Controller
{
    //

    public function index()
    {
      // $fb = new \Facebook\Facebook([
      //   'app_id' => '180780819104546',
      //   'app_secret' => '217bc574afae3a1eb3768846ad3df464',
      //   'default_graph_version' => 'v2.8',
      //   'default_access_token' => 'EAACka1CBQyIBAEujZCHIcSZBNxrDv0oXsKCNLPIN2LbGLVo3wKeW2st1Vo6BQYO9qRQZBQOkISZBw5qQFPwB7iZB1OUC8ZA9rCW9lZBLZBmiZCFRS0oQf5nU4uKEcQq1dPgTIyUwtuAs95DLWrZB1oZBv2u1ZCZAZC6ZBjyEcWxaxOWZAuRMbT4EV3TeGHTe4VHk188lQzMZD', // optional
      // ]);
      //
      // // Use one of the helper classes to get a Facebook\Authentication\AccessToken entity.
      // //   $helper = $fb->getRedirectLoginHelper();
      // //   $helper = $fb->getJavaScriptHelper();
      // //   $helper = $fb->getCanvasHelper();
      // //   $helper = $fb->getPageTabHelper();
      //
      // try {
      //   // Get the \Facebook\GraphNodes\GraphUser object for the current user.
      //   // If you provided a 'default_access_token', the '{access-token}' is optional.
      //   $response = $fb->get('/amadeo.id', 'EAACka1CBQyIBAEujZCHIcSZBNxrDv0oXsKCNLPIN2LbGLVo3wKeW2st1Vo6BQYO9qRQZBQOkISZBw5qQFPwB7iZB1OUC8ZA9rCW9lZBLZBmiZCFRS0oQf5nU4uKEcQq1dPgTIyUwtuAs95DLWrZB1oZBv2u1ZCZAZC6ZBjyEcWxaxOWZAuRMbT4EV3TeGHTe4VHk188lQzMZD');
      // } catch(\Facebook\Exceptions\FacebookResponseException $e) {
      //   // When Graph returns an error
      //   echo 'Graph returned an error: ' . $e->getMessage();
      //   exit;
      // } catch(\Facebook\Exceptions\FacebookSDKException $e) {
      //   // When validation fails or other local issues
      //   echo 'Facebook SDK returned an error: ' . $e->getMessage();
      //   exit;
      // }
      //
      // $me = $response->getGraphUser();
      // echo 'Logged in as ' . $me->getName();
      $fb = new \Facebook\Facebook([
        'app_id' => '180780819104546',
        'app_secret' => '217bc574afae3a1eb3768846ad3df464',
        'default_graph_version' => 'v2.8',
        //'default_access_token' => 'EAACka1CBQyIBAEujZCHIcSZBNxrDv0oXsKCNLPIN2LbGLVo3wKeW2st1Vo6BQYO9qRQZBQOkISZBw5qQFPwB7iZB1OUC8ZA9rCW9lZBLZBmiZCFRS0oQf5nU4uKEcQq1dPgTIyUwtuAs95DLWrZB1oZBv2u1ZCZAZC6ZBjyEcWxaxOWZAuRMbT4EV3TeGHTe4VHk188lQzMZD',
        ]);

      $fb->setDefaultAccessToken('EAACka1CBQyIBAEujZCHIcSZBNxrDv0oXsKCNLPIN2LbGLVo3wKeW2st1Vo6BQYO9qRQZBQOkISZBw5qQFPwB7iZB1OUC8ZA9rCW9lZBLZBmiZCFRS0oQf5nU4uKEcQq1dPgTIyUwtuAs95DLWrZB1oZBv2u1ZCZAZC6ZBjyEcWxaxOWZAuRMbT4EV3TeGHTe4VHk188lQzMZD');

      // Example : Get page impression
      $requestPageImpression = $fb->request('GET', '/amadeo.id/insights/page_impressions?since=1483228800&until=1490918400');

      $requestPageImpressionOrganic = $fb->request('GET', 'amadeo.id/insights/page_impressions_organic');

      $requestPageView = $fb->request('GET', 'amadeo.id/insights/page_views_total');

      $requestGenderAge = $fb->request('GET', 'amadeo.id/insights/page_fans_gender_age');

      $requestFanReach = $fb->request('GET', 'amadeo.id/insights/post_fan_reach');

      $requestPageEngagedUser = $fb->request('GET', 'amadeo.id/insights/page_engaged_users');

      $requestPostEngagedFan = $fb->request('GET', 'amadeo.id/insights/post_engaged_fan');

      // Add more variable and API req, according to your list
      // $requestPageStories = $fb->request('GET','....');
      // etc...

      $batch = [
          'page-impression' => $requestPageImpression,
          'page-impression-organic' => $requestPageImpressionOrganic,
          'page-page-view'  => $requestPageView,
          'page-gender-age' => $requestGenderAge,
          'page-fan-reach'  => $requestFanReach,
          'page-engaged_user' => $requestPageEngagedUser,
          'post_engaged_fan'  => $requestPostEngagedFan,
          // add more for your list
          ];

      echo '<h1>Make a batch request</h1>' . "\n\n";

      try {
        $responses = $fb->sendBatchRequest($batch);
        dd($responses);
      } catch(Facebook\Exceptions\FacebookResponseException $e) {
        // When Graph returns an error
        echo 'Graph returned an error: ' . $e->getMessage();
        exit;
      } catch(Facebook\Exceptions\FacebookSDKException $e) {
        // When validation fails or other local issues
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
          echo "<p>(" . $key . ") HTTP status code: " . $response->getHttpStatusCode() . "<br />\n";
          echo "Response: " . $response->getBody() . "</p>\n\n";
          echo "<hr />\n\n";
        }
      }
    }
}
