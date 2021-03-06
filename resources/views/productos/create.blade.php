@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-2">
        @include('navbar')
    </div>

    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-xl-2"></div>

    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-xs-6">
        <div class="card">
            <div class="card-header">
                <strong>Crear Producto</strong>
            </div>

        <div class="card-body">
            <form id="formularioCrearProducto" class="form-control" action="" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}

                <div class="row">

                    <div class="col-md-6">
                        <div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }}">
                            <label for="nombre" class="control-label"><h2>Nombre</h2></label>

                            <input id="nombre" type="text" class="form-control" name="nombre" value="{{ old('nombre') }}">

                            @if ($errors->has('nombre'))
                                <span class="help-block alert-danger">
                                    <strong>{{ $errors->first('nombre') }}</strong>
                                            </span>
                            @endif
                        </div>
                        @include('layouts.spinner')
                    </div>

                    <div class="col-md-6">
                        <div class="form-group{{ $errors->has('precio') ? ' has-error' : '' }}">
                            <label for="precio" class="control-label"><h2>Precio</h2></label>

                            <input id="precio" type="number" class="form-control" name="precio" value="{{ old('precio') }}">

                            @if ($errors->has('precio'))
                                <span class="help-block alert-danger">
                                    <strong>{{ $errors->first('precio') }}</strong>
                                </span>
                            @endif
                        </div>
                        @include('layouts.spinner')
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group{{ $errors->has('stock') ? ' has-error' : '' }}">
                            <label for="stock" class="control-label"><h2>Stock</h2></label>

                            <input id="stock" type="number" class="form-control" name="stock" value="{{ old('stock') }}">

                            @if ($errors->has('stock'))
                                <span class="help-block alert-danger">
                                    <strong>{{ $errors->first('stock') }}</strong>
                                </span>
                            @endif
                        </div>
                        @include('layouts.spinner')
                    </div>

                    <div class="col-md-6">
                        <div class="form-group{{ $errors->has('sabor') ? ' has-error' : '' }}">
                            <label for="sabor" class="control-label"><h2>Sabor</h2></label>

                            <input id="sabor" type="text" class="form-control" name="sabor" value="{{ old('sabor') }}">

                            @if ($errors->has('sabor'))
                                <span class="help-block alert-danger">
                                    <strong>{{ $errors->first('sabor') }}</strong>
                                </span>
                            @endif
                        </div>
                        @include('layouts.spinner')
                    </div>

                </div>

                <div class="form-group{{ $errors->has('caracteristicas') ? ' has-error' : '' }}">
                    <label for="caracteristicas" class="control-label"><h2>Caracteristicas</h2></label>

                    <input id="caracteristicas" type="text" class="form-control" name="caracteristicas" value="{{ old('caracteristicas') }}">

                    @if ($errors->has('caracteristicas'))
                        <span class="help-block alert-danger">
                                    <strong>{{ $errors->first('caracteristicas') }}</strong>
                                </span>
                    @endif
                </div>
                @include('layouts.spinner')

                <div class="form-group row">
                    <label for="image" class="button col-lg-4 col-form-label text-lg-right">Añadir Imagen</label>
                    <input type="file" id="image" name="image" class="show-for-sr">
                </div>

                <button id="botonCrearProducto" type="submit" class="btn btn-primary btn-lg btn-block">Añadir</button>
            </form>
        </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script src="{{ asset('js/formularioCrearProductoAsincrono.js') }}"></script>
@endpush