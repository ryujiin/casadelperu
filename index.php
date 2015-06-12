<?php
include('mysql.php');
$db = new MySQL();
session_start();
$producto = $_GET['producto'];
$login = $_SESSION['login'];
if ($login == True) {
    $user = 'Bienvenido '. $_SESSION['usuario'];
    $id_user = $_SESSION['id_usuario'];
}else{
    $user = '<a href="/casa/ingresar/">Ingresar/Registrarse</a>';
}
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

        <link rel="stylesheet" href="/casa/static/css/normalize.css">
        <link rel="stylesheet" href="/casa/static/css/bootstrap.min.css">
        <link rel="stylesheet" href="/casa/static/css/main.css">
        <link rel="stylesheet" href="/casa/static/css/style.css">
        <script src="/casa/static/js/vendor/modernizr-2.8.3.min.js"></script>
    </head>
    <body>
        <header class="container-fluid">
            <div class="contenedor row">
                <div class="logo col-md-7">
                    <h1 class="logo-main">
                        <a href="/casa/">
                            La Casa del Perú                                                       
                        </a>
                    </h1>
                    <p class="logo-subtitulo">
                        Artesanias Peruanas para todo el Mundo
                    </p>
                </div>
                <div class="menu-secundario col-md-5">
                    <nav class="menu menu-enlinea">
                        <ul>
                            <li><?php echo $user; ?></li>
                            <li><a href="">0 - items <span>S/. 0.00 </span></a></li>
                            <li><a href="">Checkout</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="menu-primario">
                <nav class="menu-main menu-enlinea">
                    <ul>
                        <li><a class="activo" href="/">Inicio</a></li>
                        <li><a href="/">Ceramico</a></li>
                        <li><a href="/">Textileria</a></li>
                        <li><a href="/">Orfereria</a></li>
                        <li><a href="/">EBANISTERIA</a></li>                        
                    </ul>
                </nav>
            </div>
        </header>
        <div class="main">
            <section id="carrusel-principal">
            </section>
            <?php
            if ($producto!='') {
                include('codigo/producto.php');
            }else{
                include('codigo/catalogo.php');
            }
            ?> 
        </div>
        <footer></footer>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.3.min.js"><\/script>')</script>
        <script src="/casa/static/js/plugins.js"></script>
        <script src="/casa/static/js/main.js"></script>
    </body>
</html>
