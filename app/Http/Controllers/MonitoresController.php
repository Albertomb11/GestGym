<?php

namespace App\Http\Controllers;

use App\Gimnasio;
use App\Http\Requests\CreateMonitoresRequest;
use App\Monitore;
use App\Puntuacione;
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

        $monitor = Monitore::create([
            'nombre' => $request->input('nombre'),
            'apellidos' => $request->input('apellidos'),
            'fecha_nacimiento' => $request->input('fecha_nacimiento'),
            'estudios' => $request->input('estudios'),
            'direccion' => $request->input('direccion'),
            'email' => $request->input('email')
        ]);

        $gimnasio->monitores()->attach($monitor);

        return redirect("$user->username/gimnasios/$gimnasio->nombre/monitores");
    }

    public function edit($username, $nombre, $id){
        $user = User::where('username', $username)->first();

        $gimnasio = Gimnasio::where('nombre', $nombre)->first();

        $monitor = Monitore::where('id', $id)->first();

        return view('monitores.edit',[
            'user' => $user,
            'gimnasio' => $gimnasio,
            'monitor' => $monitor
        ]);
    }

    public function update(CreateMonitoresRequest $request, $username, $nombre, $id){
        $user = User::where('username', $username)->first();

        $gimnasio = Gimnasio::where('nombre', $nombre)->first();

        $monitor = Monitore::find($id);

        $monitor->update([
            'nombre' => $request->input('nombre'),
            'apellidos' => $request->input('apellidos'),
            'fecha_nacimiento' => $request->input('fecha_nacimiento'),
            'estudios' => $request->input('estudios'),
            'direccion' => $request->input('direccion')
        ]);

        return redirect("$user->username/gimnasios/$gimnasio->nombre/monitores");
    }

    public function destroy($id){
        Monitore::where('id', $id)->delete();

        return redirect('/');
    }
}
