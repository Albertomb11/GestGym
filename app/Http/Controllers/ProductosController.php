<?php

namespace App\Http\Controllers;

use App\Gimnasio;
use App\Http\Requests\CreateProductosRequest;
use App\Producto;
use App\User;
use Illuminate\Http\Request;

class ProductosController extends Controller
{
    public function show($username, $nombre){
        $user = User::where('username', $username)->first();

        $gimnasio = Gimnasio::where('nombre', $nombre)->first();

        $productos = $gimnasio->productos()->get();

        return view('productos.show',[
            'productos' => $productos,
            'gimnasio' => $gimnasio,
            'user' => $user
        ]);
    }

    public function create(User $username){

        return view('productos.create',[
            'username' => $username
        ]);
    }

    public function store(CreateProductosRequest $request, $username, $nombre){
        $user = User::where('username', $username)->first();
        $gimnasio = Gimnasio::where('nombre', $nombre)->first();

        Producto::create([
            'nombre' => $request->input('nombre'),
            'gimnasio_id' => $gimnasio->id,
            'precio' => $request->input('precio'),
            'stock' => $request->input('stock'),
            'sabor' => $request->input('sabor'),
            'caracteristicas' => $request->input('caracteristicas')
        ]);

        return redirect("$user->username/gimnasios/$gimnasio->nombre/productos");
    }

    public function edit($username, $nombre, $id){
        $user = User::where('username', $username)->first();

        $gimnasio = Gimnasio::where('nombre', $nombre)->first();

        $producto = Producto::where('id', $id)->first();

        return view('productos.edit',[
            'user' => $user,
            'gimnasio' => $gimnasio,
            'producto' => $producto
        ]);
    }

    public function update(CreateProductosRequest $request, $username, $nombre, $id){
        $user = User::where('username', $username)->first();

        $gimnasio = Gimnasio::where('nombre', $nombre)->first();

        $producto = Producto::find($id);

        $producto->update([
            'nombre' => $request->input('nombre'),
            'precio' => $request->input('precio'),
            'stock' => $request->input('stock'),
            'sabor' => $request->input('sabor'),
            'caracteristicas' => $request->input('caracteristicas')
        ]);

        return redirect("$user->username/gimnasios/$gimnasio->nombre/productos");
    }
}
