<?php
if ($form=='nuevo') {
	include('formulario/nuevo_carro.php');
}elseif ($form=='editar') {
	echo 'ada';
}else{
	include ('carros_lista.php');
}
?>