<?php
include('../../mysql.php');
$db = new MySQL();
session_start();
$usuario = $_POST["usuario"];
$estado = $_POST["estado"];
$creado = date("Y-m-d H:i:s");

$query = "INSERT INTO `carro` (`id_carro`, `id_usuario`, `estado`, `creado`) VALUES (NULL, $usuario, '$estado', '$creado');";
echo $query;
$consulta = $db->consulta($query);
header("Location: /admin/?page=carros");

?>