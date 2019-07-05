<?php include "../db_conexion.php"   ?>
<style>
    *{
      font-family: calibri;
      font-size:12px;
    }

    th{
      font-weight: normal;

     }

    td{   }

    .enc{
      font-weight: bolder;
      text-align: center;
      border-top:1px solid black;
      border-left:1px solid black;


    }

    .data{
      border-top:1px solid black;
      border-left:1px solid black;


    }

</style>



<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>ODS</title>
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

      <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css">
      <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.2.3/css/buttons.dataTables.min.css">
</head>
<html>
<body>

<!--
 <button id="btnPrint">Print Preview</button>
 -->


 <div id="masterContent">
                <table style="width:100% !important" id="example" class="" cellspacing="0"    >
                <thead>
                    <tr><th>&nbsp;</th></tr>
                    <tr><th colspan="13" style="padding:2px; border-bottom:1px solid silver; border-top:1px solid silver "  ><b style="font-size:20px !important;">
                        REPORTE DE EXCURSIONES POR DÍA (E1)
                        <br><?php echo $_POST["txtdel"]?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;AL&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $_POST["txtal"]?>
                    </b></th></tr>
                    <tr><th>&nbsp;</th></tr>
                </thead>
            <tbody>
                <tr>
                    <th class="enc"><b style="font-size:15px !important;    ">TOUR</b></th>
                    <th class="enc"><b style="font-size:15px !important;    ">CNT</b></th>
                    <th class="enc"><b style="font-size:15px !important;    ">PAX</b></th>

                </tr>

                <?php
                        $sql="select exc_excu, count(*) as total, sum(exc_pax) as pax from _excursiones
                              where exc_fech >= '".$_POST["txtdel"]."' and exc_fech <='".$_POST["txtal"]."'";

                       if($_POST["txttour"]<>"0"){  $sql= $sql . " and exc_excu = '".$_POST["txttour"]."'";}
                       if($_POST["txtagen"]<>"0"){  $sql= $sql . " and exc_agen = '".$_POST["txtagen"]."'";}
                       if($_POST["txtrepr"]<>"0"){  $sql= $sql . " and exc_repr = '".$_POST["txtrepr"]."'";}


                         $sql= $sql . " group by exc_excu order by exc_excu ";

                 //     echo $sql;


                        $rs = adoopenrecordset($sql);

                    while($rstemp1 = mysql_fetch_array($rs)){
                 ?>

                      <tr>
                            <td class="data" style="text-align:center"><?php echo $rstemp1["exc_excu"] ?></td>
                            <td class="data" style="text-align:center"><?php echo $rstemp1["total"] ?></td>
                            <td class="data" style="text-align:center"><?php echo $rstemp1["pax"] ?></td>

                      </tr>

                <?php
                    }
                ?>

                 <tr><td style="border-top:1px solid black" colspan="13">&nbsp;</td></tr>



            </tbody>
            <thead>

                <tr style="height:100px">

                    <td style="text-align:center;border-top:1px solid silver  !important" colspan="9">
                        <br>MAYAN FANTASY TOURS SA DE CV   - MFT050620NG0
                        <br>CARR. FED MZA 255 OTE 25 LOCAL 17  - CP77712
                        <br>9842062754

                    </td>





                </tr>
            </thead>

            </table>
</div>
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


    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script type="text/javascript" src="js/printPreview.js"></script>

<script type="text/javascript">
        $(function(){
            $("#btnPrint").printPreview({
                obj2print:'#masterContent',
               // width:'810',
              //  status:'no'
                /*optional properties with default values*/
                //obj2print:'body',     /*if not provided full page will be printed*/
                //style:'',             /*if you want to override or add more css assign here e.g: "<style>#masterContent:background:red;</style>"*/
                //width: '670',         /*if width is not provided it will be 670 (default print paper width)*/
                //height:screen.height, /*if not provided its height will be equal to screen height*/
                //top:0,                /*if not provided its top position will be zero*/
                //left:'center',        /*if not provided it will be at center, you can provide any number e.g. 300,120,200*/
                //resizable : 'yes',    /*yes or no default is yes, * do not work in some browsers*/
                //scrollbars:'yes',     /*yes or no default is yes, * do not work in some browsers*/
                //status:'no',          /*yes or no default is yes, * do not work in some browsers*/
                //title:'Print Preview' /*title of print preview popup window*/

            });
        });
    </script>


