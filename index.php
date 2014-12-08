<?php

session_start();
$situ = $_GET['t'];

if(isset($_SESSION['TxtUser'])){

echo "<script language='javascript'>window.location='system.php'</script>";

} else {

?>

<!DOCTYPE html>
<html lang="es" class="no-js">
    <head>
        <meta charset="utf-8">
        <title>Smile Points</title>
       
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <!-- CSS -->
        <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=PT+Sans:400,700'>
        <link rel="stylesheet" href="assets/css/reset.css">
        <link rel="stylesheet" href="assets/css/supersized.css">
        <link rel="stylesheet" href="assets/css/style.css">

        <style type="text/css">
        .error_shock{
            font-size: 1.1em;
            border-radius: 15px; 
            background-color: rgba(215, 40, 40, 0.4);
            margin-top:1.5em;
            padding: .5em .2em;
            color:#FFF;
            text-shadow: 0px 0px 5px rgba(214, 214, 214, 1);
        }
        </style>

        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
    </head>
    <body>
        <div class="page-container">
        <h1 style="margin-bottom: 1.5em;">eMenu QR-Recognition</h1>
         <h2>Fidelity Card</h2>
            <h2>Login</h2>
            <form action="convert.php" method="post">  
                <input type="text" name="U" class="username" placeholder="Usuario">
                <input type="password" name="P" class="password" placeholder="Password">
                <button type="submit">Ingresar</button>
                <? if($situ == 1){ ?>

              <div align="center" class="error_shock"><span><? echo "Credenciales invalidas, intenta nuevamente"; ?></span></div>

<?

}

?>
                
            </form>
             
        </div>
        <!-- Javascript -->
        <script src="assets/js/jquery-1.8.2.min.js"></script>
        <script src="assets/js/supersized.3.2.7.min.js"></script>
        <script src="assets/js/supersized-init.js"></script>
        <script src="assets/js/scripts.js"></script>
    </body>
</html>

<?

}

?>