<form id="form_itemprogram" class="form-horizontal form-label-left">

    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="main_program">Main Program<span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            {{ Form::select('main_program', $main_program, null, ['class' => 'form-control','id'=>'main_program_form','title'=>'Pilih Main Program','onchange'=>'mainprogram_select("main_program_form")']) }} 
        </div>
      </div>
      
      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="sub_program_form">Sub Program<span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            {{ Form::select('sub_program', [], null, ['class' => 'form-control','id'=>'sub_program_form','title'=>'Pilih Sub Program']) }} 
        </div>
      </div>

    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="kode">Kode<span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
          {!! Form::text('kode',null, ['class'=>'form-control col-md-7 col-xs-12','placeholder'=>'Masukkan Kode','id'=>'kode']) !!}
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="uraian">Uraian<span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
          {!! Form::text('uraian',null, ['class'=>'form-control col-md-7 col-xs-12','placeholder'=>'Masukkan uraian','id'=>'uraian']) !!}
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="keterangan">Keterangan<span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
          {!! Form::text('keterangan',null, ['class'=>'form-control col-md-7 col-xs-12','placeholder'=>'Masukkan keterangan','id'=>'keterangan']) !!}
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
<button type="button" class="btn btn-success button_modal" onclick="post_data('/komponen_data/itemprogram/store','Data Item Program','form_itemprogram','Tambah','tb_itemprogram')"> Save changes</button>
</div>