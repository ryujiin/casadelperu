<?php
include('../../mysql.php');
$db = new MySQL();
session_start();
$cliente = $_GET["cliente"];


$consulta = $db->consulta("DELETE FROM usuarios WHERE usuarios.id_usuario = '$cliente';");

header("Location: /admin/?page=cliente");

?>