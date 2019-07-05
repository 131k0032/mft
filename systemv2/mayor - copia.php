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

        <div id="page-wrapper" style="width:1050px">
            <div class="row">&nbsp;
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12" style="width:1050px">
                    <div class="panel panel-default">
                        <div class="panel-heading">
<?php


                                $VAR_TITLE ="REPORTE MAYOR";

                                $VAR_DEL = date("Y-01-01");
                                $VAR_AL = date("Y-m-30");

                                $VAR_OPE = "Todos";
                                $VAR_ECO = "Todos";
                                $VAR_TIPO = "Todos";
                                $VAR_AGEN = "Todos";



                                if(isset($_POST["txtdel"])){ $VAR_DEL = $_POST["txtdel"]; }
                                if(isset($_POST["txtal"])){ $VAR_AL = $_POST["txtal"]; }


                                $sqlf="select agen from _transfers where num > 0 and date1 >='".$VAR_DEL."' and cta ='cxc'
                                 and  (estatus='cerrada' or estatus='completada' or estatus='cancelada' ) and date1 <='".$VAR_AL."'";


                                if(isset($_POST["txtoper"])){  if($_POST["txtoper"]!="Todos")   { $VAR_OPE = $_POST["txtoper"] ; $sqlf= $sqlf." and oper = '".$_POST["txtoper"]."' "; }}
                                if(isset($_POST["txtnoec"])){  if($_POST["txtnoec"]!="Todos")   { $VAR_ECO = $_POST["txtnoec"] ; $sqlf= $sqlf." and noec = '".$_POST["txtnoec"]."' "; }}
                                if(isset($_POST["txttipo"])){  if($_POST["txttipo"]!="Todos")   { $VAR_TIPO = $_POST["txttipo"] ; $sqlf= $sqlf." and tipo = '".$_POST["txttipo"]."'  "; }}
                                if(isset($_POST["txtagen"])){  if($_POST["txtagen"]!="Todos")     { $VAR_AGEN = $_POST["txtagen"] ; $sqlf= $sqlf." and agen = '".$_POST["txtagen"]."'  "; }}

                                $sqlf = $sqlf . " group by agen order by agen";

                          //   echo $sqlf;


//                            $VAR_COBRADO =  montos($VAR_CTA,$VAR_DEL,$VAR_AL,$VAR_AGE,'si');
//                            $VAR_PORCOBRAR = montos($VAR_CTA,$VAR_DEL,$VAR_AL,$VAR_AGE,'no');

//                            $VAR_COBRADOH =  montos($VAR_CTA, "2000-01-01",(date("Y")+1)."-01-01",$VAR_AGE,'si');
//                            $VAR_PORCOBRARH = montos($VAR_CTA,"2000-01-01",(date("Y")+1)."-01-01",$VAR_AGE,'no');
                             //   echo $sqlt;
?>

                           <H2> <?php echo $VAR_TITLE ?></H2>


                             <!--
                           <h4>Total Pagado:  <b style="color:#336600"><?php echo number_format($VAR_COBRADO,2) ?></b>&nbsp;&nbsp;&nbsp;&nbsp;
                           Saldo: <b style="color:#CC0000"><?php echo number_format($VAR_PORCOBRAR,2) ?></b> <span style="font-size:12px">(del <?php echo $VAR_DEL ?> al <?php echo $VAR_AL ?> )</span> </h4>

                            <h4>Total Pagado:  <b style="color:#336600"><?php echo number_format($VAR_COBRADOH,2) ?></b>&nbsp;&nbsp;&nbsp;&nbsp;
                           Saldo: <b style="color:#CC0000"><?php echo number_format($VAR_PORCOBRARH,2) ?></b> <span style="font-size:12px">(histórico )</span> </h4>
                            -->

                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                        <div class="col-lg-12" style="padding-bottom:10px" >
                        <form method="post"  id="formulario" name="formulario">
                            <input name="txtrep" id="txtrep" type="hidden">


                             <div class="col-lg-3" >
                                <label>Del</label>
                                <input class="form-control" onchange="document.formulario.submit()" name="txtdel" type="date" value="<?php echo $VAR_DEL ?>" />
                            </div>

                            <div class="col-lg-3" >
                                <label>Al</label>
                                <input class="form-control" onchange="document.formulario.submit()" name="txtal" type="date" value="<?php echo $VAR_AL ?>" />
                            </div>


                             <!--
                            <div class="col-lg-2" >
                                <label>Estatus</label>
                                <select class="form-control" onchange="document.formulario.submit()"   name="txtest" >

                                    <option>Todos</option>
                                    <option <?php if($VAR_EST=="abierta"){echo "selected"; }?> value="abierta" >Abierta</option>
                                    <option <?php if($VAR_EST=="cerrada"){echo "selected"; }?> value="cerrada" >Cerrada</option> -

                                </select>
                            </div>
                                -->



                                    <div class="col-lg-2" >
                                        <label>Operador</label>
                                        <select class="form-control" onchange="document.formulario.submit()"   name="txtoper" >
                                               <option value="Todos">Todos</option>
                                                <option value="" <?php if($VAR_OPE==""){echo "selected";}?> >Vacios</option>
                                    <?php
                                        $sqlf1= "select oper from _transfers where oper <> ''  group by oper order by oper" ;
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

                           <div class="col-lg-2" >
                                <label>Cliente</label>
                                <select class="form-control" onchange="document.formulario.submit()"  name="txtagen" >
                                  <option value="Todos">Todos</option>
                                  <option value="" <?php if($VAR_AGEN==""){echo "selected";}?> >Vacios</option>
                                    <?php
                                        $sqlf1= "select agen from _transfers where agen <> '' and (estatus='cerrada' or estatus='completada' or estatus='cancelada') group by agen order by agen " ;
                                        $rsf1 = adoopenrecordset($sqlf1);
                                        while($rstempf1 = mysql_fetch_array($rsf1)){
                                          if($VAR_AGEN==$rstempf1["agen"]){$VAR_XX = "selected";}else{$VAR_XX="";}
                                    ?>
                                         <option  <?php echo $VAR_XX ?> ><?php echo $rstempf1["agen"] ?></option>
                                    <?php
                                        }
                                    ?>


                                </select>
                            </div>

                                        <div class="col-lg-2">
                                            <div class="form-group">
                                                <label>Tipo Servicio</label>
                                                    <select class="form-control" onchange="document.formulario.submit()"  id="txttipo" name="txttipo">
                                                          <option   value="Todos"    >Todos</option>
                                                          <option <?php  if($VAR_TIPO=="ll")  {echo  "selected";}  ?> value="ll"    >LL - Llegada</option>
                                                          <option <?php  if($VAR_TIPO=="sl")  {echo  "selected";}  ?> value="sl"    >SL - Salida</option>
                                                          <option <?php  if($VAR_TIPO=="tr")  {echo  "selected";}  ?> value="tr"    >TR - Transfer</option>
                                                          <option <?php  if($VAR_TIPO=="ow")  {echo  "selected";}  ?> value="ow"    >OW - One Way</option>
                                                          <option <?php  if($VAR_TIPO=="rt")  {echo  "selected";}  ?> value="rt"    >RT - Round Trip</option>
                                                          <option <?php  if($VAR_TIPO=="tour"){echo  "selected";}  ?> value="tour"  >TOUR - Tour</option>
                                                          <option <?php  if($VAR_TIPO=="sa")  {echo  "selected";}  ?> value="sa"    >SA - Servicio Abierto</option>
                                                          <option <?php  if($VAR_TIPO=="cir") {echo  "selected";}  ?> value="cir"   >CIR - Circuito</option>
                                                    </select>
                                            </div>
                                        </div>

                                    <div class="col-lg-2" >
                                        <label>No. Eco</label>
                                        <select class="form-control" onchange="document.formulario.submit()"   name="txtnoec" >
                                               <option value="Todos">Todos</option>
                                                <option value="" <?php if($VAR_OPE==""){echo "selected";}?> >Vacios</option>
                                    <?php
                                        $sqlf1= "select noec from _transfers where noec <> ''  group by noec order by noec" ;
                                        $rsf1 = adoopenrecordset($sqlf1);
                                        while($rstempf1 = mysql_fetch_array($rsf1)){
                                          if($VAR_ECO==$rstempf1["noec"]){$VAR_XX = "selected";}else{$VAR_XX="";}
                                    ?>
                                         <option <?php echo $VAR_XX ?> ><?php echo $rstempf1["noec"] ?></option>
                                    <?php
                                        }
                                    ?>


                                        </select>
                                    </div>




                          </form>
                            <form method="post" action="impresion-mayor.php" name="frmi" target="_blank" >

                            <input type="hidden" name="txtdel" />
                            <input type="hidden" name="txtal" />
                            <input type="hidden" name="txtoper" />
                            <input type="hidden" name="txtagen" />
                            <input type="hidden" name="txttipo" />
                            <input type="hidden" name="txtnoec" />




                                <div class="col-lg-2"  style="padding-top:10px">
                                    <button type="submit"
                                      onclick="
                                        document.frmi.txtdel.value = document.formulario.txtdel.value;
                                        document.frmi.txtal.value = document.formulario.txtal.value;
                                        document.frmi.txtoper.value = document.formulario.txtoper.value;
                                        document.frmi.txtagen.value = document.formulario.txtagen.value;
                                        document.frmi.txttipo.value = document.formulario.txttipo.value;
                                        document.frmi.txtnoec.value = document.formulario.txtnoec.value;


                                      "

                                     class="btn btn-primary btn-lg btn-block" >Imprimir</button>
                                </div>


                          </form>

                        </div>
                        <div class="col-lg-12"><hr></div>

                            <table width="100%" data-order='[[ 0, "desc" ]]' data-page-length='50' class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th colspan="3"  style="text-align:center">DEL <?php echo $VAR_DEL ?>  AL <?php echo $VAR_AL ?>   </th>
                                        <th colspan="3"  style="text-align:center">HISTORICO</th>
                                    </tr>
                                    <tr>
                                        <th style="text-align:center">Cliente</th>
                                        <th style="text-align:center">Servicios</th>
                                        <th style="text-align:center">Pagado</th>
                                        <th style="text-align:center">Saldo</th>
                                        <th style="text-align:center">Servicios</th>
                                        <th style="text-align:center">Pagado</th>
                                        <th style="text-align:center">Saldo</th>



                                    </tr>
                                </thead>



                                <tbody>
                                <?php

                                         $VAR_T1 = 0;
                                         $VAR_T2 = 0;
                                         $VAR_T3 = 0;
                                         $VAR_T4 = 0;
                                         $VAR_T5 = 0;
                                         $VAR_T6 = 0;

                                    $rs = adoopenrecordset($sqlf);
                                    while($rstemp = mysql_fetch_array($rs)){

                                    $VAR_PAG = montos("cxc",$VAR_DEL,$VAR_AL,$rstemp["agen"],'si');
                                    $VAR_SAL = montos("cxc",$VAR_DEL,$VAR_AL,$rstemp["agen"],'no') ;
                                    $VAR_FAC =  $VAR_PAG + $VAR_SAL;

                                    $VAR_PAGH = montos("cxc","2000-01-01",(date("Y")+1)."-01-01",$rstemp["agen"],'si');
                                    $VAR_SALH = montos("cxc","2000-01-01",(date("Y")+1)."-01-01",$rstemp["agen"],'no') ;
                                    $VAR_FACH =  $VAR_PAGH + $VAR_SALH;

                                  //  $VAR_T1 =  $VAR_T1 + 1;





                                ?>

                                    <tr>
                                        <td align="right"><?php echo $rstemp["agen"]?></td>
                                        <td align="right">$ <?php echo number_format($VAR_FAC,2)  ?></td>
                                        <td align="right">$ <?php echo number_format($VAR_PAG,2)  ?></td>
                                        <td align="right">$ <?php echo number_format($VAR_SAL,2)  ?></td>
                                        <td align="right">$ <?php echo number_format($VAR_FACH,2)  ?></td>
                                        <td align="right">$ <?php echo number_format($VAR_PAGH,2)  ?></td>
                                        <td align="right">$ <?php echo number_format($VAR_SALH,2)  ?></td>
                                    </tr>



                                <?php

                                    $VAR_T1 =  ($VAR_T1) + ($VAR_FAC);
                                    $VAR_T2 =  $VAR_T2 + $VAR_PAG;
                                    $VAR_T3 =  $VAR_T3 + $VAR_SAL;
                                    $VAR_T4 =  $VAR_T4 + $VAR_FACH;
                                    $VAR_T5 =  $VAR_T5 + $VAR_PAGH;
                                    $VAR_T6 =  $VAR_T6 + $VAR_SALH;



                                 } ?>

                                     <tr>
                                        <td align="right">TOTAL</td>
                                        <td align="right">$ <?php echo number_format($VAR_T1,2)  ?></td>
                                        <td align="right">$ <?php echo number_format($VAR_T2,2)  ?></td>
                                        <td align="right">$ <?php echo number_format($VAR_T3,2)  ?></td>
                                        <td align="right">$ <?php echo number_format($VAR_T4,2)  ?></td>
                                        <td align="right">$ <?php echo number_format($VAR_T5,2)  ?></td>
                                        <td align="right">$ <?php echo number_format($VAR_T6,2)  ?></td>
                                     </tr>
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


      <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>
     <script src="js/jquery.cookie.js"></script>
    <!-- Page-Level Demo Scripts - Tables - Use for reference -->

    

    <script>



  $(document).ready(function() {
        $('#dataTables-example').DataTable({

            bSort:false
        });
    });




      $( "#pagadodos" ).click(
      function() {
        alert( "Handler for .change() called." );
           alertify.success("Servicios Guardados!!");
      });




    $("#guardar").click(
        function() {

            $('input[name^="costo"]').each(function() {
                var arch = 'update-operador.php?c=costo&val='+$(this).val()+'&i='+$(this).attr('id');
               // alert(arch);
                $.get(arch);
            });

            $('input[name^="gasolina"]').each(function() {
                var arch = 'update-operador.php?c=gasolina&val='+$(this).val()+'&i='+$(this).attr('id');
               // alert(arch);
                $.get(arch);
            });


            $('input[name^="sueldo"]').each(function() {
                var arch = 'update-operador.php?c=sueldo&val='+$(this).val()+'&i='+$(this).attr('id');
               // alert(arch);
                $.get(arch);
            });

            $('input[name^="litros"]').each(function() {
                var arch = 'update-operador.php?c=litros&val='+$(this).val()+'&i='+$(this).attr('id');
               // alert(arch);
                $.get(arch);
            });

            $('input[name^="ki"]').each(function() {
                var arch = 'update-operador.php?c=ki&val='+$(this).val()+'&i='+$(this).attr('id');
               // alert(arch);
                $.get(arch);
            });

            $('input[name^="kf"]').each(function() {
                var arch = 'update-operador.php?c=kf&val='+$(this).val()+'&i='+$(this).attr('id');
               // alert(arch);
                $.get(arch);
            });

            $('input[name^="estimado"]').each(function() {
                var arch = 'update-operador.php?c=estimado&val='+$(this).val()+'&i='+$(this).attr('id');
               // alert(arch);
                $.get(arch);
            });

            $('select[name^="pagado"]').each(function() {
                var arch = 'update-operador.php?c=pagado&val='+$(this).val()+'&i='+$(this).attr('id');

                $.get(arch);

         //   $("#reng"+$(this).attr('id')).css( "background-Color","#FF0033" );
              //   $("#reng1").attr("css", { backgroundColor: "red" });

              if($(this).val()=="si"){
                $("#reng"+$(this).attr('id')).css('background-color', '#D4FFA8');
              }else{
                $("#reng"+$(this).attr('id')).css('background-color', '');
              }

            });

            $('input[name^="formadepago"]').each(function() {
                var arch = 'update-operador.php?c=formadepago&val='+$(this).val()+'&i='+$(this).attr('id');
               // alert(arch);
                $.get(arch);
            });

            $('input[name^="fechapago"]').each(function() {
                var arch = 'update-operador.php?c=fechapago&val='+$(this).val()+'&i='+$(this).attr('id');
               // alert(arch);
                $.get(arch);
            });

                   alertify.success("Servicios Guardados!!");
                   setTimeout(location.reload.bind(location), 1500);





         }

    );






    </script>

</body>

</html>
