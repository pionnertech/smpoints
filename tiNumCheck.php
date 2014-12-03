<?php

$fac = $_GET['fac'];
$ticketNumber = $_GET['ticket'];

$datos = mysqli_connect('mysql.nixiweb.com', "u440137862_eqr", "PlEyAdEs", "u440137862_qr");

$consulta = mysqli_query($datos, "SELECT TRF_ID FROM TRAFFIC WHERE (TRF_TICKET = "  . $ticketNumber . " AND TRF_FAC_CODE = " . $fac . ");");

if(mysqli_num_rows($consulta) === 0){

  echo "1";

} else {

   echo "0";
}




?>