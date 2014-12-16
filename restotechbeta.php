<?php header('Content-Type: text/html; charset=utf-8');

$datos = mysqli_connect('localhost', "root", "D1sjjDlvD0", "SM_usr10000");



$Query = "SELECT FAC_NAME FROM FAC WHERE FAC_CODE = " . $_GET['facility'];
$result = mysqli_fetch_assoc(mysqli_query($datos,$Query));

$Query_Pro = "SELECT PRO_CODE, PRO_CANT_VAL, PRO_DESCRIP, SUBSTRING(PRO_DATE,1,10), PRO_CODE FROM PRO WHERE PRO_FAC ='" .  $result['FAC_NAME'] . "'";
$Res_Pro = mysqli_query($datos, $Query_Pro);

$Query_rule = "SELECT RULE_CANT_SCORE FROM RULES WHERE RULE_FAC_CODE = " . $_GET['facility'];
$res_rules = mysqli_fetch_assoc(mysqli_query($datos, $Query_rule));


?>

<!DOCTYPE html>
<html>
<head>
	<title>SmilePoints</title>
  <meta name="viewport" content="width=device-width, user-scalable=no">
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/jquery.slick/1.3.9/slick.css"/>
<link rel="stylesheet" type="text/css" href="css/sweet-alert.css"/>
<link rel="stylesheet" type="text/css" href="css/style.css" />
<link rel="stylesheet" type="text/css" href="css/patternlock.css"/>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="js/modernizr.custom.53451.js"></script>
<script type="text/javascript" src="js/jquery.easings.min.js"></script>
<script type="text/javascript" src="js/jquery.slimscroll.min.js"></script>


<style type="text/css">
	
*{border:0;margin:0;padding:0;}
@media only screen and (orientation:portrait){
  body{
    width: 1024px;
  }

}

@media screen and (max-width: 1024px){
  body{
    max-width:1020px;
  }

  html, body {
    overflow: hidden;
  }
}


@font-face {

    font-family: 'eth_serifregular';
    src: url('fonts/ethserifethon-webfont.eot');
    src: url('fonts/ethserifethon-webfont.eot?#iefix') format('embedded-opentype'),
         url('fonts/ethserifethon-webfont.woff2') format('woff2'),
         url('fonts/ethserifethon-webfont.woff') format('woff'),
         url('fonts/ethserifethon-webfont.ttf') format('truetype'),
         url('fonts/ethserifethon-webfont.svg#eth_serifregular') format('svg');
    font-weight: normal;
    font-style: normal;

}

@font-face {
    font-family: 'eth_serifblack';
    src: url('fonts/ethserifblackethon-webfont.eot');
    src: url('fonts/ethserifblackethon-webfont.eot?#iefix') format('embedded-opentype'),
         url('fonts/ethserifblackethon-webfont.woff2') format('woff2'),
         url('fonts/ethserifblackethon-webfont.woff') format('woff'),
         url('fonts/ethserifblackethon-webfont.ttf') format('truetype'),
         url('fonts/ethserifblackethon-webfont.svg#eth_serifblack') format('svg');
    font-weight: normal;
    font-style: normal;

}


#highest-wraper{
  width:100%;
  height:100%;
}
body, html{
  max-height: 100vh;
  max-width:100%;
  overflow: hidden;
}

body {
  font-family: arial, helvetica;
  background-size:cover;
  background-image: url(images/fondo_nuevo.png);
  background-repeat: no-repeat;
}



/* maestro */
/*======================*/




a {
	text-decoration: none;
}

.container{
background: #ffffff; /* Old browsers */
background: -moz-linear-gradient(top,  #ffffff 0%, #ededed 0%, #b2b2b2 0%, #f3f3f3 22%, #ffffff 100%); /* FF3.6+ */
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#ffffff), color-stop(0%,#ededed), color-stop(0%,#b2b2b2), color-stop(22%,#f3f3f3), color-stop(100%,#ffffff)); /* Chrome,Safari4+ */
background: -webkit-linear-gradient(top,  #ffffff 0%,#ededed 0%,#b2b2b2 0%,#f3f3f3 22%,#ffffff 100%); /* Chrome10+,Safari5.1+ */
background: -o-linear-gradient(top,  #ffffff 0%,#ededed 0%,#b2b2b2 0%,#f3f3f3 22%,#ffffff 100%); /* Opera 11.10+ */
background: -ms-linear-gradient(top,  #ffffff 0%,#ededed 0%,#b2b2b2 0%,#f3f3f3 22%,#ffffff 100%); /* IE10+ */
background: linear-gradient(to bottom,  #ffffff 0%,#ededed 0%,#b2b2b2 0%,#f3f3f3 22%,#ffffff 100%); /* W3C */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ffffff', endColorstr='#ffffff',GradientType=0 ); /* IE6-9 */
height:75%;

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
  position:relative;
  text-align: center;
  width:100%;
}

#central{
  width:100%;
  height: auto;
  color: #9F5000;
  font-weight: bolder;
  font-size: 2.5em;
    text-shadow: 0px 0px 8px rgba(255, 255, 255, 1);
    padding: 0em 0em .5em 0;
    margin:0;
    border:0;
font-family: 'eth_serifblack';
text-align: center;
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
 width:12em;
 position:relative;
 float: right;
 top:-150px;
 left: -40px;
 padding: 1em 1.5em;

}

#highBar a, #highBar a:active , #highBar a:focus{
  outline: none;
}


#highBar, .wrap-buttons{

    display:inline-block;
  vertical-align: top;
}

#highbar img{
  max-width: 100%;
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


 #item1{
      height:109vh;
 }

  	#item2{
    background-size: cover;
    background-repeat: no-repeat;
		text-align: center;
		height:100vh;
    position: relative;
     z-index: 1;
     display: none;
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
 font-family: 'eth_serifregular';
 width: 50%;
 position: relative;
 background: -moz-linear-gradient(top,  #ff3019 0%, #cf0404 100%); 
 background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#ff3019), color-stop(100%,#cf0404)); 
 background: -webkit-linear-gradient(top,  #ff3019 0%,#cf0404 100%); 
 background: linear-gradient(to bottom,  #ff3019 0%,#cf0404 100%);
 color: #fff;
 text-align: center;
 top:3em;
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


/* ===== item3 ===== */

#item3{
	 background-image: url(images/fondo_nuevo.png);
   background-size: 100% 130%;
	 height:100vh;
	 padding-top: 2em;
   display:none;
}

#nUs, #eUs{
  
	height: 1em;
	outline:none;
	width: 90%;
	padding: .5em 1em;
	font-size: 2em;
	color: #fff;
  font-weight: 800;
	background: #F40404; /* Old browsers */
  font-family: 'eth_serifregular';
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
 border: 2em solid #F40404;
 z-index: -1;
}

.credentials:before {
 left: -3em;
 border-right-width: 1.5em;
 border-left-color: transparent;
 bottom: 0em;
}

.credentials:after {
 right: -3.2em;
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
 border-width: .5em 0 0 1em;
}

#eUs:after, #eUs:after {
 right: 0;
 border-width: 1em  1em 0  0;
}

.wrap, .calculationBox { position: relative; z-index: 1; }


/* calculationBox cal-blocks  #gar_pass #ticketNumber"
#cant */



#nUs::-webkit-input-placeholder, #eUs::-webkit-input-placeholder, .cal-blocks input::-webkit-input-placeholder{
	color: #fff !important;
  font-weight: 800;

}

#eUs::-moz-placeholder, #nUs::-moz-placeholder , .cal-blocks input::-moz-placeholder{
	color: #fff !important;
  font-weight: 800;

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


/* === item 4 ====*/


#item4{

height:100vh;
width:100%;
background-image: url(images/fondo_nuevo.png);
background-repeat: no-repeat;
background-size: cover;
overflow: hidden;
padding-top:0em;
display:none;

}


#camera{
	width:480px;
	height:288px;
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
  width: 490px;
  height: 300px;
  text-align: left;
  padding:5em 2em;
  overflow:hidden;
  position:relative;
  left: -50%;
  border: 1em solid red;
  top:2em;
}


.wrap-icon-facility{
	position: relative;
	top:-1200px;
	width:26%;
  max-height:3em !important;
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
max-height: 10em;
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
  color: white;
  background-color: red;
  position:relative;
  font-size:30px;
  font-family: "eth_serifregular";
  font-weight: 800;
  top:-45px;
  right:35px;
  padding: .2em 1em;
  border-radius: 15px;

}

.catego:after{
  content: "Puntos";
  color: white;
  position:relative;
  font-size:24px;
  top:6px;
  top:-87px;
  text-shadow: 0px 0px 5px rgba(150, 150, 150, 1);
  font-family: "eth_serifregular";
}

.catego{
width:6%;
margin: 2em 0;
padding: .0em 2em .8em 2em;
border-radius: 50%;
max-height: 8em !important;
background-color:#ff3019;
text-align: center;
position: relative;
float: right;
right:-405px;
top:1600px;
z-index:30;

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
margin: .2em 1em .3em  0;
width:95% !important;
cursor: pointer;
z-index: -1;
}


.bkPro{
color: white;
font-size: 2.5em;
font-style: italic;
padding: 0 0 0 .5em;
text-shadow: 0 1px 10 rgba(255, 255, 255, 0.6);
width:80%;
z-index:5;
font-family: 'eth_serifregular';
box-shadow: 1px -5px 10px rgba(0,0,0, .7);
font-weight: 800;
}



.bkPro, .puntaje, .bkPro-span{
display: inline-block;
vertical-align: top;
}

.bkPro-pasive-item{
background: #E91C0F ; /* Old browsers */
}

.bkPro-active-item{
background: #b8e1fc; /* Old browsers */
background: -moz-linear-gradient(top,  #b8e1fc 0%, #6ba8e5 0%, #a9d2f3 10%, #90bae4 25%, #90bcea 37%, #90bff0 55%, #a2daf5 83%, #6ba8e5 99%, #bdf3fd 100%); /* FF3.6+ *//
background: -webkit-linear-gradient(top,  #b8e1fc 0%,#6ba8e5 0%,#a9d2f3 10%,#90bae4 25%,#90bcea 37%,#90bff0 55%,#a2daf5 83%,#6ba8e5 99%,#bdf3fd 100%); /* Chrome10+,Safari5.1+ */
cursor: pointer;
}


#contenedor-promos{

	width:52%;
  position: relative;
  top: -105px;
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
  padding: .5em .7em;
  font-size:2em;
  text-align: center;
  border-radius: 50%;
  position: relative;

background: #ff3019; /* Old browsers */
background: -moz-linear-gradient(top,  #ff3019 0%, #cf0404 100%); /* FF3.6+ */
background: -webkit-linear-gradient(top,  #ff3019 0%,#cf0404 100%); /* Chrome10+,Safari5.1+ */

}

/*===  item 5====*/


#item5{
	height:100vh;
	background-image: url(images/fondo_nuevo.png);
  background-size: cover;
  display:none;
}

 #calculationBox{
   width: 100%;
    }

.pattern {
  margin-top: 7%;
}
.cal-blocks {
max-width: 70%;
}

.cal-blocks input{
 font-size: 2em;
 outline: none;
 margin: .5em 1.5em .5em  0;
 padding: .5em 1em;
 width: 64%;
 background-color: #ff3019;
 font-family: "eth_serifregular";
 color: #FFF;

}

.blef, .blri{

  width:0;
  height:0;
  border: 0 solid;
  border-width: 1.98em;
  position: relative;
  top:1em;
}

.blef{
  border-color: #ff3019 #ff3019 #ff3019 transparent;
  
}

.blri{
  border-color: #ff3019 transparent #ff3019 #ff3019;
  right:4em;
}

.cal-blocks, .blef, .blri, .bloco2{
    display: inline-block;
  vertical-align: top;
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

color: #FFF;
font-size: 3em;
font-style: italic;
background-color: #FF3019;
border-radius: 50%;
height: 1.6em;
width: 2em;
padding-top: .4em;
position: relative;
top: -120%;
box-shadow: 0px 0px 6px rgba(0,0,0, .7);
}


#wrap-score{
width: 17em;
height: 4em;
/* position: relative; */
/* top: 12px; */
background-color: #FF3019;
margin: 4em 0 0 0;
-webkit-box-shadow: 0px 10px 5px 0px rgba(50, 50, 50, 0.75);
-moz-box-shadow:    0px 10px 5px 0px rgba(50, 50, 50, 0.75);
box-shadow:         0px 10px 5px 0px rgba(50, 50, 50, 0.75);


}



/* ===  efecto cristal ==*/


/*===== =====*/

#logout{
	position: relative;
	 float:right; 
	 font-size: 1.5em; 
	 padding-right: 2em;
	 color:white !important;
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

#instruction {

  color: white; 
  font-weight: 800;
  width: 30em;
  margin:  0 45% 0 55%;
  background: #ff3019; /* Old browsers */
  background: -moz-linear-gradient(top,  #ff3019 0%, #cf0404 100%); /* FF3.6+ */
  background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#ff3019), color-stop(100%,#cf0404)); /* Chrome,Safari4+ */
  background: -webkit-linear-gradient(top,  #ff3019 0%,#cf0404 100%); /* Chrome10+,Safari5.1+ */
  background: linear-gradient(to bottom,  #ff3019 0%,#cf0404 100%); /* W3C */
  font-family: 'eth_serifregular';
  text-align: center;
  position: relative;
  display: table;
  text-transform: uppercase;
  letter-spacing: -0.02em;
  line-height: 1.2em;
  border-radius: 30px;
  padding: .7em 1.2em;
  font-size:1.2em;
  top:500px;
  right:6em;

  -webkit-transition: all 1s ease-in-out;
  -moz-transition: all 1s ease-in-out;
  transition: all 1s ease-in-out;
}


.vari{
display: none;
  -webkit-transition: all 1s ease-in-out;
  -moz-transition: all 1s ease-in-out;
  transition: all 1s ease-in-out;
}


.bkPro-span{
width: 0;
height:0;
border: 1em solid;
border-color:  #E91C0F transparent  #E91C0F #E91C0F;
position:relative;
border-left-width: 1em;
border-right-width: 1em;
border-top-width: 1em;
border-bottom-width: 1em;
float: right;
right: -9%;


}

#shokwave , .bkPro-span{
display: inline-block;
vertical-align: top;
}

#shokwave > .bkPro-span{
border-color: #003366 transparent  #003366 #003366 !important;
border-left-width: 1.75em;
border-right-width: 1.75em;
border-top-width: 1.75em;
border-bottom-width: 1.75em;
top: -2.2em;

}

.bkPro:after{
content: "";
width: 0;
height: 0;
border: 0em solid;
border-left-width: .5em;
border-right-width: .5em;
border-top-width: 1em;
border-bottom-width: 0em;
position: relative;
top: -13px;
float: left;
left: -36px;
border-color: rgba(0,0,0, .4) transparent transparent transparent;
display: inline-block;
transform: rotate(95deg);
z-index: -2;

}

#shokwave{
  width: 85%;
  height: 2.5em;
  padding: 1em 0 0 1em;
  cursor:pointer;
  font-size: 2.5em;
  color:#FFF; font-style: italic; font-size:1.5em; background-color: #003366; font-family: 'eth_serifregular';
  font-weight:800;
}

#avice-points, .backto2, .bkPro:before{
 background: -moz-linear-gradient(top,  #ff3019 0%, #cf0404 100%); 
 background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#ff3019), color-stop(100%,#cf0404)); 
 background: -webkit-linear-gradient(top,  #ff3019 0%,#cf0404 100%); 
 background: linear-gradient(to bottom,  #ff3019 0%,#cf0404 100%);
}

#avice-points{

font-family: 'eth_serifregular';
position:relative;
font-weight:800;
text-align: center;
top:-800px;
right:-49%;
width:7%;
font-size:1.3em;
font-style:italic;
color:white;
padding:.5em ;
border-radius: 15px;
  -webkit-transition: all 1s ease-in-out;
  -moz-transition: all 1s ease-in-out;
  transition: all 1s ease-in-out;
}

#backto2, #backto2 > i{
  cursor:pointer;
}

.cola{
 width: 6em;
 background-color:#ff3019 ;
 height:5em;
 position: relative;
 top:2em;
 right:.6em;
 transform: rotate(90deg);
 z-index:-2;
}

.cola:before{
content: "";
width:0;
height:0;
position:relative;
border: 0 solid;
border-color:  #ff3019 #ff3019 transparent #ff3019;
border-width: 2.5em;
display: inline-block;
transform: rotate(270deg);
right: -5.3em;
}


.desPromo{
top: 125%;
width: 76% !important;
right: 12%;
font-family: 'eth_serifregular';
font-size: 1.5em !important;
font-weight:bolder;
color: rgb(253, 253, 253) !important;
background-color: red !important;
bottom: auto !important;
display: inline-block;
vertical-align: top;
z-index:4;
-webkit-box-shadow: 0px 10px 10px 0px rgba(50, 50, 50, 0.75);
-moz-box-shadow:    0px 10px 10px 0px rgba(50, 50, 50, 0.75);
box-shadow:         0px 10px 10px 0px rgba(50, 50, 50, 0.75);
}

.desPromo:before, .desPromo:after{
  content: "" ;
  width: 0;
  height: 0;
  border: 1.05em solid;
  position : absolute;
  top:.5em;
}

.desPromo:after{
border-color: red transparent red red ;
right:-9%;
z-index:-1;
}

.desPromo:before{
border-color: red red red transparent  ;
left:-9%;
z-index:-1;
}

#dg-container{
top:35px;
}

.score3 {

top: 150%;
font-family: 'eth_serifregular';
font-size: 3em !important;
color: white !important;
background-color: #9f6622 !important;
width: 35px !important;
padding: .3em .5em;
border-radius: 50%;
right: 42%;
font-weight: bolder !important;
bottom: auto !important;
border: 3px solid;
border-color: #D4882F #915D1F #80521B #C7812E;
border-top-width: 5px;
border-left-width: 3px;
}

.score3 > span{
  position:relative;
  right:.09em;
}
.score3:before{
  content: "Pts";
  font-size: .4em;
  font-style: italic;
  font-weight: bolder;
  position:absolute;
  top:40px;
  font-family: "eth_serifregular";
  color: #fff;
  right: 1.5em;
}

.pp{
  width:0;
  height: 0;
  border: 2em solid;
  position: relative;
  display:inline-block !important;
  vertical-align: top;
}

#ppRight{
border-color: #FF3019 transparent #FF3019 #FF3019;
right:-60%;
bottom: 9.11em;
}

#ppLeft{
  border-color: #FF3019 #FF3019 #FF3019 transparent ;
left:-61%;
top:1em;
}

#mesa{
  background-color: rgba(255, 255, 255, .6); 
  color: red; 
  max-width:2em; 
  height:1em; position: relative; 
  float: right;
  opacity: 0;
  font-size:3em;
  border-radius: 15px;
  outline: none;
  -webkit-transition: all 1s ease-in-out;
  -moz-transition: all 1s ease-in-out;
  transition: all 1s ease-in-out;

}

.chevrons{

position: relative;
right:0em;
cursor: pointer;
font-family: 'FontAwesome';
font-size:3em;
}

.chevrons >i{
  color: red !important;
}
.cup {
top:-1em;
left:3em;
}

.cdown{
top:9em;
right:11em;
}

#fullscreen{
  z-index:99999; 
  width: 130px; 
  height: 50px; 
  background-color: rgba(0, 0 ,0 , 0); 
  position: relative; 
  float: left;
  cursor:pointer;
}

#errado{
  color:#fff; 
  font-style:italic; 
  font-size: 2em; 
  font-family:'eth_serifregular';
  margin-bottom: 3em;
background: -moz-linear-gradient(top,  #ff3019 0%, #cf0404 100%); /* FF3.6+ */
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#ff3019), color-stop(100%,#cf0404)); /* Chrome,Safari4+ */
background: -webkit-linear-gradient(top,  #ff3019 0%,#cf0404 100%); /* Chrome10+,Safari5.1+ */ 
   border-radius: 15px;
   padding: .5em 1.5em;
}

button::-moz-focus-inner {
  border: 0;
}

.slick-prev, .slick-next{
  opacity:0;
}

a:active { color: lime } /* active links */


.slick-list {
 height:505px !important;
}
</style>	
</head>
<body>
<input type="hidden" value="" id="secret">
<div id="highest-wraper" >
<div class="section active" id="item1">
<input type="button" id="fullscreen"  />
<input type="number" id="mesa"  />
  <div id="wrap-all" align="center" >
    <div id="central" align="center">Bienvenidos a <? printf($_GET['name']) ?></div>
  </div>
   <div class="container">
      <section id="dg-container" class="dg-container">
        <div class="dg-wrapper">

      <?  
      $i = 0;

          while($fila = mysqli_fetch_row($Res_Pro)){
          
      ?>    
          <a href="#" >
          <img src="images/<? printf($result['FAC_NAME']) ?>/<? printf($fila[4]) ?>.jpg" alt="image<? printf(substr('0' . $i, -2)) ?>">
              <input type="hidden" value="<? printf($fila[0]) ?>" class="promoGet">
              <input type="hidden" value="<? printf($fila[1]) ?>" class="scoreGet">
              <div class="desPromo"><? printf($fila[2]) ?></div>
              <div class="score3"><span><? printf($fila[1]) ?></span></div>
          </a>
      <?
      $i = $i + 1;
      }
 mysqli_data_seek($Res_Pro, 0);
      ?>
        </div>
        <nav>
          <span class="dg-prev">&lt;</span>
          <span class="dg-next">&gt;</span>
        </nav>
      </section>
 </div>

<div id="highBar" align="center" >
    <a><img  src="images/entrar.png"></a>
</div>
</div>

<div class="section" id="item2">
<a style="width:4em; position: relative; float: left;"  id="backmain" ><div id="backmaindiv"  style=" width:4.5em;"><i class="fa fa-chevron-circle-left fa-3x" style="color: white;"></i></div></a>
  <div class="wrap-item2" align="center" >
  	    <div  id="to4" style="font-weight: bolder;">Quiero usar mis Smile Points</div>
    </div>
    <div class="wrap-item2" align="center">
  	    <div id="to3" style="font-weight: bolder;">Quiero registrarme</div>
    </div>
</div>
<div class="section" id="item3" >
<a style="width:4em;" onclick="IR_SWITCH = 0;" id="backto2"><div  style="width:4.5em;"><i class="fa fa-chevron-circle-left fa-3x" style="color: white;"></i></div></a>
	   <div class="grand-wrap" align="center">
            <div class="wrap" align="center">
	            <div style="display: inline-block; vertical-align: top;" class="credentials">
	                <input type="text" id="nUs"  placeholder="Ingresa tu nombre y apellido">
            </div>
           </div>
<div class="wrap" align="center">
	<div style="display: inline-block; vertical-align: top;" class="credentials">
	    <input type="text" id="eUs"  placeholder="Ingresa tu E-mail">
	</div> 

</div>
<button id="inscrip"  style="padding: 1em 2em; background-color: red; color: #fff; text-align: center; font-size:2em; font-style: italic; display:none;"></button>
</div>
</div>

<div id="item4" class="section" >
    <div class="logout"><i class="fa fa-home fa-2x " class="logout"></i></div>
	<div class="wrap-camera"  style="margin-top: 1.5em;">
	   <div id="camera"></div>
	    <div style="width:100%;" align="center"><p id="led"></p></div>
	</div>
  <div id="instruction">Acerca el código de tu tarjeta a la camara</div>
	<div class="wrap-icon-facility"><img src="images/<? echo $result['FAC_NAME'] ?>/themes/background-client.png"></div>
        <div class="catego" id="catego">
	         <p class="sum-user" id="score-user"></p>
           <p class="cola">&ensp;</p>
        </div>
  <div id="avice-points">Puntos</div>
   <span class="chevrons cup "><i class="fa fa-chevron-up "></i></span>
      <div id="contenedor-promos">
         <? while($fila4 = mysqli_fetch_row($Res_Pro)){ ?>
    <div class="slide-items"><div class="bkPro bkPro-pasive-item "><? printf($fila4[2])?><span class="bkPro-span"></span></div><input type="hidden" value="<? printf($fila4[0])  ?>" ><p class="puntaje "><? printf($fila4[1])?></p></div>
           <? } ?>   
    <div id="wrap-shokwave" ><div id="shokwave" >Acumula puntos</br> <small>(1 punto cada $ <? printf(substr_replace($res_rules['RULE_CANT_SCORE'], ".", 2, 0)) ?> , Solo con boleta!)</small><span class="bkPro-span"></span></div></div>
		</div>
    <span class="chevrons cdown "><i class="fa fa-chevron-down "></i></span>
</div>
<div id="item5" class="section">
<div style="float:left; width:auto;"  id="backto4"><a href="#item4" ><i class="fa fa-chevron-circle-left fa-4x" style="color: white;"></i></a></div>
	<div id="calculationBox" align="center">
        <div class="cal-blocks pattern">
            <input type="hidden" id="garID">
            <p id="errado" style="color:#fff; font-style:italic; font-size: 2em; font-family:'eth_serifregular';margin-bottom: 3em; background-color: red; border-radius: 15px;">Favor llame al garzón</p>
        	  <input type="password" id="password" name="password" class="patternlock" />
        </div>
        <div class="cal-blocks vari">
        	<span class="blef"></span><input type="number" class="bloco2" placeholder="ingrese numero de boleta" id="ticketNumber" maxlength="7"><span class="blri"></span>
        </div>
        <div align="center" class="cal-blocks vari">
            <span class="blef"></span><input type="number" id="cant" class="bloco2 " placeholder="Ingrese monto boleta" maxlength="6"><span class="blri"></span>
        </div>
        <div align="center" class="cal-blocks vari" id="wrap-score">
            <span class="pp vari" id="ppLeft"></span><div id="score-cal" class="vari"></div><span class="pp vari" id="ppRight"></span>
        </div>
        <p id="point" class="vari" style="color: gray; font-size:2.5em; font-style: italic; font-family:'eth_serifregular'; margin-top: 1.3em">Puntos<p>
         <div id="nonoYes" align="center" class="vari">
            <div ><img  src="image_icons/green.png" id="yes2"></div>
            <div ><img  src="image_icons/red.png" id="no2" ></div>
         </div>
   </div>
</div>
</div>
<script src="lib/html5-qrcode.min.js"></script>
<script src="js/jquery-ui.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.slick/1.3.9/slick.min.js"></script>
<script type="text/javascript" src="js/jquery.gallery.js"></script>
<script type="text/javascript">


var gallery_interval ;

        $(document).on('ready', function() {
           $('#dg-container').gallery();

      gallery_interval =  setInterval( function(){$("span.dg-next").trigger('click')} , 3000);


$("#fullscreen").trigger('click');

});

$(".chevrons").fadeOut('fast');


</script>
</body>
</html>

<script src="js/sweet-alert.min.js"></script> 
<script src="js/patternlock.js"></script>

<script type="text/javascript">


var mem = "";
var gB1 = "#item1";
var gB2 = "#item2";
var gB3 = "#item3";
var gB4 = "#item4";
var gB5 = "#item5";



//barra de fechas

//panel de control


$("#backmain, #backmaindiv").on('click', function(){

    $(gB2).css({ display: "none"});  
    $(gB1).css({ display: "block"});

     clearInterval(gallery_interval);
      gallery_interval = setInterval(function(){$("span.dg-next").trigger('click')} ,3000); 

});


$("#backto2").on('click', function(){

    $(gB3).css({ display: "none" });
    $(gB2).css({ display : "block"});  

});

$("#backto4").on('click', function(){

    $(gB5).css({display : "none"});
    $(gB4).css({display : "block"});
    $('.slick-prev').trigger('click');

});



$(".logout").on('click', function(){

 $("#item1").css({display : "block"});
 $("#item4").css({display : "none"});
 resetAlpha();

});


var visit = 0; 
var IR_SWITCH = 0;
var fac_name = getQueryVariable("name");
var fac = getQueryVariable('facility');
var autoserv = getQueryVariable("f");

var rule = 0;
var code = $("#secret").val();
var univ_timer;


// checkeado;

$(document).on('ready', function(){

$('#cant, #ticketNumber').on('keyup change input paste', function (e){
    var $this = $(this);
    var val = $this.val();
    var valLength = val.length;
    var maxCount = $this.attr('maxlength');
    if(valLength>maxCount){
        $this.val($this.val().substring(0,maxCount));
    }
}); 


if(autoserv != 1){
  $("#mesa").attr('type', 'text');
   $("#mesa").val('A');
}



getRules();

	$('#camera').html5_qrcode( function (data){

    if(IR_SWITCH === 1){

    	var nom = document.getElementById('nUs').value;
    	var em = document.getElementById('eUs').value;

    	 insc(nom, em, data);
        IR_SWITCH = 0;

    } else if (IR_SWITCH === 2){

     IR_SWITCH = 0;
         $("#secret").val(data);
             getComensal(data, "", "", "no" );

    } else {

    }

	},
	function (error){
			$('#read_error').html(error);
		}, function(videoError){
			$('#vid_error').html(videoError);
		});

$('#contenedor-promos').slick({
    vertical: true,
    slidesToShow: 4,
    slidesToScroll: 1,
    focusOnSelect: true,
    infinite: false,
    touchMove: false,
    speed: 1
  });

});

//checked;

/*=== EVENTS ===*/

$(".cup").on('click', function(){
$(".slick-prev").trigger('click');
   });
   
   $(".cdown").on('click', function(){
    console.info('llega after');
         $(".slick-next").trigger('click');
});



$("#highBar").on('click' , function () {

  if ($("#mesa").val() === ''){

  swal({ title : "Necesitas definir la mesa",  text: "para continuar con el proceso", type: "warning", timer: "3000", confirmButtonColor: "#fff" });

} else {

   clearInterval(gallery_interval);
   clearInterval(gallery_interval);
                 
   $("span.dg-next").trigger('click');

   setTimeout(function(){
   $("#item2").css({display : "block"});
   $("#item1").css({display : "none"});
   },1200);
}

});

$("#no2").on('click', function (){
$("#item1").css({display : "block"});
$("#item5").css({display : "none"});
$(".dg-wrapper a").trigger('click');

resetAlpha();

});

var typingTimer;               
var doneTypingInterval = 600000; 

$('#eUs').keyup( function() {
    clearTimeout(typingTimer);


if ($(this).val().match(/\@+/g)){
     doneTypingInterval = 3100;
} 

  $('#inscrip').css({ display : "none"});

    typingTimer = setTimeout(function(){ 

    var Bolenn = IsEmail($('#eUs').val());
      
      $('#eUs').blur();

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


var tT;               
var dTI = 1700; 

$('#cant').keyup( function() {
    clearTimeout(tT);

    tT = setTimeout(function(){ 
      $('#cant').blur();
    }, dTI);
});


$('#cant').keydown(function(){
    clearTimeout(tT);
});



$("#to4").on('click', function(){
  clearInterval(univ_timer);
clearInterval(univ_timer);
        univ_timer = setTimeout(function(){
            resetAlpha();
                  }, 150000);
	$("#item4").css({display : "block"});
  $("#item2").css({display : "none"});


	IR_SWITCH = 2;
	$('.wrap-camera').animate({ left: '50%' }, 1300, 'easeInOutCubic');
  document.querySelector('#instruction').style.top = "50px";

        univ_timer = setTimeout(function(){
            resetAlpha();
                  }, 150000);
	
});


$("#to3").on('click', function(){
clearInterval(univ_timer);
clearInterval(univ_timer);
        univ_timer = setTimeout(function(){
            resetAlpha();
                  }, 150000);

  $("#item3").css({display : "block"});
  $("#item2").css({display : "none"});
	IR_SWITCH = 1;
});

$("#inscrip").on('click', function(){

  if ($(this).text() ===  "email no válido"){

  } else {

  $("#item4").css({display : "block"});
  $("#item3").css({display : "none"});

    $('.wrap-camera').animate({ left: '50%' }, 1300, 'easeInOutCubic');
      document.querySelector('#instruction').style.top = "50px"; 
  }

});




$("#cant").on("change keydown paste input keypress", function(){

  var monto = $(this).val();
  var scores = parseInt(monto/rule);

       $("#score-cal").html(scores);
      
 });


$("#nonoYes > div:first").on('click', function(){


if($("#ticketNumber").val() == 0 || $("#ticketNumber").val() =='' ){

swal({ title : "Deber Ingresar un numero de boleta" , text: "", type: "warning", timer: "3000", confirmButtonColor: "#fff"});

} else {


  swal({ title: "Estás Seguro?",   
   text: "",  
   type: "warning",   
   showCancelButton: true,   
   confirmButtonColor: "#91D280",   
   confirmButtonText: "Añadir!",  
   closeOnConfirm: false },
    function (confirm){ 
    if(confirm) {
        var scoreV = $("#score-cal").html();
        var code = $("#secret").val();
        var pass = $("#garID").val();
        var ticket = $("#ticketNumber").val();
        var cant = $("#cant").val();
     checkTicketNumber(ticket, function (callback){
        if (parseInt(callback) == 0){
      swal({ title: "Numero de boleta ya ingresado", text: "ingrese el numero correcto", type: "error", timer: "3000", confirmButtonColor: "#fff"});
        } else {
            upDownScoreStr(code, scoreV, "" , pass, ticket, cant);
             $("#score-user").html(parseInt($("#score-user").html()) + parseInt(scoreV));
        }
     })

    }

    });
}
});

//checked

$('.slide-items').on('click touchstart', function (){
  takePromo($(this));
  clearInterval(univ_timer);
        univ_timer = setTimeout(function(){
            resetAlpha();
                  }, 150000);
});



$("#shokwave").on('click tap touchstart', function(){
  $("#item5").css({display : "block"});
  $("#item4").css({display : "none"});

  clearInterval(univ_timer);
        univ_timer = setTimeout(function(){
            resetAlpha();
                  }, 150000);

});


$("#fullscreen").on('click tap', function (){
  
 document.documentElement.mozRequestFullScreen();

});


$("#mesa").on('focus', function (){
setTimeout(function(){

      $("#mesa").blur();
      $("#highBar").focus();
        $("#mesa").css({opacity: "0"});
      }, 3500);

});

$("#backto4, #backto4 *").on('click', function(){
 resetBeta();
  clearInterval(univ_timer);
        univ_timer = setTimeout(function(){
            resetAlpha();
                  }, 150000);
});





/*===============*/

/* === funciones ===*/

function getRules(){
$.ajax({
        type:"POST",
        url: "getRules.php?fac=" + fac,
        success : function (data) {
          console.info(data);
           data = data.split("|");

          rule = data[0];
          visit = data[1];
        }
     });
}

function upDownScoreStr(codigo, value, promo_code, gar, ticket, ta, table){

  var fecha = new Date();
  var fecha_or = fecha.getFullYear() + "-" + ('0' + (fecha.getMonth()+1)).slice(-2) + "-" + ('0' + fecha.getDate()).slice(-2)  + " " + fecha.getHours() + ":" + fecha.getMinutes() + ":" + fecha.getSeconds();

  $.ajax({
    type: "POST",
    url : 'setConsume.php?codigo=' + codigo + "&fac_code=" + fac +  "&promo_code=" + promo_code + "&ba_value=" + value + "&gar=" + gar + "&ticket=" + ticket + "&ta=" + ta + "&fech=" + fecha_or + "&tabla=" + table,
    success : function (data){
    
    var delta = 0;

     if(data == " "){ delta = 0 } else { delta = 1}

       console.info(data);
    var currentScore = parseInt(document.querySelector('#score-user').innerHTML);

     if(promo_code === ""){
         
          $("#item1").css({display : "block"});
          $("#item5").css({display : "none"});

        var vtp  =  currentScore;

        swal({ title: value + " Puntos añadidos con éxito", text : "a tu cuenta  " + data + ". Tienes ahora " + (parseInt(vtp) + (parseInt(visit)*delta))+  " puntos en total" , type:"success" , timer: "3800", confirmButtonColor: "#fff"}); 
      
        resetAlpha();

   } else { 

  $("#item1").css({display : "block"});
  $("#item4").css({display : "none"});

   	swal({ title : "Puntos descontados", text: "Disfruta tu Promo, te quedan " + $("#score-user").html() + " puntos" , type: "success", timer: "3800" , confirmButtonColor: "#fff"}); 

         resetAlpha();

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
	      url: "inscription.php?name=" + Nu + "&email=" + El +  "&codigo=" + cod + "&fac=" + fac,
        success : function (data){

   
switch(parseInt(data)){

  case 0:
      swal({ title: "Alerta", text: "Codigo Qr inválido",  type: "error", timer: "3000", confirmButtonColor: "#fff"});
  break;
  case 403:
      swal({ title: "QR ya inscrito... :(", text: "Utiliza tu tarjeta sin inscribirte nuevamente" , type: "error", timer: "3000", confirmButtonColor: "#fff"});
  break;
  case 1:
     IR_SWITCH = 0;
    document.querySelector('#led').style.backgroundColor = "#2DDB84";
    document.querySelector('#led').style.boxShadow = "0px 0px 20px 0px rgba(114, 255, 114, 0.75)";

         swal({title: "Felicidades!", text : "Inscripción exitosa, ganaste 1 punto!", type:  "success", timer: "3000", confirmButtonColor: "#fff"});

    $('#item4').fadeTo('slow', 0.3, function(){
    $(this).css('background-image', 'url(images/fondo_puntaje.jpg)');
}).delay(20).fadeTo('slow', 1);


    setTimeout(function(){
              IR_SWITCH = 0;
              
               $('.wrap-camera').fadeOut(300, function(){

      var nom = document.getElementById('nUs').value = "";
      var em = document.getElementById('eUs').value ="";
                 document.querySelector('#score-user').innerHTML = '1';
                 document.querySelector('#contenedor-promos').style.right= "-8.4%"; 
                 document.querySelector('.wrap-icon-facility').style.top = "10px";
                 document.querySelector('.catego').style.top = "270px";
                 document.querySelector('#instruction').style.top = "550px";
                 document.querySelector('#instruction').style.visibility = "hidden";
                 document.querySelector('#avice-points').style.top = "10px";
                 $(".chevrons").fadeIn('slow');
                 $('.slick-prev').trigger('click');
                 $("#secret").val(cod); 
                 
           });
    }, 3000);


       IR_SWITCH = 0;
    break;
    case 5:
    console.info('filas no insertadas');
    break;

 }

}
  });
}


function loginGar(pass){

 $.ajax({ type : "POST", 
           url: "getPersonal.php?pass=" + pass + "&fac_code=" + fac,
           success : function(data){
           	if(parseInt(data) === 0){
                $('#errado').html('Patrón no identificado');
                $('#errado').css({ color : "#fff"});
            } else {
               $('#errado').fadeOut('slow');
               $("#garID").val(data);
               $('.patternlockcontainer').fadeOut('slow', function(){
               $(".vari").css({ display : 'block'});
                });
            }
           },
           error: function(error){
             
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
switch(parseInt(data)) {
  case 404:
    swal({ title: "Codigo QR no válido", text: "", type:"error", timer: "3000", confirmButtonColor: "#fff"});
    IR_SWITCH = 2;
  break;
  case 2:
  swal({ title: "Codigo QR no reconocido", text: "", type:"error", timer: "3000", confirmButtonColor: "#fff"});
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
                      $("#item3").css({display : "block"});
                      $("#item4").css({display : "none"});
                      IR_SWITCH = 1;
                         });
               IR_SWITCH = 2;
  break;
  default:

  var variables = data.split(',');
    $("#score-user").html(variables[1]);
      swal({ title : "Hola "  + variables[0], text: "Disfruta de tus puntos!",  type: "success", timer : "3000", confirmButtonColor: "#fff"});
        IR_SWITCH = 0;

$('#item4').fadeTo('slow', 0.3, function(){
    $(this).css('background-image', 'url(images/fondo_puntaje.jpg)');
}).fadeTo('slow', 1);

        document.querySelector('#led').style.backgroundColor = "#2DDB84";
        document.querySelector('#led').style.boxShadow = "0px 0px 20px 0px rgba(114, 255, 114, 0.75)";
        setTimeout(function(){$('.wrap-camera').fadeOut(300, function () {
                 document.querySelector('.wrap-icon-facility').style.top = "10px";
                 document.querySelector('#contenedor-promos').style.right= "-8.4%"; 
                 document.querySelector('.catego').style.top = "270px";
                 document.querySelector('#instruction').style.visibility = "hidden";
                 document.querySelector('#instruction').style.top = "550px";
                 document.querySelector('#avice-points').style.top = "10px";
                 $(".chevrons").fadeIn('slow');
                 $('.slick-prev').trigger('click');

           })
       }, 5000);

               }
            }
         });
}
        

function requestFullScreen(element) {
    // Supports most browsers and their versions.
    var requestMethod = element.requestFullScreen  || element.mozRequestFullScreen() || element.msRequestFullscreen;

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

if(parseInt($("#score-user").html()) < parseInt(scorePro)) {

  console.info($("#score-user").html() + "/" + parseInt(scorePro));

swal({ title: "No tienes puntos suficientes :(" , text: "Sigue Acumulando", type: "error", timer: "3000" , confirmButtonColor: "#fff"});

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
	   closeOnCancel: true
	    },
	   function (){

           upDownScoreStr($("#secret").val(), parseInt(scorePro)*-1 , promoCode, "", "", "", $("#mesa").val());
            $(object).removeClass('slide-active-item');
              $(object).addClass('slide-pasive-item');
                document.getElementById('score-user').innerHTML =  parseInt(document.getElementById('score-user').innerHTML) - parseInt(scorePro)
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
           swal({ title : "Email ya inscrito!", text: "Prueba Con otro!", type:"warning", timer: "3000", confirmButtonColor: "#fff"});
           $("#eUs").val('');
             break;
          case "x":
            $('#inscrip').css({ display : "block"});
            $('#inscrip').text('Entrar');
           
       } 
  },
  error: function (error){
  }
})
}

function checkTicketNumber(ticket , callback){
   
   $.ajax({
    type: "POST",
    url: "tiNumCheck.php?ticket=" + ticket + "&fac=" + fac, 
    success :  function (data){
      callback(data);
    }
   });
   
}


function resetAlpha(){
  $("#item4").css({display : "none"});
$("#item1").css({display : "block"});

  IR_SWITCH = 0;
  resetBeta();
  $("#garID").val('');
  $("#secret").val('');
  $('#errado').fadeIn('fast');
  $('.vari').css({ display : "none"});
  $(".patternlockcontainer").fadeIn('fast');
  $('score-cal').html('');
  $("#mesa").val('');
  $(".chevrons").fadeOut('fast');
  document.querySelector('#highBar > a').href = "#";
  document.querySelector('#instruction').style.visibility = "visible";
  document.querySelector('#instruction').style.top = "500px";
  document.querySelector('#led').style.backgroundColor = "#ff0000";
  document.querySelector('#led').style.boxShadow = "0px 0px 20px 0px rgba(255, 7, 7, 0.75);";
  document.querySelector('#score-user').innerHTML = '0';
  document.querySelector('#contenedor-promos').style.right= "1500px"; 
  document.querySelector('.wrap-icon-facility').style.top = "-1200px";
  document.querySelector('.catego').style.top = "1600px";
  document.querySelector('#avice-points').style.top = "-800px";
  document.getElementById('nUs').value = '';
  document.getElementById('eUs').value = '';
  $('.wrap-camera').fadeIn('slow');
  $('.wrap-camera').animate({ left: '-38%' }, 1300, 'easeInOutCubic');
  clearInterval(univ_timer);
  document.getElementById('password').value= "";
  document.getElementById('ticketNumber').value= "";
  document.getElementById('cant').value= "";
  $('#errado').html('Favor llame al garzón');
  $('#errado').css({ color : "white"});



  $('#item4').fadeTo('fast', 0.3, function(){
    $(this).css('background-image', 'url(images/fondo_nuevo.png)');
}).delay(20).fadeTo('fast', 1);

  clearInterval(gallery_interval);
  clearInterval(gallery_interval);
   gallery_interval = setInterval(function(){$("span.dg-next").trigger('click')} ,3000); 
}






function resetBeta(){

  $("#cant").val('');
  $("#ticketNumber").val('');
  $("#score-cal").html('');
  $('.vari').css({ display : "none"});
  $(".patternlockcontainer").fadeIn('fast');
  $('#errado').html('Favor llame al garzón');
  $('#errado').fadeIn('fast');
  $('#errado').css({ color : "white"});
  $("#garID").val('');
   document.querySelector("#contenedor-promos").style.top ="-105px";
   //document.querySelector(".cdown").style.top ="8.4em";

$("#contenedor-promos").slickGoTo(0);

}


var timeoutId = 0;

$('#mesa').mousedown(function() {
    timeoutId = setTimeout(function(){

      $("#mesa").css({opacity :"1"});

    }, 2500)

}).bind('mouseup mouseleave', function() {
    clearTimeout(timeoutId);
});




</script>




 





