@extends('layouts.app')

@section('content')
    <div id="carouselControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active" style="height: 40vh">
                <img class="d-block w-100" src="https://i0.wp.com/lands.online/wp-content/uploads/2016/10/Simply-Gym7.jpg" alt="First slide" style="height: 40vh">
            </div>
            <div class="carousel-item" style="height: 40vh">
                <img class="d-block w-100" src="https://www.tu-app.net/img/slider/aplicacion-movil-nativa-para-gimnasios.jpg" alt="Second slide" style="height: 40vh">
            </div>
            <div class="carousel-item" style="height: 40vh">
                <img class="d-block w-100" src="http://clubdeportivogympro.com.co/wp-content/uploads/2015/07/elergir-gym.png" alt="Third slide" style="height: 40vh">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Anterior</span>
        </a>
        <a class="carousel-control-next" href="#carouselControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Siguiente</span>
        </a>
    </div>

        <div class="row bg-dark" style="padding: 2.7%">

            <div class="col-md-3"></div>

            @if (Auth::guest())
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">Login</div>
                        <div class="card-body">
                            <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                                {{ csrf_field() }}

                                <div class="form-group row">
                                    <label for="email" class="col-lg-4 col-form-label text-lg-right">Email</label>

                                    <div class="col-lg-6">
                                        <input
                                                id="email"
                                                type="email"
                                                class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                                name="email"
                                                value="{{ old('email') }}"
                                                required
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
                                    <label for="password" class="col-lg-4 col-form-label text-lg-right">Contraseña</label>

                                    <div class="col-lg-6">
                                        <input
                                                id="password"
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
                                    <div class="col-lg-6 offset-lg-4">
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="remember" {{ old('remember') ? 'checked' : '' }}> Recuerdame
                                            </label>
                                        </div>
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
                            </form>
                            <div class="card text-center">
                                <div class="card-body">
                                    <h4>Si no tienes cuenta en el sitio web</h4>
                                    <a href="{{ route('register') }}" class="btn btn-primary" data-toggle="modal" data-target="#ModalCenter">Registrarse</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            @if(Auth::user())
                <div class="col-md-6">
                    <nav class="nav flex-column navbar-dark bg-dark pr-5 pb-5 pl-4 position-relative h-100">

                        <div class="btn" style="padding-bottom: 2%">
                        <button class="btn-lg w-25" type="button">
                            <a class="nav-link disabled" href="/">
                                <span class="button-group-addon" ><img src="http://simpleicon.com/wp-content/uploads/home-7.png" width="30" height="30" alt=""></span>
                                Home
                            </a>
                        </button>
                        </div>

                        <div class="btn" style="padding-bottom: 2%">
                        <button class="btn-lg w-25" type="button">
                            <a class="nav-link disabled" href="{{route('user.perfil', array('username' => Auth::user()->username))}}">
                                <span class="button-group-addon" ><img src="http://simpleicon.com/wp-content/uploads/account.svg" width="30" height="30" alt=""></span>
                                Perfil
                            </a>
                        </button>
                        </div>

                        <div class="btn" style="padding-bottom: 2%">
                        <button class="btn-lg w-25" type="button">
                            <a class="nav-link disabled" href="{{ route('gimnasios.show', array('user' => Auth::user()->username)) }}">
                                <span class="button-group-addon" ><img src="https://image.flaticon.com/icons/svg/34/34907.svg" width="30" height="30" alt=""></span>
                                Gimnasios
                            </a>
                        </button>
                        </div>
                        <div class="dropdown-divider"></div>
                        <a class="nav-link" href="#">Salir</a>
                    </nav>
                </div>
            @endif

            <div class="col-md-3"></div>

        </div>

    <!-- Modal -->
    <div class="modal fade" id="ModalCenter" tabindex="-1" role="dialog" aria-labelledby="ModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">

                    <div class="card">
                        <div class="card-header">
                            Register
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="card-body">
                            <form role="form" method="POST" action="{{ url('/register') }}">
                                {!! csrf_field() !!}

                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label text-lg-right">Nick</label>

                                    <div class="col-lg-6">
                                        <input
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
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label text-lg-right">E-Mail</label>

                                    <div class="col-lg-6">
                                        <input
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
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label text-lg-right">Contraseña</label>

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
                                    <label class="col-lg-4 col-form-label text-lg-right">Confirmar Contraseña</label>

                                    <div class="col-lg-6">
                                        <input
                                                type="password"
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
                                        <button type="submit" class="btn btn-primary">
                                            Registrar
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection