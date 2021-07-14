<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\rekening;
use DataTables;

class rekeningController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('administrator.rekening.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('administrator.rekening.add');
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
            'no_rekening'=>'required|numeric',
            'bank'=>'required',
            'kode'=>'required',
            'atas_nama'=>'required'
        ]);

        $data = new rekening();
        $data->no_rekening = $request['no_rekening'];
        $data->bank = $request['bank'];
        $data->kode = $request['kode'];
        $data->atas_nama = $request['atas_nama'];
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = rekening::where('id',$id)->first();
        return view('administrator.rekening.edit',compact('data'));
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
            'no_rekening'=>'required|numeric',
            'bank'=>'required',
            'kode'=>'required',
            'atas_nama'=>'required'
        ]);

        $data = rekening::where('id',$id)->first();
        $data->no_rekening = $request['no_rekening'];
        $data->bank = $request['bank'];
        $data->kode = $request['kode'];
        $data->atas_nama = $request['atas_nama'];
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
        $data = rekening::where('id',$id)->first();
        $data->delete();
    }

    public function getall(){
        $data = rekening::all();      
        return DataTables::of($data)->make(true);
    }

}
