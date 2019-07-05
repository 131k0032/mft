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
               $VAR_NOSE = $rstemp["veh_nose"];
               $VAR_NOMB = $rstemp["veh_nomb"];
               $VAR_ID   = $rstemp["veh_id"];

               $VAR_TITULO = "SERVICIOS A VEHÍCULOS";

               include "nav.php";


              if(isset($_GET["acc"])){
                 if($_GET["acc"]=="add"){

                        $VAR = explode("|",$_POST["txtdesc"]);

                        $VAR_DESC = $VAR[1];
                        $VAR_TARID = $VAR[0];

                        $sql="insert into _servicios values (
                          0,
                          '".$VAR_NOEC."',
                          '".$VAR_NOSE."',
                          '".$_POST["txtobse"]."',
                          '".$VAR_ID."',
                          ".$VAR_TARID.",
                          '".$_POST["txtfech"]."',
                          '',
                          '".$VAR_DESC."',
                          '".$_POST["txtkilo"]."',
                          '',
                          '".$_POST["txtesta"]."')";

                       //   echo "<br>-------------------------------->".$sql;

                          adoexecute($sql);



                 }


                  if($_GET["acc"]=="del"){
                               $sql="delete from _servicios where ser_id =".$_GET["delid"];
                               adoexecute($sql);


                  }


              }



                 ?>

          <div id="page-wrapper">
            <form role="form" method="post" action="veh_servicios_paso_2.php" name="frm">
                <div class="row"> <div class="col-lg-12"><h3 class="page-header" style="text-align:center"><?php echo $VAR_TITULO ?> </h3></div></div>

                <a href="veh_servicios_p2.php?i=<?php echo $_GET["i"] ?>">
                    <div class="row" >
                      <div class="col-lg-12" style="text-align:center">
                          <span class=" fa fa-truck fa-2x"></span>
                      </div>

                        <div  style="text-align:center">
                                        <p style=" font-weight: bolder; text-decoration: none">
                                            <?php echo $VAR_NOMB ?> |
                                            <?php echo $VAR_NOEC ?> |
                                            <?php echo $VAR_NOSE ?>
                                            <br>Kilometraje: <?php echo number_format(kilometraje_actual($_GET["i"]),0) ?>
                                        </p>


                             </div>


                    </div>
                 </a>

                <div class="row">

                    <div class="col-lg-12">





                          <div class="col-lg-12">
                              <div class="col-lg-6" style="text-align:center; ">
                                <button type="submit"  style="margin:2px" onclick="window.frm.action='veh_servicios_p3.php?i=<?php echo $VAR_ID ?>'" class="btn btn-primary btn-block"><span class="fa fa-plus"></span>&nbsp;&nbsp;Agregar Servicio </button>
                              </div>
                               <div class="col-lg-6"  style="text-align:center; ">
                                    <button type="submit"  style="margin:2px"  onclick="window.frm.action='veh_servicios_p5.php?i=<?php echo $VAR_ID ?>'" class="btn btn-primary btn-block"><span class="fa fa-exclamation"></span>&nbsp;&nbsp;Ver Alertas </button>
                               </div>
                         </div>

                         <hr>

                    <div class="row" >
                    <br>&nbsp;
                      <div class="col-lg-12" style="text-align:center">
                            <table  style="width:100%" data-order='[[ 0, "desc" ]]' data-page-length='50' class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th style="text-align:center">Fecha</th>
                                        <th style="text-align:center">Tarea</th>
                                        <th  style="text-align:center">Kilometraje</th>
                                        <th  style="text-align:center">Estatus</th>
                                        <th  style="text-align:center">Observaciones</th>
                                        <th  style="text-align:center">&nbsp;</th>
                                    </tr>
                                </thead>
                                <tbody>

                              <?php
                              $sql="select * from _servicios where veh_id = ".$_GET["i"]." order by ser_id";
                              $rs = adoopenrecordset($sql);
                              while($rstemp = mysql_fetch_array($rs)){
                              ?>

                                   <tr>
                                        <td><?php echo $rstemp["ser_fech"] ?></td>
                                        <td><?php echo $rstemp["ser_desc"] ?></td>
                                        <td><?php echo $rstemp["ser_kilo"] ?></td>
                                        <td><?php echo $rstemp["ser_esta"] ?></td>
                                        <td><?php echo $rstemp["ser_obse"] ?></td>
                                        <td>
                                                <button type="button"
                                                  onclick="
                                                    alertify.confirm('MFTSYS', '¿Desea eliminar el servicio?', function(){
                                                        document.frm.action='veh_servicios_p4.php?acc=del&delid=<?php echo $rstemp["ser_id"] ?>&i=<?php echo $_GET["i"] ?>'
                                                        document.frm.submit();
                                                  }
                                                  ,''  );
                                                  "
                                                  ><span class="fa fa-trash"></span>
                                                </button>
                                        </td>
                                   </tr>

                                <?php } ?>




                                </tbody>

                            </table>

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
