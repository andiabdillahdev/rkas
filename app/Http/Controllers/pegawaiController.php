<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\pegawai;
use DataTables;

class pegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('administrator.pegawai.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('administrator.pegawai.form');
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
            'nip'=>'required',
            'jabatan'=>'required',
            'masa_kerja'=>'required',
            'alamat'=>'required',
        ]);
       
        $data = new pegawai();
        $data->nama = $request->nama;
        $data->nip = $request->nip;
        $data->jk = $request->jk;
        $data->tgl_lahir = $request->tgl_lahir;
        $data->agama = $request->agama;
        $data->status = $request->status;
        $data->jabatan = $request->jabatan;
        $data->masa_kerja = $request->masa_kerja;
        $data->jml_jam = $request->jml_jam;
        $data->tgs_tambahan = $request->tgs_tambahan;
        $data->alamat = $request->alamat;
        $data->no_tlp = $request->no_tlp;
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
        $data = pegawai::where('id',$id)->first();
        return view('administrator.pegawai.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $url_update = '/pegawai/update/'.$id;
        $data = pegawai::where('id',$id)->first();
        return view('administrator.pegawai.edit',compact('data','url_update'));
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
            'nip'=>'required',
            'jabatan'=>'required',
            'masa_kerja'=>'required',
            'alamat'=>'required',
        ]);

        $data = pegawai::where('id',$id)->first();
        $data->nama = $request->nama;
        $data->nip = $request->nip;
        $data->jk = $request->jk;
        $data->tgl_lahir = $request->tgl_lahir;
        $data->agama = $request->agama;
        $data->status = $request->status;
        $data->jabatan = $request->jabatan;
        $data->masa_kerja = $request->masa_kerja;
        $data->jml_jam = $request->jml_jam;
        $data->tgs_tambahan = $request->tgs_tambahan;
        $data->alamat = $request->alamat;
        $data->no_tlp = $request->no_tlp;
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
        $data = pegawai::where('id',$id)->first();
        $data->delete();
    }

    public function getall(){
        
        $data = pegawai::all();      
        return DataTables::of($data)->addColumn('actions', function($data) {
            return view('layouts.aksi', [
                'url_edit'=> '/pegawai/edit/'.$data->id,
                'url_destroy'=> '/pegawai/destroy/'.$data->id,
                'title' => 'Update Data Pegawai'
            ]);
        })->addIndexColumn()->rawColumns(['actions'])->make(true);
    }

    public function dataGrafik(){
        $pns = pegawai::where('status','PNS')->get();
        $honor = pegawai::where('status','Honorer')->get();
        return response()->json([
            'pns' => count($pns),
            'honorer' => count($honor)
        ]);

    }

}
