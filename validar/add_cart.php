<?php
include('../mysql.php');
session_start();
/*caturamos nuestros datos que fueron enviados desde el formulario mediante el metodo POST
**y los almacenamos en variables.*/
$login = $_SESSION['login'];
$db = new MySQL();

$cantidad = 1;
$id_producto = $_POST['id_producto'];
$total = $_POST['total'];
$id_carro = $_SESSION['id_carro'];
if ($login==True) {
	if ($id_producto!='') {
		$query = "SELECT * FROM `linea_pedido` WHERE id_carro=$id_carro AND id_producto=$id_producto";
		$consulta = $db->consulta($query);
		if($db->num_rows($consulta)>0){
			while($resultados = $db->fetch_array($consulta)){ 
				$cant_old = $resultados['cantidad'];
				$id_linea = $resultados['id_linea_pedido'];
			}
			$cantidad = $cant_old + 1;
			$query = "UPDATE `linea_pedido` SET `cantidad` = '$cantidad' WHERE `linea_pedido`.`id_linea_pedido` = '$id_linea'";
			$consulta = $db->consulta($query);
		}else{
			$query = "INSERT INTO `linea_pedido` (`id_linea_pedido`, `id_producto`, `cantidad`, `total`, `id_carro`) 
									VALUES (Null, $id_producto, $cantidad, '$total', '$id_carro')";
			$consulta = $db->consulta($query);
		}		
		header("Location: /?page=carro");
	}
}else{
	echo "error - no login";
}
?>