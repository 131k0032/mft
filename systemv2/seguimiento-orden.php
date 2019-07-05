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

    <!-- jquery editable menu -->

    <link href="//rawgithub.com/indrimuska/jquery-editable-select/master/dist/jquery-editable-select.min.css" rel="stylesheet">

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

        <div id="page-wrapper" style="width:2200px">
            <div class="row">&nbsp;
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12" style="width:2200px">
                    <div class="panel panel-default">
                        <div class="panel-heading">
<?php
                            //boton cerrar en lotes
                        if(isset($_POST["btncrrarord"])){
                            // echo $_POST["txtdate"];
                            // echo "<br>";
                            // echo $_POST["txthor1"];
                            // echo "<br>";
                            // echo $_POST["txttime2"];

                                if ($_POST["txthor1"] >= $_POST["txttime2"] ) {
                                    echo '<script type="text/javascript">alert("Por favor revisa las horas especificadas");</script>';
                                }

                                if ($_POST["txthor1"] < $_POST["txttime2"] ) {
                                    $sql= "UPDATE _transfers SET estatus = 'terminada' WHERE TIME1 BETWEEN  '{$_POST["txthor1"]}' AND '{$_POST["txttime2"]}' AND DATE1 = '{$_POST["txtdate"]}' AND estatus = 'abierta'  ";

                                    //echo $sql;
                                     adoexecute($sql);

                                     $sql= null;
                                }
                        } 





                              // julio insertar inicio boton bestday


                               //VARIABLES
                               //$_POST['txtfecha']  || FECHA
                               //$_POST['txtagen']  || AGENCIA
                               //$_POST['txttipo1']  || TIPO SERVICIO
                               //$_POST['txthora']  || HORA NOTA: TEXT HORA ESTA DESHABILITADO
                               //$_POST['txtorig1']  || PICKUP LOCATION
                               //$_POST['txtdest1']  || DROPOFF LOCATION
                                

                               if(isset($_POST["btninsertarbd"])){

                                if ($_POST["txttipo1"]=='ll') {
                                    $VAR_ORIG = $_POST["pickup"];
                                    $VAR_DEST = $_POST["txtdest1"];
                                }

                                if ($_POST["txttipo1"]=='sl') {
                                    $VAR_ORIG = $_POST["txtorig1"];
                                    $VAR_DEST = $_POST["pickup"];
                                }
                                $VAR_PROV= "";
                                if (isset($_POST["txtplac"])) {
                                $VAR_PLAC = $_POST["txtplac"];
                                }
                                if (isset($_POST["txteco"])) {
                                $VAR_ECO = $_POST["txteco"];
                                }
                                if (isset($_POST["STD"])) {
                                    $VAR_PROV= $_POST["STD"];
                                    $VAR_PLAC = "|";
                                    $VAR_ECO = "|";

                                }
                                $VAR_NUM = time();
                                $VAR_NULL = "";
                                $VAR_CONSEC =   consecutivo($_POST["txtfecha"]);
                                $VAR_COMENT = 'ORDEN EN VIVO'; 
                                $VAR_STATUS = 'abierta';                                    
                                
                                  $sql="insert into _transfers  (
                                             num,
                                             date1,
                                             agen,
                                             tipo,
                                             adul,
                                             chil,
                                             enfa,
                                             name,
                                             email,
                                             room,
                                             time1,
                                             orig1,
                                             dest1,
                                             vuel1,
                                             cta,
                                             cve,
                                             cve2,
                                             come,
                                             consec,
                                             usuario,
                                             tipo_veh,
                                             formadepago,
                                             pro_nomb,
                                             oper,
                                             plac,
                                             noec,
                                             cupo,
                                             costo,
                                             com2,
                                             estatus

                                             )
                                                values (
                                             '".$VAR_NUM."', 
                                            '".$_POST['txtfecha']."', 
                                            '".$_POST["txtagen"]."',
                                            '".$_POST["txttipo1"]."',
                                            '".$_POST['txtadul']."', 
                                            '".$_POST['txtchil']."', 
                                            '".$_POST['txtenfa']."', 
                                            '".$VAR_NULL."',
                                            '".$VAR_NULL."',
                                            '".$VAR_NULL."',
                                            '".$_POST["txttime1"]."',
                                            '".$VAR_ORIG."', 
                                            '".$VAR_DEST."', 
                                            '".$VAR_NULL."',
                                            '".$VAR_NULL."',
                                            '".$VAR_NULL."',
                                            '".$VAR_NULL."',
                                            '".$VAR_COMENT."',
                                            '".$VAR_NULL."',
                                            '".$VAR_NULL."',
                                            '".$_POST["txttipov"]."',
                                            '".$VAR_NULL."', 
                                            '".$VAR_PROV."',
                                            '".$_POST["txtoperf1"]."', 
                                            '".$VAR_PLAC."',
                                            '".$VAR_ECO."',
                                            '".$VAR_NULL."',
                                            '".$VAR_NULL."',
                                            '".$_POST["txtfolio"]."',
                                             '".$VAR_STATUS."'
                                            )";
                                             //ECHO "<br>01 - ".$sql;
                                            adoexecute($sql);

                                        ////echo '<script type="text/javascript">alert("'.'asdasd'.'");</script>';
                                            $sql = null;
                                               
                                           if ($sql == null) 
                                                {
                                                    $message = "User updated Sussesfully!";
                                                    echo '<meta http-equiv="refresh" content="0">';
                                                 }
                                                else 
                                                {
                                                    echo '<meta http-equiv="refresh" content="0">';
                                                }

                                     


                               }


                                // julio insertar fin boton bestday

                                $VAR_AL ="";
                                $VAR_EST ="Todos";

                                $VAR_DEL = date("Y-m-d");
                                $VAR_OPE = "Todos";
                                $VAR_TIP = "Todos";
                                $VAR_AGEN = "Todos";
                                $VAR_NOEC = "Todos";



                                if(isset($_POST["txtdel"])){ $VAR_DEL = $_POST["txtdel"]; }
                                $sqlf="select * from _transfers where num > 0 and date1 ='".$VAR_DEL."' ";
                                if(isset($_POST["txtoper"])){  if($_POST["txtoper"]!="Todos")   { $VAR_OPE = $_POST["txtoper"] ; $sqlf= $sqlf." and (oper = '".$_POST["txtoper"]."' ) "; }}
                                if(isset($_POST["txttipo"])){  if($_POST["txttipo"]!="Todos")   { $VAR_TIP = $_POST["txttipo"] ; $sqlf= $sqlf." and tipo = '".$_POST["txttipo"]."'  "; }}
                                if(isset($_POST["txtagen"])){  if($_POST["txtagen"]!="Todos")   { $VAR_AGEN = $_POST["txtagen"] ; $sqlf= $sqlf." and agen = '".$_POST["txtagen"]."'  "; }}
                                if(isset($_POST["txtnoec"])){  if($_POST["txtnoec"]!="Todos")   { $VAR_NOEC = $_POST["txtnoec"] ; $sqlf= $sqlf." and noec = '".$_POST["txtnoec"]."'  "; }}

                                $sqlf = $sqlf . " order by date1, time1, id";
                                //  echo $sqlf;

                               if(isset($_POST["txtacc"])){

                                    if($_POST["txtacc"]=="cerrarall"){

                                          $sqlc="update   _transfers set estatus ='cerrada' where  estatus = 'abierta' and num > 0 and date1 ='".$_POST["txtdel"]."' ";
                                          if(isset($_POST["txtoper"])){  if($_POST["txtoper"]!="Todos")   {   $sqlc= $sqlc." and (oper = '".$_POST["txtoper"]."' ) "; }}
                                          if(isset($_POST["txttipo"])){  if($_POST["txttipo"]!="Todos")   {   $sqlc= $sqlc." and tipo = '".$_POST["txttipo"]."'  "; }}
                                          if(isset($_POST["txtagen"])){  if($_POST["txtagen"]!="Todos")   {   $sqlc= $sqlc." and agen = '".$_POST["txtagen"]."'  "; }}
                                          if(isset($_POST["txtnoec"])){  if($_POST["txtnoec"]!="Todos")   {   $sqlc= $sqlc." and noec = '".$_POST["txtnoec"]."'  "; }}

                                        // echo $sqlc;

                                        adoexecute($sqlc);
                                        

                                    }

                               }



?>

                           <H2> ORDENES DE SERVICIO</H2>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">

                        <div class="col-lg-8" style="padding-bottom:10px" >

                        <div class="row">
                        <form method="post"  id="formulario" name="formulario">
                            <input name="txtrep" id="txtrep" type="hidden">
                            <input name="txtacc" id="txtacc" type="hidden">


                            <div class="col-lg-2" >
                                <label>Fecha</label>
                                <input class="form-control"   name="txtdel" type="date" value="<?php echo $VAR_DEL ?>" />
                            </div>



                             <?php

                                $sqlf1= "select oper from _transfers where oper <> '' and date1 = '".$VAR_DEL."'  group by oper order by oper" ;


                                 ?>
                                    <div class="col-lg-2" >
                                        <label>Operador</label>
                                        <select class="form-control"     name="txtoper" >
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
                                        <select class="form-control"   name="txtagen" >
                                               <option value="Todos">Todos</option>
                                               <option value="" <?php if($VAR_AGEN==""){echo "selected";}?> >Vacios</option>
                                    <?php
                                        $sqlf1= "select * from _clientes order by cli_nomb " ;
                                        $rsf1 = adoopenrecordset($sqlf1);
                                        while($rstempf1 = mysql_fetch_array($rsf1)){
                                          if($VAR_AGEN==$rstempf1["cli_nomb"]){$VAR_XX = "selected";}else{$VAR_XX="";}
                                    ?>
                                         <option <?php echo $VAR_XX ?> ><?php echo $rstempf1["cli_nomb"] ?></option>
                                    <?php   }  ?>

                                        </select>
                                    </div>



                                        <div class="col-lg-2">
                                            <div class="form-group">
                                                <label>Tipo Servicio</label>
                                                    <select class="form-control"   id="txttipo" name="txttipo">
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
                                        <!-- julio prueba descomentar si no funciona -->
                                   <!--  <div class="col-lg-2" >
                                        <label>No. Eco</label>
                                        <select class="form-control"   name="txtnoec" >
                                               <option>Todos</option>
                                    <?php
                                        // $sqlf1= "select noec from _transfers where noec <> ''  and date1 = '".$VAR_DEL."' group by noec order by noec" ;
                                        // $rsf1 = adoopenrecordset($sqlf1);
                                        // while($rstempf1 = mysql_fetch_array($rsf1)){
                                        //   if($VAR_NOEC==$rstempf1["noec"]){$VAR_XX = "selected";}else{$VAR_XX="";}
                                    ?>
                                         <option <?php //echo $VAR_XX ?> ><?php //echo $rstempf1["noec"] ?></option>
                                    <?php
                                        //}
                                    ?>


                                        </select>
                                    </div>

 -->


                             <!--
                            <div class="col-lg-2" >
                                <label>Al</label>
                                <input class="form-control" onchange="document.formulario.submit()" name="txtal" type="date" value="<?php echo $VAR_AL ?>" />
                            </div>
                                -->

                                <!--
                            <div class="col-lg-2" >
                                <label>Estatus</label>
                                <select class="form-control" onchange="document.formulario.submit()"   name="txtest" >


                                    <option <?php if($VAR_EST=="Todos"){echo "selected"; }?> value="" >Todos</option>
                                    <option <?php if($VAR_EST=="abierta"){echo "selected"; }?> value="abierta" >Abierta</option>


                                    <option <?php if($VAR_EST=="cerrada"){echo "selected"; }?> value="cerrada" >Cerrada</option>

                                </select>
                            </div>
                               -->
                               <div class="col-lg-12">
                                <div class="col-lg-6">
                                    <div class="col-lg-4"><button style=" display:  inline !important" type="submit" class="btn btn-primary btn-lg btn-block" >Filtrar</button></div>
                                    <div class="col-lg-7"><button style=" display:  inline !important" type="button"  name="btncerrarall" id="btncerrarall" class="btn btn-success btn-lg btn-block" ><li class="fa fa-check"></li> Cerrar todas las órdenes</button></div>
                                </div>
                                <!-- cerrar ordenes por tiempo boton -->
                                    <div class="col-lg-3"><button style=" display:  inline !important" type="button"  name="btncerrartmpo" id="btncerrartmpo" class="btn btn-info btn-lg btn-block btncerrartmpo" ><li class="fa fa-clock-o"></li> Cerrar ordenes por tiempo</button></div>

                               </div>

                          </form>
                          </div>

                                <!-- cerrar orden tiempo hidden -->
                                <div id="cober3" style="  visibility:hidden               ;top:-150px  ; background-color:#FFF  ;width:900px ;border:2px solid silver; padding:10px; margin:10px ; position: absolute; z-index: 1200" class="row">

                                <form method="post"  id="frmcerrar" name="frmcerrar" role="form">
                                    <div class="col-md-12" style="text-align:right; padding-bottom:10px;border-bottom:1px solid silver; margin-bottom:10px ">
                                        <button id="btncerrart" type="button" class="fa fa-times btn btn-danger" ></button>
                                </div>

                                    <!-- Hora inicio -->

                                    <div class="col-lg-12">
                                            <div class="form-group">
                                                <div class="col-lg-4" >
                                                    <label>¿De que fecha deseas cerrar?</label>
                                                    <input class="form-control"   name="txtdate" type="date" value="<?php echo $VAR_DEL ?>" />
                                                </div>
                                                <!-- Hora inicio -->
                                                <div class="col-lg-4" >
                                                <label>¿Desde que hora deseas cerrar?</label>
                                                <input class="form-control" value="00:00" required type="hidden" name="txthor1" id="txthor1"  pattern="([01]?[0-9]|2[0-3]):[0-5][0-9]" placeholder="hh:mm"  >
                                                <table>
                                                    <tr>
                                                        <td>
                                                          <select name="txthors" onchange="document.frmcerrar.txthor1.value=document.frmcerrar.txthors.value+':'+document.frmcerrar.txtmin1.value" class="form-control" style="width:70px" >
                                                              <option>00</option>
                                                              <option>01</option>
                                                              <option>02</option>
                                                              <option>03</option>
                                                              <option>04</option>
                                                              <option>05</option>
                                                              <option>06</option>
                                                              <option>07</option>
                                                              <option>08</option>
                                                              <option>09</option>
                                                              <option>10</option>
                                                              <option>11</option>
                                                              <option>12</option>
                                                              <option>13</option>
                                                              <option>14</option>
                                                              <option>15</option>
                                                              <option>16</option>
                                                              <option>17</option>
                                                              <option>18</option>
                                                              <option>19</option>
                                                              <option>20</option>
                                                              <option>21</option>
                                                              <option>22</option>
                                                              <option>23</option>
                                                          </select>
                                                        </td>
                                                        <td>&nbsp;:&nbsp;</td>
                                                        <td>
                                                            <select name="txtmin1" onchange="document.frmcerrar.txthor1.value=document.frmcerrar.txthors.value+':'+document.frmcerrar.txtmin1.value" class="form-control"  style="width:70px" >

                                                                <?php
                                                                    $i=0;
                                                                    while($i<=59){
                                                               ?>
                                                                    <option><?php echo substr("00".$i,-2) ?></option>
                                                                <?php $i = $i  +1 ;
                                                                } ?>

                                                            </select>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>

                                                <!-- Hora fin -->
                                                <div class="col-lg-4" >
                                                <label>¿Hasta que hora deseas cerrar?</label>
                                                <input class="form-control" value="00:00" required type="hidden" name="txttime2" id="txttime2"  pattern="([01]?[0-9]|2[0-3]):[0-5][0-9]" placeholder="hh:mm"  >
                                                <table>
                                                    <tr>
                                                        <td>
                                                          <select name="txthor" onchange="document.frmcerrar.txttime2.value=document.frmcerrar.txthor.value+':'+document.frmcerrar.txtmin2.value" class="form-control" style="width:70px" >
                                                              <option>00</option>
                                                              <option>01</option>
                                                              <option>02</option>
                                                              <option>03</option>
                                                              <option>04</option>
                                                              <option>05</option>
                                                              <option>06</option>
                                                              <option>07</option>
                                                              <option>08</option>
                                                              <option>09</option>
                                                              <option>10</option>
                                                              <option>11</option>
                                                              <option>12</option>
                                                              <option>13</option>
                                                              <option>14</option>
                                                              <option>15</option>
                                                              <option>16</option>
                                                              <option>17</option>
                                                              <option>18</option>
                                                              <option>19</option>
                                                              <option>20</option>
                                                              <option>21</option>
                                                              <option>22</option>
                                                              <option>23</option>
                                                          </select>
                                                        </td>
                                                        <td>&nbsp;:&nbsp;</td>
                                                        <td>
                                                            <select name="txtmin2" onchange="document.frmcerrar.txttime2.value=document.frmcerrar.txthor.value+':'+document.frmcerrar.txtmin2.value" class="form-control"  style="width:70px" >

                                                                <?php
                                                                    $i=0;
                                                                    while($i<=59){
                                                               ?>
                                                                    <option><?php echo substr("00".$i,-2) ?></option>
                                                                <?php $i = $i  +1 ;
                                                                } ?>

                                                            </select>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>

                                            </div>
                                       </div>
                                   <!-- Hora inicio fin -->

                                  <!-- Boton actualizar ordenes inicio -->

                                   <div class="col-lg-12" style="text-align:center;margin-top: 20px;">
                                       <button class="btn btn-primary" id="btncrrarord" name="btncrrarord"  >CERRAR ORDENES POR TIEMPO</button>
                                    </div>
                                    <!-- Boton actualizar ordenes fin -->
                                </form>
                                    </div>





                                                    <!-- important post julio -->
                         <div class="row" style="border:0px solid red">
                            <form method="post" action="impresion-cierre-orden.php" target="_blank" >

                                <div class="col-lg-2"  style="padding-top:10px">
                                <fieldset style="border:1px solid silver; padding:2px; ; width:300%">
                                    <div style="float:left;width:50%;padding:2px">
                                        <button style=" display:  inline !important" type="submit" class="btn btn-primary btn-lg btn-block" >Imprimir  </button>
                                    </div>
                                    <div style="float:left;width:50%;padding:2px; vertical-align: middle">
                                        <label for="txtoper">Operador</label>
                                        <input list="txtoper" class="form-control" name="txtoper" style=" display:  inline !important" >
                                         <datalist id="txtoper">
                                                <option value="Todos">Todos</option>
                                                <option value="">Vacios</option>
                                                <?php
                                                    $sql = "select oper from _transfers group by oper order by oper ";
                                                    $rs = adoopenrecordset($sql);
                                                    while($rstemp = mysql_fetch_array($rs)){
                                                        ?>
                                                            <option value="<?php echo $rstemp["oper"] ?>"><?php echo $rstemp["oper"] ?></option>
                                                <?php
                                                    }
                                                ?>
                                        </datalist>
                                    </div>
                                     <div class="col-lg-2" style=" padding-left: 0px; padding-right: 0px; " >
                                        <label>No. Eco</label>
                                        <select class="form-control"   name="txtnoec" >
                                               <option>Todos</option>
                                    <?php
                                        // $sqlf1= "select noec from _transfers where noec <> ''  and date1 = '".$VAR_DEL."' group by noec order by noec" ;
                                        $sqlf1= "select veh_noec from _vehiculos" ;
                                        $rsf1 = adoopenrecordset($sqlf1);
                                        while($rstempf1 = mysql_fetch_array($rsf1)){
                                          if($VAR_NOEC==$rstempf1["veh_noec"]){$VAR_XX = "selected";}else{$VAR_XX="";}
                                    ?>
                                         <option <?php echo $VAR_XX ?> ><?php echo $rstempf1["veh_noec"] ?></option>
                                    <?php
                                        }
                                    ?>


                                        </select>
                                    </div>

                                </fieldset>

                              </div>
                                        <textarea style="visibility: hidden;height:0px;width:0px" name="txtsql" id="txtsql" cols="0" rows="0"><?php echo $sqlf ?></textarea>
                                        <textarea style="visibility: hidden;height:0px;width:0px" name="txtsql2" id="txtsql2" cols="0" rows="0"><?php
                                        echo
                                        $VAR_DEL  ."|".
                                        $VAR_AL   ."|".
                                        $VAR_EST  ."|"
                                         ?></textarea>
                            </form>

                          </div>

                       <!--  </div> -->

                        <br>
                        <!-- julio Boton BestDay -->

                        
                            <div id="cober2" style="  visibility:hidden               ;top:-150px  ; background-color:#FFF  ;width:900px ;border:2px solid silver; padding:10px; margin:10px ; position: absolute; z-index: 1200" class="row">

                                <form method="post"  id="frm" name="frm" role="form">

                                <div class="col-md-12" style="text-align:right; padding-bottom:10px;border-bottom:1px solid silver; margin-bottom:10px ">
                                        <button id="btncerrar" type="button" class="fa fa-times btn btn-danger" ></button>
                                </div>
                                <!-- fecha inicio -->
                                <div class="col-lg-4" >
                                  <label>Fecha</label>

                                  <input class="form-control"   name="txtfecha" type="date" value="<?php echo date("Y-m-d");?>" readonly />
                                </div>

                                <!-- fecha fin -->


                                <!-- agencia inicio -->
                                 <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Agencia</label>
                                                    <select class="form-control" id="txtagen"  name="txtagen" readonly>
                                                                <?php
                                                                    $sql = "select * from _clientes where cli_nomb='Best Day'";
                                                                    $rs = adoopenrecordset($sql);
                                                                    while($rstemp = mysql_fetch_array($rs)){
                                                                        ?>
                                                                            <option <?php if($VAR_AGEN == $rstemp["cli_nomb"]){ echo "selected"; }?>   value="<?php echo $rstemp["cli_nomb"] ?>"><?php echo $rstemp["cli_nomb"] ?></option>
                                                                <?php
                                                                    }
                                                                ?>
                                                    </select>
                                            </div>
                                  </div>
                                  <!-- agencia fin -->

                                  <!-- Tipo servicio inicio -->
                                   <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Tipo Servicio</label>
                                                    <select class="form-control" id="txttipo1" name="txttipo1">
                                                          <option value="Todos" >Todos</option>
                                                          <option value="ll"    >LL - Llegada</option>
                                                          <option value="sl"    >SL - Salida</option>
                                                          <option value="tr"    >TR - Transfer</option>
                                                          <option value="ow"    >OW - One Way</option>
                                                          <option value="rt"    >RT - Round Trip</option>
                                                          <option value="tour"  >TOUR - Tour</option>
                                                          <option value="sa"    >SA - Servicio Abierto</option>
                                                          <option value="cir"   >CIR - Circuito</option>
                                                    </select>
                                            </div>
                                   </div>
                                   <!-- Tipo servicio fin -->

                                   <!-- Pick up inicio -->

                                                                                  <div class="col-lg-6">
                                                      <div class="form-group">
                                                          <label>Pickup location</label>
                                                          <select class="form-control" required name="txtorig1" id="txtorig1">

                                                             <optgroup label="Airports">              <?php  listado("airport-cancun"       ,$VAR_DEST1); ?>      </optgroup>
                                                             <optgroup label="Cancun Hotels">         <?php  listado("hotel-cancun"   ,$VAR_DEST1); ?> </optgroup>
                                                             <optgroup label="Riviera Maya Hotels">   <?php  listado("hotel-riv-maya" ,$VAR_DEST1); ?> </optgroup>
                                                             <optgroup label="Riviera Maya Hotels">   <?php  listado("hotel-riviera-maya" ,$VAR_DEST1); ?> </optgroup>
                                                             <optgroup label="Tulum Hotels">          <?php  listado("hotel-tulum"    ,$VAR_DEST1); ?> </optgroup>
                                                             <optgroup label="PDC Hotels">          <?php  listado("hotel-pdc"    ,$VAR_DEST1); ?> </optgroup>
                                                             <optgroup label="Playacar Hotels">          <?php  listado("hotel-playacar"    ,$VAR_DEST1); ?> </optgroup>
                                                             <optgroup label="Flamengo Hotels">          <?php  listado("hotel-flamengo"    ,$VAR_DEST1); ?> </optgroup>
                                                             <optgroup label="Puerto Aventuras Hotels">          <?php  listado("hotel-puerto-aventuras"    ,$VAR_DEST1); ?> </optgroup>
                                                             <optgroup label="Puerto Morelos Hotels">          <?php  listado("hotel-puerto-morelos"    ,$VAR_DEST1); ?> </optgroup>


                                                          </select>
                                                        <!-- input hidden valor pickup -->
                                                           <input type="hidden" id="pickup" name="pickup"  value="unassigned"/>
                                                      </div>

                                                      
                                                      

                                              </div>
                                              <div class="col-lg-6">
                                                      <div class="form-group">
                                                          <label>Drop off location / Tour</label>
                                                          <select class="form-control" required name="txtdest1" id="txtdest1">

                                                            <optgroup label="Airports">              <?php  listado("airport-cancun"       ,$VAR_DEST1); ?>      </optgroup>
                                                             <optgroup label="Cancun Hotels">         <?php  listado("hotel-cancun"   ,$VAR_DEST1); ?> </optgroup>
                                                             <optgroup label="Riviera Maya Hotels">   <?php  listado("hotel-riv-maya" ,$VAR_DEST1); ?> </optgroup>
                                                             <optgroup label="Riviera Maya Hotels">   <?php  listado("hotel-riviera-maya" ,$VAR_DEST1); ?> </optgroup>
                                                             <optgroup label="Tulum Hotels">          <?php  listado("hotel-tulum"    ,$VAR_DEST1); ?> </optgroup>
                                                             <optgroup label="PDC Hotels">          <?php  listado("hotel-pdc"    ,$VAR_DEST1); ?> </optgroup>
                                                             <optgroup label="Playacar Hotels">          <?php  listado("hotel-playacar"    ,$VAR_DEST1); ?> </optgroup>
                                                             <optgroup label="Flamengo Hotels">          <?php  listado("hotel-flamengo"    ,$VAR_DEST1); ?> </optgroup>
                                                             <optgroup label="Puerto Aventuras Hotels">          <?php  listado("hotel-puerto-aventuras"    ,$VAR_DEST1); ?> </optgroup>
                                                             <optgroup label="Puerto Morelos Hotels">          <?php  listado("hotel-puerto-morelos"    ,$VAR_DEST1); ?> </optgroup>

                                                             <optgroup label="Tours">
                                                                     <?php
                                                                        mft_combo_tours($VAL)
                                                                     ?>

                                                             </optgroup>
                                                          </select>
                                                      </div>
                                              </div>

                                   <!-- Drop off fin -->

                                   <!-- Hora inicio -->
                                   <?php $VAR_HORA =date('H:i'); ?>
                                          <div class="col-lg-3">
                                            <div class="form-group">
                                                <label>Hora de captura</label>
                                                <input type="text" name="txthora" id="txthora" value="<?php echo $VAR_HORA ; ?>" disabled>

                                            </div>
                                        </div>
                                   <!-- Hora fin -->

                                   <!-- operador inicio -->

                                   <div class="col-lg-3" >

                                        <label>Operador</label>
                                        <select class="form-control"     name="txtoperf1" >
                                            <!--
                                               <option value="Todos">Todos</option>
                                               <option value="" <?php if($VAR_OPE==""){echo "selected";}?> >Vacios</option>
                                               -->
                                    <?php
                                    $VAR_XX="";


                                        $sqlf1= "select * from _operadores order by ope_nomb" ;
                                        $rsf1 = adoopenrecordset($sqlf1);
                                        while($rstempf1 = mysql_fetch_array($rsf1)){

                                        if(isset($_POST["txtoperf1"])){
                                         if($VAR_OPE==$rstempf1["ope_nomb"]){$VAR_XX = "selected";}else{$VAR_XX="";}
                                        }
                                    ?>
                                         <option <?php echo $VAR_XX ?> value="<?php  echo $rstempf1["ope_nomb"] ?>" ><?php echo $rstempf1["ope_nomb"] ?></option>
                                    <?php
                                        }
                                    ?>
                                        </select>
                                    </div>

                                   <!-- Operador fin -->

                                    <!-- Tipo Vehiculo inicio -->
                                    <div class="col-lg-3">
                                     <div class="form-group">
                                          <label>Tipo Vehículo</label>
                                           <select class="form-control" name="txttipov" id="txttipov">
                                            <option value="Van" >Van</option>
                                           <option value="Sprinter" >Sprinter</option>
                                            <option value="Suburban" >Suburban</option>
                                            <option value="Autobus" >Autobus</option>
                                           </select>
                                      </div>
                                    </div>
                                   <!-- Tipo Vehiculo fin -->
                                   

                                   <!-- Numero economico inicio-->

                                   <div class="col-lg-3">
                                                      <div class="form-group">
                                                          <label>No eco.</label>
                                                         <!-- <input class="form-control" type="text" name="txtagen" id="txtagen" placeholder="">-->
                                                          <select class="form-control" name="txteco" id="txteco">
                                                                <option value="|"> - Select -</option>
                                                                <?php
                                                                    $sql = "select * from _vehiculos  order by veh_noec";
                                                                    $rs = adoopenrecordset($sql);
                                                                    while($rstemp = mysql_fetch_array($rs)){
                                                                        ?>
                                                                            <option value="<?php echo $rstemp["veh_noec"] ?>">
                                                                            <?php echo $rstemp["veh_noec"] ?></option>
                                                                <?php
                                                                    }
                                                                ?>
                                                          </select>
                                                      </div>
                                              </div>
                                    <!-- Numero economico fin-->

                                   <!-- Placas inicio -->

                                    <div class="col-lg-3">
                                                      <div class="form-group">
                                                          <label>Placas</label>
                                                         <!-- <input class="form-control" type="text" name="txtagen" id="txtagen" placeholder="">-->
                                                          <select class="form-control" name="txtplac" id="txtplac">
                                                                <option value="|"> - Select -</option>
                                                                <?php
                                                                    $sql = "select * from _vehiculos  order by veh_noec";
                                                                    $rs = adoopenrecordset($sql);
                                                                    while($rstemp = mysql_fetch_array($rs)){
                                                                        ?>
                                                                            <option value="<?php echo $rstemp["veh_plac"] ?>">
                                                                            <?php echo $rstemp["veh_plac"] ?></option>
                                                                <?php
                                                                    }
                                                                ?>
                                                          </select>
                                                      </div>
                                              </div>
                                    <!-- Placas inicio -->
                                   <!-- Hora inicio -->

                                    <div class="col-lg-3">
                                            <div class="form-group">
                                                <label>Hora</label>
                                                <input class="form-control" value="00:00" required type="hidden" name="txttime1" id="txttime1"  pattern="([01]?[0-9]|2[0-3]):[0-5][0-9]" placeholder="hh:mm"  >
                                                <table>
                                                    <tr>
                                                        <td>
                                                          <select name="txthor" onchange="document.frm.txttime1.value=document.frm.txthor.value+':'+document.frm.txtmin.value" class="form-control" style="width:70px" >
                                                              <option>00</option>
                                                              <option>01</option>
                                                              <option>02</option>
                                                              <option>03</option>
                                                              <option>04</option>
                                                              <option>05</option>
                                                              <option>06</option>
                                                              <option>07</option>
                                                              <option>08</option>
                                                              <option>09</option>
                                                              <option>10</option>
                                                              <option>11</option>
                                                              <option>12</option>
                                                              <option>13</option>
                                                              <option>14</option>
                                                              <option>15</option>
                                                              <option>16</option>
                                                              <option>17</option>
                                                              <option>18</option>
                                                              <option>19</option>
                                                              <option>20</option>
                                                              <option>21</option>
                                                              <option>22</option>
                                                              <option>23</option>
                                                          </select>
                                                        </td>
                                                        <td>&nbsp;:&nbsp;</td>
                                                        <td>
                                                            <select name="txtmin" onchange="document.frm.txttime1.value=document.frm.txthor.value+':'+document.frm.txtmin.value" class="form-control"  style="width:70px" >

                                                                <?php
                                                                    $i=0;
                                                                    while($i<=59){
                                                               ?>
                                                                    <option><?php echo substr("00".$i,-2) ?></option>
                                                                <?php $i = $i  +1 ;
                                                                } ?>

                                                            </select>
                                                        </td>
                                                    </tr>
                                                </table>

                                            </div>
                                       </div>

                                   <!-- Hora fin -->

                                   <!-- PAX INICIO -->
                                        <div class="col-lg-1">
                                            <div class="form-group">
                                                <label>Adults</label>
                                                <!-- <input class="form-control"  onchange="obtiene_precio();" value="1" name="txtadul" id="txtadul" > -->
                                                <input class="form-control" value="1" name="txtadul" id="txtadul"  >
                                            </div>
                                        </div>


                                        <div class="col-lg-1">
                                            <div class="form-group">
                                                <label>Child</label>
                                                <input class="form-control" value="0"  name="txtchil" id="txtchil" >

                                            </div>
                                        </div>

                                        <div class="col-lg-1">
                                            <div class="form-group">
                                                <label>Enfants</label>
                                                <input class="form-control" value="0"  name="txtenfa" id="txtenfa" >

                                            </div>
                                        </div>
                                   <!-- PAX FIN -->
                                   <!-- FOLIO INICIO -->
                                   <div class="col-lg-1">
                                     <div class="form-group">
                                        <label>Folio</label>
                                        <input class="form-control" value=""  name="txtfolio" id="txtfolio" >
                                      </div>
                                  </div>
                                   <!-- FOLIO FIN -->

                                <!-- BOTON STD -->
                                <div class="col-lg-1">
                                     <div class="form-group">
                                        <label class="form-check-label" for="STD">
                                            STD
                                        </label>
                                        <input class="form-check-input" type="checkbox" value="STD" id="STD" name="STD" >
                                      </div>
                                  </div>
                                 
                                   <!-- Boton insertar bestday inicio -->

                                   <div class="col-lg-12" style="text-align:center">
                                       <button class="btn btn-primary" id="btninsertarbd" name="btninsertarbd" disabled >AGREGAR RESERVA BESTDAY</button>
                                    </div>
                                    <!-- Boton insertar bestday fin -->
                                </form>
                            </div>

                        <button class="bestday btn btn-primary">Boton bestday</button>

                        <!-- julio Boton BestDay -->

                        <div class="col-lg-12"><hr></div>

                            <table width="100%" data-order='[[ 0, "desc" ]]' data-page-length='-1' class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>&nbsp;</th>
                                        <th>&nbsp;</th>
                                        <th>#</th>
                                        <!-- <th>No.Ord</th> -->
                                        <th>Vehículo</th>
                                        <th>No.Eco</th>
                                        <th>Placas</th>
                                        <th>Operador</th>
                                      <!--  <th>Vehículo</th> -->
                                        <th>Agencia</th>
                                        <th>Servicio</th>
                                        <th>PAX</th>
                                        <th>Nombre</th>
                                   <!--     <th>Hab</th> -->
                                        <th>Hora</th>
                                        <th>Pick up</th>
                                        <th>Drop off</th>
                                        <th>Contacto</th>
                                        <th>Vuelo</th>
                                        <th>Folio</th>
                                        <th>Cve</th>
                                         <th>Anexa</th>
                                        <th>Comentarios</th>
                                        <th>Apoyo</th>

                                        <th>Cta</th>
                                        <th>Estatus</th>
                                        <th>Captura</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php


                                      $i = 0;

                                      $rsf = adoopenrecordset($sqlf);
                                      while($rstempf = mysql_fetch_array($rsf)){
                                        
                                        if($rstempf["estatus"]=="terminada" && stripos($rstempf["come"], 'ORDEN EN VIVO') !== true ) { $VAR_COLOR ="#D4FFA8";}
                                        if($rstempf["estatus"]=="cancelada") { $VAR_COLOR ="#FF6161";}
                                        if($rstempf["estatus"]=="abierta") { $VAR_COLOR ="";}
                                        if($rstempf["estatus"]=="cerrada") { $VAR_COLOR ="#D4FFA8";} // cambia a rojo la linea
                                        if(stripos($rstempf["come"], 'ORDEN EN VIVO') !== false && $rstempf["estatus"]=="abierta" && stripos($rstempf["come"], 'NO SHOW') == false) { $VAR_COLOR ="#99EBFF";} // si contiene comentarios orden en vivo y el estatus abierto cambia a azul el sistema
                                        if(stripos($rstempf["come"], 'NO SHOW') !== false && $rstempf["estatus"]=="abierta" ) { $VAR_COLOR ="#ff963E";} // si contiene en comentarios no show cambia a naranja el sistema
                                        if($rstempf["estatus"]=="terminada" && stripos($rstempf["come"], 'ORDEN EN VIVO') !== false) { $VAR_COLOR ="#00dd04";} // cambia a verde mas oscuro los extras terminados
                                        $VAR_NX = "";

                                        if( date("Y-M-d",$rstempf["num"]) != date("Y-M-d")  ){
                                            $i = $i + 1;
                                            $VAR_NX = $i;

                                        }


                                      ?>

                                            <tr  style="background-color:<?php echo $VAR_COLOR ?>"  style="cursor:pointer;" id="row<?php echo $rstempf["id"] ?>" >
                                            <td><a href="agregar-servicio.php?t=<?php echo $rstempf["id"] ?>"><?php echo $rstempf["id"] ?></a></td>
                                            <td>
                                                <?php if($rstempf["estatus"]=="abierta"){ ?>

                                                    <button class="btn btn-success "   title="terminar orden" id="bt<?php echo $rstempf["id"] ?>"
                                                    onclick="cerrar(<?php echo $rstempf["id"] ?>)" >
                                                    <span class="fa fa-check"  ></span></button><p id="p"></p>
                                                <?php } ?>
                                            </td>





                                            <td>
                                                <?php if($rstempf["estatus"]=="abierta"){ ?>

                                                    <button class="btn btn-danger " title="cancelar orden" id="btc<?php echo $rstempf["id"] ?>"
                                                    onclick="cancelar(<?php echo $rstempf["id"] ?>)" >
                                                    <span class="fa fa-ban"  ></span></button><p id="p"></p>
                                                <?php } ?>
                                            </td>

                                            <td style="text-align:center">
                                                   <!--     <a href="agregar-servicio.php?t=<?php echo $rstempf["id"] ?>"><?php echo $rstempf["consec"] ?></a>   -->
                                                        <a href="agregar-servicio.php?t=<?php echo $rstempf["id"] ?>"><?php echo $VAR_NX ?></a>
                                            </td>


                                            <!-- <td align="center">
                                                <?php // echo $rstempf["come"]  ?>
                                                <input name="noord" style="text-align:center;width:50px" id="<?php echo $rstempf["id"] ?>" value="<?php echo $rstempf["noord"] ?>" >
                                            </td> -->


                                        <td><?php echo $rstempf["tipo_veh"] ?></td>
                                        <td><?php echo $rstempf["noec"] ?></td>

                                        <td><?php echo $rstempf["plac"] ?></td>
                                        <td><?php echo $rstempf["oper"] ?></td>
                                      <!--  <td><?php echo $rstempf["vehic"] ?></td> -->
                                        <td><?php echo $rstempf["agen"] ?></td>
                                            <td><?php echo strtoupper($rstempf["tipo"]) ?></td>
                                            <td><?php echo ($rstempf["adul"].".".$rstempf["chil"].".".$rstempf["enfa"]) ?></td>
                                            <td><?php echo $rstempf["name"] ?></td>
                                        <!--    <td><?php echo $rstempf["room"] ?></td>   -->
                                            <td><?php echo $rstempf["time1"] ?></td>
                                            <td><?php echo substr($rstempf["orig1"],0,25) ?></td>
                                            <td><?php echo substr(strtoupper($rstempf["dest1"]),0,25) ?></td>
                                            <td> <?php // echo $rstempf["come"]  ?>
                                                <textarea name="cont_prov" id="<?php echo $rstempf["id"] ?>" ><?php echo $rstempf["contacto_prov"] ?></textarea></td>  <!-- CONTACTO-->
                                            <td><?php echo $rstempf["vuel1"]  ?></td>
                                            <td><?php echo $rstempf["com2"]  ?></td>  <!-- FOLIO-->
                                            <td style="background-color: #66FF00"><b>CC<?php echo $rstempf["cve"]  ?>BB<?php echo $rstempf["cve2"]  ?></b></td>
                                            <td style="text-align:center">
                                          <?php
                                                                $nombre_fichero = '_files/'.$rstempf["id"].'.pdf';
                                                                // echo  '_files/'.$rstempf["id"].'.pdf';
                                                                if (file_exists($nombre_fichero)) {
                                                                     echo "<a target='_blank' href='_files/".$rstempf["id"].".pdf'><span class='fa fa-file'></span></a>";
                                                                } else {
                                                                     //echo "El fichero $nombre_fichero no existe";
                                                                }


                                             ?>
                                             </td>
                                            <td>
                                                <?php // echo $rstempf["come"]  ?>
                                                <textarea name="come" id="<?php echo $rstempf["id"] ?>" ><?php echo $rstempf["come"] ?></textarea>
                                            </td>
                                            <td>
                                                <?php // echo $rstempf["come"]  ?>
                                                <textarea name="apoyo" id="<?php echo $rstempf["id"] ?>" ><?php echo $rstempf["apoyo"] ?></textarea>
                                            </td>

                                            <td><?php

                                              if($rstempf["cta"]=="cxc"){ echo "Cliente";}
                                              if($rstempf["cta"]=="cxp"){ echo "Proveedor";}
                                              if($rstempf["cta"]=="cor"){ echo "Cortesia";}



                                              ?></td>
                                              <td><?php echo strtoupper($rstempf["estatus"])  ?></td>
                                              <td><?php echo date("Y-M-d",$rstempf["num"])  ?></td>
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

     <script src="js/jquery.cookie.js"></script>


    <!-- Page-Level Demo Scripts - Tables - Use for reference -->


<script src="alertifyjs/alertify.min.js"></script>
<link rel="stylesheet" href="alertifyjs/css/alertify.min.css" />
<link rel="stylesheet" href="alertifyjs/css/themes/default.min.css" />

<!-- <script src="//code.jquery.com/jquery-1.12.4.min.js"></script> -->
<script src="//rawgithub.com/indrimuska/jquery-editable-select/master/dist/jquery-editable-select.min.js"></script>







    <script>



    $(document).ready(function() {


            $('#STD').click(function(){
                
                if ($(this).prop("checked")==true) {
                    $('#txtplac').val('|');
                    $('#txteco').val('|');
                    $('#txtplac').prop('disabled', 'disabled');
                    $('#txteco').prop('disabled', 'disabled');
                }

                if ($(this).prop("checked")==false) {
                    $('#txtplac').removeAttr('disabled');
                    $('#txteco').removeAttr('disabled');
                    $('#txtplac').val('|');
                    $('#txteco').val('|');
                }                 

            });



                $('#btncerrarall').click(function(){
                alertify.confirm('MFTSYS','¿Desea cerrar todas las ordenes del listado?',function(){

                    document.formulario.txtacc.value="cerrarall";
                    document.formulario.submit();

                },function(){


                });


            })


       $('#cober').hide();


       // julio funcion bestday
              $('.bestday').click(function(){
                window.scrollTo(0, 0);

                $('#cober2').css('visibility','visible');
                $('#cober2').show();
         })

              $('#btncerrar').click(function(){

                $('#cober2').hide();

            })
       // julio funcion bestday

// julio escribir en dropdown bestday form
        $('#txtorig1').editableSelect();
        $('#txtdest1').editableSelect();
        $('#txtorig2').editableSelect();
        $('#txtdest2').editableSelect();
// julio escribir en dropdown bestday form

        $('#dataTables-example').DataTable({

            "columnDefs": [
                { "swidth": "10px", "targets": 0 },
                { "swidth": "2%", "targets": 0 },
                { "swidth": "2%", "targets": 0 },
                { "swidth": "2%", "targets": 0 },
                { "swidth": "2%", "targets": 0 },
                { "swidth": "50%", "targets": 0 }
              ],
            bSort:false

        });

         // julio funcion botonCerrarTiempo
              $('.btncerrartmpo').click(function(){
                window.scrollTo(0, 0);

                $('#cober3').css('visibility','visible');
                $('#cober3').show();
         })

              $('#btncerrart').click(function(){

                $('#cober3').hide();

            })
        // julio funcion botonCerrarTiempo


        // julio cambio de llegada aeropuerto

           $('#txttipo1').change(



                    function (){


                   $('#txtorig1').val('');
                   $('#txtdest1').val('');



                        if($('#txttipo1').val()=="ll"){
                             $('#txtorig1').val('CANCUN AIRPORT');
                             $('#txtdest1').val('');
                             // pasar hidden value a input pickup
                             $("input[name=pickup]").val('CANCUN AIRPORT');
                             $( "#txtorig1" ).prop( "disabled", true );
                        }

                        if($('#txttipo1').val()!=="ll"){
                             $( "#txtorig1" ).prop( "disabled", false );
                        }

                        if($('#txttipo1').val()=="sl"){
                             $('#txtorig1').val('');
                             $('#txtdest1').val('CANCUN AIRPORT');
                             // pasar hidden value a input pickup
                             $("input[name=pickup]").val('CANCUN AIRPORT');
                             $( "#txtdest1" ).prop( "disabled", true );
                        }
                         if($('#txttipo1').val()!=="sl"){
                             $( "#txtdest1" ).prop( "disabled", false );
                        }

                        if($('#txttipo1').val()=="Todos"){
                             $( "#btninsertarbd" ).prop( "disabled", true );
                        }

                        if($('#txttipo1').val()!=="Todos"){
                             $( "#btninsertarbd" ).prop( "disabled", false );
                        }

                    });







    });

// pasar hidden value a input pickup



// CAMBIO DE PLACAS DEPENDIENDO NO ECO

$('#txteco').change(function(){

         $('#txtplac').prop('selectedIndex',$('#txteco').prop('selectedIndex'));

        //  alert(   $('#txtnoec').prop('selectedIndex'));

   });


   $('#txtplac').change(function(){

         $('#txteco').prop('selectedIndex',$('#txtplac').prop('selectedIndex'));

        //  alert(   $('#txtnoec').prop('selectedIndex'));

   });

// CAMBIO DE PLACAS DEPENDIENDO NO ECO



  function Guardar() {

  window.scrollTo(0, 0);
  $('#cober').show();


      /*      $('input[name^="costo"]').each(function()       { var arch = 'update-operador.php?c=costo&val='+$(this).val()+'&i='+$(this).attr('id');  $.get(arch);  });
            $('input[name^="gasolina"]').each(function()    { var arch = 'update-operador.php?c=gasolina&val='+$(this).val()+'&i='+$(this).attr('id');  $.get(arch);  });
            $('input[name^="sueldo"]').each(function()      { var arch = 'update-operador.php?c=sueldo&val='+$(this).val()+'&i='+$(this).attr('id');  $.get(arch);  });
            $('input[name^="litros"]').each(function()      { var arch = 'update-operador.php?c=litros&val='+$(this).val()+'&i='+$(this).attr('id');  $.get(arch);  });
            $('input[name^="ki"]').each(function()          { var arch = 'update-operador.php?c=ki&val='+$(this).val()+'&i='+$(this).attr('id');  $.get(arch);  });
            $('input[name^="kf"]').each(function()          { var arch = 'update-operador.php?c=kf&val='+$(this).val()+'&i='+$(this).attr('id');  $.get(arch);  });
            $('input[name^="estimado"]').each(function()    { var arch = 'update-operador.php?c=estimado&val='+$(this).val()+'&i='+$(this).attr('id');  $.get(arch);  });
       */

            $('input[name^="noord"]').each(function()    { var arch = 'update-operador.php?c=noord&val='+$(this).val()+'&i='+$(this).attr('id');  $.get(arch);  });


            $('textarea[name^="come"]').each(function() {
                var arch = 'update-operador.php?c=come&val='+$(this).val()+'&i='+$(this).attr('id');
               // alert(arch);
                $.get(arch);
            });

            $('textarea[name^="apoyo"]').each(function() {
                var arch = 'update-operador.php?c=apoyo&val='+$(this).val()+'&i='+$(this).attr('id');
               // alert(arch);
                $.get(arch);
            });

            $('textarea[name^="cont_prov"]').each(function() {
                var arch = 'update-operador.php?c=contacto_prov&val='+$(this).val()+'&i='+$(this).attr('id');
               // alert(arch);
                $.get(arch);
            });






                   alertify.success("Asignaciones Guardadas");


                   var timeoutId = setTimeout(function(){
                       $('#cober').hide()
                    },7000);




         }



    $("#guardar").click(
          function(){
             Guardar();
         }
    );


    function cerrar(ID){
             alertify.confirm('MFTSYS', 'Desea marcar la orden como terminada?', function(){
              var arch = 'update-orden-terminada.php?&i='+ID;
                   $.get(arch);

                   Guardar();

                 //  $("#row"+ID).hide('slow');
                 //  $("#row"+ID).hide('slow');

                    $("#row"+ID).css('background-color', '#D4FFA8');


                   $("#bt"+ID).hide();
                   $("#btc"+ID).hide();
                   $("#p"+ID).text('Cerrada');


            // alertify.success('Orden Cerrada')
            }
                , function(){

                    //alertify.error('Cancel')
                });



    };



    function cancelar(ID){
             alertify.confirm('MFTSYS', 'Desea marcar la orden como cancelada?', function(){
              var arch = 'update-orden-cancelada.php?&i='+ID;
                   $.get(arch);

                 //  Guardar();

                 //  $("#row"+ID).hide('slow');
                 //  $("#row"+ID).hide('slow');

                    $("#row"+ID).css('background-color', '#FF6161');


                   $("#btc"+ID).hide();
                   $("#bt"+ID).hide();
                   $("#p"+ID).text('Cancelada');


            // alertify.success('Orden Cerrada')
            }
                , function(){

                    //alertify.error('Cancel')
                });



    };



    </script>



</body>

</html>
