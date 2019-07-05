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
                                $VAR_FECHA = date("Y-m-d");


                                        if(isset($_POST["txtdel"])){
                                            $VAR_FECHA = $_POST["txtdel"];
                                        }

                                      $sqlf="select * from _transfers where num > 0 and date1 ='".$VAR_FECHA."' ";

                                        $VAR_TITLE = "CIERRE DE ORDENES  ".$VAR_FECHA;



                                //     if(isset($_GET["de"])){ $sqlf= $sqlf." and date1 =  '".$_GET["de"]."'"; $VAR_TITLE =  "ORDENES HOY ".DATE("Y-m-d");}
                                //      if(isset($_GET["al"])){ $sqlf= $sqlf." and date1 =  '".$_GET["al"]."'"; $VAR_TITLE =  "ORDENES HOY ".DATE("Y-m-d");}

                                    //  if(isset($_GET["mes"])){ $sqlf= $sqlf." and date1 like  '%".$_GET["mes"]."%' " ; $VAR_TITLE =  "ORDENES MES ".$_GET["mes"];}



                                    $VAR_DEL = "";
                                    $VAR_AL  = "";
                                    $VAR_EST = "";
                                    $VAR_TIP = "";
                                    $VAR_PAG = "";



                                     if(isset($_POST["txtrep"])){
                                        //    if($_POST["txtdel"]!="")        {  $sqlf= $sqlf." and (date1 >= '".$_POST["txtdel"]."' ) ";  }
                                          //  if($_POST["txtal"]!="")         {  $sqlf= $sqlf." and (date1 <= '".$_POST["txtal"]."' ) ";  }
                                          //  if($_POST["txtest"]!="Todos")   {  $sqlf= $sqlf." and estatus = '".$_POST["txtest"]."' "; }
                                         //   if($_POST["txttip"]!="Todos")   {  $sqlf= $sqlf." and tipo = '".$_POST["txttip"]."' "; }
                                        //    if($_POST["txtpag"]!="Todos")   {  $sqlf= $sqlf." and paga = '".$_POST["txtpag"]."' "; }
                                          //  if($_POST["txtage"]!="Todos")   {  $sqlf= $sqlf." and agen = '".$_POST["txtage"]."' "; }

                                    $VAR_DEL = $_POST["txtdel"];
                                 //   $VAR_AL  = $_POST["txtal"];
                                 //   $VAR_EST = $_POST["txtest"];
                                 //   $VAR_TIP = $_POST["txttip"];
                                 //   $VAR_PAG = $_POST["txtpag"];
                                 //   $VAR_AGE = $_POST["txtage"];

                                     }


                                     $sqlf = $sqlf . " order by date1, time1, id"

                      //       echo $sqlf;


?>

                           <H2> <?php echo $VAR_TITLE ?></H2>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                        <div class="col-lg-12" style="padding-bottom:10px" >
                        <form method="post"  id="formulario" name="formulario">
                            <input name="txtrep" id="txtrep" type="hidden">


                            <div class="col-lg-3" >
                                <label>Fecha</label>
                                <input class="form-control" onchange="document.formulario.submit()" name="txtdel" type="date" value="<?php echo $VAR_FECHA ?>" />
                            </div>

                            <?php

                            /*
                            <div class="col-lg-3" >
                                <label>Al</label>
                                <input class="form-control"  name="txtal" type="date" value="<?php echo $VAR_AL ?>" />
                            </div>

                            <div class="col-lg-3" >
                                <label>Estatus</label>
                                <select class="form-control"   name="txtest" >
                                    <option>Todos</option>
                                    <option <?php if($VAR_EST=="Activo"){echo "selected"; }?> >Activo</option>
                                    <option <?php if($VAR_EST=="Cancelado"){echo "selected"; }?>>Cancelado</option>
                                    <option <?php if($VAR_EST=="Terminado"){echo "selected"; }?>>Terminado</option>
                                </select>
                            </div>

                            <div class="col-lg-3" >
                                <label>Tipo</label>
                                <select class="form-control"   name="txttip" >
                                    <option>Todos</option>
                                    <option <?php if($VAR_TIP=="Transfer"){echo "selected"; }?> >Transfer</option>
                                    <option <?php if($VAR_TIP=="Tour"){echo "selected"; }?> >Tour</option>
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


                            <div class="col-lg-3"  style="padding-top:10px">
                                <button type="submit" class="btn btn-primary btn-lg btn-block"
                                onclick="$('#txtrep').val('text');
                                    $('#formulario').attr('action','listado.php');

                                "
                                >Filtrar</button>
                              </div>

                              */

                              ?>

                          </form>
                            <form method="post" action="impresion-ot.php" target="_blank" >

                                <div class="col-lg-3"  style="padding-top:10px">

                                 <!-- <button type="submit" class="btn btn-primary btn-lg btn-block" >Imprimir</button> -->
                              </div>
                                                            <textarea style="visibility: hidden;height:0px;width:0px" name="txtsql" id="txtsql" cols="0" rows="0"><?php echo $sqlf ?></textarea>
                          </form>

                        </div>
                        <div class="col-lg-12"><hr></div>

                            <table width="100%" data-order='[[ 0, "desc" ]]' data-page-length='50' class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Tipo</th>
                                        <th>Nombre</th>
                                        <th>Fecha</th>
                                        <th>Hora</th>
                                        <th>Agencia</th>
                                        <th>Placas</th>
                                        <th>Operador</th>
                                        <th>#Eco</th>
                                        <th>Clave</th>
                                        <th>Origen</th>
                                        <th>Destino</th>
                                        <th>&nbsp;</th>


                                    </tr>
                                </thead>
                                <tbody>
                                    <?php




                                      $rsf = adoopenrecordset($sqlf);
                                      while($rstempf = mysql_fetch_array($rsf)){

                                      ?>

                                            <tr  style="cursor:pointer;" >
                                            <td><a href="detalle.php?t=<?php echo $rstempf["id"] ?>"><?php echo $rstempf["id"] ?></a></td>
                                            <td><?php echo strtoupper($rstempf["tipo"]) ?></td>
                                            <td><?php echo $rstempf["name"] ?></td>

                                            <td>
                                            <?php echo $rstempf["date1"] ?></td>
                                            <td><?php echo $rstempf["time1"] ?></td>
                                            <td><?php echo $rstempf["agen"] ?> </td>
                                            <td><?php echo $rstempf["plac"] ?> </td>
                                            <td><?php echo $rstempf["oper"] ?> </td>
                                            <td><?php echo $rstempf["noec"] ?>   </td>
                                            <td><?php echo $rstempf["clave"] ?>  </td>

                                            <td><?php echo substr($rstempf["orig1"],0,15) ?></td>
                                            <td><?php echo substr(strtoupper($rstempf["dest1"]),0,15) ?></td>




                                            <td>

                                            <?php if($rstempf["estatus"]!="cerrada"){ ?>
                                                <p id="p<?php echo $rstempf["id"]?>"></p>
                                                <button id="btn<?php echo $rstempf["id"]?>" onclick="cerrar(<?php echo $rstempf["id"]?>)">Cerrar Orden</button>
                                            <?php } else {

                                                echo $rstempf["estatus"];


                                            } ?>



                                            </td>
                                      <!--
                                       <td style="text-align:Center">

                                             <table><tr>
                                            <?php if($rstempf["paga"]=="si"){echo " <td>&nbsp;<span title='Pagado' class='fa fa-dollar'></span>&nbsp;</td>";} ?>
                                            <?php if($rstempf["oper"]!=""){echo "   <td>&nbsp;<span title='".$rstempf["oper"]."' class='fa fa-bus'></span>&nbsp;</td>";} ?>

                                             </tr>  </table>




                                            </td>
                                                 -->
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

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->


<script src="alertifyjs/alertify.min.js"></script>
<link rel="stylesheet" href="alertifyjs/css/alertify.min.css" />
<link rel="stylesheet" href="alertifyjs/css/themes/default.min.css" />




    <script>

    function cerrar(ID){
             alertify.confirm('MFTSYS', 'Desea cerrar la orden?', function(){
              var arch = 'update-orden.php?&i='+ID;


                 $.get(arch);


                   $("#btn"+ID).hide();
                   $("#p"+ID).text('Cerrada');


             alertify.success('Orden Cerrada') }
                , function(){

                    //alertify.error('Cancel')
                });



    }


    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });












    </script>

</body>

</html>
