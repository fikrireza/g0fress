@extends('frontend._layouts.basic')

@section('head-title')
<title>Go Fress - Program Events</title>
@endsection

@section('head-style')
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/public-sub-page.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/events-public.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/events-list-item-normal-not-owl.css') }}">

@endsection

@section('body-content')

<div class="wrapper-banner">
	<div class="banner" style="background-image: url(' {{ asset('picture/firstCampaign/background-rainbow.png') }}');">
		
	</div>
</div>

<div class="background-content background-content-second">
	<div class="content-wrapper">

		<div class="title-background">
			<div class="flag-title-wrapper white">
				<div class="vertical-align-midle">
					<label class="circle-shape left"></label>
					<label class="circle-shape left"></label>
				</div>
				<div class="vertical-align-midle">
					<label class="flag-title">Program & Events</label>
				</div>
				<div class="vertical-align-midle">
					<label class="circle-shape right"></label>
					<label class="circle-shape right"></label>
				</div>
			</div>
		</div>
		<div class="wrapper-events-list">
			@include('frontend.events.ajax-events-list')
			
			<div id="appendNextProgramEvent">
			</div>

			<div class="clearfix"></div>
			<div class="ajax-load text-center" style="display:none;">
				<p>
					<img src="http://demo.itsolutionstuff.com/plugin/loader.gif">Loading More post
				</p>
			</div>

		</div>

		<div class="for-btn-see-more">
			<a id="callNextProgramEvent" class="btn-see-more">
				load more
			</a>
		</div>

		<div class="clearfix"></div>
	</div>
</div>


<div class="background-content background-content-first for-share-wrapper">
	<div class="content-wrapper">
		<div class="wrapper-titlepper-share">
			<div class="flag-title-wrapper color costume-light-blue">
				<div class="vertical-align-midle">
					<label class="circle-shape left"></label>
					<label class="circle-shape left"></label>
				</div>
				<div class="vertical-align-midle">
					<label class="flag-title">Share With Your Friend!</label>
				</div>
				<div class="vertical-align-midle">
					<label class="circle-shape right"></label>
					<label class="circle-shape right"></label>
				</div>
			</div>
		</div>
		<div class="wrapper-share">
			<img src="{{ asset('public/image/default/socmed-logo-fb.png') }}">
			<img src="{{ asset('public/image/default/socmed-logo-twit.png') }}">
			<img src="{{ asset('public/image/default/socmed-logo-insta.png') }}">
		</div>
	</div>
</div>

@endsection

@section('footer-script')
<script src="{{ asset('plugin/bootstrap-3.3.7/js/bootstrap.min.js') }}"></script>

<script type="text/javascript">
	var page = 1;
	$("#callNextProgramEvent").click(function(){
	    page++;
	        loadMoreData(page);
	});

	function loadMoreData(page){
	  $.ajax(
	        {
	            url: '?page=' + page,
	            type: "get",
	            beforeSend: function()
	            {
	                $('.ajax-load').show();
	            }
	        })
	        .done(function(data)
	        {
	            if(!data.html){
	                $('.ajax-load').hide();
		            $('#callNextProgramEvent').hide();
	                return;
	            }
	            $('.ajax-load').hide();
	            $("#appendNextProgramEvent").append(data.html);
	        })
	        .fail(function(jqXHR, ajaxOptions, thrownError)
	        {
	              alert('server not responding...');
	        });
	}
</script>
@endsection
