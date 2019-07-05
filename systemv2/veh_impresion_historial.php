
<style>
    *{
      font-family: calibri;
      font-size:15px;
    }

    th{
      font-weight: normal;

     }

    td{   }

    .enc{
      font-weight: bolder;
      text-align: center;
      font-size: 20px;



    }

    .data{
      border-top:1px solid black;
      border-left:1px solid black;


    }

</style>



<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>HISTORIAL DE VEHÍCULO | MFT SYSTEM</title>

      <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css">
      <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.2.3/css/buttons.dataTables.min.css">


</head>

<?php include "../db_conexion.php"   ?>

<!--
 <button id="btnPrint">Print Preview</button>
 -->
                <?php


                     $VAR_FECH = date("Y-m-d");


                     $sql="select * from _vehiculos where veh_id =".$_GET["i"];
                     $rs = adoopenrecordset($sql);
                     $rstemp = mysql_fetch_array($rs);

                     $VAR_NOEC = $rstemp["veh_noec"];
                     $VAR_NOSE = $rstemp["veh_nose"];
                     $VAR_NOMB = $rstemp["veh_nomb"];
                     $VAR_PLAC = $rstemp["veh_plac"];






               ?>
                <table border="0" style="width:70% !important;border:1px solid #000000" id="example" align="center" class="" cellspacing="0"   border="0"  >
                <thead>
                   <tr>
                    <th colspan="4"><img src="../images/transfers.jpg" alt="" /></th>
                    <th colspan="4" style="text-align:right">
                        CARRETERA FEDERAL MZA 255 LOTE 25 LOCAL 17
                        <br>ENTR 11 Y 21 DSUR
                        <br>COL EJIDO SUR CP77712
                        <br>MFT050620NG0


                    </th>
                   </tr>


                  <tr>
                    <th colspan="8" class="enc" style="border-bottom:1px solid #000000;border-top:1px solid #000000">HISTORIA X VEHÍCULO</th>
                  </tr>
                    <tr><td>&nbsp;</td></tr>



                    <tr>
                        <td align="right">FECHA DE ELABORACIÓN:&nbsp;</td><td><b><?php echo $VAR_FECH ?></b></td>
                        <td align="right">UNIDAD:&nbsp;</td><td><b><?php echo $VAR_NOEC ?></b></td>
                         <td align="right">PLACAS:&nbsp;</td><td><b><?php echo $VAR_PLAC ?></b></td>
                         <td align="right">KILOMETRAJE:&nbsp;</td><td><b><?php echo $VAR_PLAC ?></b></td>
                    </tr>

                   <tr><th>&nbsp;</th></tr>

                </thead>

                <tbody>

                <tr><td colspan="8">

                <table style="width:100%">

                   <tr >
                        <th  class=""><b>FECHA</b></th>
                        <th  class=""><b>TAREA</b></th>
                        <th  class=""><b>KILOMETRAJE</b></th>
                        <th  class=""><b>ESTATUS</b></th>
                        <th  class=""><b>OBSERVACIONES</b></th>
                   </tr>



                <?php


                       $i = 0;

                     $sql="select * from _servicios  where veh_id  =  ".$_GET["i"]." order by ser_fech ";
                     $rs = adoopenrecordset($sql);
                    while( $rstemp = mysql_fetch_array($rs)){
                      $i = $i + 1;

                 ?>

                      <tr>
                            <td align="center"><?php echo $rstemp["ser_fech"] ?></td>
                            <td align="center"><?php echo $rstemp["ser_desc"] ?></td>
                            <td align="center"><?php echo number_format($rstemp["ser_kilo"],0) ?></td>
                            <td align="left"><?php echo $rstemp["ser_esta"] ?></td>
                            <td align="left"><?php echo $rstemp["ser_obse"] ?></td>


                      </tr>


                <?php
                    }

                ?>
                    <tr><td>&nbsp;</td></tr>
                    <tr>
                        <td colspan="4" style="border-top:1px solid #000000" align="right"><b>TOTAL DE SERVICIOS:</b></td>
                        <td style="border-top:1px solid #000000;text-align:center; " ><b style="font-size: 20px !important"><?php echo $i ?></b></td>
                    </tr>
                </table>
                </td></tr>
                </tbody>


            </table>



<script src="//code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.3/js/dataTables.buttons.min.js"></script>
<script src="//cdn.datatables.net/buttons/1.2.3/js/buttons.flash.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
<script src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
<script src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
<script src="//cdn.datatables.net/buttons/1.2.3/js/buttons.html5.min.js"></script>
<script src="//cdn.datatables.net/buttons/1.2.3/js/buttons.print.min.js"></script>







<script type="text/javascript">

$(document).ready(function() {

} );



    </script>


