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

        <div id="page-wrapper" style="width:1900px">
            <div class="row">&nbsp;
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12" style="width:1900px">
                    <div class="panel panel-default">
                        <div class="panel-heading">
<?php

                                    $VAR_DEL = "";
                                    $VAR_AL  = "";
                                    $VAR_EST = "";
                                    $VAR_TIP = "";
                                    $VAR_PAG = "";


                                $VAR_FECHA = date("Y-m-d");
                                $VAR_AL = date("Y-m-30");


                                        if(isset($_POST["txtdel"])){  $VAR_FECHA = $_POST["txtdel"]; }
                                        if(isset($_POST["txtal"])){  $VAR_AL = $_POST["txtal"]; }
                                         if(isset($_POST["txtrep"])){
                                              $sqlf="select * from _transfers where num > 0 and date1 ='".$VAR_FECHA."'";
                                         }else{

                                              $sqlf="select * from _transfers where num > 0 and date1 ='".$VAR_FECHA."' and estatus='abierta'";
                                         }


                                        $VAR_TITLE = "ASIGNACIÓN DE OPERADORES ".$VAR_FECHA;



                                //     if(isset($_GET["de"])){ $sqlf= $sqlf." and date1 =  '".$_GET["de"]."'"; $VAR_TITLE =  "ORDENES HOY ".DATE("Y-m-d");}
                                //      if(isset($_GET["al"])){ $sqlf= $sqlf." and date1 =  '".$_GET["al"]."'"; $VAR_TITLE =  "ORDENES HOY ".DATE("Y-m-d");}

                                    //  if(isset($_GET["mes"])){ $sqlf= $sqlf." and date1 like  '%".$_GET["mes"]."%' " ; $VAR_TITLE =  "ORDENES MES ".$_GET["mes"];}







                                     if(isset($_POST["txtrep"])){
                                        //    if($_POST["txtdel"]!="")        {  $sqlf= $sqlf." and (date1 >= '".$_POST["txtdel"]."' ) ";  }
                                            if($_POST["txtal"]!="")         {  $sqlf= $sqlf." and (date1 <= '".$_POST["txtal"]."' ) ";  }
                                            if($_POST["txtest"]!="Todos")   {  $sqlf= $sqlf." and estatus = '".$_POST["txtest"]."' "; }
                                         //  if($_POST["txttip"]!="Todos")   {  $sqlf= $sqlf." and tipo = '".$_POST["txttip"]."' "; }
                                        //    if($_POST["txtpag"]!="Todos")   {  $sqlf= $sqlf." and paga = '".$_POST["txtpag"]."' "; }
                                          //  if($_POST["txtage"]!="Todos")   {  $sqlf= $sqlf." and agen = '".$_POST["txtage"]."' "; }

                                    $VAR_DEL = $_POST["txtdel"];
                                    $VAR_AL  = $_POST["txtal"];
                                    $VAR_EST = $_POST["txtest"];
                                 //   $VAR_TIP = $_POST["txttip"];
                                 //   $VAR_PAG = $_POST["txtpag"];
                                 //   $VAR_AGE = $_POST["txtage"];

                                     }


                                     $sqlf = $sqlf . " order by date1, time1, id";

                         //    echo $sqlf;


?>

                           <H2> <?php echo $VAR_TITLE ?></H2>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">

                        <div class="col-lg-8" style="padding-bottom:10px" >
                        <form method="post"  id="formulario" name="formulario">
                            <input name="txtrep" id="txtrep" type="hidden">


                            <div class="col-lg-2" >
                                <label>Del</label>
                                <input class="form-control" onchange="document.formulario.submit()" name="txtdel" type="date" value="<?php echo $VAR_FECHA ?>" />
                            </div>

                            <div class="col-lg-2" >
                                <label>Al</label>
                                <input class="form-control" onchange="document.formulario.submit()" name="txtal" type="date" value="<?php echo $VAR_AL ?>" />
                            </div>

                            <div class="col-lg-3" >
                                <label>Estatus</label>
                                <select class="form-control" onchange="document.formulario.submit()"   name="txtest" >


                                    <option <?php if($VAR_EST=="abierta"){echo "selected"; }?> value="abierta" >Abierta</option>

                                    <!-- CERRADAS NO SE MUESTRAN PORQUE YA NO SE PUEDEN EDITAR -->
                                   <!-- <option <?php if($VAR_EST=="cerrada"){echo "selected"; }?> value="cerrada" >Cerrada</option> -->
                                    <option <?php if($VAR_EST=="terminada"){echo "selected"; }?> value="terminada" >Terminada</option>
                                </select>
                            </div>




                          </form>
                            <form method="post" action="impresion-orden-servicio.php" target="_blank" >

                                <div class="col-lg-2"  style="padding-top:10px">

                                  <button type="submit" class="btn btn-primary btn-lg btn-block" >Imprimir</button>
                              </div>
                                                            <textarea style="visibility: hidden;height:0px;width:0px" name="txtsql" id="txtsql" cols="0" rows="0"><?php echo $sqlf ?></textarea>
                          </form>

                        </div>
                        <div class="col-lg-12"><hr></div>

                            <table width="100%" data-order='[[ 0, "desc" ]]' data-page-length='50' class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>&nbsp;</th>
                                        <th># Servicio</th>
                                        <th>#Eco</th>
                                        <th>Placas</th>
                                        <th>Operador</th>
                                        <th>Fecha</th>
                                        <th>Agencia</th>
                                        <th>Servicio</th>
                                        <th>PAX</th>
                                        <th>Nombre</th>
                                        <th>Hab</th>
                                        <th>Hora</th>
                                        <th>Pick up</th>
                                        <th>Drop off</th>
                                        <th>Vuelo</th>
                                        <th>Comentarios</th>
                                        <th>Forma Pago</th>
                                        <th>Reservó</th>
                                        <th>Estatus</th>
                                        <th>Clave</th>





                                    </tr>
                                </thead>
                                <tbody>
                                    <?php




                                      $rsf = adoopenrecordset($sqlf);
                                      while($rstempf = mysql_fetch_array($rsf)){

                                      ?>

                                            <tr  style="cursor:pointer;" id="row<?php echo $rstempf["id"] ?>" >
                                            <td>
                                                <?php if($rstempf["estatus"]=="abierta"){ ?>

                                                    <button id="bt<?php echo $rstempf["id"] ?>"  onclick="cerrar(<?php echo $rstempf["id"] ?>)" ><span class="fa fa-check"  ></span>&nbsp;Terminada</button><p id="p"></p>
                                                <?php } ?>
                                            </td>

                                            <td><a href="detalle.php?t=<?php echo $rstempf["id"] ?>"><?php echo $rstempf["id"] ?></a></td>
                                            <td><input type="text" name="noec"  value="<?php echo $rstempf["noec"] ?>"    id="<?php echo $rstempf["id"] ?>" size=7></td>
                                            <td><input type="text" name="plac"  value="<?php echo $rstempf["plac"] ?>"    id="<?php echo $rstempf["id"] ?>" size=7></td>
                                            <td><input type="text" name="oper"  value="<?php echo $rstempf["oper"] ?>"    id="<?php echo $rstempf["id"] ?>" size=12></td>
                                            <td><?php echo $rstempf["date1"] ?></td>
                                            <td><input type="text" name="agen"  value="<?php echo $rstempf["agen"] ?>"    id="<?php echo $rstempf["id"] ?>" size=12></td>
                                            <td><?php echo strtoupper($rstempf["tipo"]) ?></td>
                                            <td><?php echo ($rstempf["adul"]+$rstempf["chil"]+$rstempf["enfa"]) ?></td>
                                            <td><?php echo $rstempf["name"] ?></td>
                                            <td><?php echo $rstempf["room"] ?></td>
                                            <td><?php echo $rstempf["time1"] ?></td>
                                            <td><?php echo substr($rstempf["orig1"],0,25) ?></td>
                                            <td><?php echo substr(strtoupper($rstempf["dest1"]),0,25) ?></td>
                                            <td><?php echo $rstempf["airl1"]."/".$rstempf["vuel1"]  ?></td>
                                            <td><?php echo $rstempf["come"]  ?></td>
                                            <td><?php echo $rstempf["payment"]  ?></td>
                                            <td><?php echo $rstempf["usuario"]  ?></td>
                                            <td><?php echo $rstempf["estatus"]  ?></td>
                                            <td><?php echo $rstempf["clave"]  ?></td>


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
                                <button id="guardar" type="submit" class="btn btn-primary btn-lg btn-block" >Guardar</button>
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



    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });





    $("#guardar").click(
        function() {

            $('input[name^="agen"]').each(function() {
                var arch = 'update-operador.php?c=agen&val='+$(this).val()+'&i='+$(this).attr('id');
               // alert(arch);
                $.get(arch);
            });

            $('input[name^="plac"]').each(function() {
                var arch = 'update-operador.php?c=plac&val='+$(this).val()+'&i='+$(this).attr('id');
               // alert(arch);
                $.get(arch);
            });


            $('input[name^="oper"]').each(function() {
                var arch = 'update-operador.php?c=oper&val='+$(this).val()+'&i='+$(this).attr('id');
               // alert(arch);
                $.get(arch);
            });

            $('input[name^="noec"]').each(function() {
                var arch = 'update-operador.php?c=noec&val='+$(this).val()+'&i='+$(this).attr('id');
               // alert(arch);
                $.get(arch);
            });

            $('input[name^="clave"]').each(function() {
                var arch = 'update-operador.php?c=clave&val='+$(this).val()+'&i='+$(this).attr('id');
               // alert(arch);
                $.get(arch);
            });

                   alertify.success("Asignaciones Guardadas");


         }

    );


    function cerrar(ID){
             alertify.confirm('MFTSYS', 'Desea marcar la orden como terminada?', function(){
              var arch = 'update-orden-terminada.php?&i='+ID;
                   $.get(arch);

                   $("#row"+ID).hide('slow');
                   $("#btn"+ID).hide();
                   $("#p"+ID).text('Cerrada');


             alertify.success('Orden Cerrada') }
                , function(){

                    //alertify.error('Cancel')
                });



    };







    </script>

</body>

</html>
