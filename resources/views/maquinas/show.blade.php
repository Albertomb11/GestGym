@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-2">
        @include('navbar')
    </div>

    <div class="col-md-8">

        @forelse($maquinas->chunk(3) as $chunk)
            <div class="row course-set courses__row event d-flex justify-content-around">
                @foreach($chunk as $maquina)
                    <div class="card" style="width: 20rem; margin-top: 20px">
                        <img class="card-img-top" src="{{ $maquina['imagen'] }}" height="200px" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title"><strong>{{$maquina['nombre']}}</strong></h5>

                            <strong>Unidades: </strong>{{$maquina['unidades']}}
                            <hr>
                            <strong>Zona Trabajada: </strong>{{$maquina['zona_trabajada']}}
                            <hr>

                            <div class="row">
                                <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-xs-2"></div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                <a href="/{{ $user->username }}/gimnasios/{{ $gimnasio->nombre }}/maquinas/{{ $maquina->id }}/edit" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Editar Maquina">Editar</a>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                    <button type="submit" class="btn btn-danger" data-toggle="modal" data-target="#deleteMaquina{{ $maquina->id }}">Borrar</button>

                                    <div class="modal fade" id="deleteMaquina{{ $maquina->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header bg-secondary d-flex justify-content-center">

                                                    <h4 class="modal-title  text-center">Estas seguro de eliminar: {{$maquina->nombre}}?</h4>

                                                </div>
                                                <div class="modal-body d-flex justify-content-between">
                                                    <button type="button" class=" btn btn-success bg-success" data-dismiss="modal">
                                                        NO
                                                    </button>
                                                    <form action="{{route('maquina.delete',array('id' => $maquina->id))}}" method="post">
                                                        {{ csrf_field() }}
                                                        {{ method_field('DELETE') }}
                                                        <button type="submit"  class="btn btn-danger">YES</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">{{$maquina['descripcion']}}</small>
                        </div>
                    </div>
                @endforeach
            </div>
        @empty
            <h1 class="text-center" style="color: #fff; margin-top: 50px">No hay maquinas añadidas todavia</h1>
        @endforelse

    </div>

    <div class="col-md-2 text-center">

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <h1 class="page-header title text-center" style="color: #fff;">{{ $gimnasio->nombre }}</h1>
            </div>
        </div>

        <button class="btn btn-success w-75" type="button">
            <a class="nav-link disabled" href="/{{ $user->username }}/gimnasios/{{ $gimnasio->nombre }}/maquinas/create" data-toggle="tooltip" data-placement="top" title="Añadir Maquina">
                <span class="button-group-addon" ><img src="http://simpleicon.com/wp-content/uploads/account.svg" width="30" height="30" alt=""></span>
                Añadir Maquina
            </a>
        </button>
        <hr>
        <button class="btn-lg btn-success w-75" type="button">
            <a class="nav-link disabled" href="/{{ $user->username }}/gimnasios/{{ $gimnasio->nombre }}" data-toggle="tooltip" data-placement="top" title="Volver a {{ $gimnasio->nombre }}">
                Volver a {{ $gimnasio->nombre }}
            </a>
        </button>
    </div>

</div>
@endsection

@push('scripts')

@endpush