<?php

$name = $_GET['name'];
$surname = $_GET['Surname'];
$fac = $_GET['fac'];
$date = $_GET['date'];
$au = $_GET['aux_user'];
$ap = $_GET['aux_pass'];


 $datos = mysqli_connect('mysql.nixiweb.com', "u440137862_eqr", "PlEyAdEs", "u440137862_qr");

$check = mysqli_query($datos, "SELECT PER_ID FROM PERSONAL WHERE (PER_NAME = '" . $name . "' AND PER_SURNAME = '" . $surname . "' AND PER_FAC_CODE = " . $fac . " )");
if(mysqli_num_rows($check) !== 0){
echo "2";
exit;
}

 if (!mysqli_query($datos, "INSERT INTO PERSONAL (PER_NAME, PER_SURNAME, PER_FAC_CODE) VALUES ('" . $name . "', '" . $surname . "', " . $fac . ")")){

    echo "no se pudo ingresar";


} else {
      
      if($au !== "" && $ap !== ""){

         mysqli_query($datos, "UPDATE FAC SET FAC_AUX_USER = '" . $au . "' WHERE FAC_CODE = ". $fac . ";" );
         mysqli_query($datos, "UPDATE FAC SET FAC_AUX_PASS = '" . $ap . "' WHERE FAC_CODE = ". $fac . ";" );

      $outcome = mysqli_fetch_assoc(mysqli_query($datos, "SELECT PER_ID FROM PERSONAL WHERE PER_FAC_CODE = " . $fac . " ORDER BY PER_ID DESC LIMIT 0, 1"));
      mysqli_query($datos, "UPDATE PERSONAL SET PER_AUX_USER = 1 WHERE PER_ID = " . $outcome['PER_ID']);
      //mysqli_query($datos, "INSERT INTO TRAFFIC (TRF_USR_QR, TRF_DATE, TRF_FAC_CODE, TRF_BA_SCORE_WL, TRF_PROMO, TRF_GAR, TRF_TICKET, TRF_TOTAL_ASSETS, TRF_PRO_STATE, TRF_TABLE) VALUES('tE0SSTtERR00983', '" . $date . "', " . $fac . ", 0, NULL, " . $outcome['PER_ID'] . ", NULL, 0, NULL, NULL);");

      echo $outcome['PER_ID'];

      } else {
          
      $outcome = mysqli_fetch_assoc(mysqli_query($datos, "SELECT PER_ID FROM PERSONAL WHERE PER_FAC_CODE = " . $fac . " ORDER BY PER_ID DESC LIMIT 0, 1"));
      echo $outcome['PER_ID'];
      }
}

mysqli_close($datos);



?>