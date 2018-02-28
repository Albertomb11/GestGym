@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-2">
        @include('navbar')
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

        <div style="width: 50%; background-color: #fff">

            <canvas id="myChart" width="600" height="350"></canvas>

        </div>

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

@push('scripts')

    <script>
        let ctx = document.getElementById("myChart").getContext('2d');

        let myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: [
                    "Suplemento",
                    "Barritas",
                    "Agua",
                    "Proteinas ",
                    "BCCA",
                    "Avena"
                ],
                datasets: [{
                    label: 'Precio',
                    data: [
                        30,
                        2,
                        1.5,
                        35,
                        27,
                        15
                    ],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                }]
            },

        });

    </script>
@endpush