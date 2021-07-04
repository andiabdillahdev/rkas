<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class buktipenggunaandana extends Model
{
    protected $table = 'tb_buktipenggunaan_dana';
    protected $with = ['belanja'];

    public function belanja(){
        return $this->belongsTo('App\buktipenggunaandana','id','id_belanja');
    }
}
