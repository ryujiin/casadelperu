<?php
include('../mysql.php');
$db = new MySQL();
session_start();
$admin = $_SESSION['admin'];
$page = $_GET['page'];
$form = $_GET['form'];
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
        <link rel="stylesheet" href="/static/css/admin.css">
        <script src="/static/js/vendor/modernizr-2.8.3.min.js"></script>
    </head>
    <body>
        
        <?php
        //Verificar si el administrador existe
        if ($admin) {
            include('oficina.php');
        }else{
            //No estoy logueado
            include('login.php');
        }
        ?>
        <script src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>        
        <script src="/static/js/admin.js"></script>

    </body>
</html>
<?php
mysql_close();
?>