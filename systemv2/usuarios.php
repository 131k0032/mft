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

                 $VAR_TITULO = "USUARIOS";


              include "nav.php";

                     $VAR_ID    =  0;
                     $VAR_NOMB  = "";
                     $VAR_MAIL  = "";
                     $VAR_PASS  = "";
                     $VAR_PER = "0|0|0|0|0|0|0|0|0|0|";


        if(isset($_GET["acc"])){

                 if($_GET["acc"]=="sav"){

                              $sql="update  usuarios set

                               usu_mail     = '".$_POST["txtmail"]."',
                               usu_nombr    = '".$_POST["txtnomb"]."',
                               usu_pass     = '".$_POST["txtpass"]."',
                               usu_per      = '".$_POST["txtperm"]."'
                               where usu_id = ".$_GET["i"];
                              adoexecute($sql);
                               unset($_GET["i"]);


                              adoexecute($sql);
                              echo  "-------------------------------------------------------->".$sql;




                              ?>
                              <script>
                              alertify.alert('MFTSYS', 'Usuario Guardado');
                              </script>
                              <?php


                    }


                    if($_GET["acc"]=="add"){

                              $sql="insert into usuarios values (
                              0,
                              '".$_POST["txtmail"]."',
                              '".$_POST["txtnomb"]."',
                              '".$_POST["txtpass"]."',
                              '".$_POST["txtperm"]."'
                              )";
                              adoexecute($sql);
                              //  echo  "-------------------------------------------------------->".$sql;




                              ?>
                              <script>
                              alertify.alert('MFTSYS', 'Usuario Agregado');
                              </script>
                              <?php


                    }




              if($_GET["acc"]=="del"){

              $sql="delete from   usuarios where usu_id = ".$_GET["i"]."";
              adoexecute($sql);
              unset($_GET["i"]);
              //  echo  "-------------------------------------------------------->".$sql;

              ?>
              <script>
                alertify.alert('MFTSYS', 'Usuario Eliminado');
              </script>
              <?php

              }

        }




              if(isset($_GET["i"])){

                    $sql="select * from usuarios where usu_id = ".$_GET["i"];
                    $rs = adoopenrecordset($sql);
                    $rstemp = mysql_fetch_array($rs);


                     $VAR_ID    =  $rstemp["usu_id"];
                     $VAR_NOMB  = $rstemp["usu_nombr"];
                     $VAR_MAIL  = $rstemp["usu_mail"];
                     $VAR_PASS  = $rstemp["usu_pass"];
                     $VAR_PER  = $rstemp["usu_per"];



              }




                 ?>



              <div id="page-wrapper">
                    <form role="form" method="post" action="usuarios.php?acc=add" name="frm">
                            <div class="row"> <div class="col-lg-12"><h1 class="page-header"><?php echo $VAR_TITULO ?> </h1></div></div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="panel panel-default">
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-lg-3"><div class="form-group"><label>Nombre  </label><input class="form-control" required   name="txtnomb" value="<?php echo $VAR_NOMB ?>"  placeholder=""></div></div>
                                                <div class="col-lg-3"><div class="form-group"><label>Email   </label><input class="form-control" required   name="txtmail" value="<?php echo $VAR_MAIL ?>"  ></div></div>
                                                <div class="col-lg-3"><div class="form-group"><label>Pass    </label><input class="form-control" required   name="txtpass" value="<?php echo $VAR_PASS ?>" ></div></div>
                                                <div class="col-lg-3"><div class="form-group">



                                                <input class="form-control" required  type="hidden" value="<?php echo $VAR_PER ?>" name="txtperm"  id="txtperm"   ></div></div>
                                            </div>


                                         <div class="row">
                                             <div class="col-lg-12">
                                             <label>Permisos</label>

                                                <?php
                                                 $VAR_P = explode("|",$VAR_PER);
                                                ?>
                                                    <br>  <label><input <?php  if($VAR_P[0]=="1"){echo "checked"; } ?> type="checkbox" onclick="permisos()" name="per00" id="per00" value="value">&nbsp;Dashboard</label>
                                                    &nbsp;<label><input <?php  if($VAR_P[1]=="1"){echo "checked"; } ?>  type="checkbox" onclick="permisos()" name="per01" id="per01" value="value">&nbsp;Excursiones</label>
                                                    &nbsp;<label><input <?php  if($VAR_P[2]=="1"){echo "checked"; } ?>  type="checkbox" onclick="permisos()" name="per02" id="per02" value="value">&nbsp;Servicios</label>
                                                    &nbsp;<label><input <?php  if($VAR_P[3]=="1"){echo "checked"; } ?>  type="checkbox" onclick="permisos()" name="per03" id="per03" value="value">&nbsp;Controles diarios</label>
                                                    &nbsp;<label><input <?php  if($VAR_P[4]=="1"){echo "checked"; } ?>  type="checkbox" onclick="permisos()" name="per04" id="per04" value="value">&nbsp;Mantenimiento</label>
                                                    &nbsp;<label><input <?php  if($VAR_P[5]=="1"){echo "checked"; } ?>  type="checkbox" onclick="permisos()" name="per05" id="per05" value="value">&nbsp;Contabilidad</label>
                                                    &nbsp;<label><input <?php  if($VAR_P[6]=="1"){echo "checked"; } ?>  type="checkbox" onclick="permisos()" name="per06" id="per06" value="value">&nbsp;Sistema</label>
                                                    &nbsp;<label><input <?php  if($VAR_P[7]=="1"){echo "checked"; } ?>  type="checkbox" onclick="permisos()" name="per07" id="per07" value="value">&nbsp;Bolsa de Trabajo</label>
                                                    <br>&nbsp;
                                              </div>
                                          </div>



                                     <div class="row">

                                    <?php  if(isset($_GET["i"])){   ?>

                                        <div class="col-lg-3" style="margin:2px;"><button type="submit" onclick="window.frm.action='?i=<?php echo $rstemp["usu_id"] ?>&acc=sav'"  class="btn btn-primary btn-lg btn-block"> <span class="fa fa-save"></span> Guardar </button></div>
                                        <div class="col-lg-3"><button type="button" onclick="window.location.href='usuarios.php'"  class="btn btn-primary btn-lg btn-block"><span class="fa fa-close"></span> Cancelar </button></div>
                                    <?php
                                            } else {
                                    ?>
                                        <div class="col-lg-12">
                                            <button type="submit" class="btn btn-primary btn-lg btn-block">Agregar </button>
                                        </div>
                                    <?php } ?>
                                    </div>


                            <div class="row">
                                    <div class="col-lg-12"><div class="row col-lg-12"><hr></div></div>
                                    <table  style="width:100%" data-order='[[ 0, "desc" ]]' data-page-length='50' class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                    <tr>
                                    <th>Nombre</th>
                                    <th>Email</th>
                                    <th>Password</th>
                                    <th>Permisos</th>
                                    <th>&nbsp;</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $sql="select * from usuarios order by usu_nombr";
                                    $rs = adoopenrecordset($sql);
                                    while($rstemp = mysql_fetch_array($rs)){
                                    ?>
                                    <tr     >
                                          <td style="cursor:pointer" onclick="window.location.href='?i=<?php echo $rstemp["usu_id"] ?>'"><?php echo $rstemp["usu_nombr"] ?></td>
                                          <td style="cursor:pointer" onclick="window.location.href='?i=<?php echo $rstemp["usu_id"] ?>'"><?php echo $rstemp["usu_mail"] ?></td>
                                          <td style="cursor:pointer" onclick="window.location.href='?i=<?php echo $rstemp["usu_id"] ?>'"><?php echo $rstemp["usu_pass"] ?></td>
                                          <td style="cursor:pointer" onclick="window.location.href='?i=<?php echo $rstemp["usu_id"] ?>'"><?php echo $rstemp["usu_per"] ?></td>

                                          <td style="text-align:Center">
                                          <button type="button"

                                          onclick="
                                          alertify.confirm('MFTSYS', '¿Desea eliminar al Usuario?', function(){
                                          document.frm.action='usuarios.php?acc=del&i=<?php echo $rstemp["usu_id"] ?>'
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

function permisos(){

  var varx = "";

 if( $('#per00').is(':checked')==true){ varx = "1|";}else{ varx = "0|";}
 if( $('#per01').is(':checked')==true){ varx = varx+"1|";}else{ varx = varx+"0|";}
 if( $('#per02').is(':checked')==true){ varx = varx+"1|";}else{ varx = varx+"0|";}
 if( $('#per03').is(':checked')==true){ varx = varx+"1|";}else{ varx = varx+"0|";}
 if( $('#per04').is(':checked')==true){ varx = varx+"1|";}else{ varx = varx+"0|";}
 if( $('#per05').is(':checked')==true){ varx = varx+"1|";}else{ varx = varx+"0|";}
 if( $('#per06').is(':checked')==true){ varx = varx+"1|";}else{ varx = varx+"0|";}
 if( $('#per07').is(':checked')==true){ varx = varx+"1|";}else{ varx = varx+"0|";}


   $('#txtperm').val(varx);
}





</script>

</html>
