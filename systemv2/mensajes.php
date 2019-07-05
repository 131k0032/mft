<!DOCTYPE html>
<style>
    table{
      font-size:12px;

    }

</style>
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

    <!-- DataTables CSS -->
    <link href="vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">

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

    <div id="wrapper">

        <!-- Navigation -->
        <?php include "nav.php" ?>

        <div id="page-wrapper">
            <div class="row">&nbsp;
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
<?php
                                    $VAR_TITLE = "MENSAJES";
                                    $sqlf="select * from _mensajes where borrado='no' order by fecha DESC  ";
                      //       echo $sqlf;

?>

                           <H2> <?php echo $VAR_TITLE ?></H2>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">

                        <div class="col-lg-12"><hr></div>


                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>&nbsp;</th>
                                        <th>Fecha</th>
                                        <th>Nombre</th>
                                        <th>Mail</th>
                                        <th>Mensaje</th>
                                        <th>&nbsp;</th>


                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                      if(isset($_GET["l"])){
                                            if($_GET["l"]=="s"){ $sql="update _mensajes set leido = 'si' where id =".$_GET["i"];adoexecute($sql); }
                                            if($_GET["l"]=="n"){ $sql="update _mensajes set leido = 'no' where id =".$_GET["i"];adoexecute($sql); }
                                            if($_GET["l"]=="d"){ $sql="update _mensajes set borrado = 'si' where id =".$_GET["i"];adoexecute($sql); }


                                      }


                                      $rsf = adoopenrecordset($sqlf);
                                      while($rstempf = mysql_fetch_array($rsf)){

                                      ?>

                                            <tr>
                                            <td style="text-align:center">
                                               <?php if($rstempf["leido"]=="no"){ $VAR_XX = "bold"; ?> <a href='?l=s&i=<?php echo $rstempf["id"] ?>'><span class="fa fa-envelope"></span></a><?php } ?>
                                               <?php if($rstempf["leido"]=="si"){ $VAR_XX = "none"; ?> <a href='?l=n&i=<?php echo $rstempf["id"] ?>'><span class="fa fa-envelope-o"></span></a><?php } ?>

                                            </td>
                                            <td style="font-weight: <?php echo $VAR_XX ?>" ><?php echo date("Y-m-d h:i",$rstempf["fecha"]) ?></td>
                                            <td style="font-weight: <?php echo $VAR_XX ?>"><?php echo $rstempf["name"] ?></td>
                                            <td style="font-weight: <?php echo $VAR_XX ?>"><?php echo $rstempf["mail"] ?></td>
                                            <td style="font-weight: <?php echo $VAR_XX ?>"><?php echo $rstempf["msg"] ?></td>
                                            <td style="text-align:center;font-weight: <?php echo $VAR_XX ?>"><a href="?l=d&i=<?php echo $rstempf["id"] ?>"><span class="fa fa-trash"></span></a></td>

                                            </td>

                                        </tr>

                                  <?php
                                      }


                                    ?>

                                </tbody>
                            </table>

                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->

            <!-- /.row -->

            <!-- /.row -->

            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="vendor/metisMenu/metisMenu.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="vendor/datatables-responsive/dataTables.responsive.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>
     <script src="js/jquery.cookie.js"></script>    

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
    </script>

</body>

</html>
