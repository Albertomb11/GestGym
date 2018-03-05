@forelse($gimnasios->chunk(3) as $chunk)
    <div class="row course-set courses__row event d-flex justify-content-around">
        @foreach($chunk as $gimnasio)
            <div id="draggable" class="contenedor">
                <div class="contenedor_tarjeta">
                    @if(Auth::user())
                        <a href="/{{ $user->username }}/gimnasios/{{ $gimnasio->nombre }}">
                            @endif
                            <figure>
                                <img src="https://image.freepik.com/vector-gratis/frase-en-un-fondo-de-hombre-musculado_23-2147533706.jpg" class="frontal" alt="imagen de {{$gimnasio['nombre']}}">
                                <figcaption class="trasera">
                                    <h2 class="titulo">{{$gimnasio['nombre']}}</h2>
                                    <hr>
                                    <p class="card-block text-center">Dirección: {{$gimnasio['direccion']}}</p>
                                    <p class="card-block text-center">Horario Apertura: {{ substr($gimnasio['horario_apertura'], 0, -3) }}</p>
                                    <p class="card-block text-center">Horario Cierre: {{ substr($gimnasio['horario_cierre'], 0, -3) }}</p>
                                    <p class="card-block text-center">Cuota: {{$gimnasio['cuotas']}}€/mes</p>
                                </figcaption>
                            </figure>
                        </a>
                </div>
            </div>
        @endforeach
    </div>
@empty
    <h1 class="text-center" style="color: #fff; margin-top: 50px">No hay Gimnasios creados todavia</h1>
@endforelse

@if(Auth::guest())
<div class="pagination">
    {{ $gimnasios->links('pagination::bootstrap-4') }}
</div>
@endif