<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use App\User;
use App\bendahara;
use App\kepsek;
use Illuminate\Support\Facades\Hash;

class kelolaUserController extends Controller
{
    public function index(){
        return view('administrator.kelolaUser.index');
    }

    public function data_user_staff_table(){
        $data = User::all();
        return DataTables::of($data)->rawColumns([])->make(true);
    }

    public function data_user_bendahara(){
        $data = bendahara::all();
        return DataTables::of($data)->rawColumns([])->make(true);
    }

    public function data_user_kepsek(){
        $data = kepsek::all();
        return DataTables::of($data)->rawColumns([])->make(true);
    }

    public function updatepasstaff($id){
        $data = User::where('id',$id)->first();
        return view('administrator.sub_index.staff.updatepass',compact('id','data'));
    }

    public function editpasbendahara($id){
        $data = bendahara::where('id',$id)->first();
        return view('administrator.sub_index.bendahara.updatepass',compact('id','data'));
    }

    public function editpaskepsek($id){
        $data = kepsek::where('id',$id)->first();
        return view('administrator.sub_index.kepsek.updatepass',compact('id','data'));
    }

    public function updateStorepasstaff(Request $request,$id){
        $data = User::where('id',$id)->first();
        $data->name = $request->name;
        $data->email = $request->email;
        if (isset($request->password)) {
            $data->password = Hash::make($request->password);    
        }
        
        $data->save();

    }

    public function updateStorepasbendahara(Request $request,$id){
        $data = bendahara::where('id',$id)->first();
        $data->nama = $request->nama;
        $data->email = $request->email;
        if (isset($request->password)) {
            $data->password = Hash::make($request->password);    
        }
        
        $data->save();
    }

    public function updateStorepaskepsek(Request $request,$id){
        $data = kepsek::where('id',$id)->first();
        $data->nama = $request->nama;   
        $data->email = $request->email;
        if (isset($request->password)) {
            $data->password = Hash::make($request->password);    
        }
        
        $data->save();
    }
}
