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
                <strong>Actualizar {{ $actividad->nombre }}</strong>
            </div>

        <div class="panel-body">
            <form id="formularioCrearActividad" class="form-control" action="/{{ $user->username }}/gimnasios/{{ $gimnasio->nombre }}/actividades/{{ $actividad->id }}/edit" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{ method_field('PUT') }}

                <div class="row">

                    <div class="col-md-6">
                        <div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }}">
                            <label for="nombre" class="control-label"><h2>Nombre</h2></label>

                            <input id="nombre" type="text" class="form-control" name="nombre" value="{{ $actividad->nombre }}">

                            @if ($errors->has('nombre'))
                                <span class="help-block alert-danger">
                                    <strong>{{ $errors->first('nombre') }}</strong>
                                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group{{ $errors->has('duracion') ? ' has-error' : '' }}">
                            <label for="duracion" class="control-label"><h2>Duracion</h2></label>

                            <input id="duracion" type="number" class="form-control" name="duracion" value="{{ $actividad->duracion }}">

                            @if ($errors->has('duracion'))
                                <span class="help-block alert-danger">
                                    <strong>{{ $errors->first('duracion') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group{{ $errors->has('intensidad') ? ' has-error' : '' }}">
                            <label for="intensidad" class="control-label"><h2>Intensidad</h2></label>

                            <select id="intensidad" type="text" class="form-control" name="intensidad">
                                <option selected value="baja">Baja</option>
                                <option value="media">Media</option>
                                <option value="alta">Alta</option>
                            </select>

                            @if ($errors->has('intensidad'))
                                <span class="help-block alert-danger">
                                    <strong>{{ $errors->first('intensidad') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group{{ $errors->has('objetivos') ? ' has-error' : '' }}">
                            <label for="objetivos" class="control-label"><h2>Objetivos</h2></label>

                            <input id="objetivos" type="text" class="form-control" name="objetivos" value="{{ $actividad->objetivos }}">

                            @if ($errors->has('objetivos'))
                                <span class="help-block alert-danger">
                                    <strong>{{ $errors->first('objetivos') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                </div>

                <div class="row">

                    <div class="col-md-6">
                        <div class="form-group{{ $errors->has('descripcion') ? ' has-error' : '' }}">
                            <label for="descripcion" class="control-label"><h3>Descripción</h3></label>

                            <input id="descripcion" type="text" class="form-control" name="descripcion" value="{{ $actividad->descripcion }}">

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

                <button id="botonCrearActividad" type="submit" class="btn btn-primary btn-lg btn-block" data-toggle="tooltip" data-placement="top" title="Actualizar">Actualizar</button>
            </form>
        </div>
    </div>
    </div>
</div>
@endsection

@push('scripts')
    <script src="{{ asset('js/formularioCrearActividadAsincrono.js') }}"></script>
@endpush