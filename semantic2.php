<?php

$codigo = $_GET['codigo'];
$nombre = $_GET['nombre']; 
$email = $_GET['email'];
$fac = $_GET['fac'];
$current_date = $_GET['date'];
$argument = $_GET['io'];

if (strlen($codigo) < 14){
 echo "2";
 exit;
};

//variables
$current_result = 0;

$datos = mysqli_connect('mysql.nixiweb.com', "u440137862_eqr", "PlEyAdEs", "u440137862_qr");

//check if QR exist in Database

$validation_response = mysqli_num_rows(mysqli_query($datos, "SELECT QR_ID FROM QR WHERE QR_VAL= '"  . $codigo . "'"));
if($validation_response === 0){
	echo "404";
   exit;
} 

// ================================

$boolean = dd($datos, $codigo, $fac, $current_date);




function dd($datos, $codigo_2, $fac_2, $current_2){

$q_fechas = mysqli_query($datos, "SELECT TRF_DATE FROM TRAFFIC WHERE (TRF_USR_QR ='" . $codigo_2 . "' AND TRF_FAC_CODE = " . $fac_2 .") ORDER BY TRF_DATE DESC LIMIT 0, 1 ");

if(mysqli_num_rows($q_fechas) === 0 ){
echo "no se encontro nada";
exit;
return true;

} else {

$fechas = mysqli_fetch_assoc($q_fechas);

$diference = strtotime($current_2) - strtotime($fechas['TRF_DATE']);


if($diference > 10800){

	echo "mayor";

} else {

	echo "menor";
}



}

}


?>