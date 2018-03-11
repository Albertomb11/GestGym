<?php

namespace App\Http\Controllers;

use App\Gimnasio;
use App\Http\Requests\CreateMonitoresRequest;
use App\Monitore;
use App\Puntuacione;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

        if( $imagen = $request->file('imagen') ){
            $url = $imagen->store('imagen','public');
        }else{
            $url = "https://picsum.photos/150/150/?random";
        }

        $monitor = Monitore::create([
            'nombre' => $request->input('nombre'),
            'imagen' => $url,
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

        if( $imagen = $request->file('imagen') ){
            if( !strpos($monitor->imagen, "http") ) {
                $routeParts = explode('/', $monitor->imagen);
                Storage::disk('public')->delete('monitor/'.end($routeParts));
            }

            $url = $imagen->store('monitor','public');
        }else{
            $url = $monitor->imagen;
        }

        $monitor->fill([
            'imagen' => $url,
            'nombre' => $request->input('nombre'),
            'apellidos' => $request->input('apellidos'),
            'fecha_nacimiento' => $request->input('fecha_nacimiento'),
            'estudios' => $request->input('estudios'),
            'direccion' => $request->input('direccion')
        ]);

        $monitor->update();

        return redirect("$user->username/gimnasios/$gimnasio->nombre/monitores");
    }

    public function destroy($id){
        Monitore::where('id', $id)->delete();

        return redirect('/');
    }
}
