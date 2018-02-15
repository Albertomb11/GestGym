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
                <h1 class="page-header title text-center">Crear Monitor</h1>
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
                            <p class="help-text">Introduce el nombre del monitor.</p>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group{{ $errors->has('apellidos') ? ' has-error' : '' }}">
                            <label for="apellidos" class="col-md-4 control-label"><h2>Apellidos</h2></label>

                            <input id="apellidos" type="text" class="form-control" name="apellidos">

                            @if ($errors->has('apellidos'))
                                <span class="help-block alert-danger">
                                    <strong>{{ $errors->first('apellidos') }}</strong>
                                </span>
                            @endif
                            <p class="help-text">Introduce los apellidos del monitor.</p>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group{{ $errors->has('fecha_nacimiento') ? ' has-error' : '' }}">
                            <label for="fecha_nacimiento" class="col-md-4 control-label"><h2>Edad</h2></label>

                            <input id="fecha_nacimiento" type="date" class="form-control" name="fecha_nacimiento" >

                            @if ($errors->has('fecha_nacimiento'))
                                <span class="help-block alert-danger">
                                    <strong>{{ $errors->first('fecha_nacimiento') }}</strong>
                                </span>
                            @endif
                            <p class="help-text">Introduce la fecha de nacimiento del monitor.</p>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label"><h2>Email</h2></label>

                            <input id="email" type="email" class="form-control" name="email" >

                            @if ($errors->has('email'))
                                <span class="help-block alert-danger">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                            <p class="help-text">Introduce el email del monitor.</p>
                        </div>
                    </div>

                </div>

                <div class="row">

                    <div class="col-md-6">
                        <div class="form-group{{ $errors->has('estudios') ? ' has-error' : '' }}">
                            <label for="estudios" class="col-md-4 control-label"><h2>Estudios</h2></label>

                            <input id="estudios" type="text" class="form-control" name="estudios" >

                            @if ($errors->has('estudios'))
                                <span class="help-block alert-danger">
                                    <strong>{{ $errors->first('estudios') }}</strong>
                                </span>
                            @endif
                            <p class="help-text">Introduce los estudios realizados por el monitor.</p>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group{{ $errors->has('direccion') ? ' has-error' : '' }}">
                            <label for="direccion" class="col-md-4 control-label"><h2>Dirección</h2></label>

                            <input id="direccion" type="text" class="form-control" name="direccion" >

                            @if ($errors->has('direccion'))
                                <span class="help-block alert-danger">
                                    <strong>{{ $errors->first('direccion') }}</strong>
                                </span>
                            @endif
                            <p class="help-text">Introduce las direccion del monitor.</p>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary btn-lg btn-block">Añadir</button>
            </form>
        </div>
    </div>
</div>
@endsection

