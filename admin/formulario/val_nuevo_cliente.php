<?php
include('../../mysql.php');
$db = new MySQL();
session_start();
$correo = $_POST["correo"];
$pass1 = $_POST["password"];
$pass2 = $_POST["password2"];
$precio = $_POST["precio"];
$nombres = $_POST["nombres"];
$apellidos = $_POST["apellidos"];
$creado = date("Y-m-d H:i:s");

if ($pass1 == $pass2 && $pass1!='') {

	$consulta = $db->consulta("INSERT INTO `casadelperu`.`usuarios` (`id_usuario`, `correo`, `password`, `creado`, `admin`, `nombres`, `apellidos`) VALUES (NULL, '$correo', '$pass1', '$creado', '0', '$nombres', '$apellidos');");
	header("Location: ../index.php?page=cliente");
}else{
	echo 'el password no coincide';
}

?>