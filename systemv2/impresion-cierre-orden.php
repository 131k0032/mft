<style>
    *{
      font-family: arial;
      font-size:15px;
    }

    th{
       background-color: #999999;
       color:white;
       text-align:center;
    }

    tr.servicio td{
      text-align:center;
      border:0px !important;

    

    }
    tfoot {
       border: 1px solid black;
    }

    @media screen {
  div.divFooter {
    display: none;
  }
}
@media print {
  div.divFooter {
    position: fixed;
    bottom: 0;
  }
}

table {
   width:80em;
}


table {
    border-collapse: collapse;
}
th, td {
    padding: 0;
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

<!--       <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css"> -->
      <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.2.3/css/buttons.dataTables.min.css"> 





</head>
<?php

    include "../db_conexion.php";

// Obtiene la el tipo de vehiculo y su matricula con el numero ecologico
    $n_eco =   $_POST["txtnoec"];

    $sql_eco = "SELECT * FROM _vehiculos WHERE  veh_noec ='".$n_eco."';";

    $rs_veh = adoopenrecordset($sql_eco);
    $rstemp_eco = mysql_fetch_array($rs_veh);
// Obtiene la el tipo de vehiculo y su matricula con el numero ecologico

  // echo $_POST["txtsql2"];
           $VAR_XX = explode("|",$_POST["txtsql2"]);



    $VAR_APOYO = "";
    $VAR_NOORD = "";

    $rs1 = adoopenrecordset($_POST["txtsql"]);
    while($rstt = mysql_fetch_array($rs1)){

       if($rstt["apoyo"]!=""){$VAR_APOYO = $VAR_APOYO.$rstt["apoyo"].", ";}
       if($rstt["noord"]!=""){$VAR_NOORD = $VAR_NOORD.$rstt["noord"].", ";}



    }




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

    <style>
        td{
          border:1px solid #000000;
          

        }
        th{
          background-color:#FFFFFF !important;
          color: #000000;
          border:1px solid #000000;
          

        }

    </style>
<html>
<body>
  <?php require("header_print.php"); ?>   <!-- snippet header -->


  
    <table style="width:100% !important;" id="example" class="" cellspacing="0" cellpadding="0"   >
    <thead>
<!--     <tr>
        <td style="text-align:left; border:0px  solid red !important"><img src="http://www.mft.com.mx/images/transfers.jpg" alt="" /></td>
        <td style="text-align:left; border:0px solid red !important" colspan=1>
          <strong>KI</strong>   _________
          <br>
          <br>
          <strong>KF</strong>   _________
          <br>
          <br>
          <strong>KR</strong>   _________
        </td>
       <td style="text-align:left; border:0px solid red !important" colspan=1>
          <strong>GI</strong>   _________
          <br>
          <br>
          <strong>LI</strong>   _________
          <br>
          <br>
          <strong>E</strong>   _________
        <td style="text-align:left; border:0px solid red !important" colspan=1>
          <strong>Quien recibió</strong>
          <br>
          <br>
        _____________
        </td>
        
        <td style="text-align:right; border:0px solid red !important" colspan=4>
            CARRETERA FEDERAL MZA 255 LOTE 25 LOCAL 17
            <br>ENTR 11 Y 21 DSUR
            <br>COL EJIDO SUR CP77712
            <br>MFT050620NG0
        </td>

    </tr> -->
    <tr style=" background-color: #FFFFFF !important">
            <td colspan="4" style="border:0px solid #000000 !important">Nombre de operador : <?php echo  $_POST["txtoper"]; ?> </td>
            <td colspan="2" style="border:0px solid #000000 !important">Vehículo :<?php echo $rstemp_eco["veh_nomb"]; ?>  </td>
            <td colspan="2" style="border:0px solid #000000 !important">No.Eco  : <?php echo  $n_eco ?> </td>
            <td colspan="1" style="border:0px solid #000000 !important">Placas  : <?php echo $rstemp_eco["veh_plac"]; ?>  </td>
            <td colspan="1" style="border:0px solid #000000 !important">ORDEN DE SERVICIO NO: <b><?php echo $VAR_NOORD?></b> </td>
            <td colspan="2" style="border:0px solid #000000 !important">



                <?php echo  " <b>".dia_esp(date("D",strtotime($VAR_XX[0])))."</b>";  ?>
            </td>
            <td colspan="2" style="border:0px solid #000000 !important">
                <b>
                 <?php
                        echo date("d",strtotime($VAR_XX[0]))."-";
                        echo mescorto(date("m",strtotime($VAR_XX[0])))."-";
                        echo date("Y",strtotime($VAR_XX[0]))."";  ?>
                 </b>
             </td>

    </tr>

    <tr>
              <th>#</th>
              <th>Cupón</th>
              <!-- <th># Eco</th>
              <th>Placas</th>
              <th>Operador</th> -->
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
             <th>Forma de Pago </th>
             <th>ID_orden </th> <!-- id -->
             <th>Fecha</th> <!-- fecha -->



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

     //  if($VAR_COLOR==""){$VAR_COLOR="#EEEEEE";}else{$VAR_COLOR="";}
       //if(trim($_POST["txtoper"])==trim($rstemp["oper"])){$VAR_VX = "bolder"; $VAR_COLOR ="#FFFF00"; }else{$VAR_VX = ""; $VAR_COLOR =""; }

  //     echo "->".$_POST["txtoper"]."<-";
  //     echo "->".$rstemp["oper"]."<-";

    ?>
        <tr class="servicio" style="background-color:<?php echo $VAR_COLOR ?>; font-weight: <?php echo $VAR_VX ?> ">

       <!--
        <td><?php echo  $rstemp["id"] ?></td>
        -->
        <td><?php echo $VAR_NX ?></td>
        <td><?php// echo  $rstemp["tipo_veh"] ?></td>
        <!-- <td><?php// echo  $rstemp["noec"] ?></td>
        <td><?php// echo  $rstemp["plac"] ?></td>
        <td><?php// echo  $rstemp["oper"] ?></td> -->
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
        <td><?php echo  $rstemp["come"] ?></td>
        <td><?php echo  $rstemp["cta"]  ?></td>
         <td><?php echo  $rstemp["id"] ?></td>
        <td><?php echo  $rstemp["date1"]  ?></td>




        </tr>
<?php
     $VAR_TCOSTO = $VAR_TCOSTO + $rstemp["costo"];
     $VAR_TGASOLINA = $VAR_TGASOLINA + $rstemp["gasolina"];
     $VAR_TSUELDO = $VAR_TSUELDO + $rstemp["sueldo"];



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
    <tr style="height:100px">
        <td style="text-align:center;border-top:1px solid silver  !important" colspan="7">
            AUTORIZA GERENTE DE OPERACIONES
          <!--  <br><b>DANIEL VALADEZ </b> -->
        </td>
        <td style="text-align:left;border-top:1px solid silver  !important" colspan="9">
            MAYAN FANTASY TOURS SOLICITA SERVICIO DE APOYO A:  <b><?php echo $VAR_APOYO?> </b>
        </td>
    </tr>
</thead>

<table style="width: 100%;">
   <tr>
      <!-- <td colspan="5"># Servicio</td> -->
      <td colspan="5"><strong>Agencia</strong></td>
      <td><strong>Servicio</strong></td>
      <td><strong>PAX</strong></td>
      <!-- <td>Nombre</td> -->
      <!-- <td>Hab</td> -->
      <td><strong>Hora</strong></td>
      <td><strong>Hotel</strong></td>
      <!-- <td>Pick up</td>
      <td>Drop off</td> -->
      <td><strong>Vuelo</strong></td>
      <td><strong>Cupón</strong></td>
      <!-- <td>Cve</td>
      <td>Comentarios</td>
      <td>Forma de pago</td> -->
    </tr>
  <tr class="test">
      <td colspan="5"></td>
      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <br>
        <br>
        <br>
      </td>
      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <br>
        <br>
        <br>
      </td>
      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <br>
        <br>
        <br>
      </td>
      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <br>
        <br>
        <br>
      </td>
      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <br>
        <br>
        <br>
      </td>
      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <br>
        <br>
        <br>
      </td>
    <tr>
            <td colspan="5"></td>
      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <br>
        <br>
        <br>
      </td>
      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <br>
        <br>
        <br>
      </td>
      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <br>
        <br>
        <br>
      </td>
      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <br>
        <br>
        <br>
      </td>
      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <br>
        <br>
        <br>
      </td>
      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <br>
        <br>
        <br>
      </td>
    </tr>
    <tr>
            <td colspan="5"></td>
      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <br>
        <br>
        <br>
      </td>
      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <br>
        <br>
        <br>
      </td>
      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <br>
        <br>
        <br>
      </td>
      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <br>
        <br>
        <br>
      </td>
      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <br>
        <br>
        <br>
      </td>
      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <br>
        <br>
        <br>
      </td>
    </tr>
    <tr>
           <td colspan="5"></td>
      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <br>
        <br>
        <br>
      </td>
      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <br>
        <br>
        <br>
      </td>
      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <br>
        <br>
        <br>
      </td>
      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <br>
        <br>
        <br>
      </td>
      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <br>
        <br>
        <br>
      </td>
      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <br>
        <br>
        <br>
      </td>
    </tr>
    <tr>
           <td colspan="5"></td>
      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <br>
        <br>
        <br>
      </td>
      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <br>
        <br>
        <br>
      </td>
      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <br>
        <br>
        <br>
      </td>
      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <br>
        <br>
        <br>
      </td>
      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <br>
        <br>
        <br>
      </td>
      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <br>
        <br>
        <br>
      </td>
    </tr>
</table>

</table>
<br>
<br>
<!-- <table style="width: 100%;">
   <tr>
      <td colspan="5"># Servicio</td>
      <td>Agencia</td>
      <td>Servicio</td>
      <td>PAX</td>
      <td>Nombre</td>
      <td>Hab</td>
      <td>Hora</td>
      <td>Pick up</td>
      <td>Drop off</td>
      <td>Vuelo</td>
      <td>Cve</td>
      <td>Comentarios</td>
      <td>Forma de pago</td>
    </tr>
  <tr class="test">
      <td colspan="5"></td>
      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
    </tr>
    <tr>
      <td colspan="5"></td>
      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
    </tr>
    <tr>
      <td colspan="5"></td>
      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
    </tr>
    <tr>
      <td colspan="5"></td>
      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
    </tr>
    <tr>
      <td colspan="5"></td>
      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
    </tr>
</table> -->

<div class="divFooter"><?php echo  $_POST["txtoper"]; ?></div>



</body>

</html>

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


