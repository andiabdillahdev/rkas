<?php

namespace App\Http\Controllers;

use App\pegawai;
use Illuminate\Http\Request;
use App\siswa;
use DataTables;

class siswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('administrator.siswa.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kelas = [
            1=>1,
            2=>2,
            3=>3,
            4=>4,
            5=>5,
            6=>6,
        ];
        return view('administrator.siswa.form',compact('kelas'));
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
            'nama'=>'required',
            'nis'=>'required',
            'status'=>'required',
            'alamat_siswa'=>'required',
        ]);

        $data = new siswa();
        $data->nama = $request->nama;
        $data->nis = $request->nis;
        $data->jk = $request->jk;
        $data->tgl_lahir = $request->tgl_lahir;
        $data->agama = $request->agama;
        $data->anak_ke = $request->anak_ke;
        $data->status = $request->status;
         $data->pend_sblmnya = $request->pend_sblmnya;
         $data->alamat_siswa = $request->alamat_siswa;
         $data->ayah = $request->ayah;
         $data->ibu = $request->ibu;
         $data->wali_ayah = $request->wali_ayah;
         $data->wali_ibu = $request->wali_ibu;
         $data->no_telp = $request->no_telp;
         $data->kelas = $request->kelas;
         $data->save();


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = siswa::where('id',$id)->first();
        return view('administrator.siswa.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $url_update = '/siswa/update/'.$id;
        $data = siswa::where('id',$id)->first();
        $kelas = [
            1=>1,
            2=>2,
            3=>3,
            4=>4,
            5=>5,
            6=>6,
        ];
        return view('administrator.siswa.edit',compact('data','url_update','kelas'));
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
            'nama'=>'required',
            'nis'=>'required',
            'status'=>'required',
            'alamat_siswa'=>'required',
        ]);

        $data = siswa::where('id',$id)->first();
        $data->nama = $request->nama;
        $data->nis = $request->nis;
        $data->jk = $request->jk;
        $data->tgl_lahir = $request->tgl_lahir;
        $data->agama = $request->agama;
        $data->anak_ke = $request->anak_ke;
        $data->status = $request->status;
         $data->pend_sblmnya = $request->pend_sblmnya;
         $data->alamat_siswa = $request->alamat_siswa;
         $data->ayah = $request->ayah;
         $data->ibu = $request->ibu;
         $data->wali_ayah = $request->wali_ayah;
         $data->wali_ibu = $request->wali_ibu;
         $data->no_telp = $request->no_telp;
         $data->kelas = $request->kelas;
         $data->save();

    }

    public function dataGrafik(){
        $laki = siswa::where('jk','Laki-Laki')->get();
        $perempuan = siswa::where('jk','Perempuan')->get();
        $kelas1 = siswa::where('kelas','1')->get();
        $kelas2 = siswa::where('kelas','2')->get();
        $kelas3 = siswa::where('kelas','3')->get();
        $kelas4 = siswa::where('kelas','4')->get();
        $kelas5 = siswa::where('kelas','5')->get();
        $kelas6 = siswa::where('kelas','6')->get();


        return response()->json([
            'laki'=>count($laki),
            'perempuan'=>count($perempuan),
            'kelas1'=>count($kelas1),
            'kelas2'=>count($kelas2),
            'kelas3'=>count($kelas3),
            'kelas4'=>count($kelas4),
            'kelas5'=>count($kelas5),
            'kelas6'=>count($kelas6),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = siswa::where('id',$id)->first();
        $data->delete();
    }

    public function getall(){
        
        $data = siswa::all();      
        return DataTables::of($data)->addColumn('actions', function($data) {
            return view('layouts.aksi', [
                'url_edit'=> '/siswa/edit/'.$data->id,
                'url_destroy'=> '/siswa/destroy/'.$data->id,
                'title' => 'Update Data Siswa'
            ]);
        })->addIndexColumn()->rawColumns(['actions'])->make(true);
    
    }

}
