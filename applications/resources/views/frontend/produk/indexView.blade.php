@extends('frontend._layouts.basic')

@section('head-title')
<title>Go Fress - Produk</title>
@endsection

@section('head-style')
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/public-sub-page.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/for-share-wrapper.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/produk-view.css') }}">

@endsection

@section('body-content')

<div class="wrapper-banner">
	<div class="banner" style="background-image: url(' {{ asset('picture/firstCampaign/background-rainbow.png') }}');">
		
	</div>
</div>

<div class="background-content background-content-first">
	<div class="content-wrapper">

		<div class="title-background">
			<div class="flag-title-wrapper color">
				<div class="vertical-align-midle">
					<label class="circle-shape left"></label>
					<label class="circle-shape left"></label>
				</div>
				<div class="vertical-align-midle">
					<label class="flag-title">{{ $callProduk[0]['nama_kategori'] }}</label>
				</div>
				<div class="vertical-align-midle">
					<label class="circle-shape right"></label>
					<label class="circle-shape right"></label>
				</div>
			</div>
		</div>

		<div class="produk-view-wrapper">
			<div class="row">
				@foreach($callProduk as $list)
				<div class="col-md-4">
					<div class="produk-item">
						<img class="produk-ditail" src="{{ asset('images/produk/'.$list->img_url_produk) }}" alt="{{ $list->img_alt_produk }}" data-target="{{ route('frontend.produk.callData', ['id'=>$list->id_produk]) }}">
					</div>
				</div>
				@endforeach
			</div>
		</div>

		<div class="clearfix"></div>
	</div>
</div>

<div id="thisLoadData" class="wrapper-for-detail-produk">
</div>

<div class="background-content background-content-first for-share-wrapper">
	<div class="content-wrapper">
		@include('frontend._include.share-on-social')
	</div>
</div>

@endsection

@section('footer-script')
<script src="{{ asset('plugin/bootstrap-3.3.7/js/bootstrap.min.js') }}"></script>

<script type="text/javascript">
	$(".produk-ditail").click(function(){
			var dataTarget =$(this).attr("data-target");
			// alert(dataTarget);

	        loadData(dataTarget);
	});

	function loadData(dataTarget){

	  $.ajax(
	        {
	            url: dataTarget,
	            type: "get",
	            // beforeSend: function()
	            // {
	            //     $('.ajax-load').show();
	            // }
	        })
	        .done(function(data)
	        {
	            // if(!data.html){
	            //     $('.ajax-load').hide();
		           //  $('#callNextProgramEvent').hide();
	            //     return;
	            // }
	            $("#thisLoadData").html(data.html);
	        })
	        .fail(function(jqXHR, ajaxOptions, thrownError)
	        {
	              alert('server not responding...');
	        });
	}
</script>
@endsection

