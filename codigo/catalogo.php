<?php
if ($id_categoria=='') {
    $query = "SELECT * FROM producto";
}else{
    $query = "SELECT * FROM producto WHERE id_categoria = $id_categoria";
}
$consulta = $db->consulta($query);
$productos = '';
if($db->num_rows($consulta)>0){
    while($resultados = $db->fetch_array($consulta)){
        $productos = $productos.'<article class="producto col-md-3">
                            <a href="/casa/?producto='.$resultados['id_producto'].'">
                            <figure>
                                <img src="'.$resultados['imagen'].'" alt="">
                            </figure>
                            <div class="datos-producto">
                                <p class="nombre">'.$resultados['nombre'].'</p>
                                <div class="precio">
                                    <span class="old-precio">S/. '.$resultados['precio'].'.00</span>
                                    
                                </div>
                            </div>
                            </a>
                        </article>';
    }
    $num_productos = $db->num_rows($consulta);
}
?>
            <section id="catalogo" class="contenedor">
                <div class="titulo">
                    <h2>Catalogo <small><?php echo $categoria ?></small></h2>
                </div>
                <div class="filtro">
                    <span><?php echo $num_productos ?> resultados</span>
                    <select name="sortby" id="sortby">
                        <option value="0">Predeterminado</option>
                        <option value="0">Por Popularidad</option>
                        <option value="0">Por Novedad</option>
                        <option value="0">Por precio : Mayor a menor</option>
                        <option value="0">Por precio : Menor a mayor</option>
                    </select>
                </div>
                <div class="productos container-fluid">
                    <div class="row">
                        <?php
                        echo $productos;
                        ?>
                    </div>
                </div>
            </section>
                        