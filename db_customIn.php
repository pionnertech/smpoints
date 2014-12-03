<?php


$name = $_GET['name'];
$surname = $_GET['surname'];
$pass = $_GET['pass'];
$fac = $_GET['fac'];
$usrname = $_GET['usrname'];
$argument = $_GET['argument'];
$id = $_GET['id'];
$codigo_pre = "";


// code 
$datos = mysqli_connect('mysql.nixiweb.com', "u440137862_eqr", "PlEyAdEs", "u440137862_qr");


$result = mysqli_query($datos, "SELECT FAC_CODE FROM FAC");

if(!mysqli_num_rows($result)){

	$code = (int)10000;

} else {

	$codigo_pre = mysqli_fetch_assoc(mysqli_query($datos, "SELECT FAC_CODE FROM FAC ORDER BY FAC_CODE DESC LIMIT 0,1"));

    $code = (int)$codigo_pre['FAC_CODE'] + 1;    
};

if($argument === "in"){

$query = "INSERT INTO FAC (FAC_CODE, FAC_NAME, FAC_PASS, FAC_USR,FAC_CUSTOM_NAME, FAC_CUSTOM_SURNAME, FAC_EST) VALUES ";
$query .= "(" . (int)$code . " ,'";
$query .= $fac . "' ,'" ;
$query .= $pass . "' ,'";
$query .= $usrname . "' ,'";  
$query .= $name . "' ,'";
$query .= $surname . "' ,'A');"; 

//primer condicional para ingreso
if(!mysqli_query($datos, $query)){
echo "no se puede conectar con el servidor";
}
//segundo condicional para ingreso 


if(!mysqli_query($datos, "INSERT INTO RULES (RULE_FAC_CODE , RULE_SCORE_VISITOR, RULE_CANT_SCORE , RULE_EXP_PROMO  ) VALUES (" . $code . ", 0 , 0, 0 )")){

      echo "reglas no inscritas";
}  else {

	$callback_id = mysqli_fetch_assoc(mysqli_query($datos, "SELECT FAC_ID, FAC_CODE FROM FAC WHERE FAC_CODE = " . (int)$code));
	echo $callback_id['FAC_ID'] . "," . $callback_id['FAC_CODE'];

}


} else if ($argument === 'mod') {
     
     mysqli_query($datos, "UPDATE FAC SET FAC_NAME = '" . $fac . "' WHERE FAC_ID =" . $id);
     mysqli_query($datos, "UPDATE FAC SET FAC_USR = '" . $usrname . "' WHERE FAC_ID =" . $id);
     mysqli_query($datos, "UPDATE FAC SET FAC_PASS = '" . $pass . "' WHERE FAC_ID =" . $id);
     mysqli_query($datos, "UPDATE FAC SET FAC_CUSTOM_SURNAME = '" . $surname . "' WHERE FAC_ID =" . $id);
     mysqli_query($datos, "UPDATE FAC SET FAC_CUSTOM_NAME = '" . $name . "' WHERE FAC_ID =" . $id);

    echo "Cliente Modificado!";

	} else if($argument === 'del') {

   $code_facility = mysqli_fetch_assoc(mysqli_query($datos, "SELECT FAC_CODE, FAC_NAME FROM FAC WHERE FAC_ID = " . $id));

   $ftp_server = "ftp.restotech.cl";
   $ftp_user_name = "u440137862";
   $ftp_user_pass = "pionner256";
   $destination_direct = "/public_html/Qrmotion/images/";

   $conn_id = ftp_connect($ftp_server);
   ftp_pasv($conn_id, true); 
   $login_result = ftp_login($conn_id, $ftp_user_name, $ftp_user_pass); 
  
    if(ftp_is_dir($conn_id, $dir . $code_facility['FAC_NAME'] . "/" )){
        ftp_rmdir($ftp_rmdir,$dir . $code_facility['FAC_NAME'] . "/");
    }


   mysqli_query($datos,"DELETE FROM FAC WHERE FAC_ID = " . $id . ";");
   mysqli_query($datos,"DELETE FROM RULES WHERE RULE_FAC_CODE = " . $code_facility['FAC_CODE'] . ";");
   mysqli_query($datos,"DELETE FROM TRAFFIC WHERE TRF_FAC = " . $code_facility['FAC_CODE'] . ";");
   mysqli_query($datos,"DELETE FROM PERSONAL WHERE PER_FAC_CODE = " . $code_facility['FAC_CODE'] . ";");
   mysqli_query($datos,"DELETE FROM STORAGE WHERE STR_FAC_CODE = " . $code_facility['FAC_CODE'] . ";");
   mysqli_query($datos,"DELETE FROM PRO WHERE PRO_FAC = " . $code_facility['FAC_NAME'] . ";");

   ftp_close($conn_id);

   echo "Cliente Borrado!";

} else {

}

mysqli_close($datos);

function ftp_is_dir($ftp, $dir)
{
    $pushd = ftp_pwd($ftp);

    if ($pushd !== false && @ftp_chdir($ftp, $dir))
    {
        ftp_chdir($ftp, $pushd);   
        return true;
    }

    return false;
} 









?>
