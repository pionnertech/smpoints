<?php


$value = $_GET['value'];
$fac = $_GET['fac'];

$datos = mysqli_connect('localhost', "root", "k47tBZp60D", "SM_usr10000");

if(!mysqli_query($datos, "UPDATE RULES SET RULE_EXP_PROMO = " . $value . " WHERE RULE_FAC_CODE = " . $fac)){
	echo 0 ;
} else {

	echo 1;
}


?>