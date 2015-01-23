<?php session_start();

if (!isset($_SESSION['TxtCode'])) {

echo "<script>window.location = 'system.php'</script>";

} else {
 
$datos = mysqli_connect('localhost', "root", "k47tBZp60D", "SM_usr10000");
$query_personal = mysqli_query($datos, "SELECT * FROM PERSONAL WHERE ((PER_PASS = '' OR PER_PASS IS NULL) AND PER_FAC_CODE = " . $_SESSION["TxtCode"] . ");");

if(mysqli_num_rows($query_personal) === 0){

    echo "<script>window.location = 'system.php'</script>";
}

?>

<!DOCTYPE html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=320; user-scalable=no; initial-scale=1.0; maximum-scale=1.0" />
    <title>Pattern Lock</title>
    <link rel="stylesheet" type="text/css" href="css/sweet-alert.css"/>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="css/patternlock.css"/>
    <script src="js/patternlock.js"></script>
<style>
    body{
        text-align:center;
        font-family:Arial, Helvetica, sans-serif;
    }
    .names {
outline: none;
border: 1px solid #3BB54C;
padding: 1em 1.5em;
color: #FFF;
background-color: #3BB54C;
font-style: italic;
font-weight: 600;
border-radius: 15px;
margin: 1em;
cursor: pointer;
display: inline-block !important;
    }
#back{
    position:relative;
    float:left;
    cursor:pointer;
}
</style>
</head>

<body>
<button id="back" onclick="document.referrer"><i class="fa fa-home fa-4x" onclick="window.location = 'system.php'"></i></button>
    <form method="post" onsubmit="" >
        <h2>Establece tu contraseña</h2>
        <h4>Dibuja un patr&oacute;n de logeo, con velocidad moderada, y luego presiona el espacio con tu nombre</h4>
        <div>
            <input type="password" id="password" name="password" class="patternlock" />
            <? while ($fila = mysqli_fetch_row($query_personal)) {?>
            <input type="button" id="<? printf($fila[5])?>" name="<? printf($fila[1])?>" value="<? printf($fila[1])?> <? printf($fila[5]) ?>" class="names" onclick="submitform(this.name, this.id)" >
            <? } ?>
        </div>
    </form>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="js/sweet-alert.min.js"></script> 
</body>
</html>
    <script>

    var fac = <? printf($_SESSION['TxtCode']) ?>

function submitform(value, argument){
               
        if($("#password").val().length < 5){

             swal("Registra un patrón de seguridad mayor a 5 puntos!", "", "warning");

             } else {

             $.ajax({ type: "POST", url: "password_wtf.php?name=" + value + "&password=" + $("#password").val() + "&fac=" + fac + "&surname=" + argument,
                success : function(data){
             if(parseInt(data) !== 0 ){

                $(this).css({display: "none"});
                swal("patron ingresado!", "" , "success");
                setTimeout(function(){
                    window.location.reload(true);
                }, 2700);

           }   else {
               
                 swal("Password ya inscrito", "Empieza desde un punto diferente ó diseña un patrón distinto", "warning");
                
            }

           }
        });
    }
}



    </script>
<? } ?>