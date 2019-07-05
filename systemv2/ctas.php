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


<div id="cober"  name="cober"  style=" position: fixed; top:0px; left: 0px; background-color: rgba(255, 255, 255, .8); height:120%; width:2150px; border:0px solid red; z-index:2000">
        <div style="position:absolute; top:50%; left:25%">

          <div style="text-align:center">
            <span class="fa fa-refresh fa-spin fa-3x fa-fw"></span>
         <br><br><b>PROCESANDO...</b></div>
         </div>
</div>



    <div id="wrapper">

        <!-- Navigation -->
        <?php include "nav.php" ?>

        <div id="page-wrapper" style="width:2150px">
            <div class="row">&nbsp;
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12" style="width:2150px">
                    <div class="panel panel-default">
                        <div class="panel-heading">
<?php
                              $VAR_ULTFECHA ="";
                              $VAR_CTA = $_GET["cta"];
                              $VAR_EST ="";
                              $VAR_AGE = "";

               //              $sqlf1= "select agen from _transfers where agen <> '' and cta = '".$VAR_CTA."' and estatus='cerrada' group by agen order by agen " ;
                  //           $rsa = adoopenrecordset($sqlf1);
                   //          $rstempa = mysql_fetch_array($rsa);
                   //          $VAR_AGE = $rstempa["agen"];


                                if($_GET["cta"]=="cxc"){ $VAR_TITLE = "CLIENTES - Cuentas por cobrar";}
                                if($_GET["cta"]=="cxp"){ $VAR_TITLE = "PROVEEDORES - Cuentas por pagar";}
                                if($_GET["cta"]=="cor"){ $VAR_TITLE = "Cortesías";}



                                $VAR_DEL = date("Y-m-01");
                                $VAR_AL = date("Y-m-01");

                                $VAR_T2 = "Todos";
                                $VAR_OPE = "Todos";
                                $VAR_ECO = "Todos";
                                $VAR_TIPO = "Todos";
                                $VAR_AGEN = "Todos";
                                $VAR_PRO = "Todos";





                              if(isset($_POST["txtdel"])){ $VAR_DEL = $_POST["txtdel"]; }
                              if(isset($_POST["txtal"])){ $VAR_AL = $_POST["txtal"]; }


                                     // $sqlf="select * from _transfers where num > 0 and date1 >='".$VAR_DEL."'
                                    //  and cta = '".$VAR_CTA."' and  (estatus='cerrada' or estatus='completada' or estatus='cancelada' ) and date1 <='".$VAR_AL."'";

                                      $sqlf="select * from _transfers where num > 0 and date1 >='".$VAR_DEL."'
                                       and date1 <='".$VAR_AL."'";

                                 if(isset($_GET["a"])){ $VAR_AGEN = $_GET["a"]; }
                                 if(isset($_GET["p"])){ $VAR_PRO  = $_GET["p"]; }

                                  if(isset($_POST["txtagen"]))  { $VAR_AGEN = $_GET["a"]; }
                                 if(isset($_POST["txtpro"]))    { $VAR_PRO  = $_GET["p"]; }



                                if(isset($_POST["txtoper"])) {  if($_POST["txtoper"]!="Todos")   { $VAR_OPE = $_POST["txtoper"] ; $sqlf= $sqlf." and oper = '".$_POST["txtoper"]."'";                                }}
                                if(isset($_POST["txtnoec"])) {  if($_POST["txtnoec"]!="Todos")   { $VAR_ECO = $_POST["txtnoec"] ; $sqlf= $sqlf." and noec = '".$_POST["txtnoec"]."'";                                }}
                                if(isset($_POST["txttipo"])) {  if($_POST["txttipo"]!="Todos")   { $VAR_TIPO = $_POST["txttipo"] ; $sqlf= $sqlf." and tipo = '".$_POST["txttipo"]."'";                                }}

                                  if($VAR_AGEN!="Todos")   {


                                                $sqlf= $sqlf." and agen = '".$VAR_AGEN."'";
                                                $VAR_T2 =$VAR_AGEN;

                                                }

                                if(isset($_POST["txtcxp"]))  {  if($_POST["txtcxp"]!="Todos")    { $VAR_CXP = $_POST["txtcxp"] ; $sqlf= $sqlf." and cxp = '".$_POST["txtcxp"]."'";                                }}

                                if($VAR_PRO!="Todos")    {


                                                $sqlf= $sqlf." and (pro_nomb = '".$VAR_PRO."')";
                                                $VAR_T2 =$VAR_PRO;

                                                 }



                                 $VAR_TITLE = $VAR_TITLE." <b>".$VAR_T2."</b>" ;

                                 



                               // if(isset($_POST["txtest"])){  if($_POST["txtest"]!="Todos")   { $VAR_EST = $_POST["txtest"] ; $sqlf= $sqlf." and estatus = '".$_POST["txtest"]."' "; }}
                                //if(isset($_POST["txtage"])){  if($_POST["txtage"]!="Todos")   { $VAR_AGE = $_POST["txtage"] ; $sqlf= $sqlf." and agen = '".$_POST["txtage"]."' "; } }




                                     $sqlf = $sqlf . " order by fechapago, agen, date1, time1, id";




                            $VAR_COBRADO =  montos($VAR_CTA,$VAR_DEL,$VAR_AL,$VAR_AGE,'si');
                            $VAR_PORCOBRAR = montos($VAR_CTA,$VAR_DEL,$VAR_AL,$VAR_AGE,'no');

                            $VAR_COBRADOH =  montos($VAR_CTA, "2000-01-01",(date("Y")+1)."-01-01",$VAR_AGE,'si');
                            $VAR_PORCOBRARH = montos($VAR_CTA,"2000-01-01",(date("Y")+1)."-01-01",$VAR_AGE,'no');
                             //   echo $sqlt;
?>

                           <H2> <?php echo $VAR_TITLE ?></H2>
                        <!--   <table border=1 style="border:1px solid #D9D9D9;font-size:15px">
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td style="background-color:#CCCCCC;padding:2px;text-align:center">
                                <b >
                                <?php
                                    echo  $VAR_AGEN ;
                                ?>
                                </b>
                                </td>
                            </tr>
                            <tr><td><b>&nbsp;Facturado&nbsp;&nbsp;</b></td><td style="text-align:right;background-color:#BEFF9E">$ <?php echo number_format($VAR_COBRADO+$VAR_PORCOBRAR,2)   ?>&nbsp;&nbsp;</td><td>&nbsp;<b>Pagado</b>&nbsp;&nbsp;</td><td style="text-align:right;background-color:#BEFF9E">$ <?php echo number_format($VAR_COBRADO,2)  ?>&nbsp;</td><td>&nbsp;<b>Saldo</b>&nbsp;&nbsp;</td><td  style="text-align:right;background-color:#FF6161">$ <?php echo number_format($VAR_PORCOBRAR,2)  ?>&nbsp;</td><td>&nbsp;<span style="font-size:12px">(del <?php echo $VAR_DEL ?> al <?php echo $VAR_AL ?> )</span></td></tr>
                            <tr><td><b>&nbsp;Facturado&nbsp;&nbsp;</b></td><td style="text-align:right;background-color:#BEFF9E">$ <?php echo number_format($VAR_COBRADOH+$VAR_PORCOBRARH,2) ?>&nbsp;&nbsp;</td><td>&nbsp;<b>Pagado</b>&nbsp;&nbsp;</td><td style="text-align:right;background-color:#BEFF9E">$ <?php echo number_format($VAR_COBRADOH,2) ?>&nbsp;</td><td>&nbsp;<b>Saldo</b>&nbsp;&nbsp;</td><td  style="text-align:right;background-color:#FF6161">$ <?php echo number_format($VAR_PORCOBRARH,2) ?>&nbsp;</td><td>&nbsp;<span style="font-size:12px">(histórico)</span></td></tr>


                           </table>
                         -->


                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                        <div class="col-lg-12" style="padding-bottom:10px" >
                       <div  class="col-lg-12" >
                         <form method="post"  id="formulario" name="formulario">

                         <div class="row col-lg-8"  >
                            <input name="txtrep" id="txtrep" type="hidden">



                             <div class="col-lg-2" >
                                <label>Del</label>
                                <input class="form-control"  name="txtdel" type="date" value="<?php echo $VAR_DEL ?>" />
                            </div>



                            <div class="col-lg-2" >
                                <label>Al</label>
                                <input class="form-control"  name="txtal" type="date" value="<?php echo $VAR_AL ?>" />
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
                                        <select class="form-control"   name="txtoper" >
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








                                        <div class="col-lg-2">
                                            <div class="form-group">
                                                <label>Tipo Servicio</label>
                                                    <select class="form-control"  id="txttipo" name="txttipo">
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
                                        <select class="form-control"   name="txtnoec" >
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


                              <?php if($_GET["cta"]=="cxc"){?>
                                          <!--
                                           <div class="col-lg-2" >
                                                <label>Agencia</label>
                                                <select class="form-control"   name="txtagen" >
                                                  <option value="Todos">Todos</option>
                                                  <option value="" <?php if($VAR_AGEN==""){echo "selected";}?> >Vacios</option>


                                                    <?php
                                                       // $sqlf1= "select agen from _transfers where agen <> '' and cta = '".$VAR_CTA."' and (estatus='cerrada' or estatus='completada' or estatus='cancelada') group by agen order by agen " ;
                                                        $sqlf1= "select * from _clientes order by cli_nomb   " ;
                                                        $rsf1 = adoopenrecordset($sqlf1);
                                                        while($rstempf1 = mysql_fetch_array($rsf1)){
                                                          if($VAR_AGEN==$rstempf1["cli_nomb"]){$VAR_XX = "selected";}else{$VAR_XX="";}
                                                    ?>
                                                         <option  <?php echo $VAR_XX ?> ><?php echo $rstempf1["cli_nomb"] ?></option>
                                                    <?php
                                                        }
                                                    ?>




                                                </select>
                                            </div>
                                           -->


                              <?php } ?>

                               <?php if($_GET["cta"]=="cxp"){?>
                                 <!--
                                    <div class="col-lg-2" >
                                        <label>Proveedor</label>
                                        <select class="form-control"     name="txtpro" >
                                                <option value="Todos">Todos</option>
                                                <option value="" <?php if($VAR_PRO==""){echo "selected";}?> >Vacios</option>
                                    <?php
                                      //  $sqlf1= "select pro_nomb from _transfers where pro_nomb <> ''  group by pro_nomb order by pro_nomb" ;
                                        $sqlf1= "select * from _proveedores  order by pro_nomb" ;
                                        $rsf1 = adoopenrecordset($sqlf1);
                                        while($rstempf1 = mysql_fetch_array($rsf1)){
                                          if($VAR_PRO==$rstempf1["pro_nomb"]){$VAR_XX = "selected";}else{$VAR_XX="";}
                                    ?>
                                         <option <?php echo $VAR_XX ?> ><?php echo $rstempf1["pro_nomb"] ?></option>
                                    <?php   }    ?>
                                        </select>
                                    </div>
                                    -->
                                <?php } ?>

                           <div class="col-lg-12">

                                <div class="col-lg-3"  style="padding-top:10px;border:0px solid red">
                                    <button type="submit"     class="btn btn-primary btn-lg btn-block" >FILTRAR</button>
                                </div>
                           </div>
                           </div>

                          </form>
                        </div>



                                <div class="row"  style="border:0px solid red">
                                  <form method="post" action="impresion-cta.php?cta=<?php echo $VAR_CTA?>" target="_blank" name="frm" >

                                      <div class="col-lg-2"  style="padding-top:10px"><button type="button" onclick="window.frm.action='impresion-cta.php?cta=<?php echo $VAR_CTA?>';window.frm.submit()"     class="btn btn-primary btn-lg btn-block" >Reporte 1</button></div>
                                      <div class="col-lg-2"  style="padding-top:10px"><button type="button" onclick="window.frm.action='impresion-cta-r2.php?cta=<?php echo $VAR_CTA?>';window.frm.submit()"     class="btn btn-primary btn-lg btn-block" >Reporte 2</button></div>

                                              <textarea style="visibility: hidden;height:0px;width:0px" name="txtsql" id="txtsql" cols="0" rows="0"><?php echo $sqlf ?></textarea>
                                              <textarea style="visibility: hidden;height:0px;width:0px" name="txtsql2" id="txtsql2" cols="0" rows="0"><?php
                                              echo
                                              $VAR_DEL  ."|".
                                              $VAR_AL   ."|".
                                              $VAR_AGE  ."|".
                                              $VAR_CTA  ."|";






                                    ?></textarea>
                                </form>
                        </div>
                        </div>
                        <div class="col-lg-12"><hr></div>

                            <table  data-order='[[ 0, "desc" ]]' data-page-length='50' class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th >#</th>
                                        <th>Fecha</th>

                                        <th>Vehículo</th>
                                        <th>#Eco</th>
                                        <th>Placas</th>
                                        <th>Operador</th>
                                     <!--
                                       <?php if($_GET["cta"]=="cxp"){?> <th>Proveedor</th>  <?php } ?>
                                       <?php if($_GET["cta"]=="cxc"){?> <th>Agencia</th>    <?php } ?>
                                     -->
                                       <th>Proveedor</th>
                                       <th>Agencia</th>
                                        <th>Servicio</th>
                                        <th>PAX</th>
                                        <th>Nombre</th>
                                        <th>Hab</th>
                                        <th>Hora</th>
                                        <th>Pick up</th>
                                        <th>Drop off</th>
                                        <th>Vuelo</th>
                                        <th>Cupón</th>
                                        <th>Forma Pago</th>
                                        <th>Cash</th>
                                        <th>Costo</th>
                                        <th>No. Orden de compra</th>
                                        <th>Cve</th>
                                        <th>Facturado</th>
                                        <th>Pagado</th>





                                       <!--

                                       <th>Estatus</th>
                                       <th>Gasolina</th>
                                        <th>Sueldo</th>
                                        <th>Litros</th>
                                        <th>KI</th>
                                        <th>KF</th>
                                        <th>Recorrido</th>
                                        <th>Estimado</th>
                                        <th>Dif. Consumo</th>
                                        <th>Utilidad</th>
                                        <th>Rendimiento</th>
                                        <th>Cve</th>
                                        <th>Comentarios</th>
                                        <th>Coment. Int.</th>


                                        <th>Fecha Pago</th>

                                  -->

                                    </tr>
                                </thead>



                                <tbody>
                                    <?php




                                      $VAR_GCOSTO = 0 ;
                                      $VAR_COSTO = 0;
                                      $VAR_GSINPAGO = 0;
                                      //$VAR_XI = " TOTAL SIN PAGO: ";


                                    //    echo $sqlf;

                                      $rsf = adoopenrecordset($sqlf);
                                      $rstempf = mysql_fetch_array($rsf);
                                      $VAR_FPAGO = $rstempf["fechapago"];


                                      $rsf = adoopenrecordset($sqlf);
                                      while($rstempf = mysql_fetch_array($rsf)){
                                           $VAR_XI ="TOTAL FECHA DE PAGO:&nbsp;&nbsp;&nbsp;".$VAR_FPAGO;

                                          if($VAR_FPAGO!=$rstempf["fechapago"]){
                                                if($VAR_FPAGO=='' ){

                                                     /*
                                                           echo "<tr style='background-color:#FFFF33'>
                                                           <td></td>
                                                           <td></td>
                                                           <td></td>
                                                           <td></td>
                                                           <td></td>
                                                           <td></td>
                                                           <td></td>
                                                           <td></td>
                                                           <td></td>
                                                           <td></td>
                                                           <td></td>
                                                           <td></td>
                                                           <td></td>
                                                           <td></td>
                                                           <td></td>
                                                           <td></td>
                                                           </tr>";
                                                      */

                                                        }else{


                                                              $VAR_GCOSTO = $VAR_GCOSTO + $VAR_COSTO;

                                                            /*
                                                               echo "<tr style='background-color:#FFFF33'>
                                                               <td colspan=16 style='text-align:right'><b>".$VAR_XI."</b></td>
                                                               <td style='text-align:right'><b>".number_format($VAR_COSTO,0)."</b></td>
                                                               <td></td>
                                                               <td></td>
                                                               <td></td>
                                                               <td></td>
                                                               <td></td>
                                                               <td></td>
                                                               <td></td>
                                                               <td></td>
                                                               <td></td>
                                                               <td></td>
                                                               <td></td>
                                                               <td></td>
                                                               <td></td>
                                                               <td></td>
                                                               <td  style='text-align:right'></td>
                                                               </tr>";
                                                             */


                                                            }


                                                 $VAR_FPAGO =$rstempf["fechapago"];
                                                 $VAR_COSTO = 0;



                                          }

                                             $VAR_COSTO =$VAR_COSTO + $rstempf["costo"];

                                        $VAR_COLOR ="";
                                        if($rstempf["estatus"]=="cancelada"){$VAR_COLOR="#FF6161";}
                                        if($rstempf["estatus"]=="completada"){$VAR_COLOR="#BEFF9E";}
                                        if($rstempf["pagado"]=="si"){$VAR_COLOR="#BEFF9E";}

                                      ?>

                                            <tr  id="reng<?php echo $rstempf["id"] ?>" style="width:10px !important; border:0px solid red; cursor:pointer; background-color:<?php echo $VAR_COLOR ?>" >


                                            <td><a href="agregar-servicio.php?t=<?php echo $rstempf["id"] ?>"><?php echo $rstempf["id"] ?></a></td>
                                            <td><?php echo $rstempf["date1"] ?></td>

                                            <td><?php echo $rstempf["tipo_veh"] ?></td>
                                            <td><?php echo $rstempf["noec"] ?></td>
                                            <td><?php echo $rstempf["plac"] ?></td>
                                            <td><?php echo $rstempf["oper"] ?></td>

                                           <!--
                                           <?php if($_GET["cta"]=="cxp"){?> <td><?php echo $rstempf["pro_nomb"] ?></td>                                                 <?php } ?>
                                           <?php if($_GET["cta"]=="cxc"){?> <td style="background-color:;text-align:center"><b><?php echo $rstempf["agen"] ?></b></td> <?php } ?>
                                           -->
                                           <td><?php echo $rstempf["pro_nomb"] ?></td>
                                           <td style="background-color:;text-align:center"><b><?php echo $rstempf["agen"] ?></b></td>

                                            <td><?php echo strtoupper($rstempf["tipo"]) ?></td>
                                            <td><?php echo ($rstempf["adul"].".".$rstempf["chil"].".".$rstempf["enfa"]) ?></td>
                                            <td><?php echo $rstempf["name"] ?></td>
                                            <td><?php echo $rstempf["room"] ?></td>
                                            <td><?php echo $rstempf["time1"] ?></td>
                                            <td><?php echo substr($rstempf["orig1"],0,25) ?></td>
                                            <td><?php echo strtoupper($rstempf["dest1"]) ?></td>
                                            <td><?php echo $rstempf["vuel1"]  ?></td>
                                            <td><input class="form-control" style="text-align:center" type="text" name="cupo" value="<?php echo $rstempf["cupo"] ?>"     id="<?php echo $rstempf["id"] ?>" size=7></td>
                                            <td><input class="form-control" style="text-align:center" type="text" name="formadepago" value="<?php echo $rstempf["formadepago"] ?>"     id="<?php echo $rstempf["id"] ?>" size=7></td>
                                            <td><input class="form-control ceros" style="text-align:center" type="text" name="cash" value="<?php echo $rstempf["cash"] ?>"     id="<?php echo $rstempf["id"] ?>" size=7></td>
                                            <td style="text-align:right"><?php echo number_format($rstempf["costo"],2)     ?> </td>
                                            <td><input class="form-control" style="text-align:center" type="text" name="noord" value="<?php echo $rstempf["noord"] ?>"     id="<?php echo $rstempf["id"] ?>" size=7></td>
                                            <td>CC<?php echo $rstempf["cve"]  ?>BB<?php echo $rstempf["cve2"]  ?></td>


                                            <!--
                                            <td style="text-align:center; text-transform: uppercase"><b><?php echo strtoupper($rstempf["estatus"])  ?></b></td>

                                            <td><input type="text" name="costo"     value="<?php echo $rstempf["costo"] ?>"      id="<?php echo $rstempf["id"] ?>" size=7></td>
                                            <td><input type="text" name="gasolina"  value="<?php echo $rstempf["gasolina"] ?>"   id="<?php echo $rstempf["id"] ?>" size=7></td>
                                            <td><input type="text" name="sueldo"    value="<?php echo $rstempf["sueldo"] ?>"     id="<?php echo $rstempf["id"] ?>" size=7></td>
                                            <td><input type="text" name="litros"    value="<?php echo $rstempf["litros"] ?>"     id="<?php echo $rstempf["id"] ?>" size=7></td>
                                            <td><input type="text" name="ki"        value="<?php echo $rstempf["ki"] ?>"     id="<?php echo $rstempf["id"] ?>" size=7></td>
                                            <td><input type="text" name="kf"        value="<?php echo $rstempf["kf"] ?>"     id="<?php echo $rstempf["id"] ?>" size=7></td>
                                            <td><input type="text" name="estimado"  value="<?php echo $rstempf["estimado"] ?>"     id="<?php echo $rstempf["id"] ?>" size=7></td>
                                            -->



                                            <!--<td style="text-align:center"><input style="text-align:center" type="text" name="costo"     value="<?php echo $rstempf["costo"] ?>"       id="<?php echo $rstempf["id"] ?>" size=7></td>-->

                                           <!--
                                            <td style="text-align:right"><?php echo number_format($rstempf["gasolina"],2)  ?> </td>
                                            <td style="text-align:right"><?php echo number_format($rstempf["sueldo"],2)    ?> </td>
                                            <td style="text-align:right"><?php echo number_format($rstempf["litros"],2)    ?> </td>
                                            <td style="text-align:right"><?php echo number_format($rstempf["ki"],2)        ?> </td>
                                            <td style="text-align:right"><?php echo number_format($rstempf["kf"],2)        ?> </td>
                                            <td style="text-align:right"><?php echo number_format($rstempf["kf"]-$rstempf["ki"],2)        ?> </td>
                                            <td style="text-align:right"><?php echo number_format($rstempf["estimado"],2)  ?> </td>
                                            <td style="text-align:right"><?php echo number_format($rstempf["gasolina"]-$rstempf["estimado"],2)  ?> </td>
                                            <td style="text-align:right"><?php echo number_format($rstempf["costo"]-$rstempf["gasolina"]-$rstempf["sueldo"],2)  ?> </td>
                                            <td style="text-align:right"><?php echo number_format($rstempf["gasolina"]-($rstempf["kf"]-$rstempf["ki"]),2)  ?> </td>


                                             <td>CC<?php echo $rstempf["cve"]  ?>BB<?php echo $rstempf["cve2"]  ?></td>
                                             <td><?php echo $rstempf["come"]  ?></td>
                                             <td><input class="form-control" style="text-align:center" type="text" name="com2" value="<?php echo $rstempf["com2"] ?>"     id="<?php echo $rstempf["id"] ?>" size=7></td>

                                            <td><input class="form-control" type="date" style="width:150px" name="fechapago" value="<?php echo $rstempf["fechapago"] ?>"     id="<?php echo $rstempf["id"] ?>" size=7></td>

                                       <td style="text-align:Center">

                                             <table><tr>
                                            <?php if($rstempf["paga"]=="si"){echo " <td>&nbsp;<span title='Pagado' class='fa fa-dollar'></span>&nbsp;</td>";} ?>
                                            <?php if($rstempf["oper"]!=""){echo "   <td>&nbsp;<span title='".$rstempf["oper"]."' class='fa fa-bus'></span>&nbsp;</td>";} ?>

                                             </tr>  </table>




                                            </td>
                                                 -->



                                           <td>    <!-- FACTURADO -->
                                                <select class="form-control" name="pag2" id="<?php echo $rstempf["id"] ?>"  >
                                                    <option value="no" <?php if($rstempf["pag2"]=="no"){echo "selected";} ?> >No</option>
                                                    <option value="si" <?php if($rstempf["pag2"]=="si"){echo "selected";} ?> >Si</option>
                                                </select>

                                            </td>

                                            <td>
                                                <select class="form-control" name="pagado" id="<?php echo $rstempf["id"] ?>"  >
                                                    <option value="no" <?php if($rstempf["pagado"]=="no"){echo "selected";} ?> >No</option>
                                                    <option value="si" <?php if($rstempf["pagado"]=="si"){echo "selected";} ?> >Si</option>
                                                </select>

                                            </td>



                                        </tr>


                                  <?php
                                        $VAR_ULTFECHA = $rstempf["fechapago"];

                                      }

                                           /*
                                                 echo "<tr style='background-color:#FFFF33'>
                                                 <td colspan=16 style='text-align:right'><b>TOTAL FECHA PAGADO:".$VAR_ULTFECHA."</b></td>
                                                 <td style='text-align:right'><b>".number_format($VAR_COSTO,0)."</b></td>
                                                 <td colspan=8></td></tr>";

                                                 $VAR_GCOSTO = $VAR_GCOSTO + $VAR_COSTO;

                                                 $VAR_FPAGO =$rstempf["fechapago"];


                                                 $VAR_COSTO = 0;


                                                 echo "<tr style='background-color:#FFFF33'>
                                                 <td colspan=16 style='text-align:right'><b>TOTAL PAGADO</b></td>
                                                 <td style='text-align:right'><b>".number_format($VAR_COBRADO,0)."</b></td>
                                                 <td colspan=8></td></tr>";



                                                echo "<tr style='background-color:#FFFF33'>

                                                 <td colspan=16 style='text-align:right'><b>TOTAL SIN PAGO</b></td>
                                                 <td style='text-align:right'><b>".number_format($VAR_PORCOBRAR,0)."</b></td>
                                                 <td colspan=8></td>

                                                 </tr>";
                                           */

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


        $('#dataTables-example').DataTable({

            bSort:false ,
 "columnDefs": [
                { "width": "20px", "targets":0  },
                { "width": "10px", "targets":1  },
                { "width": "10px", "targets":2  },
                { "width": "20px", "targets":3  },
                { "width": "20px", "targets":4  },
                { "width": "100px", "targets": 5 },
                { "width": "20px", "targets": 6 },
                { "width": "20px", "targets": 7 },
                { "width": "20px", "targets": 8 },
                { "width": "100px", "targets": 9 },
                { "width": "100px", "targets": 10 },
                { "width": "100px", "targets": 11},
                { "width": "100px", "targets": 12},
                { "width": "100px", "targets": 13},
                { "width": "100px", "targets": 14},
                { "width": "100px", "targets": 15}
              ],


        });
     //        alert();


             $('#cober').hide();


    });




      $( "#pagadodos" ).click(
      function() {
        alert( "Handler for .change() called." );
           alertify.success("Servicios Guardados!!");
      });




    $("#guardar").click(
        function() {

            window.scrollTo(0, 0);
            $('#cober').show();

            $('input[name^="cupo"]').each(function() {
                var arch = 'update-operador.php?c=cupo&val='+$(this).val()+'&i='+$(this).attr('id');
               // alert(arch);
                $.get(arch);
            });

            $('input[name^="noord"]').each(function() {
                var arch = 'update-operador.php?c=noord&val='+$(this).val()+'&i='+$(this).attr('id');
               // alert(arch);
                $.get(arch);
            });


            $('input[name^="cash"]').each(function() {
                var arch = 'update-operador.php?c=cash&val='+$(this).val()+'&i='+$(this).attr('id');
               // alert(arch);
                $.get(arch);
            });


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
              if($(this).val()=="si"){
                $("#reng"+$(this).attr('id')).css('background-color', '#D4FFA8');
              }else{
                $("#reng"+$(this).attr('id')).css('background-color', '');
              }

            });



            $('select[name^="pag2"]').each(function() {
                var arch = 'update-operador.php?c=pag2&val='+$(this).val()+'&i='+$(this).attr('id');
                 $.get(arch);
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

            $('input[name^="com2"]').each(function() {
                var arch = 'update-operador.php?c=com2&val='+$(this).val()+'&i='+$(this).attr('id');
               // alert(arch);
                $.get(arch);
            });



            $('input[name^="fechapago"]').each(function() {
                var arch = 'update-operador.php?c=fechapago&val='+$(this).val()+'&i='+$(this).attr('id');
               // alert(arch);
                $.get(arch);
            });

                   alertify.success("Servicios Guardados!!");
                 //  setTimeout(location.reload.bind(location), 1500);



                   var timeoutId = setTimeout(function(){
                       $('#cober').hide()
                    },15000);

         }

    );






    </script>

</body>

</html>
