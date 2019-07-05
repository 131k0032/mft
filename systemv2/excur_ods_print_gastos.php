<?php include "../db_conexion.php"   ?>
<?php include "funciones.php"   ?>
<style>

table, th, td {
/*   border: 1px solid black; */

}


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
    <title>GASTOS</title>
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

      <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css">
      <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.2.3/css/buttons.dataTables.min.css">





</head>

        <?php
            $VAR_ID = $_GET["i"];

           $sql="select * from _ods where ods_id = ".$VAR_ID;
           $rs = adoopenrecordset($sql);
           $rstemp = mysql_fetch_array($rs);





             if($rstemp["ods_tour"]=="TULUM REEF ADVENTURE")        {$VAR_IMG = "tulum.jpg";    $VAR_N1 = 6;  $VAR_N2 = 13; $VAR_CAMPOS = "Entrada Ruinas|Comida|Guia + Concierge|Lanchas|Hielo|Estacionamiento|Visores|Aletas|Tubos|Sombrillas|Chalecos|Aguas|Sodas"   ;}
             if($rstemp["ods_tour"]=="CHICHEN SUNRISE")             {$VAR_IMG = "chichen.jpg";  $VAR_N1 = 7;  $VAR_N2 = 9; $VAR_CAMPOS = "Entrada Chichen|Entrada INAH|Cenote|Comida|Parking|Gasolina|Extras|Aguas|Refrescos"       ;}
             if($rstemp["ods_tour"]=="CURATED TULUM EXPLORA TULUM") {$VAR_IMG = "curated.jpg";  $VAR_N1 = 7;  $VAR_N2 = 17; $VAR_CAMPOS = "Entrada Ruinas|Comida|Desplaze|Lanchas|Chicles|Estacionamiento|Extra|Visores|Aletas|Tubos|Gomas|Chalecos|Sombrillas|Toallitas|Sodas|Cervezas|Aguas";        ;}
             if($rstemp["ods_tour"]=="KAAN LUUM EXPERIENCE") {$VAR_IMG = "curated.jpg";  $VAR_N1 = 7;  $VAR_N2 = 17; $VAR_CAMPOS = "Entrada Ruinas|Comida|Desplaze|Lanchas|Chicles|Estacionamiento|Extra|Visores|Aletas|Tubos|Gomas|Chalecos|Sombrillas|Toallitas|Sodas|Cervezas|Aguas";        ;}
             if($rstemp["ods_tour"]=="COBA TULUM SUNSET")           {$VAR_IMG = "coba.jpg";     $VAR_N1 = 8;  $VAR_N2 = 10; $VAR_CAMPOS = "Entrada Coba|Coba Tulum|Comida|Hielo|Estacionamiento|Bicicletas|Guia|Extras|Aguas|Sodas"       ;}
             if($rstemp["ods_tour"]=="PRIVADOS")                    {$VAR_IMG = "privados.jpg"; $VAR_N1 = 0;  $VAR_N2 = 0; $VAR_CAMPOS = ""       ;}



             $VAR_VALS = explode("|",$rstemp["ods_valu"]);
             $VAR_CAMPOS = explode("|",$VAR_CAMPOS);




        ?>
<html>
<body>


<!--
 <button id="btnPrint">Print Preview</button>
 -->


 <div id="masterContent">
                <table style="width:50% !important" id="example" class="" cellspacing="0"    >
                      <thead>
                           <tr><th colspan="6" style="font-size:30px;border-top:1px solid black;border-left:1px solid black;border-right:1px solid black">GASTOS <?php echo $rstemp["ods_tour"] ?></th></tr>
                           <tr>
                              <th colspan="2" rowspan="7" style="border-left:1px solid black; " ><img style="max-height:120px"  src="img/<?php echo $VAR_IMG ?>" alt="" /><br>&nbsp;</th>
                              <th style="border:1px solid black">FECHA</th><th style="border:1px solid black"><b><?php echo $rstemp["ods_fech"] ?></b></th>
                           </tr>
                           <tr><th style="border:1px solid black">IDIOMA</th><th style="border:1px solid black"> <b><?php echo $rstemp["ods_idio"] ?></b></th></tr>
                           <tr><th style="border:1px solid black">GUÍA</th><th style="border:1px solid black"><b><?php echo $rstemp["ods_guia"] ?></b></th></tr>
                           <tr><th style="border:1px solid black" colspan="2" style="border:1px solid black">NOTA DE GASTOS</th></tr>
                           <tr><th style="border:1px solid black" >IMPORTE</th><th style="border:1px solid black"><span id="total" ></span></th></tr>
                            <tr><td style="border:1px solid black" >ORDEN NO</td><td style="border:1px solid black;text-align:center;font-size:20px !important"><b><?php echo $rstemp["ods_num"] ?></b></td></tr>
                            <tr><td style="border:1px solid black" >PAX</td><td style="border:1px solid black;text-align:center"><?php echo pax_por_ods($rstemp["ods_id"])  ?></td></tr>
                      </thead>
                      <tbody>
                        <tr><td colspan="4" style="border-right:1px solid black; border-left:1px solid black; ">&nbsp;</td></tr>
                        <tr><td colspan="2" style=" vertical-align: top; border-bottom:1px solid silver;border-left:1px solid black;      ">
                                <table style="width:100%">
                                    <?php
                                        $VAR_TOTAL = 0;
                                        $ix=0;
                                        while($ix <= ($VAR_N1-1)){
                                    ?>
                                         <tr>
                                            <td style="text-align:left;border-bottom:1px solid silver "><?php echo $VAR_CAMPOS[$ix] ?></td>
                                            <td style="text-align:right;border-bottom:1px solid silver ">

                                                         <?php
                                                           if(is_numeric($VAR_VALS[$ix])){
                                                                    echo "$".number_format( $VAR_VALS[$ix],2);
                                                                    } else {

                                                                       echo ( $VAR_VALS[$ix]);

                                                                    }

                                                         ?></td>
                                         </tr>


                                    <?php
                                        $VAR_TOTAL = $VAR_TOTAL + $VAR_VALS[$ix];

                                       $ix = $ix +1;
                                        }
                                    ?>
                                         <tr>
                                            <td style="text-align:right"><b>TOTAL</b>&nbsp;</td>
                                            <td style="text-align:right"><b>$ <span id="" ><?php

                                                            echo number_format($VAR_TOTAL,2)

                                            ?></span>

                                                        <script>
                                                        document.getElementById("total").innerHTML = "<?php echo number_format($VAR_TOTAL,2) ?>";
                                                        </script>

                                            </b></td>
                                         </tr>
                                    <tr></tr>


                                </table>



                        </td>
                            <td colspan="2" style=" vertical-align: top; border-right:1px solid black">


                                <table style="width:100%">
                                    <?php

                                        while($ix <= ($VAR_N2-1)){
                                    ?>
                                         <tr>
                                            <td style="text-align:left;border-bottom:1px solid silver "><?php echo $VAR_CAMPOS[$ix] ?></td>
                                            <td style="text-align:right;border-bottom:1px solid silver"><?php    echo  $VAR_VALS[$ix]; ?>  </td>
                                         </tr>


                                    <?php
                                       $ix = $ix +1;
                                        }
                                    ?>

                                    <tr></tr>

                                </table>



                            </td>
                        </tr>

                        <tr>
                            <td colspan="4" style="font-size:15px; font-weight: bold  ;text-align:center;border-right:1px solid black; border-bottom:1px solid black; border-left:1px solid black; ">

                                    FAVOR DE TRAER COMPROBANTE DE TODOS LOS GASTOS POR MAS MINIMO QUE ESTE SEA                                          ATTE: ADMISTRACION</td>
                        </tr>
                      </tbody>
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


