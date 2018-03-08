<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Monitore extends Model
{
    //Con $guarded se indican los elementos que no queremos que se modifiquen
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function gimnasios(){
        return $this->belongsToMany(Gimnasio::class);
    }

    public function puntuaciones(){
        return $this->hasMany(Puntuacione::class);
    }

    public function horario(){
        return $this->belongsToMany(Horario::class);
    }
}
