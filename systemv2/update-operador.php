<?php

    include "../db_conexion.php";
    $VAR_COMILLAS ="";

//    if($_GET["c"]=="pagado"){$VAR_COMILLAS="'";}

    $sql="update  _transfers set  ".$_GET["c"]." = '".$_GET["val"]."' where id = ".$_GET["i"];
    echo $sql;



/*
    if($_GET["c"]=="noec"){
        $VAR_X = explode("|",$_GET["val"]);
        $sql="update _transfers set noec ='".$VAR_X[0]."', plac = '".$VAR_X[1]."', vehic = '".$VAR_X[2]."' where id =".$_GET["i"];
    }
*/
    

  // echo $sql;


    adoexecute($sql);




?>