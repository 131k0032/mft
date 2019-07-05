<?php
date_default_timezone_set('America/Cancun');

    $VAR_VERSION = "1.0";
    $VAR_CIA = "Mayan Fantasy Tours";
    $VAR_RUTA2 = str_replace(basename($_SERVER["PHP_SELF"]),"",$_SERVER['PHP_SELF']);
// echo "<br>".$VAR_RUTA2;
// echo "<br>".getcwd();

function conectDB(){
if($_SERVER['HTTP_HOST']=="localhost"){
        $SERVER =  "localhost";
        $USER   =  "root";
        $PASS   =  "";
        $DB     =  "mft";
        //  echo "<br>root";
}else{
      $USER   =  "mftcommx_sys";
      $PASS   =  "3.1416";
      $DB     =  "mftcommx_system";
      $SERVER =  "localhost";
      // $SERVER =  "10.33.143.24";
      // echo "<br>externa";


}


    $con=mysql_connect($SERVER, $USER, $PASS)
    or die ("Error al conectarse al servidor mysql");
    mysql_query("SET NAMES 'utf8'");
    mysql_select_db($DB)
    or die ("Error $db");
    return $con;


}


// BASE DE DATOS
function diconectDB($con){     mysql_close($con)        or die ("Error mysql");    return true;}
function adoopenrecordset($sql){            $mCon = conectDB();            $resultado  = mysql_query($sql,$mCon);            mysql_query("SET NAMES 'utf8'");           return $resultado;}
function adoexecute($sql){
                $mCon = conectDB();
                $resultado  = mysql_query($sql,$mCon);
                mysql_query("SET NAMES 'utf8'") or die(mysql_error()); ;

                if (! $resultado ) {       }}


// FUNCIONES
  function montos($VAR_CTA,$VAR_DEL,$VAR_AL,$VAR_AGE,$PAG){
                       $sqlt="select sum(costo) as total from _transfers where num > 0 and date1 >='".$VAR_DEL."'
                        and cta = '".$VAR_CTA."' and  estatus='cerrada' and date1 <='".$VAR_AL."' and pagado = '".$PAG."'";

                        if($VAR_AGE!=""){
                                $sqlt = $sqlt ." and agen ='".$VAR_AGE."'";
                        }

                    //   echo "<br>". $sqlt;


                        $rsa = adoopenrecordset($sqlt);
                        $rstempa = mysql_fetch_array($rsa);
                        return $rstempa["total"] ;
           }

function wp_info($ID,$CAMPO){
    $sqlf = "select * from wpinsec_postmeta where meta_key ='".$CAMPO."' and post_id = ".$ID;
    $rsf = adoopenrecordset($sqlf);
    $rstempf = mysql_fetch_array($rsf);
    return $rstempf["meta_value"];
}

function wp_categoria_id($VARSLUG){
                  $sql="select * from wpinsec_terms where slug='".$VARSLUG."' ";
                  $rs = adoopenrecordset($sql);
                  $rstemp = mysql_fetch_array($rs);
                 return  $rstemp["term_id"];

}

function listado($VAR_CAMPO,$VAR_TEMP){

               $sql1="select * from _hoteles where zona = '".$VAR_CAMPO."'  order by hotel ";
                $rs1 = adoopenrecordset($sql1);
                while($rstemp1 = mysql_fetch_array($rs1)){
                  if($VAR_TEMP == $rstemp1["hotel"]){$VAR_X="selected";}else{$VAR_X="";}
                  echo "<option ".$VAR_X." value='".$rstemp1["hotel"]."'>".$rstemp1["hotel"]."</option>";
                }


           /*    $sql1="select * from wpinsect_posts, wpinsect_term_relationships, wpinsect_terms
                where term_id = term_taxonomy_id and object_id = ID and slug = '".$VAR_CAMPO."'  order by post_title ";
                $rs1 = adoopenrecordset($sql1);
                while($rstemp1 = mysql_fetch_array($rs1)){
                  echo "<option value='".$rstemp1["post_title"]."'>".$rstemp1["post_title"]."</option>";
                }
                */


}


function wp_public_img_id($ID){
                  $sql="select * from wpinsec_postmeta where meta_key ='_thumbnail_id' and post_id=".$ID." ";
                  $rs = adoopenrecordset($sql);
                  $rstemp = mysql_fetch_array($rs);
                  $VAR_X =   $rstemp["meta_value"];
                  $sql="select * from wpinsec_posts where ID =".$VAR_X." ";
                  $rs = adoopenrecordset($sql);
                  $rstemp = mysql_fetch_array($rs);
                  $VAR_X =   $rstemp["ID"];
                 return  $VAR_X;
}


function wp_public_img($ID){
                  $sql="select * from wpinsec_postmeta where meta_key ='_thumbnail_id' and post_id=".$ID." ";
                  $rs = adoopenrecordset($sql);
                  $rstemp = mysql_fetch_array($rs);
                  $VAR_X =   $rstemp["meta_value"];
                  $sql="select * from wpinsec_posts where ID =".$VAR_X." ";
                  $rs = adoopenrecordset($sql);
                  $rstemp = mysql_fetch_array($rs);
                  $VAR_X =   $rstemp["guid"];
                 return  $VAR_X;
}

  //FUNCIONES DE MFT


  function total_de_servicios($AGEN,$DEL,$AL){

            $sqlt="select sum(costo) as total from _transfers where num > 0 and date1 >='".$DEL."'
            and date1 <='".$AL."' and agen='".$AGEN."'";

           $rst = adoopenrecordset($sqlt);
           $rstempt = mysql_fetch_array($rst);
           return $rstempt["total"];



  }


  function total_facturado($AGEN,$DEL,$AL){

            $sqlt="select sum(costo) as total from _transfers where num > 0 and date1 >='".$DEL."'
            and date1 <='".$AL."' and pagado='si' and agen='".$AGEN."'";

           $rst = adoopenrecordset($sqlt);
           $rstempt = mysql_fetch_array($rst);
           return $rstempt["total"];



  }

    function total_por_facturar($AGEN,$DEL,$AL){

            $sqlt="select sum(costo) as total from _transfers where num > 0 and date1 >='".$DEL."'
            and date1 <='".$AL."' and pagado='no' and agen='".$AGEN."'";

           $rst = adoopenrecordset($sqlt);
           $rstempt = mysql_fetch_array($rst);
           return $rstempt["total"];



  }

     function total_pagado($AGEN,$DEL,$AL){

            $sqlt="select sum(costo) as total from _transfers where num > 0 and date1 >='".$DEL."'
            and date1 <='".$AL."' and pag2='si' and agen='".$AGEN."'";

           $rst = adoopenrecordset($sqlt);
           $rstempt = mysql_fetch_array($rst);
           return $rstempt["total"];



  }

  function consecutivo($date){

 // echo $date ."----". date("Y-m-d");


    if($date == date("Y-m-d")){
         return "";


    }else{

        $sql="select * from _transfers where date1 = '".$date."' order by consec desc limit 1";
      // echo $sql;

        $rs = adoopenrecordset($sql);
        $rstemp = mysql_fetch_array($rs);
        return $rstemp["consec"]+1;

  }



  }

function dia_esp($DIA){
        if($DIA=="Mon"){return "Lunes";}
        if($DIA=="Tue"){return "Martes";}
        if($DIA=="Wed"){return "Miercoles";}
        if($DIA=="Thu"){return "Jueves";}
        if($DIA=="Fri"){return "Viernes";}
        if($DIA=="Sat"){return "Sábado";}
        if($DIA=="Sun"){return "Domingo";}

}

function mescorto($MES){
    if($MES==1){return "Ene";}
    if($MES==2){return "Feb";}
    if($MES==3){return "Mzo";}
    if($MES==4){return "Abr";}
    if($MES==5){return "May";}
    if($MES==6){return "Jun";}
    if($MES==7){return "Jul";}
    if($MES==8){return "Ago";}
    if($MES==9){return "Sep";}
    if($MES==10){return "Oct";}
    if($MES==11){return "Nov";}
    if($MES==12){return "Dic";}

}



function mft_monto($FOR, $DATE){  // suma el monto de ordenes por fecha de operacion
      $sqlf="select sum(monto) as total from _transfers where date1 like '%".$DATE."%'";
      $rsf = adoopenrecordset($sqlf);
      $rstempf = mysql_fetch_array($rsf);
      return $rstempf["total"];
}


function pax_por_ods2($ODSID){
    $VAR_PAX = 0;
    $VAR_TT = 0;
    $sqltt="select * from _excursiones where ods_id = ".$ODSID;
   // echo $sqltt;

    $rstt = adoopenrecordset($sqltt);
    while($rstemptt = mysql_fetch_array($rstt)){
            $VAR_X1 = explode(".",$rstemptt["exc_pax"]);
            $VAR_TT = $VAR_TT + $VAR_X1[0]+$VAR_X1[1]+$VAR_X1[2];



    }

    return $VAR_TT;

}



function mft_combo_tours($VAL){
     if($VAL == 'coba tulum sunset'){$VAR_X1 = "selected";}else{$VAR_X1 = "";}
     echo "<option value='coba tulum sunset'         ".$VAR_X1."   >COBA TULUM SUNSET </option>";
     if($VAL == 'chichen sunrise'){$VAR_X1 = "selected";}else{$VAR_X1 = "";}
     echo "<option value='chichen sunrise'           ".$VAR_X1."   >CHICHEN SUNRISE </option> ";
     if($VAL == 'tulum reef'){$VAR_X1 = "selected";}else{$VAR_X1 = "";}
     echo "<option value='tulum reef'      ".$VAR_X1."   >TULUM REEF </option> "  ;
     if($VAL == 'chichen private'){$VAR_X1 = "selected";}else{$VAR_X1 = "";}
     echo "<option value='chichen private'           ".$VAR_X1."   >CHICHEN PRIVATE</option>";
     if($VAL == 'tulum private'){$VAR_X1 = "selected";}else{$VAR_X1 = "";}
     echo "<option value='tulum private'             ".$VAR_X1."   >TULUM PRIVATE</option>"  ;
     if($VAL == 'akumal private'){$VAR_X1 = "selected";}else{$VAR_X1 = "";}
     echo "<option value='akumal private'            ".$VAR_X1."   >AKUMAL PRIVATE</option>" ;
     if($VAL == 'cancun private'){$VAR_X1 = "selected";}else{$VAR_X1 = "";}
     echo "<option value='cancun private'            ".$VAR_X1."   >CANCUN PRIVATE</option>" ;
     if($VAL == 'playa del carmen private'){$VAR_X1 = "selected";}else{$VAR_X1 = "";}
     echo "<option value='playa del carmen private'  ".$VAR_X1."   >PLAYA DEL CARMEN PRIVATE</option>" ;
     if($VAL == 'ek balam private'){$VAR_X1 = "selected";}else{$VAR_X1 = "";}
     echo "<option value='ek balam private'          ".$VAR_X1."   >EK BALAM PRIVATE</option>"  ;
     if($VAL == 'muyil private'){$VAR_X1 = "selected";}else{$VAR_X1 = "";}
     echo " <option value='muyil private'            ".$VAR_X1."   >MUYIL PRIVATE</option>" ;
     if($VAL == 'xcaret-xplor'){$VAR_X1 = "selected";}else{$VAR_X1 = "";}
     echo "<option value='xcaret-xplor'              ".$VAR_X1."   >XCARET - XPLOR (TRANSPORTATION)</option>";
     if($VAL == 'xelha'){$VAR_X1 = "selected";}else{$VAR_X1 = "";}
     echo "<option value='xelha'                     ".$VAR_X1."   >XEL-HA (TRANSPORTATION)</option> ";
     if($VAL == 'chiquila'){$VAR_X1 = "selected";}else{$VAR_X1 = "";}
     echo "<option value='chiquila'                  ".$VAR_X1."   >CHIQUILA (TRANSPORTATION) </option>";
}

function mft_noleidos(){   // cuenta ordenes sin ser leidas ¿?
      $sqlf = "select count(*) as total  from _transfers where leido = 'no' ";
    $rsf = adoopenrecordset($sqlf);
    $rstempf = mysql_fetch_array($rsf);
       return $rstempf["total"];
}


function mft_sin_pago($FOR,$DATE) { // cuenta ordenes sin pago por fecha de registro
    $sqlf="select sum(monto)
    as total from _transfers where  date1 like '%".$DATE."%' and paga = 'no'";
    $rsf = adoopenrecordset($sqlf);
    $rstempf = mysql_fetch_array($rsf);
       return $rstempf["total"];
}


function mft_payment_method($VAL){
        if($VAL == 'Bank Transfer'){$VAR_X1 = "selected";}else{$VAR_X1 = "";}
        echo"<option value='Bank Transfer'  ".$VAR_X1." >Bank Transfer</option>";

        if($VAL == 'Cash'){$VAR_X1 = "selected";}else{$VAR_X1 = "";}
        echo"<option value='Cash'           ".$VAR_X1." >Cash</option>";

        if($VAL == 'Paypal / CC'){$VAR_X1 = "selected";}else{$VAR_X1 = "";}
        echo"<option value='Paypal / CC'    ".$VAR_X1." >Paypal / CC</option>";
}

function mft_vehiculos($VAR){




   if($VAR=="tour"){
         if($VAR == 'hiace'){$VAR_X1 = "selected";}else{$VAR_X1 = "";}
         echo"<option ".$VAR_X1." value='hiace' >HIACE (max 14 PAX)</option>";
   } else {

         if($VAR == 'hiace'){$VAR_X1 = "selected";}else{$VAR_X1 = "";}
         echo"<option ".$VAR_X1." value='hiace' >HIACE </option>";
         if($VAR == 'suburban'){$VAR_X1 = "selected";}else{$VAR_X1 = "";}
         echo"<option ".$VAR_X1." value='suburban' >SUBURBAN </option>";
         if($VAR == 'sprinter'){$VAR_X1 = "selected";}else{$VAR_X1 = "";}
         echo"<option ".$VAR_X1." value='sprinter' >SPRINTER </option>";
         if($VAR == 'mercedes'){$VAR_X1 = "selected";}else{$VAR_X1 = "";}
         echo"<option ".$VAR_X1." value='mercedes' >MERCEDES BENZ</option>";

   }



}


function mft_sin_operador($FOR,$DATE){  // cuenta ordenes sin operador por fecha de operador
    $sqlf="select count(*)
     as total from _transfers where  date1 like'%".$DATE."%' and (oper is null or oper='') ";
    $rsf = adoopenrecordset($sqlf);
    $rstempf = mysql_fetch_array($rsf);
       return $rstempf["total"];
}

function mft_mensajes($FOR,$DATE,$EST){  // cuenta cantidad de mensajes por fecha y estatus
    $sqlf="select count(*)
   as total from _mensajes where  FROM_UNIXTIME(fecha, '".$FOR."') = '".$DATE."' and leido ='".$EST."'";
    $rsf = adoopenrecordset($sqlf);
    $rstempf = mysql_fetch_array($rsf);
       return $rstempf["total"];

}





function mft_num_ord($DATE,$ESTATUS='',$TIPO=''){   // numero de ordenes por año, mes o dia totales
  $sqlf="select count(*) as total from _transfers where (date1 like '%".$DATE."%') ";
  if($ESTATUS != ''){ $sqlf = $sqlf . " and estatus = '".$ESTATUS."'";  }
  if($TIPO != ''){ $sqlf = $sqlf . " and tipo = '".$TIPO."'";  }

 // echo $sqlf;


  $rsf = adoopenrecordset($sqlf);
  $rstempf = mysql_fetch_array($rsf);
  return $rstempf["total"];
}




function mft_num_ord_activas($DATE){   // cuenta numero de ordenes activas por mes, dia o año
  $sqlf="select count(*) as total from _transfers where estatus='abierta' and date1 like '%".$DATE."%' ";
   $rsf = adoopenrecordset($sqlf);
    $rstempf = mysql_fetch_array($rsf);
       return $rstempf["total"];
}


function mft_num_ord_canceladas($DATE){   // cuenta numero de ordenes canceladas por mes, dia o año
 $sqlf="select count(*) as total from _transfers where estatus='cancelado' and date1 like '%".$DATE."%' ";
    $rsf = adoopenrecordset($sqlf);
    $rstempf = mysql_fetch_array($rsf);
       return $rstempf["total"];
}

function mft_num_ord_terminadas($DATE){    // cuenta numero de ordenes terminadas por mes, dia o año
    $sqlf="select count(*) as total from _transfers where estatus='cerrada' and date1 like '%".$DATE."%' ";
    $rsf = adoopenrecordset($sqlf);
    $rstempf = mysql_fetch_array($rsf);
       return $rstempf["total"];

}


function mft_zona($HOTEL){  // obtiene zona en base a nombre de hotel
    $sqlf="select * from _hoteles where hotel = '".$HOTEL."'";
    $rsf = adoopenrecordset($sqlf);
    $rstempf = mysql_fetch_array($rsf);
    return $rstempf["zona"];


}

function mft_hoteles(){  // obtiene los hoteles y hace encoding en json
    $sqlf="select hotel from _hoteles ORDER BY hotel ASC";
    $rsf = adoopenrecordset($sqlf);
    while($rstempf = mysql_fetch_array($rsf)){            
             $result_array[] = $rstempf["hotel"];
           }
    
    $json_array = json_encode($result_array);
    

    return $json_array; 

}




function login(){
    if(isset($_COOKIE["usu_id"])){
            //  YA ESTÁ LOGEADO PASA SIN PROBLEMA

    }else{
        if(isset($_POST["txtmail"]) and isset($_POST["txtpass"])  ){




           // HAY VALORES DE INDEX.PHP
                  $sql="select * from usuarios where usu_mail = '".$_POST["txtmail"]."' and usu_pass = '".$_POST["txtpass"]."'";




                  $rs = adoopenrecordset($sql);
                  $rstemp = mysql_fetch_array($rs);

          ?>
            <script>

             //    alert('<?php echo  addslashes($sql) ?>');
            </script> <?php

                  if($rstemp["usu_id"]>0){
                 ?>
                    <script>
                 //   alert('1...');
                      //  alert ('ok');
                       $.cookie('usu_id',       <?php echo $rstemp["usu_id"]        ?>  , { expires:1, path: '/' });
                       $.cookie('usu_nombr',   '<?php echo $rstemp["usu_nombr"]     ?>' , { expires:1, path: '/' });
                       $.cookie('usu_mail',    '<?php echo $rstemp["usu_mail"]      ?>' , { expires:1, path: '/' });
                       $.cookie('usu_per',     '<?php echo $rstemp["usu_per"]      ?>' , { expires:1, path: '/' });




                    </script>

                 <?php



 //              $VAR_PER = $_COOKIE["usu_per"];
 //               echo "<br><br><br><br>".$VAR_ER;
  //            $VAR_PER = explode("|",$VAR_PER);
  //              echo "<br><br><br><br>--------------------------------------------------------------------------------->".$VAR_PER[0];


                  }else{
                 ?>
                    <script>
                //    alert('<?php echo "0" ?>+2...');
                    $.removeCookie('usu_id', { path: '/' });
                    $.removeCookie('usu_nombr', { path: '/' });
                    $.removeCookie('usu_mail', { path: '/' });
                    $.removeCookie('usu_per', { path: '/' });
                    window.location.href='index.php?v=s';
                    </script>
                 <?php
                  }



        }else{
            // NO VIENE DE INDEX NO HAY COOKIE
                 ?>
                    <script>
                        window.location.href='index.php?v=n';
                    </script>
                 <?php
        }

    }

}






?>
     <script src="vendor/jquery/jquery.min.js"></script>
     <script src="js/jquery.cookie.js"></script>

<script>

function number_format(amount, decimals) {

    amount += ''; // por si pasan un numero en vez de un string
    amount = parseFloat(amount.replace(/[^0-9\.]/g, '')); // elimino cualquier cosa que no sea numero o punto

    decimals = decimals || 0; // por si la variable no fue fue pasada

    // si no es un numero o es igual a cero retorno el mismo cero
    if (isNaN(amount) || amount === 0)
        return parseFloat(0).toFixed(decimals);

    // si es mayor o menor que cero retorno el valor formateado como numero
    amount = '' + amount.toFixed(decimals);

    var amount_parts = amount.split('.'),
        regexp = /(\d+)(\d{3})/;

    while (regexp.test(amount_parts[0]))
        amount_parts[0] = amount_parts[0].replace(regexp, '$1' + ',' + '$2');

    return amount_parts.join('.');
}

</script>