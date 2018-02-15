<?php

namespace App\Http\Controllers;

use App\Gimnasio;
use App\Http\Requests\CreateMonitoresRequest;
use App\Monitores;
use App\Puntuaciones;
use App\User;
use Illuminate\Http\Request;

class MonitoresController extends Controller
{
    public function show($username, $nombre){
        $user = User::where('username', $username)->first();

        $gimnasio = Gimnasio::where('nombre', $nombre)->first();

        $monitores = $gimnasio->monitores()->get();

        return view('monitores.show', [
            'monitores' => $monitores,
            'gimnasio' => $gimnasio,
            'user' => $user
        ]);
    }

    public function create(User $username){

        return view('monitores.create', [
           'username' => $username
        ]);
    }

    public function store(CreateMonitoresRequest $request, $username, $nombre){
        $user = User::where('username', $username)->first();
        $gimnasio = Gimnasio::where('nombre', $nombre)->first();

        Monitores::create([
            'nombre' => $request->input('nombre'),
            'gimnasio_id' => $gimnasio->id,
            'apellidos' => $request->input('apellidos'),
            'fecha_nacimiento' => $request->input('fecha_nacimiento'),
            'estudios' => $request->input('estudios'),
            'direccion' => $request->input('direccion'),
            'email' => $request->input('email')
        ]);

        return redirect("$user->username/gimnasios/$gimnasio->nombre/monitores");
    }
}
