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
$tipo_veh = $_POST['tipoveh'];
$date = $_POST['date'];

## Search 
$searchQuery = " ";
// if($searchByName != ''){
//     $searchQuery .= " and (emp_name like '%".$searchByName."%' ) ";
// }
if($tipo_veh != ''){
    $searchQuery .= " AND veh.tipo_veh = '{$tipo_veh}' ";
}

if(isset($_POST['date']) !== ' '  ){
    $searchQuery .= " AND tr.date1 = '{$date}' ";
}

if(is_null($date) ){
    $searchQuery .= " AND tr.date1 = curdate() ";
}






// if($searchValue != ''){
// 	$searchQuery .= " and (emp_name like '%".$searchValue."%' or 
//         email like '%".$searchValue."%' or 
//         city like'%".$searchValue."%' ) ";
// }

## Total number of records without filtering
$sel = mysqli_query($con,"select COUNT(noec) as allcount from _transfers as tr 
        inner join _vehiculos as veh 
        on tr.noec = veh.veh_noec
    where date1 = '{$date}' ");
$records = mysqli_fetch_assoc($sel);
$totalRecords = $records['allcount'];

## Total number of records with filtering
// $sel = mysqli_query($con,"select count(*) as allcount FROM _vehiculos AS veh
//     LEFT JOIN _transfers tr 
//     ON veh.veh_noec = tr.noec 
//     WHERE 1 {$searchQuery} 
//      GROUP BY veh.veh_noec");
$sel = mysqli_query($con,"SELECT count(distinct(noec)) as allcount from _transfers as tr 
        inner join _vehiculos as veh 
        on tr.noec = veh.veh_noec
    where date1 = '{$date}'");
$records = mysqli_fetch_assoc($sel);
$totalRecordwithFilter = $records['allcount'];

## Fetch records
$empQuery = "SELECT veh.veh_noec ,count(veh.veh_noec) as conteo ,veh.veh_plac,veh.tipo_veh,veh.veh_comb,veh.veh_nomb, yesterday.kf as ki ,sum(tr.kf) as kf , sum(tr.kr) as k_rec ,tr.cupo , sum(tr.gasolina) as gasolina , sum(tr.litros) as litros,sum(tr.ahorro_exceso) as exceso, sum(tr.estimado) as estimado, veh.veh_estatus as activo, tr.oper as oper, yesterday.date_yest
    FROM _vehiculos AS veh
    LEFT JOIN _transfers tr 
    ON veh.veh_noec = tr.noec
     LEFT JOIN (
     SELECT max(kf) AS kf,noec,max(DATE1) AS date_yest
     FROM _transfers
     WHERE DATE1 < '{$date}'
     GROUP BY NOEC
     ) AS yesterday
     ON yesterday.noec = veh.veh_noec 
    WHERE 1 {$searchQuery}
    #and veh.veh_estatus = 1
    GROUP BY veh.veh_noec ";
#order by {$columnName} {$columnSortOrder} limit {$row} , {$rowperpage}";



$empRecords = mysqli_query($con, $empQuery);
$data = array();

while ($row = mysqli_fetch_assoc($empRecords)) {
    $data[] = array(
    		"veh_nomb"=>$row['veh_nomb']
    		,"veh_noec"=>$row['veh_noec']
            ,"conteo"=>$row['conteo']
    		,"veh_plac"=>$row['veh_plac']
    		,"tipo_veh"=>$row['tipo_veh']    		
            ,"ki"=>$row['ki']
            ,"kf"=>$row['kf']
            ,"k_rec"=>$row['k_rec']
            ,"cupo"=>$row['cupo']
            ,"veh_comb"=>$row['veh_comb']
            ,"gasolina"=>$row['gasolina']
            ,"litros"=>$row['litros']
            ,"exceso" =>$row['exceso']
            ,"estimado"=>$row['estimado']
            ,"date_yest"=>$row['date_yest']
            ,"oper"=>$row['oper']
            // ,"y_date1"=>$row['y_date1']
            // ,"activo"=>$row['activo']


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
