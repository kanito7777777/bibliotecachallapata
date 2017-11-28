@extends('backLayout.app')
@section('title')
Prestamo
@stop

@section('content')

    <h1>Prestamos <a href="{{ url('prestamos/create') }}" class="btn btn-primary pull-right btn-sm">Add New Prestamo</a></h1>
    <div class="table table-responsive">
        <table class="table table-bordered table-striped table-hover" id="tblprestamos">
            <thead>
                <tr>
                    <th>ID</th><th>Fecha</th><th>Observacion</th><th>Estado</th><th>Actions</th>
                </tr>
            </thead>
            <tbody>
            @foreach($prestamos as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td><a href="{{ url('prestamos', $item->id) }}">{{ $item->fecha }}</a></td><td>{{ $item->observacion }}</td><td>{{ $item->estado }}</td>
                    <td>
                        <a href="{{ url('prestamos/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs">Update</a> 
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['prestamos', $item->id],
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
        $('#tblprestamos').DataTable({
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