@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-2">
        @include('navbar')
    </div>
    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-xl-2"></div>

    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-xs-6">
        <div class="card">
            <div class="card-header">
                <strong>Actualizar {{ $monitor->nombre }}</strong>
            </div>

        <div class="card-body">
            <form id="formularioCrearMonitor" class="form-control" action="/{{ $user->username }}/gimnasios/{{ $gimnasio->nombre }}/monitores/{{ $monitor->id }}/edit" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{ method_field('PUT') }}

                <div class="row">

                    <div class="col-md-6">
                        <div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }}">
                            <label for="nombre" class="control-label"><h2>Nombre</h2></label>

                            <input id="nombre" type="text" class="form-control" name="nombre" value="{{ $monitor->nombre }}">

                            @if ($errors->has('nombre'))
                                <span class="help-block alert-danger">
                                    <strong>{{ $errors->first('nombre') }}</strong>
                                            </span>
                            @endif
                        </div>
                        @include('layouts.spinner')
                    </div>

                    <div class="col-md-6">
                        <div class="form-group{{ $errors->has('apellidos') ? ' has-error' : '' }}">
                            <label for="apellidos" class="control-label"><h2>Apellidos</h2></label>

                            <input id="apellidos" type="text" class="form-control" name="apellidos" value="{{ $monitor->apellidos }}">

                            @if ($errors->has('apellidos'))
                                <span class="help-block alert-danger">
                                    <strong>{{ $errors->first('apellidos') }}</strong>
                                </span>
                            @endif
                        </div>
                        @include('layouts.spinner')
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group{{ $errors->has('fecha_nacimiento') ? ' has-error' : '' }}">
                            <label for="fecha_nacimiento" class="control-label"><h2>Edad</h2></label>

                            <input id="fecha_nacimiento" type="date" class="form-control" name="fecha_nacimiento" value="{{ $monitor->fecha_nacimiento }}">

                            @if ($errors->has('fecha_nacimiento'))
                                <span class="help-block alert-danger">
                                    <strong>{{ $errors->first('fecha_nacimiento') }}</strong>
                                </span>
                            @endif
                        </div>
                        @include('layouts.spinner')
                    </div>

                    <div class="col-md-6">
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="control-label"><h2>Email</h2></label>

                            <input id="email" type="email" class="form-control" name="email" value="{{ $monitor->email }}">

                            @if ($errors->has('email'))
                                <span class="help-block alert-danger">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                        @include('layouts.spinner')
                    </div>

                </div>

                <div class="row">

                    <div class="col-md-6">
                        <div class="form-group{{ $errors->has('estudios') ? ' has-error' : '' }}">
                            <label for="estudios" class="control-label"><h2>Estudios</h2></label>

                            <input id="estudios" type="text" class="form-control" name="estudios" value="{{ $monitor->estudios }}">

                            @if ($errors->has('estudios'))
                                <span class="help-block alert-danger">
                                    <strong>{{ $errors->first('estudios') }}</strong>
                                </span>
                            @endif
                        </div>
                        @include('layouts.spinner')
                    </div>

                    <div class="col-md-6">
                        <div class="form-group{{ $errors->has('direccion') ? ' has-error' : '' }}">
                            <label for="direccion" class="control-label"><h2>Dirección</h2></label>

                            <input id="direccion" type="text" class="form-control" name="direccion" value="{{ $monitor->direccion }}">

                            @if ($errors->has('direccion'))
                                <span class="help-block alert-danger">
                                    <strong>{{ $errors->first('direccion') }}</strong>
                                </span>
                            @endif
                        </div>
                        @include('layouts.spinner')
                    </div>
                </div>

                <div class="form-group row">
                    <label for="image" class="button col-lg-4 col-form-label text-lg-right">Añadir Imagen</label>
                    <input type="file" id="image" name="image" class="show-for-sr">
                </div>

                <button id="botonCrearMonitor" type="submit" class="btn btn-primary btn-lg btn-block" data-toggle="tooltip" data-placement="top" title="Editar">Editar</button>
            </form>
        </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    // Reutilizo la misma funcion que utilizo para crear un monitor
    <script src="{{ asset('js/formularioCrearMonitorAsincrono.js') }}"></script>
@endpush