<?php

   $val = $_GET['val'];
   $datos = mysqli_connect('localhost', "root", "k47tBZp60D", "SM_usr10000");

   //check if exist

   $query = mysqli_query($datos, "SELECT QR_ID FROM QR WHERE QR_VAL = " . $val );

   if(mysqli_num_rows($query) !== 0){
     echo "repetido!";
   } else {
   	mysqli_query($datos, "INSERT INTO QR(QR_VAL) VALUES ('" . $val . "');");
   	echo $val;
   }



?>