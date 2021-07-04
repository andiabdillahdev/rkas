<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class belanja extends Model
{
    protected $table = 'tb_belanja';
    // protected $with = ['item_program','sub_program','main_program','bukti_penggunaan_dana'];
    //    protected $with = ['item_program'];


    public function item_program(){
        return $this->belongsTo('App\itemprogram','id_item','id');
    }

    public function sub_program(){
        return $this->belongsTo('App\subprogram','id_sub','id');
    }

    public function main_program(){
        return $this->belongsTo('App\mainprogram','id_main','id');
    }

    public function bukti_penggunaan_dana(){
        return $this->hasMany('App\buktipenggunaandana','id_belanja','id');
    }
}
