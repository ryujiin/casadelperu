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
		# code...
	}
}
?>