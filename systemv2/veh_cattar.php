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

                $VAR_TITULO = "CATÁLOGO DE TAREAS";
                $VAR_DESC = "";
                $VAR_KILO = "";


              include "nav.php";


              if(isset($_GET["i"])){
                     $VAR_ID     = $_GET["i"];
              }


        if(isset($_GET["acc"])){
                    if($_GET["acc"]=="add"){

                              $sql="insert into _tareas values (
                              0,
                              '".$_POST["txtdesc"]."',
                              ".$_POST["txtkilo"]."
                              )";
                              adoexecute($sql);
                              //  echo  "-------------------------------------------------------->".$sql;

                              ?>
                              <script>
                              alertify.alert('MFTSYS', 'Tarea Agregada');
                              </script>
                              <?php
                    }

                   if($_GET["acc"]=="gua"){

                              $sql="update  _tareas set
                               tar_desc = '".$_POST["txtdesc"]."',
                               tar_kilo = '".$_POST["txtkilo"]."'
                               where tar_id = ".$VAR_ID;

                              adoexecute($sql);
                             //  echo  "-------------------------------------------------------->".$sql;

                             unset($_GET["i"]);
                             unset($VAR_ID);

                              ?>
                              <script>
                              alertify.alert('MFTSYS', 'Tarea Guardado');
                              </script>
                              <?php
                    }


              if($_GET["acc"]=="del"){

              $sql="delete from   _tareas where tar_id = ".$VAR_ID."";
              adoexecute($sql);
              unset($VAR_ID);
              //  echo  "-------------------------------------------------------->".$sql;
              unset($_GET["i"]);

              ?>
              <script>
                alertify.alert('MFTSYS', 'Tarea Eliminada');
              </script>
              <?php

              }

        }


              if(isset($_GET["i"])){
                        $sql="select * from _tareas where tar_id = ".$VAR_ID;
                        $rs = adoopenrecordset($sql);
                        $rstemp = mysql_fetch_array($rs);
                        $VAR_DESC = $rstemp["tar_desc"];
                        $VAR_KILO = $rstemp["tar_kilo"];

              }


                 ?>

          <div id="page-wrapper">
            <form role="form" method="post" action="_tareas.php?acc=add" name="frm">
                <div class="row"> <div class="col-lg-12"><h1 class="page-header"><?php echo $VAR_TITULO ?> </h1></div></div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-3"><div class="form-group"><label>Descripción      </label><input class="form-control" required value="<?php  echo $VAR_DESC ?>"  name="txtdesc"  placeholder=""></div></div>
                                    <div class="col-lg-3"><div class="form-group"><label>Kilometraje      </label><input class="form-control" required value="<?php  echo $VAR_KILO ?>"   name="txtkilo"   ></div></div>

                                    <?php  if(isset($_GET["i"])){   ?>

                                    <div class="col-lg-3"><button type="submit" onclick="window.frm.action='?i=<?php echo $rstemp["tar_id"] ?>&acc=gua'"  class="btn btn-primary btn-lg btn-block"> <span class="fa fa-save"></span> Guardar </button></div>
                                    <div class="col-lg-3"><button type="button" onclick="window.location.href='veh_cattar.php'"  class="btn btn-primary btn-lg btn-block"><span class="fa fa-close"></span> Cancelar </button></div>
                                    <?php
                                            } else {
                                    ?>
                                    <div class="col-lg-3"><button type="submit" onclick="window.frm.action='veh_cattar.php?acc=add'" class="btn btn-primary btn-lg btn-block"><span class="fa fa-plus"></span> Agregar </button> </div>

                                    <?php      } ?>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12"><div class="row col-lg-12"><hr></div></div>
                                    <div class="col-lg-12">
                                      <table  style="width:100%" data-order='[[ 0, "desc" ]]' data-page-length='50' class="table table-striped table-bordered table-hover" id="dataTables-example">
                                          <thead>
                                              <tr>
                                              <th style="text-align:center">Descripción</th>
                                              <th style="text-align:center">Kilometraje</th>
                                              <th>&nbsp;</th>
                                              </tr>
                                          </thead>
                                          <tbody>
                                              <?php
                                              $sql="select * from _tareas order by tar_desc";
                                              $rs = adoopenrecordset($sql);
                                              while($rstemp = mysql_fetch_array($rs)){
                                              ?>
                                              <tr  style="cursor:pointer"    >
                                                  <td onclick="window.location.href='?i=<?php echo $rstemp["tar_id"] ?>'" ><?php echo $rstemp["tar_desc"] ?></td>
                                                  <td onclick="window.location.href='?i=<?php echo $rstemp["tar_id"] ?>'" style="text-align:center" ><?php echo number_format($rstemp["tar_kilo"],0) ?></td>
                                                  <td style="text-align:Center">
                                                  <button type="button"

                                                  onclick="
                                                    alertify.confirm('MFTSYS', '¿Desea eliminar el vehículo?', function(){
                                                        document.frm.action='veh_cattar.php?acc=del&i=<?php echo $rstemp["tar_id"] ?>'
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







</script>

</html>
