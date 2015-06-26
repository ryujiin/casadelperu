<?php
include('../../mysql.php');
$db = new MySQL();
session_start();
$id = $_POST['id_producto'];
$nombre = $_POST["nombre"];
$descripcion = $_POST["descripcion"];
$precio = $_POST["precio"];
$categoria = $_POST["categoria"];
$stock = $_POST["stock"];
$actualizado = date("Y-m-d H:i:s");

if ($_FILES["imagen_producto"]) {
	if ($_FILES["imagen_producto"]["error"] > 0){
		echo "ha ocurrido un error al subir imagen";
	} else {
		//ahora vamos a verificar si el tipo de archivo es un tipo de imagen permitido.
		$permitidos = array("image/jpg", "image/jpeg", "image/gif", "image/png");

		if (in_array($_FILES['imagen_producto']['type'], $permitidos)){
			//esta es la ruta donde copiaremos la imagen
			$search = array('Á', 'É', 'Í', 'Ó', 'Ú', 'á', 'é', 'í', 'ó', 'ú', 'Ü', 'ü', 'Ñ', 'ñ');
			$replace = array('a', 'e', 'i', 'o', 'u', 'a', 'e', 'i', 'o', 'u', 'u', 'u', 'n', 'n');
			
			$nombre_img = str_replace($search, $replace, strtolower($_FILES['imagen_producto']['name']));

			$ruta = "imagenes/" . $nombre_img;
			//comprovamos si este archivo existe para no volverlo a copiar.
			//pero si quieren pueden obviar esto si no es necesario.
			//o pueden darle otro nombre para que no sobreescriba el actual.
			if (!file_exists($ruta)){
				//aqui movemos el archivo desde la ruta temporal a nuestra ruta
				//usamos la variable $resultado para almacenar el resultado del proceso de mover el archivo
				//almacenara true o false
				$resultado = @move_uploaded_file($_FILES["imagen_producto"]["tmp_name"], $ruta);
				if ($resultado){
					//cambiar ruta segun sea necesario
					$ruta_absoluta = '/casa/admin/formulario/'.$ruta;

					$consulta = $db->consulta("INSERT INTO producto (id_producto, nombre, precio, descripcion, id_categoria, imagen,stock) 
														VALUES (NULL, '$nombre', $precio, '$descripcion', $categoria, '$ruta_absoluta',$stock)");
					
					header("Location: ../index.php");
				} else {
					echo "ocurrio un error al mover el archivo.";
				}
			} else {
				echo $_FILES['imagen_producto']['name'] . ", este archivo existe";
			}
		}
		else {
			echo "archivo no permitido, es tipo de archivo prohibido";
		}
	}
}else{
	$consulta = $db->consulta("UPDATE producto SET nombre = '$nombre', precio = $precio, descripcion = '$descripcion', id_categoria = $categoria, stock = '$stock', actualizado = '$actualizado' WHERE id_producto = $id");
	header("Location: /admin/?page=catalogo");
}
?>