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


               $sql="select * from _vehiculos where veh_id =".$_GET["i"];
               $rs = adoopenrecordset($sql);
               $rstemp = mysql_fetch_array($rs);

               $VAR_NOEC = $rstemp["veh_noec"];
               $VAR_NOSE = $rstemp["veh_nose"];
               $VAR_NOMB = $rstemp["veh_nomb"];
               $VAR_PLAC = $rstemp["veh_plac"];
               $VAR_ID   = $rstemp["veh_id"];



                 $VAR_TITULO = "AGREGAR INVENTARIO DIARIO";
                 $VAR_FECH = date("Y-m-d");
                 $VAR_OPER ="";
                 $VAR_SUPE ="";

               //  echo "----------------------------------->".$VAR_FECH;


              include "nav.php";


              if(isset($_GET["i"])){
                     $VAR_ID     = $_GET["i"];
              }




        if(isset($_GET["acc"])){
                    if($_GET["acc"]=="add"){

                       $VAR_VALO = "";

                            $numero=$_POST["txtvalo"];
                            $count = count($numero);
                            for ($i = 0; $i < $count; $i++) {
                                    $VAR_VALO = $VAR_VALO . "|" . $numero[$i];
                            }


                         //   echo $VAR_VALO;


                              $sql="insert into veh_inventario values (
                              0,
                              '".$_POST["txtfech"]."',
                              '".$_POST["txtoper"]."',
                              '".$_GET["i"]."',
                              '".$_POST["txtsupe"]."',
                              '".$VAR_VALO."'
                              )";
                              adoexecute($sql);
                             //   echo  "-------------------------------------------------------->".$sql;




                              ?>
                              <script>
                                    alertify
                                      .alert("Registro agregado", function(){
                                        window.location.href='veh_servicios_inv_diario.php?i=<?php echo $_GET["i"] ?>';
                                      });

                              </script>
                              <?php
                    }

                   if($_GET["acc"]=="gua"){


                       $VAR_VALO = "";

                            $numero=$_POST["txtvalo"];
                            $count = count($numero);
                            for ($i = 0; $i < $count; $i++) {
                                    $VAR_VALO = $VAR_VALO . "|" . $numero[$i];
                            }



                              $sql="update  veh_inventario set
                               inv_fech = '".$_POST["txtfech"]."',
                               inv_supe = '".$_POST["txtsupe"]."',
                               inv_oper = '".$_POST["txtoper"]."',
                               inv_valo = '".$VAR_VALO."'
                               where inv_id = ".$_GET["ii"];

                              adoexecute($sql);
                           //   echo  "-------------------------------------------------------->".$sql;

                           //  unset($_GET["i"]);
                           //  unset($VAR_ID);

                              ?>
                              <script>
                                    alertify
                                      .alert("Registro guardado", function(){
                                        window.location.href='veh_servicios_inv_diario.php?i=<?php echo $_GET["i"] ?>';
                                      });

                              </script>
                              <?php


                    }





        }


              if(isset($_GET["ii"])){
                        $sql="select * from veh_inventario where inv_id = ".$_GET["ii"];
                        $rs = adoopenrecordset($sql);
                        $rstemp = mysql_fetch_array($rs);
                        $VAR_FECH = $rstemp["inv_fech"];
                        $VAR_OPER = $rstemp["inv_oper"];
                        $VAR_SUPE = $rstemp["inv_supe"];
                        $VAR_VALO = $rstemp["inv_valo"];
              }


                 ?>

          <div id="page-wrapper">
            <form role="form" method="post" action="veh_inventario.php?acc=add" name="frm">
              <br>  <div class="panel panel-default">
                    <div class="panel-heading">
                        <b style="font-size:20px"><?php echo $VAR_TITULO ?></b> <br> NO ECO: <b><?php echo $VAR_NOEC ?></b> | PLACAS: <b><?php echo $VAR_PLAC ?> |
                        <a href="veh_servicios_inv_diario.php?i=<?php echo $_GET["i"] ?>"><span class="fa fa-undo"></span></a> </b>
                    </div>


              <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-3"><div class="form-group"><label>Fecha    </label><input class="form-control" required value="<?php  echo $VAR_FECH ?>" type="date"   name="txtfech"  id="txtfech" placeholder=""></div></div>
                                    <div class="col-lg-3"><div class="form-group"><label>Operador      </label>
                                            <select class="form-control" required   name="txtoper"  id="txtoper"  >
                                                <?php
                                                  $sql="select * from _operadores order by ope_nomb";
                                                  $rs = adoopenrecordset($sql);
                                                  while($rstemp = mysql_fetch_array($rs) ){
                                               ?>
                                                    <option><?php echo $rstemp["ope_nomb"] ?></option>
                                               <?php
                                                  }
                                                ?>
                                            </select>

                                            </div>
                                    </div>
                                    <div class="col-lg-3"><div class="form-group"><label>Supervisor    </label><input class="form-control" required value="<?php  echo $VAR_SUPE ?>"   name="txtsupe"  id="txtsupe" placeholder=""></div></div>



                                    <?php  if(isset($_GET["ii"])){   ?>

                                        <div class="col-lg-3" style="margin:2px;"><button type="submit" onclick="window.frm.action='?ii=<?php echo $_GET["ii"] ?>&i=<?php echo $_GET["i"] ?>&acc=gua'"  class="btn btn-primary btn-lg btn-block"> <span class="fa fa-save"></span> Guardar </button></div>
                                        <div class="col-lg-3"><button type="button" onclick="window.location.href='veh_servicios_inv_diario.php?i=<?php echo $_GET["i"]?>'"  class="btn btn-primary btn-lg btn-block"><span class="fa fa-close"></span> Cancelar </button></div>
                                    <?php
                                            } else {
                                    ?>
                                    <div class="col-lg-3" style="padding-top:20px"><button type="submit" onclick="window.frm.action='veh_inventario_inv_det.php?acc=add&i=<?php echo $_GET["i"] ?>'" class="btn btn-primary btn-lg btn-block"><span class="fa fa-plus"></span> Agregar </button> </div>

                                    <?php      } ?>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12"><div class="row col-lg-12"><hr></div></div>
                                    <div class="col-lg-12">
                                           <div class="col-lg-4">
                                                <div style="text-align:center"><b>EXTERIORES</b></div>
                                                <?php
                                                    $sql="select * from cat_inventario where cin_cate ='Exteriores' order by cin_orde";

                                                  // echo $sql;


                                                    $rs = adoopenrecordset($sql) ;
                                                    while($rstemp = mysql_fetch_array($rs)){

                                                   $VAR_CHECK = "checked";
                                                   if(isset($VAR_VALO)){
                                                     if(strpos($VAR_VALO,$rstemp["cin_desc"])==0){
                                                          $VAR_CHECK = "";
                                                     }
                                                   }

                                                 ?>
                                                     <div style="margin:2px;border:1px solid silver">
                                                        <div class="col-lg-8"><?php echo $rstemp["cin_desc"]?></div>
                                                        <div class="col-lg-4"><input type="checkbox" name="txtvalo[]" value="<?php echo $rstemp["cin_desc"]?>" id='<?php echo $rstemp["cin_id"]?>' <?php echo $VAR_CHECK ?> /></div>
                                                         <div style="clear:both"></div>
                                                     </div>


                                                 <?php
                                                    }
                                                ?>



                                           </div>
                                           <div class="col-lg-4">
                                                <div style="text-align:center"><b>INTERIORES</b></div>
                                            <?php
                                                    $sql="select * from cat_inventario where cin_cate ='Interiores' order by cin_orde";
                                                    $rs = adoopenrecordset($sql) ;
                                                    while($rstemp = mysql_fetch_array($rs)){

                                                   $VAR_CHECK = "checked";
                                                   if(isset($VAR_VALO)){
                                                     if(strpos($VAR_VALO,$rstemp["cin_desc"])==0){
                                                          $VAR_CHECK = "";
                                                     }
                                                   }

                                                 ?>
                                                     <div style="margin:2px;border:1px solid silver">
                                                        <div class="col-lg-8"><?php echo $rstemp["cin_desc"]?></div>
                                                        <div class="col-lg-4"><input type="checkbox" name="txtvalo[]" value="<?php echo $rstemp["cin_desc"]?>" id='<?php echo $rstemp["cin_id"]?>' <?php echo $VAR_CHECK ?> /></div>
                                                         <div style="clear:both"></div>
                                                     </div>


                                                 <?php
                                                    }
                                                ?>

                                           </div>
                                           <div class="col-lg-4">
                                                <div style="text-align:center"><b>ACCESORIOS</b></div>
                                            <?php
                                                    $sql="select * from cat_inventario where cin_cate ='Accesorios' order by cin_orde";
                                                    $rs = adoopenrecordset($sql) ;
                                                    while($rstemp = mysql_fetch_array($rs)){
                                                   $VAR_CHECK = "checked";
                                                   if(isset($VAR_VALO)){
                                                     if(strpos($VAR_VALO,$rstemp["cin_desc"])==0){
                                                          $VAR_CHECK = "";
                                                     }
                                                   }
                                                 ?>
                                                     <div style="margin:2px;border:1px solid silver">
                                                        <div class="col-lg-8"><?php echo $rstemp["cin_desc"]?></div>
                                                        <div class="col-lg-4"><input type="checkbox" name="txtvalo[]" value="<?php echo $rstemp["cin_desc"]?>" id='<?php echo $rstemp["cin_id"]?>' <?php echo $VAR_CHECK ?> /></div>
                                                         <div style="clear:both"></div>
                                                     </div>


                                                 <?php
                                                    }
                                                ?>

                                           </div>

                                           <div class="col-lg-4">
                                                <div style="text-align:center"><b>DOCUMENTOS</b></div>
                                            <?php
                                                    $sql="select * from cat_inventario where cin_cate ='Documentos' order by cin_orde";
                                                    $rs = adoopenrecordset($sql) ;
                                                    while($rstemp = mysql_fetch_array($rs)){
                                                   $VAR_CHECK = "checked";
                                                   if(isset($VAR_VALO)){
                                                     if(strpos($VAR_VALO,$rstemp["cin_desc"])==0){
                                                          $VAR_CHECK = "";
                                                     }
                                                   }
                                                 ?>
                                                     <div style="margin:2px;border:1px solid silver">
                                                        <div class="col-lg-8"><?php echo $rstemp["cin_desc"]?></div>
                                                        <div class="col-lg-4"><input type="checkbox" name="txtvalo[]" value="<?php echo $rstemp["cin_desc"]?>" id='<?php echo $rstemp["cin_id"]?>' <?php echo $VAR_CHECK ?> /></div>
                                                         <div style="clear:both"></div>
                                                     </div>


                                                 <?php
                                                    }
                                                ?>

                                           </div>


                                    </div>

                                    </div>
                                </div>
                             </div>
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

$("#txtoper").val('<?php echo $VAR_OPER ?>');
$("#txtdesc").focus();




</script>

</html>
