<?php 

include 'ajax_db.php';

//$ID = $_GET['id'];
$OPERADOR = $_POST['oper'];
$NOEC = $_POST['noec'];
$AGENCIAS = $_POST['agen'];
$FECHA = $_POST['fecha'];


if (isset($AGENCIAS)  and $NOEC != 'null') {
	// TRATAMIENTO DE DATOS AGENCIAS
	$AGENCIAS = sprintf("'%s'", implode("','", $AGENCIAS ),"'%s'");
	$AGENCIAS = preg_replace("/,/","','",$AGENCIAS);
	$AGENCIAS = str_replace(" '", "'", $AGENCIAS);
	$AGENCIAS = str_replace("' ", "'", $AGENCIAS);


	$sql="UPDATE _transfers SET noec='{$NOEC}' WHERE date1='{$FECHA}' AND oper = '{$OPERADOR}' AND agen in ({$AGENCIAS});";
	try {
		$empRecords = mysqli_query($con, $sql);

		echo "true";

	} catch (Exception $e) {
		echo "error" . $e;
	}

}

//print_r($sql);

 ?>

