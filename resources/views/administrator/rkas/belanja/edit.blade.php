@extends('layouts.headfoot')

@section('content')
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>Update Data Belanja</h3>
        </div>
      </div>

      <div class="clearfix"></div>

      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>Belanja Anggaran <small>Rincian Perhitungan</small></h2>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <br />
              <form id="form_belanja_edit" class="form-horizontal form-label-left">

                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="main_program">Main Program<span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    {{ Form::select('main_program',$mainprogram,$data->id_main, ['title' => 'Pilih Main Program','class' => 'form-control selectpicker', 'data-size' => '7', 'data-live-search' => 'true', 'data-toggle'=>'ajax', 'id' => 'main_program_form','onchange'=>'mainprogram_select("main_program_form")']) }}
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="sub_program_form">Sub Program<span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    {{ Form::select('sub_program',$subprogram,$data->id_sub, ['class' => 'form-control selectpicker', 'data-size' => '7', 'data-live-search' => 'true', 'data-toggle'=>'ajax','id'=>'sub_program_form','title'=>'Pilih Sub Program','onchange'=>'subprogram_select("sub_program_form")']) }} 
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="item_program_form">Item Program<span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    {{ Form::select('item_program', $itemprogram,$data->id_item, ['class' => 'form-control selectpicker', 'data-size' => '7', 'data-live-search' => 'true', 'data-toggle'=>'ajax','id'=>'item_program_form','title'=>'Pilih Item Program']) }} 
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="kode_rekening">Kode Rekening<span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <!-- <input type="text" id="kode_rekening" required="required" name="kode_rekening" class="form-control col-md-7 col-xs-12" value="{{$data->kode_rekening}}"> -->
                    {{ Form::select('kode_rekening', $bank, $data->kode_rekening, ['class' => 'form-control selectpicker', 'data-size' => '7', 'data-live-search' => 'true', 'data-toggle'=>'ajax','id'=>'no_rekening','title'=>'Pilih No Rekening']) }} 
                  </div>
                </div>
                <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="kode">Tanggal<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="date" id="kode" value="{{$data->tanggal}}" name="tanggal" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="kode">Kode<span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" id="kode" name="kode" value="{{$data->kode}}" required="required" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>
                <div class="form-group">
                  <label for="uraian" class="control-label col-md-3 col-sm-3 col-xs-12">Uraian</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="uraian" class="form-control col-md-7 col-xs-12" type="text" value="{{$data->uraian}}" name="uraian">
                  </div>
                </div>
                <div class="form-group">
                    <label for="volume" class="control-label col-md-3 col-sm-3 col-xs-12">Volume</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input id="volume" class="form-control col-md-7 col-xs-12" value="{{$data->volume}}" type="text" name="volume">
                    </div>
                </div>
                <div class="form-group">
                    <label for="satuan" class="control-label col-md-3 col-sm-3 col-xs-12">Satuan</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input id="satuan" class="form-control col-md-7 col-xs-12" value="{{$data->satuan}}" type="text" name="satuan">
                    </div>
                </div>
                <div class="form-group">
                    <label for="harga" class="control-label col-md-3 col-sm-3 col-xs-12">Tarif Harga</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input id="harga" class="form-control col-md-7 col-xs-12 currency_format" value="{{$data->tarif_harga}}" type="text" name="tarif_harga">
                    </div>
                </div>
                <div class="form-group">
                    <label for="triwulan1" class="control-label col-md-3 col-sm-3 col-xs-12">Triwulan 1</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input id="triwulan1" class="form-control col-md-7 col-xs-12 currency_format" value="{{$data->triwulan1}}" type="text" name="triwulan1">
                    </div>
                </div>
                <div class="form-group">
                    <label for="triwulan2" class="control-label col-md-3 col-sm-3 col-xs-12">Triwulan 2</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input id="triwulan2" class="form-control col-md-7 col-xs-12 currency_format" type="text" name="triwulan2" value="{{$data->triwulan2}}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="triwulan3" class="control-label col-md-3 col-sm-3 col-xs-12">Triwulan 3</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input id="triwulan3" class="form-control col-md-7 col-xs-12 currency_format" type="text" name="triwulan3" value="{{$data->triwulan3}}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="triwulan4" class="control-label col-md-3 col-sm-3 col-xs-12">Triwulan 4</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input id="triwulan4" class="form-control col-md-7 col-xs-12 currency_format" type="text" name="triwulan4" value="{{$data->triwulan4}}">
                    </div>
                </div>
               
                <div class="alert alert-danger alert-dismissible fade in" role="alert" style="display: none">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                  </button>
                      <ul class="main-error">
                          
                      </ul>
                </div>
  
                <div class="ln_solid"></div>
                <div class="form-group">
                  <div class="row text-center">
                    <button type="button" onclick="post_data_page('komponen_data/belanja/update/{{$data->id}}','Data Belanja','form_belanja_edit','Update','tb_belanja','komponen_data/belanja')" class="btn btn-success">Submit</button>
                    <a class="btn btn-danger" role="button" href="{{route('belanja')}}">Cancel</a>
                   
                  </div>
                </div>

              </form>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
  <!-- /page content -->
@endsection
