<?php

use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(App\Maquina::class, function (Faker $faker) {

    $imagen = 'https://picsum.photos/150/150/?random';
    $nombre = str_replace(" ", "-", $faker->name);
    $zona_trabajada = $faker->sentence($nbWords = 6, $variableNbWords = true);
    $descripcion = $faker->sentence($nbWords = 6, $variableNbWords = true);
    $unidades = $faker->randomDigit;
    $time1 = Carbon::createFromTimestamp($faker->dateTimeThisDecade()->getTimestamp());
    $time2 = Carbon::createFromTimestamp($faker->dateTimeThisDecade()->getTimestamp());

    return [
        'imagen' => $imagen,
        'nombre' => $nombre,
        'zona_trabajada' => $zona_trabajada,
        'descripcion' => $descripcion,
        'unidades' => $unidades,
        'created_at' => ($time1 < $time2) ? $time1 : $time2,
        'updated_at' => ($time1 > $time2) ? $time1 : $time2
    ];
});
