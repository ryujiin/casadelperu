<?php
$cliente = $_GET['user'];
$consulta = $db->consulta("SELECT * FROM usuarios WHERE id_usuario = $cliente");
if($db->num_rows($consulta)>0){
	while($resultados = $db->fetch_array($consulta)){
		$user = $resultados;
	}
}
?>

<a class="btn btn-default pull-right" href="/admin/?page=cliente" role="button">
	<span class="glyphicon glyphicon-share-alt" aria-hidden="true"></span>
	Regresar lista de clientes
</a>
<h2 class="page-header">Editar usuario</h2>

<form class="form-horizontal" action="formulario/val_editar_cliente.php" method="POST">
	<input type="hidden" name="id_usuario" value="<?php echo $user['id_usuario']; ?>">
	<div class="form-group">
		<label for="correo" class="col-sm-2 control-label">Correo electronico</label>
		<div class="col-sm-10">
			<input type="email" class="form-control" id="correo" value="<?php echo $user['correo'] ?>" name="correo">
		</div>
	</div>
	<div class="form-group">
		<label for="nombres" class="col-sm-2 control-label">Nombres</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="nombres" value="<?php echo $user['nombres'] ?>" name="nombres">
		</div>
	</div>
	<div class="form-group">
		<label for="apellidos" class="col-sm-2 control-label">Apellidos</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="apellidos" value="<?php echo $user['apellidos'] ?>" name="apellidos">
		</div>
	</div>
	<div class="form-group">
	    <div class="col-sm-offset-2 col-sm-10">
	      <div class="checkbox">
	        <label>
	          <input name="admin" type="checkbox" <?php if ($user['admin']==1) {echo 'checked';}; ?>> Es administrador
	        </label>
	      </div>
	    </div>
	  </div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" class="btn btn-default">Editar Cliente</button>
		</div>
	</div>
</form>