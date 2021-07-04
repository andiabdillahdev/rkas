<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\kasUmum;
use App\bukuPembantuBank;
use App\bukuPembantuPajak;
use App\mainprogram;
use App\itemprogram;
use App\penerimaan;
use App\sekolah;
use App\lpj;
use App\buktipenggunaandana;
use PDF;

class lpjController extends Controller
{
    public function index(){
        $data = lpj::all();
        return view('bendahara.lpj.lpjKelola.index',compact('data'));
    }

    public function preview(){
        $penerimaan = penerimaan::all();
        $sekolah = sekolah::all();
        $belanja = mainprogram::with(['belanja', 'itemprogram', 'subprogram'])->get();
        // foreach($belanja as $key) {
        //     foreach($key->belanja as $belanja) {
        //         echo $belanja->kode.' +<br>';
        //     }
        //     foreach($key->itemprogram as $itemprogram) {
        //         echo $itemprogram->kode.' -<br>';
        //     }
        // }
        $kasumum = kasUmum::all();
        $bk_pmb_bank = bukuPembantuBank::all();
        $bk_pmb_pajak = bukuPembantuPajak::all();
        $bukti = buktipenggunaandana::all();
   
        $pdf = PDF::loadView('bendahara.lpj.lpjKelola.pdflpj', compact('sekolah','penerimaan','belanja','kasumum','bk_pmb_bank','bk_pmb_pajak','bukti'))->setPaper('a4', 'landscape')->setWarnings(false);
        return $pdf->stream();
    }

    public function submitToKepsek(Request $request){
        $data = lpj::where('id',1)->first();
        $data->status = 'Terkirim';
        $data->save();
    }

}
