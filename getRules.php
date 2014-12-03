<?php

$codigo = $_GET['fac'];

$datos = mysqli_connect('mysql.nixiweb.com', "u440137862_eqr", "PlEyAdEs", "u440137862_qr");

$query = "SELECT RULE_CANT_SCORE, RULE_SCORE_VISITOR FROM RULES WHERE RULE_FAC_CODE = " . $codigo . ";";

$resultado = mysqli_fetch_assoc(mysqli_query($datos, $query));

echo $resultado['RULE_CANT_SCORE'] . "|" . $resultado['RULE_SCORE_VISITOR'] ;


?>