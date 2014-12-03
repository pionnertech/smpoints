
<?php 

session_start();


if(isset($_POST["U"]))

{

$datos = mysqli_connect('mysql.nixiweb.com', "u440137862_eqr", "PlEyAdEs", "u440137862_qr");

$query = "SELECT FAC_CODE, FAC_USR, FAC_PASS, FAC_NAME FROM FAC WHERE (FAC_USR ='" . $_POST["U"] . "' ";
$query .= "AND FAC_PASS='" . $_POST["P"] . "')";

$query_aux = "SELECT FAC_CODE, FAC_AUX_USER, FAC_AUX_PASS FROM FAC WHERE (FAC_AUX_USER ='" . $_POST["U"] . "' AND FAC_AUX_PASS = '" . $_POST["P"] . "')";


$outcome = mysqli_fetch_assoc(mysqli_query($datos, $query));
$resultado = mysqli_fetch_assoc(mysqli_query($datos, $query_aux));


if (!$outcome && !$resultado)

{
    $_SESSION["TxtUser"] = "";
    $_SESSION["TxtPass"] = "";
    $_SESSION["TxtFacName"] = "";
    $_SESSION["TxtCode"] = "";

    session_destroy();

echo "<script language='javascript'>window.location='PassatLog.php?t=1'; </script>";


} 


else { 

if(!$outcome && $resultado !== false ){
 
 $_SESSION["TxtCode"] = $resultado['FAC_CODE'];
 $_SESSION["TxtUser"] = $resultado['FAC_AUX_USR'];
 $_SESSION["TxtFacName"] = $resultado['FAC_NAME'];

 echo "<script language='javascript'>window.location='attention.php'</script>";


} else if($outcome !== false && !$resultado){

 $_SESSION["TxtCode"] = $outcome['FAC_CODE'];
 $_SESSION["TxtUser"] = $outcome['FAC_USR'];
 $_SESSION["TxtPass"] = $outcome['FAC_PASS'];
 $_SESSION["TxtFacName"] = $outcome['FAC_NAME'];

 echo "<script language='javascript'>window.location='blank-page.php'</script>";

} else {

}


}

}





 ?>

