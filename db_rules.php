<?php



$fac = $_GET['fac'];
$value = $_GET['value'];

$timeEx = $_GET['timeEx'];
$type = $_GET['type'];



$datos = mysqli_connect('mysql.nixiweb.com', "u440137862_eqr", "PlEyAdEs", "u440137862_qr");


if ($type === 'visita'){

$queryPre1 = "SELECT RULE_FAC_CODE FROM RULES WHERE RULE_FAC_CODE = " . $fac;
$result = mysqli_query($datos, $queryPre1);

 if (mysqli_num_rows($result) == 0 ){

    $queryA = "INSERT INTO RULES (RULE_SCORE_VISITOR)  VALUES( " . $value . ") WHERE RULE_FAC_CODE = " . $fac ;

    if (!mysqli_query($datos, $queryA)){

	echo "no se puede Establecer la conexion";

} else {

	echo "modificacion exitosa insert visita";
}

 } else {

 	$queryB = "UPDATE RULES SET RULE_SCORE_VISITOR = " . $value . " WHERE RULE_FAC_CODE = " . $fac ;
 	if (!mysqli_query($datos, $queryB)){

	echo "no se puede Establecer la conexion";

} else {

	echo "modificacion exitosa update visita";
}
 }


} else if($type === 'compra') {

$queryPre2 = "SELECT RULE_FAC_CODE FROM RULES WHERE RULE_FAC_CODE = " . $fac;
$result = mysqli_query($datos, $queryPre2);

 if (mysqli_num_rows($result) == 0 ){

     $queryC = "INSERT INTO RULES (RULE_FAC_CODE , RULE_CANT_SCORE ) VALUES (" . $fac . ", " . $value  . ")";

     if (!mysqli_query($datos, $queryC)){

	echo "no se puede Establecer la conexion";

} else {

	echo "modificacion exitosa insert compra";
}
  
   }  else {

 $queryD = "UPDATE RULES SET RULE_CANT_SCORE = " . $value . " WHERE RULE_FAC_CODE = " . $fac ;
 	  if (!mysqli_query($datos, $queryD)){

	echo "no se puede Establecer la conexion";

} else {

	echo "modificacion exitosa update compra";
}
 }

} else {

$prequery ="SELECT RULE_FAC_CODE FROM RULES WHERE RULE_FAC_CODE = " . $fac;
$result = mysqli_query($datos, $prequery);

 if (mysqli_num_rows($result) == 0){

  $queryE = "INSERT INTO RULES (RULE_FAC_CODE , RULE_EXP_PROMO ) VALUES (" . $fac . ", " . $timeEx ." )";
  if (!mysqli_query($datos, $queryE)){

	echo "no se puede Establecer la conexion";

} else {

	echo "modificacion exitosa inser time ";
}

 } else {

$queryF = "UPDATE RULES SET RULE_EXP_PROMO = " . $timeEx . " WHERE RULE_FAC_CODE = " . $fac ;

if (!mysqli_query($datos, $queryF)){

	echo "no se puede Establecer la conexion ";

} else {

	echo "modificacion exitosa update time";
}

 }

}





mysqli_close($datos);





?>