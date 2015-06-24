<?php
$total_carro='';
$total_lineas='';

if ($login==True) {
	$query = "SELECT * FROM `carro` WHERE `id_usuario` = $id_user AND estado='Activo' LIMIT 1";
	$consulta = $db->consulta($query);
	if($db->num_rows($consulta)>0){
		while($resultados = $db->fetch_array($consulta)){
			$id_carro = $resultados['id_carro'];
		}
	}else{
		$creado = date("Y-m-d H:i:s");
		$query = "INSERT INTO `casadelperu`.`carro` (`id_carro`, `id_usuario`, `estado`, `creado`) VALUES 
													(NULL, '$id_user', 'Activo', '$creado');";
		$consulta = $db->consulta($query);
		$query = "SELECT * FROM `carro` WHERE `id_usuario` = $id_user AND estado='Activo' LIMIT 1";
		$consulta = $db->consulta($query);
		while($resultados = $db->fetch_array($consulta)){
			$id_carro = $resultados['id_carro'];
		}
	}
	$_SESSION['id_carro']=$id_carro;
	//Ayar el Todal del carro;
	$query="SELECT * FROM linea_pedido INNER JOIN producto ON linea_pedido.id_producto = producto.id_producto WHERE id_carro = $id_carro";
	$consulta = $db->consulta($query);
	$total_carro = 0;
	$total_lineas = $db->num_rows($consulta);
	if($db->num_rows($consulta)>0){
		while($resultados = $db->fetch_array($consulta)){
			$total_carro = $total_carro+$resultados['total'];
		}		
	}
	$total_carro = number_format((float)$total_carro, 2, '.', '');
}else{
	$total_lineas = 0;
	$total_carro = number_format((float)0, 2, '.', '');	
}
?>