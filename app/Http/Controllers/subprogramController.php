<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\subprogram;
use App\mainprogram;
use DataTables;

class subprogramController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('administrator.rkas.komponen_data.subprogram.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

   

    public function create()
    {
        $data = $this->get_main_program();
        return view('administrator.rkas.komponen_data.subprogram.form',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $data = new subprogram();
       $data->id_main = $request->main_program;
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
        $main = $this->get_main_program();
        $data = subprogram::where('id',$id)->first();
       return view('administrator.rkas.komponen_data.subprogram.edit',compact('data','main'));
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
        $data = subprogram::where('id',$id)->first();
        $data->id_main = $request->main_program;
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
        $data = subprogram::where('id',$id)->first();
        $data->delete();
    }

    public function getall(){
        $data = subprogram::all();
        return DataTables::of($data)->editColumn('main_program', function ($data) {
            return $data['mainprogram'] ? $data['mainprogram']['uraian'] : NULL;
        })->rawColumns([])->make(true);
    }

    public function get_main_program(){
        $data = mainprogram::all();
        return collect($data)->pluck('uraian', 'id')->toArray();
    }

    public function get_sub($id){
        $data = subprogram::where('id_main',$id)->get();
        return collect($data)->pluck('uraian', 'id')->toArray();
    }

    public function get_kode($params){
        $data = mainprogram::where('id',$params)->first();
        $nomor = subprogram::orderBy('id','desc')->first();
        $getFirst = '';
        if (empty($nomor)) {
            $getString = $data['kode'];
            $result = $getString .'.'."01";
        }else {
            $getString = $data['kode'];
            $kodeSub = $nomor['kode'];
            $getFirst = substr($kodeSub,4,1);
            $operation = intval($getFirst) + 1;
            $result = $getString .'.'.'0'. $operation;
        } 
        return response()->json($result); 
    }

}
