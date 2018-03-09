@extends('layouts.app')

@section('content')
<div class="row">
<div class="col-md-2">
    @include('navbar')
</div>
<div class="col-md-8">

    <h1 style="color: #fff;">{{ $monitores->nombre }}</h1>

    @forelse($puntuaciones->chunk(4) as $chunk)
        <div class="row course-set courses__row event d-flex justify-content-around">
            @foreach($chunk as $puntuacion)
            <div class="card" style="width: 18rem; margin-top: 20px">
                <div class="card-body">
                    <strong>Valoracion: </strong>{{$puntuacion['estrellas']}}
                </div>

                <div class="card-footer">
                    <small class="text-muted"><strong>Comentario: </strong>{{$puntuacion['comentario']}}</small>
                </div>

            </div>
            @endforeach
        </div>
    @empty
        <h1 class="text-center" style="color: #fff; margin-top: 50px">No hay Puntuaciones añadidas todavia</h1>
    @endforelse

</div>
    <div class="col-md-2">
        <button class="btn btn-success" type="button">
            <a class="nav-link disabled" href="/monitor/{{ $monitores->nombre }}/puntuaciones/create">
                <span class="button-group-addon" ><img src="http://simpleicon.com/wp-content/uploads/account.svg" width="30" height="30" alt=""></span>
                Añadir Puntuacion
            </a>
        </button>
    </div>
</div>
@endsection
