@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-2">
        @include('navbar')
    </div>

    <div class="col-md-10">

        <div class="row justify-content-md-center mt-3">
        <div class="card card-cascade" style="width: 30rem;">
            <img class="card-img-top" src="{{ $gimnasios['imagen'] }}" height="300px" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title"><strong>{{$gimnasios['nombre']}}</strong></h5>

                <strong>Direccion: </strong>{{$gimnasios['direccion']}}
                <hr>
                <strong>Horario apertura: </strong>{{ substr($gimnasios['horario_apertura'], 0, -3) }}
                <hr>
                <strong>Horario cierre: </strong>{{ substr($gimnasios['horario_cierre'], 0, -3) }}
                <hr>
                <strong><a class="btn btn-secondary" href="/{{ $user->username }}/gimnasios/{{ $gimnasios->nombre }}/monitores">Monitores</a></strong>
                <strong><a class="btn btn-secondary" href="/{{ $user->username }}/gimnasios/{{ $gimnasios->nombre }}/actividades">Actividades</a></strong>
                <strong><a class="btn btn-secondary" href="/{{ $user->username }}/gimnasios/{{ $gimnasios->nombre }}/horarios">Horarios Clases</a></strong>
                <hr>
                <strong>Cuotas: </strong>{{$gimnasios['cuotas']}}€/mes
                <hr>
                <strong><a class="btn btn-secondary" href="/{{ $user->username }}/gimnasios/{{ $gimnasios->nombre }}/maquinas">Maquinas</a></strong>
                <strong><a class="btn btn-secondary" href="/{{ $user->username }}/gimnasios/{{ $gimnasios->nombre }}/productos">Productos</a></strong>
                <strong><a class="btn btn-secondary" href="/{{ $user->username }}/gimnasios/{{ $gimnasios->nombre }}/salas">Salas</a></strong>
                <hr>
                <strong>Descripcion: </strong>{{$gimnasios['descripcion']}}
                <hr>

                <div class="row">
                    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-xs-2"></div>
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-xs-4">
                    <a href="/{{ $user->username }}/gimnasios/{{ $gimnasios->nombre }}/edit" class="btn btn-primary">Editar</a>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-xs-4">
                        <button type="submit" class="btn btn-danger" data-toggle="modal" data-target="#deleteGimnasio">Borrar</button>
                    </div>
                </div>
            </div>
        </div>
        </div>

    </div>
</div>

<div class="modal fade" id="deleteGimnasio" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-secondary d-flex justify-content-center">

                <h4 class="modal-title  text-center">Estas seguro de eliminar: {{$gimnasios->nombre}}?</h4>

            </div>
            <div class="modal-body d-flex justify-content-between">
                <button type="button" class=" btn btn-success bg-success" data-dismiss="modal">
                    NO
                </button>
                <form action="{{route('gimnasio.delete',array('id' => $gimnasios->id))}}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button type="submit"  class="btn btn-danger">YES</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script src="{{ asset('js/formularioCrearGimnasioAsincrono.js') }}"></script>
@endpush

