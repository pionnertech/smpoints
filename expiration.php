<?php


$value = $_GET['value'];
$fac = $_GET['fac'];

$datos = mysqli_connect('mysql.nixiweb.com', "u440137862_eqr", "PlEyAdEs", "u440137862_qr");

if(!mysqli_query($datos, "UPDATE RULES SET RULE_EXP_PROMO = " . $value . " WHERE RULE_FAC_CODE = " . $fac)){
	echo 0 ;
} else {

	echo 1;
}


?>