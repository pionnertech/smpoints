
<?php

$variable = $_GET['cantidad'];

?>

<!DOCTYPE html>
<html>
<head>
	<title>QR Generator</title>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet" />
<meta charset="utf-8">
<style type="text/css">
    @page {size: portrait;}

@page rotada {size: landscape;}

@media print {
    footer {page-break-after: always;}
}


*{
    border:0;
    margin:0;
    padding:0;
}

@font-face {
    font-family: 'Conv_regular';
    src: url('fonts/regular.eot');
    src: url('fonts/regular.eot?#iefix') format('embedded-opentype'),
         url('fonts/regular.woff2') format('woff2'),
         url('fonts/regular.woff') format('woff'),
         url('fonts/regular.ttf') format('truetype'),
         url('fonts/regular.svg#quadrantaregular') format('svg');
    font-weight: normal;
    font-style: normal;

}

body {
    background-image: url(images/aluminium_back.jpg);
    height: 100%;
    width:100%;
    font-family: 'Conv_regular', arial, helvetica;
}


#bigMain {
  width:100%;
}

#Cantidad  {
    padding: .5em 1em;
    width: 100%;

}


#cant {
    border-radius: 7px;
    -webkit-box-shadow: 1px 0px 20px 0px rgba(50, 156, 255, 0.75);
    -moz-box-shadow:    1px 0px 20px 0px rgba(50, 156, 255, 0.75);
    -o-box-shadow:      1px 0px 20px 0px rgba(50, 156, 255, 0.75);
    box-shadow:         1px 0px 20px 0px rgba(50, 156, 255, 0.75);

    height: 3em;
    width: 50%;
}

#wrapper-card {
   display: inline-block;
    width:100%;

}  

#go {

    border-radius: 7px;
    margin:2em 0;
    padding:1em;
    width: 20%;

    -webkit-transition: all 500ms ease-in-out;
     -moz-transition:    all 500ms ease-in-out;
     transition:         all 500ms ease-in-out;
}


#go:hover{
color: #FFF ;
background-color:#6BA446;
}

.QrBox {
    margin: auto;
left:0; right:0;
top:0; bottom:0;
margin-top:20em;
    background-color: #fff;
    display: block;
    height: 200px;
    width:200px;
    -webkit-print-color-adjust:exact;
}

.qrCont{
    
    background-color: #fff;
    height:150px;
    padding: 0px 0 16px 0;
    border: 0 solid #3E015C;
    border-radius: 15px;
}




@media print {

body{background-color:#FFF;}

input, button {
    display: none;
}
html, body {
    margin:0;
    padding:0;
}


}

footer{

    margin-bottom: 105%;
}

.keynumber{

  color:black;
  font-style: italic;
  font-size: .8em;
  display:inline-block;
  width:auto;
  padding:0 .6em;
  letter-spacing: 2px;
  transform: rotate(90deg);
  position: relative;
  top: -87px;
  left: -81px;
}

@page { margin: 0cm }
</style>

</head>


<body>

 <div id="bigMain">
 	
    <div id="Cantidad" align="center">
   	      <input type="number" id="cant" name="cant" onkeypress="ProcessKeyPressed(event || window.event)" value="" placeholder="Ingrese el número de tarjetas a Imprimir"> 
   	      <button id="go" onclick="generate()">Generar Tarjetas</button>
    </div>
    <div id="wrapper-card" align="center">


<?

   $datos = mysqli_connect('localhost', "root", "k47tBZp60D", "SM_usr10000");

   if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    //you need to exit the script, if there is an error
    exit();
}

$number_query = mysqli_query($datos, "SELECT QR_KEY FROM QR ORDER BY QR_ID");

$number_array = mysqli_fetch_array($number_query);

for($i=1; $i < $variable + 1; $i++){

  $bytes = openssl_random_pseudo_bytes(14, $cstrong);
    $hex   = bin2hex($bytes);
    $variant =  substr_replace($hex , "", 0 , 10);
   
    $number_dif = mt_rand(1000000, 9999999);

  if(in_array($number_dif, $number_array)){
    while(in_array($number_dif, $number_array)){
         $number_dif = mt_rand(1000000, 9999999);
    }
}

        mysqli_query($datos, "INSERT INTO QR (QR_VAL , QR_EST)  VALUES ('" . $variant . "'," . $number_dif . ");");

 ?>
	    <div class="QrBox">
	    	<div class="qrCont" align="center"><? echo '<img src="https://chart.googleapis.com/chart?chs=170x170&cht=qr&chl=' . $variant .  '&choe=UTF-8" />' ?></div>
            <div class="keynumber"><? printf($number_dif) ?></div>
	    </div>
      <footer>&spen;</footer>
<?
}
?>
  </div>
 </div>

</body>
</html>



<script type="text/javascript">
	
	function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : event.keyCode;

    if (charCode > 31 && (charCode < 48 || charCode > 57)){
        return false;
    } else {
    return true;
}
}    


 function ProcessKeyPressed(event) {     

     if (event.keyCode == 13 || event.keyCode == 10 ) {
            generate();
    }
 }

function generate(){
	var cantidad = document.getElementById('cant').value;

        if (confirm("Realmente desea imprimir las " + document.getElementById('cant').value + " Tarjetas?" )){
        	window.location.href = "QRCards_Generator.php?cantidad=" + cantidad;
        }


	
}
</script>




