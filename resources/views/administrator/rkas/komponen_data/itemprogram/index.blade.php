@extends('layouts.headfoot')

@section('content')
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>Kelola Data Item Program</h3>
        </div>
      </div>

      <div class="clearfix"></div>

      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>Tabel Item Program</h2>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <a role="button" class="btn btn-primary btn-sm" onclick="show_modal_add('Tambah Data Item Program','/komponen_data/itemprogram/create')"><i class="fa fa-plus-square"></i> Tambah Data</a>
                <table id="tb_itemprogram" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                          <th>ID</th>
                          <th>Kode</th>
                          <th>Main Program</th>
                          <th>Sub Program</th>
                          <th>Uraian</th>
                          <th>Keterangan</th>
                          <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                    </tbody>
                </table>
      
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /page content -->
@endsection
