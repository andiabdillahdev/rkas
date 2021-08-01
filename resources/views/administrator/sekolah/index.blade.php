@extends('layouts.headfoot')

@section('content')
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>Data Sekolah</h3>
        </div>
      </div>

      <div class="clearfix"></div>

      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>Data Sekolah</small></h2>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              
              <form id="formSekolah" class="form-horizontal form-label-left">
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="main_program">Nama<span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="kode" name="nama" required="required" value="{{$data['nama']}}" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="main_program">NISPN<span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="kode" name="nispn" required="required" value="{{$data['nispn']}}" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="main_program">NSS<span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="kode" name="nss" required="required" value="{{$data['nss']}}" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>
          
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="main_program">Alamat<span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="kode" name="alamat" value="{{$data['alamat']}}" required="required" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="main_program">No Handphone<span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="kode" name="rt_rw" value="{{$data['rt_rw']}}" required="required" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="main_program">E-Mail<span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="kode" name="email" value="{{$data['email']}}" required="required" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="main_program">Dusun<span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="kode" name="dusun" value="{{$data['dusun']}}" required="required" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="main_program">Desa<span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="kode" name="desa" value="{{$data['desa']}}" required="required" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="main_program">Kecamatan<span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="kode" name="kecamatan" value="{{$data['kecamatan']}}" required="required" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="main_program">Kabupaten<span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="kode" name="kabupaten" value="{{$data['kabupaten']}}" required="required" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="main_program">Provinsi<span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="kode" name="provinsi" value="{{$data['provinsi']}}" required="required" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="main_program">Kode Pos<span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="kode" name="kodepos" value="{{$data['kodepos']}}" required="required" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="main_program">No Rekening<span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="kode" name="no_rekening" value="{{$data['no_rekening']}}" required="required" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="main_program">Nama Rekening<span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="kode" name="nama_rekening" value="{{$data['nama_rekening']}}" required="required" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="main_program">Nama Bank<span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="kode" name="nama_bank" value="{{$data['nama_bank']}}" required="required" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>
          
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="main_program">NPWP<span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="kode" name="npwp" required="required" value="{{$data['npwp']}}" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>
          
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="main_program">E-Mail<span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="email" id="kode" name="email" value="{{$data['email']}}" required="required" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>
              </form>

              <div class="form-group">
                <div class="row text-center">
                  <button type="button" onclick="post_data_page('dashboardData/update/{{$data['id']}}','Data Sekolah','formSekolah','tambah','tbl_kas_umum','dashboardData')" class="btn btn-success">Submit</button>
                 
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
  <!-- /page content -->
@endsection
