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

                    <div class="row">
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-xs-4">
                            <a class="btn btn-secondary" href="/monitor/{{ $monitor->nombre }}/puntuaciones" data-toggle="tooltip" data-placement="top" title="Mostrar Puntuacion">Puntuacion</a>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-xs-4">
                        <a href="/{{ $user->username }}/gimnasios/{{ $gimnasio->nombre }}/monitores/{{ $monitor->id }}/edit" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Editar Monitor">Editar</a>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-xs-4">
                            <button type="submit" class="btn btn-danger" data-toggle="modal" data-target="#deleteMonitor{{ $monitor->id }}">Borrar</button>

                            <div class="modal fade" id="deleteMonitor{{ $monitor->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header bg-secondary d-flex justify-content-center">

                                            <h4 class="modal-title  text-center">Estas seguro de eliminar: {{$monitor->nombre}}?</h4>

                                        </div>
                                        <div class="modal-body d-flex justify-content-between">
                                            <button type="button" class=" btn btn-success bg-success" data-dismiss="modal">
                                                NO
                                            </button>
                                            <form action="{{route('monitor.delete',array('id' => $monitor->id))}}" method="post">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <button type="submit"  class="btn btn-danger">YES</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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
            <a class="nav-link disabled" href="/{{ $user->username }}/gimnasios/{{ $gimnasio->nombre }}/monitores/create" data-toggle="tooltip" data-placement="top" title="Añadir Monitor">
                <span class="button-group-addon" ><img src="http://simpleicon.com/wp-content/uploads/account.svg" width="30" height="30" alt=""></span>
                Añadir Monitor
            </a>
        </button>
        <hr>
        <button class="btn-lg btn-success w-75" type="button">
            <a class="nav-link disabled" href="/{{ $user->username }}/gimnasios/{{ $gimnasio->nombre }}" data-toggle="tooltip" data-placement="top" title="Volver a {{ $gimnasio->nombre }}">
                Volver a {{ $gimnasio->nombre }}
            </a>
        </button>

    </div>

</div>
@endsection
