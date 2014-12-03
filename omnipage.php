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
  <title></title>
</head>
<body>

<div id="wrapper">
<div id="mask">
<div class="section" id="container-principal">
<article class="glass">
  <div id="wrap-all" align="center">
    <div id="central" align="center">Bienvenidos a Sushihome</div>
  </div>
<div class="main" align="center">
      <div id="RecPanel" align="center">
      	<div class="ident" id="usr_name" align="center"></div>
        <div id="puntosUsuario" align="center"></div>
      </div>
         <div class="flipster">
         	<ul id="il">
                      <?   
          while($fila = mysqli_fetch_row($Res_Pro)){
      ?>
      <li>
         <div class="main">
         <img src="images/<? printf($result['FAC_NAME']) ?>/<? printf($fila[4]) ?>.jpg" class="img-des" >
         <input type="hidden" value="<? printf($fila[0]) ?>" class="promoGet">
         <input type="hidden" value="<? printf($fila[1]) ?>" class="scoreGet">
         <input type="hidden" class="condition">
         </div>
         <p><? printf($fila[2]) ?></p>
       </li>
      <?
      }
      ?>
        	</ul>
         </div>
         <div id="showValue" align="center"></div>
 <div id="highBar" align="left">
     <div class="wrap-buttons">
         <div></div>
     </div>
</div>
	</div>
</article>
  <svg xmlns="http://www.w3.org/2000/svg" version="1.1">
  <defs>
    <filter id="blur">
      <feGaussianBlur stdDeviation="10" />
    </filter>
  </defs>
</svg>
</div>


<div class="section">
	
</div>

<!-- inscripción -->

<div class="section" id="container-inscripcion">
	
	<div class="grand-wrap" align="center">
<div class="wrap" align="center">
	<div style="display: inline-block; vertical-align: top;">
	<input type="text" id="nUs" placeholder="Ingresa tu nombre">

<div class="flip-container" ontouchstart="this.classList.toggle('hover');">
	<div class="flipper">
		<div class="front">
		<!-- front content -->
		</div>
		<div class="back">
			<img src="images/green.png">
		</div>
	</div>
</div>

	</div>
</div>
<div class="wrap" align="center">
	<div style="display: inline-block; vertical-align: top;">
	     <input type="text" id="eUs" placeholder="Ingresa tu E-mail ">
                <div class="flip-container" ontouchstart="this.classList.toggle('hover');">
                	<div class="flipper">
                		<div class="front">
                		<!-- front content -->
                		</div>
                		<div class="back">
                			<img src="images/green.png">
                		</div>
                	</div>
                </div>
	        </div>
        </div>
    </div>
</div>


<!-- incripcion inputs -->
<div class="section" id="container-input">
    <div id="calculationBox" align="center">
     <div class="cal-blocks">
     	<input type="pass" placeholder="Ingrese contraseña">
     </div>
     <div class="cal-blocks">
     	<input type="number" placeholder="ingrese numero de boleta">
     </div>
     <div align="center" class="cal-blocks">
        <input type="number" id="cant" placeholder="Ingrese monto boleta">
     </div>
     <div align="center" class="cal-blocks" id="wrap-score">
       <div id="score">10</div>
     </div>
     <div id="nonoYes" align="center">
       <div><img src="images/green.png" id="yes2"></div>
       <div><img src="images/red.png" id="no2"></div>
     </div>
   </div>
</div>

<!-- camera -->
<div class="section" id="container-camera">
	
  	<div class="wrap-camera">
	  <div id="camera"></div>
	</div>
	<div class="wrap-image">
		<img src="images/trophy.png">
	</div>
	<div class="wrap-slide">
	<a href="#" id="ui-carousel-next"><span>next</span></a>
		<div id="carousel">
             <div class="slide-items">Salmon en Mantequilla</div>
             <div class="slide-items">Pisco sour</div>			
             <div class="slide-items">Pisco peruano</div>
             <div class="slide-items">Langosta</div> 
             <div class="slide-items">Langosta</div>
             <div class="slide-items">Pisco peruano</div>
             <div class="slide-items">Pisco sour</div>
             <div class="slide-items">Pisco sour</div>
             <div class="slide-items">Salmon en Mantequilla</div>
             <div class="slide-items">Salmon en Mantequilla</div>
             <div class="slide-items">Salmon en Mantequilla</div>
             <div class="slide-items">acumula puntos</div>
		</div>
	</div>
	<a href="#" id="ui-carousel-prev"><span>prev</span></a>
</div>
</div>
</div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="java/jquery.flipster.js"></script>
<script src="js/jquery.ui.core.min.js"></script>
<script src="js/jquery.ui.widget.min.js"></script>
<script src="js/jquery.ui.rcarousel.min.js"></script>
<script src="lib/html5-qrcode.min.js"></script>
<script src="js/scrollTo.js"></script>

<script type="text/javascript">
	
	$(document).ready(function() {

	$('.wrap-buttons > div').click(function () {

		//$('wrap-buttons > div').removeClass('selected');
		//$(this).addClass('selected');
		
		//current = $(this);
		
		$('#wrapper').scrollTo("container-inscripcion", 800);		
		
		return false;
	});



	$(window).resize(function () {
		resizePanel();
	});
	
});

function resizePanel() {

	width = $(window).width();
	height = $(window).height();

	mask_width = width * $('.item').length;
		
	$('#debug').html(width  + ' ' + height + ' ' + mask_width);
		
	$('#wrapper, .item').css({width: width, height: height});
	$('#mask').css({width: mask_width, height: height});
	$('#wrapper').scrollTo($('a.selected').attr('href'), 0);
		
}




</script>
</body>
</html>
<style type="text/css">


html, body,article, .glass::before{
	height:100%;
	width:100%;
}

body{
	margin:0;
	padding:0;
	overflow:hidden;
}

#wrapper {
	width:100%;
	height:100%;
	position:absolute;
	top:0;
	left:0;
	overflow:hidden;
}

	#mask {
		width:500%;
		height:100%;
		background-color:#FFF;
	}

	.section{
   width:100%;
   height: 100%;
	}


	.clear {
		clear:both;
	}
	
/* camera */
	.wrap-camera{
  width: 28%;
  height: 16em;
  text-align: left;
  padding:5em 2em;
  overflow:hidden;
  margin: 4em 1em;
  border: 6px solid #4a4a4a;
  border-radius: 15px;
}

.wrap-image, .wrap-slide{
	margin: 0 2em;
}

.wrap-camera, .wrap-slide, .wrap-image{
	display:inline-block;
	vertical-align: top;
}

.wrap-slide{
	width:30%;
	height:32em;
	overflow: hidden;
	position: relative;
	
}
#carousel {
	position: absolute;
	top: 50px;
	height:600px !important;
}
.slide-items{

border-radius: 15px;
background-color: orange;
color: white;

font-size: 2em;
font-style: italic;
font-family: arial, helvetica;
margin: .5em 1em .5em  0;
padding: .5em ;


text-shadow: 0 1px 10 rgba(255, 255, 255, 0.6);
width:85% !important;

}

#ui-carousel-next{

top: 0;
-webkit-transform: rotate(270deg);
float:right;
margin-right:40%;
}

#ui-carousel-prev{
-webkit-transform: rotate(90deg);
bottom: 0;
float:right;
margin-right:20%;
}


span{
	display: none;
}

#ui-carousel-next, #ui-carousel-prev{
	width: 100px;
	height: 50px;
	background: url(images/right.png) #fff center center no-repeat;
	display: block;
	z-index: 100;
	background-color: transparent;
}

/* camera */

/* ingreso cliente*/

.wrap {
	padding: 1em;
	margin:1em;

}

.wrap div{

 color: #FFF;
 font-size: 2em;
 font-style:italic;
 padding: 1em 0;
 max-width: 50%;


  background-image: -webkit-linear-gradient(top, #ffac05, #fa6e03);
  background-image: -moz-linear-gradient(top, #ffac05, #fa6e03);
  background-image: -ms-linear-gradient(top, #ffac05, #fa6e03);
  background-image: -o-linear-gradient(top, #ffac05, #fa6e03);
  background-image: linear-gradient(to bottom, #ffac05, #fa6e03);

  cursor: pointer;

   -webkit-box-shadow: 0px 10px 20px 0px rgba(0, 0, 0, 0.75);
   -moz-box-shadow:    0px 10px 20px 0px rgba(0, 0, 0, 0.75);
   box-shadow:         0px 10px 20px 0px rgba(0, 0, 0, 0.75);

   border-radius: 100px;


}



.wrap div:active{
   position:relative;
   -webkit-box-shadow: 0px 1px 0px 0px rgba(0, 0, 0, 0.75);
   -moz-box-shadow:    0px 1px 0px 0px rgba(0, 0, 0, 0.75);
   box-shadow:         0px 1px 0px 0px rgba(0, 0, 0, 0.75);

   -webkit-transition: all 200ms ease-out;
    -moz-transition: all 200ms ease-out;
    -o-transition: all 200ms ease-out;
    transition: all 200ms ease-out;
}

/* ingresdo cliente */

/*ingreso cliente inputs */

#nUs, #eUs{
	border-radius: 15px;
	height: 1em;
	outline:none;
	width: 40%;
	padding: .5em 1em;
	font-size: 2.5em;
	color: white;
	background-color: darkorange;
	box-shadow: 0 1px 10px rgba(255, 255, 255, 0.9);
}

::-webkit-input-placeholder {
	color: #fff;
}

#eUs::-moz-placeholder{
	color: #fff;
}

.wrap {
	width:100%;
    margin:2.5em 0;
}

.grand-wrap{
margin-top: 15%;
}


#back img{
	max-width: 3em;
}

.wrap > div{
width: 100%;

}
/* ====  flip events   =====*/
/* entire container, keeps perspective */
.flip-container {
	perspective: 1000;
	
}

#nUs, #eUs, .flip-container{
	display: inline-block;
	vertical-align: top;
}

	/* flip the pane when hovered */
.flip-container:hover .flipper, .flip-container.hover .flipper {
  transform: rotateY(180deg);
}

.flip-container, .front, .back {
	width: 4em;
	height: 4em;
}

/* flip speed goes here */
.flipper {
	transition: 0.6s;
	transform-style: preserve-3d;

	position: relative;
}

/* hide back of pane during swap */
.front, .back {
	backface-visibility: hidden;

	position: absolute;
	top: 0;
	left: 0;
}


.front {
	z-index: 2;
	/* for firefox 31 */
	transform: rotateY(0deg);
}

.back {
	transform: rotateY(180deg);
}

/* ingreso cliente inputs */


/* ===== principal =====*/


/*==== glass ==== */

.glass::before {
  /* Prefix free isn't picking up this one */
  background-image: url('images/<? echo $result['FAC_NAME'] ?>/themes/background-theme.png');
  -webkit-filter: url('filter#blur');
  filter: url('#blur');
  -webkit-filter: blur(20px);
  filter: blur(20px);
  background-size: cover;
  opacity: 1.9;
  z-index: -1;
  display: block;
  content: ' ';
  position:absolute;
}



a {
	text-decoration: none;
}

/* ==== flechas   ==== */


#highBar{
  width:100%;
 height: 100%;
}

#highBar, .wrap-buttons{
    display:inline-block;
  vertical-align: top;
}

.wrap-buttons{
  height:10em;
  width:4em;
  z-index: 40;

  -webkit-transition: all 1s ease-in-out;
  -moz-transition: all 1s ease-in-out;
  transition: all 1s ease-in-out;
}

.wrap-buttons div{
  background-color: rgba(0,0,0, 0.2);
  max-width: 100%;
  height: 100%;
}


#highBar .wrap-buttons:last-child{
  float: right;
}


</style>
