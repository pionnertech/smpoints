<?php

$fac = $_GET['fac'];
$code = $_GET['code'];
$score = $_GET['score'];
$descrip = $_GET['descrip'];
$date = $_GET['dateing'];

 $datos = mysqli_connect('localhost', "root", "D1sjjDlvD0", "SM_usr10000");

if(mysqli_num_rows(mysqli_query($datos, "SELECT PRO_CODE FROM PRO WHERE (PRO_CODE = '"  . $code . "' AND PRO_FAC = '" . $fac . "' );")) !== 0 ){

    mysqli_query($datos, "UPDATE PRO SET PRO_CANT_VAL = " . $score . " WHERE (PRO_CODE = '" . $code . "' AND PRO_FAC = '" . $fac ."');");
    mysqli_query($datos, "UPDATE PRO SET PRO_DATE = '" . $date . "' WHERE (PRO_CODE = '" . $code . "' AND PRO_FAC = '" . $fac . "')");
    mysqli_query($datos, "UPDATE PRO SET PRO_DESCRIP = '" . $descrip . "' WHERE PRO_CODE = '" . $code . "'");
   // mysqli_query($datos, "UPDATE")
    $oa = mysqli_fetch_assoc(mysqli_query($datos, "SELECT PRO_ID FROM PRO WHERE (PRO_FAC = '" . $fac . "' AND PRO_DATE = '" . $date . "');"));
    echo $oa['PRO_ID'];	

} else {

	if (!mysqli_query($datos, "INSERT INTO PRO (PRO_FAC, PRO_CANT_VAL, PRO_DATE , PRO_DESCRIP, PRO_CODE) VALUES ('" . $fac .  "', " . $score . " , '" . $date . "' , '" . $descrip . "', '" . $code . "');")) {

    die('Invalid query: ' . mysqli_error($datos));

} else {

    $oa2 = mysqli_fetch_assoc(mysqli_query($datos, "SELECT PRO_ID FROM PRO WHERE (PRO_FAC = '" . $fac . "' AND PRO_DATE = '" . $date . "');"));

    echo $oa2['PRO_ID'];	

}


}




?>



