<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\mainprogram;
use DataTables;

class mainprogramController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('administrator.rkas.komponen_data.mainprogram.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function NumberAutomatic(){
        $nomor = mainprogram::orderBy('id','desc')->first();
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
        $autoNumber = $this->NumberAutomatic();
        return view('administrator.rkas.komponen_data.mainprogram.form',compact('autoNumber'));
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
            'kode'=>'required',
            'uraian'=>'required',
        ]);

        $data = new mainprogram();
        $data->kode = $request->kode;
        $data->uraian = $request->uraian;
        $data->keterangan = $request->keterangan;
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
        $data = mainprogram::where('id',$id)->first();
        return view('administrator.rkas.komponen_data.mainprogram.edit',compact('data'));
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
            'kode'=>'required',
            'uraian'=>'required',
        ]);

        $data = mainprogram::where('id',$id)->first();
        $data->kode = $request->kode;
        $data->uraian = $request->uraian;
        $data->keterangan = $request->keterangan;
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
        $data = mainprogram::where('id',$id)->first();
        $data->delete();
    }

    public function getall(){
        $data = mainprogram::all();      
        return DataTables::of($data)->rawColumns([])->make(true);
    }
}
