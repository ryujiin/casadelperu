<?php
include('../mysql.php');
session_start();
/*caturamos nuestros datos que fueron enviados desde el formulario mediante el metodo POST
**y los almacenamos en variables.*/
$db = new MySQL();

$usuario = $_POST["admin"];   
$password = $_POST["pass"];

//Consultamos los datos en Mysql
echo "daok";
$consulta = $db->consulta("SELECT * FROM usuarios WHERE correo = '$usuario' AND admin = 1");
	if($db->num_rows($consulta)>0){
		echo "string";
		$resultados = $db->fetch_array($consulta);
		if ($resultados['password']==$password) {
			echo "estoy logueado";
			$_SESSION['admin'] = True;
			$_SESSION['usuario'] = $usuario;
			$_SESSION['id_usuario'] = $resultados['id_usuario'];
			$_SESSION['login'] = True;

		}else{
			echo "no estoy login";
		}
	}else{
		echo "owfpwfop";
	}
	header("Location: index.php");
?>