<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Horario extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $guarded = ['id', 'hora', 'created_at', 'updated_at'];

    /**
     * Le decimos que es una relacion 1 a n.
     * @return \Illuminate\Database\Query\Builder|static
     */
    public function gimnasios(){
        return $this->belongsTo(Gimnasio::class)->latest();
    }

    /**
     * Le decimos que es una relacion n a n.
     * @return \Illuminate\Database\Query\Builder|static
     */
    public function actividades(){
        return $this->belongsToMany(Actividade::class)->latest();
    }

    /**
     * Le decimos que es una relacion n a n.
     * @return \Illuminate\Database\Query\Builder|static
     */
    public function monitores(){
        return $this->belongsToMany(Monitore::class)->latest();
    }
}
