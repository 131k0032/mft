<?php

    include "../db_conexion.php";
    $sql="delete from _transfers  where id = ".$_GET["i"];
    echo $sql;
    adoexecute($sql);


?>