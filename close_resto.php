<?php

session_start();

 $_SESSION["TxtUser"] = "";
 $_SESSION["TxtPass"] = "";
 $_SESSION["TxtCode"] = "";
 $_SESSION["TxtFacName"] = "";

 
session_destroy();
echo "<script language='javascript'>window.location ='index.php'</script>";


 ?>