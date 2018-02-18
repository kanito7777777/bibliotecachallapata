@extends('backLayout.rep')
@section('titulo_reporte')
Reporte Estadistico de los Libros mas Prestados
@stop

@section('contenido')

	<table class="table table-bordered text-left">
		<thead>
			<th>Codigo</th>
			<th>Titulo</th>
			<th>Tipo</th>
			<th>Candidad de veces prestadas</th>
		</thead>
		<tbody>
			<?php $i = 1 ?>
			@foreach($materiales as $row)
			<tr>
				<td>{{ $row->codigo }}</td>
				<td>{{ $row->titulo }}</td>
				<td>{{ $row->tipo }}</td>
				<td>{{ $row->cant }}</td>
			</tr>
			@endforeach
		</tbody>	
	</table>

@endsection