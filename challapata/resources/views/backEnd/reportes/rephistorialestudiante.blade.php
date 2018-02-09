<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>@yield('title')</title>
	
	<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
	<link href="{{ asset('css/bootstrap-theme.min.css') }}" rel="stylesheet">

	<style type="text/css" media="print">
		.imprimir{
			display: none;
		}
	</style>

	<script type="text/javascript">
		function imprimir()
		{
			window.print();
		}
	</script>

</head>

<body>
	
	<div class="container text-center">	
	<p>Facultad Nacional de Ingenieria</p>
	<p>Ingenieria de Sistemas e Informatica</p>
	<p>(Sub sede Challapata)</p>

	<h3>Historial de libros prestados</h3>
	
	<hr>
	<p align="right" class="imprimir"><a class="btn-primary btn" onclick="imprimir();" >Imprimir</a></p>


	<table class="table table-bordered text-left">
		<thead>
			<th>Nro</th>
			<th>Fecha</th>
			<th>Observacion</th>
			<th>Estado</th>
			<th>Codigo</th>
			<th>Material</th>
			<th>Tipo</th>
		</thead>
		<tbody>
			<?php $i = 1 ?>
			@foreach($materiales as $row)
			<tr>
				<td>{{ $i++ }}</td>
				<td>{{ $row->fecha }}</td>
				<td>{!! $row->observacion !!}</td>
				<td>{{ $row->estado }}</td>
				<td>{{ $row->codigo }}</td>
				<td>{{ $row->titulo }}</td>
				<td>{{ $row->tipo }}</td>
			</tr>
			@endforeach
		</tbody>	
	</table>
</div>
</body>