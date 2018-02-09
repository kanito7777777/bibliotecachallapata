@extends('backLayout.app')
@section('title')
Estudiante
@stop

@section('content')
   

    <h1>Estudiantes <a href="{{ url('estudiantes/create') }}" class="btn btn-primary pull-right btn-sm">Nuevo Estudiante</a></h1>
    <hr>
    <div class="table table-responsive">
        <table class="table table-bordered table-striped table-hover" id="tblestudiantes">
            <thead>
                <tr>
                    <th>ID</th><th>Ci</th><th>Nombre</th><th>Apellido</th><th></th>
                </tr>
            </thead>
            <tbody>
            @foreach($estudiantes as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td><a href="{{ url('estudiantes', $item->id) }}">{{ $item->ci }}</a></td><td>{{ $item->nombre }}</td><td>{{ $item->apellido }}</td>
                    <td>
                        <a href="{{ url('estudiantes/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-edit"></span></a> 
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['estudiantes', $item->id],
                            'style' => 'display:inline',
                            'onsubmit' => 'return confirm("Realmente desea eliminar el registro?")'
                        ]) !!}

                        {!! Form::button('<span class="glyphicon glyphicon-remove"></span>', ['class'=>'btn btn-danger btn-xs', 'type' => 'submit']) !!}
                        {!! Form::close() !!}


                        <a href="{{ url('rephistorialestudiante/'.$item->id) }}" class="btn btn-success btn-xs" title="Historial de prestamos"><span class="glyphicon glyphicon-list"></span> Historial</a> 
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection

@section('scripts')
<script type="text/javascript">
    $(document).ready(function(){
        $('#tblestudiantes').DataTable({
            columnDefs: [{
                targets: [0],
                visible: false,
                searchable: false
                },
            ],
            order: [[0, "asc"]],
        });
    });
</script>
@endsection