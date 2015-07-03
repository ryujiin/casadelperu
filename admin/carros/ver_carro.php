<?php
$id_carro=$_GET['carro'];
$query="SELECT * FROM carro INNER JOIN usuarios ON carro.id_usuario=usuarios.id_usuario WHERE id_carro=$id_carro";
$consulta = $db->consulta($query);
if($db->num_rows($consulta)>0){
	while($resultados = $db->fetch_array($consulta)){
		$carro = $resultados;
	}
}
$id_usuario = $carro['id_usuario'];

$query = "SELECT total FROM `linea_pedido` WHERE `id_carro` = $id_carro";
$consulta = $db->consulta($query);
$num_productos = $db->num_rows($consulta);
$total = 0;
if($num_productos>0){
	while($resultados = $db->fetch_array($consulta)){
		$total=$total+$resultados['total'];
	}
}

$query = "SELECT * FROM `pedido` WHERE id_usuario = $id_usuario";
$consulta = $db->consulta($query);
$num_pedidos = $db->num_rows($consulta);
if($num_pedidos>0){
	while($resultados = $db->fetch_array($consulta)){
		$pedido = $resultados;
	}
}else{
	$num_pedidos = 1;
}

$fecha=date_create($carro['creado_carro']);
$fecha = date_format($fecha, 'd/m/y');
$total = number_format((float)$total, 2, '.', '');
?>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="col-md-4">
					<div class="etiqueta">Fecha</div>
					<div class="valor"><?php echo $fecha ?></div>
				</div>
				<div class="col-md-4">
					<div class="etiqueta">Total</div>
					<div class="valor">S/.<?php echo $total ?></div>
				</div>
				<div class="col-md-4">
					<div class="etiqueta">Productos</div>
					<div class="valor"><?php echo $num_productos ?></div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-7">
		<div class="panel panel-default">
			<div class="panel-heading">Pedido <span class="label label-default">Nº <?php echo $carro['id_carro'] ?></span></div>
			<div class="panel-body">
				<div class="col-md-3">
					<label for="">Estado</label>
				</div>
				<div class="col-md-3">
					<button type="button" class="btn btn-primary"><?php echo $carro['estado'] ?></button>					
				</div>
				<div class="col-md-6">
					<select name="estado" id="estado" class="form-control">
						<option value="">Cambiar Estado</option>
						<option value="">Desactivar</option>
						<option value="">Pagado</option>
						<option value="">Enviado</option>
					</select>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-5">
		<div class="panel panel-default">
			<div class="panel-heading">
				Cliente <span class="label label-default">Nº <?php echo $carro['id_usuario'] ?></span>
			</div>
			<div class="panel-body">
				<div class="col-md-12">
					<div class="panel panel-default">
						<div class="panel-body">
							<div class="form-group">
							    <label for="exampleInputEmail1">Correo Electronico</label>
								<div class="valor"><?php echo $carro['correo']; ?></div>							    
							</div>
							<div class="form-group">
							    <label for="exampleInputEmail1">Pedidos Realizados</label>
								<span class="badge"><?php echo $num_pedidos ?></span>							    
							</div>
						</div>
					</div>
				</div>
				
			</div>
		</div>
	</div>
	<div class="col-md-12"></div>
</div>