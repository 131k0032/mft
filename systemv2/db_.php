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








?>
