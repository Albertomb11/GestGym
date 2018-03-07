@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-2">
        @include('navbar')
    </div>

<div class="col-md-10">
    <form class="form-control" action="" method="post">
        {{ csrf_field() }}

        <div class="form-group{{ $errors->has('estrellas') ? ' has-error' : '' }}">
            <label for="estrellas" class="col-md-4 control-label"><h2>Estrellas</h2></label>

            <select id="estrellas" type="text" class="form-control" name="estrellas">
                <option selected>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
            </select>

            @if ($errors->has('estrellas'))
                <span class="help-block alert-danger">
                            <strong>{{ $errors->first('estrellas') }}</strong>
                        </span>
            @endif
            <p class="help-text">Introduce las estrellas que le das al monitor.</p>
        </div>

        <div class="form-group{{ $errors->has('comentario') ? ' has-error' : '' }}">
            <label for="comentario" class="col-md-4 control-label"><h2>Comentario</h2></label>

            <input id="comentario" type="text" class="form-control" name="comentario">

            @if ($errors->has('comentario'))
                <span class="help-block alert-danger">
                    <strong>{{ $errors->first('comentario') }}</strong>
                </span>
            @endif
            <p class="help-text">Introduce un comentario.</p>
        </div>

        <button type="submit" class="btn btn-primary btn-lg btn-block">Añadir</button>

    </form>
</div>

</div>
@endsection

