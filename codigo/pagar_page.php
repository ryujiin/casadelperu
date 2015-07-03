<?php
$query = 'SELECT * FROM `ubdepartamento`';
$consulta = $db->consulta($query);
if($db->num_rows($consulta)>0){
	$depa='<option value="">Selecciona Departamento</option>';
    while($resultados = $db->fetch_array($consulta)){
    	$depa = $depa.'<option value="'.$resultados['idDepa'].'">'.$resultados['departamento'].'</option>';
    }
}

	$query="SELECT * FROM linea_pedido INNER JOIN producto ON linea_pedido.id_producto = producto.id_producto WHERE id_carro = $id_carro";
    $consulta = $db->consulta($query);
    if($db->num_rows($consulta)>0){
        while($resultados = $db->fetch_array($consulta)){
            $precio = number_format((float) $resultados[precio], 2, '.', '');
            $total = $precio * $resultados[cantidad];
            $total = number_format((float)$total, 2, '.', '');
            $total_carro_final = $total_carro_final + $total;
        }       
    }
    $subtotal_carro_final = $total_carro_final / 1.18;
    $igv = $subtotal_carro_final*18/100;
    $total_carro_final = number_format((float)$total_carro_final, 2, '.', '');
    $subtotal_carro_final = number_format((float)$subtotal_carro_final, 2, '.', '');
    $igv = number_format((float)$igv, 2, '.', '');
?>
<section id="main_pagar" class="contenedor">
	<div class="page-header">
		<h1 class="text-center">Pagar</h1>
	</div>

	<div class="col-md-8">
		<div id="paso_direcc">
			<h3>Direccion de Envio</h3>
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
				    <div class="col-sm-7">
				        <input type="text" class="form-control" name="direccion" id="direccion">
				    </div>
				   <div class="col-sm-3">
				        <input type="text" class="form-control" name="postal" id="postal" placeholder="Codigo Postal">
				   </div>			    
				</div>
				<div class="form-group">
				    <label for="inputEmail3" class="col-sm-2 control-label">Telefono</label>
				    <div class="col-sm-10">
				        <input type="text" class="form-control" name="telefono" id="telefono">
				    </div>
				</div>
				<div class="col-md-8"></div>
				<div class="col-md-4">
					<div class="product">
						<form action="/paypal/create.php" method="post">
							<input type="hidden" value="1" name="productid"/>
							<input type="hidden" value="Pago a Casa del Peru" name="itemname"/>
							<input type="hidden" value="<?php echo $total_carro_final; ?>" name="itemprice"/>
							<input type="hidden" value="0" name="shipping"/>
							<input type="hidden" value="0" name="tax"/>
							<input type="hidden" value="USD" name="currencycode"/>
							<input type="hidden" value="Buy Sony Alpha NEX-5TL" name="paypaldesc"/>
							<input type="hidden" value="1" name="quantity"/>

							</select>
							</span>
							<input class="submit btn btn-success" type="submit" value="Pagar con Paypal" name="subbutton"/>
						</form>
					</div>
				</div>				
	      	</div>
		</div>
	</div>
	<div class="col-md-4">
		
	</div>
</section>