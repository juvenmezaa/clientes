@extends("principal")
@section("encabezado")
	<h2>Usuario</h2>
@stop
@section("contenido")
	<div class="conteiner col-xs-7">
	<table class="table table-hover table-striped">
		<thead>
			<tr>
				<th>#</th>
				<th>Regimen</th>
				<th>Nombre</th>
				<th>Apellidos</th>
				<th>RFC</th>
				<th>CURP</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>{{$direcciones[0]->id}}</td>
				@if($direcciones[0]->regimen==0)
					<td>P. Moral</td>
				@else
					<td>P. Fiscal</td>
				@endif
				<td>{{$direcciones[0]->nombre}}</td>
				<td>{{$direcciones[0]->apellidos}}</td>
				<td>{{$direcciones[0]->rfc}}</td>
				<td>{{$direcciones[0]->curp}}</td>
				<td>
					<a href="{{url('/actualizarUsuario')}}/{{$direcciones[0]->id}}" class="btn btn-success"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
					<a href="{{url('/eliminarUsuario')}}/{{$direcciones[0]->id}}" class="btn btn-danger"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
				</td>
			</tr>
		</tbody>
	</table>
	</div>
	<div class="conteiner col-xs-12">
	<hr>
	<h3>Direcciones</h3>
	</div>
	<div class="conteiner col-xs-10">
	<table class="table table-hover table-striped">
		<thead>
			<tr>
				<th>Pais</th>
				<th>Estado</th>
				<th>Ciudad</th>
				<th>Colonia</th>
				<th>Calle</th>
			</tr>
		</thead>
		<tbody>
			@foreach($direcciones as $d)
				<tr>
					<td>{{$d->pais}}</td>
					<td>{{$d->estado}}</td>
					<td>{{$d->ciudad}}</td>
					<td>{{$d->colonia}}</td>
					<td>{{$d->calle}}</td>
				</tr>
			@endforeach
		</tbody>
	</table>
	</div>
@stop