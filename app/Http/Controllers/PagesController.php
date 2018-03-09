<?php

namespace App\Http\Controllers;

use App\Chusqer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{
    /**
     * Genera la página de inicio del proyecto.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function home(){
        return view('home');
    }

    /**
     * Página de saludo.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function contacto(){
        return view('contacto');
    }
}
