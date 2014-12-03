
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
<link rel="stylesheet" type="text/css" href="css/jquery.flipster.css">
<style type="text/css">
*{
	border:0;
	margin:0;
	padding:0;
}
	 html, body{
		width:100%;
		height: 100%;

	}
body {
  font-family: arial, helvetica;
  background-size:100%;
  background-image: url('images/<? echo $result['FAC_NAME'] ?>/themes/background-theme.png');
  background-repeat: no-repeat;
}

article{
	-webkit-filter: blur(20px);
	position:absolute;
	background-size: cover;
	width: 100%;
	height: 100%;
}
  .main{
    width: 280px;
    border-radius: 50%;
    border: 20px solid #F40000;
    margin-left: 3em;
    margin-top: 3em;
  }

  .descriptionPromo{
  background:#FFF;
  padding: 1em;
  font-style: italic;
  font-size: 1.5em;
  color: darkorange;
  border-radius: 15px;
  background-color: rgba(255, 255, 255, 0.2);
  text-align: center;
  filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#99ffffff, endColorstr=#99ffffff);
  -ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#99ffffff, endColorstr=#99ffffff)";
}
  .img-wrap .img-des{
    max-width: 100%;
  }

.img-des{
max-width: 18em;  
height:18em;
border-radius: 50%;
}






</style>
    <title></title>

</head>
<body>
<article>
    <div class="flipster">
        <ul id="il">

      <?  while($fila = mysqli_fetch_row($Res_Pro)){  ?>
      <li>
         <div class="main">
         <img src="images/<? printf($result['FAC_NAME']) ?>/<? printf($fila[4]) ?>.jpg" class="img-des" >
         <input type="hidden" value="<? printf($fila[0]) ?>" class="promoGet">
         <input type="hidden" value="<? printf($fila[1]) ?>" class="scoreGet">
         <input type="hidden" class="condition">
         </div>
         <p class="descriptionPromo"><? printf($fila[2]) ?></p>
       </li>
      <?
      }
      mysqli_data_seek($Res_Pro, 0);
      ?>
      </ul>
    </div>
      <div id="showValue"></div>

</article>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<script type="text/javascript" src="java/jquery.flipster.js"></script>   
</body>
</html>
 
<script type="text/javascript" src="java/jlinq.js"></script>
<script type="text/javascript" src="java/jlinq.jquery.js"></script>
<script type="text/javascript">


var fac = getQueryVariable('name');
var fac_code  = getQueryVariable('facility');

	//loadImagesPro();


function getQueryVariable(variable) {
  var query = window.location.search.substring(1);
  var vars = query.split("&");
  for (var i=0;i<vars.length;i++) {
    var pair = vars[i].split("=");
    if (pair[0] == variable) {
      return pair[1];
    }
  } 
  alert('Query Variable ' + variable + ' not found');
}

$(function(){
$('.flipster').flipster();
});





</script>