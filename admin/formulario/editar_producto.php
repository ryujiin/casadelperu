<?php
if ($_GET['producto']) {
	$producto = $_GET['producto'];
	$consulta = $db->consulta("SELECT * FROM producto WHERE id_producto = $producto");
	if($db->num_rows($consulta)>0){
		while($resultados = $db->fetch_array($consulta)){
?>
			<form class="form-horizontal" action="formulario/validar_editar_producto.php" method="POST" enctype="multipart/form-data">
				<input type="hidden" value="<?php echo $resultados['id_producto']; ?>" name="id_producto">
				<div class="form-group">
					<label for="nombre" class="col-sm-2 control-label">Nombre</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="nombre" placeholder="Nombre del producto" name="nombre" value="<?php echo $resultados['nombre']?>">
					</div>
				</div>
				<div class="form-group">
					<label for="descripcion" class="col-sm-2 control-label">Descripcion</label>
					<div class="col-sm-10">
						<textarea class="form-control" rows="3" name="descripcion"><?php echo $resultados['descripcion']?></textarea>
					</div>
				</div>
				<div class="form-group">
					<label for="precio" class="col-sm-2 control-label">Precio</label>
					<div class="col-sm-10">
						<input type="number" class="form-control" step="0.01" min="0" name="precio" value="<?php echo $resultados['precio']?>">
					</div>
				</div>
				<div class="form-group">
					<label for="stock" class="col-sm-2 control-label">Stock</label>
					<div class="col-sm-10">
						<input type="number" class="form-control" min="0" name="stock" value="<?php echo $resultados['stock'] ?>">
					</div>
				</div>
				<div class="form-group">
					<label for="categoria" class="col-sm-2 control-label">Categoria</label>
					<div class="col-sm-10">
						<select class="form-control" name="categoria" value="<?php echo $resultados['id_categoria'] ?>">
						  <option value="1" selected>Ceramico</option>						
						  <option value="2">Textileria</option>
						  <option value="3">Orfereria</option>
						  <option value="4">Ebanisteria</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label for="inputPassword3" class="col-sm-2 control-label">Imagen</label>
					<div class="col-sm-10">
						<img src="<?php echo $resultados['imagen'] ?>" alt="">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<button type="submit" class="btn btn-default">Modificar Producto</button>
					</div>
				</div>
			</form>
		<?php
		}
	}
}else{
	echo "no hay q editar";
}
?>