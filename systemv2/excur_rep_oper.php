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

                    <?php

                        $VAR_DEL = date("Y-m-d");
                        $VAR_AL = date("Y-m-30");
                        if(isset($_POST["txtdel"])){  $VAR_DEL = $_POST["txtdel"];  }
                        if(isset($_POST["txtal"])){   $VAR_AL = $_POST["txtal"];  }

                    ?>


        <div id="page-wrapper" style="border:0px solid red">
            <div class="row">&nbsp;
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12" style="border:0px solid red" >
                    <div class="panel panel-default">


                        <H2>&nbsp;REPORTES OPERATIVOS</H2>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">

                              <div>
                                  <form method="post" target="_blank"  action='excur_rep_e1.php' id="formulario" name="formulario">

                                   <div class="row">
                                      <div class="col-lg-2">
                                         <label>DEL:</label>
                                         <input class="form-control" style="text-align:center; font-size:12px" name="txtdel" type="date" value="<?php echo $VAR_DEL ?>" />
                                      </div>

                                      <div class="col-lg-2">
                                         <label>AL:</label>
                                         <input class="form-control" style="text-align:center; font-size:12px" name="txtal" type="date" value="<?php echo $VAR_AL ?>" />
                                      </div>

                                      <div class="col-lg-2">
                                         <label>TOUR:</label>
                                         <select class="form-control" name="txttour">
                                                  <option value="0"> - TODOS - </option>

                                                  <!--
                                                  <option>TULUM REEF ADVENTURE</option>
                                                  <option>CHICHEN SUNRISE</option>
                                                  <option>CURATED TULUM EXPLORA TULUM</option>
                                                  <option>COBA TULUM SUNSET</option>
                                                  <option>PRIVADOS</option> -->

                                                                        <option   >TULUM REEF ADVENTURE</option>
                                                                        <option   >CHICHEN SUNRISE</option>
                                                                        <option   >CENOTE MAYA EXPERIENCE</option>
                                                                        <option   >DOS CENOTE</option>
                                                                        <option   >CURATED TULUM EXPLORA TULUM</option>
                                                                        <option   >COBA TULUM SUNSET</option>
                                                                        <option   >KAAN LUUM EXPERIENCE</option>
                                                                        <option   >MANZANERO PLAYA</option>
                                                                        <option   >MANZANERO CANCUN</option>
                                                                        <option   >PRIVADOS</option>


                                          </select>
                                      </div>



                                      <div class="col-lg-2">
                                         <label>AGENCIA:</label>
                                         <select class="form-control" name="txtagen">
                                               <option value="0"> - TODOS - </option>

                                               <?php
                                                    $sql="select exc_agen from _excursiones where exc_agen <> '' group by exc_agen";
                                                    $rs = adoopenrecordset($sql);
                                                    while($rstemp = mysql_fetch_array($rs)){
                                               ?>
                                                         <option><?php echo strtoupper($rstemp["exc_agen"]) ?></option>

                                              <?php  }  ?>


                                         </select>
                                      </div>



                                      <div class="col-lg-2">
                                         <label>REPRESENTANTE:</label>
                                         <select class="form-control" name="txtrepr" >
                                               <option value="0"> - TODOS - </option>

                                               <?php
                                                    $sql="select exc_repr from _excursiones where exc_repr <> '' group by exc_repr";
                                                    $rs = adoopenrecordset($sql);
                                                    while($rstemp = mysql_fetch_array($rs)){
                                               ?>
                                                         <option><?php echo strtoupper($rstemp["exc_repr"]) ?></option>

                                              <?php  }  ?>


                                         </select>
                                      </div>

                                    </div>

                                     <div class="col-lg-12"><hr></div>

                                     <div class="row">
                                        <div class="col-lg-2"><button   class="btn btn-primary btn-block">Rep. E1 </button></div>
                                        <div class="col-lg-2"><button   onclick="document.formulario.action='excur_rep_e2.php'"  class="btn btn-primary btn-block">Rep. E2 </button></div>
                                        <div class="col-lg-2"><button   onclick="document.formulario.action='excur_rep_e3.php'"  class="btn btn-primary btn-block">Rep. E3 </button></div>
                                    </div>


                               </form>
                       </div>

                        </div>



                    </div>
                </div>
            </div>
         </div>

</body>

      <script src="vendor/jquery/jquery.min.js"></script>
      <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
      <script src="vendor/metisMenu/metisMenu.min.js"></script>
      <script src="vendor/datatables/js/jquery.dataTables.min.js"></script>
      <script src="vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
      <script src="vendor/datatables-responsive/dataTables.responsive.js"></script>
      <script src="dist/js/sb-admin-2.js"></script>
      <script src="js/jquery.cookie.js"></script>
      <script src="alertifyjs/alertify.min.js"></script>
      <link rel="stylesheet" href="alertifyjs/css/alertify.min.css" />
      <link rel="stylesheet" href="alertifyjs/css/themes/default.min.css" />

</html>
