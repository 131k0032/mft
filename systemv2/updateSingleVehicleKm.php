<?php 

include 'ajax_db.php';



if (isset($_POST['activeRow'])) {

	$date = $_POST['date'];  // FECHA
	//$g_gas = $_POST['g_gas']; // GASTO GASOLINA
	$litros = $_POST['litros']; // LITROS
	$kf = $_POST['kf']; // KILOMETROS FINAlES
	// $act_veh = $_POST['activo']; // CHECKBOX ACTIVO
	$exceso = $_POST['exceso']; // EXCESO

	if (empty($_POST['exceso'])) {
 		$exceso = 0;
 	}
	$estimado = $_POST['estimado']; // Estimado

	if (empty($_POST['estimado'])) {
 		$estimado = 0;
 	}

 	$array_data = json_decode($_POST['activeRow'],true); // CONVERT JSON STRING TO ARRAY IN PHP
 	$ki = $array_data['ki'];
 	$kr = $array_data['k_rec'];
 	if (empty($kr) || $kr < 0) {
 		$kr = 0;
 	}
 	$noec = $array_data['veh_noec'];
 	$g_gas = $array_data['gasolina'];

 	

 $sql = "UPDATE _transfers AS tr SET tr.ki = {$ki}, tr.kf = {$kf}, tr.kr = {$kr}, tr.gasolina = {$g_gas}, tr.litros = {$litros}, tr.ahorro_exceso = {$exceso}, tr.estimado = {$estimado} WHERE tr.DATE1 = '{$date}' AND tr.noec = '{$noec}' 
 AND tr.time1 = (SELECT tiempo FROM (SELECT MAX(TIME1) AS tiempo FROM _transfers AS t2 WHERE DATE1 = '{$date}' AND noec = '{$noec}') AS t2 )";




//echo $sql2;


$empRecords = mysqli_query($con, $sql);



//mysqli_close($con);

// unset($date);
// unset($array_data);
// unset($empRecords);

//echo json_encode($sql);
echo "true";

 }

 ?>