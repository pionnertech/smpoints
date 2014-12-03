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
	<title>Qr Motion</title>
<link rel="stylesheet" type="text/css" href="http://cdn.jsdelivr.net/jquery.slick/1.3.9/slick.css"/>
<link rel="stylesheet" type="text/css" href="css/sweet-alert.css"/>
<link rel="stylesheet" type="text/css" href="jquery.fullPage.css" />
<link rel="stylesheet" type="text/css" href="css/style.css" />
<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet" />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="js/modernizr.custom.53451.js"></script>
<script type="text/javascript" src="js/jquery.easings.min.js"></script>
<script type="text/javascript" src="js/jquery.slimscroll.min.js"></script>
<script type="text/javascript" src="js/jquery.fullPage.min.js"></script>

<style type="text/css">
	
		*{
	border:0;
	margin:0;
	padding:0;
}

/*
@media only screen and (orientation:portrait){
     body{
      width: 1024px;
     }
}
*/

body, html, #highest-wraper{
  height: 100%;
  width:100%;
}

body {
  font-family: arial, helvetica;
  background-size:100%;
  background-image: url(images/fondo_nuevo.png);
  background-repeat: no-repeat;
}

#contentFlow{
  position: relative;
  left: -90px;
}

.globalCaption{
  left: -20px;
}



/* maestro */
/*======================*/




a {
	text-decoration: none;
}


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
  margin:0 25% 15% 25%;
  padding-top: 2em;
}

#central{
  width:50%;
  height: auto;
  color: #9F5000;
  font-style: italic;
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


.wrap-buttons div{
text-shadow: 0px 0px 12px rgba(232, 232, 232, 1);
color:#fff;
font-style: bold;
font-size: 2em;
left: -50px;
position: relative;
}
/* ==== flechas   ==== */

#highBar{
 width:9em;
 position:relative;
 float: right;
 top:20px;
 left: -40px;
 padding: 1em 1.5em;
 background-color: rgba(0,0,0, 0.2);
}

#highBar, .wrap-buttons{

    display:inline-block;
  vertical-align: top;
}

.wrap-buttons{
  height:2em;
  width:8em;
  z-index: 40;
  -webkit-transition: all 1s ease-in-out;
  -moz-transition: all 1s ease-in-out;
  transition: all 1s ease-in-out;
}

.wrap-buttons div{
width: 6em;
height: 2em;
 
}

#highBar .wrap-buttons:first{
float: left;
}

#highBar .wrap-buttons:last-child{
  float: right;
}

/* ==== flechas ====*/
/* ==== bienvenida ==== */


.flip-items{
	padding-bottom: 0 !important;
}


.globalCaption{

  padding-top:3em;
  color:#EFEFEF;
  font-size: 1.2em !important;
  font-family: arial !important;
  font-style: italic;
  background-color: rgba(0,0,0, .2);
  width: auto;
}

  /*=== item2 === */

  	#item2{
    background-image: url(images/fondo_nuevo.png);
    background-size: cover;
    background-repeat: no-repeat;
		text-align: center;
		height:40em;
    position: relative;
     z-index: 1;
	}



/*
.wrap-item2 div{

 color:#FFF;
 font-size: 2em;
 font-style:italic;
 padding: 1em 0;
 max-width: 50%;


background: #ff3019; 
background: -moz-linear-gradient(top,  #ff3019 0%, #cf0404 100%); 
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#ff3019), color-stop(100%,#cf0404)); 
background: -webkit-linear-gradient(top,  #ff3019 0%,#cf0404 100%); 
background: -o-linear-gradient(top,  #ff3019 0%,#cf0404 100%); 
background: -ms-linear-gradient(top,  #ff3019 0%,#cf0404 100%); 
background: linear-gradient(to bottom,  #ff3019 0%,#cf0404 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ff3019', endColorstr='#cf0404',GradientType=0 ); 


    cursor: pointer;
   -webkit-box-shadow: 0px 10px 20px 0px rgba(0, 0, 0, 0.75);
   -moz-box-shadow:    0px 10px 20px 0px rgba(0, 0, 0, 0.75);
   box-shadow:         0px 10px 20px 0px rgba(0, 0, 0, 0.75);
   border-radius: 100px;
}


*/

.wrap-item2 {
 font-size: 2em!important;
 /* This ribbon is based on a 16px font side and a 24px vertical rhythm. I've used em's to position each element for scalability. If you want to use a different font size you may have to play with the position of the ribbon elements */
 cursor:pointer;
 width: 50%;
 position: relative;
 background: -moz-linear-gradient(top,  #ff3019 0%, #cf0404 100%); 
 background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#ff3019), color-stop(100%,#cf0404)); 
 background: -webkit-linear-gradient(top,  #ff3019 0%,#cf0404 100%); 
 background: linear-gradient(to bottom,  #ff3019 0%,#cf0404 100%);
 color: #fff;
 text-align: center;
 padding: 1em 2em; /* Adjust to suit */
 margin: 2em auto 3em; /* Based on 24px vertical rhythm. 48px bottom margin - normally 24 but the ribbon 'graphics' take up 24px themselves so we double it. */
}


.wrap-item2:before, .wrap-item2:after {
 content: "";
 position: absolute;
 display: block;
 bottom: -1em;
 border: 1.5em solid  #F40404;
 z-index: -1;
}

.wrap-item2:before {
 left: -2em;
 border-right-width: 1.5em;
 border-left-color: transparent;
}
.wrap-item2:after {
 right: -2em;
 border-left-width: 1.5em;
 border-right-color: transparent;
}

.wrap-item2 #to3:before, .wrap-item2 #to3:after,
.wrap-item2 #to4:before, .wrap-item2 #to4:after {
 content: "";
 position: absolute;
 display: block;
 border-style: solid;
 border-color: #CF0404 transparent transparent transparent;
 bottom: -1em;
}

.wrap-item2 #to3:before,
.wrap-item2 #to4:before {
 left: 0;
 border-width: 1em 0 0 1em;
}

.wrap-item2 #to3:after,
.wrap-item2 #to4:after {
 right: 0;
 border-width: 1em 1em 0 0;
}


#item2{
	padding-top: 8em;
}

/* ===== item3 ===== */

#item3{
	 background-image: url(images/fondo_nuevo.png);
	 height: 40em;
	 padding-top: 2em;
}

#nUs, #eUs{
  
	height: 1em;
	outline:none;
	width: 90%;
	padding: .5em 1em;
	font-size: 2.5em;
	color: white;
	background: #F40404; /* Old browsers */
 /* IE6-9 */

}

.credentials {
 font-size: 16px !important;
 /* This ribbon is based on a 16px font side and a 24px vertical rhythm. I've used em's to position each element for scalability. If you want to use a different font size you may have to play with the position of the ribbon elements */

 width: 50%;
 position: relative;
 background: transparent;
 color: #fff;
 text-align: center;
}
.credentials:before, .credentials:after {
 content: "";
 position: absolute;
 display: block;
 border: 2.5em solid #F40404;
 z-index: -1;
}

.credentials:before {
 left: -3.6em;
 border-right-width: 1.5em;
 border-left-color: transparent;
 bottom: 0em;
}

.credentials:after {
 right: -4.5em;
 border-left-width: 1.5em;
 border-right-color: transparent;
 bottom: 0em;
}

#nUs:before, #nUs:after,
#eUs:before, #eUs:after {
 content: "";
 position: absolute;
 display: block;
 border-style: solid;
 border-color: #F40404 transparent transparent transparent;

}

#nUs:before, #eUs:before {
 left: 0;
 border-width: 1em 0 0 1em;
}

#eUs:after, #eUs:after {
 right: 0;
 border-width: 1em  1em 0  0;
}

.wrap, .calculationBox { position: relative; z-index: 1; }


/* calculationBox cal-blocks  #gar_pass #ticketNumber"
#cant */



#nUs::-webkit-input-placeholder, #eUs::-webkit-input-placeholder {
	color: #fff;
}

#eUs::-moz-placeholder, #nUs::-moz-placeholder{
	color: #fff;
}

.wrap {
    margin:2.5em 0;
}


.grand-wrap{
margin-top: 0%;
height: 40em;
}

img{
  max-width: 100%;
  min-width: 100%;
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
background-image: url(images/fondo_nuevo.png);
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
	max-width       : 10px;
	height          : 10px;
	border-radius   : 50%;
    background-color: #ff0000;
    text-align: center;


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
  float:right;
  right:-200px;
    -webkit-transition: all 2500ms ease-in-out;
    -moz-transition: all 2500ms ease-in-out;
    transition: all 2500ms ease-in-out;
    margin-right:12%;
    z-index: 500;
}

.wrap-icon-facility img{
max-width: 75%;
min-width: 75%;
min-height: 10em;
border: 10px solid red;
-webkit-box-shadow :1px 1px 30px 0px rgba(0, 0, 0, .5);
-moz-box-shadow    :1px 1px 30px 0px rgba(0, 0, 0, .5);
 box-shadow        :1px 1px 30px 0px rgba(0, 0, 0, .5);
}


.wrap-image{
	margin: 0;
	background-image: url(images/al-bk.jpg);
  width:43%;
  height:50em;
  position:relative;
  bottom: -1500px;
  float: right;
  -webkit-transition: all 1500ms ease-in-out;
  -moz-transition: all 1500ms ease-in-out;
  transition: all 1500ms ease-in-out;

  -webkit-box-shadow: inset 16px 0px 14px 0px rgba(50, 50, 50, 0.59);
  -moz-box-shadow:    inset 16px 0px 14px 0px rgba(50, 50, 50, 0.59);
  box-shadow:         inset 16px 0px 14px 0px rgba(50, 50, 50, 0.59);
}


.catego:before{
  content: "Tienes";
  color: darkred;
  position:relative;
  font-size:24px;
  top:-60px;
}

.catego:after{
  content: "Puntos";
  color: darkred;
  position:relative;
  font-size:24px;
  top:60px;
}

.catego{
width:5%;
margin: 2em 0;
padding: .8em 2em .8em 2em;
border-radius: 50%;
background: -moz-linear-gradient(top,  #ff3019 0%, #cf0404 100%); /* FF3.6+ */
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#ff3019), color-stop(100%,#cf0404)); /* Chrome,Safari4+ */
text-align: center;
position: relative;
float: right;
right:-405px;
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
color:#FFF;
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
margin: .5em 1em .5em  0;
width:95% !important;
cursor: pointer;
}


.bkPro{
color: white;
font-size: 2em;
font-style: italic;
font-family: arial, helvetica;
padding: 0 0 0 .5em;
text-shadow: 0 1px 10 rgba(255, 255, 255, 0.6);
width:80%;
}

.bkPro:active, .puntaje:active{
  background: -moz-linear-gradient(top,  #fefcea 0%, #f1da36 100%); /* FF3.6+ */
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#fefcea), color-stop(100%,#f1da36)); /* Chrome,Safari4+ */
background: -webkit-linear-gradient(top,  #fefcea 0%,#f1da36 100%); /* Chrome10+,Safari5.1+ */

}

.bkPro, .puntaje{
display: inline-block;
vertical-align: top;
}

.bkPro-pasive-item{

background: #ff3019; /* Old browsers */
background: -moz-linear-gradient(top,  #ff3019 0%, #cf0404 100%); /* FF3.6+ */
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#ff3019), color-stop(100%,#cf0404)); /* Chrome,Safari4+ */
background: -webkit-linear-gradient(top,  #ff3019 0%,#cf0404 100%); /* Chrome10+,Safari5.1+ */
background: -o-linear-gradient(top,  #ff3019 0%,#cf0404 100%); /* Opera 11.10+ */
background: -ms-linear-gradient(top,  #ff3019 0%,#cf0404 100%); /* IE10+ */
background: linear-gradient(to bottom,  #ff3019 0%,#cf0404 100%); /* W3C */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ff3019', endColorstr='#cf0404',GradientType=0 ); /* IE6-9 */
}

.bkPro-active-item{
background: #b8e1fc; /* Old browsers */
background: -moz-linear-gradient(top,  #b8e1fc 0%, #6ba8e5 0%, #a9d2f3 10%, #90bae4 25%, #90bcea 37%, #90bff0 55%, #a2daf5 83%, #6ba8e5 99%, #bdf3fd 100%); /* FF3.6+ */
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#b8e1fc), color-stop(0%,#6ba8e5), color-stop(10%,#a9d2f3), color-stop(25%,#90bae4), color-stop(37%,#90bcea), color-stop(55%,#90bff0), color-stop(83%,#a2daf5), color-stop(99%,#6ba8e5), color-stop(100%,#bdf3fd)); /* Chrome,Safari4+ */
background: -webkit-linear-gradient(top,  #b8e1fc 0%,#6ba8e5 0%,#a9d2f3 10%,#90bae4 25%,#90bcea 37%,#90bff0 55%,#a2daf5 83%,#6ba8e5 99%,#bdf3fd 100%); /* Chrome10+,Safari5.1+ */
background: -o-linear-gradient(top,  #b8e1fc 0%,#6ba8e5 0%,#a9d2f3 10%,#90bae4 25%,#90bcea 37%,#90bff0 55%,#a2daf5 83%,#6ba8e5 99%,#bdf3fd 100%); /* Opera 11.10+ */
background: -ms-linear-gradient(top,  #b8e1fc 0%,#6ba8e5 0%,#a9d2f3 10%,#90bae4 25%,#90bcea 37%,#90bff0 55%,#a2daf5 83%,#6ba8e5 99%,#bdf3fd 100%); /* IE10+ */
background: linear-gradient(to bottom,  #b8e1fc 0%,#6ba8e5 0%,#a9d2f3 10%,#90bae4 25%,#90bcea 37%,#90bff0 55%,#a2daf5 83%,#6ba8e5 99%,#bdf3fd 100%); /* W3C */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#b8e1fc', endColorstr='#bdf3fd',GradientType=0 ); /* IE6-9 */
cursor: pointer;
}


#contenedor-promos{
	width:52%;
  position: relative;
  top:-50px;
  right: 1500px;
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
	color: #fff;
	font-style:italic;
	width: 4%;
  border:4px dashed #F6E8CB;
	display: inline-block;
	vertical-align: top;
	float:right;
  padding: 1em 1em;
  text-align: center;
  border-radius: 50%;

background: #ff3019; /* Old browsers */
background: -moz-linear-gradient(top,  #ff3019 0%, #cf0404 100%); /* FF3.6+ */
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#ff3019), color-stop(100%,#cf0404)); /* Chrome,Safari4+ */
background: -webkit-linear-gradient(top,  #ff3019 0%,#cf0404 100%); /* Chrome10+,Safari5.1+ */
background: -o-linear-gradient(top,  #ff3019 0%,#cf0404 100%); /* Opera 11.10+ */
background: -ms-linear-gradient(top,  #ff3019 0%,#cf0404 100%); /* IE10+ */
background: linear-gradient(to bottom,  #ff3019 0%,#cf0404 100%); /* W3C */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ff3019', endColorstr='#cf0404',GradientType=0 ); /* IE6-9 */
}

/*===  item 5====*/


#item5{
	height:40em;
	background-image: url(images/fondo_nuevo.png);

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

.cal-blocks:before {
 left: -3.6em;
 border-right-width: 1.5em;
 border-left-color: transparent;
 bottom: 0em;
}

.cal-blocks:after {
 right: -4.5em;
 border-left-width: 1.5em;
 border-right-color: transparent;
 bottom: 0em;
}

.cal-blocks input:before, .cal-blocks input:after{
 content: "";
 position: absolute;
 display: block;
 border-style: solid;
 border-color: #F40404 transparent transparent transparent;

}

.cal-blocks input:before {
 left: 0;
 border-width: 1em 0 0 1em;
}

.cal-blocks input:after {

 right: 0;
 border-width: 1em  1em 0  0;
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

.globalCaption{
  max-width:10em;
  font-size:2em !important;
  text-shadow: 0px 0px 6px rgba(150, 150, 150, 1);
}

.caption{
  position: relative;
  top:-50px;
}

.item{
  width:15em;
}

.dg-wrapper > a > img{
border: 6px solid white;
border-radius: 15px;

}

#instruction{
  color: white; 
  font-style: 3em; 
  font-weight: 700;
  width: 20em; 
  margin:  0 25% 0 33%;
  background: #ff3019; /* Old browsers */
background: -moz-linear-gradient(top,  #ff3019 0%, #cf0404 100%); /* FF3.6+ */
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#ff3019), color-stop(100%,#cf0404)); /* Chrome,Safari4+ */
background: -webkit-linear-gradient(top,  #ff3019 0%,#cf0404 100%); /* Chrome10+,Safari5.1+ */
background: -o-linear-gradient(top,  #ff3019 0%,#cf0404 100%); /* Opera 11.10+ */
background: -ms-linear-gradient(top,  #ff3019 0%,#cf0404 100%); /* IE10+ */
background: linear-gradient(to bottom,  #ff3019 0%,#cf0404 100%); /* W3C */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ff3019', endColorstr='#cf0404',GradientType=0 ); /* IE6-9 */

  text-align: center;
  position: relative;
  display: table;
  text-transform: uppercase;
  letter-spacing: -0.02em;
  line-height: 1.2em;
  font-family: arial, sans-serif;
  border-radius: 30px;
  padding: .7em 1.2em;
  top:500px;

  -webkit-transition: all 1s ease-in-out;
  -moz-transition: all 1s ease-in-out;
  transition: all 1s ease-in-out;
}

</style>	
</head>
<body>
<input type="hidden" value="" id="secret">
<div id="highest-wraper" >
<div class="section active" id="item1">
<button id="fullscreen" style="z-index:99999; width: 130px; height: 50px; background-color: rgba(0, 0 ,0 , 0.4); position: relative; float: left;cursor:pointer;" onclick="requestFullScreen(document.body)"></button>
  <div id="wrap-all" align="center" >
    <div id="central" align="center"><? printf($_GET['name']) ?></div>
  </div>

   <div class="container">

      <section id="dg-container" class="dg-container">
        <div class="dg-wrapper">

      <?  
      $i = 0;

          while($fila = mysqli_fetch_row($Res_Pro)){
          
      ?>    
          <a href="#">
          <img src="images/<? printf($result['FAC_NAME']) ?>/<? printf($fila[4]) ?>.jpg" alt="image<? printf(substr('0' . $i, -2)) ?>">
              <input type="hidden" value="<? printf($fila[0]) ?>" class="promoGet">
              <input type="hidden" value="<? printf($fila[1]) ?>" class="scoreGet">
          </a>
      <?
      $i = $i + 1;
      }
 mysqli_data_seek($Res_Pro, 0);
      ?>
        </div>
        <!--nav>  
          <span class="dg-prev">&lt;</span>
          <span class="dg-next">&gt;</span>
        </nav-->
      </section>
 </div>

<div id="highBar" align="center">
    <div class="wrap-buttons">
        <a href="#item2"><div>ENTRAR</div></a>
    </div>
</div>
</div>

<div class="section" id="item2" data-anchor="item2-slide">
    <div class="wrap-item2" align="center" style="margin-top: 2em !important;">
  	    <div id="to4">Quiero usar mi eMenu Card</div>
    </div>
    <div class="wrap-item2" align="center">
  	    <div id="to3">Quiero registrarme</div>
    </div>
</div>
<div class="section" id="item3" data-anchor="item3-slide">
	   <div class="grand-wrap" align="center">
            <div class="wrap" align="center">
	            <div style="display: inline-block; vertical-align: top;" class="credentials">
	                <input type="text" id="nUs" placeholder="Ingresa tu nombre">
            </div>
           </div>
<div class="wrap" align="center">
	<div style="display: inline-block; vertical-align: top;" class="credentials">
	    <input type="text" id="eUs" placeholder="Ingresa tu E-mail">
	</div> 

</div>
<button id="inscrip" style="padding: 1em 2em; background-color: red; color: #fff; text-align: center; font-size:2em; font-style: italic; display:none;"></button>
</div>
</div>

<div id="item4" class="section" data-anchor="item4-slide">
    <div id="logout"><i class="fa fa-power-off fa-3x"></i></div>
	<div class="wrap-camera Crystal_Box">
	   <div id="camera"></div>
	    <div style="width:100%;" align="center"><p id="led"></p></div>
	</div>
  <div id="instruction">Acerca el código de tu tarjeta a la camara</div>
	<div class="wrap-icon-facility"><img src="images/<? echo $result['FAC_NAME'] ?>/themes/background-client.png"></div>
        <div class="catego" id="catego">
	         <p class="sum-user" id="score-user">0</p>
        </div>
      <div id="contenedor-promos">
         <? while($fila4 = mysqli_fetch_row($Res_Pro)){ ?>
             <div class="slide-items"><div class="bkPro bkPro-pasive-item"><? printf($fila4[2])?></div><input type="hidden" value="<? printf($fila4[0]) ?>" ><p class="puntaje"><? printf($fila4[1])?></p></div>
           <? } ?>   
      <div onclick="window.location.href= '#item5'" class="bkPro-active-item" style="color:#FFF; font-style: italic; font-size:1.5em;" >Acumula puntos</div>
		</div>
</div>
<div id="item5" data-anchor="item5-slide" class="section">
	<div id="calculationBox" align="center">
        <div class="cal-blocks">
        	<input type="pass" placeholder="Ingrese contraseña" id="gar_pass">
        </div>
        <div class="cal-blocks">
        	<input type="text" placeholder="ingrese numero de boleta" id="ticketNumber">
        </div>
        <div align="center" class="cal-blocks">
            <input type="text" id="cant" placeholder="Ingrese monto boleta">
        </div>
        <div align="center" class="cal-blocks" id="wrap-score">
            <div id="score-cal"></div>
            <p id="point" style="color: gray; font-size:2.5em; font-style: italic">Punto<p>
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
<script type="text/javascript" src="js/jquery.gallery.js"></script>
<script type="text/javascript">
        $(function() {
          $('#dg-container').gallery({
          autoplay  : true,
          interval    : 5000
        });

      // use new shinejs.Shine(...) if Shine is already defined somewhere else
      // var shine = new shinejs.Shine(document.getElementById("headline"));


      });
</script>
</body>
</html>

<script src="java/jquery.flipster.js"></script>
<script src="js/sweet-alert.min.js"></script> 
<script src="js/swipe.js"></script>
<script type="text/javascript">

var IR_SWITCH = 0;
var fac_name = getQueryVariable("name");
var fac = getQueryVariable('facility');
var rule = 0;
var code = $("#secret").val();
var univ_timer;

// checkeado;

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

	$('#camera').html5_qrcode( function (data){

    if(IR_SWITCH === 1){

    	var nom = document.getElementById('nUs').value;
    	var em = document.getElementById('eUs').value;
    	 insc(nom, em, data);

    } else if (IR_SWITCH === 2){

     IR_SWITCH = 0;
         $("#secret").val(data);
             getComensal(data, "", "", "no" );
    }

	},
	function(error){
			$('#read_error').html(error);
		}, function(videoError){
			$('#vid_error').html(videoError);
		});

$('#contenedor-promos').slick({
    vertical: true,
    slidesToShow: 6,
    slidesToScroll: 3,
    touchMove: true,
    infinite: false
  });

    $('#highest-wraper').fullpage({
        verticalCentered: true,
        resize : true
    });

});

//checked;

/*=== EVENTS ===*/

$("#logout").on('click', function(){
      resetAlpha();
});

var typingTimer;               
var doneTypingInterval = 1500;  

$('#eUs').keyup( function() {

    clearTimeout(typingTimer);

  $('#inscrip').css({ display : "none"});

    typingTimer = setTimeout(function(){ 
      
      var Bolenn = IsEmail($('#eUs').val());

      if(!Bolenn){

        $('#inscrip').css({ display : "block"});
         $('#inscrip').text('email no valido').fadeIn('slow');

      } else {

      $('#inscrip').css({ display : "none"});
      checkEmail($('#eUs').val());

      }
     
    }, doneTypingInterval);
});


$('#eUs').keydown(function(){
    clearTimeout(typingTimer);
});


$("#to4").on('click', function(){
	window.location.href = "#item4";
	IR_SWITCH = 2;
	$('.wrap-camera').animate({ left: '30%' }, 1300, 'easeInOutCubic');
  document.querySelector('#instruction').style.top = "-1px";
	
});

$("#to3").on('click', function(){
	window.location.href = "#item3";
	IR_SWITCH = 1;
});


$("#inscrip").on('click', function(){
  if ($(this).text() ===  "email no válido"){

  } else {
   window.location.href = "#item4";
    $('.wrap-camera').animate({ left: '30%' }, 1300, 'easeInOutCubic');
      document.querySelector('#instruction').style.top = "-1px"; 
  }

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
        var ticket = $("#ticketNumber").val();
        var cant = $("#cant").val();
        var log = loginGar(pass, function (d){
        	
        	if(d == 0){
               swal("Password no reconocido! :(", "intentalo otra vez" , "error");
        	} else {
        		upDownScoreStr(code, scoreV, "" , d, ticket, cant );
        		 $("#score-user").html(parseInt($("#score-user").html()) + parseInt(scoreV));
        	} 
        });
	  });
});

//checked

$('.slide-items').on('click', function(){
  takePromo($(this));
    clearInterval(univ_timer);
});


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

function upDownScoreStr(codigo, value, promo_code, gar, ticket, ta){
  var fecha = new Date();
  var fecha_or = fecha.getFullYear() + "-" + ('0' + (fecha.getMonth()+1)).slice(-2) + "-" + ('0' + fecha.getDate()).slice(-2)  + " " + fecha.getHours() + ":" + fecha.getMinutes() + ":" + fecha.getSeconds();

  console.info('setConsume.php?codigo=' + codigo + "&fac_code=" + fac +  "&promo_code=" + promo_code + "&ba_value=" + value + "&gar=" + gar + "&ticket=" + ticket + "&ta=" + ta + "&fech=" + fecha_or);

  $.ajax({
    type: "POST",
    url : 'setConsume.php?codigo=' + codigo + "&fac_code=" + fac +  "&promo_code=" + promo_code + "&ba_value=" + value + "&gar=" + gar + "&ticket=" + ticket + "&ta=" + ta + "&fech=" + fecha_or,
    success : function (data){

     if(promo_code === ""){

       swal( value + " Puntos añadidos con éxito", "a tu cliente + 1 punto por visita", 'success'); 
        window.location.href= "#item1";
        resetAlpha();
   } else { 
   	  swal("Puntos descontados", "Disfruta tu Promo, te quedan " + $("#score-user").html() + "puntos" , 'success'); 
   }
    }, 
    error: function (error){
      alert("no se puede conectar con el servidor");
    }
  });

}

//checked
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
    	text : "Inscripción exitosa ganaste 1 punto!",
    	type:  "success",
      timer: 2500,
    	confirmButtonText: "OK" });

    IR_SWITCH = 0;
   $('.wrap-camera').fadeOut(300, function(){
                 
                 document.querySelector('#score-user').innerHTML = '1';
                 document.querySelector('#contenedor-promos').style.right= "-50px"; 
                 document.querySelector('.wrap-icon-facility').style.top = "80px";
                 document.querySelector('.catego').style.top = "350px";
                 document.querySelector('#instruction').style.visibility = "hidden";
                 document.querySelector('#instruction').style.top = "500px";
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
console.info(data);

switch(parseInt(data)){

  case 404:
    swal({ title: "Codigo QR no válido", type:"error", timer: 2000});
    IR_SWITCH = 2;
  break;
  case 2:

  swal({ title: "Codigo QR no reconocido", type:"error", timer: 2000});
      IR_SWITCH = 2;
  break;
  case 0:

                  swal({ title: "Usuario no reconocido! :(",   
                    text: "Deseas inscribirte?",  
                    type: "warning",   
                    showCancelButton: true, 
                    cancelButtonText: "No,gracias",  
                    confirmButtonColor: "#91D280",   
                    confirmButtonText: "Sí!",  
                    closeOnConfirm: true },
                    function(){  
                      window.location.href = "#item3";
                      IR_SWITCH = 1;
                         });
               IR_SWITCH = 2;
  break;
  default:

  var variables = data.split(',');
    $("#score-user").html(variables[1]);
      swal({ title : "Bienvenido "  + variables[0], text: "Disfruta de tus puntos!", timer : 2500});
        IR_SWITCH = 0;
        document.querySelector('#led').style.backgroundColor = "#2DDB84";
        document.querySelector('#led').style.boxShadow = "0px 0px 20px 0px rgba(114, 255, 114, 0.75)";
        setTimeout(function(){$('.wrap-camera').fadeOut(300, function(){
                 document.querySelector('.wrap-icon-facility').style.top = "80px";
                 document.querySelector('#contenedor-promos').style.right= "-50px"; 
                 document.querySelector('.catego').style.top = "350px";
                 document.querySelector('#instruction').style.top = "500px";
                 document.querySelector('#instruction').style.visibility = "hidden";
           })
       }, 2000);
          univ_timer = setTimeout(function(){
            resetAlpha();
                  }, 60000);

               }
            }
         });
}
        
function requestFullScreen(element) {
    // Supports most browsers and their versions.
    var requestMethod = element.requestFullScreen || element.webkitRequestFullScreen(element.ALLOW_KEYBOARD_INPUT) || element.mozRequestFullScreen || element.msRequestFullscreen;

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
                window.location.href = "#item1";
         } else {

        
         }
	   
	   });
}
}


function IsEmail(email) {
  var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  return regex.test(email);
}



function checkEmail(email){

$.ajax({
  type: "POST",
  url : 'RvTmTTperN.php?keyvar=' + email,
  success : function (data){
    console.info(data);
       switch(data){
          case "Av" :
           swal({ title : "Email ya inscrito!", text: "Prueba Con otro!", type:"warning", timer: 2500 });
             break;
          case "x":
            $('#inscrip').css({ display : "block"});
            $('#inscrip').text('Entrar').fadeIn('slow');
            window.location.href= "#item3";
       } 
  },
  error: function (error){

  }
})
}


function resetAlpha(){
  IR_SWITCH = 0;
  $("#secret").val('');
  document.querySelector('#instruction').style.top = "500px";
  document.querySelector('#instruction').style.visibility = "visible";
  document.querySelector('#led').style.backgroundColor = "#ff0000";
  document.querySelector('#led').style.boxShadow = "0px 0px 20px 0px rgba(255, 7, 7, 0.75);";
  document.querySelector('#score-user').innerHTML = '0';
  document.querySelector('#contenedor-promos').style.right= "1500px"; 
  document.querySelector('.wrap-icon-facility').style.top = "-800px";
  document.querySelector('.catego').style.top = "1600px";
  document.getElementById('nUs').value = '';
  document.getElementById('eUs').value = '';
  $('.wrap-camera').fadeIn('slow');
  $('.wrap-camera').animate({ left: '-30%' }, 1300, 'easeInOutCubic');
  var univ_timer ="";
  document.getElementById('gar_pass').value= "";
  document.getElementById('ticketNumber').value= "";
  document.getElementById('cant').value= "";
  setTimeout(function(){
   window.location.href = "#item1"}, 
   3000);





}

</script>



