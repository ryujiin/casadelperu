<?php
$get_sort = $_GET['sortby'];
if ($id_categoria=='') {
    $query = "SELECT * FROM producto";
}else{
    $query = "SELECT * FROM producto WHERE id_categoria = $id_categoria";    
}
if ($get_sort!='') {
    if ($get_sort=='popular') {
        $query = $query." ORDER BY `valoracion` DESC";
    }elseif ($get_sort=='novedad') {
        $query = $query." ORDER BY `valoracion` DESC";
    }elseif ($get_sort=='mayor') {
        $query = $query." ORDER BY `precio` DESC";        
    }elseif ($get_sort=='menor') {
        $query = $query." ORDER BY `precio` ASC";  
    }
}
$consulta = $db->consulta($query);
$productos = '';
if($db->num_rows($consulta)>0){
    while($resultados = $db->fetch_array($consulta)){
        $productos = $productos.'<article class="producto col-md-3">
                            <a href="/?producto='.$resultados['id_producto'].'">
                            <figure>
                                <img src="'.$resultados['imagen'].'" alt="">
                            </figure>
                            <div class="datos-producto">
                                <p class="nombre">'.$resultados['nombre'].'</p>
                                <strong>valoracion</strong>'.$resultados['valoracion'].'
                                <div class="precio">
                                    <span class="old-precio">S/. '.$resultados['precio'].'.00</span>                                    
                                </div>
                            </div>
                            </a>
                            <button type="button" class="btn btn-success add_to_cart_catalogo" data-producto="'.$resultados['id_producto'].'" data-total="'.$resultados['precio'].'">
                                <span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>Agregar al carro
                            </button>
                        </article>';
    }
    $num_productos = $db->num_rows($consulta);
}
$sortby = array('Predeterminano' => 0,'Por Popularidad'=>'popular','Por Novedad' =>'novedad','Por precio : Mayor a menor'=>'mayor','Por precio : Menor a mayor' =>'menor' );
foreach ($sortby as $k => $v){
    if ($get_sort!='') {
        if ($get_sort==$v) {
            $lista_sort = $lista_sort.'<option value="'.$v.'" selected>'.$k.'</option>';            
        }else{
            $lista_sort = $lista_sort.'<option value="'.$v.'">'.$k.'</option>'; 
        }
    }else{
        $lista_sort = $lista_sort.'<option value="'.$v.'">'.$k.'</option>';        
    }

}
?>
            <section id="catalogo" class="contenedor">
                <div class="titulo">
                    <h2>Catalogo <small><?php echo $categoria ?></small></h2>
                </div>
                <div class="filtro">
                    <span><?php echo $num_productos ?> resultados</span>
                    <form action="" id="form_sortby">
                        <input type="hidden" name="categoria" value="<?php echo $categoria ?>">
                        <select name="sortby" id="sortby">
                            <?php echo $lista_sort; ?>
                        </select>
                    </form>
                </div>
                <div class="productos container-fluid">
                    <div class="row">
                        <?php
                        echo $productos;
                        ?>
                    </div>
                </div>
            </section>

