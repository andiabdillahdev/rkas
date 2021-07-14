<form id="formRekening" class="form-horizontal form-label-left">

<div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="kode">Kode<span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
          {!! Form::text('kode',$data['kode'], ['class'=>'form-control col-md-7 col-xs-12','placeholder'=>'Masukkan Kode','id'=>'kode']) !!}
        </div>
      </div>

    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="kode">No Rekening<span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            {!! Form::text('no_rekening',$data['no_rekening'], ['class'=>'form-control col-md-7 col-xs-12','placeholder'=>'Masukkan No Rekening','id'=>'rekening']) !!}
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="kode">Bank<span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
        {{ Form::select('bank', ['Mandiri' => 'Mandiri', 'BNI' => 'BNI', 'BRI' => 'BRI','BTN' => 'BTN','BCA' => 'BCA', 'CIMB Niaga' => 'CIMB Niaga', 'Maybank Indonesia' => 'Maybank Indonesia', 'Panin' => 'Panin', 'Sinarmas' => 'Sinarmas'],$data['bank'], ['class' => 'form-control','id'=>'bank','title'=>'Pilih No Rekening']) }} 
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="kode">Atas Nama<span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            {!! Form::text('atas_nama',$data['atas_nama'], ['class'=>'form-control col-md-7 col-xs-12','placeholder'=>'Masukkan No Nama','id'=>'atas_nama']) !!}
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
    <button type="button" class="btn btn-success button_modal"
        onclick="post_data('/rekening/update/{{$data['id']}}','Data Rekening','formRekening','Update','tb_rekening')"> Save
        changes</button>
</div>

<script>
    $(function () {
        price_format_class('currency_format');
    })
</script>