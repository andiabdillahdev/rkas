<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\mainprogram;
use Yajra\DataTables\DataTables;
use App\belanja;
use App\subprogram;
use App\itemprogram;
use App\buktipenggunaandana;
use App\rekening;

class belanjaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('administrator.rkas.belanja.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function NumberAutomatic(){
        $nomor = belanja::orderBy('id','desc')->first();
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

    public function create()
    {
        $mainprogram = $this->get_main_program();
        $bank = $this->get_rekening_bank();
        $autoNumber = $this->NumberAutomatic();
        return view('administrator.rkas.belanja.form',compact('mainprogram','bank','autoNumber'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     
        $this->validate($request, [
            'main_program'=>'required',
            'sub_program'=>'required',
            'item_program'=>'required',
            'kode_rekening'=>'required',
            'kode'=>'required',
            'uraian'=>'required',
            'tanggal'=>'required',
            'volume'=>'required|numeric',
            'satuan'=>'required',
            'tarif_harga'=>'required',
            'triwulan1'=>'required',
            'triwulan2'=>'required',
            'triwulan3'=>'required',
            'triwulan4'=>'required',
            'keterangan'=>'required',
            'bukti_sekolah'=>'required',
            'bukti_toko'=>'required',
        ]);

        $data = new belanja();
        $data->id_main = $request->main_program;
        $data->id_sub = $request->sub_program;
        $data->id_item = $request->item_program;
        $data->kode_rekening = $request->kode_rekening;
        $data->kode = $request->kode;
        $data->uraian = $request->uraian;
        $data->volume = $request->volume;
        $data->tanggal = $request->tanggal;
        $data->satuan = $request->satuan;
        $data->tarif_harga = str_replace(',','',$request->tarif_harga);
        $data->triwulan1 = str_replace(',','',$request->triwulan1);
        $data->triwulan2 = str_replace(',','',$request->triwulan2);
        $data->triwulan3 = str_replace(',','',$request->triwulan3);
        $data->triwulan4 = str_replace(',','',$request->triwulan4);
        $data->status = 'Proses';
        $data->save();

        for ($i=0; $i < count($request->keterangan) ; $i++) { 
            $file_bukti_sekolah = $request->file('bukti_sekolah')[$i];  
            $file_bukti_toko = $request->file('bukti_toko')[$i];
            $filename_bukti_sekolah = $file_bukti_sekolah->getClientOriginalName();
            $filename_bukti_toko = $file_bukti_toko->getClientOriginalName();
            $path_file_sekolah = 'struk/sekolah';
            $path_file_toko = 'struk/toko';
            $file_bukti_sekolah->move($path_file_sekolah,$filename_bukti_sekolah);
            $file_bukti_toko->move($path_file_toko,$filename_bukti_toko);

            $struk = new buktipenggunaandana();
            $struk->id_belanja = $data->id;
            $struk->keterangan = $request['keterangan'][$i];
            $struk->bukti_sekolah = $filename_bukti_sekolah;
            $struk->bukti_toko = $filename_bukti_toko;
            $struk->save();
        }

        

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = belanja::where('id',$id)->first();
        return view('administrator.rkas.belanja.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = belanja::where('id',$id)->first();
        $mainprogram = $this->get_main_program();
        $bank = $this->get_rekening_bank();
        $subprogram_all = subprogram::where('id_main',$data->id_main)->get();
        $itemprogram_all = itemprogram::where('id_sub',$data->id_sub)->get();
        $subprogram =  collect($subprogram_all)->pluck('uraian', 'id')->toArray();
        $itemprogram = collect($itemprogram_all)->pluck('uraian', 'id')->toArray();
        // dd($subprogram);
        return view('administrator.rkas.belanja.edit',compact('data','mainprogram','subprogram','itemprogram','bank'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'main_program'=>'required',
            'sub_program'=>'required',
            'item_program'=>'required',
            'kode_rekening'=>'required',
            'kode'=>'required',
            'uraian'=>'required',
            'tanggal'=>'required',
            'volume'=>'required|numeric',
            'satuan'=>'required',
            'tarif_harga'=>'required',
            'triwulan1'=>'required',
            'triwulan2'=>'required',
            'triwulan3'=>'required',
            'triwulan4'=>'required'
        ]);
      
        $data =  belanja::where('id',$id)->first();
        $data->id_main = $request->main_program;
        $data->id_sub = $request->sub_program;
        $data->id_item = $request->item_program;
        $data->kode_rekening = $request->kode_rekening;
        $data->kode = $request->kode;
        $data->uraian = $request->uraian;
        $data->volume = $request->volume;
        $data->satuan = $request->satuan;
        $data->tanggal = $request->tanggal;
        $data->tarif_harga = str_replace(',','',$request->tarif_harga);
        $data->triwulan1 = str_replace(',','',$request->triwulan1);
        $data->triwulan2 = str_replace(',','',$request->triwulan2);
        $data->triwulan3 = str_replace(',','',$request->triwulan3);
        $data->triwulan4 = str_replace(',','',$request->triwulan4);
        $data->status = 'Proses';
        $data->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = belanja::where('id',$id)->first();
        $data->delete(); 
    }

    public function get_main_program(){
        $data = mainprogram::all();
        return collect($data)->pluck('uraian', 'id')->toArray();
    }

    public function get_rekening_bank(){
        $tampung = [];
        $result = [];
        $data = rekening::all();
        foreach ($data as $key => $value) {
                $result[$value['kode']] = $value['kode'].' | '.$value['bank'].' | '.$value['no_rekening'];
        }			
        return $result;
    }

    public function getall(){
        $data = belanja::all();
        return DataTables::of($data)->rawColumns([''])->make(true);
    }
}
