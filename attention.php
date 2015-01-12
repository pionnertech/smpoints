
<?php

session_start();

if (isset($_SESSION['TxtCode'])){

$datos = mysqli_connect('localhost', "root", "D1sjjDlvD0", "SM_usr10000");


$RES_PROMO = mysqli_query($datos, "SELECT DISTINCT C.USR_NAME , A.PRO_DESCRIP, B.TRF_ID FROM PRO A INNER JOIN TRAFFIC B ON(A.PRO_CODE = B.TRF_PROMO) INNER JOIN USER C ON(C.USR_QR = B.TRF_USR_QR) WHERE (B.TRF_FAC_CODE = " . $_SESSION['TxtCode'] . " AND B.TRF_PRO_STATE = 0)");

if (mysqli_num_rows($RES_PROMO) === 0 ){

    $RES_PROMO = "";
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

    <title>Smile Points</title>
    <style type="text/css">
    .promo-bar{
       width:100%;
       text-align: left !important;
       margin: .5em 0;
    -webkit-transition: all 1s ease-in-out;
    -moz-transition: all 1s ease-in-out;
     transition: all 1s ease-in-out;

    }


    </style>
    <link rel="icon" type="image/png" href="image_icons/GreenQR.jpg">

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="css/sweet-alert.css"/>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->



</head>

<body>

    <div id="wrapper">
        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html"> Smile Points / fidelity card</a>
                <input type="hidden" value="Aji Seco" id="id-facility">
                <input type="hidden" value="1001" id="id-facility-code">
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> <b class="caret"></b></a>
                    <ul class="dropdown-menu message-dropdown">
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong><? printf($_SESSION['TxtUser']) ?></strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong>John Smith</strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong>John Smith</strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-footer">
                            <a href="#">Read All New Messages</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> <b class="caret"></b></a>
                    <ul class="dropdown-menu alert-dropdown">
                        <li>
                            <a href="#">Alert Name <span class="label label-default">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-primary">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-success">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-info">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-warning">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-danger">Alert Badge</span></a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">View All</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> John Smith <b class="caret"></b></a>
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
            <div class="collapse navbar-collapse navbar-ex1-collapse">
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Control <small> Consumo Promociones</small>
                        </h1>

                    </div>
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12" id="parent-overall">

              <? 
                if ($RES_PROMO === ""){

                    ?> 

                    <? } else { 
              while($row = mysqli_fetch_row($RES_PROMO)){ ?>
     <button class="btn btn-lg btn-success promo-bar" onclick="askBeforeCancel(this)"><i class="fa fa-times" style="color: #fff; margin-right:2em; "></i><? printf($row[0])?> cobró promocion "<? printf($row[1])?> " <input type="hidden" value="<? printf($row[2]) ?>"/></button>

     <? } } ?>
                    </div>
                </div>
          </div>
            <!-- /#page-wrapper -->


        </div>
        <!-- /#wrapper -->

        <!-- jQuery Version 1.11.0 -->
         <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
         <script type="text/javascript" src="js/jquery-form-plugin.js"></script>
        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>
        <script src="js/sweet-alert.min.js"></script> 
</body>
</html>
<script type="text/javascript">

fac = <? printf($_SESSION['TxtCode']) ?>

var previuosData = "";

if(document.querySelector("#parent-overall > button > input") == undefined || document.querySelector("#parent-overall > button > input") == null ){
   var previuosValue = "";
} else {
    var previuosValue = document.querySelectorAll("#parent-overall  button  input")[document.querySelectorAll("#parent-overall  button  input").length -1 ].value;
}

    if(typeof(EventSource) !== "undefined") {

    var source = new EventSource("sse-server.php?fac=" + fac );
    source.onmessage = function(event) {
 
       if (event.data !== previuosData){
        var eventMessage = event.data.split('\n');
        document.getElementById("parent-overall").innerHTML += '<button class="btn btn-lg btn-success promo-bar" style="color: #FFF;  transition: all 1s ease-in-out;"><i class="fa fa-times" style="color: white; margin-right:2em"></i>' + eventMessage[0] + ' cobró la promoción ' + eventMessage[1] + " en la mesa " + eventMessage[3]+ "<input type='hidden' value=" + eventMessage[2] + "></i></button>";
        previuosData = event.data;
    } else {
        
    }
}

} else {
    document.getElementById("result").innerHTML = "Sorry, your browser does not support server-sent events...";
}


$(document).on('click', function(){

$("button.promo-bar").on('click', function(){
 
   object = $(this);
    swal({ title: "Estás Seguro?",   
     text: "el consumo no se podrá rescatar despues...!",  
     type: "warning",   
     showCancelButton: true, 
     cancelButtonText: "No!" ,
     confirmButtonColor: "#91D280",   
     confirmButtonText: "Dar de baja",  
     closeOnConfirm: true },
      function(){  
       cancelPro(object);
      });


});

});





function askBeforeCancel(object){

     swal({ title: "Estás Seguro?",   
     text: "el consumo no se podrá rescatar despues...!",  
     type: "warning",   
     showCancelButton: true, 
     cancelButtonText: "No!" ,
     confirmButtonColor: "#91D280",   
     confirmButtonText: "Dar de baja",  
     closeOnConfirm: true },
      function(){  
       cancelPro(object);
      });

}



function cancelPro(misc){
    console.info(misc.children('input').val());
     $.ajax({
        tye:"POST",
        url: "promochangestate.php?id=" + misc.children('input').val(),
        success : function (data){
            misc.css({display : 'none'});
        }
     });
}



  </script>
     <?

 } else  {

echo "<scrpit>window.location='index.php'</script>";


      }
     ?> 
 
