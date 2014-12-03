<?php

session_start();

 $_SESSION["TxtUser"] = "";
 $_SESSION["TxtPass"] = "";
 $_SESSION["TxtCode"] = "";
 $_SESSION["TxtFacName"] = "";

 
session_destroy();
echo "<html>cerrando sesion!</html>";
echo "<script language='javascript'>window.location = 'http://restotech.cl/Qrmotion/PassatLog.php?'</script>";


 ?>