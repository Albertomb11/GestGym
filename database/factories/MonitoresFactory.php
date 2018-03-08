<?php

use Faker\Generator as Faker;
use Carbon\Carbon;

$factory->define(App\Monitore::class, function (Faker $faker) {

    $imagen = 'https://picsum.photos/150/150/?random';
    $nombre = $faker->name;
    $apellidos = $faker->lastName;
    $fecha_nacimiento = date($format = 'Y-m-d', $max = 'now');
    $estudios = $faker->sentence($nbWords = 6, $variableNbWords = true);
    $email = $faker->email;
    $time1 = Carbon::createFromTimestamp($faker->dateTimeThisDecade()->getTimestamp());
    $time2 = Carbon::createFromTimestamp($faker->dateTimeThisDecade()->getTimestamp());
    $created_at = ($time1 < $time2) ? $time1 : $time2;
    $updated_at = ($time1 > $time2) ? $time1 : $time2;

    return [
        'imagen' => $imagen,
        'nombre' => $nombre,
        'apellidos' => $apellidos,
        'fecha_nacimiento' => $fecha_nacimiento,
        'estudios' => $estudios,
        'email' => $email,
        'created_at' => $created_at,
        'updated_at' => $updated_at
    ];
});
