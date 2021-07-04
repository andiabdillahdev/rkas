<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\bukuPembantuPajak;
use App\penerimaan;
use DataTables;
use PDF;

class bukuPembantuPajakController extends Controller
{
    public function index(){
        return view('bendahara.lpj.buku_pmb_pajak.index');
    }

    public function NumberAutomatic(){
        $nomor = bukuPembantuPajak::orderBy('id','desc')->first();
        if (empty($nomor)) {
            $result = "01";
        }else{
            $getString = $nomor['no_kode'];
            $getFirst = substr($getString,1,1);
            $inc = intval($getFirst) + 1;
            $result =  0 .''. $inc;
        }
        return $result;
     }

    public function create(){ 
        $autoNumber = $this->NumberAutomatic();
        return view('bendahara.lpj.buku_pmb_pajak.form',compact('autoNumber'));
    }

    public function store(Request $request){

        $this->validate($request, [
            'tanggal'=>'required',
            'no_kode'=>'required',
            'no_bukti'=>'required',
            'no_kode'=>'required',
            'uraian'=>'required',
            'no_kode'=>'required',
            'nominal'=>'required',
            'status_transaksi'=>'required',
        ]);


        $data = new bukuPembantuPajak();
        $data->tanggal = $request->tanggal;
        $data->no_kode = $request->no_kode;
        $data->no_bukti = $request->no_bukti;
        $data->uraian = $request->uraian;
        $data->nominal = str_replace(',','',$request->nominal);
        $data->status_transaksi = $request->status_transaksi;
        $data->kode_pajak = $request->kode_pajak;
        $data->save();

    }

    public function getAll(){
        $data = bukuPembantuPajak::all();
        return DataTables::of($data)->rawColumns([])->make(true);
    }

    public function edit($id){
        $data = bukuPembantuPajak::where('id',$id)->first();
        return view('bendahara.lpj.buku_pmb_pajak.edit',compact('data'));
    }

    public function update(Request $request,$id){
            $this->validate($request, [
            'tanggal'=>'required',
            'no_kode'=>'required',
            'no_bukti'=>'required',
            'no_kode'=>'required',
            'uraian'=>'required',
            'no_kode'=>'required',
            'nominal'=>'required',
            'status_transaksi'=>'required',
        ]);
            
        $data = bukuPembantuPajak::where('id',$id)->first();
        $data->tanggal = $request->tanggal;
        $data->no_kode = $request->no_kode;
        $data->no_bukti = $request->no_bukti;
        $data->uraian = $request->uraian;
        $data->nominal = str_replace(',','',$request->nominal);
        $data->status_transaksi = $request->status_transaksi;
        if ($request->status_transaksi == 'Debit') {
            $data->kode_pajak = $request->kode_pajak;
        } else {
            $data->kode_pajak = null;
        }
        $data->save();

    }

    public function delete($id){
        $data = bukuPembantuPajak::where('id',$id)->first();
        $data->delete();   
    }

    public function konvertPDF(){
        $data = bukuPembantuPajak::all();
        $penerimaan = penerimaan::all();
        $pdf = PDF::loadView('bendahara.lpj.buku_pmb_pajak.pdfPajak', compact('data','penerimaan'))->setPaper('a4', 'landscape')->setWarnings(false);
        return $pdf->stream();
    }
}
