<?php

$name = $_GET['name'];
$pass = $_GET['password'];
$fac = $_GET['fac'];
$surn = $_GET['surname'];

$datos = mysqli_connect('localhost', "root", "D1sjjDlvD0", "SM_usr10000");


//check if pass exist first
 $check = mysqli_query($datos, "SELECT PER_ID FROM PERSONAL WHERE (PER_PASS = " . $pass . " AND PER_FAC_CODE = " . $fac . ")");

 if(mysqli_num_rows($check) !== 0 ){

   exit('0');

 }

mysqli_query($datos, "UPDATE PERSONAL SET PER_PASS = " . $pass . " WHERE (PER_NAME ='" . $name . "' AND PER_FAC_CODE = " . $fac . " AND PER_SURNAME= '" . $surn . "')");

echo "ok";

?>