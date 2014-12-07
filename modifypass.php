<? 

$ids = $_GET['names'];
$fac = $_GET['fac'];

$array_nombres = explode("|", $ids);
if(empty($array_nombres)){
	echo "0";
	exit;
}

else {
	$datos = mysqli_connect('localhost', "root", "D1sjjDlvD0", "SM_usr10000");

for($i = 0 ; $i < count($array_nombres); $i++){
	mysqli_query($datos, "UPDATE PERSONAL SET PER_PASS = NULL WHERE PER_ID = " . $array_nombres[$i]);
}
 echo "500";
}







?>