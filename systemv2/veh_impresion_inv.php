
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
    <title>REPORTE E2 | MFT SYSTEM</title>

      <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css">
      <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.2.3/css/buttons.dataTables.min.css">


</head>

<?php include "../db_conexion.php"   ?>

<!--
 <button id="btnPrint">Print Preview</button>
 -->
                <?php

                     $sql="select * from veh_inventario where inv_id =".$_GET["i"];
                     $rs = adoopenrecordset($sql);
                     $rstemp = mysql_fetch_array($rs);

                     $VAR_FECH = $rstemp["inv_fech"];
                     $VAR_OPER = $rstemp["inv_oper"];
                     $VAR_SUPE = $rstemp["inv_supe"];
                     $VAR_VALO = $rstemp["inv_valo"];
                     $VAR_VEHID = $rstemp["veh_id"];


                     $sql="select * from _vehiculos where veh_id =".$VAR_VEHID;
                     $rs = adoopenrecordset($sql);
                     $rstemp = mysql_fetch_array($rs);

                     $VAR_NOEC = $rstemp["veh_noec"];
                     $VAR_NOSE = $rstemp["veh_nose"];
                     $VAR_NOMB = $rstemp["veh_nomb"];
                     $VAR_PLAC = $rstemp["veh_plac"];

               ?>
                <table style="width:100% !important" id="example" class="" cellspacing="0"   data-order='[[ 0, "desc" ]]' data-page-length='50' >
                <thead>
                   <tr>
                    <th colspan="4"><img src="img/logoreportes.png" alt="" /></th>
                   </tr>

                    <tr><td>&nbsp;</td></tr>
                  <tr>
                    <th colspan="4" class="enc">CONTROL VEHICULAR</th>
                  </tr>
                    <tr><td>&nbsp;</td></tr>



                    <tr>
                        <td align="right">FECHA DE ELABORACIÓN:&nbsp;</td><td><b><?php echo $VAR_FECH ?></b></td>
                        <td align="right">UNIDAD:&nbsp;</td><td><b><?php echo $VAR_NOEC ?></b></td>
                    </tr>

                    <tr>
                        <td align="right">OPERADOR:&nbsp;</td><td><b><?php echo $VAR_OPER ?></b></td>
                        <td align="right">PLACAS:&nbsp;</td><td><b><?php echo $VAR_PLAC ?></b></td>
                    </tr>

                   <tr><th>&nbsp;</th></tr>
                   <tr><th colspan="4" class="enc">CATEGORÍAS Y CONDICIONES GENERALES DEL VEHÍCULO</th></tr>
                   <tr><th>&nbsp;</th></tr>
                </thead>

                <tbody>
                     <tr>
                         <td style="text-align:center;width:25%; vertical-align: top">
                           <table>
                                <tr >
                                            <td  style="border-bottom:1px solid #000000; width:80%" >EXTERIORES</td>
                                            <td style="border-bottom:1px solid #000000; width:10%">SI</td>
                                            <td style="border-bottom:1px solid #000000; width:10%" >NO</td>

                                </tr>
                                <?php
                                                    $sql="select * from cat_inventario where cin_cate ='Exteriores' order by cin_orde";
                                                    $rs = adoopenrecordset($sql) ;
                                                    while($rstemp = mysql_fetch_array($rs)){

                                                   $VAR_CHECK = "

                                            <td style='border:1px solid #000000; width:10%;background:#000000'>&nbsp;</td>
                                              <td style='border:1px solid #000000; width:10%;'>&nbsp;</td>
                                        ";
                                                   if(isset($VAR_VALO)){
                                                     if(strpos($VAR_VALO,$rstemp["cin_desc"])==0){
                                                          $VAR_CHECK = "

                                            <td style='border:1px solid #000000; width:10%'>&nbsp;</td>
                                             <td style='border:1px solid #000000; width:10%;background:#000000'>&nbsp;</td>
                                        ";
                                                     }
                                                   }

                                                 ?>
                                                     <tr>
                                                        <td><?php echo $rstemp["cin_desc"]?></td>
                                                        <?php echo $VAR_CHECK?>


                                                     </tr>


                                                 <?php
                                                    }
                                                ?>


                           </table>

                        </td>
                         <td style="text-align:center;width:25%; vertical-align: top">
                           <table>
                                <tr >
                                            <td  style="border-bottom:1px solid #000000; width:80%" >INTERIORES</td>
                                            <td style="border-bottom:1px solid #000000; width:10%">SI</td>
                                            <td style="border-bottom:1px solid #000000; width:10%" >NO</td>

                                </tr>
                                <?php
                                                    $sql="select * from cat_inventario where cin_cate ='Interiores' order by cin_orde";
                                                    $rs = adoopenrecordset($sql) ;
                                                    while($rstemp = mysql_fetch_array($rs)){

                                                   $VAR_CHECK = "

                                            <td style='border:1px solid #000000; width:10%;background:#000000'>&nbsp;</td>
                                              <td style='border:1px solid #000000; width:10%;'>&nbsp;</td>
                                        ";
                                                   if(isset($VAR_VALO)){
                                                     if(strpos($VAR_VALO,$rstemp["cin_desc"])==0){
                                                          $VAR_CHECK = "

                                            <td style='border:1px solid #000000; width:10%'>&nbsp;</td>
                                             <td style='border:1px solid #000000; width:10%;background:#000000'>&nbsp;</td>
                                        ";
                                                     }
                                                   }

                                                 ?>
                                                     <tr>
                                                        <td><?php echo $rstemp["cin_desc"]?></td>
                                                        <?php echo $VAR_CHECK?>


                                                     </tr>


                                                 <?php
                                                    }
                                                ?>


                           </table>


                        </td>
                         <td style="text-align:center;width:25%; vertical-align: top">
                           <table>
                                <tr >
                                            <td  style="border-bottom:1px solid #000000; width:80%" >ACCESORIOS</td>
                                            <td style="border-bottom:1px solid #000000; width:10%">SI</td>
                                            <td style="border-bottom:1px solid #000000; width:10%" >NO</td>

                                </tr>
                                <?php
                                                    $sql="select * from cat_inventario where cin_cate ='Accesorios' order by cin_orde";
                                                    $rs = adoopenrecordset($sql) ;
                                                    while($rstemp = mysql_fetch_array($rs)){

                                                   $VAR_CHECK = "

                                            <td style='border:1px solid #000000; width:10%;background:#000000'>&nbsp;</td>
                                              <td style='border:1px solid #000000; width:10%;'>&nbsp;</td>
                                        ";
                                                   if(isset($VAR_VALO)){
                                                     if(strpos($VAR_VALO,$rstemp["cin_desc"])==0){
                                                          $VAR_CHECK = "

                                            <td style='border:1px solid #000000; width:10%'>&nbsp;</td>
                                             <td style='border:1px solid #000000; width:10%;background:#000000'>&nbsp;</td>
                                        ";
                                                     }
                                                   }

                                                 ?>
                                                     <tr>
                                                        <td><?php echo $rstemp["cin_desc"]?></td>
                                                        <?php echo $VAR_CHECK?>


                                                     </tr>


                                                 <?php
                                                    }
                                                ?>


                           </table>
                        </td>

                         <td style="text-align:center;width:25%; vertical-align: top">
                           <table>
                                <tr >
                                            <td  style="border-bottom:1px solid #000000; width:80%" >DOCUMENTOS</td>
                                            <td style="border-bottom:1px solid #000000; width:10%">SI</td>
                                            <td style="border-bottom:1px solid #000000; width:10%" >NO</td>

                                </tr>
                                <?php
                                                    $sql="select * from cat_inventario where cin_cate ='Documentos' order by cin_orde";
                                                    $rs = adoopenrecordset($sql) ;
                                                    while($rstemp = mysql_fetch_array($rs)){

                                                   $VAR_CHECK = "

                                            <td style='border:1px solid #000000; width:10%;background:#000000'>&nbsp;</td>
                                              <td style='border:1px solid #000000; width:10%;'>&nbsp;</td>
                                        ";
                                                   if(isset($VAR_VALO)){
                                                     if(strpos($VAR_VALO,$rstemp["cin_desc"])==0){
                                                          $VAR_CHECK = "

                                            <td style='border:1px solid #000000; width:10%'>&nbsp;</td>
                                             <td style='border:1px solid #000000; width:10%;background:#000000'>&nbsp;</td>
                                        ";
                                                     }
                                                   }

                                                 ?>
                                                     <tr>
                                                        <td><?php echo $rstemp["cin_desc"]?></td>
                                                        <?php echo $VAR_CHECK?>


                                                     </tr>


                                                 <?php
                                                    }
                                                ?>


                           </table>
                        </td>


                     </tr>
                     <tr><td>&nbsp;</td></tr>
                     <tr><td colspan="4" align="center" style="border:1px solid #000000">NOMBRE DEL SUPERVISOR <br><b><?php echo $VAR_SUPE ?></b></td>
                     <tr><td>&nbsp;</td></tr>
                     </tr>
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


