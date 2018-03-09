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
        $users = factory(App\User::class, 20)->create();
        $monitores = factory(App\Monitore::class, 20)->create();
        $actividades = factory(App\Actividade::class, 20)->create();
        $maquinas = factory(App\Maquina::class, 20)->create();

        $users->each(function (App\User $user) use ($monitores, $actividades, $maquinas, $users){
            $gimnasios = factory(App\Gimnasio::class, 20)->create([
                'user_id' => $user->id
            ]);

            $gimnasios->each(function (App\Gimnasio $gimnasio) use ($monitores, $actividades, $maquinas){
                $gimnasio->monitores()->sync(
                    $monitores->random(mt_rand(2,20))
                );
                $gimnasio->actividades()->sync(
                    $actividades->random(mt_rand(2,20))
                );
                $gimnasio->maquinas()->sync(
                    $maquinas->random(mt_rand(2,20))
                );

                factory(App\Producto::class, 20)->create([
                    'gimnasio_id' => $gimnasio->id
                ]);

                factory(App\Sala::class, 20)->create([
                    'gimnasio_id' => $gimnasio->id
                ]);
            });

             $monitores->each(function (App\Monitore $monitore){
                 factory(App\Puntuacione::class, 20)->create([
                     'monitore_id' => $monitore->id
                 ]);
             });
        });
    }
}

