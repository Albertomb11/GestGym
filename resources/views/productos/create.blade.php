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
                            <p class="help-text">Introduce el nombre del producto.</p>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group{{ $errors->has('precio') ? ' has-error' : '' }}">
                            <label for="precio" class="col-md-4 control-label"><h2>Precio</h2></label>

                            <input id="precio" type="number" class="form-control" name="precio">

                            @if ($errors->has('precio'))
                                <span class="help-block alert-danger">
                                    <strong>{{ $errors->first('precio') }}</strong>
                                </span>
                            @endif
                            <p class="help-text">Introduce el precio del producto.</p>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group{{ $errors->has('stock') ? ' has-error' : '' }}">
                            <label for="stock" class="col-md-4 control-label"><h2>Stock</h2></label>

                            <input id="stock" type="number" class="form-control" name="stock" >

                            @if ($errors->has('stock'))
                                <span class="help-block alert-danger">
                                    <strong>{{ $errors->first('stock') }}</strong>
                                </span>
                            @endif
                            <p class="help-text">Introduce la cantidad en stock de la que dispone.</p>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group{{ $errors->has('sabor') ? ' has-error' : '' }}">
                            <label for="sabor" class="col-md-4 control-label"><h2>Sabor</h2></label>

                            <input id="sabor" type="text" class="form-control" name="sabor" >

                            @if ($errors->has('sabor'))
                                <span class="help-block alert-danger">
                                    <strong>{{ $errors->first('sabor') }}</strong>
                                </span>
                            @endif
                            <p class="help-text">Introduce el sabor del producto.</p>
                        </div>
                    </div>

                </div>

                <div class="form-group{{ $errors->has('caracteristicas') ? ' has-error' : '' }}">
                    <label for="caracteristicas" class="col-md-4 control-label"><h2>Caracteristicas</h2></label>

                    <input id="caracteristicas" type="text" class="form-control" name="caracteristicas" >

                    @if ($errors->has('caracteristicas'))
                        <span class="help-block alert-danger">
                                    <strong>{{ $errors->first('caracteristicas') }}</strong>
                                </span>
                    @endif
                    <p class="help-text">Introduce las caracteristicas del producto.</p>
                </div>


                <button type="submit" class="btn btn-primary btn-lg btn-block">Añadir</button>
            </form>
        </div>
    </div>
</div>
@endsection

