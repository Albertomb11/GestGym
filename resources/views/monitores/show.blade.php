@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-2">
        @include('navbar')
    </div>

    <div class="col-md-8">

            @forelse($monitores->chunk(3) as $chunk)
            <div class="row course-set courses__row event d-flex justify-content-around">
                @foreach($chunk as $monitor)
            <div class="card" style="width: 20rem; margin-top: 20px">
                <img class="card-img-top" src="{{ $monitor['imagen'] }}" height="300px" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title"><strong>{{$monitor['nombre']}} {{$monitor['apellidos']}}</strong></h5>

                    <strong>Email: </strong>{{$monitor['email']}}
                    <hr>
                    <strong>Fecha de nacimiento: </strong>{{$monitor['fecha_nacimiento']}}
                    <hr>
                    <strong>Estudios: </strong>{{$monitor['estudios']}}
                    <hr>
                    <strong>Direccion: </strong>{{$monitor['direccion']}}
                    <hr>
                    <strong><a class="btn btn-secondary" href="/monitor/{{ $monitor->nombre }}/puntuaciones">Puntuacion</a></strong>
                    <hr>

                    <div class="container">
                        <a href="/{{ $user->username }}/gimnasios/{{ $gimnasio->nombre }}/monitores/{{ $monitor->id }}/edit" class="btn btn-primary">Editar</a>
                        <form action="{{route('monitor.delete',array('id' => $monitor  ['id']))}}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button type="submit" class="btn btn-danger">Borrar</button>
                        </form>
                    </div>
                </div>
            </div>
                @endforeach
            </div>
            @empty
                <h1 class="text-center" style="color: #fff; margin-top: 50px">No hay Monitores añadidos todavia</h1>
            @endforelse
    </div>

    <div class="col-md-2 text-center">

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <h1 class="page-header title text-center" style="color: #fff;">{{ $gimnasio->nombre }}</h1>
            </div>
        </div>

        <button class="btn btn-success w-75" type="button">
            <a class="nav-link disabled" href="/{{ $user->username }}/gimnasios/{{ $gimnasio->nombre }}/monitores/create">
                <span class="button-group-addon" ><img src="http://simpleicon.com/wp-content/uploads/account.svg" width="30" height="30" alt=""></span>
                Añadir Monitor
            </a>
        </button>
        <hr>
        <button class="btn-lg btn-success w-75" type="button">
            <a class="nav-link disabled" href="/{{ $user->username }}/gimnasios/{{ $gimnasio->nombre }}">
                Volver a {{ $gimnasio->nombre }}
            </a>
        </button>

    </div>

</div>
@endsection
