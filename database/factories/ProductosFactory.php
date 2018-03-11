<?php

use Carbon\Carbon;
use Faker\Generator as Faker;

/**
 * Utilizamos faker para generar datos aleatorios.
 */
$factory->define(App\Producto::class, function (Faker $faker) {

    $imagen = 'https://picsum.photos/150/150/?random';
    $nombre = str_replace(" ", "-", $faker->name);
    $precio = $faker->numberBetween(1, 10000);
    $stock = $faker->numberBetween(1, 10000);
    $sabor = $faker->word;
    $caracteristicas = $faker->realText(255);
    $time1 = Carbon::createFromTimestamp($faker->dateTimeThisDecade()->getTimestamp());
    $time2 = Carbon::createFromTimestamp($faker->dateTimeThisDecade()->getTimestamp());
    $created_at = ($time1 < $time2) ? $time1 : $time2;
    $updated_at = ($time1 > $time2) ? $time1 : $time2;


    return [
        'imagen' => $imagen,
        'nombre' => $nombre,
        'precio' => $precio,
        'stock' => $stock,
        'sabor' => $sabor,
        'caracteristicas' => $caracteristicas,
        'created_at' => $created_at,
        'updated_at' => $updated_at
    ];
});
