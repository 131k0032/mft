<?php

    include "../db_conexion.php";


    $VAR_DATE1 = "";
    $VAR_TIME1 = "";
    $VAR_ORIG1 = "";
    $VAR_DEST1 = "";
    $VAR_AIRL1 = "";
    $VAR_VUEL1 = "";

    $VAR_DATE2 = "";
    $VAR_TIME2 = "";
    $VAR_ORIG2 = "";
    $VAR_DEST2 = "";
    $VAR_AIRL2 = "";
    $VAR_VUEL2 = "";

    $VAR_ADUL ="";
    $VAR_CHIL ="";
    $VAR_ENFA ="";

    $VAR_CUPO ="";

    if(isset($_COOKIE["txtdate1"])){$VAR_DATE1 = $_COOKIE["txtdate1"]; }
    if(isset($_COOKIE["txttime1"])){$VAR_TIME1 = $_COOKIE["txttime1"]; }
    if(isset($_COOKIE["txtorig1"])){$VAR_ORIG1 = $_COOKIE["txtorig1"]; }
    if(isset($_COOKIE["txtdest1"])){$VAR_DEST1 = $_COOKIE["txtdest1"]; }
    if(isset($_COOKIE["txtvuel1"])){$VAR_VUEL1 = $_COOKIE["txtvuel1"]; }


    if(isset($_COOKIE["txtdate2"])){$VAR_DATE2 = $_COOKIE["txtdate2"]; }
    if(isset($_COOKIE["txttime2"])){$VAR_TIME2 = $_COOKIE["txttime2"]; }
    if(isset($_COOKIE["txtorig2"])){$VAR_ORIG2 = $_COOKIE["txtorig2"]; }
    if(isset($_COOKIE["txtdest2"])){$VAR_DEST2 = $_COOKIE["txtdest2"]; }
    if(isset($_COOKIE["txtvuel2"])){$VAR_VUEL2 = $_COOKIE["txtvuel2"]; }


    if(isset($_COOKIE["txtadul"])){$VAR_ADUL = $_COOKIE["txtadul"]; }
    if(isset($_COOKIE["txtchil"])){$VAR_CHIL = $_COOKIE["txtchil"]; }
    if(isset($_COOKIE["txtenfa"])){$VAR_ENFA = $_COOKIE["txtenfa"]; }

?>
<!DOCTYPE html>
<html>
   <head>

	<meta charset="utf-8">


	<link rel="stylesheet" href="css/theme-lblue.css" />
	<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
	<link rel="stylesheet" href="../css/jquery-ui.theme.css" />
	<link rel="stylesheet" href="../css/style.css" />
	<link rel="stylesheet" href="../css/animate.css" />
	<link rel="stylesheet" href="../css/icons.css" />
	<link href='http://fonts.googleapis.com/css?family=Raleway:400,500,600,700|Montserrat:400,700' rel='stylesheet' type='text/css'>
	<link rel="shortcut icon" href="../images/favicon.ico" />
    <link rel="stylesheet" href="../font-awesome/css/font-awesome.min.css">




	
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

  </head>

  <style>


#myvid {
 width:50%
}



@media  (max-width:992px) {
   #myvid{
      width:90%
   }

}


  </style>


  <body class="home">
		<!-- Preloader -->
		<div class="preloader">
			<div id="followingBallsG">
				<div id="followingBallsG_1" class="followingBallsG"></div>
				<div id="followingBallsG_2" class="followingBallsG"></div>
				<div id="followingBallsG_3" class="followingBallsG"></div>
				<div id="followingBallsG_4" class="followingBallsG"></div>
			</div>
		</div>
		<!-- //Preloader -->

	<!-- Main -->
	<main class="main" role="main">




		<div class="advanced-search color" id="booking">
			<div class="wrap">
				<form role="form" action="include-paso2.php" method="post">
					<!-- Row -->
					<div class="f-row">
						<div class="form-group datepicker one-fourth" >
							<label for="txtdate1">Arrival date </label>
							<!--<input required type="text" id="dep-date" name="txtdate1" />-->
							<input required type="date" id="txtdate1" name="txtdate1" value="<?php echo $VAR_DATE1; ?>" />
						</div>

						<div class="form-group uniform-input text one-fourth">
							<label for="txttime1">Time</label>
							<!--<input required type="text" id="dep-date" name="txtdate1" />-->
							<input required type="time" id="txttime1" name="txttime1" value="<?php echo $VAR_TIME1; ?>" />
						</div>



						<div class="form-group select one-fourth">
							<label>Pick up location</label>
							<select  required name="txtorig1" id="txtorig1"    >
    						       <option selected>&nbsp;</option>
                                   <optgroup label="Airports">               <?php  listado("airport-cancun"       ,$VAR_ORIG1); ?>      </optgroup>
                                   <optgroup label="Cancun Hotels">          <?php  listado("hotel-cancun"   ,$VAR_ORIG1); ?> </optgroup>
                                   <optgroup label="Puerto Morelos Hotels">  <?php  listado("hotel-puerto-morelos"   ,$VAR_ORIG1); ?> </optgroup>
                                   <optgroup label="Playa del Carmen Hotels"><?php  listado("hotel-pdc" ,$VAR_ORIG1); ?> </optgroup>
                                   <optgroup label="Playacar Hotels">        <?php  listado("hotel-playacar" ,$VAR_ORIG1); ?> </optgroup>
                                   <optgroup label="OCCIDENTAL">           <?php  listado("hotel-flamengo"    ,$VAR_ORIG1); ?> </optgroup>
                                   <optgroup label="Puerto Aventuras Hotels"> <?php  listado("hotel-puerto-aventuras"    ,$VAR_ORIG1); ?> </optgroup>
                                   <optgroup label="Tulum Hotels">           <?php  listado("hotel-tulum"    ,$VAR_ORIG1); ?> </optgroup>
                                   <optgroup label="Bahia Principe Hotels">           <?php  listado("hotel-bahia-principe"    ,$VAR_ORIG1); ?> </optgroup>



							</select>
						</div>
						<div class="form-group select one-fourth">
							<label>Drop off location</label>
							<select  required name="txtdest1"  id="txtdest1" >
    						       <option selected>&nbsp;</option>
                                   <optgroup label="Airports">               <?php  listado("airport-cancun"       ,$VAR_DEST1); ?>      </optgroup>
                                   <optgroup label="Cancun Hotels">          <?php  listado("hotel-cancun"   ,$VAR_DEST1); ?> </optgroup>
                                   <optgroup label="Puerto Morelos Hotels">  <?php  listado("hotel-puerto-morelos"   ,$VAR_DEST1); ?> </optgroup>
                                   <optgroup label="Playa del Carmen Hotels"><?php  listado("hotel-pdc" ,$VAR_DEST1); ?> </optgroup>
                                   <optgroup label="Playacar Hotels">        <?php  listado("hotel-playacar" ,$VAR_DEST1); ?> </optgroup>
                                   <optgroup label="OCCIDENTAL">           <?php  listado("hotel-flamengo"    ,$VAR_DEST1); ?> </optgroup>
                                   <optgroup label="Puerto Aventuras Hotels"> <?php  listado("hotel-puerto-aventuras"    ,$VAR_DEST1); ?> </optgroup>
                                   <optgroup label="Tulum Hotels">           <?php  listado("hotel-tulum"    ,$VAR_DEST1); ?> </optgroup>
                                   <optgroup label="Bahia Principe Hotels">           <?php  listado("hotel-bahia-principe"    ,$VAR_DEST1); ?> </optgroup>

							</select>
						</div>




						<div class="form-group uniform-input text one-fourth">
                            <br>
							<label for="txtvuel1">Flight #</label>
							<!--<input required type="text" id="dep-date" name="txtdate1" />-->
							<input  type="text"  required id="txtvuel1" name="txtvuel1"  value="<?php echo $VAR_VUEL1; ?>" />
						</div>

						<div class="form-group uniform-input text one-fourth">
                            <br>
							<label for="txtvuel1">Cupon</label>
							<!--<input required type="text" id="dep-date" name="txtdate1" />-->
                            <select id="txtcupo" name="txtcupo">
                                    <option>BPM2017</option>
                                    <option>VIP2017</option>
                            </select>
						   <!--
                            	<input  type="text"  required id="txtvuel1" name="txtvuel1"  value="<?php echo $VAR_VUEL1; ?>" />
                           -->
						</div>



					</div>
					<!-- //Row -->
					
					<!-- Row -->
					<div class="f-row">
						<div class="form-group datepicker one-fourth">
							<label for="txtdate2">Return date and time</label>
							<input type="date" id="txtdate2" name="txtdate2"  value="<?php echo $VAR_DATE2 ?>" />
						</div>

						<div class="form-group uniform-input text one-fourth">
							<label for="txttime2">Time</label>
							<!--<input required type="text" id="dep-date" name="txtdate1" />-->
							<input  type="time" id="txttime2" name="txttime2" value="<?php echo $VAR_TIME2 ?>" />
						</div>


						<div class="form-group select one-fourth">
							<label>Pick up location</label>
							<select name="txtorig2" id="txtorig2"  >
    						       <option selected>&nbsp;</option>
                                   <optgroup label="Airports">               <?php  listado("airport-cancun"       ,$VAR_ORIG2); ?>      </optgroup>
                                   <optgroup label="Cancun Hotels">          <?php  listado("hotel-cancun"   ,$VAR_ORIG2); ?> </optgroup>
                                   <optgroup label="Puerto Morelos Hotels">  <?php  listado("hotel-puerto-morelos"   ,$VAR_ORIG2); ?> </optgroup>
                                   <optgroup label="Playa del Carmen Hotels"><?php  listado("hotel-pdc" ,$VAR_ORIG2); ?> </optgroup>
                                   <optgroup label="Playacar Hotels">        <?php  listado("hotel-playacar" ,$VAR_ORIG2); ?> </optgroup>
                                   <optgroup label="OCCIDENTAL">           <?php  listado("hotel-flamengo"    ,$VAR_ORIG2); ?> </optgroup>
                                   <optgroup label="Puerto Aventuras Hotels"> <?php  listado("hotel-puerto-aventuras"    ,$VAR_ORIG2); ?> </optgroup>
                                   <optgroup label="Tulum Hotels">           <?php  listado("hotel-tulum"    ,$VAR_ORIG2); ?> </optgroup>
                                   <optgroup label="Bahia Principe Hotels">           <?php  listado("hotel-bahia-principe"    ,$VAR_ORIG2); ?> </optgroup>

							</select>
						</div>
						<div class="form-group select one-fourth">
							<label>Drop off location</label>
							<select name="txtdest2" id="txtdest2" >
    						       <option selected>&nbsp;</option>
                                   <optgroup label="Airports">               <?php  listado("airport-cancun"       ,$VAR_DEST2); ?>      </optgroup>
                                   <optgroup label="Cancun Hotels">          <?php  listado("hotel-cancun"   ,$VAR_DEST2); ?> </optgroup>
                                   <optgroup label="Puerto Morelos Hotels">  <?php  listado("hotel-puerto-morelos"   ,$VAR_DEST2); ?> </optgroup>
                                   <optgroup label="Playa del Carmen Hotels"><?php  listado("hotel-pdc" ,$VAR_DEST2); ?> </optgroup>
                                   <optgroup label="Playacar Hotels">        <?php  listado("hotel-playacar" ,$VAR_DEST2); ?> </optgroup>
                                   <optgroup label="OCCIDENTAL">           <?php  listado("hotel-flamengo"    ,$VAR_DEST2); ?> </optgroup>
                                   <optgroup label="Puerto Aventuras Hotels"> <?php  listado("hotel-puerto-aventuras"    ,$VAR_DEST2); ?> </optgroup>
                                   <optgroup label="Tulum Hotels">           <?php  listado("hotel-tulum"    ,$VAR_DEST2); ?> </optgroup>
                                   <optgroup label="Bahia Principe Hotels">           <?php  listado("hotel-bahia-principe"    ,$VAR_DEST2); ?> </optgroup>
							</select>
						</div>



						<div class="form-group uniform-input text one-fourth">
                        <br>
							<label for="txtvuel2">Flight #</label>
							<!--<input required type="text" id="dep-date" name="txtdate1" />-->
							<input  type="text" id="txtvuel2" name="txtvuel2" value="<?php echo $VAR_VUEL2; ?>" />
						</div>


					</div>
					<!-- //Row -->
					
					<!-- Row -->
					<div class="f-row">
						<div class="form-group uniform-input one-third">
							<label for="people">Adults:</label>
							<select name="txtadul" id="txtadul" >
                                <option <?php  if($VAR_ADUL == 1){echo "selected";} ?> >1</option>
                                <option <?php  if($VAR_ADUL == 2){echo "selected";} ?> >2</option>
                                <option <?php  if($VAR_ADUL == 3){echo "selected";} ?> >3</option>
                                <option <?php  if($VAR_ADUL == 4){echo "selected";} ?> >4</option>
                                <option <?php  if($VAR_ADUL == 5){echo "selected";} ?> >5</option>
                                <option <?php  if($VAR_ADUL == 6){echo "selected";} ?> >6</option>
                                <option <?php  if($VAR_ADUL == 7){echo "selected";} ?> >7</option>
                                <option <?php  if($VAR_ADUL == 8){echo "selected";} ?> >8</option>
                                <option <?php  if($VAR_ADUL == 9){echo "selected";} ?> >9</option>
							</select>
						</div>

						<div class="form-group uniform-input one-third">
							<label for="people">Children:</label>
							<select name="txtchil" id="txtchil" >
                                <option <?php  if($VAR_CHIL == 0){echo "selected";} ?> >0</option>
                                <option <?php  if($VAR_CHIL == 1){echo "selected";} ?> >1</option>
                                <option <?php  if($VAR_CHIL == 2){echo "selected";} ?> >2</option>
                                <option <?php  if($VAR_CHIL== 3){echo "selected";} ?> >3</option>
                                <option <?php  if($VAR_CHIL == 4){echo "selected";} ?> >4</option>
                                <option <?php  if($VAR_CHIL == 5){echo "selected";} ?> >5</option>
                                <option <?php  if($VAR_CHIL == 6){echo "selected";} ?> >6</option>
                                <option <?php  if($VAR_CHIL == 7){echo "selected";} ?> >7</option>
                                <option <?php  if($VAR_CHIL == 8){echo "selected";} ?> >8</option>
                                <option <?php  if($VAR_CHIL == 9){echo "selected";} ?> >9</option>
							</select>
						</div>

						<div class="form-group uniform-input one-third">
							<label for="people">Enfants:</label>
							<select name="txtenfa" id="txtenfa" >
                                <option <?php  if($VAR_ENFA == 0){echo "selected";} ?> >0</option>
                                <option <?php  if($VAR_ENFA == 1){echo "selected";} ?> >1</option>
                                <option <?php  if($VAR_ENFA == 2){echo "selected";} ?> >2</option>
                                <option <?php  if($VAR_ENFA == 3){echo "selected";} ?> >3</option>
                                <option <?php  if($VAR_ENFA == 4){echo "selected";} ?> >4</option>
                                <option <?php  if($VAR_ENFA == 5){echo "selected";} ?> >5</option>
                                <option <?php  if($VAR_ENFA == 6){echo "selected";} ?> >6</option>
                                <option <?php  if($VAR_ENFA == 7){echo "selected";} ?> >7</option>
                                <option <?php  if($VAR_ENFA == 8){echo "selected";} ?> >8</option>
                                <option <?php  if($VAR_ENFA == 9){echo "selected";} ?> >9</option>
							</select>
						</div>
                    </div>

               <div class="f-row">
						<div class="form-group radios">
							<div>
								<input type="radio" name="txttipo" id="return" value="round" onclick="$.cookie('txttipo',  'rt', { expires:1 });" />
								<label for="return"  >Round</label>
							</div>
							<div>
								<input type="radio" name="txttipo" id="oneway" value="oneway" checked  onclick="$.cookie('txttipo',  'ow', { expires:1 });" />
								<label for="oneway"  >One way</label>
							</div>
						</div>
						<div class="form-group right">
							<button type="submit" class="btn large black" id="enviar">Find a transfer</button>
						</div>
					</div>
					<!--// Row -->
				</form>
			</div>
		</div>


		
	</main>
	<!-- //Main -->


	 <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
	<script src="https://cdn.jsdelivr.net/jquery.ui.timepicker.addon/1.4.5/jquery-ui-timepicker-addon.min.js"></script>
    <script src="../js/jquery.cookie.js"></script>

	<script src="../js/jquery.uniform.min.js"></script>
	<script src="../js/jquery.slicknav.min.js"></script>
	<script src="../js/wow.min.js"></script>
	<script src="../js/search.js"></script>
	<script src="../js/scripts.js"></script>


  </body>



  <script>





          $.removeCookie('txtdate1', { path: '/' });
          $.removeCookie('txtdate1',  { path: '/' });
          $.removeCookie('txttime1',  { path: '/' });
          $.removeCookie('txtorig1',  { path: '/' });
          $.removeCookie('txtdest1',   { path: '/' });
          $.removeCookie('txtairl1',   { path: '/' });
          $.removeCookie('txtvuel1',  { path: '/' });

          $.removeCookie('txtdate2',   { path: '/' });
          $.removeCookie('txttime2',  { path: '/' });
          $.removeCookie('txtorig2',  { path: '/' });
          $.removeCookie('txtdest2',  { path: '/' });
          $.removeCookie('txtairl2',   { path: '/' });
          $.removeCookie('txtvuel2',  { path: '/' });

          $.removeCookie('txtadul',   { path: '/' });
          $.removeCookie('txtchil',  { path: '/' });
          $.removeCookie('txtenfa',  { path: '/' });

          $.removeCookie('txtcupo',  { path: '/' });








          $.cookie('txttipo',  'ow', { expires:1 });
    $( "#enviar" ).click(function() {
           $.cookie('txtdate1',  $("#txtdate1").val(), { expires:1 });
           $.cookie('txttime1',  $("#txttime1").val(), { expires:1 });
           $.cookie('txtorig1',  $("#txtorig1").val(), { expires:1 });
           $.cookie('txtdest1',  $("#txtdest1").val(), { expires:1 });
           $.cookie('txtairl1',  $("#txtairl1").val(), { expires:1 });
           $.cookie('txtvuel1',  $("#txtvuel1").val(), { expires:1 });

           $.cookie('txtdate2',  $("#txtdate2").val(), { expires:1 });
           $.cookie('txttime2',  $("#txttime2").val(), { expires:1 });
           $.cookie('txtorig2',  $("#txtorig2").val(), { expires:1 });
           $.cookie('txtdest2',  $("#txtdest2").val(), { expires:1 });
           $.cookie('txtairl2',  $("#txtairl2").val(), { expires:1 });
           $.cookie('txtvuel2',  $("#txtvuel2").val(), { expires:1 });

           $.cookie('txtadul',  $("#txtadul").val(), { expires:1 });
           $.cookie('txtchil',  $("#txtchil").val(), { expires:1 });
           $.cookie('txtenfa',  $("#txtenfa").val(), { expires:1 });

           $.cookie('txtcupo',  $("#txtcupo").val(), { expires:1 });




//           $.cookie('ck_nombre',    $("#txtdate1").val(), { expires: 7 });
//           $.cookie('ck_nombre',    $("#txtdate1").val(), { expires: 7 });
//           $.cookie('ck_nombre',    $("#txtdate1").val(), { expires: 7 });

         //  alert(  $.cookie('ck_nombre') );
        });

//    $("#txtdate1").val($.cookie('txtdate1'));

  </script>

</html>