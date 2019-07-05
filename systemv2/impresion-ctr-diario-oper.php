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
    <title>CONTROL DIARIO DE OPERACIONES</title>


      <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css">
      <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.2.3/css/buttons.dataTables.min.css">




</head>
<?php

    include "../db_conexion.php";

  //  echo $_POST["txtsql"];


    $rs1 = adoopenrecordset($_POST["txtsql"]);
    $i = 1;
    $VAR_COLOR = "";
 //  $rstemp1 = mysql_fetch_array($rs1);




 //   echo $_POST["txtsql"];


   if(isset($_GET["t"])){
        $VAR_TITLE = $_GET["t"];

   }
    ?>

    <table style="width:120%" id="example" class="display nowrap" cellspacing="0"  data-order='[[ 0, "desc" ]]' data-page-length='50' class="table table-striped table-bordered table-hover"  >
    <thead>
    <tr><td style="text-align:left" colspan=25><img src="http://www.mft.com.mx/images/transfers.jpg" alt="" /></td></tr>

    <tr><td style="text-align:left" colspan="25"><h2 style="font-size:20px;padding:0px;margin:0px;">CONTROL DIARIO DE OPERACIONES</h2></td></tr>
    <tr><td style="text-align:left" colspan="25">

    <?php
     //   echo $_POST["txtsql2"];

       $VAR_XX = explode("|",$_POST["txtsql2"]);
      // echo $VAR_XX[0];


       echo  "REPORTE DEL <b>".$VAR_XX[0]."</b> OPERADOR: <b >".strtoupper($VAR_XX[1])."</b> NO.ECO: ".strtoupper($VAR_XX[2])."";

    ?>
    </td></tr>



    <tr>
              <th># </th>
              <th>Vehículo</th>
              <th>#Eco</th>
              <th>Placas</th>
              <th>Proveedor</th>
              <th>Operador</th>
             <!-- <th>Fecha</th>-->
              <th>Agencia</th>
              <th>Servicio</th>
              <th>PAX</th>
              <th>Nombre</th>
              <th>Hab</th>
              <th>Hora</th>
              <th>Pick up</th>
              <th>Drop off</th>
              <th>Vuelo</th>
              <!--<th>Forma Pago</th>-->
              <!--<th>Reservó</th>-->
              <!--<th>Estatus</th>-->

              <th>Gasolina</th>

              <th>Litros</th>
              <th>KI</th>
              <th>KF</th>
              <th>Recorrido</th>
              <th>Estimado</th>


              <th>Cve</th>
              <th>Comentarios</th>



    </tr>
       </thead>
       <tbody>
<?php


  $VAR_TGASOLINA =  0 ;
  $VAR_TLITROS =  0 ;
  $VAR_TKI =  0 ;
  $VAR_TKF =  0 ;
  $VAR_TRECORRIDO =  0 ;
  $VAR_TESTIMADO =  0 ;



    $rsf = adoopenrecordset($_POST["txtsql"]);
    $rstemp = mysql_fetch_array($rsf);

     $VAR_OPER = $rstemp["oper"];
     $VAR_TOT1 = 0;
     $VAR_TOT2 = 0;
     $VAR_TOT3 = 0;
     $VAR_TOT4 = 0;
     $VAR_TOT5 = 0;
     $VAR_TOT6 = 0;
     $i = 0;
     $rs = adoopenrecordset($_POST["txtsql"]);
    while($rstemp = mysql_fetch_array($rs)){


                                          $VAR_NX = "";

                      if( date("Y-M-d",$rstemp["num"]) != date("Y-M-d")  ){
                          $i = $i + 1;
                          $VAR_NX = $i;

                      }


       if($VAR_COLOR==""){$VAR_COLOR="#EEEEEE";}else{$VAR_COLOR="";}

       if($VAR_OPER !=$rstemp["oper"] ) {
                echo "<tr style='background-color:silver' >
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td  style='text-align:right; border-bottom:1px solid silver;border-top:1px solid silver'><b>TOTAL</b></td>";
                echo "<td style='border-bottom:1px solid silver;border-top:1px solid silver;text-align:right'><b>".number_format($VAR_TOT1,0)."</b></td>";
                echo "<td style='border-bottom:1px solid silver;border-top:1px solid silver;text-align:right'><b>".number_format($VAR_TOT2,0)."</b></td>";
                echo "<td style='border-bottom:1px solid silver;border-top:1px solid silver;text-align:right'><b>".number_format($VAR_TOT3,0)."</b></td>";
                echo "<td style='border-bottom:1px solid silver;border-top:1px solid silver;text-align:right'><b>".number_format($VAR_TOT4,0)."</b></td>";
                echo "<td style='border-bottom:1px solid silver;border-top:1px solid silver;text-align:right'><b>".number_format($VAR_TOT5,0)."</b></td>";
                echo "<td style='border-bottom:1px solid silver;border-top:1px solid silver;text-align:right'><b>".number_format($VAR_TOT6,0)."</b></td>
                <td></td>
                <td></td>
                ";


                $VAR_OPER = $rstemp["oper"];
                 $VAR_TOT1 = 0;
                 $VAR_TOT2 = 0;
                 $VAR_TOT3 = 0;
                 $VAR_TOT4 = 0;
                 $VAR_TOT5 = 0;
                 $VAR_TOT6 = 0;
                 echo "</tr>";
                }

           $VAR_TOT1 = $VAR_TOT1 + $rstemp["gasolina"];
           $VAR_TOT2 = $VAR_TOT2 + $rstemp["litros"];
           $VAR_TOT3 = $VAR_TOT3 + $rstemp["ki"];
           $VAR_TOT4 = $VAR_TOT4 + $rstemp["kf"];
           $VAR_TOT5 = $VAR_TOT5 + ($rstemp["kf"]-$rstemp["ki"]);
           $VAR_TOT6 = $VAR_TOT6 + ($rstemp["estimado"]);

    ?>
        <tr style="background-color:<?php echo $VAR_COLOR ?>;">
        <td><?php // echo  $VAR_NX ?></td>
        <td><?php echo  $rstemp["tipo_veh"] ?></td>
        <td><?php echo  $rstemp["noec"] ?></td>




        <td><?php echo  $rstemp["plac"] ?></td>
        <td><?php echo  $rstemp["pro_nomb"] ?></td>
        <td><?php echo  $rstemp["oper"] ?></td>
      <!--  <td><?php echo  $rstemp["date1"] ?></td> -->


        <td style="background-color"><?php echo  $rstemp["agen"] ?></td>
        <td style="text-align:center"><?php echo  strtoupper($rstemp["tipo"]) ?></td>
        <td><?php echo  $rstemp["adul"].".".$rstemp["chil"].".".$rstemp["enfa"] ?></td>



        <td><?php echo  $rstemp["name"] ?></td>
        <td><?php echo  $rstemp["room"] ?></td>
        <td><?php echo  $rstemp["time1"] ?></td>
        <td><?php echo  $rstemp["orig1"] ?></td>
        <td><?php echo  $rstemp["dest1"] ?></td>
        <td><?php echo  $rstemp["vuel1"] ?></td>
        <!--<td><?php echo  $rstemp["payment"] ?></td>-->
        <!--<td><?php echo  $rstemp["usuario"] ?></td>-->
        <!--<td><?php echo  strtoupper($rstemp["estatus"]) ?></td>-->

        <td style='text-align:right'><?php echo  number_format($rstemp["gasolina"],0) ?></td>

        <td style='text-align:right'><?php echo  number_format($rstemp["litros"],0) ?></td>
        <td style='text-align:right'><?php echo  number_format($rstemp["ki"],0) ?></td>
        <td style='text-align:right'><?php echo  number_format($rstemp["kf"],0) ?></td>
        <td style='text-align:right'><?php echo  number_format($rstemp["kf"]-$rstemp["ki"],0) ?></td>
        <td style='text-align:right'><?php echo  number_format($rstemp["estimado"],0) ?></td>


        <td>CC<?php echo  $rstemp["cve"] ?>BB<?php echo  $rstemp["cve2"] ?></td>
        <td><?php echo  $rstemp["come"] ?></td>




        </tr>
<?php

     $VAR_TGASOLINA = $VAR_TGASOLINA + $rstemp["gasolina"];


  $VAR_TLITROS = $VAR_TLITROS +  $rstemp["gasolina"] ;
  $VAR_TKI =  $VAR_TKI +  $rstemp["ki"];
  $VAR_TKF =  $VAR_TKF +  $rstemp["kf"];
  $VAR_TRECORRIDO =  $VAR_TRECORRIDO +  ($rstemp["kf"]-$rstemp["ki"]) ;
  $VAR_TESTIMADO =  $VAR_TESTIMADO +  $rstemp["estimado"];


    $i = $i +1;
    }

 echo "<tr style='background-color:silver' >
                 <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                 <td  style='text-align:right; border-bottom:1px solid silver'><b>TOTAL</b></td>";
                echo "<td style='border-bottom:1px solid silver;text-align:right'><b>".number_format($VAR_TOT1,0)."</b></td>";
                echo "<td style='border-bottom:1px solid silver;text-align:right'><b>".number_format($VAR_TOT2,0)."</b></td>";
                echo "<td style='border-bottom:1px solid silver;text-align:right'><b>".number_format($VAR_TOT3,0)."</b></td>";
                echo "<td style='border-bottom:1px solid silver;text-align:right'><b>".number_format($VAR_TOT4,0)."</b></td>";
                echo "<td style='border-bottom:1px solid silver;text-align:right'><b>".number_format($VAR_TOT5,0)."</b></td>";
                echo "<td style='border-bottom:1px solid silver;text-align:right'><b>".number_format($VAR_TOT6,0)."</b></td>
                <td></td>
                <td></td>
                ";

                $VAR_OPER = $rstemp["oper"];
                 $VAR_TOT1 = 0;
                 $VAR_TOT2 = 0;
                 $VAR_TOT3 = 0;
                 $VAR_TOT4 = 0;
                 $VAR_TOT5 = 0;
                 $VAR_TOT6 = 0;
                 echo "</tr>";


?>
<tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
    <td  style="text-align:right"><b>GRAN TOTAL</b></td>

    <td style='text-align:right'><b><?php echo number_format($VAR_TGASOLINA,0) ?></b></td>
    <td style='text-align:right'><b><?php echo number_format($VAR_TLITROS,0) ?></b></td>
    <td style='text-align:right'><b><?php echo number_format($VAR_TKI,0) ?></b></td>
    <td style='text-align:right'><b><?php echo number_format($VAR_TKF,0) ?></b></td>
    <td style='text-align:right'><b><?php echo number_format($VAR_TRECORRIDO,0) ?></b></td>
    <td style='text-align:right'><b><?php echo number_format($VAR_TESTIMADO,0) ?></b></td>
    <td></td>
    <td></td>

</tr>
  </tbody>
  <thead>
    <tr><td style="text-align:left;border-top:1px solid silver" colspan="21">Mayan Fantasy Tours. Carretera Federal  Mza. 255 Lote 25 Local 17,
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




