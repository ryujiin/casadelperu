<?php
$producto = $_GET['producto'];
$query = "SELECT * FROM producto INNER JOIN categoria ON producto.id_categoria=categoria.id_categoria WHERE producto.id_producto = $producto";
$consulta = $db->consulta($query);
if($db->num_rows($consulta)>0){
    while($resultados = $db->fetch_array($consulta)){
    	$producto_res=$resultados;
    }
}
?>
<section id="producto_single" class="contenedor">
	<div class="row">
		<div class="col-md-6">
			<div class="imagen">
				<img src="<?php echo $producto_res['imagen'] ?>" alt="">
			</div>
		</div>
		<div class="col-md-6">
			<div class="page-header">
				<h1><?php echo $producto_res['nombre'];?> <small><?php echo $producto_res['nombre_cate'];?></small></h1>
			</div>
			<div class="estrellas">
				<label for="">Producto Rating:</label>
				<span class="glyphicon glyphicon-star"></span>
				<span class="glyphicon glyphicon-star"></span>
				<span class="glyphicon glyphicon-star"></span>
				<span class="glyphicon glyphicon-star"></span>
				<span class="glyphicon glyphicon-star"></span>
			</div>
			<div class="precios">
				<h2>S/. <?php echo $producto_res['precio']; ?>.00</h2>
			</div>			
			<blockquote>
				<strong>Descripcion:</strong>
				<p><?php echo $producto_res['descripcion']; ?></p>
			</blockquote>
			<form action="">
				<p class="text-center">
					<button type="button" class="btn btn-success btn-lg"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>Agregar al carro</button>					
				</p>
			</form>
		</div>
	</div>	
</section>