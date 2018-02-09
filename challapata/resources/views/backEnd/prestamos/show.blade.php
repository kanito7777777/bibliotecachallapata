@extends('backLayout.app')
@section('title')
Prestamo
@stop

@section('content')

    <h1>Prestamo</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>ID.</th> <th>Fecha</th><th>Observacion</th><th>Estado</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $prestamo->id }}</td> <td> {{ $prestamo->fecha }} </td><td> {{ $prestamo->observacion }} </td><td> {{ $prestamo->estado }} </td>
                </tr>
            </tbody>    
        </table>
    </div>

@endsection