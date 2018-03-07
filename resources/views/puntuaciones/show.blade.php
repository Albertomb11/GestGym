@extends('layouts.app')

@section('content')
<div class="row">
<div class="col-md-2">
    @include('navbar')
</div>
<div class="col-md-10">

    <h1 style="color: #fff;">{{ $monitores->id }}</h1>

    @forelse($puntuaciones as $puntuacion)
        <div class="row course-set courses__row event d-flex justify-content-around">
            {{--@foreach($chunk as $monitor)--}}
            <div class="card" style="width: 20rem; margin-top: 20px">
                <img class="card-img-top" src="https://image.freepik.com/vector-gratis/frase-en-un-fondo-de-hombre-musculado_23-2147533706.jpg" height="300px" alt="Card image cap">
                <div class="card-body">

                    {{$puntuacion['estrellas']}}
                    {{$puntuacion['comentario']}}

                </div>
            </div>
        </div>
    @empty
        <h1 class="text-center" style="color: #fff; margin-top: 50px">No hay Puntuaciones añadidas todavia</h1>
    @endforelse
</div>
</div>
@endsection
