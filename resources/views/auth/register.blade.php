@extends('layouts.app')

@section('content')
<div id="registerVista">
    <div class="register-box">
        <img src="http://www.tadamun.so/wp-content/uploads/2016/09/blank-avatar.png" class="avatar">
        <h1>Registro</h1>
        <form id="formRegistro" role="form" method="POST" action="{{ url('/register') }}">
                        {!! csrf_field() !!}

                        <div class="form-group row{{ $errors->has('username') ? ' has-error' : '' }}">
                            <label class="col-lg-4 col-form-label text-lg-right">
                                <span style="padding-right: 20px"><img src="http://flaticons.net/icons/Application/User-Profile.png" width="30" height="30"></span>
                                Nick
                            </label>

                            <div class="col-lg-6">
                                <input  id="username"
                                        type="text"
                                        class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}"
                                        name="username"
                                        value="{{ old('username') }}"
                                        required
                                >
                                @if ($errors->has('username'))
                                    <div class="invalid-feedback">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </div>
                                @endif
                            </div>
                            @include('layouts.spinner')
                        </div>


                        <div class="form-group row{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label class="col-lg-4 col-form-label text-lg-right">
                            <span style="padding-right: 20px"><img src="https://daks2k3a4ib2z.cloudfront.net/555977cb8ccdb3ba5c09f4dc/558125c7bc2ba6d54f191596_Envelope_Icon_White.png" width="30" height="30"></span>
                            E-Mail
                            </label>

                            <div class="col-lg-6">
                                <input  id="email"
                                        type="email"
                                        class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                        name="email"
                                        value="{{ old('email') }}"
                                        required
                                >

                                @if ($errors->has('email'))
                                    <div class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </div>
                                @endif
                            </div>
                            @include('layouts.spinner')
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label text-lg-right">
                                <span style="padding-right: 20px"><img src="https://www.artprovenance.net/GetImage.aspx?image_src=B995D1A5A1DCB5AD8DBDB0B5B9BD8DA4BDCD959D85B5A59DB9C01A" width="30" height="30"></span>
                                Contraseña
                            </label>

                            <div class="col-lg-6">
                                <input
                                        type="password"
                                        class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                        name="password"
                                        required
                                >
                                @if ($errors->has('password'))
                                    <div class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label text-lg-right">
                                <span style="padding-right: 20px"><img src="https://www.artprovenance.net/GetImage.aspx?image_src=B995D1A5A1DCB5AD8DBDB0B5B9BD8DA4BDCD959D85B5A59DB9C01A" width="30" height="30"></span>
                                Confirmar Contraseña
                            </label>

                            <div class="col-lg-6">
                                <input type="password"
                                        class="form-control{{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}"
                                        name="password_confirmation"
                                        required
                                >
                                @if ($errors->has('password_confirmation'))
                                    <div class="invalid-feedback">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-lg-6 offset-lg-4">
                                <button type="submit" id="botonFormularioRegistro" class="btn btn-primary">
                                    Registrar
                                </button>
                            </div>
                        </div>
                    </form>
    </div>
</div>
@endsection

@push('scripts')
    {{--<script src="{{ asset('js/formularioRegisterAsincrona.js') }}"></script>--}}
@endpush