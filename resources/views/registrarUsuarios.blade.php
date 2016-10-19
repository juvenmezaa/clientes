@extends("principal")
@section("encabezado")
	<h2>Registrar Usuarios</h2>
@stop
@section("contenido")
	<form action="{{url('/guardarUsuario')}}" method="POST">
			<input type="hidden" name="_token" value="{{csrf_token()}}">
			<div class="form-group">
				<label for="regimen">Regimen</label>
				<select class="form-control" name="regimen">
					<option value="0" selected>Persona Moral</option>
					<option value="1">Persona Fiscal</option>
				</select>
			</div>
			<div class="form-group">
	  			<label class="control-label" for="nombre">Nombre</label>
	  			<input type="text" class="form-control" name="nombre" required>
			</div>
			<div class="form-group">
	  			<label class="control-label" for="apellidos">Apellidos</label>
	  			<input type="text" class="form-control" name="apellidos" required>
			</div>
			<div class="form-group">
				<label for="rfc">RFC</label>
				<input type="text" class="form-control" name="rfc" required>
			</div>
			<div class="form-group">
				<label for="curp">CURP</label>
				<input type="text" class="form-control" name="curp" required>
			</div>
			<hr>
			<h4>Dirección <a onclick="otraDireccion()"><span class="glyphicon glyphicon-plus"></span></a></h4>
			<div class="form-group col-xs-2">
				<label for="pais">Pais</label>
				<input type="text" class="form-control" name="pais[]" required>
			</div>
			<div class="form-group col-xs-2">
				<label for="estado">Estado</label>
				<input type="text" class="form-control" name="estado[]" required>
			</div>
			<div class="form-group col-xs-2">
				<label for="ciudad">Ciudad</label>
				<input type="text" class="form-control" name="ciudad[]" required>
			</div>
			<div class="form-group col-xs-2">
				<label for="colonia">Colonia</label>
				<input type="text" class="form-control" name="colonia[]" required>
			</div>
			<div class="form-group col-xs-3" id="divCalle">
				<label for="calle">Calle</label>
				<input type="text" class="form-control" name="calle[]" required>
			</div>
		<div class="form-group col-xs-12">
			<input type="submit" class="btn" value="Guardar">
			<a href="{{url('/')}}" class="btn btn-danger">Cancelar</a>
		</div>
	</form>	
@stop