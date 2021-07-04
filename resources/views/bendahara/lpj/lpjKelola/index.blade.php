@extends('layouts.headsecond')
@section('konten')
<div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>LPJ (Laporan Pertanggung Jawaban) </h3>
        </div>
      </div>

      <div class="clearfix"></div>

      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>LPJ</h2>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">              
             
                <form id="formdataLpj">
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th>Preview</th>
                        <th>Tanggal Di Kirim</th>
                        <th>Status LPJ</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                        <tr>
                          <td>
                              <a role="button" target="_blank" href="{{ route('preview.lpj') }}"><i class="fa fa-file-pdf-o"></i> Lihat Rekapitulasi</a>
                          </td>
                          <td>
                              {{$item['tanggal']}}
                          </td>
                          <td>
                              @if ($item['status'] == 'Belum Di Periksa')
                              <span class="label label-warning"><i class="fa fa-warning"></i> {{$item['status']}}</span>
                              @elseif($item['status'] == 'Revisi')
                              <span class="label label-danger"><i class="fa fa-close"></i> {{$item['status']}}</span>
                              @elseif($item['status'] == 'Terkirim')
                              <span class="label label-info"><i class="fa fa-paper-plane"></i> {{$item['status']}}</span>
                              @else
                              <span class="label label-success"><i class="fa fa-check-square"></i> {{$item['status']}}</span>
                              @endif

                          </td>
                          <td>
                            <input type="hidden" name="status" value="{{$item['status']}}">
                            <button type="button" onclick="post_data_page('lpj/submitToKepsek','Data LPJ','formdataLpj','tambah','tbl_pmb_pajak','lpj')" class="btn btn-primary btn-xs">Submit</button>
                          </td>
                      </tr>
                        @endforeach    
                    </tbody>
                  </table>
                </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
