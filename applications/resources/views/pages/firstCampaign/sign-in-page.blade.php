@extends('pages.firstCampaign.layout')

@section('style')
<link rel="stylesheet" type="text/css" href="{{ asset('plugin/bootstrap-3.3.7/css/bootstrap-social.css') }}" />

<style type="text/css">
.wrapper-content{
	position: relative; 
	width: 100%; 
	height: 100vh; 
	display: table;
}
.wrapper-content .middle-window{
	width: 100%; 
	height: 100vh; 
	display: table-cell; 
	vertical-align: middle;
}
.sign-in-wrapper{
	float: right; 
	width: 400px; 
	background-color: rgb(212,29,125);
	padding: 20px 10px;
	box-shadow: -7px 10px rgb(255,238,64);
}
.sign-in-wrapper .sign-in-content{
	padding-left: 5px;
	width: 350px; 
	text-align: center;
}
.sign-in-wrapper .sign-in-content h1{
	color: white;
	font-size: 30px;
	margin: 0px;
}
.sign-in-wrapper .sign-in-content .btn-facebook{
	margin-top: 20px;
	margin-left: auto;
	margin-right: auto;
	width: 200px; 
}
</style>
@endsection

@section('content')
<div class="wrapper-content">
	<div class="middle-window">
		<div class="sign-in-wrapper">
			<div class="sign-in-content">
				<h1>Hai, selamat datang!</h1>
				<h1>ayo disign-in dulu!</h1>
				<a class="btn btn-block btn-social btn-facebook" href="{{ route('first-campaign-pertanyaan-dari-kami') }}">
		        	<span class="fa fa-facebook"></span> Sign in with Facebook
		        </a>
			</div>
		</div>
	</div>
</div>

@endsection
