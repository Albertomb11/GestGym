@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-2">
        @include('navbar')
    </div>

    <div class="col-md-8">

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <h1 class="page-header title text-center" style="color: #fff">Gimnasios</h1>
            </div>
        </div>

    @include('gimnasios.gimnasios')

    </div>

    <div class="col-md-2 text-center">

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <h1 class="page-header title text-center" style="color: #fff">{{ Auth::user()->username }}</h1>
            </div>
        </div>

        <button class="btn btn-success" type="button">
            <a class="nav-link disabled" href="{{route('gimnasios.form', array('username' => Auth::user()->username))}}">
                <span class="button-group-addon" ><img src="https://image.flaticon.com/icons/svg/34/34907.svg" width="30" height="30" alt=""></span>
                Añadir Gimnasio
            </a>
        </button>
    </div>

</div>
@endsection

@push('scripts')
    <script src="{{ asset('js/draggable.js') }}"></script>
@endpush