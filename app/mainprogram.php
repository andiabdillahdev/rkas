<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mainprogram extends Model
{
    protected $table = 'tb_mainprogram';
    // protected $with = ['subprogram', 'itemprogram', 'belanja'];

    public function subprogram(){
        return $this->hasMany('App\subprogram','id_main');
    }

    public function itemprogram(){
        return $this->hasMany('App\itemprogram','id_main');
    }

    public function belanja(){
        return $this->hasMany('App\belanja','id_main');
    }
}
