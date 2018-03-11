@extends('layouts.app')

@section('content')
<div class="row">
<div class="col-md-2">
    @include('navbar')
</div>
<div class="col-md-8">
    <form class="form-control" action="" method="post">
        {{ csrf_field() }}

        <div class="row">
            <div class="col-md-4">
                <div class="form-group{{ $errors->has('dia_semana') ? ' has-error' : '' }}">
                    <label for="dia_semana" class="control-label">Dia de la semana</label>

                    <select id="dia_semana" type="text" class="form-control" name="dia_semana">
                        <option>Lunes</option>
                        <option>Martes</option>
                        <option>Miercoles</option>
                        <option>Jueves</option>
                        <option>Viernes</option>
                        <option>Sabado</option>
                        <option>Domingo</option>
                    </select>

                    @if ($errors->has('dia_semana'))
                        <span class="help-block alert-danger">
                            <strong>{{ $errors->first('dia_semana') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group{{ $errors->has('hora_inicio') ? ' has-error' : '' }}">
                    <label for="hora_inicio" class="control-label">Hora de inicio</label>

                    <input id="hora_inicio" type="time" class="form-control" name="hora_inicio">

                    @if ($errors->has('hora_inicio'))
                        <span class="help-block alert-danger">
                    <strong>{{ $errors->first('hora_inicio') }}</strong>
                </span>
                    @endif
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group{{ $errors->has('hora_fin') ? ' has-error' : '' }}">
                    <label for="hora_fin" class="control-label">Hora que acaba</label>

                    <input id="hora_fin" type="time" class="form-control" name="hora_fin">

                    @if ($errors->has('hora_fin'))
                        <span class="help-block alert-danger">
                    <strong>{{ $errors->first('hora_fin') }}</strong>
                </span>
                    @endif
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary btn-lg btn-block">Añadir</button>

    </form>
</div>
<div class="col-md-2"></div>
</div>
@endsection