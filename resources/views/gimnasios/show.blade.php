@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-2">
        @include('navbar')
    </div>

    <div class="col-md-8">

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <h1 class="page-header title text-center" style="color: #fff">Gimnasios</h1>
            </div>
        </div>

        @forelse($gimnasios->chunk(3) as $chunk)
            <div class="row course-set courses__row event d-flex justify-content-around">
            @foreach($chunk as $gimnasio)
        <div id="draggable" class="contenedor">
        <div class="contenedor_tarjeta">
            <a href="/{{ $user->username }}/gimnasios/{{ $gimnasio->nombre }}">
                <figure>
                    <img src="https://image.freepik.com/vector-gratis/frase-en-un-fondo-de-hombre-musculado_23-2147533706.jpg" class="frontal" alt="imagen de {{$gimnasio['nombre']}}">
                    <figcaption class="trasera">
                        <h2 class="titulo">{{$gimnasio['nombre']}}</h2>
                        <hr>
                        <p class="card-block text-center">Dirección: {{$gimnasio['direccion']}}</p>
                        <p class="card-block text-center">Horario Apertura: {{$gimnasio['horario_apertura']}}</p>
                        <p class="card-block text-center">Horario Cierre: {{$gimnasio['horario_cierre']}}</p>
                        <p class="card-block text-center">Cuota: {{$gimnasio['cuotas']}}€/mes</p>
                    </figcaption>
                </figure>
            </a>
        </div>
        </div>
            @endforeach
            </div>
        @empty
            <h1 class="text-center" style="color: #fff">No hay Gimnasios creados todavia</h1>
        @endforelse

    </div>

    <div class="col-md-2 text-center">

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <h1 class="page-header title text-center" style="color: #fff">{{ Auth::user()->username }}</h1>
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

@push('scripts')
    <script src="{{ asset('js/draggable.js') }}"></script>
@endpush