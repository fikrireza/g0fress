@extends('pages.firstCampaign.layout')

@section('style')
<style type="text/css">
.thanks-wrapper{
	width: 60%;
	height: 100vh;
	margin: 0 auto;
	background-color: rgb(255,255,255);
}
.thanks-wrapper .thanks-head{
	background-color: rgb(208,26,117);
	padding: 5px 40px;
	text-align: center;
}
.thanks-wrapper .thanks-head h1{
	color: white;
	font-size: 55px;
	margin: 10px auto;
}
.thanks-wrapper .thanks-body{
	width: 50%;
	padding: 15px 0px;
	margin: 0 auto;
}
.thanks-wrapper .thanks-body label .logo-alfamart{
	width: 120px;
}
.thanks-wrapper .thanks-body .kupon-wrapper{
	position: relative;
	margin-top: 10px;
	margin-bottom: -10px;
	padding: 0;
}
.thanks-wrapper .thanks-body .kupon-wrapper .kupon-image{
	width: 100%;
}
.thanks-wrapper .thanks-body .kupon-wrapper .kupon-code{
	position: relative;
	bottom: 58px;
	width: 50%;
	margin: 0 auto;
	text-align: center;
}
.thanks-wrapper .thanks-body .kupon-wrapper .kupon-code label{
	margin: 0;
}
.thanks-wrapper .thanks-body .link-wrapper label{
	color: black;
	font-size: 12px;
	margin-bottom: 0px;
	margin-right: 5px;
}
.thanks-wrapper .thanks-body .link-wrapper label a{
	color: black;
	margin: 0;
}
.thanks-wrapper .thanks-body .link-wrapper label a img{
	width: 15px;
}
</style>
@endsection

@section('content')
<div class="thanks-wrapper">
	<div class="thanks-head">
		<h1>Terima Kasih!</h1>
	</div>
	<div class="thanks-body">
		<label>Sebagai apresiasi kami, Anda berhak untuk mendapatkan 1 kemasan Gofress gratis dari kami.<br>Tunjukkan kupon dibawah ini di <img class="logo-alfamart" src="{{ asset('picture\firstCampaign\logo-alfamart.png') }}"></label>

		<div class="kupon-wrapper">
			<img class="kupon-image" src="{{ asset('picture\firstCampaign\kupon.png') }}">
			<div class="kupon-code">
				<label>{{ $cekEmail->kupon}}</label>
			</div>
		</div>

		<div class="link-wrapper">
			<label>
				<a href="">
					<img src="{{ asset('picture\firstCampaign\icon-Ketentuan-&-Persyaratan.png') }}">
					Ketentuan & Persyaratan
				</a>
			</label>
			<label>
				<a href="">
					<img src="{{ asset('picture\firstCampaign\icon-Simpan-Gambar.png') }}">
					Simpan Gambar
				</a>
			</label>
			<label>
				<a href="">
					<img src="{{ asset('picture\firstCampaign\icon-Print-Gambar.png') }}">
					Print Gambar
				</a>
			</label>
		</div>
	</div>
</div>
@endsection

@section('script')

@endsection
