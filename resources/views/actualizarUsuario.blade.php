@extends("principal")
@section("encabezado")
	<h2>Actualizar Usuario</h2>
@stop
@section("contenido")
		<form action="{{url('/actualizaUsuario')}}/{{$usuario->id}}" method="POST">
			<input type="hidden" name="_token" value="{{csrf_token()}}">
			<div class="form-group">
				<label for="regimen">Regimen</label>
				<select class="form-control" name="regimen">
					@if($usuario->regimen==0)
						<option value="0" selected>Persona Moral</option>
						<option value="1">Persona Fiscal</option>
					@else
						<option value="0">Persona Moral</option>
						<option value="1" selected>Persona Fiscal</option>
					@endif
				</select>
			</div>
			<div class="form-group">
	  			<label class="control-label" for="nombre">Nombre</label>
	  			<input type="text" class="form-control" name="nombre" value="{{$usuario->nombre}}" required>
			</div>
			<div class="form-group">
	  			<label class="control-label" for="apellidos">Apellidos</label>
	  			<input type="text" class="form-control" name="apellidos" value="{{$usuario->apellidos}}" required>
			</div>
			<div class="form-group">
				<label for="rfc">RFC</label>
				<input type="text" class="form-control" name="rfc" value="{{$usuario->rfc}}" required>
			</div>
			<div class="form-group">
				<label for="curp">CURP</label>
				<input type="text" class="form-control" name="curp" value="{{$usuario->curp}}" required>
			</div>
			<hr>
			<h4>Dirección <a onclick="otraDireccion()"><span class="glyphicon glyphicon-plus"></span></a></h4>
			@foreach($direcciones as $d)
				<div class="form-group col-xs-2">
					<label for="pais">Pais</label>
					<input type="text" class="form-control" name="pais[]" value="{{$d->pais}}" required>
				</div>
				<div class="form-group col-xs-2">
					<label for="estado">Estado</label>
					<input type="text" class="form-control" name="estado[]" value="{{$d->estado}}" required>
				</div>
				<div class="form-group col-xs-2">
					<label for="ciudad">Ciudad</label>
					<input type="text" class="form-control" name="ciudad[]" value="{{$d->ciudad}}" required>
				</div>
				<div class="form-group col-xs-2">
					<label for="colonia">Colonia</label>
					<input type="text" class="form-control" name="colonia[]" value="{{$d->colonia}}" required>
				</div>
				<div class="form-group col-xs-3" id="divCalle">
					<label for="calle">Calle</label>
					<input type="text" class="form-control" name="calle[]" value="{{$d->calle}}" required>
				</div>
			@endforeach
		<div class="form-group col-xs-12">
			<input type="submit" class="btn" value="Guardar">
			<a href="{{url('/')}}" class="btn btn-danger">Cancelar</a>
		</div>
	</form>
@stop