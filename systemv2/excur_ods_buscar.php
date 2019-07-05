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

    <div id="wrapper">

        <!-- Navigation -->
        <?php include "nav.php" ?>

                    <?php
                        $VAR_FECH = date("Y-m-d");
                        if(isset($_POST["txtfech"])){  $VAR_FECH = $_POST["txtfech"];  }
                    ?>


        <div id="page-wrapper" style="border:0px solid red">
            <div class="row">&nbsp;
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12" style="border:0px solid red" >
                    <div class="panel panel-default">


                           <H2>&nbsp;BUSCAR ODS</H2>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">

                        <div class="col-lg-12" style="padding-bottom:10px" >
                        <div class="row">
                                <form method="post"  id="formulario" name="formulario">
                                    <input name="txtrep" id="txtrep" type="hidden">


                                    <div class="col-lg-3" >
                                        <label>Fecha</label>
                                        <input class="form-control" onchange="document.formulario.submit()" name="txtfech" type="date" value="<?php echo $VAR_FECH ?>" />
                                    </div>
                                </form>
                    </div>


                        </div>
                        <div class="col-lg-12"><hr></div>

                            <table  style="width:100%" data-order='[[ 0, "desc" ]]' data-page-length='50' class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>ORDEN No.</th>
                                        <th>Tour</th>
                                        <th>Fech</th>
                                        <th>Placas</th>

                                    </tr>
                                </thead>
                                <tbody>

                                <?php

                                        $sql = "select * from _ods where ods_fech =  '".$VAR_FECH."'";
                                        $rs = adoopenrecordset($sql);

                                   //     echo "------------------------>".$sql;


                                        while($rstemp = mysql_fetch_array($rs)){
                                ?>


                                            <tr onclick="window.location.href='excur_ods_agregar.php?i=<?php echo $rstemp["ods_id"]?>'" style="cursor:pointer" >
                                                <td style="text-align:center; font-size:16px"><b><?php echo $rstemp["ods_num"]?></b></td>
                                                <td style=" vertical-align: middle"><?php echo $rstemp["ods_tour"]?></td>
                                                <td><?php echo $rstemp["ods_fech"]?></td>
                                                <td><?php echo $rstemp["ods_plac"]?></td>
                                            </tr>

                                     <?php
                                        }
                                     ?>

                                </tbody>
                            </table>
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
    { "width": "100px", "targets": 0 }
  ],
            bSort:false
        });
    });


  function Guardar() {

            $('input[name^="costo"]').each(function()       { var arch = 'update-operador.php?c=costo&val='+$(this).val()+'&i='+$(this).attr('id');  $.get(arch);  });
            $('input[name^="cupo"]').each(function()       { var arch = 'update-operador.php?c=cupo&val='+$(this).val()+'&i='+$(this).attr('id');  $.get(arch);  });
            $('input[name^="gasolina"]').each(function()    { var arch = 'update-operador.php?c=gasolina&val='+$(this).val()+'&i='+$(this).attr('id');  $.get(arch);  });
            $('input[name^="sueldo"]').each(function()      { var arch = 'update-operador.php?c=sueldo&val='+$(this).val()+'&i='+$(this).attr('id');  $.get(arch);  });
            $('input[name^="litros"]').each(function()      { var arch = 'update-operador.php?c=litros&val='+$(this).val()+'&i='+$(this).attr('id');  $.get(arch);  });
            $('input[name^="ki"]').each(function()          { var arch = 'update-operador.php?c=ki&val='+$(this).val()+'&i='+$(this).attr('id');  $.get(arch);  });
            $('input[name^="kf"]').each(function()          { var arch = 'update-operador.php?c=kf&val='+$(this).val()+'&i='+$(this).attr('id');  $.get(arch);  });
            $('input[name^="estimado"]').each(function()    { var arch = 'update-operador.php?c=estimado&val='+$(this).val()+'&i='+$(this).attr('id');  $.get(arch);  });







                   alertify.success("Asignaciones Guardadas");


         }



    $("#guardar").click(
          function(){
             Guardar();
         }
    );


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

     $('#rec'+ID).html($('[id='+ID+'][name="kf"]').val()-$('[id='+ID+'][name="ki"]').val());
     $('#ren'+ID).html( $('[id='+ID+'][name="gasolina"]').val()  /  ($('[id='+ID+'][name="kf"]').val()-$('[id='+ID+'][name="ki"]').val())  );







  }



    </script>

</body>

</html>
