@extends('layouts.headsecond')
@section('konten')
<div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>Bukti Kelengkapan LPJ</h3>
        </div>
      </div>

      <div class="clearfix"></div>

      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>Buku Pembantu Bank</h2>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">

                <a role="button" class="btn btn-primary btn-sm" href="{{ route('pmbBank.create') }}"><i class="fa fa-plus-square"></i> Tambah Data</a>
                <a role="button" class="btn btn-info btn-sm" target="_blank" href="{{ route('pmbBank.konvertPDF') }}"><i class="fa fa-file-pdf-o"></i> Lihat Rekapitulasi </a>
                <table id="tbl_pmb_bank" class="table table-bordered">
                    <thead>
                        <tr>
                          <th>ID</th>
                          <th>Tanggal</th>
                          <th>Kode</th>
                          <th>No Bukti</th>
                          <th>Uraian</th>
                          <th>Nominal</th>
                          <th>Status Transaksi</th>
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
@endsection
