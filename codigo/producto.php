<?php
$producto = $_GET['producto'];
$query = "SELECT * FROM producto INNER JOIN categoria ON producto.id_categoria=categoria.id_categoria WHERE producto.id_producto = $producto";
$consulta = $db->consulta($query);
if($db->num_rows($consulta)>0){
    while($resultados = $db->fetch_array($consulta)){
    	$producto_res=$resultados;
    }
    $estrellas ='';
    $valoracion = $producto_res['valoracion'];
    $valoracion = number_format((float)$valoracion, 1, '.', '');

    for ($i=0; $i < 5; $i++) { 
    	$data_valor = $i+1;
    	if ($i<$valoracion) {
    		$estrellas = $estrellas.'<span class="glyphicon glyphicon-star pintado" data-valor="'.$data_valor.'"	></span>';
    	}else{
    		$estrellas = $estrellas.'<span class="glyphicon glyphicon-star" data-valor="'.$data_valor.'"	></span>';
    	}
    }

}
$query = "SELECT * FROM `valoracion` WHERE `id_producto` = $producto";
$consulta = $db->consulta($query);
$votos = $db->num_rows($consulta);

if ($login == True) {
	$boton_add_cart = '<button type="submit" class="btn btn-success btn-lg add_cart" data-producto="'.$producto_res['id_producto'].'"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>Agregar al carro</button>';
}else{
	$boton_add_cart ='<button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#login_user"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>Agregar al carro</button>';
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
				<?php  echo $estrellas;?>
				<ins><?php echo $valoracion?></ins>
				<strong>(<?php echo $votos; ?>)</strong>
			</div>

			<div class="precios">
				<h2>S/. <?php echo $producto_res['precio']; ?>.00</h2>
			</div>			
			<blockquote>
				<strong>Descripcion:</strong>
				<p><?php echo $producto_res['descripcion']; ?></p>
			</blockquote>
			<form action="validar/add_cart.php" method='post'>
				<input type="hidden" id="id_producto" name="id_producto" value="<?php echo $producto_res['id_producto'] ?>">
				<input type="hidden" name="total" value="<?php echo $producto_res['precio'] ?>">
				<p class="text-center">
					<?php echo $boton_add_cart;?>
				</p>
			</form>
		</div>
	</div>	
</section>
