<?php

function pax_por_ods($EXCID){

                    $VAR_TOTAL1  = 0;
                    $VAR_TOTAL2  = 0;
                    $VAR_TOTAL3  = 0;

                    $sql1="select * from _excursiones where ods_id = ".$EXCID." order by exc_hora ";
                    $rs1 = adoopenrecordset($sql1);
                    while($rstemp1 = mysql_fetch_array($rs1)){

                      $VAR_TOTALG = explode(".",$rstemp1["exc_pax"]);
                      $VAR_TOTAL1 = $VAR_TOTAL1 +  $VAR_TOTALG[0];
                      $VAR_TOTAL2 = $VAR_TOTAL2 +  $VAR_TOTALG[1];
                      $VAR_TOTAL3 = $VAR_TOTAL3 +  $VAR_TOTALG[2];
                    }

            return $VAR_TOTAL1.".".$VAR_TOTAL2.".".$VAR_TOTAL3;


}

 function servicios_realizados($VEH_ID, $TAR_ID ){
    $sqlt="select count(*) as total from _servicios where veh_id =".$VEH_ID." and tar_id=".$TAR_ID;
    // echo $sqlt;
    $rst = adoopenrecordset($sqlt);
    $rstempt = mysql_fetch_array($rst);
    return $rstempt["total"];

 }


 function kilometraje_tarea($TAR_ID){
        $sqlt="select tar_kilo from _tareas where tar_id =".$TAR_ID." ";
        $rst = adoopenrecordset($sqlt);
        $rstempt = mysql_fetch_array($rst);
        return $rstempt["tar_kilo"];

 }

 function kilometraje_actual($VEH_ID){
        $sqlt="select max(ser_kilo) as total from _servicios where veh_id =".$VEH_ID." ";
//        echo $sqlt;
        $rst = adoopenrecordset($sqlt);
        $rstempt = mysql_fetch_array($rst);
        return $rstempt["total"];

 }


function refacciones_existencias($ID){

      $VAR_SAL = 0;


    $sql = "select sum(alm_cnt) as total from almacen where  alm_tipo='S' and ref_id =".$ID;
        $rst = adoopenrecordset($sql);
        $rstempt = mysql_fetch_array($rst);
        $VAR_SAL = $rstempt["total"];

    $sql = "select sum(alm_cnt) as total from almacen where  alm_tipo='E' and ref_id =".$ID;
        $rst = adoopenrecordset($sql);
        $rstempt = mysql_fetch_array($rst);
        $VAR_SAL = $VAR_SAL + $rstempt["total"];

       return  $VAR_SAL;



}

 function servicios_por_realizar($VEH_ID, $TAR_ID ){
                 $VARX = kilometraje_actual($VEH_ID) / kilometraje_tarea($TAR_ID);
                 $VARX = intval($VARX);
                 $VARX = $VARX - servicios_realizados($VEH_ID, $TAR_ID );
                 return $VARX;

 }

 function vehiculos_ultimo_srv($ID){
                                $sql="select max(ser_fech) as total from _servicios where veh_id =".$ID;
                                $rs = adoopenrecordset($sql);
                                $rstemp = mysql_fetch_array($rs);
                                return  $rstemp["total"];

 }

  function vehiculos_numero_srv($ID){
                                $sql="select count(ser_id) as total from _servicios where veh_id =".$ID;
                                $rs = adoopenrecordset($sql);
                                $rstemp = mysql_fetch_array($rs);
                                return  $rstemp["total"];

 }


?>