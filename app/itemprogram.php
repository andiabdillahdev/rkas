<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class itemprogram extends Model
{
    protected $table = 'tb_itemprogres';
    // protected $with = ['mainprogram','subprogram','belanja'];
    // protected $with = ['belanja'];

    public function subprogram(){
        return $this->belongsTo('App\subprogram','id_sub','id');
    }

    public function mainprogram(){
        return $this->belongsTo('App\mainprogram','id_main','id');
    }

    public function belanja(){
        return $this->hasMany('App\belanja','id_item','id');
    }
}
