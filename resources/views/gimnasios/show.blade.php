@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-2">
        <nav class="nav flex-column navbar-dark bg-dark pr-5 pb-5 pl-4 position-relative h-100">

            <div class="text-center" style="padding-top: 2%">
                <button class="btn-lg w-100" type="button">
                    <a class="nav-link disabled" href="/">
                        <span class="button-group-addon" ><img src="http://simpleicon.com/wp-content/uploads/home-7.png" width="30" height="30" alt=""></span>
                        Home
                    </a>
                </button>
            </div>

            <div class="text-center" style="padding-top: 2%">
                <button class="btn-lg w-100" type="button">
                    <a class="nav-link disabled" href="{{route('user.perfil', array('user' => Auth::user()->username))}}">
                        <span class="button-group-addon" ><img src="http://simpleicon.com/wp-content/uploads/account.svg" width="30" height="30" alt=""></span>
                        Perfil
                    </a>
                </button>
            </div>

            <div class="text-center" style="padding-top: 2%">
                <button class="btn-lg w-100" type="button">
                    <a class="nav-link disabled" href="{{route('gimnasios.show', array('user' => Auth::user()->username))}}">
                        <span class="button-group-addon" ><img src="https://image.flaticon.com/icons/svg/34/34907.svg" width="30" height="30" alt=""></span>
                        Gimnasios
                    </a>
                </button>
            </div>
            <div class="dropdown-divider"></div>
            <a class="nav-link" href="#">Salir</a>
        </nav>
    </div>

    <div class="col-md-8">

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <h1 class="page-header title text-center">Gimnasios</h1>
            </div>
        </div>

        @forelse($gimnasios as $gimnasio)
        <div class="card-base">
            <div class="card-icon"><a href="#" title="Widgets" id="widgetCardIcon" class="imagecard"><span class="glyphicon glyphicon-user"></span></a>
                <div class="card-data widgetCardData">
                    <h1 class="box-title" style="color: #bb7824;">{{$gimnasio['nombre']}}</h1>
                    <p class="card-block text-center">Dirección: {{$gimnasio['direccion']}}</p>
                    <p class="card-block text-center">Horario: {{$gimnasio['horario']}}</p>
                    <p class="card-block text-center">Cuota: {{$gimnasio['cuotas']}}€/mes</p>
                    <a href="/{{ $user->username }}/gimnasios/{{ $gimnasio->nombre }}" title="Style Builder" class="anchor btn btn-default" style="background: #bb7824; border: #bb7824; color: black"><i class="fa fa-paper-plane" aria-hidden="true"></i>Gestionar</a>
                </div>
            </div>
            <div class="space"></div>
        </div>
        @empty
            <h1 class="text-center">No hay Gimnasios creados todavia</h1>
            @endforelse
    </div>

    <div class="col-md-2 text-center">

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <h1 class="page-header title text-center">{{ Auth::user()->username }}</h1>
            </div>
        </div>

        <button class="btn btn-success" type="button">
            <a class="nav-link disabled" href="{{route('gimnasios.form', array('username' => Auth::user()->username))}}">
                <span class="button-group-addon" ><img src="https://image.flaticon.com/icons/svg/34/34907.svg" width="30" height="30" alt=""></span>
                Añadir Gimnasio
            </a>
        </button>
    </div>

</div>
@endsection