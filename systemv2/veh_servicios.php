<!DOCTYPE html>
<?php include "../db_conexion.php"   ?>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>MFTSYS | Mayan Fantasy Tours <?php echo $VAR_VERSION ?></title>

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




<link href="//rawgithub.com/indrimuska/jquery-editable-select/master/dist/jquery-editable-select.min.css" rel="stylesheet">

<script src="alertifyjs/alertify.min.js"></script>
<link rel="stylesheet" href="alertifyjs/css/alertify.min.css" />
<link rel="stylesheet" href="alertifyjs/css/themes/default.min.css" />


</head>

<body>

<div id="wrapper">
              <!-- Navigation -->
              <?php

                $VAR_TITULO = "SERVICIOS A VEHÍCULOS";
                $VAR_ID = 0;

                $VAR_DESC = "";
                $VAR_KILO = "";


              include "nav.php";


              if(isset($_GET["i"])){  $VAR_ID   = $_GET["i"];  }
              if(isset($_GET["p"])){  $VAR_PASO = $_GET["p"];  }





                 ?>

          <div id="page-wrapper">
            <form role="form" method="post" action="veh_servicios_p2.php" name="frm">
              <br>  <div class="panel panel-default">


                        <div class="panel-heading">
                         <?php echo $VAR_TITULO ?>
                        </div>



                <div class="panel-body">
                    <div class="row">
                      <div class="col-lg-12" style="text-align:center">
                          <span class=" fa fa-truck fa-3x"  ></span>
                      </div>
                    </div>

                <div class="row">
                    <div class="col-lg-12">
                         <div class="form-group" style="text-align:center">
                            <br><select class="form-control" onchange="
                                    window.location.href='veh_servicios_p2.php?i='+$(this).find('option:selected').val();

                            " name="txtnoec">
                                <option>- seleccione NO ECO vehículo -</option>
                                 <?php
                                   $sql="select * from _vehiculos order by veh_noec";
                                   $rs = adoopenrecordset($sql);
                                   while($rstemp = mysql_fetch_array($rs)){
                                  ?>
                                     <option value="<?php echo $rstemp["veh_id"] ?>"   ><?php echo $rstemp["veh_noec"] ?> - <?php echo $rstemp["veh_plac"] ?>  </option>
                                 <?php  }  ?>
                            </select>
                         </div>
                    </div>
                </div>



               </div>
           </div>
            </form>
          </div>
              <!-- /#page-wrapper -->

</div>
              <!-- /#wrapper -->




</body>

<!-- jQuery -->
<script src="vendor/jquery/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="vendor/metisMenu/metisMenu.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="dist/js/sb-admin-2.js"></script>
<script src="js/jquery.cookie.js"></script>
<script src="//rawgithub.com/indrimuska/jquery-editable-select/master/dist/jquery-editable-select.min.js"></script>
<script>







</script>

</html>
