
<style>
    *{
      font-family:Arial;
      font-size:12px;


    }

</style>

<head>
      <title>Cuentas</title>
      <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css">
      <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.2.3/css/buttons.dataTables.min.css">

</head>

<?php

    include "../db_conexion.php";

  //  echo $_POST["txtsql"];


                                if($_GET["cta"]=="cxc"){ $VAR_TITLE = "CLIENTES - Cuentas por cobrar";}
                                if($_GET["cta"]=="cxp"){ $VAR_TITLE = "PROVEEDORES - Cuentas por pagar";}
                                if($_GET["cta"]=="cor"){ $VAR_TITLE = "Cortesías";}

                                $VAR_CTA = $_GET["cta"];



    $rs1 = adoopenrecordset($_POST["txtsql"]);
    $i = 1;
    $VAR_COLOR = "";





   if(isset($_GET["t"])){
        $VAR_TITLE = $_GET["t"];

   }

   $sqlf =  $_POST["txtsql"];

   $VAR_VARS = explode("|",$_POST["txtsql2"]);


   $VAR_COBRADO =  montos($VAR_VARS[3],$VAR_VARS[0],$VAR_VARS[1],$VAR_VARS[2],'si');
   $VAR_PORCOBRAR=  montos($VAR_VARS[3],$VAR_VARS[0],$VAR_VARS[1],$VAR_VARS[2],'no');




    ?>

    <table style="width:100%" id="example2" class="display nowrap" cellspacing="0"  data-order='[[ 0, "desc" ]]' data-page-length='50' class="table table-striped table-bordered table-hover"  >


    <thead>
    <tr><td style="text-align:left" colspan="19"><img src="http://www.mft.com.mx/images/transfers.jpg" alt="" /></td></tr>
    <tr><td style="text-align:left" colspan="19"><h2 style="font-size:20px;padding:0px;margin:0px;">REPORTE DE <?php echo $VAR_TITLE ?></h2></td></tr>

<!--///------------------>


              <tr class="border_bottom">


                 <th >#</th>
                                        <th>Fecha</th>

                                        <th>Vehículo</th>
                                        <th>#Eco</th>
                                        <th>Placas</th>
                                        <th>Operador</th>
                                       <!--
                                            <?php if($_GET["cta"]=="cxp"){?>   <th>Proveedor</th> <?php } ?>
                                            <?php if($_GET["cta"]=="cxc"){?>   <th>Agencia</th>   <?php } ?>
                                         -->

                                        <th>Proveedor</th>
                                        <th>Agencia</th>

                                        <th>Servicio</th>
                                        <th>PAX</th>
                                        <th>Nombre</th>
                                        <th>Hab</th>
                                        <th>Hora</th>
                                        <th>Pick up</th>
                                        <th>Drop off</th>
                                        <th>Vuelo</th>
                                        <th>Cupón</th>
                                        <th>Costo</th>
                                        <th>Cash</th>
                                        <th>Cve</th>




              </tr>
 </thead>
   <tbody>

                                    <?php
                                  //    echo "<br><br><br><br>".$sqlf;
                                      $VAR_GCOSTO = 0 ;
                                      $VAR_COSTO = 0;
                                      $VAR_CASH = 0;
                                      $VAR_GSINPAGO = 0;
                                      //$VAR_XI = " TOTAL SIN PAGO: ";

                                      $rsf = adoopenrecordset($sqlf);
                                      $rstempf = mysql_fetch_array($rsf);
                                      $VAR_FPAGO = $rstempf["fechapago"];


                                      $rsf = adoopenrecordset($sqlf);
                                      while($rstempf = mysql_fetch_array($rsf)){
                                           $VAR_XI ="TOTAL FECHA DE PAGO:&nbsp;&nbsp;&nbsp;".$VAR_FPAGO;



                                             $VAR_CASH =$VAR_CASH + $rstempf["cash"];
                                             $VAR_COSTO =$VAR_COSTO + $rstempf["costo"];


                                      ?>



                                            <tr  id="reng<?php echo $rstempf["id"] ?>" style="width:10px !important; border:0px solid red; cursor:pointer; <?php if($rstempf["pagado"]=="si"){ echo "background-color: "; } ?>" >


                                            <td><?php echo $rstempf["id"] ?></td>
                                            <td><?php echo $rstempf["date1"] ?></td>

                                            <td><?php echo $rstempf["tipo_veh"] ?></td>
                                            <td><?php echo $rstempf["noec"] ?></td>
                                            <td><?php echo $rstempf["plac"] ?></td>
                                            <td><?php echo $rstempf["oper"] ?></td>

                                      <!--
                                            <?php if($_GET["cta"]=="cxp"){?>    <td><?php echo $rstempf["pro_nomb"] ?></td>     <?php } ?>
                                            <?php if($_GET["cta"]=="cxc"){?>    <td <?php echo $rstempf["agen"] ?></td>         <?php } ?>
                                     -->

                                       <td><?php echo $rstempf["pro_nomb"] ?></td>
                                       <td ><?php echo $rstempf["agen"] ?></td>

                                            <td><?php echo strtoupper($rstempf["tipo"]) ?></td>
                                            <td><?php echo ($rstempf["adul"].".".$rstempf["chil"].".".$rstempf["enfa"]) ?></td>
                                            <td><?php echo $rstempf["name"] ?></td>
                                            <td><?php echo $rstempf["room"] ?></td>
                                            <td><?php echo $rstempf["time1"] ?></td>
                                            <td><?php echo $rstempf["orig1"] ?></td>
                                            <td><?php echo $rstempf["dest1"] ?></td>
                                            <td><?php echo $rstempf["vuel1"]  ?></td>
                                            <td><?php echo $rstempf["cupo"] ?></td>
                                            <td style="text-align:right">$ <?php echo number_format($rstempf["costo"],2)     ?> </td>
                                            <td style="text-align:right">$ <?php echo number_format($rstempf["cash"],2)     ?> </td>
                                            <td>CC<?php echo $rstempf["cve"] ?>BB<?php echo $rstempf["cve2"] ?></td>

                                        </tr>


                                  <?php


                                      }


                                    ?>

                                    <tr>
                                        <td id="1"></td>
                                        <td id="2"></td>
                                        <td id="2"></td>
                                        <td id="3"></td>
                                        <td id="4"></td>
                                        <td id="5"></td>
                                        <td id="6"></td>
                                        <td id="7"></td>
                                        <td id="8"></td>
                                        <td id="9"></td>
                                        <td id="10"></td>
                                        <td id="11"></td>
                                        <td id="12"></td>
                                        <td id="13"></td>
                                        <td id="14"></td>
                                        <td id="14"></td>
                                        <td >TOTAL</td>
                                        <td style="text-align:right" >$ <?php echo number_format($VAR_COSTO,2) ?></td>
                                        <td style="text-align:right" >$ <?php echo number_format($VAR_CASH,2) ?></td>
                                        <td id="14"></td>

                                    </tr>


                                    <tr>
                                        <td id="1"></td>
                                        <td id="2"></td>
                                        <td id="2"></td>
                                        <td id="3"></td>
                                        <td id="4"></td>
                                        <td id="5"></td>
                                        <td id="6"></td>
                                        <td id="7"></td>
                                        <td id="8"></td>
                                        <td id="9"></td>
                                        <td id="10"></td>
                                        <td id="11"></td>
                                        <td id="12"></td>
                                        <td id="13"></td>
                                        <td id="14"></td>
                                        <td id="14"></td>
                                        <td >TOTAL CASH</td>
                                        <td></td>
                                        <td style="text-align:right"   >$ <?php echo number_format($VAR_COSTO - $VAR_CASH  ,2) ?></td>
                                        <td id="14"></td>

                                    </tr>

                                    <tr>
                                        <td id="1"></td>
                                        <td id="2"></td>
                                        <td id="2"></td>
                                        <td id="3"></td>
                                        <td id="4"></td>
                                        <td id="5"></td>
                                        <td id="6"></td>
                                        <td id="7"></td>
                                        <td id="8"></td>
                                        <td id="9"></td>
                                        <td id="10"></td>
                                        <td id="11"></td>
                                        <td id="12"></td>
                                        <td id="13"></td>
                                        <td id="14"></td>
                                        <td id="14"></td>
                                        <td >IVA</td>
                                        <td style="text-align:right"   >$ <?php echo number_format($VAR_COSTO*.16 ,2) ?></td>
                                         <td></td>
                                         <td></td>
                                    </tr>

                                    <tr>
                                        <td id="1"></td>
                                        <td id="2"></td>
                                        <td id="2"></td>
                                        <td id="3"></td>
                                        <td id="4"></td>
                                        <td id="5"></td>
                                        <td id="6"></td>
                                        <td id="7"></td>
                                        <td id="8"></td>
                                        <td id="9"></td>
                                        <td id="10"></td>
                                        <td id="11"></td>
                                        <td id="12"></td>
                                        <td id="13"></td>
                                        <td id="14"></td>
                                        <td id="14"></td>
                                        <td >G TOTAL</td>
                                        <td style="text-align:right"  >$ <?php echo number_format($VAR_COSTO+($VAR_COSTO*.16)-($VAR_COSTO - $VAR_CASH) ,2) ?></td>
                                       <td></td>
                                       <td></td>

                                    </tr>




<!--///------------------>



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




<script>



$(document).ready(function() {
    $('#example2').DataTable( {
            responsive: false,
            bSort:false,
       "paging": false,
         "searching": false,
        dom: 'Bfrtip',
        buttons: [
             'excel'
        ]
    } );
} );

</script>

