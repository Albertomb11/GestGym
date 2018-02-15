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
                <h1 class="page-header title text-center">Monitores</h1>
            </div>
        </div>

        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Stock</th>
                <th>Sabor</th>
                <th>Caracteristicas</th>
            </tr>
            </thead>

                <tbody class="table-info">
                @forelse($productos as $producto)
                <tr>
                    <td>{{$producto['nombre']}}</td>
                    <td>{{$producto['precio']}}€</td>
                    <td>{{$producto['stock']}} Und</td>
                    <td>{{$producto['sabor']}}</td>
                    <td>{{$producto['caracteristicas']}}</td>
                </tr>
                @empty
                <h1 class="text-center">No hay Productos Añadidos todavia</h1>
                @endforelse
                </tbody>
        </table>
    </div>

    <div class="col-md-2 text-center">

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <h1 class="page-header title text-center">{{ $gimnasio->nombre }}</h1>
            </div>
        </div>

        <button class="btn btn-success" type="button">
            <a class="nav-link disabled" href="/{{ $user->username }}/gimnasios/{{ $gimnasio->nombre }}/productos/create">
                <span class="button-group-addon" ><img src="http://simpleicon.com/wp-content/uploads/account.svg" width="30" height="30" alt=""></span>
                Añadir Producto
            </a>
        </button>
    </div>

</div>
@endsection
