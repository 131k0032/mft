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

    <!-- Morris Charts CSS -->
    <link href="vendor/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include "nav.php" ?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Dashboard</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-bus fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo mft_num_ord_activas(date("Y")) ?></div>
                                    <div>Ordenes Activas</div>
                                </div>
                            </div>
                        </div>
                        <!--
                        <a href="listado.php?f=activas">
                            <div class="panel-footer">
                                <span class="pull-left">ver detalles</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                        -->
                    </div>
                </div>
                <!--
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-dollar fa-3x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge" style=""><?php echo number_format(mft_monto("%Y",date("Y")),0) ?> </div>
                                    <div>Monto Anual oper.</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">ver detalle</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>  -->
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-globe fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo mft_num_ord(date("Y")) ?></div>
                                    <div>Ordenes año</div>
                                </div>
                            </div>
                        </div>
                        <!--
                        <a href="listado.php">
                            <div class="panel-footer">
                                <span class="pull-left">ver detalle</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                       -->

                    </div>
                </div>
                <!-- ordenes activas dia -->
                 <div class="col-lg-3 col-md-6">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-calendar fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div>Ordenes del día de hoy</div>
                                    <div class="huge"> <?php echo mft_num_ord(date("Y-m-d")) ?> </div> <!-- ordenes del dia totales -->                                    
                                    <div>Ordenes abiertas: <span style="color: blue;"><?php echo mft_num_ord(date("Y-m-d"),"abierta") ?> </span></div> <!--  ordenes abiertas -->
                                   <div>Ordenes canceladas:  <span style="color: red;"> <?php echo mft_num_ord(date("Y-m-d"),"cancelada") ?></span></div> <!--  ordenes canceladas -->
                                   <div>Ordenes cerradas:  <span style="color: black;"> <?php echo mft_num_ord(date("Y-m-d"),"terminada") ?></span></div> <!--  ordenes canceladas -->
                                </div>
                            </div>
                        </div>
                        <!--
                        <a href="listado.php">
                            <div class="panel-footer">
                                <span class="pull-left">ver detalle</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                       -->

                    </div>
                </div>
                <!--
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-support fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo mft_num_ord_canceladas('%Y',date("Y"))?></div>
                                    <div>Ordenes Canceladas!</div>
                                </div>
                            </div>
                        </div>
                        <a href="listado.php?f=cancelado">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                -->
            </div>
            <!-- /.row -->

        <!--
            <div class="row">
                <div class="col-lg-8">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i> Area Chart
                        </div>
                        <div class="panel-body">
                                <script>
                                                google.charts.load('current', {'packages':['corechart']});
                                                google.charts.setOnLoadCallback(drawChart);

                                                function drawChart() {
                                                var data = google.visualization.arrayToDataTable([
                                                   ['Year', 'Tours', 'Transfers'],

                                                   <?php
                                                    $i=1;
                                                    while($i < date("m")){
                                                        $VAR_MM = substr("0".$i,-2);
                                                        $VAR_MM = date("Y")."-" . $VAR_MM;
                                                        echo  "['".mescorto($i)."',  ".mft_num_ord($VAR_MM,'','tour').",".mft_num_ord($VAR_MM,'','transfer')."],";

                                                        $i = $i +1;
                                                    }
                                                        $VAR_MM = substr("0".$i,-2);
                                                        $VAR_MM = date("Y")."-" . $VAR_MM;
                                                    echo  "['".mescorto($i)."',  ".mft_num_ord($VAR_MM,'','tour').",".mft_num_ord($VAR_MM,'','transfer')."],";


                                                   ?>



                                                ]);

                                                var options = {
                                                series: {
                                                      0: { color: '#337AB7' },
                                                      1: { color: '#F0AD4E' }
                                                    },


                                                title: 'Ordenes <?php echo date("Y")?>',
                                                curveType: 'function',
                                                legend: { position: 'bottom'}
                                                };

                                                var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

                                                chart.draw(data, options);
                                                }

                                </script>
                           <div id="curve_chart" style="height:200px"></div>


                            <?php
                                $VAR_TOTALANIO = mft_num_ord(date("Y")) ;
                                $VAR_TOTALTOUR = mft_num_ord(date("Y"),'',"tour") ;
                                $VAR_TOTALLL = mft_num_ord(date("Y"),'',"ll") ;
                                $VAR_TOTALSL = mft_num_ord(date("Y"),'',"sl") ;
                                $VAR_TOTALTR = mft_num_ord(date("Y"),'',"tr") ;
                                $VAR_TOTALOW = mft_num_ord(date("Y"),'',"ow") ;
                                $VAR_TOTALRT = mft_num_ord(date("Y"),'',"rt") ;
                                $VAR_TOTALSA = mft_num_ord(date("Y"),'',"sa") ;
                                $VAR_TOTALCIR = mft_num_ord(date("Y"),'',"cir") ;


                            ?>

<script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', ''],
          ['LL',     <?php echo $VAR_TOTALLL ?>],
          ['SL',     <?php echo $VAR_TOTALSL ?>],
          ['TR',     <?php echo $VAR_TOTALTR ?>],
          ['OW',     <?php echo $VAR_TOTALOW ?>],
          ['RT',     <?php echo $VAR_TOTALRT ?>],
          ['TOUR',     <?php echo $VAR_TOTALTOUR ?>],
          ['SA',     <?php echo $VAR_TOTALSA ?>],
          ['CIR',      <?php echo $VAR_TOTALCIR ?>],

        ]);

        var options = {
          colors: ['#FF0000','#3399CC','#FF9900','#009933','#660099','#CC0099','#FFCC33','#66CC66'],
          title: 'Operaciones <?php echo date("Y")?>',
          pieHole: 0.4,
        };

        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
        chart.draw(data, options);
      }
    </script>

    <div class="col-lg-6">
      <div id="donutchart" style="width: 900px; height: 500px;"></div>

    </div>
                        </div>
                    </div>

                </div>
                <div class="col-lg-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bell fa-fw"></i> Panel Notificaciones
                        </div>
                        <div class="panel-body">
                            <div class="list-group">
                                <a href="listado.php?f=undia&d=<?php echo date("Y-m-d")?>" class="list-group-item">
                                    <i class="fa fa-bus fa-fw"></i> Ordenes Hoy (<b><?php echo mft_num_ord(date("Y-m-d")) ?></b>)
                                    <span class="pull-right text-muted small"><em>&nbsp;</em>
                                    </span>
                                </a>

                                <a href="mensajes.php" class="list-group-item">
                                    <i class="fa fa-envelope fa-fw"></i> Nuevos Mensajes (<b><?php echo mft_mensajes('%Y',date("Y"),'no') ?></b>)
                                    <span class="pull-right text-muted small"><em>&nbsp;</em>
                                    </span>
                                </a>
                                <a href="asignar-orden.php?f=sinoper" class="list-group-item">
                                    <i class="fa fa-tasks fa-fw"></i> Sin Operador (<b><?php echo mft_sin_operador('%Y',date("Y")) ?></b>)
                                    <span class="pull-right text-muted small"><em>&nbsp;</em>
                                    </span>
                                </a>
                                <a href="listado.php?f=sinpago" class="list-group-item">
                                    <i class="fa fa-dollar fa-fw"></i> Sin pago (<b><?php echo number_format(mft_sin_pago('%Y',date("Y")),2) ?> USD</b>)
                                    <span class="pull-right text-muted small"><em>&nbsp;</em>
                                    </span>
                                </a>

                    </div>

                    <div class="chat-panel panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-comments fa-fw"></i> Ordenes recientes

                        </div>
                        <div class="panel-body">
                            <ul class="chat">

                            <?php
                                $sql ="select * from _transfers order by num DESC limit 8";
                                $rsf = adoopenrecordset($sql);
                                while($rstemp = mysql_fetch_array($rsf)){
                                 if($rstemp["tipo"]=="transfer"){$VAR_ICON ="bus";}else{$VAR_ICON="sun-o";}
                            ?>


                               <a href="agregar-servicio.php?t=<?php echo $rstemp["id"]?>" style="text-decoration:none;color:black">
                                <li class="left clearfix">
                                    <span class="chat-img pull-left">
                                          <span class="fa fa-<?php echo $VAR_ICON ?> fa-3x" style="color: #0066CC"></span>
                                    </span>
                                    <div class="chat-body clearfix">
                                        <div class="header">
                                            <strong class="primary-font"><?php echo $rstemp["name"]?></strong>
                                            <small class="pull-right text-muted">
                                                <i class="fa fa-clock-o fa-fw"></i> <?php

                                                $VAR_XX = ((time()-$rstemp["num"])/60)/60 ;
                                                $VAR_T = "horas";
                                                if($VAR_XX > 24 ){$VAR_XX = $VAR_XX / 24; $VAR_T = "días"; }


                                                echo number_format($VAR_XX,0)." ".$VAR_T  ?>
                                            </small>
                                        </div>
                                        <p style="font-size:10px">
                                          <?php echo strtoupper($rstemp["tipo"]) ?>
                                          <br><?php echo $rstemp["orig1"]?> a <?php echo $rstemp["dest1"]?>
                                        </p>
                                    </div>
                                </li>
                              </a>
                            <?php }  ?>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    -->
</div>
</div>
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
