@extends('backLayout.app')
@section('title')
Nuevo Estudiante
@stop

@section('content')

    <h1>Nuevo Estudiante</h1>
    <hr/>

    {!! Form::open(['url' => 'estudiantes', 'class' => 'form-horizontal']) !!}

                <div class="form-group {{ $errors->has('ci') ? 'has-error' : ''}}">
                {!! Form::label('ci', 'Ci: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('ci', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('ci', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('nombre') ? 'has-error' : ''}}">
                {!! Form::label('nombre', 'Nombre: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('nombre', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('nombre', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('apellido') ? 'has-error' : ''}}">
                {!! Form::label('apellido', 'Apellido: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('apellido', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('apellido', '<p class="help-block">:message</p>') !!}
                </div>
            </div>


    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-3">
            {!! Form::submit('Aceptar', ['class' => 'btn btn-primary form-control']) !!}
        </div>

    </div>
    {!! Form::close() !!}

    @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

@endsection