@extends('backLayout.rep')
@section('titulo_reporte')
Historial por Libro
@stop

@section('contenido')

@if(!empty($materiales))
<p class="text-left">
	<strong>Material: </strong>{{ $materiales[0]->codigo }} - {{ $materiales[0]->titulo }}
</p>
@endif

	<table class="table table-bordered text-left">
		<thead>
			<th>Nro</th>
			<th>Fecha</th>
			<th>Estudiante</th>
			<th>Observacion</th>
			<th>Estado</th>
		</thead>
		<tbody>
			<?php $i = 1 ?>
			@foreach($materiales as $row)
			<tr>
				<td>{{ $i++ }}</td>
				<td>{{ $row->fecha }}</td>
				<td>{{ $row->ci.' - '.$row->aquien }}</td>
				<td>{!! $row->observacion !!}</td>
				<td>{{ $row->estado }}</td>
			</tr>
			@endforeach
		</tbody>	
	</table>

@endsection