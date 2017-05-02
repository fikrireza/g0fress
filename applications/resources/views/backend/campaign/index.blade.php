@extends('backend.layout.master')

@section('title')
  <title>Aquasolve | Hasil Campaign Hello</title>
@endsection

@section('headscript')
<link href="{{ asset('backend/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('backend/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('backend/vendors/pnotify/dist/pnotify.css') }}" rel="stylesheet">
<link href="{{ asset('backend/vendors/pnotify/dist/pnotify.nonblock.css') }}" rel="stylesheet">
@endsection

@section('content')

<div class="row tile_count">
  <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
    <span class="count_top"><i class="fa fa-user"></i> Partisipan</span>
    <div class="count">{{ $getUserCampaign }}</div>
  </div>
  <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
    <span class="count_top"><i class="fa fa-clock-o"></i> Sisa Kupon</span>
    <div class="count">{{ $getKupon[0]->sisa_kupon }}</div>
  </div>
  <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
    <span class="count_top"><i class="fa fa-ticket"></i> Total Kupon</span>
    <div class="count green">{{ $getAllKupon }}</div>
  </div>
</div>

<div class="page-title">
  <div class="title_left">
    <h3>Hasil Campaign Hello <small></small></h3>
  </div>
</div>

<div class="row">
  <div class="col-md-6 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Situasi apa yang membuat bau mulut?</h2>
        <ul class="nav navbar-right panel_toolbox">
          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
          </li>
          <li><a class="close-link"><i class="fa fa-close"></i></a>
          </li>
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <canvas id="pertanyaan_1"></canvas>
      </div>
    </div>
  </div>
  <div class="col-md-6 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Cara mengatasi bau mulut?</h2>
        <ul class="nav navbar-right panel_toolbox">
          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
          </li>
          <li><a class="close-link"><i class="fa fa-close"></i></a>
          </li>
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <canvas id="pertanyaan_2"></canvas>
      </div>
    </div>
  </div>
  <div class="col-md-6 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Sudah pernah coba Gofress</h2>
        <ul class="nav navbar-right panel_toolbox">
          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
          </li>
          <li><a class="close-link"><i class="fa fa-close"></i></a>
          </li>
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <canvas id="pertanyaan_3"></canvas>
      </div>
    </div>
  </div>
  <div class="col-md-6 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Tahukah kamu di mana Gofress bisa dibeli?</h2>
        <ul class="nav navbar-right panel_toolbox">
          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
          </li>
          <li><a class="close-link"><i class="fa fa-close"></i></a>
          </li>
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <canvas id="pertanyaan_4"></canvas>
      </div>
    </div>
  </div>
</div>

<div class="col-md-12 col-sm-12 col-xs-12">
  <div class="x_panel">
    <div class="x_title">
      <h2>Hasil Campaign Hello</h2>
      <div class="clearfix"></div>
    </div>
    <div class="table-responsive">
      <table id="produktabel" class="table table-striped table-bordered">
        <thead>
          <tr role="row">
            <th>No</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Hp</th>
            <th>Kota</th>
            <th>Pertanyaan 1</th>
            <th>Pertanyaan 2</th>
            <th>Pertanyaan 3</th>
            <th>Pertanyaan 4</th>
            <th>Kupon</th>
            <th>Tanggal</th>
          </tr>
        </thead>
        <tbody>
          @php
            $no = 1;
          @endphp
          @foreach ($getCampaign as $key)
          <tr>
            <td>{{ $no }}</td>
            <td>{{ $key->nama }}</td>
            <td>{{ $key->email }}</td>
            <td>{{ $key->hp }}</td>
            <td>{{ $key->nama_kota }}</td>
            <td>{{ $key->pertanyaan_1 }}</td>
            <td>{{ $key->pertanyaan_2 }}</td>
            <td>{{ $key->pertanyaan_3 }}</td>
            <td>{{ $key->pertanyaan_4 }}</td>
            <td>{{ $key->kupon }}</td>
            <td>{{ $key->created_at }}</td>
          </tr>
          @php
            $no++;
          @endphp
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

@endsection

@section('script')
<script src="{{ asset('backend/vendors/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('backend/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ asset('backend/vendors/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('backend/vendors/datatables.net-scroller/js/datatables.scroller.min.js') }}"></script>
<script src="{{ asset('backend/vendors/pnotify/dist/pnotify.js') }}"></script>
<script src="{{ asset('backend/vendors/pnotify/dist/pnotify.nonblock.js') }}"></script>
<script src="{{ asset('backend/vendors/Chart.js/dist/Chart.min.js')}}"></script>

<script type="text/javascript">
  $('#produktabel').DataTable();
</script>

<script type="text/javascript">
  // Pie chart Pertanyaan 1
  var ctx_1 = document.getElementById("pertanyaan_1");
  var data = {
    datasets: [{
      data: [40, 150, 140],
      backgroundColor: [
        "#455C73",
        "#9B59B6",
        "#BDC3C7"
      ],
      label: 'My dataset' // for legend
    }],
    labels: [
      "Setelah Makan",
      "Setelah Minum Kopi",
      "Setelah Merokok"
    ]
  };
  var pieChart = new Chart(ctx_1, {
    data: data,
    type: 'pie',
    otpions: {
      legend: false
    }
  });

  // Pie chart Pertanyaan 2
  var ctx_2 = document.getElementById("pertanyaan_2");
  var data = {
    datasets: [{
      data: [120, 50, 140, 30, 10],
      backgroundColor: [
        "#455C73",
        "#9B59B6",
        "#BDC3C7",
        "#26B99A",
        "#3498DB"
      ],
      label: 'My dataset' // for legend
    }],
    labels: [
      "Sikat Gigi",
      "Berkumur",
      "Makan Permen",
      "Berobat Ke Dokter",
      "Berobat Sendiri"
    ]
  };
  var pieChart = new Chart(ctx_2, {
    data: data,
    type: 'pie',
    otpions: {
      legend: false
    }
  });

  // Pie chart Pertanyaan 3
  var ctx_3 = document.getElementById("pertanyaan_3");
  var data = {
    datasets: [{
      data: [70, 55],
      backgroundColor: [
        "#9B59B6",
        "#BDC3C7"
      ],
      label: 'My dataset' // for legend
    }],
    labels: [
      "Ya",
      "Belum"
    ]
  };
  var pieChart = new Chart(ctx_3, {
    data: data,
    type: 'pie',
    otpions: {
      legend: false
    }
  });

  // Pie chart Pertanyaan 4
  var ctx_4 = document.getElementById("pertanyaan_4");
  var data = {
    datasets: [{
      data: [110, 10, 12, 88, 23, 78, 34, 50, 55, 90, 20],
      backgroundColor: [
        "#000000",
        "#4f90c1",
        "#AAAAAA",
        "#OOOOOO",
        "#ADC3C7",
        "#9c3b30",
        "#11dbad",
        "#ff748a",
        "#ffc82e",
        "#11a51b"
      ],
      label: 'My dataset' // for legend
    }],
    labels: [
      "Indomaret",
      "Superindo",
      "Hero",
      "Alfamart",
      "Alfamidi",
      "Century",
      "Giant",
      "Circle K",
      "Guardian",
      "Hypermart",
      "Yogya"
    ]
  };
  var pieChart = new Chart(ctx_4, {
    data: data,
    type: 'pie',
    otpions: {
      legend: false
    }
  });
</script>
@endsection
