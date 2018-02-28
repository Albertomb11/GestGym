@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row" style="color: #fff">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <h1 class="page-header title text-center">Gimnasios</h1>
        </div>
    </div>

    <div id="mostrarGimnasiosPublico">
        @include('gimnasios.gimnasiosPublico')
    </div>

</div>
@endsection

@push('scripts')
    <script src="{{ asset('js/paginacionAsincrona.js') }}" defer></script>
@endpush