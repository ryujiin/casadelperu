<?php
$table = '';
if ($total_lineas!=0) {
    $query="SELECT * FROM linea_pedido INNER JOIN producto ON linea_pedido.id_producto = producto.id_producto WHERE id_carro = $id_carro";
    $consulta = $db->consulta($query);
    if($db->num_rows($consulta)>0){
        while($resultados = $db->fetch_array($consulta)){
            $precio = number_format((float) $resultados[precio], 2, '.', '');
            $total = $precio * $resultados[cantidad];
            $total = number_format((float)$total, 2, '.', '');
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
                </tr>';
        }       
    }
?>
<section id="carro" class="contenedor">
    <div class="page-header">
      <h1>Mi carrito de Compra</h1>
    </div>
    <div class="container-fluid">
        <div class="pull-right">
            <button class="btn btn-primary">Pagar</button>
        </div>
        <table class="table tabla_carro">
            <thead>
                <tr>
                    <th>Imagen</th>
                    <th>Nombre</th>
                    <th>Precio</th>                    
                    <th>Cantidad</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    echo $table;
                ?>
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
