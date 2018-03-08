<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = factory(App\User::class, 20)->create();
        $monitore = factory(App\Monitore::class, 20)->create();
        $actividade = factory(App\Actividade::class, 20)->create();
        $maquina = factory(App\Maquina::class, 20)->create();

        $gimnasio = factory(App\Gimnasio::class, 30)->create([
           'user_id' => $user->id
        ]);

        $gimnasio->each(function (App\Gimnasio $gimnasio) use ($monitore, $actividade, $maquina){
            $gimnasio->monitores()->sync(
              $monitore->random(mt_rand(2,30))
            );
            $gimnasio->actividades()->sync(
                $actividade->random(mt_rand(2,30))
            );
            $gimnasio->maquinas()->sync(
                $maquina->random(mt_rand(2,30))
            );
        });

        $producto = factory(App\Producto::class, 30)->create([
            'gimnasio_id' => $gimnasio->id
        ]);

        $sala = factory(App\Sala::class, 30)->create([
            'gimnasio_id' => $gimnasio->id
        ]);

        $puntuacione = factory(App\Puntuacione::class, 30)->create([
            'monitore_id' => $monitore->id
        ]);
    }
}

