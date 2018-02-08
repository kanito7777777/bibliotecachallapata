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

    <!-- buscar estudiante -->
    <div class="navbar-form">
        <div class="form-group">
            {!! Form::label('txtBuscar', 'CI del Estudiante: ', ['class' => ' control-label']) !!}

            {!! Form::text('txtBuscar', null, ['class' => 'form-control', 'required' => 'required']) !!}
        </div>
            <button class="btn btn-success" onclick="buscar();">Buscar</button>
        <hr>
            
            @if(isset($estudiante) && !empty($estudiante))
                <div class="alert alert-success"> 
                    Estudiante: {{ $estudiante->nombre.' '.$estudiante->apellido }} - 
                    Ci: {{ $estudiante->ci }}
                </div>
                @if(isset($detalle) && !empty($detalle))
                <div class="alert alert-danger">
                    Cantidad Libros Prestados: {{ $detalle->cantidad }} - 
                    Ultimo prestamo: {{ $detalle->fecha }} <br> 
                    Obs: {{ $detalle->observacion }}
                </div>
                @endif
            @else
            <div class="alert alert-danger">Ningun estudiante encontrado</div>
            @endif

        <hr>
    </div>
    <!-- end buscar estudiante -->

    {!! Form::open(['url' => 'prestamos', 'class' => 'form-horizontal']) !!}

            <input type="hidden" name="fkMaterial" value="{{ $materiale->id }}">
            
            @if(isset($estudiante) && !empty($estudiante))
            <input type="hidden" name="fkEstudiante" value="{{ $estudiante->id }}">
            @endif

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

<script type="text/javascript">
function buscar(){
    var ci = document.getElementById("txtBuscar").value;
    if(ci.trim() === "")
        ci = '000';

    var url = "{{ url('buscarestudiante/'.$materiale->id.'/:ci') }}";
    url = url.replace(":ci", ci);
    window.location = url;
}
</script>