<?php

namespace Tests\Feature;

use App\Gimnasio;
use App\Monitore;
use App\Puntuacione;
use App\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PuntuacionTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * Vemos que se ve la pagina de puntuaciones y que se crean correctamente.
     */
    public function testPuntuacion()
    {
        $user = factory(User::class)->create();
        $response = $this->get($user->username.'/gimnasios');
        $gimnasio = factory(Gimnasio::class)->create([
            'user_id' => $user->id
        ]);
        $monitor = factory(Monitore::class)->create();
        $gimnasio->monitores()->attach($monitor);
        $puntuacion = factory(Puntuacione::class)->create([
            'monitores_id' => $monitor->id
        ]);
        $response = $this->get($user->username.'/gimnasios/'.$gimnasio->nombre.'/monitores'.$monitor->nombre.'puntuaciones');

        $response->assertSeeText('comentario');
    }
}
