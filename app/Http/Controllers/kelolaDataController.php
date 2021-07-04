<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\belanja;
use Yajra\DataTables\DataTables;

class kelolaDataController extends Controller
{
    public function index(){
        return view('administrator.keloladata.index');
    }

    public function item_di_tolak(){
        $data = belanja::where('status','Di Tolak')->get();
        return DataTables::of($data)->rawColumns([''])->make(true);
    }

    public function item_terkirim(){
        $data = belanja::where('status','proses')->get();
        return DataTables::of($data)->rawColumns([''])->make(true);
    }

    public function item_selesai(){
        $data = belanja::where('status','Di Terima')->get();
        return DataTables::of($data)->rawColumns([''])->make(true);
    }
}
