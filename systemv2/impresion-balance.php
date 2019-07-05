
<style>
    *{
      font-family:Arial;
      font-size:12px;


    }

</style>

<head>
      <title>BALANCE</title>
      <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css">
      <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.2.3/css/buttons.dataTables.min.css">

</head>

<?php

    include "../db_conexion.php";

  //  echo $_POST["txtsql"];


          $VAR_DEL = date("Y-m-01");
          $VAR_OPER = "Todos";
          $VAR_AL = date("Y-m-30");


          if(isset($_POST["txtdel"])){ $VAR_DEL = $_POST["txtdel"]; }
          if(isset($_POST["txtal"])){ $VAR_AL = $_POST["txtal"]; }
          if(isset($_POST["txtoper"])){ $VAR_OPER = $_POST["txtoper"]; }


                                   $sqlf="select *, cve as total from _transfers where num > 0 and date1 >='".$VAR_DEL."' ";
                                   if(isset($_POST["txtoper"])){  if($_POST["txtoper"]!="Todos")   { $VAR_OPE = $_POST["txtoper"] ; $sqlf= $sqlf." and oper = '".$_POST["txtoper"]."' "; }}
                                   if(isset($_POST["txtal"])){ $sqlf= $sqlf." and date1     <=  '".$_POST["txtal"]."'"; }
                                  $sqlf = $sqlf . "  order by date1, oper";



    //    echo $sqlf;




    ?>

    <table style="width:100%" id="example" class="display nowrap" cellspacing="0"  data-order='[[ 0, "desc" ]]' data-page-length='50' class="table table-striped table-bordered table-hover"  >

    <thead>
    <tr><td style="text-align:left" colspan="18"><img src="http://www.mft.com.mx/images/transfers.jpg" alt="" /></td></tr>
    <tr><td style="text-align:left" colspan="18"><h2 style="font-size:20px;padding:0px;margin:0px;">BALANCE</h2></td></tr>

<!--///------------------>


              <tr class="border_bottom">


                          <th>FECHA</th>
                          <th>PLACAS</th>
                          <th>OPERADOR</th>
                          <th>AGENCIA</th>
                          <th>SERVICIO</th>
                          <th>PAX</th>
                          <th>NOMBRE</th>
                          <th>PICKUP</th>
                          <th>DROP OFF</th>
                          <th>BALANCE</th>
                          <th>ENTREGA</th>
                          <th>RECIBÍ</th>



              </tr>
 </thead>
   <tbody>

                                    <?php
                                        $VAR_TOTALDL = 0;
                                        $VAR_TOTALMX = 0;
                                        $VAR_TOTALEU = 0;
                                        $VAR_TOTALCA = 0;

                                      $rsf = adoopenrecordset($sqlf);


                                      while($rstempf = mysql_fetch_array($rsf)){
                                       // $VAR_BALANCE = $rstempf["costo"]-$rstempf["gasolina"]-$rstempf["gas2"]-$rstempf["sueldo"];
                                       if($rstempf["total"]>0){
                                      ?>

                                            <tr  style="cursor:pointer;" >
                                            <td><?php echo $rstempf["date1"] ?></td>
                                            <td><?php echo $rstempf["noec"] ?></td>
                                            <td><?php echo $rstempf["oper"] ?></td>
                                            <td><?php echo $rstempf["agen"] ?></td>
                                            <td><?php echo $rstempf["tipo"] ?></td>
                                            <td><?php echo ($rstempf["adul"].".".$rstempf["chil"].".".$rstempf["enfa"]) ?></td>
                                            <td><?php echo $rstempf["name"] ?></td>
                                            <td><?php echo substr($rstempf["orig1"],0,25) ?></td>
                                            <td><?php echo substr(strtoupper($rstempf["dest1"]),0,25) ?></td>
                                            <td style="text-align:right"><?php echo (($rstempf["total"])) ?> <?php echo (($rstempf["cve2"])) ?></td>
                                            <td></td>
                                            <td></td>



                                        </tr>

                                  <?php
                                         if($rstempf["cve2"]=="DL"){$VAR_TOTALDL = $VAR_TOTALDL + $rstempf["total"] ;}
                                         if($rstempf["cve2"]=="MX"){$VAR_TOTALMX = $VAR_TOTALMX + $rstempf["total"] ;}
                                         if($rstempf["cve2"]=="EU"){$VAR_TOTALEU = $VAR_TOTALEU + $rstempf["total"] ;}
                                         if($rstempf["cve2"]=="CA"){$VAR_TOTALCA = $VAR_TOTALCA + $rstempf["total"] ;}

                                      }


                                        }

                                    ?>




<!--///------------------>
                            <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            </td><td >TOTAL DL</td><td style="text-align:right"><?php echo number_format($VAR_TOTALDL,2) ?> DL</td><td></td><td></td></tr>


                            <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td >TOTAL MX</td><td style="text-align:right"><?php echo number_format($VAR_TOTALMX,2) ?> MX</td><td></td><td></td></tr>


                            <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td >TOTAL CA</td><td style="text-align:right"><?php echo number_format($VAR_TOTALCA,2) ?> CA</td><td></td><td></td></tr>

                            <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td >TOTAL EU</td><td style="text-align:right"><?php echo number_format($VAR_TOTALEU,2) ?> EU</td><td></td><td></td></tr>




     </tbody>
</table>
<table>
    <tr><td style="text-align:left;border-top:0px solid silver" colspan="32">Mayan Fantasy Tours. Carretera Federal  Mza. 255 Lote 25 Local 17,
              entre 11 y 21 Sur, Col. Ejido Sur CP77712. Solidaridad, Quintana Roo.
              <b>MFT060620NG0</b>
          </td>
    </tr>
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

