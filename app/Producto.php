<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Producto extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    //Con $guarded se indican los elementos que no queremos que se modifiquen
    protected $guarded = ['id', 'created_at', 'updated_at'];

    /**
     * Le decimos que es una relacion 1 a n
     * @return \Illuminate\Database\Query\Builder|static
     */
    public function gimnasios(){
        return $this->belongsTo(Gimnasio::class)->latest();
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
