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

                 $VAR_TITULO = "MOVIMIENTOS DE ALMACEN";


                 $VAR_TIPO  ="";
                 $VAR_REFID ="";
                 $VAR_CNT   ="";
                 $VAR_FECH  ="";
                 $VAR_SOLI  ="";
                 $VAR_COST  ="";
                 $VAR_DOCT  ="";



              include "nav.php";


              if(isset($_GET["i"])){
                     $VAR_ID     = $_GET["i"];
              }


        if(isset($_GET["acc"])){
                    if($_GET["acc"]=="add"){


                              $sql="insert into almacen values (
                              0,
                              '".$_POST["txttipo"]."',
                               ".$_POST["txtrefid"].",
                              '".$_POST["txtcnt"]."',
                              '".$_POST["txtfech"]."',
                              '".$_POST["txtsoli"]."',
                              0,
                              0,
                              0,
                              '".$_POST["txtdoct"]."'
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

                              $sql="update  almacen set
                               alm_desc = '".$_POST["txtdesc"]."',
                               alm_marc = '".$_POST["txtmarc"]."',
                               alm_cost = '".$_POST["txtcost"]."',
                               alm_mode = '".$_POST["txtmode"]."',
                               alm_nopa = '".$_POST["txtnopa"]."',
                               alm_smax = '".$_POST["txtsmax"]."',
                               alm_smin = '".$_POST["txtsmin"]."'
                               where alm_id = ".$VAR_ID;

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



                          $sql="delete from   almacen where alm_id = ".$VAR_ID."";
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
                        $sql="select * from almacen where alm_id = ".$VAR_ID;
                        $rs = adoopenrecordset($sql);
                        $rstemp = mysql_fetch_array($rs);


                 $VAR_TIPO  =$rstemp["alm_tipo"];
                 $VAR_REFID =$rstemp["alm_id"];
                 $VAR_CNT   =$rstemp["alm_cnt"];
                 $VAR_FECH  =$rstemp["alm_fech"];
                 $VAR_SOLI  =$rstemp["alm_soli"];
                 $VAR_COST  =$rstemp["alm_cost"];
                 $VAR_DOCT  =$rstemp["alm_doct"];




              }


                 ?>

          <div id="page-wrapper">
            <form role="form" method="post" action="almacen.php?acc=add" name="frm">
              <br>  <div class="panel panel-default">
                    <div class="panel-heading">
                        <b style="font-size:20px"><?php echo $VAR_TITULO ?></b>
                    </div>




                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-2"><div class="form-group"><label>Fecha      </label><input class="form-control" type="date" required value="<?php  echo $VAR_FECH ?>"   name="txtfech"  id="txtfech" placeholder=""></div></div>
                                    <div class="col-lg-2">
                                            <div class="form-group"><label>Tipo       </label>

                                                 <select class="form-control" name="txttipo"  id="txttipo" >
                                                         <option value="S">Salida</option>
                                                         <option value="E">Entrada</option>
                                                 </select>

                                                </div>
                                    </div>
                                    <div class="col-lg-3"><div class="form-group"><label>Refacción  </label>
                                            <select class="form-control"  name="txtrefid"  id="txtrefid">
                                                <?php
                                                    $sql="select * from cat_refacciones order by ref_desc";
                                                    $rs = adoopenrecordset($sql);
                                                    while($rstemp = mysql_fetch_array($rs)){
                                                 ?>

                                                   <option value="<?php echo $rstemp["ref_id"] ?>"><?php echo $rstemp["ref_desc"] ?></option>

                                            <?php
                                                    }

                                                ?>
                                            </select>


                                    </div></div>
                                    <div class="col-lg-1"><div class="form-group"><label>Cantidad   </label><input class="form-control" required value="<?php  echo $VAR_CNT  ?>" style="text-align:center"  name="txtcnt"  id="txtcnt"  ></div></div>
                                    <div class="col-lg-2"><div class="form-group"><label>Solicitó   </label><input class="form-control" required value="<?php  echo $VAR_SOLI ?>"   name="txtsoli"  id="txtsoli"  ></div></div>
                                    <div class="col-lg-2"><div class="form-group"><label>Docto Ref  </label><input class="form-control" required value="<?php  echo $VAR_DOCT ?>"   name="txtdoct"  id="txtdoct"  ></div></div>





                                    <?php  if(isset($_GET["i"])){   ?>

                                        <div class="col-lg-3" style="margin:2px;"><button type="submit" onclick="window.frm.action='?i=<?php echo $rstemp["alm_id"] ?>&acc=gua'"  class="btn btn-primary btn-lg btn-block"> <span class="fa fa-save"></span> Guardar </button></div>
                                        <div class="col-lg-3"><button type="button" onclick="window.location.href='almacen.php'"  class="btn btn-primary btn-lg btn-block"><span class="fa fa-close"></span> Cancelar </button></div>
                                    <?php
                                            } else {
                                    ?>
                                    <div class="col-lg-3" style="padding-top:20px"><button type="submit" onclick="window.frm.action='almacen.php?acc=add'" class="btn btn-primary btn-lg btn-block"><span class="fa fa-plus"></span> Agregar </button> </div>

                                    <?php      } ?>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12"><div class="row col-lg-12"><hr></div></div>
                                    <div class="col-lg-12">
                                      <table  style="width:100%" data-order='[[ 0, "desc" ]]' data-page-length='50' class="table table-striped table-bordered table-hover" id="dataTables-example">
                                          <thead>
                                              <tr>
                                              <th>Fecha</th>
                                              <th>Tipo</th>
                                              <th>Refacción</th>
                                              <th>Cnt</th>
                                              <th>Solicitó</th>
                                              <th>Docto</th>

                                              <th>&nbsp;</th>
                                              </tr>
                                          </thead>
                                          <tbody>
                                              <?php
                                              $sql="select * from almacen, cat_refacciones where almacen.ref_id = cat_refacciones.ref_id order by alm_fech DESC";
                                              $rs = adoopenrecordset($sql);
                                              while($rstemp = mysql_fetch_array($rs)){


                                              ?>
                                              <tr  style="cursor:pointer"    >
                                                  <td onclick="window.location.href='?i=<?php echo $rstemp["alm_id"] ?>'"><?php echo $rstemp["alm_fech"] ?></td>
                                                  <td onclick="window.location.href='?i=<?php echo $rstemp["alm_id"] ?>'"><?php if($rstemp["alm_tipo"]=="S"){echo "Salida"; }else{ echo "Entrada";} ?></td>
                                                  <td onclick="window.location.href='?i=<?php echo $rstemp["alm_id"] ?>'"><?php echo $rstemp["ref_desc"] ?></td>
                                                  <td onclick="window.location.href='?i=<?php echo $rstemp["alm_id"] ?>'" style="text-align:center"><?php echo $rstemp["alm_cnt"] ?></td>
                                                  <td onclick="window.location.href='?i=<?php echo $rstemp["alm_id"] ?>'"><?php echo $rstemp["alm_soli"] ?></td>
                                                  <td onclick="window.location.href='?i=<?php echo $rstemp["alm_id"] ?>'"><?php echo $rstemp["alm_doct"] ?></td>



                                                  <td style="text-align:Center">
                                                  <button type="button"

                                                  onclick="
                                                    alertify.confirm('MFTSYS', '¿Desea eliminar el registro?', function(){
                                                        document.frm.action='almacen.php?acc=del&i=<?php echo $rstemp["alm_id"] ?>'
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

$("#txtdesc").focus();




</script>

</html>
