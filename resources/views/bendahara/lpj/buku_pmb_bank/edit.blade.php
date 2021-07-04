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
                <h2>Update Buku Pembantu Bank</h2>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">

              <form id="form_pembantu_pajakEdit" class="form-horizontal form-label-left">

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="kode_rekening">Tanggal<span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                       <input type="date" name="tanggal" value="{{$data['tanggal']}}" class="form-control">
                    </div>
                  </div>

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="kode_rekening">No Kode<span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        {!! Form::text('no_kode',$data['no_kode'], ['class'=>'form-control col-md-7 col-xs-12','placeholder'=>'Masukkan Kode','id'=>'kode']) !!}
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
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="bukti">Uraian<span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        {!! Form::text('uraian',$data['uraian'], ['class'=>'form-control','placeholder'=>'Masukkan uraian Manual','id'=>'uraian']) !!}
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="penerimaan">Nominal<span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        {!! Form::text('nominal',$data['nominal'], ['class'=>'form-control col-md-7 col-xs-12 currency_format','placeholder'=>'Masukkan Nominal','id'=>'penerimaan']) !!}
                    </div>
                  </div>
    
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="status_transaksi">Status Transaksi<span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        {!! Form::select('status_transaksi',['Debit'=>'Debit','Kredit'=>'Kredit'],$data['status_transaksi'], ['class'=>'form-control selectpicker col-md-7 col-xs-12','title'=>'Masukkan No Bukti','id'=>'status_transaksi']) !!}
                    </div>
                  </div>

          <!--         <div id="jenis_pajak">
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="kode_pajak">Jenis Pajak (Debit)<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            {!! Form::select('kode_pajak',['PPN'=>'PPN','PPh 21'=>'PPh 21','PPh 22'=>'PPh 22','PPh 23'=>'PPh 23'],$data['kode_pajak'], ['class'=>'form-control selectpicker col-md-7 col-xs-12','title'=>'Masukkan Jenis Pajak','id'=>'kode_pajak']) !!}
                        </div>
                      </div>
                  </div> -->

                  <div class="form-group">
                    <div class="row text-center">
                      <button type="button" onclick="post_data_page('bendahara/buku-pembantu-bank/update/{{$data['id']}}','Data Buku Pembantu Bank','form_pembantu_pajakEdit','Update','tbl_pmb_pajak','bendahara/buku-pembantu-bank')" class="btn btn-success">Submit</button>
                      <a href="{{route('pmbBank.home')}}" class="btn btn-danger" role="button">Cancel</a>
                     
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


