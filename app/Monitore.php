<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Monitore extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    //Con $guarded se indican los elementos que no queremos que se modifiquen
    protected $guarded = ['id', 'created_at', 'updated_at'];

    /**
     * Le decimos que es una relacion n a n.
     * @return \Illuminate\Database\Query\Builder|static
     */
    public function gimnasios(){
        return $this->belongsToMany(Gimnasio::class)->latest();
    }

    /**
     * Le decimos que es una relacion 1 a n.
     * @return \Illuminate\Database\Query\Builder|static
     */
    public function puntuaciones(){
        return $this->hasMany(Puntuacione::class)->latest();
    }

    /**
     * Le decimos que es una relacion n a n.
     * @return \Illuminate\Database\Query\Builder|static
     */
    public function horario(){
        return $this->belongsToMany(Horario::class)->latest();
    }

    /**
     * Recogemos los atributos de la imagen y le decimos donde guardarla
     * @param $imagen
     * @return mixed
     */
    public function getImageAttribute($imagen)
    {
        if( starts_with($imagen, "https://")){
            return $imagen;
        }

        return  Storage::disk('public')->url($imagen);
    }
}
