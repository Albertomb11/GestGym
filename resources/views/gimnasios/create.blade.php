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

        <div class="col-md-6">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <h1 class="page-header title text-center">Añadir Un Gimnasio</h1>
                </div>
            </div>

            <form class="form-control" action="{{ route('gimnasios.create', array('user' => Auth::user()->username)) }}" method="post">
                {{ csrf_field() }}

                <div class="row">

                    <div class="col-md-6">
                        <div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }}">
                            <label for="nombre" class="col-md-4 control-label"><h2>Nombre</h2></label>

                                <input id="nombre" type="text" class="form-control" name="nombre" value="{{ old('nombre') }}">

                                @if ($errors->has('nombre'))
                                <span class="help-block alert-danger">
                            <strong>{{ $errors->first('nombre') }}</strong>
                                    </span>
                                @endif
                            <p class="help-text">Introduce el nombre del gimnasio.</p>
                            </div>
                        </div>

                    <div class="col-md-6">
                        <div class="form-group{{ $errors->has('direccion') ? ' has-error' : '' }}">
                            <label for="direccion" class="col-md-4 control-label"><h2>Dirección</h2></label>

                                <input id="direccion" type="text" class="form-control" name="direccion" value="{{ old('direccion') }}" >

                                @if ($errors->has('direccion'))
                                    <span class="help-block alert-danger">
                            <strong>{{ $errors->first('direccion') }}</strong>
                        </span>
                                @endif
                            <p class="help-text">Introduce la dirección del gimnasio.</p>
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
                            <p class="help-text">Introduce el horario del gimnasio.</p>
                            </div>
                        </div>

                    <div class="col-md-6">
                    <div class="form-group{{ $errors->has('cuotas') ? ' has-error' : '' }}">
                    <label for="cuotas" class="col-md-4 control-label"><h2>Cuotas</h2></label>

                        <input id="cuotas" type="number" class="form-control" name="cuotas" >

                        @if ($errors->has('cuotas'))
                            <span class="help-block alert-danger">
                            <strong>{{ $errors->first('cuotas') }}</strong>
                        </span>
                        @endif
                        <p class="help-text">Introduce las cuotas que tiene el gimnasio.</p>
                    </div>
                </div>
                </div>

                <div class="row">
             <div class="col-md-12">
                <div class="form-group{{ $errors->has('descripcion') ? ' has-error' : '' }}">
                    <label for="descripcion" class="col-md-4 control-label"><h2>Descripcion</h2></label>

                        <input id="descripcion" type="text" class="form-control" name="descripcion" >

                        @if ($errors->has('descripcion'))
                            <span class="help-block alert-danger">
                            <strong>{{ $errors->first('descripcion') }}</strong>
                        </span>
                        @endif
                    <p class="help-text">Introduce una breve descripcion del gimnasio.</p>
                    </div>
                </div>
                </div>

                <button type="submit" class="btn btn-primary btn-lg btn-block">Añadir</button>

            </form>
        </div>
    </div>
@endsection

