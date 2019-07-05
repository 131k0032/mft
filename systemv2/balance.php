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
                <div class="col-lg-12" style="border:0px solid red; width:1200px !important">
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

                                   // $sqlf="select * from _transfers where num > 0 and date1 >='".$VAR_DEL."'  and date1 <= '".$VAR_AL."'";
                                   // $sqlf="select count(id) as total, sum(cve) as total2, oper, cve2 from _transfers where num > 0 and date1 >='".$VAR_DEL."' and  estatus='cerrada'";
                                  // $sqlf="select count(id) as total, sum(cve) as total2, oper, cve2 from _transfers where num > 0 and date1 >='".$VAR_DEL."' ";






?>

                           <H2> BALANCE </H2>
                          <!-- <p>* Solo se muestran ordenes con estatus 'CERRADAS'</p> -->
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                        <div class="col-lg-12" style="padding-bottom:10px; width:100% !important; border:0px solid red " >
                        <form method="post"  id="formulario" name="formulario" >
                            <input name="txtrep" id="txtrep" type="hidden" >


                            <div class="col-lg-3" >
                                <label>Del</label>
                                <input class="form-control" onchange="window.formulario.action='balance.php';window.formulario.target='_self'; document.formulario.submit()" name="txtdel" type="date" value="<?php echo $VAR_DEL ?>" />

                            </div>

                            <div class="col-lg-3" >
                                <label>Al</label>
                                <input class="form-control" onchange="window.formulario.action='balance.php';window.formulario.target='_self'; document.formulario.submit()" name="txtal" type="date" value="<?php echo $VAR_AL ?>" />
                            </div>


                                    <div class="col-lg-3" >
                                        <label>Operador</label>
                                        <select class="form-control" onchange="window.formulario.action='balance.php';window.formulario.target='_self';document.formulario.submit()"   name="txtoper" >
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


                                    <div class="col-lg-12" style="padding-top:10px">

                                            <div class="col-lg-3">
                                                <button type="submit" onclick="window.formulario.action='impresion-balance.php';window.formulario.target='_blank'" class="btn btn-primary btn-lg btn-block" >Imprimir</button>
                                            </div>

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

                                        <th>FECHA</th>
                                        <th>PLACAS</th>
                                        <th>OPERADOR</th>
                                        <th>AGENCIA</th>
                                        <th>SERVICIO</th>
                                        <th>PAX</th>
                                        <th>NOMBRE</th>
                                        <th>PICKUP</th>
                                        <th>DROP OFF</th>
                                        <th>BALANCES</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php


                                   $sqlf="select *, cve as total from _transfers where num > 0 and date1 >='".$VAR_DEL."' and date1 <= '".$VAR_AL."' ";
                                   if(isset($_POST["txtoper"])){  if($_POST["txtoper"]!="Todos")   { $VAR_OPE = $_POST["txtoper"] ; $sqlf= $sqlf." and oper = '".$_POST["txtoper"]."' "; }}
                                   if(isset($_POST["txtal"])){ $sqlf= $sqlf." and date1     <=  '".$_POST["txtal"]."'"; }



                                  $sqlf = $sqlf . "    order by date1, oper";

                             //      echo $sqlf;

                                      $rsf = adoopenrecordset($sqlf);
                                      while($rstempf = mysql_fetch_array($rsf)){
                                      //  $VAR_BALANCE = $rstempf["costo"]-$rstempf["gasolina"]-$rstempf["gas2"]-$rstempf["sueldo"];
                                       if($rstempf["total"]>0){
                                      ?>

                                            <tr  style="cursor:pointer;" >
                                            <td><?php echo $rstempf["date1"] ?></td>
                                            <td><?php echo $rstempf["noec"] ?></td>
                                            <td><?php echo $rstempf["oper"] ?></td>
                                            <td><?php echo $rstempf["agen"] ?></td>
                                            <td><?php echo $rstempf["tipo"] ?></td>
                                            <td><?php echo ($rstempf["adul"].".".$rstempf["chil"].".".$rstempf["enfa"]) ?></td>
                                            <td><?php echo $rstempf["name"] ?></td>
                                            <td><?php echo substr($rstempf["orig1"],0,25) ?></td>
                                            <td><?php echo substr(strtoupper($rstempf["dest1"]),0,25) ?></td>
                                            <td style="text-align:right"><?php echo (($rstempf["total"])) ?> <?php echo (($rstempf["cve2"])) ?></td>
                                         <!--   <td style="text-align:right"><?php echo number_format($VAR_BALANCE,2)  ?> </td> -->
                                         <!--   <td style="text-align:right"><?php echo number_format($VAR_BALANCE,2)  ?> </td> -->



                                        </tr>

                                  <?php
                                       }
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
     <script src="js/jquery.cookie.js"></script>
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

</body>

</html>
