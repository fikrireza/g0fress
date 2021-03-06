@extends('pages.firstCampaign.layout')

@section('style')
<link rel="stylesheet" type="text/css" href="{{ asset('plugin/bootstrap-3.3.7/css/bootstrap-social.css') }}" />

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
	font-size: 47px;
	margin: 10px auto;
	font-family: 'Gotham';
    font-weight: bold;
}
.thanks-wrapper .thanks-body{
	width: 50%;
	padding: 15px 0px;
	margin: 0 auto;
	text-align: center;
}
.thanks-wrapper .thanks-body label{
    font-family: 'Gotham';
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
.thanks-wrapper .thanks-body .for-mobile{
	display: none;
}
.thanks-wrapper .thanks-body .link-wrapper label{
	text-align: center;
	color: black;
	font-size: 12px;
	margin-bottom: 0px;
	margin-right: 5px;
    font-family: 'Gotham';
    font-weight: normal;
}
.thanks-wrapper .thanks-body .link-wrapper label a{
	color: black;
	margin: 0;
}
.thanks-wrapper .thanks-body .link-wrapper label a img{
	width: 15px;
}

.thanks-wrapper .thanks-body .link-wrapper {
	color: white;
	text-align: center;
}

@media (max-width: 480px) {
	/* update layout */
	.background-rainbow{
		display: none;
	}
	.background-rainbow .background-left img{
		display: none;
	}
	.background-rainbow .background-right img{
		display: none;
	}
	/* end update layout */

	.thanks-wrapper{
		width: 100%;
	}
	.thanks-wrapper .thanks-head{
		padding: 5px 0px;
	}
	.thanks-wrapper .thanks-head h1{
		font-size: 50px;
	}
	.thanks-wrapper .thanks-body{
		width: 80%;
	}
	.thanks-wrapper .thanks-body .kupon-wrapper .kupon-code{
		bottom: 48px;
	}
	.thanks-wrapper .thanks-body .for-mobile{
		display: block;
	}
	.thanks-wrapper .thanks-body .link-wrapper{
		text-align: center;
	}
	.thanks-wrapper .thanks-body .link-wrapper .link-2{
		display: none;
	}
}
</style>
@endsection

@section('content')
<div class="thanks-wrapper">
	<div class="thanks-head">
		<h1>Terima Kasih!</h1>
	</div>
	<div class="thanks-body">
		<label>Silahkan Screenshot Kupon dibawah ini dan <br>Tunjukkan di <img class="logo-alfamart" src="{{ asset('picture\firstCampaign\logo-alfamart.png') }}"> <br />
		Untuk mendapatkan 1 PCS  Gofress Gratis !</label>

		<div class="kupon-wrapper">
			<img class="kupon-image" src="{{ asset('picture\firstCampaign\kupon.png') }}">
			<div class="kupon-code">
				<label>{{ $cekEmail->kupon}}</label>
			</div>
		</div>

		<div class="link-wrapper">
			<label class="link-1">
				<a href="{{ url('hello/syarat-ketentuan') }}">
					<img src="{{ asset('picture\firstCampaign\icon-Ketentuan-&-Persyaratan.png') }}">
					Ketentuan & Persyaratan
				</a>
			</label>
			<br>
			<!--<label class="link-3">
					Kami juga telah mengirimkan KUPON ini ke email mu.
			</label>-->
			<br>
			<label class="link-2">
				Kembali ke <a href="http://facebook.com" target="_blank" class="btn btn-sm btn-social btn-facebook">
					<span class="fa fa-facebook"></span>Facebook
				</a>
			</label>
		</div>
	</div>
</div>
@endsection

@section('script')

@endsection
