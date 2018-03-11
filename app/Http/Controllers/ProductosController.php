<?php

namespace App\Http\Controllers;

use App\Gimnasio;
use App\Http\Requests\CreateProductosRequest;
use App\Producto;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

        if( $imagen = $request->file('imagen') ){
            $url = $imagen->store('imagen','public');
        }else{
            $url = "https://picsum.photos/150/150/?random";
        }

        Producto::create([
            'nombre' => $request->input('nombre'),
            'gimnasio_id' => $gimnasio->id,
            'imagen' => $url,
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

        if( $imagen = $request->file('imagen') ){
            if( !strpos($producto->imagen, "http") ) {
                $routeParts = explode('/', $producto->imagen);
                Storage::disk('public')->delete('producto/'.end($routeParts));
            }

            $url = $imagen->store('user','public');
        }else{
            $url = $producto->imagen;
        }

        $producto->fill([
            'imagen' => $url,
            'nombre' => $request->input('nombre'),
            'precio' => $request->input('precio'),
            'stock' => $request->input('stock'),
            'sabor' => $request->input('sabor'),
            'caracteristicas' => $request->input('caracteristicas')
        ]);

        $producto->update();

        return redirect("$user->username/gimnasios/$gimnasio->nombre/productos");
    }

    public function destroy($id){
        Producto::where('id', $id)->delete();

        return redirect('/');
    }
}
