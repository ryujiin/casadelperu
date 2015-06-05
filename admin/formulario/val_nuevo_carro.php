<?php
include('../../mysql.php');
$db = new MySQL();
session_start();
$usuario = $_POST["usuario"];
$estado = $_POST["estado"];
$creado = date("Y-m-d H:i:s");

$consulta = $db->consulta("INSERT INTO `carro` (`id_carro`, `id_cliente`, `estado`, `creado`) VALUES (NULL, $usuario, '$estado', '$creado');");
header("Location: ../index.php?page=carros");

?>