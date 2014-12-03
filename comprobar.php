<?php
$codigo = $_GET['codigo'];
$nombre = $_GET['nombre']; 
$email = $_GET['email'];
$fac = $_GET['fac'];
$current = $_GET['current']

$datos = mysqli_connect('mysql.nixiweb.com', "u440137862_eqr", "PlEyAdEs", "u440137862_qr");

echo diference_hours($datos, $codigo, $fac);


function diference_hours($datos, $codigo_2, $fac_2){

$q_fechas = mysqli_query($datos, "SELECT TRF_DATE FROM TRAFFIC WHERE (TRF_USR_QR ='" . $codigo_2 . "' AND TRF_FAC_CODE =" . $fac_2 .") ORDER BY TRF_DATE DESC LIMIT 0, 1 ");

if(!$q_fechas){

return true;

} else {

$fechas = mysqli_fetch_assoc($q_fechas);
$diference = strtotime($current) - strtoTime($fechas);

if($diference > 7200){
	return true;
} else {
	return false;
}



}

}








?>