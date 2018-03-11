<?php

namespace Tests\Feature;

use App\Gimnasio;
use App\Producto;
use App\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductoTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * Vemos que nos muestra la pagina de los productos correctamente y que se crean correctamente.
     */
    public function testProducto()
    {
        $user = factory(User::class)->create();
        $gimnasio = factory(Gimnasio::class)->create([
            'user_id' => $user->id
        ]);
        $response = $this->get($user->username.'/gimnasios'.$gimnasio->nombre.'/productos');
        factory(Producto::class)->create([
            'gimnasio_id' => $gimnasio->id
        ]);
        $response->assertSeeText('precio');
    }

    /**
     * Vemos que la vista de editar producto funciona correctamente.
     */
    public function testMostrarEditarProducto()
    {
        $user = factory(User::class)->create();
        $gimnasio = factory(Gimnasio::class)->create([
            'user_id' => $user->id
        ]);
        $producto = factory(Producto::class)->create([
            'gimnasio_id' => $gimnasio->id
        ]);
        $this->actingAs($user);
        $response = $this->get($user->username.'/gimnasios'.$gimnasio->nombre.'/productos'.$producto->nombre.'/edit');
        $response->assertStatus(200);
    }

    /**
     * Vemos que funcion el Update de un producto.
     */
    public function testUpdateProducto()
    {
        $user = factory(User::class)->create();
        $gimnasio = factory(Gimnasio::class)->create([
            'user_id' => $user->id
        ]);
        $producto = factory(Producto::class)->create([
            'gimnasio_id' => $gimnasio->id
        ]);
        $this->actingAs($user);
        $this->patch($user->username.'/gimnasios'.$gimnasio->nombre.'/productos'.$producto->nombre.'/edit', [
            'nombre' => 'Manolo'
        ]);
        $this->assertDatabaseHas('productos', [
            'nombre' => 'Manolo',
        ]);
    }

    /**
     * Vemos que podemos borrar un producto.
     */
    public function testBorrarProducto()
    {
        $user = factory(User::class)->create();
        $gimnasio = factory(Gimnasio::class)->create([
            'user_id' => $user->id
        ]);
        $producto = factory(Producto::class)->create([
            'gimnasio_id' => $gimnasio->id
        ]);
        $this->actingAs($user);
        $response = $this->post('/producto/delete'.$producto->id);
        $response->assertStatus(405);
    }
}
