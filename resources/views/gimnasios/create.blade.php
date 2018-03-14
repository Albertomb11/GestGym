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
                <strong>Añadir Gimnasio</strong>
            </div>
        <div class="card-body">
        <form id="formularioCrearGimnasio" role="form" action="{{ route('gimnasios.create', array('user' => Auth::user()->username)) }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}

            <div class="form-group row{{ $errors->has('nombre') ? ' has-error' : '' }}">
                <label for="nombre" class="control-label">Nombre</label>

                <div class="col-lg-6">
                    <input id="nombre" type="text" class="form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }}" name="nombre" value="{{ old('nombre') }}">

                    @if ($errors->has('nombre'))
                    <div class="invalid-feedback">
                            <strong>{{ $errors->first('nombre') }}</strong>
                        </div>
                    @endif
                </div>
                @include('layouts.spinner')
            </div>

            <div class="form-group row{{ $errors->has('direccion') ? ' has-error' : '' }}">
                <label for="direccion" class="control-label">Dirección</label>

                <div class="col-lg-6">
                    <input id="direccion" type="text" class="form-control{{ $errors->has('direccion') ? ' is-invalid' : '' }}" name="direccion" value="{{ old('direccion') }}" >

                    @if ($errors->has('direccion'))
                        <div class="invalid-feedback">
                            <strong>{{ $errors->first('direccion') }}</strong>
                        </div>
                    @endif
                </div>
                @include('layouts.spinner')
            </div>

            <div class="form-group row{{ $errors->has('horario_apertura') ? ' has-error' : '' }}">
                <label for="horario_apertura" class="control-label">Horario de Apertura</label>

                <div class="col-lg-6">
                    <input id="horario_apertura" type="time" class="form-control{{ $errors->has('horario_apertura') ? ' is-invalid' : '' }}" name="horario_apertura" value="{{ old('horario_apertura') }}">

                    @if ($errors->has('horario_apertura'))
                        <div class="invalid-feedback">
                <strong>{{ $errors->first('horario_apertura') }}</strong>
            </div>
                    @endif
                </div>
                @include('layouts.spinner')
            </div>

            <div class="form-group row{{ $errors->has('horario_cierre') ? ' has-error' : '' }}">
                <label for="horario_cierre" class="control-label">Horario de cierre</label>

                <div class="col-lg-6">
                    <input id="horario_cierre" type="time" class="form-control{{ $errors->has('horario_cierre') ? ' is-invalid' : '' }}" name="horario_cierre" value="{{ old('horario_cierre') }}">

                    @if ($errors->has('horario_cierre'))
                        <div class="invalid-feedback">
                            <strong>{{ $errors->first('horario_cierre') }}</strong>
                        </div>
                    @endif
                </div>
                @include('layouts.spinner')
            </div>

            <div class="form-group row{{ $errors->has('cuotas') ? ' has-error' : '' }}">
        <label for="cuotas" class="control-label">Cuotas</label>

            <div class="col-lg-6">
            <input id="cuotas" type="number" class="form-control{{ $errors->has('cuotas') ? ' is-invalid' : '' }}" name="cuotas" value="{{ old('cuotas') }}">

            @if ($errors->has('cuotas'))
                <div class="invalid-feedback">
                <strong>{{ $errors->first('cuotas') }}</strong>
            </div>
            @endif
            </div>
            @include('layouts.spinner')
        </div>

            <div class="form-group row{{ $errors->has('descripcion') ? ' has-error' : '' }}">
        <label for="descripcion" class="control-label">Descripcion</label>

        <div class="col-lg-6">
            <input id="descripcion" type="text" class="form-control{{ $errors->has('descripcion') ? ' is-invalid' : '' }}" name="descripcion" value="{{ old('descripcion') }}">

            @if ($errors->has('descripcion'))
                <div class="invalid-feedback">
                <strong>{{ $errors->first('descripcion') }}</strong>
                </div>
            @endif
        </div>
        @include('layouts.spinner')
        </div>

        <div class="form-group row">
            <label for="image" class="button col-lg-4 col-form-label text-lg-right">Añadir Imagen</label>
            <input type="file" id="image" name="image" class="show-for-sr">
        </div>

            <div class="form-group row">
        <div class="col-lg-6 offset-lg-4">
    <button id="botonCrearGimnasio" type="submit" class="btn btn-primary btn-lg btn-block" data-toggle="tooltip" title="Añadir Gimnasio">Añadir</button>
        </div>
    </div>

        </form>
        </div>
        </div>
    </div>

</div>
@endsection

@push('scripts')
    <script src="{{ asset('js/formularioCrearGimnasioAsincrono.js') }}"></script>
@endpush