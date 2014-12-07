<?php

$codigo = $_GET['fac'];

$datos = mysqli_connect('localhost', "root", "D1sjjDlvD0", "SM_usr10000");

$query = "SELECT RULE_CANT_SCORE, RULE_SCORE_VISITOR FROM RULES WHERE RULE_FAC_CODE = " . $codigo . ";";

$resultado = mysqli_fetch_assoc(mysqli_query($datos, $query));

echo $resultado['RULE_CANT_SCORE'] . "|" . $resultado['RULE_SCORE_VISITOR'] ;


?>