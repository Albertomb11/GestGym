@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-2">
        @include('navbar')
    </div>

    <div class="col-md-8">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <h1 class="page-header title text-center" style="color: #fff">Actualizar {{ $monitor->nombre }}</h1>
            </div>
        </div>

        <div class="panel-body">
            <form class="form-control" action="/{{ $user->username }}/gimnasios/{{ $gimnasio->nombre }}/monitores/{{ $monitor->id }}/edit" method="post">
                {{ csrf_field() }}
                {{ method_field('PUT') }}

                <div class="row">

                    <div class="col-md-6">
                        <div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }}">
                            <label for="nombre" class="col-md-4 control-label"><h2>Nombre</h2></label>

                            <input id="nombre" type="text" class="form-control" name="nombre" value="{{ $monitor->nombre }}">

                            @if ($errors->has('nombre'))
                                <span class="help-block alert-danger">
                                    <strong>{{ $errors->first('nombre') }}</strong>
                                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group{{ $errors->has('apellidos') ? ' has-error' : '' }}">
                            <label for="apellidos" class="col-md-4 control-label"><h2>Apellidos</h2></label>

                            <input id="apellidos" type="text" class="form-control" name="apellidos" value="{{ $monitor->apellidos }}">

                            @if ($errors->has('apellidos'))
                                <span class="help-block alert-danger">
                                    <strong>{{ $errors->first('apellidos') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group{{ $errors->has('fecha_nacimiento') ? ' has-error' : '' }}">
                            <label for="fecha_nacimiento" class="col-md-4 control-label"><h2>Edad</h2></label>

                            <input id="fecha_nacimiento" type="date" class="form-control" name="fecha_nacimiento" value="{{ $monitor->fecha_nacimiento }}">

                            @if ($errors->has('fecha_nacimiento'))
                                <span class="help-block alert-danger">
                                    <strong>{{ $errors->first('fecha_nacimiento') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label"><h2>Email</h2></label>

                            <input id="email" type="email" class="form-control" name="email" value="{{ $monitor->email }}">

                            @if ($errors->has('email'))
                                <span class="help-block alert-danger">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                </div>

                <div class="row">

                    <div class="col-md-6">
                        <div class="form-group{{ $errors->has('estudios') ? ' has-error' : '' }}">
                            <label for="estudios" class="col-md-4 control-label"><h2>Estudios</h2></label>

                            <input id="estudios" type="text" class="form-control" name="estudios" value="{{ $monitor->estudios }}">

                            @if ($errors->has('estudios'))
                                <span class="help-block alert-danger">
                                    <strong>{{ $errors->first('estudios') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group{{ $errors->has('direccion') ? ' has-error' : '' }}">
                            <label for="direccion" class="col-md-4 control-label"><h2>Dirección</h2></label>

                            <input id="direccion" type="text" class="form-control" name="direccion" value="{{ $monitor->direccion }}">

                            @if ($errors->has('direccion'))
                                <span class="help-block alert-danger">
                                    <strong>{{ $errors->first('direccion') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary btn-lg btn-block">Editar</button>
            </form>
        </div>
    </div>
</div>
@endsection

