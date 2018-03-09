@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-2">
        @include('navbar')
    </div>

    <div class="col-md-10">

        <div class="row justify-content-md-center mt-3">
        <div class="card card-cascade" style="width: 30rem;">
            <img class="card-img-top" src="{{ $gimnasios->imagen }}" height="300px" alt="Card image cap">
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
                <strong><a class="btn btn-secondary" href="#">Horarios Clases</a></strong>
                <hr>
                <strong>Cuotas: </strong>{{$gimnasios['cuotas']}}€/mes
                <hr>
                <strong><a class="btn btn-secondary" href="/{{ $user->username }}/gimnasios/{{ $gimnasios->nombre }}/maquinas">Maquinas</a></strong>
                <strong><a class="btn btn-secondary" href="/{{ $user->username }}/gimnasios/{{ $gimnasios->nombre }}/productos">Productos</a></strong>
                <strong><a class="btn btn-secondary" href="/{{ $user->username }}/gimnasios/{{ $gimnasios->nombre }}/salas">Salas</a></strong>
                <hr>
                <strong>Descripcion: </strong>{{$gimnasios['descripcion']}}
                <hr>

                <div class="container">
                    <a href="/{{ $user->username }}/gimnasios/{{ $gimnasios->nombre }}/edit" class="btn btn-primary">Editar</a>
                    <form action="{{route('gimnasio.delete',array('id' => $gimnasios['id']))}}" method="post">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button type="submit" class="btn btn-danger">Borrar</button>
                    </form>
                </div>
            </div>
        </div>
        </div>

    </div>
</div>
@endsection

@push('scripts')

@endpush

