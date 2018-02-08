@extends('backLayout.app')
@section('title')
Materiales Prestados
@stop

@section('content')

    <h1>Libros y Revistas Prestados</h1>
    <hr>
    <div class="table table-responsive">
        <table class="table table-bordered table-striped table-hover" id="tblmateriales">
            <thead>
                <tr>
                    <th>Nro</th>
                    <th>Codigo</th>
                    <th>Titulo</th>
                    <th>Autor</th>
                    <th>Tipo</th>
                    <th>Obs</th>
                    @if (Auth::check())
                    <th>Dias</th>
                    <th></th>
                    @endif
                </tr>
            </thead>
            <tbody>

            <?php $i=1  ?>
            @foreach($materiales  as $item)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>
                    	<a href="{{ url('materiales', $item->id) }}">{{ $item->codigo }}</a>
                    </td>
                    <td>{{ $item->titulo }}</td>
                    <td>{{ $item->autor }}</td>
                    <td>{{ $item->tipo }}</td>
                	<td><p><span class="label label-danger">{{ $item->obs }}</span> </p>
						{{ 'fecha: '. $item->fecha }} <br>
						{{ 'A: '.$item->ci  }}
						{{ $item->aquien }} <br>
						{{ 'Obs: '.$item->observacion }}
                	</td>
				
					@if($item->diasPrestados > 2)
						<td><span class="label label-danger">{{ $item->diasPrestados }}</span></td>
					@else
						<td><span class="label label-success">{{ $item->diasPrestados }}</span></td>

                    @endif

                    <td>
                        <a href="{{ url('prestamos/' . $item->idPrestamo . '/edit') }}" class="btn btn-warning">Devolver</a> 
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