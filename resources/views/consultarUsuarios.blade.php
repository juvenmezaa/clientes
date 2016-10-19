@extends("principal")
@section("encabezado")
	<h2>Listado de Usuarios</h2>
@stop
@section("contenido")
	<div class="conteiner col-xs-5">
		<form action="{{url('/consultar')}}" method="POST" id="divForm">
			<input type="hidden" name="_token" value="{{csrf_token()}}">
			<div class="form-group">
				<label for="usuario">Usuario</label>
				<select class="form-control" name="usuario">
					@foreach($usuarios as $u)
						<option value="{{$u->id}}">{{$u->nombre}} {{$u->apellidos}}</option>
					@endforeach
				</select>
			</div>
			<div class="form-group">
				<input type="submit" class="btn" value="Consultar">
				<a href="{{url('/')}}" class="btn btn-danger">Cancelar</a>
			</div>
		</form>
	</div>
@stop