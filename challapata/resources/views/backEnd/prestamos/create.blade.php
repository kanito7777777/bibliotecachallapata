@extends('backLayout.app')
@section('title')
Prestamos
@stop

@section('content')

    <h1>Prestamo de Libros</h1>
    <hr/>

<div class="container">
    <div class="row">
    <div class="col col-md-6">
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover">
                <tbody>
                    <tr>
                        <th>Codigo</th>
                        <td> {{ $materiale->codigo }}</td>
                    </tr>
                    <tr>
                        <th>Nombre</th>
                        <td> {{ $materiale->titulo }} </td>
                    </tr>
                    <tr>
                        <th>Autor</th>
                        <td> {{ $materiale->autor }} </td>
                    </tr>
                </tbody>    
            </table>
        </div>
    </div>
    
    <div class="col col-md-6">
    {!! Form::open(['url' => 'prestamos', 'class' => 'form-horizontal']) !!}

            <input type="hidden" name="fkMaterial" value="{{ $materiale->id }}">
            <input type="hidden" name="fkEstudiante" value="2">

            <div class="form-group {{ $errors->has('observacion') ? 'has-error' : ''}}">
                {!! Form::label('observacion', 'Observacion: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::textarea('observacion', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('observacion', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            
    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-6">
            {!! Form::submit('Realizar Prestamo', ['class' => 'btn btn-primary form-control']) !!}
        </div>
    </div>
    {!! Form::close() !!}
    </div>
    </div>
</div>

    @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

@endsection