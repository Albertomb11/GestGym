@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-2">
        @include('navbar')
    </div>

    <div class="col-md-8">

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <h1 class="page-header title text-center">Monitores</h1>
            </div>
        </div>

        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th>Nombre</th>
                <th>Objetivos</th>
                <th>Intensidad</th>
                <th>Duración</th>
                <th>Horario</th>
                <th>Descripción</th>
            </tr>
            </thead>

                <tbody class="table-info">
                @forelse($actividades as $actividad)
                <tr>
                    <td>{{$actividad['nombre']}}</td>
                    <td>{{$actividad['objetivos']}}</td>
                    <td>{{$actividad['intensidad']}}</td>
                    <td>{{$actividad['duracion']}} min</td>
                    <td>{{$actividad['horario']}}</td>
                    <td>{{$actividad['descripcion']}}</td>
                </tr>
                @empty
                    <h1 class="text-center">No hay Actividades añadidas todavia</h1>
                @endforelse
                </tbody>
        </table>
    </div>

    <div class="col-md-2 text-center">

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <h1 class="page-header title text-center">{{ $gimnasio->nombre }}</h1>
            </div>
        </div>

        <button class="btn btn-success" type="button">
            <a class="nav-link disabled" href="/{{ $user->username }}/gimnasios/{{ $gimnasio->nombre }}/actividades/create">
                <span class="button-group-addon" ><img src="http://simpleicon.com/wp-content/uploads/account.svg" width="30" height="30" alt=""></span>
                Añadir Actividad
            </a>
        </button>
    </div>

</div>
@endsection
