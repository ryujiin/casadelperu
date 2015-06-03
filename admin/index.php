<?php
include('../mysql.php');
$db = new MySQL();
session_start();
 echo 'chato cagon';
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
        <link rel="stylesheet" href="/casa/static/css/admin.css">
        <script src="/casa/static/js/vendor/modernizr-2.8.3.min.js"></script>
    </head>
    <body>
        <?php
        //Verificar si el administrador existe
        if ($_SESSION['admin']) {
            include('oficina.php');
        }else{
            //No estoy logueado
            include('login.php');
        }
        ?>
    </body>
</html>
<?php
mysql_close();
?>