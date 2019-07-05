<?php

    include "../db_conexion.php";
    $sql="update  _transfers set  estatus = 'completada' where id = ".$_GET["i"];
    echo $sql;
    adoexecute($sql);


?>