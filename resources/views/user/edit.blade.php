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
        <form class="form-control-lg" action="{{ route('user.update', array('id' => Auth::user()->id))}}" method="post">
                {{ csrf_field() }}
                {{ method_field('PUT') }}

                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">

                    <label for="name" class="">Nombre</label>
                    <input id="name" type="text" class="form-control" name="name" value="{{ Auth::user()->name }}">

                    @if ($errors->has('name'))
                        <span class="help-block alert-danger">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('surname') ? ' has-error' : '' }}">

                    <label for="surname" class="col-md-4 control-label">Apellidos</label>
                    <input id="surname" type="text" class="form-control" name="surname" value="{{ Auth::user()->surname }}">

                    @if ($errors->has('surname'))
                        <span class="help-block alert-danger">
                                        <strong>{{ $errors->first('surname') }}</strong>
                                    </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

                    <label for="email" class="col-md-4 control-label">E-Mail</label>
                    <input id="email" type="email" class="form-control" name="email" value="{{ Auth::user()->email }}" required>

                    @if ($errors->has('email'))
                        <span class="help-block alert-danger">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('movil') ? ' has-error' : '' }}">

                    <label for="movil" class="col-md-4 control-label">Telefono Movil</label>
                    <input id="movil" type="number" class="form-control" name="movil" value="{{ Auth::user()->movil }}">

                    @if ($errors->has('movil'))
                        <span class="help-block alert-danger">
                                        <strong>{{ $errors->first('movil') }}</strong>
                                    </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('website') ? ' has-error' : '' }}">

                    <label for="website" class="col-md-4 control-label">Página Web</label>
                    <input id="website" type="text" class="form-control" name="website" value="{{ Auth::user()->website }}">

                    @if ($errors->has('website'))
                        <span class="help-block alert-danger">
                                        <strong>{{ $errors->first('website') }}</strong>
                                    </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('about') ? ' has-error' : '' }}">

                    <label for="about" class="col-md-4 control-label">Descripción</label>
                    <input id="about" type="text" class="form-control" name="about" value="{{ Auth::user()->about }}">

                    @if ($errors->has('about'))
                        <span class="help-block alert-danger">
                                        <strong>{{ $errors->first('about') }}</strong>
                                    </span>
                    @endif
                </div>

                <button type="submit" class="btn btn-primary btn-lg btn-block">Guardar</button>

            </form>
        </div>

    </div>
@endsection
