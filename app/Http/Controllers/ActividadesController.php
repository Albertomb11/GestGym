<?php

namespace App\Http\Controllers;

use App\Actividade;
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

        $actividad = Actividade::create([
            'nombre' => $request->input('nombre'),
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

        $actividad->update([
            'nombre' => $request->input('nombre'),
            'objetivos' => $request->input('objetivos'),
            'intensidad' => $request->input('intensidad'),
            'duracion' => $request->input('duracion'),
            'descripcion' => $request->input('descripcion')
        ]);

        return redirect("$user->username/gimnasios/$gimnasio->nombre/actividades");
    }

    public function destroy($id){
        Actividade::where('id', $id)->delete();

        return redirect('/');
    }
}
