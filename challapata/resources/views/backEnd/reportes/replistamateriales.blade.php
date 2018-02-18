@extends('backLayout.rep')
@section('titulo_reporte')
Lista de Materiales
@stop

@section('contenido')

	<table class="table table-bordered text-left">
		<thead>
			<th>Nro</th>
			<th>Codigo</th>
			<th>Titulo</th>
			<th>Autor</th>
			<th>Descripcion</th>
			<th>Tipo</th>
			<th>Estado</th>
		</thead>
		<tbody>
			<?php $i = 1 ?>
			@foreach($materiales as $row)
			<tr>
				<td>{{ $i++ }}</td>
				<td>{{ $row->codigo }}</td>
				<td>{{ $row->titulo }}</td>
				<td>{{ $row->autor  }}</td>
				<td>{{ $row->descripcion }}</td>
				<td>{{ $row->tipo }}</td>
				<td>@if($row->estado === 1) {{ 'Alta' }} @else {{ 'Baja' }} @endif</td>
			</tr>
			@endforeach
		</tbody>	
	</table>

@endsection