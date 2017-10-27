@extends('backend.layout.master')

@section('title')
  <title>Gofress | Dashboard</title>
@endsection

@section('headscript')
<link href="{{ asset('backend/vendors/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet">

<script src="{{ asset('backend/vendors/Chart.js/dist/Chart.min.js')}}"></script>
@endsection


@section('content')

@if(Session::has('firstLogin'))
<script>
  window.setTimeout(function() {
    $(".alert-success").fadeTo(700, 0).slideUp(700, function(){
        $(this).remove();
    });
  }, 5000);
</script>
<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="alert alert-success alert-dismissible fade in" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
      </button>
      <strong>{{ Session::get('firstLogin') }}</strong>
    </div>
  </div>
</div>
@endif

<div class="row">
  <div class="page-title">
    <div class="title_left">
      <h3>Google <small>Website Analytics</small></h3>
    </div>
  </div>
</div>

<div class="row">

  <div class="col-md-4 col-sm-4 col-xs-4">
    <div class="x_panel">
      <div class="x_title">
        <h2>Bounce Rate</h2>
        <ul class="nav navbar-right panel_toolbox">
          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <div id="wrapper-bounceRate"></div>
      </div>
    </div>
  </div>

  <div class="col-md-4 col-sm-4 col-xs-4">
    <div class="x_panel">
      <div class="x_title">
        <h2>Avg. Session Duration</h2>
        <ul class="nav navbar-right panel_toolbox">
          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <div id="wrapper-avgSessionDuration"></div>
      </div>
    </div>
  </div>

  <div class="col-md-4 col-sm-4 col-xs-4">
    <div class="x_panel">
      <div class="x_title">
        <h2>Periode</h2>
        <ul class="nav navbar-right panel_toolbox">
          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <button type="button" class="btn btn-default pull-right" id="periode_GA">
          <span>
            <i class="fa fa-calendar"></i> Select Date Range
          </span>
          <i class="fa fa-caret-down"></i>
        </button>

      </div>
    </div>
  </div>


  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Most Visited Pages</h2>
        <ul class="nav navbar-right panel_toolbox">
          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <canvas id="chartMostVisitedPages"></canvas>
      </div>
    </div>
  </div>

  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Visitor Website</h2>
        <ul class="nav navbar-right panel_toolbox">
          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <canvas id="chartVisitorWebsite"></canvas>
      </div>
    </div>
  </div>

  <div id="wrapper_chartUserVisited" class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>User Visited</h2>
        <ul class="nav navbar-right panel_toolbox">
          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <canvas id="chartUserVisited"></canvas>
      </div>
    </div>
  </div>

  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>City Visited</h2>
        <ul class="nav navbar-right panel_toolbox">
          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <canvas id="chartCityVisited"></canvas>
      </div>
    </div>
  </div>

  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Search Result</h2>
        <ul class="nav navbar-right panel_toolbox">
          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <canvas id="chartSearchResult"></canvas>
      </div>
    </div>
  </div>

  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Top Browsers</h2>
        <ul class="nav navbar-right panel_toolbox">
          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <canvas id="chartTopBrowsers"></canvas>
      </div>
    </div>
  </div>

</div>

<hr>

<div class="row">
  <div class="page-title">
    <div class="title_left">
      <h3>Facebook <small>Fanpage Analytics</small></h3>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-6 col-sm-6 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Chart Page Impression</h2>
        <ul class="nav navbar-right panel_toolbox">
          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <canvas id="chartPageImpression"></canvas>
          <div style="text-align: center;">
            <label>
              <a id="pagingImpressionPrev" onclick="pagingImpression(this)">Prev</a>
            </label>
            <label>
              <a id="pagingImpressionNext" onclick="pagingImpression(this)">Next</a>
            </label>
          </div>
      </div>
    </div>
  </div>

  <div class="col-md-6 col-sm-6 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Chart Page Impression Organic</h2>
        <ul class="nav navbar-right panel_toolbox">
          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <canvas id="chartPageImpressionOrganic"></canvas>
          <div style="text-align: center;">
            <label>
              <a id="pagingImpressionOrganicPrev" onclick="pagingImpressionOrganic(this)">Prev</a>
            </label>
            <label>
              <a id="pagingImpressionOrganicNext" onclick="pagingImpressionOrganic(this)">Next</a>
            </label>
          </div>
      </div>
    </div>
  </div>

  <div class="col-md-6 col-sm-6 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Chart Page View</h2>
        <ul class="nav navbar-right panel_toolbox">
          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <canvas id="chartPageView"></canvas>
          <div style="text-align: center;">
            <label>
              <a id="pagingPageViewPrev" onclick="pagingPageView(this)">Prev</a>
            </label>
            <label>
              <a id="pagingPageViewNext" onclick="pagingPageView(this)">Next</a>
            </label>
          </div>
      </div>
    </div>
  </div>

  <div class="col-md-6 col-sm-6 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Chart Engaged User</h2>
        <ul class="nav navbar-right panel_toolbox">
          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <canvas id="chartEngagedUser"></canvas>
          <div style="text-align: center;">
            <label>
              <a id="pagingEngagedUserPrev" onclick="pagingEngagedUser(this)">Prev</a>
            </label>
            <label>
              <a id="pagingEngagedUserNext" onclick="pagingEngagedUser(this)">Next</a>
            </label>
          </div>
      </div>
    </div>
  </div>

</div>

@endsection

@section('script')
  @include('backend.dashboard.include-js')

  <script src="{{ asset('backend/vendors/moment/min/moment.min.js') }}"></script>
  <script src="{{ asset('backend/vendors/bootstrap-daterangepicker/daterangepicker.js') }}"></script>

  <script type="text/javascript">
  $('#periode_GA').daterangepicker(
  {
    ranges: {
      'Today': [moment(), moment()],
      'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
      'Last 7 Days': [moment().subtract(6, 'days'), moment()],
      'Last 30 Days': [moment().subtract(29, 'days'), moment()],
      'This Month': [moment().startOf('month'), moment().endOf('month')],
      'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
    },
    startDate: moment().subtract(29, 'days'),
    endDate: moment()
  },
  function (start, end) {

    $('#periode_GA span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));

    var urlPeriod =  "{{ route('analytics.getGA') }}/" + start.format('MMMM D, YYYY') + "/" + end.format('MMMM D, YYYY');

    $.getJSON(urlPeriod, function (json) {

        // for MostVisitedPages
          var captionVarMVP = new Array();
          json.MostVisitedPages.map(function(item) {
            captionVarMVP.push(item.pageTitle + ' : ' + item.url);
          });

          var captionValMVP = new Array();
          json.MostVisitedPages.map(function(item) {
            captionValMVP.push(item.pageViews);
          });

          $('#chartMostVisitedPages').replaceWith('<canvas id="chartMostVisitedPages"></canvas>');

          var cMVP = document.getElementById("chartMostVisitedPages");
          var barChartMostVisitedPages = new Chart(cMVP, {
              type: 'horizontalBar',
              data: {
                labels: captionVarMVP,
                datasets: [
                    {
                      label: "Visited Pages",
                      data: eval(captionValMVP),
                      backgroundColor : "rgba(255,0,0,.5)"
                    }
                  ]
              }
          });
        // end for MostVisitedPages

        // for TopBrowsers
          var captionVarTB = new Array();
          json.TopBrowsers.map(function(item) {
            captionVarTB.push(item.browser);
          });

          var captionValTB = new Array();
          json.TopBrowsers.map(function(item) {
            captionValTB.push(item.sessions);
          });

          $('#chartTopBrowsers').replaceWith('<canvas id="chartTopBrowsers"></canvas>');

          var cTB = document.getElementById("chartTopBrowsers");
          var barChartTopBrowsers = new Chart(cTB, {
              type: 'horizontalBar',
              data: {
                labels: captionVarTB,
                datasets: [
                    {
                      label: "Top Browsers",
                      data: eval(captionValTB),
                      backgroundColor : "rgba(255,0,0,.5)"
                    }
                  ]
              }
          });
        // end for TopBrowsers

        // for chartSearchResult
          var captionVarSR = new Array();
          var captionVaLSR = new Array();
          var intConfert = 1;

          $.each(json.organicSearchesSOSMed, function () {
            $.each(this, function (name, value) {
              if (intConfert%2 != 0) {
                if(value === "(not set)"){
                  value = "Organic Searches";
                }
                captionVarSR.push(value);
              }
              if (intConfert%2 == 0) {
                captionVaLSR.push(value);
              }
              intConfert = intConfert + 1;
            });
          });
          var intConfert = 1;
          $.each(json.organicSearchesCamp, function () {
            $.each(this, function (name, value) {
              if(intConfert != 1 && intConfert != 2 ){
                if (intConfert%2 != 0) {
                  captionVarSR.push(value);
                }
                if (intConfert%2 == 0) {
                  captionVaLSR.push(value);
                }
              }
              intConfert = intConfert + 1;
            });
          });

          $('#chartSearchResult').replaceWith('<canvas id="chartSearchResult"></canvas>');
          
          var cSR = document.getElementById("chartSearchResult");
          var barChartSearchResult = new Chart(cSR, {
              type: 'horizontalBar',
              data: {
                labels: captionVarSR,
                datasets: [
                    {
                      label: "Search Result",
                      data: eval(captionVaLSR),
                      backgroundColor : "rgba(255,0,0,.5)"
                    }
                  ]
              }
          });
        // end for chartSearchResult

        // for CityVisited
          var captionVarCV = new Array();
          var captionValCV = new Array();
          var intConfert = 1;
          $.each(json.CityVisited, function () {
            $.each(this, function (name, value) {
              if (intConfert%2 != 0) {
                captionVarCV.push(value);
              }
              if (intConfert%2 == 0) {
                if (value > 40) {
                  captionValCV.push(value);
                }
                else if(value < 40){
                  captionVarCV.splice(-1,1);
                }
              }
              intConfert = intConfert + 1;
            });
          });

          $('#chartCityVisited').replaceWith('<canvas id="chartCityVisited"></canvas>');

          var cCV = document.getElementById("chartCityVisited");
          var barChartCityVisited = new Chart(cCV, {
              type: 'bar',
              data: {
                labels: captionVarCV,
                datasets: [
                    {
                      label: "City Visited",
                      data: eval(captionValCV),
                      backgroundColor : "rgba(255,0,0,.5)"
                    }
                  ]
              }
          });
        // end for CityVisited

        // for userVisited
          var captionVarUV = new Array();
          var captionValUVF = new Array();
          var captionValUVM = new Array();
          var safeGender = "";
          var intConfert = 1;
          $.each(json.userVisited, function () {
            $.each(this, function (name, value) {
              if (intConfert%2 == 0) {
                if ( $.inArray( value, captionVarUV ) > -1 ){
                  // this value alredy in array
                }
                else{
                  captionVarUV.push(value);
                }
              }
              if (intConfert%3 == 0) {
                if (safeGender == "female") {
                  captionValUVF.push(value);
                }
                if (safeGender == "male") {
                  captionValUVM.push(value);
                }
              }
              if (intConfert%2 != 0) {
                safeGender = value;
              }
              intConfert = intConfert + 1;
            });
            intConfert = 1;
          });

          $('#chartUserVisited').replaceWith('<canvas id="chartUserVisited"></canvas>');

          var cUV = document.getElementById("chartUserVisited");
          var barChartUserVisited = new Chart(cUV, {
              type: 'bar',
              data: {
                labels: captionVarUV,
                datasets: [
                    {
                      label: "Female",
                      data: eval(captionValUVF),
                      backgroundColor : "rgba(255,0,0,.5)"
                    },
                    {
                      label: "Male",
                      data: eval(captionValUVM),
                      backgroundColor : "rgba(0,0,255,.5)"
                    }
                  ]
              }
          });
        // end for userVisited

        // for VisitorWebsite
          var captionVarVW = new Array();
          var captionValVW = new Array();
          var intConfert = 1;
          $.each(json.VisitorWebsite, function () {
            $.each(this, function (name, value) {
              if (intConfert%2 != 0) {
                captionVarVW.push(parse(value));
              }
              if (intConfert%2 == 0) {
                captionValVW.push(value);
              }
              intConfert = intConfert + 1;
            });
          });

          $('#chartVisitorWebsite').replaceWith('<canvas id="chartVisitorWebsite"></canvas>');

          var cVW = document.getElementById("chartVisitorWebsite");
          var lineChartVisitorWebsite = new Chart(cVW, {
              type: 'line',
              data: {
                labels: captionVarVW,
                datasets: [
                    {
                      label: "Visitor Website",
                      data: eval(captionValVW),
                      backgroundColor : "rgba(255,0,0,.5)"
                    }
                  ]
              }
          });
        // end for VisitorWebsite

        var echoBounceRate = "";
        var echoAvgSessionDuration = "";
        $.each(json.bounceRate, function () {
          $.each(this, function (name, value) {
            echoBounceRate = Math.ceil(value) + '%';
          });
        });
            $("#wrapper-bounceRate").text(echoBounceRate);

        $.each(json.avgSessionDuration, function () {
          $.each(this, function (name, value) {
            echoAvgSessionDuration = value.toHHMMSS();
          });
        });
            $("#wrapper-avgSessionDuration").text(echoAvgSessionDuration);

    });
  });
  </script>
@endsection
