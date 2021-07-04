@extends('layouts.headfoot')

@section('content')
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>Kelola Data</h3>
        </div>
      </div>

      <div class="clearfix"></div>

      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">`
            <div class="x_title">
              <h2>Tabel Item Data</h2>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">

                <div class="col-xs-2">
                  <!-- required for floating -->
                  <!-- Nav tabs -->
                  <ul class="nav nav-tabs tabs-left">
                    <li class="active"><a href="#terkirim" data-toggle="tab">Item Di Kirim</a>
                    </li>
                    <li><a href="#home" data-toggle="tab">Item Di Tolak</a>
                    </li>
                    <li><a href="#profile" data-toggle="tab">Item Selesai</a>
                    </li>
                  </ul>
                </div>

                <div class="col-xs-10">
                  <div class="tab-content">
                    <div class="tab-pane active" id="terkirim">
                      <table id="tb_item_proses" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                              <th>ID</th>
                              <th>Kode Rekening</th>
                              <th>Kode</th>
                              <th>Uraian</th>
                              <th>Status</th>
                              <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                        </tbody>
                    </table>
                    </div>
                    <div class="tab-pane" id="home">
                        <table id="tb_item_di_tolak" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                  <th>ID</th>
                                  <th>Kode Rekening</th>
                                  <th>Kode</th>
                                  <th>Uraian</th>
                                  <th>Status</th>
                                  <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane" id="profile">

                      <a role="button"   class="btn btn-info btn-sm" href="{{ route('rkas.penerimaan.rkasView') }}"><i class="fa fa-file-pdf-o"></i> Lihat Rekapitulasi </a>

                      <table id="tb_item_selesai" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                              <th>ID</th>
                              <th>Kode Rekening</th>
                              <th>Kode</th>
                              <th>Uraian</th>
                              <th>Status</th>
                              <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                        </tbody>
                    </table>
                    </div>
                  </div>
                </div>

                <div class="clearfix"></div>

              </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /page content -->
@endsection
