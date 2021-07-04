<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\kasUmum;
use App\itemprogram;
use App\penerimaan;
use PDF;
class kasUmumController extends Controller
{
    public function index(){
        $saldo = penerimaan::where('id',2)->first();
        $data = kasUmum::all();
        return view('bendahara.lpj.kasumum.index',compact('saldo','data'));
    }

    public function NumberAutomatic(){
        $nomor = kasUmum::orderBy('id','desc')->first();
        if (empty($nomor)) {
            $result = "01";
        }else{
            $getString = $nomor['kode'];
            $getFirst = substr($getString,1,1);
            $inc = intval($getFirst) + 1;
            $result =  0 .''. $inc;
        }
        return $result;
     }

    public function create(){
        $item = $this->get_item_program();
        $autoNumber = $this->NumberAutomatic();
        return view('bendahara.lpj.kasumum.form',compact('item','autoNumber'));
    }

    public function store(Request $request){

        $this->validate($request, [
            'kode'=>'required',
            'tanggal'=>'required',
            'no_bukti'=>'required',
            'nominal'=>'required',
            'status_transaksi'=>'required',
        ]);

        $value_uraian = '';

        if ($request['uraians'] == null) {
            $value_uraian = $request['uraianx'];
        }else{
            $value_uraian = $request['uraians'];
        }

        $data = new kasUmum();
        $data->kode = $request->kode;
        $data->tanggal = $request->tanggal;
        $data->no_bukti = $request->no_bukti;
        $data->uraian = $value_uraian;
        $data->status = $request->status;
        $data->nominal = str_replace(',','',$request->nominal);
        $data->status_transaksi = $request->status_transaksi;
        $data->save();
    }

    public function edit($id){
        $data = kasUmum::where('id',$id)->first();
        $item = $this->get_item_program();
        // return response()->json($data);
        return view('bendahara.lpj.kasumum.edit',compact('data','item'));
    }

    public function update(Request $request,$id){
           $this->validate($request, [
                    'kode'=>'required',
                    'tanggal'=>'required',
                    'no_bukti'=>'required',
                    'nominal'=>'required',
                    'status_transaksi'=>'required',
                ]);

                $value_uraian = '';

                if ($request['uraians'] == null) {
                    $value_uraian = $request['uraianx'];
                }else{
                    $value_uraian = $request['uraians'];
                }

           $data = kasUmum::where('id',$id)->first();
                $data->kode = $request->kode;
                $data->tanggal = $request->tanggal;
                $data->no_bukti = $request->no_bukti;
                $data->uraian = $value_uraian;
                $data->status = $request->status;
                $data->nominal = str_replace(',','',$request->nominal);
                $data->status_transaksi = $request->status_transaksi;
                $data->save();
    }

    public function delete($id){
        $data = kasUmum::where('id',$id)->first();
        $data->delete();
    }

    public function get_item_program(){
        $data = itemprogram::all();
        return collect($data)->pluck('uraian', 'uraian')->toArray();
    }

    public function pilihRkas(){
        return view('bendahara.lpj.kasumum.pilihrkas');
    }

    public function getAll(){
        $data = kasUmum::all();
        return DataTables::of($data)->rawColumns([''])->make(true);
    }

    public function konvertPDF(){
        $data = kasUmum::all();
        $penerimaan = penerimaan::all();
        // return response()->json($data);
        $pdf = PDF::loadView('bendahara.lpj.kasumum.pdfView', compact('data','penerimaan'))->setPaper('a4', 'landscape')->setWarnings(false);
        return $pdf->stream();
    }
}
