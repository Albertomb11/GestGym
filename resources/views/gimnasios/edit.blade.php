@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-2">
        @include('navbar')
    </div>

    <div class="container" style="background: linear-gradient(to top right, #3366ff 0%, #ccccff 100%);border-radius: 10%; margin-top: 30px">
        <div class="col-md-10" style="color: #fff">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <h1 class="page-header title text-center">Actualizar Gimnasio</h1>
            </div>
        </div>

        <form id="formularioActualizarGimnasio" role="form" action="/{{ $user->username }}/gimnasios/{{ $gimnasio->id }}/edit" method="post">
            {{ csrf_field() }}

            <div class="form-group row{{ $errors->has('nombre') ? ' has-error' : '' }}">
                <label for="nombre" class="col-lg-4 col-form-label text-lg-right"><h2>Nombre</h2></label>

                <div class="col-lg-6">
                    <input id="nombre" type="text" class="form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }}" name="nombre" value="{{ $gimnasio->nombre }}">

                    @if ($errors->has('nombre'))
                    <div class="invalid-feedback">
                            <strong>{{ $errors->first('nombre') }}</strong>
                        </div>
                    @endif
                </div>
                @include('layouts.spinner')
            </div>

            <div class="form-group row{{ $errors->has('direccion') ? ' has-error' : '' }}">
                <label for="direccion" class="col-lg-4 col-form-label text-lg-right"><h2>Dirección</h2></label>

                <div class="col-lg-6">
                    <input id="direccion" type="text" class="form-control{{ $errors->has('direccion') ? ' is-invalid' : '' }}" name="direccion" value="{{ $gimnasio->direccion }}" >

                    @if ($errors->has('direccion'))
                        <div class="invalid-feedback">
                            <strong>{{ $errors->first('direccion') }}</strong>
                        </div>
                    @endif
                </div>
                @include('layouts.spinner')
            </div>

            <div class="form-group row{{ $errors->has('horario_apertura') ? ' has-error' : '' }}">
                <label for="horario_apertura" class="col-lg-4 col-form-label text-lg-right"><h2>Horario de Apertura</h2></label>

                <div class="col-lg-6">
                    <input id="horario_apertura" type="time" class="form-control{{ $errors->has('horario_apertura') ? ' is-invalid' : '' }}" name="horario_apertura" value="{{ $gimnasio->horario_apertura }}">

                    @if ($errors->has('horario_apertura'))
                        <div class="invalid-feedback">
                <strong>{{ $errors->first('horario_apertura') }}</strong>
            </div>
                    @endif
                </div>
                @include('layouts.spinner')
            </div>

            <div class="form-group row{{ $errors->has('horario_cierre') ? ' has-error' : '' }}">
                <label for="horario_cierre" class="col-lg-4 col-form-label text-lg-right"><h2>Horario de cierre</h2></label>

                <div class="col-lg-6">
                    <input id="horario_cierre" type="time" class="form-control{{ $errors->has('horario_cierre') ? ' is-invalid' : '' }}" name="horario_cierre" value="{{ $gimnasio->horario_cierre }}">

                    @if ($errors->has('horario_cierre'))
                        <div class="invalid-feedback">
                            <strong>{{ $errors->first('horario_cierre') }}</strong>
                        </div>
                    @endif
                </div>
                @include('layouts.spinner')
            </div>

            <div class="form-group row{{ $errors->has('cuotas') ? ' has-error' : '' }}">
        <label for="cuotas" class="col-lg-4 col-form-label text-lg-right"><h2>Cuotas</h2></label>

            <div class="col-lg-6">
            <input id="cuotas" type="number" class="form-control{{ $errors->has('cuotas') ? ' is-invalid' : '' }}" name="cuotas" value="{{ $gimnasio->cuotas }}">

            @if ($errors->has('cuotas'))
                <div class="invalid-feedback">
                <strong>{{ $errors->first('cuotas') }}</strong>
            </div>
            @endif
            </div>
            @include('layouts.spinner')
        </div>

            <div class="form-group row{{ $errors->has('descripcion') ? ' has-error' : '' }}">
        <label for="descripcion" class="col-lg-4 col-form-label text-lg-right"><h2>Descripcion</h2></label>

        <div class="col-lg-6">
            <input id="descripcion" type="text" class="form-control{{ $errors->has('descripcion') ? ' is-invalid' : '' }}" name="descripcion" value="{{ $gimnasio->descripcion }}">

            @if ($errors->has('descripcion'))
                <div class="invalid-feedback">
                <strong>{{ $errors->first('descripcion') }}</strong>
                </div>
            @endif
        </div>
        @include('layouts.spinner')
        </div>

            <div class="form-group row">
        <div class="col-lg-6 offset-lg-4">
    <button id="botonActualizarGimnasio" type="submit" class="btn btn-primary btn-lg btn-block">Actualizar</button>
        </div>
    </div>

        </form>
    </div>

    </div>

</div>
@endsection

@push('scripts')
    <script src="{{ asset('js/formularioCrearGimnasioAsincrono.js') }}"></script>
@endpush