<?php
include('../mysql.php');
session_start();
$db = new MySQL();


$id_linea = $_POST['id_linea'];

$query = "DELETE FROM `linea_pedido` WHERE `linea_pedido`.`id_linea_pedido` = $id_linea";
$consulta = $db->consulta($query);

?>