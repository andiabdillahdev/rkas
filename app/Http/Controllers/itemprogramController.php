<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\mainprogram;
use App\subprogram;
use App\itemprogram;
use DataTables;

class itemprogramController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('administrator.rkas.komponen_data.itemprogram.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $main_program = $this->get_main_program();
        $sub_program = $this->get_sub_program();
        return view('administrator.rkas.komponen_data.itemprogram.form',compact('main_program','sub_program'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new itemprogram();
        $data->id_main = $request->main_program;
        $data->id_sub = $request->sub_program;
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
        $data = itemprogram::where('id',$id)->first();
        $main_program = $this->get_main_program();
        $sub = $this->get_sub_programBy($data['id_main']);
        return view('administrator.rkas.komponen_data.itemprogram.edit',compact('main_program','data','sub'));
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
        $data = itemprogram::where('id',$id)->first();
        $data->id_main = $request->main_program;
        $data->id_sub = $request->sub_program;
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
     
        $data = itemprogram::where('id',$id)->first();
        $data->delete();
    }

    public function getall(){
        $data = itemprogram::with(['mainprogram', 'subprogram'])->get();
        return DataTables::of($data)->editColumn('main_program', function ($data) {
            return $data['mainprogram'] ? $data['mainprogram']['kode'] : NULL;
        })->editColumn('sub_program', function ($data) {
            return $data['subprogram'] ? $data['subprogram']['kode'] : NULL;
        })->rawColumns([])->make(true);
    }

    public function get_main_program(){
        $data = mainprogram::all();
        return collect($data)->pluck('uraian', 'id')->toArray();
    }

    public function get_sub_program(){
        $data = subprogram::all();
        return collect($data)->pluck('uraian', 'id')->toArray();
    }

    public function get_sub_programBy($id){
        $data = subprogram::where('id_main',$id)->get();
        return collect($data)->pluck('uraian', 'id')->toArray();
    }

    public function get_item($id){
        $data = itemprogram::where('id_sub',$id)->get();
        return collect($data)->pluck('uraian', 'id')->toArray();
    }

    public function get_kode($params){
        $data = subprogram::where('id',$params)->first();
        $nomor = itemprogram::orderBy('id','desc')->first();
        $getFirst = '';
        if (empty($nomor)) {
            $getString = $data['kode'];
            $result = $getString .'.'."01";
        }else {
            $getString = $data['kode'];
            $kodeSub = $nomor['kode'];
            $getFirst = substr($kodeSub,7,1);
            $operation = intval($getFirst) + 1;
            $result = $getString .'.'.'0'. $operation;
        } 
        return response()->json($result);
    }

}
