<?php
if ($total_lineas==0) {
	header('Location: /?page=carro');
}else{
	include ('pagar_page.php');
}
?>