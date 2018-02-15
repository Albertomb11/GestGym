@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-2">
        <nav class="nav flex-column navbar-dark bg-dark pr-5 pb-5 pl-4 position-relative h-100">

            <div class="text-center" style="padding-top: 2%">
                <button class="btn-lg w-100" type="button">
                    <a class="nav-link disabled" href="/">
                        <span class="button-group-addon" ><img src="http://simpleicon.com/wp-content/uploads/home-7.png" width="30" height="30" alt=""></span>
                        Home
                    </a>
                </button>
            </div>

            <div class="text-center" style="padding-top: 2%">
                <button class="btn-lg w-100" type="button">
                    <a class="nav-link disabled" href="{{route('user.perfil', array('user' => Auth::user()->username))}}">
                        <span class="button-group-addon" ><img src="http://simpleicon.com/wp-content/uploads/account.svg" width="30" height="30" alt=""></span>
                        Perfil
                    </a>
                </button>
            </div>

            <div class="text-center" style="padding-top: 2%">
                <button class="btn-lg w-100" type="button">
                    <a class="nav-link disabled" href="{{route('gimnasios.show', array('user' => Auth::user()->username))}}">
                        <span class="button-group-addon" ><img src="https://image.flaticon.com/icons/svg/34/34907.svg" width="30" height="30" alt=""></span>
                        Gimnasios
                    </a>
                </button>
            </div>
            <div class="dropdown-divider"></div>
            <a class="nav-link" href="#">Salir</a>
        </nav>
    </div>

    <div class="col-md-8">

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <h1 class="page-header title text-center">Crear Actividad</h1>
            </div>
        </div>

        <div class="panel-body">
            <form class="form-control" action="" method="post">
                {{ csrf_field() }}

                <div class="row">

                    <div class="col-md-6">
                        <div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }}">
                            <label for="nombre" class="col-md-4 control-label"><h2>Nombre</h2></label>

                            <input id="nombre" type="text" class="form-control" name="nombre">

                            @if ($errors->has('nombre'))
                                <span class="help-block alert-danger">
                                    <strong>{{ $errors->first('nombre') }}</strong>
                                            </span>
                            @endif
                            <p class="help-text">Introduce el nombre de la actividad.</p>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group{{ $errors->has('duracion') ? ' has-error' : '' }}">
                            <label for="duracion" class="col-md-4 control-label"><h2>Duracion</h2></label>

                            <input id="duracion" type="number" class="form-control" name="duracion">

                            @if ($errors->has('duracion'))
                                <span class="help-block alert-danger">
                                    <strong>{{ $errors->first('duracion') }}</strong>
                                </span>
                            @endif
                            <p class="help-text">Introduce la duración de la actividad.</p>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group{{ $errors->has('intensidad') ? ' has-error' : '' }}">
                            <label for="intensidad" class="col-md-4 control-label"><h2>Intensidad</h2></label>

                            <select id="intensidad" type="text" class="form-control" name="intensidad">
                                <option selected>Baja</option>
                                <option>Media</option>
                                <option>Alta</option>
                            </select>

                            @if ($errors->has('intensidad'))
                                <span class="help-block alert-danger">
                                    <strong>{{ $errors->first('intensidad') }}</strong>
                                </span>
                            @endif
                            <p class="help-text">Introduce la intensidad del ejercicio.</p>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group{{ $errors->has('objetivos') ? ' has-error' : '' }}">
                            <label for="objetivos" class="col-md-4 control-label"><h2>Objetivos</h2></label>

                            <input id="objetivos" type="text" class="form-control" name="objetivos" >

                            @if ($errors->has('objetivos'))
                                <span class="help-block alert-danger">
                                    <strong>{{ $errors->first('objetivos') }}</strong>
                                </span>
                            @endif
                            <p class="help-text">Introduce el objetivo de la actividad.</p>
                        </div>
                    </div>

                </div>

                <div class="row">

                    <div class="col-md-6">
                        <div class="form-group{{ $errors->has('horario') ? ' has-error' : '' }}">
                            <label for="horario" class="col-md-4 control-label"><h2>Horario</h2></label>

                            <input id="horario" type="date" class="form-control" name="horario" >

                            @if ($errors->has('horario'))
                                <span class="help-block alert-danger">
                                    <strong>{{ $errors->first('horario') }}</strong>
                                </span>
                            @endif
                            <p class="help-text">Introduce el horario que se realiza la actividad.</p>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group{{ $errors->has('descripcion') ? ' has-error' : '' }}">
                            <label for="descripcion" class="col-md-4 control-label"><h3>Descripción</h3></label>

                            <input id="descripcion" type="text" class="form-control" name="descripcion" >

                            @if ($errors->has('descripcion'))
                                <span class="help-block alert-danger">
                                    <strong>{{ $errors->first('descripcion') }}</strong>
                                </span>
                            @endif
                            <p class="help-text">Introduce la descripción de la actividad.</p>
                        </div>
                    </div>

                </div>

                <button type="submit" class="btn btn-primary btn-lg btn-block">Añadir</button>
            </form>
        </div>

    </div>
</div>
@endsection

