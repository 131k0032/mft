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




<link href="//rawgithub.com/indrimuska/jquery-editable-select/master/dist/jquery-editable-select.min.css" rel="stylesheet">

 <script>
function pulsar(e) {
  tecla = (document.all) ? e.keyCode :e.which;
  return (tecla!=13);
}
</script>


</head>

<body style="width:100% !important; border:0px solid green; margin:0px !important; padding:0px !important">
     <div style="border:0px solid red">
            <div class="row">
                  <h1 style="text-align:center; font-size:30px">Captura Express <span class="fa fa-bolt"></span></h1>

            </div>
        <form name="frm" action="express-insert.php" method="post" onkeypress="return pulsar(event)"  >
            <div id="paso1" style="text-align:Center" >
                <div class="row" style="width:80%;margin:auto;padding-top:10px">
                     <label>FECHA SERVICIO:</label>
                    <input type="date" name="txtdate1" value="<?php echo date ("Y-m-d")?>" class="form-control" onkeypress=" if (event.keyCode == 13){document.frm.txttime1.focus();}" />
                </div>

                <div class="row" style="width:80%;margin:auto;padding-top:10px">
                     <label>HORA SERVICIO:</label>
                    <input type="text"  pattern="([01]?[0-9]|2[0-3]):[0-5][0-9]" placeholder="hh:mm"  name="txttime1"  onkeypress=" if (event.keyCode == 13){document.frm.txtorig1.focus();}" class="form-control" />
                </div>

               <div class="row" style="width:80%;margin:auto;padding-top:10px">
                     <label>PICK UP:</label>
                      <input type="text" name="txtorig1"  class="form-control" onkeypress=" if (event.keyCode == 13){document.frm.txtdest1.focus();}" />
                </div>


               <div class="row" style="width:80%;margin:auto;padding-top:10px">
                     <label>DROP OFF:</label>
                      <input type="text" name="txtdest1"  class="form-control" onkeypress=' if (event.keyCode == 13){

                            $("#paso1").hide("slide");
                            $("#paso2").show("slide");
                            $("#paso3").hide("slide");
                            $("#paso4").hide("slide");
                            document.frm.txtname.focus();

                            }' />
                </div>



                <div class="row" style="width:80%;margin:auto;padding-top:10px">
                         <button id="guardar" type="button" class="btn btn-primary btn-lg btn-block"
                         onclick='
                            $("#paso1").hide("slide");
                            $("#paso2").show("slide");
                            $("#paso3").hide("slide");
                            $("#paso4").hide("slide");
                            document.frm.txtvuel1.focus()


                         '



                          >SIGUIENTE</button>
                </div>
            </div>

            <div id="paso2" style="text-align:Center" >
                <div class="row" style="width:80%;margin:auto;padding-top:10px" onkeypress=" if (event.keyCode == 13){document.frm.txtadult.focus();}" >
                     <label>NOMBRE CLIENTE:</label>
                    <input type="text" name="txtname"  class="form-control" />
                </div>

                <div class="row" style="width:80%;margin:auto;padding-top:10px" onkeypress=" if (event.keyCode == 13){document.frm.txtagen.focus();}" >
                     <label>PAX:</label>
                    <select class="form-control" name="txtadult" >

                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                        <option>6</option>
                        <option>7</option>
                        <option>8</option>
                        <option>9</option>
                        <option>10</option>
                        <option>11</option>
                        <option>12</option>

                    </select>
                </div>


                <div class="row" style="width:80%;margin:auto;padding-top:10px" onkeypress=" if (event.keyCode == 13){document.frm.txtdest1.focus();}" >
                     <label>AGENCIA:</label>

                    <input type="text" name="txtagen"  class="form-control" />

                       <!--
                          <select class="form-control" name="txtagen" id="txtagen" onkeypress=" if (event.keyCode == 13){document.frm.btn2.focus();}" >
                                <option value="|"> - Select -</option>
                                <?php
                                    $sql = "select * from _clientes order by cli_nomb";
                                    $rs = adoopenrecordset($sql);
                                    while($rstemp = mysql_fetch_array($rs)){
                                        ?>
                                            <option value="<?php echo $rstemp["cli_nomb"] ?>"><?php echo $rstemp["cli_nomb"] ?></option>
                                <?php
                                    }
                                ?>
                          </select>
                          -->


                </div>

                <div class="row" style="width:90%;margin:auto;padding-top:10px;text-align:center">
                       <div style="float:left;width:50%;text-align:center">
                         <button style="width:90%" id="guardar" type="button" class="btn btn-primary btn-lg btn-block"

                        onclick='
                            $("#paso1").show("slide");
                            $("#paso2").hide("slide");
                            $("#paso3").hide("slide");
                            $("#paso4").hide("slide");
                         '

                          >ATRAS</button>
                       </div>
                       <div style="float:left;width:50%;text-align:center">
                         <button style="width:90%" name="btn2" type="button" id="guardar" class="btn btn-primary btn-lg btn-block"
                         onclick='
                            $("#paso1").hide("slide");
                            $("#paso2").hide("slide");
                            $("#paso3").show("slide");
                            $("#paso4").hide("slide");
                            document.frm.txtvuel1.focus();

                         '

                          >SIGUIENTE</button>
                        </div>
                </div>
            </div>


        <div id="paso3" style="text-align:Center" >
                <div class="row" style="width:80%;margin:auto;padding-top:10px">
                     <label>VUELO:</label>
                    <input type="text" name="txtvuel1" class="form-control" onkeypress=" if (event.keyCode == 13){document.frm.txttipo.focus();}" />
                </div>
           <!--
                <div class="row" style="width:80%;margin:auto;padding-top:10px">
                     <label>AEROLINEA:</label>
                    <input type="text" name="txtairl1" class="form-control" />
                </div>
           -->
               <div class="row" style="width:80%;margin:auto;padding-top:10px">
                <label>Tipo Servicio</label>
                    <select class="form-control"  id="txttipo" name="txttipo" onkeypress=" if (event.keyCode == 13){document.frm.txtoper.focus();}" >
                          <option value="ll"    >LL - Llegada</option>
                          <option value="sl"    >SL - Salida</option>
                          <option value="tr"    >TR - Transfer</option>
                          <option value="ow"    >OW - One Way</option>
                          <option value="rt"    >RT - Round Trip</option>
                          <option value="tour"  >TOUR - Tour</option>
                          <option value="sa"    >SA - Servicio Abierto</option>
                          <option value="cir"   >CIR - Circuito</option>
                    </select>
                     </div>


                <div class="row" style="width:80%;margin:auto;padding-top:10px" onkeypress=" if (event.keyCode == 13){document.frm.txtnoec.focus();}" >
                     <label>OPERADOR:</label>
                    <input type="text" name="txtoper" class="form-control" />
                </div>

                <div class="row" style="width:80%;margin:auto;padding-top:10px" onkeypress=" if (event.keyCode == 13){document.frm.txtplac.focus();}" >
                     <label># ECONOMICO</label>
                    <input type="text" name="txtnoec" class="form-control" />
                </div>

                <div class="row" style="width:80%;margin:auto;padding-top:10px">
                     <label>PLACAS</label>
                    <input type="text" name="txtplac" class="form-control" onkeypress=" if (event.keyCode == 13){document.frm.btn1.focus();}" />
                </div>


                <div class="row" style="width:90%;margin:auto;padding-top:10px;text-align:center">
                       <div style="float:left;width:50%;text-align:center">
                         <button style="width:90%" id="guardar"  type="button" class="btn btn-primary btn-lg btn-block"

                         onclick='
                            $("#paso1").hide("slide");
                            $("#paso2").show("slide");
                            $("#paso3").hide("slide");
                            $("#paso4").hide("slide");


                         '


                         >ATRAS</button>
                       </div>
                       <div style="float:left;width:50%;text-align:center">
                         <button style="width:90%" id="guardar" name="btn1" type="submit" class="btn btn-primary btn-lg btn-block" >FINALIZAR</button>
                        </div>
                </div>
            </div>
                </form>

            <div id="paso4" style="text-align:Center" >
                  <div class="row" style="width:80%;margin:auto;padding-top:10px">
                        <h1>ORDEN GENERADA SATISFACTORIAMENTE</h1>
                  </div>
            </div>

    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
  </div>

</body>


<script src="//rawgithub.com/indrimuska/jquery-editable-select/master/dist/jquery-editable-select.min.js"></script>
<script>
      $("#paso1").show();
      $("#paso2").hide();
      $("#paso3").hide();
      $("#paso4").hide();


</script>

</html>
