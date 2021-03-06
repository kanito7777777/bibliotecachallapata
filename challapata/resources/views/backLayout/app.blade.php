<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>@yield('title')</title>
	
	<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
	<link href="{{ asset('css/bootstrap-theme.min.css') }}" rel="stylesheet">

	<link href="{{ asset('css/jquery.dataTables.min.css') }}" rel="stylesheet">

	<style>
		body {
			padding-top: 70px;
		}
	</style>
</head>
<body>
	<nav class="navbar navbar-inverse navbar-fixed-top">
	    <div class="container">
	        <!-- Brand and toggle get grouped for better mobile display -->
	        <div class="navbar-header">
	            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-1">
	                <span class="sr-only">Toggle navigation</span>
	                <span class="icon-bar"></span>
	                <span class="icon-bar"></span>
	                <span class="icon-bar"></span>
	            </button>
	            <a class="navbar-brand" href="#">Biblioteca Challapata</a>
	        </div>

			<div class="collapse navbar-collapse" id="navbar-collapse-1">
				<ul class="nav navbar-nav navbar-right">
					@if (Auth::guest())
						 <li><a href="{{ route('login') }}">Login</a></li>
					@else
						<li><a href="{{ url('listamateriales') }}">Prestamos</a></li>
                        <li><a href="{{ url('listaprestados') }}">Devoluciones</a></li>
                        <li><a href="{{ url('materiales') }}">Materiales</a></li>
                        <li><a href="{{ url('estudiantes') }}">Estudiantes</a></li>

            			<li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                               Reportes
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="javascript:abrirVentana('{{ url('replistamateriales') }}')">
                                        Lista de libros
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:abrirVentana('{{ url('repestadistico') }}')">
                                        Estadisticos
                                    </a>
                                </li>
                            </ul>
                        </li>


						<li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
					@endif
				</ul>
			</div>

	    </div><!-- /.container-fluid -->
	</nav>

	<div class="container">
		@yield('content')
	</div>

	<hr/>

	<div class="container">
	    &copy; {{ date('Y') }}. Saul Mamani M.
	    <br/>
	</div>

	<!-- Scripts -->
	<script src="{{ asset('js/jquery.min.js') }}"></script>
	<script src="{{ asset('js/bootstrap.min.js') }}"></script>
	
	<script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
	@yield('scripts')

	<script type="text/javascript">
        function abrirVentana(url)
        {
            window.open(url,"Reportes", "width=900, height=450, left=200, top=150");
        }
    </script>
</body>
</html>