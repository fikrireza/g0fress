@extends('pages.firstCampaign.layout')

@section('style')
<link rel="stylesheet" type="text/css" href="{{ asset('plugin/select2-4.0.3/css/select2.css') }}" />

<style type="text/css">
.question-wrapper{
	width: 60%;
	height: 100vh;
	margin: 0 auto;
	background-color: rgb(86,187,239);
}
.question-wrapper .person-data-wrapper{
	background-color: rgb(121,206,235);
	padding: 20px 40px;
}
.question-wrapper .person-data-wrapper h1{
	margin: 0;
	margin-bottom: 15px;
    font-family: 'Gotham';
    font-weight: bold;
    font-size: 25px;
}
.question-wrapper .person-data-wrapper .row .col{
	margin-bottom: 10px;
    font-family: 'Gotham-Book';
}
.question-wrapper .person-data-wrapper .row .col .input-group .form-control{
	border-radius: 0;
	height: 30px;
}
.question-wrapper .person-data-wrapper .row .col .input-group .select2{
	border-radius: 0;
	width: 100%;
}
.question-wrapper .person-data-wrapper .row .col .input-group .input-group-addon{
	background-color: rgb(214,50,107);
	border-radius: 0;
	border: 0px;
	position: relative;
}
.question-wrapper .person-data-wrapper .row .col .input-group .input-group-addon:after{
	right: 100%;
	top: 50%;
	border: solid transparent;
	border-color: rgba(196, 41, 52, 0);
	border-right-color: #c42934;
	content: " ";
	height: 0;
	width: 0;
	position: absolute;
	pointer-events: none;
    border-width: 7px;
    margin-top: -7px;
    z-index: 2;
}
.question-wrapper .person-data-wrapper .row .col .input-group .input-group-addon .fa{
	color: white;
}
.question-wrapper .question-content{
	background-color: rgb(86,187,239);
	padding: 20px 40px;
}
.question-wrapper .question-content h1{
	margin: 0;
	margin-bottom: 15px;
    font-family: 'Gotham';
    font-weight: bold;
    font-size: 25px;
}
.question-wrapper .question-content .question{
	margin-bottom: 15px;
}
.question-wrapper .question-content .question label{
	margin-right: 10px;
	margin-bottom: 0px;
	cursor: pointer;
    font-family: 'Gotham';
	font-weight: bold;
}
.question-wrapper .question-content .question p{
    font-family: 'Gotham-Book';
}
.question-wrapper .question-content .question p .warning{
	margin-left: 10px;
	color: red;
    font-family: 'Gotham';
    font-weight: bold;
}
.warning{
	margin-left: 5px;
	color: red;
    font-family: 'Gotham';
}
.question-wrapper .question-content .question input[type="radio"],
.question-wrapper .question-content .question input[type="checkbox"]{
    position: relative;
    top: 2px;
    margin-right: 5px;
}
.question-wrapper .question-content .question .que-4-colm{
	width: 25%;
	padding-right: 20px;
	float: left;
}
.question-wrapper .question-content .question .que-4-colm label{
	display: block;
}
.question-wrapper .question-content .for-btn{
	text-align: center;
	margin-top: 25px;
}
.question-wrapper .question-content .for-btn .btn-costum{
	background-color: rgba(0,0,0,0);
    padding: 5px 20px;
    border: 2px solid rgb(255,255,255);
    color: rgb(255,255,255);
    font-family: 'Gotham';
    font-weight: bold;
    transition: all .51s;
}
.question-wrapper .question-content .for-btn .btn-costum:hover{
	border: 2px solid rgba(255,255,255,.6);
    color: rgba(255,255,255,.6);
}
.question-wrapper .question-content .fb-wrapper{
	width: 80%;
	margin: 0 auto;
	text-align: center;
}
.question-wrapper .question-content .fb-wrapper p{
	font-weight: bold;
	margin-bottom: 2px;
}
@media (max-width: 480px) {
	/* update layout */
	.background-rainbow{
		height: 10vh !important;
		background-position: 100% 100% !important;
	}
	.background-rainbow .background-left img{
		display: none;
	}
	.background-rainbow .background-right img{
		width: 160px !important;
	}
	/* end update layout */

	.question-wrapper{
		width: 100%;
	}
	.question-wrapper .question-content #pertanyaan_2 label{
		display: block;
	}
	.question-wrapper .question-content .question .que-4-colm{
		width: 50%;
		padding-right: 10px;
	}
	input[type="text"]{
		width: 100%;
		box-sizing: border-box;
	     -webkit-box-sizing:border-box;
	     -moz-box-sizing: border-box;
	}
}
</style>
@endsection

@section('content')
<div class="question-wrapper">
	<form action="{{ route('post.first-campaign-pertanyaan-dari-kami') }}" method="POST" >
		{{ csrf_field() }}
		<div class="person-data-wrapper">
			<h1>Detail Anda</h1>
			<div class="row">
				<div class="col col-md-2 col-sm-3 col-xs-4"> Nama </div>
				<div class="col col-md-4 col-sm-9 col-xs-10">
					<div class="input-group">
						<input type="hidden" name="user_id" value="{{ $getProfil->id }}">
						<input type="text" name="nama" class="form-control" value="{{ $getProfil->name }}" readonly="">
						@if($errors->has('nama'))
						<span class="input-group-addon">
							<i class="fa fa-exclamation" aria-hidden="true"></i>
						</span>
						@endif
					</div>
				</div>
				<div class="col col-md-2 col-sm-3 col-xs-4"> No Hp </div>
				<div class="col col-md-4 col-sm-9 col-xs-10">
					<div class="input-group">
						<input type="text" name="hp" class="form-control" value="{{ old('hp') }}">
						@if($errors->has('hp'))
						<span class="input-group-addon">
							<i class="fa fa-exclamation" aria-hidden="true"></i>
						</span>
						@endif
					</div>
				</div>
				<div class="col col-md-2 col-sm-3 col-xs-4"> Email </div>
				<div class="col col-md-4 col-sm-9 col-xs-10">
					<div class="input-group">
						<input type="email" name="email" class="form-control" value="{{ $getProfil->email }}">
						@if($errors->has('email'))
							<span class="input-group-addon">
								<i class="fa fa-exclamation" aria-hidden="true"></i>
							</span>
						@endif
					</div>
					<label class="warning">{{ $errors->first('email')}}</label>
				</div>
				<div class="col col-md-2 col-sm-3 col-xs-4"> Kota </div>
				<div class="col col-md-4 col-sm-9 col-xs-10">
					<div class="input-group">
						<select name="kota" class="form-control select2">
							<option value="--Pilih--">--Pilih--</option>
							@foreach ($getKota as $key)
							<option value="{{ $key->id }}" @if($key->id == old('kota')) selected @endif>{{ $key->nama_kota }}</option>
							@endforeach
						</select>
						@if($errors->has('kota'))
						<span class="input-group-addon">
							<i class="fa fa-exclamation" aria-hidden="true"></i>
						</span>
						@endif
					</div>
				</div>
			</div>
		</div>
		<div class="question-content">
			<h1>Pertanyaan dari kami</h1>

			<div class="question" id="pertanyaan_1">
				<p>1) Situasi apa yang membuat kamu bau mulut? @if($errors->has('pertanyaan_1'))<label class="warning">*Pilih Satu!</label>@endif</p>
				<label>
					<input type="radio" name="pertanyaan_1" value="Setelah Makan" @if(old('pertanyaan_1') == 'Setelah Makan') checked="checked" @endif>Setelah Makan
				</label>
				<label>
					<input type="radio" name="pertanyaan_1" value="Setelah Minum Kopi" @if(old('pertanyaan_1') == 'Setelah Minum Kopi') checked="checked" @endif>Setelah Minum Kopi
				</label>
				<label>
					<input type="radio" name="pertanyaan_1" value="Setelah Merokok" @if(old('pertanyaan_1') == 'Setelah Merokok') checked="checked" @endif>Setelah Merokok
				</label>
			</div>

			<div class="question" id="pertanyaan_2">
				<p>2) Bagaimana cara kamu mengatasi bau mulut? @if($errors->has('pertanyaan_2'))<label class="warning">*Pilih Satu!</label>@endif</p>
				<label>
					<input type="radio" name="pertanyaan_2" value="Sikat Gigi" @if(old('pertanyaan_2') == 'Sikat Gigi') checked="checked" @endif>Sikat gigi
				</label>
				<label>
					<input type="radio" name="pertanyaan_2" value="Berkumur" @if(old('pertanyaan_2') == 'Berkumur') checked="checked" @endif>Berkumur
				</label>
				<label>
					<input type="radio" name="pertanyaan_2" value="Makan Permen" @if(old('pertanyaan_2') == 'Makan Perment') checked="checked" @endif>Makan permen
				</label>
				<label>
					<input type="radio" name="pertanyaan_2" value="Berobat ke dokter" @if(old('pertanyaan_2') == 'Berobat ke dokter') checked="checked" @endif>Berobat ke dokter
				</label>
				<label>
					<input type="radio" name="pertanyaan_2" value="Berobat sendiri sesuai rekomendasi temen" @if(old('pertanyaan_2') == 'Berobat sendiri sesuai rekomendasi temen') checked="checked" @endif>Berobat sendiri sesuai rekomendasi temen
				</label>
			</div>

			<div class="question" id="pertanyaan_3">
				<p>3) Sudah pernah coba Gofress? @if($errors->has('pertanyaan_3'))<label class="warning">*Pilih Satu!</label>@endif</p>
				<label><input type="radio" name="pertanyaan_3" value="Ya" @if(old('pertanyaan_3') == 'Ya') checked="checked" @endif>Ya</label>
				<label><input type="radio" name="pertanyaan_3" value="Belum" @if(old('pertanyaan_3') == 'Belum') checked="checked" @endif>Belum</label>
			</div>

			<div class="question" id="pertanyaan_4">
				<p>4) Tahukah kamu di mana Gofress bisa dibeli? @if($errors->has('pertanyaan_4'))<label class="warning">*Pilih Minimal Satu!</label>@endif</p>
				<div class="que-4-colm">
					<label>
						<input type="checkbox" name="pertanyaan_4[Indomaret]" value="Indomaret" @if(is_array(old('pertanyaan_4')) && in_array('Indomaret',old('pertanyaan_4'))) checked @endif>Indomaret
					</label>
					<label>
						<input type="checkbox" name="pertanyaan_4[Superindo]" value="Superindo" @if(is_array(old('pertanyaan_4')) && in_array('Superindo',old('pertanyaan_4'))) checked @endif>Superindo
					</label>
					<label>
						<input type="checkbox" name="pertanyaan_4[Hero]" value="Hero" @if(is_array(old('pertanyaan_4')) && in_array('Hero',old('pertanyaan_4'))) checked @endif>Hero
					</label>
				</div>
				<div class="que-4-colm">
					<label>
						<input type="checkbox" name="pertanyaan_4[Alfamart]" value="Alfamart" @if(is_array(old('pertanyaan_4')) && in_array('Alfamart',old('pertanyaan_4'))) checked @endif>Alfamart
					</label>
					<label>
						<input type="checkbox" name="pertanyaan_4[Alfamidi]" value="Alfamidi" @if(is_array(old('pertanyaan_4')) && in_array('Alfamidi',old('pertanyaan_4'))) checked @endif>Alfamidi
					</label>
					<label>
						<input type="checkbox" name="pertanyaan_4[Century]" value="Century" @if(is_array(old('pertanyaan_4')) && in_array('Century',old('pertanyaan_4'))) checked @endif>Century
					</label>
				</div>
				<div class="que-4-colm">
					<label>
						<input type="checkbox" name="pertanyaan_4[Giant]" value="Giant" @if(is_array(old('pertanyaan_4')) && in_array('Giant',old('pertanyaan_4'))) checked @endif>Giant
					</label>
					<label>
						<input type="checkbox" name="pertanyaan_4[Circle K]" value="Circle K" @if(is_array(old('pertanyaan_4')) && in_array('Circle K',old('pertanyaan_4'))) checked @endif>Circle K
					</label>
					<label>
						<input type="checkbox" name="pertanyaan_4[Guradian]" value="Guradian" @if(is_array(old('pertanyaan_4')) && in_array('Guradian',old('pertanyaan_4'))) checked @endif>Guradian
					</label>
				</div>
				<div class="que-4-colm">
					<label>
						<input type="checkbox" name="pertanyaan_4[Hypermart]" value="Hypermart" @if(is_array(old('pertanyaan_4')) && in_array('Hypermart',old('pertanyaan_4'))) checked @endif>Hypermart
					</label>
					<label>
						<input type="checkbox" name="pertanyaan_4[Yogya]" value="Yogya" @if(is_array(old('pertanyaan_4')) && in_array('Yogya',old('pertanyaan_4'))) checked @endif>Yogya
					</label>
				</div>
				<div class="clearfix"></div>
			</div>

			<div class="fb-wrapper">
				<p>Like Our Fanpage</p>
				<div class="fb-like" data-href="https://www.facebook.com/Gofress/" data-layout="button" data-action="like" data-size="small" data-show-faces="false" data-share="false"></div>
			</div>

			<div class="for-btn">
				<input type="reset" name="Reset" class="btn-costum" value="Reset">
				<input type="Submit" name="Submit" class="btn-costum" value="Submit">
			</div>
		</div>
	</form>
</div>

@endsection

@section('script')
	<script src="{{ asset ('plugin/select2-4.0.3/js/select2.js') }}"></script>

	<script type="text/javascript">
	$(document).ready(function() {
	  $(".select2").select2();
	});
	</script>

	<div id="fb-root"></div>
	<script>(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = "//connect.facebook.net/id_ID/sdk.js#xfbml=1&version=v2.9&appId=1260971250637650";
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>
@endsection
