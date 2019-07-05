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
    //echo $_POST["txtsql"]

    ?>

    <table  id="example2" class="display nowrap" cellspacing="0"  data-order='[[ 0, "desc" ]]' data-page-length='50' class="table table-striped table-bordered table-hover"  >
    <thead>
    <tr><td style="text-align:left" colspan="11" ><img src="http://www.mft.com.mx/images/transfers.jpg" alt="" /></td></tr>
    <tr><td style="text-align:left" colspan="11" ><h2 style="font-size:20px;padding:0px;margin:0px;">REPORTE DE AUDITORIA</h2></td></tr>

    <tr>
        <th>#</th>
        <th>ID</th>
        <th>Capturó</th>
        <th>Captura</th>
        <th>Fecha </th>
        <th>Tipo</th>
        <th>Nombre</th>
        <th>Agencia</th>
        <th>Hora</th>
        <th>Cupon</th>
        <th>Pick up</th>
        <th>Drop off</th>


    </tr>
 </thead>
  <tbody>
<?php
    $rs = adoopenrecordset($_POST["txtsql"]);
    $i = 1;

    $VAR_COLOR = "";



    while($rstemp = mysql_fetch_array($rs)){
       if($VAR_COLOR==""){$VAR_COLOR="#EEEEEE";}else{$VAR_COLOR="";}
    ?>
        <tr style="background-color:<?php echo $VAR_COLOR ?>;">
        <td><?php echo $i?></td>


              <td><?php echo $rstemp["id"] ?></td>
              <td><?php echo $rstemp["usuario"] ?></td>
              <td><?php echo date("Y-m-d - h:i:s",($rstemp["num"])) ?></td>
              <td><?php echo $rstemp["date1"] ?></td>
              <td><?php echo strtoupper($rstemp["tipo"]) ?></td>
              <td><?php echo $rstemp["name"] ?></td>
              <td><?php echo $rstemp["agen"] ?></td>
              <td><?php echo $rstemp["time1"] ?></td>
              <td><?php echo $rstemp["cupo"] ?></td>
              <td><?php echo substr($rstemp["orig1"],0,15) ?></td>
              <td><?php echo substr(strtoupper($rstemp["dest1"]),0,15) ?></td>


        </tr>
<?php
    $i = $i +1;
    }
?>

   </tbody>
   <tfoot>
   
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
    $('#example2').DataTable( {
            responsive: false,
            bSort:false,
         "paging": false,
         "searching": false,
        dom: 'Bfrtip',
        buttons: [
             'excel'
        ],


              "columnDefs": [
                { "width": "20px", "targets":0  },
                { "width": "10px", "targets":1  },
                { "width": "10px", "targets":2  },
                { "width": "20px", "targets":3  },
                { "width": "20px", "targets":4  },
                { "width": "140px", "targets": 7 }
              ]






    } );
} );


</script>

