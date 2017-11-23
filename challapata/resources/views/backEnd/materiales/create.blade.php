@extends('backLayout.app')
@section('title')
Nuevo Material
@stop

@section('content')

    <h1>Nuevo Material</h1>
    <hr/>

    {!! Form::open(['url' => 'materiales', 'class' => 'form-horizontal', 'files' => true]) !!}

                <div class="form-group {{ $errors->has('codigo') ? 'has-error' : ''}}">
                {!! Form::label('codigo', 'Codigo: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('codigo', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('codigo', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('titulo') ? 'has-error' : ''}}">
                {!! Form::label('titulo', 'Titulo: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('titulo', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('titulo', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('autor') ? 'has-error' : ''}}">
                {!! Form::label('autor', 'Autor: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('autor', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('autor', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('descripcion') ? 'has-error' : ''}}">
                {!! Form::label('descripcion', 'Descripcion: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::textarea('descripcion', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('descripcion', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('tipo') ? 'has-error' : ''}}">
                {!! Form::label('tipo', 'Tipo: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::select('tipo',array('Libro'=>'Libro','Revista'=>'Revista'), 'Libro' , ['class' => 'form-control']) !!}

                    {!! $errors->first('tipo', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('portada') ? 'has-error' : ''}}">
                {!! Form::label('portadaImg', 'Portada: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::file('portadaImg', null) !!}
                    {!! $errors->first('portada', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('estado') ? 'has-error' : ''}}">
                {!! Form::label('estado', 'Estado: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                                <div class="checkbox">
                <label>{!! Form::radio('estado', '1', true) !!} Yes</label>
            </div>
            <div class="checkbox">
                <label>{!! Form::radio('estado', '0') !!} No</label>
            </div>
                    {!! $errors->first('estado', '<p class="help-block">:message</p>') !!}
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