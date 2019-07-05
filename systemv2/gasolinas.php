<!DOCTYPE html>
<style>
    table{
      font-size:12px;

    }

</style>
<?php include "../db_conexion.php"   ?>
<html lang="en">

<head>

<script src="alertifyjs/alertify.min.js"></script>
<link rel="stylesheet" href="alertifyjs/css/alertify.min.css" />
<link rel="stylesheet" href="alertifyjs/css/themes/default.min.css" />




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
        <?php
                include "nav.php";


                        if(isset($_POST["txtacc"])){
                         //    echo "<br><br><br><br><br><br><br><br><br><br>XXXXXXXXXXXXXXXXX";
                             if($_POST["txtacc"]=="subir"){
                                                    $VAR_XX ="file".$_POST["txtid"];
                                    move_uploaded_file($_FILES[$VAR_XX]["tmp_name"]
                                                        ,"_files/".$_POST["txtid"].".pdf");

                           ?>
                                    <script> alertify.success("Archivo cargado", function () { }); </script>
                           <?php
                             }
                        }



        ?>



        <div id="page-wrapper" style="">
            <div class="row">&nbsp;
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12" style="">
                    <div class="panel panel-default">
                        <div class="panel-heading">
<?php

                             //       $VAR_DEL = "";
                                  //  $VAR_AL  = "";



                                $VAR_DEL = date("Y-m-d");
                                $VAR_OPER = "Todos";
                                $VAR_AL = date("Y-m-d");


                                if(isset($_POST["txtdel"])){ $VAR_DEL = $_POST["txtdel"]; }
                                if(isset($_POST["txtal"])){ $VAR_AL = $_POST["txtal"]; }
                                if(isset($_POST["txtoper"])){ $VAR_OPER = $_POST["txtoper"]; }

                                   //   $sqlf="select * from _transfers where num > 0 and date1 >='".$VAR_DEL."'  and date1 <= '".$VAR_AL."'";
                                $sqlf="select count(id) as total, sum(gasolina) as gasolina, oper, noec from _transfers where num > 0 and date1 >='".$VAR_DEL."' and  estatus='cerrada'";

                                if(isset($_POST["txtoper"])){  if($_POST["txtoper"]!="Todos")   { $VAR_OPE = $_POST["txtoper"] ; $sqlf= $sqlf." and oper = '".$_POST["txtoper"]."' "; }}

                                //     if(isset($_GET["de"])){ $sqlf= $sqlf." and date1 =  '".$_GET["de"]."'"; $VAR_TITLE =  "ORDENES HOY ".DATE("Y-m-d");}
                                if(isset($_POST["txtal"])){ $sqlf= $sqlf." and date1 <=  '".$_POST["txtal"]."'"; }
                               //  if(isset($_GET["mes"])){ $sqlf= $sqlf." and date1 like  '%".$_GET["mes"]."%' " ; $VAR_TITLE =  "ORDENES MES ".$_GET["mes"];}
                                     $sqlf = $sqlf . "  group by oper, noec  order by oper";

                          //   echo $sqlf;


?>

                           <H2> REPORTE DE GASOLINAS </H2>
                           <p>* Solo se muestran ordenes con estatus 'CERRADAS'</p>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                        <div class="col-lg-10" style="padding-bottom:10px" >
                        <form method="post"  id="formulario" name="formulario">
                            <input name="txtrep" id="txtrep" type="hidden" >


                            <div class="col-lg-3" >
                                <label>Fecha</label>
                                <input class="form-control" onchange="document.formulario.submit()" name="txtdel" type="date" value="<?php echo $VAR_DEL ?>" />

                            </div>

                            <div class="col-lg-3" >
                                <label>Al</label>
                                <input class="form-control" onchange="document.formulario.submit()" name="txtal" type="date" value="<?php echo $VAR_AL ?>" />
                            </div>


                                    <div class="col-lg-3" >
                                        <label>Operador</label>
                                        <select class="form-control" onchange="document.formulario.submit()"   name="txtoper" >
                                               <option>Todos</option>
                                    <?php
                                        $sqlf1= "select oper from _transfers where oper <> '' and estatus = 'cerrada'  group by oper order by oper" ;
                                        $rsf1 = adoopenrecordset($sqlf1);
                                        while($rstempf1 = mysql_fetch_array($rsf1)){
                                          if($VAR_OPE==$rstempf1["oper"]){$VAR_XX = "selected";}else{$VAR_XX="";}
                                    ?>
                                         <option <?php echo $VAR_XX ?> ><?php echo $rstempf1["oper"] ?></option>
                                    <?php
                                        }
                                    ?>


                                        </select>
                                    </div>



                          </form>
                          <!--
                            <form method="post" action="impresion-asignacion.php" target="_blank"  >

                                <div class="col-lg-3"  style="padding-top:10px">

                                  <button type="submit" class="btn btn-primary btn-lg btn-block" >Imprimir</button>
                              </div>
                                        <textarea style="visibility: hidden;height:0px;width:0px" name="txtsql" id="txtsql" cols="0" rows="0"><?php echo $sqlf ?></textarea>
                                        <textarea style="visibility: hidden;height:0px;width:0px" name="txtsql2" id="txtsql2" cols="0" rows="0"><?php
                                        echo
                                        $VAR_DEL  ."|"
                                         ?></textarea>
                              </form>
                             -->
                        </div>
                      <form  name="frmarc" method="post" action="asignar-operador.php"   enctype="multipart/form-data" >
                        <input type="hidden" name="txtacc" />
                        <input type="hidden" name="txtid" />
                        <div class="col-lg-8"><hr></div>

                            <table data-order='[[ 0, "desc" ]]' data-page-length='50' class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>

                                        <th>Operador</th>
                                        <th>Unidad</th>
                                        <th>Gasolina</th>
                                        <th>Servicios</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php




                                      $rsf = adoopenrecordset($sqlf);
                                      while($rstempf = mysql_fetch_array($rsf)){

                                      ?>

                                            <tr  style="cursor:pointer;" >
                                            <td><?php echo $rstempf["oper"] ?></td>
                                            <td><?php echo $rstempf["noec"] ?></td>
                                            <td>$ <?php echo number_format($rstempf["gasolina"],0) ?></td>
                                            <td><?php echo $rstempf["total"] ?></td>
                                        </tr>

                                  <?php
                                      }


                                    ?>

                                </tbody>
                            </table>
                          </form>

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







    <script>
       function subir($ID){
          // alert('99');

             $("#guardar").trigger('click');
            document.frmarc.txtacc.value="subir";
            document.frmarc.txtid.value=$ID;
            document.frmarc.submit();



       }


    $(document).ready(function() {




        $('#dataTables-example').DataTable({

            "columnDefs": [
                { "swidth": "2px", "targets": 0 },
                { "swidth": "2%", "targets": 0 },
                { "swidth": "2%", "targets": 0 },
                { "swidth": "2%", "targets": 0 },
                { "swidth": "2%", "targets": 0 },
                { "swidth": "2%", "targets": 0 },
                { "swidth": "2%", "targets": 0 },
                { "swidth": "2%", "targets": 0 },
                { "swidth": "2%", "targets": 0 },
                { "swidth": "2%", "targets": 0 },
                { "swidth": "2%", "targets": 0 },
                { "swidth": "2%", "targets": 0 },
              ],

            bSort:false
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

            $('input[name^="come"]').each(function() {
                var arch = 'update-operador.php?c=come&val='+$(this).val()+'&i='+$(this).attr('id');
               // alert(arch);
                $.get(arch);
            });

                   alertify.success("Asignaciones Guardadas");


         }

    );






    </script>

         <script src="js/jquery.cookie.js"></script>

</body>

</html>

