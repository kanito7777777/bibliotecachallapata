<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Reportes</title>
	
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

	<h3>@yield('titulo_reporte')</h3>
	
	<hr>
	<p align="right" class="imprimir"><a class="btn-primary btn" onclick="imprimir();" >Imprimir</a></p>


	@yield('contenido')
	
</div>
</body>