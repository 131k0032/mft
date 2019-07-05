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

                 $VAR_TITULO = "CATÁLOGO DE INVENTARIO";
                 $VAR_DESC ="";
                 $VAR_ORDE ="";
                 $VAR_CATE ="Interiores";
                 $VAR_OPCI ="SI*NO";


              include "nav.php";


              if(isset($_GET["i"])){
                     $VAR_ID     = $_GET["i"];
              }


        if(isset($_GET["acc"])){
                    if($_GET["acc"]=="add"){




                           if(empty($_POST["txtorde"])){
                                $sql="select max(cin_orde) as total from cat_inventario";
                                $rs = adoopenrecordset($sql);
                                $rstemp = mysql_fetch_array($rs);
                                $VAR_ORD = $rstemp["total"] + 1;

                           } else {

                             $VAR_ORD = $_POST["txtorde"];

                         }


                              $sql="insert into cat_inventario values (
                              0,
                              '".$_POST["txtdesc"]."',
                              '".$VAR_ORD."',
                              '".$_POST["txtcate"]."',
                              '".$_POST["txtopci"]."'
                              )";
                              adoexecute($sql);
                             //   echo  "-------------------------------------------------------->".$sql;




                              ?>
                              <script>
                              alertify.success('Inventario Agregado');
                              </script>
                              <?php
                    }

                   if($_GET["acc"]=="gua"){

                              $sql="update  cat_inventario set
                               cin_desc = '".$_POST["txtdesc"]."',
                               cin_orde = ".$_POST["txtorde"].",
                               cin_cate = '".$_POST["txtcate"]."',
                               cin_opci = '".$_POST["txtopci"]."'
                               where cin_id = ".$VAR_ID;

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

                    $sql="select * from veh_inventario where cin_id = ".$VAR_ID."";
                    $rs = adoopenrecordset($sql);
                    $rstemp = mysql_fetch_array($rs);
                     if($rstemp["inv_id"]>0){
                      ?>
                      <script>
                        alertify.alert('No se puede eliminar el registro, está siendo utilizado por el módulo de Inventario Diario');
                      </script>
                      <?php

                     }else{

                          $sql="delete from   cat_inventario where cin_id = ".$VAR_ID."";
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
                        $sql="select * from cat_inventario where cin_id = ".$VAR_ID;
                        $rs = adoopenrecordset($sql);
                        $rstemp = mysql_fetch_array($rs);
                        $VAR_DESC = $rstemp["cin_desc"];
                        $VAR_ORDE = $rstemp["cin_orde"];
                        $VAR_CATE = $rstemp["cin_cate"];
                        $VAR_OPCI = $rstemp["cin_opci"];
              }


                 ?>

          <div id="page-wrapper">
            <form role="form" method="post" action="cat_inventario.php?acc=add" name="frm">
                <div class="row"> <div class="col-lg-12"><h1 class="page-header"><?php echo $VAR_TITULO ?> </h1></div></div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-4"><div class="form-group"><label>Descripción    </label><input class="form-control" required value="<?php  echo $VAR_DESC ?>"   name="txtdesc"  id="txtdesc" placeholder=""></div></div>
                                    <div class="col-lg-2"><div class="form-group"><label>Opciones       </label><input class="form-control"          value="<?php  echo $VAR_OPCI ?>"   name="txtopci"  id="txtopci"  ></div></div>

                                    <div class="col-lg-2"><div class="form-group"><label>Categoría      </label>
                                            <select class="form-control" required   name="txtcate"  id="txtcate"  >
                                                <option>Interiores</option>
                                                <option>Exteriores</option>
                                                <option>Accesorios</option>
                                                <option>Documentos</option>
                                            </select>

                                            </div>
                                    </div>
                                    <div class="col-lg-2"><div class="form-group"><label>Orden          </label><input class="form-control"          value="<?php  echo $VAR_ORDE ?>"   name="txtorde"  id="txtorde"  ></div></div>


                                    <?php  if(isset($_GET["i"])){   ?>

                                        <div class="col-lg-3" style="margin:2px;"><button type="submit" onclick="window.frm.action='?i=<?php echo $rstemp["cin_id"] ?>&acc=gua'"  class="btn btn-primary btn-lg btn-block"> <span class="fa fa-save"></span> Guardar </button></div>
                                        <div class="col-lg-3"><button type="button" onclick="window.location.href='veh_catinv.php'"  class="btn btn-primary btn-lg btn-block"><span class="fa fa-close"></span> Cancelar </button></div>
                                    <?php
                                            } else {
                                    ?>
                                    <div class="col-lg-3" style="padding-top:20px"><button type="submit" onclick="window.frm.action='veh_catinv.php?acc=add'" class="btn btn-primary btn-lg btn-block"><span class="fa fa-plus"></span> Agregar </button> </div>

                                    <?php      } ?>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12"><div class="row col-lg-12"><hr></div></div>
                                    <div class="col-lg-12">
                                      <table  style="width:100%" data-order='[[ 0, "desc" ]]' data-page-length='50' class="table table-striped table-bordered table-hover" id="dataTables-example">
                                          <thead>
                                              <tr>
                                              <th>Orden</th>
                                              <th>Descripción</th>
                                              <th>Opciones</th>
                                              <th>Categoría</th>
                                              <th>&nbsp;</th>
                                              </tr>
                                          </thead>
                                          <tbody>
                                              <?php
                                              $sql="select * from cat_inventario order by cin_cate, cin_orde";
                                              $rs = adoopenrecordset($sql);
                                              while($rstemp = mysql_fetch_array($rs)){
                                              ?>
                                              <tr  style="cursor:pointer"    >
                                                  <td onclick="window.location.href='?i=<?php echo $rstemp["cin_id"] ?>'"><?php echo $rstemp["cin_orde"] ?></td>

                                                  <td onclick="window.location.href='?i=<?php echo $rstemp["cin_id"] ?>'"><?php echo $rstemp["cin_desc"] ?></td>
                                                  <td onclick="window.location.href='?i=<?php echo $rstemp["cin_id"] ?>'"><?php echo $rstemp["cin_opci"] ?></td>
                                                  <td onclick="window.location.href='?i=<?php echo $rstemp["cin_id"] ?>'"><?php echo $rstemp["cin_cate"] ?></td>

                                                  <td style="text-align:Center">
                                                  <button type="button"

                                                  onclick="
                                                    alertify.confirm('MFTSYS', '¿Desea eliminar el registro?', function(){
                                                        document.frm.action='veh_catinv.php?acc=del&i=<?php echo $rstemp["cin_id"] ?>'
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

$("#txtcate").val('<?php echo $VAR_CATE ?>');
$("#txtdesc").focus();




</script>

</html>
