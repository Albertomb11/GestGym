<?php

namespace App\Http\Controllers;

use App\Actividades;
use App\Gimnasio;
use App\Http\Requests\CreateActividadesRequest;
use App\User;
use Illuminate\Http\Request;

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

        $actividad = Actividades::create([
            'nombre' => $request->input('nombre'),
            'objetivos' => $request->input('objetivos'),
            'intensidad' => $request->input('intensidad'),
            'duracion' => $request->input('duracion'),
            'descripcion' => $request->input('descripcion')
        ]);

        $gimnasio->actividades()->sync($actividad);

        return redirect("$user->username/gimnasios/$gimnasio->nombre/actividades");
    }

//    public function destroy($id){
//
//        Actividades::where('id', $id)->delete();
//
//        return redirect('/');
//    }
}
