<?php 
/*
header('Content-Type: text/event-stream');
header('Cache-Control: no-cache');


$a = $_GET['pau'];

echo "cliente ingresado con la letra A + " . $a;

flush();
*/
 $a = $_GET['fac'];

header('Content-Type: text/event-stream');
header('Cache-Control: no-cache');

$datos = mysqli_connect('mysql.nixiweb.com', "u440137862_eqr", "PlEyAdEs", "u440137862_qr");

$manu = mysqli_fetch_row(mysqli_query($datos, "SELECT DISTINCT C.USR_NAME , A.PRO_DESCRIP, B.TRF_ID, B.TRF_DATE, B.TRF_TABLE FROM PRO A INNER JOIN TRAFFIC B ON(A.PRO_CODE = B.TRF_PROMO) INNER JOIN USER C ON(C.USR_QR = B.TRF_USR_QR) WHERE (B.TRF_FAC_CODE = " . $a . " AND B.TRF_PRO_STATE = 0) ORDER BY TRF_DATE DESC LIMIT 1"));

echo "data:" . $manu[0] . "\n";
echo "data:" . $manu[1] . "\n";
echo "data:" . $manu[2] . "\n";
echo "data:" . $manu[3] . "\n\n";

flush();



?>