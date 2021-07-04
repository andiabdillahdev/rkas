<form id="form_pegawai_update" class="form-horizontal form-label-left">

    <div class="form-group">
      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama">Nama<span class="required">*</span>
      </label>
      <div class="col-md-6 col-sm-6 col-xs-12">
        {!! Form::text('nama',$data->nama, ['class'=>'form-control col-md-7 col-xs-12','placeholder'=>'Masukkan nama','id'=>'nama']) !!}
      </div>
    </div>

    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nip">NIP<span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
          {!! Form::text('nip',$data->nip, ['class'=>'form-control col-md-7 col-xs-12','placeholder'=>'Masukkan NIP','id'=>'nip']) !!}
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="jk">Jenis Kelamin<span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            {{ Form::select('jk', array('Laki-Laki' => 'Laki-Laki', 'Perempuan' => 'Perempuan'), $data->jk, array('class'=>'form-control col-md-7 col-xs-12')) }}
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tgl_lahir">Tanggal Lahir<span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
          {!! Form::date('tgl_lahir',$data->tgl_lahir, ['class'=>'form-control col-md-7 col-xs-12','placeholder'=>'Masukkan nama','id'=>'tgl_lahir']) !!}
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="agama">Agama<span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
          {!! Form::text('agama',$data->agama, ['class'=>'form-control col-md-7 col-xs-12','placeholder'=>'Masukkan Agama','id'=>'agama']) !!}
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="status">Status<span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
          <select name="status" class="form-control col-md-7 col-xs-12" id="">
            <option disabled selected>-- Pilih Status</option>
            <option value="PNS" @if ($data['status'] == 'PNS')
                selected
            @endif >PNS</option>
            <option value="Honorer" @if ($data['status'] == 'Honorer')
                selected
            @endif>Honorer</option>
          </select>
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="jabatan">Jabatan<span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
          {!! Form::text('jabatan',$data->jabatan, ['class'=>'form-control col-md-7 col-xs-12','placeholder'=>'Masukkan Jabatan','id'=>'jabatan']) !!}
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="masa_kerja">Masa Kerja<span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
          {!! Form::text('masa_kerja',$data->masa_kerja, ['class'=>'form-control col-md-7 col-xs-12','placeholder'=>'Masukkan Masa Kerja','id'=>'masa_kerja']) !!}
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="jml_jam">Jumlah Jam<span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
          {!! Form::number('jml_jam',$data->jml_jam, ['class'=>'form-control col-md-7 col-xs-12','placeholder'=>'Masukkan Jumlah Jam','id'=>'jml_jam']) !!}
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tgs_tambahan">Tugas Tambahan<span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
          {!! Form::text('tgs_tambahan',$data->tgs_tambahan, ['class'=>'form-control col-md-7 col-xs-12','placeholder'=>'Masukkan Tugas Tambahan','id'=>'tgs_tambahan']) !!}
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="alamat">Alamat<span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
          {!! Form::text('alamat',$data->alamat, ['class'=>'form-control col-md-7 col-xs-12','placeholder'=>'Masukkan Alamat','id'=>'alamat']) !!}
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="no_tlp">No Telepon<span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
          {!! Form::text('no_tlp',$data->no_tlp, ['class'=>'form-control col-md-7 col-xs-12','placeholder'=>'Masukkan No Telepon','id'=>'no_tlp']) !!}
        </div>
      </div>

</form>
<div class="alert alert-danger alert-dismissible fade in" role="alert" style="display: none">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
    </button>
        <ul class="main-error">
            
        </ul>
  </div>
<br><br>
<div class="modal-footer">
<button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
<button type="button" class="btn btn-success button_modal" onclick="post_data('{{$url_update}}','Data Pegawai','form_pegawai_update','Update','tbl_pegawai')"> Save changes</button>
</div>

