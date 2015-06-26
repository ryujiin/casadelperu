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
			<a class="btn btn-default" href="?page=carros&carro=<?php echo $resultados['id_carro'] ?>" role="button">Ver</a>
			<a class="btn btn-default" href="?page=carros&form=editar&carro=<?php echo $resultados['id_carro'] ?>" role="button">Editar</a>
			<button type="button" class="btn btn-primary boton_eliminar" data-toggle="modal" data-target="#eliminar_carro<?php echo $resultados['id_carro'] ?>">
					Eliminar
				</button>
		</td>
	</tr>
		<div class="modal fade" id="eliminar_carro<?php echo $resultados['id_carro'] ?>">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title">Eliminar <?php echo $resultados['nombre'] ?></h4>
		      </div>
		      <div class="modal-body">
		        <p>Esta seguro que desea Eliminar este Carro de  <?php echo $resultados['correo'] ?>? Esto no es reversible.</p>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
				<a class="btn btn-primary" href="accion/eliminar_carro.php?carro=<?php echo $resultados['id_carro'] ?>" role="button">Eliminar</a>		        
		      </div>
		    </div><!-- /.modal-content -->
		  </div><!-- /.modal-dialog -->
		</div><!-- /.modal -->
<?php
	}
}else{
	echo '<tr><td colspan="5">No exiten carritos Aun</td></tr>';
}
?>
	</tbody>
</table>