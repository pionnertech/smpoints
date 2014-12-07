<?php

$fac = $_GET['fac'];
$ticketNumber = $_GET['ticket'];

$datos = mysqli_connect('localhost', "root", "D1sjjDlvD0", "SM_usr10000");

$consulta = mysqli_query($datos, "SELECT TRF_ID FROM TRAFFIC WHERE (TRF_TICKET = "  . $ticketNumber . " AND TRF_FAC_CODE = " . $fac . ");");

if(mysqli_num_rows($consulta) === 0){

  echo "1";

} else {

   echo "0";
}




?>