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
<?php

    include "../db_conexion.php";

  //  echo $_POST["txtsql"];


    $rs1 = adoopenrecordset($_POST["txtsql"]);
    $i = 1;
    $VAR_COLOR = "";
   $rstemp1 = mysql_fetch_array($rs1);


     $rs = adoopenrecordset($_POST["txtsql"]);

    //echo $_POST["txtsql"]
    $VAR_TITLE = "ORDEN DE SERVICIO (A1)";

   if(isset($_GET["t"])){
        $VAR_TITLE = $_GET["t"];

   }
    ?>

    <table style="width:100%" >
    <tr><td style="text-align:left" colspan=25><img src="http://www.playatoursmft.com/images/transfers.jpg" alt="" /></td></tr>
  <tr><td style="text-align:left" colspan="25"><h2 style="font-size:20px;padding:0px;margin:0px;">REPORTE GENERAL DE SERVICIOS (G1)</h2></td></tr>

    <tr>
        <td colspan="25" style="text-align:center;font-size:15px">
        <meta charset='utf-8'>

            <b><?php
            $date = date_create($rstemp1["date1"]);
            echo $date->format(' l j F Y')

             ?></b>
        </td>
    </tr>

    <tr>
              <th># Servicio</th>
              <th>#Eco</th>
              <th>Placas</th>
              <th>Operador</th>
              <th>Fecha</th>
              <th>Agencia</th>
              <th>Servicio</th>
              <th>PAX</th>
              <th>Nombre</th>
              <th>Hab</th>
              <th>Hora</th>
              <th>Pick up</th>
              <th>Drop off</th>
              <th>Vuelo</th>
              <th>Comentarios</th>
              <th>Forma Pago</th>
              <th>Reservó</th>
              <th>Estatus</th>
              <th>Clave</th>

    </tr>
<?php




    while($rstemp = mysql_fetch_array($rs)){
       if($VAR_COLOR==""){$VAR_COLOR="#EEEEEE";}else{$VAR_COLOR="";}
    ?>
        <tr style="background-color:<?php echo $VAR_COLOR ?>;">
        <td><?php echo  $rstemp["id"] ?></td>
        <td><?php echo  $rstemp["noec"] ?></td>




        <td><?php echo  $rstemp["plac"] ?></td>
        <td><?php echo  $rstemp["oper"] ?></td>
        <td><?php echo  $rstemp["date1"] ?></td>


        <td><?php echo  $rstemp["agen"] ?></td>
        <td><?php echo  $rstemp["tipo"] ?></td>
        <td><?php echo  $rstemp["adul"]+$rstemp["chil"]+$rstemp["enfa"] ?></td>



        <td><?php echo  $rstemp["name"] ?></td>
        <td><?php echo  $rstemp["room"] ?></td>
        <td><?php echo  $rstemp["time1"] ?></td>
        <td><?php echo  $rstemp["orig1"] ?></td>
        <td><?php echo  $rstemp["dest1"] ?></td>
        <td><?php echo  $rstemp["airl1"] ?> / <?php echo  $rstemp["vuel1"] ?></td>
        <td><?php echo  $rstemp["come"] ?></td>
        <td><?php echo  $rstemp["payment"] ?></td>
        <td><?php echo  $rstemp["usuario"] ?></td>
        <td><?php echo  $rstemp["estatus"] ?></td>
        <td><?php echo  $rstemp["clave"] ?></td>

        </tr>
<?php
    $i = $i +1;
    }
?>
    <tr><td style="text-align:center;border-top:1px solid silver" colspan="33">Mayan Fantasy Tours. Carretera Federal  Mza. 255 Lote 25 Local 17,
              entre 11 y 21 Sur, Col. Ejido Sur CP77712. Solidaridad, Quintana Roo.
              <b>MFT060620NG0</b>
          </td>
    </tr>
</table>