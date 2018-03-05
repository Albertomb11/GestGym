<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Maquinas extends Model
{
    //Con $guarded se indican los elementos que no queremos que se modifiquen
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function gimnasios(){
        return $this->belongsToMany(Gimnasio::class)->latest();
    }
}
