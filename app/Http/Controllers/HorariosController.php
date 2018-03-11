<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HorariosController extends Controller
{
    public function show(){

        return view('horarios.show');
    }

    public function create(){

        return view('horarios.create');
    }
}
