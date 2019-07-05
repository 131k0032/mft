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

        <div id="page-wrapper">

            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">

                        <div class="panel-heading">
                            Ingrese toda la información
                        </div>
                        <div class="panel-body">
                            <div class="row">

                                    <?php

                                                    $VAR_id ="";
                                                    $VAR_estatus  = "";
                                                    $VAR_tipo     = "";
                                                    $VAR_num      = "";
                                                    $VAR_name     = "";
                                                    $VAR_mobile   = "";
                                                    $VAR_email    = "";
                                                    $VAR_street   = "";
                                                    $VAR_zipcode  = "";
                                                    $VAR_city     = "";
                                                    $VAR_country  = "";
                                                    $VAR_date1    = "";
                                                    $VAR_time1    = "";
                                                    $VAR_orig1    = "CANCUN AIRPORT";
                                                    $VAR_dest1    = "";
                                                    $VAR_airl1    = "";
                                                    $VAR_vuel1    = "";
                                                    $VAR_adul     = "";
                                                    $VAR_chil     = "";
                                                    $VAR_enfa    = "";
                                                    $VAR_vehic   = "";
                                                    $VAR_monto   = "";
                                                    $VAR_payment = "";
                                                    $VAR_leido   = "";
                                                    $VAR_paga    = "";
                                                    $VAR_plac    = "";
                                                    $VAR_oper    = "";
                                                    $VAR_noec    = "";
                                                    $VAR_agen    = "";
                                                    $VAR_come     = "";
                                                    $VAR_room      = "";
                                                    $VAR_ordanexa  = "";
                                                    $VAR_lead      = "";
                                                    $VAR_idio      = "";
                                                    $VAR_conf      = "";
                                                    $VAR_cupo      = "";
                                                    $VAR_usuario   = "";
                                                    $VAR_costo     = "0";
                                                    $VAR_gasolina  = "0";
                                                    $VAR_sueldo    = "0";
                                                    $VAR_litros    = "0";
                                                    $VAR_ki        = "0";
                                                    $VAR_kf        = "0";
                                                    $VAR_estimado  = "0";
                                                    $VAR_pagado    = "0";
                                                    $VAR_fechapago  = "";
                                                    $VAR_formadepago = "";
                                                    $VAR_cta         = "";
                                                    $VAR_proveedor   = "";
                                                    $VAR_cve        = "";
                                                    $VAR_cve2       = "";
                                                    $VAR_cont       = "";



                                        $VAR_ACC = "new";
                                        if(isset($_GET["t"])){

                                                $VAR_ACC="gua";
                                                $sql="select * from _transfers where id = ".$_GET["t"];
                                                $rs = adoopenrecordset($sql);
                                                $rstemp = mysql_fetch_array($rs);

                                                    $VAR_id       = $rstemp["id"];
                                                    $VAR_estatus  = $rstemp["estatus"];
                                                    $VAR_tipo     = $rstemp["tipo"];
                                                    $VAR_num      = $rstemp["num"];
                                                    $VAR_name     = $rstemp["name"];
                                                    $VAR_mobile   = $rstemp["mobile"];
                                                    $VAR_email    = $rstemp["email"];
                                                    $VAR_street   = $rstemp["street"];
                                                    $VAR_zipcode  = $rstemp["zipcode"];
                                                    $VAR_city     = $rstemp["city"];
                                                    $VAR_country  = $rstemp["country"];
                                                    $VAR_date1    = $rstemp["date1"];
                                                    $VAR_time1    = $rstemp["time1"];
                                                    $VAR_orig1    = $rstemp["orig1"];
                                                    $VAR_dest1    = $rstemp["dest1"];
                                                    $VAR_airl1    = $rstemp["airl1"];
                                                    $VAR_vuel1    = $rstemp["vuel1"];
                                                    $VAR_adul     = $rstemp["adul"];
                                                    $VAR_chil     = $rstemp["chil"];
                                                    $VAR_enfa     = $rstemp["enfa"];
                                                    $VAR_vehic    = $rstemp["vehic"];
                                                    $VAR_monto    = $rstemp["monto"];
                                                    $VAR_payment  = $rstemp["payment"];
                                                    $VAR_leido    = $rstemp["leido"];
                                                    $VAR_paga     = $rstemp["paga"];
                                                    $VAR_plac     = $rstemp["plac"];
                                                    $VAR_oper     = $rstemp["oper"];
                                                    $VAR_noec     = $rstemp["noec"];
                                                    $VAR_agen     = $rstemp["agen"];
                                                    $VAR_come     = $rstemp["come"];
                                                    $VAR_room     = $rstemp["room"];
                                                    $VAR_ordanexa = $rstemp["ordanexa"];
                                                    $VAR_lead     = $rstemp["lead"];
                                                    $VAR_idio     = $rstemp["idio"];
                                                    $VAR_conf     = $rstemp["conf"];
                                                    $VAR_cupo     = $rstemp["cupo"];
                                                    $VAR_usuario  = $rstemp["usuario"];
                                                    $VAR_costo    = $rstemp["costo"];
                                                    $VAR_gasolina = $rstemp["gasolina"];
                                                    $VAR_sueldo   = $rstemp["sueldo"];
                                                    $VAR_litros   = $rstemp["litros"];
                                                    $VAR_ki       = $rstemp["ki"];
                                                    $VAR_kf       = $rstemp["kf"];
                                                    $VAR_estimado = $rstemp["estimado"];
                                                    $VAR_pagado   = $rstemp["pagado"];
                                                    $VAR_fechapago  = $rstemp["fechapago"];
                                                    $VAR_formadepago = $rstemp["formadepago"];
                                                    $VAR_cta         = $rstemp["cta"];
                                                    $VAR_proveedor   = $rstemp["pro_nomb"];
                                                    $VAR_cve        = $rstemp["cve"];
                                                    $VAR_cve2       = $rstemp["cve2"];
                                                    $VAR_tipoVeh    = $rstemp["tipo_veh"];
                                                    $VAR_cont       = $rstemp["contacto_prov"];


                                        }


                      if(isset($_GET["m"])){

                                      $continue = true;
                                      $validation = "";

                                      if(empty($_POST['txtnomb'])){
                                      	$continue = false;
                                      	$validation = "First Name, ";
                                      }
                                      if(empty($_POST['txtmail'])){
                                      	$continue = false;
                                      	$validation .= "Email Address, ";
                                      }



                                      // Validation OK, send email

                                      if($continue===true){

                                      	require 'email/phpmailer/PHPMailerAutoload.php';

                                      	// Hotel Details


                                      	$hotel_email = "reservacionesmft@mft.com.mx";

                                      	// Send Email to Guest





                                      	$message = file_get_contents('email/template-registro.php');

                                      	$message = str_replace('[txtnomb]', $_POST['txtnomb'], $message);
                                      	$message = str_replace('[txtnip]', $VAR_NIP, $message);


                                      	$mail = new PHPMailer;
                                      	$mail->setFrom($hotel_email, 'SEIKOU');
                                      	$mail->addAddress($_POST['txtmail'], $_POST['txtnomb']);
                                      	$mail->Subject = ' Registro SEIKOU';
                                      	$mail->MsgHTML($message);
                                      	$mail->IsHTML(true);
                                        //	$mail->send();





                                      	if (!$mail->send()) {
                                      		$alert = "<div class='alert error'><i class='fa fa-exclamation-circle'></i> <strong>There was an error, please call us to make a booking.</strong></div>";
                                      	}
                                      	else {
                                      		$alert = "<div class='alert success'><i class='fa fa-check-circle'></i> <strong>Thank you for your booking request, we will get back to you as soon as possible.</strong> To avoid missing out, please give us a call so that we may assist you sooner.</div>";
                                      	}
                                      }
                                      else {
                                      	$alert = "<div class='alert validate'><i class='fa fa-exclamation-circle'></i> Please fill out the following fields: <strong>".$validation."</strong></div>";
                                      }
                              }

                                    ?>
                        <div class="panel-heading" style="text-align:right">
                          <button   onclick="enviarpdf(<?php echo $_GET["t"] ?>)"  ><span class="fa fa-file-pdf-o" ></span></button>
                            <button   onclick="enviarmail(<?php echo $_GET["t"] ?>)"  ><span class="fa fa-envelope-o" ></span></button>

                            <button   onclick="borrar(<?php echo $_GET["t"] ?>)"  ><span class="fa fa-trash" ></span></button>
                        </div>
                                <form role="form" method="post" action="guardar-servicio.php?t=<?php echo $VAR_id ?>">
                                    <input type="hidden" name="txtacc" value="<?php echo $VAR_ACC ?>" />


                                    <div class="col-lg-12">
           <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">SERVICIO # <?php echo $VAR_id; ?></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>


                                        <div class="col-lg-6">
                                            <div class="form-group">
                                            <?php  // echo "--->". $VAR_tipo  ?>
                                                <label>Tipo Servicio</label>
                                                    <select class="form-control" id="txttipo" name="txttipo">
                                                      <!-- <option value="<?php echo $VAR_tipo ?>"><?php echo $VAR_tipo ?></option> -->

                                                          <option <?php if($VAR_tipo=="ll"){echo "selected";} ?> value="ll"    >LL - Llegada</option>
                                                          <option <?php if($VAR_tipo=="sl"){echo "selected";} ?> value="sl"    >SL - Salida</option>
                                                          <option <?php if($VAR_tipo=="tr"){echo "selected";} ?> value="tr"    >TR - Transfer</option>
                                                          <option <?php if($VAR_tipo=="ow"){echo "selected";} ?> value="ow"    >OW - One Way</option>
                                                          <option <?php if($VAR_tipo=="rt-ll"){echo "selected";} ?> value="rt-ll"    >RT-LL - Round Trip Llegada</option>
                                                          <option <?php if($VAR_tipo=="rt-sl"){echo "selected";} ?> value="rt-sl"    >RT-SL - Round Trip Salida</option>
                                                          <option <?php if($VAR_tipo=="tour"){echo "selected";} ?> value="tour"  >TOUR - Tour</option>
                                                          <option <?php if($VAR_tipo=="sa"){echo "selected";} ?> value="sa"    >SA - Servicio Abierto</option>
                                                          <option <?php if($VAR_tipo=="cir"){echo "selected";} ?> value="cir"   >CIR - Circuito</option>                                                          
                                                    </select>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Capturó:</label>
                                                   <input class="form-control" value="<?php echo $VAR_usuario ?>" readonly id="txtusu" name="txtusu" placeholder="USUARIO 1">
                                            </div>
                                        </div>


                                    </div>
                                    <div class="col-lg-12">
                                        <div class="col-lg-12"><h2>INFO DE CLIENTE</h2></div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Nombre</label>
                                                <input class="form-control" value="<?php echo $VAR_name ?>" required id="txtname" name="txtname" placeholder="Nombre Completo">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Mail</label>
                                                <input class="form-control" value="<?php echo $VAR_email ?>"  type="mail"  id="txtema1" name="txtema1"  placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Mobile</label>
                                                <input class="form-control"  value="<?php echo $VAR_mobile ?>"  id="txtmobi" name="txtmobi" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Address</label>
                                                <input class="form-control" id="txtdire" value="<?php echo $VAR_street ?>"  name="txtdire" >
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Zip code</label>
                                                <input class="form-control" id="txtzip" value="<?php echo $VAR_zipcode ?>" name="txtzip" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>City</label>
                                                <input class="form-control" id="txtcity" name="txtcity" value="<?php echo $VAR_city ?>" placeholder="">
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
                                                 <input class="form-control" id="txtpaym" name="txtpaym" value="<?php echo $VAR_formadepago ?>" placeholder="">
                                                <!--
                                                <select class="form-control" name="txtpaym" id="txtpaym" >
                                                      <?php mft_payment_method() ?>
                                                </select>                          -->
                                            </div>
                                        </div>

                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label>Adults</label>
                                                  <input class="form-control" id="txtadul" name="txtadul" value="<?php echo $VAR_adul ?>" placeholder="">


                                            </div>
                                        </div>

                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label>Children</label>
                                                 <input class="form-control" id="txtchil" name="txtchil" value="<?php echo $VAR_chil ?>" placeholder="">

                                            </div>
                                        </div>
                                       <!--
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label>Enfants</label>
                                                 <input class="form-control" id="txtenfa" name="txtenfa" value="<?php echo $VAR_enfa ?>" placeholder="">


                                            </div>
                                        </div>
                                        -->

                                     </div>




                                     <div class="col-lg-12">
                                        <div class="col-lg-12"><h2>DEPARTURE INFO</h2></div>
                                              <div class="col-lg-6">
                                                      <div class="form-group">
                                                          <label>Pickup location</label>
                                                          <select class="form-control" name="txtorig1" id="txtorig1">


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
                                                          <select class="form-control" name="txtdest1" id="txtdest1">



                                                             <optgroup label="Airports">                   <?php  listado("airport-cancun"       ,$VAR_dest1); ?>      </optgroup>
                                                             <optgroup label="Cancun Hotels">              <?php  listado("hotel-cancun"   ,$VAR_dest1); ?> </optgroup>
                                                             <optgroup label="Riviera Maya Hotels">        <?php  listado("hotel-riv-maya" ,$VAR_dest1); ?> </optgroup>
                                                             <optgroup label="Tulum Hotels">               <?php  listado("hotel-tulum"    ,$VAR_dest1); ?> </optgroup>
                                                             <optgroup label="PDC Hotels">                 <?php  listado("hotel-pdc"    ,$VAR_dest1); ?> </optgroup>
                                                             <optgroup label="Playacar Hotels">            <?php  listado("hotel-playacar"    ,$VAR_dest1); ?> </optgroup>
                                                             <optgroup label="Flamengo Hotels">            <?php  listado("hotel-flamengo"    ,$VAR_dest1); ?> </optgroup>
                                                             <optgroup label="Puerto Aventuras Hotels">    <?php  listado("hotel-puerto-aventuras"    ,$VAR_dest1); ?> </optgroup>
                                                             <optgroup label="Puerto Morelos Hotels">      <?php  listado("hotel-puerto-morelos"    ,$VAR_dest1); ?> </optgroup>


                                                             <optgroup label="Tours">
                                                                     <?php
                                                                        mft_combo_tours($VAL)
                                                                     ?>

                                                             </optgroup>
                                                          </select>
                                                      </div>
                                              </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Date</label>
                                                <input class="form-control"  value="<?php echo $VAR_date1 ?>" required type="date" name="txtdate1" id="txtdate1" placeholder="">
                                            </div>
                                       </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Time</label>
                                                <input class="form-control" required pattern="([01]?[0-9]|2[0-3]):[0-5][0-9]" value="<?php echo $VAR_time1 ?>" placeholder="hh:mm" type="text" name="txttime1" id="txttime1" >
                                            </div>
                                       </div>

                                     <!---
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Vuelo</label>
                                                <input class="form-control" type="text" name="txtairl1" id="txtairl1" placeholder="">
                                            </div>
                                       </div>
                                     -->

                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Vuelo</label>
                                                <input class="form-control" type="text" value="<?php echo $VAR_vuel1 ?>" name="txtvuel1" id="txtvuel1" placeholder="">
                                            </div>
                                       </div>

                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Room</label>
                                                <input class="form-control" type="" name="txtroom" value="<?php echo $VAR_room ?>" id="txtroom" placeholder="">
                                            </div>
                                       </div>



                                     </div>

                                <div class="col-lg-12" id="return">
                                        <div class="col-lg-12"><h2>RETURN INFO</h2></div>
                                              <div class="col-lg-6">
                                                      <div class="form-group">
                                                          <label>Pickup location</label>
                                                          <select class="form-control" name="txtorig2" id="txtorig2">
                              						       <option selected>&nbsp;</option>
                                                             <optgroup label="Airports">              <?php  listado("airport-cancun"       ,$VAR_DEST1); ?>      </optgroup>
                                                             <optgroup label="Cancun Hotels">         <?php  listado("hotel-cancun"   ,$VAR_DEST1); ?> </optgroup>
                                                             <optgroup label="Riviera Maya Hotels">   <?php  listado("hotel-riv-maya" ,$VAR_DEST1); ?> </optgroup>
                                                             <optgroup label="Tulum Hotels">          <?php  listado("hotel-tulum"    ,$VAR_DEST1); ?> </optgroup>
                                                          </select>
                                                      </div>
                                              </div>
                                              <div class="col-lg-6">
                                                      <div class="form-group">
                                                          <label>Drop off location</label>
                                                          <select class="form-control" name="txtdest2" id="txtdest2">
                              						       <option selected>&nbsp;</option>
                                                             <optgroup label="Airports">              <?php  listado("airport-cancun"       ,$VAR_DEST1); ?>      </optgroup>
                                                             <optgroup label="Cancun Hotels">         <?php  listado("hotel-cancun"   ,$VAR_DEST1); ?> </optgroup>
                                                             <optgroup label="Riviera Maya Hotels">   <?php  listado("hotel-riv-maya" ,$VAR_DEST1); ?> </optgroup>
                                                             <optgroup label="Tulum Hotels">          <?php  listado("hotel-tulum"    ,$VAR_DEST1); ?> </optgroup>
                                                          </select>
                                                      </div>
                                              </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Date</label>
                                                <input class="form-control" type="date"  name="txtdate2" id="txtdate2" placeholder="">
                                            </div>
                                       </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Time</label>
                                                <input class="form-control" type="time"  name="txttime2" id="txttime2" placeholder="">
                                            </div>
                                       </div>
                                      <!--
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Airline</label>
                                                <input class="form-control" type="" name="txtairl2" id="txtairl2" placeholder="">
                                            </div>
                                       </div>
                                       -->
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Vuelo</label>
                                                <input class="form-control" type="" name="txtvuel2" id="txtvuel2" placeholder="">
                                            </div>
                                       </div>

                                     </div>


                                     <div class="col-lg-12">
                                        <div class="col-lg-12"><h2>INFO DE OPERACIÓN</h2></div>
                                              <div class="col-lg-3">
                                                      <div class="form-group">
                                                          <label>Estatus</label>
                                                          <select class="form-control" name="txtesta" id="txtesta">
                                						       <option <?php if($VAR_estatus=="abierta"){echo "selected";} ?> value="abierta">Abierta</option>
                                						       <option <?php if($VAR_estatus=="cerrada"){echo "selected";} ?> value="cerrada">Cerrada</option>
                                						       <option <?php if($VAR_estatus=="terminada"){echo "selected";} ?> value="terminada">Terminada</option>
                                						       <option <?php if($VAR_estatus=="cancelada"){echo "selected";} ?> value="cancelada">Cancelada</option>

                                                          </select>
                                                      </div>
                                              </div>
                                              <div class="col-lg-3">
                                                      <div class="form-group">
                                                          <label>Pagado (cliente)</label>
                                                          <select class="form-control" name="txtpaga" id="txtpaga">
                                						       <option <?php if($VAR_paga=="no"){echo "selected";} ?> value="no">No</option>
                                						       <option <?php if($VAR_paga=="si"){echo "selected";} ?> value="si">Si</option>
                                                          </select>
                                                      </div>
                                              </div>

                                              <div class="col-lg-3">
                                                      <div class="form-group">
                                                          <label>No. Eco.</label>
                                                          <input type="text" value="<?php echo $VAR_noec ?>"  class="form-control" name="txtnoec" id="txtnoec"/>

                                                        <!--  <select class="form-control" name="txtnoec" id="txtnoec">
                                                                <option value="||"> - Select -</option>
                                                                <?php
                                                                    $sql = "select * from _vehiculos order by veh_noec";
                                                                    $rs = adoopenrecordset($sql);
                                                                    while($rstemp = mysql_fetch_array($rs)){
                                                                        ?>
                                                                            <option   <?php if($VAR_noec==$rstemp["veh_noec"] ){echo "selected";} ?>  value="<?php echo $rstemp["veh_nomb"] ?>|<?php echo $rstemp["veh_plac"] ?>|<?php echo $rstemp["veh_noec"] ?>"><?php echo $rstemp["veh_noec"] ?></option>
                                                                <?php
                                                                    }
                                                                ?>
                                                          </select>
                                                         -->


                                                      </div>
                                              </div>


                                              <div class="col-lg-3">
                                                      <div class="form-group">
                                                          <label>Placas</label>
                                                          <input type="text" value="<?php echo $VAR_plac ?>"  class="form-control" name="txtplac" id="txtplac"/>

                                                      </div>
                                              </div>



                                       <div class="col-lg-3">
                                                     <div class="form-group">
                                                          <label>Lead</label>
                                                           <select class="form-control" name="txtlead" id="txtlead">
                                                            <option <?php if($VAR_lead=="WEB" ){echo "selected";} ?> >WEB</option>
                                                            <option <?php if($VAR_lead=="TELÉFONO" ){echo "selected";} ?> >TELÉFONO</option>
                                                            <option <?php if($VAR_lead=="MAIL" ){echo "selected";} ?> >MAIL</option>
                                                            <option <?php if($VAR_lead=="PERSONAL" ){echo "selected";} ?> >PERSONAL</option>
                                                            <option <?php if($VAR_lead=="OTRO" ){echo "selected";} ?> >OTRO</option>
                                                           </select>
                                                      </div>
                                              </div>


                                              <div class="col-lg-3">
                                                     <div class="form-group">
                                                          <label>Idioma</label>
                                                           <select class="form-control" name="txtidio" id="txtlead">
                                                            <option <?php if($VAR_lead=="EN" ){echo "selected";} ?> >EN</option>
                                                            <option <?php if($VAR_lead=="ES" ){echo "selected";} ?> >ES</option>
                                                            <option <?php if($VAR_lead=="FR" ){echo "selected";} ?> >FR</option>
                                                            <option <?php if($VAR_lead=="OT" ){echo "selected";} ?> >OT</option>
                                                           </select>

                                                      </div>
                                              </div>

                                              <div class="col-lg-3">
                                                     <div class="form-group">
                                                          <label># Confirm.</label>
                                                         <input class="form-control" value="<?php echo $VAR_conf ?>"  type="text" name="txtconf" value="" id="txtconf" placeholder="">
                                                      </div>
                                              </div>

                                              <div class="col-lg-3">
                                                     <div class="form-group">
                                                          <label>Cupón</label>
                                                         <input class="form-control" type="text" value="<?php echo $VAR_cupo ?>"  name="txtcupo" value="" id="txtcupo" placeholder="">
                                                      </div>
                                              </div>


                                              <div class="col-lg-6">
                                                      <div class="form-group">
                                                          <label>Agencia</label>
                                                          <!--
                                                          <input class="form-control" type="text" name="txtagen" id="txtagen" placeholder="">
                                                          -->

                                                      <!--    <input type="text" value="<?php echo $VAR_agen ?>"  class="form-control" name="txtagen" id="txtagen"/> -->



                                                            <select class="form-control" name="txtagen" id="txtagen">
                                                                 <?php

                                                                        $sql="select * from _clientes order by cli_nomb";
                                                                        $rs = adoopenrecordset($sql);
                                                                        while($rstemp = mysql_fetch_array($rs)){

                                                                ?>

                                                                           <option value="<?php echo $rstemp["cli_nomb"] ?>"><?php echo $rstemp["cli_nomb"] ?></option>


                                                                <?php
                                                                        }

                                                                 ?>

                                                            </select>


                                                          <!--
                                                          <select class="form-control" name="txtagen" id="txtagen">




                                                                <option value="|"> - Select -</option>
                                                                <?php
                                                                    $sql = "select * from _clientes order by cli_nomb";
                                                                    $rs = adoopenrecordset($sql);
                                                                    while($rstemp = mysql_fetch_array($rs)){
                                                                        ?>
                                                                            <option <?php if($VAR_agen==$rstemp["cli_nomb"] ){echo "selected";} ?> value="<?php echo $rstemp["cli_nomb"] ?>"><?php echo $rstemp["cli_nomb"] ?></option>
                                                                <?php
                                                                    }
                                                                ?>
                                                          </select>
                                                          -->
                                                      </div>
                                              </div>

                                              <div class="col-lg-6">
                                                      <div class="form-group">
                                                          <label>Operador</label>
                                                      <!--
                                                         <input class="form-control" type="text" name="txtoper" value="<?php echo $VAR_oper ?>" id="txtoper" placeholder="">
                                                     -->
                                                            <select class="form-control" name="txtoper" id="txtoper">
                                                                 <?php

                                                                        $sql="select * from _operadores order by ope_nomb";
                                                                        $rs = adoopenrecordset($sql);
                                                                        while($rstemp = mysql_fetch_array($rs)){

                                                                ?>

                                                                           <option value="<?php echo $rstemp["ope_nomb"] ?>"><?php echo $rstemp["ope_nomb"] ?></option>


                                                                <?php
                                                                        }

                                                                 ?>

                                                            </select>


                                                       <!--
                                                          <select class="form-control" name="txtoper" id="txtoper">
                                                                <option value="|"> - Select -</option>
                                                                <?php
                                                                    $sql = "select * from _operadores order by ope_nomb";
                                                                    $rs = adoopenrecordset($sql);
                                                                    while($rstemp = mysql_fetch_array($rs)){
                                                                        ?>
                                                                            <option <?php if($VAR_oper==$rstemp["ope_nomb"] ){echo "selected";} ?> value="<?php echo $rstemp["ope_nomb"] ?>"><?php echo $rstemp["ope_nomb"] ?></option>
                                                                <?php
                                                                    }
                                                                ?>
                                                          </select>
                                                         -->




                                                      </div>
                                              </div>


      

                                              <div class="col-lg-6"> <!-- txtvehi -->
                                                      <div class="form-group">
                                                          <label>Vehículo</label>
                                                          <select class="form-control" name="txtvehi" id="txtvehi">
                                                            <option selected value="<?php echo $VAR_tipoVeh ?>"><?php echo $VAR_tipoVeh ?></option>

                                                            <?php
                                                                    $sql = "SELECT * FROM _c_vehiculo WHERE nombreVehiculo != '{$VAR_tipoVeh}'";
                                                                    $rs = adoopenrecordset($sql);
                                                                    while($rstemp = mysql_fetch_array($rs)){
                                                                        ?>
                                                                            <option value="<?php echo $rstemp["nombreVehiculo"] ?>"><?php echo $rstemp["nombreVehiculo"] ?></option>
                                                                <?php
                                                                    }
                                                                ?>
                                                          </select>

                                                      </div>
                                              </div>
                                                <div class="col-lg-6"> <!-- txtprov -->
                                                      <div class="form-group">
                                                          <label>Proveedor</label>
                                                          <select class="form-control" name="txtprov" id="txtprov">
                                                            <option selected value="<?php echo $VAR_proveedor ?>"><?php echo $VAR_proveedor ?></option>

                                                            <?php
                                                                    $sql = "SELECT * FROM _proveedores WHERE pro_nomb != '{$VAR_proveedor}'";
                                                                    $rs = adoopenrecordset($sql);
                                                                    while($rstemp = mysql_fetch_array($rs)){
                                                                        ?>
                                                                            <option value="<?php echo $rstemp["pro_nomb"] ?>"><?php echo $rstemp["pro_nomb"] ?></option>
                                                                <?php
                                                                    }
                                                                ?>
                                                          </select>

                                                      </div>
                                              </div>

                                              <div class="col-lg-6">
                                                      <div class="form-group">
                                                          <label>Monto</label>
                                                          <input class="form-control" value="<?php echo $VAR_mont ?>" type="number" name="txtmont" id="txtmont" >
                                                      </div>
                                              </div>

                                              <div class="col-lg-6">
                                                      <div class="form-group">
                                                          <label>Contacto</label>
                                                          <input class="form-control" value="<?php echo $VAR_cont ?>" type="text" name="txtcont" id="txtcont" >
                                                      </div>
                                              </div>
                                              <!--
                                              <div class="col-lg-6">
                                                      <div class="form-group">
                                                          <label>Clave</label>
                                                          <input class="form-control" type="text" name="txtclave" id="txtclave" >
                                                      </div>
                                              </div>

                                              <div class="col-lg-6">
                                                      <div class="form-group">
                                                          <label>Orden Anexa</label>
                                                          <input class="form-control" type="text" name="txtordanexa" id="txtordanexa" >
                                                      </div>
                                              </div>
                                                -->




                                              <div class="col-lg-12">
                                                      <div class="form-group">
                                                          <label>Comentarios</label>
                                                          <textarea class="form-control" name="txtcome"  id="txtcome" ><?php echo  $VAR_come ?></textarea>
                                                      </div>
                                              </div>

                                     </div>

                                     <div class="col-lg-12">
                                        <div class="col-lg-12"><h2>INFO FINANZAS</h2></div>
                                                  <div class="col-lg-3">
                                                         <div class="form-group">
                                                              <label>Cuenta</label>
                                                               <select class="form-control" name="txtcta" id="txtcta">
                                                                <option  <?php if($VAR_cta=="cxc" ){echo "selected";} ?> value="cxc" >Cliente (CxC)</option>
                                                                <option  <?php if($VAR_cta=="cxp" ){echo "selected";} ?> value="cxp" >Proveedor (CxP)</option>

                                                               </select>

                                                          </div>
                                                  </div>

                                                  <div class="col-lg-3">
                                                         <div class="form-group">
                                                              <label>Costo</label>
                                                              <input class="form-control"  value="<?php echo $VAR_costo ?>" required   type="text" name="txtcosto" id="txtcosto" >
                                                          </div>
                                                  </div>
                                                  <div class="col-lg-3">
                                                         <div class="form-group">
                                                              <label>Gasolina</label>
                                                              <input class="form-control" value="<?php echo $VAR_gasolina ?>" required  type="text" name="txtgasolina" id="txtgasolina" >
                                                          </div>
                                                  </div>

                                                  <div class="col-lg-3">
                                                         <div class="form-group">
                                                              <label>Sueldo</label>
                                                              <input class="form-control" required  value="<?php echo $VAR_sueldo ?>" type="text" name="txtsueldo" id="txtsueldo" >
                                                          </div>
                                                  </div>

                                                  <div class="col-lg-3">
                                                         <div class="form-group">
                                                              <label>Litros</label>
                                                              <input class="form-control" required value="<?php echo $VAR_litros ?>" type="text" name="txtlitros" id="txtlitros" >
                                                          </div>
                                                  </div>

                                                  <div class="col-lg-3">
                                                         <div class="form-group">
                                                              <label>KI</label>
                                                              <input class="form-control" required value="<?php echo $VAR_ki ?>"  type="text" name="txtki" id="txtki" >
                                                          </div>
                                                  </div>

                                                  <div class="col-lg-3">
                                                         <div class="form-group">
                                                              <label>KF</label>
                                                              <input class="form-control" required value="<?php echo $VAR_kf ?>"  type="text" name="txtkf" id="txtkf" >
                                                          </div>
                                                  </div>


                                                  <div class="col-lg-3">
                                                         <div class="form-group">
                                                              <label>Estimado</label>
                                                              <input class="form-control" required value="0" type="text" value="<?php echo $VAR_estimado ?>"  name="txtestimado" id="txtestimado" >
                                                          </div>
                                                  </div>

                                                  <div class="col-lg-3">
                                                         <div class="form-group">
                                                              <label>Pagado</label>
                                                               <select class="form-control" name="txtpagado" id="txtpagado">
                                                                <option <?php if($VAR_pagado=="no" ){echo "selected";} ?> value="no" >No</option>
                                                                <option <?php if($VAR_pagado=="si" ){echo "selected";} ?> value="si" >Si</option>

                                                               </select>
                                                          </div>
                                                  </div>


                                                  <div class="col-lg-3">
                                                         <div class="form-group">
                                                              <label>Forma de Pago</label>
                                                               <select class="form-control" name="txtformadepago" id="txtformadepago">
                                                                <option <?php if($VAR_formadepago=="efe" ){echo "selected";} ?> value="efe" >Efectivo</option>
                                                                <option <?php if($VAR_formadepago=="tc" ){echo "selected";} ?> value="tc" >Tarjeta de Credito</option>
                                                                <option <?php if($VAR_formadepago=="ot" ){echo "selected";} ?> value="ot" >Otro</option>
                                                               </select>
                                                          </div>
                                                  </div>


                                                  <div class="col-lg-3">
                                                         <div class="form-group">
                                                              <label>Fecha de Pago</label>
                                                              <input class="form-control" type="date" value="<?php echo $VAR_fechapago ?>"  name="txtfechapago" id="txtfechapago" >
                                                          </div>
                                                  </div>

                                                  <div class="col-lg-3">
                                                         <div class="form-group">
                                                              <label>Clave</label>
                                                              <table>
                                                                <tr>
                                                                    <td>CC&nbsp;</td>
                                                                    <td><input size="4" class="form-control" type="text" value="<?php echo $VAR_cve ?>" name="txtcve" id="txtcve" ></td>
                                                                    <td>&nbsp;BB&nbsp;</td>
                                                                    <td><select  class="form-control" type="text" value="<?php echo $VAR_cve2 ?>" name="txtcve2" id="txtcve2" >
                                                                                <option value="MX">MX</option>
                                                                                <option  value="DL">DL</option>
                                                                                <option  value="CA">CA</option>
                                                                                <option  value="EU">EU</option>
                                                                        </select>
                                                                    </td>
                                                                    <td></td>
                                                                </tr>
                                                              </table>

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
        <!-- /#page-wrapper -->

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
     <script src="js/jquery.cookie.js"></script>

<script src="alertifyjs/alertify.min.js"></script>
<link rel="stylesheet" href="alertifyjs/css/alertify.min.css" />
<link rel="stylesheet" href="alertifyjs/css/themes/default.min.css" />



</body>


<script src="//rawgithub.com/indrimuska/jquery-editable-select/master/dist/jquery-editable-select.min.js"></script>
<script>


 function borrar(ID){




             alertify.confirm('MFTSYS', 'Desea eliminar la orden', function(){
              var arch = 'update-orden-borrar.php?&i='+ID;
                   $.get(arch);

                      setTimeout(window.location.href='listado.php', 3000);




            }
              ,''  );



    };

        function enviarpdf(ID){

    // var first = ID;

    // console.log(first);

    alertify.confirm('MFTSYS', '¿Desea descargar la orden en formato PDF?', function(){
              var pdf = 'send_confirm_pdf.php?&t='+ID;
                   //$.get(pdf);

                      setTimeout(window.location.href= pdf, 3000);




            }
              ,''  );


  };

    function enviarmail(ID){

    // var first = ID;

    // console.log(first);

    alertify.confirm('MFTSYS', '¿Desea enviar un correo de confirmación?', function(){
              var mail = 'send_confirm_order.php?&t='+ID;
                   $.get(mail);

                      setTimeout(window.location.href='listado.php', 3000);




            }
              ,''  );


  };



      $(document).ready(function(){

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


         $("#txtnoec").change(function () {


//                var result = $("#txtnoec option:selected").val().split('|');
//                alert($("#txtnoec option:selected").val());
//                $("#txtplac").val(result[1]);
//                $("#txtvehi").val(result[0]);

         })



  




      });

       $('#txttipo').change(

           /*
            function(){


                if($('#txttipo option:selected').val()=="rt"){
                           $('#return').show();
                } else {

                           $('#return').hide();
                }



            }
        */
            );



        $('#return').hide();

        $('#txtorig1').editableSelect();
        $('#txtdest1').editableSelect();
        $('#txtorig2').editableSelect();
        $('#txtdest2').editableSelect();
      //  $('#txtoper').editableSelect();
      //  $('#txtagen').editableSelect();

        $('#txtorig1').val('<?php echo $VAR_orig1 ?>');
        $('#txtdest1').val('<?php echo $VAR_dest1 ?>');


           $("#txtagen option[value='<?php echo $VAR_agen ?>']").attr("selected",true);
           $("#txtoper option[value='<?php echo $VAR_oper ?>']").attr("selected",true);
           $("#txtcve2 option[value='<?php echo $VAR_cve2 ?>']").attr("selected",true);




</script>

</html>
