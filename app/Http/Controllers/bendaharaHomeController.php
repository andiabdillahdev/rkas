<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\sekolah;
use App\pegawai;
use App\siswa;
use App\belanja;
use App\penerimaan;
use App\lpj;
use Yajra\DataTables\DataTables;

class bendaharaHomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:bendahara');
    }

    public function index(){
        return view('bendahara.index');
    }

    public function anggaran(){
        return view('bendahara.anggaran.index');
    }

    public function update_status(Request $request){
        $id = $request['id'];
        $value_status = $request['value_status'];

        $data = belanja::where('id',$id)->first();
        $data->status = $value_status;
        $data->save();
    }

    public function getData(){
        $pegawai = pegawai::all();
        $siswa = siswa::all();
        $itemTerkirim = belanja::where('status','Di Tolak')->get();
        $itemProses = belanja::where('status','proses')->get();
        $itemValid = belanja::where('status','Di Terima')->get();
        $anggaran = penerimaan::all();

        return response()->json([
            'pegawai'=>$pegawai,
            'siswa'=>$siswa,
            'itemTerkirim'=>$itemTerkirim,
            'itemProses'=>$itemProses,
            'itemValid'=>$itemValid,
            'anggaran'=>$anggaran
        ]);
    }

    public function lihat_data($id){
        $data = belanja::with(['main_program','sub_program','bukti_penggunaan_dana'])->where('id',$id)->first();

        return view('bendahara.anggaran.show',compact('data'));
    }

    public function belanjabyproses(){
        $data = belanja::where('status','proses')->get();
        return DataTables::of($data)->rawColumns([''])->make(true);
    }

    public function belanjabytolak(){
        $data = belanja::where('status','Di Tolak')->get();
        return DataTables::of($data)->rawColumns([''])->make(true);
    }

    public function belanjabyterima(){
        $data = belanja::where('status','Di Terima')->get();
        return DataTables::of($data)->rawColumns([''])->make(true);
    }

    public function sekolah(){
        $data = sekolah::where('id',1)->first();
        return view('bendahara.sekolah',compact('data'));
    }

    public function pegawai(){
        return view('bendahara.pegawai');
    }

    public function siswa(){
        return view('bendahara.siswa');
    }

}
