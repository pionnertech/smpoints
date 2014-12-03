<?php header('Content-Type: text/html; charset=utf-8');

$datos = mysqli_connect('mysql.nixiweb.com', "u440137862_eqr", "PlEyAdEs", "u440137862_qr");

$Query = "SELECT FAC_NAME FROM FAC WHERE FAC_CODE = " . $_GET['facility'];
$result = mysqli_fetch_assoc(mysqli_query($datos,$Query));


$Query_Pro = "SELECT PRO_CODE, PRO_CANT_VAL, PRO_DESCRIP, SUBSTRING(PRO_DATE,1,10), PRO_CODE FROM PRO WHERE PRO_FAC ='" .  $result['FAC_NAME'] . "'";
$Res_Pro = mysqli_query($datos, $Query_Pro);

?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="images/EL Sol/mycontentflow.css" >
<script type="text/javascript" src="images/El Sol/contentflow.js"></script>
    <script tyle="text/javascript">
        var cf = new ContentFlow('ContentFlow', {reflectionColor: "#000000"});
    </script>
	<title></title>
</head>
<body>
     <div id="ContentFlow">
     <div class="loadIndicator"><div class="indicator"></div></div>
        <div class="flow">
      <?   
          while($fila = mysqli_fetch_row($Res_Pro)){
      ?>
                <img src="images/<? printf($result['FAC_NAME']) ?>/<? printf($fila[4]) ?>.jpg" class="img-des" title="<? printf($fila[2]) ?>" >

      <?
      }
 mysqli_data_seek($Res_Pro, 0);
      ?>
        </div>
        <div class="globalCaption"></div>
        <div class="scrollbar"><div class="slider"><div class="position"></div></div></div>	
    </div>
</body>
</html>
<style type="text/css">
	html, body{
		width:100%;
		height:100%;
	}
</style>
