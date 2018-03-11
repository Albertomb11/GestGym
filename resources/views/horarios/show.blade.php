@extends('layouts.app')

@section('content')
<div class="container" style="background-color: #fff;">
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">Hora</th>
                <th scope="col">Lunes</th>
                <th scope="col">Marter</th>
                <th scope="col">Miercoles</th>
                <th scope="col">Jueves</th>
                <th scope="col">Viernes</th>
                <th scope="col">Sabado</th>
                <th scope="col">Domingo</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th>9:00/10:00</th>
                <th>Spinning</th>
                <th>Cardio</th>
                <th>Funcional</th>
                <th>Spinning</th>
                <th>Boxeo</th>
                <th></th>
                <th></th>
            </tr>
        </tbody>
    </table>
</div>
@endsection