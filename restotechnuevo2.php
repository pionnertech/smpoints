<?php header('Content-Type: text/html; charset=utf-8');

$datos = mysqli_connect('mysql.nixiweb.com', "u440137862_eqr", "PlEyAdEs", "u440137862_qr");

$Query = "SELECT FAC_NAME FROM FAC WHERE FAC_CODE = " . $_GET['facility'];
$result = mysqli_fetch_assoc(mysqli_query($datos,$Query));


$Query_Pro = "SELECT PRO_CODE, PRO_CANT_VAL, PRO_DESCRIP, SUBSTRING(PRO_DATE,1,10), PRO_CODE, PRO_CANT_VAL FROM PRO WHERE PRO_FAC ='" .  $result['FAC_NAME'] . "'";
$Res_Pro = mysqli_query($datos, $Query_Pro);

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/contentflow.css" >
<link rel="stylesheet" type="text/css" href="http://cdn.jsdelivr.net/jquery.slick/1.3.9/slick.css">
<link rel="stylesheet" type="text/css" href="css/sweet-alert.css">
<link rel="stylesheet" type="text/css" href="css/jquery.fullPage.css" >

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery.easings.min.js"></script>
<script type="text/javascript" src="js/jquery.slimscroll.min.js"></script>
<script type="text/javascript" src="js/jquery.fullPage.min.js"></script>
<script language="JavaScript" type="text/javascript" src="contentflow.js"></script>
    <script tyle="text/javascript">
       var cf = new ContentFlow('contentFlow', { 
            reflectionColor: "#FFFFFF",
             flowSpeedFactor: 0.4,
             maxItemHeight: 0,
             fixItemSize: false,
        reflectionColor: "transparent", // none, transparent, overlay or hex RGB CSS style #RRGGBB
        reflectionHeight: 0,          // float (relative to original image height)
        reflectionGap: 0.0
        }, function(){
        	setInterval( this.moveTo('next'), 3000 );
        });

    $('#highest-wraper').fullpage({
        verticalCentered: true,
        resize : false
    });
    </script>


<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<style type="text/css">
	
		*{
	border:0;
	margin:0;
	padding:0;
}

body, html, #highest-wraper{
  height: 100%;
  width:100%;
}

body {
  font-family: arial, helvetica;
  background-size:100%;
  background-image: url('images/<? echo $result['FAC_NAME'] ?>/themes/background-theme.png');
  background-repeat: no-repeat;
}


/* maestro */
/*======================*/




a {
	text-decoration: none;
}

#main{
	width:100%;
}
/* ==== flipster styles  ==== */

  /*aqui deberia ir el flow*/

.descriptionPromo{
  background:#FFF;
  padding: .2em 1em;
  font-style: italic;
  font-size: 1.5em;
  color: darkorange;
  border-radius: 15px;
  background-color: rgba(255, 255, 255, 0.2);
  text-align: center;
  filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#99ffffff, endColorstr=#99ffffff);
  -ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#99ffffff, endColorstr=#99ffffff)";
}


#il {
	margin-top: 2em !important;
}

  .score{
    color: orange;
    font-size: 1.5em;
  }

  .img-wrap{
    width: 70%;
     text-align: center;
  }

  .img-wrap .img-des{
    max-width: 100%;
  }

.img-des{
max-width: 18em;  
height:18em;
/*border-radius: 50%;*/
}


#wrap-added, #wrap-alert{
padding: 5em 2em;
}

 #wrap-alert p{
  color: darkorange;
  font-size: 2em;
 }

.points{
  width:1em;
  height:1em;
  background-color: #FFF;
  color: darkorange;
 }

#wrap-all{
  position:absolute;
  text-align: center;
  margin: 0 25%;
}

#central{
  background-image: -webkit-gradient(linear, left top, left bottom, from(rgba(255,165,48,0.8)), to(rgba(80,80,80,0)), color-stop(.5,#FFD632));
  width:50%;
  height: auto;
  color: #FFF;
  font-style: italic ;
  font-size: 2.5em;
    text-shadow: 0px 0px 8px rgba(255, 255, 255, 1);
    padding: 0.5em 2em;
    margin:0;
    border:0;
}


  #wrap-all,  #central {
    display: inline-block;
      vertical-align: top;
  }

#showValue{
  background-color: #4A4A4A;
  color:darkorange;
  border-radius: 50%;
  font-size:1.5em;
  padding:1em;
  width: 1em;
  margin-left: 47%;
}


/* ==== flechas   ==== */

#highBar{
 width:100%;
 position:relative;
 top:-100px;
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

#highBar .wrap-buttons:first{
float: left;
}

#highBar .wrap-buttons:last-child{
  float: right;
}

/* ==== flechas ====*/
/* ==== bienvenida ==== */
#wrap-all{
  position:absolute;
  text-align: center;
  margin: 0 25%;
  left:40px;
}

.flip-items{
	padding-bottom: 0 !important;
}


  /*=== item2 === */

  	#item2{
		background-color: #00947A;
		text-align: center;
		height:40em;
	}

.wrap-item2 {
	padding: 1em;
	margin:1em;

}

.wrap-item2 div{

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

.wrap-item2 div:active{
   position:relative;
   -webkit-box-shadow: 0px 1px 0px 0px rgba(0, 0, 0, 0.75);
   -moz-box-shadow:    0px 1px 0px 0px rgba(0, 0, 0, 0.75);
   box-shadow:         0px 1px 0px 0px rgba(0, 0, 0, 0.75);

   -webkit-transition: all 200ms ease-out;
    -moz-transition: all 200ms ease-out;
    -o-transition: all 200ms ease-out;
    transition: all 200ms ease-out;
}



/* ===== item3 ===== */

#item3{
	 background-color: #2A7FB8;
	 height: 110%;

}

#nUs, #eUs{
	border-radius: 15px;
	height: 1em;
	outline:none;
	width: 40%;
	padding: .5em 1em;
	font-size: 2.5em;
	color: white;
	background-color: darkorange;
	box-shadow: 0 10px 10px rgba(0, 0, 0, 0.9);
}

#nUs::-webkit-input-placeholder, #eUs::-webkit-input-placeholder {
	color: #fff;
}

#eUs::-moz-placeholder, #nUs::-moz-placeholder{
	color: #fff;
}

.wrap {
	width:100%;
    margin:2.5em 0;
}



img{
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

/* front pane, placed above back */
.front {
	z-index: 2;
	/* for firefox 31 */
	transform: rotateY(0deg);
}

/* back, initially hidden pane */
.back {
	transform: rotateY(180deg);
}


/* === item 4 ====*/


#item4{
  height: 50em;
  width:100%;
background-image: url(images/blue_opt.png);
background-repeat: no-repeat;
background-size: cover;
overflow: hidden;
padding-top:0em;

}


#camera{
	width:100%;
	height:100%;
	border: 0;
	margin:0;
	padding:0;
}

#led{
	max-width        : 10px;
	height           : 10px;
	border-radius    : 50%;
    background-color : #ff0000;
    text-align       : center;


-webkit-box-shadow: 0px 0px 20px 0px rgba(255, 7, 7, 0.75);
-moz-box-shadow:    0px 0px 20px 0px rgba(255, 7, 7, 0.75);
box-shadow:         0px 0px 20px 0px rgba(255, 7, 7, 0.75);

  -webkit-transition: all 800ms ease-in-out;
  -moz-transition: all 800ms ease-in-out;
  transition: all 800ms ease-in-out;
}


.wrap-camera{
  width: 28%;
  height: 16em;
  text-align: left;
  padding:5em 2em;
  overflow:hidden;
  position:relative;
  left: -50%;

}
.wrap-icon-facility{

	position: relative;
	top:-800px;
	width:26%;
	border-radius: 50%;
    -webkit-transition: all 2500ms ease-in-out;
    -moz-transition: all 2500ms ease-in-out;
    transition: all 2500ms ease-in-out;
    margin-left:12%;
    z-index: 500;
}

.wrap-icon-facility img{
max-width: 75%;
min-width: 75%;
min-height: 10em;
border-radius: 50%;
-webkit-box-shadow :1px 1px 30px 0px rgba(250, 250, 250, 1);
-moz-box-shadow    :1px 1px 30px 0px rgba(250, 250, 250, 1);
 box-shadow        :1px 1px 30px 0px rgba(250, 250, 250, 1);

}

.wrap-image{
	margin: 0;
	background-image: url(images/al-bk.jpg);
    width:43%;
    height:100em;
    position:relative;
    bottom: -1500px;
   
   -webkit-transition: all 1500ms ease-in-out;
    -moz-transition: all 1500ms ease-in-out;
    transition: all 1500ms ease-in-out;

-webkit-box-shadow: inset 16px 0px 14px 0px rgba(50, 50, 50, 0.59);
-moz-box-shadow:    inset 16px 0px 14px 0px rgba(50, 50, 50, 0.59);
box-shadow:         inset 16px 0px 14px 0px rgba(50, 50, 50, 0.59);
}



.catego{
width:94%;
margin: 2em 0;
padding: 0 1em;
background-color: :transparent;
text-align: center;
position: relative;
top:1600px;
    -webkit-transition: all 2500ms ease-in-out;
    -moz-transition: all 2500ms ease-in-out;
    transition: all 2500ms ease-in-out;
}


#user-icon-trophy{

	background-color: #4A4A4A;
	-webkit-box-shadow: 0px 5px 6px 0px rgba(12, 12, 12, 0.75);
    -moz-box-shadow:    0px 5px 6px 0px rgba(12, 12, 12, 0.75);
    box-shadow:         0px 5px 6px 0px rgba(12, 12, 12, 0.75);
    border-radius: 50%;
    font-size: 5em;
    padding:.5em;
    text-align: center;
}

.titulo-cat , .metadatos, .metadatos p, .metados div{
	display:inline-block;
	vertical-align: top;
}

.sum-user{
font-size:3em;
padding-right:.5em;
color:darkorange;
text-align: center;
}


.fa{
   color: darkorange;
  -webkit-transition: all 500ms ease-in-out;
  -moz-transition: all 500ms ease-in-out;
  transition: all 500ms ease-in-out;
}

.metadatos{
position: relative;
float: right;
top:-15px;
}

.slide-items{

border-radius: 15px;
color: white;
height: 70px;
font-size: 2em;
font-style: italic;
font-family: arial, helvetica;
margin: .5em 1em .5em  0;
padding: 0 0 0 .5em ;
text-shadow: 0 1px 10 rgba(255, 255, 255, 0.6);
width:95% !important;
}

.slide-pasive-item{

background: -moz-linear-gradient(top,  #fceabb 0%, #fccd4d 21%, #f8b500 76%, #fbdf93 100%); /* FF3.6+ */
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#fceabb), color-stop(21%,#fccd4d), color-stop(76%,#f8b500), color-stop(100%,#fbdf93)); /* Chrome,Safari4+ */
background: linear-gradient(to bottom,  #fceabb 0%,#fccd4d 21%,#f8b500 76%,#fbdf93 100%); /* W3C */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#fceabb', endColorstr='#fbdf93',GradientType=0 ); /* IE6-9 */
}

.slide-active-item{
background: #b8e1fc; /* Old browsers */
background: -moz-linear-gradient(top,  #b8e1fc 0%, #6ba8e5 0%, #a9d2f3 10%, #90bae4 25%, #90bcea 37%, #90bff0 55%, #a2daf5 83%, #6ba8e5 99%, #bdf3fd 100%); /* FF3.6+ */
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#b8e1fc), color-stop(0%,#6ba8e5), color-stop(10%,#a9d2f3), color-stop(25%,#90bae4), color-stop(37%,#90bcea), color-stop(55%,#90bff0), color-stop(83%,#a2daf5), color-stop(99%,#6ba8e5), color-stop(100%,#bdf3fd)); /* Chrome,Safari4+ */
background: -webkit-linear-gradient(top,  #b8e1fc 0%,#6ba8e5 0%,#a9d2f3 10%,#90bae4 25%,#90bcea 37%,#90bff0 55%,#a2daf5 83%,#6ba8e5 99%,#bdf3fd 100%); /* Chrome10+,Safari5.1+ */
background: -o-linear-gradient(top,  #b8e1fc 0%,#6ba8e5 0%,#a9d2f3 10%,#90bae4 25%,#90bcea 37%,#90bff0 55%,#a2daf5 83%,#6ba8e5 99%,#bdf3fd 100%); /* Opera 11.10+ */
background: -ms-linear-gradient(top,  #b8e1fc 0%,#6ba8e5 0%,#a9d2f3 10%,#90bae4 25%,#90bcea 37%,#90bff0 55%,#a2daf5 83%,#6ba8e5 99%,#bdf3fd 100%); /* IE10+ */
background: linear-gradient(to bottom,  #b8e1fc 0%,#6ba8e5 0%,#a9d2f3 10%,#90bae4 25%,#90bcea 37%,#90bff0 55%,#a2daf5 83%,#6ba8e5 99%,#bdf3fd 100%); /* W3C */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#b8e1fc', endColorstr='#bdf3fd',GradientType=0 ); /* IE6-9 */

}


#contenedor-promos{
	width:52%;
    position: relative;
    top:-50px;
    right: -1500px;
    display:inline-block;
   -webkit-transition: all 1s ease-in-out;
  -moz-transition: all 1s ease-in-out;
  transition: all 1s ease-in-out;
}

.wrap-image, #contenedor-promos{
	vertical-align: top;
	display:inline-block;
}

.puntaje{
	color: darkorange;
	font-style:italic;
	width: 10%;
	display: inline-block;
	vertical-align: top;
	float:right;
    padding: .3em 1em;
    border-radius: 0 15px 15px 0;

background: -moz-linear-gradient(top,  #e2e2e2 0%, #e2e2e2 0%, #e2e2e2 1%, #e2e2e2 1%, #dbdbdb 2%, #e2e2e2 2%, #e2e2e2 2%, #e2e2e2 3%, #e2e2e2 3%, #f9f9f9 16%, #fefefe 75%, #fefefe 89%, #d1d1d1 99%); /* FF3.6+ */
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#e2e2e2), color-stop(0%,#e2e2e2), color-stop(1%,#e2e2e2), color-stop(1%,#e2e2e2), color-stop(2%,#dbdbdb), color-stop(2%,#e2e2e2), color-stop(2%,#e2e2e2), color-stop(3%,#e2e2e2), color-stop(3%,#e2e2e2), color-stop(16%,#f9f9f9), color-stop(75%,#fefefe), color-stop(89%,#fefefe), color-stop(99%,#d1d1d1)); /* Chrome,Safari4+ */
background: -webkit-linear-gradient(top,  #e2e2e2 0%,#e2e2e2 0%,#e2e2e2 1%,#e2e2e2 1%,#dbdbdb 2%,#e2e2e2 2%,#e2e2e2 2%,#e2e2e2 3%,#e2e2e2 3%,#f9f9f9 16%,#fefefe 75%,#fefefe 89%,#d1d1d1 99%); /* Chrome10+,Safari5.1+ */
background: linear-gradient(to bottom,  #e2e2e2 0%,#e2e2e2 0%,#e2e2e2 1%,#e2e2e2 1%,#dbdbdb 2%,#e2e2e2 2%,#e2e2e2 2%,#e2e2e2 3%,#e2e2e2 3%,#f9f9f9 16%,#fefefe 75%,#fefefe 89%,#d1d1d1 99%); /* W3C */


 
}

/*===  item 5====*/


#item5{
	height:40em;
	background-color: #71C187;
}

 #calculationBox{
   width: 100%;
   padding-top:7%;
 }

.cal-blocks{
max-width: 50%;
}
  
.cal-blocks input{

 border-radius: 15px;
 font-size: 2em;
 outline: none;

 margin: .5em 1.5em .5em  0;
 padding: .5em 1em;
 width: 100%;


}


#nonoYes{
  width:100%;
}
 #nonoYes div{
  display: inline-block;
  vertical-align: top;
  cursor:pointer;
  text-align: center;

}

 #nonoYes div{
margin: 1em 6em;

 }


#nonoYes img{
  max-width: 4em;
}

#score-cal{

/* texto */
color:#C1C1C1;
font-size: 3em;
font-style: italic;
text-shadow: 0px 0px 10px rgba(150, 150, 150, 1);

/* == box ===*/

background-color: #4a4a4a;
border-radius: 50%;
height: 1.6em;
width:2em;
vertical-align: bottom;
padding-top: .4em;

}

#wrap-score{
	display: inline-block;
   vertical-align: top;
}




/* ===  efecto cristal ==*/

.Crystal_Box {

	text-align:center;

	
	border: 1px solid rgba(0,0,0,0.5);
	border-bottom: 3px solid rgba(0,0,0,0.5);
	
	-webkit-border-radius: 3px;
	-moz-border-radius: 3px;
	border-radius: 3px;
	
	background: rgba(0,0,0,0.25);

    -o-box-shadow: 
        0 2px 8px rgba(0,0,0,0.5),
        inset 0 1px rgba(255,255,255,0.3),
        inset 0 10px rgba(255,255,255,0.2),
        inset 0 10px 20px rgba(255,255,255,0.25),
        inset 0 -15px 30px rgba(0,0,0,0.3);

    -webkit-box-shadow: 
        0 2px 8px rgba(0,0,0,0.5),
        inset 0 1px rgba(255,255,255,0.3),
        inset 0 10px rgba(255,255,255,0.2),
        inset 0 10px 20px rgba(255,255,255,0.25),
        inset 0 -15px 30px rgba(0,0,0,0.3);

    -moz-box-shadow:
        0 2px 8px rgba(0,0,0,0.5),
        inset 0 1px rgba(255,255,255,0.3),
        inset 0 10px rgba(255,255,255,0.2),
        inset 0 10px 20px rgba(255,255,255,0.25),
        inset 0 -15px 30px rgba(0,0,0,0.3);
	
	box-shadow: 
        0 2px 8px rgba(0,0,0,0.5), /* Exterior Shadow */
        inset 0 1px rgba(255,255,255,0.3), /* Top light Line */
        inset 0 10px rgba(255,255,255,0.2), /* Top Light Shadow */
        inset 0 10px 20px rgba(255,255,255,0.25), /* Sides Light Shadow */
        inset 0 -15px 30px rgba(0,0,0,0.3); /* Dark Background */

	text-decoration: none;
}



/*===== =====*/

#logout{
	position: relative;
	 float:right; 
	 font-size: 1.5em; 
	 padding-right: 2em;
	 color:white;
	 text-shadow: 0px 0px 6px rgba(150, 150, 150, 1);
}



</style>	
</head>
<body>
<input type="hidden" value="" id="secret">
<div id="highest-wraper" >
<div class="section active" id="item1">
<button id="FS" style="width: 100px; height: 50px; background-color: rgba(0, 0 ,0 , 0.4); position: relative; float: left;">&ensp;</button>
  <div id="wrap-all" align="center" >
    <div id="central" align="center">Bienvenidos a <? printf($_GET['name']) ?></div>
  </div>

    <div id="contentFlow" class="ContentFlow" style="margin-top: 10em;">
        <!-- should be place before flow so that contained images will be loaded first -->
        <div class="loadIndicator"><div class="indicator"></div></div>
        <div class="flow">

      <?   
          while($fila = mysqli_fetch_row($Res_Pro)){
      ?>
            <div class="item">
                <img src="images/<? printf($result['FAC_NAME']) ?>/<? printf($fila[4]) ?>.jpg" class="content img-des"/>
                <div class="caption"><? printf($fila[2]) ?></div>
                <input type="hidden" value="<? printf($fila[0]) ?>" class="promoGet">
                <input type="hidden" value="<? printf($fila[1]) ?>" class="scoreGet">
            </div>
                 <?
      }
 mysqli_data_seek($Res_Pro, 0);
      ?>
        </div>
        <div class="globalCaption"></div>
    </div>
<div id="highBar" align="center">
    <div class="wrap-buttons">
        <a href="#item2">&ensp;<div></div></a>
    </div>
</div>
</div>

<div class="section" id="item2" >
    <div class="wrap-item2" align="center" style="margin-top: 2em !important;">
        <a href="#item4" style="text-decoration: none; width:100%">
  	        <div id="to4">Quiero usar mi eMenu Card</div>
  	    </a>
    </div>
    <div class="wrap-item2" align="center">
        <a href="#item3" style="text-decoration: none; width:100%">
  	        <div id="to3">Quiero registrarme</div>
  	    </a>
     </div>
</div>



<div class="section" id="item3">
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
		                    	<img src="image_icons/green.png">
		                    </div>
	                    </div>
                    </div>
	            </div>
            </div>
<div class="wrap" align="center">
	<div style="display: inline-block; vertical-align: top;">
	    <input type="text" id="eUs" placeholder="Ingresa tu E-mail">
        <div class="flip-container" ontouchstart="this.classList.toggle('hover');">
        	<div class="flipper">
        		<div class="front">
        		<!-- front content -->
        		</div>
        		<div class="back">
        			<img src="image_icons/green.png">
        		</div>
        	</div>
        </div>
	</div> 
</div>
</div>

</div>

<div id="item4" class="section" >
    <div id="logout"><i class="fa fa-power-off fa-3x"></i></div>
	<div class="wrap-camera Crystal_Box">
	    <div id="camera"></div>
	<div style="width:100%;" align="center"><p id="led"></p></div>
	</div>
	<div class="wrap-icon-facility"><img src="images/<? echo $result['FAC_NAME'] ?>/themes/background-client.png"></div>
	<div class="wrap-image " style="background-color: #FFF">
	    <div class="catego">
	        <i id="user-icon-trophy" class="fa fa-trophy fa-5x"></i>
	        <p class="sum-user" id="score-user" >0</p>
	    </div>
	 </div>

         <div id="contenedor-promos">
         <? while($fila4 = mysqli_fetch_row($Res_Pro)){ ?>
            <div onclick="takePromo(this)" class="slide-items slide-pasive-item"><? printf($fila4[2])?><input type="hidden" value="<? printf($fila4[0]) ?>" ><p class="puntaje"><? printf($fila4[1])?></p></div>
           <? 
           } 
           ?>   
            <div onclick="window.location.href= '#item5'" class="slide-items slide-pasive-item" style="background-color: blue !important;">Acumula puntos</div>
		</div>
	 
</div>
<div id="item5" class="section">
	<div id="calculationBox" align="center">
        <div class="cal-blocks">
        	<input type="pass" placeholder="Ingrese contraseña" id="gar_pass">
        </div>
        <div class="cal-blocks">
        	<input type="number" id="ticketNumber" placeholder="ingrese numero de boleta">
        </div>
        <div align="center" class="cal-blocks">
            <input type="number" id="cant" placeholder="Ingrese monto boleta">
        </div>
        <div align="center" class="cal-blocks" id="wrap-score">
            <div id="score-cal"></div>
        </div>
         <div id="nonoYes" align="center">
            <div><img src="image_icons/green.png" id="yes2"></div>
            <div><img src="image_icons/red.png" id="no2"></div>
         </div>
   </div>
</div>
</div>

<script src="lib/html5-qrcode.min.js"></script>
<script src="js/jquery-ui.min.js"></script>
<script src="http://cdn.jsdelivr.net/jquery.slick/1.3.9/slick.min.js"></script>
</body>
</html>
<script src="js/sweet-alert.min.js"></script> 
<script src="js/swipe.js"></script>

<script type="text/javascript">

var IR_SWITCH = 0;
var fac_name = getQueryVariable("name");
var fac = getQueryVariable('facility');
var rule = 0;
var code = $("#secret").val();

$(document).on('ready', function(){

$("#contenedor-promos").swipe(function(direction, offset){
  if(offset.x < 30 && direction.y === 'up'){
   $(".slick-prev").trigger('click');
  } else if(offset.x < 30 && direction.y === 'down'){
       $(".slick-next").trigger('click');
  } else {
  }
});

getRules();

	$('#camera').html5_qrcode(function(data){

    if(IR_SWITCH === 1){
    	var nom = document.getElementById('nUs').value;
    	var em = document.getElementById('eUs').value;
    	 insc(nom, em, data);

    }  else if(IR_SWITCH === 2){
       
      IR_SWITCH =0;

     $("#secret").val(data);

         getComensal(data, "", "", "no" );

       	document.querySelector('#led').style.backgroundColor = "#2DDB84";
		document.querySelector('#led').style.boxShadow = "0px 0px 20px 0px rgba(114, 255, 114, 0.75)";
        setTimeout(function(){$('.wrap-camera').fadeOut(300, function(){
                 document.querySelector('.wrap-icon-facility').style.top = "100px";
                 document.querySelector('.wrap-image').style.bottom= "270px"; 
                 document.querySelector('#contenedor-promos').style.right= "-100px"; 
                 document.querySelector('.catego').style.top = "400px";
           })
       }, 2000);
    }
	},
	function(error){
			$('#read_error').html(error);
		}, function(videoError){
			$('#vid_error').html(videoError);
		});

});



$(document).on('ready', function(){

$('#contenedor-promos').slick({
	  vertical: true,
	  slidesToShow: 6,
	  slidesToScroll: 3,
	  touchMove: true,
	  infinite: false
	});

    $('#highest-wraper').fullpage({
        verticalCentered: true,
        resize : false,
        anchors:['item1','item2','item3', 'item4','item5'],
        scrollOverflow: false
    });
    
});


/*=== EVENTS ===*/

$("#logout").on('click', function(){
window.location.reload(true);

});


var typingTimer;               
var doneTypingInterval = 3000;  

$('#eUs').keyup(function(){
    clearTimeout(typingTimer);
    typingTimer = setTimeout(function(){ 
   $('.wrap-camera').animate({ left: '30%' }, 1300, 'easeInOutCubic');
       window.location.href = '#item4';
    }, doneTypingInterval);
});


$('#eUs').keydown(function(){
    clearTimeout(typingTimer);
});


$("#to4").on('click', function(){
	IR_SWITCH = 2;
	$('.wrap-camera').animate({ left: '30%' }, 1300, 'easeInOutCubic');
	
});

$("#to3").on('click', function(){
	IR_SWITCH = 1;
});

$("#FS").on('click', function(){
	requestFullScreen(document.body);
});

$("#cant").on("change keydown paste input keypress", function(){

  var monto = $(this).val();
     var scores = parseInt(monto/rule);
       $("#score-cal").html(scores);
 });



$("#nonoYes > div:first").on('click', function(){
swal({ title: "Estás Seguro?",   
	text: "",  
	 type: "warning",   
	 showCancelButton: true,   
	 confirmButtonColor: "#91D280",   
	 confirmButtonText: "Añadir!",  
	  closeOnConfirm: false },

	  function(){  
        var code = $("#secret").val();
        var scoreV = $("#score-cal").html();
        var pass = $("#gar_pass").val();
        var ticket_number = $("#ticketNumber").val();

        var log = loginGar(pass, function (d){
        	if(d == 0){
               swal("Password no reconocido! :(", "intentalo otra vez" , "error");
        	} else {
        		upDownScoreStr(code, scoreV, "" , d, ticket_number);
        		 $("#score-user").html(parseInt($("#score-user").html()) + parseInt(scoreV));
        	}
        });
	  });
})
/*===============*/




/* === funciones ===*/

function getRules(){
$.ajax({
        type:"POST",
        url: "getRules.php?fac=" + fac,
        success : function(data){
          rule = data;
        }
});
}



function upDownScoreStr(codigo, value, promo_code, gar, ticket){
  $.ajax({
    type: "POST",
    url : 'setConsume.php?codigo=' + codigo + "&fac_code=" + fac +  "&promo_code=" + promo_code + "&ba_value=" + value + "&gar=" + gar +"&ticket=" + ticket,
    success : function (data){
     if(promo_code === ""){
       swal("Puntos añadidos con éxito", "a tu cliente", 'success'); 
        window.location.href= "#item4";
   } else {
   	  swal("Puntos descontados", "Disfruta tu Promo" , 'success'); 
   }
    }, 
    error: function (error){
      alert("no se puede conectar con el servidor");
    }
  });

}

function stopWebCam() {

 var video = $('#html5_qrcode_video').get(0);

    if (video) {

        video.pause();
        video.src = '';
        video.load();
    }

    if (localMediaStream && localMediaStream.stop) {
        localMediaStream.stop();
    }
    stream = null;

}


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

function insc(Nu , El, cod) {

var inject = $.ajax({
	      type:"POST",
	      url: "inscription.php?name=" + Nu + "&email=" + El +  "&codigo=" + cod + "&fac=" + fac
});


inject.done(function(data){

 if(parseInt(data) == 0 || data === '0' ){

    swal( "Alerta", "Codigo Qr no válido",  "error");

 } else {

    document.querySelector('#led').style.backgroundColor = "#2DDB84";
    document.querySelector('#led').style.boxShadow = "0px 0px 20px 0px rgba(114, 255, 114, 0.75)";
    swal({
    	title: "Felicidades!", 
    	text : "Inscripción exitosa ganaste 1 Ba!",
    	type:  "success", 
    	confirmButtonText: "OK" },
           function(){
           }
    	);
    IR_SWITCH = 0;
   $('.wrap-camera').fadeOut(300, function(){
                 document.querySelector('.wrap-image').style.bottom = "270px";
                 document.querySelector('#score-user').innerHTML = '1';
                 document.querySelector('#contenedor-promos').style.right= "-100px"; 
                 document.querySelector('.wrap-icon-facility').style.top = "100px";
                 document.querySelector('.catego').style.top = "400px";
                 window.location.href = "#item4";
                 
           });
        }
});
}




function loginGar(pass, callback){

var varchar;

 $.ajax({ type : "POST", 
           url: "getPersonal.php?pass=" + pass + "&fac_code=" + fac,
           success : function(data){
           	varchar = data;
            callback(varchar);
           },
           error: function(error){
             callback(error);
           }
       });

}


function getComensal(codigo, Nombre, email, argument){

		//first get the current date
	ofa = new Date();
	sdate = ofa.getFullYear() + "-" + (ofa.getMonth()+1) + "-" + ofa.getDate() + " " + ofa.getHours() + ":" + ofa.getMinutes() + ":" + ofa.getSeconds();

	 $.ajax({
		   type:"POST",
		   url: "semantic.php?codigo=" + codigo + "&nombre=" + Nombre + "&email=" + email + "&fac=" + fac + "&io=" + argument + "&date=" + sdate,
           success : function(data){

              if (parseInt(data) === 0 ){
              	swal({ title: "Usuario no reconocido! :(",   
	                  text: "Deseas inscribirte?",  
	                  type: "warning",   
	                  showCancelButton: true, 
	                  cancelButtonText: "No,gracias",  
	                  confirmButtonColor: "#91D280",   
	                  confirmButtonText: "Sí!",  
	                  closeOnConfirm: true },
	                  function(){  
                      window.location.href = "#item2";
                         });
              } else {

                var variables = data.split(',');
                              console.info(data);
                    $("#score-user").html(variables[1]);
                       swal("Bienvenido "  + variables[0], "Disfruta de tus puntos!");
                       IR_SWITCH = 0;
                }
            }
       });
}




function requestFullScreen(element) {
    // Supports most browsers and their versions.
    var requestMethod = element.requestFullScreen || element.webkitRequestFullScreen || element.mozRequestFullScreen || element.msRequestFullscreen;

    if (requestMethod) { // Native full screen.
        requestMethod.call(element);
       
    } else if (typeof window.ActiveXObject !== "undefined") { // Older IE.
        var wscript = new ActiveXObject("WScript.Shell");
        if (wscript !== null) {
            wscript.SendKeys("{F11}");
        }
    }
}



function takePromo(object){

var promoCode = $(object).children('input').val();
var scorePro  = $(object).children('p').html();

$(object).removeClass('slide-pasive-item');
$(object).addClass('slide-active-item');

if(parseInt($("#score-user").html()) <= parseInt(scorePro)) {

swal("No tienes puntos suficientes :(" ,"Sigue Acumulando", "error");

$(object).removeClass( 'slide-active-item');
$(object).addClass('slide-pasive-item');

} else {

   swal({ title: "Quieres consumir esta promoción?",   
	   text: "Se te descontarán " + scorePro + " puntos de tu cuenta",  
	   type: "warning",   
	   showCancelButton: true,
	   confirmButtonColor: "#91D280",   
	   confirmButtonText: "Sí!",  
	   cancelButtonText: "No, Gracias...",
	   closeOnConfirm: false,
	   closeOnCancel: false
	    },
	   function(confirmed){
         if(confirmed === true){
         } else if(confirmed === false || confirmed === undefined) {

 upDownScoreStr($("#secret").val(), parseInt(scorePro)*-1 , promoCode, "" );
     $(object).removeClass('slide-active-item');
              $(object).addClass('slide-pasive-item');
                document.getElementById('score-user').innerHTML =  parseInt(document.getElementById('score-user').innerHTML) - parseInt(scorePro);
                  window.location.href = "#wrap-all";
         } else {

        
         }
	   
	   });

}
}



</script>



