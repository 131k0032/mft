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
<link href="//rawgithub.com/indrimuska/jquery-editable-select/master/dist/jquery-editable-select.min.css" rel="stylesheet">


</head>

<body>

                        <div class="panel-body">



    <div id="wrapper">

        <!-- Navigation -->
        <?php
                include "nav.php";

                      //     echo "<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;subiendo..4.3.2.1";
           //                echo "<br>&nbsp;&nbsp;&nbsp;&nbsp;--->".$_POST["txtacc"]."<--";

                        if(isset($_POST["txtacc"])){
                             // "<br>&nbsp;&nbsp;&nbsp;&nbsp;XXXXXXXXXXXXXXXXX";
                             if($_POST["txtacc"]=="subir"){
                             //  echo "<br>&nbsp;&nbsp;&nbsp;&nbsp;subiendo...3.2.1";

                             ?>
                               <script> alertify.success("Subiendo archivos, espere....", function () { }); </script>
                             <?php

                                    $VAR_XX ="file".$_POST["txtid"];

                                      $upload_dir =  "_files/";
                                         // "subiendo...";
                                      if (is_dir($upload_dir) && is_writable($upload_dir)) {
                                          // do upload logic here
                                           move_uploaded_file($_FILES[$VAR_XX]["tmp_name"],"_files/".$_POST["txtid"].".pdf");

                                      //     echo "cargado";

                                      } else {
                                     //     echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$upload_dir;
                                          echo '<br><br>Upload directory is not writable, or does not exist.';
                                      }







                           ?>
                                    <script> alertify.success("Archivo cargado", function () { }); </script>
                           <?php
                             }
                        }



        ?>



        <div id="page-wrapper" style="width:2150px !important">
            <div class="row">&nbsp;
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12" style="width:2150px">
                    <div class="panel panel-default">
                        <div class="panel-heading">
<?php

                             //       $VAR_DEL = "";
                                  //  $VAR_AL  = "";



                                $VAR_DEL = date("Y-m-d");
                                $VAR_OPE = "Todos";
                                $VAR_TIP = "Todos";
                                $VAR_AGEN = "Todos";
                                $VAR_NOEC = "Todos";
                            //    $VAR_AL = date("Y-m-30");


                                        if(isset($_POST["txtdel"])){ $VAR_DEL = $_POST["txtdel"]; }
                                     //   if(isset($_POST["txtal"])){ $VAR_AL = $_POST["txtal"]; }
                                    //    if(isset($_POST["txtoper"])){ $VAR_OPER = $_POST["txtoper"]; }

                                   //   $sqlf="select * from _transfers where num > 0 and date1 >='".$VAR_DEL."'  and date1 <= '".$VAR_AL."'";
                                      $sqlf="select * from _transfers where num > 0 and date1 ='".$VAR_DEL."' and  estatus='abierta'";

                                     if(isset($_POST["txtoper"])){  if($_POST["txtoper"]!="Todos")   { $VAR_OPE = $_POST["txtoper"] ; $sqlf= $sqlf." and (oper = '".$_POST["txtoper"]."' or oper ='' or oper is null  or oper='|' ) "; }}
                                     if(isset($_POST["txttipo"])){  if($_POST["txttipo"]!="Todos")   { $VAR_TIP = $_POST["txttipo"] ; $sqlf= $sqlf." and tipo = '".$_POST["txttipo"]."'  "; }}
                                     if(isset($_POST["txtagen"])){  if($_POST["txtagen"]!="Todos")     { $VAR_AGEN = $_POST["txtagen"] ; $sqlf= $sqlf." and agen = '".$_POST["txtagen"]."'  "; }}
                                     if(isset($_POST["txtnoec"])){  if($_POST["txtnoec"]!="Todos")     { $VAR_NOEC = $_POST["txtnoec"] ; $sqlf= $sqlf." and noec = '".$_POST["txtnoec"]."'  "; }}

                                //     if(isset($_GET["de"])){ $sqlf= $sqlf." and date1 =  '".$_GET["de"]."'"; $VAR_TITLE =  "ORDENES HOY ".DATE("Y-m-d");}
                               //     if(isset($_GET["al"])){ $sqlf= $sqlf." and date1 =  '".$_GET["al"]."'"; }
                               //  if(isset($_GET["mes"])){ $sqlf= $sqlf." and date1 like  '%".$_GET["mes"]."%' " ; $VAR_TITLE =  "ORDENES MES ".$_GET["mes"];}
                                     $sqlf = $sqlf . " order by time1, id, date1";

                 //    echo $sqlf;


?>

                           <H2> ASIGNAR OPERADOR </H2>
                           <p>* Solo se muestran ordenes con estatus 'abierta'</p>
                        </div>
                        <!-- /.panel-heading -->



                         <div class="col-lg-8" style="padding-bottom:10px" >

                        <div class="row">
                        <form method="post"  id="formulario" name="formulario">




                            <input name="txtrep" id="txtrep" type="hidden" >


                            <div class="col-lg-2" >
                                <label>Fecha</label>
                                <input class="form-control" onchange="document.formulario.submit()" name="txtdel" type="date" value="<?php echo $VAR_DEL ?>" />

                            </div>
                        <!--
                            <div class="col-lg-3" >
                                <label>Al</label>
                                <input class="form-control" onchange="document.formulario.submit()" name="txtal" type="date" value="<?php echo $VAR_AL ?>" />
                            </div>
                         -->

                             <?php
                              //    $sqlf1= "select oper from _transfers where oper <> '' and date1='".$VAR_DEL."' and  estatus='abierta'   group by oper order by oper" ;
                                  $sqlf1= "select oper from _transfers where oper <> '' and date1 = '".$VAR_DEL."'  group by oper order by oper" ;
                            //      $sqlf1= "select * from _operadores  order by ope_nomb" ;
                            //    echo $sqlf1;

                                 ?>
                                    <div class="col-lg-2" >
                                        <label>Operador</label>
                                        <select class="form-control" onchange="document.formulario.submit()"   name="txtoper" >
                                               <option value="Todos">Todos</option>
                                               <option value="" <?php if($VAR_OPE==""){echo "selected";}?> >Vacios</option>
                                    <?php

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
                                        <label>Agencia</label>
                                        <select class="form-control" onchange="document.formulario.submit()"   name="txtagen" >
                                               <option value="Todos">Todos</option>
                                               <option value="" <?php if($VAR_AGEN==""){echo "selected";}?> >Vacios</option>
                                    <?php
                                        $sqlf1= "select agen from _transfers where agen <> '' and date1 = '".$VAR_DEL."'  group by agen " ;
                                        $rsf1 = adoopenrecordset($sqlf1);
                                        while($rstempf1 = mysql_fetch_array($rsf1)){
                                          if($VAR_AGEN==$rstempf1["agen"]){$VAR_XX = "selected";}else{$VAR_XX="";}
                                    ?>
                                         <option <?php echo $VAR_XX ?> ><?php echo $rstempf1["agen"] ?></option>
                                    <?php   }  ?>

                                        </select>
                                    </div>



                                        <div class="col-lg-2">
                                            <div class="form-group">
                                                <label>Tipo Servicio</label>
                                                    <select class="form-control" onchange="document.formulario.submit()"  id="txttipo" name="txttipo">
                                                          <option   value="Todos"    >Todos</option>
                                                          <option <?php  if($VAR_TIP=="ll")  {echo  "selected";}  ?> value="ll"    >LL - Llegada</option>
                                                          <option <?php  if($VAR_TIP=="sl")  {echo  "selected";}  ?> value="sl"    >SL - Salida</option>
                                                          <option <?php  if($VAR_TIP=="tr")  {echo  "selected";}  ?> value="tr"    >TR - Transfer</option>
                                                          <option <?php  if($VAR_TIP=="ow")  {echo  "selected";}  ?> value="ow"    >OW - One Way</option>
                                                          <option <?php  if($VAR_TIP=="rt")  {echo  "selected";}  ?> value="rt"    >RT - Round Trip</option>
                                                          <option <?php  if($VAR_TIP=="tour"){echo  "selected";}  ?> value="tour"  >TOUR - Tour</option>
                                                          <option <?php  if($VAR_TIP=="sa")  {echo  "selected";}  ?> value="sa"    >SA - Servicio Abierto</option>
                                                          <option <?php  if($VAR_TIP=="cir") {echo  "selected";}  ?> value="cir"   >CIR - Circuito</option>
                                                    </select>
                                            </div>
                                        </div>

                                    <div class="col-lg-2" >
                                        <label>No. Eco</label>
                                        <select class="form-control" onchange="document.formulario.submit()"   name="txtnoec" >
                                               <option>Todos</option>
                                    <?php


                                    //    $sqlf1= "select noec from _transfers where noec <> ''  group by noec order by noec" ;
                                        $sqlf1= "select veh_noec from _vehiculos  order by veh_noec" ;



                                        $rsf1 = adoopenrecordset($sqlf1);
                                        while($rstempf1 = mysql_fetch_array($rsf1)){
                                          if($VAR_NOEC==$rstempf1["noec"]){$VAR_XX = "selected";}else{$VAR_XX="";}
                                    ?>
                                         <option <?php echo $VAR_XX ?> ><?php echo $rstempf1["noec"] ?></option>
                                    <?php
                                        }
                                    ?>


                                        </select>
                                    </div>



                          </form>
                        </div>
                        <div class="row">
                            <form method="post" action="impresion-asignacion.php" target="_blank"  >

                                <div class="col-lg-2"  style="padding-top:10px">

                                  <button type="submit" class="btn btn-primary btn-lg btn-block" >Imprimir</button>
                              </div>
                                        <textarea style="visibility: hidden;height:0px;width:0px" name="txtsql" id="txtsql" cols="0" rows="0"><?php echo $sqlf ?></textarea>
                                        <textarea style="visibility: hidden;height:0px;width:0px" name="txtsql2" id="txtsql2" cols="0" rows="0"><?php
                                        echo
                                        $VAR_DEL  ."|"
                                         ?></textarea>
                              </form>
                        </div>

                        </div>
                      <form  name="frmarc" method="post" action="asignar-operador.php"   enctype="multipart/form-data" >
                        <input type="hidden" name="txtacc" />
                        <input type="hidden" name="txtid" />
                        <div class="col-lg-8"><hr></div>

                            <table data-order='[[ 0, "desc" ]]' data-page-length='25' class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <!--<th>Num</th>-->
                                        <th>#</th>
                                        <th>#Eco</th>
                                        <th>Placas</th>
                                        <th>Operador</th>
                                        <th>Agencia</th>
                                        <th>Srv.</th>
                                        <th>PAX</th>
                                        <th>Nombre</th>
                                        <th>Hab</th>
                                        <th>Hora</th>
                                        <th>Pick up</th>
                                        <th>Drop off</th>
                                        <th>Vuelo</th>
                                        <th>Cve</th>
                                        <th>Comentarios</th>
                                        <th>Cta</th>
                                        <th>Ord. Anexa</th>
                                        <th>Cupon</th>




                                    </tr>
                                </thead>
                                <tbody>
                                    <?php



                                       $i = 0;


                                      $rsf = adoopenrecordset($sqlf);
                                      while($rstempf = mysql_fetch_array($rsf)){

                                              $VAR_NX = "";

                                                  if( date("Y-M-d",$rstempf["num"]) != date("Y-M-d")  ){
                                                      $i = $i + 1;
                                                      $VAR_NX = $i;

                                                  }

                                             /// INICIO DE TABLA DATOS
                                      ?>
                                            <tr  style="cursor:pointer;" >
                                            <!--<td style="text-align:center"><?php echo $i ?></td>-->
                                            <td><a href="agregar-servicio.php?t=<?php echo $rstempf["id"] ?>"><?php echo $VAR_NX ?></a></td>
                                            <td>

                                                      <select class="form-control"  value="<?php echo $rstempf["noec"] ?>"  name="noec" style="width:120px !important;font-size:12px"
                                                            id="<?php echo $rstempf["id"] ?>"
                                                             onchange="
                                                            var str = $('#<?php echo $rstempf["id"] ?> option:selected').val();
                                                            var res = str.split('|');
                                                            $('#plac<?php echo $rstempf["id"] ?>').val(res[1]);
                                                            ";

                                                      >
                                                                <option value="|">- Select -</option>
                                                                <?php
                                                                    $sql = "select * from _vehiculos order by veh_noec";
                                                                    $rs = adoopenrecordset($sql);
                                                                    while($rstemp = mysql_fetch_array($rs)){
                                                                        ?>
                                                                             <option value="<?php echo $rstemp["veh_noec"]."|".$rstemp["veh_plac"]."|".$rstemp["veh_nomb"] ?>"  <?php if($rstemp["veh_noec"]==$rstempf["noec"] ){echo "selected"; } ?> ><?php echo $rstemp["veh_noec"] ?></option>
                                                                <?php
                                                                    }
                                                                ?>
                                                          </select>


                                                        <!--
                                                          <select class="form-control"  value="<?php echo $rstempf["noec"] ?>" name="noec" id="<?php echo $rstempf["id"] ?>"
                                                            onchange="
                                                            var str = $('#<?php echo $rstempf["id"] ?> option:selected').val();
                                                            var res = str.split('|');
                                                            $('#plac<?php echo $rstempf["id"] ?>').html(res[1]);
                                                            ";
                                                          >
                                                                <option value="||"> - Select -</option>
                                                                <?php
                                                                    $sql = "select * from _vehiculos order by veh_noec";
                                                                    $rs = adoopenrecordset($sql);
                                                                    while($rstemp = mysql_fetch_array($rs)){
                                                                        ?>
                                                                            <option value="<?php echo $rstemp["veh_noec"]."|".$rstemp["veh_plac"]."|".$rstemp["veh_nomb"] ?>"  <?php if($rstemp["veh_noec"]==$rstempf["noec"] ){echo "selected"; } ?> ><?php echo $rstemp["veh_noec"] ?></option>
                                                                <?php
                                                                    }
                                                                ?>
                                                          </select>
                                                       -->


                                            </td>
                                            <td style="text-align:center">
                                                     <!--
                                                      <select class="form-control"  value="<?php echo $rstempf["plac"] ?>"  name="plac" style="width:120px !important;font-size:12px" id="<?php echo $rstempf["id"] ?>">
                                                                <option value="|"> - Select -</option>
                                                                <?php
                                                                    $sql = "select * from _vehiculos order by veh_noec";
                                                                    $rs = adoopenrecordset($sql);
                                                                    while($rstemp = mysql_fetch_array($rs)){
                                                                        ?>
                                                                            <option <?php if($rstemp["veh_plac"]==$rstempf["plac"] ){echo "selected"; } ?> value="<?php echo $rstemp["veh_plac"] ?>"><?php echo $rstemp["veh_plac"] ?></option>
                                                                <?php
                                                                    }
                                                                ?>
                                                          </select>
                                                     -->

                                                    <input name="plac" id="plac<?php echo $rstempf["id"] ?>" class="form-control" type="text"   value="<?php echo $rstempf["plac"] ?>"     size=12>


                                                  <!--  <span  name="plac" id="plac<?php echo $rstempf["id"] ?>"> <?php echo $rstempf["plac"] ?></span> -->


                                            </td>
                                            <td>
                                                <!--<input type="text" name="oper"  value="<?php echo $rstempf["oper"] ?>"    id="<?php echo $rstempf["id"] ?>" size=12>-->

                                                          <select class="form-control" value="<?php echo $rstempf["oper"] ?>"  name="oper" id="<?php echo $rstempf["id"] ?>">
                                                                <option value="|"> - Select -</option>
                                                                <?php
                                                                    $sql = "select * from _operadores order by ope_nomb";
                                                                    $rs = adoopenrecordset($sql);
                                                                    while($rstemp = mysql_fetch_array($rs)){
                                                                        ?>
                                                                            <option <?php if($rstemp["ope_nomb"]==$rstempf["oper"] ){echo "selected"; } ?> value="<?php echo $rstemp["ope_nomb"] ?>"><?php echo $rstemp["ope_nomb"] ?></option>
                                                                <?php
                                                                    }
                                                                ?>
                                                          </select>

                                            </td>
                                            <td>
                                                    <!-- AGENCIA -->
                                                    <!--<input type="text" name="agen"  value="<?php echo $rstempf["agen"] ?>"    id="<?php echo $rstempf["id"] ?>" size=12>-->
                                                          <select class="form-control"  value="<?php echo $rstempf["agen"] ?>"  name="agen" style="width:120px !important;font-size:12px" id="<?php echo $rstempf["id"] ?>">
                                                                <option value="|"> - Select -</option>
                                                                <?php
                                                                    $sql = "select * from _clientes order by cli_nomb";
                                                                    $rs = adoopenrecordset($sql);
                                                                    while($rstemp = mysql_fetch_array($rs)){
                                                                        ?>
                                                                            <option <?php if($rstemp["cli_nomb"]==$rstempf["agen"] ){echo "selected"; } ?> value="<?php echo $rstemp["cli_nomb"] ?>"><?php echo $rstemp["cli_nomb"] ?></option>
                                                                <?php
                                                                    }
                                                                ?>
                                                          </select>



                                            </td>
                                            <td><?php echo strtoupper($rstempf["tipo"]) ?></td>
                                            <td><?php echo ($rstempf["adul"].".".$rstempf["chil"].".".$rstempf["enfa"]) ?></td>
                                            <td><?php echo $rstempf["name"] ?></td>
                                            <td><?php echo $rstempf["room"] ?></td>
                                            <td><?php echo $rstempf["time1"] ?></td>
                                            <td><?php echo substr($rstempf["orig1"],0,25) ?></td>
                                            <td><?php echo substr(strtoupper($rstempf["dest1"]),0,25) ?></td>

                                            <td><?php echo $rstempf["vuel1"]  ?></td>
                                            <td>CC<?php echo $rstempf["cve"]  ?>BB<?php echo $rstempf["cve2"]  ?></td>

                                            <td>
                                                <textarea name="come" id="<?php echo $rstempf["id"] ?>" ><?php echo $rstempf["come"] ?></textarea>
                                           <!-- <input type="text" name="come" value="<?php echo $rstempf["come"] ?>"    id="<?php echo $rstempf["id"] ?>" size=25 >   -->

                                            </td>

                                           <!-- <td><?php echo $rstempf["come"]  ?></td>-->
                                            <td><?php
                                              if($rstempf["cta"]=="cxc"){ echo "Cliente";}
                                              if($rstempf["cta"]=="cxp"){ echo "Proveedor";}
                                              if($rstempf["cta"]=="cor"){ echo "Cortesia";}


                                            ?></td>
                                            <td>
                                                <button type="button" onclick="$('#file<?php echo  $rstempf["id"]  ?>').trigger('click')" ><span class="fa fa-upload"></span></button>
                                                &nbsp;&nbsp;<?php
                                                                $nombre_fichero = '_files/'.$rstempf["id"].'.pdf';
                                                                // echo  '_files/'.$rstempf["id"].'.pdf';
                                                                if (file_exists($nombre_fichero)) {
                                                                     echo "<a target='_blank' href='_files/".$rstempf["id"].".pdf'><span class='fa fa-file'></span></a>";
                                                                } else {
                                                                     //echo "El fichero $nombre_fichero no existe";
                                                                }


                                                ?>


                                                <input
                                                        onchange="subir(<?php echo  $rstempf["id"]  ?>);"

                                                type="file" id="file<?php echo  $rstempf["id"]  ?>" name="file<?php echo  $rstempf["id"]  ?>" style=" visibility: hidden; width:10px"  />



                                            </td>
                                            <td><?php echo  $rstempf["cupo"]  ?></td>



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
                            <button id="guardar" type="button" class="btn btn-primary btn-lg btn-block" >Guardar</button>
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
<!--
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
-->

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>
     <script src="js/jquery.cookie.js"></script>
    <!-- Page-Level Demo Scripts - Tables - Use for reference -->



          <!--
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="http://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" />
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css" />
                   -->


     <script src="//rawgithub.com/indrimuska/jquery-editable-select/master/dist/jquery-editable-select.min.js"></script>
    <script>
       function subir($ID){
          // alert('99');

            $("#guardar").trigger('click');

            document.frmarc.txtacc.value="subir";
            document.frmarc.txtid.value=$ID;
            document.frmarc.submit();



       }


 /*
$(document).ready(function() {
    $('#dataTables-example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'print'
        ],
            bSort:false
    } );
} );  */


    $(document).ready(function() {


//$("#dataTables-example select").each(function (index)
//        {



//        })



        $('#dataTables-example').DataTable({


            "columnDefs": [
                { "width": 1, "targets": 0 },
                { "width": 2, "targets": 0 },
                { "width": 1, "targets": 0 },
                { "width": "2%", "targets": 0 },
                { "width": "2%", "targets": 0 },
                { "width": "2%", "targets": 0 },
                { "width": "2%", "targets": 0 },
                { "width": "2%", "targets": 0 },
                { "width": "2%", "targets": 0 },
                { "width": "2%", "targets": 0 },
                { "width": "2%", "targets": 0 },
                { "width": "2%", "targets": 0 },
              ],

            bSort:false
        });
    });





    $("#guardar").click(
        function() {

            $('select[name^="agen"]').each(function() {


                     var str = $(this).val();
                     var res = str.split('|');
                     var str1 = res[0];


                var arch = 'update-operador.php?c=agen&val='+str1+'&i='+$(this).attr('id');


              // var arch = 'update-operador.php?c=agen&val='+$(this).val()+'&i='+$(this).attr('id');
               // alert(arch);
                $.get(arch);
            });


            $('input[name^="plac"]').each(function() {

                var str = $(this).attr('id');
                    str = str.replace("plac","");



             //   var arch = 'update-operador.php?c=plac&val='+$(this).val()+'&i='+$(this).attr('id');
                var arch = 'update-operador.php?c=plac&val='+$(this).val()+'&i='+str;
              //  alert(arch);
                $.get(arch);
            });


            $('select[name^="noec"]').each(function() {
              //  var arch1 =


                     var str = $(this).val();
                     var res = str.split('|');
                     var str1 = res[0];


                var arch = 'update-operador.php?c=noec&val='+str1+'&i='+$(this).attr('id');
             //   alert(arch);
                $.get(arch);
            });



            $('select[name^="oper"]').each(function() {



                     var str = $(this).val();
                     var res = str.split('|');
                     var str1 = res[0];


                var arch = 'update-operador.php?c=oper&val='+str1+'&i='+$(this).attr('id');


                //  alert($(this).val());
               // var arch = 'update-operador.php?c=oper&val='+$(this).val()+'&i='+$(this).attr('id');
                //  alert(arch);
                $.get(arch);
            });






            $('textarea[name^="come"]').each(function() {

                var arch = 'update-operador.php?c=come&val='+$(this).val()+'&i='+$(this).attr('id');
               // alert(arch);
                $.get(arch);
            });

                   alertify.success("Asignaciones Guardadas");
              //     setTimeout(location.reload.bind(location), 1200);



         }

    );



         //  $('select[name=oper]').editableSelect();
        //   $('select[name=noec]').editableSelect();
        //   $('select[name=plac]').editableSelect();
        //   $('select[name=agen]').editableSelect();



    </script>

</body>

</html>