<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Gimnasio extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    //Con $guarded se indican los elementos que no queremos que se modifiquen
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function users(){
        return $this->belongsTo(User::class)->latest();
    }

    public function actividades(){
        return $this->belongsToMany(Actividade::class)->latest();
    }

    public function monitores(){
        return $this->belongsToMany(Monitore::class)->latest();
    }

    public function productos(){
        return $this->hasMany(Producto::class)->latest();
    }

    public function maquinas(){
        return $this->belongsToMany(Maquina::class)->latest();
    }

    public function salas(){
        return $this->hasMany(Sala::class)->latest();
    }

    public function horario(){
        return $this->hasMany(Horario::class)->latest();
    }

    public function getImageAttribute($imagen)
    {
        if( starts_with($imagen, "https://")){
            return $imagen;
        }

        return  Storage::disk('public')->url($imagen);
    }
}
