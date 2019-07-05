<!DOCTYPE html>
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

    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- jquery ui -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->




<link href="//rawgithub.com/indrimuska/jquery-editable-select/master/dist/jquery-editable-select.min.css" rel="stylesheet">



</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include "nav.php" ?>

        <?php
            $VAR_FECH = "";
            $VAR_AGEN = "";
            $VAR_PROV = "";
            $VAR_TIPO = "";
            $VAR_OPER = "";
            $VAR_NOEC = "";
            $VAR_PLAC = "";
            $VAR_ADUL = "";
            $VAR_CHIL = "";
            $VAR_ENFA = "";
            $VAR_NOMB = "";
            $VAR_EMAI = "";
            $VAR_HABI = "";
            $VAR_HOR1 = "";
            $VAR_HOR2 = "";
            $VAR_PICK = "";
            $VAR_DROP = "";
            $VAR_VEHI = "";
            $VAR_VUEL = "";
            $VAR_CUENT = "";
            $VAR_CLAV = "";
            $VAR_FPAG = "";
            $VAR_CUPO = "";
            $VAR_STAT = "";
            $VAR_COME = "";
            $VAR_KI = "";
            $VAR_KF = "";
            $VAR_GASO = "";
            $VAR_CONT = "";


         if(isset($_GET["copy"])){
             $sql="select * from _transfers where tra_id = ".$_GET["copy"];
             $rs = adoopenrecordset($sql);
             $rstemp = mysql_fetch_array($rs);



         }



        ?>



        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Agregar orden </h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
              <form role="form" method="post" action="guardar-orden.php?t=tr&acc=" name="frm">
            <div class="row">





                <div class="col-lg-12">
                  <h3 class="page-header">PICKUP ORDER</h3>
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="row">

                                    <input type="hidden" name="txtacc" value="new" />


                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label>Fecha</label>
                                                <input class="form-control" required type="date" name="txtdate1"  value="<?php echo date("Y-m-d")?>" id="txtdate1" placeholder="">
                                            </div>
                                       </div>


                                              <div class="col-lg-3">
                                                      <div class="form-group">
                                                          <label>Agencia</label>
                                                         <!-- <input class="form-control" type="text" name="txtagen" id="txtagen" placeholder="">-->
                                                          <select class="form-control" onclick="obtiene_precio();" name="txtagen" id="txtagen">
                                                                <option value=""> - Select -</option>
                                                                <?php
                                                                    $sql = "select * from _clientes order by cli_nomb";
                                                                    $rs = adoopenrecordset($sql);
                                                                    while($rstemp = mysql_fetch_array($rs)){
                                                                        ?>
                                                                            <option value="<?php echo $rstemp["cli_nomb"] ?>"><?php echo $rstemp["cli_nomb"] ?></option>
                                                                <?php
                                                                    }
                                                                ?>
                                                          </select>
                                                      </div>
                                              </div>


                                         <div class="col-lg-3">
                                                      <div class="form-group">
                                                          <label>Proveedor</label>
                                                         <!-- <input class="form-control" type="text" name="txtagen" id="txtagen" placeholder="">-->
                                                          <select class="form-control" name="txtprov" id="txtprov">
                                                                <option value=""> - Select -</option>
                                                                <?php
                                                                    $sql = "select * from _proveedores order by pro_nomb";
                                                                    $rs = adoopenrecordset($sql);
                                                                    while($rstemp = mysql_fetch_array($rs)){
                                                                        ?>
                                                                            <option value="<?php echo $rstemp["pro_nomb"] ?>">
                                                                            <?php echo $rstemp["pro_nomb"] ?></option>
                                                                <?php
                                                                    }
                                                                ?>
                                                          </select>
                                                      </div>
                                              </div>



                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label>Tipo Servicio</label>
                                                    <select class="form-control roundtp" onchange="obtiene_precio();" id="txttipo" name="txttipo">
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


                                         <div class="col-lg-3">
                                                      <div class="form-group">
                                                          <label>Operador</label>
                                                         <!-- <input class="form-control" type="text" name="txtagen" id="txtagen" placeholder="">-->
                                                          <select class="form-control" name="txtoper" id="txtoper">
                                                                <option value=""> - Select -</option>
                                                                <?php
                                                                    $sql = "select * from _operadores order by ope_nomb";
                                                                    $rs = adoopenrecordset($sql);
                                                                    while($rstemp = mysql_fetch_array($rs)){
                                                                        ?>
                                                                            <option value="<?php echo $rstemp["ope_nomb"] ?>">
                                                                            <?php echo $rstemp["ope_nomb"] ?></option>
                                                                <?php
                                                                    }
                                                                ?>
                                                          </select>
                                                      </div>
                                              </div>


                                         <div class="col-lg-3">
                                                      <div class="form-group">
                                                          <label>No Eco</label>
                                                         <!-- <input class="form-control" type="text" name="txtagen" id="txtagen" placeholder="">-->
                                                          <select class="form-control" name="txtnoec" id="txtnoec">
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







                                        <div class="col-lg-1">
                                            <div class="form-group">
                                                <label>Adults</label>
                                                <input class="form-control"  onchange="obtiene_precio();" value="1" name="txtadul" id="txtadul" >

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

                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label>Nombre</label>
                                                <input class="form-control" required id="txtname" name="txtname" placeholder="Nombre Completo">
                                            </div>
                                        </div>

                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input class="form-control"  id="txtmail" name="txtmail" placeholder="Email">
                                            </div>
                                        </div>



                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label>Habitación</label>
                                                <input class="form-control" type="" name="txtroom" id="txtroom" placeholder="">
                                            </div>
                                       </div>

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


                                             <!--  <div class="col-lg-6">
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
                                              </div> -->
                                                <!-- cambio de pickup  txtorig1 -->
                                               <div class="col-lg-6">
                                                      <div class="form-group">
                                                          <label>Pickup location</label>
                                                          <?php $jquery =  mft_hoteles(); ?>
                                                          <input class="form-control txt-diagonal" required name="txtorig1" id="txtorig1">                                                        
                                                      </div>
                                              </div>
                                              <!-- cambio de dropoff txtdest1 -->

                                              <div class="col-lg-6">
                                                      <div class="form-group">
                                                          <label>Drop off location / Tour</label>
                                                         <!--  <select class="form-control" required name="txtdest1" id="txtdest1"> -->                                                          
                                                          <?php $jquery =  mft_hoteles(); ?>
                                                          <input class="form-control txt-diagonal" required name="txtdest1" id="txtdest1">                                                        
                                                      </div>
                                                           
                                                      </div>
                                              <!-- </div> -->




                                         <div class="col-lg-3">
                                                         <div class="form-group">
                                                              <label>Tipo Vehículo</label>
                                                               <select onclick="obtiene_precio();" class="form-control" name="txttipov" id="txttipov">
                                                                <option value="Van" >Van</option>
                                                               <option value="Sprinter" >Sprinter</option>
                                                                <option value="Suburban" >Suburban</option>

                                                                <option value="Autobus" >Autobus</option>

                                                               </select>
                                                          </div>
                                                  </div>



                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label>Vuelo</label>
                                                <input class="form-control" type="text" name="txtvuel1" id="txtvuel1" placeholder="">
                                            </div>
                                       </div>



                                                  <div class="col-lg-3">
                                                         <div class="form-group">
                                                              <label>Cuenta</label>
                                                               <select class="form-control" name="txtcta" id="txtcta">
                                                                <option value="cxc" >Cliente (CXC)</option>
                                                                <option value="cxp" >Proveedor (CXP)</option>
                                                                <option value="cor" >Cortesía</option>
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

                                            <div class="col-lg-3">
                                                         <div class="form-group">
                                                              <label>Forma de Pago</label>
                                                               <select class="form-control" name="txtfpago" id="txtfpago">
                                                               <option value="Transferencia" >Transferencia</option>
                                                               <option value="Efectivo" >Efectivo</option>
                                                               <option value="Cortesía" >Cortesía</option>
                                                               <option value="Balance" >Balance</option>


                                                               </select>
                                                          </div>
                                            </div>

                                            <div class="col-lg-3">
                                                         <div class="form-group">
                                                              <label>Cupón</label>
                                                              <input class="form-control" type="text" name="txtcupo" id="txtcupo" placeholder="">

                                                          </div>
                                            </div>

                                            <div class="col-lg-3">
                                                         <div class="form-group">
                                                              <label>Estatus</label>
                                                               <select class="form-control" name="txtestatus" id="txtestatus">
                                                               <option value="abierta" >Abierta</option>
                                                               <option value="terminada" >Terminada</option>
                                                             


                                                               </select>
                                                          </div>
                                            </div>

                                            
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label>Aerolínea</label>
                                                <input class="form-control" type="text" name="txtairln" id="txtairln" placeholder="">
                                            </div>
                                       </div>

                                       <div class="col-lg-3">
                                            <div class="form-group">
                                                <label>Contacto</label>
                                                <input class="form-control" type="text" name="txtcont" id="txtcont" placeholder="">
                                            </div>
                                       </div>


                                              <div class="col-lg-12">
                                                      <div class="form-group">
                                                          <label>Comentarios</label>
                                                          <textarea class="form-control" name="txtcome" id="txtcome" ></textarea>
                                                      </div>
                                              </div>



    <!-- SECCION ZONAS -->
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="row">

                                      <div class="col-lg-12"  >
                                          <div class="col-lg-4">
                                              <div class="form-group">
                                                  <label>ZONA PICKUP</label>
                                                  <select class="form-control"  onclick="obtiene_precio();" name="txtzpick" id="txtzpick">
                                                      <?php
                                                      $sql1="select tar_pick from _tarifas group by tar_pick order by tar_pick";
                                                   //   echo $sql1;

                                                      $rs1 = adoopenrecordset($sql1);
                                                      while( $rstemp1 =  mysql_fetch_array($rs1)){
                                                      ?>
                                                      <option><?php echo $rstemp1["tar_pick"]; ?></option>
                                                      <?php
                                                      }
                                                      ?>
                                                  </select>
                                              </div>
                                          </div>
                                          <div class="col-lg-4">
                                              <div class="form-group">
                                                  <label>ZONA DROPOFF</label>
                                                  <select class="form-control"  onclick="obtiene_precio();" name="txtzdrop" id="txtzdrop">
                                                      <?php
                                                      $sql="select tar_drop from _tarifas group by tar_drop order by tar_drop";
                                                      $rs = adoopenrecordset($sql);
                                                      while( $rstemp =  mysql_fetch_array($rs)){
                                                      ?>
                                                      <option><?php echo $rstemp["tar_drop"]; ?></option>
                                                      <?php
                                                      }
                                                      ?>
                                                  </select>
                                              </div>
                                          </div>
                                          <div class="col-lg-4">
                                              <div class="form-group">
                                                  <label>COSTO</label>
                                                  <input class="form-control" style="text-align:center; width:200px"   step="any" type="number" name="txtcost" id="txtcost" placeholder="0.00">
                                              </div>
                                          </div>
                                      </div>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- SECCION ZONAS FIN -->


                                        <!-- JULIO SECCION ROUNDTRIP -->
                                        <div class="col-lg-12 showrt">
                                            <div class="form-group ">
                                               <h3 class="page-header">DROPOFF ORDER</h3>
                                               <!-- FECHA DROPOFF -->
                                                <div class="col-lg-3">
                                                  <div class="form-group">
                                                      <label>Fecha dropoff</label>
                                                      <input class="form-control" required type="date" name="txtdate2"  value="<?php echo date("Y-m-d")?>" id="txtdate2" placeholder="">
                                                  </div>
                                                </div>
                                                <!-- AGENCIA DROPOFF -->
                                                <div class="col-lg-3">
                                                      <div class="form-group">
                                                          <label>Agencia</label>                                                       
                                                          <input class="form-control"  value="" name="txtagen2" id="txtagen2" readonly >                                                       
                                                      </div>
                                                </div>
                                                <!-- PROVEEDOR DROPOFF -->
                                                <div class="col-lg-3">
                                                  <div class="form-group">
                                                      <label>Proveedor</label>
                                                      <input class="form-control"  value="" name="txtprov2" id="txtprov2" readonly >
                                                  </div>
                                                </div>
                                                <!-- TIPO SERVICIO DROPOFF -->
                                                <div class="col-lg-3">
                                                  <div class="form-group">
                                                    <label>Tipo Servicio</label>
                                                        <select class="form-control roundtp" id="txttipo2" name="txttipo2" readonly>
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
                                                <!-- OPERADOR DROPOFF -->
                                                <div class="col-lg-3">
                                                      <div class="form-group">
                                                          <label>Operador Dropoff</label>
                                                          <select class="form-control" name="txtoper2" id="txtoper2">
                                                                <option value=""> - Select -</option>
                                                                <?php
                                                                    $sql = "select * from _operadores order by ope_nomb";
                                                                    $rs = adoopenrecordset($sql);
                                                                    while($rstemp = mysql_fetch_array($rs)){
                                                                        ?>
                                                                            <option value="<?php echo $rstemp["ope_nomb"] ?>">
                                                                            <?php echo $rstemp["ope_nomb"] ?></option>
                                                                <?php
                                                                    }
                                                                ?>
                                                          </select>
                                                      </div>
                                                </div>
                                                <!-- No Eco DROPOFF -->
                                                <div class="col-lg-3">
                                                  <div class="form-group">
                                                    <label>No Eco</label>
                                                    <select class="form-control" name="txtnoec2" id="txtnoec2">
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
                                              <!-- Placas DROPOFF -->
                                              <div class="col-lg-3">
                                                      <div class="form-group">
                                                          <label>Placas</label>                                                         
                                                          <select class="form-control" name="txtplac2" id="txtplac2">
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
                                              <!-- JULIO SECCION PAX INICIO -->
                                                <!-- ADULTS PAX -->
                                              <div class="col-lg-1">
                                                <div class="form-group">
                                                    <label>Adults</label>
                                                    <input class="form-control"  onchange="obtiene_precio();" value="1" name="txtadul2" id="txtadul2" >

                                                </div>
                                              </div>
                                                <!-- CHILDA PAX -->
                                            <div class="col-lg-1">
                                                <div class="form-group">
                                                    <label>Child</label>
                                                    <input class="form-control" value="0"  name="txtchil2" id="txtchil2" >
                                                </div>
                                            </div>
                                              <!-- ENFANT PAX -->
                                            <div class="col-lg-1">
                                                <div class="form-group">
                                                    <label>Enfants</label>
                                                    <input class="form-control" value="0"  name="txtenfa2" id="txtenfa2" >

                                                </div>
                                            </div>
                                            <!-- JULIO SECCION PAX FIN -->
                                            <!-- NOMBRE INICIO -->
                                            <div class="col-lg-3">
                                              <div class="form-group">
                                                  <label>Nombre</label>
                                                  <input class="form-control"  id="txtname2" name="txtname2" placeholder="Nombre Completo" readonly>
                                              </div>
                                            </div>
                                            <!-- EMAIL INICIO -->
                                            <div class="col-lg-3">
                                              <div class="form-group">
                                                  <label>Email</label>
                                                  <input class="form-control"  id="txtmail2" name="txtmail2" placeholder="Email" readonly>
                                              </div>
                                            </div>
                                            <!-- HABITACIÓN INICIO -->
                                            <div class="col-lg-3">
                                              <div class="form-group">
                                                  <label>Habitación</label>
                                                  <input class="form-control" type="" name="txtroom2" id="txtroom2" placeholder="" readonly>
                                              </div>
                                           </div>
                                                <!-- HORA DROPOFF -->
                                                <div class="col-lg-3">
                                                  <div class="form-group">
                                                    <label>Hora</label>
                                                    <input class="form-control" value="00:00" required type="hidden" name="txttime2" id="txttime2"  pattern="([01]?[0-9]|2[0-3]):[0-5][0-9]" placeholder="hh:mm"  >
                                                    <table>
                                                      <tr>
                                                        <td>
                                                          <select name="txthor2" onchange="document.frm.txttime2.value=document.frm.txthor2.value+':'+document.frm.txtmin2.value" class="form-control" style="width:70px" >
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
                                                          <select name="txtmin2" onchange="document.frm.txttime2.value=document.frm.txthor2.value+':'+document.frm.txtmin2.value" class="form-control"  style="width:70px" >

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
                                                <!-- PICKUP LOCATION -->
                                                <div class="col-lg-6">
                                                      <div class="form-group">
                                                          <label>Pickup location</label>                                   
                                                          <?php $jquery =  mft_hoteles(); ?>
                                                          <input class="form-control txt-diagonal"  name="txtorig2" id="txtorig2">                                                        
                                                      </div>
                                                           
                                                      </div>
                                                <!-- DROPOFF LOCATION -->
                                                 <div class="col-lg-6">
                                                      <div class="form-group">
                                                          <label>Drop off location / Tour</label>                                   
                                                          <?php $jquery =  mft_hoteles(); ?>
                                                          <input class="form-control txt-diagonal"  name="txtdest2" id="txtdest2">                                                        
                                                      </div>
                                                           
                                                      </div>
                                            <!-- JULIO SECCION TIPO VEHICULO -->
                                            <div class="col-lg-3">
                                             <div class="form-group">
                                              <label>Tipo Vehículo</label>
                                               <select onclick="obtiene_precio();" class="form-control" name="txttipov2" id="txttipov2">
                                                  <option value="Sprinter" >Sprinter</option>
                                                  <option value="Suburban" >Suburban</option>
                                                  <option value="Van" >Van</option>
                                                  <option value="Autobus" >Autobus</option>
                                               </select>
                                              </div>
                                            </div>
                                            <!-- JULIO SECCION VUELO -->
                                            <div class="col-lg-3">
                                              <div class="form-group">
                                                <label>Vuelo</label>
                                                <input class="form-control" type="text" name="txtvuel2" id="txtvuel2" placeholder="">
                                              </div>
                                            </div>
                                            <!-- JULIO SECCION CUENTA -->
                                            <div class="col-lg-3">
                                             <div class="form-group">
                                                <label>Cuenta</label>
                                                 <select class="form-control" name="txtcta2" id="txtcta2">
                                                    <option value="cxc" >Cliente (CXC)</option>
                                                    <option value="cxp" >Proveedor (CXP)</option>
                                                    <option value="cor" >Cortesía</option>
                                                 </select>
                                              </div>
                                            </div>
                                        <!-- JULIO SECCION CLAVE -->
                                        <div class="col-lg-3">
                                         <div class="form-group">
                                          <label>Clave</label>
                                          <table>
                                            <tr>
                                              <td>CC&nbsp;</td>
                                              <td><input size="4" class="form-control" type="text" name="txtcve3" id="txtcve3" ></td>
                                              <td>&nbsp;BB&nbsp;</td>
                                              <td><select  class="form-control" type="text" name="txtcve4" id="txtcve4" >
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
                                        <!-- JULIO SECCION FORMA DE PAGO -->
                                        <div class="col-lg-3">
                                         <div class="form-group">
                                            <label>Forma de Pago</label>
                                             <select class="form-control" name="txtfpago2" id="txtfpago2">
                                               <option value="Efectivo" >Efectivo</option>
                                               <option value="Transferencia" >Transferencia</option>
                                               <option value="Cortesía" >Cortesía</option>
                                               <option value="Balance" >Balance</option>
                                             </select>
                                          </div>
                                        </div>
                                        <!-- JULIO SECCION FORMA CUPÓN -->
                                        <div class="col-lg-3">
                                         <div class="form-group">
                                            <label>Cupón</label>
                                            <input class="form-control" type="text" name="txtcupo2" id="txtcupo2" placeholder="">
                                          </div>
                                        </div>
                                        <!-- JULIO SECCION ESTATUS -->
                                        <div class="col-lg-3">
                                           <div class="form-group">
                                              <label>Estatus</label>
                                               <select class="form-control" name="txtestatus2" id="txtestatus2">
                                                 <option value="abierta" >Abierta</option>
                                                <option value="terminada" >Terminada</option>
                                             </select>
                                            </div>
                                        </div>
                                        <!-- JULIO SECCION AEROLINEA -->
                                        <div class="col-lg-3">
                                          <div class="form-group">
                                              <label>Aerolínea</label>
                                              <input class="form-control" type="text" name="txtairln2" id="txtairln2" placeholder="">
                                          </div>
                                       </div>
                                       <!-- JULIO SECCION CONTACTO -->
                                       <div class="col-lg-3">
                                            <div class="form-group">
                                                <label>Contacto</label>
                                                <input class="form-control" type="text" name="txtcont2" id="txtcont2" placeholder="">
                                            </div>
                                       </div>
                                        <!-- JULIO SECCION COMENTARIOS -->
                                        <div class="col-lg-12">
                                          <div class="form-group">
                                              <label>Comentarios</label>
                                              <textarea class="form-control" name="txtcome2" id="txtcome2" >                            
                                              </textarea>
                                          </div>
                                        </div>
                                                   
                                            </div>
                                        </div>

                                        <!-- JULIO SECCION ROUNDTRIP -->
                                        








                                    <div class="col-lg-12">
                                       <button type="submit" class="btn btn-primary btn-lg btn-block">Guardar</button>
                                    </div>


                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
        </form>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    

    

   <!--  <script src="https://code.jquery.com/<jquery-1 class="1"></jquery-1>2.4.js"></script> --> <!-- jquery ui -->
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> <!-- jquery ui -->

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>
      <script src="js/jquery.cookie.js"></script>

      <!-- Metis Menu Plugin JavaScript -->
    <script src="vendor/metisMenu/metisMenu.min.js"></script>


</body>


<script src="//rawgithub.com/indrimuska/jquery-editable-select/master/dist/jquery-editable-select.min.js"></script>
<script>



    $(document).ready(function(){

      // inicio julio vista formulario roundtrio  roundtp || rtshow


    $('div.showrt').hide();
    $('.roundtp').change(function(){
        if($('.roundtp').val() == 'rt' || $('.roundtp').val() == 'cir' ) {
            $('div.showrt').show(); 
        } else {
            $('div.showrt').hide();
        }
      });  
   
      // fin julio vista formulario roundtrio  roundtp || rtshow





          $('#txtorig1').val('CANCUN AIRPORT');
          $('#txtzpick').val('CANCUN APTO');

            $('#txttipo').change(



                    function (){


                   $('#txtorig1').val('');
                   $('#txtdest1').val('');

                                       

                        if($('#txttipo').val()=="ll" ){
                             $('#txtorig1').val('CANCUN AIRPORT');
                             $('#txtdest1').val('');

                             $('#txtzpick').val('CANCUN APTO');
                             $('#txtzdrop').val('');

                        }

                        if($('#txttipo').val()=="sl"){
                             $('#txtorig1').val('');
                             $('#txtdest1').val('CANCUN AIRPORT');

                             $('#txtzpick').val('');
                             $('#txtzdrop').val('CANCUN APTO');


                        }
                          // julio jquery
                        if($('#txttipo').val()=="rt" || $('#txttipo').val()=="cir" ){

                          $('#txtorig1').val('CANCUN AIRPORT');
                          $('#txtdest2').val('CANCUN AIRPORT');
                          $('#txtorig2').val('');
                          // $('#txtdest1').val('');

                          $("#txtorig1,#txtdest1").change(function(){
                                 $("#txtdest2").val($('#txtorig1').val() );
                                 $("#txtorig2").val($('#txtdest1').val() );  //AGENCY
                                });


                          
                          
                           

                        }

                        





                    });


         });




   $('#txtnoec').change(function(){

         $('#txtplac').prop('selectedIndex',$('#txtnoec').prop('selectedIndex'));

        //  alert(   $('#txtnoec').prop('selectedIndex'));

   });


   $('#txtplac').change(function(){

         $('#txtnoec').prop('selectedIndex',$('#txtplac').prop('selectedIndex'));

        //  alert(   $('#txtnoec').prop('selectedIndex'));

   });



       $('#txttipo').change(


            function(){

          //  alert($('#txttipo option:selected').val());
                if($('#txttipo option:selected').val()=="rt"){
                           $('#return').show();
                } else {

                           $('#return').hide();
                }



            });



        $('#return').hide();

        $('#txtorig1').editableSelect();
        $('#txtdest1').editableSelect();
        $('#txtorig2').editableSelect();
        $('#txtdest2').editableSelect();
     //   $('#txtagen').editableSelect();



   function obtiene_precio(){


        	$.get("obtiene_precios.php", {
        	                pick: $('#txtzpick').val(),
                            drop: $('#txtzdrop').val(),
                            agen: $('#txtagen').val(),
                            serv: $('#txttipo').val(),
                            pax:  $('#txtadul').val(),
                            vehi: $('#txttipov').val(),


                            },


                            function(htmlexterno){

                                  $("#txtcost").val(htmlexterno);

                             //   var result = htmlexterno.split('|');

                             //    $("#text1").val($.trim(result[0]));



            	});


     };


    // REPLICA DE CAMPOS DE TEXTO EN FORMULARIO PICKUP -> DROPDOWN

     $("#txtname,#txtmail,#txtadul,#txtchil,#txtenfa,#txtroom,#txtairln,#txtcont").keyup(function(){
    updateText();
});



    function updateText() {
  $("#txtname2").val($('#txtname').val() ); //NAME
  $("#txtmail2").val($('#txtmail').val() ); //MAIL
  $("#txtadul2").val($('#txtadul').val() ); //ADULTS PAX
  $("#txtchil2").val($('#txtchil').val() ); //CHILD  PAX
  $("#txtenfa2").val($('#txtenfa').val() ); //ENFANT PAX
  $("#txtroom2").val($('#txtroom').val() ); //ROOM
  $("#txtairln2").val($('#txtairln').val() ); //Airline
  $("#txtcont2").val($('#txtcont').val() ); // Contacto
};


 // REPLICA DE CAMPOS DROPDOWN EN FORMULARIO PICKUP -> DROPDOWN
 $("#txtagen,#txtdate1,#txtprov,#txttipo").change(function(){
    updateDropDown();
});



    function updateDropDown() {
  $("#txtagen2").val($('#txtagen').val() );  //AGENCY
  $("#txtdate2").val($('#txtdate1').val() ); //DATE
  $("#txtprov2").val($('#txtprov').val() ); //PROV
  $("#txttipo2").val($('#txttipo').val() ); //SERV
} ;

   $( function()  {
     var availableHotel =  <?php  echo $jquery ?> ;

    function split( val ) {
      return val.split( /\/*\// );
    }
    function extractLast( term ) {
      return split( term ).pop();
    }
 
    $( ".txt-diagonal" )
      // don't navigate away from the field on tab when selecting an item
      .on( "keydown", function( event ) {
        if ( event.keyCode === $.ui.keyCode.TAB &&
            $( this ).autocomplete( "instance" ).menu.active ) {
          event.preventDefault();
        }
      })
      .autocomplete({
        minLength: 3,
        source: function( request, response ) {
          // delegate back to autocomplete, but extract the last term
           var results = $.ui.autocomplete.filter(
            availableHotel, extractLast( request.term ) ) ;
           response(results.slice(0, 10));

          //response(availableTags.slice(0, 10));
         
        },
        focus: function() {
          // prevent value inserted on focus
          return false;
        },
        select: function( event, ui ) {
          var terms = split( this.value );
          // remove the current input
          terms.pop();
          // add the selected item
          terms.push( ui.item.value );
          // add placeholder to get the comma-and-space at the end
          terms.push( "" );
          this.value = terms.join( "/" );
          return false;
        }
      });
 } );




</script>

</html>
