<?php


$id = $_GET['id'];

$datos = mysqli_connect('mysql.nixiweb.com', "u440137862_eqr", "PlEyAdEs", "u440137862_qr");

mysqli_query($datos, "UPDATE TRAFFIC SET TRF_PRO_STATE = 1 WHERE TRF_ID = " . $id);

echo "1";


?>