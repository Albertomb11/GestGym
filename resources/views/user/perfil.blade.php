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

        <div class="col-md-2">
            <div class="card" style="width: 18rem;">
                <img class="card-img"  src="http://simpleicon.com/wp-content/uploads/group-3.png" alt="User_Imagen">
            </div>
        </div>

        <div class="col-md-6">

            <div class="card text-center">
                <div class="card-group">
                    <div class="card text-white bg-primary mb-4">
                        <div class="card-header"><h3>Nombre</h3></div>
                        <div class="card-body">
                            <h5 class="card-title">{{ $username->name }} {{ $username->surname }}</h5>
                        </div>
                    </div>

                    <div class="card text-white bg-info mb-4">
                        <div class="card-header"><h3>Nick</h3></div>
                        <div class="card-body">
                            <h5 class="card-title">{{ $username->username }}</h5>
                        </div>
                    </div>

                    <div class="card text-white bg-primary mb-4">
                        <div class="card-header"><h3>Email</h3></div>
                        <div class="card-body">
                            <h5 class="card-title">{{ $username->email }}</h5>
                        </div>
                    </div>

                </div>

                <div class="card-group">

                    <div class="card text-white bg-primary">
                        <div class="card-header"><h3>Movil</h3></div>
                        <div class="card-body">
                            <h5 class="card-title">{{ $username->movil }}</h5>
                        </div>
                    </div>

                    <div class="card text-white bg-info">
                        <div class="card-header"><h3>Website</h3></div>
                        <div class="card-body">
                            <h5 class="card-title">{{ $username->website }}</h5>
                        </div>
                    </div>

                    <div class="card text-white bg-primary">
                        <div class="card-header"><h3>Descripcion</h3></div>
                        <div class="card-body">
                            <h5 class="card-title">{{ $username->about }}</h5>
                        </div>
                    </div>

                </div>

            </div>

        </div>

        <div class="col-md-2 text-center">

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <h1 class="page-header title text-center">{{ Auth::user()->username }}</h1>
                </div>
            </div>

            <button class="btn btn-success" type="button">
                <a class="nav-link disabled" href="{{route('user.edit', array('username' => Auth::user()->username))}}">
                    <span class="button-group-addon" ><img src="http://simpleicon.com/wp-content/uploads/account.svg" width="30" height="30" alt=""></span>
                    Editar Perfil
                </a>
            </button>
        </div>

    </div>
@endsection
