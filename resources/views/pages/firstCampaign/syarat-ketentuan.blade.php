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
	font-family: 'Gotham';
    font-weight: bold;
}
.thanks-wrapper .thanks-body{
	width: 95%;
	padding: 15px 0px;
	margin: 0 auto;
	height: 80vh;
	overflow-y: auto;
}
.thanks-wrapper .thanks-body label{
    font-family: 'Gotham';
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
		width: 100%;
		height: auto;
		padding: 10px 20px;
		overflow-y: auto;
	}

}
</style>
@endsection

@section('content')
<div class="thanks-wrapper">
	<div class="thanks-head">
		<h1>Syarat dan Ketentuan</h1>
	</div>
	<div class="thanks-body">
		<p>Sampling gratis Gofress adalah program yang diadakan oleh PT.Aquasolve Sanaria</p>

		<p>A. PERIODE PROMO :</p>

		<p>Periode mulai : 26 April 2017</p>

		<p>B. PERSYARATAN PESERTA :</p>

		<p>1. Promosi ini terbuka untuk Warga Negara Indonesia yang bertempat tinggal di Indonesia
		<p>2. Tertutup untuk karyawan, keluarga, agensi atau pihak ketiga lainnya dari Penyelenggara.

		<p>C. MEKANISME:

		<p>1. Isi data diri lengkap</p>
		<p>2. Menjawab pertanyaan survey</p>
		<p>3. Klik tombol “submit”</p>
		<p>4. 2.000 orang pertama berkesempatan untuk mendapatkan sampling gratis dari Gofress</p>

		<p>D. HADIAH</p>
		<p>1. Peserta tidak dapat memilih jenis rasa atau varian Gofress yang akan diberikan sebagai bagian dari sampling</p>
		<p>2. Sampling gratis Gofess dapat diambil di Alfamart terdekat dengan menunjukan kode verifikasi yang akan muncul setelah melengkapi mekanisme.</p>

		<p>E. KETENTUAN LAINNYA</p>

		<p>1. Pihak penyelenggara berhak mendiskualifikasi peserta yang diduga melakukan kecurangan dalam bentuk apapun.</p>
		<p>2. Penyelenggara tidak bertanggung jawab atas gangguan sinyal dan aplikasi yang rusak atau tertunda yang disebabkan karena kegagalan atau kerusakan sistem jaringan pengelenggara telkomunikasi terkait.</p>
		<p>3. Promo ini tidak berlaku bagi karyawan beserta keluarga dari PT.Aquasolve Sanaria, dan pihak-pihak yang turut terlibat dalam pengyelenggaraan Promo ini</p>
		<p>4. Pihak Penyelenggara berhak untuk mengubah dan/atau memodifikasi syarat dan ketentuan Promo dari waktu ke waktu dengan atau tanpa pemberitahuan terlebih dahulu.</p>
		<p>5. Dengan mengikuti promo ini, Peserta memberikan izin kepada Pihak Penyelenggara untuk menggunakan (termasuk mempublikasikan) Peserta untuk kepentingan Promo.</p>
		<p>6. Jika karena alasan apapun pemberian hadiah tidak dapat berjalan sesuai rencana, Penyelenggara memiliki hak untuk memodifikasi ketentuan pemberian hadiah yang senilai dengan hadiah yang telah dijanjikan.</p>
		<p>7. Promo ini tidak dipungut biaya apapun. Pajak ditanggung oleh Pihak Penyelenggara. Hati-hati penipuan</p>
		<p>8. Penyelenggara tidak bertanggungjawab atas aplikasi yang hilang, rusak atau tertunda sebagai akibat dari kerusakan, kegagalan dan kejadian serupa lainnya yang terjadi pada jaringan, perangkat keras komputer, atau perangkat lunak komputer.</p>
	</div>
</div>
@endsection

@section('script')

@endsection
