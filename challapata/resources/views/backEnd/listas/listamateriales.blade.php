@extends('backLayout.app')
@section('title')
Lista de Materiales
@stop

@section('content')

    <h1>Lista de Materiales</h1>
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
                    <th>Dias</th>
                    <th></th>
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
					
					@if (isset($item->idPrestamo))
                    	<td><span class="label label-danger">{{ $item->obs }}</span> <br>
							{{ 'fecha: '. $item->fecha }} <br>
							{{ 'Est: '.$item->ci  }}
							{{ $item->aquien }} <br>
							{{ $item->observacion }}
                    	</td>
					@else
                    	<td><span class="label label-success">{{ $item->obs }}</span></td>
					@endif
					
					@if($item->diasPrestados > 2)
						<td><span class="label label-danger">{{ $item->diasPrestados }}</span></td>
					@else
						<td><span class="label label-success">{{ $item->diasPrestados }}</span></td>

                    @endif

                    <td>
                    @if (!isset($item->idPrestamo))
                        <a href="{{ url('materiales/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs">Realizar Prestamo</a> 
                    @endif
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