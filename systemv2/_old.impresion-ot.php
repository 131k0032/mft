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
    $VAR_TITLE = "REPORTE DE ORDENES";

   if(isset($_GET["t"])){
        $VAR_TITLE = $_GET["t"];

   }
    ?>

    <table style="width:100%" >
    <tr><td style="text-align:left" colspan=25><img src="http://www.playatoursmft.com/images/transfers.jpg" alt="" /></td></tr>
    <tr><td style="text-align:right" colspan="25">CARRETERA FEDERAL MZA 255 LOTE 25 LOCAL 17
              <br>ENTRE 11 Y 21 SUR, COL EJIDO SUR CP77712
              <br><b>MFT060620NG0</b>
          </td>
    </tr>
    <tr><td style="text-align:center" colspan="25"><h2><?php echo $VAR_TITLE ?></h2></td></tr>
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
        <th></th>



        <th>ID</th>
        <th>No.Eco</th>
        <th>Placas</th>
        <th>Operador</th>
        <th>Agencia</th>
        <th>Servicio</th>
        <th>PAX</th>
        <th>Nombre</th>
        <th>Habitación</th>
        <th>Hora</th>
        <th>Pickup</th>
        <th>Drop Off</th>
        <th>Vuelo</th>
        <th>Clave</th>
        <th>Estatus</th>

    </tr>
<?php




    while($rstemp = mysql_fetch_array($rs)){
       if($VAR_COLOR==""){$VAR_COLOR="#EEEEEE";}else{$VAR_COLOR="";}
    ?>
        <tr style="background-color:<?php echo $VAR_COLOR ?>;">
        <td><?php echo $i?></td>
        <td><?php echo  $rstemp["id"] ?></td>


        <td><?php echo  $rstemp["noec"] ?></td>
        <td><?php echo  $rstemp["plac"] ?></td>
        <td><?php echo  $rstemp["oper"] ?></td>
        <td><?php echo  $rstemp["agen"] ?></td>
        <td><?php echo  $rstemp["tipo"] ?></td>
        <td><?php echo  $rstemp["adul"]+$rstemp["chil"]+$rstemp["enfa"] ?></td>
        <td><?php echo  $rstemp["name"] ?></td>
        <td><?php echo  $rstemp["room"] ?></td>
        <td><?php echo  $rstemp["time1"] ?></td>
        <td><?php echo  $rstemp["orig1"] ?></td>
        <td><?php echo  $rstemp["dest1"] ?></td>
        <td><?php echo  $rstemp["airl1"] ?> / <?php echo  $rstemp["vuel1"] ?></td>
        <td><?php echo  $rstemp["clave"] ?></td>
        <td><?php echo  $rstemp["estatus"] ?></td>

        </tr>
<?php
    $i = $i +1;
    }
?>
</table>