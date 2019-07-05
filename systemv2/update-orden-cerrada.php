<?php

    include "../db_conexion.php";
    
    if(isset($_GET["i"])) {
    	$sql="update  _transfers set  estatus = 'cerrada' where id = ".$_GET["i"];
    	adoexecute($sql);
	}

	if(isset($_GET["date"])) {
		$fecha = $_GET["date"];
    	$sql_fecha="UPDATE _transfers SET estatus = 'cerrada' WHERE estatus = 'terminada' AND DATE1= '{$fecha}'";
    	adoexecute($sql_fecha);
	}



?>