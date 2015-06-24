<?php
include('../mysql.php');
session_start();
/*caturamos nuestros datos que fueron enviados desde el formulario mediante el metodo POST
**y los almacenamos en variables.*/
$id_usuario = $_SESSION['id_usuario'];
$db = new MySQL();
if ($id_usuario=='') {
	$id_usuario=0;
}
$valor = $_POST['valor'];
$producto = $_POST['producto'];

$query = "SELECT * FROM `valoracion` WHERE `id_usuario` = $id_usuario";
echo $query;
$consulta = $db->consulta($query);
if($db->num_rows($consulta)>0){
	$resultados = $db->fetch_array($consulta);
	$id_valoracion=$resultados['id_valoracion'];
	$query = "UPDATE `valoracion` SET `puntos` = $valor WHERE `valoracion`.`id_valoracion` = $id_valoracion;";
}else{
	$query = "INSERT INTO `valoracion` (`id_valoracion`, `id_producto`, `puntos`, `id_usuario`) VALUES (NULL, '$producto', '$valor', $id_usuario);";
}
echo $query;

$consulta = $db->consulta($query);

$query = "SELECT * FROM `valoracion` WHERE `id_producto` = $producto";

echo $query;

$consulta = $db->consulta($query);
if($db->num_rows($consulta)>0){
	$total = 0;
	while($resultados = $db->fetch_array($consulta)){
		$total = $total + $resultados['puntos'];
	}
	$valoracion = $total/$db->num_rows($consulta);
}
echo $valoracion;
echo $query;

$query = "UPDATE `producto` SET `valoracion` = $valoracion WHERE `producto`.`id_producto` = $producto;";
$consulta = $db->consulta($query);
?>