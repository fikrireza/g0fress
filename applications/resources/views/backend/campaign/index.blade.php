@extends('backend.layout.master')

@section('title')
  <title>Aquasolve | Hasil Campaign Hello</title>
@endsection

@section('headscript')
<link href="{{ asset('backend/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('backend/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('backend/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css')}}" rel="stylesheet">
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
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content table-responsive">
        <table class="" style="width:100%">
          <tr>
            <td>
              <canvas id="pertanyaan_1" height="150" width="150" style="margin: 15px 10px 10px 0"></canvas>
            </td>
            <td>
              <table class="tile_info">
                @foreach ($pertanyaan_1 as $jumlah1)
                <tr>
                  <td>
                    <p><i class="fa fa-square"></i>{{ $jumlah1->pertanyaan_1 }}</p>
                  </td>
                  <td>: {{ $jumlah1->jumlah }}</td>
                </tr>
                @endforeach
              </table>
            </td>
          </tr>
        </table>
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
      <div class="x_content table-responsive">
        <table class="">
          <tr>
            <td>
              <canvas id="pertanyaan_2" height="150" width="150" style="margin: 15px 10px 10px 0"></canvas>
            </td>
            <td>
              <table class="tile_info">
                @foreach ($pertanyaan_2 as $jumlah2)
                <tr>
                  <td>
                    <p><i class="fa fa-square"></i>{{ $jumlah2->pertanyaan_2 }}</p>
                  </td>
                  <td>: {{ $jumlah2->jumlah }}</td>
                </tr>
                @endforeach
              </table>
            </td>
          </tr>
        </table>
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
      <div class="x_content table-responsive">
        {{-- <canvas id="pertanyaan_3"></canvas> --}}
        <table class="" style="width:100%">
          <tr>
            <td>
              <canvas id="pertanyaan_3" height="150" width="150" style="margin: 15px 10px 10px 0"></canvas>
            </td>
            <td>
              <table class="tile_info">
                @foreach ($pertanyaan_3 as $jumlah3)
                <tr>
                  <td>
                    <p><i class="fa fa-square"></i>{{ $jumlah3->pertanyaan_3 }}</p>
                  </td>
                  <td>: {{ $jumlah3->jumlah }}</td>
                </tr>
                @endforeach
              </table>
            </td>
          </tr>
        </table>
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
      <div class="x_content table-responsive">
        <table class="" style="width:100%">
          <tr>
            <td>
              <canvas id="pertanyaan_4" height="180" width="250" style="margin: 0 0 0 0"></canvas>
            </td>
            <td>
              <table class="tile_info">
                @foreach ($pertanyaan_4 as $key => $value)
                <tr>
                  <td>
                    <p><i class="fa fa-square"></i>{{ $key }}</p>
                  </td>
                  <td>: {{ $value }}</td>
                </tr>
                @endforeach
              </table>
            </td>
          </tr>
        </table>
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
      <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive">
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
<script src="{{ asset('backend/vendors/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('backend/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js') }}"></script>
<script src="{{ asset('backend/vendors/datatables.net-buttons/js/buttons.flash.min.js') }}"></script>
<script src="{{ asset('backend/vendors/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('backend/vendors/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('backend/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ asset('backend/vendors/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('backend/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js')}}"></script>
<script src="{{ asset('backend/vendors/datatables.net-scroller/js/datatables.scroller.min.js') }}"></script>
<script src="{{ asset('backend/vendors/pnotify/dist/pnotify.js') }}"></script>
<script src="{{ asset('backend/vendors/pnotify/dist/pnotify.nonblock.js') }}"></script>
<script src="{{ asset('backend/vendors/Chart.js/dist/Chart.min.js')}}"></script>
<script src="{{ asset('backend/vendors/jszip/dist/jszip.min.js')}}"></script>
<script src="{{ asset('backend/vendors/pdfmake/build/pdfmake.min.js') }}"></script>
<script src="{{ asset('backend/vendors/pdfmake/build/vfs_fonts.js') }}"></script>

<script type="text/javascript">
  // $('#produktabel').DataTable();
  $(document).ready(function() {
        var handleDataTableButtons = function() {
          if ($("#datatable-buttons").length) {
            $("#datatable-buttons").DataTable({
              dom: "Bfrtip",
              buttons: [
                {
                  extend: "copy",
                  className: "btn-sm"
                },
                {
                  extend: "csv",
                  className: "btn-sm"
                },
                {
                  extend: "excel",
                  className: "btn-sm"
                },
                {
                  extend: "pdfHtml5",
                  className: "btn-sm"
                },
                {
                  extend: "print",
                  className: "btn-sm"
                },
              ],
              responsive: true
            });
          }
        };

        TableManageButtons = function() {
          "use strict";
          return {
            init: function() {
              handleDataTableButtons();
            }
          };
        }();

        $('#datatable').dataTable();
        $('#datatable-keytable').DataTable({
          keys: true
        });

        $('#datatable-responsive').DataTable();

        $('#datatable-scroller').DataTable({
          ajax: "js/datatables/json/scroller-demo.json",
          deferRender: true,
          scrollY: 380,
          scrollCollapse: true,
          scroller: true
        });

        var table = $('#datatable-fixed-header').DataTable({
          fixedHeader: true
        });

        TableManageButtons.init();
      });
</script>

<script type="text/javascript">
  // Pie chart Pertanyaan 1
  $(document).ready(function(){
    var options = {
      legend: false,
      responsive: false
    };

    new Chart(document.getElementById("pertanyaan_1"), {
      type: 'doughnut',
      tooltipFillColor: "rgba(51, 51, 51, 0.55)",
      data: {
        labels: [
          "Setelah Makan",
          "Setelah Minum Kopi",
          "Setelah Merokok"
        ],
        datasets: [{
          data: [2, 11, 1],
          backgroundColor: [
            "#9B59B6",
            "#E74C3C",
            "#3498DB"
          ],
          hoverBackgroundColor: [
            "#B370CF",
            "#E95E4F",
            "#49A9EA"
          ]
        }]
      },
      options: options
    });
  });

  // Pie chart Pertanyaan 2
  $(document).ready(function(){
    var options = {
      legend: false,
      responsive: false
    };

    new Chart(document.getElementById("pertanyaan_2"), {
      type: 'doughnut',
      tooltipFillColor: "rgba(51, 51, 51, 0.55)",
      data: {
        labels: [
          "Berkumur",
          "Berobat Sendiri",
          "Makan Permen",
          "Sikat Gigi",
        ],
        datasets: [{
          data: [8, 1, 3, 2],
          backgroundColor: [
            "#BDC3C7",
            "#9B59B6",
            "#E74C3C",
            "#3498DB"
          ],
          hoverBackgroundColor: [
            "#CFD4D8",
            "#B370CF",
            "#E95E4F",
            "#49A9EA"
          ]
        }]
      },
      options: options
    });
  });

  // Pie chart Pertanyaan 3
  $(document).ready(function(){
    var options = {
      legend: false,
      responsive: false
    };

    new Chart(document.getElementById("pertanyaan_3"), {
      type: 'doughnut',
      tooltipFillColor: "rgba(51, 51, 51, 0.55)",
      data: {
        labels: [
          "Ya",
          "Belum"
        ],
        datasets: [{
          data: [11, 3],
          backgroundColor: [
            "#9B59B6",
            "#3498DB"
          ],
          hoverBackgroundColor: [
            "#B370CF",
            "#49A9EA"
          ]
        }]
      },
      options: options
    });
  });

  // Pie chart Pertanyaan 4
  $(document).ready(function(){
    var options = {
      legend: false,
      responsive: false
    };

    new Chart(document.getElementById("pertanyaan_4"), {
      type: 'doughnut',
      tooltipFillColor: "rgba(51, 51, 51, 0.55)",
      data: {
        labels: [
          "Indomaret",
          "Alfamart",
          "Alfamidi",
          "Giant",
          "Century",
          "Circle K",
          "Guardian",
          "Yogya",
          "Superindo",
          "Hypermart",
          "Hero"
        ],
        datasets: [{
          data: [11, 11, 8, 6, 7, 3, 4, 2, 6, 3, 5],
          backgroundColor: [
            "#B370CF",
            "#4f90c1",
            "#AAAAAA",
            "#3498DB",
            "#ADC3C7",
            "#9c3b30",
            "#11dbad",
            "#ff748a",
            "#ffc82e",
            "#11a51b"
          ],
          hoverBackgroundColor: [
            "#B370CF",
            "#4f90c1",
            "#AAAAAA",
            "#3498DB",
            "#ADC3C7",
            "#9c3b30",
            "#11dbad",
            "#ff748a",
            "#ffc82e",
            "#11a51b"
          ]
        }]
      },
      options: options
    });
  });
  // var ctx_4 = document.getElementById("pertanyaan_4");
  // var data = {
  //   datasets: [{
  //     data: [110, 10, 12, 88, 23, 78, 34, 50, 55, 90, 20],
  //     backgroundColor: [
  //       "#000000",
  //       "#4f90c1",
  //       "#AAAAAA",
  //       "#OOOOOO",
  //       "#ADC3C7",
  //       "#9c3b30",
  //       "#11dbad",
  //       "#ff748a",
  //       "#ffc82e",
  //       "#11a51b"
  //     ],
  //     label: 'My dataset' // for legend
  //   }],
  //   labels: [
  //     "Indomaret",
  //     "Superindo",
  //     "Hero",
  //     "Alfamart",
  //     "Alfamidi",
  //     "Century",
  //     "Giant",
  //     "Circle K",
  //     "Guardian",
  //     "Hypermart",
  //     "Yogya"
  //   ]
  // };
  // var pieChart_4 = new Chart(ctx_4, {
  //   data: data,
  //   type: 'pie',
  //   otpions: {
  //     legend: false
  //   }
  // });
</script>
@endsection
