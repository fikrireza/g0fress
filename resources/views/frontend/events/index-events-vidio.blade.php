@extends('frontend._layouts.basic')

@section('head-title')
<title>Gofress - Program Events</title>
@endsection

@section('meta')
<meta name="title" content="Gofress - Program Events">
	@if($callAbout != null)
<meta name="description" content="Gofress - {{ strip_tags(Str::words($callAbout->deskripsi, 40)) }}">
	@endif
<meta name="keywords" content="Gofress, Permen Tipis, Candy" />
@endsection

@section('head-style')
<link rel="stylesheet" type="text/css" href="{{ mix('amadeo/css/mix/event-index-vidio.css') }}">
@endsection

@section('body-content')

<div class="wrapper-banner">
	<div class="banner" style="background-image: url(' {{ asset($forBanner) }}');">
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
					<label class="flag-title">
						@lang('front/publict.vidio')
					</label>
				</div>
				<div class="vertical-align-midle">
					<label class="circle-shape right"></label>
					<label class="circle-shape right"></label>
				</div>
			</div>
		</div>

		<div class="wrapper-vidio">
			@include('frontend.events.ajax-events-vidio-list')

			<div id="appendNext">
			</div>

			<div class="clearfix"></div>
			<div class="ajax-load text-center" style="display:none;">
				<p>
					<img src="http://demo.itsolutionstuff.com/plugin/loader.gif">Loading More post
				</p>
			</div>

		</div>

		<div class="for-btn-see-more">
			<a id="callNext" class="btn-see-more">
				@lang('front/publict.load-more')
			</a>
		</div>

		<div class="clearfix"></div>
	</div>
</div>

<div class="background-content background-content-first for-share-wrapper">
	<div class="content-wrapper">
		@include('frontend._include.share-on-social')
	</div>
</div>

@include('frontend.events.vidio-show')
@endsection

@section('footer-script')
<script src="{{ mix('amadeo/js/mix/event-index-vidio.js') }}"></script>
<script type="text/javascript">
	var page = 1;
	$("#callNext").click(function(){
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
		            $('#callNext').hide();
	                return;
	            }
	            $('.ajax-load').hide();
	            $("#appendNext").append(data.html);
	        })
	        .fail(function(jqXHR, ajaxOptions, thrownError)
	        {
	              alert('server not responding...');
	        });
	}
</script>
@endsection
