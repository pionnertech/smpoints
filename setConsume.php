<?php


$codigo = $_GET['codigo'];
$ba_value = $_GET['ba_value'];
$promo_code = $_GET['promo_code'];
$fac_code = $_GET['fac_code'];
$Gar = $_GET['gar'];
$ticket = $_GET['ticket'];
$ta = $_GET['ta'];
$fecha = $_GET['fech'];
$table = $_GET['tabla'];

$datos = mysqli_connect('localhost', "root", "D1sjjDlvD0", "SM_usr10000");

if (!mysqli_query($datos, "SELECT STR_USR_QR , STR_USR_BA_SCORE, STR_FAC_CODE FROM STORAGE WHERE (STR_USR_QR ='" . $codigo . "'  AND STR_FAC_CODE = " . $fac_code .")")){

	mysqli_query($datos, "INSERT INTO STORAGE (STR_USR_QR , STR_USR_BA_SCORE, STR_FAC_CODE) VALUES ('" . $codigo . "', " . $ba_value . "," . $fac_code . ")");
                          
    echo "insertado";
    exit;

} else {

   $boolean = dd($datos, $codigo, $fac_code, $fecha);

   $resultado = mysqli_fetch_assoc(mysqli_query($datos, "SELECT STR_USR_BA_SCORE FROM STORAGE WHERE (STR_USR_QR = '" . $codigo . "' AND STR_FAC_CODE = " . $fac_code . ")"));

if ($boolean === true && $ticket != ""){

//por que no tiene que haber acumular punto?
     $varpoint1 = mysqli_fetch_assoc(mysqli_query($datos, "SELECT RULE_SCORE_VISITOR FROM RULES WHERE RULE_FAC_CODE = " . $fac_code . ";"));

     $puntaje = (int)$resultado['STR_USR_BA_SCORE'] + (int)($ba_value) + (int)$varpoint1['RULE_SCORE_VISITOR'];


} else {

   $puntaje = (int)$resultado['STR_USR_BA_SCORE'] + ($ba_value);
}

	mysqli_query($datos, "UPDATE STORAGE SET STR_USR_BA_SCORE = ". $puntaje . " WHERE (STR_USR_QR = '" . $codigo . "' AND STR_FAC_CODE = " . $fac_code . ")");
    
    $query_A = "INSERT INTO TRAFFIC (TRF_USR_QR, TRF_DATE, TRF_FAC_CODE, TRF_BA_SCORE_WL, TRF_PROMO, TRF_PRO_STATE, TRF_TABLE) VALUES ('" . $codigo . "' , '" . $fecha . "', " . $fac_code . ", " . $ba_value . " , '" . $promo_code . "', 0, " . $table . ")";
    $query_B = "INSERT INTO TRAFFIC (TRF_USR_QR, TRF_DATE, TRF_FAC_CODE, TRF_BA_SCORE_WL,TRF_GAR , TRF_TICKET, TRF_TOTAL_ASSETS) VALUES ('" . $codigo . "' , '" . $fecha . "',  " . $fac_code . ", " . $ba_value . ", " . $Gar . " , " . $ticket . " , " . $ta . ")";

if (!$promo_code || $promo_code === ''){

	mysqli_query($datos, $query_B);

} else {
	
	 mysqli_query($datos, $query_A);
}
   
 if($boolean === true){

    $varpoint = mysqli_fetch_assoc(mysqli_query($datos, "SELECT RULE_SCORE_VISITOR FROM RULES WHERE RULE_FAC_CODE = " . $fac_code . ";"));
    echo "+ " . $varpoint['RULE_SCORE_VISITOR'] . " punto(s) por tu visita";

 } else {
   echo " ";
 }


}

function dd($datos, $codigo_2, $fac_2, $current_2){

$q_fechas = mysqli_query($datos, "SELECT TRF_DATE FROM TRAFFIC WHERE (TRF_USR_QR ='" . $codigo_2 . "' AND TRF_FAC_CODE = " . $fac_2 ." ) ORDER BY TRF_DATE DESC LIMIT 0, 1 ");

if(mysqli_num_rows($q_fechas) === 0 ){

return true;

} else {

$fechas = mysqli_fetch_assoc($q_fechas);

$diference = strtotime($current_2) - strtotime($fechas['TRF_DATE']);

if($diference > 10800){

	return true;

} else {

	return false;
}

}

}

?>