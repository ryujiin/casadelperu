<?php
$consulta = $db->consulta("SELECT * FROM producto");
?>
<div class="pull-right">
	<a class="btn btn-default" href="?page=catalogo&form=nuevo_producto" role="button">
		<span class="glyphicon glyphicon-plus-sign"></span>Agegar nuevos productos
	</a>
</div>
<h1 class="page-header">
	Catalogo
</h1>
<?php
if($db->num_rows($consulta)>0){
?>
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
				<a class="btn btn-default" href="/?producto=<?php echo $resultados['id_producto'] ?>" target="blank" role="button">Ver</a>
				<a class="btn btn-default" href="?page=catalogo&form=editar_producto&producto=<?php echo $resultados['id_producto'] ?>" role="button">Editar</a>
				<button type="button" class="btn btn-primary boton_eliminar" data-toggle="modal" data-target="#elimar_producto<?php echo $resultados['id_producto'] ?>">
					Eliminar
				</button>
			</td>
		</tr>
		<div class="modal fade" id="elimar_producto<?php echo $resultados['id_producto'] ?>">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title">Eliminar <?php echo $resultados['nombre'] ?></h4>
		      </div>
		      <div class="modal-body">
		        <p>Esta seguro que desea Eliminar este producto <?php echo $resultados['nombre'] ?>? esto no es reversible.</p>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
				<a class="btn btn-primary" href="accion/eleminar_catalogo.php?producto=<?php echo $resultados['id_producto'] ?>" role="button">Eliminar</a>		        
		      </div>
		    </div><!-- /.modal-content -->
		  </div><!-- /.modal-dialog -->
		</div><!-- /.modal -->
	<?php
	}
	?>
	</tbody>
</table>
<?php
}
?>