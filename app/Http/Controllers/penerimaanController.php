<?php

namespace App\Http\Controllers;

use App\belanja;
use Illuminate\Http\Request;
use App\penerimaan;
use App\mainprogram;
use DataTables;
use PDF;
class penerimaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('administrator.rkas.penerimaan.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('administrator.rkas.penerimaan.form');
    }

    public function rkasView(){
        $belanja = mainprogram::with(['subprogram','itemprogram','belanja'])->get();
        $penerimaan = penerimaan::all();
        // return response()->json($belanja);
        $pdf = PDF::loadView('administrator.keloladata.pdfDataRkas', compact('belanja','penerimaan'))->setPaper([0, 0, 685.98, 1000], 'landscape')->setWarnings(false);
        return $pdf->stream();

    }

    public function rkasDataGet(){
        $data = mainprogram::with(['subprogram','itemprogram','belanja'])->get();
        // return response()->json($data);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new penerimaan();
        $data->kode = $request->kode;
        $data->keterangan = $request->keterangan;
        $data->nominal = str_replace(',','',$request->nominal);
        $data->ta = date('Y');
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
        $data = penerimaan::where('id',$id)->first();
        return view('administrator.rkas.penerimaan.edit',compact('data'));
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
        $data = penerimaan::where('id',$id)->first();
        $data->kode = $request->kode;
        $data->keterangan = $request->keterangan;
        $data->nominal = $request->nominal;
        $data->ta = date('Y');
        $data->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $data = penerimaan::where('id',$id)->first();
        $data->delete();
    }

    public function getall(){
        $data = penerimaan::all();      
        return DataTables::of($data)->make(true);
    }

}
