
<?php

$variable = $_GET['cantidad'];

?>

<!DOCTYPE html>
<html>
<head>
	<title>QR Generator</title>
<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet" />
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
    border: 4px solid #39B54A;
    border-radius: 15px;
    background-color: #fff;
    display: inline-block;
    height: 321px;
    width:207px;
    -webkit-print-color-adjust:exact;
    margin:3px;
}

.qrCont{
    
    background-color: #fff;
    height:150px;
    padding: 0px 0 16px 0;
    border: 0 solid #3E015C;
    border-radius: 15px;
}


.titles{
    width: 97%;
    text-align: left;
    transform: rotate(90deg);
    position:relative;
    top: 60px;
}

.st{
color: gray;
margin-right:0.2em;
}

.nd{
color:#39B54A ;
}
.nd, .st{
    font-family: "Conv_regular";
    font-size: 2.4em;
    font-weight: bolder;

}

.logos{
    width:100%;
    text-align: right;
    padding-right: 5px;
    height: 4.7em;
    transform: rotate(90deg);
position: relative;
top: -60px;
right: 62px;
background-color:transparent;
}

.logo_opt img{
    width: 25px;
    margin-left: 5px;
    background-color:transparent;

}

.logo_opt{
width: 100%;
position: relative;
top: 34px;
right: 33px;
}

.web{
    font-size: .7em;
    color:gray;
    font-family: arial, helvetica;
}

.web , .log_opt, .logos{
    display: inline-block;
    vertical-align: bottom;
}


small{
    font-size: .35em;
    display:inline-block;
    vertical-align: top;
    position: relative;
right: 4px;
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

footer{

    margin-bottom: 36.8em ;
}



}


.keynumber{

  color:white;
  font-style: italic;
  font-size: .8em;
  display:inline-block;
  vertical-align: top;
  width:auto;
  padding:0 .6em;
  background-color: rgb(88, 173, 88);
  border-radius: 15px;
  letter-spacing: 2px;
}

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
  $datos = mysqli_connect('localhost', "root", "D1sjjDlvD0", "SM_usr10000");

   if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    //you need to exit the script, if there is an error
    exit();
}

$number_query = mysqli_query($datos, "SELECT QR_KEY FROM QR ORDER BY QR_ID");

$number_array = mysqli_fetch_array($number_query);

for($i=0; $i < $variable; $i++){

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
            <div class="titles">
            <p class="st">Smile</p>
               <p class="nd">P<i class="fa fa-smile-o" style="font-size: .7em; color"></i>ints<small>&reg;</small></p>
            </div>
            <div class="logos">
                <div class="logo_opt"><p class="web">www.emenu.cl</p><img src="images/LOGO_EMENU_opt.png"></div>
            </div>
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


