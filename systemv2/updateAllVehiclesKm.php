<?php 
include 'ajax_db.php';

if (isset($_POST['bla'])) {

	$exito = $_POST['bla'];
	$date = $_POST['date'];

	$array_data = json_decode($exito,true); // CONVERT JSON STRING TO ARRAY IN PHP

	foreach ($array_data as $key => $value) {
		
		$noec = $value['veh_noec'];
		$ki = $value['ki'];
		$kf = $value['kf'];
		$kr = $value['k_rec'];
		if (empty($kr) || $kr < 0) {
 			$kr = 0;
 		}
		$g_gas = $value['gasolina'];
		$litros = $value['litros'];
		$exceso = $value['exceso'];
		if (empty($value['exceso'])){
 			$exceso = 0;
 		}
		$estimado = $value['estimado'];
		if (empty($value['estimado'])) {
 			$estimado = 0;
 		}



		$sql = "UPDATE _transfers AS tr  SET tr.ki = {$ki} ,tr.kf = {$kf}, tr.kr = {$kr}, tr.gasolina = {$g_gas}, tr.litros = {$litros}, tr.ahorro_exceso = {$exceso}, tr.estimado = {$estimado} WHERE tr.DATE1 = '{$date}' AND tr.noec = '{$noec}' 
 	 		AND tr.time1 = (SELECT tiempo FROM (SELECT MAX(TIME1) AS tiempo FROM _transfers AS t2 WHERE DATE1 = '{$date}' 
 	 		AND noec ='{$noec}') AS t2 )";

 	 	$empRecords = mysqli_query($con, $sql);

	}
	
}

echo "true";

 ?>