@extends('backLayout.app')
@section('title')
Materiale
@stop

@section('content')

    <h1>Materiale</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>ID.</th> <th>Codigo</th><th>Titulo</th><th>Autor</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $materiale->id }}</td> <td> {{ $materiale->codigo }} </td><td> {{ $materiale->titulo }} </td><td> {{ $materiale->autor }} </td>
                </tr>
            </tbody>    
        </table>
    </div>

@endsection