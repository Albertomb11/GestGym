<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gimnasio extends Model
{
    //Con $guarded se indican los elementos que no queremos que se modifiquen
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function users(){
        return $this->belongsTo(User::class);
    }

    public function actividades(){
        return $this->belongsToMany(Actividade::class);
    }

    public function monitores(){
        return $this->belongsToMany(Monitore::class);
    }

    public function productos(){
        return $this->hasMany(Producto::class);
    }

    public function maquinas(){
        return $this->belongsToMany(Maquina::class);
    }

    public function salas(){
        return $this->hasMany(Sala::class);
    }

    public function horario(){
        return $this->hasMany(Horario::class);
    }
}
