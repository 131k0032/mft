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
    <title>MFTSYS | Mayan Fantasy Tours <?php echo $VAR_VERSION ?></title>
</head>
<?php

    include "../db_conexion.php";
    //echo $_POST["txtsql"]

    ?>

    <table style="width:150%" >
    <tr>
        <td style="text-align:left" colspan=25><img src="http://www.playatoursmft.com/images/transfers.jpg" alt="" /></td>
    </tr>
        <tr><td style="text-align:left" colspan="25"><h2 style="font-size:20px;padding:0px;margin:0px;">REPORTE GENERAL DE SERVICIOS (G1)</h2></td></tr>

    <tr>
        <th></th>
        <th>#Num</th>
        <th>Fecha </th>
        <th>Agencia</th>
        <th>Servicio</th>
        <th>PAX</th>
        <th>Nombre</th>
        <th>Habitacion</th>
        <th>Hora</th>
        <th>Pick up</th>
        <th>Drop off</th>
  
        <th>Vuelo</th>
        <th>Habitac.</th>
        <th>Precio</th>
        <th># Eco</th>
        <th>Placas</th>
        <th>Operador</th>
        <th>Vehículo</th>
        <th>Cve</th>
        <th>Comentarios</th>

    </tr>
<?php
    $rs = adoopenrecordset($_POST["txtsql"]);
    $i = 1;

    $VAR_COLOR = "";



    while($rstemp = mysql_fetch_array($rs)){
       if($VAR_COLOR==""){$VAR_COLOR="#EEEEEE";}else{$VAR_COLOR="";}
    ?>
        <tr style="background-color:<?php echo $VAR_COLOR ?>;">
        <td><?php echo $i?></td>
        <td>#<?php echo  substr($rstemp["num"],-5) ?>-<?php echo  $rstemp["id"] ?></td>
        <td><?php echo  $rstemp["date1"] ?></td>
        <td><?php echo  $rstemp["agen"] ?></td>
        <td><?php echo  $rstemp["tipo"] ?></td>
        <td><?php echo  $rstemp["adul"].".".$rstemp["chil"].".".$rstemp["enfa"] ?></td>
        <td><?php echo  $rstemp["name"] ?></td>
        <td><?php echo  $rstemp["room"] ?></td>
        <td><?php echo  $rstemp["time1"] ?></td>
        <td><?php echo  $rstemp["orig1"] ?></td>
        <td><?php echo  $rstemp["dest1"] ?></td>

        <td><?php echo  $rstemp["vuel1"] ?></td>
        <td><?php echo  $rstemp["room"] ?></td>
        <td><?php echo  $rstemp["monto"] ?></td>
        <td><?php echo  $rstemp["noec"] ?></td>
        <td><?php echo  $rstemp["plac"] ?></td>
        <td><?php echo  $rstemp["oper"] ?></td>
        <td><?php echo  $rstemp["vehic"] ?></td>
        <td>CC<?php echo  $rstemp["cve"] ?>BB<?php echo  $rstemp["cve2"] ?></td>
        <td><?php echo  $rstemp["come"] ?></td>

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