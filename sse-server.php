<?php 
$a = $_GET['fac'];

header('Content-Type: text/event-stream');
header('Cache-Control: no-cache');

$datos = mysqli_connect('localhost', "root", "D1sjjDlvD0", "SM_usr10000");

$manu = mysqli_fetch_row(mysqli_query($datos, "SELECT DISTINCT C.USR_NAME , A.PRO_DESCRIP, B.TRF_ID, B.TRF_DATE, B.TRF_TABLE FROM PRO A INNER JOIN TRAFFIC B ON(A.PRO_CODE = B.TRF_PROMO) INNER JOIN USER C ON(C.USR_QR = B.TRF_USR_QR) WHERE (B.TRF_FAC_CODE = " . $a . " AND B.TRF_PRO_STATE = 0) ORDER BY TRF_DATE DESC LIMIT 1"));

echo "data:" . $manu[0] . "\n";
echo "data:" . $manu[1] . "\n";
echo "data:" . $manu[2] . "\n";
echo "data:" . $manu[3] . "\n\n";

ob_end_flush();
flush();


?>