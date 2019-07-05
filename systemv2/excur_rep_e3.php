
<style>
    *{
      font-family: calibri;
      font-size:12px;
    }

    th{
      font-weight: normal;

     }

    td{   }

    .enc{
      font-weight: bolder;
      text-align: center;
      border-top:1px solid black;
      border-left:1px solid black;


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
                        $sql="select * from  _ods
                              where ods_fech >= '".$_POST["txtdel"]."' and ods_fech <='".$_POST["txtal"]."'  ";

                       if($_POST["txttour"]<>"0"){  $sql= $sql . " and ods_tour = '".$_POST["txttour"]."'";}


                         $sql= $sql . "   order by ods_tour ";

              //        echo $sql;
               ?>




                <table style="width:100% !important" id="example" class="" cellspacing="0"   data-order='[[ 0, "desc" ]]' data-page-length='50' >
                <thead>
                    <tr><th>&nbsp;</th></tr>
                    <tr><th colspan="13" style="padding:2px; border-bottom:1px solid silver; border-top:1px solid silver "  ><b style="font-size:20px !important;">
                        REPORTE GENERAL DE ODS (E3)
                        <br><?php echo $_POST["txtdel"]?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;AL&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $_POST["txtal"]?>
                    </b></th></tr>
                    <tr><th>&nbsp;</th></tr>



<tr>
                    <th class="enc"><b style="font-size:15px !important;    ">NUMERO</b></th>
                    <th class="enc"><b style="font-size:15px !important;    ">TRANSPORTADORA</b></th>
                    <th class="enc"><b style="font-size:15px !important;    ">RFC</b></th>
                    <th class="enc"><b style="font-size:15px !important;    ">PLACAS</b></th>
                    <th class="enc"><b style="font-size:15px !important;    ">NO. ECO.</b></th>
                    <th class="enc"><b style="font-size:15px !important;    ">OPERADOR</b></th>
                    <th class="enc"><b style="font-size:15px !important;    ">TELÉFONO</b></th>
                    <th class="enc"><b style="font-size:15px !important;    ">FECHA</b></th>
                    <th class="enc"><b style="font-size:15px !important;    ">PAX</b></th>

                    <th class="enc"><b style="font-size:15px !important;    ">GUÍA</b></th>
                    <th class="enc"><b style="font-size:15px !important;    ">IDIOMA</b></th>
                    <th class="enc"><b style="font-size:15px !important;    ">TOUR</b></th>
                    <th class="enc"><b style="font-size:15px !important;    ">AUTORIZÓ</b></th>
                    <th class="enc"><b style="font-size:15px !important;    ">PUESTO</b></th>

                </tr>


                </thead>

            <tbody>




               <?php

                        $rs = adoopenrecordset($sql);
                        $rstemp0 = mysql_fetch_array($rs);





                        $VAR_P1 = 0;
                        $VAR_P2 = 0;
                        $VAR_P3 = 0;

                        $i = 1;

                    while($rstemp1 = mysql_fetch_array($rs)){




                 ?>

                      <tr height="20px" style="height:20px !important">
                          <td class="enc">    <?php echo $rstemp1["ods_num"]?> </td>
                          <td class="enc">    <?php echo $rstemp1["ods_tran"]?> </td>
                          <td class="enc">    <?php echo $rstemp1["ods_rfc"]?> </td>
                          <td class="enc">    <?php echo $rstemp1["ods_plac"]?> </td>
                          <td class="enc">    <?php echo $rstemp1["ods_noec"]?> </td>
                          <td class="enc">    <?php echo $rstemp1["ods_oper"]?> </td>
                          <td class="enc">    <?php echo $rstemp1["ods_phon"]?> </td>
                          <td class="enc">    <?php echo $rstemp1["ods_fech"]?> </td>
                          <td class="enc">    <?php echo pax_por_ods2($rstemp1["ods_id"])?> </td>

                          <td class="enc">    <?php echo $rstemp1["ods_guia"]?> </td>
                          <td class="enc">    <?php echo $rstemp1["ods_idio"]?> </td>
                          <td class="enc">    <?php echo $rstemp1["ods_tour"]?> </td>
                          <td class="enc">    <?php echo $rstemp1["ods_auto"]?> </td>
                          <td class="enc">    <?php echo $rstemp1["ods_pues"]?> </td>


                      </tr>

                <?php

                    $i = $i + 1;


                    }
                ?>








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
    $('#example').DataTable( {
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


