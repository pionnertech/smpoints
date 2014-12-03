<?php

$promoId = $_GET['promoId'];
$field = $_GET['field'];
$content = $_GET['content'];


$datos = mysqli_connect('mysql.nixiweb.com', "u440137862_eqr", "PlEyAdEs", "u440137862_qr");

switch (true) {

	case ($field === 1 || $field === '1'):
		if(!mysqli_query($datos, "UPDATE PRO SET PRO_DESCRIP = '" . $content . "' WHERE PRO_ID = " . $promoId)){
			 echo 0;
		} else {
			 echo 1;
		} ;
		break;
	
	case ($field === 2 || $field === '2'):
		if(!mysqli_query($datos, "UPDATE PRO SET PRO_CODE = " . $content . " WHERE PRO_ID =" . $promoId)){
			echo 0;
		} else {
			echo 1;
		}
		break;

	case ($field === 3 || $field === '3'):
		if(!mysqli_query($datos, "UPDATE PRO SET PRO_CANT_VAL =" . $content . " WHERE PRO_ID = " . $promoId)){
             echo 0;
		} else {
             echo 1;
		}
		break;
    
	case ($field === 4 || $field === '4'):
		if(!mysqli_query($datos, "DELETE FROM PRO WHERE PRO_ID =" . $promoId )){
             echo 0;
		} else {
             echo 1;
		}

		break;


}



?>