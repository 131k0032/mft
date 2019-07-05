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

                 $VAR_TITULO = "CATÁLOGO HOTELES";
                 $VAR_NOMB  ="";
                 $VAR_ZONA  ="hote-cancun";


              include "nav.php";


              if(isset($_GET["i"])){
                     $VAR_ID     = $_GET["i"];
              }


        if(isset($_GET["acc"])){
                    if($_GET["acc"]=="add"){


                              $sql="insert into _hoteles values (
                              0,
                              '".$_POST["txtnomb"]."',
                              '".$_POST["txtzona"]."'
                              )";
                              adoexecute($sql);
                              // echo  "-------------------------------------------------------->".$sql;




                              ?>
                              <script>
                              alertify.success('Registro Agregado');
                              </script>
                              <?php
                    }

                   if($_GET["acc"]=="gua"){

                              $sql="update  _hoteles set
                               hotel = '".$_POST["txtnomb"]."',
                               zona = '".$_POST["txtzona"]."'
                               where id = ".$VAR_ID;

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

                          $sql="delete from   _hoteles where id = ".$VAR_ID."";
                          adoexecute($sql);
                          unset($VAR_ID);
                          //  echo  "-------------------------------------------------------->".$sql;
                          unset($_GET["i"]);

              ?>
              <script>
                alertify.error('Registro Eliminado');
              </script>
              <?php

              }

        }


              if(isset($_GET["i"])){
                        $sql="select * from _hoteles where id = ".$VAR_ID;
                        $rs = adoopenrecordset($sql);
                        $rstemp = mysql_fetch_array($rs);


                 $VAR_NOMB  =$rstemp["hotel"];
                 $VAR_ZONA  =$rstemp["zona"];




              }


                 ?>

          <div id="page-wrapper">
            <form role="form" method="post" action="hoteles.php?acc=add" name="frm">
              <br>  <div class="panel panel-default">
                    <div class="panel-heading">
                        <b style="font-size:20px"><?php echo $VAR_TITULO ?></b>
                    </div>




                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-3"><div class="form-group"><label>Nombre      </label><input class="form-control"  required value="<?php  echo $VAR_NOMB ?>"   name="txtnomb"  id="txtnomb" placeholder=""></div></div>
                                    <div class="col-lg-3"><div class="form-group"><label>Zona      </label>
                                        <select class="form-control"  required value="<?php  echo $VAR_ZONA ?>"   name="txtzona"  id="txtzona" placeholder="">
                                                <option value="hotel-cancun"            >hotel-cancun</option>
                                                <option value="hotel-flamengo"          >hotel-flamengo</option>

                                                <option value="hotel-playacar"          >hotel-playacar</option>

                                                <option value="hotel-puerto-aventuras"  >hotel-puerto-aventuras</option>
                                                <option value="hotel-puerto-morelos"    >hotel-puerto-morelos</option>
                                                <option value="hotel-pdc"               >hotel-playa-del-carmen</option>
                                                <option value="hotel-riviera-maya"               >hotel-riviera-maya</option>


                                                <option value="hotel-tulum"             >hotel-tulum</option>


                                        </select>
                                    </div></div>
                                    <?php  if(isset($_GET["i"])){   ?>

                                        <div class="col-lg-2" style="margin:2px;"><button type="submit" onclick="window.frm.action='?i=<?php echo $rstemp["id"] ?>&acc=gua'"  class="btn btn-primary btn-lg btn-block"> <span class="fa fa-save"></span> Guardar </button></div>
                                        <div class="col-lg-2"><button type="button" onclick="window.location.href='hoteles.php'"  class="btn btn-primary btn-lg btn-block"><span class="fa fa-close"></span> Cancelar </button></div>
                                    <?php
                                            } else {
                                    ?>
                                    <div class="col-lg-3" style="padding-top:20px"><button type="submit" onclick="window.frm.action='hoteles.php?acc=add'" class="btn btn-primary btn-lg btn-block"><span class="fa fa-plus"></span> Agregar </button> </div>

                                    <?php      } ?>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12"><div class="row col-lg-12"><hr></div></div>
                                    <div class="col-lg-12">
                                      <table  style="width:100%" data-order='[[ 0, "desc" ]]' data-page-length='50' class="table table-striped table-bordered table-hover" id="dataTables-example">
                                          <thead>
                                              <tr>
                                              <th>Nombre</th>
                                              <th>Zona</th>
                                              <th>&nbsp;</th>
                                              </tr>
                                          </thead>
                                          <tbody>
                                              <?php
                                              $sql="select * from _hoteles order by hotel";
                                              $rs = adoopenrecordset($sql);
                                              while($rstemp = mysql_fetch_array($rs)){


                                              ?>
                                              <tr  style="cursor:pointer"    >
                                                  <td onclick="window.location.href='?i=<?php echo $rstemp["id"] ?>'"><?php echo $rstemp["hotel"] ?></td>
                                                  <td onclick="window.location.href='?i=<?php echo $rstemp["id"] ?>'"><?php echo $rstemp["zona"] ?></td>
                                                  <td style="text-align:Center">
                                                  <button type="button"

                                                  onclick="
                                                    alertify.confirm('MFTSYS', '¿Desea eliminar el registro?', function(){
                                                        document.frm.action='hoteles.php?acc=del&i=<?php echo $rstemp["id"] ?>'
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






$( document ).ready(function() {
    $("#txtnomb").focus();
    $("#txtzona option[value='<?php echo $VAR_ZONA ?>']").attr("selected",true);
});


</script>

</html>
