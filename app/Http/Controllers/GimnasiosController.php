<?php

namespace App\Http\Controllers;

use App\Actividades;
use App\Gimnasio;
use App\Http\Requests\CreateGimnasioAjaxFormRequest;
use App\Http\Requests\CreateGimnasioRequest;
use App\Monitores;
use App\User;
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

    public function store(CreateGimnasioRequest $request, $username){
        $user = User::where('username', $username)->first();

        Gimnasio::create([
            'nombre' => $request->input('nombre'),
            'user_id' => $user->id,
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
            return View::make('gimnasios.gimnasiosPublico', array('gimnasios' => $gimnasios))->render();
        }else{
            return redirect('/');
        }
    }

    public function validacionCreateGimnasiosAjax(CreateGimnasioAjaxFormRequest $request){
        return array();
    }

    public function edit(Gimnasio $gimnasio, $username){

        $gimnasio = Gimnasio::where('nombre', $nombre)->first();

        $user = User::where('username', $username)->first();

        dd($gimnasio);
        return view('gimnasios.edit',[
            'gimnasio' => $gimnasio,
            'user' => $user
        ]);
    }
}
