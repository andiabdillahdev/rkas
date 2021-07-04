<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\pegawai;
use App\siswa;
use App\belanja;
use App\penerimaan;
use App\sekolah;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:administrator');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function bendahara_index(){
        return view('bendaharahome');
    }

    public function sekolah(){
        $data = sekolah::where('id',1)->first();
        return view('administrator.sekolah.index',compact('data'));
    }

    public function update(Request $request,$id){
        $data = sekolah::where('id',1)->first();
        $data->nama = $request['nama'];
        $data->nispn = $request['nispn'];
        $data->nss = $request['nss'];
        $data->alamat = $request['alamat'];
        $data->rt_rw = $request['rt_rw'];
        $data->email = $request['email'];
        $data->dusun = $request['dusun'];
        $data->desa = $request['desa'];
        $data->kecamatan = $request['kecamatan'];
        $data->kabupaten = $request['kabupaten'];
        $data->provinsi = $request['provinsi'];
        $data->kodepos = $request['kodepos'];
        $data->no_rekening = $request['no_rekening'];
        $data->nama_rekening = $request['nama_rekening'];
        $data->nama_bank = $request['nama_bank'];
        $data->npwp = $request['npwp'];
        $data->email = $request['email'];
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
