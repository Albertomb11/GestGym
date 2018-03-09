@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-md-center mt-5">
        <div id="loginVista">
            <div class="login-box">
                <img src="http://www.tadamun.so/wp-content/uploads/2016/09/blank-avatar.png" class="avatar">
                <h1>Login</h1>
                <form id="formularioLogin" class="form-horizontal" method="POST" action="{{ route('login') }}">
                    {{ csrf_field() }}

                    <div class="form-group row">
                        <label for="email" class="col-lg-4 col-form-label text-lg-right">
                            <span style="padding-right: 20px"><img src="https://daks2k3a4ib2z.cloudfront.net/555977cb8ccdb3ba5c09f4dc/558125c7bc2ba6d54f191596_Envelope_Icon_White.png" width="30" height="30"></span>
                            Email
                        </label>

                        <div class="col-lg-6">
                            <input
                                    id="emailLogin"
                                    type="email"
                                    class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                    name="email"
                                    value="{{ old('email') }}"

                                    autofocus
                            >

                            @if ($errors->has('email'))
                                <div class="invalid-feedback">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">

                        <label for="password" class="col-lg-4 col-form-label text-lg-right">
                            <span style="padding-right: 20px"><img src="https://www.artprovenance.net/GetImage.aspx?image_src=B995D1A5A1DCB5AD8DBDB0B5B9BD8DA4BDCD959D85B5A59DB9C01A" width="30" height="30"></span>
                            Contraseña
                        </label>

                        <div class="col-lg-6">
                            <input
                                    id="password"
                                    type="password"
                                    class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                    name="password"

                            >

                            @if ($errors->has('password'))
                                <div class="invalid-feedback">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-lg-8 offset-lg-4">
                            <button type="submit" class="btn btn-primary">
                                Login
                            </button>

                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                ¿Has olvidado tu contraseña?
                            </a>
                        </div>
                    </div>
                    <hr><hr>
                    <h5>¿No tienes cuenta en el sitio web?</h5>
                    <a id="formularioRegistroBoton" href="/register" class="btn btn-primary">Registrarse</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
