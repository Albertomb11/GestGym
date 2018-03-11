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

    /**
     * Le decimos que es una relacion 1 a n.
     * @return \Illuminate\Database\Query\Builder|static
     */
    public function users(){
        return $this->belongsTo(User::class)->latest();
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

    /**
     * Le decimos que es una relacion 1 a n.
     * @return \Illuminate\Database\Query\Builder|static
     */
    public function productos(){
        return $this->hasMany(Producto::class)->latest();
    }

    /**
     * Le decimos que es una relacion n a n.
     * @return \Illuminate\Database\Query\Builder|static
     */
    public function maquinas(){
        return $this->belongsToMany(Maquina::class)->latest();
    }

    /**
     * Le decimos que es una relacion 1 a n.
     * @return \Illuminate\Database\Query\Builder|static
     */
    public function salas(){
        return $this->hasMany(Sala::class)->latest();
    }

    /**
     * Le decimos que es una relacion 1 a n.
     * @return \Illuminate\Database\Query\Builder|static
     */
    public function horario(){
        return $this->hasMany(Horario::class)->latest();
    }

    /**
     * Recogemos los atributos de la imagen y le decimos donde guardarla.
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
