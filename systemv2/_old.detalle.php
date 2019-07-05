<!DOCTYPE html>
<?php


    include "../db_conexion.php";


    $sqlf="select * from _transfers where id = ".$_GET["t"];

//    echo $sqlf;


    $rsf = adoopenrecordset($sqlf);
    $rstempf = mysql_fetch_array($rsf);

    $VAR_NUM1 = substr($rstempf["num"],-5);
    $VAR_NUM = ($rstempf["num"]);


    $VAR_id = $rstempf["id"];
    $VAR_estatus = $rstempf["estatus"];
    $VAR_tipo = $rstempf["tipo"];
    $VAR_num = $rstempf["num"];
    $VAR_name = $rstempf["name"];
    $VAR_mobile = $rstempf["mobile"];
    $VAR_email = $rstempf["email"];
    $VAR_street = $rstempf["street"];
    $VAR_zipcode = $rstempf["zipcode"];
    $VAR_city = $rstempf["city"];
    $VAR_country = $rstempf["country"];
    $VAR_date1 = $rstempf["date1"];
    $VAR_time1 = $rstempf["time1"];
    $VAR_orig1 = $rstempf["orig1"];
    $VAR_dest1 = $rstempf["dest1"];
    $VAR_airl1 = $rstempf["airl1"];
    $VAR_vuel1 = $rstempf["vuel1"];
//    $VAR_date2 = $rstempf["date2"];
//    $VAR_time2 = $rstempf["time2"];
//    $VAR_orig2 = $rstempf["orig2"];
//    $VAR_dest2 = $rstempf["dest2"];
//    $VAR_vuel2 = $rstempf["vuel2"];
//    $VAR_airl2 = $rstempf["airl2"];
    $VAR_adul = $rstempf["adul"];
    $VAR_chil = $rstempf["chil"];
    $VAR_enfa = $rstempf["enfa"];
    $VAR_vehic = $rstempf["vehic"];
    $VAR_monto = $rstempf["monto"];
    $VAR_payment = $rstempf["payment"];
    $VAR_leido = $rstempf["leido"];
    $VAR_paga = $rstempf["paga"];
    $VAR_plac = $rstempf["plac"];
    $VAR_oper = $rstempf["oper"];
    $VAR_noec = $rstempf["noec"];
    $VAR_agen = $rstempf["agen"];
    $VAR_come = $rstempf["come"];
    $VAR_room = $rstempf["room"];
    $VAR_cve = $rstempf["cve"];
    $VAR_cve2 = $rstempf["cve2"];
    $VAR_ordanexa = $rstempf["ordanexa"];

    $VAR_lead     = $rstempf["lead"];
    $VAR_idio     = $rstempf["idio"];
    $VAR_conf     = $rstempf["conf"];
    $VAR_cupo     = $rstempf["cupo"];

    $VAR_costo      = $rstempf["costo"];
    $VAR_gasolina   = $rstempf["gasolina"];
    $VAR_sueldo     = $rstempf["sueldo"];
    $VAR_litros     = $rstempf["litros"];
    $VAR_ki         = $rstempf["ki"];
    $VAR_kf         = $rstempf["kf"];
    $VAR_estimado   = $rstempf["estimado"];
    $VAR_pagado     = $rstempf["pagado"];
    $VAR_proveedor     = $rstempf["proveedor"];
  // $VAR_formapago  = $rstempf["formapago"];
    $VAR_fechapago  = $rstempf["fechapago"];
    $VAR_cta        = $rstempf["cta"];






?>
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







      <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Detalle Orden <?php echo $VAR_tipo ?> # <?php echo $VAR_id ?></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading" style="text-align:right">
                                                                          <button   onclick="borrar(<?php echo $VAR_id ?>)"  ><span class="fa fa-trash" ></span></button>
                        </div>
                        <div class="panel-body">
                            <div class="row">

                            <form role="form" method="post" action="guardar-servicio.php?t=tr&acc=gua">
                                     <input type="hidden" name="txtacc" value="gua" />
                                    <div class="col-lg-12">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Tipo Servicio</label>
                                                    <select class="form-control" id="txttipo" name="txttipo">

                                                          <option <?php if($VAR_tipo=="ll"){ echo "selected"; } ?> value="ll"    >LL - Llegada</option>
                                                          <option <?php if($VAR_tipo=="sl"){ echo "selected"; } ?> value="sl"    >SL - Salida</option>
                                                          <option <?php if($VAR_tipo=="tr"){ echo "selected"; } ?> value="tr"    >TR - Transfer</option>
                                                          <option <?php if($VAR_tipo=="ow"){ echo "selected"; } ?> value="ow"    >OW - One Way</option>
                                                          <option <?php if($VAR_tipo=="rt"){ echo "selected"; } ?> value="rt"    >RT - Round Trip</option>
                                                          <option <?php if($VAR_tipo=="tour"){ echo "selected"; } ?> value="tour"  >TOUR - Tour</option>
                                                          <option <?php if($VAR_tipo=="sa"){ echo "selected"; } ?> value="sa"    >SA - Servicio Abierto</option>
                                                          <option <?php if($VAR_tipo=="cir"){ echo "selected"; } ?> value="cir"   >CIR - Circuito</option>
                                                    </select>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Capturó:</label>
                                                   <input class="form-control" readonly id="txtusu" name="txtusu" placeholder="USUARIO 1">
                                            </div>
                                        </div>


                                    </div>


                                    <input type="hidden" name="txtnum" value="<?php echo $VAR_NUM ?>" />
                                    <input type="hidden" name="txtid"  value="<?php echo $VAR_id ?>" />
                                    <div class="col-lg-12">
                                        <div class="col-lg-12"><h2>CLIENTE INFO</h2></div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Nombre</label>
                                                <input class="form-control" required id="txtname" value="<?php echo $VAR_name ?>" name="txtname" placeholder="Nombre Completo">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Mail</label>
                                                <input class="form-control"  type="mail" value="<?php echo $VAR_email ?>"  id="txtema1" name="txtema1"  placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Mobile</label>
                                                <input class="form-control"   id="txtmobi" value="<?php echo $VAR_mobile ?>" name="txtmobi" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Address</label>
                                                <input class="form-control" id="txtdire"  value="<?php echo $VAR_street ?>" name="txtdire" >
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Zip code</label>
                                                <input class="form-control" id="txtzip" name="txtzip" value="<?php echo $VAR_zipcode ?>" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>City</label>
                                                <input class="form-control" id="txtcity" name="txtcity"  value="<?php echo $VAR_city ?>" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Country</label>
                                                <input class="form-control" id="txtcoun" name="txtcoun" value="<?php echo $VAR_country ?>" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Forma de Pago</label>
                                                 <input class="form-control" id="txtpaym" name="txtpaym" value="<?php echo $VAR_payment ?>" placeholder="">
                                               <!--
                                                <select class="form-control" name="txtpaym" id="txtpaym" >
                                                      <?php mft_payment_method($VAR_payment) ?>
                                                </select>
                                                -->
                                            </div>
                                        </div>

                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label>Adults</label>
                                                <input class="form-control" value="<?php echo $VAR_adul ?>" name="txtadul" id="txtadul" >

                                            </div>
                                        </div>

                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label>Children</label>
                                                <input class="form-control" value="<?php echo $VAR_chil ?>" name="txtchil" id="txtchil" >

                                            </div>
                                        </div>

                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label>Enfants</label>
                                                <input class="form-control" value="<?php echo $VAR_enfa ?>"  name="txtenfa" id="txtenfa" >
                                            </div>
                                        </div>

                                     </div>




                                     <div class="col-lg-12">
                                        <div class="col-lg-12"><h2>SERVICIO INFO</h2></div>
                                              <div class="col-lg-6">
                                                      <div class="form-group">
                                                          <label>Pickup location</label>
                                                          <select class="form-control" name="txtorig1" id="txtorig1">

                                                             <optgroup label="Airports">              <?php  listado("airport-cancun" ,$VAR_orig1); ?>      </optgroup>
                                                             <optgroup label="Cancun Hotels">         <?php  listado("hotel-cancun"   ,$VAR_orig1); ?> </optgroup>
                                                             <optgroup label="Riviera Maya Hotels">   <?php  listado("hotel-riv-maya" ,$VAR_orig1); ?> </optgroup>
                                                             <optgroup label="Tulum Hotels">          <?php  listado("hotel-tulum"    ,$VAR_orig1); ?> </optgroup>
                                                          </select>
                                                      </div>
                                              </div>
                                              <div class="col-lg-6">
                                                      <div class="form-group">
                                                          <label>Drop off location</label>
                                                          <select class="form-control" name="txtdest1" id="txtdest1">

                                                             <optgroup label="Airports">              <?php  listado("airport-cancun" ,$VAR_dest1); ?>      </optgroup>
                                                             <optgroup label="Cancun Hotels">         <?php  listado("hotel-cancun"   ,$VAR_dest1); ?> </optgroup>
                                                             <optgroup label="Riviera Maya Hotels">   <?php  listado("hotel-riv-maya" ,$VAR_dest1); ?> </optgroup>
                                                             <optgroup label="Tulum Hotels">          <?php  listado("hotel-tulum"    ,$VAR_dest1); ?> </optgroup>
                                                          </select>
                                                      </div>
                                              </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Date</label>
                                                <input class="form-control" required type="date" name="txtdate1" value="<?php echo $VAR_date1 ?>"  id="txtdate1" placeholder="">
                                            </div>
                                       </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Time</label>
                                                <input class="form-control" required type="time" name="txttime1" id="txttime1" value="<?php echo $VAR_time1 ?>" placeholder="">
                                            </div>
                                       </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Airline</label>
                                                <input class="form-control" type="text" name="txtairl1" id="txtairl1" value="<?php echo $VAR_airl1 ?>" placeholder="">
                                            </div>
                                       </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Flight Number</label>
                                                <input class="form-control" type="text" name="txtvuel1" id="txtvuel1" value="<?php echo $VAR_vuel1 ?>" placeholder="">
                                            </div>
                                       </div>

                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Room</label>
                                                <input class="form-control" type="" value="<?php echo $VAR_room ?>" name="txtroom" id="txtroom" placeholder="">
                                            </div>
                                       </div>
                                    </div>
                                     <div class="col-lg-12">
                                        <div class="col-lg-12"><h2>OPERACIÓN INFO</h2></div>
                                              <div class="col-lg-3">
                                                      <div class="form-group">
                                                          <label>Estatus</label>
                                                          <select class="form-control" name="txtesta" id="txtesta">
                                						       <option <?php if($VAR_estatus =='abierta' ){echo "selected";} ?> value="abierta">Abierta</option>
                                						       <option <?php if($VAR_estatus =='cerrada' ){echo "selected";} ?> value="cerrada">Cerrada</option>

                                                          </select>
                                                      </div>
                                              </div>
                                              <div class="col-lg-3">
                                                      <div class="form-group">
                                                          <label>Pagado</label>
                                                          <select class="form-control" name="txtpaga" id="txtpaga">
                                						       <option <?php if($VAR_paga =='no' ){echo "selected";} ?> value="no">No</option>
                                						       <option <?php if($VAR_paga =='si' ){echo "selected"; } ?> value="si">Si</option>
                                                          </select>
                                                      </div>
                                              </div>
                                              <div class="col-lg-3">
                                                      <div class="form-group">

                                                      <div class="form-group">
                                                          <label>No. Econ.</label>
                                                          <!--<input class="form-control" type="text" name="txtnoec" value="<?php echo $VAR_noec ?>" id="txtnoec" placeholder="">-->
                                                          <select class="form-control" name="txtnoec" id="txtnoec">
                                                                <option value="|"> - Select -</option>
                                                                <?php
                                                                    $sql = "select * from _vehiculos order by veh_noec";
                                                                    $rs = adoopenrecordset($sql);
                                                                    while($rstemp = mysql_fetch_array($rs)){
                                                                        ?>
                                                                            <option value="<?php echo $rstemp["veh_nomb"] ?>|<?php echo $rstemp["veh_plac"] ?>|<?php echo $rstemp["veh_noec"] ?>"><?php echo $rstemp["veh_noec"] ?></option>
                                                                <?php
                                                                    }
                                                                ?>
                                                          </select>


                                                      </div>


                                                      </div>
                                              </div>
                                              <div class="col-lg-3">
                                                      <div class="form-group">
                                                          <label>Operador</label>
                                                         <input class="form-control" type="text" name="txtoper" value="<?php echo $VAR_oper ?>" id="txtoper" placeholder="">
                                                      </div>
                                              </div>



                                              <div class="col-lg-3">
                                                     <div class="form-group">
                                                          <label>Lead</label>
                                                           <select class="form-control" name="txtlead" id="txtlead">
                                                            <?php if($VAR_lead == "WEB"){ $VAR_XX ="selected";}else{ $VAR_XX="";} ?>
                                                            <option <?php echo $VAR_XX ?> >WEB</option>
                                                            <?php if($VAR_lead == "TELÉFONO"){ $VAR_XX ="selected";}else{ $VAR_XX="";} ?>
                                                            <option <?php echo $VAR_XX ?>>TELÉFONO</option>
                                                            <?php if($VAR_lead == "MAIL"){ $VAR_XX ="selected";}else{ $VAR_XX="";} ?>
                                                            <option <?php echo $VAR_XX ?>>MAIL</option>
                                                            <?php if($VAR_lead == "PERSONAL"){ $VAR_XX ="selected";}else{ $VAR_XX="";} ?>
                                                            <option <?php echo $VAR_XX ?>>PERSONAL</option>
                                                            <?php if($VAR_lead == "OTRO"){ $VAR_XX ="selected";}else{ $VAR_XX="";} ?>
                                                            <option <?php echo $VAR_XX ?>>OTRO</option>
                                                           </select>
                                                      </div>
                                              </div>


                                              <div class="col-lg-3">
                                                     <div class="form-group">
                                                          <label>Idioma</label>
                                                           <select class="form-control" name="txtidio" id="txtlead">
                                                            <?php if($VAR_idio == "EN"){ $VAR_XX ="selected";}else{ $VAR_XX="";} ?>
                                                            <option <?php echo $VAR_XX ?>>EN</option>
                                                            <?php if($VAR_idio == "ES"){ $VAR_XX ="selected";}else{ $VAR_XX="";} ?>
                                                            <option <?php echo $VAR_XX ?>>ES</option>
                                                            <?php if($VAR_idio == "FR"){ $VAR_XX ="selected";}else{ $VAR_XX="";} ?>
                                                            <option <?php echo $VAR_XX ?>>FR</option>
                                                            <?php if($VAR_idio == "OT"){ $VAR_XX ="selected";}else{ $VAR_XX="";} ?>
                                                            <option <?php echo $VAR_XX ?>>OT</option>
                                                           </select>

                                                      </div>
                                              </div>

                                              <div class="col-lg-3">
                                                     <div class="form-group">
                                                          <label># Confirm.</label>
                                                         <input class="form-control" type="text" name="txtconf" value="<?php echo $VAR_conf ?>" id="txtconf" placeholder="">
                                                      </div>
                                              </div>

                                              <div class="col-lg-3">
                                                     <div class="form-group">
                                                          <label>Cupón</label>
                                                         <input class="form-control" type="text" name="txtcupo" value="<?php echo $VAR_cupo ?>" id="txtcupo" placeholder="">
                                                      </div>
                                              </div>




                                              <div class="col-lg-6">
                                                      <div class="form-group">
                                                          <label>Agencia</label>
                                                          <input class="form-control" type="text" name="txtagen" value="<?php echo $VAR_agen ?>" id="txtagen" placeholder="">
                                                      </div>
                                              </div>

                                              <div class="col-lg-6">

                                                          <label>Placas</label>

                                                         <!--<input class="form-control" type="text" name="txtplac" value="<?php echo $VAR_plac ?>" id="txtplac" placeholder="">-->
                                                         <input type="text"  readonly class="form-control" value="<?php echo $VAR_plac ?>" name="txtplac" id="txtplac"/>

                                              </div>

                                              <div class="col-lg-6">
                                                      <div class="form-group">
                                                          <label>Vehículo</label>

                                                         <select class="form-control" name="txtvehi" id="txtvehi">
                                                            <?php mft_vehiculos($VAR_vehic)  ?>
                                                         </select>
                                                      </div>
                                              </div>

                                              <div class="col-lg-6">
                                                      <div class="form-group">
                                                          <label>Monto</label>
                                                          <input class="form-control" value="<?php echo $VAR_monto ?>" type="number" name="txtmont" id="txtmont" >
                                                      </div>
                                              </div>

                                            <!--
                                              <div class="col-lg-6">
                                                      <div class="form-group">
                                                          <label>Clave</label>
                                                          <input class="form-control" type="text" value="<?php echo $VAR_clave ?>" name="txtclave" id="txtclave" >
                                                      </div>
                                              </div>
                                              -->

                                              <div class="col-lg-6">
                                                      <div class="form-group">
                                                          <label>Orden Anexa</label>
                                                          <input class="form-control" type="text" value="<?php echo $VAR_ordanexa ?>" name="txtordanexa" id="txtordanexa" >
                                                      </div>
                                              </div>



                                              <div class="col-lg-12">
                                                      <div class="form-group">
                                                          <label>Comentarios</label>
                                                          <textarea class="form-control"  name="txtcome" id="txtcome" ><?php echo $VAR_come ?></textarea>
                                                      </div>
                                              </div>

                                     </div>


                                <div class="col-lg-12">
                                        <div class="col-lg-12"><h2>INFO FINANZAS</h2></div>
                                                  <div class="col-lg-3">
                                                         <div class="form-group">
                                                              <label>Cuenta</label>
                                                               <select class="form-control" name="txtcta" id="txtcta">
                                                                <option <?php if($VAR_cta=="cxc"){echo "selected";} ?> value="cxc" >Cliente</option>
                                                                <option <?php if($VAR_cta=="cxp"){echo "selected";} ?> value="cxp" >Proveedor</option>
                                                                <option <?php if($VAR_cta=="cor"){echo "selected";} ?> value="cor" >Cortesia</option>
                                                               </select>

                                                          </div>
                                                  </div>

                                                  <div class="col-lg-3">
                                                         <div class="form-group">
                                                              <label>Costo</label>
                                                              <input class="form-control" type="text" value="<?php echo $VAR_costo ?>" name="txtcosto" id="txtcosto" >
                                                          </div>
                                                  </div>
                                                  <div class="col-lg-3">
                                                         <div class="form-group">
                                                              <label>Gasolina</label>
                                                              <input class="form-control" type="text"  value="<?php echo $VAR_gasolina ?>"  name="txtgasolina" id="txtgasolina" >
                                                          </div>
                                                  </div>

                                                  <div class="col-lg-3">
                                                         <div class="form-group">
                                                              <label>Sueldo</label>
                                                              <input class="form-control" type="text"  value="<?php echo $VAR_sueldo ?>"  name="txtsueldo" id="txtsueldo" >
                                                          </div>
                                                  </div>

                                                  <div class="col-lg-3">
                                                         <div class="form-group">
                                                              <label>Litros</label>
                                                              <input class="form-control" type="text"  value="<?php echo $VAR_litros ?>"  name="txtlitros" id="txtlitros" >
                                                          </div>
                                                  </div>

                                                  <div class="col-lg-3">
                                                         <div class="form-group">
                                                              <label>KI</label>
                                                              <input class="form-control" type="text"  value="<?php echo $VAR_ki ?>"  name="txtki" id="txtki" >
                                                          </div>
                                                  </div>

                                                  <div class="col-lg-3">
                                                         <div class="form-group">
                                                              <label>KF</label>
                                                              <input class="form-control" type="text"  value="<?php echo $VAR_kf ?>"  name="txtkf" id="txtkf" >
                                                          </div>
                                                  </div>


                                                  <div class="col-lg-3">
                                                         <div class="form-group">
                                                              <label>Estimado</label>
                                                              <input class="form-control" type="text"  value="<?php echo $VAR_estimado ?>"  name="txtestimado" id="txtestimado" >
                                                          </div>
                                                  </div>

                                                  <div class="col-lg-3">
                                                         <div class="form-group">
                                                              <label>Pagado</label>
                                                               <select class="form-control" name="txtpagado" id="txtpagado">
                                                                <option value="si" <?php if($VAR_pagado=="si"){echo "selected";} ?> >Si</option>
                                                                <option value="no" <?php if($VAR_pagado=="no"){echo "selected";} ?> >No</option>
                                                               </select>
                                                          </div>
                                                  </div>

                                                  <!--
                                                  <div class="col-lg-3">
                                                         <div class="form-group">
                                                              <label>Forma de Pago</label>
                                                               <select class="form-control" name="txtformapago" id="txtformapago">
                                                                <option value="efe" <?php if($VAR_formapago=="efe"){echo "selected";} ?>>Efectivo</option>
                                                                <option value="tc"  <?php if($VAR_formapago=="tc"){echo "selected";} ?>>Tarjeta de Credito</option>
                                                                <option value="ot"  <?php if($VAR_formapago=="ot"){echo "selected";} ?>>Otro</option>
                                                               </select>
                                                          </div>
                                                  </div>  -->

                                                  <div class="col-lg-3">
                                                         <div class="form-group">
                                                              <label>Fecha de Pago</label>
                                                              <input class="form-control" type="date"  value="<?php echo $VAR_fechapago ?>"  name="txtfechapago" id="txtfechapago" >
                                                          </div>
                                                  </div>
                                                 <!--
                                                  <div class="col-lg-3">
                                                         <div class="form-group">
                                                              <label>Proveedor:</label>
                                                              <input class="form-control" type="text"   value="<?php echo ($VAR_proveedor) ?>"  name="txtproveedor" id="txtproveedor" >
                                                          </div>
                                                  </div>
                                                 -->

                                                  <div class="col-lg-3">
                                                         <div class="form-group">
                                                              <label>Clave</label>
                                                              <table>
                                                                <tr>
                                                                    <td>CC&nbsp;</td>
                                                                    <td><input size="4" class="form-control" value="<?php echo $VAR_cve ?>" type="text" name="txtcve" id="txtcve" ></td>
                                                                    <td>&nbsp;BB&nbsp;</td>
                                                                    <td><input size="3" class="form-control" value="<?php echo $VAR_cve2 ?>" type="text" name="txtcve2" id="txtcve2" ></td>
                                                                    <td></td>
                                                                </tr>
                                                              </table>

                                                          </div>
                                                  </div>



                                                  <div class="col-lg-3">
                                                         <div class="form-group">
                                                              <label>RECORRIDO:</label>
                                                              <input class="form-control" type="text"  readonly value="<?php echo ($VAR_kf-$VAR_ki) ?>"  name="txtfechapago" id="txtfechapago" >
                                                          </div>
                                                  </div>

                                                  <div class="col-lg-3">
                                                         <div class="form-group">
                                                              <label>DIF. DE CONSUMO:</label>
                                                              <input class="form-control" type="text"  readonly value="<?php echo ($VAR_gasolina-$VAR_estimado) ?>"  name="txtfechapago" id="txtfechapago" >
                                                          </div>
                                                  </div>

                                                  <div class="col-lg-3">
                                                         <div class="form-group">
                                                              <label>UTILIDAD:</label>
                                                              <input class="form-control" type="text"  readonly value="<?php echo ($VAR_costo-$VAR_gasolina-$VAR_sueldo) ?>"  name="txtfechapago" id="txtfechapago" >
                                                          </div>
                                                  </div>

                                                  <div class="col-lg-3">
                                                         <div class="form-group">
                                                              <label>RENDIMIENTO:</label>
                                                              <input class="form-control" type="text"  readonly value="<?php
                                                                      if($VAR_gasolina>0&&($VAR_kf-$VAR_ki)>0){
                                                                        echo number_format($VAR_gasolina/($VAR_kf-$VAR_ki),2);
                                                                      }else{
                                                                        echo "0";
                                                                      }

                                                                        ?>"  name="txtfechapago" id="txtfechapago" >
                                                          </div>
                                                  </div>

                                     </div>



                                    <div class="col-lg-12">
                                       <button type="submit" class="btn btn-primary btn-lg btn-block">Guardar</button>
                                    </div>

                                   </form>
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
            <!-- /.row -->
        </div>



    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>


<script src="alertifyjs/alertify.min.js"></script>
<link rel="stylesheet" href="alertifyjs/css/alertify.min.css" />
<link rel="stylesheet" href="alertifyjs/css/themes/default.min.css" />


</body>


<script>



 function borrar(ID){




             alertify.confirm('MFTSYS', 'Desea eliminar la orden', function(){
              var arch = 'update-orden-borrar.php?&i='+ID;
                   $.get(arch);


                    window.location.href='listado.php';


            }
              ,''  );



    };

</script>
</html>
