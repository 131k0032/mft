<?php

require("../db_conexion.php");

    $VAR_VER = "2.0";
    $VAR_CIA =   "MAYAN FANTASY TOURS";
    $VAR_SYS =   "MFTSYS";
    $VAR_RUTA2 = str_replace(basename($_SERVER["PHP_SELF"]),"",$_SERVER['PHP_SELF']);
    $VAR_HOY = date("Y-m-d");






 ?>


<!DOCTYPE html>
<html lang="en">

<head>
<link rel="icon" type="icon/ico" sizes="32x32" href="favicon.ico">

<script src="alertifyjs/alertify.min.js"></script>
<link rel="stylesheet" href="alertifyjs/css/alertify.min.css" />
<link rel="stylesheet" href="alertifyjs/css/themes/default.min.css" />


    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo $VAR_CIA ?> | <?php echo $VAR_SYS ?> | <?php echo $VAR_VER ?> </title>

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->


</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title text-center"><b>Acceso a sistema  <?php echo $VAR_SYS ?> - V<?php echo $VAR_VER ?></b></h3>
                    </div>
                    <div class="panel-body">
                        <div style="text-align:Center">
                            <img src="../images/transfers.jpg" alt="" style="width:100%" />
                            <br>&nbsp;
                        </div>
                        <form role="form" name="frm" method="post" action="home.php">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Escribe tu e-mail" name="txtmail" type="email" autofocus required >
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Escribe tu password" name="txtpass" type="password" value="" required>
                                </div>
                                <!-- <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">Recordarme
                                    </label>
                                </div> -->
                                
                                <!-- Change this to a button or input when using this as a form -->
                                <button type="submit" class="btn btn-md btn-success btn-block">Acceder</button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
   if(isset($_GET["v"])){
     if($_GET["v"]=="n"){ ?>   <script> alertify.alert("Acceso denegado") </script>   <?php    }
     if($_GET["v"]=="s"){ ?>   <script> alertify.alert("Acceso denegado, verifique su contraseña y/o nombre de usuario.") </script>   <?php    }
   }
?>

    <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>
     <script src="js/jquery.cookie.js"></script>



</body>

</html>

                    <script>
                        $.removeCookie('usu_id', { path: '/' });
                        $.removeCookie('usu_nombr', { path: '/' });
                        $.removeCookie('usu_mail', { path: '/' });
                        $.removeCookie('usu_per', { path: '/' });



                 </script>
