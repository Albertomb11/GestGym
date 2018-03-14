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
                <strong>Crear Maquina</strong>
            </div>

        <div class="card-body">
            <form id="formularioCrearMaquina" class="form-control" action="" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}

                <div class="row">

                    <div class="col-md-6">
                        <div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }}">
                            <label for="nombre" class="control-label">Nombre</label>

                            <input id="nombre" type="text" class="form-control" name="nombre" value="{{ old('nombre') }}">

                            @if ($errors->has('nombre'))
                                <span class="help-block alert-danger">
                                    <strong>{{ $errors->first('nombre') }}</strong>
                                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group{{ $errors->has('unidades') ? ' has-error' : '' }}">
                            <label for="unidades" class="control-label">Unidades</label>

                            <input id="unidades" type="number" class="form-control" name="unidades" value="{{ old('unidades') }}">

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
                            <label for="zona_trabajada" class="control-label">Zona trabajada</label>

                            <input id="zona_trabajada" type="text" class="form-control" name="zona_trabajada" value="{{ old('zona_trabajada') }}">

                            @if ($errors->has('zona_trabajada'))
                                <span class="help-block alert-danger">
                                    <strong>{{ $errors->first('zona_trabajada') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group{{ $errors->has('descripcion') ? ' has-error' : '' }}">
                            <label for="descripcion" class="control-label">Descripcion</label>

                            <input id="descripcion" type="text" class="form-control" name="descripcion" value="{{ old('descripcion') }}">

                            @if ($errors->has('descripcion'))
                                <span class="help-block alert-danger">
                                    <strong>{{ $errors->first('descripcion') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                </div>

                <div class="form-group row">
                    <label for="image" class="button col-lg-4 col-form-label text-lg-right">Añadir Imagen</label>
                    <input type="file" id="image" name="image" class="show-for-sr">
                </div>

                <button id="botonCrearMaquina" type="submit" class="btn btn-primary btn-lg btn-block" data-toggle="tooltip" title="Añadir">Añadir</button>
            </form>
        </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script src="{{ asset('js/formularioCrearMaquinaAsincrono.js') }}"></script>
@endpush