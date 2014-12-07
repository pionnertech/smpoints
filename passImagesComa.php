<?php

$code = $_GET['fac'];

$ftp_server = "ftp.restotech.cl";
$ftp_user_name = "u440137862";
$ftp_user_pass = "pionner256";


$datos = mysqli_connect('localhost', "root", "D1sjjDlvD0", "SM_usr10000");
$result = mysqli_fetch_assoc(mysqli_query($datos, "SELECT FAC_NAME FROM FAC WHERE FAC_CODE = ". $code));

$fac = $result['FAC_NAME'];

$PC = mysqli_query($datos, "SELECT PRO_CODE, PRO_CANT_VAL, PRO_DESCRIP FROM PRO WHERE PRO_FAC='" . $fac . "' ORDER BY PRO_CODE;");


$destination_file = "images/" . $fac . "/";

$conn_id = ftp_connect($ftp_server);

ftp_pasv($conn_id, true); 

// login with username and password
ftp_login($conn_id, $ftp_user_name, $ftp_user_pass);



$images = array();

if ($dir = opendir($destination_file)) {

	while (false !== ($file = readdir($dir))) {
		if ($file != "." && $file != "..") {
			$images[] = $file; 
		}

	}
	closedir($dir);
}



$n = 0;

echo "{\"fuente\": [{\"imagenes\":[";

sort($images);

if(is_array($images)){

 foreach($images as $image) {
  
  if ($image === "themes"){

   $n = $n+1;
  	continue;

  } else {



  echo "{\"raiz\":\"" . $image . "\"}";

  if ( count($images)-2 === $n){

  } else {

      echo ",";
  }
  
 $n = $n+1;

  }
}
};



echo "]},{\"codigos\":[";




while ($fila = mysqli_fetch_row($PC)){

	echo "{\"codigo\":\"" . $fila[0] . "\",";
	echo  "\"puntaje\":\"" . $fila[1] . "\",";
	echo  "\"descripcion\":\"" . $fila[2] . "\"}";
	


if ((mysqli_num_rows($PC)-1)  == $y ){


  } else {
     
      echo ",";
  }

	$y = $y + 1;

}


echo "]}]}";


?>