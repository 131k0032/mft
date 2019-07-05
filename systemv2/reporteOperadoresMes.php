<?php 
include 'ajax_db.php';

$inicioFecha = $_POST['inicioFecha'];
$finFecha = $_POST['finFecha'];
$id = $_POST['id'];


switch ($id) { 
	case 1:

		$sql = "SELECT oper,agen,COUNT(oper) as conteo,date1 
		FROM _transfers 
		WHERE DATE1 
		BETWEEN '{$inicioFecha}' AND '{$finFecha}' 
		GROUP BY oper,agen,date1
		ORDER BY oper,date1 ";

		$empRecords = mysqli_query($con, $sql) or die("database error:". mysqli_error($con));
		$records = array();
		$headers =  ["Operador", "Agencia", "Numero de viajes", "Fecha"];
		array_push($records, $headers);
			while( $rows = mysqli_fetch_assoc($empRecords) ) {
				$records[] = $rows;		
			}


			echo json_encode($records);
			//echo json_encode($id);

	break;

	case 2:

	$sql2 = "SELECT tr1.oper,tr1.orig1,tr1.origCalculo,tr1.dest1,tr1.destCalculo,tr1.DATE1,tr1.TIME1,tr1.origHotel,tr1.origZona,tr1.DestHotel,tr1.destZona,
tr1.tarifaZona,tr2.sueldoDiario,tr2.calculoTotalTarifa,tr2.sueldoDia

FROM (
SELECT tr.oper,tr.orig1,tr.origCalculo,tr.dest1,tr.destCalculo,tr.date1,tr.time1,hOrig.origHotel,hOrig.origZona
,hDest.DestHotel,hDest.destZona,zt.tarifaZona
FROM 
(
	SELECT tr.oper,
	tr.orig1,
	if(tr.orig1 LIKE '%/%',SUBSTRING_INDEX(tr.orig1,'/',1),tr.orig1) AS origCalculo,
	tr.dest1,
	if(tr.dest1 LIKE '%/%',SUBSTRING_INDEX(tr.dest1,'/',-1),tr.dest1) AS destCalculo,
	tr.date1,tr.time1 
			FROM _transfers as tr
			WHERE tr.DATE1 
			BETWEEN '{$inicioFecha}' AND '{$finFecha}'
			ORDER BY oper,date1,time1
) AS tr
LEFT JOIN (
	SELECT nombreHotel AS origHotel,idZona AS origZona 
		FROM _hotel 
) AS hOrig
ON hOrig.origHotel = tr.origCalculo
LEFT JOIN (
	SELECT nombreHotel AS DestHotel,idZona AS destZona 
		FROM _hotel 
) AS hDest
ON hDest.DestHotel = tr.DestCalculo
LEFT JOIN (
	SELECT idZonaOrigen,idZonaDest,tarifaZona
		FROM zonaTarifa
)
AS zt
ON zt.idZonaOrigen = hOrig.origZona
AND zt.idZonaDest = hDest.destZona
) AS tr1
LEFT JOIN (
SELECT oper,SUM(tarifaZona) AS calculoTotalTarifa,DATE1,102 AS sueldoDiario, SUM(tarifaZona) + 102 AS sueldoDia 
FROM 
(
	SELECT tr.oper,
	tr.orig1,
	if(tr.orig1 LIKE '%/%',SUBSTRING_INDEX(tr.orig1,'/',1),tr.orig1) AS origCalculo,
	tr.dest1,
	if(tr.dest1 LIKE '%/%',SUBSTRING_INDEX(tr.dest1,'/',-1),tr.dest1) AS destCalculo,
	tr.date1,tr.time1 
			FROM _transfers as tr
			WHERE tr.DATE1 
			BETWEEN '{$inicioFecha}' AND '{$finFecha}'
			ORDER BY oper,date1,time1
) AS tr
LEFT JOIN (
	SELECT nombreHotel AS origHotel,idZona AS origZona 
		FROM _hotel 
) AS hOrig
ON hOrig.origHotel = tr.origCalculo
LEFT JOIN (
	SELECT nombreHotel AS DestHotel,idZona AS destZona 
		FROM _hotel 
) AS hDest
ON hDest.DestHotel = tr.DestCalculo
LEFT JOIN (
	SELECT idZonaOrigen,idZonaDest,tarifaZona
		FROM zonaTarifa
)
AS zt
ON zt.idZonaOrigen = hOrig.origZona
AND zt.idZonaDest = hDest.destZona
GROUP BY YEAR(DATE1),MONTH(DATE1),DAY(DATE1),oper
) AS tr2 ON tr2.oper = tr1.oper
AND tr2.DATE1 = tr1.DATE1
ORDER BY tr1.oper
";
		
		$empRecords2 = mysqli_query($con, $sql2) or die("database error:". mysqli_error($con));
		$records2 = array();
		$headers2 =  ["Operador","Origen","Origen Calculo","Destino","Destino Calculo","Fecha","Tiempo","Origen hotel","Origen Zona", "Destino Hotel","Destino Zona","Tarifa Zona","Sueldo diario","Calculo Tarifa por día","Sueldo día"];
		array_push($records2, $headers2);
			while( $rows2 = mysqli_fetch_assoc($empRecords2) ) {
				$records2[] = $rows2;		
			}

		$cleanstr = json_encode($records2);

					$match = str_replace('\u00d1','N',$cleanstr);
					$match = str_replace('\u00b0','',$cleanstr);

		echo $match;

	break;
}
?>




