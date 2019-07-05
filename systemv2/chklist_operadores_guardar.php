<?php
include "../db_conexion.php"; 
	//OPERADOR
		$HORARIO = $_POST['horario'];
		$FECHA = $_POST['fecha'];
		$OPERADOR = $_POST['operador'];
		$PUNTUALIDAD = $_POST['puntualidad'];
		$ACTITUD = $_POST['actitud'];
		$PROB_ACTITUD = NULL;
		if ($ACTITUD == 'mala') {
			$PROB_ACTITUD = $_POST['prob_actitud'];
		}
	//LIMPIEZA
		$ALCOHOL = $_POST['alc'];
		$UNIFORME = $_POST['uniforme'];
		$MANOS_LIBRES = $_POST['m_libres'];
		$UNAS = $_POST['unas'];
		$CABELLO = $_POST['cabello'];
	//DOCUMENTOS
		$LICENCIA= $_POST['licencia'];
		$TIA = $_POST['TIA'];
		$E_FISICO = $_POST['e_fisico'];
		$V_LICENCIA = $_POST['v_licencia'];
	//ESTADO DE LA UNIDAD
		$NOEC = $_POST['noec'];
		$V_SEGURO = $_POST['v_seguro'];
		$U_LIMPIA = $_POST['u_limpia'];
		$P_SUCIEDAD = NULL;
		if ($U_LIMPIA == 'no') {
		$P_SUCIEDAD = $_POST['u_suc'];
		}
		$GOLPES_UNIDAD = $_POST['g_unidad'];
		$P_GOLPES = NULL;
		if ($GOLPES_UNIDAD == 'si') {
			$P_GOLPES = $_POST['g_unidad_si'];
		}
	//EXCURSIONES
		$EXCURSION = $_POST['excursion'];
		$EQ_EXCURSION = NULL;
		$N_PAX = NULL;
		$AMENIDADES = NULL;
		if ($EXCURSION == 'si') {
				$EQ_EXCURSION = $_POST['eq_excursion'];
				$N_PAX = $_POST['n_pax'];
				$AMENIDADES = implode("/",$_POST['amenidades']);
		}
	//AGENCIAS	
		$AGENCIAS = $_POST['agencias'];

	//RECORD EXIST IN DATABASE

		$EXIST = $_POST['exist'];

		// UPDATE RECORD
		if ($EXIST = 0) {

			$sql_insert = "INSERT INTO _checklist_operador 
					   (horario_entrada,fecha_checklist,operador,puntualidad,actitud_llegada,prob_actitud,
						alcohol,uniforme,manos_libres,unas,cabello,trae_licencia,tia,examen_fisico,vencimiento_licencia,unidad_asignada,vencimiento_seguro,unidad_limpia,prob_limpieza,golpes_o_accidentes,prob_golpes,excursion,equipo_excursion,no_pax_excursion,amenidades_excursion,agencias)
						VALUES ('{$HORARIO}','{$FECHA}','{$OPERADOR}','{$PUNTUALIDAD}','{$ACTITUD}',
								'{$PROB_ACTITUD}','{$ALCOHOL}','{$UNIFORME}','{$MANOS_LIBRES}','{$UNAS}',
								'{$CABELLO}','{$LICENCIA}','{$TIA}','{$E_FISICO}','{$V_LICENCIA}',
								'{$NOEC}','{$V_SEGURO}','{$U_LIMPIA}','{$P_SUCIEDAD}','{$GOLPES_UNIDAD}',
								'{$P_GOLPES}','{$EXCURSION}','{$EQ_EXCURSION}','{$N_PAX}','{$AMENIDADES}','{$AGENCIAS}');";

				try {
					adoexecute($sql_insert);
				} catch (Exception $e) {
					echo $e;
					
				}
		}
		// UPDATE RECORD
		elseif ($EXIST = 1) {

			$sql_update = 	"UPDATE _checklist_operador SET 
								puntualidad = '{$PUNTUALIDAD}'
								,actitud_llegada = '{$ACTITUD}'
								,prob_actitud = '{$PROB_ACTITUD}'
								,alcohol = '{$ALCOHOL}'
								,uniforme = '{$UNIFORME}'
								,manos_libres = '{$MANOS_LIBRES}'
								,unas = '{$UNAS}'
								,cabello = '{$CABELLO}'
								,trae_licencia = '{$LICENCIA}'
								,tia = '{$TIA}'
								,examen_fisico = '{$E_FISICO}'
								,unidad_limpia = '{$U_LIMPIA}'
								,prob_limpieza = '{$P_SUCIEDAD}'
								,golpes_o_accidentes = '{$GOLPES_UNIDAD}'
								,prob_golpes = '{$P_GOLPES}'
								,excursion = '{$EXCURSION}'
								,equipo_excursion = '{$EQ_EXCURSION}'
								,no_pax_excursion = '{$N_PAX}'
								,amenidades_excursion = '{$AMENIDADES}'
								,agencias = '{$AGENCIAS}' 
								WHERE operador = '{$OPERADOR}' 
								AND fecha_checklist = '{$FECHA}' 
								AND unidad_asignada = '{$NOEC}';";

			try {
				adoexecute($sql_update);
			} catch (Exception $e) {
				echo $e;
				
			}
				//ECHO $sql_update;
		}

		else {
    		echo "Contacte con el administrador del sistema, existe un error";
		}		


	echo "  <script>
      		window.location.href = 'checklist-operadores.php';
    		</script>";


 ?>