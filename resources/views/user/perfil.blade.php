@extends('layouts.app')

@section('content')
<div class="row">
@if(Auth::user())
<div class="col-md-2">
@include('navbar')
</div>
@endif

<div class="col-md-6">

<div class="container">
    <div class="center">
        <div class="pic_base">
            <img src="{{ $user->image }}" width="200" id="profile_pic" alt="">
            @if(Auth::user())
            <div class="icon_base">
                <a id="formularioEditarPerfilBoton" href="{{route('user.edit', array('username' => Auth::user()->username))}}"><span><img src="https://cdn3.iconfinder.com/data/icons/3d-printing-icon-set/512/Edit.png" width="50" height="50"></span></a>
            </div>
            @endif
        </div>
        <div class="content_base">
            <h2 id="nick"><strong>Nick: </strong>{{ $user->username }}</h2>
            <h1 id="nombre_usuario"><strong>Nombre: </strong>{{ $user->name }} {{ $user->surname }}</h1>
            <p id="parrafo">
                <span><img id="user_icon" src="http://files.softicons.com/download/social-media-icons/pretty-social-media-icons-2-by-custom-icon-design/ico/Email.ico" width="30" height="30"></span><strong>Email: </strong>{{ $user->email }}<br><br>
                <span><img id="user_icon" src="https://cdn1.iconfinder.com/data/icons/mobile-iphone/512/YPS__mobile_iphone_touch_hand_finger_telephone_call_talk-512.png" width="30" height="30"></span><strong>Movil: </strong>{{ $user->movil }}<br><br>
                <span><img id="user_icon" src="https://png.icons8.com/metro/1600/domain.png" width="30" height="30"></span><strong>Pagina Web: </strong>{{ $user->website }}<br><br>
                <span><img id="user_icon" src="http://www.iconarchive.com/download/i42697/oxygen-icons.org/oxygen/Actions-help-about.ico" width="30" height="30"></span><strong>Descripción: </strong>{{ $user->about }}<br><br>
            </p>
            <br>
            <ul class="social">
                <li><a href="#" class=""><span><img src="https://cdn1.iconfinder.com/data/icons/new_twitter_icon/491/bird_twitter_new_single.png" width="30" height="30"></span></a></li>
                <li><a href="#" class=""><span><img src="https://cdn2.iconfinder.com/data/icons/instagram-new/512/instagram-logo-color-512.png" width="30" height="30"></span></a></li>
                <li><a href="#" class=""><span><img src="http://www.iconarchive.com/download/i49148/yootheme/social-bookmark/social-facebook-button-blue.ico" width="30" height="30"></span></a></li>
                @if(Auth::user())
                <form action="{{route('user.delete',array('id' => $user['id']))}}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button type="submit" class="btn btn-danger">Borrar</button>
                </form>
                @endif
            </ul>
        </div>
    </div>
</div>

</div>

<div class="col-md-4">
    <div id="formularioEditarPerfil"></div>
</div>

</div>
@endsection

@push('scripts')
    <script src="{{ asset('js/formularioEditarPerfilAsincrono.js') }}"></script>
@endpush
