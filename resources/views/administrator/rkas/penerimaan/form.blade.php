<form id="form_penerimaan" class="form-horizontal form-label-left">

    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="kode">Kode<span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
          {!! Form::text('kode',null, ['class'=>'form-control col-md-7 col-xs-12','placeholder'=>'Masukkan Kode','id'=>'kode']) !!}
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="keterangan">Keterangan<span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
          {!! Form::text('keterangan',null, ['class'=>'form-control col-md-7 col-xs-12','placeholder'=>'Masukkan keterangan','id'=>'keterangan']) !!}
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nominal">Nominal<span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
          {!! Form::text('nominal',null, ['class'=>'form-control col-md-7 col-xs-12 currency_format','placeholder'=>'Masukkan nominal','id'=>'nominal']) !!}
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
<button type="button" class="btn btn-success button_modal" onclick="post_data('/rkas/penerimaan/store','Data Penerimaan Dana','form_penerimaan','Tambah','tb_penerimaan')"> Save changes</button>
</div>

<script>
  $(function () {
    price_format_class('currency_format');
  })
</script>