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
                        <h1 class="page-header title text-center">{{ $gimnasios->nombre }}</h1>
                    </div>
                </div>

        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th>Nombre</th>
                <th>Direccion</th>
                <th>Horario</th>
                <th>Monitores</th>
                <th>Actividades</th>
                <th>Cuotas</th>
                <th>Maquinas</th>
                <th>Productos</th>
                <th>Salas</th>
                <th>Descripcion</th>
            </tr>
            </thead>

                <tbody class="table-info">
                <tr>
                    <td>{{$gimnasios['nombre']}}</td>
                    <td>{{$gimnasios['direccion']}}</td>
                    <td>{{$gimnasios['horario']}}</td>
                    <td><a href="/{{ $user->username }}/gimnasios/{{ $gimnasios->nombre }}/monitores">Monitores</a></td>
                    <td><a href="/{{ $user->username }}/gimnasios/{{ $gimnasios->nombre }}/actividades">Actividades</a></td>
                    <td>{{$gimnasios['cuotas']}}</td>
                    <td><a href="#">Maquinas</a></td>
                    <td><a href="/{{ $user->username }}/gimnasios/{{ $gimnasios->nombre }}/productos">Productos</a></td>
                    <td><a href="#">Salas</a></td>
                    <td>{{$gimnasios['descripcion']}}</td>
                </tr>
                </tbody>
        </table>

    </div>
</div>
@endsection

