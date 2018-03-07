<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gimnasio extends Model
{
    //Con $guarded se indican los elementos que no queremos que se modifiquen
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function users(){
        return $this->belongsTo(User::class)->latest();
    }

    public function actividades(){
        return $this->belongsToMany(Actividades::class)->latest();
    }

    public function monitores(){
        return $this->belongsToMany(Monitores::class)->latest();
    }

    public function productos(){
        return $this->hasMany(Productos::class)->latest();
    }

    public function maquinas(){
        return $this->belongsToMany(Maquina::class)->latest();
    }

    public function salas(){
        return $this->hasMany(Salas::class)->latest();
    }

    public function horario(){
        return $this->hasMany(Horario::class)->latest();
    }
}
