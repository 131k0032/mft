<!DOCTYPE html>
<?php include "../db_conexion.php"   ?>
<?php include "funciones.php"   ?>
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

<style>a:hover{   text-decoration: none !important; }</style>
</head>

<body>

<div id="wrapper">
              <!-- Navigation -->
              <?php



               $sql="select * from _vehiculos where veh_id =".$_GET["i"];
               $rs = adoopenrecordset($sql);
               $rstemp = mysql_fetch_array($rs);

               $VAR_NOEC = $rstemp["veh_noec"];
               $VAR_PLAC = $rstemp["veh_plac"];
               $VAR_NOSE = $rstemp["veh_nose"];
               $VAR_NOMB = $rstemp["veh_nomb"];
               $VAR_ID   = $rstemp["veh_id"];


                $VAR_TITULO = "SERVICIOS A VEHÍCULOS";



              include "nav.php";



                 ?>

          <div id="page-wrapper">
            <form role="form" method="post" action="" name="frm">
             <br>  <div class="panel panel-default">
               <div class="panel-heading">
                         <?php echo $VAR_TITULO ?>
                        </div>




                    <div class="row" style="padding-top:10px">


                      <div class="col-lg-1" style="text-align:center; padding-top:10px"><span class=" fa fa-truck fa-3x"></span></div>

                      <div class="col-lg-2 panel panel-success" style="text-align:center; margin:2px;">
                            <div class="panel-heading"> <h3 class="panel-title" style="padding:0px;margin:0px">PLACAS</h3> </div>
                             <b style="font-size:15px"><?php echo $VAR_PLAC ?></b>
                      </div>
                      <div class="col-lg-2 panel panel-success" style="text-align:center; margin:2px;">
                            <div class="panel-heading"> <h3 class="panel-title" style="padding:0px;margin:0px">NO.ECO</h3> </div>
                             <b style="font-size:15px"><?php echo $VAR_NOEC ?></b>
                      </div>
                      <div class="col-lg-2 panel panel-success" style="text-align:center; margin:2px;">
                            <div class="panel-heading"> <h3 class="panel-title" style="padding:0px;margin:0px">ULTIMO SRV.</h3> </div>
                             <b style="font-size:15px"><?php echo vehiculos_ultimo_srv($VAR_ID) ?></b>
                      </div>
                      <div class="col-lg-2 panel panel-success" style="text-align:center; margin:2px;">
                            <div class="panel-heading"> <h3 class="panel-title" style="padding:0px;margin:0px">SERVICIOS.</h3> </div>
                             <b style="font-size:15px"><?php echo vehiculos_numero_srv($VAR_ID) ?></b>
                      </div>
                      <div class="col-lg-2 panel panel-success" style="text-align:center; margin:2px;">
                            <div class="panel-heading"> <h3 class="panel-title" style="padding:0px;margin:0px">KILOMETRAJE.</h3> </div>
                             <b style="font-size:15px"><?php echo number_format(kilometraje_actual($VAR_ID),0) ?></b>
                      </div>
             </div>



           <?php if($VAR_ID>0){ ?>
                <div class="row"  style="border:0px solid red;width:100%; padding:30px; ">

                    <a href="veh_servicios_p3.php?i=<?php echo $VAR_ID ?>"> <div class="col-lg-4"> <button type="button"  class="btn btn-primary    btn-block" style="width:100%;margin:2px" > <span class="fa fa-plus  "                ></span>&nbsp;&nbsp;AGREGAR SERVICIO   </button>     </div> </a>
                    <a href="veh_servicios_p4.php?i=<?php echo $VAR_ID ?>"> <div class="col-lg-4"> <button type="button"  class="btn btn-primary    btn-block" style="width:100%;margin:2px" > <span class="fa fa-search "               ></span>&nbsp;&nbsp;VER&nbsp;SERVICIOS </button>        </div> </a>
                    <a href="veh_servicios_p5.php?i=<?php echo $VAR_ID ?>"> <div class="col-lg-4"> <button type="button"  class="btn btn-primary    btn-block" style="width:100%;margin:2px" > <span class="fa fa-exclamation "          ></span>&nbsp;&nbsp;ALERTA&nbsp;SERVICIOS</button>     </div> </a>
                    <a href="veh_servicios_inv_diario.php?i=<?php echo $VAR_ID ?>"> <div class="col-lg-4"> <button type="button"  class="btn btn-primary   btn-block" style="width:100%;margin:2px" ><span class="fa fa-check-square-o " ></span>&nbsp;&nbsp;INVENTARIO&nbsp;DIARIO</button>     </div> </a>
                    <a href="veh_impresion_historial.php?i=<?php echo $VAR_ID ?>" target="_blank" > <div class="col-lg-4"> <button type="button"  class="btn btn-primary   btn-block" style="width:100%;margin:2px" ><span class="fa fa-print " ></span>&nbsp;&nbsp;HISTORIAL DE VEHÍCULO</button>     </div> </a>

                </div>
          <?php } ?>


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
