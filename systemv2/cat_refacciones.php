<!DOCTYPE html>
<?php include "../db_conexion.php"   ?>
<?php include "funciones.php"   ?>
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

                 $VAR_TITULO = "CATÁLOGO DE REFACCIONES";


                 $VAR_DESC ="";
                 $VAR_MARC ="";
                 $VAR_COST ="";
                 $VAR_MODE ="";
                 $VAR_NOPA ="";
                 $VAR_SMAX ="";
                 $VAR_SMIN ="";



              include "nav.php";


              if(isset($_GET["i"])){
                     $VAR_ID     = $_GET["i"];
              }


        if(isset($_GET["acc"])){
                    if($_GET["acc"]=="add"){


                              $sql="insert into cat_refacciones values (
                              0,
                              '".$_POST["txtdesc"]."',
                              '".$_POST["txtmarc"]."',
                              '".$_POST["txtcost"]."',
                              '".$_POST["txtmode"]."',
                              '".$_POST["txtnopa"]."',
                              '".$_POST["txtsmax"]."',
                              '".$_POST["txtsmin"]."'
                              )";
                              adoexecute($sql);
                             //   echo  "-------------------------------------------------------->".$sql;




                              ?>
                              <script>
                              alertify.success('Registro Agregado');
                              </script>
                              <?php
                    }

                   if($_GET["acc"]=="gua"){

                              $sql="update  cat_refacciones set
                               ref_desc = '".$_POST["txtdesc"]."',
                               ref_marc = '".$_POST["txtmarc"]."',
                               ref_cost = '".$_POST["txtcost"]."',
                               ref_mode = '".$_POST["txtmode"]."',
                               ref_nopa = '".$_POST["txtnopa"]."',
                               ref_smax = '".$_POST["txtsmax"]."',
                               ref_smin = '".$_POST["txtsmin"]."'
                               where ref_id = ".$VAR_ID;

                              adoexecute($sql);
                           //   echo  "-------------------------------------------------------->".$sql;

                             unset($_GET["i"]);
                             unset($VAR_ID);

                              ?>
                              <script>
                              alertify.alert('MFTSYS', 'Registro Guardado');
                              </script>
                              <?php
                    }


              if($_GET["acc"]=="del"){

                    $sql="select * from almacen where ref_id = ".$VAR_ID."";
                    $rs = adoopenrecordset($sql);
                    $rstemp = mysql_fetch_array($rs);
                     if($rstemp["inv_id"]>0){
                      ?>
                      <script>
                        alertify.alert('No se puede eliminar el registro, está siendo utilizado por el módulo de Inventario Diario');
                      </script>
                      <?php

                     }else{

                          $sql="delete from   cat_refacciones where ref_id = ".$VAR_ID."";
                          adoexecute($sql);
                          unset($VAR_ID);
                          //  echo  "-------------------------------------------------------->".$sql;
                          unset($_GET["i"]);

                    }

              ?>
              <script>
                alertify.error('Registro Eliminado');
              </script>
              <?php

              }

        }


              if(isset($_GET["i"])){
                        $sql="select * from cat_refacciones where ref_id = ".$VAR_ID;
                        $rs = adoopenrecordset($sql);
                        $rstemp = mysql_fetch_array($rs);

                 $VAR_DESC =$rstemp["ref_desc"];
                 $VAR_MARC =$rstemp["ref_marc"];
                 $VAR_COST =$rstemp["ref_cost"];
                 $VAR_MODE =$rstemp["ref_mode"];
                 $VAR_NOPA =$rstemp["ref_nopa"];
                 $VAR_SMAX =$rstemp["ref_smax"];
                 $VAR_SMIN =$rstemp["ref_smin"];

              }


                 ?>

          <div id="page-wrapper">
            <form role="form" method="post" action="cat_refacciones.php?acc=add" name="frm">
                <div class="row"> <div class="col-lg-12"><h1 class="page-header"><?php echo $VAR_TITULO ?> </h1></div></div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-3"><div class="form-group"><label>Descripción </label><input class="form-control" required value="<?php  echo $VAR_DESC ?>"   name="txtdesc"  id="txtdesc" placeholder=""></div></div>
                                    <div class="col-lg-3"><div class="form-group"><label>Marca       </label><input class="form-control" required value="<?php  echo $VAR_MARC ?>"   name="txtmarc"  id="txtmarc"  ></div></div>
                                    <div class="col-lg-2"><div class="form-group"><label>Costo       </label><input class="form-control" required value="<?php  echo $VAR_COST ?>"   name="txtcost"  id="txtcost"  ></div></div>
                                    <div class="col-lg-2"><div class="form-group"><label>Modelo      </label><input class="form-control" required value="<?php  echo $VAR_MODE ?>"   name="txtmode"  id="txtmode"  ></div></div>
                                    <div class="col-lg-2"><div class="form-group"><label># Parte      </label><input class="form-control" required value="<?php  echo $VAR_NOPA ?>"   name="txtnopa"  id="txtnopa"  ></div></div>
                                    <div class="col-lg-2"><div class="form-group"><label>Stock Max.      </label><input class="form-control" required value="<?php  echo $VAR_SMAX ?>"   name="txtsmax"  id="txtsmax"  ></div></div>
                                    <div class="col-lg-2"><div class="form-group"><label>Stock Min.      </label><input class="form-control" required value="<?php  echo $VAR_SMIN ?>"   name="txtsmin"  id="txtsmin"  ></div></div>





                                    <?php  if(isset($_GET["i"])){   ?>

                                        <div class="col-lg-3" style="margin:2px;"><button type="submit" onclick="window.frm.action='?i=<?php echo $rstemp["ref_id"] ?>&acc=gua'"  class="btn btn-primary btn-lg btn-block"> <span class="fa fa-save"></span> Guardar </button></div>
                                        <div class="col-lg-3"><button type="button" onclick="window.location.href='cat_refacciones.php'"  class="btn btn-primary btn-lg btn-block"><span class="fa fa-close"></span> Cancelar </button></div>
                                    <?php
                                            } else {
                                    ?>
                                    <div class="col-lg-3" style="padding-top:20px"><button type="submit" onclick="window.frm.action='cat_refacciones.php?acc=add'" class="btn btn-primary btn-lg btn-block"><span class="fa fa-plus"></span> Agregar </button> </div>

                                    <?php      } ?>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12"><div class="row col-lg-12"><hr></div></div>
                                    <div class="col-lg-12">
                                      <table  style="width:100%" data-order='[[ 0, "desc" ]]' data-page-length='50' class="table table-striped table-bordered table-hover" id="dataTables-example">
                                          <thead>
                                              <tr>
                                              <th>Descripción</th>
                                              <th>Marca</th>
                                              <th>$</th>
                                              <th>Modelo</th>
                                              <th># Parte</th>
                                              <th>S.Max</th>
                                              <th>S.Min</th>
                                              <th>Existencias</th>
                                              <th>&nbsp;</th>
                                              </tr>
                                          </thead>
                                          <tbody>
                                              <?php
                                              $sql="select * from cat_refacciones order by ref_desc";
                                              $rs = adoopenrecordset($sql);
                                              while($rstemp = mysql_fetch_array($rs)){

                                                $VAR_EXIS = refacciones_existencias($rstemp["ref_id"]);

                                                $VAR_COLOR = "";

                                                if($VAR_EXIS < $rstemp["ref_smin"] ){ $VAR_COLOR = "#FF0000";  }
                                                if($VAR_EXIS > $rstemp["ref_smax"] ){ $VAR_COLOR = "#FFCC00"; }



                                              ?>
                                              <tr  style="cursor:pointer"    >
                                                  <td onclick="window.location.href='?i=<?php echo $rstemp["ref_id"] ?>'"><?php echo $rstemp["ref_desc"] ?></td>
                                                  <td onclick="window.location.href='?i=<?php echo $rstemp["ref_id"] ?>'"><?php echo $rstemp["ref_marc"] ?></td>
                                                  <td style="text-align:right" onclick="window.location.href='?i=<?php echo $rstemp["ref_id"] ?>'"><?php echo number_format($rstemp["ref_cost"],2)    ?></td>
                                                  <td onclick="window.location.href='?i=<?php echo $rstemp["ref_id"] ?>'"><?php echo $rstemp["ref_mode"] ?></td>
                                                  <td onclick="window.location.href='?i=<?php echo $rstemp["ref_id"] ?>'"><?php echo $rstemp["ref_nopa"] ?></td>
                                                  <td style="text-align:center" onclick="window.location.href='?i=<?php echo $rstemp["ref_id"] ?>'"><?php echo $rstemp["ref_smax"] ?></td>
                                                  <td style="text-align:center" onclick="window.location.href='?i=<?php echo $rstemp["ref_id"] ?>'"><?php echo $rstemp["ref_smin"] ?></td>
                                                  <td style="text-align:center; background-color: <?php echo $VAR_COLOR ?>" onclick="window.location.href='?i=<?php echo $rstemp["ref_id"] ?>'"><b><?php echo $VAR_EXIS ?></b></td>



                                                  <td style="text-align:Center">
                                                  <button type="button"

                                                  onclick="
                                                    alertify.confirm('MFTSYS', '¿Desea eliminar el registro?', function(){
                                                        document.frm.action='cat_refacciones.php?acc=del&i=<?php echo $rstemp["ref_id"] ?>'
                                                        document.frm.submit();
                                                  }
                                                  ,''  );
                                                  "
                                                  ><span class="fa fa-trash"></span></button>
                                                  </td>
                                              </tr>
                                              <?php
                                              }
                                              ?>
                                          </tbody>
                                      </table>
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

$("#txtdesc").focus();




</script>

</html>