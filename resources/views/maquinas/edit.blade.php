@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-2">
        @include('navbar')
    </div>

    <div class="col-md-8">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <h1 class="page-header title text-center" style="color: #fff">Actualizar {{ $maquina->nombre }}</h1>
            </div>
        </div>

        <div class="panel-body">
            <form class="form-control" action="/{{ $user->username }}/gimnasios/{{ $gimnasio->nombre }}/maquinas/{{ $maquina->id }}/edit" method="post">
                {{ csrf_field() }}
                {{ method_field('PUT') }}

                <div class="row">

                    <div class="col-md-6">
                        <div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }}">
                            <label for="nombre" class="col-md-4 control-label"><h2>Nombre</h2></label>

                            <input id="nombre" type="text" class="form-control" name="nombre" value="{{ $maquina->nombre }}">

                            @if ($errors->has('nombre'))
                                <span class="help-block alert-danger">
                                    <strong>{{ $errors->first('nombre') }}</strong>
                                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group{{ $errors->has('unidades') ? ' has-error' : '' }}">
                            <label for="unidades" class="col-md-4 control-label"><h2>Unidades</h2></label>

                            <input id="unidades" type="number" class="form-control" name="unidades" value="{{ $maquina->unidades }}">

                            @if ($errors->has('unidades'))
                                <span class="help-block alert-danger">
                                    <strong>{{ $errors->first('unidades') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group{{ $errors->has('zona_trabajada') ? ' has-error' : '' }}">
                            <label for="zona_trabajada" class="col-md-4 control-label"><h2>Zona trabajada</h2></label>

                            <input id="zona_trabajada" type="text" class="form-control" name="zona_trabajada" value="{{ $maquina->zona_trabajada }}">

                            @if ($errors->has('zona_trabajada'))
                                <span class="help-block alert-danger">
                                    <strong>{{ $errors->first('zona_trabajada') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group{{ $errors->has('descripcion') ? ' has-error' : '' }}">
                            <label for="descripcion" class="col-md-4 control-label"><h2>Descripcion</h2></label>

                            <input id="descripcion" type="text" class="form-control" name="descripcion" value="{{ $maquina->descripcion }}">

                            @if ($errors->has('descripcion'))
                                <span class="help-block alert-danger">
                                    <strong>{{ $errors->first('descripcion') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                </div>

                <button type="submit" class="btn btn-primary btn-lg btn-block">Actualizar</button>
            </form>
        </div>
    </div>
</div>
@endsection

