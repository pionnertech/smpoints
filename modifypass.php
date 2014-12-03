<? 

$ids = $_GET['names'];
$fac = $_GET['fac'];

$array_nombres = explode("|", $ids);
if(empty($array_nombres)){
	echo "0";
	exit;
}

else {
	$datos = mysqli_connect('mysql.nixiweb.com', "u440137862_eqr", "PlEyAdEs", "u440137862_qr");

for($i = 0 ; $i < count($array_nombres); $i++){
	mysqli_query($datos, "UPDATE PERSONAL SET PER_PASS = NULL WHERE PER_ID = " . $array_nombres[$i]);
}
 echo "500";
}







?>