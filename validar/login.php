<?php
include('../mysql.php');
session_start();
/*caturamos nuestros datos que fueron enviados desde el formulario mediante el metodo POST
**y los almacenamos en variables.*/
$db = new MySQL();


$usuario = "";   
$password = "";
$usuario = $_POST["user"];   
$password = $_POST["pass"];

//Consultamos los datos en Mysql
$consulta = $db->consulta("SELECT * FROM usuarios WHERE correo = '$usuario' AND password = '$password'");
	if($db->num_rows($consulta)>0){
		echo "string";
		$resultados = $db->fetch_array($consulta);
		if ($resultados['password']==$password) {
			if ($resultados['admin']==1) {
				$_SESSION['admin'] = True;				
			}
			$_SESSION['usuario'] = $usuario;
			$_SESSION['id_usuario'] = $resultados['id_usuario'];
			$_SESSION['login'] = True;
			header("Location: /");
		}else{
			echo "no estoy login";
		}
	}else{
		echo "owfpwfop";
	}	
?>