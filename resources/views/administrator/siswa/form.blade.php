<form id="form_siswa" class="form-horizontal form-label-left">

    <div class="form-group">
      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama">Nama<span class="required">*</span>
      </label>
      <div class="col-md-6 col-sm-6 col-xs-12">
        {!! Form::text('nama',null, ['class'=>'form-control col-md-7 col-xs-12','placeholder'=>'Masukkan nama','id'=>'nama']) !!}
      </div>
    </div>

    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nis">NIS<span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
          {!! Form::text('nis',null, ['class'=>'form-control col-md-7 col-xs-12','placeholder'=>'Masukkan Nis','id'=>'nis']) !!}
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="kelas">Kelas<span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            {{ Form::select('kelas', $kelas,null, ['class'=>'form-control col-md-7 col-xs-12']) }}
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="jk">Jenis Kelamin<span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            {{ Form::select('jk', array('Laki-Laki' => 'Laki-Laki', 'Perempuan' => 'Perempuan'), null, array('class'=>'form-control col-md-7 col-xs-12')) }}
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tgl_lahir">Tanggal Lahir<span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
          {!! Form::date('tgl_lahir',null, ['class'=>'form-control col-md-7 col-xs-12','placeholder'=>'Masukkan nama','id'=>'tgl_lahir']) !!}
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="agama">Agama<span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
          {!! Form::text('agama',null, ['class'=>'form-control col-md-7 col-xs-12','placeholder'=>'Masukkan Agama','id'=>'agama']) !!}
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="anak_ke">Anak Ke<span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
          {!! Form::number('anak_ke',null, ['class'=>'form-control col-md-7 col-xs-12','placeholder'=>'Masukkan Anak Ke','id'=>'anak_ke']) !!}
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="status">Status<span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
          {!! Form::text('status',null, ['class'=>'form-control col-md-7 col-xs-12','placeholder'=>'Masukkan Status','id'=>'status']) !!}
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="pend_sblmnya">Pendidikan Sebelumnya<span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
          {!! Form::text('pend_sblmnya',null, ['class'=>'form-control col-md-7 col-xs-12','placeholder'=>'Masukkan Pendidikan Sebelumnya','id'=>'pend_sblmnya']) !!}
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="alamat_siswa">Alamat Siswa<span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
          {!! Form::text('alamat_siswa',null, ['class'=>'form-control col-md-7 col-xs-12','placeholder'=>'Masukkan Alamat Siswa','id'=>'alamat_siswa']) !!}
        </div>
      </div>

    

      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ayah">Ayah<span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
          {!! Form::text('ayah',null, ['class'=>'form-control col-md-7 col-xs-12','placeholder'=>'Masukkan Ayah','id'=>'ayah']) !!}
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ibu">Ibu<span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
          {!! Form::text('ibu',null, ['class'=>'form-control col-md-7 col-xs-12','placeholder'=>'Masukkan Ibu','id'=>'ibu']) !!}
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="wali_ayah">Wali Ayah<span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
          {!! Form::text('wali_ayah',null, ['class'=>'form-control col-md-7 col-xs-12','placeholder'=>'Masukkan Wali Ayah','id'=>'wali_ayah']) !!}
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="wali_ibu">Wali Ibu<span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
          {!! Form::text('wali_ibu',null, ['class'=>'form-control col-md-7 col-xs-12','placeholder'=>'Masukkan Wali Ibu','id'=>'wali_ibu']) !!}
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="no_telp">No Telepon<span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
          {!! Form::text('no_telp',null, ['class'=>'form-control col-md-7 col-xs-12','placeholder'=>'Masukkan No Telepon','id'=>'no_telp']) !!}
        </div>
      </div>

</form>
<div class="alert alert-danger alert-dismissible fade in" role="alert" style="display: none">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">??</span>
    </button>
        <ul class="main-error">
            
        </ul>
  </div>
<br><br>
<div class="modal-footer">
<button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
<button type="button" class="btn btn-success button_modal" onclick="post_data('/siswa/store','Data Siswa','form_siswa','Tambah','tbl_siswa')"> Save changes</button>
</div>

