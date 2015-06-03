<form class="form-horizontal" action="formulario/val_nuevo_cliente.php" method="POST">
	<div class="form-group">
		<label for="correo" class="col-sm-2 control-label">Correo electronico</label>
		<div class="col-sm-10">
			<input type="email" class="form-control" id="correo" placeholder="ejemplo@ejemplo.com" name="correo">
		</div>
	</div>
	<div class="form-group">
		<label for="password" class="col-sm-2 control-label">Password</label>
		<div class="col-sm-10">
			<input type="password" class="form-control" name="password">
		</div>
	</div>
	<div class="form-group">
		<label for="password" class="col-sm-2 control-label">Confirmar Password</label>
		<div class="col-sm-10">
			<input type="password" class="form-control" name="password2">
		</div>
	</div>
	<div class="form-group">
		<label for="nombres" class="col-sm-2 control-label">Nombres</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="nombres" placeholder="Ej. Maria" name="nombres">
		</div>
	</div>
	<div class="form-group">
		<label for="apellidos" class="col-sm-2 control-label">Apellidos</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="apellidos" placeholder="Ej. Lopez" name="apellidos">
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" class="btn btn-default">Crear Cliente</button>
		</div>
	</div>
</form>