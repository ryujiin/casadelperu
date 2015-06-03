<form class="form-horizontal" action="formulario/validar_nuevo_producto.php" method="POST" enctype="multipart/form-data">
	<div class="form-group">
		<label for="nombre" class="col-sm-2 control-label">Nombre</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="nombre" placeholder="Nombre del producto" name="nombre">
		</div>
	</div>
	<div class="form-group">
		<label for="descripcion" class="col-sm-2 control-label">Descripcion</label>
		<div class="col-sm-10">
			<textarea class="form-control" rows="3" name="descripcion"></textarea>
		</div>
	</div>
	<div class="form-group">
		<label for="precio" class="col-sm-2 control-label">Precio</label>
		<div class="col-sm-10">
			<input type="number" class="form-control" step="0.01" min="0" name="precio">
		</div>
	</div>
	<div class="form-group">
		<label for="stock" class="col-sm-2 control-label">Stock</label>
		<div class="col-sm-10">
			<input type="number" class="form-control" min="0" name="stock">
		</div>
	</div>
	<div class="form-group">
		<label for="categoria" class="col-sm-2 control-label">Categoria</label>
		<div class="col-sm-10">
			<select class="form-control" name="categoria">
			  <option value="">Seleccionar una Categoria</option>
			  <option value="1">Ceramico</option>
			  <option value="2">Textileria</option>
			  <option value="3">Orfereria</option>
			  <option value="4">Ebanisteria</option>
			</select>
		</div>
	</div>
	<div class="form-group">
		<label for="inputPassword3" class="col-sm-2 control-label">Imagen</label>
		<div class="col-sm-10">
			<input type="file" id="imagen_producto" name="imagen_producto">
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" class="btn btn-default">Crear Producto</button>
		</div>
	</div>
</form>