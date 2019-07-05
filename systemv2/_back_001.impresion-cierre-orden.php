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
    <title>CIERRE DE ORDENES</title>
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

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

    <table style="width:120%" id="example" class="display nowrap" cellspacing="0"  data-order='[[ 0, "desc" ]]' data-page-length='50' class="table table-striped table-bordered table-hover"  >
    <thead>
    <tr><td style="text-align:left" colspan=25><img src="http://www.mft.com.mx/images/transfers.jpg" alt="" /></td></tr>

    <tr><td style="text-align:left" colspan="25"><h2 style="font-size:20px;padding:0px;margin:0px;">CIERRE DE ORDENES (C3)</h2></td></tr>
    <tr><td style="text-align:left" colspan="25">

    <?php
     //   echo $_POST["txtsql2"];

       $VAR_XX = explode("|",$_POST["txtsql2"]);
      // echo $VAR_XX[0];


       echo  "REPORTE  <b>".$VAR_XX[0]."</b>";
       //echo $_POST["txtoper"];
    ?>
    </td></tr>


    <tr>
              <th># Servicio</th>
              <th># Eco</th>
              <th>Placas</th>
              <th>Operador</th>
              <th>Vehículo</th>
              <th>Agencia</th>
              <th>Servicio</th>
              <th>PAX</th>
              <th>Nombre</th>
              <th>Hab</th>
              <th>Hora</th>
              <th>Pick up</th>
              <th>Drop off</th>
              <th>Vuelo</th>
              <th>Clave</th>
              <th>Anexa</th>
              <th>Comentarios</th>
              <th>Cta.</th>
              <th>Estatus</th>

             <!--
              <th>#Eco</th>
              <th>Placas</th>
              <th>Operador</th>
              <th>Fecha</th>-->




              <!--<th>Forma Pago</th>
              <th>Reservó</th>
              <th>Estatus</th>-->

              <!--<th>Costo</th>
              <th>Gasolina</th>
              <th>Sueldo</th>
              <th>Litros</th>
              <th>KI</th>
              <th>KF</th>
              <th>Recorrido</th>
              <th>Estimado</th>
              <th>Dif. Consumo</th>
              <th>Utilidad</th>
              <th>Rendimiento</th> -->




    </tr>
    </thead>
    <tbody>
<?php

  $VAR_TCOSTO = 0 ;
  $VAR_TGASOLINA =  0 ;
  $VAR_TSUELDO = 0 ;

    while($rstemp = mysql_fetch_array($rs)){
     //  if($VAR_COLOR==""){$VAR_COLOR="#EEEEEE";}else{$VAR_COLOR="";}
       if($_POST["txtoper"]==$rstemp["oper"]){$VAR_VX = "bolder"; $VAR_COLOR ="#FFFF00"; }else{$VAR_VX = ""; $VAR_COLOR =""; }
    ?>
        <tr style="background-color:<?php echo $VAR_COLOR ?>; font-weight: <?php echo $VAR_VX ?> ">
        <td><?php echo  $rstemp["id"] ?></td>
        <td><?php echo  $rstemp["noec"] ?></td>
        <td><?php echo  $rstemp["plac"] ?></td>
        <td><?php echo  $rstemp["oper"] ?></td>
        <td><?php echo  $rstemp["vehic"] ?></td>
        <td style="background-color:"><?php echo  $rstemp["agen"] ?></td>
        <td style="text-align:center"><?php echo  strtoupper($rstemp["tipo"]) ?></td>
        <td><?php echo  $rstemp["adul"].".".$rstemp["chil"].".".$rstemp["enfa"] ?></td>
        <td><?php echo  $rstemp["name"] ?></td>
        <td><?php echo  $rstemp["room"] ?></td>
        <td><?php echo  $rstemp["time1"] ?></td>
        <td><?php echo  $rstemp["orig1"] ?></td>
        <td><?php echo  $rstemp["dest1"] ?></td>
        <td><?php echo  $rstemp["vuel1"] ?></td>
        <td>CC<?php echo  $rstemp["cve"] ?>BB<?php echo  $rstemp["cve2"] ?></td>
        <td style="text-align:center">
      <?php
                            $nombre_fichero = '_files/'.$rstemp["id"].'.pdf';
                            // echo  '_files/'.$rstempf["id"].'.pdf';
                            if (file_exists($nombre_fichero)) {
                                 echo "<a target='_blank' href='_files/".$rstemp["id"].".pdf'><span style='color:#444444' class='fa fa-file'></span></a>";
                            } else {
                                 //echo "El fichero $nombre_fichero no existe";
                               //  echo ".";
                            }


         ?>
         </td>
        <td><?php echo  $rstemp["come"] ?></td>
        <td><?php

                  if($rstemp["cta"]=="cxc"){ echo "Cliente";}
                  if($rstemp["cta"]=="cxp"){ echo "Proveedor";}
                  if($rstemp["cta"]=="cor"){ echo "Cortesia";}


         ?></td>
         <td><?php echo  strtoupper($rstemp["estatus"]) ?></td>

 <!--
        <td><?php echo  $rstemp["noec"] ?></td>
        <td><?php echo  $rstemp["plac"] ?></td>
        <td><?php echo  $rstemp["oper"] ?></td>
-->

    <!--    <td><?php echo  $rstemp["date1"] ?></td>-->
        <!--<td><?php echo  $rstemp["payment"] ?></td>
        <td><?php echo  $rstemp["usuario"] ?></td>
        <td><?php echo  strtoupper($rstemp["estatus"]) ?></td>-->

    <!--    <td><?php echo  $rstemp["costo"] ?></td>
        <td><?php echo  $rstemp["gasolina"] ?></td>
        <td><?php echo  $rstemp["sueldo"] ?></td>
        <td><?php echo  $rstemp["litros"] ?></td>
        <td><?php echo  $rstemp["ki"] ?></td>
        <td><?php echo  $rstemp["kf"] ?></td>
        <td><?php echo  $rstemp["kf"]-$rstemp["ki"] ?></td>
        <td><?php echo  $rstemp["estimado"] ?></td>
        <td><?php echo  $rstemp["gasolina"]-$rstemp["estimado"] ?></td>
        <td><?php echo  $rstemp["costo"]-$rstemp["gasolina"]-$rstemp["sueldo"] ?></td>
        <td><?php
             if($rstemp["gasolina"]>0&&($rstemp["kf"]-$rstemp["ki"])>0){
                        echo  number_format($rstemp["gasolina"]/($rstemp["kf"]-$rstemp["ki"]),2);
                    }else{
                       echo "--";

                    }



        ?></td> -->




        </tr>
<?php
     $VAR_TCOSTO = $VAR_TCOSTO + $rstemp["costo"];
     $VAR_TGASOLINA = $VAR_TGASOLINA + $rstemp["gasolina"];
     $VAR_TSUELDO = $VAR_TSUELDO + $rstemp["sueldo"];


    $i = $i +1;
    }
?>
<!--
<tr>
    <td colspan="18" style="text-align:right"><b>TOTAL</b></td>
    <td><b><?php echo number_format($VAR_TCOSTO,2) ?></b></td>
    <td><b><?php echo number_format($VAR_TGASOLINA,2) ?></b></td>
    <td><b><?php echo number_format($VAR_TSUELDO,2) ?></b></td>
</tr>
-->
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


