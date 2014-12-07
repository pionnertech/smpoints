
<?php

$pass = $_GET['pass'];
$fac = $_GET['fac_code'];

$datos = mysqli_connect('localhost', "root", "D1sjjDlvD0", "SM_usr10000");

$result =  mysqli_query($datos, "SELECT PER_ID FROM PERSONAL WHERE (PER_PASS= '"  . $pass . "' AND PER_FAC_CODE= " . $fac . ")");

  if(mysqli_num_rows($result) === 0){
     
     echo 0;

  } else {

  	$outcome =  mysqli_fetch_assoc($result);

     echo $outcome['PER_ID'];
  }


 ?>