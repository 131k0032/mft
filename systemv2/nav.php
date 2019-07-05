
<?php login(); ?>





<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="./">MFTSYS Admin v<?php echo $VAR_VERSION ?>  </a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
            <!--
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-bus fa-fw"></i>&nbsp;<?php echo mft_num_ord_activas(date("Y"))?> &nbsp;<i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-messages">

                <?php
                  $sql="select * from _transfers where estatus ='abierta'  order by id desc limit 3";
                  $rs = adoopenrecordset($sql);
                 while( $rstemp = mysql_fetch_array($rs)){
                ?>

                        <li>
                            <a href="agregar-servicio.php?t=<?php echo $rstemp["id"] ?>">
                                <div>
                                    <strong><?php echo $rstemp["name"]?></strong>
                                    <span class="pull-right text-muted">
                                        <em><?php echo date("d-M-y",$rstemp["num"])?></em>
                                    </span>
                                </div>
                                <div style="font-size:10px;"><b><?php echo strtoupper($rstemp["tipo"]) ?> &nbsp;&nbsp;#<?php echo substr($rstemp["num"],-5) ?></b> <br> <?php echo strtoupper($rstemp["orig1"]) ?> - <?php echo strtoupper($rstemp["dest1"]) ?> </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                 <?php } ?>

                        <li>
                            <a class="text-center" href="listado.php">
                                <strong>Ver todas las ordenes</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                </li>
             -->

                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                    <!--
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                    -->
                            <li class="divider"></li>
                            <li><a href="./"><i class="fa fa-sign-out fa-fw"></i> Logout</a></li>
                            <li><a href="password.php"><i class="fa fa-lock fa-fw"></i> Perfil</a></li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">



                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                         <form method="post" action="listado.php">
                            <div class="input-group custom-search-form">

                                <input type="text" class="form-control" name="txtfiltro" placeholder="ID,#orden, placas ...">
                                <span class="input-group-btn">

                                <button class="btn btn-default" type="submit">
                                    <i class="fa fa-search"></i>
                                </button>

                            </span>

                            </div>
                          </form>
                            <!-- /input-group -->
                        </li>


                       <li id="menu01" style=" display: none" ><a href="home.php">                  <i class="fa fa-dashboard fa-fw"></i>&nbsp;Dashboard                        </a></li>

                       <li id="menu02" style=" display: none" >
                        <a href="#.">       <i class="fa fa-sun-o"        ></i>&nbsp;Excursiones&nbsp;<span class="fa arrow"></span>        </a>
                            <ul class="nav nav-second-level">
                                <li><a href="excur_agregar.php">        <i class="fa fa-sun-o" ></i>&nbsp;&nbsp;Agregar Excursión</a></li>
                                <li><a href="excur_buscar.php">         <i class="fa fa-search" ></i>&nbsp;&nbsp;Buscar Excursión</a></li>
                                <li><a href="excur_ods_agregar.php">    <i class="fa fa-circle" ></i>&nbsp;&nbsp;Agregar ODS</a></li>
                                <li><a href="excur_ods_buscar.php">     <i class="fa fa-search" ></i>&nbsp;&nbsp;Buscar ODS</a></li>
                                <li><a href="excur_rep_oper.php">      <i class="fa fa-check" ></i>&nbsp;&nbsp;Reporte Operativo</a></li>
                            </ul>
                       </li>

                       <li id="menu03" style=" display: none" >
                        <a href="#.">       <i class="fa fa-bus"></i>&nbsp;Servicios&nbsp;<span class="fa arrow"></span> </a>
                             <ul class="nav nav-second-level">
                                  <!--

                                    se esta usando? 20/12/2017
                                      <li   ><a href="agregar-servicio.php">       <i class="fa fa-user fa-bus"        ></i>&nbsp;Agregar Servicio&nbsp;       </a></li>-->

                                      <li  ><a href="agregar-orden.php">          <i class="fa fa-user fa-plus"       ></i>&nbsp;Agregar Orden&nbsp;          </a></li>

                                      <li  ><a href="asignar-operador.php">       <i class="fa fa-user fa-fw"         ></i>&nbsp;Asignar Operador&nbsp;       </a></li>
                                      <li  ><a href="seguimiento-orden.php">      <i class="fa fa-circle fa-fw"       ></i>&nbsp;Ordenes Servicio&nbsp;       </a></li>

                                        <li  ><a href="captura-datos.php">      <i class="fa fa-copy fa-fw"       ></i>&nbsp;Captura Datos&nbsp;       </a></li>

                                      <li  ><a href="listado.php">               <i class="fa fa-list fa-fw"></i>&nbsp;Todos los Servicios                </a></li>
                                      <li  ><a href="express.php" target="_blank"><i class="fa fa-bolt fa-fw"></i>&nbsp;Captura Express                      </a></li>
                                      <li  ><a href="reporte-auditoria.php" ><i class="fa fa-flag-checkered fa-fw"></i>&nbsp;Reporte de Auditoria                      </a></li>
                              </ul>
                        </li>

                       <li id="menu04" style=" display: none" >
                        <a href="#.">       <i class="fa fa-car"        ></i>&nbsp;Controles Diarios&nbsp;<span class="fa arrow"></span>        </a>
                             <ul class="nav nav-second-level">
                                   <li  ><a href="ctr-diario-oper.php">        <i class="fa fa-car fa-fw"          ></i>&nbsp;Control Diario Oper.&nbsp;   </a></li>
                                   <li  ><a href="ctr-diario-admin.php">       <i class="fa fa-money fa-fw"        ></i>&nbsp;Control Diario Admin.&nbsp;  </a></li>
                              </ul>
                        </li>

                       <li id="menu05" style=" display: none" >
                        <a href="#.">       <i class="fa fa-file"        ></i>&nbsp;Contabilidad&nbsp;<span class="fa arrow"></span>        </a>
                             <ul class="nav nav-second-level">
                                    <li  ><a href="ctas.php?cta=cxc">           <i class="fa fa-arrow-left fa-fw"   ></i>&nbsp;Clientes (CxC)&nbsp;<span class="fa arrow"></span>         </a>
                                       <ul class="nav nav-second-level">
                                            <li   ><a  style="border:0px solid red; text-align:center; border-bottom:1px solid silver ; font-size:12px ;padding:2px !important; margin:2px !important" href="ctas.php?cta=cxc">&nbsp;TODOS&nbsp;      </a></li>
                                        <?php
                                          $sqlf1= "select * from _clientes  order by cli_nomb" ;
                                          $rsf1 = adoopenrecordset($sqlf1);
                                          while($rstempf1 = mysql_fetch_array($rsf1)){
                                       ?>
                                            <li   ><a style="border:0px solid red; text-align:center; border-bottom:1px solid silver ;
                                            font-size:12px ;padding:2px !important; margin:2px !important"
                                            href="ctas.php?cta=cxc&a=<?php echo str_replace("&","%26",$rstempf1["cli_nomb"])?>">&nbsp;<?php echo $rstempf1["cli_nomb"]?>&nbsp;      </a></li>
                                        <?php  }   ?>

                                        </ul>
                                    </li>


                                    <li  ><a href="ctas.php?cta=cxp">           <i  class="fa fa-arrow-right fa-fw" ></i>&nbsp;Proveedores (CxP)&nbsp;<span class="fa arrow"></span>      </a>
                                       <ul class="nav nav-second-level">
                                            <li   ><a  style="border:0px solid red; text-align:center; border-bottom:1px solid silver ; font-size:12px ;padding:2px !important; margin:2px !important" href="ctas.php?cta=cxp">&nbsp;TODOS&nbsp;      </a></li>
                                        <?php
                                          $sqlf1= "select * from _proveedores  order by pro_nomb" ;
                                          $rsf1 = adoopenrecordset($sqlf1);
                                          while($rstempf1 = mysql_fetch_array($rsf1)){
                                       ?>
                                            <li   ><a style="border:0px solid red; text-align:center; border-bottom:1px solid silver ;
                                            font-size:12px ;padding:2px !important; margin:2px !important"
                                            href="ctas.php?cta=cxp&p=<?php echo str_replace("&","%26",$rstempf1["pro_nomb"]) ?>">&nbsp;<?php echo $rstempf1["pro_nomb"]?>&nbsp;      </a></li>
                                        <?php  }   ?>

                                        </ul>
                                    </li>



                                    <li  ><a href="mayor.php">                  <i  class="fa fa-file fa-fw" ></i>&nbsp;Mayor&nbsp;                         </a></li>
                                    <li  ><a href="gasolinas.php">              <i  class="fa fa-fire fa-fw" ></i>&nbsp;Gasolinas &nbsp;                    </a></li>
                                    <li  ><a href="balance.php">               <i  class="fa fa-balance-scale fa-fw" ></i>&nbsp;Balance &nbsp;             </a></li>


                              </ul>
                        </li>


                       <li id="menu06" style=" display: none" >
                        <a href="#.">       <i class="fa fa-wrench"        ></i>&nbsp;Mantenimiento&nbsp;<span class="fa arrow"></span>        </a>
                             <ul class="nav nav-second-level">
                                    <li  ><a href="veh_servicios.php?">     <i class="fa fa-wrench"    ></i>&nbsp;Mantto. Vehículos&nbsp;         </a></li>
                                    <li  ><a href="veh_cattar.php?">        <i class="fa fa-calendar"  ></i>&nbsp;Catálogo Tareas&nbsp;         </a></li>
                                    <li  ><a href="veh_catinv.php?">        <i class="fa fa-check"     ></i>&nbsp;Catálogo&nbsp;Inventario&nbsp;         </a></li>
                                    <li  ><a href="cat_refacciones.php?">     <i class="fa fa-gears"     ></i>&nbsp;Catálogo&nbsp;Refacciones&nbsp;         </a></li>
                                    <li  ><a href="almacen.php?">           <i class="fa fa-cube"     ></i>&nbsp;Movimientos Almacen       </a></li>
                                    <li  ><a href="ctr-diario-km.php?">           <i class="fa fa-road"     ></i>&nbsp;Control Diario de Kilometraje       </a></li>
                                    <li  ><a href="checklist-operadores.php">          <i class="fa fa-check-square-o"     ></i>&nbsp;Checklist Operadores</a></li>

                              </ul>
                        </li>



                       <li id="menu07" style=" display: none" >
                        <a href="#.">       <i class="fa fa-gears"        ></i>&nbsp;Sistema&nbsp;<span class="fa arrow"></span>        </a>
                             <ul class="nav nav-second-level">
                                    <li  ><a href="usuarios.php?">          <i class="fa fa-users"   ></i>&nbsp;Usuarios&nbsp;         </a></li>
                                    <li  ><a href="operadores.php?">        <i class="fa fa-car"   ></i>&nbsp;Operadores&nbsp;         </a></li>
                                    <li  ><a href="agencias.php?">          <i class="fa fa-sun-o"   ></i>&nbsp;Agencias&nbsp;         </a></li>
                                    <li  ><a href="proveedores.php?">       <i class="fa fa-cube"   ></i>&nbsp;Proveedores&nbsp;         </a></li>
                                    <li  ><a href="hoteles.php?">           <i class="fa fa-building"   ></i>&nbsp;Hoteles&nbsp;         </a></li>
                                    <li  ><a href="veh_catveh.php?">        <i class="fa fa-truck"     ></i>&nbsp;Catálogo&nbsp;Vehículos&nbsp;         </a></li>
                                    <li  ><a href="tarifas.php?">           <i class="fa fa-dollar"     ></i>&nbsp;Tarifas / Agencias&nbsp;         </a></li>



                              </ul>
                        </li>



                       <li id="menu08" style=" display: none" >
                        <a href="#.">       <i class="fa fa-briefcase"        ></i>&nbsp;Bolsa de Trabajo&nbsp;<span class="fa arrow"></span>        </a>
                             <ul class="nav nav-second-level">
                                           <li  ><a href="bolsa.php?">           <i class="fa fa-gears"   ></i>&nbsp;Listado&nbsp;         </a></li>
                              </ul>
                        </li>




                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>


             <script src="js/jquery.cookie.js"></script>


<script>
        $(document).ready(function() {






        var result = $.cookie('usu_per').split('|');
  //      alert( result[2] );


            if(result[0]=='1') {   $('#menu01').show(); }
            if(result[1]=='1') {   $('#menu02').show(); }
            if(result[2]=='1') {   $('#menu03').show(); }
            if(result[3]=='1') {   $('#menu04').show(); }
            if(result[4]=='1') {   $('#menu05').show(); }
            if(result[5]=='1') {   $('#menu06').show(); }
            if(result[6]=='1') {   $('#menu07').show(); }
            if(result[7]=='1') {   $('#menu08').show(); }


              //;




           });


</script>