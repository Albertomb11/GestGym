@forelse($gimnasios->chunk(3) as $chunk)
    <div class="row course-set courses__row event d-flex justify-content-around">
        @foreach($chunk as $gimnasio)
            <div class="contenedor">
                <div class="contenedor_tarjeta">
                    <a href="#">
                        <figure>
                            <img src="https://image.freepik.com/vector-gratis/frase-en-un-fondo-de-hombre-musculado_23-2147533706.jpg" class="frontal" alt="imagen de {{$gimnasio['nombre']}}">
                            {{--<h2 class="frontal">{{$gimnasio['nombre']}}</h2>--}}
                            <figcaption class="trasera">
                                <h2 class="titulo">{{$gimnasio['nombre']}}</h2>
                                <hr>
                                <p class="card-block text-center">Dirección: {{$gimnasio['direccion']}}</p>
                                <p class="card-block text-center">Horario Apertura: {{$gimnasio['horario_apertura']}}</p>
                                <p class="card-block text-center">Horario Cierre: {{$gimnasio['horario_cierre']}}</p>
                                <p class="card-block text-center">Cuota: {{$gimnasio['cuotas']}}€/mes</p>
                            </figcaption>
                        </figure>
                    </a>
                </div>
            </div>
        @endforeach
    </div>
@empty
    <h1 class="text-center" style="color: #fff">No hay Gimnasios creados todavia</h1>
@endforelse

<div class="pagination">
    {{ $gimnasios->links('pagination::bootstrap-4') }}
</div>