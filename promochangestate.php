<?php


$id = $_GET['id'];

$datos = mysqli_connect('localhost', "root", "D1sjjDlvD0", "SM_usr10000");

mysqli_query($datos, "UPDATE TRAFFIC SET TRF_PRO_STATE = 1 WHERE TRF_ID = " . $id);

echo "1";


?>