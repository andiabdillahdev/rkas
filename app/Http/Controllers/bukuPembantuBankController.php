<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\bukuPembantuBank;
use App\penerimaan;
use Yajra\DataTables\DataTables;
use PDF;

class bukuPembantuBankController extends Controller
{
    public function index(){
        $data = bukuPembantuBank::all();
        return view('bendahara.lpj.buku_pmb_bank.index',compact('data'));
    }

    public function NumberAutomatic(){
        $nomor = bukuPembantuBank::orderBy('id','desc')->first();
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
        return view('bendahara.lpj.buku_pmb_bank.form',compact('autoNumber'));
    }

    public function store(Request $request){

        $this->validate($request, [
            'tanggal'=>'required',
            'no_kode'=>'required',
            'no_bukti'=>'required',
            'uraian'=>'required',
            'nominal'=>'required',
            'status_transaksi'=>'required',
        ]);

        $data = new bukuPembantuBank();
        $data->tanggal = $request->tanggal;
        $data->no_kode = $request->no_kode;
        $data->no_bukti = $request->no_bukti;
        $data->uraian = $request->uraian;
        $data->nominal = str_replace(',','',$request->nominal);
        $data->status_transaksi = $request->status_transaksi;
        $data->save();

    }

    public function edit($id){
        $data = bukuPembantuBank::where('id',$id)->first();
        return view('bendahara.lpj.buku_pmb_bank.edit',compact('data'));
    }

    public function update(Request $request,$id){
        $data = bukuPembantuBank::where('id',$id)->first();
        $data->tanggal = $request->tanggal;
        $data->no_kode = $request->no_kode;
        $data->no_bukti = $request->no_bukti;
        $data->uraian = $request->uraian;
        $data->nominal = str_replace(',','',$request->nominal);
        $data->status_transaksi = $request->status_transaksi;
        $data->save();

    }

    public function delete($id){
        $data = bukuPembantuBank::where('id',$id)->first();
        $data->delete();
    }

    public function getAll(){
        $data = bukuPembantuBank::all();
        return DataTables::of($data)->rawColumns([])->make(true);
    }

    public function konvertPDF(){
        $data = bukuPembantuBank::all();
        $penerimaan = penerimaan::all();
        $pdf = PDF::loadView('bendahara.lpj.buku_pmb_bank.pdfPmbBank', compact('data','penerimaan'))->setPaper('a4', 'landscape')->setWarnings(false);
        return $pdf->stream();
    }

}
