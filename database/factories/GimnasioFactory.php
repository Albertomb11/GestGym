<?php


use Faker\Generator as Faker;
use Carbon\Carbon;

$factory->define(App\Gimnasio::class, function (Faker $faker) {

    $nombre = $faker->name;
    $direccion = $faker->address;
    $time = $faker->time;
    $horario_apertura = $time;
    $horario_cierre = $time;
    $cuotas = $faker->numberBetween(20,100)."€";
    $descripcion = $faker->realText(255);
    $time1 = Carbon::createFromTimestamp($faker->dateTimeThisDecade()->getTimestamp());
    $time2 = Carbon::createFromTimestamp($faker->dateTimeThisDecade()->getTimestamp());
    $created_at = ($time1 < $time2) ? $time1 : $time2;
    $updated_at = ($time1 > $time2) ? $time1 : $time2;

    return [
        'nombre' => $nombre,
        'direccion' => $direccion,
        'horario_apertura' => $horario_apertura,
        'horario_cierre' => $horario_cierre,
        'cuotas' => $cuotas,
        'descripcion' => $descripcion,
        'created_at' => $created_at,
        'updated_at' => $updated_at
    ];
});