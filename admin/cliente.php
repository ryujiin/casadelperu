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
				<a class="btn btn-default" href="?page=cliente&form=editar&user=<?php echo $resultados['id_usuario'] ?>" role="button">Editar</a>
				<button type="button" class="btn btn-danger boton_eliminar" data-toggle="modal" data-target="#elimar_cliente<?php echo $resultados['id_usuario'] ?>">
					Eliminar
				</button>
			</td>
		</tr>
		<div class="modal fade" id="elimar_cliente<?php echo $resultados['id_usuario'] ?>">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title">Eliminar <?php echo $resultados['correo'] ?>!!!</h4>
		      </div>
		      <div class="modal-body">
		        <p>Esta seguro que desea Eliminar este Usuario <?php echo $resultados['correo'] ?>? esto no es reversible.</p>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
				<a class="btn btn-danger" href="accion/eliminar_cliente.php?cliente=<?php echo $resultados['id_usuario'] ?>" role="button">Eliminar</a>		        
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