<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Principal</title>
	<script src="{{asset('js/jquery.min.js')}}"></script>

	<link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
</head>
<body>
	<nav class="navbar navbar-default">
	  <div class="container-fluid">
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	      <a class="navbar-brand" href="{{url('/')}}">Home</a>
	    </div>
	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      <ul class="nav navbar-nav">
	        <li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Clientes <span class="caret"></span></a>
	          <ul class="dropdown-menu" role="menu">
	            <li><a href="{{url('/registrarUsuarios')}}">Registrar</a></li>
	            <li class="divider"></li>
	            <li><a href="{{url('/consultarUsuarios')}}">Consultas</a></li>
	          </ul>
	        </li>
	      </ul>
	    </div>
	  </div>
	</nav>
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				@yield('encabezado')
				<hr>
				@yield('contenido')
			</div>
		</div>
	</div>
	<script src="{{asset('js/bootstrap.min.js')}}"></script>
	<script src="{{asset('js/eventos.js')}}"></script>
	
</body>
</html>