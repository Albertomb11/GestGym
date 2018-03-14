<div class="card">
<div class="card-header">
    <strong>
        Actualizar Perfil
    </strong>
</div>
<form id="formEditarPerfil" role="form" action="{{ route('user.update', array('id' => Auth::user()->id))}}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('PUT') }}

        <div class="form-group row{{ $errors->has('name') ? ' has-error' : '' }}">

            <label for="name" class="col-lg-4 col-form-label text-lg-right">Nombre</label>

            <div class="col-lg-6">
            <input id="name"
                   type="text"
                   class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                   name="name"
                   value="{{ Auth::user()->name }}">

            @if ($errors->has('name'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('name') }}</strong>
                </div>
            @endif
        </div>
            @include('layouts.spinner')
        </div>

        <div class="form-group row{{ $errors->has('surname') ? ' has-error' : '' }}">

            <label for="surname" class="col-lg-4 col-form-label text-lg-right">Apellidos</label>

            <div class="col-lg-6">
                <input id="surname"
                       type="text"
                       class="form-control{{ $errors->has('surname') ? ' is-invalid' : '' }}"
                       name="surname"
                       value="{{ Auth::user()->surname }}">

                @if ($errors->has('surname'))
                    <div class="invalid-feedback">
                        <strong>{{ $errors->first('surname') }}</strong>
                    </div>
                @endif
            </div>
            @include('layouts.spinner')
        </div>

        <div class="form-group row{{ $errors->has('email') ? ' has-error' : '' }}">

            <label for="email" class="col-lg-4 col-form-label text-lg-right">E-Mail</label>

            <div class="col-lg-6">
                <input id="email"
                       type="email"
                       class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                       name="email"
                       value="{{ Auth::user()->email }}">

                @if ($errors->has('email'))
                    <div class="invalid-feedback">
                        <strong>{{ $errors->first('email') }}</strong>
                    </div>
                @endif
            </div>
            @include('layouts.spinner')
        </div>

        <div class="form-group row{{ $errors->has('movil') ? ' has-error' : '' }}">

            <label for="movil" class="col-lg-4 col-form-label text-lg-right">Telefono Movil</label>

            <div class="col-lg-6">
                <input id="movil"
                       type="number"
                       class="form-control{{ $errors->has('movil') ? ' is-invalid' : '' }}"
                       name="movil"
                       value="{{ Auth::user()->movil }}">

                @if ($errors->has('movil'))
                    <div class="invalid-feedback">
                        <strong>{{ $errors->first('movil') }}</strong>
                    </div>
                @endif
            </div>
            @include('layouts.spinner')
        </div>

        <div class="form-group row{{ $errors->has('website') ? ' has-error' : '' }}">

            <label for="website" class="col-lg-4 col-form-label text-lg-right">Página Web</label>

            <div class="col-lg-6">
                <input id="website"
                       type="text"
                       class="form-control{{ $errors->has('website') ? ' is-invalid' : '' }}"
                       name="website"
                       value="{{ Auth::user()->website }}">

                @if ($errors->has('website'))
                    <div class="invalid-feedback">
                        <strong>{{ $errors->first('website') }}</strong>
                    </div>
                @endif
            </div>
            @include('layouts.spinner')
        </div>

        <div class="form-group row{{ $errors->has('about') ? ' has-error' : '' }}">

            <label for="about" class="col-lg-4 col-form-label text-lg-right">Descripción</label>

            <div class="col-lg-6">
            <textarea id="about"
                      type="text"
                      class="form-control{{ $errors->has('about') ? ' is-invalid' : '' }}"
                      name="about">{{ Auth::user()->about }}</textarea>

                @if ($errors->has('about'))
                    <div class="invalid-feedback">
                        <strong>{{ $errors->first('about') }}</strong>
                    </div>
                @endif
            </div>
            @include('layouts.spinner')
        </div>

    <div class="form-group row">
        <label for="image" class="button col-lg-4 col-form-label text-lg-right">Añadir Imagen</label>
        <input type="file" id="image" name="image" class="show-for-sr">
    </div>

    <div class="card-footer">
        <div class="form-group row">
            <div class="col-lg-6 offset-lg-4">
                <button type="submit" id="botonFormularioEditarPerfil" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Actualizar Perfil">
                    Actualizar
                </button>
            </div>
        </div>
    </div>
    </form>
</div>