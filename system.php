<?php

session_start();


if (isset($_SESSION['TxtUser'])) {

$datos = mysqli_connect('localhost', "root", "D1sjjDlvD0", "SM_usr10000");

//Queries
$Query_domain = "SELECT FAC_CUSTOM_NAME, FAC_CUSTOM_SURNAME FROM FAC WHERE FAC_CODE = " . $_SESSION["TxtCode"];
$Res_domain = mysqli_fetch_assoc(mysqli_query($datos,$Query_domain));

// personal

/*
"SELECT A.PER_NAME, A.PER_PASS, A.PER_DATE, A.PER_LAST_LOGIN, A.PER_SURNAME, A.PER_ID, A.PER_AUX_USER, SUM( B.TRF_BA_SCORE_WL ) FROM PERSONAL A INNER JOIN TRAFFIC B ON ( A.PER_ID = B.TRF_GAR ) WHERE PER_FAC_CODE = " .  $_SESSION['TxtCode'] . ";";
*/

//$Query_Per = "SELECT A.PER_NAME, A.PER_PASS, A.PER_DATE, A.PER_LAST_LOGIN, A.PER_SURNAME, A.PER_ID, A.PER_AUX_USER, SUM( B.TRF_BA_SCORE_WL ) FROM PERSONAL A INNER JOIN TRAFFIC B ON ( A.PER_ID = B.TRF_GAR ) WHERE PER_FAC_CODE = " . $_SESSION['TxtCode'] . " GROUP BY PER_NAME;";


$Query_Per ="SELECT PER_NAME, PER_PASS, PER_DATE, PER_LAST_LOGIN, PER_SURNAME, PER_ID, PER_AUX_USER FROM PERSONAL WHERE PER_FAC_CODE = " . $_SESSION['TxtCode'] . ";";
$Res_Per = mysqli_query($datos, $Query_Per);



//reglas
$Query_Rules = "SELECT RULE_EXP_PROMO, RULE_CANT_SCORE, RULE_SCORE_VISITOR FROM RULES WHERE RULE_FAC_CODE = " .  $_SESSION['TxtCode'] . ";";
$Res_Rules = mysqli_query($datos, $Query_Rules);

if(mysqli_num_rows($Res_Rules) === 0 ){
    $Res_Rules = "";
}

// trafico 

$Query_Traffic = "SELECT DISTINCT C.PER_NAME, A.USR_NAME, B.TRF_BA_SCORE_WL, DATE_FORMAT(B.TRF_DATE, '%d/%m/%Y %H:%i:%s'), B.TRF_TICKET, B.TRF_TOTAL_ASSETS FROM USER A INNER JOIN TRAFFIC B INNER JOIN PERSONAL C ON(B.TRF_USR_QR = A.USR_QR AND C.PER_ID = B.TRF_GAR) WHERE TRF_FAC_CODE = " . $_SESSION['TxtCode'] . " ORDER BY B.TRF_DATE";
$Res_Traffic  = mysqli_query($datos, $Query_Traffic);

if(mysqli_num_rows($Res_Traffic) === 0 ){
    $Res_Traffic = "";
}

//checkear si tiene en uso un aux
$Query_aux = "SELECT FAC_AUX_USER, FAC_AUX_PASS FROM FAC WHERE FAC_CODE = " . $_SESSION['TxtCode'];
$checkit = mysqli_fetch_assoc(mysqli_query($datos, $Query_aux));

$res_ponderate = "";

if(!is_null($checkit['FAC_AUX_USER'])){
    $res_ponderate = $checkit;
    $cards = mysqli_fetch_assoc(mysqli_query($datos, "SELECT  PER_NAME, PER_SURNAME, PER_ID FROM PERSONAL WHERE (PER_AUX_USER = 1 AND PER_FAC_CODE = " . $_SESSION['TxtCode'] .")"));
    $checkit = 'disabled="true"';
  
} else {
    $checkit = '';
}


// estadisticas de clientes
$Query_Pro = "SELECT PRO_CODE, PRO_CANT_VAL, PRO_DESCRIP, SUBSTRING(PRO_DATE,1,10), PRO_CODE, PRO_ID FROM PRO WHERE PRO_FAC ='" . $_SESSION["TxtFacName"] . "';";
$Res_Pro = mysqli_query($datos, $Query_Pro);



$Query_global_clients = "SELECT A.USR_NAME, A.USR_EMAIL, A.USR_DATE_ING, B.STR_USR_BA_SCORE, B.STR_FAC_CODE FROM USER A INNER JOIN STORAGE B ON(A.USR_QR = B.STR_USR_QR ) ORDER BY STR_FAC_CODE ASC";
$Res_global_clients = mysqli_query($datos, $Query_global_clients);


$Query_Client = "SELECT COUNT(DISTINCT TRF_USR_QR), SUM(TRF_BA_SCORE_WL), SUBSTRING(COUNT(SUBSTRING(TRF_DATE,1,11)) / COUNT(DISTINCT SUBSTRING(TRF_DATE,1,11)),1,3) FROM TRAFFIC WHERE (TRF_BA_SCORE_WL > 0 AND TRF_FAC_CODE =" . $_SESSION['TxtCode'] .")";
$Res_Client = mysqli_query($datos, $Query_Client);

$Query_promo_max = "SELECT DISTINCT COUNT(TRF_BA_SCORE_WL) AS TOTAL FROM TRAFFIC WHERE(TRF_BA_SCORE_WL < 0 AND TRF_FAC_CODE = " .  $_SESSION['TxtCode'] . ")";
$res_promo_max = mysqli_query($datos, $Query_promo_max );
$res_prooo = mysqli_fetch_assoc($res_promo_max);



//clientes establecimientos
$query_client_side = "SELECT * , FAC_NAME FROM FAC ORDER BY FAC_CODE ASC";
$client_side = mysqli_query($datos, $query_client_side);

//promocion

$query_count_personal = "SELECT COUNT(PER_ID) FROM  PERSONAL WHERE PER_FAC_CODE = " . $_SESSION['TxtCode'] .";";
$Res_count_personal = mysqli_fetch_array(mysqli_query($datos, $query_count_personal));

$query_count_promos = "SELECT COUNT(PRO_ID) FROM PRO WHERE PRO_FAC = '" .  $_SESSION['TxtFacName'] . "';" ;
$res_count_promos = mysqli_fetch_assoc(mysqli_query($datos, $query_count_promos));

// trazbilidad 
$Query_tracert = "SELECT A.USR_NAME, B.TRF_DATE, B.TRF_PROMO, B.TRF_TABLE FROM USER A INNER JOIN TRAFFIC B ON(A.USR_QR = TRF_USR_QR) WHERE (TRF_FAC_CODE = " . $_SESSION['TxtCode'] . " AND TRF_GAR IS NULL)";
$Res_Tracert = mysqli_query($datos, $Query_tracert);

$Query_trapro = "SELECT PRO_CODE, PRO_DESCRIP FROM PRO WHERE PRO_FAC ='" .  $_SESSION['TxtFacName'] . "' " ;
$Res_trapro = mysqli_query($datos, $Query_Pro);

$Query_comensales = "SELECT USR_ID, USR_NAME, USR_EMAIL, USR_DATE_ING FROM USER;";
$Res_comensales = mysqli_query($datos, $Query_comensales);


$keyUser = false;

 if ($_SESSION['TxtUser'] == "Emenu"){
    $keyUser = true;

 }

?>



<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>eMenu | QR Recognition</title>
    <link rel="icon" type="image/png" href="image_icons/GreenQR.jpg">
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

<link type="text/css" rel="stylesheet" href="powerange-master/dist/powerange.min.css">
<link rel="stylesheet" type="text/css" href="css/sweet-alert.css">
<link rel="stylesheet" type="text/css" href="css/plugins/morris.css">
<link rel="stylesheet" type="text/css" href="css/patternlock.css">

<style type="text/css"> 
.autocomplete-suggestions { border: 1px solid #999; background: #fff; cursor: default; overflow: auto; width:32% !important; }
.autocomplete-suggestion { padding: 10px 5px; font-size: 1.2em; white-space: nowrap; overflow: hidden; }
.autocomplete-selected { background: #f0f0f0; }
.autocomplete-suggestions strong { font-weight: normal; color: #3399ff; }
    #bar_wrapper{
     width:90%;
     text-align: center;
     padding-top: 4%;

    }

    #time{
        text-align: center;
        padding:1em 0.5em 1em 0;
        font-size: 2em;
    }


.Cant-des-wrap div{
    max-width: 100%;
    display: inline-block;
}

.Cant-des-wrap, .score_wrap{
display:inline-block;
max-width: 100%;
color: #4a4a4a;
font-size: 2em;
vertical-align: top;
}



.score_wrap img {
    width:20px;
    display: inline-block;
}

#Bon-Apetit-score-content{
padding: 1em 2em;
}

#dropdown_1{
    color:#4a4a4a;
    font-size: 1.5em;
    padding-top: 1em;
}

#demo2, #demo2 li{
    list-style: none;
    text-align: left;
    color:#4a4a4a;

}

#list_content_1{
   max-width: 60%;
}

#demo2 li a {
     color:#FFF;
     font-size: 1.5em;
     padding: 10px 15px;
     text-decoration: none;
}

#demo2 li {
    border: 1px solid white;
    background-color: #4a4a4a;
   
}



/* ===  promociones ===*/
.omniBox {
    max-width: 100%;
    text-align: center;

}

#image-wrap, #rd-wrap {
    display: inline-block;
    vertical-align: top;
}

#image-wrap{
    width: 60%;
    height:300px;
    border:  1px solid gray;
}

#image-wrap img{
    max-width: 100%;
    height:auto;
    max-height:90%;
}

#rd-wrap{
    width: 30%;
}

#img-loader-wrap{
    width:60%;
}
#img-loader{
    width: 100%;
    margin: .5em 3em;
}


#coment-wrap{
    display: block;
}

#coment-wrap, #bsi-wrap, button{
    display: inline-block;
    vertical-align: top;
    margin:1% 0 0 8%;
}

#coment-wrap{
    width: 35%;
    text-align: left;
}

#coment-wrap textarea{
    width:100%;
}

#numbers-wrap{
    width: 68%;
    text-align: left;
}

#resume-des{
    font-size:2.5em;
    font-style: italic;
}


#resume-ba-score{
font-size: 4em;
font-style:italic;
color: #EC892F;
text-align: center;
width:100%;
margin: 20px 0 0 0;
}

#resume-ba-score img{
  max-width: 1em;
}


/***  === vista del Cliente  ****/

#wrap-uploads, #themesButton{
    display: inline-block; 

}

.wrap-up img {
    max-width: 8em;
}

.wrap-up img, .wrap-up input[type="file"]{
display: inline-block;
vertical-align: top;
}

#themesButton{
    display: inline-block;
    width: 20%;
}

/*==== garzones  ====*/
#left-box input {
    border-radius: 7px;
    width: 90%;
    margin: 1em 0;
    padding-left: 1em;
}

input:focus{
    box-shadow: 1px 1px 10px #3485CD;
}


input {
    outline: none;
    border: 1px solid #CECECE ;
}

#left-box div{
width:100%;
}

#left-box div p{
    font-size: 2em;
}


.wrap-per-list{
    height: 14em;
    overflow-y: scroll;
}


/* ====  */

/* ==== customers ====*/

#main-customers p {
    font-size: 2em;
}
#main-customers input{
    width: 50%;
    border-radius: 7px;
    margin: 1em 0;
    padding-left: 1em;
}

#main-customers input[type='password']{
width:24.5%;
display: inline-block;
vertical-align: top;
}


#wrap-main-custom{
    width:100%;
}

/*  == estilos Especiales Jquery Switch */

.inClass{
font-size: .7em;
max-width: 190px;

}


.wrap-metadata{
    display: inline-block;
    vertical-align: top;
    max-height: 1em;
    float: right;
}

.wrap-metadata p{
    font-size: 1em;
    color: darkorange ;
    display: inline-block;
    vertical-align: top;
}

.wrap-lite, .wrap-lite div{
    display: inline-block;
    vertical-align: top;
   
}

.wrap-lite {
     width:100%;
}

.wrap-lite div{
margin: 1em .5em;
font-size: 1.5em;

}
.wrap-lite div:last-child{
color: darkorange;
}

#showPre{
width:90%;
padding: .5em;
font-style: italic;
font-size: 1em;
color: #4A4A4A;

}

#showPre p{
    color: darkorange;
}

#showPre p, #showPre{

    display: inline-block;
    vertical-align: top;
}

.thumnail{
    max-width:40px;
    max-height: 40px;
   margin-left:30%;
}

.cellEditing input[type=text]{
background-color:transparent;
color : orange;
text-shadow: 0px 2px 12px rgba(150, 150, 152, 1);
}


/* switch de paneles */
#Icon, #backG {
    width:40%;
}


#wrap-current-themes, #Icon, #backG{
display: inline-block;
vertical-align: top;
}

#Icon img, #backG img{
    max-width: 100%;
    max-height: 5em;
}

#current-titles{
    width:100%;
    position: relative;
left: -8px;
}
#current-titles, #current-titles p{
    display: inline-block;
    vertical-align: top;
}

#list-client{
    max-height: 25em;
    overflow: auto;
}


#traffic-col{
    max-height:25em;
    overflow-y: visible;
}

.infor{
background: #fefcea; /* Old browsers */
background: -moz-linear-gradient(top,  #fefcea 79%, #efe5a5 100%); /* FF3.6+ */
background: -webkit-gradient(linear, left top, left bottom, color-stop(79%,#fefcea), color-stop(100%,#efe5a5)); /* Chrome,Safari4+ */
background: -webkit-linear-gradient(top,  #fefcea 79%,#efe5a5 100%); /* Chrome10+,Safari5.1+ */
background: -o-linear-gradient(top,  #fefcea 79%,#efe5a5 100%); /* Opera 11.10+ */
background: -ms-linear-gradient(top,  #fefcea 79%,#efe5a5 100%); /* IE10+ */
background: linear-gradient(to bottom,  #fefcea 79%,#efe5a5 100%); /* W3C */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#fefcea', endColorstr='#efe5a5',GradientType=0 ); /* IE6-9 */
height: 0;
display:none;
  -webkit-transition: all 1s ease-in-out;
  -moz-transition: all 1s ease-in-out;
  transition: all 1s ease-in-out;

}

table{
    table-layout: fixed;
}


#head-minus-table{
    overflow-y:auto;

}

#head-minus span{
    width:100%;
    font-weight: bolder;
}

#head-minus td{
width:20%;
}

#head-traffic-table{
    width:100%;
    overflow-y: auto;
}

#traffic-table td{
    width:16.66666666%;
}

#head-traffic-table th span{
    width:100%;
    font-weight: bolder;
}

#custom-custom{
      table-layout: fixed;
  width: 100%;
  white-space: nowrap;
}

#custom-custom td {
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
}

.row{
    width:10%;
}
.row-link{
   width:20%;
}
</style>
</head>
<body>

    <div id="wrapper">
        <!-- Navigation -->
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet" />
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" > QR Recongnition  / Emenu </a>
                <input type="hidden" value="<? printf($_SESSION["TxtFacName"]) ?>" id="id-facility">
                <input type="hidden" value="<? printf($_SESSION["TxtCode"]) ?>" id="id-facility-code">
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>   <? printf($Res_domain['FAC_CUSTOM_NAME']) ?>  <? printf($Res_domain['FAC_CUSTOM_SURNAME'])?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="close_resto.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
          <? if($keyUser === false){
              ?>  
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li id="dbo_side">
                        <a href="#"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li id="rls_side"> 
                        <a href="#"><i class="fa fa-fw fa-cogs"></i> Reglas</a>
                    </li>
                    <li id="ac_side">
                        <a href="#"><i class="fa fa-fw fa-group"></i> Accessos</a>
                    </li>
                    <li id="pp_side">
                        <a href="#"><i class="fa fa-fw fa-tags"></i> Promociones</a>
                    </li>
                    <li id="est">
                        <a href="#"><i class="fa fa-fw fa-signal"></i>Estadisticas</a>
                    </li>
                </ul>
            </div>
            <?
          }
            ?>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">


                <!-- /.row -->

   <?

    if($keyUser === false){

   ?>

                 <div class="row over-categories">
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-cogs fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">3</div>
                                        <div>Reglas</div>
                                    </div>
                                </div>
                            </div>
                            <a href="#" >
                                <div class="panel-footer" id="rls_ac">
                                    <span class="pull-left" >Acceder</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-group fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><? printf($Res_count_personal[0]) ?></div>
                                        <div>Accesos</div>
                                    </div>
                                </div>
                            </div>
                            <a href="#" >
                                <div class="panel-footer" id="ac_ac">
                                    <span class="pull-left" >Acceder</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-signal fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">124</div>
                                        <div> &ensp;&ensp;&ensp;&ensp;Estadisticas Clientes</div>
                                    </div>
                                </div>
                            </div>
                            <a href="#" >
                                <div class="panel-footer" id="c_ac">
                                    <span class="pull-left" >Acceder</span>
                                    <span class="pull-right" ><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-tags fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><? printf($res_count_promos['COUNT(PRO_ID)']) ?> </div>
                                        <div>Promociones y premios</div>
                                    </div>
                                </div>
                            </div>
                            <a href="#">
                                <div class="panel-footer" id="pp_ac">
                                    <span class="pull-left" >Acceder</span>
                                    <span class="pull-right" ><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix" ></div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

   <!-- el jose no tiene esto -->
 <?
}
 ?>


 <? if($keyUser === false){

    ?>
            <div class="row over-rules hidden">
               <div class="col-lg-12">
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-reorder "></i><a> Duraci&oacute;n de puntos General</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-clock"> </i> 
                            </li>
                        </ol>
                </div>
            </div>

         <div class="row over-rules hidden">

              <div class="col-lg-6" id="bar_content" align="center">
                  <div id="bar_wrapper">
                      <input type="text" class="js-range" value="3">
                  </div>
                  <div id="time" align="center"></div>
              </div>
   

              <div class="col-lg-6" id="Bon-Apetit-score-content" align="center">
                            <div id="showPre">
              <?
              if($Res_Rules === ""){
                  ?>
                  <input type="hidden" id="startVal" value="0" >Por Visitas:&ensp;<p>0</p> &ensp;  /  &ensp;Por monto boleta:&ensp;<p>0</p>
                  <?
              } else {
                  while($fila4 = mysqli_fetch_row($Res_Rules)){
               ?>
               <input type="hidden" id="startVal" value="<? printf($fila4[0]/30)  ?>" >Por Visitas:&ensp;<p> <?  printf($fila4[2])  ?></p> &ensp;  /  &ensp;Por monto boleta:&ensp; <p><?  printf($fila4[1])  ?> </p>

               <? }}?>
               </div>
                  <div class="score_wrap">
                      1 <img src="image_icons/BA.png">  Puntos /
                  </div>
                  <div class="Cant-des-wrap">
                       <div style="display: inline-block; vertical-align:top">x Cada</div>
                  </div>
                  <button id="setRule" class="btn btn-lg btn-primary" style="display: none; width:50%; padding: .5em;" >Grabar</button>
             <div id="list_content_1"align="center">
                      <a id="dropdown_1" href="javascript:;" data-toggle="collapse" data-target="#demo2">Seleccione categor&iacute;a<i class="fa fa-fw fa-caret-down"></i></a>
                    <ul class="collapse" id="demo2">
                        <li id="visita"><a style="cursor:pointer;">Visita</a></li>
                        <li id="compra"><a style="cursor:pointer;">En Compra</a></li>
                    </ul>
            </div>
              </div>
          </div>

         <div class="row over-promotion hidden">
                 <div class="col-lg-12">
                    <ol class="breadcrumb">
                        <li>
                            <i class="fa fa-eye "></i><a> Personalizar vista cliente</a>
                        </li>
                        <li class="active">
                            <i class="fa fa-clock"> </i> 
                        </li>
                    </ol>
                </div>
         </div>

    <div class="row over-promotion hidden">
         <div class="col-lg-8">
         <div></div>
            <form id="wrap-uploads" action="upload-themes.php" method="POST" enctype="multipart/form-data">
             <input type="hidden" value="<? printf($_SESSION['TxtFacName'])?>" class="fac" name="fac">
               <div class="wrap-up">
               <p>Logo</p>
                    <input type="file" class="btn btn-lg btn-warning" name="background-client"  accept="image/" onchange="previewFile('#' + this.nextElementSibling.id, '#' + this.id)" id="background-client">
                    <img src="" id="pre-img-1">
                    <button class="btn btn-lg btn-success" id="iconButton" style="margin-left: 0;">Ingresar Logo</button>
                </div>
                <input type="submit" id="second_submit" style="display: none">
             </form>
           
         </div>
         <div class="col-lg-4">
         <div id="wrap-current-themes" align="center">
              <div id="current-titles" ><p style="margin-left: 20px;">&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;Logo Actual</p></div>
             <div id="Icon"><img src="images/<? echo $_SESSION['TxtFacName'] ?>/themes/background-client.png"></div>
         </div>
         </div>
    </div>
         <div class="row over-promotion hidden">
               <div class="col-lg-12">
                        <ol class="breadcrumb">
                            <li style="vertical-align: top;">
                                <i class="fa fa-tags "></i><a href="#"> Ingresar Promoci&oacute;n</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-bars" style="float: right;" onclick="switching()"></i> 
                            </li>
                        </ol>
                </div>
            </div>
         <div class="row over-promotion hidden">
             <div class="col-lg-12">
                 <div class="omniBox">
                     <div id="image-wrap">
                         <img id="prev-picture" src="" class="fa fa-tags fa-5x">
                     </div>
                    <div id="rd-wrap">
                        <div id="resume-des"></div>
                        <div id="resume-ba-score"><img src=""></div>
                        <div id="code-pro-wrap" style="display:none;">
                            <p>C&oacute;digo Promoci&oacute;n</p>
                            <input type="text" value="" maxlength="8" id="codigo_pro">
                        </div>
                    </div>
                    <form id="img-loader-wrap" action="upload_img.php" method="post" enctype="multipart/form-data">
                          <input type="file" id="img-loader" class="btn btn-lg btn-primary" accept="image/*" onchange="previewFile('#prev-picture' , '#' + this.id)" name="upload">
                          <input type="submit" value="submit" style="display: none;" id="send">
                          <input type="hidden" value="" id="code" name="code">
                          <input type="hidden" value="" class="fac" name="fac">
                    </form>
                     <div id="numbers-wrap">
                         <div id="coment-wrap">
                         Descripci&oacute;n
                             <textarea placeholder="Ingresa aquí tu descripción" maxlength="23"></textarea>
                         </div>
                         <div id="bsi-wrap">
                         <div>Valor en puntos</div>
                             <input value="" name="ba-score-input" id="ba-score-input" type="number"  min="0" step="1"/>
                         </div>
                          <button class="btn btn-lg btn-success" id="up-promo">Ingresar Promocion</button>
                     </div>
                    
                 </div>
             </div>
         </div>




         <div class="row over-promotion hidden">
                 <div class="col-lg-12">
                    <ol class="breadcrumb">
                        <li>
                            <i class="fa fa-eye "></i><a>Administraci&oacute;n de promociones</a>
                        </li>
                        <li class="active">
                            <i class="fa fa-clock"> </i> 
                        </li>
                    </ol>
                </div>
         </div>



 <div class="row over-promotion hidden" align="center">
  <div class="col-lg-8">
      <h2>Promociones Ingresadas</h2>
      <div class="table-responsive">
          <table class="table table-bordered table-hover table-striped">
           <thead>
                <tr>
                  <th>Descripci&oacute;n</th>
                  <th>C&oacute;digo</th>
                  <th>Valor En puntos</th>
                  <th>Imagen</th>
                  <th>Acciones</th>
                </tr>
            </thead>
            <tbody id="promo-wave">

     <? 
         while($fila5 = mysqli_fetch_row($Res_Pro)){
      ?>
             <tr>
                <input type="hidden" value="<? printf($fila5[5]) ?>">
                <td><span class="promo-table"><? printf($fila5[2])?></span></td>
                <td><span class="promo-table"><? printf($fila5[0])?></span></td>
                <td><span class="promo-table"><? printf($fila5[1])?></span></td>
                <td><img  class="thumnail" src="images/<? printf($_SESSION['TxtFacName'])?>/<? printf($fila5[4])?>.jpg"></td>
                <td>&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;<i class="fa fa-eraser erase" title="Borrar Promoción" style="cursor:pointer;"></i></td>
            </tr>

    <?   
       }

    ?>
           </tbody>
          </table>
      </div>
  </div>
     
 </div>
         <div class="row over-personal hidden">
                 <div class="col-lg-12">
                    <ol class="breadcrumb">
                        <li>
                            <i class="fa fa-group "></i>   <i class=" fa fa-lock"></i><a>Ingreso de Personal y administraci&oacute;n de credenciales</a>
                        </li>
                        <li class="active">
                            <i class="fa fa-clock"> </i> 
                        </li>
                    </ol>
                </div>
         </div>
     <div class="row over-personal hidden">
         <div class="col-lg-12" style="margin-bottom:2em;">
            <div class="col-lg-6" id="left-box" align="center">
                <div><p>  Ingreso de Personal </p></div>
                <input id="GName" type="text" placeholder="Nombre del Garz&oacute;n">
                <input id="GSurname" type="text" placeholder="Apellido del Garz&oacute;n">
                <div id="aux-content" style="width:100%; display: none;">
                    <input type="text" id="aux-user" value="" style="width:90%; margin-top: 1em;" placeholder="Ingrese nombre de usuario">
                    <input type="text" id="aux-pass" value="" style="width:90%; margin-top: 1em;" placeholder="Ingrese contraseña">
                </div>
                <div style="display: inline-block; vertical-align: top; width: 100%;">
                 <input type="checkbox" id="sb-adm-able" <? printf($checkit) ?> style="display: inline-block; vertical-align: top; width:auto; margin-right:1em; margin-top:0; text-align: left;"><p style=" text-align: left;display: inline-block; vertical-align:top; font-size: 1em !important">Asignar como usuario subadministrador</p>
                </div>
                <button id="submit_gar" class="btn btn-lg btn-success">Crear</button>
                <button id="passPersonal" class="btn btn-lg btn-default" onclick="pass2pass()" >Password Garzones</button> 
            </div>
            <div class="col-lg-6" id="right-box">
            <div align="center" style="width: 100%;"><p style="font-size:2em;">Lista de personal</p></div>
            <h4>Credenciales Garzones</h4>
            <table id="head-minus-table" style="width: 100%;">
                 <thead id="head-minus">
                    <tr>
                        <td><span>Nombre </span></td>
                        <td><span>Ultimo Login</span></td>
                        <td><span>Total Puntos</span></td>
                        <td><span>Contraseña</span></td>
                        <td><span>Modif. Patrón</span></td>
                    </tr>
                </thead>
            </table>
            <div class="wrap-per-list">
            <table  id="personal-table-data" class="table table-bordered table-hover table-striped">
                <tbody id="minus">
                <?  

                if(!$Res_Per || mysqli_num_rows($Res_Per) === 0){
                    
                     ?>
                    <tr>
                        <td><span>Sin Personal</span></td>
                        <td><span>0</span></td>
                        <td><span>0</span></td>
                        <td><span>0</span></td>
                        <td><span>0</span></td>
                    </tr>
     <?
                } else {

                    while($fila1 = mysqli_fetch_row($Res_Per)){

                 if($fila1[6] != 1){
                ?>
                <tr>
                    <input type="hidden" value="<? printf($fila1[5]) ?>">
                    <td><span><? printf($fila1[0]) ?> &ensp; <? printf($fila1[4]) ?></span></td>
                    <td><span><? printf($fila1[2])?></span></td>
                    <td><span></span></td>
                    <td><span><? printf($fila1[1])?></span></td>
                    <td><span class="rePat2" style="cursor:pointer"><i class="fa fa-repeat rePat" style="width:49%; text-align:left; cursor:pointer"></i></span><span class="rePat3" ><i class="fa fa-close delete" style="width:50%; text-align:right; cursor:pointer"></i></span></td>
                </tr> 
                <?
            }
          }
      }
          ?>
                   </tbody>
                 </table>

                </div>
              <input type="button" value="Borrar" id="eraPer" style="margin:1em 0; padding: .3em .6em">
<!--  aqui va el recuadro del Sub admin-->
    <h4>Credenciales Sub-Administrador</h4>
            <table  class="table table-bordered table-hover table-striped">
                 <thead>
                    <tr>
                        <td><span>Nombre</span></td>
                        <td><span>Apellido</span></td>
                        <td><span>Usuario</span></td>
                        <td><span>Contraseña</span></td>
                    </tr>
                  </thead>
                  <tbody id="sb-admin-table">
                      <tr> 
                            <input type="hidden" value="<? printf($cards['PER_ID']) ?>" />
                            <td><? printf($cards['PER_NAME']) ?></td>
                            <td><? printf($cards['PER_SURNAME']) ?></td>
                            <td><? printf($res_ponderate['FAC_AUX_USER']) ?></td>
                            <td><? printf($res_ponderate['FAC_AUX_PASS'])?></td>
                      </tr>

                  </tbody>
            </table>
        <!-- -->
            </div>
         </div>
     </div>
<?
}
?>

         <div class="row over-personal hidden">
                 <div class="col-lg-12">
                    <ol class="breadcrumb">
                        <li>
                            <i class="fa fa-google-wallet"></i><a>Registro historico tráfico</a>
                        </li>
                        <li class="active">
                            <i class="fa fa-exchange"></i> 
                        </li>
                    </ol>
                </div>
         </div>

         <div class="row over-personal hidden">
            <div class="col-lg-12" id="traffic-col">
   
                    <table id="head-traffic-table" >
                     <thead>
                         <tr>
                            <th class="th-fix"><span>Nombre Garzon</span></th>
                            <th class="th-fix"><span>Numero de boleta</span></th>
                            <th class="th-fix"><span>Cliente Atendido</span></th>
                            <th class="th-fix"><span>Puntos Otorgados</span></th>
                            <th class="th-fix"><span>Fecha/Hora Atención</span></th>
                            <th class="th-fix"><span>Monto Compra</span></th>
                         </tr>
                     </thead>
                     </table>
         <div class="wrap-per-list" >
             <table class="table table-bordered table-hover table-striped" style="max-height: 15em;">
                     <tbody id="traffic-table">

  <?
    if($Res_Traffic === ""){

    } else {

   while($r = mysqli_fetch_row($Res_Traffic)){ ?>
                         <tr>
                            <td><span><? printf($r[0]) ?></span></td>
                            <td><span><? printf($r[4]) ?></span></td>
                            <td><span><? printf($r[1]) ?></span></td>
                            <td><span><? printf($r[2]) ?></span></td>
                            <td><span><? printf($r[3]) ?></span></td>
                            <td><span><? printf($r[5]) ?></span></td>
                         </tr>

   <?  }
   } ?>
                     </tbody>
                 </table>
                </div>

            </div>
         </div>


        <!-- <div class="row over-cliente ">
                 <div class="col-lg-12">
                    <ol class="breadcrumb">
                        <li>
                            <i class="fa fa-user "></i><a href="#">perfil del Personal</a>
                        </li>
                        <li class="active">
                            <i class="fa fa-clock"></i> 
                        </li>
                    </ol>
                </div>
         </div> -->




<? if($keyUser === true){

    ?>
         <div class="row over-cliente ">
                 <div class="col-lg-12">
                    <ol class="breadcrumb">
                        <li>
                            <i class="fa fa-laptop "></i><a href="#">Ingreso de clientes</a>
                        </li>
                        <li class="active">
                            <i class="fa fa-clock"> </i> 
                        </li>
                    </ol>
                </div>
         </div>

<div class="row over-cliente ">
    <div class="col-lg-12" align="center" id="main-customers" >
      <p>Ingreso de Clientes</p>
        <div class="wrap-main-custom" align="center">
            <input type="text" id="name-custom" placeholder="Nombre del cliente">
            <input type="text" id="user-surname-custom" placeholder="Apellido">
            <input type="text" id="fac-name" placeholder="Nombre del establecimiento">
            <input type="text" id="user-name-custom" placeholder="Nombre de usuario">

            <div class="wrap-claves-custom" >
                   <input type="password" id="pass1" placeholder="Contraseña">
                   <input type="password" id="pass2" placeholder="Repita Contraseña">
            </div>

            <div id="matching" align="center" style="color: red; font-style: italic; font-size:1em;"></div>
            <button class="btn btn-lg btn-success" id="enter-custom" style="margin: 1% 0 0 0 !important,">Crear Cliente</button>
            <div id="customLink" style="background-color: #FFF; font-size:1.5em; color: darkorange; font-style: italic; padding: 1.5em 0;"></div>
        </div>
    </div>
</div>

         <div class="row over-cliente">
                <div class="col-lg-12">
                    <ol class="breadcrumb">
                        <li>
                            <i class="fa fa-group "></i><a onclick="switchingViews()">&ensp;&ensp;&ensp;Lista de clientes ingresados</a>
                        </li>
                    </ol>
                </div>
         </div>

<div class="row over-cliente" id="clientes">
    <div class="col-lg-12" align="center" id="main-customers">
     <table class="table table-bordered table-hover table-striped" id="custom-custom">
         <thead>
            <tr>
                 <th class="row-1 row"><strong>Nombre</strong></th>
                 <th class="row-2 row"><strong>Apellido</strong></th>
                 <th class="row-3 row"><strong>Establecimiento</strong></th>
                 <th class="row-4 row"><strong>Usuario</strong></th>
                 <th class="row-5 row"><strong>Password</strong></th>
                 <th class="row-6 row-link"><strong>Link interfaz comensal</strong></th>
                 <th class="row-7 row"><strong>Borrar</strong></th>
            </tr>
         </thead>
         <tbody id="list-client">
  <? while ($fila8 = mysqli_fetch_row($client_side)){ ?>
            <tr>
                 <input type="hidden" value="<? printf($fila8[0]) ?>" id="client-side-id">
                 <td><span class="client-side-list"><? printf($fila8[7]) ?></span></td>
                 <td><span class="client-side-list"><? printf($fila8[8]) ?></span></td>
                 <td><span class="client-side-list"><? printf($fila8[2]) ?></span></td>
                 <td><span class="client-side-list"><? printf($fila8[4]) ?></span></td>
                 <td><span class="client-side-list"><? printf($fila8[3]) ?></span></td>
                 <td><span>https://smilepoints.cl/restotechbeta.php?f=1&facility=<? printf($fila8[1]) ?>&name=<? printf(urlencode($fila8[2])) ?></td>
                 <td><span class="borrar"><i class="fa fa-eraser fa-2x"></i></span></td>
            </tr>

            <? } ?>
         </tbody>
     </table>
    </div>
</div>

<div class="row over-cliente" id="comensales">
    <div class="col-lg-12" align="center">
         <table class="table table-bordered table-hover table-striped">
         <thead>
            <tr>
                 <th><strong>Nombre</strong></th>
                 <th><strong>Email</strong></th>
                 <th><strong>Fecha ingreso</strong></th>
            </tr>
         </thead>
         <tbody>
  <? while ($fila10 = mysqli_fetch_row($Res_comensales)){ ?>
            <tr>
                 <td><span><? printf($fila10[1]) ?></span></td>
                 <td><span><? printf($fila10[2]) ?></span></td>
                 <td><span><? printf($fila10[3]) ?></span></td>
            </tr>
            <? } ?>
         </tbody>
     </table>
</div>
</div>


<? } ?>

<? if( $keyUser === false){ ?>
             <div class="row over-estadisticas hidden">
                 <div class="col-lg-12">
                    <ol class="breadcrumb">
                        <li>
                            <i class="fa fa-area-chart "></i><a href="#">Estadisticas de clientes</a>
                        </li>
                        <li class="active">
                            <i class="fa fa-clock"> </i> 
                        </li>
                    </ol>
                </div>
         </div>

<div class="row over-estadisticas hidden">
    <div class="col-lg-p12">
        <div class="col-lg-6">
            <div class="panel-heading">
               <h3 class="panel-title">
                   <i class="fa fa-signal"></i>
                 Clientes usando QR-fidelity Card
               </h3>
            </div>
              <div class="panel-body">
                    <div id="morris-line-chart"></div>
            </div>
        </div>
        <div class="col-lg-6">
         <div class="panel-heading">
              <h3 class="panel-title">
               <i class="fa fa-signal"></i>
              Resumen
              </h3>
         </div>
         <div class="wrap-resume">
           <table class="table table-bordered table-hover table-striped">
               <thead>
                <tr>
                    <td>Clientes Fidelizados</td>
                    <td>Total puntos otorgados</td>
                    <td>Media de visitas diarias</td>
                    <td>Total Promociones Consumidas</td>
                 </tr>
               </thead>
               <tbody>
      <? while($fila40 = mysqli_fetch_row($Res_Client)){ ?>
                 <tr>
                    <td><? printf($fila40[0]) ?></td>
                    <td><? printf($fila40[1]) ?></td>
                    <td><? printf($fila40[2]) ?></td>
                    <td><? printf($res_prooo['TOTAL']) ?></td>
                 </tr>
     <?  } ?>
               </tbody>

           </table>

         </div>
        </div>
    </div>
</div>

<?
}
?>

             <div class="row over-estadisticas hidden">
                 <div class="col-lg-12">
                    <ol class="breadcrumb">
                        <li>
                            <i class="fa fa-area-chart"></i><a href="#">Control de otorgamiento promociones</a>
                        </li>
                        <li class="active">
                            <i class="fa fa-clock"> </i> 
                        </li>
                    </ol>
                </div>
         </div>
<div class="row over-estadisticas hidden">
   <div class="col-lg-12">
   <div id="searhfield">
       <form class="wrap-search-barra">
           <input id="autocomplete" type="text" name="currency" class="biginput" style="width: 40%;">
       </form>
    </div>
      <div id="outputbox">
         <p id="outputcontent"></p>
      </div>
       <table class="table table-bordered table-hover table-striped" id="filtertable" placeholder="Digita el codigo de la promoción">
       <thead>
       <tr>
          <th><strong>Nombre Comensal</strong></th>
          <th><strong>Mesa</strong></th>
          <th><strong>Fecha y hora</strong></th>
          <th><strong>Codigo Promocion consumida</strong></th>
        </tr>
       </thead>
           <tbody>
           <?  while($tracert = mysqli_fetch_row($Res_Tracert)){ ?>
               <tr>
                   <td><span><? printf($tracert[0]) ?></span></td>
                   <td><span><? printf($tracert[3]) ?></span></td>
                   <td><span><? printf( date('d/m/Y h:i:s', strtotime($tracert[1]))  ) ?></span></td>
                   <td><span><? printf($tracert[2]) ?></span></td>
               </tr>
            <?  } ?>
           </tbody>
       </table>

   </div>
    

</div>


<div  id="tarjet" style="display:none"></div>
</div>
            <!-- /#page-wrapper -->


        </div>

         <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
         <script src="js/plugins/morris/raphael.min.js"></script>
         <script src="js/plugins/morris/morris.min.js"></script>
         <script type="text/javascript" src="js/jquery-form-plugin.js"></script>
       
         <script type="text/javascript" src="java/jlinq.js"></script>
         <script type="text/javascript" src="java/jlinq.jquery.js"></script>
         <script src="js/sweet-alert.min.js"></script> 

        <!-- Bootstrap Core JavaScript -->

        <script src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/jquery.floatThead.min.js"></script>
        <script type="text/javascript" src="js/jquery.autocomplete.min.js"></script>
        <script type="text/javascript" src="js/jquery.uitablefilter.js"></script>
        <script type="text/javascript">

        var Grafico;
<? if($keyUser === true){ 
    
} else { ?> 

$(document).on('ready', function(){

var c = new Date();

startDate =  c.getFullYear() + "-" + (c.getMonth()-1) + "-" + (c.getDate()-2);
endDate   =  c.getFullYear() + "-" + (c.getMonth()+1) + "-" + (c.getDate()+1);

        Grafico =  Morris.Line({
        element:'morris-line-chart',
        data: [{visita:'1', d:'2014-01-01'}],
        xkey: 'd',
        ykeys: ['visitas'],
        labels: ['Visitas'],
        xLabels: 'day',
        smooth:true,
        resize: true,
        hideHover: false,
        redraw: true
        });

getChartData(startDate, endDate);


      });

var night = document.querySelectorAll("#minus tr td:nth-child(5) span");

for (i=0 ; i < night.length ; i ++){
    if(night[i].innerHTML == ''){
       $("#passPersonal").removeClass('btn-default');
       $("#passPersonal").addClass('btn-info');
       break;
    }

}



<? } ?>


        </script>
</body>
</html>

<script src="powerange-master/dist/powerange.min.js"></script>
<script type="text/javascript">



var fac = $("#id-facility").val();
var fac_code = $("#id-facility-code").val();
var elem = document.querySelectorAll(".js-range");

$("#comensales").fadeOut('fast');

var inter = 0;

var initialD = $("#startVal").val();
var arrayOpt = [['Sin Vencimiento', 0], ['1 mes', 30],['2 Meses', 60 ],['3 Meses', 90],['4 Meses', 120],['5 Meses', 150],['6 Meses', 180]];

var switchView = 0;

$(function(){

var t = $('#filtertable');

  var currencies = [

  <? while ($sp = mysqli_fetch_row($Res_trapro)){ ?>
    { value: '<? printf($sp[0]) ?>' , data: '<? printf($sp[1]) ?>' },
<? } ?>

{ value: '0' , data: '0' }
];
  
  // setup autocomplete function pulling from currencies[] array
  $('#autocomplete').autocomplete({
    lookup: currencies,
    onSelect: function (suggestion) {
      var thehtml = '<strong>Codigo de la promoción</strong> ' + suggestion.value + ' <br> <strong>Symbol:</strong> ' + suggestion.data;
      $('#outputcontent').html(thehtml);
      $.uiTableFilter( t , suggestion.value, "Codigo Promocion consumida");
    }

  });
  
   

        
});

var table = $("#filtertable");

$("#autocomplete").keyup( function() {
    if($(this).val() === ''){
            $.uiTableFilter( table , this.value );
    }
 
  });

 function previewFile(selector, input_id) {

    $(input_id).css({visibility : "visible"});
    document.querySelector(input_id).style.visibility = 'visible';

    var preview = document.querySelector(selector); 
    var reader  = new FileReader();
    var file    = document.querySelector(input_id).files[0];

  reader.onloadend = function () {
    preview.src = reader.result;

     }

    if (preview) {
         reader.readAsDataURL(file); 
     } 
   else {
        preview.src = "";
      }
    }



$("#coment-wrap textarea").on("change keydown paste input", function(){
  var texto = $(this).val();
   $("#resume-des").html(texto);
   
});

$("#ba-score-input").on("change keydown paste input", function(){
      var valor = $(this).val();
   $("#resume-ba-score").html(valor);

   if(valor!= 0 || ""  ){
     $("#resume-ba-score").append('<img src="image_icons/BA2.png">');
           $("#code-pro-wrap").fadeIn(100);
 } else if(valor < -1){
      $("#resume-ba-score img").attr("src", "");
           $("#code-pro-wrap").fadeOut(100);
 }
  
});



$(document).ready(function(){

<? if($keyUser === true){ 

 } else { ?>
$("#time").html(arrayOpt[initialD][0]);

for(i=0;i<elem.length;i++){

var init = new Powerange(elem[i], {min: 0, max: 6, start: 5, decimal: false , hideRange: true});

elem[i].addEventListener('change', function(){
    var index = $(this).closest('.js-range').index('.js-range');
            var x = Number(elem[index].value);
               $("#time").html(arrayOpt[x][0]);
                        expiration(arrayOpt[x][1]);
 });
}

<? } ?>
    var options = { 
            target:'#tarjet',   
            resetForm: true, 
            success: aviso   

        }; 

     $('form').submit(function() { 
            $(this).ajaxSubmit(options);            
            return false; 
        });


});


/*
$("span > .inox").on('click', function(){

  if($(this).data('val') == 0 || $(this).data('val') == ''){
   
$('.infor').css({ display: 'table-cell'});
$('.infor').css({ height: '30px'});

    $(this).data('val', 1);

  } else {


$('.infor').css({ display: 'none'});
$('.infor').css({ height: '0'});
$(this).data('val', 0);

  }

});
*/


$("textarea").on('keyup' , function (event){
console.info(event.keyCode);
    if(event.keyCode == 32 && ($("textarea").is(":focus")) === false  ){
        $("textarea").focus();
        $("textarea").val($($("textarea")).val() + " ");
    }
})

$(".rePat").on('click', function(){
 var name = $(this).parent().parent().parent().children('td:first').children('span').html();
   $(this).css({color: 'darkorange'});

});


$(".rePat3 > i").on('click', function () {
    $(this).css({color: 'rgb(139,0,0)'});
});

$('.rePat3').on('click', function(){

  if($(this).data('val') === 0 || $(this).data('val') === ''){
        $(this).children('i').css({color: 'black'});
        $(this).data('val', 1);

  } else {

        $(this).children('i').css({color: 'darkred'});
        $(this).data('val', 0);
  }

var object = $('#minus tr td span i.delete');


for(i= 0; i < object.length; i++){

   if (object.eq(i).css('color') == "rgb(139, 0, 0)") { 

        $("#eraPer").addClass('btn-primary');
        break;
  } else {

     $("#eraPer").removeClass('btn-primary');

  }

      
}


   
});



$('.rePat2').on('click', function(){

var name = $(this).parent().parent().children('td:first').children('span').html();

  if($(this).data('val') === 0 || $(this).data('val') === ''){
        $(this).children('i').css({color: 'black'});
        $(this).data('val', 1);

  } else {

        $(this).children('i').css({color: 'darkorange'});
        $(this).data('val', 0);

  }

var object = document.querySelectorAll('#minus tr i.rePat');
var ref = document.querySelectorAll("#minus tr td:nth-child(5)");

for(i= 0; i < object.length ; i++){

console.info(i);

   if(object[i].style.color === 'rgb(255, 140, 0)'){ 
         
         $("#passPersonal").removeClass('btn-default');
         $("#passPersonal").html('Modificar contraseñas');
         $("#passPersonal").addClass('btn-info');

        break;

  } else {

   if(ref[i].innerHTML === ""){
    
     $("#passPersonal").addClass('btn-info');
     $("#passPersonal").html('Password Garzones');
     $("#passPersonal").removeClass('btn-default');
     break;

   } else {

     $("#passPersonal").removeClass('btn-info');
     $("#passPersonal").html('Password Garzones');
     $("#passPersonal").addClass('btn-default');

   }


  }
}



   
});



 $("#sb-admin-table td").dblclick( function() { 

  var OriginalContent = $(this).text();
  var row = $(this).siblings('input').val();
  var field =  $(this).index();

$(this).addClass("cellEditing"); 
    $(this).html("<input type='text' value='" + OriginalContent + "' />");
        $(this).children().first().focus(); 

$(this).children().first().keypress(function (e) { 
        if (e.which == 13) { 

            var newContent = $(this).val();
            ssd(newContent, row, fac_code , field);
                     $(this).parent().text(newContent); 
                         $(this).parent().removeClass("cellEditing"); 
                     }
                 });

      $(this).children().first().blur(function(){
          $(this).parent().text(OriginalContent); 
              $(this).parent().removeClass("cellEditing");
        //$(this).parent('tr').children('').attr()
      }); 

  });


//subadministrador =======



$('button#up-promo').on('click', function(){

var code_pro = $("#codigo_pro").val();
var score = $("#ba-score-input").val().replace(/^0+/g, "");
var description = $("textarea").val();

var img_check = document.getElementById("img-loader").value;


 if(description == '' || description == 0){

  swal("Debes poner una descripcion", "Para mostrar tu promoción", "warning");

} else if (score == '' || score < 1) {

  swal("Debes asignarle puntaje", "a tu promoción", "warning");

  } else if(code_pro == ""  || code_pro == 0) {
  
  swal("Debes ingresar un codigo de promoción", "", "warning");

} else if (img_check === "") {

  swal("Debes subir una imagen!", "Para mostrar tu promoción", "warning");

} else {



  if(researchID(code_pro) !== false){
     
    swal({   
        title: "Este codigo ya existe...",   
        text: "Deseas Sobrescribir la Promoción?",   
        type: "warning",   
        showCancelButton: true, 
        cancelButtonText: "No!",  
        confirmButtonColor: "#00E171",  
        confirmButtonText: "Sí!", 
        closeOnConfirm: false
    }, 
        function(){  

var indice = researchID(code_pro);
document.querySelectorAll('.thumnail')[indice].src = document.querySelector('#prev-picture').src;
    $("form .fac").val(fac);
    $("form #code").val(code_pro);
        document.querySelectorAll("#promo-wave tr td:nth-child(2) span")[indice].innerHTML = description;
        document.querySelectorAll("#promo-wave tr td:nth-child(4) span")[indice].innerHTML = score.replace(/^0+/g, "");
            sendProm(code_pro, score , description);
            $("#send").trigger("submit");
                document.querySelector('#prev-picture').src = "";
                $("#prev-picture").css({visibility : "hidden"});
        });

  } else {

    $("form .fac").val(fac);
        $("form #code").val(code_pro);
            sendProm(code_pro, score , description);
                $("#send").trigger("submit");
                    document.querySelector('#prev-picture').src = "";
                       $("#prev-picture").css({visibility : "hidden"});
                   }
}



});





$("#img-loader").on('change', function(){
    $("#prev-picture").css({visibility : "visible"});
})


$("button#iconButton").on('click', function(){


   if(document.querySelector("#background-client").value == ''){
      
      swal("Selecciona una foto para subirla", "", "warning");


   } else {

    $("form .fac").val(fac);
    $('#second_submit').trigger('click');

     swal({title : "Logo Guardado!", text: "", type: "success", timer: "3000", confirmButtonColor: "#FFF", confirmButtonText: " "});
     document.querySelector('#Icon > img').src =  document.querySelectorAll('.wrap-up img')[0].src;
     document.querySelectorAll('.wrap-up img')[0].src = "";
     document.querySelector('#pre-img-1').style.visibility = 'hidden';

   }

});


$("#background-client").on('click change', function(){
      document.querySelector('#pre-img-1').style.visibility = 'visible';
});

$("button#submit_gar").on('click', function(){

    enterPersonal();

});



$("#enter-custom").on('click', function(){

    if($("#pass1").val() !== $("#pass2").val()){
        swal("Claves no coinciden", "", "warning");

    } else {

var name = $("#name-custom").val();
var surname = $("#user-surname-custom").val();
var fac_name = $("#fac-name").val();
var usrname = $("#user-name-custom").val();
var custom_pass = $("#pass1").val();

if(researchCustom(usrname) === false){
 
enterCustom(name, surname, fac_name, usrname, custom_pass, 'in', "");

} else {

   swal("Este nombre de usuario ya está en uso", "Puedes elegir otro", "error");
    
}
    }
  
});


$("#visita, #visita a").on('click', function(){


$(".score_wrap").html($(".score_wrap").html().replace('Puntos', 'Visita'));

$(".Cant-des-wrap").html('<input type="text" class="inClass" name="visita" id="visita" value="" placeholder="Cantidad puntos">');
  $("#dropdown_1").trigger('click');
    if ($("#setRule").css('display') == 'none'){
           $("#setRule").fadeIn('slow');
       }

});



$("#compra, #compra a").on('click', function(){

$(".score_wrap").html($(".score_wrap").html().replace('Visita', 'Puntos'));

   $(".Cant-des-wrap").html('<input type="text" class="inClass" name="compra" id="compra" value="" placeholder="Total boleta">');

  $("#dropdown_1").trigger('click');

    if ($("#setRule").css('display') == 'none'){

           $("#setRule").fadeIn('slow');

       }

});


$("#setRule").on('click', function(){

var raiz = $(".Cant-des-wrap > input");

addRule(raiz.attr('id'), raiz.val());

});


 $("span.promo-table").dblclick( function() { 

  var OriginalContent = $(this).text();
  var row = $(this).parent().parent().children('input').val();
  var field =  $(this).parent().index();
if (field !== 2){
$(this).addClass("cellEditing"); 
    $(this).html("<input type='text' value='" + OriginalContent + "' />");
        $(this).children().first().focus(); 

$(this).children().first().keypress(function (e) { 
        if (e.which == 13) { 
            console.info('llega');
            var newContent = $(this).val();
            console.info(row + "/" + newContent + "/" + field);
                promoPanel(row, newContent, field)
                     $(this).parent().text(newContent); 
                         $(this).parent().removeClass("cellEditing"); 
                     }
                 });

      $(this).children().first().blur(function(){
          $(this).parent().text(OriginalContent); 
              $(this).parent().removeClass("cellEditing");
        //$(this).parent('tr').children('').attr()
      }); 
}

  });



//modificar tabla clientes
 $("span.client-side-list").dblclick( function() { 

  var OriginalContent = $(this).text();
  var row = $(this).parent().parent().children('input').val();
  var fila = $(this).parent().parent().index();
  var field =  $(this).parent().index();

$(this).addClass("cellEditing"); 
    $(this).html("<input type='text' value='" + OriginalContent + "' />");
        $(this).children().first().focus(); 

$(this).children().first().keypress(function (e) { 
        if (e.which == 13) { 
            var newContent = $(this).val();
                     $(this).parent().text(newContent); 
                         $(this).parent().removeClass("cellEditing"); 

var n   = document.querySelectorAll('#list-client tr td:nth-child(2) span')[fila].innerHTML;
var sn  = document.querySelectorAll('#list-client tr td:nth-child(3) span')[fila].innerHTML;
var f   = document.querySelectorAll('#list-client tr td:nth-child(4) span')[fila].innerHTML;
var usr = document.querySelectorAll('#list-client tr td:nth-child(5) span')[fila].innerHTML;
var pss = document.querySelectorAll('#list-client tr td:nth-child(6) span')[fila].innerHTML;

     enterCustom(n, sn, f, usr, pss, 'mod' , row);

                     }
                 });
      $(this).children().first().blur(function(){
          $(this).parent().text(OriginalContent); 
              $(this).parent().removeClass("cellEditing");
      }); 

  });







$('#pass2').on("change keydown paste input keypress", function(){

if($(this).val() === $("#pass1").val()){
     $("#matching").css({ color: "#51AF0C"});
     $("#matching").html('Aprobado!');
} else if ($(this).val() !== $("#pass1").val()){
        $("#matching").html('Contraseñas deben ser iguales!'); 
    } else if($(this).val()  === ""){
         $("#matching").html('');
    }

})






$("tbody#promo-wave .erase").on('click', function(){

 var row = $(this).parent().parent().children('input').val();
 var element = $(this).parent().parent();

    swal({   
        title: "Estás seguro?",   
        text: "Los cambios se reflejarán en la vista del comensal!",   
        type: "warning",   
        showCancelButton: true,   
        confirmButtonColor: "#DD6B55",  
        confirmButtonText: "Sí, borrar!", 
        closeOnConfirm: false 
    }, 
        function(){  
          element.remove();
                promoPanel(row, " " , 4);
                    swal({ title: "Promoción borrada!", text: "", type: "success", timer: "3000" ,confirmButtonColor : "#FFF", confirmButtonText: ""}); 
        });

});


$("span.borrar").on('click', function(){

 var row = $(this).parent().parent().children('input').val();
 var element = $(this).parent().parent();
 var ind = $(this).parent().parent().index();

    swal({   
        title: "Deseas borrar a este Cliente?",   
        text: "El cliente borrado no tendrá acceso al sistema!",   
        type: "warning",   
        showCancelButton: true,   
        confirmButtonColor: "#DD6B55",  
        confirmButtonText: "Sí, Borrar!", 
        closeOnConfirm: true
    }, 
    
   function(){  

     var nombre =  document.querySelectorAll('#list-client td:nth-child(4) span')[ind].innerHTML;
      enterCustom('', '', nombre, '', '', 'del', row);
          element.remove();
        });

});


$("#eraPer").on('click', function (){

console.info("llega para firefox");

if($(this).hasClass('btn-primary')){
     swal({title :"Realmente desea borrar el personal seleccionado?",
           text:  "",
           type :"warning",
        showCancelButton: true,   
        confirmButtonColor: "#DD6B55",  
        confirmButtonText: "Sí, borrar!", 
        closeOnConfirm: false 
       },
           function () {
             erasePersonal();
           });
 }

});

$("#sb-adm-able").on('change click', function () {

if(!this.disabled){

 if($("#sb-adm-able:checked").length > 0){

    $("#aux-content").fadeIn('fast');
    $("#GName").attr('placeholder', "Nombre del subadministrador");
    $("#GSurname").attr('placeholder', "Apellido subadministrador");

 } else {

    $("#aux-content").fadeOut('fast');
    $("#GName").attr('placeholder', "Nombre del garzón");
    $("#GSurname").attr('placeholder', "Apellido del garzón");
 }
}

});

function erasePersonal(){

var per="";

    var object = $('#minus tr td span i.delete');

for(i= 0; i < object.length; i++){
   if(object.eq(i).css('color') === 'rgb(139, 0, 0)'){ 
      per += $('#minus tr input').eq(i).val() + "|";
  } 
}


$.ajax({ type: "POST",
         url : "del_gar.php?fff=" + per + "&fac=" + $("#id-facility-code").val(),
         processData: false, 
         success: function (data){

              console.log(data);

    if(parseInt(data) == 1){ 

        if($("#sb-adm-able:checked").length > 0){
             $("#sb-adm-able").trigger('click');
             $("#sb-adm-able").attr("");
        }

         $("#sb-adm-able").removeAttr("disabled");
 }
    swal({ title: "Personal Borrado con exito", text: "", type: "success", timer: "3000", confirmButtonText: " " , confirmButtonColor:"#FFF"});
        $("#eraPer").removeClass('btn-primary');
             setTimeout( function (){
                 for(y= 0; y < object.length; y++){
                    if(object.eq(y).css('color') === 'rgb(139, 0, 0)'){ 
                        $('#minus tr').eq(y).remove();
                                } 
                              }
                            }, 1000);
                        }
                    })

}




function aviso(){

console.info('great!');
}

// funciones  


function pass2pass(){

if( $("#passPersonal").html() === 'Modificar contraseñas'){

swal({ 
 title: "Estás seguro de modificar la(s) contraseñas(s)?",
 text: "Tu personal de atención no tendrá una contraseña hasta que la establezcan en el sistema...",
 showCancelButton: true,
 confirmButtonText: "Si, quiero modificar",
 cancelButtontext: "No, no quiero",
 closeOnConfirm: true,
 confirmButtonColor: '#4DD345'},
 function(){
    var object = document.querySelectorAll('#minus tr i');
   var newar = ""

for(i= 0; i < object.length; i++){
   if(object[i].style.color === 'rgb(255, 140, 0)'){ 
    newar += object[i].parentNode.parentNode.parentNode.getElementsByTagName('input')[0].value;
     if(i === object.length-2){
     } else {
        newar +="|";
     }
  }
}


$.ajax({
    type: "POST",
    url : "modifypass.php?names=" + newar + "&fac=" + fac_code,
    success: function (data){
        if(parseInt(data) === 500){
        window.location = 'lock.php';
    } else {
        alert('no se pudo comunicar con el servidor');
    }
    }
});

});
} else if ($("#passPersonal").hasClass('btn-info')){
    window.location = 'lock.php';
} else {

}

}




function sendProm(proCode, score, description){

var di = new Date();
var fechaDisplay = di.getDate() + "-" + (di.getMonth()+1) + "-" + di.getFullYear() + " " + ('0' + di.getHours()).slice(-2) + ":" + di.getMinutes() + ":" + di.getSeconds();
var fechaIng     = di.getFullYear() + "-" + (di.getMonth()+1) + "-" + di.getDate() + " " + ('0' + di.getHours()).slice(-2) + ":" + di.getMinutes() + ":" + di.getSeconds();

var img_src = document.querySelector('#prev-picture').src;


proCode = proCode.replace(/^0+/g, '');


   $.ajax({
       type:"POST",
       url : 'db_data.php?code=' + proCode + '&score=' + score + "&descrip=" + description + "&fac=" + fac + '&dateing=' + fechaIng,
       success : function(data){
          console.info(data);
            swal({ title: "Tu promoción ha sido ingresada", text: "", type: 'success' , timer: "3000", confirmButtonColor: "#FFF", confirmButtonText: " " });
            $("textarea").val('');
            $("#codigo_pro").val('');
            $("#ba-score-input").val('');
            $("#resume-ba-score").html('');
            $("#resume-des").html('');
            $("#code-pro-wrap").fadeOut(100);
            insertCellsPromoTable(description , proCode , score, img_src, data, 'promo-wave');
            document.getElementById('prev-picture').src = "";
            document.getElementById('prev-picture').src = "";
            $("#prev-picture").css({visibility : "hidden"});
       },
       error : function (error){
        alert("Conexión con el servidor perdida");
       }
   })
   
}


function enterPersonal(){

var nom = $("#GName").val().trim();
var surn = $("#GSurname").val().trim();

var au = $("#aux-user").val().trim();
var ap = $("#aux-pass").val().trim();

if(nom !== '' && surn !== '') {

if($("#sb-adm-able:checked").length > 0 ){

   if(au !== '' && ap !== ''){

$("#passPersonal").addClass('btn-info');

var di = new Date();
var fechaDisplay = di.getDate() + "-" + (di.getMonth()+1) + "-" + di.getFullYear() + " " + di.getHours() + ":" + di.getMinutes() + ":" + di.getSeconds();
var fechaIng     = di.getFullYear() + "-" + (di.getMonth()+1) + "-" + di.getDate() + " " + di.getHours() + ":" + di.getMinutes() + ":" + di.getSeconds();

    $.ajax({
            type: "POST",
            url: "db_garIn.php?name=" + nom + "&Surname=" +  surn  + "&fac=" + fac_code + "&date=" + fechaIng + "&aux_user=" + au + "&aux_pass=" + ap,
            success: function(data){
               
                if(parseInt(data) === 2){
                   swal("No se pueden ingresar 2 personas con el mismo nombre y apellido", "", "error" );
                } else {
                 insertSADM(nom, surn , au , ap);
                    $("#GName").val('');
                        $("#GSurname").val('');
                           $("#aux-user").val('');
                                $("#aux-pass").val('');
                                  $("#sb-adm-able").attr("disabled", true);
                                     $("#sb-adm-able").attr("checked", false);
                                         $("#aux-content").fadeOut('slow');
                                             $("#GName").attr('placeholder', "Nombre del garzón");
                                                  $("#GSurname").attr('placeholder', "Apellido del garzón");
                             swal({title:"Personal ingresado", text :"", type: "success", timer: "3000", confirmButtonColor: "#fff", confirmButtonText: " "});
                }

            },
            error : function (error){
                alert("No se puedo conectar con el servidor!");
            }
        });


} else {

        swal("Faltan campos por llenar!", "", "warning");
}

} else {

$("#passPersonal").addClass('btn-info');

var di = new Date();
var fechaDisplay = di.getDate() + "-" + (di.getMonth()+1) + "-" + di.getFullYear() + " " + di.getHours() + ":" + di.getMinutes() + ":" + di.getSeconds();
var fechaIng     = di.getFullYear() + "-" + (di.getMonth()+1) + "-" + di.getDate() + " " + di.getHours() + ":" + di.getMinutes() + ":" + di.getSeconds();

    $.ajax({
            type: "POST",
            url: "db_garIn.php?name=" + nom + "&Surname=" +  surn  + "&fac=" + fac_code + "&date=" + fechaIng + "&aux_user=" + au + "&aux_pass=" + ap,
            success: function(data){
            console.info(data);
            if(parseInt(data) === 2){

                 swal("No se pueden ingresar 2 personas con el mismo nombre y apellido!", "", "error" );

            } else {

                 insertCells(nom, surn, '', fechaDisplay, 'minus', data);
                    $("#GName").val('');
                        $("#GSurname").val('');
                             swal({ title:"Personal ingresado", text: "", type: "success", timer:"3000", confirmButtonText: " " , confirmButtonColor: "#fff"});
                               $("#aux-content").fadeOut('slow');
            }


            },
            error : function (error){
                alert("No se puedo conectar con el servidor!");
            }
        });
}

     } else {

        swal("Faltan campos por llenar!", "", "warning");
     }

}



function enterCustom(name, surname, fac_name, usrname, custom_pass, argument, id){

if(argument === 'in' ){

if(name !== '' && surname !== '' && fac_name !== '' && usrname !== '' && custom_pass !== ''){
    

    var match = $("#matching").val();

if(match !== 'Contraseñas deben ser iguales!'){
    $.ajax({
            type: "POST",
            url: "db_customIn.php?name=" + name + "&surname=" +  surname + "&pass=" +  custom_pass + "&fac=" + fac_name + "&usrname=" + usrname + "&argument=" + argument,
            success: function(data){
                data1 = data.split(",");
                 insertCellClientTable(name, surname, fac_name,  usrname, custom_pass, 'list-client', data1[0], data1[1]);
                    $("#name-custom").val('');
                      $("#user-surname-custom").val('');
                        $("#fac-name").val('');
                          $("#pass1").val('');
                            $("#pass2").val('');
                              $("#user-name-custom").val('');
                                $("#matching").html('');
                                  swal({ title: "Cliente Ingresado!", text: "", type: "success", timer: "3000", confirmButtonColor: "#fff", confirmButtonText: " " });
            },
            error : function (error){
                alert("No se puedo conectar con el servidor!");
            }

    })

}  else {

}

    } else {

        swal("Faltan campos por llenar", "" , "warning");
    }

   } else {
        $.ajax({
            type: "POST",
            url: "db_customIn.php?name=" + name + "&surname=" +  surname + "&pass=" +  custom_pass + "&fac=" + fac_name + "&usrname=" + usrname + "&argument=" + argument + "&id=" + id,
            success: function(data){
                swal({ title: data, text: "", type: "success" , timer: "3000", confirmButtonText: " ", confirmButtonColor: "#FFF"});
            },
            error : function (error){
                alert("No se puedo conectar con el servidor!");
            }

    });
   }
}


function addRule(type, value, time){

var facCode= $("#id-facility-code").val();

   time = typeof time !== 'undefined' ? time : 0;

    $.ajax({

             type: "POST",
             url: "db_rules.php?type="+ type + "&value=" + value  + "&fac=" + facCode + "&timeEx=" + time,
             success : function (data){
        
   
   
    if(type == 'visita' && time === 0){
      $(".Cant-des-wrap").html(value + " Puntos");
        $("#showPre p:first").html(value);
           swal({ title : "Variable Visita Ingresada!", text: "", type: "success", timer: "3000", confirmButtonColor: "#FFF" , confirmButtonText: " "});
    }  else if (type === 'compra'){
        $(".Cant-des-wrap").html(value + " " + type);
          $("#showPre p:last-child").html(value);
            swal({ title: "Monto por boleta Ingresado!", text : "", type: "success", timer: "3000", confirmButtonText : " ", confirmButtonColor: "#FFF"});
    } else {

    }



$("#setRule").html("Reglas grabadas!");
        $("#setRule").removeClass(".btn-primary");
            $("#setRule").addClass(".btn-success");

      $("#setRule").fadeOut('fast', function(){
             $("#setRule").removeClass(".btn-success");
                  $("#setRule").addClass(".btn-primary");
                      $("#setRule").html("Grabar");
                                setTimeout(function(){
                              }, 2000);
                            });                   
                         },
             error : function (error) {
                alert('No se pudo comunicar con el servidor');
             }
    })
}



function promoPanel(id, newContent, field){
$.ajax({ type: "POST",
         url: "promoAdmin.php?promoId=" + id + "&field=" + field + "&content=" + newContent,
         success : function (data){
            console.info(data);
            if(field === 4 ){
                swal('Promomoción eliminada!');
            } else {
                swal('Promomoción modificada!');
            }
         },
         error: function (error){
            console.info(error);
         }
})
}

function expiration(time){

$.ajax({
      type: "POST",
      url: 'expiration.php?value=' + time + "&fac=" + fac_code,
      success : function (data){
         console.info(data);
      },
      error : function (error){

      }
})
}



function updateTable(tableRef, codigo, valor, URLimg){


}

function researchID(promoCode){

if(/^0+/.test(promoCode) == true){
   promoCode = promoCode.replace(/^0+/g, "");
}

for(i=0;i < document.querySelectorAll('#promo-wave tr').length; i++){
   if (promoCode.toUpperCase() == document.querySelectorAll('#promo-wave tr td:nth-child(3) span')[i].innerHTML.toUpperCase()){
    return i;
    break;
   } 
}
return false;
}

function researchCustom(customUsrName){
for(i=0;i < document.querySelectorAll('#list-client tr').length; i++){
   if (customUsrName.toUpperCase() === document.querySelectorAll('#list-client tr td:nth-child(5) span')[i].innerHTML.toUpperCase()){
    return i;
    break;
   } 
}
return false;
}




/*======   funciones de switch de vistas
*/


var mem = ""
var gB1 = ".over-rules";
var gB2 = ".over-personal";
var gB3 = ".over-estadisticas";;
var gB4 = ".over-promotion";
var gB5 = ".over-estadisticas";
var gB6 = ".over-categories";
var bP1 = "#button_panel";


//barra de fechas

//panel de control

$("#rls_ac, #ac_ac, #c_ac, #pp_ac").on('click', function(){
     $(".over-categories").removeClass('show');
     $(".over-categories").addClass('hidden');
});


$("#rls_ac").on('click', function(){
    if(mem === gB1){}
        else{

    $(mem).removeClass('show');
    $(mem).addClass('hidden'); 
    $(gB1).removeClass('hidden'); 
    $(gB1).addClass('show');
     mem = gB1;
         }
 });

$("#ac_ac").on('click', function(){
    if(mem === gB2){

    } else {
    
    $(mem).removeClass('show');
    $(mem).addClass('hidden'); 
    $(gB2).removeClass('hidden'); 
    $(gB2).addClass('show');


    mem = gB2;
}
});


$("#c_ac").on('click', function(){
    if(mem === gB3){}
        else{
          
    $(mem).removeClass('show');
    $(mem).addClass('hidden');  
    $(gB3).removeClass('hidden');      
    $(gB3).addClass('show');

    mem = gB3;
}
});


$("#pp_ac").on('click', function(){
    if(mem === gB4){
        }else{

    $(mem).removeClass('show');
    $(mem).addClass('hidden'); 
    $(gB4).removeClass('hidden');       
    $(gB4).addClass('show');

    mem = gB4;
}
});

$("#est").on('click', function(){
    if(mem === gB5){
         $(window).trigger('resize');
    }
        else{
     $(window).trigger('resize');
    $(mem).removeClass('show');
    $(mem).addClass('hidden'); 
    $(gB5).removeClass('hidden');       
    $(gB5).addClass('show');

    mem = gB5;

        }
})

// triggers 

$("#dbo_side").on('click', function(){

    $(".over-categories").removeClass('hidden');
     $(".over-categories").addClass('show');
})


$("#rls_side").on('click', function(){
       $("#rls_ac").trigger('click');
});
$("#ac_side").on('click', function(){
      $("#ac_ac").trigger('click');
})
$("#pp_side").on('click', function(){
      $("#pp_ac").trigger('click');
})
$("#c_side").on('click', function(){
      $("#c_ac").trigger('click');
})



$('#rls_ac').on('click', function(){

var Ttl = $('.range-bar').width();

if(inter === 0){

 document.querySelector('.range-handle').style.left = (initialD*(Ttl/6)-3) + "px";
 document.querySelector('.range-quantity').style.width = (initialD*(Ttl/6)-3) + "px";

inter = 1;

} 

})


// grafico
function getChartData(dateStart , dateEnd){

var ajaxData = $.ajax({
    type:"POST",
    url:'Graph_client.php?fac_code=' + fac_code + "&date1=" + dateStart + "&date2=" + dateEnd,

    success : function (data){

        var sizedData = JSON.parse(data);
        var basic = jlinq.from(sizedData.Data);
        var arrayN = new Array();

       for (i=0; i < basic.count() ; i++){
             arrayN[i] = {visitas: basic.select()[i].cant, d: basic.select()[i].date};
             }

             Grafico.setData(arrayN);
    }
});
         
}



function insertCells(nom, surn, pass, dataIng, object, iden, type){


 var parent = document.getElementById(object);


 var tr = document.createElement('tr');
   input = document.createElement('input');
   td1  = document.createElement('td');
   td2  = document.createElement('td');
   td3  = document.createElement('td');
   td4  = document.createElement('td');
   td5  = document.createElement('td');


   spn1 = document.createElement('span');
   spn2 = document.createElement('span');
   spn3 = document.createElement('span');
   spn4 = document.createElement('span');
   spn5 = document.createElement('span');
   spn6 = document.createElement('span');


   if(type == 'sbadm'){
    spn1.style.color = '#295CD3';
    spn2.style.color = '#295CD3';
    spn3.style.color = '#295CD3';
    spn4.style.color = '#295CD3';
    spn5.style.color = '#295CD3';
   }

   input.type= "hidden";
   input.value = iden;

   i = document.createElement('i');
   i.className = "fa fa-repeat rePat";
   i.style.width = "49%";
   i.style.textAlign = 'left';
   i.style.cursor = 'pointer';

   i2 = document.createElement('i');
   i2.className = "fa fa-close delete";
   i2.style.width = "50%";
   i2.style.textAlign = 'right';
   i2.style.cursor = 'pointer';


   i2.onclick = function (data){
     $(this).css({ color : 'rgb(139 , 0, 0)'});

   }

   spn1.innerHTML = nom + " " + surn;
   spn2.innerHTML = dataIng;
   spn3.innerHTML = "";
   spn4.innerHTML = pass;
   spn5.className = "rePat2";
   spn5.className = "rePat3";
   spn5.appendChild(i);
   spn6.appendChild(i2);

   spn6.onclick = function (){
      if($(this).data('val') === 0 || $(this).data('val') === ''){
        $(this).children('i').css({color: 'black'});
        $(this).data('val', 1);

  } else {

        $(this).children('i').css({color: 'darkred'});
        $(this).data('val', 0);
  }

var object = $('#minus tr td span i.delete');

for(i= 0; i < object.length; i++){

   if (object.eq(i).css('color') == "rgb(139, 0, 0)") { 
        $("#eraPer").addClass('btn-primary');
        break;
  } else {
     $("#eraPer").removeClass('btn-primary');

  }    
}

}


   td1.appendChild(spn1);
   td2.appendChild(spn2);
   td3.appendChild(spn3);
   td4.appendChild(spn4);
   td5.appendChild(spn5);
   td5.appendChild(spn6);

tr.appendChild(td1);
tr.appendChild(td2);
tr.appendChild(td3);
tr.appendChild(td4);
tr.appendChild(td5);
tr.appendChild(input);

parent.appendChild(tr);


}

function insertCellsPromoTable(descrip, code, score, imgSrc, id, object){


 var parent = document.getElementById(object);


 var tr = document.createElement('tr');

   input = document.createElement('input');
   input.type = 'hidden';
   input.value = id;

   td1  = document.createElement('td');
   td2  = document.createElement('td');
   td3  = document.createElement('td');
   td4  = document.createElement('td');
   td5 = document.createElement('td');

   spn1 = document.createElement('span');
   spn2 = document.createElement('span');
   spn3 = document.createElement('span');
   spn4 = document.createElement('span');
   spn5 = document.createElement('span');

   i = document.createElement('i');
   i.className = 'fa fa-eraser erase';
   i.title = "Borrar Promoción";
   i.style.cursor = 'pointer';

  i.onclick = function (data){

 var row = $(this).parent().parent().parent().children('input').val();
 var element = $(this).parent().parent().parent(); 

  console.info(element + " " + row);

    swal({   
        title: "Estás seguro?",   
        text: "Los cambios se reflejarán en la vista del comensal!",   
        type: "warning",   
        showCancelButton: true,   
        confirmButtonColor: "#DD6B55",  
        confirmButtonText: "Sí, borrar!", 
        closeOnConfirm: false 
    }, 
        function(){  
console.info(row + " " + 4);
       element.remove();
                promoPanel(row, "" , 4);
                    swal("Promoción borrada!"); 
        });

}
  

   spn5.appendChild(i); 

   img = document.createElement('img');
   img.className = "thumnail";
   img.src = imgSrc;



    
   spn1.innerHTML = descrip;
   spn2.innerHTML = code;
   spn3.innerHTML = score;

   spn4.appendChild(img);
   td1.appendChild(spn1);
   td2.appendChild(spn2);
   td3.appendChild(spn3);
   td4.appendChild(spn4);
   td5.appendChild(spn5);

tr.appendChild(td1);
tr.appendChild(td2);
tr.appendChild(td3);
tr.appendChild(td4);
tr.appendChild(td5);
tr.appendChild(input);

tr.insertBefore(input, td1);

parent.appendChild(tr);


}


function insertCellClientTable(name, surname, facility,  usrname, pass, object, id, facCode2){


var parent = document.getElementById(object);
var tr = document.createElement('tr');

   input = document.createElement('input');
   input.type = 'hidden';
   input.value = id;

   td1  = document.createElement('td');
   td2  = document.createElement('td');
   td3  = document.createElement('td');
   td4  = document.createElement('td');
   td5  = document.createElement('td');
   td6  = document.createElement('td');
   td7  = document.createElement('td');

   spn1 = document.createElement('span');
   spn2 = document.createElement('span');
   spn3 = document.createElement('span');
   spn4 = document.createElement('span');
   spn5 = document.createElement('span');
   spn6 = document.createElement('span');
   spn7 = document.createElement('span');

spn1.className = "client-side-list";
spn2.className = "client-side-list";
spn3.className = "client-side-list";
spn4.className = "client-side-list";
spn5.className = "client-side-list";
spn6.className = "client-side-list";
spn7.className = "client-side-list";

i=  document.createElement('i');
i.className = 'fa fa-eraser fa-2x';

   spn1.innerHTML = name;
   spn2.innerHTML = surname;
   spn3.innerHTML = facility;
   spn4.innerHTML = usrname;
   spn5.innerHTML = pass;
   spn6.innerHTML = 'restotech.cl/Qrmotion/restotechbeta.php?f=1&facility=' + facCode2 + "&name=" + facility;
   spn7.appendChild(i);

   td1.appendChild(spn1);
   td2.appendChild(spn2);
   td3.appendChild(spn3);
   td4.appendChild(spn4);
   td5.appendChild(spn5);
   td6.appendChild(spn6);
   td7.appendChild(spn7);

tr.appendChild(td1);
tr.appendChild(td2);
tr.appendChild(td3);
tr.appendChild(td4);
tr.appendChild(td5);
tr.appendChild(td6);
tr.appendChild(td7);
tr.appendChild(input);

tr.insertBefore(input, td1);

parent.appendChild(tr);

i.onclick = function(data){
 var row = $(this).parent().parent().parent().children('input').val();
 var element = $(this).parent().parent().parent();
 var ind = $(this).parent().parent().parent().index();

    swal({   
        title: "Deseas borrar a este Cliente?",   
        text: "El cliente borrado no tendrá acceso al sistema!",   
        type: "warning",   
        showCancelButton: true,   
        confirmButtonColor: "#DD6B55",  
        confirmButtonText: "Sí, borrar!", 
        closeOnConfirm: true
    }, 
        function(){ 
    
    var facName = document.querySelectorAll('#' + object +' tr td:nth-child(4) span')[ind].innerHTML;    
    enterCustom('', '', facName, '', '', 'del', row);
        element.remove();
            swal("Cliente borrado"); 
        });
};


}



function insertSADM(name, surname , nick, pass){

 document.querySelectorAll("#sb-admin-table > tr td")[0].innerHTML = name;
 document.querySelectorAll("#sb-admin-table > tr td")[1].innerHTML = surname;
 document.querySelectorAll("#sb-admin-table > tr td")[2].innerHTML = nick;
 document.querySelectorAll("#sb-admin-table > tr td")[3].innerHTML = pass;
}



function insertAfter(newNode, referenceNode) {
    referenceNode.parentNode.insertBefore(newNode, referenceNode.nextSibling);
}


function ssd(newVal, id, fac , ar){

$.ajax({
     type: "POST",
     url : "samod.php?ar=" + ar + "&id=" + id + "&val=" + newVal + "&fac=" + fac,
     success: function(data){
      console.info('modified');
     }
});
}

function switchingViews(){


     if(switchView == 0){

    $("#clientes").fadeOut('slow', function(){
        $("#comensales").fadeIn('slow');
    });

      switchView = 1;

     } else {

  $("#comensales").fadeOut('slow', function(){
        $("#clientes").fadeIn('slow');
    });

    switchView = 0;

     }


}
  </script>
       

       <?

 } else {


   echo "<script language='javascript'>window.location='close_resto.php'</script>";
 }

       ?> 





  


