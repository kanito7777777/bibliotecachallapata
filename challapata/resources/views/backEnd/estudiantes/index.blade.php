@extends('backLayout.app')
@section('title')
Estudiante
@stop

@section('content')

    <h1>Estudiantes <a href="{{ url('estudiantes/create') }}" class="btn btn-primary pull-right btn-sm">Add New Estudiante</a></h1>
    <div class="table table-responsive">
        <table class="table table-bordered table-striped table-hover" id="tblestudiantes">
            <thead>
                <tr>
                    <th>ID</th><th>Ci</th><th>Nombre</th><th>Apellido</th><th>Actions</th>
                </tr>
            </thead>
            <tbody>
            @foreach($estudiantes as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td><a href="{{ url('estudiantes', $item->id) }}">{{ $item->ci }}</a></td><td>{{ $item->nombre }}</td><td>{{ $item->apellido }}</td>
                    <td>
                        <a href="{{ url('estudiantes/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs">Update</a> 
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['estudiantes', $item->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}
                        {!! Form::close() !!}
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