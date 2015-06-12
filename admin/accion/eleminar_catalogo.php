<?php
include('../../mysql.php');
$db = new MySQL();
session_start();
$producto = $_GET["producto"];

$consulta = $db->consulta("DELETE FROM producto WHERE producto.id_producto = '$producto';");

header("Location: ../index.php?page=catalogo");

?>