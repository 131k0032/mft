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

<!-- alertify julio -->
<script src="alertifyjs/alertify.min.js"></script>
<link rel="stylesheet" href="alertifyjs/css/alertify.min.css" />
<link rel="stylesheet" href="alertifyjs/css/themes/default.min.css" />

<!-- alertify julio -->


</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include "nav.php" ?>

        <div id="page-wrapper">

            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">

                        <div class="panel-body">
                            <div class="row">
                            <?php

                                    $VAR_CONSEC =   consecutivo($_POST["txtdate1"]);
                                    $VARTIPO =NULL;


                                         $VAR_NUM = time();

                                         // $VAR_NUM = '';

                                       // -----   BUSCAR POR NOMBRE DE HOTEL Y AGENCIA y luego busca la tarifa

                                       $sql="select * from _hoteles where hotel = '".$_POST["txtdest1"]."'";
                                      // echo "<br>".$sql;
                                       $rs = adoopenrecordset($sql);
                                       $rstemp = mysql_fetch_array($rs);
                                       $VAR_HOTE = $rstemp["id"];
                                      if($VAR_HOTE =="" ){ $VAR_HOTE = 0;}

                                       $sql="select * from _clientes where cli_nomb = '".$_POST["txtagen"]."'";
                                      //  echo "<br>".$sql;
                                       $rs = adoopenrecordset($sql);
                                       $rstemp = mysql_fetch_array($rs);
                                       $VAR_AGEN = $rstemp["cli_id"];


                                       if($VAR_AGEN =="" ){ $VAR_AGEN = 0;}

                                     //  $sql="select * from _tarifas where hot_id =".$VAR_HOTE." and cli_id = ".$VAR_AGEN;
                                      //   echo "<br>".$sql;
                                    //   $rs = adoopenrecordset($sql);
                                     //  $rstemp = mysql_fetch_array($rs);
                                    //   $VAR_TARI = $rstemp["tar_tari"];
                                       if ($_POST["txttipo"]=="rt") {
                                           $VARTIPO='-ll';
                                       }




                                          $sql="insert into _transfers  (
                                             num,
                                             date1,
                                             agen,
                                             tipo,
                                             adul,
                                             chil,
                                             enfa,
                                             name,
                                             email,
                                             room,
                                             time1,
                                             orig1,
                                             dest1,
                                             vuel1,
                                             cta,
                                             cve,
                                             cve2,
                                             come,
                                             consec,
                                             usuario,
                                             tipo_veh,
                                             formadepago,
                                             pro_nomb,
                                             oper,
                                             plac,
                                             noec,
                                             cupo,
                                             costo,
                                             airl1,
                                             contacto_prov,
                                             estatus

                                             )
                                                values (
                                             ".$VAR_NUM.",
                                            '".$_POST["txtdate1"]."',
                                            '".$_POST["txtagen"]."',
                                            '".$_POST["txttipo"].$VARTIPO."',
                                            '".$_POST["txtadul"]."',
                                            '".$_POST["txtchil"]."',
                                            '".$_POST["txtenfa"]."',
                                            '".$_POST["txtname"]."',
                                            '".$_POST["txtmail"]."',
                                            '".$_POST["txtroom"]."',
                                            '".$_POST["txttime1"]."',
                                            '".$_POST["txtorig1"]."',
                                            '".$_POST["txtdest1"]."',
                                            '".$_POST["txtvuel1"]."',
                                            '".$_POST["txtcta"]."',
                                            '".$_POST["txtcve"]."',
                                            '".$_POST["txtcve2"]."',
                                            '".$_POST["txtcome"]."',
                                            '".$VAR_CONSEC."',
                                            '".$_COOKIE["usu_mail"]."',
                                            '".$_POST["txttipov"]."',
                                            '".$_POST["txtfpago"]."',
                                            '".$_POST["txtprov"]."',
                                            '".$_POST["txtoper"]."',
                                            '".$_POST["txtplac"]."',
                                            '".$_POST["txtnoec"]."',
                                            '".$_POST["txtcupo"]."',
                                            '".$_POST["txtcost"]."',
                                            '".$_POST["txtairln"]."',
                                            '".$_POST["txtcont"]."',
                                             '".$_POST["txtestatus"]."'
                                            )";
                                            //ECHO "<br>01 - ".$sql;

                                           
                                                adoexecute($sql);

                                               $sql="select  * from _transfers order by id DESC limit 1";

                                         //ECHO "<br>01 - ".$sql;
                                         
                                               $rs = adoopenrecordset($sql);
                                               $rstemp = mysql_fetch_array($rs);

                                                if ($_POST["txttipo"]== 'rt' or $_POST["txttipo"]=='cir' ) {

                                                    
                                                            $VARTIPO='-sl';
                                                    
                                                    
                                                
                                                   
                                                     $sql2="insert into _transfers  (
                                                     num,
                                                     date1,
                                                     agen,
                                                     tipo,
                                                     adul,
                                                     chil,
                                                     enfa,
                                                     name,
                                                     email,
                                                     room,
                                                     time1,
                                                     orig1,
                                                     dest1,
                                                     vuel1,
                                                     cta,
                                                     cve,
                                                     cve2,
                                                     come,
                                                     consec,
                                                     usuario,
                                                     tipo_veh,
                                                     formadepago,
                                                     pro_nomb,
                                                     oper,
                                                     plac,
                                                     noec,
                                                     cupo,
                                                     costo,
                                                     airl1,
                                                     contacto_prov,
                                                     estatus

                                                     )
                                                        values (
                                                     ".$VAR_NUM.",
                                                    '".$_POST["txtdate2"]."',
                                                    '".$_POST["txtagen2"]."',
                                                    '".$_POST["txttipo2"].$VARTIPO."',
                                                    '".$_POST["txtadul2"]."',
                                                    '".$_POST["txtchil2"]."',
                                                    '".$_POST["txtenfa2"]."',
                                                    '".$_POST["txtname2"]."',
                                                    '".$_POST["txtmail2"]."',
                                                    '".$_POST["txtroom2"]."',
                                                    '".$_POST["txttime2"]."',
                                                    '".$_POST["txtorig2"]."',
                                                    '".$_POST["txtdest2"]."',
                                                    '".$_POST["txtvuel2"]."',
                                                    '".$_POST["txtcta2"]."',
                                                    '".$_POST["txtcve3"]."',
                                                    '".$_POST["txtcve4"]."',
                                                    '".$_POST["txtcome2"]."',
                                                    '".$VAR_CONSEC."',
                                                    '".$_COOKIE["usu_mail"]."',
                                                    '".$_POST["txttipov2"]."',
                                                    '".$_POST["txtfpago2"]."',
                                                    '".$_POST["txtprov2"]."',
                                                    '".$_POST["txtoper2"]."',
                                                    '".$_POST["txtplac2"]."',
                                                    '".$_POST["txtnoec2"]."',
                                                    '".$_POST["txtcupo2"]."',
                                                    '".$_POST["txtcost"]."',
                                                    '".$_POST["txtairln"]."',
                                                    '".$_POST["txtcont2"]."',
                                                     '".$_POST["txtestatus2"]."'
                                                    )";

                                                    adoexecute($sql2);
                                                    $sql2="select  * from _transfers order by id DESC limit 1";
                                                     $rs2 = adoopenrecordset($sql2);
                                                     $rstemp2 = mysql_fetch_array($rs2);

                                                     //ECHO "<br>sql roundtrip - ".$sql2;
                                                      //echo "<br>".$VARTIPO;
                                                    
                                                    //ECHO "<br>sql roundtrip - ".$sql2;


                                                 }



                            ?>


                            <!-- TODAS LAS OPCIONES MENOS RT O CIR INICIO -->
                            <?php  if ( ($_POST["txttipo"] != 'rt') and ($_POST["txttipo"] != 'cir') ) {
                                   
                                 ?>

                            <div class="alert alert-success" style="padding:20px;text-align:Center;font-size:20px">
                               <?php echo strtoupper($_POST["txttipo"]) ?> guardado satisfactoriamente
                               <br><br>#<?php echo $rstemp["id"] ?> para el día <b><?php echo $rstemp["date1"]?></b>
                               <br><!-- <span style="font-size:12px">con tarifa : $<?php echo number_format($_POST["txtcost"],2) ?></span> -->
                               <br><br> <a  href="listado.php">     <button     class="alert-link btn btn-primary" style="font-size:15px;color:#FFF" >Ver listado</button></a>
                               &nbsp;   <a href="agregar-orden.php"><button     class="alert-link btn btn-primary" style="font-size:15px;color:#FFF">Agregar otra orden</button></a>
                               &nbsp;   <a href="agregar-servicio.php?t=<?php echo $rstemp["id"] ?>"><button     class="alert-link btn btn-primary" style="font-size:15px;color:#FFF">Ir a Orden #<?php echo $rstemp["id"] ?></button></a>
                                <!-- button mail julio no rt-->
                                
                               &nbsp;   <a href="send_confirm_order.php?t=<?php echo $rstemp["id"] ?>"><button     class="alert-link btn btn-primary" style="font-size:15px;color:#FFF" target=¨_blank¨>Enviar email</button></a>
                               
                            <!-- button mail juliono  rt-->
                            </div>
                            <?php } ?>
                            <!-- TODAS LAS OPCIONES MENOS RT O CIR FIN -->

                            <!-- TIPO DE SERVICIO RT O CIR -->
                            <?php  if ($_POST["txttipo"] === 'rt' or $_POST["txttipo"] === 'cir') {
                                   
                                 ?>

                            <div class="alert alert-success" style="padding:20px;text-align:Center;font-size:20px">
                               <?php echo strtoupper($_POST["txttipo"]) ?> guardado satisfactoriamente
                               <br><br>#<?php echo $rstemp["id"] ?> para el día <b><?php echo $rstemp["date1"]?></b>
                               <br><br>#<?php echo $rstemp2["id"] ?> para el día <b><?php echo $rstemp2["date1"]?></b>
                               <br><span style="font-size:12px">con tarifa : $<?php echo number_format($_POST["txtcost"],2) ?></span>
                               <br><br> <a  href="listado.php">     <button     class="alert-link btn btn-primary" style="font-size:15px;color:#FFF" >Ver listado</button></a>
                               &nbsp;   <a href="agregar-orden.php"><button     class="alert-link btn btn-primary" style="font-size:15px;color:#FFF">Agregar otra orden</button></a>
                               &nbsp;   <a href="agregar-servicio.php?t=<?php echo $rstemp["id"] ?>"><button     class="alert-link btn btn-primary" style="font-size:15px;color:#FFF">Ir a Orden #<?php echo $rstemp["id"] ?></button></a>
                                <!-- button mail julio rt-->                                
                               &nbsp;   <a href="send_confirm_order_round.php?t=<?php echo $rstemp["id"] ?> &u=<?php echo $rstemp2["id"] ?>"><button     class="alert-link btn btn-primary" style="font-size:15px;color:#FFF" target=¨_blank¨>Enviar email</button></a>
                               
                               
                            <!-- button mail juliono  rt-->
                            </div>
                            <?php } ?>
                            <!-- TODAS LAS OPCIONES MENOS RT O CIR FIN -->


                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
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

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>
     <script src="js/jquery.cookie.js"></script>

     
</body>

</html>
