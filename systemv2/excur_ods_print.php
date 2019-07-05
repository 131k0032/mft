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

        <?php
            $VAR_ID = $_GET["i"];

           $sql="select * from _ods where ods_id = ".$VAR_ID;
           $rs = adoopenrecordset($sql);
           $rstemp = mysql_fetch_array($rs);





             if($rstemp["ods_tour"]=="TULUM REEF ADVENTURE")        {$VAR_IMG = "tulum.jpg";;}
             if($rstemp["ods_tour"]=="CHICHEN SUNRISE")             {$VAR_IMG = "chichen.jpg";;}
             if($rstemp["ods_tour"]=="CURATED TULUM EXPLORA TULUM") {$VAR_IMG = "curated.jpg";;}
             if($rstemp["ods_tour"]=="COBA TULUM SUNSET")           {$VAR_IMG = "coba.jpg";;}
             if($rstemp["ods_tour"]=="PRIVADOS")                    {$VAR_IMG = "privados.jpg";;}







        ?>
<html>
<body>


<!--
 <button id="btnPrint">Print Preview</button>
 -->


 <div id="masterContent">
                <table style="width:100% !important" id="example" class="" cellspacing="0"    >
                <thead>
                    <tr><th colspan="13" style="font-size:48px"><?php echo $rstemp["ods_tour"] ?></th></tr>
                    <tr><th colspan="3"  style="text-align:right">TRANSPORTADORA: </th><th colspan="3" style="text-align:left"><b><?php echo $rstemp["ods_tran"] ?></b></th><th colspan="3" style="text-align:right">FECHA:          </th><th colspan="2" style="text-align:left"><b><?php echo $rstemp["ods_fech"] ?></b></th><th colspan="2" rowspan="6"><img style="max-height:120px"  src="img/<?php echo $VAR_IMG ?>" alt="" /><br>&nbsp;</th></tr>
                    <tr><th colspan="3"  style="text-align:right">RFC:            </th><th colspan="3" style="text-align:left"><b><?php echo $rstemp["ods_rfc"]  ?></b></th><th colspan="3" style="text-align:right">NO. ORDEN:      </th><th colspan="2" style="text-align:left"><b><?php echo $rstemp["ods_num"]  ?></b> </th></tr>
                    <tr><th colspan="3"  style="text-align:right">PLACAS:         </th><th colspan="3" style="text-align:left"><b><?php echo $rstemp["ods_plac"] ?></b></th><th colspan="3" style="text-align:right">NOMBRE DEL GUÍA:</th><th colspan="2" style="text-align:left"><b><?php echo $rstemp["ods_guia"] ?></b> </th></tr>
                    <tr><th colspan="3"  style="text-align:right">NO. ECONÓMICO:  </th><th colspan="3" style="text-align:left"><b><?php echo $rstemp["ods_noec"] ?></b></th><th colspan="3" style="text-align:right">IDIOMA:         </th><th colspan="2" style="text-align:left"><b><?php echo $rstemp["ods_idio"] ?></b></th></tr>
                    <tr><th colspan="3"  style="text-align:right">NOMBRE OPERADOR:</th><th colspan="3" style="text-align:left"><b><?php echo $rstemp["ods_oper"] ?></b></th><th colspan="3" style="text-align:right">TELÉFONO:       </th><th colspan="2" style="text-align:left"><b><?php echo $rstemp["ods_phon"] ?></b> </th></tr>
                    <tr><th>&nbsp;</th></tr>
                    <tr><th colspan="13" style="padding:2px; border-bottom:1px solid silver; border-top:1px solid silver "  ><b style="font-size:20px !important;">ORDEN DE SERVICIO MAYAN FANTASY TOURS SA DE CV</b></th></tr>
                    <tr><th>&nbsp;</th></tr>
                </thead>
            <tbody>
                <tr>
                    <th class="enc">FECHA</th>
                    <th class="enc">CUPON</th>
                    <th class="enc">NO. PAX</th>
                    <th class="enc">NOMBRE DEL<br>INVITADO</th>
                    <th class="enc">HOTEL</th>
                    <th class="enc">LUGAR</th>
                    <th class="enc">HORARIO</th>
                    <th class="enc">HABITACIÓN</th>
                    <th class="enc">AGENCIA</th>
                    <th class="enc">IDIOMA</th>
                    <th class="enc">REPRESENTANTE</th>
                    <th class="enc">CONFIRMACIÓN</th>
                    <th class="enc" style="border-right:1px solid black">OBSERVACIONES</th>
                </tr>

                <?php

                    $VAR_TOTAL1 = 0;
                    $VAR_TOTAL2 = 0;
                    $VAR_TOTAL3 = 0;


                    $sql1="select * from _excursiones where ods_id = ".$rstemp["ods_id"]." order by exc_hora ";
                    $rs1 = adoopenrecordset($sql1);
                    while($rstemp1 = mysql_fetch_array($rs1)){

                      $VAR_TOTALG = explode(".",$rstemp1["exc_pax"]);
                      $VAR_TOTAL1 = $VAR_TOTAL1 +  $VAR_TOTALG[0];
                      $VAR_TOTAL2 = $VAR_TOTAL2 +  $VAR_TOTALG[1];
                      $VAR_TOTAL3 = $VAR_TOTAL3 +  $VAR_TOTALG[2];



                 ?>

                      <tr>
                            <td class="data"><?php echo $rstemp1["exc_fech"] ?></td>
                            <td class="data"><?php echo $rstemp1["exc_cupo"] ?></td>
                            <td class="data" align="center"><?php echo $rstemp1["exc_pax"] ?></td>
                            <td class="data"><?php echo $rstemp1["exc_invi"] ?></td>
                            <td class="data"><?php echo $rstemp1["exc_hote"] ?></td>
                            <td class="data"><?php echo $rstemp1["exc_luga"] ?></td>
                            <td class="data"><?php echo $rstemp1["exc_hora"] ?></td>
                            <td class="data"><?php echo $rstemp1["exc_habi"] ?></td>
                            <td class="data"><?php echo $rstemp1["exc_agen"] ?></td>
                            <td class="data"><?php echo $rstemp1["exc_idio"] ?></td>
                            <td class="data"><?php echo $rstemp1["exc_repr"] ?></td>
                            <td class="data"><?php echo $rstemp1["exc_conf"] ?></td>
                            <td class="data" style="border-right:1px solid black; " ><?php echo $rstemp1["exc_obse"] ?></td>

                      </tr>

                <?php
                    }
                ?>
                 <tr><td style="border-top:1px solid black" colspan="13">&nbsp;</td></tr>
                 <tr><td colspan="2" align="center" style="border-left:1px solid black;
                 border-top:1px solid black;

                 ">TOTAL</td>
                 <td style="border-top:1px solid; border-left:1px solid black;border-right:1px solid black; text-align:center">
                        <?php echo $VAR_TOTAL1.".".$VAR_TOTAL2.".".$VAR_TOTAL3 ?>
                 </td>
                 </tr>

                 <tr><td style="border-top:1px solid black" colspan="13">&nbsp;</td></tr>



            </tbody>
            <thead>

                <tr style="height:100px">

                    <td style="text-align:left;border-top:1px solid silver  !important" colspan="9">
                        <br><br>MAYAN FANTASY TOURS SA DE CV
                        <br>CARR. FED MZA 255 OTE 25 LOCAL 17
                        <br>MFT050620NG0
                        <br>CP77712
                        <br>9842062754

                    </td>



                    <td style="text-align:center;border-top:1px solid silver  !important" colspan="7">
                        _______________________________________
                        <br>AUTORIZA
                        <br><b><?php echo $rstemp["ods_auto"] ?></b>
                        <br><b><?php echo $rstemp["ods_pues"] ?></b>
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


