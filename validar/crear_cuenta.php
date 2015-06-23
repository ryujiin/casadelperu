<?php
foreach($_POST AS $field => $value) {
	echo "field = $field, value = $value";
}
include('../mysql.php');
session_start();
/*caturamos nuestros datos que fueron enviados desde el formulario mediante el metodo POST
**y los almacenamos en variables.*/
$db = new MySQL();

$correo = $_POST['correo'];
$pass1 = $_POST['pass1'];
$pass2 = $_POST['pass2'];
$nombre = $_POST['nombre'];
$apellidos = $_POST['apellidos'];
$telefono = $_POST['telefono'];
$dia = $_POST['dia'];
$mes = $_POST['mes'];
$ano = $_POST['ano'];
$nacimiento = $ano.'-'.$mes.'-'.$dia;
$creado = date("Y-m-d H:i:s");
if ($pass1==$pass2) {
	$query = "INSERT INTO `usuarios` (`id_usuario`, `correo`, `password`, `creado`, `admin`, `nombres`, `apellidos`, `Nacimiento`, `Telefono`) VALUES 
										(NULL, '$correo', '$pass1', '$creado',0, '$nombre', '$apellidos', '$nacimiento', '$telefono');";

	$consulta = $db->consulta($query);

	$consulta = $db->consulta("SELECT * FROM usuarios WHERE correo = '$correo' AND password = '$pass1'");
	if($db->num_rows($consulta)>0){
		$resultados = $db->fetch_array($consulta);
		if ($resultados['password']==$pass1) {
			$_SESSION['usuario'] = $correo;
			$_SESSION['id_usuario'] = $resultados['id_usuario'];
			$_SESSION['login'] = True;
			header("Location: /");
		}else{
			echo "no estoy login";
		}
	}else{
		echo "owfpwfop";
	}	
}

?>