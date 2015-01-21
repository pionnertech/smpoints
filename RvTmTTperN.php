<?php header('Content-Type: text/html; charset=utf-8'); 

$keybar = $_GET['keyvar'];

$datos = mysqli_connect('localhost', "root", "k47tBZp60D", "SM_usr10000");

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