<?php

namespace App\Http\Controllers;

use App\Gimnasio;
use App\Http\Requests\CreateProductoAjaxFormRequest;
use App\Http\Requests\CreateProductosRequest;
use App\Producto;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductosController extends Controller
{
    /**
     * Mostramos la pagina inicial de la entidad productos y le pasamos los parametros necesarios.
     *
     * @param $username
     * @param $nombre
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
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

    /**
     * Mostramos la pagina de creacion de un producto.
     *
     * @param User $username
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(User $username){

        return view('productos.create',[
            'username' => $username
        ]);
    }

    /**
     * Recogemos los datos enviados por post y lo procesamos para guardarlos en la base de datos.
     *
     * @param CreateProductosRequest $request
     * @param $username
     * @param $nombre
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
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

    /**
     * Mostramos la pagina de edicion de un producto
     *
     * @param $username
     * @param $nombre
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
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

    /**
     * Recogemos los datos enviados por post para procesalor y actualizarlos en la base de datos.
     *
     * @param CreateProductosRequest $request
     * @param $username
     * @param $nombre
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
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

    /**
     * Recogemos el id de la entidad para borrarlo con el metodo softDelete.
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id){
        Producto::where('id', $id)->delete();

        return redirect('/');
    }

    /**
     * En este metodo le pasamos los parametros para validar el formulario de crear un producto asincronamente.
     *
     * @param CreateProductoAjaxFormRequest $request
     * @return array
     */
    public function validacionCreateProductoAjax(CreateProductoAjaxFormRequest $request){
        return array();
    }
}
