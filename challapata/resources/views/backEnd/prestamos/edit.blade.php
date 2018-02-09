@extends('backLayout.app')
@section('title')
Devolver Material
@stop

@section('content')

    <h1>Devolver Material</h1>
    <hr/>
    <div class="table table-responsive">
        <table class="table table-bordered table-striped table-hover" id="tblmateriales">
            <thead>
                <tr>
                    <th>Material</th>
                    <th>Tipo</th>
                    <th>Obs</th>
                    <th>Dias</th>
                </tr>
            </thead>
            <tbody>

            @foreach($materiales  as $item)
                <tr>
                    <td>{{ $item->codigo.': '.$item->titulo }}<br/>
                           Autor: {{ $item->autor }}
                    </td>
                    <td>{{ $item->tipo }}</td>
                    <td>
                        <p><span class="label label-danger">{{ $item->obs }}</span></p>
                        {{ 'fecha: '. $item->fecha }} <br>
                        {{ 'A: '.$item->ci  }}
                        {{ $item->aquien }} <br>
                        {{ 'Obs: '.$item->observacion }}
                    </td>
                
                    @if($item->diasPrestados > 2)
                        <td><h3><span class="label label-danger">{{ $item->diasPrestados }}</span></h3></td>
                    @else
                        <td><h3><span class="label label-success">{{ $item->diasPrestados }}</span></h3></td>
                    @endif
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <hr/>

    {!! Form::model($prestamo, [
        'method' => 'PATCH',
        'url' => ['prestamos', $prestamo->id],
        'class' => 'form-horizontal',
        'onsubmit' => 'return confirm("Realmente desea registrar la devolucion?")'
    ]) !!}

            <div class="form-group {{ $errors->has('observacion') ? 'has-error' : ''}}">
                {!! Form::label('observacion', 'Observacion: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::textarea('observacion', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('observacion', '<p class="help-block">:message</p>') !!}
                </div>
            </div>


    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-3">
            {!! Form::submit('Devolver Material', ['class' => 'btn btn-primary btn-lg']) !!}
            <a href="{{ url('listaprestados') }}" style="display:inline">(cancelar)</a>
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