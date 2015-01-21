<?php

$id = $_GET['fff'];
$fac = $_GET['fac'];
$issubaux = "";

$ids = explode("|", $id , -1);

$datos = mysqli_connect('localhost', "root", "k47tBZp60D", "SM_usr10000");

$outcome_pre = mysqli_query($datos, "SELECT FAC_AUX_USER FROM FAC WHERE FAC = " . $fac);

if(is_null($outcome_pre)){
 
 $outcome = "";

} else {

$outcome =  $outcome_pre['FAC_AUX_USER'] ;

}


 for($i= 0 ; $i < count($ids) ; $i++){

$nombre = mysqli_fetch_assoc(mysqli_query($datos, "SELECT PER_NAME WHERE PER_ID = " . $ids[$i]));

    if( $outcome === $nombre['PER_NAME']){

    	mysqli_query($datos, "UPDATE FAC SET FAC_AUX_USER = NULL WHERE FAC_CODE = " . $fac);
    	mysqli_query($datos, "UPDATE FAC SET FAC_AUX_PASS = NULL WHERE FAC_CODE = " . $fac);
    	mysqli_query($datos, "DELETE FROM PERSONAL WHERE PER_ID = " . $ids[$i]);

        $issubaux = true;

    } else {

    	mysqli_query($datos, "DELETE FROM PERSONAL WHERE PER_ID = " . $ids[$i]);
    }
 } 

if($issubaux === true){

echo "1";
} else {
echo "0";

}



mysqli_close($datos);



?>