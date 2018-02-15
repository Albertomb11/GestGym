@extends('layouts.app')

@section('content')
    <div class="container">

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
                            {{--<p class="card-block text-center">{{ $gimnasio->user->username }}</p>--}}
                        </div>
                    </div>
                    <div class="space"></div>
                </div>
            @empty
                <h1 class="text-center">No hay Gimnasios creados todavia</h1>
            @endforelse

    </div>
@endsection