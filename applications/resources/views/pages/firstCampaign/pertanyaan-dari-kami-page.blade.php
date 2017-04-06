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
	margin-bottom: 10px;
}
.question-wrapper .person-data-wrapper .row .col{
	margin-bottom: 10px;
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
	margin-bottom: 10px;
}
.question-wrapper .question-content .question{
	margin-bottom: 10px;
}
.question-wrapper .question-content .question label{
	margin-right: 10px;
	margin-bottom: 0px;
	cursor: pointer;
}
.question-wrapper .question-content .question p .warning{
	margin-left: 10px;
	color: red;
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
    transition: all .51s;
}
.question-wrapper .question-content .for-btn .btn-costum:hover{
	border: 2px solid rgba(255,255,255,.6);
    color: rgba(255,255,255,.6);
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
				<div class="col col-md-2"> Nama </div>
				<div class="col col-md-4">
					<div class="input-group">
						<input type="text" name="nama" class="form-control" value="{{ $getProfil->name}}" readonly="">
						@if($errors->has('nama'))
						<span class="input-group-addon">
							<i class="fa fa-exclamation" aria-hidden="true"></i>
						</span>
						@endif
					</div>
				</div>
				<div class="col col-md-2"> No Hp </div>
				<div class="col col-md-4">
					<div class="input-group">
						<input type="text" name="hp" class="form-control" value="{{ old('hp') }}">
						@if($errors->has('hp'))
						<span class="input-group-addon">
							<i class="fa fa-exclamation" aria-hidden="true"></i>
						</span>
						@endif
					</div>
				</div>
				<div class="col col-md-2"> Email </div>
				<div class="col col-md-4">
					<div class="input-group">
						<input type="email" name="email" class="form-control" value="{{ $getProfil->email }}" readonly="">
						@if($errors->has('email'))
						<span class="input-group-addon">
							<i class="fa fa-exclamation" aria-hidden="true"></i>
						</span>
						@endif
					</div>
				</div>
				<div class="col col-md-2"> Kota </div>
				<div class="col col-md-4">
					<div class="input-group">
						<select name="kota" class="form-control select2">
							<option value="--Pilih--">--Pilih--</option>
							@foreach ($getKota as $key)
							<option value="{{ $key->id }}" @if($key->id == old('kota')) selected @endif>{{ $key->nama_kota }}</option>
							@endforeach
						</select>
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
					<input type="radio" name="pertanyaan_2" value="Sikat Gigi" @if(old('pertanyaan_2') == 'Sikat Gigi') checked="checked" @endif>Sikat Gigi
				</label>
				<label>
					<input type="radio" name="pertanyaan_2" value="Berkumur" @if(old('pertanyaan_2') == 'Berkumur') checked="checked" @endif>Berkumur
				</label>
				<label>
					<input type="radio" name="pertanyaan_2" value="Makan Perment" @if(old('pertanyaan_2') == 'Makan Perment') checked="checked" @endif>Makan Perment
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
				<input type="radio" name="pertanyaan_3" value="Ya" @if(old('pertanyaan_3') == 'Ya') checked="checked" @endif><label>Ya</label>
				<input type="radio" name="pertanyaan_3" value="Belum" @if(old('pertanyaan_3') == 'Belum') checked="checked" @endif><label>Belum</label>
			</div>

			<div class="question" id="pertanyaan_4">
				<p>4) Tahukah kamu di mana Gofress bisa dibeli? @if($errors->has('pertanyaan_4'))<label class="warning">*Pilih Minimal Satu!</label>@endif</p>
				<div class="que-4-colm">
					<label>
						<input type="checkbox" name="pertanyaan_4[]" value="Indomaret">Indomaret
					</label>
					<label>
						<input type="checkbox" name="pertanyaan_4[]" value="Superindo">Superindo
					</label>
					<label>
						<input type="checkbox" name="pertanyaan_4[]" value="Hero">Hero
					</label>
				</div>
				<div class="que-4-colm">
					<label>
						<input type="checkbox" name="pertanyaan_4[]" value="Alfamart">Alfamart
					</label>
					<label>
						<input type="checkbox" name="pertanyaan_4[]" value="Alfamidi">Alfamidi
					</label>
					<label>
						<input type="checkbox" name="pertanyaan_4[]" value="Century">Century
					</label>
				</div>
				<div class="que-4-colm">
					<label>
						<input type="checkbox" name="pertanyaan_4[]" value="Giant">Giant
					</label>
					<label>
						<input type="checkbox" name="pertanyaan_4[]" value="Circle K">Circle K
					</label>
					<label>
						<input type="checkbox" name="pertanyaan_4[]" value="Guradian">Guradian
					</label>
				</div>
				<div class="que-4-colm">
					<label>
						<input type="checkbox" name="pertanyaan_4[]" value="Hypermart">Hypermart
					</label>
					<label>
						<input type="checkbox" name="pertanyaan_4[]" value="Yogya">Yogya
					</label>
				</div>
				<div class="clearfix"></div>
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
@endsection
