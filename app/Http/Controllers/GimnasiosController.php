<?php

namespace App\Http\Controllers;

use App\Actividade;
use App\Gimnasio;
use App\Http\Requests\CreateGimnasioAjaxFormRequest;
use App\Http\Requests\CreateGimnasioRequest;
use App\Http\Requests\UpdateGimnasioRequest;
use App\Monitore;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;

class GimnasiosController extends Controller
{

    public function show($username){
        $user = User::where('username', $username)->first();

        $gimnasios = $user->gimnasios()->get();

        return view('gimnasios.show',[
            'gimnasios' => $gimnasios,
            'user' => $user
        ]);
    }

    public function create(User $username){

        return view('gimnasios.create',[
            'username' => $username
        ]);
    }

    public function store(CreateGimnasioRequest $request){
        $user = Auth::user();

        if( $imagen = $request->file('imagen') ){
            $url = $imagen->store('imagen','public');
        }else{
            $url = "https://picsum.photos/150/150/?random";
        }

        Gimnasio::create([
            'nombre' => $request->input('nombre'),
            'user_id' => $user->id,
            'imagen' => $url,
            'direccion' => $request->input('direccion'),
            'horario_apertura' => $request->input('horario_apertura'),
            'horario_cierre' => $request->input('horario_cierre'),
            'cuotas' => $request->input('cuotas'),
            'descripcion' => $request->input('descripcion')
        ]);

        return redirect("$user->username/gimnasios");
    }

    public function gestion($username, $id){
        $user = User::where('username', $username)->first();

        $gimnasios = Gimnasio::where('nombre', $id)->first();

        return view('gimnasios.gestion',[
            'gimnasios' => $gimnasios,
            'user' => $user
        ]);
    }

    public function publico(Gimnasio $gimnasios){
        $gimnasios = Gimnasio::orderBy('created_at', 'desc')->paginate(3);

        return view('gimnasios.publico',[
            'gimnasios' => $gimnasios
        ]);
    }

    public function mostrarGimnasios(){
        if (request()->ajax()){
            $gimnasios = Gimnasio::orderBy('created_at', 'desc')->paginate(3);
            return View::make('gimnasios.gimnasios', array('gimnasios' => $gimnasios))->render();
        }else{
            return redirect('/');
        }
    }

    public function validacionCreateGimnasiosAjax(CreateGimnasioAjaxFormRequest $request){
        return array();
    }

    public function edit($username, $nombre){
        $user = User::where('username', $username)->first();

        $gimnasio = Gimnasio::where('nombre', $nombre)->first();

        return view('gimnasios.edit',[
            'user' => $user,
            'gimnasio' => $gimnasio
        ]);
    }

    public function update(CreateGimnasioRequest $request,$username, $id){
        $user = User::where('username', $username)->first();

        $gimnasio = Gimnasio::find($id);

        if( $imagen = $request->file('imagen') ){
            if( !strpos($gimnasio->imagen, "http") ) {
                $routeParts = explode('/', $gimnasio->imagen);
                Storage::disk('public')->delete('gimnasio/'.end($routeParts));
            }

            $url = $imagen->store('gimnasio','public');
        }else{
            $url = $gimnasio->imagen;
        }

        $gimnasio->fill([
            'imagen' => $url,
            'nombre' => $request->input('nombre'),
            'direccion' => $request->input('direccion'),
            'horario_apertura' => $request->input('horario_apertura'),
            'horario_cierre' => $request->input('horario_cierre'),
            'cuotas' => $request->input('cuotas'),
            'descripcion' => $request->input('descripcion')
        ]);

        $gimnasio->update();

        return redirect("$user->username/gimnasios/$gimnasio->nombre");
    }

    public function destroy($id){
        Gimnasio::where('id', $id)->delete();

        return redirect('/');
    }
}
