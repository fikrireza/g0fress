@extends('backend.layout.master')

@section('title')
  <title>Gofress | Dashboard</title>
@endsection

@section('headscript')
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

<hr>

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
        <h2>Periode</h2>
        <ul class="nav navbar-right panel_toolbox">
          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <div id=""></div>
      </div>
    </div>
  </div>

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

  <div class="col-md-12 col-sm-12 col-xs-12">
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

@endsection

@section('script')
  @include('backend.dashboard.include-js')
@endsection
