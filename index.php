<?php
include('mysql.php');
$db = new MySQL();
session_start();
$producto = $_GET['producto'];
$categoria = $_GET['categoria'];
$page = $_GET['page'];
$login = '';
$login = $_SESSION['login'];
//Averiguar usuario
if ($login == True) {
    $user = 'Bienvenido '. $_SESSION['usuario'];
    $id_user = $_SESSION['id_usuario'];
}else{
    $user = '<button type="button" class="login-boton" data-toggle="modal" data-target="#login_user">Ingresar/Registrarse</button>';
}
include('codigo/carrito.php');

?>
<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title></title>
        <meta name="description" content="La Casa del Peru">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <!-- Place favicon.ico in the root directory -->

        <link rel="stylesheet" href="/static/css/normalize.css">
        <link rel="stylesheet" href="/static/css/bootstrap.min.css">
        <link rel="stylesheet" href="/static/css/main.css">
        <link rel="stylesheet" href="/static/css/style.css">
        <script src="/static/js/vendor/modernizr-2.8.3.min.js"></script>
    </head>
    <body>
        <header class="container-fluid">
            <div class="contenedor row">
                <div class="logo col-md-6">
                    <h1 class="logo-main">
                        <a href="/">
                            La Casa del Perú                                                       
                        </a>
                    </h1>
                    <p class="logo-subtitulo">
                        Artesanias Peruanas para todo el Mundo
                    </p>
                </div>
                <div class="menu-secundario col-md-6">
                    <nav class="menu menu-enlinea">
                        <ul>
                            <li><?php echo $user; ?></li>
                            <li><a href="/?page=carro"><?php echo $total_lineas ?> - items <span>S/.<?php echo $total_carro ?></span></a></li>
                            <li><a href="/?page=pagar">Checkout</a></li>
                            <?php
                            if ($login==True) {
                            ?>
                            <li><a href="/logout.php">Salir</a></li>
                            <?php
                                if ($_SESSION['admin']==True) {
                                    ?>
                            <li><a href="/admin/"><span class="glyphicon glyphicon-share-alt"></span>IR ADMIN</a></li>
                                    <?php
                                }
                            }
                            ?>
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="menu-primario">
                <nav class="menu-main menu-enlinea">
                    <?php
                    include('htmls/menu_principal.php');
                    ?>
                </nav>
            </div>
        </header>
        <div class="main">
            <section id="carrusel-principal">
            </section>
            <?php
            if ($page=='') {
                if ($producto!='') {
                    include('codigo/producto.php');
                }else{
                    include('codigo/catalogo.php');
                }
            }elseif ($page=='crear_cuenta') {
                include('htmls/crear_cuenta.php');
            }else{
                if ($page=='carro') {
                    include ('codigo/carro.php');
                }elseif ($page=='pagar') {
                    include ('codigo/pagar.php');                    
                }
            };            
            ?> 
        </div>
        <?php

        if ($login!=True) {
            include('htmls/forms_login.php');            
        }
        echo $db->getTotalConsultas();
        ?>
        <footer></footer>
        <script src="/static/js/vendor/jquery.js"></script> 
        <script src="/static/js/vendor/bootstrap.min.js"></script>
        <script src="/static/js/plugins.js"></script>
        <script src="/static/js/main.js"></script>
    </body>
</html>
