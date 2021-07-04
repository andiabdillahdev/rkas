<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class subprogram extends Model
{
    protected $table = 'tb_subprogram';
    // protected $with = ['itemprogram'];

    public function mainprogram(){
        return $this->belongsTo('App\mainprogram','id_main','id');
    }

    public function itemprogram(){
        return $this->hasMany('App\itemprogram','id_sub');
    }
}
