<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gimnasio extends Model
{
    //Con $guarded se indican los elementos que no queremos que se modifiquen
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function actividades(){
        return $this->hasMany(Actividades::class)->latest();
    }

    public function monitores(){
        return $this->hasMany(Monitores::class)->latest();
    }

    public function productos(){
        return $this->hasMany(Productos::class)->latest();
    }

}
