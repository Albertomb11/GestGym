<?php

namespace App\Http\Controllers;

use App\Actividade;
use App\Gimnasio;
use App\Http\Requests\CreateActividadesRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ActividadesController extends Controller
{
    public function show($username, $nombre){
        $user = User::where('username', $username)->first();

        $gimnasio = Gimnasio::where('nombre', $nombre)->first();

        $actividades = $gimnasio->actividades()->get();

        return view('actividades.show',[
            'actividades' => $actividades,
            'gimnasio' => $gimnasio,
            'user' => $user
        ]);
    }

    public function create(User $username){

        return view('actividades.create',[
            'username' => $username
        ]);
    }

    public function store(CreateActividadesRequest $request, $username, $nombre){
        $user = User::where('username', $username)->first();
        $gimnasio = Gimnasio::where('nombre', $nombre)->first();

        if( $imagen = $request->file('imagen') ){
            $url = $imagen->store('imagen','public');
        }else{
            $url = "https://picsum.photos/150/150/?random";
        }

        $actividad = Actividade::create([
            'nombre' => $request->input('nombre'),
            'imagen' => $url,
            'objetivos' => $request->input('objetivos'),
            'intensidad' => $request->input('intensidad'),
            'duracion' => $request->input('duracion'),
            'descripcion' => $request->input('descripcion')
        ]);

        $gimnasio->actividades()->attach($actividad);

        return redirect("$user->username/gimnasios/$gimnasio->nombre/actividades");
    }

    public function edit($username, $nombre, $id){
        $user = User::where('username', $username)->first();

        $gimnasio = Gimnasio::where('nombre', $nombre)->first();

        $actividad = Actividade::where('id', $id)->first();

        return view('actividades.edit',[
           'user' => $user,
           'gimnasio' => $gimnasio,
           'actividad' => $actividad
        ]);
    }

    public function update(CreateActividadesRequest $request, $username, $nombre, $id){
        $user = User::where('username', $username)->first();

        $gimnasio = Gimnasio::where('nombre', $nombre)->first();

        $actividad = Actividade::find($id);

        if( $imagen = $request->file('image') ){
            if( !strpos($actividad->imagen, "http") ) {
                $routeParts = explode('/', $actividad->imagen);
                Storage::disk('public')->delete('actividad/'.end($routeParts));
            }

            $url = $imagen->store('actividad','public');
        }else{
            $url = $actividad->imagen;
        }

        $actividad->fill([
            'nombre' => $request->input('nombre'),
            'imagen' => $url,
            'objetivos' => $request->input('objetivos'),
            'intensidad' => $request->input('intensidad'),
            'duracion' => $request->input('duracion'),
            'descripcion' => $request->input('descripcion')
        ]);

        $actividad->update();

        return redirect("$user->username/gimnasios/$gimnasio->nombre/actividades");
    }

    public function destroy($id){
        Actividade::where('id', $id)->delete();

        return redirect('/');
    }
}
