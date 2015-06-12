<?php
$query = "SELECT * FROM producto";
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
}
?>
            <section id="catalogo" class="contenedor">
                <div class="titulo">
                    <h2>Catalogo</h2>
                </div>
                <div class="filtro">
                    <span>1 - 12  de 24 resultados</span>
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
                        