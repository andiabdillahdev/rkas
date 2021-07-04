@extends('layouts.headfoot')

@section('content')
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          {{-- <h3>Beranda</h3> --}}
        </div>
      </div>

      <div class="clearfix"></div>

      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>Beranda</h2>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">

              <div class="row tile_count">
                <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
                  <span class="count_top"><i class="fa fa-money"></i> Anggaran <small>dalam Rp.</small></span>
                  <div class="count" id="anggaran"></div>
                </div>
                <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
                  <span class="count_top"><i class="fa fa-user"></i> Total Pegawai</span>
                  <div class="count" id="totalPegawai"></div>
                </div>
                <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
                  <span class="count_top"><i class="fa fa-user"></i> Total Siswa</span>
                  <div class="count" id="totalSiswa"></div>
                </div>
                <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
                  <span class="count_top"><i class="fa fa-list"></i> Item Terkirim</span>
                  <div class="count" id="totalTerkirim"></div>
                </div>
                <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
                  <span class="count_top"><i class="fa fa-list"></i> Item Di Tolak</span>
                  <div class="count" id="totalTolak"></div>
                </div>
                <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
                  <span class="count_top"><i class="fa fa-list"></i> Item Valid</span>
                  <div class="count green" id="totalValid"></div>
                </div>
              </div>

                <h4>Panel <b><u><i>{{ Auth::user()->role }}</i></u></b> Sistem Pengelolaan Dana Bos SDN 112 Sattulu Kab. Sinjai</h4>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /page content -->
@endsection
@push('script')
    <script>
      $(function () {
        $.ajax({
          type: 'GET',
          url: '{{route('dashboard.data')}}',
          success: function (response) {
            console.log(response);
            var anggaran = response['anggaran'][0]['nominal'];
            $('#totalPegawai').html(response['pegawai']['length']);
            $('#totalSiswa').html(response['siswa']['length']);
            $('#totalTerkirim').html(response['itemTerkirim']['length']);
            $('#totalTolak').html(response['itemProses']['length']);
            $('#totalValid').html(response['itemValid']['length']);
            $('#anggaran').html(anggaran.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
          }
        });
      })
    </script>
@endpush
