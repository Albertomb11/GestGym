@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-2">
        @include('navbar')
    </div>

    <div class="col-md-8">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <h1 class="page-header title text-center" style="color: #fff;">Actualizar {{ $sala->nombre }}</h1>
            </div>
        </div>

        <div class="panel-body">
            <form class="form-control" action="/{{ $user->username }}/gimnasios/{{ $gimnasio->nombre }}/salas/{{ $sala->id }}/edit" method="post">
                {{ csrf_field() }}
                {{ method_field('PUT') }}

                <div class="row">

                    <div class="col-md-6">
                        <div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }}">
                            <label for="nombre" class="col-md-4 control-label"><h2>Nombre</h2></label>

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
                            <label for="equipamiento" class="col-md-4 control-label"><h2>Equipamiento</h2></label>

                            <input id="equipamiento" type="text" class="form-control" name="equipamiento" value="{{ $sala->equipamiento }}">

                            @if ($errors->has('equipamiento'))
                                <span class="help-block alert-danger">
                                    <strong>{{ $errors->first('equipamiento') }}</strong>
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

