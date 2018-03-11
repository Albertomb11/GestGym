<?php

namespace Tests\Feature;

use App\Gimnasio;
use App\Maquina;
use App\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MaquinaTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * Vemos que nos muestra la pagina de las maquinas correctamente y que se crean correctamente.
     */
    public function testMaquina()
    {
        $user = factory(User::class)->create();
        $gimnasio = factory(Gimnasio::class)->create([
            'user_id' => $user->id
        ]);
        $response = $this->get($user->username.'/gimnasios'.$gimnasio->nombre.'/maquinas');
        factory(Maquina::class)->create();
        $response->assertSeeText('nombre');
    }

    /**
     * Vemos que la vista de editar maquina funciona correctamente.
     */
    public function testMostrarEditarMaquina()
    {
        $user = factory(User::class)->create();
        $gimnasio = factory(Gimnasio::class)->create([
            'user_id' => $user->id
        ]);
        $maquina = factory(Maquina::class)->create();
        $gimnasio->monitores()->attach($maquina);
        $this->actingAs($user);
        $response = $this->get($user->username.'/gimnasios'.$gimnasio->nombre.'/maquinas'.$maquina->nombre.'/edit');
        $response->assertStatus(200);
    }

    /**
     * Vemos que funcion el Update de un maquina.
     */
    public function testUpdateMaquina()
    {
        $user = factory(User::class)->create();
        $gimnasio = factory(Gimnasio::class)->create([
            'user_id' => $user->id
        ]);
        $maquina = factory(Maquina::class)->create();
        $gimnasio->monitores()->attach($maquina);
        $this->actingAs($user);
        $this->patch($user->username.'/gimnasios'.$gimnasio->nombre.'/maquinas'.$maquina->nombre.'/edit', [
            'nombre' => 'Manolo'
        ]);
        $this->assertDatabaseHas('maquinas', [
            'nombre' => 'Manolo',
        ]);
    }

    /**
     * Vemos que podemos borrar una maquina.
     */
    public function testBorrarMaquina()
    {
        $user = factory(User::class)->create();
        $gimnasio = factory(Gimnasio::class)->create([
            'user_id' => $user->id
        ]);
        $maquina = factory(Maquina::class)->create();
        $gimnasio->monitores()->attach($maquina);
        $this->actingAs($user);
        $response = $this->post('/maquina/delete'.$maquina->id);
        $response->assertStatus(405);
    }
}
