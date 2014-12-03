<?php


$ftp_server = "ftp.restotech.cl";
$ftp_user_name = "u440137862";
$ftp_user_pass = "pionner256";
$destination_file = "/public_html/Qrmotion/images";

$source_file1 = $_FILES["background-theme"]["tmp_name"];
$source_file2 = $_FILES["background-client"]["tmp_name"];

$fac = $_REQUEST['fac'];

// set up basic connection
$conn_id = ftp_connect($ftp_server);

ftp_pasv($conn_id, true); 

// login with username and password
$login_result = ftp_login($conn_id, $ftp_user_name, $ftp_user_pass); 

// chack connection and login
if ((!$conn_id) || (!$login_result)) { 
    echo "FTP connection has failed!";
    echo "Attempted to connect to $ftp_server for user" . $ftp_user_name; 
    exit;

} else {

    echo "Connected to" . $ftp_server  . ", for user" .  $ftp_user_name;
}


// if dir was created...
if(ftp_is_dir($conn_id, $destination_file . "/" . $fac ) === false){
	   ftp_mkdir( $conn_id, $destination_file . "/" . $fac );
        ftp_mkdir( $conn_id, $destination_file . "/" . $fac . "/themes");

};


if ($source_file1 !== false){
$upload1 = ftp_put($conn_id, $destination_file . "/" . $fac . "/themes/background-theme.png", $source_file1 , FTP_BINARY); 
}

if ($source_file2 !== false){
$upload2 = ftp_put($conn_id, $destination_file . "/" . $fac . "/themes/background-client.png", $source_file2 , FTP_BINARY); 
}

if (!$upload1 || !$upload2) { 

echo "FTP upload has failed!  " . $_FILES['upload']['error'] . " to " . $ftp_server . " as " . $destination_file;

ftp_close($conn_id);

} else {

if ($source_file1 !== false){
    echo "Uploaded" . $source_file1 . " to " . $ftp_server . " as " . $destination_file;
};
if ($source_file1 !== false){
    echo "Uploaded" . $source_file2 . " to " . $ftp_server . " as " . $destination_file;
};


ftp_close($conn_id);

}

// close the FTP stream 




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

