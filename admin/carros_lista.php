<div class="pull-right">
	<a class="btn btn-default" href="?page=carros&form=nuevo" role="button">
		<span class="glyphicon glyphicon-plus-sign"></span>Crear un carro
	</a>
</div>
<h1 class="page-header">
	Carros
</h1>
<table class="table table-striped">
	<thead>
		<tr>
			<th>#</th>
			<th>Cliente</th>
			<th>Estado</th>
			<th>Fecha</th>
			<th>Acciones</th>
		</tr>
	</thead>
	<tbody>
<?php
$consulta = $db->consulta("SELECT * FROM carro INNER JOIN usuarios ON carro.id_usuario=usuarios.id_usuario");
if($db->num_rows($consulta)>0){
	while($resultados = $db->fetch_array($consulta)){ 
?>
	<tr>
		<td><?php echo $resultados['id_carro'] ?></td>
		<td><?php echo $resultados['correo'];?></td>
		<td><?php echo $resultados['estado'] ?></td>
		<td><?php echo $resultados['creado'] ?></td>
		<td>
			<a class="btn btn-default" href="" role="button">Ver</a>
			<a class="btn btn-default" href="?page=carro&form=editar&producto=<?php echo $resultados['id_carro'] ?>" role="button">Editar</a>
			<a class="btn btn-default" href="#" role="button">Eliminar</a>
		</td>
	</tr>
<?php
	}
}else{
	echo '<tr><td colspan="5">No exiten carritos Aun</td></tr>';
}
?>
	</tbody>
</table>