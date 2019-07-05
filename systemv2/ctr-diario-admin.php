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

<div id="cober"  name="cober"  style=" position: fixed; top:0px; left: 0px; background-color: rgba(255, 255, 255, .8); height:120%; width:2350px; border:0px solid red; z-index:2000">
        <div style="position:absolute; top:50%; left:25%">

          <div style="text-align:center">
            <span class="fa fa-refresh fa-spin fa-3x fa-fw"></span>
         <br><br><b>PROCESANDO...</b></div>
         </div>
</div>


    <div id="wrapper">

        <!-- Navigation -->
        <?php include "nav.php" ?>

        <div id="page-wrapper" style="width:2300px;border:0px solid red">
            <div class="row">&nbsp;
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12" style="width:2500px;border:0px solid red" >
                    <div class="panel panel-default">
                        <div class="panel-heading">
<?php



                                $VAR_OPE = "Todos";
                                $VAR_ECO = "Todos";
                                $VAR_DEL = date("Y-m-d");
                                $VAR_TIPO = "Todos";
                                $VAR_AGEN = "Todos";

                               if(isset($_POST["txtdel"])){ $VAR_DEL = $_POST["txtdel"]; }
                              // $sqlf="select * from _transfers where num > 0 and date1 ='".$VAR_DEL."' and (estatus ='terminada' or estatus='cancelada' ) ";
                               $sqlf="select * from _transfers where num > 0 and date1 ='".$VAR_DEL."'  ";


                                if(isset($_POST["txtoper"])){  if($_POST["txtoper"]!="Todos")   { $VAR_OPE = $_POST["txtoper"] ; $sqlf= $sqlf." and oper = '".$_POST["txtoper"]."' "; }}
                                if(isset($_POST["txtnoec"])){  if($_POST["txtnoec"]!="Todos")   { $VAR_ECO = $_POST["txtnoec"] ; $sqlf= $sqlf." and noec = '".$_POST["txtnoec"]."' "; }}
                                if(isset($_POST["txttipo"])){  if($_POST["txttipo"]!="Todos")   { $VAR_TIPO = $_POST["txttipo"] ; $sqlf= $sqlf." and tipo = '".$_POST["txttipo"]."'  "; }}
                                if(isset($_POST["txtagen"])){  if($_POST["txtagen"]!="Todos")     { $VAR_AGEN = $_POST["txtagen"] ; $sqlf= $sqlf." and agen = '".$_POST["txtagen"]."'  "; }}


                                     $sqlf = $sqlf . " order by oper, date1, time1, id";

                        //         echo $sqlf;

                              if(isset($_POST["btnpostTarifas"])){
                            
                                if ($_POST["txtdate"] >  date("Y-m-d") ) {
                                    echo '<script type="text/javascript">alert("Por favor revisa las fechas especificadas");</script>';
                                }

                                if ($_POST["txtdate"] <= date("Y-m-d") ) {
                                    //$sql= "UPDATE _transfers SET estatus = 'terminada' WHERE TIME1 BETWEEN  '{$_POST["txtdate"]}' AND '{$_POST["txtdate"]}' AND DATE1 = '{$_POST["txtdate"]}' AND estatus = 'abierta'  ";
                                   
                                    

                                     $sql= "CALL temporal_tarifa('{$_POST["txtdate"]}')";

                                    //echo $sql;
                                     adoexecute($sql);



                                     $sql= null;
                                }
                              }

                              if(isset($_POST["btnpostOrdenes"])){

                                if ($_POST["txtdateOrd"] >  date("Y-m-d") ) {
                                    echo '<script type="text/javascript">alert("Por favor revisa las fechas especificadas");</script>';
                                }

                                //echo $_POST["txtdateOrd"].' | '.$_POST["txtoperCerrar"];

                                if ($_POST["txtdateOrd"] <= date("Y-m-d") AND $_POST["txtoperCerrar"] <> '' ) {
                                    //$sql= "UPDATE _transfers SET estatus = 'terminada' WHERE TIME1 BETWEEN  '{$_POST["txtdate"]}' AND '{$_POST["txtdate"]}' AND DATE1 = '{$_POST["txtdate"]}' AND estatus = 'abierta'  ";
                                   
                                    

                                     $sql= "UPDATE _transfers SET estatus = 'completada' WHERE oper = '{$_POST["txtoperCerrar"]}' AND DATE1 = '{$_POST["txtdateOrd"]}' AND estatus = 'cerrada'";

                                    //echo $sql;
                                     adoexecute($sql);



                                     $sql= null;
                                }

                              }     


?>

                           <H2> CONTROL DIARIO ADMINISTRACIÓN</H2>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">

                        <div class="col-lg-7" style="padding-bottom:10px" >
                        <div class="row">
                                <form method="post"  id="formulario" name="formulario">
                                    <input name="txtrep" id="txtrep" type="hidden">


                                    <div class="col-lg-2" >
                                        <label>Fecha</label>
                                        <input class="form-control" onchange="document.formulario.submit()" name="txtdel" type="date" value="<?php echo $VAR_DEL ?>" />
                                    </div>
                                  <!--
                                    <div class="col-lg-2" >
                                        <label>Al</label>
                                        <input class="form-control" onchange="document.formulario.submit()" name="txtal" type="date" value="<?php echo $VAR_AL ?>" />
                                    </div>
                                 -->
                                    <div class="col-lg-2" >
                                        <label>Operador</label>
                                        <select class="form-control" onchange="document.formulario.submit()"   name="txtoper" >
                                               <option value="Todos">Todos</option>
                                               <option value="" <?php if($VAR_OPE==""){echo "selected";}?> >Vacios</option>
                                    <?php
                                        $sqlf1= "select oper from _transfers where oper <> '' and date1 = '".$VAR_DEL."'  group by oper order by oper" ;
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

                                    <div class="col-lg-2" >
                                        <label>No. Eco</label>
                                        <select class="form-control" onchange="document.formulario.submit()"   name="txtnoec" >
                                               <option>Todos</option>
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

                                  <!--
                                    <div class="col-lg-2" >
                                        <label>Estatus</label>
                                        <select class="form-control" onchange="document.formulario.submit()"   name="txtest" >


                                            <option <?php if($VAR_EST=="abierta"){echo "selected"; }?> value="abierta" >Abierta</option>
                                                                                <option <?php if($VAR_EST=="cerrada"){echo "selected"; }?> value="cerrada" >Cerrada</option>
                                                                            </select>
                                    </div>
                                 -->




                                  </form>
                                  </div>
                                  <div class="row">
                                    <form method="post" action="" name="frm" target="_blank" >

                                        <div class="col-lg-2"  style="padding-top:10px">
                                          <button type="button" onclick="window.frm.action='impresion-ctr-diario-admin.php';window.frm.submit()"     class="btn btn-primary btn-lg btn-block" >Reporte 1</button>
                                        </div>

                                        <div class="col-lg-2"  style="padding-top:10px">
                                          <button type="button" onclick="window.frm.action='impresion-ctr-diario-admin-r2.php';window.frm.submit()"  class="btn btn-primary btn-lg btn-block" >Reporte 2</button>
                                      </div>
                                                <textarea style="visibility: hidden;height:0px;width:0px" name="txtsql" id="txtsql" cols="0" rows="0"><?php echo $sqlf ?></textarea>
                                                <textarea style="visibility: hidden;height:0px;width:0px" name="txtsql2" id="txtsql2" cols="0" rows="0"><?php
                                                echo
                                                $VAR_DEL   ."|".
                                                $VAR_OPE   ."|"

                                                 ?></textarea>
                                      </form>
                                    </div>
                                    
                                    <div class="row">
                                      <!-- Boton tarifas -->
                                      <div class="col-lg-2"  style="padding-top:10px">
                                          <button type="button" class="btn btn-warning btn-lg btn-block botonTarifas" >Tarifas</button>
                                        </div>
                                        <!-- Boton cerrar ordenes -->
                                        <div class="col-lg-2"  style="padding-top:10px">
                                          <button type="button" class="btn btn-info btn-lg btn-block botoncerrarOrdenes" >Cerrar ordenes</button>
                                        </div>                                        
                                    </div>


                                    <!-- cerrar tarifas hidden -->
                                <div id="coberTarifas" style="  visibility:hidden               ;top:-150px  ; background-color:#FFF  ;width:450px ;border:2px solid silver; padding:10px; margin:10px ; position: absolute; z-index: 1200" class="row">
                                  <form method="post"  id="frmcerrar" name="frmcerrar" role="form">
                                    <div class="col-md-12" style="text-align:right; padding-bottom:10px;border-bottom:1px solid silver; margin-bottom:10px ">
                                        <button id="btncerrarTarifas" type="button" class="fa fa-times btn btn-danger" ></button>
                                    </div>
                                    <!-- Fecha a cerrar tarifas -->
                                      <div class="col-lg-12" >
                                        <label>¿De que fecha deseas calcular las tarifas?</label>
                                        <input class="form-control"   name="txtdate" type="date" value="<?php echo $VAR_DEL ?>" />
                                      </div>
                                      <!-- Actualizar tarifas -->
                                      <div class="col-lg-12" style="text-align:center;margin-top: 20px;">
                                       <button class="btn btn-primary" id="btnpostTarifas" name="btnpostTarifas"  >Actualizar tarifas</button>
                                    </div>
                                  </form>
                                </div>


                                <!-- cerrar Ordenes hidden -->
                                <div id="coberCOrdenes" style="  visibility:hidden               ;top:-150px  ; background-color:#FFF  ;width:450px ;border:2px solid silver; padding:10px; margin:10px ; position: absolute; z-index: 1200" class="row">
                                  <form method="post"  id="frmcerrar" name="frmcerrar" role="form">
                                    <div class="col-md-12" style="text-align:right; padding-bottom:10px;border-bottom:1px solid silver; margin-bottom:10px ">
                                        <button id="btnCloseOrdenes" type="button" class="fa fa-times btn btn-danger" ></button>
                                    </div>
                                    <!-- Fecha a cerrar ordenes -->
                                      <div class="col-lg-6" >
                                        <label>¿De que fecha deseas cerrar las ordenes?</label>
                                        <input class="form-control"   name="txtdateOrd" type="date" value="<?php echo $VAR_DEL ?>" />
                                      </div>
                                      <!-- Operador cerrar ordenes -->
                                       <div class="col-lg-6" >
                                        <br>
                                        <label>Operador</label>
                                        <select class="form-control"   id="txtoperCerrar" name="txtoperCerrar" >
                                               <!-- <option value="Todos">Todos</option>
                                               <option value="" <?php if($VAR_OPE==""){echo "selected";}?> >Vacios</option> -->
                                    <?php
                                        $sqlf1= "select oper from _transfers where oper <> '' and date1 = '".$VAR_DEL."'  group by oper order by oper" ;
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
                                      <!-- Cerrar Ordenes -->
                                      <div class="col-lg-12" style="text-align:center;margin-top: 20px;">
                                       <button class="btn btn-primary" id="btnpostOrdenes" name="btnpostOrdenes"  >Cerrar ordenes</button>
                                    </div>
                                  </form>
                                </div>

                        </div>
                        <div class="col-lg-12"><hr></div>

                            <table  style="width:90%" data-order='[[ 0, "desc" ]]' data-page-length='50' class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>&nbsp;</th>
                                        <th>#</th>
                                        <th>Vehículo</th>
                                        <th>#Eco</th>
                                        <th>Placas</th>
                                        <th>Proveedor</th>
                                        <th>Operador</th>
                                        <th>Agencia</th>
                                        <th>Servicio</th>
                                        <th>PAX</th>
                                        <th>Nombre</th>
                                        <th>Hab</th>
                                        <th>Hora</th>
                                        <th>Pick up</th>
                                        <th>Drop off</th>
                                        <th>Vuelo</th>
                                        <th>Cve</th>
                                        <th>Comentarios</th>
                                        <th>Cupón</th>
                                        <!--<th>Forma Pago</th>
                                        <th>Reservó</th>
                                        <th>Estatus</th>
                                        <th>CXP</th>
                                        <th>CTA</th> -->
                                        <th>Costo</th>
                                        <th>Gasolina #1</th>
                                        <th>Gasolina #2</th>
                                        <th>Gasolina #3</th>
                                        <th>Sueldo</th>
                                        <th>Litros</th>
                                        <th>KI</th>
                                        <th>KF</th>
                                        <th>Recorrido</th>
                                        <th>Estimado</th>
                                        <th>Diferencia</th>
                                        <th>Utilidad</th>
                                        <th>Rendto x KM</th>
                                        <th>Comentarios</th>
                                        <th>Forma de pago</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                      $rsf = adoopenrecordset($sqlf);
                                      $rstempf = mysql_fetch_array($rsf);

                                      $VAR_OPER = $rstempf["oper"];

                                      $VAR_TOTALCOST = 0;
                                      $VAR_TOTALGAS1 = 0;
                                      $VAR_TOTALGAS2 = 0;
                                      $VAR_TOTALGAS3 = 0;
                                      $VAR_TOTALSUEL = 0;
                                      $VAR_TOTALLITR = 0;
                                      $VAR_TOTALUTIL = 0;


                                     $VAR_GTOTALCOST =   0;
                                     $VAR_GTOTALGAS1 =   0;
                                     $VAR_GTOTALGAS2 =   0;
                                     $VAR_GTOTALGAS3 =   0;
                                     $VAR_GTOTALSUEL =   0;
                                     $VAR_GTOTALLITR =   0;
                                     $VAR_GTOTALUTIL =   0;

                                         $i = 0;

                                       $rsf = adoopenrecordset($sqlf);
                                      while($rstempf = mysql_fetch_array($rsf)){


                                          $VAR_NX = "";

                                                  if( date("Y-M-d",$rstempf["num"]) != date("Y-M-d")  ){
                                                      $i = $i + 1;
                                                      $VAR_NX = $i;

                                                  }



                                        if($VAR_OPER !=$rstempf["oper"] ) {
                                                echo "<tr style='background-color:#CCCCCC;text-align:right' ><td colspan='20'>TOTAL</td>";
                                                echo "<td style='text-align:right' >".number_format($VAR_TOTALCOST,2)."</td>";
                                                echo "<td style='text-align:right' >".number_format($VAR_TOTALGAS1,2)."</td>";
                                                echo "<td style='text-align:right' >".number_format($VAR_TOTALGAS2,2)."</td>";
                                                echo "<td style='text-align:right' >".number_format($VAR_TOTALGAS3,2)."</td>";
                                                echo "<td style='text-align:right' >".number_format($VAR_TOTALSUEL,2)."</td>";
                                                echo "<td style='text-align:right' >".number_format($VAR_TOTALLITR,2)."</td>";
                                                echo "<td style='text-align:right' ></td>";
                                                echo "<td style='text-align:right' ></td>";
                                                echo "<td style='text-align:right' ></td>";
                                                echo "<td style='text-align:right' ></td>";
                                                echo "<td style='text-align:right' ></td>";
                                                echo "<td style='text-align:right' >".number_format($VAR_TOTALUTIL,2)."</td>";
                                                echo "<td style='text-align:right' ></td>";
                                                echo "<td style='text-align:right' ></td>";
                                                echo "<td style='text-align:right' ></td>";

                                                echo "</tr>";
                                                $VAR_OPER = $rstempf["oper"];

                                                $VAR_GTOTALCOST =  $VAR_GTOTALCOST + $VAR_TOTALCOST;
                                                $VAR_GTOTALGAS1 =  $VAR_GTOTALGAS1 + $VAR_TOTALGAS1;
                                                $VAR_GTOTALGAS2 =  $VAR_GTOTALGAS2 + $VAR_TOTALGAS2;
                                                $VAR_GTOTALGAS3 =  $VAR_GTOTALGAS3 + $VAR_TOTALGAS3;
                                                $VAR_GTOTALSUEL =  $VAR_GTOTALSUEL + $VAR_TOTALSUEL;
                                                $VAR_GTOTALLITR =  $VAR_GTOTALLITR + $VAR_TOTALLITR;
                                                $VAR_GTOTALUTIL =  $VAR_GTOTALUTIL + $VAR_TOTALUTIL;

                                                    $VAR_TOTALCOST = 0;
                                                    $VAR_TOTALGAS1 = 0;
                                                    $VAR_TOTALGAS2 = 0;
                                                    $VAR_TOTALGAS3 = 0;
                                                    $VAR_TOTALSUEL = 0;
                                                    $VAR_TOTALLITR = 0;
                                                    $VAR_TOTALUTIL = 0;



                                        }


                                        $VAR_TOTALCOST =  $VAR_TOTALCOST + $rstempf["costo"];
                                        $VAR_TOTALGAS1 =  $VAR_TOTALGAS1 + $rstempf["gasolina"];
                                        $VAR_TOTALGAS2 =  $VAR_TOTALGAS2 + $rstempf["gas2"];
                                        $VAR_TOTALGAS3 =  $VAR_TOTALGAS3 + $rstempf["gas3"];
                                        $VAR_TOTALSUEL =  $VAR_TOTALSUEL + $rstempf["sueldo"];
                                        $VAR_TOTALLITR =  $VAR_TOTALLITR + $rstempf["litros"];
                                        $VAR_TOTALUTIL =  $VAR_TOTALUTIL + $rstempf["costo"]-$rstempf["sueldo"]-$rstempf["gasolina"]-$rstempf["gas2"]-$rstempf["gas3"];


                                        $VAR_COLOR ="";
                                        if($rstempf["estatus"]=="cancelada"){$VAR_COLOR="#FF6161";}
                                        if($rstempf["estatus"]=="completada"){$VAR_COLOR="#BEFF9E";}


                                      ?>

                                            <tr  style="cursor:pointer;background-color:<?php echo $VAR_COLOR ?>"  id="row<?php echo $rstempf["id"] ?>" >
                                            <td><a href="agregar-servicio.php?t=<?php echo $rstempf["id"] ?>"><?php echo $rstempf["id"] ?></a></td>
                                            <td>

                                                   <?php if($rstempf["estatus"]=="cerrada"){ ?>
                                                      <button id="bt<?php echo $rstempf["id"] ?>"  onclick="check(<?php echo $rstempf["id"] ?>)" ><span class="fa fa-check"  ></span></button><p id="p"></p>
                                                   <?php } ?>
                                            </td>

                                            <td style="text-align:center"><a href="agregar-servicio.php?t=<?php echo $rstempf["id"] ?>"><?php echo $VAR_NX ?></a></td>
                                            <td><?php echo $rstempf["tipo_veh"] ?></td>
                                            <td><?php echo $rstempf["noec"] ?></td>
                                            <td><?php echo $rstempf["plac"] ?></td>
                                            <td><?php echo $rstempf["pro_nomb"] ?></td>
                                            <td><?php echo $rstempf["oper"] ?></td>
                                            <td><?php echo $rstempf["agen"] ?></td>
                                            <td><?php echo strtoupper($rstempf["tipo"]) ?></td>
                                            <td><?php echo ($rstempf["adul"].".".$rstempf["chil"].".".$rstempf["enfa"]) ?></td>
                                            <td><?php echo $rstempf["name"] ?></td>
                                            <td><?php echo $rstempf["room"] ?></td>
                                            <td><?php echo $rstempf["time1"] ?></td>
                                            <td><?php echo $rstempf["orig1"] ?></td>
                                            <td><?php echo $rstempf["dest1"] ?></td>
                                            <td><?php echo $rstempf["vuel1"]  ?></td>
                                            <td>CC<?php echo $rstempf["cve"]  ?>BB<?php echo $rstempf["cve2"]  ?></td>
                                            <td><?php echo $rstempf["come"]  ?></td>
                                            <td><input class=""         type="text" name="cupo"  style="text-align:center"    value="<?php echo $rstempf["cupo"] ?>"       id="<?php echo $rstempf["id"] ?>" size=7></td>
                                            <td><input class="ceros"    type="text" name="costo"  style="text-align:center"   value="<?php echo $rstempf["costo"] ?>"      onchange="calcular(<?php echo $rstempf["id"] ?>,<?php echo $rstempf["gasolina"] ?>,<?php echo $rstempf["gas2"] ?>,<?php echo $rstempf["gas3"] ?>)"  id="<?php echo $rstempf["id"] ?>" size=7></td>

                                            <!--

                                            <td><input class="ceros" type="text" name="gasolina"    style="text-align:center"   value="<?php echo $rstempf["gasolina"] ?>"       id="<?php echo $rstempf["id"] ?>" size=7></td>
                                            <td><input class="ceros" type="text" name="gas2"        style="text-align:center"   value="<?php echo $rstempf["gas2"] ?>"           id="<?php echo $rstempf["id"] ?>" size=7></td>
                                             -->

                                            <td style='text-align:right'><?php echo $rstempf["gasolina"] ?></td>
                                            <td style='text-align:right'><?php echo $rstempf["gas2"] ?></td>
                                            <td style='text-align:right'><?php echo $rstempf["gas3"] ?></td>

                                            <!--<td><input type="text" name="sueldo"    value="<?php echo $rstempf["sueldo"] ?>"      id="<?php echo $rstempf["id"] ?>" size=7></td>-->
                                            <td title="dif" style='text-align:right'><input  class="ceros" style="text-align:center" type="text" name="sueldo"    onchange="calcular(<?php echo $rstempf["id"] ?>,<?php echo $rstempf["gasolina"] ?>,<?php echo $rstempf["gas2"] ?>,<?php echo $rstempf["gas3"] ?>)" value="<?php echo $rstempf["sueldo"] ?>"      id="<?php echo $rstempf["id"] ?>" size=7></td>
                                            <td title="lit" style='text-align:right'><?php echo $rstempf["litros"] ?></td>
                                            <td title="ki " style='text-align:right'><?php echo number_format($rstempf["ki"],0) ?></td>
                                            <td title="kf " style='text-align:right'><?php echo number_format($rstempf["kf"],0) ?></td>
                                            <td title="rec" style='text-align:right'><?php echo number_format($rstempf["kf"]-$rstempf["ki"],0) ?></td>
                                            <td title="est" style='text-align:right'><?php echo number_format(($rstempf["kf"]-$rstempf["ki"])/120*228,0) ?></td>
                                            <td title="dif" style='text-align:right'><?php echo number_format( $rstempf["litros"] - (($rstempf["kf"]-$rstempf["ki"])/120*228)  ,0) ?></td>
                                            <td title="uti" style='text-align:right'>
                                                        <span id="uti<?php echo $rstempf["id"] ?>" >
                                                                <?php echo $rstempf["costo"]-$rstempf["sueldo"]-$rstempf["gasolina"]-$rstempf["gas2"]-$rstempf["gas3"] ?>
                                                        </span>
                                            </td>
                                            <td title="ren" style='text-align:right'><?php


                                                        if($rstempf["kf"]-$rstempf["ki"]>0 and $rstempf["litros"] >0){

                                                            echo number_format(($rstempf["kf"]-$rstempf["ki"]) / $rstempf["litros"],2);

                                                       }else{

                                                            echo "0.00";

                                                       }


                                                        ?></td>
                                            <td title="lit" style='text-align:right'><?php echo $rstempf["come"] ?></td>
                                            <td title="lit" style='text-align:right'><?php echo $rstempf["formadepago"] ?></td>

                                            <!--<td><input type="text" name="litros"    value="<?php echo $rstempf["litros"] ?>"      id="<?php echo $rstempf["id"] ?>" size=7></td>-->
                                            <!--<td><input type="text" name="ki"        value="<?php echo $rstempf["ki"] ?>"          id="<?php echo $rstempf["id"] ?>" size=7></td>-->

                                            <!--<td><input type="text" name="kf"        value="<?php echo $rstempf["kf"] ?>"          id="<?php echo $rstempf["id"] ?>" size=7></td>-->
                                            <!--<td><input type="text" name="estimado"  value="<?php echo $rstempf["estimado"] ?>"    id="<?php echo $rstempf["id"] ?>" size=7></td>-->




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

                                                echo "<tr style='background-color:#CCCCCC;text-align:right' ><td colspan='20'>TOTAL:</td>";
                                                echo "<td style='text-align:right' >".number_format($VAR_TOTALCOST,2)."</td>";
                                                echo "<td style='text-align:right' >".number_format($VAR_TOTALGAS1,2)."</td>";
                                                echo "<td style='text-align:right' >".number_format($VAR_TOTALGAS2,2)."</td>";
                                                echo "<td style='text-align:right' >".number_format($VAR_TOTALGAS3,2)."</td>";
                                                echo "<td style='text-align:right' >".number_format($VAR_TOTALSUEL,2)."</td>";
                                                echo "<td style='text-align:right' >".number_format($VAR_TOTALLITR,2)."</td>";

                                                echo "<td style='text-align:right' ></td>";
                                                echo "<td style='text-align:right' ></td>";
                                                echo "<td style='text-align:right' ></td>";
                                                echo "<td style='text-align:right' ></td>";
                                                echo "<td style='text-align:right' ></td>";
                                                echo "<td style='text-align:right' >".number_format($VAR_TOTALUTIL,2)."</td>";
                                                echo "<td style='text-align:right' ></td>";
                                                echo "<td style='text-align:right' ></td>";
                                                echo "<td style='text-align:right' ></td>";

                                                echo "</tr>";


                                                $VAR_OPER = $rstempf["oper"];

                                                $VAR_GTOTALCOST =  $VAR_GTOTALCOST + $VAR_TOTALCOST;
                                                $VAR_GTOTALGAS1 =  $VAR_GTOTALGAS1 + $VAR_TOTALGAS1;
                                                $VAR_GTOTALGAS2 =  $VAR_GTOTALGAS2 + $VAR_TOTALGAS2;
                                                $VAR_GTOTALGAS3 =  $VAR_GTOTALGAS3 + $VAR_TOTALGAS3;
                                                $VAR_GTOTALSUEL =  $VAR_GTOTALSUEL + $VAR_TOTALSUEL;
                                                $VAR_GTOTALLITR =  $VAR_GTOTALLITR + $VAR_TOTALLITR;
                                                $VAR_GTOTALUTIL =  $VAR_GTOTALUTIL + $VAR_TOTALUTIL;


                                                echo "<tr style='background-color:#AAAAAA;text-align:right' ><td colspan='20'>GRAN TOTAL</td>";
                                                echo "<td style='text-align:right' >".number_format($VAR_GTOTALCOST,2)."</td>";
                                                echo "<td style='text-align:right' >".number_format($VAR_GTOTALGAS1,2)."</td>";
                                                echo "<td style='text-align:right' >".number_format($VAR_GTOTALGAS2,2)."</td>";
                                                echo "<td style='text-align:right' >".number_format($VAR_GTOTALGAS3,2)."</td>";
                                                echo "<td style='text-align:right' >".number_format($VAR_GTOTALSUEL,2)."</td>";
                                                echo "<td style='text-align:right' >".number_format($VAR_GTOTALLITR,2)."</td>";
                                                echo "<td style='text-align:right' ></td>";
                                                echo "<td style='text-align:right' ></td>";

                                                echo "<td style='text-align:right' ></td>";
                                                echo "<td style='text-align:right' ></td>";
                                                echo "<td style='text-align:right' ></td>";
                                                echo "<td style='text-align:right' >".number_format($VAR_GTOTALUTIL,2)."</td>";

                                                echo "<td style='text-align:right' ></td>";
                                                echo "<td style='text-align:right' ></td>";
                                                echo "<td style='text-align:right' ></td>";

                                                echo "</tr>";


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
     <script src="js/jquery.cookie.js"></script>
    <!-- Page-Level Demo Scripts - Tables - Use for reference -->


<script src="alertifyjs/alertify.min.js"></script>
<link rel="stylesheet" href="alertifyjs/css/alertify.min.css" />
<link rel="stylesheet" href="alertifyjs/css/themes/default.min.css" />




    <script>



    $(document).ready(function() {

      /*  $('#dataTables-example').DataTable({
            responsive: false,
            bSort:false
        });


        alert();
        */

        $('#cober').hide();



    });


  function Guardar() {


            window.scrollTo(0, 0);
            $('#cober').show();


            $('input[name^="costo"]').each(function()       { var arch = 'update-operador.php?c=costo&val='+$(this).val()+'&i='+$(this).attr('id');  $.get(arch);  });
            $('input[name^="cupo"]').each(function()        { var arch = 'update-operador.php?c=cupo&val='+$(this).val()+'&i='+$(this).attr('id');  $.get(arch);  });
            $('input[name^="gasolina"]').each(function()    { var arch = 'update-operador.php?c=gasolina&val='+$(this).val()+'&i='+$(this).attr('id');  $.get(arch);  });
            $('input[name^="gas2"]').each(function()    { var arch = 'update-operador.php?c=gas2&val='+$(this).val()+'&i='+$(this).attr('id');  $.get(arch);  });
            $('input[name^="gas3"]').each(function()    { var arch = 'update-operador.php?c=gas3&val='+$(this).val()+'&i='+$(this).attr('id');  $.get(arch);  });
            $('input[name^="sueldo"]').each(function()      { var arch = 'update-operador.php?c=sueldo&val='+$(this).val()+'&i='+$(this).attr('id');  $.get(arch);  });
            $('input[name^="litros"]').each(function()      { var arch = 'update-operador.php?c=litros&val='+$(this).val()+'&i='+$(this).attr('id');  $.get(arch);  });
            $('input[name^="ki"]').each(function()          { var arch = 'update-operador.php?c=ki&val='+$(this).val()+'&i='+$(this).attr('id');  $.get(arch);  });
            $('input[name^="kf"]').each(function()          { var arch = 'update-operador.php?c=kf&val='+$(this).val()+'&i='+$(this).attr('id');  $.get(arch);  });
            $('input[name^="estimado"]').each(function()    { var arch = 'update-operador.php?c=estimado&val='+$(this).val()+'&i='+$(this).attr('id');  $.get(arch);  });
            $('input[name^="formadepago"]').each(function()    { var arch = 'update-operador.php?c=formadepago&val='+$(this).val()+'&i='+$(this).attr('id');  $.get(arch);  });

            $('select[name^="cxp"]').each(function() {
                var arch = 'update-operador.php?c=cxp&val='+$(this).val()+'&i='+$(this).attr('id');
                $.get(arch);



            });





                   alertify.success("Asignaciones Guardadas");

              //   setTimeout(location.reload.bind(location), 1500);

                   var timeoutId = setTimeout(function(){
                       $('#cober').hide()
                    },14000);


         }



    $("#guardar").click(
          function(){
             Guardar();
         }
    );


    function cerrar(ID){
             alertify.confirm('MFTSYS', 'Desea marcar la orden como cerrada?', function(){
              var arch = 'update-orden-cerrada.php?&i='+ID;
                   $.get(arch);

                   Guardar();

                   $("#row"+ID).hide('slow');
                   $("#btn"+ID).hide();
                   $("#p"+ID).text('Cerrada');


             alertify.success('Orden Cerrada') }
                , function(){

                    //alertify.error('Cancel')
                });



    };

    function check(ID){
             alertify.confirm('MFTSYS', 'Desea marcar la orden como completada?',
             function(){
              var arch = 'update-orden-completada.php?&i='+ID;
                $.get(arch);

                 Guardar();

                //   $("#row"+ID).hide('slow');
                   $("#bt"+ID).hide();
                    $("#row"+ID).css('background-color', '#BEFF9E');
               //    $("#p"+ID).text('Cerrada');


           //  alertify.success('Orden Cerrada')
              }
                , function(){

                    //alertify.error('Cancel')
                });



    };



  $( document ).ready(function() {
  var search_text_s = "0.00";


  // author ZMORA
  // search input focus text
  $(".ceros").focus(function() {
    if(this.value == search_text_s){
      this.value = "";
    }
  }).blur(function() {
    if(this.value == ""){
      this.value = search_text_s;
    }
  });

    // julio funcion botonTarifas
              $('.botonTarifas').click(function(){
                window.scrollTo(0, 0);

                $('#coberTarifas').css('visibility','visible');
                $('#coberTarifas').show();
         })

              $('#btncerrarTarifas').click(function(){

                $('#coberTarifas').hide();

            })
        // julio funcion botonTarifas


        // julio funcion botoncerrarOrdenes
              $('.botoncerrarOrdenes').click(function(){
                window.scrollTo(0, 0);

                $('#coberCOrdenes').css('visibility','visible');
                $('#coberCOrdenes').show();
         })

              $('#btnCloseOrdenes').click(function(){

                $('#coberCOrdenes').hide();

            })
        // julio funcion botoncerrarOrdenes





});


 function calcular(ID,GAS,GAS2,GAS3){

      var varrec = $('[id='+ID+'][name="kf"]').val()-$('[id='+ID+'][name="ki"]').val();
      var varest = varrec/120*228;


     $('#uti'+ID).html( number_format( $('[id='+ID+'][name="costo"]').val() - $('[id='+ID+'][name="sueldo"]').val() - GAS - GAS2-GAS3 ,2) );




  }




    </script>

</body>

</html>
