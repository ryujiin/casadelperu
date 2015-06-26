<?php
$query = 'SELECT * FROM `ubdepartamento`';
$consulta = $db->consulta($query);
if($db->num_rows($consulta)>0){
	$depa='<option value="">Selecciona Departamento</option>';
    while($resultados = $db->fetch_array($consulta)){
    	$depa = $depa.'<option value="'.$resultados['idDepa'].'">'.$resultados['departamento'].'</option>';
    }
}
?>
<section id="main_pagar" class="contenedor">
	<div class="page-header">
		<h1 class="text-center">Pagar</h1>
	</div>

	<div class="col-md-8">
		<div id="paso_direcc">
			<h3>1.- Direccion de Envio</h3>
			<div class="form-horizontal">
	      		<div class="form-group">
				    <label for="inputEmail3" class="col-sm-2 control-label">Departamento</label>
				    <div class="col-sm-10">
				        <select name="departamento" id="departamento" class="form-control">
			      			<?php echo $depa; ?>
			      		</select>
				    </div>
				</div>
				<div class="form-group">
				    <label for="inputEmail3" class="col-sm-2 control-label">Provincia</label>
				    <div class="col-sm-10">
				        <select name="provincia" id="provincia" class="form-control">
			      			<option value="">Selecciona</option>
			      		</select>
				    </div>
				</div>
				<div class="form-group">
				    <label for="inputEmail3" class="col-sm-2 control-label">Distrito</label>
				    <div class="col-sm-10">
				        <select name="distrito" id="distrito" class="form-control">
			      			<option value="">Selecciona</option>
			      		</select>
				    </div>
				</div>
				<div class="form-group">
				    <label for="inputEmail3" class="col-sm-2 control-label">Direccion</label>
				    <div class="col-sm-8">
				        <input type="text" class="form-control" name="direccion" id="direccion">
				    </div>
				   <div class="col-sm-2">
				        <input type="text" class="form-control" name="postal" id="postal" placeholder="Codigo Postal">
				   </div>			    
				</div>
				<div class="form-group">
				    <label for="inputEmail3" class="col-sm-2 control-label">Telefono</label>
				    <div class="col-sm-10">
				        <input type="text" class="form-control" name="telefono" id="telefono">
				    </div>
				</div>
	      	</div>
		</div>
		<div id="paso_metod_pago">
			<h3>2.- Metedo de Pago</h3>
		</div>
	</div>
	<div class="col-md-4"></div>
</section>