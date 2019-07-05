<!doctype html>
<?php include "../db_conexion.php"   ?>
<html>
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

         <!-- DataTables Responsive CSS -->
        <!-- <link href="vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet"> -->

        <!-- Custom CSS -->
        <link href="dist/css/sb-admin-2.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
        
        <!-- Datatable JS -->
         <script src="DataTables/datatables.min.js"></script>

         <!-- Scripts exportar csv -->
        <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
        
        <!-- Scripts DatePicker -->
        <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
        
        <!-- Libreria suma DATATABLES -->
        <script src="https://cdn.datatables.net/plug-ins/1.10.19/api/sum().js"></script>
                
    </head>
    <body >
        <div id="cober"  name="cober"  style=" position: fixed; top:0px; left: 0px; background-color: rgba(255, 255, 255, .8); height:120%; width:2350px; border:0px solid red; z-index:2000">
            <div style="position:absolute; top:50%; left:25%">
            <div style="text-align:center">
                <span class="fa fa-refresh fa-spin fa-3x fa-fw"></span>
                <br><br><b>PROCESANDO...</b>
            </div>
         </div>
        </div>

        <div id="wrapper" >

                    <!-- Navigation -->
        <?php include "nav.php" ?>

        <div id="page-wrapper" style="width:2300px;border:0px solid red">
            <div class="row">&nbsp;
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12" style="width:2500px;border:0px solid red" >
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h2>CONTROL DIARIO DE KILOMETRAJE</h2>
                        </div>
                        <br>  
                <div class="row">
                    <div class="col-lg-2" >
                        <label for="tipoveh"> Tipo de Vehiculo</label>               
                        <select id='tipoveh' class="form-control">
                            <option value=''>Todos</option>
                            <option value='Van'>Van</option>
                            <option value='Urban'>Urban</option>
                            <option value='Suburban'>Suburban</option>
                            <option value='Sprinter'>Sprinter</option>
                            <option value='Transporter'>Transporter</option>
                        </select>
                    </div>
                    <div class="col-lg-2">
                        <label for="date">Fecha</label>
                        <input type="date" class="form-control" id="date" value=''>
                    </div>
                    <div class="col-lg-2">
                        <button class="btn btn-primary btn-lg btn-block" id="buttonUpdate" style="width:100%; margin-top: 15px;">Guardar todos los registros</button>
                    </div>               
                </div>

                        <div class="row">
                            <div class="col-lg-2"></div>
                            <div class="col-lg-2"></div>
                            <div class="col-lg-2">
                                <button class="btn btn-info btn-lg btn-block" id="btonReporte" style="width:100%; margin-top: 15px;">Reporte Servicios</button>
                            </div>
                        </div>           
            
            <!-- Table -->
            <table id='empTable' class='display dataTable'>
                <thead>
                <tr>
                    <th>Modelo</th>
                    <th>Numero economico</th>
                    <th>Numero de viajes</th>
                    <th>Placas</th>
                    <th>Tipo Vehiculo</th>
                    <th>Combustible</th>
                    <th>Fecha anterior servicio</th>
                    <th>K_incial</th>
                    <th>K_final</th>
                    <th>K_recorridos</th>
                    <th>Operador</th>
                    <th>Cupon</th>
                    <th>Gasto_gasolina</th>
                    <th>Litros</th>
                    <th>Exceso</th>
                    <th>Estimado</th>
                    <th>Guardar</th>
                </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th colspan="15" style="text-align:left;padding-left: 0px;"></th>
                        <th></th>
                    </tr>
            </tfoot>                
        </table>

            <div id="coberRporte" style="  visibility:hidden;top:-150px  ; background-color:#FFF  ;width:900px ;border:2px solid silver; padding:10px; margin:10px ; position: absolute; z-index: 1200" class="row">
                <form method="post"  id="frm" name="frm" role="form">
                    <div class="col-md-12" style="text-align:right; padding-bottom:10px;border-bottom:1px solid silver; margin-bottom:10px ">
                        <p>cerrar</p>
                            <button id="btncerrart" type="button" class="fa fa-times btn btn-danger" ></button>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="datefilter">Fechas de reporte</label>
                                <input type="text" name="datefilter" id="datefilter" value="" />
                            </div>
                        </div>
                        <div class="form-group col-lg-4">
                            <button type="button" id="btnReporte" onclick="generar_reporte(1);" class="btn btn-primary" style="margin-top: 20px;"> 
                                Generar reporte por agencia y operador
                            </button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                        </div>                        
                         <div class="form-group col-lg-8">
                            <button type="button" id="btnReporteTotal" onclick="generar_reporte(2);" class="btn btn-secondary" style="margin-top: 20px;"> 
                                Generar reporte total viajes por operador
                            </button>
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
        <!-- Page-Level Demo Scripts - Tables - Use for reference -->

        <script charset="UTF-8">
            $(document).ready(function(){
                $('#cober').hide();
                var dataTable = $('#empTable').DataTable({                     
                    'processing': true,
                    'serverSide': true,
                    'lengthChange': false,
                    'serverMethod': 'post',
                    'searching': false, // Remove default Search Control
                    "language": {                        
                        "infoEmpty":      "No existen registros",
                        "info":           "<strong>Número total de vehículos:</strong> _TOTAL_ ",
                        "infoFiltered":   "|| <strong>Total de servicios:</strong> _MAX_ ",
                        "loadingRecords": "Leyendo registros...",
                        "processing":     "Procesando..."                        
                    },
                    'ajax': {
                            'url':'busqueda_vehKm.php',
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
                        { data: 'veh_nomb' },
                        { data: 'veh_noec' },
                        { data: 'conteo' },
                        { data: 'veh_plac' },
                        { data: 'tipo_veh' },
                        { data: 'veh_comb' },
                        { data: 'date_yest' },
                        { data: 'ki' }, 
                        // kilometro final
                        {
                         "orderable":      false,
                          data: 'kf',
                          "render": function ( data, type, full, meta ) {
                          return '<input type="number"  min="0"  pattern="[0-9]" class="k_final" value='+parseInt(data)+'>';
                            }
                        },
                        { 
                            "className":      'k_rec',
                            data: 'k_rec' 
                        },
                        { data: 'oper' },  //Ultima fecha de actualización
                        { data: 'cupo' },
                        //Gasto Gasolina
                        {
                            "orderable":      false, 
                            data: 'gasolina',
                            "render": function ( data, type, full, meta ) {
                            return '<input type="text" class="g_gasolina" value='+data+'>';

                            } 
                        },
                        //Litros
                        { 
                            "orderable":      false,
                            data: 'litros',
                            "render": function ( data, type, full, meta ) {
                            return '<input type="text" class="litros" value='+data+'>';
                            }
                        },
                        {  "className":      'exceso',
                            data: 'exceso' 
                        },
                        {   "className":      'estimado',
                            data: 'estimado' 
                        },
                        // {
                        //     "orderable":      false,
                        //     "data":           'activo',
                        //     "render":  function ( data, type, row ) {
                        //         if ( type === 'display' ) { 
                        //             return '<input type="checkbox" ' + ((data == 0) ? 'checked' : '') + ' id="input1' + row.id + '" class="disable" />';
                        //         }
                        //         return data;
                        //         }
                        // },                        
                        {
                            "className":      'save-control',
                            "orderable":      false,
                            "data":           null,
                            "defaultContent": '<button class="btn btn-primary">Guardar</button>'
                        }
                    ],
                    dom: 'Bfrtip',
                    buttons: [
                        {
                            extend: 'excelHtml5',
                            exportOptions: {
                               columns: [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15]
                            },
                            title: function(){
                            var date = $('#date').val();                
                            var printTitle = 'Control_diario_KM-' + date ;
                            return printTitle
                            }
                        }
                    ],
                     "footerCallback": function( tfoot, data, start, end, display ) {
                         //var TotalMarks = 2;
                        var TotalMarks = dataTable.rows().data();
                        var total_data = TotalMarks.length
                        var total_veh = dataTable.column( 2 ).data().sum();
                        var average = total_veh / total_data
                        //$(tfoot).find('th').eq(0).html( "Promedio de viajes por vehiculo es: "+ Math.round(average));
                        $(tfoot).find('th').eq(0).html( "Promedio de viajes por vehiculo es: "+ average.toFixed(2));
  }
                });
                

                $('#tipoveh').change(function(){
                    dataTable.draw();
                });
                $('#date').change(function(){
                    dataTable.draw();
                });
                // Change the date automatically and start dataTable
                var now = new Date().toISOString().slice(0,10);
                $('#date').val(now).trigger('change');
     

                // Button upload data (changes to formulas, get data with json and update records)

                $('#empTable tbody').on( 'click', 'button', function () {
                    if (confirm('¿Quieres guardar este registro?')) {
                        var activeRow = JSON.stringify(dataTable.row( $(this).parents('tr') ).data());
                        var date = $('#date').val();
                        var g_gas = $(this).closest("tr").find("input.g_gasolina").val();
                        var litros = $(this).closest("tr").find("input.litros").val();
                        var kf = $(this).closest("tr").find("input.k_final").val();
                        var exceso = $(this).closest("tr").find(".exceso").html(); 
                        var activo = '1';
                        var estimado = $(this).closest("tr").find(".estimado").html(); 
                        if ($('input.disable').is(':checked')) {
                            var activo = '0';
                        }
                        //alert(activeRow);
                        $('#cober').show();
                        $.ajax({
                            'url': 'updateSingleVehicleKm.php',
                            'type': "post",
                            'data': {                
                                activeRow: activeRow,
                                date: date,
                                g_gas : g_gas,
                                litros: litros,
                                kf : kf,
                                activo: activo,
                                exceso : exceso,
                                estimado : estimado
                            },
                            'dataType' : 'json',
                            success: function(result){
                                        var foo = result;
                                        console.log(foo);
                                        //location.reload();
                                    $('#empTable').DataTable().ajax.reload();
                                    $('#cober').hide();
                                        
                             },
                            error: function(jqxhr, status, exception) {
                                    alert('Exception:', exception);
                            }            
                        });
                    }
                    else {
                    dataTable.draw();
                    }
                });

                $('#empTable tbody').on( 'keydown', 'input.k_final', function (event) {
                    if (event.which == 13) {
                        var activeRow = JSON.stringify(dataTable.row( $(this).parents('tr') ).data());
                        var values = [];
                        JSON.parse(activeRow, function (key, value) {
                            if (typeof(value) != "object") {
                                values.push({[key]:value}); // mete en un array los datos de la fila
                            } 
                        });
                        // -- Kilimetro inicial
                        let pairKI = values.find(x => x.ki);  //OBTIENE EL PAR DE KILOMETRO INICIAL
                        let ki = Object.values(pairKI)[0];  //OBTIENE VAALOR DE KILOMETRO INICIAL
                        let kf = $(this).val();  //OBTIENE VAALOR DE KILOMETRO FINAL
                        let calcKm = kf - ki;    //FORMULA DE KILOMETROS RECORRIDOS
                        let pairVeh = values.find(x => x.tipo_veh);  //OBTIENE EL PAR DE TIPO VEHICULO
                        let veh = Object.values(pairVeh)[0];  //OBTIENE VAALOR DE TIPO VEHICULO
                        let g_est = 0;            
                        var idx = dataTable.row( $(this).parents('tr') ).index();
                        dataTable.cell(idx,9).data(calcKm);
                        dataTable.cell(idx,8).data(kf);
                        switch(veh){
                            case "Van":    
                            case "Urban":
                                g_est = (calcKm/120) * 254;
                                g_est = g_est.toFixed(2);
                                dataTable.cell(idx,15).data(g_est);
                                break;
                            case "Suburban":
                                g_est = (calcKm/120) * 285 ;
                                g_est = g_est.toFixed(2);
                                dataTable.cell(idx,15).data(g_est);
                                break;
                            case "Transporter":
                            case "Sprinter":
                                g_est = (calcKm/120) * 200.1 ;
                                g_est = g_est.toFixed(2);
                                dataTable.cell(idx,15).data(g_est);
                                break;
                            default:
                                 dataTable.cell(idx,15).data(0);
                        };
                    }   
                });

                $('#empTable tbody').on( 'keydown', 'input.g_gasolina', function (event) {
                    if (event.which == 13) {
                         let kr = $(this).closest("tr").find(".k_rec").html();
                         let g_gas = $(this).val();
                         let g_real = g_gas - kr;
                         let estimado = $(this).closest("tr").find(".estimado").html();
                         let exceso = g_gas - estimado;
                         var idx = dataTable.row( $(this).parents('tr') ).index();
                         dataTable.cell(idx,14).data(exceso.toFixed(2));
                         dataTable.cell(idx,12).data(g_gas);
                    }
                });

                $('#empTable tbody').on( 'keydown', 'input.litros', function (event) {
                    if (event.which == 13) {
                       var idx = dataTable.row( $(this).parents('tr') ).index();
                       var litros = $(this).val();
                       dataTable.cell(idx,13).data(litros); 
                    }
                });

            });
            
            $('#buttonUpdate').on( 'click', function () {
                var table = $('#empTable').DataTable();
                 if (confirm('¿Quieres guardar todos los registros?')) {                        
                        //var column = table.column(14).data();
                        var bla = JSON.stringify(table.rows().data().toArray());
                        var date = $('#date').val();
                        $('#cober').show();
                        $.ajax({
                            'url': 'updateAllVehiclesKm.php',
                            'type': "post",
                            'data': {                
                                bla:bla,
                                date: date
                            },
                            'dataType' : 'json',
                            success: function(result){
                                        var foo = result;
                                        console.log(foo);
                                        //table.draw();
                                        table.ajax.reload();
                                        $('#cober').hide();
                             },
                            error: function(jqxhr, status, exception) {
                                    alert('Exception:', exception);
                            }            
                        });
                    }
                    else {
                        table.draw();
                    }         
                });


                $('#btonReporte').on( 'click', function () {
                     window.scrollTo(0, 0);

                $('#coberRporte').css('visibility','visible');
                $('#coberRporte').show();
                });

                $('#btncerrart').on( 'click', function () {
                    $('#coberRporte').hide();
                });

                //Datepicker reporte
                $(function() {

                  $('input[name="datefilter"]').daterangepicker({
                      autoUpdateInput: true,
                      locale: {
                          cancelLabel: 'Cancelar',
                          "separator": " - ",
                          "applyLabel": "Aplicar",
                          "fromLabel": "De",
                          "toLabel": "Hasta",
                          "customRangeLabel": "Custom",
                            "daysOfWeek": [
                                "Dom",
                                "Lun",
                                "Mar",
                                "Mie",
                                "Jue",
                                "Vie",
                                "Sáb"
                            ],
                        "monthNames": [
                            "Enero",
                            "Febrero",
                            "Marzo",
                            "Abril",
                            "Mayo",
                            "Junio",
                            "Julio",
                            "Agosto",
                            "Septiembre",
                            "Octubre",
                            "Noviembre",
                            "Deciembre"
                        ]
                    }
                  });
                  $('input[name="datefilter"]').on('apply.daterangepicker', function(ev, picker) {
                      $(this).val(picker.startDate.format('DD/MM/YYYY') + ' - ' + picker.endDate.format('DD/MM/YYYY'));
                  });
                  $('input[name="datefilter"]').on('cancel.daterangepicker', function(ev, picker) {
                      $(this).val('');
                  });
            });

            // $('#btnReporte').click(function(){
            //    if ($.trim($('#datefilter').val()) !== ''  ) {
            //        var inicioFecha = $('#datefilter').data('daterangepicker').startDate.format('YYYY-MM-DD');
            //        var finFecha = $('#datefilter').data('daterangepicker').endDate.format('YYYY-MM-DD');
            //            $.ajax({
            //                 type: 'POST',
            //                 url: 'reporteOperadoresMes.php',
            //                 data: {
            //                     inicioFecha:inicioFecha,
            //                     finFecha:finFecha
            //                     },
            //                success: function(result){
            //                             var foo = result;
            //                             var lol = ConvertToCSV(foo);
            //                             //console.log(lol);
            //                              var uri = 'data:application/csv;charset=UTF-8,' + encodeURIComponent(lol);
            //                             // //window.open(uri, 'tiketi.csv');
            //                              var downloadLink = document.createElement("a");
            //                              downloadLink.href = uri;
            //                              downloadLink.download = "reporte_operadores_de_"+inicioFecha+"_A_"+finFecha+".csv";

            //                             document.body.appendChild(downloadLink);
            //                             downloadLink.click();
            //                             document.body.removeChild(downloadLink);
            //                          }
            //             });
            //     }
            //     else {
            //         alert('El rango de fechas se encuentra vacio, favor de verificar');
            //     }
            // });


            function ConvertToCSV(objArray) {
                var array = typeof objArray != 'object' ? JSON.parse(objArray) : objArray;
                var str = '';

                for (var i = 0; i < array.length; i++) {
                    var line = '';
                    for (var index in array[i]) {
                        if (line != '') line += ','

                        line += array[i][index];
                    }

                    str += line + '\r\n';
                }

                return str;
            }

            function generar_reporte(id){
               if ($.trim($('#datefilter').val()) !== ''  ) {
                   var inicioFecha = $('#datefilter').data('daterangepicker').startDate.format('YYYY-MM-DD');
                   var finFecha = $('#datefilter').data('daterangepicker').endDate.format('YYYY-MM-DD');
                       $.ajax({
                            type: 'POST',
                            url: 'reporteOperadoresMes.php',
                            data: {
                                inicioFecha:inicioFecha,
                                finFecha:finFecha,
                                id:id
                                },
                           success: function(result){  
                                        var foo = result;
                                         var lol = ConvertToCSV(foo);
                                        //console.log(foo);
                                         var uri = 'data:application/csv;charset=UTF-8,' + encodeURIComponent(lol);
                                         var downloadLink = document.createElement("a");
                                         downloadLink.href = uri;
                                         
                                        switch(id) {
                                            case 1:
                                                downloadLink.download = "reporte_segmentacion_de_operadores_de_"+inicioFecha+"_A_"+finFecha+".csv";
                                            break;
                                            case 2:
                                                downloadLink.download = "reporte_total_de_operadores_de_"+inicioFecha+"_A_"+finFecha+".csv";
                                            break;
                                            default:
                                        }

                                        document.body.appendChild(downloadLink);
                                        downloadLink.click();
                                        document.body.removeChild(downloadLink);
                                     }
                        });
                }
                else {
                    alert('El rango de fechas se encuentra vacio, favor de verificar');
                }
            };

        </script>
    </body>
</html>
