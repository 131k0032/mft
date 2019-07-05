<?php
include 'ajax_db.php';

## Read value
$draw = $_POST['draw'];
$row = $_POST['start'];
$rowperpage = $_POST['length']; // Rows display per page
$columnIndex = $_POST['order'][0]['column']; // Column index
$columnName = $_POST['columns'][$columnIndex]['data']; // Column name
$columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
$searchValue = $_POST['search']['value']; // Search value

## Custom Field value
#$searchByName = $_POST['searchByName'];
#$tipo_veh = $_POST['tipoveh'];
$date = $_POST['date'];

## Search 
$searchQuery = " ";
// if($searchByName != ''){
//     $searchQuery .= " and (emp_name like '%".$searchByName."%' ) ";
// }
//////////
// if($tipo_veh != ''){
//   $searchQuery .= " AND veh.tipo_veh = '{$tipo_veh}' ";
// }

// if(isset($_POST['date']) !== ' '  ){
//     $searchQuery .= " AND tr.date1 = '{$date}' ";
// }

// if(is_null($date) ){
//     $searchQuery .= " AND tr.date1 = curdate() ";
// }



## Total number of records without filtering
$sel = mysqli_query($con,"select COUNT(*) as allcount from _checklist_operador ");
$records = mysqli_fetch_assoc($sel);
$totalRecords = $records['allcount'];

## Total number of records with filtering
// $sel = mysqli_query($con,"select count(*) as allcount FROM _vehiculos AS veh
//     LEFT JOIN _transfers tr 
//     ON veh.veh_noec = tr.noec 
//     WHERE 1 {$searchQuery} 
//      GROUP BY veh.veh_noec");
$sel = mysqli_query($con,"select COUNT(*) as allcount from _checklist_operador");
$records = mysqli_fetch_assoc($sel);
$totalRecordwithFilter = $records['allcount'];

## Fetch records
$empQuery = "SELECT op.ope_id,op.ope_id as ope_id1,op.ope_nomb,tr.date1,tr.noec,op.vencimiento_tia,op.vencimiento_licencia,op.vencimiento_examen_medico,tm_ot.thomas_ontour
,agen_tot.come2,pax.pax, agen_tot.agen_tot
FROM _operadores AS op 
LEFT JOIN (
    SELECT oper,agen,date1,noec
    FROM _transfers 
    WHERE date1 = '{$date}' 
) As tr
ON op.ope_nomb = tr.oper
LEFT JOIN (
    SELECT * FROM ( 
    SELECT oper,agen,date1,noec,
    if(agen= 'ON TOUR' OR agen = 'THOMAS MOORE','si','no' ) AS thomas_ontour
    FROM _transfers 
    WHERE date1 = '{$date}'
) AS tm_ot
    WHERE thomas_ontour = 'si'
    GROUP BY noec
) AS tm_ot
ON tr.noec = tm_ot.noec
AND op.ope_nomb = tm_ot.oper
LEFT JOIN (
    SELECT  (sum(adul)+sum(chil)+sum(enfa)) AS pax,noec 
    FROM _transfers WHERE date1 = '{$date}'
    GROUP BY noec
) AS pax
ON pax.noec = tr.noec
LEFT JOIN (
    SELECT group_concat(DISTINCT(agen) SEPARATOR ' | ') as agen_tot,oper,noec, group_concat(DISTINCT(COME) SEPARATOR ' | ') AS come,
    CASE 
        WHEN COME REGEXP 'AMENIDADES' THEN 'AMENIDADES' 
        WHEN COME REGEXP 'BOOSTER' THEN 'BOOSTER'
        WHEN COME REGEXP 'CAR SEAT' THEN 'CAR SEAT'
        WHEN COME REGEXP 'PALETA' THEN 'PALETA'
        ELSE null
    END AS come2 
    FROM _transfers
    WHERE date1 = '{$date}' 
    GROUP BY noec,oper 
) AS agen_tot
ON agen_tot.noec = tr.noec
AND agen_tot.oper = op.ope_nomb
WHERE tr.date1='{$date}'
and tr.noec <>''
GROUP BY op.ope_nomb,tr.noec";
#order by {$columnName} {$columnSortOrder} limit {$row} , {$rowperpage}";



$empRecords = mysqli_query($con, $empQuery);
$data = array();

while ($row = mysqli_fetch_assoc($empRecords)) {
    $data[] = array(
    		"ope_nomb"=>$row['ope_nomb']
    		,"date1"=>$row['date1']
            ,"noec"=>$row['noec']
    		,"vencimiento_tia"=>$row['vencimiento_tia']
    		,"vencimiento_licencia"=>$row['vencimiento_licencia']    		
            ,"vencimiento_examen_medico"=>$row['vencimiento_examen_medico']
            ,"thomas_ontour"=>$row['thomas_ontour']
            ,"come2"=>$row['come2']
            ,"pax"=>$row['pax']
            ,"ope_id"=>$row['ope_id']
            ,"ope_id1"=>$row['ope_id1']
            ,"agen_tot"=>$row['agen_tot']


    	);
}

## Response
$response = array(
    "draw" => intval($draw),
    "iTotalRecords" => $totalRecords,
    "iTotalDisplayRecords" => $totalRecordwithFilter,
    "aaData" => $data
);

echo json_encode($response);
