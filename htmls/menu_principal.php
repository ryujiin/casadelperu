<?php

$query = "SELECT * FROM categoria";
$consulta = $db->consulta($query);
if ($categoria!='') {
	$cates = '<li><a href="/casa/">Inicio</a></li>';
}else{
	$cates = '<li><a class="activo" href="/">Inicio</a></li>';
}
if($db->num_rows($consulta)>0){
	while($resultados = $db->fetch_array($consulta)){
		if ($categoria == $resultados['slug']) {
			$cates.='<li><a class="activo" href="/casa/?categoria='.$resultados['slug'].'">'.$resultados['nombre_cate'].'</a></li>';
			$id_categoria = $resultados['id_categoria'];
		}else{
			$cates.='<li><a href="/casa/?categoria='.$resultados['slug'].'">'.$resultados['nombre_cate'].'</a></li>';
		}
	}
}
?>
<ul>
	<?php echo $cates; ?>
</ul>