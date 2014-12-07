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

$datos = mysqli_connect('localhost', "root", "D1sjjDlvD0", "SM_usr10000");

//check if QR exist in Database

$validation_response = mysqli_num_rows(mysqli_query($datos, "SELECT QR_ID FROM QR WHERE QR_VAL= '"  . $codigo . "'"));

if($validation_response === 0){
	echo "404";
   exit;
} 


// ================================

$boolean = dd($datos, $codigo, $fac, $current_date);

if(mysqli_num_rows(mysqli_query($datos, "SELECT STR_USR_BA_SCORE FROM STORAGE WHERE (STR_USR_QR= '" . $codigo . "' AND STR_FAC_CODE = " . $fac .")")) === 0){
	$current_result = 0;
} else {
	$current = mysqli_fetch_assoc(mysqli_query($datos, "SELECT STR_USR_BA_SCORE FROM STORAGE WHERE (STR_USR_QR= '" . $codigo . "' AND STR_FAC_CODE = " . $fac .")"));
	$current_result = $current['STR_USR_BA_SCORE'];
}

//Queries
$query_base = "SELECT STR_FAC_CODE FROM STORAGE WHERE STR_USR_QR = '" . $codigo . "'";

$query_Sum_Points = "UPDATE STORAGE SET STR_USR_BA_SCORE = " . ($current_result + 1) . " WHERE STR_USR_QR= '". $codigo . "'";
$query_trafico_sum = "INSERT INTO TRAFFIC (TRF_USR_QR, TRF_DATE, TRF_FAC_CODE, TRF_BA_SCORE_WL) VALUES('" . $codigo . "' , " . $date . ", " . $fac . ", 1);";
//$query_trafico_not = "INSERT INTO TRAFFIC (TRF_USR_QR, TRF_DATE, TRF_FAC_CODE) VALUES('" . $codigo . "' , " . $date . ", " . $fac . ");";
$query_positivo = "SELECT A.USR_NAME AS NAME, B.STR_USR_BA_SCORE AS PUNTOS FROM USER A INNER JOIN STORAGE B ON(A.USR_QR = B.STR_USR_QR) WHERE (B.STR_FAC_CODE = " . $fac  . " AND A.USR_QR ='" . $codigo . "');";
$query_first_time = "INSERT INTO STORAGE (STR_USR_QR, STR_USR_BA_SCORE, STR_FAC_CODE) VALUES ('" . $codigo ."', 1 ," . $fac .")";

$foregein = mysqli_num_rows(mysqli_query($datos, $query_base));


switch (true) {
	case ($foregein === 0 ):
        echo 0;
		break;
	case ($foregein > 0 ):

      $array =  mysqli_fetch_array(mysqli_query($datos, $query_base));

		if(in_array($fac, $array)){

                     if ($boolean === true){

                        //mysqli_query($datos, $query_Sum_Points);
                       // mysqli_query($datos, $query_trafico_sum);

                        $OA = mysqli_fetch_assoc(mysqli_query($datos, $query_positivo));
  
                        echo $OA['NAME'] . "," . $OA['PUNTOS'] . "," . $boolean;

                            }  else {

                        $OA = mysqli_fetch_assoc(mysqli_query($datos, $query_positivo));
  
                        echo $OA['NAME'] . "," . $OA['PUNTOS'] . "," . $boolean;

                           }
		}  else  {
			
            mysqli_query($datos, $query_first_time);
            mysqli_query($datos, $query_trafico_sum);

            $OB = mysqli_fetch_assoc(mysqli_query($datos, $query_positivo));

            echo $OB['NAME'] . "," . $OB['PUNTOS'] . "," . $boolean;


		}

		break;

	    default:
		echo "default";
		break;
}



function dd($datos, $codigo_2, $fac_2, $current_2){

$q_fechas = mysqli_query($datos, "SELECT TRF_DATE FROM TRAFFIC WHERE (TRF_USR_QR ='" . $codigo_2 . "' AND TRF_FAC_CODE = " . $fac_2 .") ORDER BY TRF_DATE DESC LIMIT 0, 1 ");

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