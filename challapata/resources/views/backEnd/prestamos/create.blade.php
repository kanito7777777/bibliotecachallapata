@extends('backLayout.app')
@section('title')
Create new Prestamo
@stop

@section('content')

    <h1>Create New Prestamo</h1>
    <hr/>

    {!! Form::open(['url' => 'prestamos', 'class' => 'form-horizontal']) !!}

                <div class="form-group {{ $errors->has('fecha') ? 'has-error' : ''}}">
                {!! Form::label('fecha', 'Fecha: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::input('datetime-local', 'fecha', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('fecha', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('observacion') ? 'has-error' : ''}}">
                {!! Form::label('observacion', 'Observacion: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::textarea('observacion', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('observacion', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('estado') ? 'has-error' : ''}}">
                {!! Form::label('estado', 'Estado: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('estado', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('estado', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('fkMaterial') ? 'has-error' : ''}}">
                {!! Form::label('fkMaterial', 'Fkmaterial: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('fkMaterial', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('fkMaterial', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('fkEstudiante') ? 'has-error' : ''}}">
                {!! Form::label('fkEstudiante', 'Fkestudiante: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('fkEstudiante', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('fkEstudiante', '<p class="help-block">:message</p>') !!}
                </div>
            </div>


    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-3">
            {!! Form::submit('Create', ['class' => 'btn btn-primary form-control']) !!}
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