<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Horario extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $guarded = ['id', 'hora', 'created_at', 'updated_at'];

    public function gimnasios(){
        return $this->belongsTo(Gimnasio::class);
    }

    public function actividades(){
        return $this->belongsToMany(Actividade::class);
    }

    public function monitores(){
        return $this->belongsToMany(Monitore::class);
    }
}
