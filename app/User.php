<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Le decimos que es una relacion 1 a n.
     * @return \Illuminate\Database\Query\Builder|static
     */
    public function gimnasios(){
        return $this->hasMany(Gimnasio::class)->latest();
    }

    /**
     * Recogemos los atributo de la imagen y le decimos donde guardarla.
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
