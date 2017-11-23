@extends('backLayout.app')
@section('title')
Material
@stop

@section('content')

    <h1>Material</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <tbody>
                <tr>
                    <th>ID.</th>
                    <th> {{ $materiale->id }}</th> 
                </tr>
                <tr>
                    <th>Codigo</th>
                    <td> {{ $materiale->codigo }} </td>
                </tr>
                <tr>
                    <th>Titulo</th>
                    <td> {{ $materiale->titulo }} </td>
                </tr>
                <tr>
                    <th>Autor</th>
                    <td> {{ $materiale->autor }} </td>
                </tr>
                <tr>
                    <th>Descripcion</th>
                    <td> {{ $materiale->descripcion }} </td>
                </tr>
                <tr>
                    <th>Tipo</th>
                    <td> {{ $materiale->tipo }} </td>
                </tr>
                <tr>
                    <th>Portada</th>
                    <td> <img src="{{ $materiale->portada }}" alt="" class="img-rounded"> </td>
                </tr>
            </tbody>    
        </table>
    </div>

@endsection