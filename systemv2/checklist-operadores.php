<!DOCTYPE html>
<?php include "../db_conexion.php"   ?>
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
        <link href="dist/css/sb-admin-2.css" rel="stylesheet">
        <!-- Custom Fonts -->
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <!-- Datatable JS -->
        <script src="DataTables/datatables.min.js"></script>
        <style>
        div.datatable-wide {
			width: 58%;        	
        }
        div.popup {
            position: absolute;
            top: 50%;
            left: 50%;
            margin-top: -50px;
            margin-left: -50px;
            z-index: 100;
            }
        div.popuprow {
            margin-bottom: 20px;
        }
        div.popuprow label {
            display: inline-block;
            max-width: 100%;
            margin-bottom: 5px;
            font-weight: 700;

        }
        </style>
</head>
<body>
	<!-- cover -->
	<div id="cober"  name="cober"  style=" position: fixed; top:0px; left: 0px; background-color: rgba(255, 255, 255, .8); height:120%; width:2350px; border:0px solid red; z-index:2000">
        <div style="position:absolute; top:50%; left:25%">
            <div style="text-align:center">
                <span class="fa fa-refresh fa-spin fa-3x fa-fw"></span>
                <br><br><b>PROCESANDO...</b>
        	</div>
    	</div>
    </div>
	<div id="wrapper" >
	 	<?php include "nav.php" ?>
	 	<div id="page-wrapper" style="width:2300px;border:0px solid red">
		 	<div class="row">
		 		<div class="col-lg-12">
		 			<div class="panel panel-default">
		 				<div class="panel-heading">
	                    	<h2>CHECKLIST DE OPERADORES</h2>
	                    </div>
		 			</div>
		 		</div>
		 	</div>
		 	<div class="row">
                <div class="col-lg-2">
                    <label for="date">Fecha</label>
                    <input type="date" class="form-control" id="date" value=''>
                </div>
        	</div>
            <!-- popup -->
            <div class="row popup" style="display: none;width:800px;height:500px
            ;background-color:white;border: 2px solid silver;">
                <div class="row" style="margin-top: 15px; margin-bottom:15px;border-bottom:1px solid silver;margin-left: 0px;margin-right: 0px;">
                    <div class="col-lg-11">
                        
                    </div>
                    <div class="col-lg-1" style="text-align:right;">
                        <button id="btncerrart" type="button" class="fa fa-times btn btn-danger btn-primary close_upd" style="
    margin-bottom: 10px;"></button>
                    </div>
                </div>
                <div class="col-lg-12">
                    <form action="">
                        <div class="form-update">
                            <div class="row popuprow">
                                <div class="col-lg-3">
                                    <label for="up_oper">Operador</label>
                                </div>
                                <div class="col-lg-8">
                                    <input type="text" class="form-control" id="up_oper" readonly>
                                </div>
                            </div>
                            <div class="row popuprow">
                                <div class="col-lg-3">
                                    <label for="up_noec">Número Economico</label>
                                </div>
                                <div class="col-lg-8">
                                    <input type="text" id="up_noec" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="row popuprow">
                                <div class="col-lg-3">
                                    <label for="up_date">Fecha</label>
                                </div>
                                <div class="col-lg-8">
                                    <input type="text" id="up_date" class="form-control" readonly>
                                </div>
                            </div>
                            <!-- <div class="row popuprow">
                                <div class="col-lg-3">
                                    <label for="up_agen">Agencias</label>
                                </div>
                                <div class="col-lg-8">
                                    <input type="text" id="up_agen" readonly>
                                </div>
                            </div> -->
                            <div class="row popuprow">
                                <div class="col-lg-3">
                                    <label for="nw_eco">Número Economico nuevo</label>
                                </div>
                                <div class="col-lg-8">
                                    <select name="nw_eco" id="nw_eco" class="form-control">
                                        <option value="null">Seleccione Vehículo</option>
                                            <?php
                                                $eco= "select veh_noec from _vehiculos" ;
                                                $rsf_eco = adoopenrecordset($eco);
                                                while($rstempf_eco = mysql_fetch_array($rsf_eco)){
                                                  if($VAR_NOEC==$rstempf_eco["veh_noec"]){$VAR_XX = "selected";}else{$VAR_XX="";}
                                            ?>
                                                 <option <?php echo $VAR_XX ?> ><?php echo $rstempf_eco["veh_noec"] ?></option>
                                            <?php
                                                }
                                            ?>
                                            <option value="null">Ningún vehículo</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row popuprow">
                                <div class="col-lg-3">
                                    <label for="">Agencia</label>
                                </div>
                                <div class="col-lg-8">
                                    <div id="checklist_agen">
                                    </div>
                                </div>
                                </div>
                            <button type="button" id="ReasignarUnidad" class="btn btn-primary" style="display: block; margin: 0 auto;">REASIGNAR UNIDAD</button>
                        </div>
                    </form>
                </div>
            </div>
    	<!-- Table -->
        	<div class="datatable-wide"> 
	            <table id='empTable' class='display dataTable' >
	                <thead>
		                <tr>
		                    <th>Operador</th>
		                    <th>Fecha del día</th>
		                    <th>Noeco</th>
		                    <th>Vencimiento TIA</th>
		                    <th>Vencimiento Licencia</th>
		                    <th>Vencimiento examen médico</th>
		                    <th>Agencias</th>
		                    <th>UNICO O Thomas Moore</th>
		                    <th>Booster o Carseat</th>
		                    <th>PAX</th>
		                    <th>Checklist</th>
                            <th>Cambiar Unidad</th>
		                </tr>
	                </thead>
	        	</table>
        	</div>
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
    		$('#cober').hide();

    		var chklist = $('#empTable').DataTable({ 
			 	'processing': true,
                'serverSide': true,
                'lengthChange': false,
                'serverMethod': 'post',
                'searching': false,
                'bAutoWidth': false, 
                'ajax': {
                        'url':'busqueda_chklist.php',
                        'data': function(data){
                            // Read values
                            var t_veh = $('#tipoveh').val();
                            // var name = $('#searchByName').val();
                            var date = $('#date').val();
                            // Append to data
                            data.tipoveh = t_veh;
                            // data.searchByName = name;
                            data.date = date;
                            }
                        },
                'columns': [
                    {   
                        "className":      'ope_nomb',
                    	data: 'ope_nomb' }
                   ,{ data: 'date1' }
                   ,{ 
                   	  "className":      'no_eco',
                   	  data: 'noec' }
                   ,{ 
                   	  "className":      'vencimiento_tia',
                   	  data: 'vencimiento_tia' }
                   ,{ 
                   	  "className":      'vencimiento_licencia',
                   	  data: 'vencimiento_licencia' }
                   ,{ 
                   	  "className":      'vencimiento_examen_medico',
                   	  data: 'vencimiento_examen_medico' }
                   ,{ 
                   	  "className":      'agen_tot',
                   	  data: 'agen_tot' }
                   ,{ data: 'thomas_ontour' }
                   ,{ data: 'come2' }
                   ,{ data: 'pax' }
                   ,// checklist Button
                        {
                         "orderable":      false,
                          data: 'ope_id',
                          "render": function ( data, type, full, meta ) {
                          return '<button class="btn btn-info chklist" value='+data+'>Checklist</button>';
                            }
                        }
                    // checklist Button
                        ,{
                         "orderable":      false,
                          data: 'ope_id1',
                          "render": function ( data, type, full, meta ) {
                          return '<button class="btn btn-warning ch_noec" value='+data+'>Cambiar Unidad</button>';
                            }
                        }
                ]

    		});

    		$('#date').change(function(){
    			chklist.draw();
                });

	        // Change the date automatically and start dataTable
	        var now = new Date().toISOString().slice(0,10);
	        $('#date').val(now).trigger('change');

    		$('#empTable tbody').on( 'click', 'button.chklist', function (){
    			let id = $(this).attr('value');
    			let ope = $(this).closest("tr").find(".ope_nomb").html();
    			let noeco = $(this).closest("tr").find(".no_eco").html();
    			let agen_tot = $(this).closest("tr").find(".agen_tot").html();
    			let ven_lic = $(this).closest("tr").find(".vencimiento_licencia").html();
                let date = $('#date').val();
    			window.location = 'chklist_operadores_insertar.php?id='+id+'&ope='+ope+'&noeco='+noeco+"&agen_tot="+agen_tot+'&ven_lic='+ven_lic+'&fecha='+date;
                });

            $('#empTable tbody').on( 'click', 'button.ch_noec', function (){
                    var id = $(this).attr('value');
                    let ope = $(this).closest("tr").find(".ope_nomb").html();
                    let noeco = $(this).closest("tr").find(".no_eco").html();
                    let date = $('#date').val();
                    let agen_tot = $(this).closest("tr").find(".agen_tot").html();
                    //
                    var array = agen_tot.split("|");

                    //window.location = 'checklist-cambio_noec_oper.php?id='+id+'&ope='+ope+'&noeco='+noeco+"&agen_tot="+agen_tot+'&fecha='+date;
                    document.getElementById("up_oper").value = ope;
                    document.getElementById("up_noec").value = noeco;
                    document.getElementById("up_date").value = date;
                    //document.getElementById("up_agen").value = agen_tot;

                    var s2 = document.getElementById('checklist_agen');
                    s2.innerHTML = "";
                        

                    for (var proper_array in array) {
                        if (array.hasOwnProperty(proper_array)) {
                            var pair = array[proper_array];
                            var checkbox = document.createElement("input");
                            checkbox.type = "checkbox";
                            checkbox.className = "tours";
                            checkbox.name = "tours[]";
                            checkbox.value = pair;
                            checkbox.checked = true;
                            s2.appendChild(checkbox);
                    
                            var label = document.createElement('label')
                            label.htmlFor = pair;
                            label.appendChild(document.createTextNode(pair));

                            s2.appendChild(label);
                            s2.appendChild(document.createElement("br"));    
                        }
                    }
                    
                    $(".popup").show();

                    $([document.documentElement, document.body]).animate({
                        scrollTop: $(".popup").offset().top
                        }, 500);

                });

             $('.close_upd').on( 'click', function (){
                    $(".popup").hide();
             });

             $('#nw_eco').change(function(){

                document.getElementById("up_noec").value = $('#nw_eco').val();

                });
             
             $('#ReasignarUnidad').on( 'click', function (){
                   // alert('reasignar unidad');
                   $('#cober').show();
                   var oper = $('#up_oper').val();
                   var noec = $('#up_noec').val();
                   var fecha = $('#date').val();
                   var agen = [];
                   $('.tours:checked').each(function(i, e) {
                        agen.push($(this).val());
                        });
                    $.ajax({
                        url: "checklist-cambio_noec_oper.php",
                        type: "post",
                        data: {                
                                oper:oper,
                                 'agen[]':agen.join(),
                                 noec:noec,
                                 fecha:fecha
                            },
                        success: function (response) {
                            //var foo = response;
                           //console.log(foo);

                        chklist.draw();
                        $('#cober').hide();


                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                           console.log(textStatus, errorThrown);
                        }
                    });
             });


		});

	


    </script>
	
</body>
</html>