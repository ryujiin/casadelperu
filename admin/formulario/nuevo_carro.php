<?php
$usuarios = '';
$productos = '';
$consulta = $db->consulta("SELECT * FROM usuarios");
if($db->num_rows($consulta)>0){
	while($resultados = $db->fetch_array($consulta)){
		$usuarios = $usuarios.'<option value="'.$resultados['id_usuario'].'">'.$resultados['correo'].'</option>';
	}
}
$consulta = $db->consulta("SELECT * FROM producto");
if($db->num_rows($consulta)>0){
	while($resultados = $db->fetch_array($consulta)){
		$productos = $productos.'<option value="'.$resultados['id_productos'].'">'.$resultados['nombre'].'</option>';
	}
}
?>
<h2 class="sub-header">Nuevo Carro</h2>
<form class="form-horizontal" action="formulario/val_nuevo_carro.php" method="POST">
	<div class="form-group">
		<label class="col-sm-2 control-label">Cliente</label>
		<div class="col-sm-10">
			<select class="form-control" name="usuario">
				<?php echo $usuarios; ?>
			</select>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label">Estado</label>
		<div class="col-sm-10">
			<select class="form-control" name="estado" id="">
				<option>Activo</option>
				<option>Congelado</option>
				<option>Fucionado</option>
				<option>Desactivado</option>
			</select>
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" class="btn btn-default">Crear Carro</button>
		</div>
	</div>
</form>