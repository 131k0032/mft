<!DOCTYPE html>
<?php include "../db_conexion.php"   ?>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>MFTSYS | Mayan Fantasy Tours <?php echo $VAR_VERSION ?></title>     

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include "nav.php" ?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Agregar orden TOUR</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Ingrese la información
                        </div>
                        <div class="panel-body">
                            <div class="row">
                            <form role="form" method="post" action="orden_guardar.php?t=to&acc=">

                                    <div class="col-lg-12">
                                        <div class="col-lg-12"><h2>CLIENT INFO</h2></div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Nombre</label>
                                                <input class="form-control" required id="txtname" name="txtname" placeholder="Nombre Completo">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Mail</label>
                                                <input class="form-control" required type="mail"  id="txtema1" name="txtema1"  placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Mobile</label>
                                                <input class="form-control"  required id="txtmobi" name="txtmobi" placeholder="">
                                            </div>
                                        </div>



                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Payment Method</label>
                                                <select class="form-control" name="txtpaym" id="txtpaym" >
                                                      <?php mft_payment_method() ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label>Adults</label>
                                                <select class="form-control" name="txtadul" id="txtadul" >
                                                    <option   >1</option>
                                                    <option   >2</option>
                                                    <option   >3</option>
                                                    <option   >4</option>
                                                    <option   >5</option>
                                                    <option   >6</option>
                                                    <option   >7</option>
                                                    <option   >8</option>
                                                    <option   >9</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label>Children</label>
                                                <select class="form-control" name="txtchil" id="txtchil" >
                                                  <option  >0</option>
                                                  <option  >1</option>
                                                  <option  >2</option>
                                                  <option  >3</option>
                                                  <option  >4</option>
                                                  <option  >5</option>
                                                  <option  >6</option>
                                                  <option  >7</option>
                                                  <option  >8</option>
                                                  <option  >9</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label>Enfants</label>
                                                <select class="form-control" name="txtenfa" id="txtenfa" >
                                                  <option  >0</option>
                                                  <option  >1</option>
                                                  <option  >2</option>
                                                  <option  >3</option>
                                                  <option  >4</option>
                                                  <option  >5</option>
                                                  <option  >6</option>
                                                  <option  >7</option>
                                                  <option  >8</option>
                                                  <option  >9</option>
                                                </select>
                                            </div>
                                        </div>

                                     </div>




                                     <div class="col-lg-12">
                                        <div class="col-lg-12"><h2>TOUR INFO</h2></div>
                                              <div class="col-lg-6">
                                                      <div class="form-group">
                                                          <label>Pickup location</label>
                                                          <select class="form-control" name="txtorig1" id="txtorig1">

                                                             <optgroup label="Airports">              <?php  listado("airport-cancun"       ,$VAR_DEST1); ?>      </optgroup>
                                                             <optgroup label="Cancun Hotels">         <?php  listado("hotel-cancun"   ,$VAR_DEST1); ?> </optgroup>
                                                             <optgroup label="Riviera Maya Hotels">   <?php  listado("hotel-riv-maya" ,$VAR_DEST1); ?> </optgroup>
                                                             <optgroup label="Tulum Hotels">          <?php  listado("hotel-tulum"    ,$VAR_DEST1); ?> </optgroup>
                                                          </select>
                                                      </div>
                                              </div>
                                              <div class="col-lg-6">
                                                      <div class="form-group">
                                                          <label>Tour</label>
                                                          <select class="form-control" name="txtdest1" id="txtdest1">
                                                                 <?php mft_combo_tours('') ?>
                                                          </select>
                                                      </div>
                                              </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Date</label>
                                                <input class="form-control" required type="date" name="txtdate1" id="txtdate1" placeholder="">
                                            </div>
                                       </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Time</label>
                                                <input class="form-control" required type="time" name="txttime1" id="txttime1" placeholder="">
                                            </div>
                                       </div>

                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label>Room</label>
                                                <input class="form-control"  type="text" name="txtroom" id="txtroom" placeholder="">
                                            </div>
                                       </div>

                                     </div>





                                     <div class="col-lg-12">
                                        <div class="col-lg-12"><h2>OPERATION INFO</h2></div>
                                              <div class="col-lg-3">
                                                      <div class="form-group">
                                                          <label>Estatus</label>
                                                          <select class="form-control" name="txtesta" id="txtesta">
                                						       <option value="abierta">Abierta</option>
                                						       <option value="cerrada">Cerrada</option>
                                                          </select>
                                                      </div>
                                              </div>
                                              <div class="col-lg-3">
                                                      <div class="form-group">
                                                          <label>Pagado</label>
                                                          <select class="form-control" name="txtpaga" id="txtpaga">
                                						       <option value="no">No</option>
                                						       <option value="si">Si</option>
                                                          </select>
                                                      </div>
                                              </div>
                                              <div class="col-lg-3">
                                                      <div class="form-group">
                                                          <label>Placas</label>
                                                         <input class="form-control" type="text" name="txtplac" id="txtplac" placeholder="">
                                                      </div>
                                              </div>
                                              <div class="col-lg-3">
                                                      <div class="form-group">
                                                          <label>Operador</label>
                                                         <input class="form-control" type="text" name="txtoper" id="txtoper" placeholder="">
                                                      </div>
                                              </div>


                                       <div class="col-lg-3">
                                                     <div class="form-group">
                                                          <label>Lead</label>
                                                           <select class="form-control" name="txtlead" id="txtlead">
                                                            <option>WEB</option>
                                                            <option>TELÉFONO</option>
                                                            <option>MAIL</option>
                                                            <option>PERSONAL</option>
                                                            <option>OTRO</option>
                                                           </select>
                                                      </div>
                                              </div>


                                              <div class="col-lg-3">
                                                     <div class="form-group">
                                                          <label>Idioma</label>
                                                           <select class="form-control" name="txtidio" id="txtlead">
                                                            <option>EN</option>
                                                            <option>ES</option>
                                                            <option>FR</option>
                                                            <option>OT</option>
                                                           </select>

                                                      </div>
                                              </div>

                                              <div class="col-lg-3">
                                                     <div class="form-group">
                                                          <label># Confirm.</label>
                                                         <input class="form-control" type="text" name="txtconf" value="" id="txtconf" placeholder="">
                                                      </div>
                                              </div>

                                              <div class="col-lg-3">
                                                     <div class="form-group">
                                                          <label>Cupón</label>
                                                         <input class="form-control" type="text" name="txtcupo" value="" id="txtcupo" placeholder="">
                                                      </div>
                                              </div>



                                              <div class="col-lg-6">
                                                      <div class="form-group">
                                                          <label>Agencia</label>
                                                          <input class="form-control" type="text" name="txtagen" id="txtagen" placeholder="">
                                                      </div>
                                              </div>

                                              <div class="col-lg-6">
                                                      <div class="form-group">
                                                          <label>No. Econ.</label>
                                                          <input class="form-control" type="text" name="txtnoec" id="txtnoec" placeholder="">
                                                      </div>
                                              </div>

                                              <div class="col-lg-6">
                                                      <div class="form-group">
                                                          <label>Vehículo</label>
                                                         <select class="form-control" name="txtvehi" id="txtvehi">
                                                            <?php mft_vehiculos('')  ?>
                                                         </select>
                                                      </div>
                                              </div>

                                              <div class="col-lg-6">
                                                      <div class="form-group">
                                                          <label>Monto</label>
                                                          <input class="form-control" type="number" name="txtmont" id="txtmont" >
                                                      </div>
                                              </div>


                                              <div class="col-lg-6">
                                                      <div class="form-group">
                                                          <label>Clave</label>
                                                          <input class="form-control" type="text" name="txtclave" id="txtclave" >
                                                      </div>
                                              </div>

                                              <div class="col-lg-6">
                                                      <div class="form-group">
                                                          <label>Orden Anexa</label>
                                                          <input class="form-control" type="text" name="txtordanexa" id="txtordanexa" >
                                                      </div>
                                              </div>




                                              <div class="col-lg-12">
                                                      <div class="form-group">
                                                          <label>Comentarios</label>
                                                          <textarea class="form-control" name="txtcome" id="txtcome" ></textarea>
                                                      </div>
                                              </div>

                                     </div>

                                    <div class="col-lg-12">
                                       <button type="submit" class="btn btn-primary btn-lg btn-block">Guardar</button>
                                    </div>

                                   </form>
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>

</body>

</html>
