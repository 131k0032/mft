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

        <div id="page-wrapper" style="width:2900px;border:0px solid red">
            <div class="row">&nbsp;
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12" style="width:2900px;border:0px solid red" >
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


                                     $sqlf = $sqlf . " order by  date1, time1, oper, id";

                        //         echo $sqlf;


?>

                           <H2> CONTROL DIARIO DE OPERACIONES</H2>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">

                        <div class="col-lg-7" style="padding-bottom:10px" >
                        <div class="row">
                                <form method="post"  id="formulario" name="formulario">
                                    <input name="txtrep" id="txtrep" type="hidden">

                                <div class="row">
                                    <div class="col-lg-2" >
                                        <label>Fecha</label>
                                        <input class="form-control"  id="txtdel" name="txtdel" type="date" value="<?php echo $VAR_DEL ?>" />
                                    </div>
                                    <?php
                                    /*
                                  <!--
                                    <div class="col-lg-2" >
                                        <label>Al</label>
                                        <input class="form-control" onchange="document.formulario.submit()" name="txtal" type="date" value="<?php echo $VAR_AL ?>" />
                                    </div>
                                 -->
                                 */
                                 ?>
                                    <div class="col-lg-2" >
                                        <label>Operador</label>
                                        <select class="form-control"   name="txtoper" >
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
                                        <select class="form-control"    name="txtagen" >
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
                                        <select class="form-control"    name="txtnoec" >
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
                                                    <select class="form-control"   id="txttipo" name="txttipo">
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
                                     </DIV>
                                    <div class="row">
                                          <div class="col-lg-2">
                                            <div class="form-group">
                                                <br><button class="btn btn-primary btn-lg btn-block" style="width:100%">FILTRAR</button>
                                            </div>
                                         </div>
                                         <div class="col-lg-3">
											<div class="form-group">
                                                <br><button class="btn btn-info btn-lg btn-block btncerrar" style="width:100%">
                                                <li class="fa fa-clock-o"></li>
                                                Cerrar todas las ordenes terminadas
                                            	</button>
                                            </div>
                                         </div>
                                    </div>
                                    <?php /*
                                  <!--
                                    <div class="col-lg-2" >
                                        <label>Estatus</label>
                                        <select class="form-control" onchange="document.formulario.submit()"   name="txtest" >


                                            <option <?php if($VAR_EST=="abierta"){echo "selected"; }?> value="abierta" >Abierta</option>
                                                                                <option <?php if($VAR_EST=="cerrada"){echo "selected"; }?> value="cerrada" >Cerrada</option>
                                                                            </select>
                                    </div>
                                 -->
                                   */
                                   ?>



                                  </form>
                    </div>
                  </div>
                        <div class="col-lg-12"><hr></div>

                            <table  style="width:100%" data-order='[[ 0, "desc" ]]' data-page-length='50' class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th style="width:20px">ID</th>
                                        <th>&nbsp;</th>
                                        <th>#</th>
                                        <th>Estatus</th>
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
                                        <th>Cupón</th>
                                        <th>Gasolina #1</th>
                                        <th>Gasolina #2</th>
                                        <th>Gasolina #3</th>
                                        <th>Litros</th>
                                        <th>KI</th>
                                        <th>KF</th>
                                        <th>Recorrido</th>
                                        <th>Estimado</th>
                                        <th>Diferencia consumo</th>
                                        <th>Utilidad</th>
                                        <th>Rendto x Km</th>
                                        <th>Comentarios</th>





                                    </tr>
                                </thead>
                                <tbody>
                                    <?php


                                    //   ECHO $sqlf;

                                       $VAR_COLOR = "";

                                      $rsf1 = adoopenrecordset($sqlf);
                                      $rstempf1 = mysql_fetch_array($rsf1);

                                      $VAR_OPER = $rstempf1["oper"];
                                      $i = 0;

                                      $rsf = adoopenrecordset($sqlf);
                                      while($rstempf = mysql_fetch_array($rsf)){


                                          $VAR_NX = "";

                                                  if( date("Y-M-d",$rstempf["num"]) != date("Y-M-d")  ){
                                                      $i = $i + 1;
                                                      $VAR_NX = $i;

                                                  }


                                        $VAR_COLOR ="";
                                        if($rstempf["estatus"]=="cancelada"){$VAR_COLOR="#FF6161";}
                                        if($rstempf["estatus"]=="cerrada"){$VAR_COLOR="#BEFF9E";}


                                      ?>

                                            <tr   style="cursor:pointer; background-color:<?php echo $VAR_COLOR ?>" id="row<?php echo $rstempf["id"] ?>" >
                                            <td title="id" style="text-align:center"><a href="agregar-servicio.php?t=<?php echo $rstempf["id"] ?>"><?php echo $rstempf["id"]  ?></a></td>
                                            <td title="boton" >
                                                <?php if($rstempf["estatus"]=="terminada"){ ?>

                                                    <button id="bt<?php echo $rstempf["id"] ?>"  onclick="cerrar(<?php echo $rstempf["id"] ?>)" >
                                                    <span class="fa fa-lock"  ></span>&nbsp;Cerrar</button><p id="p"></p>
                                                <?php } ?>
                                            </td>

                                            <td title="#" style="text-align:center"><a href="agregar-servicio.php?t=<?php echo $rstempf["id"] ?>"><?php echo $VAR_NX ?></a></td>
                                            <td title="estatus"     ><?php echo strtoupper($rstempf["estatus"]) ?></td>
                                            <td title="noec"        ><?php echo $rstempf["tipo_veh"] ?></td>
                                            <td title="noec"        ><?php echo $rstempf["noec"] ?></td>
                                            <td title="plac"        ><?php echo $rstempf["plac"] ?></td>
                                            <td title="proveedor"   ><?php echo $rstempf["pro_nomb"] ?></td>
                                            <td title="oper"        ><?php echo $rstempf["oper"] ?></td>
                                            <td title="agen"        ><?php echo $rstempf["agen"] ?></td>
                                            <td title="srv"         ><?php echo strtoupper($rstempf["tipo"]) ?></td>
                                            <td title="pax"         ><?php echo ($rstempf["adul"].".".$rstempf["chil"].".".$rstempf["enfa"]) ?></td>
                                            <td title="name"        ><?php echo $rstempf["name"] ?></td>
                                            <td title="room"        ><?php echo $rstempf["room"] ?></td>
                                            <td title="hora"        ><?php echo $rstempf["time1"] ?></td>
                                            <td title="orig"        ><?php echo substr($rstempf["orig1"],0,25) ?></td>
                                            <td title="dest"        ><?php echo substr(strtoupper($rstempf["dest1"]),0,25) ?></td>
                                            <td title="vuel"        ><?php echo  $rstempf["vuel1"]  ?></td>
                                            <td title="cve"         >CC<?php echo $rstempf["cve"]  ?>BB<?php echo $rstempf["cve2"]  ?></td>
                                            <td title="cupon"       ><input  type="text"               name="cupo"         value="<?php echo $rstempf["cupo"] ?>"          id="<?php echo $rstempf["id"] ?>" style="text-align:center" size=7></td>
                                            <td title="gas"         ><input readonly type="text" class="ceros"    onchange="calcular(<?php echo $rstempf["id"] ?>)"      name="gasolina"     value="<?php echo $rstempf["gasolina"] ?>"      id="<?php echo $rstempf["id"] ?>" style="text-align:center" size=7></td>
                                            <td title="gas2"        ><input type="text" readonly class="ceros"    onchange="calcular(<?php echo $rstempf["id"] ?>)"      name="gas2"         value="<?php echo $rstempf["gas2"] ?>"     id="<?php echo $rstempf["id"] ?>" style="text-align:center" size=7></td>
                                            <td title="gas3"        ><input type="text" readonly class="ceros"    onchange="calcular(<?php echo $rstempf["id"] ?>)"      name="gas3"         value="<?php echo $rstempf["gas3"] ?>"     id="<?php echo $rstempf["id"] ?>" style="text-align:center" size=7></td>
                                            <td title="litros"      ><input type="text" readonly class="ceros"    onchange="calcular(<?php echo $rstempf["id"] ?>)"      name="litros"      value="<?php echo $rstempf["litros"] ?>"      id="<?php echo $rstempf["id"] ?>" style="text-align:center" size=7></td>
                                            <td title="ki"          ><input type="text" readonly class="ceros"    onchange="calcular(<?php echo $rstempf["id"] ?>)"      name="ki"         value="<?php echo $rstempf["ki"] ?>"          id="<?php echo $rstempf["id"] ?>" style="text-align:center" size=7></td>
                                            <td title="kf"          ><input type="text" readonly class="ceros"    onchange="calcular(<?php echo $rstempf["id"] ?>)"      name="kf"         value="<?php echo $rstempf["kf"] ?>"          id="<?php echo $rstempf["id"] ?>"style="text-align:center"  size=7></td>
                                                <?php
                                                    $VAR_RECORRIDO      =  $rstempf["kf"]-$rstempf["ki"];
                                                    $VAR_ESTIMADO       =  $VAR_RECORRIDO/120*228;
                                                    $VAR_DIFERENCIA     =  $VAR_ESTIMADO-$rstempf["litros"];
                                                    if(  ($rstempf["gasolina"]+$rstempf["gas2"]+$rstempf["gas3"])>0 and ($rstempf["kf"]-$rstempf["ki"] )>0 ) {
                                                        $VAR_UTILIDAD= ($rstempf["gasolina"]+$rstempf["gas2"]+$rstempf["gas3"]) / ($rstempf["kf"]-$rstempf["ki"]);
                                                    }else{
                                                        $VAR_UTILIDAD = 0;
                                                    }

                                                    if($VAR_RECORRIDO>0 and $rstempf["litros"] > 0){
                                                         $VAR_RENDIMIENTO    =  ($VAR_RECORRIDO) / ($rstempf["litros"]);
                                                    }else{
                                                         $VAR_RENDIMIENTO= 0;
                                                    }

                                                ?>


                                            <td title="recorrido"   style="text-align:center"><span id="rec<?php echo $rstempf["id"] ?>" >     <?php echo number_format($VAR_RECORRIDO,2) ?>     </span> </td>
                                            <td title="estimado"    style="text-align:center"><span id="est<?php echo $rstempf["id"] ?>" >     <?php echo number_format($VAR_ESTIMADO,2) ?>     </span> </td>
                                            <td title="diferencia"  style="text-align:center"><span id="dif<?php echo $rstempf["id"] ?>" >     <?php echo number_format($VAR_DIFERENCIA,2) ?>     </span> </td>
                                            <td title="utilidad"    style="text-align:center"><span id="uti<?php echo $rstempf["id"] ?>" >     <?php echo number_format($VAR_UTILIDAD,2) ?>     </span> </td>
                                            <td title="rendto"      style="text-align:center"><span id="ren<?php echo $rstempf["id"] ?>" >     <?php echo number_format($VAR_RENDIMIENTO,2) ?>     </span> </td>
                                            <td title="<?php echo $rstempf["come"]  ?>"       ><?php echo substr($rstempf["come"],0,55)  ?>...<span  onclick="alert('<?php echo $rstempf["come"]  ?>')" class="fa fa-eye title='<?php echo $rstempf["come"]  ?>' "></span> </td>





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




    <script>



    $(document).ready(function() {



        $('#dataTables-example').DataTable({

            responsive: false,
              "columnDefs": [
                { "width": "20px", "targets":0  },
                { "width": "10px", "targets":1  },
                { "width": "10px", "targets":2  },
                { "width": "20px", "targets":3  },
                { "width": "20px", "targets":4  },
                { "width": "140px", "targets": 7 }
              ],
            bSort:false
        });



          $('#cober').hide();

    });



  function Guardar() {

            window.scrollTo(0, 0);
            $('#cober').show();



            $('input[name^="gas2"]').each(function()    {  var arch = 'update-operador.php?c=gas2&val='+$(this).val()+'&i='+$(this).attr('id');  $.get(arch);    });

            $('input[name^="gas3"]').each(function()    {  var arch = 'update-operador.php?c=gas3&val='+$(this).val()+'&i='+$(this).attr('id');  $.get(arch);    });



            $('input[name^="costo"]').each(function()   { var arch = 'update-operador.php?c=costo&val='+$(this).val()+'&i='+$(this).attr('id');  $.get(arch);  });
            $('input[name^="cupo"]').each(function()    { var arch = 'update-operador.php?c=cupo&val='+$(this).val()+'&i='+$(this).attr('id');  $.get(arch);  });

            $('input[name^="gasolina"]').each(function()    { var arch = 'update-operador.php?c=gasolina&val='+$(this).val()+'&i='+$(this).attr('id');  $.get(arch);  });

            $('input[name^="sueldo"]').each(function()      { var arch = 'update-operador.php?c=sueldo&val='+$(this).val()+'&i='+$(this).attr('id');  $.get(arch);  });
            $('input[name^="litros"]').each(function()      { var arch = 'update-operador.php?c=litros&val='+$(this).val()+'&i='+$(this).attr('id');  $.get(arch);  });
            $('input[name^="ki"]').each(function()          { var arch = 'update-operador.php?c=ki&val='+$(this).val()+'&i='+$(this).attr('id');  $.get(arch);  });
            $('input[name^="kf"]').each(function()          { var arch = 'update-operador.php?c=kf&val='+$(this).val()+'&i='+$(this).attr('id');  $.get(arch);  });
            $('input[name^="estimado"]').each(function()    { var arch = 'update-operador.php?c=estimado&val='+$(this).val()+'&i='+$(this).attr('id');  $.get(arch);  });

            alertify.success("Asignaciones Guardadas");
           //       setTimeout(location.reload.bind(location), 1500);
           var timeoutId = setTimeout(function(){
                  $('#cober').hide()
           },14000);



         }



    $("#guardar").click(
          function(){
             Guardar();
         }
    );

    $('.btncerrar').on('click',function(){
    	var respuesta = confirm("¿Desea cerrar todas las ordenes terminadas?")
    	var date = document.getElementById("txtdel").value;
    	if (respuesta == true) {
    		var fecha = 'update-orden-cerrada.php?&date='+date;
    		$.get(fecha);
		}
		else {
		    alert('No se cambio  ningún registro');
		}
    });


    function cerrar(ID){
             alertify.confirm('MFTSYS', 'Desea marcar la orden como cerrada?', function(){
              var arch = 'update-orden-cerrada.php?&i='+ID;
                   $.get(arch);

                   Guardar();
                    $("#row"+ID).css('background-color', '#BEFF9E');
                //   $("#row"+ID).hide('slow');
                  $("#bt"+ID).hide();
                   $("#p"+ID).text('Cerrada');


             alertify.success('Orden Cerrada') }
                , function(){

                    //alertify.error('Cancel')
                });



    };


  function calcular(ID){

      var varrec = $('[id='+ID+'][name="kf"]').val()-$('[id='+ID+'][name="ki"]').val();
      var varest = varrec/120*228;

     $('#rec'+ID).html( number_format(varrec,2));
     $('#est'+ID).html( number_format(varest,2)) ;
     $('#dif'+ID).html( number_format(varest- $('[id='+ID+'][name="litros"]').val(),2) );
     $('#uti'+ID).html( number_format( ($('[id='+ID+'][name="gasolina"]').val() + $('[id='+ID+'][name="gas2"]').val() +$('[id='+ID+'][name="gas3"]').val())  /  ($('[id='+ID+'][name="kf"]').val()-$('[id='+ID+'][name="ki"]').val()) ,2) );
     $('#ren'+ID).html( number_format( varrec/ $('[id='+ID+'][name="litros"]').val(),2) );

     /*

     $('#est'+ID).html(($('[id='+ID+'][name="kf"]').val()-$('[id='+ID+'][name="ki"]').val())/120*  );



     $('#dif'+ID).html( ($('[id='+ID+'][name="gasolina"]').val() + $('[id='+ID+'][name="gas2"]').val())  /  ($('[id='+ID+'][name="kf"]').val()-$('[id='+ID+'][name="ki"]').val())  );

     $('#uti'+ID).html( ($('[id='+ID+'][name="gasolina"]').val() + $('[id='+ID+'][name="gas2"]').val())  /  ($('[id='+ID+'][name="kf"]').val()-$('[id='+ID+'][name="ki"]').val())  );
     $('#ren'+ID).html( ($('[id='+ID+'][name="gasolina"]').val() + $('[id='+ID+'][name="gas2"]').val())  /  ($('[id='+ID+'][name="kf"]').val()-$('[id='+ID+'][name="ki"]').val())  );

     */


  }




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
});



    </script>

</body>

</html>
