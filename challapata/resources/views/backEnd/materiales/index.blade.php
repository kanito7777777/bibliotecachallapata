@extends('backLayout.app')
@section('title')
Materiales
@stop

@section('content')

    <h1>Materiales <a href="{{ url('materiales/create') }}" class="btn btn-primary pull-right btn-sm">Nuevo Material</a></h1>
    <hr>
    <div class="table table-responsive">
        <table class="table table-bordered table-striped table-hover" id="tblmateriales">
            <thead>
                <tr>
                    <th>ID</th><th>Codigo</th><th>Titulo</th><th>Autor</th>
                    <th>Descripcion</th>
                    <th>Tipo</th>
                    <th>Estado</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            @foreach($materiales as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td><a href="{{ url('materiales', $item->id) }}">{{ $item->codigo }}</a></td><td>{{ $item->titulo }}</td><td>{{ $item->autor }}</td>
                    <td>{{ $item->descripcion }}</td>
                    <td>{{ $item->tipo }}</td>
                    <td>{{ $item->estado }}</td>
                    <td>
                        <a href="{{ url('materiales/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs">Editar</a> 
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['materiales', $item->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::submit('Eliminar', ['class' => 'btn btn-danger btn-xs']) !!}
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
        $('#tblmateriales').DataTable({
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