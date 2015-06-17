<?php
include('../../mysql.php');
$db = new MySQL();
session_start();
$carro = $_GET["carro"];

$consulta = $db->consulta("DELETE FROM carro WHERE carro.id_carro = '$carro';");

header("Location: /admin/?page=carros");

?>