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

<script src="alertifyjs/alertify.min.js"></script>
<link rel="stylesheet" href="alertifyjs/css/alertify.min.css" />
<link rel="stylesheet" href="alertifyjs/css/themes/default.min.css" />


</head>

<body>

<div id="wrapper">
              <!-- Navigation -->
              <?php

                 $VAR_TITULO = "AGREGAR O.D.S.";



              if(isset($_GET["i"])){
                     $VAR_ID     = $_GET["i"];
                     $VAR_TITULO = "ODS #".$VAR_ID;
              }



              include "nav.php";


              $VAR_fech  = date("Y-m-d");


              $VAR_tran  = "MAYAN FANTASY TOURS SA DE CV";
              $VAR_rfc   = "MFT050620NG0";
              $VAR_plac  = "";
              $VAR_noec  = "";
              $VAR_oper  = "";
              $VAR_phon  = "";
              $VAR_num   = "";
              $VAR_guia  = "";
              $VAR_idio  = "";
              $VAR_tour  = "";
              $VAR_auto  = "";
              $VAR_pues  = "";
              $VAR_esta  = "";
              $VAR_valu  = "0|0|0|0|0|0|0|0|0|0|0|0|0|0|0|0|0|0|0|0|0|0|0|0|0|0|0|0";

              if(isset($_GET["acc"])){
                    if($_GET["acc"]=="add"){

                              $sql="insert into _ods values (
                              0,
                              '".$_POST["txttran"]."',
                              '".$_POST["txtrfc"]."',
                              '".$_POST["txtplac"]."',
                              '".$_POST["txtnoec"]."',
                              '".$_POST["txtoper"]."',
                              '".$_POST["txtphon"]."',
                              '".$_POST["txtfech"]."',
                              '".$_POST["txtnum"]."',
                              '".$_POST["txtguia"]."',
                              '".$_POST["txtidio"]."',
                              '".$_POST["txttour"]."',
                              '".$_POST["txtauto"]."',
                              '".$_POST["txtpues"]."',
                              '".$_POST["txtesta"]."',
                              '|||||||||||||||||||||||||||'
                              )";
                              adoexecute($sql);
                           //     echo  "-------------------------------------------------------->".$sql;

                              $sql="select ods_id from _ods  order by ods_id DESC limit 1";
                              $rs = adoopenrecordset($sql);
                              $rstemp = mysql_fetch_array($rs);
                              $VAR_ID = $rstemp["ods_id"];



                              ?>
                              <script>
                              alertify.alert('MFTSYS', 'ODS Agregada');
                              </script>
                              <?php

                                   $VAR_TITULO = "ODS #".$VAR_ID;
                    }


              if($_GET["acc"]=="save"){

               $i = 0;
               $VAR_VAL = "";
              while( $i <= count($_POST['txtvalu'])-1    ) {
                    $VAR_VAL = $VAR_VAL.$_POST['txtvalu'][$i]."|";
                $i = $i +1;
              }



                        $sql="update  _ods set
                        ods_tran   =     '".$_POST["txttran"]."',
                        ods_rfc   =     '".$_POST["txtrfc"]."',
                        ods_plac   =     '".$_POST["txtplac"]."',
                        ods_noec   =     '".$_POST["txtnoec"]."',
                        ods_oper   =     '".$_POST["txtoper"]."',
                        ods_phon   =     '".$_POST["txtphon"]."',
                        ods_fech   =     '".$_POST["txtfech"]."',
                        ods_num   =     '".$_POST["txtnum"]."',
                        ods_guia   =     '".$_POST["txtguia"]."',
                        ods_idio   =     '".$_POST["txtidio"]."',
                        ods_tour   =     '".$_POST["txttour"]."',
                        ods_auto   =    '".$_POST["txtauto"]."',
                        ods_pues   =     '".$_POST["txtpues"]."',
                        ods_esta   =     '".$_POST["txtesta"]."',
                        ods_valu   =     '".$VAR_VAL."'
                        where ods_id = ".$VAR_ID."";





                //         echo "-------------------------------------------------------->".$VAR_VAL;
                        adoexecute($sql);
                        //  echo  "-------------------------------------------------------->".$sql;

                        $sql="select ods_id from _ods where ods_id = ".$VAR_ID;
                        $rs = adoopenrecordset($sql);
                        $rstemp = mysql_fetch_array($rs);

                        ?>
                        <script>
                        alertify.alert('MFTSYS', 'ODS Actualizada');
                        </script>
                        <?php

                        $VAR_TITULO = "ODS #".$VAR_ID;
              }


              if($_GET["acc"]=="del"){

              $sql="delete from   _ods where ods_id = ".$VAR_ID."";
              adoexecute($sql);

              $sql="update    _excursiones set ods_id = 0  where ods_id = ".$VAR_ID."";
              adoexecute($sql);
              //  echo  "-------------------------------------------------------->".$sql;


              unset($VAR_ID);
              //  echo  "-------------------------------------------------------->".$sql;



              ?>
              <script>
                alertify.alert('MFTSYS', 'ODS Eliminada');
              </script>
              <?php

              // $VAR_TITULO = "ODS #".$VAR_ID;
              }

              if($_GET["acc"]=="addexc"){

              $sql="update  _excursiones set ods_id = ".$VAR_ID." where exc_id = ".$_POST["txtexcu"]."";

              adoexecute($sql);

              //  echo "------------------------------------->".$sql;



              ?>
              <script>
                 alertify.alert('MFTSYS', 'Excursión Agregada');
              </script>
              <?php

              // $VAR_TITULO = "ODS #".$VAR_ID;
              }


              if($_GET["acc"]=="excdel"){

              $sql="update  _excursiones set ods_id = '' where exc_id = ".$_GET["ie"]."";

              adoexecute($sql);

              //  echo "------------------------------------->".$sql;



              ?>
              <script>
                  alertify.alert('MFTSYS', 'Excursión eliminada');
              </script>
              <?php

              // $VAR_TITULO = "ODS #".$VAR_ID;
              }

              }





              if(isset($VAR_ID)){

              $sql="select * from _ods where ods_id = ".$VAR_ID." ";
              $rs = adoopenrecordset($sql);
              $rstemp = mysql_fetch_array($rs);

              $VAR_fech  = $rstemp["ods_fech"];
              $VAR_tran  = $rstemp["ods_tran"];
              $VAR_rfc   = $rstemp["ods_rfc"];
              $VAR_plac  = $rstemp["ods_plac"];
              $VAR_noec  = $rstemp["ods_noec"];
              $VAR_oper  = $rstemp["ods_oper"];
              $VAR_phon  = $rstemp["ods_phon"];
              $VAR_num   = $rstemp["ods_num"];
              $VAR_guia  = $rstemp["ods_guia"];
              $VAR_idio  = $rstemp["ods_idio"];
              $VAR_tour  = $rstemp["ods_tour"];
              $VAR_auto  = $rstemp["ods_auto"];
              $VAR_pues  = $rstemp["ods_pues"];
              $VAR_esta  = $rstemp["ods_esta"];
              $VAR_valu  = $rstemp["ods_valu"];

              $VAR_valu = explode("|",$VAR_valu);


              }



              ?>



              <div id="page-wrapper">
                    <form role="form" method="post" action="" name="frm">
                            <div class="row"> <div class="col-lg-12"><h1 class="page-header"><?php echo $VAR_TITULO ?> </h1></div></div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="panel panel-default">
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-lg-3"><div class="form-group"><label>Fecha</label><input class="form-control" required type="date" name="txtfech"  value="<?php echo $VAR_fech ?>" id="txtfech" placeholder=""></div></div>
                                                <div class="col-lg-4"><div class="form-group"><label>Transportadora  </label><input class="form-control"  value="<?php echo $VAR_tran ?>" name="txttran" id="txttran" ></div></div>
                                                <div class="col-lg-2"><div class="form-group"><label>RFC             </label><input class="form-control"  value="<?php echo $VAR_rfc  ?>"  name="txtrfc" id="txtrfc" ></div></div>
                                                <div class="col-lg-3"><div class="form-group"><label>Placas          </label><input class="form-control"  value="<?php echo $VAR_plac ?>"  name="txtplac" id="txtplac" ></div></div>
                                                <div class="col-lg-3"><div class="form-group"><label>No.Eco.         </label><input class="form-control"  value="<?php echo $VAR_noec ?>"  name="txtnoec" id="txtnoec" ></div></div>
                                                <div class="col-lg-3"><div class="form-group"><label>Operador        </label>

                                                     <!--   <input class="form-control"  value="<?php echo $VAR_oper ?>"  name="txtoper" id="txtoper" > -->

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


                                                        </div></div>
                                                <div class="col-lg-3"><div class="form-group"><label>Teléfono        </label><input class="form-control"  value="<?php echo $VAR_phon ?>"  name="txtphon" id="txtphon" ></div></div>
                                                <div class="col-lg-3"><div class="form-group"><label>No. Orden       </label><input class="form-control"  value="<?php echo $VAR_num  ?>"  name="txtnum"  id="txtnum" ></div></div>
                                                <div class="col-lg-3"><div class="form-group"><label>Guía            </label><input class="form-control"  value="<?php echo $VAR_guia ?>"  name="txtguia"  id="txtguia" ></div></div>
                                                <div class="col-lg-3"><div class="form-group"><label>Idioma          </label>
                                                    <select class="form-control" name="txtidio" id="txtidio">
                                                    <option <?php if($VAR_idio=="EN")         {echo "selected"; } ?> >EN</option>
                                                    <option <?php if($VAR_idio=="ES")         {echo "selected"; } ?> >ES</option>
                                                    <option <?php if($VAR_idio=="FR")         {echo "selected"; } ?> >FR</option>
                                                    <option <?php if($VAR_idio=="AL")         {echo "selected"; } ?> >AL</option>
                                                    <option <?php if($VAR_idio=="IT")         {echo "selected"; } ?> >IT</option>
                                                    <option <?php if($VAR_idio=="RU")         {echo "selected"; } ?> >RU</option>
                                                    <option <?php if($VAR_idio=="PR")         {echo "selected"; } ?> >PR</option>
                                                    <option <?php if($VAR_idio=="PO")         {echo "selected"; } ?> >PO</option>
                                                    <option <?php if($VAR_idio=="JP")         {echo "selected"; } ?> >JP</option>
                                                    </select>
                                                </div></div>
                                                <div class="col-lg-3"><div class="form-group"><label>Tour            </label>
                                                    <select class="form-control" name="txttour" id="txttour">

                                                    <option <?php if($VAR_tour=="TULUM REEF ADVENTURE")         {echo "selected"; } ?>   >TULUM REEF ADVENTURE</option>
                                                    <option <?php if($VAR_tour=="CHICHEN SUNRISE")              {echo "selected"; } ?>   >CHICHEN SUNRISE</option>
                                                    <option <?php if($VAR_tour=="CURATED TULUM EXPLORA TULUM")  {echo "selected"; } ?>   >CURATED TULUM EXPLORA TULUM</option>
                                                    <option <?php if($VAR_tour=="CENOTE MAYA EXPERIENCE")       {echo "selected"; } ?>   >CENOTE MAYA EXPERIENCE</option>
                                                    <option <?php if($VAR_tour=="DOS CENOTE")                   {echo "selected"; } ?>   >DOS CENOTE</option>
                                                    <option <?php if($VAR_tour=="COBA TULUM SUNSET")            {echo "selected"; } ?>   >COBA TULUM SUNSET</option>
                                                    <option <?php if($VAR_tour=="MANZANERO PLAYA")              {echo "selected"; } ?>   >MANZANERO PLAYA</option>
                                                    <option <?php if($VAR_tour=="MANZANERO CANCUN")             {echo "selected"; } ?>   >MANZANERO CANCUN</option>
                                                    <option <?php if($VAR_tour=="KAAN LUUM EXPERIENCE")         {echo "selected"; } ?>   >KAAN LUUM EXPERIENCE</option>
                                                    <option <?php if($VAR_tour=="PRIVADOS")                     {echo "selected"; } ?>   >PRIVADOS</option>

                                                    </select>
                                                </div></div>
                                                <div class="col-lg-3"><div class="form-group"><label>Autoriza        </label><input class="form-control"  value="<?php echo $VAR_auto ?>"  name="txtauto"  id="txtauto" ></div></div>
                                                <div class="col-lg-3"><div class="form-group"><label>Puesto Autoriza </label><input class="form-control"  value="<?php echo $VAR_pues ?>"  name="txtpues"  id="txtpues" ></div></div>
                                                <div class="col-lg-3">
                                                <div class="form-group"><label>Estatus</label>
                                                    <select class="form-control" name="txtesta" id="txtesta">
                                                    <option <?php if($VAR_esta=="CAPTURADA")         {echo "selected"; } ?>>CAPTURADA</option>
                                                    <option <?php if($VAR_esta=="CANCELADA")         {echo "selected"; } ?>>CANCELADA</option>
                                                    </select>
                                                </div>


                                                </div>

                                            </div>
                                                 <?php  if(isset($VAR_ID)){ ?>

                                            <div>
                                            <?php

                                            $VAR_CAMPOS["camp"] = "Entrada Ruinas|Comida|Desplaze|Lanchas|Chicles|Estacionamiento|Extra";
                                            $VAR_CAMPOS["arti"] = "Visores|Aletas|Tubos|Gomas|Chalecos|Sombrillas|Toallitas|Sodas|Cervezas|Aguas";



                                              if($VAR_tour=="CURATED TULUM EXPLORA TULUM"){
                                                    $VAR_CAMPOS["camp"] = "Entrada Ruinas|Comida|Desplaze|Lanchas|Chicles|Estacionamiento|Extra";
                                                    $VAR_CAMPOS["arti"] = "Visores|Aletas|Tubos|Gomas|Chalecos|Sombrillas|Toallitas|Sodas|Cervezas|Aguas";
                                               }

                                              if($VAR_tour=="KAAN LUUM EXPERIENCE"){
                                                    $VAR_CAMPOS["camp"] = "Entrada Ruinas|Comida|Desplaze|Lanchas|Chicles|Estacionamiento|Extra";
                                                    $VAR_CAMPOS["arti"] = "Visores|Aletas|Tubos|Gomas|Chalecos|Sombrillas|Toallitas|Sodas|Cervezas|Aguas";
                                               }



                                              if($VAR_tour=="TULUM REEF ADVENTURE"){
                                                    $VAR_CAMPOS["camp"] = "Entrada Ruinas|Comida|Guia + Concierge|Lanchas|Hielo|Estacionamiento";
                                                    $VAR_CAMPOS["arti"] = "Visores|Aletas|Tubos|Sombrillas|Chalecos|Aguas|Sodas";
                                               }

                                              if($VAR_tour=="COBA TULUM SUNSET"){
                                                    $VAR_CAMPOS["camp"] = "Entrada Coba|Coba Tulum|Comida|Hielo|Estacionamiento|Bicicletas|Guia|Extras";
                                                    $VAR_CAMPOS["arti"] = "Aguas|Sodas";
                                               }

                                              if($VAR_tour=="CHICHEN SUNRISE"){
                                                    $VAR_CAMPOS["camp"] = "Entrada Chichen|Entrada INAH|Cenote|Comida|Parking|Gasolina|Extras";
                                                    $VAR_CAMPOS["arti"] = "Aguas|Refrescos";
                                               }










                                            ?>
                                            <div style="border:1px solid #99B3FF; border-radius: 4px">
                                              <div style="text-align:center" >
                                                <h3>FORMATO DE GASTOS
                                                        <span id="down" style="color:#99B3FF;cursor:pointer;display:none" onclick="$('#formato').hide(300);$('#down').hide();  $('#up').show();" class="fa fa-angle-up"></span>
                                                        <span id="up"   style="color:#99B3FF;cursor:pointer" onclick="$('#formato').show(300);$('#up').hide();    $('#down').show();" class="fa fa-angle-down"></span>
                                                </h3>
                                              </div>
                                                <div id="formato"  style="display:none">
                                                 <div class="col-lg-12"><hr></div>
                                                <div class="col-lg-12">
                                                      <?php
                                                         $VAR_C = explode("|",$VAR_CAMPOS["camp"]);
                                                          $ii = 0;
                                                         foreach($VAR_C as $value){
                                                       ?>
                                                          <div class="col-lg-2">
                                                              <div style="text-align:center"><?php echo $value ?></div>
                                                              <div  style="text-align:center !important">
                                                                    <input value="<?php echo $VAR_valu[$ii] ?>" name="txtvalu[<?php $ii ?>]" class="form-control" style="width:100px;text-align:center; display: inline">
                                                              </div>
                                                          </div>
                                                        <?php
                                                          $ii = $ii +1;
                                                        }   ?>
                                                </div>
                                                <div class="col-lg-12"><hr></div>
                                                <div class="col-lg-12">
                                                      <?php
                                                         $VAR_C = explode("|",$VAR_CAMPOS["arti"]);

                                                         foreach($VAR_C as $value){
                                                       ?>
                                                          <div class="col-lg-2">
                                                              <div style="text-align:center"><?php echo $value ?></div>
                                                              <div  style="text-align:center !important">
                                                                    <input value="<?php echo $VAR_valu[$ii] ?>" class="form-control" name="txtvalu[<?php $ii ?>]" style="width:100px;text-align:center; display: inline">
                                                              </div>
                                                          </div>
                                                        <?php
                                                            $ii = $ii +1;
                                                          }   ?>
                                                </div>
                                               </div>

                                                 <div style="clear:both"><br>&nbsp;</div>
                                             </div>
                                            </div>





                                           <div class="row" style="">
                                                <div style="padding-top:10px" class="col-lg-4">
                                                <button type="submit" onclick="document.frm.action='excur_ods_agregar.php?acc=save&i=<?php echo $VAR_ID ?>'" class="btn btn-primary btn-lg btn-block">
                                                    <span class="fa fa-save"></span>&nbsp;Guardar</button></div>
                                                <div style="padding-top:10px" class="col-lg-4">
                                                  <button type="button" onclick="
                                                      alertify.confirm('MFTSYS', 'Desea eliminar la ODS', function(){
                                                      document.frm.action='excur_ods_agregar.php?acc=del&i=<?php echo $VAR_ID ?>'
                                                      document.frm.submit();
                                                      }
                                                      ,''  );"  class="btn btn-primary btn-lg btn-block">
                                                      <span class="fa fa-trash"></span>&nbsp;Eliminar
                                                  </button>
                                                </div>
                                                <div style="padding-top:10px" class="col-lg-4">
                                                  <div style="width:49%;float:left; border:1px solid #FFFFFF" >
                                                    <button type="submit" onclick="document.frm.target = '_blank';document.frm.action='excur_ods_print.php?i=<?php echo $VAR_ID ?>'"         class="btn btn-primary btn-lg btn-block" ><span class="fa fa-print" ></span>&nbsp;Imp. ODS</button>

                                                  </div>
                                                   <div style="width:49%;float:left;border:1px solid #FFFFFF" >
                                                     <button type="submit" onclick="document.frm.target = '_blank';document.frm.action='excur_ods_print_gastos.php?i=<?php echo $VAR_ID ?>'"     class="btn btn-primary btn-lg btn-block" ><span class="fa fa-print"></span>&nbsp;Imp. Gastos</button>
                                                  </div>
                                                </div>
                                          </div>


                                          <div class="row" style="border-top:1px dashed #C4CCC4; padding-top:10px;padding-bottom:10px; margin-top:20px;" id="ods">

                                           <?php


                                           $VAR_FECH1 = date("YYYY-m-d");
                                           $VAR_AGEN1 = "0";
                                           $VAR_CUPO1 = "";
                                           $VAR_INVI1 = "";
                                           $VAR_CONF1 = "0";


                                            $sqla="select * from _excursiones where (ods_id = '' or ods_id = null or ods_id = 0)  ";
                                                if(isset($_POST["txtfech1"])){ $VAR_FECH1 = $_POST["txtfech1"] ;  if($_POST["txtfech1"]<>""){ $sqla = $sqla . " and exc_fech = '".$_POST["txtfech1"]."'"  ;}}
                                                if(isset($_POST["txtagen1"])){ $VAR_AGEN1 = $_POST["txtagen1"] ;  if($_POST["txtagen1"]<>"0"){ $sqla = $sqla . " and exc_agen = '".$_POST["txtagen1"]."'";}}
                                                if(isset($_POST["txtcupo1"])){ $VAR_CUPO1 = $_POST["txtcupo1"] ;  if($_POST["txtcupo1"]<>""){  $sqla = $sqla . " and exc_cupo like ('%".$_POST["txtcupo1"]."%')";}}
                                                if(isset($_POST["txtinvi1"])){ $VAR_INVI1 = $_POST["txtinvi1"] ;  if($_POST["txtinvi1"]<>""){  $sqla = $sqla . " and exc_invi like ('%".$_POST["txtinvi1"]."%')";}}
                                                if(isset($_POST["txtconf1"])){ $VAR_CONF1 = $_POST["txtconf1"] ;  if($_POST["txtconf1"]<>"0"){ $sqla = $sqla . " and exc_conf = '".$_POST["txtconf1"]."'";}}


                                      //  echo "<br>-->".  $VAR_FECH1 ;
                                    //     echo "<br>-->".  $VAR_AGEN1 ;
                                     //    echo "<br>-->".  $VAR_CUPO1 ;
                                     //    echo "<br>-->".  $VAR_INVI1 ;
                                   //      echo "<br>-->".  $VAR_CONF1 ;


                                    //         echo "<br>".$sqla;


                                           ?>


                                               <div class="col-lg-12"><h4><b>BUSCAR EXCURSIONES PARA AGREGAR</b></h4></div>
                                                       <input type="hidden" name="txtexcu" />
                                                       <div  class="col-lg-3">
                                                          <div class="form-group"><label>Fecha            </label>
                                                              <input class="form-control"  value="<?php echo $VAR_FECH1 ?>" type="date"  name="txtfech1" id="txtfech1" >
                                                          </div>
                                                       </div>

                                                       <div  class="col-lg-2">
                                                          <div class="form-group"><label>Agencia            </label>
                                                                  <select class="form-control" id="txtagen1" name="txtagen1" >
                                                                    <option selected value="0">- todos -</option>
                                                                    <?php
                                                                          $sqlx="select cli_nomb from _clientes  group by cli_nomb ";
                                                                          $rsx = adoopenrecordset($sqlx);
                                                                          while($rstempx = mysql_fetch_array($rsx)){
                                                                          ?>
                                                                          <option  <?php if($VAR_AGEN1==$rstempx["cli_nomb"]){ echo "selected"; } ?>   value="<?php echo $rstempx["cli_nomb"] ?>"><?php echo $rstempx["cli_nomb"] ?></option>
                                                                    <?php
                                                                    }
                                                                    ?>
                                                                  </select>
                                                          </div>


                                                       </div>

                                                       <div  class="col-lg-2">
                                                          <div class="form-group"><label>Cupon            </label>
                                                              <input class="form-control"   value="<?php echo $VAR_CUPO1 ?>"  type="text"  name="txtcupo1" id="txtcupo1" >
                                                          </div>
                                                       </div>

                                                       <div  class="col-lg-2">
                                                          <div class="form-group"><label>Invitado            </label>
                                                              <input class="form-control"  value="<?php echo $VAR_INVI1 ?>"  type="text"  name="txtinvi1" id="txtinvi1" >
                                                          </div>
                                                       </div>

                                                       <div  class="col-lg-2">
                                                          <div class="form-group"><label>Confirmación            </label>
                                                                <select class="form-control" id="txtconf1" name="txtconf1" >
                                                                  <option value="0">- todos -</option>
                                                                  <?php
                                                                        $sqlxx="select exc_conf from _excursiones where ods_id = '' or ods_id = null or ods_id = 0 group by exc_conf";
                                                                        $rsxx = adoopenrecordset($sqlxx);
                                                                        while($rstempxx = mysql_fetch_array($rsxx)){
                                                                        ?>
                                                                        <option <?php if($VAR_CONF1==$rstempxx["exc_conf"]){ echo "selected"; } ?>  value="<?php echo $rstempxx["exc_conf"] ?>"><?php echo $rstempxx["exc_conf"] ?></option>
                                                                  <?php
                                                                  }
                                                                  ?>
                                                                </select>
                                                          </div>
                                                       </div>

                                                       <div  class="col-lg-1">
                                                          <div class="form-group">
                                                                  <label>&nbsp;</label>   <button class="btn btn-primary   btn-block"
                                                                  onclick="document.frm.action='excur_ods_agregar.php?acc=buscods&i=<?php echo $VAR_ID ?>#ods'"
                                                                  ><span class="fa fa-search"></span></button>
                                                          </div>
                                                       </div>
                                               <div class="col-lg-12"><hr style="padding:0px; margin:0px;"></div>


                                      </div>


                                          <div class="row" style="border-bottom:1px dashed  #C4CCC4; margin-bottom:10px ">

                                            <table style="width:100%; font-size:11px">
                                                <tr>
                                                    <th align="center" style="text-align:center">Fecha</th>
                                                    <th align="center" style="text-align:center">Tour</th>
                                                    <th align="center" style="text-align:center">Hotel</th>
                                                    <th align="center" style="text-align:center">Agen</th>
                                                    <th align="center" style="text-align:center">Cupón</th>
                                                    <th align="center" style="text-align:center">Invitado</th>
                                                    <th align="center" style="text-align:center">Conf</th>
                                                    <th align="center" style="text-align:center">PAX</th>
                                                    <th>&nbsp;</th>
                                                </tr>

                                           <?php
                                                    $VAR_COLOR = "#F3F4E7";
                                              $rsa = adoopenrecordset($sqla);
                                              while($rstempa = mysql_fetch_array($rsa)){
                                                if($VAR_COLOR=="#F3F4E7"){$VAR_COLOR="";}else{$VAR_COLOR="#F3F4E7";}
                                           ?>

                                                <tr style="background-color: <?php echo $VAR_COLOR ?>">
                                                    <td style="text-align:center" ><?php echo $rstempa["exc_fech"] ?></td>
                                                    <td style="text-align:center" ><?php echo $rstempa["exc_excu"] ?></td>
                                                    <td style="text-align:center" ><?php echo $rstempa["exc_hote"] ?></td>
                                                    <td style="text-align:center" ><?php echo $rstempa["exc_agen"] ?></td>
                                                    <td style="text-align:center" ><?php echo $rstempa["exc_cupo"] ?></td>
                                                    <td style="text-align:center" ><?php echo $rstempa["exc_invi"] ?></td>
                                                    <td style="text-align:center" ><?php echo $rstempa["exc_conf"] ?></td>
                                                    <td style="text-align:center" ><?php echo $rstempa["exc_pax"] ?></td>
                                                    <td>
                                                        <button class="btn btn-primary"  type="button" onclick="window.frm.txtexcu.value=<?php echo $rstempa["exc_id"] ?> ;window.frm.action='excur_ods_agregar.php?i=<?php echo $VAR_ID ?>&acc=addexc'; window.frm.submit()"  ><span class="fa fa-arrow-right"></span></button>
                                                    </td>
                                                </tr>
                                           <?php  }   ?>
                                              <tr><td>&nbsp;</td></tr>
                                            </table>
                                      </div>


                            <?php  }else{ ?>
                                   <div class="row">
                                        <div class="col-lg-6">
                                            <button type="submit"  onclick="window.frm.action='excur_ods_agregar.php?acc=add'" class="btn btn-primary btn-lg btn-block">Guardar .</button>
                                        </div>
                                    </div>
                            <?php   } ?>




                            <?php
                            if(isset($VAR_ID)){
                            ?>



                            <div>
                               <br> <h4>EXCURSIONES <b>AGREGADAS</b> A LA ODS</h4>
                            </div>
                            <div class="row">
                                    <table  style="width:100%" data-order='[[ 0, "desc" ]]' data-page-length='50' class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                    <tr>
                                    <th>Fecha</th>
                                    <th>Cupón</th>
                                    <th>Excursión</th>
                                    <th>Hotel</th>
                                    <th>PAX</th>
                                    <th>Invitado</th>
                                    <th>Confirmación</th>
                                    <th>&nbsp;</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $sql="select * from _excursiones where ods_id = '".$VAR_ID."'";
                                    $rs = adoopenrecordset($sql);
                                    while($rstemp = mysql_fetch_array($rs)){
                                    ?>
                                    <tr  style="cursor:pointer" >
                                          <td onclick="window.location.href='excur_agregar.php?i=<?php echo $rstemp["exc_id"] ?>'"><?php echo $rstemp["exc_fech"] ?></td>
                                          <td onclick="window.location.href='excur_agregar.php?i=<?php echo $rstemp["exc_id"] ?>'"><?php echo $rstemp["exc_cupo"] ?></td>
                                          <td onclick="window.location.href='excur_agregar.php?i=<?php echo $rstemp["exc_id"] ?>'"><?php echo $rstemp["exc_excu"] ?></td>
                                          <td onclick="window.location.href='excur_agregar.php?i=<?php echo $rstemp["exc_id"] ?>'"><?php echo $rstemp["exc_hote"] ?></td>
                                          <td  onclick="window.location.href='excur_agregar.php?i=<?php echo $rstemp["exc_id"] ?>'"style="text-align:center"><?php echo $rstemp["exc_pax"] ?></td>
                                          <td onclick="window.location.href='excur_agregar.php?i=<?php echo $rstemp["exc_id"] ?>'"><?php echo $rstemp["exc_invi"] ?></td>
                                          <td onclick="window.location.href='excur_agregar.php?i=<?php echo $rstemp["exc_id"] ?>'"><?php echo $rstemp["exc_conf"] ?></td>
                                          <td style="text-align:Center">
                                          <button type="button"

                                          onclick="
                                          alertify.confirm('MFTSYS', '¿Desea retirar la Excursion de la ODS?', function(){
                                          document.frm.action='excur_ods_agregar.php?acc=excdel&i=<?php echo $VAR_ID ?>&ie=<?php echo $rstemp["exc_id"] ?>#excursiones'
                                          document.frm.submit();
                                          }
                                          ,''  );
                                          "


                                          ><span class="fa fa-times-circle"></span></button>
                                          </td>
                                    </tr>
                                    <?php
                                    }
                                    ?>
                                    </tbody>
                                    </table>
                            </div>



                      </div>
                            <?php } ?>
                            </div>
                            </div>
                            </div>

                    </form>
              </div>
              <!-- /#page-wrapper -->

</div>
              <!-- /#wrapper -->




</body>

<!-- jQuery -->
<script src="vendor/jquery/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="vendor/metisMenu/metisMenu.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="dist/js/sb-admin-2.js"></script>
<script src="js/jquery.cookie.js"></script>
<script src="//rawgithub.com/indrimuska/jquery-editable-select/master/dist/jquery-editable-select.min.js"></script>
<script>
       $('#txttipo').change(


            function(){

          //  alert($('#txttipo option:selected').val());
                if($('#txttipo option:selected').val()=="rt"){
                           $('#return').show();
                } else {

                           $('#return').hide();
                }



            }

            );



        $('#return').hide();

        $('#txtorig1').editableSelect();
        $('#txtdest1').editableSelect();
        $('#txtorig2').editableSelect();
        $('#txtdest2').editableSelect();
 //       $('#txtagen').editableSelect();


           $("#txtoper option[value='<?php echo $VAR_oper ?>']").attr("selected",true);


</script>

</html>
