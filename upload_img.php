<?php

$ftp_server = "ftp.restotech.cl";
$ftp_user_name = "u440137862";
$ftp_user_pass = "pionner256";
$destination_file = "/public_html/Qrmotion/images";

$source_file = $_FILES["upload"]["tmp_name"];
$fac = $_REQUEST['fac'];
$code = $_REQUEST['code'];

$code = preg_replace('/^0+/', '',  $code);

if(is_uploaded_file ( $source_file ) == false)
{
	echo "no se ha recibido";
	exit;

} else{

};

// functions 

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


// set up basic connection
$conn_id = ftp_connect($ftp_server);

ftp_pasv($conn_id, true); 

// login with username and password
$login_result = ftp_login($conn_id, $ftp_user_name, $ftp_user_pass); 

// check connection
if ((!$conn_id) || (!$login_result)) { 
    echo "FTP connection has failed!";
    echo "Attempted to connect to $ftp_server for user" . $ftp_user_name; 
    exit; 
} else {
    echo "Connected to" . $ftp_server  . ", for user" .  $ftp_user_name;
}


if(ftp_is_dir($conn_id, $destination_file . "/" . $fac ."/") === false){
	
	   ftp_mkdir( $conn_id, $destination_file . "/" . $fac . "/");

};

 $va =  ftp_mdtm($conn_id, $destination_file . "/" . $fac . "/" . $code .  ".jpg");

 if($va !== -1){

if(ftp_delete($conn_id, $destination_file . "/" . $fac . "/" . $code .  ".jpg")){

       uploadToFtp($conn_id, $destination_file, $fac, $code, $source_file);
         if(ftp_mdtm($conn_id, $destination_file . "/" . $fac . "/" . $code .  ".jpg") !== -1){

               } else {

               uploadToFtp($conn_id, $destination_file, $fac, $code, $source_file);
           };
} else {

           uploadToFtp($conn_id, $destination_file, $fac, $code, $source_file);
         if( ftp_mdtm($conn_id, $destination_file . "/" . $fac . "/" . $code .  ".jpg") !== 1){
               } else {
               uploadToFtp($conn_id, $destination_file, $fac, $code, $source_file);
           };
}

} else {


       uploadToFtp($conn_id, $destination_file, $fac, $code, $source_file);
         if( ftp_mdtm( $conn_id , $destination_file . "/" . $fac . "/" . $code .  ".jpg") !== -1 ){
               } else {
               uploadToFtp($conn_id, $destination_file, $fac, $code, $source_file);
           };

}




function uploadToFtp($conn_id, $destination_file, $fac, $code, $source_file){

$upload = ftp_put($conn_id, $destination_file . "/" . $fac . "/" . $code .  ".jpg", $source_file , FTP_BINARY); 
    sleep(2);

if (!$upload) { 
echo "FTP upload has failed!  " . $_FILES['upload']['error'] . " to " . $ftp_server . " as " . $destination_file;
ftp_close($conn_id);

} else {

echo "Uploaded" . $source_file . " to " . $ftp_server . " as " . $destination_file;
ftp_close($conn_id);
}
}


// close the FTP stream 




/*
 $datos = mysqli_connect('mysql.nixiweb.com', "u440137862_eqr", "PlEyAdEs", "u440137862_qr");

 mysqli_query($datos, "INSERT INTO PRO (PRO_FAC, PRO_CANT_VAL, PRO_DATE , PRO_DESCRIP, PRO_CODE) VALUES (" . $fac .  ", " . $cant . ", '" . date(d-m-Y) . "' , '" . $descrip . "', '" . $code . "');");

*/



?>

