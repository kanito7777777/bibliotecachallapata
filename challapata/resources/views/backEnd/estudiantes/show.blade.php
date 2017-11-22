@extends('backLayout.app')
@section('title')
Estudiante
@stop

@section('content')

    <h1>Estudiante</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>ID.</th> <th>Ci</th><th>Nombre</th><th>Apellido</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $estudiante->id }}</td> <td> {{ $estudiante->ci }} </td><td> {{ $estudiante->nombre }} </td><td> {{ $estudiante->apellido }} </td>
                </tr>
            </tbody>    
        </table>
    </div>

@endsection