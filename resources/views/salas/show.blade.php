@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-2">
        @include('navbar')
    </div>

    <div class="col-md-8">

        @forelse($salas->chunk(3) as $chunk)
            <div class="row course-set courses__row event d-flex justify-content-around">
                @foreach($chunk as $sala)
                    <div class="card" style="width: 20rem; margin-top: 20px">
                        <img class="card-img-top" src="https://well.org/wp-content/uploads/2017/03/When-You-Shouldnu2019t-Take-A-Sauna.jpg" height="200px" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title"><strong>{{$sala['nombre']}}</strong></h5>

                            <div class="container">
                                <a href="/{{ $user->username }}/gimnasios/{{ $gimnasio->nombre }}/salas/{{ $sala->id }}/edit" class="btn btn-primary">Editar</a>
                                <a href="#" class="btn btn-danger">Borrar</a>
                            </div>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">{{$sala['equipamiento']}}</small>
                        </div>
                    </div>
                @endforeach
            </div>
        @empty
            <h1 class="text-center" style="color: #fff; margin-top: 50px">No hay Salas añadidas todavia</h1>
        @endforelse

    </div>

    <div class="col-md-2 text-center">

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <h1 class="page-header title text-center" style="color: #fff;">{{ $gimnasio->nombre }}</h1>
            </div>
        </div>

        <button class="btn btn-success w-75" type="button">
            <a class="nav-link disabled" href="/{{ $user->username }}/gimnasios/{{ $gimnasio->nombre }}/salas/create">
                <span class="button-group-addon" ><img src="http://simpleicon.com/wp-content/uploads/account.svg" width="30" height="30" alt=""></span>
                Añadir Sala
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

@push('scripts')

@endpush