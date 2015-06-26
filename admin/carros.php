<?php
if ($form=='nuevo') {
	include('formulario/nuevo_carro.php');
}elseif ($form=='editar') {
	echo 'ada';
}else{
	if ($_GET['carro']!='') {
		include('ver_carro.php');
	}else{
		include ('carros/carros_lista.php');
	}
}
?>