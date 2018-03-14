@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-xl-2">
        @include('navbar')
    </div>
    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-xl-2"></div>

    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-xs-6">
        <div class="card">
            <div class="card-header">
                <strong>Actualizar {{ $sala->nombre }}</strong>
            </div>
            <div class="card-body">
            <form id="formularioCrearSala" class="form-control" action="/{{ $user->username }}/gimnasios/{{ $gimnasio->nombre }}/salas/{{ $sala->id }}/edit" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{ method_field('PUT') }}

                <div class="row">

                    <div class="col-md-6">
                        <div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }}">
                            <label for="nombre" class="control-label">Nombre</label>

                            <input id="nombre" type="text" class="form-control" name="nombre" value="{{ $sala->nombre }}">

                            @if ($errors->has('nombre'))
                                <span class="help-block alert-danger">
                                    <strong>{{ $errors->first('nombre') }}</strong>
                                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group{{ $errors->has('equipamiento') ? ' has-error' : '' }}">
                            <label for="equipamiento" class="control-label">Equipamiento</label>

                            <input id="equipamiento" type="text" class="form-control" name="equipamiento" value="{{ $sala->equipamiento }}">

                            @if ($errors->has('equipamiento'))
                                <span class="help-block alert-danger">
                                    <strong>{{ $errors->first('equipamiento') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="image" class="button col-lg-4 col-form-label text-lg-right">Añadir Imagen</label>
                    <input type="file" id="image" name="image" class="show-for-sr">
                </div>

                <button id="botonCrearSala" type="submit" class="btn btn-primary btn-lg btn-block" data-toggle="tooltip" data-placement="top" title="Actualizar">Actualizar</button>
            </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script src="{{ asset('js/formularioCrearSalaAsincrono.js') }}"></script>
@endpush