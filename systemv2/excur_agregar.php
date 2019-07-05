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

              if(isset($_GET["i"])){
                $VAR_ID = $_GET["i"];
                $VAR_TITULO = "EXCURSION #".$VAR_ID;
              }else{
                $VAR_TITULO = "AGREGAR EXCURSION";
              }



                include "nav.php";





                // $VAR_fech  = date("Y-m-d");
                $VAR_fech  = "";
                $VAR_excu  = "";
                $VAR_cupo  = "";
                $VAR_pax   = "";

                $VAR_ods   = "";

                $VAR_adul = 0;
                $VAR_chil = 0;
                $VAR_enfa = 0;

                $VAR_invi  = "";
                $VAR_hote  = "";
                $VAR_luga  = "";
                $VAR_hora  = "00:00";
                $VAR_habi  = "";
                $VAR_agen  = "";
                $VAR_idio  = "";
                $VAR_repr  = "";
                $VAR_conf  = "";
                $VAR_obse  = "";
                $VAR_esta  = "";
                $VAR_capt  = "";
                $VAR_nosh  = "";
                $VAR_mail  = "";

                $VAR_HOR = "00";
                $VAR_MIN = "00";

         ?>

        <?php





        if(isset($_GET["acc"])){



           if($_GET["acc"]=="add"){

                $VAR_PAX = $_POST["txtadul"].".".$_POST["txtchil"].".".$_POST["txtenfa"];
                $VAR_CAPT = $_COOKIE["usu_mail"];

                $sql="insert into _excursiones values (
                 0,
                 0,
                 '".$_POST["txtfech"]."',
                 '".$_POST["txtexcu"]."',
                 '".$_POST["txtcupo"]."',
                 '".$VAR_PAX."',
                 '".$_POST["txtinvi"]."',
                 '".$_POST["txthote"]."',
                 '".$_POST["txtluga"]."',
                 '".$_POST["txthora"]."',
                 '".$_POST["txthabi"]."',
                 '".$_POST["txtagen"]."',
                 '".$_POST["txtidio"]."',
                 '".$_POST["txtrepr"]."',
                 '".$_POST["txtconf"]."',
                 '".$_POST["txtobse"]."',
                 0,
                 '".$VAR_CAPT."',
                 '".$_POST["txtnosh"]."',
                 '".$_POST["txtmail"]."'
                )";
                adoexecute($sql);


               // echo $sql;

                $sql="select exc_id from _excursiones  order by exc_id DESC limit 1";
                $rs = adoopenrecordset($sql);
                $rstemp = mysql_fetch_array($rs);
                $VAR_ID_MAIL = $rstemp["exc_id"];



                ?>
                     <script>

                        alertify.confirm('MFT', '<div style="text-align:center">Excursión Agregada <br><b style="font-size:20px">#<?php echo $VAR_ID_MAIL ?></b> </br>¿Desea enviar <b>correo de notificación</b> al cliente?</div>', function(){



                                               var arch = 'send_confirm.php?i='+<?php echo $VAR_ID_MAIL ?>;
                                                      //     alert(arch);
                                                         $.get(arch);

                                       alertify.alert('MFT','<div style="text-align:center"><li class="fa fa-envelope-o fa-3x"></li><br>Notificación enviada</div>');


                                         }
                                        , function(){


                                        });



                     </script>
                <?php


               // $VAR_TITULO = "EXCURSION #".$VAR_ID;
           }



          if($_GET["acc"]=="save"){

                $VAR_PAX = $_POST["txtadul"].".".$_POST["txtchil"].".".$_POST["txtenfa"];


                $sql="update  _excursiones set

              exc_fech =   '".$_POST["txtfech"]."',
              exc_excu =    '".$_POST["txtexcu"]."',
              exc_cupo =    '".$_POST["txtcupo"]."',
              exc_pax =    '".$VAR_PAX."',
              exc_invi =    '".$_POST["txtinvi"]."',
              exc_hote =    '".$_POST["txthote"]."',
              exc_luga =    '".$_POST["txtluga"]."',
              exc_hora =    '".$_POST["txthora"]."',
              exc_habi =    '".$_POST["txthabi"]."',
              exc_agen =    '".$_POST["txtagen"]."',
              exc_idio =   '".$_POST["txtidio"]."',
              exc_repr =   '".$_POST["txtrepr"]."',
              exc_conf =   '".$_POST["txtconf"]."',
              exc_esta =   '".$_POST["txtesta"]."',
              exc_obse =    '".$_POST["txtobse"]."',
              exc_nosh =    '".$_POST["txtnosh"]."',
              exc_mail =    '".$_POST["txtmail"]."'
              where exc_id = ".$VAR_ID;

                adoexecute($sql);
       //      echo "-------------------------------->".$sql;



             /*   $sql="select exc_id from _excursiones  order by exc_id DESC limit 1";
                $rs = adoopenrecordset($sql);
                $rstemp = mysql_fetch_array($rs);
                $VAR_ID = $rstemp["exc_id"];
              */



                ?>
                     <script>
                           alertify.alert('MFTSYS', 'Excursión guardada');
                     </script>
                <?php

                $VAR_TITULO = "EXCURSION #".$VAR_ID;
           }



          if($_GET["acc"]=="del"){

                 $sql="delete from   _excursiones where exc_id = ".$VAR_ID;
                 adoexecute($sql);
                ?>
                     <script>
                           alertify.alert('MFTSYS', 'Excursión eliminada');
                     </script>
                <?php

                unset($VAR_ID);
                $VAR_TITULO = "AGREGAR EXCURSION";


              }

              unset($_GET["acc"]);
            }



        if(isset($VAR_ID)){

                $sql="select * from _excursiones where exc_id = ".$VAR_ID." ";

              //  echo $sql;


                $rs = adoopenrecordset($sql);
                $rstemp = mysql_fetch_array($rs);

                $VAR_ods   = $rstemp["ods_id"];
                $VAR_fech  = $rstemp["exc_fech"];
                $VAR_excu  = $rstemp["exc_excu"];
                $VAR_cupo  = $rstemp["exc_cupo"];
                $VAR_pax   = $rstemp["exc_pax"];
                $VAR_invi  = $rstemp["exc_invi"];
                $VAR_hote  = $rstemp["exc_hote"];
                $VAR_luga  = $rstemp["exc_luga"];
                $VAR_hora  = $rstemp["exc_hora"];
                $VAR_habi  = $rstemp["exc_habi"];
                $VAR_agen  = $rstemp["exc_agen"];
                $VAR_idio  = $rstemp["exc_idio"];
                $VAR_repr  = $rstemp["exc_repr"];
                $VAR_conf  = $rstemp["exc_conf"];
                $VAR_obse  = $rstemp["exc_obse"];
                $VAR_esta  = $rstemp["exc_esta"];
                $VAR_capt  = $rstemp["exc_capt"];
                $VAR_nosh  = $rstemp["exc_nosh"];
                $VAR_mail  = $rstemp["exc_mail"];

                $VAR_X = explode(".",$VAR_pax );
                $VAR_adul = $VAR_X[0];
                $VAR_chil = $VAR_X[1];
                $VAR_enfa = $VAR_X[2];

                $VAR_HOR = substr($rstemp["exc_hora"],0,2)  ;
                $VAR_MIN = substr($rstemp["exc_hora"],3,2)  ;

              //  echo "--------------------------------------------------------->".$VAR_MIN;

        }
        ?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><?php echo $VAR_TITULO ?>
                    <?php
                        if(isset($VAR_ID)){
                    ?>
                            <button class="fa fa-envelope-o" id="msgemail" onclick="enviar_mail(<?php echo $VAR_ID ?>)" ></button>

                    <?php   }   ?>


                    </h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="row">
                            <form role="form" method="post" action="excur_agregar.php?acc=add" name="frm">
                                    <input type="hidden" name="txtacc" value="new" />


                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label>Fecha</label>
                                                <input class="form-control"  required type="date" name="txtfech"  value="<?php echo $VAR_fech ?>" id="txtfech" placeholder="">
                                            </div>
                                       </div>


                                              <div class="col-lg-3">
                                                      <div class="form-group">
                                                          <label>Excursion</label>
                                                          <select class="form-control" name="txtexcu" id="txtexcu">
                                                                        <option <?php if($VAR_excu=="TULUM REEF ADVENTURE")         {echo "selected"; } ?> value="TULUM REEF ADVENTURE"          >TULUM REEF ADVENTURE</option>
                                                                        <option <?php if($VAR_excu=="CHICHEN SUNRISE")              {echo "selected"; } ?> value="CHICHEN SUNRISE"               >CHICHEN SUNRISE</option>
                                                                        <option <?php if($VAR_excu=="CENOTE MAYA EXPERIENCE")       {echo "selected"; } ?> value="CENOTE MAYA EXPERIENCE"        >CENOTE MAYA EXPERIENCE</option>
                                                                        <option <?php if($VAR_excu=="DOS CENOTE")                   {echo "selected"; } ?> value="DOS CENOTE"                    >DOS CENOTE</option>
                                                                        <option <?php if($VAR_excu=="CURATED TULUM EXPLORA TULUM")  {echo "selected"; } ?> value="CURATED TULUM EXPLORA TULUM"   >CURATED TULUM EXPLORA TULUM</option>
                                                                        <option <?php if($VAR_excu=="COBA TULUM SUNSET")            {echo "selected"; } ?> value="COBA TULUM SUNSET"             >COBA TULUM SUNSET</option>
                                                                        <option <?php if($VAR_excu=="KAAN LUUM EXPERIENCE")         {echo "selected"; } ?> value="KAAN LUUM EXPERIENCE"          >KAAN LUUM EXPERIENCE</option>
                                                                        <option <?php if($VAR_excu=="MANZANERO PLAYA")              {echo "selected"; } ?> value="MANZANERO PLAYA"               >MANZANERO PLAYA</option>
                                                                        <option <?php if($VAR_excu=="MANZANERO CANCUN")             {echo "selected"; } ?> value="MANZANERO CANCUN"              >MANZANERO CANCUN</option>
                                                                        <option <?php if($VAR_excu=="PRIVADOS")                     {echo "selected"; } ?> value="PRIVADOS"                      >PRIVADOS</option>

                                                          </select>
                                                      </div>
                                              </div>

                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label>Cupon</label>
                                                  <input class="form-control"  value="<?php echo $VAR_cupo ?>" name="txtcupo" id="txtcupo" >
                                            </div>
                                        </div>

                                        <div class="col-lg-1">
                                            <div class="form-group">
                                                <label>Adults</label>
                                                <input class="form-control"  value="<?php echo $VAR_adul ?>" name="txtadul" id="txtadul" >

                                            </div>
                                        </div>


                                        <div class="col-lg-1">
                                            <div class="form-group">
                                                <label>Child</label>
                                                <input class="form-control" value="<?php echo $VAR_chil ?>"  name="txtchil" id="txtchil" >

                                            </div>
                                        </div>

                                        <div class="col-lg-1">
                                            <div class="form-group">
                                                <label>Enfants</label>
                                                <input class="form-control" value="<?php echo $VAR_enfa ?>"  name="txtenfa" id="txtenfa" >

                                            </div>
                                        </div>

                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label>Nombre</label>
                                                <input class="form-control" autofocus value="<?php echo $VAR_invi ?>" required id="txtinvi" name="txtinvi" placeholder="Nombre Completo">
                                            </div>
                                        </div>

                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input class="form-control"  value="<?php echo $VAR_mail ?>" required id="txtmail" name="txtmail" placeholder="Email">
                                            </div>
                                        </div>

                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label>Hotel</label>
                                                <input class="form-control" type="" value="<?php echo $VAR_hote ?>" name="txthote" id="txthote" placeholder="">
                                            </div>
                                       </div>



                                        <div class="col-lg-2">
                                            <div class="form-group">
                                                <label>Habitación</label>
                                                <input class="form-control" type="" value="<?php echo $VAR_habi ?>" name="txthabi" id="txthabi" placeholder="">
                                            </div>
                                       </div>



                                        <div class="col-lg-2">
                                            <div class="form-group">
                                                <label>Lugar</label>
                                                <input class="form-control" type="" value="<?php echo $VAR_luga ?>" name="txtluga" id="txtluga" placeholder="">
                                            </div>
                                       </div>



                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label>Hora</label>
                                                <input class="form-control"  required type="hidden" name="txthora" id="txthora" value="<?php echo $VAR_hora ?>"  pattern="([01]?[0-9]|2[0-3]):[0-5][0-9]" placeholder="hh:mm"  >
                                                <table>
                                                    <tr>
                                                        <td>
                                                          <select name="txthor" onchange="document.frm.txthora.value=document.frm.txthor.value+':'+document.frm.txtmin.value" class="form-control" style="width:70px" >
                                                              <option <?php if($VAR_HOR == "00"){ echo "selected"; } ?> >00</option>
                                                              <option <?php if($VAR_HOR == "01"){ echo "selected"; } ?> >01</option>
                                                              <option <?php if($VAR_HOR == "02"){ echo "selected"; } ?> >02</option>
                                                              <option <?php if($VAR_HOR == "03"){ echo "selected"; } ?> >03</option>
                                                              <option <?php if($VAR_HOR == "04"){ echo "selected"; } ?> >04</option>
                                                              <option <?php if($VAR_HOR == "05"){ echo "selected"; } ?> >05</option>
                                                              <option <?php if($VAR_HOR == "06"){ echo "selected"; } ?> >06</option>
                                                              <option <?php if($VAR_HOR == "07"){ echo "selected"; } ?> >07</option>
                                                              <option <?php if($VAR_HOR == "08"){ echo "selected"; } ?> >08</option>
                                                              <option <?php if($VAR_HOR == "09"){ echo "selected"; } ?> >09</option>
                                                              <option <?php if($VAR_HOR == "10"){ echo "selected"; } ?> >10</option>
                                                              <option <?php if($VAR_HOR == "11"){ echo "selected"; } ?> >11</option>
                                                              <option <?php if($VAR_HOR == "12"){ echo "selected"; } ?> >12</option>
                                                              <option <?php if($VAR_HOR == "13"){ echo "selected"; } ?> >13</option>
                                                              <option <?php if($VAR_HOR == "14"){ echo "selected"; } ?> >14</option>
                                                              <option <?php if($VAR_HOR == "15"){ echo "selected"; } ?> >15</option>
                                                              <option <?php if($VAR_HOR == "16"){ echo "selected"; } ?> >16</option>
                                                              <option <?php if($VAR_HOR == "17"){ echo "selected"; } ?> >17</option>
                                                              <option <?php if($VAR_HOR == "18"){ echo "selected"; } ?> >18</option>
                                                              <option <?php if($VAR_HOR == "19"){ echo "selected"; } ?> >19</option>
                                                              <option <?php if($VAR_HOR == "20"){ echo "selected"; } ?> >20</option>
                                                              <option <?php if($VAR_HOR == "21"){ echo "selected"; } ?> >21</option>
                                                              <option <?php if($VAR_HOR == "22"){ echo "selected"; } ?> >22</option>
                                                              <option <?php if($VAR_HOR == "23"){ echo "selected"; } ?> >23</option>
                                                          </select>
                                                        </td>
                                                        <td>&nbsp;:&nbsp;</td>
                                                        <td>
                                                            <select name="txtmin" onchange="document.frm.txthora.value=document.frm.txthor.value+':'+document.frm.txtmin.value" class="form-control"  style="width:70px" >

                                                                <?php
                                                                    $i=0;
                                                                    while($i<=59){
                                                               ?>
                                                                    <option <?php if($VAR_MIN == $i ){ echo "selected"; } ?> ><?php echo substr("00".$i,-2) ?></option>
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
                                                          <label>Agencia</label>
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



                                                      </div>
                                              </div>




                                              <div class="col-lg-2">
                                                      <div class="form-group">
                                                          <label>Idioma</label>
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
                                                      </div>
                                              </div>


                                              <div class="col-lg-4">
                                                      <div class="form-group">
                                                          <label>Representante</label>
                                                          <input type="text" value="<?php echo $VAR_repr ?>"  class="form-control" name="txtrepr" id="txtrepr"/>

                                                      </div>
                                              </div>

                                              <div class="col-lg-3">
                                                      <div class="form-group">
                                                          <label>Confirmación</label>
                                                          <input type="text" value="<?php echo $VAR_conf ?>"  class="form-control" name="txtconf" id="txtconf"/>

                                                      </div>
                                              </div>

                                              <div class="col-lg-3">
                                                      <div class="form-group">
                                                          <label>Estatus</label>
                                                            <select class="form-control" name="txtesta" id="txtesta">
                                                                <option <?php if($VAR_esta=="CAPTURADA")         {echo "selected"; } ?>>CAPTURADA</option>
                                                                <option <?php if($VAR_esta=="CANCELADA")         {echo "selected"; } ?>>CANCELADA</option>

                                                            </select>

                                                      </div>
                                              </div>

                                               <div class="col-lg-3"><div class="form-group"><label>No Show </label><input class="form-control"  value="<?php echo $VAR_nosh ?>"  name="txtnosh"  id="txtnosh" ></div></div>


                                          <?php  if($VAR_ods>0){  ?>

                                              <div class="col-lg-3">
                                                      <div class="form-group" style="text-align:center;padding-top:10px">
                                                         <a href="excur_ods_agregar.php?i=<?php echo $VAR_ods ?>" class=" "  style="font-size:18px">
                                                         <button  type="button" class="btn btn-primary btn-lg btn-block">
                                                              REGRESAR A ODS
                                                          </button>
                                                          </a>

                                                      </div>
                                              </div>

                                           <?php  } ?>



                                              <div class="col-lg-12">
                                                      <div class="form-group">
                                                          <label>Observaciones</label>
                                                          <textarea class="form-control" value=""  name="txtobse" id="txtobse" ><?php echo $VAR_obse ?></textarea>
                                                      </div>
                                              </div>




                               <?php  if(isset($VAR_ID)){ ?>
                                    <div class="col-lg-6"><button type="submit" onclick="document.frm.action='excur_agregar.php?acc=save&i=<?php echo $VAR_ID ?>'" class="btn btn-primary btn-lg btn-block">Guardar Cambios</button></div>
                                    <div class="col-lg-6"><button type="button" onclick="


                                                        alertify.confirm('MFTSYS', 'Desea eliminar la orden', function(){

                                                                     document.frm.action='excur_agregar.php?acc=del&i=<?php echo $VAR_ID ?>'
                                                                     document.frm.submit();

                                                                       }
                                                                   ,''  );



                                                    " class="btn btn-primary btn-lg btn-block">Eliminar</button></div>
                                   <!-- <div class="col-lg-6"><button type="submit" class="btn btn-primary btn-lg btn-block">IMPRIMIR</button></div>-->
                               <?php  }else{ ?>
                                    <div class="col-lg-12">
                                       <button type="submit" class="btn btn-primary btn-lg btn-block">Guardar </button>
                                    </div>
                              <?php   } ?>

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


</body>


<script src="//rawgithub.com/indrimuska/jquery-editable-select/master/dist/jquery-editable-select.min.js"></script>
<script>
   $( document ).ready(function() {

     //  $('#txtagen option[value="<?php echo $VAR_agen ?>"]');

    //   $('#txtagen option[value="<?php echo $VAR_agen ?>"]').attr("selected", "selected");
   //     $('#txtagen').val('<?php echo $VAR_agen ?>');


           $("#txtagen option[value='<?php echo $VAR_agen ?>']").attr("selected",true);
          //   alert('<?php echo $VAR_agen ?>');


  });

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




        function enviar_mail(ID){

                         alertify.confirm('MFT', '<div style="text-align:center">¿Desea enviar <b>correo de notificación</b> al cliente?</div>', function(){

                                               var arch = 'send_confirm.php?i='+ID;
                                                        //    alert(arch);
                                                          $.get(arch);

                                           alertify.alert('MFT','<div style="text-align:center"><li class="fa fa-envelope-o fa-3x"></li><br>Notificación enviada</div>');
                                         }
                                        , function(){


                                        });




        }



</script>

</html>
