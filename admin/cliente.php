<?php
$consulta = $db->consulta("SELECT * FROM usuarios");
if($db->num_rows($consulta)>0){
?>
<div class="pull-right">
	<a class="btn btn-default" href="?page=cliente&form=nuevo" role="button">
		<span class="glyphicon glyphicon-plus-sign"></span>Agegar nuevo Cliente
	</a>
</div>
<h1 class="page-header">
	Usuarios
</h1>
<table class="table table-striped">
	<thead>
		<tr>
			<th>#</th>
			<th>Correo Electronico</th>
			<th>Staff</th>
			<th>Nombre</th>
			<th>Apellidos</th>
			<th>Acciones</th>
		</tr>
	</thead>
	<tbody>
	<?php
		while($resultados = $db->fetch_array($consulta)){ 
			if ($resultados['admin']==0) {
				$staff="<span class='glyphicon glyphicon-remove'></span>";
			}else{
				$staff="<span class='glyphicon glyphicon-ok'></span>";
			}
	?>
		<tr>
			<td><?php echo $resultados['id_usuario'] ?></td>
			<td><?php echo $resultados['correo'] ?></td>
			<td><?php echo $staff; ?></td>
			<td><?php echo $resultados['nombres'] ?></td>
			<td><?php echo $resultados['apellidos'] ?></td>
			<td>
				<a class="btn btn-default" href="" role="button">Ver</a>
				<a class="btn btn-default" href="?page=catalogo&form=editar_producto&producto=<?php echo $resultados['id_producto'] ?>" role="button">Editar</a>
				<a class="btn btn-default" href="#" role="button">Eliminar</a>
			</td>
		</tr>
	<?php
	}
	?>
	</tbody>
</table>
<?php
}
?>