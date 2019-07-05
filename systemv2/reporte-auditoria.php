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
                                        $VAR_TITLE = "REPORTE DE AUDITORIA";
                                      $sqlf="select * from _transfers where num > 0 ";

                                //     if(isset($_GET["de"])){ $sqlf= $sqlf." and date1 =  '".$_GET["de"]."'"; $VAR_TITLE =  "ORDENES HOY ".DATE("Y-m-d");}
                                //      if(isset($_GET["al"])){ $sqlf= $sqlf." and date1 =  '".$_GET["al"]."'"; $VAR_TITLE =  "ORDENES HOY ".DATE("Y-m-d");}

                                //      if(isset($_GET["mes"])){ $sqlf= $sqlf." and date1 like  '%".$_GET["mes"]."%' " ; $VAR_TITLE =  "ORDENES MES ".$_GET["mes"];}



                                    if(isset($_POST["txtfiltro"])){

                                        $sqlf= $sqlf." and (name like('%".$_POST["txtfiltro"]."%')
                                                       or plac  like('%".$_POST["txtfiltro"]."%')
                                                       or oper  like('%".$_POST["txtfiltro"]."%')
                                                       or noec  like('%".$_POST["txtfiltro"]."%')
                                                       or agen  like('%".$_POST["txtfiltro"]."%')
                                                       or come  like('%".$_POST["txtfiltro"]."%')
                                                       or tipo  like('%".$_POST["txtfiltro"]."%')
                                                       or vehic  like('%".$_POST["txtfiltro"]."%')
                                                       or num  like('%".$_POST["txtfiltro"]."%')
                                                       or email  like('%".$_POST["txtfiltro"]."%')
                                                       or payment  like('%".$_POST["txtfiltro"]."%')
                                                       or mobile  like('%".$_POST["txtfiltro"]."%')
                                                       or orig1  like('%".$_POST["txtfiltro"]."%')
                                                       or dest1  like('%".$_POST["txtfiltro"]."%')
                                                       or id  like('%".$_POST["txtfiltro"]."%')
                                                       or mobile  like('%".$_POST["txtfiltro"]."%')
                                                       or room  like('%".$_POST["txtfiltro"]."%'))

                                        ";



                                        $VAR_TITLE = "FILTRADO: ".$_POST["txtfiltro"];



                                    }

                                    $VAR_DEL = date("Y-m-d");
                                    $VAR_AL  = date("Y-m-d");
                                    $VAR_EST = "";
                                    $VAR_TIP = "";
                                    $VAR_PAG = "";
                                    $VAR_USU = "";


                                    if(isset($_POST["txtdel"])) { $VAR_DEL = $_POST["txtdel"] ;}
                                    if(isset($_POST["txtal"]))  { $VAR_AL = $_POST["txtal"] ;}
                                    if(isset($_POST["txusu"]))  { $VAR_USU = $_POST["txtusu"] ;}



                                    $sqlf= $sqlf." and date1 >= '".$VAR_DEL."'  ";
                                    $sqlf= $sqlf." and date1 <= '".$VAR_AL."'";

                                      if(isset($_POST["txtest"]))   { if($_POST["txtest"]!="Todos"){  $VAR_EST = $_POST["txtest"];  $sqlf= $sqlf." and  estatus = '".$VAR_EST."'";  }  }
                                      if(isset($_POST["txttip"]))   { if($_POST["txttip"]!="Todos"){  $VAR_TIP = $_POST["txttip"];  $sqlf= $sqlf." and tipo = '".$VAR_TIP."'";   } }
                                      if(isset($_POST["txtpag"]))   { if($_POST["txtpag"]!="Todos"){  $VAR_PAG = $_POST["txtpag"];  $sqlf= $sqlf." and paga = '".$VAR_PAG."'";   } }
                                      if(isset($_POST["txtage"]))   { if($_POST["txtage"]!="Todos"){  $VAR_AGE = $_POST["txtage"];  $sqlf= $sqlf." and agen = '".$VAR_AGE."'";   } }
                                      if(isset($_POST["txtusu"]))   { if($_POST["txtusu"]!="Todos"){  $VAR_USU = $_POST["txtusu"];  $sqlf= $sqlf." and usuario = '".$VAR_USU."'";   } }



                                     $sqlf = $sqlf . " order by  date1 DESC,  time1";

                        //echo $sqlf;


?>

                           <H2> <?php echo $VAR_TITLE ?></H2>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                        <div class="col-lg-12" style="padding-bottom:10px" >
                        <form method="post"  id="formulario" name="formulario">
                            <input name="txtrep" id="txtrep" type="hidden">


                            <div class="col-lg-3" >
                                <label>Del</label>
                                <input class="form-control" name="txtdel" type="date" value="<?php echo $VAR_DEL ?>" />
                            </div>
                            <div class="col-lg-3" >
                                <label>Al</label>
                                <input class="form-control"  name="txtal" type="date" value="<?php echo $VAR_AL ?>" />
                            </div>

                            <div class="col-lg-3" >
                                <label>Estatus</label>
                                <select class="form-control"    name="txtest" >
                                    <option>Todos</option>

                                    <option <?php if($VAR_EST=="abierta")   {echo "selected"; }?> value="abierta" >Abierta</option>
                                    <option <?php if($VAR_EST=="terminada") {echo "selected"; }?> value="terminada" >Terminada</option>
                                    <option <?php if($VAR_EST=="cerrada")   {echo "selected"; }?> value="cerrada" >Cerrada</option>
                                </select>
                            </div>

                            <div class="col-lg-3" >
                                <label>Tipo</label>
                                <select class="form-control"   name="txttip" >
                                    <option>Todos</option>
                                    <option <?php if($VAR_TIP=="ll")  {echo "selected"; }?> value="ll" >Llegada</option>
                                    <option <?php if($VAR_TIP=="sl")  {echo "selected"; }?> value="sl" >Salida</option>
                                    <option <?php if($VAR_TIP=="tr")  {echo "selected"; }?> value="tr" >Traslado</option>
                                    <option <?php if($VAR_TIP=="ow")  {echo "selected"; }?> value="ow" >One Way</option>
                                    <option <?php if($VAR_TIP=="rt")  {echo "selected"; }?> value="rt" >Round Trip</option>
                                    <option <?php if($VAR_TIP=="tour"){echo "selected"; }?> value="tour" >Tour</option>
                                    <option <?php if($VAR_TIP=="sa")  {echo "selected"; }?> value="sa" >Servicio Abierto</option>
                                    <option <?php if($VAR_TIP=="cir") {echo "selected"; }?> value="cir">Circuito</option>

                                </select>
                            </div>

                            <div class="col-lg-3" >
                                <label>Pagado</label>
                                <select class="form-control"   name="txtpag" >
                                    <option>Todos</option>
                                    <option <?php if($VAR_PAG=="Si"){echo "selected"; }?> >Si</option>
                                    <option <?php if($VAR_PAG=="No"){echo "selected"; }?> >No</option>
                                </select>
                            </div>

                            <div class="col-lg-3" >
                                <label>Agencia</label>
                                <select class="form-control"   name="txtage" >
                                    <option>Todos</option>
                                    <?php
                                        $sqlf1= "select agen from _transfers where agen <> '' group by agen order by agen" ;
                                        $rsf1 = adoopenrecordset($sqlf1);
                                        while($rstempf1 = mysql_fetch_array($rsf1)){
                                          if($VAR_AGE==$rstempf1["agen"]){$VAR_XX = "selected";}else{$VAR_XX="";}
                                    ?>
                                         <option <?php echo $VAR_XX ?> ><?php echo $rstempf1["agen"] ?></option>
                                    <?php
                                        }
                                    ?>


                                </select>
                            </div>

                            <div class="col-lg-3" >
                                <label>Usuario</label>
                                <select class="form-control"   name="txtusu" >
                                    <option>Todos</option>
                                    <?php
                                        $sqlf1= "select usuario from _transfers where usuario <> '' group by usuario order by usuario" ;
                                        $rsf1 = adoopenrecordset($sqlf1);
                                        while($rstempf1 = mysql_fetch_array($rsf1)){
                                          if($VAR_USU==$rstempf1["usuario"]){$VAR_XX = "selected";}else{$VAR_XX="";}
                                    ?>
                                         <option <?php echo $VAR_XX ?> ><?php echo $rstempf1["usuario"] ?></option>
                                    <?php
                                        }
                                    ?>


                                </select>
                            </div>




                              <div class="col-lg-3"  style="padding-top:10px">
                                  <button type="submit" class="btn btn-primary btn-lg btn-block" >Filtrar</button>
                              </div>


                          </form>

                        <div class="col-lg-12">
                            <form method="post" action="impresion-auditoria.php" target="_blank" >

                              <div class="col-lg-3"  style="padding-top:10px">
                                  <button type="submit" class="btn btn-primary btn-lg btn-block" >Imprimir</button>
                              </div>

                              <textarea style="visibility: hidden;height:0px;width:0px" name="txtsql" id="txtsql" cols="0" rows="0"><?php echo $sqlf ?></textarea>
                          </form>
                       </div>


                        </div>
                        <div class="col-lg-12"><hr></div>


                            <table width="100%" data-order='[[ 0, "desc" ]]' data-page-length='30'  class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>

                                       <!-- <th># Mail</th>  -->

                                        <th>ID</th>
                                        <th>Capturó</th>
                                        <th>Captura</th>
                                        <th>Fecha</th>
                                        <th>Tipo</th>
                                        <th>Nombre</th>
                                        <th>Agencia</th>
                                        <th>Hora</th>
                                        <th>Cupón</th>
                                        <th>Pickup</th>
                                        <th>Dropoff</th>


                                    </tr>
                                </thead>
                                <tbody>
                                    <?php




                                      $rsf = adoopenrecordset($sqlf);
                                      while($rstempf = mysql_fetch_array($rsf)){

                                      ?>

                                            <tr  style="cursor:pointer;" onclick="document.location.href='agregar-servicio.php?t=<?php echo $rstempf["id"] ?>'">
                                            <td><a href="agregar-servicio.php?t=<?php echo $rstempf["id"] ?>"><?php echo $rstempf["id"] ?></a></td>
                                            <td><?php echo $rstempf["usuario"] ?></td>
                                            <td><?php echo date("Y-m-d - h:i:s",($rstempf["num"])) ?></td>
                                            <td><?php echo $rstempf["date1"] ?></td>
                                            <td><?php echo strtoupper($rstempf["tipo"]) ?></td>
                                            <td><?php echo $rstempf["name"] ?></td>
                                            <td><?php echo $rstempf["agen"] ?></td>


                                            <td><?php echo $rstempf["time1"] ?></td>
                                            <td><?php echo $rstempf["cupo"] ?></td>
                                            <td><?php echo substr($rstempf["orig1"],0,15) ?></td>
                                            <td><?php echo substr(strtoupper($rstempf["dest1"]),0,15) ?></td>


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
            responsive: true,
            "columnDefs": [
                { "width": "5%", "targets": 0 },
                { "width": "5%", "targets": 0 },
                { "width": "2%", "targets": 0 },
                { "width": "5%", "targets": 0 },
                { "width": "2%", "targets": 0 },
              ],
            bSort:false


        });
    });
    </script>

</body>

</html>

    <script src="dist/js/sb-admin-2.js"></script>
     <script src="js/jquery.cookie.js"></script>
     