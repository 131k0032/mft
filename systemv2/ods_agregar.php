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

                include "nav.php";
                $VAR_TITULO = "AGREGAR ODS";

                $VAR_fech  = date("YYYY/MM/DD");
                $VAR_tran  = "";
                $VAR_rfc   = "";
                $VAR_plac  = "";
                $VAR_noec  = "";
                $VAR_oper  = "";
                $VAR_phon  = "";
                $VAR_fech  = "";
                $VAR_num   = "";
                $VAR_guia  = "";
                $VAR_idio  = "";
                $VAR_tour  = "";
                $VAR_auto  = "";
                $VAR_pues  = "";
                $VAR_esta  = "";

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
                 '".$_POST["txtesta"]."'
                )";
                adoexecute($sql);
//                echo $sql;

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
            }

        if(isset($_GET["i"])){
             $VAR_ID = $_GET["i"];
             $VAR_TITULO = "ODS #".$VAR_ID;
        }

        if(isset($VAR_ID)){

                $sql="select * from _ods where ods_id = ".$VAR_ID." ";
                $rs = adoopenrecordset($sql);
                $rstemp = mysql_fetch_array($rs);

                $VAR_fech  = $rstemp["ods_fech"];
                $VAR_tran  = $rstemp["ods_tran"];
                $VAR_rfc   = $rstemp["ods_rfc "];
                $VAR_plac  = $rstemp["ods_plac"];
                $VAR_noec  = $rstemp["ods_noec"];
                $VAR_oper  = $rstemp["ods_oper"];
                $VAR_phon  = $rstemp["ods_phon"];
                $VAR_fech  = $rstemp["ods_fech"];
                $VAR_num   = $rstemp["ods_num "];
                $VAR_guia  = $rstemp["ods_guia"];
                $VAR_idio  = $rstemp["ods_idio"];
                $VAR_tour  = $rstemp["ods_tour"];
                $VAR_auto  = $rstemp["ods_auto"];
                $VAR_pues  = $rstemp["ods_pues"];
                $VAR_esta  = $rstemp["ods_esta"];


        }



        ?>



        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><?php echo $VAR_TITULO ?> </h1>
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
                                                <input class="form-control" required type="date" name="txtfech"  value="<?php echo $VAR_fech ?>" id="txtfech" placeholder="">
                                            </div>
                                       </div>



                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label>Transportadora</label>
                                                  <input class="form-control"  value="<?php echo $VAR_tran ?>" name="txttran" id="txttran" >
                                            </div>
                                        </div>













                                              <div class="col-lg-3">
                                                      <div class="form-group">
                                                          <label>Estatus</label>
                                                            <select class="form-control" name="txtesta" id="txtesta">
                                                                <option <?php if($VAR_esta=="CAPTURADA")         {echo "selected"; } ?>>CAPTURADA</option>
                                                                <option <?php if($VAR_esta=="CAPTURADA")         {echo "selected"; } ?>>CANCELADA</option>

                                                            </select>

                                                      </div>
                                              </div>

                                              <div class="col-lg-12">
                                                      <div class="form-group">
                                                          <label>Observaciones</label>
                                                          <textarea class="form-control" value="<?php echo $VAR_obse ?>"  name="txtobse" id="txtobse" ></textarea>
                                                      </div>
                                              </div>




                               <?php  if(isset($VAR_ID)){ ?>
                                    <div class="col-lg-6"><button type="submit" onclick="document.frm.action='excur_agregar.php?acc=save'" class="btn btn-primary btn-lg btn-block">Guardar Cambios</button></div>
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
        $('#txtagen').editableSelect();


</script>

</html>
