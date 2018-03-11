<?php

namespace Tests\Feature;

use App\Gimnasio;
use App\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class GimnasioTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * Vemos que nos muestra la pagina de los gimnasios correctamente y que se crean correctamente.
     */
    public function testGimnasios()
    {
        $user = factory(User::class)->create();
        $response = $this->get($user->username.'/gimnasios');
        factory(Gimnasio::class)->create([
            'user_id' => $user->id
        ]);
        $response->assertSeeText('horario_apertura');
    }

    /**
     * Vemos que la vista de gestion de un gimnasio funciona.
     */
    public function testVistaGestionGimnasio()
    {
        $user = factory(User::class)->create();
        $gimnasio = factory(Gimnasio::class)->create([
            'user_id' => $user->id
        ]);
        $response = $this->get($user->username.'/gimnasios/'.$gimnasio->nombre);
        $response->assertStatus(200);
    }

    /**
     * Vemos que la vista de editar gimnasio funciona correctamente.
     */
    public function testMostrarEditarGimnasio()
    {
        $user = factory(User::class)->create();
        $gimnasio = factory(Gimnasio::class)->create([
            'user_id' => $user->id
        ]);
        $this->actingAs($user);
        $response = $this->get($user->username.'/gimnasios'.$gimnasio->nombre.'/edit');
        $response->assertStatus(200);
    }

    /**
     * Vemos que funcion el Update de un gimnasio.
     */
    public function testUpdateGimnasio()
    {
        $user = factory(User::class)->create();
        $gimnasio = factory(Gimnasio::class)->create([
            'user_id' => $user->id
        ]);
        $this->actingAs($user);
        $this->patch($user->username.'/gimnasios'.$gimnasio->nombre.'/edit', [
            'nombre' => 'Manolo'
        ]);
        $this->assertDatabaseHas('gimnasios', [
            'id' => $gimnasio->id,
            'nombre' => 'Manolo',
        ]);
    }

    /**
     * Vemos que podemos borrar un gimnasio.
     */
    public function testBorrarGimnasio()
    {
        $user = factory(User::class)->create();
        $gimnasio = factory(Gimnasio::class)->create([
            'user_id' => $user->id
        ]);
        $this->actingAs($user);
        $response = $this->post('/gimnasio/delete/'.$gimnasio->id);
        $response->assertStatus(405);
    }
}
