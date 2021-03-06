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
                <h2>Buku Pembantu Bank</h2>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">

              <form id="form_pembantu_bank" class="form-horizontal form-label-left">

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="kode_rekening">No Kode<span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        {!! Form::text('no_kode',$autoNumber, ['class'=>'form-control col-md-7 col-xs-12','placeholder'=>'Masukkan Kode','id'=>'kode']) !!}
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="kode_rekening">Tanggal<span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                       <input type="date" name="tanggal" class="form-control">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="bukti">No Bukti<span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        {!! Form::text('no_bukti',null, ['class'=>'form-control col-md-7 col-xs-12','placeholder'=>'Masukkan No Bukti','id'=>'bukti']) !!}
                    </div>
                  </div>


                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="bukti">Uraian<span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        {!! Form::text('uraian',null, ['class'=>'form-control','placeholder'=>'Masukkan uraian Manual','id'=>'uraian']) !!}
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="penerimaan">Nominal<span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        {!! Form::text('nominal',0, ['class'=>'form-control col-md-7 col-xs-12 currency_format','placeholder'=>'Masukkan Nominal','id'=>'penerimaan']) !!}
                    </div>
                  </div>
    
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="status_transaksi">Status Transaksi<span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        {!! Form::select('status_transaksi',['Debit'=>'Debit','Kredit'=>'Kredit'],null, ['class'=>'form-control selectpicker col-md-7 col-xs-12','title'=>'Masukkan Status Transaksi','id'=>'status_transaksi']) !!}
                    </div>
                  </div>


                  <div class="form-group">
                    <div class="row text-center">
                      <button type="button" onclick="post_data_page('bendahara/buku-pembantu-bank/store','Data Buku Pembantu Pajak','form_pembantu_bank','tambah','tbl_kas_umum','bendahara/buku-pembantu-bank')" class="btn btn-success">Submit</button>
                      <a href="{{route('pmbBank.home')}}" class="btn btn-danger" role="button">Cancel</a>
                     
                    </div>
                  </div>

            </form>

             <div class="alert alert-danger alert-dismissible fade in" role="alert" style="display: none">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">??</span>
              </button>
                  <ul class="main-error">
                      
                  </ul>
            </div>

            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
  <!-- /page content -->
@endsection

