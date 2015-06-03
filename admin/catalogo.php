<?php
$consulta = $db->consulta("SELECT * FROM producto");
if($db->num_rows($consulta)>0){
?>
<div class="pull-right">
	<a class="btn btn-default" href="?page=catalogo&form=nuevo_producto" role="button">
		<span class="glyphicon glyphicon-plus-sign"></span>Agegar nuevos productos
	</a>
</div>
<h1 class="page-header">
	Catalogo
</h1>
<table class="table table-striped">
	<thead>
		<tr>
			<th>#</th>
			<th>imagen</th>
			<th>Nombre</th>
			<th>Precio</th>
			<th>Stock</th>
			<th>Acciones</th>
		</tr>
	</thead>
	<tbody>
	<?php
		while($resultados = $db->fetch_array($consulta)){ 
	?>
		<tr>
			<td><?php echo $resultados['id_producto'] ?></td>
			<td><img src="<?php echo $resultados['imagen'] ?>" alt="" width="100"></td>
			<td><?php echo $resultados['nombre'] ?></td>
			<td><?php echo $resultados['precio'] ?></td>
			<td><?php echo $resultados['stock'] ?></td>
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