<?php
include('../../mysql.php');
$db = new MySQL();
session_start();
$id_usuario = $_POST['id_usuario'];
$correo = $_POST['correo'];
$nombres = $_POST['nombres'];
$apellidos = $_POST['apellidos'];
if ($_POST['admin']==True) {
	$admin = 1;
}else{
	$admin = 0;
}
$query ="UPDATE `usuarios` SET `correo` = '$correo', `admin` = '$admin', `nombres` = '$nombres', `apellidos` = '$apellidos' WHERE `usuarios`.`id_usuario` = $id_usuario;";
$consulta = $db->consulta($query);
header('Location: /admin/?page=cliente');
?>