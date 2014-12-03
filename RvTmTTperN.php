<?php header('Content-Type: text/html; charset=utf-8'); 

$keybar = $_GET['keyvar'];

$datos = mysqli_connect('mysql.nixiweb.com', "u440137862_eqr", "PlEyAdEs", "u440137862_qr");

 $response = mysqli_num_rows(mysqli_query($datos, "SELECT USR_NAME FROM USER WHERE USR_EMAIL= '" . $keybar . "'"));

switch ($response) {
	case 0:
	  echo "x";
	break;
	case 1:
      echo  "Av";
	break;
	case "":
       echo "Av";
    break;
    default:
       echo "Av"; 
};

?>