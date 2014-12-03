<?php header('Content-Type: text/html; charset=utf-8');

$datos = mysqli_connect('mysql.nixiweb.com', "u440137862_eqr", "PlEyAdEs", "u440137862_qr");

$Query = "SELECT FAC_NAME FROM FAC WHERE FAC_CODE = " . $_GET['facility'];
$result = mysqli_fetch_assoc(mysqli_query($datos,$Query));


$Query_Pro = "SELECT PRO_CODE, PRO_CANT_VAL, PRO_DESCRIP, SUBSTRING(PRO_DATE,1,10), PRO_CODE FROM PRO WHERE PRO_FAC ='" .  $result['FAC_NAME'] . "'";
$Res_Pro = mysqli_query($datos, $Query_Pro);

?>


<!DOCTYPE html>

<header>

<link rel="stylesheet" type="text/css" href="css/jquery.flipster.css">

<style type="text/css">
	*{
	border:0;
	margin:0;
	padding:0;
}

@font-face{
    font-family: 'effraregular';
    src: url('../fonts/effra-regular-webfont.eot');
    src: url('../fonts/effra-regular-webfont.eot?#iefix') format('embedded-opentype'),
         url('../fonts/effra-regular-webfont.woff') format('woff'),
         url('../fonts/effra-regular-webfont.ttf') format('truetype'),
         url('../fonts/effra-regular-webfont.svg#effraregular') format('svg');
    font-weight: normal;
    font-style: normal;
}

body, html,article, .glass::before{
  height: 100%;
  width:100%;

}

body {
	font-family: 'effraregular', arial, helvetica;
  background-size:cover;
  background-image: url('images/<? echo $result['FAC_NAME'] ?>/themes/background-theme.png');
}

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

#main{
	width:100%;
  height:100%;
}

#eUsr , #nUsr{
	border-radius: 15px;
	color:#4A4A4A;
	height: 2.5em;
	margin: 1.75em 0;
    width: 33%;
}


#eUSr{
  margin-left: 4em;
}

::-webkit-input-placeholder { /* WebKit browsers */
    color:    #4A4A4A;
}
:-moz-placeholder { /* Mozilla Firefox 4 to 18 */
    color:    #4A4A4A;
    opacity:  1;
}
::-moz-placeholder { /* Mozilla Firefox 19+ */
    color:    #4A4A4A;
    opacity:  1;
}
:-ms-input-placeholder { /* Internet Explorer 10+ */
    color:    #4A4A4A;
}




#eUsr:focus , #nUsr:focus{

-webkit-box-shadow: 1px 0px 20px 0px rgba(50, 156, 255, 0.75);
-moz-box-shadow:    1px 0px 20px 0px rgba(50, 156, 255, 0.75);
-o-box-shadow:      1px 0px 20px 0px rgba(50, 156, 255, 0.75);
box-shadow:         1px 0px 20px 0px rgba(50, 156, 255, 0.75);
}


#camera{
	height:250px;
	padding:0;
	margin:0;
	border:0;
	width:300px;
	display:none;
	/*
	 -webkit-transition: all 1s ease-in-out;transition-delay: 0.6s;
	 -moz-transition:    all 1s ease-in-out;transition-delay: 0.6s;
     transition:         all 1s ease-in-out;transition-delay: 0.6s;
     */

-webkit-box-shadow: 0px 0px 30px 0px rgba(0, 184, 255, 0.84);
-moz-box-shadow:    0px 0px 30px 0px rgba(0, 184, 255, 0.84);
box-shadow:         0px 0px 30px 0px rgba(0, 184, 255, 0.84);

/*

-webkit-box-shadow: 0px 0px 30px 0px rgba(0, 255, 0, 0.84);
-moz-box-shadow:    0px 0px 30px 0px rgba(0, 255, 0, 0.84);
box-shadow:         0px 0px 30px 0px rgba(0, 255, 0, 0.84);

*/


}


.blocks{
	border: 1px #646464 ;
	width:100px;
	height: 100px;
	border-style:solid;
	border-width: 1px;
	margin:0;
	padding:0;
	vertical-align: top;
}

#blocks-wrapper {
	max-width: 50%;
	min-width:45%;
	padding:0;

}
#DiscPanel{
	background-color: #FFF;
	width: 50%;
	height:20em;
	text-align: center;
	padding:0;
	display: none;

}

#DiscPanel .blocks {

display:none;

}

.Discount{
color:#1BA764 ;
font-size:2.5em;
}

.discDes{
	padding:5px 2px;
	font-size:10px;
}
#Panels {
	display: block;
	width:100%;
}

#wrap-preguntas{
  display: inline-block;
  vertical-align: bottom;
  width:100%;

}

.preguntas{
  font-size:1em;
  background-color: #FFF;
  color:#000;
  vertical-align: bottom;
  margin: 0 1.5em ;
  display: inline-block;
  cursor: pointer;
}

#pregunta1{
  float:left;
  padding: 1em .5em;
  margin-left: 10em;
  /*
  border-top-right-radius: 110px;
  border-bottom-right-radius: 110px;
  */
}


#pregunta2{
  float:right;
  margin-right: 10em;
  padding: 1em .5em;
  /*
  border-top-left-radius: 110px;
  border-bottom-left-radius: 110px;
  */
}

/*#C65B0D*/



#Resume{

max-width: 45%;

}

#RecPanel {

	width: 50%;
  display: none;
	border-width: 1px;
	border-style: solid;
	border-color: #646464;
	margin: 0;
	padding: 2em 1em 2em 1em;
  
-webkit-box-shadow: 1px 0px 20px 0px rgba(50, 156, 255, 0.25);
-moz-box-shadow:    1px 0px 20px 0px rgba(50, 156, 255, 0.25);
-o-box-shadow:      1px 0px 20px 0px rgba(50, 156, 255, 0.25);
box-shadow:         1px 0px 20px 0px rgba(50, 156, 255, 0.25);

background-color: #EFEFEF;

}


#puntosUsuario{

color: darkorange;
font-size: 1.5em;
text-align: center;
}

.Discount {
	width: 100%;
	height: 60%;
	vertical-align: top;
	border:0;
	margin:0;
	padding:0;

}


#formulario{
display: none;
}



/* ==== flipster styles  ==== */

  .main{
    width: 280px;
    border-radius: 50%;
    border: 20px solid #F40000;
  }

li p{
  background:#FFF;
  padding: 1em;
  font-style: italic;
  font-size: 1.5em;
  color: darkorange;
  border-radius: 15px;
  background-color: rgba(255, 255, 255, 0.2);
  filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#99ffffff, endColorstr=#99ffffff);
  -ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#99ffffff, endColorstr=#99ffffff)";
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
border-radius: 50%;
}

  .wrap-meta-data{
    width: 100%;
  }

  #wrap_comands, #wrap-release {
    width: 5em;
    display: inline-block;
    vertical-align: top;
  }

  #wrap_comands{
     float:left;
  }
  #wrap-release {
     float:right;
  }

#wrap_comands > div, #wrap-release > div{
  width: 100%;
  margin:.5em 0;
}

#wrap_comands div img, #wrap-release div img{
  max-width: 60%;
  cursor:pointer;
}






/*==== */

input {
  outline: none;
  padding-left: 1em;
  font-size: 1.5em;
}

input:focus{
  box-shadow: 1px 1px 10px #3485CD;
}

#overlay-back {
    position   : absolute;
    top        : 0;
    left       : 0;
    width      : 100%;
    height     : 100%;
    background : #000;
    opacity    : 0.6;
    filter     : alpha(opacity=60);
    z-index    : 5;
    display    : none;
}


#enter {
    position : absolute;
    top      : 0;
    left     : 0;
    width    : 100%;
    height   : 100%;
    z-index  : 10;
    display  : none;
} 

#enter input{
vertical-align: -15em;
}

#entrar, #salir{
  width           :20%; 
  color           :#000;
  background-color:#FFF; 
  font-size       :1.5em;
  cursor: pointer;
}

#entrar:active{
  color           :#FFF;
  background-color:#000; 
}


#promotionBox, #calculationBox, #wrap-added, #wrap-alert{
    width: 50%;
    position:absolute;
    z-index  : 20;
    background-color: #FFF;
    vertical-align:9em;
    display: none;
    margin: 15% 25% 0 25%;

  }

   .eleccion {
     display: inline-block;
     vertical-align: top;
     padding: .5em 0 .5em 0 ;
     border-top: 1px solid black;
     cursor: pointer;
     margin:0;
     width:48%;
     text-align: center;
     font-size: 3em;


   }
   #promotionBox #promotion
   {

    padding: 3.5em 2em;

   }


#promotion img{
  max-width: 3.5em;
}

#promotion p{
  font-size: 3em;
  color: darkorange;
}

#promotion p, #promotion img{
  display:inline-block;
  vertical-align: top;
  text-align: center;
}

#valorAgr{
  width:70%;
  display: inline-block;
  vertical-align: middle;
  outline: none;
  margin-top: 1em;
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



 #ba-wrap img{
  max-width: 4.5em;
}

#subBox2, #subBox2 div{
  display: inline-block;
  vertical-align: top;
}

#subBox2 div{
  margin: .4em 1em;
}

#wrap-valorAgr{
  text-align: center;
}

#ba-wrap, #bas-add{
  display: inline-block;
  vertical-align: top;
}

#addedBa, #addedBa p{
  font-size: 2em;
  color: darkorange;
}

#addedBa img{
max-width: 2em;
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


.esquinero{
  height: 20px;
  width:20px;
  vertical-align: bottom;
  background: rgb(175, 175, 175);
  margin:0;
  padding:0;
background: -moz-linear-gradient(90deg, rgb(175, 175, 175) 30%, rgb(206, 206, 206) 54%);
background: -webkit-linear-gradient(90deg, rgb(175, 175, 175) 30%, rgb(206, 206, 206) 54%);
background: -o-linear-gradient(90deg, rgb(175, 175, 175) 30%, rgb(206, 206, 206) 54%);
background: -ms-linear-gradient(90deg, rgb(175, 175, 175) 30%, rgb(206, 206, 206) 54%);
background: linear-gradient(180deg, rgb(175, 175, 175) 30%, rgb(206, 206, 206) 54%);
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

#highBar .wrap-buttons:first{
float: left;
}

#highBar .wrap-buttons:last-child{
  float: right;
}




</style>
</header>
<html>     
<body>

<input type="hidden" val="" id="garId">


<!-- login del Garzon -->
<div id="enter" align="center">
  <input type="password" id="pass" style="width: 50%;" >
  <div style="margin: 1em;">
      <button id="entrar" style="margin:.2em 2em;">Entrar</button>
      <button id="salir" style="margin:.2em 2em;">Cancelar</button>
  </div>
</div>
<!-- aviso de carga de puntos -->
<div id="wrap-added" align="center">
   <p id="addedBa"><img src="image_icons/BA2.png"></p> cargados a <p id="clientName"></p>
</div>
<!-- aviso de no disponible -->
<div id="wrap-alert" align="center">
   <p></p>
</div>
<!-- promotion-->
   <div id="promotionBox">
     <div align="center" id="promotion">
        <div align="center" style="font-size: 2em; color: gray;">Esta seguro que desea consumir la promoci&oacute;n?</div>
         <p> </p>       <img src="image_icons/BA2.png">
     </div>
     <div id="subBox">
       <input type="hidden" id="promo_code">
       <input type="hidden" id="scoreVal">
       <div class="eleccion" id="yes">Si</div>
       <div class="eleccion" id="no">No</div>
     </div>
   </div>
   <!-- calculate price -->
    <div id="calculationBox">
     <div align="center" id="calculator">
        <div align="center" style="font-size: 2em; color: gray;">Ingrese el monto de la boleta</div>  
     </div>
     <div id="subBox2">
        <div id="wrap-valorAgr">
            <input type="text" value="" name="valorAgr" id="valorAgr" placeholder="Valor">
         </div>
         <div id="bas-add" style="font-size: 3em;"></div>
         <div id="ba-wrap"><img src="image_icons/BA2.png"></div>
     </div>
     <div id="nonoYes" align="center">
       <div><img src="image_icons/check2.png" id="yes2"></div>
       <div><img src="image_icons/error.png" id="no2"></div>
     </div>
   </div>
   -->
<!-- Query screen -->
<div id="overlay-back"></div>
<article class="glass">
  <div id="wrap-all" align="center">
    <div id="central" align="center">Bienvenidos a Sushihome</div>
  </div>

<div id="main" align="center">

	<div id="camera" align="center"></div>
	     <div id="formulario">
	      <input type="hidden" name="name" id="secret" value="776">
	     	<div><input type="text" name="nUsr" id="nUsr" placeholder="&ensp;&ensp;Ingresa tu nombre y apellido"></div>
	     	<div><input type="text" name="eUsr" id="eUsr" placeholder="&ensp;&ensp;Ingresa tu E-Mail" ></div>
	     </div>
      <div id="RecPanel" align="center">
      	<div class="ident" id="usr_name" align="center"></div>
        <div id="puntosUsuario" align="center"></div>
      </div>
   <!-- flipster-->
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
  </body>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<script type="text/javascript" src="java/jquery.flipster.js"></script>
</body>
</html>
<script src="lib/html5-qrcode.min.js"></script>
<script type="text/javascript" src="java/jlinq.js"></script>
<script type="text/javascript" src="java/jlinq.jquery.js"></script>
<script type="text/javascript">

var box = $('#camera');
var inter = 0;
var estado = 0;
var Gname = "";
var fac = getQueryVariable('facility');
var fac_name = getQueryVariable('name');
var io = "exec";
var switching = 0;
var rule = 0;
var night; 


/*
if(typeof(Storage) !== "undefined" && localStorage.getItem('facilityCode') !== "" && localStorage.getItem('facilityName')) {

fac = localStorage.getItem('facilityCode');
fac_name = localStorage.getItem('facilityName');


} else if(localStorage.getItem('facilityCode') === ""){

      localStorage.setItem('facilityCode',  getQueryVariable('facility'));
      localStorage.setItem('facilityName',  getQueryVariable('name'));

      fac = getQueryVariable('facility');
      fac_name = getQueryVariable('name');


} else {

  alert("No hay soporte de marcaje");

};
*/


$(document).on('ready', function(){

/*loadImagesPro();*/
getRules();

$('#camera').html5_qrcode(function(data){

var codigo = data,  Nombre = $('#nUsr').val(), email  = $('#eUsr').val();

 if(inter == 0){
      inter = 1;
	       $('#camera').css({ 'box-shadow' : '0px 0px 30px 0px rgba(0, 255, 0, 0.84)'});
            $("#secret").val(data);


 var call = $.ajax({
		               type:"POST",
		               url: "semantic.php?codigo=" + codigo + "&nombre=" + Nombre + "&email=" + email + "&fac=" + fac + "&io=" + io,
                   success : function(data){
                        if (data === "ingreso exitoso"){

                              $("#formulario").fadeToggle(600);
                                   $("#camera").fadeToggle(600);
                                        alert("Te has inscrito exitosamente, disfruta acumulando descuentos!");
                                           $(".preguntas").fadeIn(300);
                                            $("#formulario > input").val('');
                                                 intervals(0);
                               }else if(data === "no se reconoce su usuario"){

                                            $("#camera").fadeToggle(600);
                                              $("#usr_name").html(data);
                                                  $("#puntosUsuario").html('');
                                                   $("#RecPanel").fadeToggle(400);   
                                                     $(".preguntas").fadeIn(300);
                                         
                                         } else {

                                $("#camera").fadeToggle(600);
                                //stopWebCam();
                                    microData = data.split(",");
                                      $("#usr_name").html("Bienvenido " + microData[0]);
                                        $("#puntosUsuario").html( microData[1] + " Bon Apetits!")
                                          $("#RecPanel").fadeToggle(400);   

                                  intervals(0);
                                     setAFU(true);
                                         
                                         }
                                    }
	                            });

	call.fail(function(error){


		alert("not move");
                        	});
      	} else {
          
      	}
      },
		function(error){
			$('#read_error').html(error);
		}, function(videoError){
			$('#vid_error').html(videoError);
		});

$('.flipster').flipster({ 
  style: 'coverflow', 
  enableTouch: true,
  enableKeyboard: true,
  onItemSwitch: function (){

    var srs = $('.flip-current').find('.scoreGet').val();
       $('#showValue').text(srs).fadeIn(200);

      }
  });

intervals(1);

});




// ================ escuchadores ================

$("#pregunta1").on('click', function(){
  intervals(0);
   $(".preguntas").fadeToggle(150, function(){
      // $('#enter, #overlay-back').fadeIn(300);
    // playCam();
      $("#camera").fadeIn(600);

             });     
});

//===============================================


$("#pregunta2").on('click', function(){
  intervals(0);
	 $(this).fadeToggle(-200, function(){
	 	$("#pregunta1").fadeToggle(400, function(){
	 		$("#formulario").fadeToggle(600);
	 	})
	 })
});


jQuery("#il").on('click', ".main", function (evt){

    var uPoints = parseInt($("#puntosUsuario").html().match(/\d+/)[0]);
    var cod_promo =  $(this).find('.promoGet').attr('value');
    var pre_score = $(this).find('.scoreGet').attr('value');
    var condition = $(this).find('.condition').attr('value');


if(condition === 'Not Available'){

    setTimeout(function(){$("#wrap-alert, #overlay-back").fadeOut('fast');},2000);
      $("#wrap-alert p").html("Necesitas " + (pre_score - uPoints) +"Ba's m&aacute;s para canjear");

       $("#wrap-alert, #overlay-back").fadeIn('fast');
     

} else {

    $("#promo_code").val(cod_promo);
    $("#scoreVal").val(pre_score);
    $("#promotion p").html(pre_score);
    $('#promotionBox, #overlay-back').fadeIn(500);

}

});


$("#yes").on('click', function(){

  var promotionCode = $("#promo_code").val();
  var current_score =  $("#puntosUsuario").html();
  var valor = parseInt($("#scoreVal").val());
  var usr_qr = $("#secret").val();

    upDownScoreStr(usr_qr, (valor *-1) , promotionCode);

  $('#promotionBox, #overlay-back').fadeOut(500);
  
      $("#puntosUsuario").html((parseInt(current_score) - valor)  + "  Bon Apetits!" );
        setAFU(true);
});


$("#no").on('click', function(){

    $('#promotionBox, #overlay-back').fadeOut(500);

});


$("#execute").on('click', function(){

   intervals(0);

     $(".preguntas").fadeToggle(150, function(){
       $('#enter, #overlay-back').fadeIn(300);
            switching = 1;
             });    
});



$("#query").on('click', function(){
    io = "query";
    $('#enter, #overlay-back').fadeIn(500);

});


$("#entrar").on('click', function(){
  loginGar($("#pass").val());

});


var typingTimer;               
var doneTypingInterval = 12000;  

$('#eUsr').keyup(function(){
    clearTimeout(typingTimer);
    typingTimer = setTimeout(function(){$("#camera").fadeToggle(600);}, doneTypingInterval);
});

$('#eUsr').keydown(function(){
    clearTimeout(typingTimer);
});


$("#valorAgr").on("change keydown paste input", function(){
  var monto = $(this).val();

     var scores = parseInt(monto/rule);

  $("#bas-add").html(scores);
     
});


$("#yes2").on('click', function(){

     score = $("#bas-add").html();
     code = $("#secret").val();

upDownScoreStr(code, score);    

$("#wrap-added").fadeIn(200);
$('#calculationBox').fadeOut(200);


setTimeout(function(){
  $("#wrap-added, #overlay-back").fadeOut(200);
   },3000);

});

$("#no2").on('click', function(){
  $('#calculationBox, #overlay-back').fadeOut(500, function(){
      $("#valorAgr").val('');
    });
});

$("#salir").on('click', function(){
    $("#enter , #overlay-back").fadeOut(500);
});

$("#release").on('click', function(){
  $("#secret").val(0);
  Gname = "";
  $("#RecPanel").css({display: "none"});
  $("#RecPanel > div").html('');
  $(".preguntas").fadeToggle(600);

  setAFU(false);
  intervals(1);

});

// ================================== //
// ================================== //
// ================================== //

// funciones 

// ================================== //
// ================================== //
// ================================== //

function insc(Nu , El, cod) {

var inject = $.ajax({
	      type:"POST",
	      url: "php/inscription.php?name=" + Nu + "&email=" + El +  "&codigo=" + cod
});
inject.done(function(data){
// aqui va el display del nombre del usuario;
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


function playCam(){

 var video = $('#html5_qrcode_video').get(0);

    if (stream == null) {

        video.src = (window.URL && window.URL.createObjectURL(stream)) || stream;
        localMediaStream = stream;

        video.play();
        setTimeout(scan,1000);
      }
    }




function upDownScoreStr(codigo, value, promo_code){

  $.ajax({
    type: "POST",
    url : 'setConsume.php?codigo=' + codigo + "&fac_code=" + fac +  "&promo_code=" + promo_code + "&ba_value=" + value,
    success : function (data){
     
    }, 
    error: function (error){

      alert("no se puede conectar con el servidor");

    }
  });

}


function loginGar(pass){


  $.ajax({ type : "POST", 
           url: "getPersonal.php?pass=" + pass + "&fac_code=" + fac,
           success: function (data){

    
            if(parseInt(data) === 0){
              console.info(data);
                $("#pass").val('');
                  alert('Password incorrecto!'); 

            } else {

              $("#garId").val(data);
                  $("#pass").val('');
                   $('#enter, #overlay-back').fadeOut(300);
                    Gname = data;

              if($("#secret").val() === ""){

                 $("#camera").fadeIn(600);

              } else {



              }
        
                }
           },
           error: function (error){
             alert("No se pudo conectar con el servidor ");
           }
           });

}

/*
function loadImagesPro(){

    $.ajax({
          type: "POST",
          url: "passImagesComa.php?fac=" + fac,
          success : function(data){

             var val_JSON = JSON.parse(data);
             var base = jlinq.from(val_JSON.fuente).select();
             var cant = base[0].imagenes.length;


          createImgBoxes(cant);

         $('.img-des').each(function (i, el) {
            $(el).attr("src", "images/" + fac_name + "/" + base[0].imagenes[i].raiz);
         });

          $('.promoGet').each(function (i, el) {
              $(el).attr('value', base[1].codigos[i].codigo);
          });

          $('.scoreGet').each(function (i, el){

              $(el).attr('value', base[1].codigos[i].puntaje);
          })
             
         $('.main p').each(function (i, el){

              $(el).html($(this).html() + base[1].codigos[i].descripcion);
         })
             
          },
          error :  function (error){
            alert("no se puede conectar con el servidor");
          }
    })

}
*/

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


function loadScoreCodes(){
$.ajax({
      type: "POST",
      url : 'scoresandcodes.php?fac=' + fac,
      success: function(data) {

      }
})

}


/*

function createImgBoxes(cant){

  var parent = document.getElementById('il');
 console.info("legga createImgBoxe");
 for(i=0;i < cant; i++){

    li = document.createElement('li');
    main = document.createElement('div');
        main.className= "main";
  img = document.createElement('img');
    img.className = "img-des";
        img.id = "img_" + (i+1);
  promoGet = document.createElement('input');
    promoGet.type="hidden";
        promoGet.className = "promoGet";
  scoreGet = document.createElement('input');
    scoreGet.type="hidden";
        scoreGet.className = "scoreGet";
  condition = document.createElement('input');
    condition.type="hidden";
        condition.className = "condition";
  title = document.createElement('p');



   main.appendChild(img);
   main.appendChild(title);
   main.appendChild(promoGet);
   main.appendChild(scoreGet);
   main.appendChild(condition);

   insertAfter(title, condition);
   
   li.appendChild(main);
   parent.appendChild(li);

 } 


}

*/
function setAFU(ioSwitch){
  
 var userPoints;

  if(ioSwitch === false){

    userPoints = 99999;

  } else {

     userPoints = parseInt($("#puntosUsuario").html().match(/\d+/)[0]);
  }
   
 $('.main').each( function (i, el){

       if($(this).children('.scoreGet').val() >  userPoints ){
                $(this).children('.condition').val('Not Available');
                $(this).css('opacity', 0.5);

               } else {
      
                $(this).css('opacity', 0.99);
                $(this).children('.condition').val('');

               }

    });


}



function getRules(){
$.ajax({
        type:"POST",
        url: "getRules.php?fac=" + fac,
        success : function(data){
          rule = data;
        }
});
}



function intervals(index){

  if (index === 1){

     night =  setInterval(function(){$('.flipster').flipster('jump', 'left');}, 3000);

 }  else {
    
    clearInterval(night);
    
 }
}

function insertAfter(newNode, referenceNode) {
    referenceNode.parentNode.insertBefore(newNode, referenceNode.nextSibling);
}


 </script>

