<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class AsincronoController extends Controller
{
    public function formularioRegistro(){
        if (request()->ajax()){
            return View::make('auth.vistaRegister')->render();
        }else{
            return redirect('/');
        }
    }

    public function formularioEditarPerfil(){
        if (request()->ajax()){
            return View::make('user.edit')->render();
        }else{
            return redirect('/');
        }
    }
}
