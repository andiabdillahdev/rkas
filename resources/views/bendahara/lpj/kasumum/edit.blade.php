@extends('layouts.headsecond')
@section('konten')
<!-- page content -->
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
                <h2>Kas Umum</h2>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">

              <form id="form_kas_umum_edit" class="form-horizontal form-label-left">

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="kode_rekening">No Kode<span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        {!! Form::text('kode',$data['kode'], ['class'=>'form-control col-md-7 col-xs-12','placeholder'=>'Masukkan Kode','id'=>'kode']) !!}
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="kode_rekening">Tanggal<span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                       <input type="date" value="{{$data['tanggal']}}" name="tanggal" class="form-control">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="bukti">No Bukti<span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        {!! Form::text('no_bukti',$data['no_bukti'], ['class'=>'form-control col-md-7 col-xs-12','placeholder'=>'Masukkan No Bukti','id'=>'bukti']) !!}
                    </div>
                  </div>


                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="bukti">Pilih Uraian<span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                       
                      <div class="row">
                            <div class="col-md-6">
                              <button type="button" onclick="manualButton()" class="btn btn-default btn-xs">Manual</button>
                              <button type="button" onclick="itemButton()" class="btn btn-primary btn-xs">Pilih Item Belanja</button>
                            </div>
                            <div class="col-md-6">

                              <div id="manual">
                                {!! Form::text('uraians',null, ['class'=>'form-control','placeholder'=>'Masukkan uraian Manual','id'=>'uraian']) !!}
                              </div>

                              <div id="itemProgress">
                                {{ Form::select('uraianx',$item,null, ['title' => 'Pilih Item Belanja','class' => 'form-control selectpicker', 'data-size' => '7', 'data-live-search' => 'true', 'data-toggle'=>'ajax', 'id' => 'main_program_form']) }}
                              </div>

                            </div>
                        </div>
                    </div>
                  </div>
    
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nominal">Nominal<span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        {!! Form::text('nominal',$data['nominal'], ['class'=>'form-control col-md-7 col-xs-12 currency_format','placeholder'=>'Masukkan Nominal','id'=>'nominal']) !!}
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="status_transaksi">Status Transaksi<span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        {!! Form::select('status_transaksi',['Debit'=>'Debit','Kredit'=>'Kredit'],null, ['class'=>'form-control selectpicker col-md-7 col-xs-12','title'=>'Status Transaksi','id'=>'status_transaksi']) !!}
                    </div>
                  </div>

                    <input type="hidden" id="status" name="status">

                  <div class="form-group">
                    <div class="row text-center">
                      <button type="button" onclick="post_data_page('bendahara/kas-umum/update/{{$data['id']}}','Data Kas Umum','form_kas_umum_edit','Update','tbl_kas_umum','bendahara/kas-umum')" class="btn btn-success">Submit</button>
                      <a href="{{route('kasUmum.home')}}" class="btn btn-danger" role="button">Cancel</a>
                     
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
@push('scriptSecond')
    <script>
      $(function () {

        var data = {!! json_encode($data) !!};

       manualButton = () =>{
        $('#manual').show();
        $('#itemProgress').hide();
       }

       itemButton = () =>{
        $('#itemProgress').show();
        $('#manual').hide();
       }

       if (data.status == 1) {
            $('#status').val(1);
            $('#uraian').val(data.uraian)
            manualButton();
        }else{
           itemButton();
           $('.selectpicker').selectpicker('val', data.uraian)
        }

        $('#status_transaksi').selectpicker('val', data.status_transaksi)

      })
    </script>
@endpush
