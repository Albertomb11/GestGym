@extends('layouts.app')

@section('content')
<div class="row">
@if(Auth::user())
<div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-sx-2">
@include('navbar')
</div>
@endif

<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-xs-6">
    <div class="container">

    <div class="card">
    <div class="card-header row">
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-xs-3">
        <img src="{{ $user->image }}" width="200" alt="" style="border-radius: 100%; border: 2px solid #34495e;box-shadow: 0 2px 2px black">
        </div>
        <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9 col-xs-9">
            <h2><strong>Nick: </strong>{{ $user->username }}</h2>
            <h1><strong>Nombre: </strong>{{ $user->name }} {{ $user->surname }}</h1>

            @if(Auth::user())

                <div class="row">
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-xs-4"></div>
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-xs-4">
                        <a id="formularioEditarPerfilBoton" href="{{route('user.edit', array('username' => Auth::user()->username))}}" data-toggle="tooltip" data-placement="top" title="Editar Perfil">
                            <span><img src="https://cdn3.iconfinder.com/data/icons/3d-printing-icon-set/512/Edit.png" width="50" height="50"></span>
                        </a>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-xs-4">
                        <form action="{{route('user.delete',array('id' => $user['id']))}}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button type="submit" data-toggle="tooltip" data-placement="top" title="Borrar Usuario"><span><img src="http://soportefb.com/images/icons/soportefb-facebook-permanentdelete.png" width="50" height="50"></span></button>
                        </form>
                    </div>
                </div>

            @endif

        </div>
    </div>
    <div class="card-body col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <p>
            <span><img id="user_icon" src="http://files.softicons.com/download/social-media-icons/pretty-social-media-icons-2-by-custom-icon-design/ico/Email.ico" width="30" height="30"></span><strong>Email: </strong>{{ $user->email }}<br><br>
            <span><img id="user_icon" src="https://cdn1.iconfinder.com/data/icons/mobile-iphone/512/YPS__mobile_iphone_touch_hand_finger_telephone_call_talk-512.png" width="30" height="30"></span><strong>Movil: </strong>{{ $user->movil }}<br><br>
            <span><img id="user_icon" src="https://png.icons8.com/metro/1600/domain.png" width="30" height="30"></span><strong>Pagina Web: </strong>{{ $user->website }}<br><br>
            <span><img id="user_icon" src="http://www.iconarchive.com/download/i42697/oxygen-icons.org/oxygen/Actions-help-about.ico" width="30" height="30"></span><strong>Descripción: </strong>{{ $user->about }}<br><br>
        </p>
    </div>
    <div class="card-footer col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="row">
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-xs-4">
                <a href="#" class="" data-toggle="tooltip" data-placement="top" title="Twitter">
                    <span><img src="https://cdn1.iconfinder.com/data/icons/new_twitter_icon/491/bird_twitter_new_single.png" width="30" height="30"></span>
                </a>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-xs-4">
                <a href="#" class="" data-toggle="tooltip" data-placement="top" title="Instagram">
                    <span><img src="https://cdn2.iconfinder.com/data/icons/instagram-new/512/instagram-logo-color-512.png" width="30" height="30"></span>
                </a>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-xs-4">
                <a href="#" class="" data-toggle="tooltip" data-placement="top" title="Facebook">
                    <span><img src="http://www.iconarchive.com/download/i49148/yootheme/social-bookmark/social-facebook-button-blue.ico" width="30" height="30"></span>
                </a>
            </div>
        </div>
    </div>

    </div>

    </div>
</div>

<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-xl-4">
    <div id="formularioEditarPerfil"></div>
</div>

</div>
@endsection

@push('scripts')
    <script src="{{ asset('js/formularioEditarPerfilAsincrono.js') }}"></script>
@endpush
