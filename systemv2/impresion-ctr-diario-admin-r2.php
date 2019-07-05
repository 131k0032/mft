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
    <title>CONTROL DIARIO DE ADMINISTRACION </title>


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

    <table   border=0 style="width:100%" id="example" class="display nowrap" cellspacing="0"  data-order='[[ 0, "desc" ]]' data-page-length='50' class="table table-striped table-bordered table-hover"  >

     <thead>
    <tr><td style="text-align:left" colspan=30><img src="http://www.mft.com.mx/images/transfers.jpg" alt="" /></td></tr>

    <tr><td style="text-align:left" colspan="30"><h2 style="font-size:20px;padding:0px;margin:0px;">CONTROL DIARIO DE ADMINISTRACIÓN</h2></td></tr>
    <tr><td style="text-align:left" colspan="30">

    <?php
     //   echo $_POST["txtsql2"];

       $VAR_XX = explode("|",$_POST["txtsql2"]);
      // echo $VAR_XX[0];


       echo  "REPORTE DEL <b>".$VAR_XX[0]."</b> OPERADOR: <b >".strtoupper($VAR_XX[1])."</b>";

    ?>
    </td></tr>
    <tr>
              <th># </th>
              <th>#Eco</th>
              <th>Placas</th>
              <th>Proveedor</th>
              <th>Operador</th>
              <th>Agencia</th>
              <th>Servicio</th>
              <th>PAX</th>
              <th>Nombre</th>
              <th>Hab</th>
              <th>Hora</th>
              <th>Pick up</th>
              <th>Drop off</th>
              <th>Vuelo</th>
              <th>Cve</th>
              <th>Cupón</th>
              <th>Costo</th>
              <th>Gasolina 1</th>
              <th>Gasolina 2</th>
              <th>Gasolina 3</th>
              <th>Sueldo</th>
              <th>Litros</th>
              <th>KI</th>
              <th>KF</th>
              <th>Recorrido</th>
              <th>Estimado</th>
              <th>Diferencia</th>
              <th>Utilidad</th>
              <th>RendtoxKM</th>
              <th>Comentarios</th>

    </tr>

       </thead>
          <tbody>

<?php






    $rsf = adoopenrecordset($_POST["txtsql"]);
    $rstemp = mysql_fetch_array($rsf);


     $VAR_ST = 0;
     $VAR_OPER = $rstemp["oper"];

     $VAR_ST = 0;
     $VAR_STGAS1 = 0;
     $VAR_STGAS2 = 0;
     $VAR_STGAS3 = 0;
     $VAR_STSUEL = 0;
     $VAR_STLITR = 0;
     $VAR_STUTIL = 0;


     $VAR_TCOST = 0;
     $VAR_TGAS1 = 0;
     $VAR_TGAS2 = 0;
     $VAR_TGAS3 = 0;
     $VAR_TSUEL = 0;
     $VAR_TLITR = 0;
     $VAR_TUTIL = 0;




     $rs = adoopenrecordset($_POST["txtsql"]);
    while($rstemp = mysql_fetch_array($rs)){

                $VAR_ST = $VAR_ST +  $rstemp["costo"];
                 $VAR_STGAS1 = $VAR_STGAS1 +  $rstemp["gasolina"];
                 $VAR_STGAS2 = $VAR_STGAS2 +  $rstemp["gas2"];
                 $VAR_STGAS3 = $VAR_STGAS3 +  $rstemp["gas3"];
                 $VAR_STSUEL = $VAR_STSUEL +  $rstemp["sueldo"];
                 $VAR_STLITR = $VAR_STLITR +  $rstemp["litros"];
                 $VAR_STUTIL = $VAR_STUTIL +  $rstemp["costo"]-$rstemp["sueldo"]-$rstemp["gasolina"]-$rstemp["gas2"]-$rstemp["gas3"];

     if($VAR_OPER != $rstemp["oper"] ){
                 ?>
                    <tr style="background-color:#CCCCCC">
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
                        <td></td>
                        <td>SUB TOTAL</td>
                        <td style="text-align:right"><?php echo number_format($VAR_ST,2) ?></td>
                        <td style="text-align:right"><?php echo number_format($VAR_STGAS1,2) ?></td>
                        <td style="text-align:right"><?php echo number_format($VAR_STGAS2,2) ?></td>
                        <td style="text-align:right"><?php echo number_format($VAR_STGAS3,2) ?></td>
                        <td style="text-align:right"><?php echo number_format($VAR_STSUEL,2) ?></td>
                        <td style="text-align:right"><?php echo number_format($VAR_STLITR,2) ?></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td style="text-align:right"><?php echo number_format($VAR_STUTIL,2) ?></td>
                        <td></td>
                        <td></td>
                    </tr>

               <?php


                 $VAR_TCOST = $VAR_TCOST + $VAR_ST;
                 $VAR_TGAS1 = $VAR_TGAS1 + $VAR_STGAS1;
                 $VAR_TGAS2 = $VAR_TGAS2 + $VAR_STGAS2;
                 $VAR_TGAS3 = $VAR_TGAS3 + $VAR_STGAS3;
                 $VAR_TSUEL = $VAR_TSUEL + $VAR_STSUEL;
                 $VAR_TLITR = $VAR_TLITR + $VAR_STLITR;
                 $VAR_TUTIL = $VAR_TUTIL + $VAR_STUTIL;

                 $VAR_ST = 0;
                 $VAR_STGAS1 = 0;
                 $VAR_STGAS2 = 0;
                 $VAR_STGAS3 = 0;
                 $VAR_STSUEL = 0;
                 $VAR_STLITR = 0;
                 $VAR_STUTIL = 0;

            }



      ?>
        <tr style="background-color:<?php echo $VAR_COLOR ?>;">
            <td><?php //echo  $rstemp["consec"] ?></td>
            <td><?php echo  $rstemp["noec"] ?></td>
            <td><?php echo  $rstemp["plac"] ?></td>
            <td><?php echo  $rstemp["pro_nomb"] ?></td>
            <td><?php echo  $rstemp["oper"] ?></td>
            <td style="background-color"><?php echo  $rstemp["agen"] ?></td>
            <td style="text-align:center"><?php echo  strtoupper($rstemp["tipo"]) ?></td>
            <td><?php echo  $rstemp["adul"].".".$rstemp["chil"].".".$rstemp["enfa"] ?></td>


        <td><?php echo  $rstemp["name"] ?></td>
        <td><?php echo  $rstemp["room"] ?></td>
        <td><?php echo  $rstemp["time1"] ?></td>
        <td><?php echo  $rstemp["orig1"] ?></td>
        <td><?php echo  $rstemp["dest1"] ?></td>
        <td><?php echo  $rstemp["vuel1"] ?></td>
        <td>CC<?php echo  $rstemp["cve"] ?>BB<?php echo  $rstemp["cve2"] ?></td>
        <td><?php echo  $rstemp["cupo"] ?></td>
        <td style="text-align:right"><?php echo  number_format($rstemp["costo"],2);    ?></td>
        <td style="text-align:right"><?php echo  number_format($rstemp["gasolina"],2);   ?></td>
        <td style="text-align:right"><?php echo  number_format($rstemp["gas2"],2);   ?></td>
        <td style="text-align:right"><?php echo  number_format($rstemp["gas3"],2);    ?></td>
        <td style="text-align:right"><?php echo  number_format($rstemp["sueldo"],2) ;   ?></td>
        <td style="text-align:right"><?php echo  number_format($rstemp["litros"],0) ;   ?></td>
        <td style="text-align:right"><?php echo  number_format($rstemp["ki"],0) ?></td>
        <td style="text-align:right"><?php echo  number_format($rstemp["kf"],0) ?></td>
        <td style="text-align:right"><?php echo number_format($rstemp["kf"]-$rstemp["ki"],0) ?></td>
        <td style="text-align:right"><?php echo number_format(($rstemp["kf"]-$rstemp["ki"])/120*228,0) ?></td>
        <td style="text-align:right"><?php echo number_format( $rstemp["litros"] - (($rstemp["kf"]-$rstemp["ki"])/120*228)  ,0) ?></td>
        <td style="text-align:right"><?php echo number_format($rstemp["costo"]-$rstemp["sueldo"]-$rstemp["gasolina"]-$rstemp["gas2"],2) ?></td>
        <td><?php

                if($rstemp["kf"]-$rstemp["ki"]>0 and $rstemp["litros"] >0){

                    echo number_format(($rstemp["kf"]-$rstemp["ki"]) / $rstemp["litros"],2);

                }else{

                    echo "0.00";

                }

         ?></td>
         <td><?php echo $rstemp["come"] ?></td>



        </tr>
<?php


    $i = $i +1;
    }

?>

                    <tr style="background-color:#CCCCCC">
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
                        <td></td>
                        <td>SUB TOTAL</td>
                        <td style="text-align:right"><?php echo number_format($VAR_ST,2) ?></td>
                        <td style="text-align:right"><?php echo number_format($VAR_STGAS1,2) ?></td>
                        <td style="text-align:right"><?php echo number_format($VAR_STGAS2,2) ?></td>
                        <td style="text-align:right"><?php echo number_format($VAR_STGAS3,2) ?></td>
                        <td style="text-align:right"><?php echo number_format($VAR_STSUEL,2) ?></td>
                        <td style="text-align:right"><?php echo number_format($VAR_STLITR,2) ?></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td style="text-align:right"><?php echo number_format($VAR_STUTIL,2) ?></td>
                        <td></td>
                        <td></td>
                    </tr>



   </tbody>

 <tfoot>
        <tr style="background-color:#BBBBBB">
            <td colspan="16" style="text-align:right">TOTAL</td>
            <td style="text-align:right !important" ><?php echo number_format($VAR_TCOST,2) ?></td>
            <td style="text-align:right !important" ><?php echo number_format($VAR_TGAS1,2) ?></td>
            <td style="text-align:right !important" ><?php echo number_format($VAR_TGAS2,2) ?></td>
            <td style="text-align:right !important" ><?php echo number_format($VAR_TGAS3,2) ?></td>
            <td style="text-align:right !important" ><?php echo number_format($VAR_TSUEL,2) ?></td>
            <td style="text-align:right !important" ><?php echo number_format($VAR_TLITR,2) ?></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td  style="text-align:right !important"  ><?php echo number_format($VAR_TUTIL,2) ?></td>
            <td></td>
            <td></td>
        </tr>

    </tfoot>


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
             'excel','print'
        ],
        columnDefs: [
            { width: 20, targets: 0 }
        ],
        fixedColumns: true


    } );






} );


</script>


