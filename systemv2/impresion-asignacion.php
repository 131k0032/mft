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
    <title>ASIGNACION DE OPERADORES</title>

      <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css">
      <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.2.3/css/buttons.dataTables.min.css">

</head>
<?php

    include "../db_conexion.php";

  //  echo $_POST["txtsql"];


    $rs1 = adoopenrecordset($_POST["txtsql"]);
    $i = 1;
    $VAR_COLOR = "";
   $rstemp1 = mysql_fetch_array($rs1);


     $rs = adoopenrecordset($_POST["txtsql"]);

    //echo $_POST["txtsql"]


   if(isset($_GET["t"])){
        $VAR_TITLE = $_GET["t"];

   }
    ?>

    <table style="width:100%" id="example" class="display nowrap" cellspacing="0"  data-order='[[ 0, "desc" ]]' data-page-length='50' class="table table-striped table-bordered table-hover"  >
    <thead>
    <tr><td style="text-align:left" colspan=25><img src="http://www.mft.com.mx/images/transfers.jpg" alt="" /></td></tr>

    <tr><td style="text-align:left" colspan="25"><h2 style="font-size:20px;padding:0px;margin:0px;">ASIGNACIÓN DE OPERADORES</h2></td></tr>
    <tr><td style="text-align:left" colspan="25">

    <?php
     //   echo $_POST["txtsql2"];

       $VAR_XX = explode("|",$_POST["txtsql2"]);
      // echo $VAR_XX[0];


       echo  "REPORTE DEL <b>".$VAR_XX[0]."</b>  ";

    ?>
    </td></tr>


    <tr>
            <!--  <th>Num </th> -->
              <th># </th>
              <th>Vehículo</th>
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
              <th>Comentarios</th>
              <th>Cta</th>
              <th>Cupon</th>


    </tr>
    </thead>
    <tbody>
<?php

  $VAR_TCOSTO = 0 ;
  $VAR_TGASOLINA =  0 ;
  $VAR_TSUELDO = 0 ;
  $i = 0;

    while($rstemp = mysql_fetch_array($rs)){



                       $VAR_NX = "";

                                                  if( date("Y-M-d",$rstemp["num"]) != date("Y-M-d")  ){
                                                      $i = $i + 1;
                                                      $VAR_NX = $i;

                                                  }


       if($VAR_COLOR==""){$VAR_COLOR="#EEEEEE";}else{$VAR_COLOR="";}
    ?>
        <tr style="background-color:<?php echo $VAR_COLOR ?>;">

      <!--  <td><?php echo  $i ?></td> -->
        <td><?php echo  $VAR_NX ?></td>
        <td><?php echo  $rstemp["tipo_veh"] ?></td>
        <td><?php echo  $rstemp["noec"] ?></td>




        <td><?php echo  $rstemp["plac"] ?></td>
        <td><?php echo  $rstemp["pro_nomb"] ?></td>
        <td><?php echo  $rstemp["oper"] ?></td>



        <td style="background-color:#FFFF00"><?php echo  $rstemp["agen"] ?></td>
        <td><?php echo  $rstemp["tipo"] ?></td>
        <td><?php echo  $rstemp["adul"].".".$rstemp["chil"].".".$rstemp["enfa"] ?></td>



        <td><?php echo  $rstemp["name"] ?></td>
        <td><?php echo  $rstemp["room"] ?></td>
        <td><?php echo  $rstemp["time1"] ?></td>
        <td><?php echo  $rstemp["orig1"] ?></td>
        <td><?php echo  $rstemp["dest1"] ?></td>
        <td><?php echo  $rstemp["vuel1"] ?></td>

        <td>CC<?php echo  $rstemp["cve"] ?>BB<?php echo  $rstemp["cve2"] ?></td>
        <td><?php echo  $rstemp["come"] ?></td>
        <td><?php

           if($rstemp["cta"]=="cxc"){ echo "Cliente";}
            if($rstemp["cta"]=="cxp"){ echo "Proveedor";}
            if($rstemp["cta"]=="cor"){ echo "Cortesia";}




         ?></td>
         <td><?php echo  $rstemp["cupo"] ?></td>



        </tr>
<?php


    }
?>
    </tbody>
    <thead>
    <tr><td style="text-align:left;border-top:1px solid silver" colspan="25">Mayan Fantasy Tours. Carretera Federal  Mza. 255 Lote 25 Local 17,
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
             'excel','print'
        ]
    } );
} );


</script>

