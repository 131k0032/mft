<style>
    *{
      font-family: arial;
      font-size:13px;
    }

    th{
       background-color: #999999;
       color:white;
       text-align:center;
    }

    td{
      text-align:center;

    }

</style>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>MFTSYS | Mayan Fantasy Tours </title>

      <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css">
      <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.2.3/css/buttons.dataTables.min.css">


</head>
<?php

    include "../db_conexion.php";


    $VAR_DEL  = $_POST["txtdel"];
    $VAR_AL   = $_POST["txtal"];
    $VAR_OPER = $_POST["txtoper"];
    $VAR_AGEN = $_POST["txtagen"];
    $VAR_TIPO = $_POST["txttipo"];
    $VAR_NOEC = $_POST["txtnoec"];

    ?>

            <table width="100%" data-order='[[ 0, "desc" ]]' data-page-length='50' class="table table-striped table-bordered table-hover" id="example">
            <thead>
                <tr><td style="text-align:left" colspan=25><img src="http://www.mft.com.mx/images/transfers.jpg" alt="" /></td></tr>
                <tr><td style="text-align:left" colspan="25"><h2 style="font-size:20px;padding:0px;margin:0px;">REPORTE MAYOR</h2></td></tr>
              <tr>
                <th></th>
                <th colspan="3"  style="text-align:center">DEL <?php echo $VAR_DEL ?>  AL <?php echo $VAR_AL ?>   </th>
                <th colspan="3"  style="text-align:center">HISTORICO</th>
              </tr>
            <tr>
            <th style="text-align:center">Agencia</th>
            <th style="text-align:center">Facturado</th>
            <th style="text-align:center">Pagado</th>
            <th style="text-align:center">Saldo</th>
            <th style="text-align:center">Facturado</th>
            <th style="text-align:center">Pagado</th>
            <th style="text-align:center">Saldo</th>


            </tr>
             </thead>
             <tbody>
                    <?php
                                $sqlf="select agen from _transfers where num > 0 and date1 >='".$VAR_DEL."' and cta ='cxc'
                                 and  (estatus='cerrada' or estatus='completada' or estatus='cancelada' ) and date1 <='".$VAR_AL."'";


                                if(isset($_POST["txtoper"])){  if($_POST["txtoper"]!="Todos")   { $VAR_OPE = $_POST["txtoper"] ; $sqlf= $sqlf." and oper = '".$_POST["txtoper"]."' "; }}
                                if(isset($_POST["txtnoec"])){  if($_POST["txtnoec"]!="Todos")   { $VAR_ECO = $_POST["txtnoec"] ; $sqlf= $sqlf." and noec = '".$_POST["txtnoec"]."' "; }}
                                if(isset($_POST["txttipo"])){  if($_POST["txttipo"]!="Todos")   { $VAR_TIPO = $_POST["txttipo"] ; $sqlf= $sqlf." and tipo = '".$_POST["txttipo"]."'  "; }}
                                if(isset($_POST["txtagen"])){  if($_POST["txtagen"]!="Todos")     { $VAR_AGEN = $_POST["txtagen"] ; $sqlf= $sqlf." and agen = '".$_POST["txtagen"]."'  "; }}

                                $sqlf = $sqlf . " group by agen order by agen";


                                         $VAR_T1 = 0;
                                         $VAR_T2 = 0;
                                         $VAR_T3 = 0;
                                         $VAR_T4 = 0;
                                         $VAR_T5 = 0;
                                         $VAR_T6 = 0;

                                    $rs = adoopenrecordset($sqlf);

                                    $VAR_COLOR = "";


                                    while($rstemp = mysql_fetch_array($rs)){

                                    $VAR_PAG = montos("cxc",$VAR_DEL,$VAR_AL,$rstemp["agen"],'si');
                                    $VAR_SAL = montos("cxc",$VAR_DEL,$VAR_AL,$rstemp["agen"],'no') ;
                                    $VAR_FAC =  $VAR_PAG + $VAR_SAL;

                                    $VAR_PAGH = montos("cxc","2000-01-01",(date("Y")+1)."-01-01",$rstemp["agen"],'si');
                                    $VAR_SALH = montos("cxc","2000-01-01",(date("Y")+1)."-01-01",$rstemp["agen"],'no') ;
                                    $VAR_FACH =  $VAR_PAGH + $VAR_SALH;

                                  //  $VAR_T1 =  $VAR_T1 + 1;


                                    if($VAR_COLOR==""){$VAR_COLOR="#EEEEEE" ;}else{ $VAR_COLOR="" ;}


                                ?>

                                    <tr style="background-color:<?php echo $VAR_COLOR ?>">
                                        <td style="text-align:left"><?php echo $rstemp["agen"]?></td>
                                        <td style="text-align:right">$ <?php echo number_format($VAR_FAC,2)  ?></td>
                                        <td style="text-align:right">$ <?php echo number_format($VAR_PAG,2)  ?></td>
                                        <td style="text-align:right">$ <?php echo number_format($VAR_SAL,2)  ?></td>
                                        <td style="text-align:right">$ <?php echo number_format($VAR_FACH,2)  ?></td>
                                        <td style="text-align:right">$ <?php echo number_format($VAR_PAGH,2)  ?></td>
                                        <td style="text-align:right">$ <?php echo number_format($VAR_SALH,2)  ?></td>
                                    </tr>



                                <?php

                                    $VAR_T1 =  ($VAR_T1) + ($VAR_FAC);
                                    $VAR_T2 =  $VAR_T2 + $VAR_PAG;
                                    $VAR_T3 =  $VAR_T3 + $VAR_SAL;
                                    $VAR_T4 =  $VAR_T4 + $VAR_FACH;
                                    $VAR_T5 =  $VAR_T5 + $VAR_PAGH;
                                    $VAR_T6 =  $VAR_T6 + $VAR_SALH;



                                 } ?>

                                     <tr style="background-color:#EEEEEE;font-weight: bolder">
                                        <td style="text-align:right">TOTAL</td>
                                        <td style="text-align:right">$ <?php echo number_format($VAR_T1,2)  ?></td>
                                        <td style="text-align:right">$ <?php echo number_format($VAR_T2,2)  ?></td>
                                        <td style="text-align:right">$ <?php echo number_format($VAR_T3,2)  ?></td>
                                        <td style="text-align:right">$ <?php echo number_format($VAR_T4,2)  ?></td>
                                        <td style="text-align:right">$ <?php echo number_format($VAR_T5,2)  ?></td>
                                        <td style="text-align:right">$ <?php echo number_format($VAR_T6,2)  ?></td>
                                     </tr>


             </tbody>
            <thead>
            <tr><td style="text-align:left;border-top:1px solid silver" colspan="34">Mayan Fantasy Tours. Carretera Federal  Mza. 255 Lote 25 Local 17,
            entre 11 y 21 Sur, Col. Ejido Sur CP77712. Solidaridad, Quintana Roo.
            <b>MFT060620NG0</b>
            </td>
            </tr>
            </thead>
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





