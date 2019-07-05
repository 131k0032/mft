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


    <link href="//rawgithub.com/indrimuska/jquery-editable-select/master/dist/jquery-editable-select.min.css" rel="stylesheet">



<script src="alertifyjs/alertify.min.js"></script>
<link rel="stylesheet" href="alertifyjs/css/alertify.min.css" />
<link rel="stylesheet" href="alertifyjs/css/themes/default.min.css" />



</head>

<body>

<?php

    $sqlf1= "select * from _operadores order by ope_nomb" ;
    $rsf1 = adoopenrecordset($sqlf1);
    $rstempf1 = mysql_fetch_array($rsf1);
    $VAR_OPE = $rstempf1["ope_nomb"];

   if(isset($_POST["txtacc"])){
      if($_POST["txtacc"]=="cerrar"){
        $sql="update _transfers set estatus = 'cerrada' where id =".$_POST["txtid"];
        adoexecute($sql);
        ?><script>alertify.alert('MFTSYS','Orden Cerrada');</script><?php
      }

      if($_POST["txtacc"]=="cerrarall"){

           $sqlfiltro="update   _transfers set estatus='cerrada' where estatus='abierta' and  num > 0 and date1 ='".$_POST["txtdel"]."'  and oper = '".$_POST["txtoperf"]."'   ";
       //    echo $sqlfiltro;
          adoexecute($sqlfiltro);
            ?><script>alertify.alert('MFTSYS','Ordenes Cerradas');</script><?php
      }



   }

   if(isset($_POST["btnagregar"])){

       $sql="select * from _transfers where id =".$_POST["txtid"];
       $rs = adoopenrecordset($sql);
       $rstemp = mysql_fetch_array($rs);


    //   echo $sql."<br>";



       $VAR_NOOR = $rstemp["noord"];
       $VAR_VEHI = $rstemp["tipo_veh"];
       $VAR_NOEC = $rstemp["noec"];
       $VAR_PLAC = $rstemp["plac"];
       $VAR_OPER = $rstemp["oper"];
       $VAR_AGEN = $rstemp["agen"];
       $VAR_DATE1 = $rstemp["date1"];
       $VAR_EMAI = $rstemp["email"];
       $VAR_ROOM = $rstemp["room"];
       $VAR_CTA = $rstemp["cta"];
       $VAR_FPAGO = $rstemp["formadepago"];
       $VAR_TIPO_VEH = $rstemp["tipo_veh"];
       $VAR_PRO_NOMB = $rstemp["pro_nomb"];
    //   $VAR_CUPO = $rstemp["cupo"];
       $VAR_COSTO = $rstemp["costo"];
       $VAR_NUM = $rstemp["num"];
       $VAR_CONSEC = "";
       $VAR_LITR = "";



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
             estatus,
             ki,
             kf,
             gasolina,
             litros

             )
                values (
             ".$VAR_NUM.",
            '".$VAR_DATE1."',
            '".$_POST["txtagen"]."',
            '".$_POST["txttipo"]."',
            '".$_POST["txtadul"]."',
            '".$_POST["txtchil"]."',
            '".$_POST["txtenfa"]."',
            '".$_POST["txtname"]."',
            '".$VAR_EMAI."',
            '".$VAR_ROOM."',
            '".$_POST["txttime1"]."',
            '".$_POST["txtorig1"]."',
            '".$_POST["txtdest1"]."',
            '".$_POST["txtvuel1"]."',
            '".$VAR_CTA."',
            '".$_POST["txtcve"]."',
            '".$_POST["txtcve2"]."',
            '".$_POST["txtcome"]."',
            '".$VAR_CONSEC."',
            '".$_COOKIE["usu_mail"]."',
            '".$VAR_TIPO_VEH."',
            '".$VAR_FPAGO."',
            '".$VAR_PRO_NOMB."',
            '".$VAR_OPER."',
            '".$VAR_PLAC."',
            '".$VAR_NOEC."',
            '".$_POST["txtcupo"]."',
            '".$VAR_COSTO."',
             'cerrada',
             '".$_POST["txtki"]."',
             '".$_POST["txtkf"]."',
             '".$_POST["txtgaso"]."',
             '".$_POST["txtlitr"]."'
            )";



    //    echo $sql;


          adoexecute($sql);



   }


  if(isset($_POST["btnguardar"])){
          $sql="update  _transfers  set
          agen =  '".$_POST["txtagen"]."',
          tipo  =  '".$_POST["txttipo"]."',
          adul  =  '".$_POST["txtadul"]."',
          chil  =  '".$_POST["txtchil"]."',
          enfa  =  '".$_POST["txtenfa"]."',
          name  =  '".$_POST["txtname"]."',
          time1  =  '".$_POST["txttime1"]."',
          orig1  =  '".$_POST["txtorig1"]."',
          dest1  =  '".$_POST["txtdest1"]."',
          vuel1  =  '".$_POST["txtvuel1"]."',
          cve  =  '".$_POST["txtcve"]."',
          cve2  =  '".$_POST["txtcve2"]."',
          come  =  '".$_POST["txtcome"]."',
          cupo  =  '".$_POST["txtcupo"]."',
         ki   =   '".$_POST["txtki"]."',
          kf  =   '".$_POST["txtkf"]."',
          gasolina  =   '".$_POST["txtgaso"]."',
          litros  =   '".$_POST["txtlitr"]."'
          where id  =".$_POST["txtid"];

          adoexecute($sql);
          ?>
            <script>
                alertify.success('<li class="fa fa-save"></li> Guardado');
            </script>
          <?php
         // echo "---------------------------------->".$sql;
  }


?>


<div id="cober" style=" visibility: hidden       ;z-index:1150; position: absolute; top: 0px; left:0px ; width:100%; height: 100%; border:0px solid red; background-color: rgba(217, 217, 217, 0.45) ">

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

                                $VAR_AL ="";
                                $VAR_EST ="Todos";

                                $VAR_DEL = date("Y-m-d");

                                $VAR_TIP = "Todos";
                                $VAR_AGEN = "Todos";
                                $VAR_NOEC = "Todos";



                                if(isset($_POST["txtdel"])){ $VAR_DEL = $_POST["txtdel"]; }
                                $sqlfiltro="select * from _transfers where num > 0 and date1 ='".$VAR_DEL."' ";
                                if(isset($_POST["txtoperf"])){  $VAR_OPE = $_POST["txtoperf"] ;  }
                                $sqlfiltro= $sqlfiltro." and (oper = '".$VAR_OPE."' ) ";
                                $sqlfiltro = $sqlfiltro . " order by date1, time1, id";

                            //      echo $sqlfiltro;


?>

                           <H2> CAPTURAR DATOS </H2>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">

                        <div class="col-lg-8" style="padding-bottom:10px" >

                        <div class="row">

                      <form method="post"  id="formulario" name="formulario">



                            <div id="cober2" style="  visibility:hidden               ;top:-150px  ; background-color:#FFF  ;width:900px ;border:2px solid silver; padding:10px; margin:10px ; position: absolute; z-index: 1200" class="row">
                                  <input name="txtacc" type="hidden" id="txtacc" />
                                  <input name="txtid" type="hidden" id="txtid" />
                                  <input name="txtag" type="hidden" id="txtag" />
                                  <div class="col-md-12" style="text-align:right; padding-bottom:10px;border-bottom:1px solid silver; margin-bottom:10px ">
                                        <button id="btncerrar" type="button" class="fa fa-times btn btn-danger" ></button>

                                  </div>

                                   <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Agencia</label>
                                                    <select class="form-control" id="txtagen"  name="txtagen">
                                                        <option value=""> - Select -</option>
                                                                <?php
                                                                    $sql = "select * from _clientes order by cli_nomb";
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


                                   <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Tipo Servicio</label>
                                                    <select class="form-control" id="txttipo" name="txttipo">
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

                                     <div class="col-lg-1">
                                            <div class="form-group">
                                                <label>Adults</label>
                                                <input class="form-control"  value="1" name="txtadul" id="txtadul" >

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


                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label>Nombre</label>
                                                <input class="form-control" required id="txtname" name="txtname" placeholder="Nombre Completo">
                                            </div>
                                        </div>

                                         <div class="col-lg-3">
                                            <div class="form-group">
                                                <label>Hora</label>
                                                <input class="form-control" value="00:00" required type="hidden" name="txttime1" id="txttime1"  pattern="([01]?[0-9]|2[0-3]):[0-5][0-9]" placeholder="hh:mm"  >
                                                <table>
                                                    <tr>
                                                        <td>
                                                          <select name="txthor" onchange="document.formulario.txttime1.value=document.formulario.txthor.value+':'+document.formulario.txtmin.value" class="form-control" style="width:70px" >
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
                                                            <select name="txtmin" onchange="document.formulario.txttime1.value=document.formulario.txthor.value+':'+document.formulario.txtmin.value" class="form-control"  style="width:70px" >

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


                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label>Cupón</label>
                                                <input class="form-control"   id="txtcupo" name="txtcupo" placeholder="Cupón">
                                            </div>
                                        </div>

                                        <div class="col-lg-2">
                                            <div class="form-group">
                                                <label>Vuelo</label>
                                                <input class="form-control" type="text" name="txtvuel1" id="txtvuel1" placeholder="">
                                            </div>
                                       </div>



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




                                                  <div class="col-lg-3">
                                                         <div class="form-group">
                                                              <label>Clave</label>
                                                              <table>
                                                                <tr>
                                                                    <td>CC&nbsp;</td>
                                                                    <td><input size="4" class="form-control" type="text" name="txtcve" id="txtcve" ></td>
                                                                    <td>&nbsp;BB&nbsp;</td>
                                                                    <td><select  class="form-control" type="text" name="txtcve2" id="txtcve2" >
                                                                            <option value="MX">MX</option>
                                                                            <option value="DL">DL</option>
                                                                            <option value="CA">CA</option>
                                                                            <option value="EU">EU</option>
                                                                        </select>
                                                                    </td>
                                                                    <td></td>
                                                                </tr>
                                                              </table>

                                                          </div>
                                                  </div>

                                        <div class="col-lg-2">
                                            <div class="form-group">
                                                <label>KI</label>
                                                <input class="form-control" required type="text" name="txtki" id="txtki" placeholder="0.00">
                                            </div>
                                       </div>

                                        <div class="col-lg-2">
                                            <div class="form-group">
                                                <label>KF</label>
                                                <input class="form-control" required type="text" name="txtkf" id="txtkf" placeholder="0.00">
                                            </div>
                                       </div>

                                        <div class="col-lg-2">
                                            <div class="form-group">
                                                <label>Gasolina</label>
                                                <input class="form-control" required type="text" name="txtgaso" id="txtgaso" placeholder="0.00">
                                            </div>
                                       </div>

                                        <div class="col-lg-2">
                                            <div class="form-group">
                                                <label>Litros</label>
                                                <input class="form-control" required type="text" name="txtlitr" id="txtlitr" placeholder="0">
                                            </div>
                                       </div>

                                              <div class="col-lg-12">
                                                      <div class="form-group">
                                                          <label>Comentarios</label>
                                                          <textarea class="form-control" name="txtcome" id="txtcome" ></textarea>
                                                      </div>
                                              </div>

                                              <div class="col-lg-12" style="text-align:center">
                                                     <button class="btn btn-primary" id="btnagregar" name="btnagregar" >AGREGAR</button>
                                                     <button class="btn btn-primary" id="btnguardar" name="btnguardar" >GUARDAR</button>
                                              </div>


                                <div style="clear:both"></div>
                            </div>







                            <div class="col-lg-2" >
                                <label>Fecha</label>
                                <input class="form-control"   name="txtdel" type="date" value="<?php echo $VAR_DEL ?>" />
                            </div>



                             <?php


                              //    echo $sqlf1;

                                 ?>
                                    <div class="col-lg-2" >

                                        <label>Operador</label>
                                        <select class="form-control"     name="txtoperf" >
                                            <!--
                                               <option value="Todos">Todos</option>
                                               <option value="" <?php if($VAR_OPE==""){echo "selected";}?> >Vacios</option>
                                               -->
                                    <?php
                                    $VAR_XX="";


                                        $sqlf1= "select * from _operadores order by ope_nomb" ;
                                        $rsf1 = adoopenrecordset($sqlf1);
                                        while($rstempf1 = mysql_fetch_array($rsf1)){

                                        if(isset($_POST["txtoperf"])){
                                         if($VAR_OPE==$rstempf1["ope_nomb"]){$VAR_XX = "selected";}else{$VAR_XX="";}
                                        }
                                    ?>
                                         <option <?php echo $VAR_XX ?> value="<?php  echo $rstempf1["ope_nomb"] ?>" ><?php echo $rstempf1["ope_nomb"] ?></option>
                                    <?php
                                        }
                                    ?>
                                        </select>
                                    </div>
                                <div class="col-lg-4">
                                        <div class="col-md-4"><br><button style=" display:  inline !important" type="submit" onclick="document.formulario.submit()" class="btn btn-primary btn-lg btn-block" >Filtrar</button></div>
                                        <div class="col-md-8"><br>
                                                <button style=" display:  inline !important" type="button"  name="btncerrarall" id="btncerrarall" class="btn btn-success btn-lg btn-block" ><li class="fa fa-check"></li> Cerrar todas las órdenes</button>
                                        </div>
                                </div>
                          </form>
                          </div>


                        </div>
                        <div class="col-lg-12"><hr></div>

                            <table width="100%" data-order='[[ 0, "desc" ]]' data-page-length='50' class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>&nbsp;</th>
                                        <th>ID</th>

                                        <th>#</th>
                                        <th>Fecha</th>
                                        <th>No.Ord</th>
                                        <th>Vehículo</th>
                                        <th>No.Eco</th>
                                        <th>Placas</th>
                                        <th>Operador</th>
                                      <!--  <th>Vehículo</th> -->
                                        <th>Agencia</th>
                                        <th>Servicio</th>
                                        <th>PAX</th>
                                        <th>Nombre</th>
                                        <th>Cupón</th>
                                   <!--     <th>Hab</th> -->
                                        <th>Hora</th>
                                        <th>Pick up</th>
                                        <th>Drop off</th>
                                        <th>Vuelo</th>
                                        <th>Cve</th>
                                         <th>KI</th>
                                         <th>KF</th>
                                         <th>GAS</th>
                                        <th>Comentarios</th>
                                        <th>Apoyo</th>

                                        <th>Cta</th>
                                        <th>Estatus</th>
                                        <th>Captura</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                //    echo $sqlfiltro;

                                      $i = 0;

                                      $rsf = adoopenrecordset($sqlfiltro);
                                      while($rstempf = mysql_fetch_array($rsf)){

                                        if($rstempf["estatus"]=="terminada") { $VAR_COLOR ="#D4FFA8";}
                                        if($rstempf["estatus"]=="cancelada") { $VAR_COLOR ="#FF6161";}
                                        if($rstempf["estatus"]=="abierta") { $VAR_COLOR ="";}
                                        if($rstempf["estatus"]=="cerrada") { $VAR_COLOR ="#D4FFA8";}

                                        $VAR_NX = "";

                                        if( date("Y-M-d",$rstempf["num"]) != date("Y-M-d")  ){
                                            $i = $i + 1;
                                            $VAR_NX = $i;

                                        }


                                      ?>

                                            <tr  style="background-color:<?php echo $VAR_COLOR ?>"  style="cursor:pointer;" id="row<?php echo $rstempf["id"] ?>" >
                                            <td  style="text-aling:center">
                                                        <table>
                                                            <tr>

                                                            <td style="padding:1px">
                                                                <button  style=" display: inline  " id="btnduplicar" onclick="agencia('<?php echo $rstempf["agen"] ?>');document.formulario.txtid.value='<?php echo $rstempf["id"] ?>'; "    class="btnduplicar fa fa-copy btn btn-primary" ></button>
                                                            </td>

                                                            <td style="padding:1px">
                                                                <button  style=" display: inline  " id="btnedit" onclick="editar(
                                                                        '<?php echo $rstempf["agen"] ?>',
                                                                        '<?php echo $rstempf["tipo"] ?>',
                                                                        '<?php echo $rstempf["adul"] ?>',
                                                                        '<?php echo $rstempf["chil"] ?>',
                                                                        '<?php echo $rstempf["enfa"] ?>',
                                                                        '<?php echo $rstempf["name"] ?>',
                                                                        '<?php echo substr($rstempf["time1"],0,2) ?>',
                                                                        '<?php echo substr($rstempf["time1"],3,2) ?>',
                                                                        '<?php echo $rstempf["cupo"] ?>',
                                                                        '<?php echo $rstempf["vuel1"] ?>',
                                                                        '<?php echo $rstempf["orig1"] ?>',
                                                                        '<?php echo $rstempf["dest1"] ?>',
                                                                        '<?php echo $rstempf["cve"] ?>',
                                                                        '<?php echo $rstempf["cve2"] ?>',
                                                                        '<?php echo $rstempf["ki"] ?>',
                                                                        '<?php echo $rstempf["kf"] ?>',
                                                                        '<?php echo $rstempf["gasolina"] ?>',
                                                                        '<?php echo $rstempf["litros"] ?>',
                                                                        '<?php echo $rstempf["come"] ?>'


                                                                        );document.formulario.txtid.value='<?php echo $rstempf["id"] ?>'; "    class="btnduplicar fa fa-edit btn btn-primary" ></button>
                                                            </td>



                                                   <?php if($rstempf["estatus"]=="abierta"){?>
                                                           <td  style="padding:1px"> <button title="cerrar orden"  style=" display: inline  " id="btncerrar2"    name="btncerrar2"  onclick="cerrar(<?php echo $rstempf["id"]?>)"    class=" fa fa-lock btn btn-primary" ></button></td>
                                                    <?php } ?>
                                            </td>          </tr></table>
                                            <td> <?php echo $rstempf["id"] ?> </td>
                                            <td style="text-align:center">    <?php echo $VAR_NX ?>  </td>
                                            <td align="center">   <?php echo $rstempf["date1"] ?>      </td>
                                            <td align="center">   <?php echo $rstempf["noord"] ?>      </td>


                                        <td><?php echo $rstempf["tipo_veh"] ?></td>
                                        <td><?php echo $rstempf["noec"] ?></td>

                                        <td><?php echo $rstempf["plac"] ?></td>
                                        <td><?php echo $rstempf["oper"] ?></td>
                                      <!--  <td><?php echo $rstempf["vehic"] ?></td> -->
                                        <td><?php echo $rstempf["agen"] ?></td>
                                            <td><?php echo strtoupper($rstempf["tipo"]) ?></td>
                                            <td><?php echo ($rstempf["adul"].".".$rstempf["chil"].".".$rstempf["enfa"]) ?></td>
                                            <td><?php echo $rstempf["name"] ?></td>
                                            <td><?php echo $rstempf["cupo"] ?></td>
                                        <!--    <td><?php echo $rstempf["room"] ?></td>   -->
                                            <td><?php echo $rstempf["time1"] ?></td>
                                            <td><?php echo substr($rstempf["orig1"],0,25) ?></td>
                                            <td><?php echo substr(strtoupper($rstempf["dest1"]),0,25) ?></td>
                                            <td><?php echo $rstempf["vuel1"]  ?></td>
                                            <td style="background-color: <?php if($rstempf["cve"]>0){echo "#66FF00"; } ?>"><b>CC<?php echo $rstempf["cve"]  ?>BB<?php echo $rstempf["cve2"]  ?></b></td>


                                            <td>  <?php   echo $rstempf["ki"]  ?>     </td>
                                            <td>  <?php   echo $rstempf["kf"]  ?>     </td>
                                            <td>  <?php   echo $rstempf["gasolina"]  ?>     </td>
                                            <td>  <?php   echo $rstempf["come"]  ?>     </td>
                                            <td>
                                                <?php  echo $rstempf["apoyo"]  ?>

                                            </td>

                                            <td><?php

                                              if($rstempf["cta"]=="cxc"){ echo "Cliente";}
                                              if($rstempf["cta"]=="cxp"){ echo "Proveedor";}
                                              if($rstempf["cta"]=="cor"){ echo "Cortesia";}

                                              ?></td>
                                              <td><?php echo strtoupper($rstempf["estatus"])  ?></td>
                                              <td><?php echo date("Y-M-d",$rstempf["num"])  ?></td>
                                        </tr>

                                  <?php   }      ?>

                                </tbody>
                            </table>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>

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


<script src="//rawgithub.com/indrimuska/jquery-editable-select/master/dist/jquery-editable-select.min.js"></script>




    <script>



    $(document).ready(function() {





        $('#btncerrarall').click(function(){
                alertify.confirm('MFTSYS','¿Desea cerrar todas las ordenes del listado?',function(){

                    document.formulario.txtacc.value="cerrarall";
                    document.formulario.submit();

                },function(){


                });


            })

                $('#cober').hide();
                $('#cober2').hide();

        $('#btncerrar').click(function(){

                $('#cober').hide();
                $('#cober2').hide();

            })


        $('.btnduplicar').click(function(){
                window.scrollTo(0, 0);

                $('#cober').css('visibility','visible');
                $('#cober2').css('visibility','visible');


                $('#cober').show();
                $('#cober2').show();
         })


        /*
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
        */


        $('#txtorig1').editableSelect();

            $('#txtorig1').val('CANCUN AIRPORT');
        $('#txtdest1').editableSelect();



     $('#txttipo').change(



                    function (){


                   $('#txtorig1').val('');
                   $('#txtdest1').val('');



                        if($('#txttipo').val()=="ll"){
                             $('#txtorig1').val('CANCUN AIRPORT');
                             $('#txtdest1').val('');
                        }

                        if($('#txttipo').val()=="sl"){
                             $('#txtorig1').val('');
                             $('#txtdest1').val('CANCUN AIRPORT');
                        }

                    });



    });

    function agencia(AGEN){
       // alert(AGEN);
        document.formulario.txtagen.value=AGEN;
       $('#btnagregar').show();
       $('#btnguardar').hide();
    }

    function editar(AGEN,TIPO,ADUL,CHIL,ENFA,NOMB,HORA,MINU,CUPO,VUEL,PICK,DROP,CVE,CVE2,KI,KF,GASO,LITR,COME){
       //  alert(HORA);
       $('#btnagregar').hide();
       $('#btnguardar').show();
        document.formulario.txtagen.value=AGEN;
        document.formulario.txttipo.value=TIPO;
        document.formulario.txtadul.value=ADUL;
        document.formulario.txtchil.value=CHIL;
        document.formulario.txtenfa.value=ENFA;
        document.formulario.txtname.value=NOMB;
        document.formulario.txthor.value=HORA;
        document.formulario.txtmin.value=MINU;
        document.formulario.txtcupo.value=CUPO;
        document.formulario.txtvuel1.value=VUEL;
        document.formulario.txtorig1.value=PICK;
        document.formulario.txtdest1.value=DROP;
        document.formulario.txtcve.value=CVE;
        document.formulario.txtcve2.value=CVE2;
        document.formulario.txtki.value=KI;
        document.formulario.txtkf.value=KF;
        document.formulario.txtgaso.value=GASO;
        document.formulario.txtlitr.value=LITR;
        document.formulario.txtcome.value=COME;

    }


    function cerrar(ID){
       // alert(AGEN);
        document.formulario.txtacc.value = "cerrar";
        document.formulario.txtid.value = ID;
        document.formulario.submit();

    }

    </script>



</body>

</html>
