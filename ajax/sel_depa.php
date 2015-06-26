<?php
include('../mysql.php');
session_start();
$db = new MySQL();


$id_depa = $_POST['depa'];
if ($id_depa=='') {
	$id_depa=1;
}

$query = "SELECT * FROM `ubprovincia` WHERE `idDepa` = $id_depa";
$consulta = $db->consulta($query);
$opcion='<option value="">Selecciona Provincia</option>';
if($db->num_rows($consulta)>0){
	while($resultados = $db->fetch_array($consulta)){
		$opcion = $opcion.'<option value="'.$resultados['idProv'].'">'.$resultados['provincia'].'</option>';
	}
};
echo $opcion;
?>