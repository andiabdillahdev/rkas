<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\sekolah;
use App\pegawai;
use App\siswa;
use App\belanja;
use App\penerimaan;
use App\lpj;

class kepsekController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:kepsek');
    }

    public function index(){
        return view('kepsek.index');
    }

    public function sekolah(){
        $data = sekolah::where('id',1)->first();
        return view('kepsek.sekolah',compact('data'));
    }

    public function pegawai(){
        return view('kepsek.pegawai');
    }

    public function siswa(){
        return view('kepsek.siswa');
    }

    public function lpj(){
        $data = lpj::all();
        return view('kepsek.lpj',compact('data'));
    }

    public function submitToBendahara(Request $request){
        $data = lpj::where('id',1)->first();
        $data->status = $request['status'];
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

}
