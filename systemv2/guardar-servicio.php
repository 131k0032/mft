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

                            $VAR_TIPO = $_POST["txttipo"];

                                if(isset($_POST["txttime2"])) {$VAR_TIME2 =$_POST["txttime2"]; }else{$VAR_TIME2="";}
                                if(isset($_POST["txtdate2"])) {$VAR_DATE2 =$_POST["txtdate2"]; }else{$VAR_DATE2="";}


                                if($_POST["txtacc"]=="gua"){


                                          $VAR_NECO = explode("|", $_POST["txtnoec"]);


                                        //   $VAR_NUM = $_POST["txtnum"];
                                            $VAR_ID = $_GET["t"];
                                            $sql = "update  _transfers  set
                                                tipo        =     '".$_POST["txttipo"]."',
                                                room       =     '".$_POST["txtroom"]."',
                                                estatus    =     '".$_POST["txtesta"]."',
                                                payment    =     '".$_POST["txtpaym"]."',
                                                name       =     '".$_POST["txtname"]."',
                                                mobile     =     '".$_POST["txtmobi"]."',
                                                email      =     '".$_POST["txtema1"]."',
                                                street     =     '".addslashes($_POST["txtdire"])."',
                                                zipcode    =     '".addslashes($_POST["txtzip"])."',
                                                city       =     '".addslashes($_POST["txtcity"])."',
                                                country    =     '".addslashes($_POST["txtcoun"])."',
                                                date1      =     '".$_POST["txtdate1"]."',
                                                time1      =     '".$_POST["txttime1"]."',
                                                orig1      =     '".$_POST["txtorig1"]."',
                                                dest1      =     '".$_POST["txtdest1"]."',

                                                vuel1      =     '".$_POST["txtvuel1"]."',
                                                adul        =    '".$_POST["txtadul"]."',
                                                chil        =    '".$_POST["txtchil"]."',
                                                enfa        =    '0',
                                                vehic       =    '0',
                                                monto       =    '".$_POST["txtmont"]."',
                                                paga        =    '".$_POST["txtpaga"]."',
                                                plac        =    '".$_POST["txtplac"]."',
                                                oper        =    '".$_POST["txtoper"]."',
                                                noec        =    '".$_POST["txtnoec"]."',
                                                agen        =    '".$_POST["txtagen"]."',

                                                lead        =    '".$_POST["txtlead"]."',
                                                idio        =    '".$_POST["txtidio"]."',
                                                conf        =    '".$_POST["txtconf"]."',
                                                cupo        =    '".$_POST["txtcupo"]."',
                                                pro_nomb    =    '".$_POST["txtprov"]."',
                                                costo       =    ".$_POST["txtcosto"].",
                                                gasolina    =    ".$_POST["txtgasolina"].",
                                                sueldo      =    ".$_POST["txtsueldo"].",
                                                litros      =    ".$_POST["txtlitros"].",
                                                ki          =    ".$_POST["txtki"].",
                                                kf          =    ".$_POST["txtkf"].",
                                                estimado    =    ".$_POST["txtestimado"].",
                                                pagado      =    '".$_POST["txtpagado"]."',
                                                fechapago   =    '".$_POST["txtfechapago"]."',
                                                cta         =    '".$_POST["txtcta"]."',
                                                cve         =    '".$_POST["txtcve"]."',
                                                cve2        =    '".$_POST["txtcve2"]."',
                                                tipo_veh    =    '".$_POST["txtvehi"]."',

                                                contacto_prov    =    '".$_POST["txtcont"]."',

                                                come        =    '".$_POST["txtcome"]."'
                                                where id = ".$_GET["t"]."";
                                                 adoexecute($sql);

                                       //      echo "<br>update:  ".   $sql;





                                }



                                if($_POST["txtacc"]=="new"){


                         $VAR_NO = explode("|",$_POST["txtnoec"]);
                                $VAR_NOEC = $VAR_NO[2];

                                         $VAR_NUM = time();

                                         // $VAR_NUM = '';

                                          $sql="insert into _transfers  (

                                             cve,
                                             cve2,
                                             costo,
                                             gasolina,
                                             sueldo,
                                             litros,
                                             ki,
                                             kf,
                                             estimado,
                                             pagado,
                                             fechapago,
                                             formadepago,
                                             cta,
                                             tipo,
                                             lead,
                                             idio,
                                             conf,
                                             payment,
                                             num,
                                             name,
                                             mobile,
                                             email,
                                             street,
                                             zipcode,
                                             city,
                                             country,
                                             date1,
                                             time1,
                                             orig1,
                                             dest1,
                                             vuel1,
                                             adul,
                                             chil,
                                             enfa,
                                             vehic,
                                             monto,
                                             paga,
                                             plac,
                                             oper,
                                             noec,
                                             agen,
                                             come,
                                             room,
                                             cupo)
                                                values (


                                            '".$_POST["txtcve"]."',
                                            '".$_POST["txtcve2"]."',
                                            ".$_POST["txtcosto"].",
                                            ".$_POST["txtgasolina"].",
                                            ".$_POST["txtsueldo"].",
                                            ".$_POST["txtlitros"].",
                                            ".$_POST["txtki"].",
                                            ".$_POST["txtkf"].",
                                            ".$_POST["txtestimado"].",
                                            '".$_POST["txtpagado"]."',
                                            '".$_POST["txtfechapago"]."',
                                            '".$_POST["txtformadepago"]."',
                                            '".$_POST["txtcta"]."',
                                            '".$_POST["txttipo"]."',
                                            '".$_POST["txtlead"]."',
                                            '".$_POST["txtidio"]."',
                                            '".$_POST["txtconf"]."',
                                            '".$_POST["txtpaym"]."',
                                            ".$VAR_NUM.",
                                            '".$_POST["txtname"]."',
                                            '".$_POST["txtmobi"]."',
                                            '".$_POST["txtema1"]."',
                                            '".$_POST["txtdire"]."',
                                            '".$_POST["txtzip"]."',
                                            '".$_POST["txtcity"]."',
                                            '".$_POST["txtcoun"]."',
                                            '".$_POST["txtdate1"]."',
                                            '".$_POST["txttime1"]."',
                                            '".$_POST["txtorig1"]."',
                                            '".$_POST["txtdest1"]."',
                                            '".$_POST["txtvuel1"]."',
                                            '".$_POST["txtadul"]."',
                                            '".$_POST["txtchil"]."',
                                            '0',
                                            '".$_POST["txtvehi"]."',
                                            '".$_POST["txtmont"]."',
                                            '".$_POST["txtpaga"]."',
                                            '".$_POST["txtplac"]."',
                                            '".$_POST["txtoper"]."',
                                            '".$VAR_NOEC."',
                                            '".$_POST["txtagen"]."',
                                            '".$_POST["txtcome"]."',
                                            '".$_POST["txtroom"]."',
                                            '".$_POST["txtcupo"]."'
                                            )";
                                                adoexecute($sql);
                                          //   ECHO "<br>01 - ".$sql;

                                       if($_POST["txtdate2"]!=''){
                                                $sql="insert into _transfers  (

                                             cve,
                                             cve2,
                                             costo,
                                             gasolina,
                                             sueldo,
                                             litros,
                                             ki,
                                             kf,
                                             estimado,
                                             pagado,
                                             formadepago,
                                             fechapago,
                                             cta,
                                             tipo,
                                             lead,
                                             idio,
                                             conf,
                                              payment,
                                              num,
                                              name,
                                              mobile,
                                              email,
                                              street,
                                              zipcode,
                                              city,
                                              country,
                                              date1,
                                              time1,
                                              orig1,
                                              dest1,
                                              vuel1,
                                              adul,
                                              chil,
                                              enfa,
                                              vehic,
                                              monto,
                                              paga,
                                              plac,
                                              oper,
                                              noec,
                                              agen,
                                              come,
                                              room,
                                              cupo)
                                                values (

                                               '".$_POST["txtcve"]."',
                                               '".$_POST["txtcve2"]."',
                                               ".$_POST["txtcosto"].",
                                               ".$_POST["txtgasolina"].",
                                               ".$_POST["txtsueldo"].",
                                               ".$_POST["txtlitros"].",
                                               ".$_POST["txtki"].",
                                               ".$_POST["txtkf"].",
                                               ".$_POST["txtestimado"].",
                                               '".$_POST["txtpagado"]."',
                                               '".$_POST["txtformadepago"]."',
                                               '".$_POST["txtfechapago"]."',
                                               '".$_POST["txtcta"]."',
                                               '".$_POST["txttipo"]."',
                                               '".$_POST["txtlead"]."',
                                               '".$_POST["txtidio"]."',
                                               '".$_POST["txtconf"]."',
                                               '".$_POST["txtpaym"]."',
                                               ".$VAR_NUM.",
                                               '".$_POST["txtname"]."',
                                               '".$_POST["txtmobi"]."',
                                               '".$_POST["txtema1"]."',
                                               '".$_POST["txtdire"]."',
                                               '".$_POST["txtzip"]."',
                                               '".$_POST["txtcity"]."',
                                               '".$_POST["txtcoun"]."',
                                               '".$_POST["txtdate2"]."',
                                               '".$_POST["txttime2"]."',
                                               '".$_POST["txtorig2"]."',
                                               '".$_POST["txtdest2"]."',
                                               '".$_POST["txtvuel2"]."',
                                               '".$_POST["txtadul"]."',
                                               '".$_POST["txtchil"]."',
                                               '".$_POST["txtenfa"]."',
                                               '".$_POST["txtvehi"]."',
                                               '".$_POST["txtmont"]."',
                                               '".$_POST["txtpaga"]."',
                                               '".$_POST["txtplac"]."',
                                               '".$_POST["txtoper"]."',
                                               '".$VAR_NOEC."',
                                               '".$_POST["txtagen"]."',
                                               '".$_POST["txtcome"]."',
                                               '".$_POST["txtroom"]."',
                                               '".$_POST["txtcupo"]."'

                                               )";
                                                adoexecute($sql);
                                        //   ECHO "<br>02 - ".$sql;
                                          }


                              }

                         //   echo $sql;
                            ?>



                            <div class="alert alert-success" style="padding:20px;text-align:Center;font-size:20px">
                               <?php echo strtoupper($VAR_TIPO) ?> guardado satisfactoriamente

                               <?php if(isset($VAR_ID)){ ?>
                                   <br><a href="agregar-servicio.php?t=<?php echo $VAR_ID ?>" >#&nbsp; <?php echo ($VAR_ID) ?></a>
                               <?php } ?>
                               <br>
                               <br><a href="listado.php" class="alert-link"><button class="btn btn-primary btn-lg btn-block">Ver listado</button></a>
                               <br><a href="agregar-servicio.php" class="alert-link"><button class="btn btn-primary btn-lg btn-block">Agregar nuevo servicio</button></a>
                            </div>


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
