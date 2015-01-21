<?php 

$name = $_GET['name'];
$email = $_GET['email'];
$fac = $_GET['fac'];
$codigo = $_GET['codigo'];
$table = $_GET['table'];
$fecha = $_GET['fecha'];

$datos = mysqli_connect('localhost', "root", "k47tBZp60D", "SM_usr10000");

//comprobación 

$checker = mysqli_query($datos, "SELECT STR_ID FROM STORAGE WHERE STR_USR_QR = '" . $codigo . "'" );

if(mysqli_num_rows($checker) !== 0){
echo '403';
exit;
} 


$vari_able = mysqli_query($datos, "SELECT QR_VAL FROM QR WHERE QR_VAL = '" . $codigo . "';");

if(mysqli_num_rows($vari_able) === 0 ){
echo '0';
exit;

}


$result2 = mysqli_query($datos, "INSERT INTO STORAGE (STR_USR_QR, STR_USR_BA_SCORE, STR_FAC_CODE) VALUES ('" . $codigo ."', 1 ," . $fac .")");
$result = mysqli_query($datos, "INSERT INTO USER (USR_NAME, USR_EMAIL, USR_QR, USR_DATE_ING) VALUES ('" . $name . "', '" . $email . "', '" . $codigo . "' , '" . date("d-m-Y") . "');");

if (!$result && !$result2){

   echo 5;

	} else { 

     echo 1;

	}


?>