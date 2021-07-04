@extends('layouts.headKepsel')

@section('konten')
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>Data Sekolah</h3>
        </div>

        <div class="title_right">
          <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
           
          </div>
        </div>
      </div>

      <div class="clearfix"></div>

      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>Data Sekolah</h2>
           
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <form id="form_belanja" class="form-horizontal form-label-left">
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="main_program">Nama<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" readonly id="kode" name="kode" required="required" value="{{$data['nama']}}" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="main_program">NISPN<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" readonly id="kode" name="kode" required="required" value="{{$data['nispn']}}" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="main_program">NSS<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" readonly id="kode" name="kode" required="required" value="{{$data['nss']}}" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="main_program">Alamat<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" readonly id="kode" name="kode" value="{{$data['alamat']}}" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="main_program">Alamat<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" readonly id="kode" name="kode" value="{{$data['rt_rw']}}" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="main_program">E-Mail<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" readonly id="kode" name="kode" value="{{$data['email']}}" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="main_program">Dusun<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" readonly id="kode" name="kode" value="{{$data['dusun']}}" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="main_program">Desa<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" readonly id="kode" name="kode" value="{{$data['desa']}}" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="main_program">Kecamatan<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" readonly id="kode" name="kode" value="{{$data['kecamatan']}}" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="main_program">Kabupaten<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" readonly id="kode" name="kode" value="{{$data['kabupaten']}}" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="main_program">Provinsi<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" readonly id="kode" name="kode" value="{{$data['provinsi']}}" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="main_program">Kode Pos<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" readonly id="kode" name="kode" value="{{$data['kodepos']}}" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="main_program">No Rekening<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" readonly id="kode" name="kode" value="{{$data['no_rekening']}}" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="main_program">Nama Rekening<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" readonly id="kode" name="kode" value="{{$data['nama_rekening']}}" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="main_program">Nama Bank<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" readonly id="kode" name="kode" value="{{$data['nama_bank']}}" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="main_program">NPWP<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" readonly id="kode" name="kode" required="required" value="{{$data['npwp']}}" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="main_program">E-Mail<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="email" id="kode" name="kode" value="{{$data['email']}}" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <form id="form_belanja" class="form-horizontal form-label-left">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /page content -->
@endsection
