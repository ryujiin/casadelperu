<?php
$table = '';
$total_carro_final=0;
$subtotal_carro_final=0;
if ($total_lineas!=0) {
    $query="SELECT * FROM linea_pedido INNER JOIN producto ON linea_pedido.id_producto = producto.id_producto WHERE id_carro = $id_carro";
    $consulta = $db->consulta($query);
    if($db->num_rows($consulta)>0){
        while($resultados = $db->fetch_array($consulta)){
            $precio = number_format((float) $resultados[precio], 2, '.', '');
            $total = $precio * $resultados[cantidad];
            $total = number_format((float)$total, 2, '.', '');
            $total_carro_final = $total_carro_final + $total;
            $table = $table.'<tr>
                    <td>
                        <figure>
                            <img src="'.$resultados[imagen].'" width="100">                            
                        </figure>
                    </td>
                    <td>
                        '.$resultados[nombre].'
                    </td>
                    <td>
                        S/. '.$precio.'
                    </td>
                    <td>
                        '.$resultados[cantidad].'
                    </td>
                    <td>
                        S/. '.$total.'
                    </td>
                    <td>
                        <button type="button" class="btn btn-default elimnar_producto" aria-label="Left Align" data-linea="'.$resultados[id_linea_pedido].'">
                            <span class="glyphicon glyphicon-trash"></span>Eliminar
                        </button>
                    </td>
                </tr>';
        }       
    }
    $subtotal_carro_final = $total_carro_final / 1.18;
    $igv = $subtotal_carro_final*18/100;
    $total_carro_final = number_format((float)$total_carro_final, 2, '.', '');
    $subtotal_carro_final = number_format((float)$subtotal_carro_final, 2, '.', '');
    $igv = number_format((float)$igv, 2, '.', '');

?>
<section id="carro" class="contenedor">
    <div class="page-header">
      <h1>Mi carrito de Compra</h1>
    </div>
    <div class="container-fluid">
        <div class="pull-right">
            <a class="btn btn-primary" href="/?page=pagar" role="button">Pagar</a>
        </div>
        <table class="table tabla_carro">
            <thead>
                <tr>
                    <th>Imagen</th>
                    <th>Nombre</th>
                    <th>Precio</th>                    
                    <th>Cantidad</th>
                    <th>Total</th>
                    <th>Acciones</th>
                    
                    
                </tr>
            </thead>
            <tbody>
                <?php
                    echo $table;
                ?>
            </tbody>
        </table>
        <table class="tabla_total table table-bordered pull-right">
            <thead>
                <tr>
                    <th>Item</th>
                    <th>valor</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Subtotal</td>
                    <td>S/. <?php echo $subtotal_carro_final; ?></td>
                </tr>
                <tr>
                    <td>I.G.V. 18%</td>
                    <td>S/. <?php echo $igv; ?></td>
                </tr>
                <tr>                    
                    <td>Costo de Envio</td>
                    <td><strong>Gratis!!</strong></td>
                </tr>
                <tr>
                    <td>
                        <h3>Tu total</h3>
                    </td>
                    <td><h3>S/.<?php echo $total_carro_final; ?></h3></td>
                </tr>

            </tbody>
        </table>
    </div>
</section>
<?php
}else{
?>
<section id="carro" class="contenedor">
    <div class="page-header">
      <h1 class="text-center">Mi carrito de Compra</h1>
    </div>
    <div class="container-fluid">
        <p class="text-center">Usted no tiene ariculos en su carrito</p>
    </div>
</section>
<?php
}
?>
