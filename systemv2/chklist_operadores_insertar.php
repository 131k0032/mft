<?php 
include '../db_conexion.php';
	date_default_timezone_set('America/Cancun');
	$id = $_GET['id'];	
	$OPERADOR = $_GET['ope'] ;					#OPERADOR
	$NOECO = $_GET['noeco'];					#UNIDAD ASIGNADA
	$AGENCIA = $_GET['agen_tot'];				#AGENCIA
	$V_LICENCIA = $_GET['ven_lic'];				#VENCIMIENTO DE LICENCIA
	$FECHA_DIA = $_GET['fecha'];

	$sql = "SELECT * FROM _checklist_operador where operador = '{$OPERADOR}' and fecha_checklist = '{$FECHA_DIA}'";
	//echo $sql;
	 $rsf = adoopenrecordset($sql);
	 $exist = mysql_num_rows($rsf);
	 //echo $exist;
	if ($exist==0) {
		$HORARIO = date('h:i:s a', time());			#HORARIO DE ENTRADA	
		$PUNTUALIDAD= 'si';			#PUNTUALIDAD
		$ACTITUD = 'buena';			#ACTITUD AL LLEGAR
		$P_ACTITUD = NULL;			#ACTITUD AL LLEGAR
		#################################################
		$ALCOHOL = 0;				#ALCOHOL
		$UNIFORME = 'completo';		#UNIFORME
		$MANOS_LIBRES = 'no';		#MANOS LIBRES
		$UNAS= 'ok';				#UÑAS
		$CABELLO = 'si';			#CABELLO
		#################################################
		$LICENCIA = 'si';			#LICENCIA
		$TIA= 'si';					#TIA
		$E_FISICO= 'si';			#EXAMEN FISICO
		$V_SEGURO = NULL;			#VENCIMIENTO DE SEGURO **
		$V_EXTINTOR = NULL;			#VENCIMIENTO DE EXTINTOR **
		#################################################
		$U_LIMPIA = 'si';			#UNIDAD LIMPIA
		$P_SUCIEDAD = NULL;			#PROBLEMA SUCIEDAD
		$GOLPES_ACCIDENTES= 'no';	#GOLPES O ACCIDENTES
		$P_GOLPES =  NULL;			#PROBLEMA GOLPES
		#################################################
		$EXCURSION = 'no';			#EXCURSION
		$EQ_EXCURSION = 'Curated_Tulum';		#EQUIPO EXCURSION
		$NO_PAX = 0;				#NO_PAX
		#################################################
		//$DULCERO = 'No';			#DULCERO
		#################################################
		}
		else {
			$rsf2 = adoopenrecordset($sql);
			 while($rstempf1 = mysql_fetch_array($rsf2)){
			$HORARIO = $rstempf1["horario_entrada"];
			$PUNTUALIDAD=$rstempf1["puntualidad"];									#PUNTUALIDAD
			$ACTITUD = $rstempf1["actitud_llegada"];
			$P_ACTITUD	= $rstempf1["prob_actitud"];								#ACTITUD AL LLEGAR
			#################################################
			$ALCOHOL = $rstempf1["alcohol"];			#ALCOHOL
			$UNIFORME = $rstempf1["uniforme"];			#UNIFORME
			$MANOS_LIBRES = $rstempf1["manos_libres"];		#MANOS LIBRES
			$UNAS= $rstempf1["unas"];				#UÑAS
			$CABELLO = $rstempf1["cabello"];			#CABELLO
			#################################################
			$LICENCIA = $rstempf1["trae_licencia"];			#LICENCIA
			$TIA= $rstempf1["tia"];					#TIA
			$E_FISICO= $rstempf1["examen_fisico"];			#EXAMEN FISICO
			$V_SEGURO = $rstempf1["vencimiento_seguro"];			#VENCIMIENTO DE SEGURO **
			$V_EXTINTOR = $rstempf1["vencimiento_extintor"];			#VENCIMIENTO DE EXTINTOR **
			#################################################
			$U_LIMPIA = $rstempf1["unidad_limpia"];			#UNIDAD LIMPIA
			$P_SUCIEDAD = $rstempf1["prob_limpieza"];		#PROBLEMA SUCIEDAD
			$GOLPES_ACCIDENTES= $rstempf1["golpes_o_accidentes"];	#GOLPES O ACCIDENTES
			$P_GOLPES = $rstempf1["prob_golpes"];	#PROBLEMA GOLPES
			#################################################
			$EXCURSION = $rstempf1["excursion"];			#EXCURSION
			$EQ_EXCURSION = $rstempf1["equipo_excursion"];		#EQUIPO EXCURSION
			$NO_PAX = $rstempf1["no_pax_excursion"];				#NO_PAX
			#################################################
			//$DULCERO = 'Si';			#DULCERO
			#################################################
			}
		}

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>MFTSYS | Mayan Fantasy Tours <?php echo $VAR_VERSION ?></title>
		<!-- Datatable CSS -->
        <link href='DataTables/datatables.min.css' rel='stylesheet' type='text/css'>
	 	<!-- jQuery Library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <!-- Bootstrap Core CSS -->
        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <!-- MetisMenu CSS -->
        <link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="dist/css/sb-admin-2.css" rel="stylesheet">
        <!-- Custom Fonts -->
        <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
        <style>
			.tagline {
		    height: 0;
		    border-top: 1px solid #d9dde5;
		    text-align: left;
		    width: 50%;
		    margin-bottom: 15px;
		    margin-top: 15px;
			}
			 .tagline span {
			    text-transform: uppercase;
			    display: inline-block;
			    position: relative;
			    padding: 0px 5px;
			    background: #fff;
			    color: #337ab7;
			    top: -10px;
			    font-size: 16px;
			}
        </style>
</head>
<body>
	<div id="wrapper" >
		<?php include "nav.php" ?>
		<div id="page-wrapper" style="width:2300px;border:0px solid red">
			<div class="row">
				&nbsp;
			</div>
			<div class="row">
		 		<div class="col-lg-12">
		 			<div class="panel panel-default">
		 				<div class="panel-heading">
	                    	<h2>CHECKLIST DE <?php echo $OPERADOR; ?> </h2>
	                    </div>
		 			</div>
		 		</div>
		 	</div>
		 	<div class="tagline">
					<span><strong>Operador</strong></span>
			</div>
			<form action="chklist_operadores_guardar.php" method="post">
			 	<div class="row">
			 	<input id="exist" name="exist" type="hidden" value="<?php echo $exist; ?>">				
			 		<div class="col-lg-1">
			 			<div class="form-group">
			 				<label>Hora de Entrada</label>
			 				<br>
			 				<input type="text" id="horario" name="horario" class="form-control"  value="<?php echo $HORARIO ?>" readonly>
			 			</div>	
			 		</div>
			 		<div class="col-lg-1">
			 			<div class="form-group">
			 				<label>Fecha</label>
			 				<br>
			 				<input type="text" id="fecha" name="fecha" class="form-control"  value="<?php echo $FECHA_DIA ?>" readonly>
			 			</div>	
			 		</div>
			 		<div class="col-lg-1">
			 			<div class="form-group">
			 				<label>Operador</label>
			 				<br>
			 				<input type="text" id="operador" name="operador" class="form-control"  value="<?php echo $OPERADOR ?>" readonly>
			 			</div>	
			 		</div>
			 		<div class="col-lg-1">
			 			<div class="form-group">
			 				<label>Puntualidad</label>
			 				<br>
			 				<select name="puntualidad" class="form-control" id="puntualidad" name="puntualidad">
			 					<?php if ($PUNTUALIDAD == 'si') 
			 						{
			 						echo "<option value='si' selected>Ok</option>
			 						 	  <option value='no'>No</option>";
			 						  }
			 						else {
			 							echo "<option value='si'>Ok</option>
			 								  <option value='no' selected>No</option>";
			 						}
			 					 ?>
			 				</select>
			 			</div>	
			 		</div>
			 		<div class="col-lg-1">
			 			<div class="form-group">
			 				<label>Actitud</label>
			 				<br>
			 				<select name="actitud" class="form-control" id="actitud" name="actitud">
			 					<?php if ($ACTITUD == 'buena') 
			 						{
			 						echo "<option value='buena' selected>Buena</option>
			 							  <option value='mala'>Mala</option>";
			 						  }
			 						else {
			 							echo "<option value='buena' >Buena</option>
			 							  <option value='mala' selected>Mala</option>";
			 						}
			 					 ?>
			 				</select>
			 			</div>	
			 		</div>
			 		<div class="col-lg-2 prob">
			 			<label for="prob_actitud">¿Qué problema de actitud existió?</label>
			 			<textarea name="prob_actitud" id="prob_actitud" name="prob_actitud" cols="47 rows="3"><?php echo  $P_ACTITUD; ?></textarea>
			 		</div>
			 	</div>
			 	<div class="tagline">
					<span><strong>Limpieza</strong></span>
				</div>
			 	<div class="row">
			 		<div class="col-lg-1">
			 			<div class="form-group">
			 				<label>Alcohol %</label>
			 				<br>
			 				<input type="number" id="alc" name="alc"  min="0" max="100" class="form-control"  value="<?php echo $ALCOHOL; ?>" placeholder="<?php echo $ALCOHOL; ?>" >
			 			</div>	
			 		</div>
			 		<div class="col-lg-1">
			 			<div class="form-group">
			 				<label>Uniforme</label>
			 				<br>
			 				<select name="uniforme" class="form-control" id="uniforme">
			 					<?php if ($UNIFORME == 'completo') 
			 						{
			 						echo "<option value='completo' selected>Completo</option>
			 							  <option value='incompleto'>Incompleto</option>";
			 						  }
			 						else {
			 							echo "<option value='completo' >Completo</option>
			 							      <option value='incompleto' selected>Incompleto</option>";
			 						}
			 					 ?>
			 				</select>
			 			</div>	
			 		</div>
			 		<div class="col-lg-1">
			 			<div class="form-group">
			 				<label>Manos Libres</label>
			 				<br>
			 				<select name="m_libres" class="form-control" id="m_libres">
			 					<?php if ($MANOS_LIBRES == 'si') 
			 						{
			 						echo "<option value='si' selected>Si</option>
			 							  <option value='no'>No</option>";
			 						  }
			 						else {
			 							echo "<option value='si' >Si</option>
			 							      <option value='no' selected>No</option>";
			 						}
			 					 ?>
			 				</select>
			 			</div>	
			 		</div>
			 		<div class="col-lg-1">
		 				<div class="form-group">
		 					<label for="unas">¿Uñas limpias?</label>
		 					<br>
		 					<select name="unas" id="unas" class="form-control">
		 						<?php if ($UNAS == 'ok') 
			 						{
			 						echo "<option value='Ok' selected>Ok</option>
			 							  <option value='no'>No</option>";
			 						  }
			 						else {
			 							echo "<option value='ok' >Ok</option>
			 							      <option value='no' selected>No</option>";
			 						}
			 					 ?>
		 					</select>
		 				</div>
		 			</div>
		 			<div class="col-lg-1">
		 				<div class="form-group">
		 					<label for="cabello">¿Cabello presentable?</label>
		 					<br>
		 					<select name="cabello" id="cabello" class="form-control">
		 						<?php if ($CABELLO == 'si') 
			 						{
			 						echo "<option value='si' selected>Si</option>
			 							  <option value='no'>No</option>";
			 						  }
			 						else {
			 							echo "<option value='si' >Si</option>
			 							      <option value='no' selected>No</option>";
			 						}
			 					 ?>
		 					</select>
		 				</div>
		 			</div>
			 	</div>
			 	<div class="tagline">
					<span><strong>Documentos</strong></span>
				</div>
			 	<div class="row"> 		
			 		<div class="col-lg-1">
			 			<div class="form-group">
			 				<label>¿Lleva Licencia?</label>
			 				<br>
			 				<select name="licencia" class="form-control" id="licencia">
			 					<?php if ($LICENCIA == 'si') 
			 						{
			 						echo "<option value='si' selected>Si</option>
			 							  <option value='no'>No</option>";
			 						  }
			 						else {
			 							echo "<option value='si' >Si</option>
			 							      <option value='no' selected>No</option>";
			 						}
			 					 ?>
			 				</select>
			 			</div>	
			 		</div>
		 			<div class="col-lg-1">
		 				<div class="form-group">
		 					<label for="TIA">¿Lleva TIA?</label>
		 					<br>
		 					<select name="TIA" id="TIA" class="form-control">
		 						<?php if ($TIA == 'si') 
			 						{
			 						echo "<option value='si' selected>Si</option>
			 							  <option value='no'>No</option>";
			 						  }
			 						else {
			 							echo "<option value='si' >Si</option>
			 							      <option value='no' selected>No</option>";
			 						}
			 					 ?>
		 					</select>
		 				</div>
		 			</div>
		 			<div class="col-lg-1">
		 				<div class="form-group">
		 					<label for="unas">¿Lleva examen físico?</label>
		 					<br>
		 					<select name="e_fisico" id="e_fisico" class="form-control">
		 						<?php if ($E_FISICO == 'si') 
			 						{
			 						echo "<option value='si' selected>Si</option>
			 							  <option value='no'>No</option>";
			 						  }
			 						else {
			 							echo "<option value='si' >Si</option>
			 							      <option value='no' selected>No</option>";
			 						}
			 					 ?>
		 					</select>
		 				</div>
		 			</div>
			 		<div class="col-lg-1">
			 			<label for="noeco">Vencimiento de licencia</label>
			 			<br>
			 			<input type="text" id="v_licencia" name = 'v_licencia' class="form-control" readonly value=" <?php echo $V_LICENCIA; ?>">
			 		</div>
			 	</div>
			 	<div class="tagline">
					<span><strong>Estado de la unidad</strong></span>
				</div>
			 	<div class="row">
			 		<div class="col-lg-1">
			 			<label for="noeco">Número ecónomico</label>
			 			<br>
			 			<input type="text" id="noec" readonly name="noec" value="<?php echo $NOECO;?>" class="form-control">
			 		</div>
			 		<div class="col-lg-1">
			 			<label for="v_seguro">Vencimiento de seguro</label>
			 			<br>
			 			<input type="text" id="v_seguro" name="v_seguro" class="form-control" readonly>
			 		</div>
			 		<div class="col-lg-1">
		 				<div class="form-group">
		 					<label for="u_limpia">¿Unidad limpia?</label>
		 					<br>
		 					<select name="u_limpia" id="u_limpia" class="form-control">
		 						<?php if ($U_LIMPIA== 'si') 
			 						{
			 						echo "<option value='si' selected>Si</option>
			 							  <option value='no'>No</option>";
			 						  }
			 						else {
			 							echo "<option value='si' >Si</option>
			 							      <option value='no' selected>No</option>";
			 						}
			 					 ?>
		 					</select>
		 				</div>
		 			</div>
		 			<div class="col-lg-2 u_suc">
		 				<div class="form-group">
		 					<label for="u_suc">Describa el problema de suciedad</label>
		 					<br>
		 					<textarea name="u_suc" id="u_suc" cols="47 rows="3"> <?php echo $P_SUCIEDAD; ?></textarea>
		 				</div>
		 			</div>
			 		<div class="col-lg-1">
		 				<div class="form-group">
		 					<label for="g_unidad">¿Golpes en unidad?</label>
		 					<br>
		 					<select name="g_unidad" id="g_unidad" class="form-control">
		 						<?php if ($GOLPES_ACCIDENTES == 'no') 
			 						{
			 						echo "<option value='si' >Si</option>
			 							  <option value='no' selected>No</option>";
			 						  }
			 						else {
			 							echo "<option value='si' selected >Si</option>
			 							      <option value='no' >No</option>";
			 						}
			 					 ?>
		 					</select>
		 				</div>
		 			</div>
		 			<div class="col-lg-2 g_unidad_si">
		 				<div class="form-group">
		 					<label for="g_unidad_si">Describa los golpes</label>
		 					<br>
		 					<textarea name="g_unidad_si" id="g_unidad_si" cols=47 rows="3"><?php echo  $P_GOLPES; ?></textarea>
		 				</div>
		 			</div>
			 	</div>
			 	<div class="tagline">
					<span><strong>Excursiones</strong></span>
				</div>
			 	<div class="row">
	 				<div class="col-lg-1">
		 				<div class="form-group">
		 					<label for="excursion">¿Es excursión?</label>
		 					<br>
		 					<select name="excursion" id="excursion" class="form-control">
		 						<?php if ($EXCURSION == 'no') 
			 						{
			 						echo "<option value='si' >Si</option>
			 							  <option value='no' selected>No</option>";
			 						  }
			 						else {
			 							echo "<option value='si' selected >Si</option>
			 							      <option value='no' >No</option>";
			 						}
			 					 ?>
		 					</select>
		 				</div>
		 			</div>
		 			<div class="col-lg-1 eq_excursion">
		 				<div class="form-group">
		 					<label for="excursion">Equipo de excusión</label>
		 					<br>
		 					<select name="eq_excursion" id="eq_excursion" class="form-control">
		 						<option value="Curated_Tulum" <?php if($EQ_EXCURSION==='Curated_Tulum') echo 'selected="selected"';?> >Curated Tulum</option>
		 						<option value="Kaan_Luum" <?php if($EQ_EXCURSION==='Kaan_Luum') echo 'selected="selected"';?> >Kaan Luum</option>
		 						<option value="Tulum_Coba" <?php if($EQ_EXCURSION==='Tulum_Coba') echo 'selected="selected"';?>>Tulum Coba</option>
		 						<option value="Chichen_itza"  <?php if($EQ_EXCURSION==='Chichen_itza') echo 'selected="selected"';?> >Chichen itza</option>
		 					</select>
		 				</div>
		 			</div>
		 			<div class="col-lg-1 eq_excursion">
		 				<div class="form-group">
		 					<label for="n_pax">Número de PAX</label>
		 					<br>
		 					<input type="number" id="n_pax" name = 'n_pax' class="form-control" value="<?php echo $NO_PAX; ?>" >
		 				</div>
		 			</div>
		 			<div class="col-lg-4 eq_excursion">
						<label for="amen_excursion">Amenidades</label>
						<br>
						<div class="col-lg-2 eq_excursion">
							<input class="amenidades kaan c_tulum" type="checkbox" name="amenidades[]" value="visores"  > Visores<br>
							<input class="amenidades kaan c_tulum" type="checkbox" name="amenidades[]" value="boquilla" > Boquilla<br>
							<input class="amenidades kaan c_tulum" type="checkbox" name="amenidades[]" value="ocho" > Ocho<br>
							<input class="amenidades kaan c_tulum" type="checkbox" name="amenidades[]" value="aletas" > Aletas<br>
						</div>
						<div class="col-lg-2 eq_excursion">
							<input class="amenidades kaan c_tulum" type="checkbox" name="amenidades[]" value="tubo" > Tubo<br>
							<input class="amenidades kaan c_tulum" type="checkbox" name="amenidades[]" value="chaleco" > Chaleco<br>
							<input class="amenidades kaan c_tulum" type="checkbox" name="amenidades[]" value="toallitas" > Toallitas<br>
							<input class="amenidades kaan c_tulum" type="checkbox" name="amenidades[]" value="sombrilla" > Sombrilla<br>
						</div>
						<div class="col-lg-2 eq_excursion">
							<input class="amenidades kaan" type="checkbox" name="amenidades[]" value="Balon_voleyball" > Balón voleyball<br>
							<input class="amenidades kaan" type="checkbox" name="amenidades[]" value="Balon_americano" > Balón americano<br>
							<input class="amenidades kaan c_tulum chichen coba_tulum" type="checkbox" name="amenidades[]" value="coca_cola	" > Coca Cola	<br>
							<input class="amenidades kaan c_tulum chichen coba_tulum" type="checkbox" name="amenidades[]" value="agua" > Agua<br>
						</div>
						<div class="col-lg-2 eq_excursion">
							<input class="amenidades kaan c_tulum" type="checkbox" name="amenidades[]" value="cerveza" > Cerveza<br>
							<input class="amenidades kaan chichen" type="checkbox" name="amenidades[]" value="platano" > Plátano<br>
							<input class="amenidades kaan" type="checkbox" name="amenidades[]" value="mezcal" > Mezcal<br>
							<input class="amenidades kaan chichen" type="checkbox" name="amenidades[]" value="galletas" > Galletas<br>
							<input class="amenidades chichen" type="checkbox" name="amenidades[]" value="cuernito" > Cuernito <br>
						</div>
		 			</div>
	 			</div>
	 			<div class="row">
	 				<div class="col-lg-3">
		 				<div class="form-group">
		 					<label for="agencia">Agencias</label>
		 					<br>
		 					<input type="text" class="form-control" id="agencias" name='agencias' value="<?php echo $AGENCIA; ?>" readonly>
		 				</div>
		 			</div>
		 			<!-- <div class="col-lg-1 dulcero">
		 				<div class="form-group">
		 					<label for="excursion">¿Lleva dulcero?</label>
		 					<br>
		 					<select name="dulcero" id="dulcero" class="form-control">
		 						<option value="si" selected>Si</option>
		 						<option value="no" >No</option>
		 					</select>
		 				</div>
		 			</div> -->
	 			</div>
	 			<div class="tagline">
				</div>
	 			<div class="row">
	 				<div class="col-lg-6">
	 					<button id="guardar" type="submit" class="btn btn-primary btn-lg btn-block">Guardar</button>
					</div>
	 			</div>
 		</form>
		</div>
	</div>










	<!-- Scripts -->
    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="vendor/metisMenu/metisMenu.min.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>
    <script src="js/jquery.cookie.js"></script>	
    <!-- SCRIPT LOCAL -->
    <script>
    	$(document).ready(function(){
    		// textarea problema
    		$(".prob").hide();
    		// unidad sucia
    		$(".u_suc").hide();
    		//golpes
    		$(".g_unidad_si").hide();
    		//dulcero
    		//$(".dulcero").hide();
    		//equipo_excursion
    		$(".eq_excursion").hide();
    		//prob_show
    		$('#actitud').on('change', function() {
  				if ($(this).val() == "mala") {
  					$(".prob").show();
  				}
  				else {
  					$(".prob").hide();
  				}
			});
			// u_sucia show
			$('#u_limpia').on('change', function() {
  				if ($(this).val() == "no") {
  					$(".u_suc").show();
  				}
  				else {
  					$(".u_suc").hide();
  				}
			});
			// golpes show
			$('#g_unidad').on('change', function() {
  				if ($(this).val() == "si") {
  					$(".g_unidad_si").show();
  				}
  				else {
  					$(".g_unidad_si").hide();
  				}
			});
			// equipo_excursion show
			$('#excursion').on('change', function() {
  				if ($(this).val() == "si") {
  					$(".eq_excursion").show();
  					$('.c_tulum').attr('checked', true); 
  				}
  				else {
  					$(".eq_excursion").hide();
  					$('.amenidades').attr('checked', false);
  				}
			});

			//amenidades_select change
			$('#eq_excursion').on('change', function() { 
				var tour = $('#eq_excursion').val();
				switch(tour) {
					case 'Kaan_Luum':
						$('.amenidades').attr('checked', false);  
						$('.kaan').attr('checked', true); 
					break;
					
					case 'Curated_Tulum':
						$('.amenidades').attr('checked', false);  
						$('.c_tulum').attr('checked', true); 
					break;
					
					case 'Tulum_Coba':
						$('.amenidades').attr('checked', false);  
						$('.coba_tulum').attr('checked', true); 
					break;
					
					case 'Chichen_itza':
						$('.amenidades').attr('checked', false);  
						$('.chichen').attr('checked', true); 
					break;

					default:
					alert('Favor de informar su problema con sistemas');

				}

				
				
			});

			$('#actitud').trigger('change');
			$('#u_limpia').trigger('change');
			$('#g_unidad').trigger('change');
			$('#excursion').trigger('change');

    	});
    </script>
</body>
</html>

