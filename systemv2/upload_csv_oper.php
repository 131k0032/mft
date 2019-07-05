<?php

include "../db_conexion.php";


	if($_FILES['csv']['error'] == 0){
	    $name = $_FILES['csv']['name'];
	    $ext = strtolower(end(explode('.', $_FILES['csv']['name'])));
	    $type = $_FILES['csv']['type'];
	    $tmpName = $_FILES['csv']['tmp_name'];

	    // check the file is a csv
	    if($ext === 'csv'){
	    	$csv = array();
	        if(($handle = fopen($tmpName, 'r')) !== FALSE) {
	            // necessary if a large csv file
	            set_time_limit(0);

	            $rows; 


	            while(($data = fgetcsv($handle, 1000, ',')) !== FALSE) {
	                 
	            	$rows[] = $data;
	            	//print_r($rows);

	            }
	            fclose($handle);
	        }

	        if (count($rows) == 0) {
	        	echo '<script type="text/javascript">alert("El archivo esta vacio");</script>';
	        }
	        else {
	        	 foreach ($rows as $key => $rowis) {
	        	 	
	        	 	if (empty($rowis[3])) {
	        	 		//echo "vacio";
	        	 		//echo "<br>";
	        	 	}
	        	 	elseif (empty(trim($rowis[4])) or $rowis[4] =="''" ) {
	        	 		//echo "vacio";
	        	 		//echo "<br>";
	        	 	}
	        	 	else {
					        	 		
	        	 	$sql = "UPDATE _transfers SET oper = {$rowis[2]}, plac ={$rowis[1]}, noec = {$rowis[0]} WHERE id = {$rowis[3]} AND date1 = {$rowis[4]} ; ";
	        	 	//print_r($sql);
	        	 	//echo "<br>";
	        	 	adoexecute($sql);
	        	 	}

	        	 }

	        }
	    }
	    else {
	    	//echo "Verifica el archivo, tiene que tener una extensión csv";
	    	echo '<script type="text/javascript">alert("Verifica el archivo, tiene que tener una extensión csv");</script>';
	    }

	}
	else {
		//echo "El archivo esta vacio";
		echo '<script type="text/javascript">alert("El archivo esta vacio");</script>';
	}

	echo "<script type='text/javascript'>window.location.href = 'asignar-operador.php';</script>";

 ?>