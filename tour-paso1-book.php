<?php


include "db_conexion.php";


$VAR_NAME ="";
$VAR_MOBI ="";
$VAR_EMA1 ="";
$VAR_EMA2 ="";
$VAR_PERS ="";
$VAR_CHIL ="";
$VAR_ORIG1 ="";
$VAR_DEST1 ="";
$VAR_VEHI ="";
$VAR_DATE1 ="";
$VAR_PAYM ="";


  if(isset($_COOKIE["txtname"])){$VAR_NAME = $_COOKIE["txtname"]; }
  if(isset($_COOKIE["txtmobi"])){$VAR_MOBI = $_COOKIE["txtmobi"]; }
  if(isset($_COOKIE["txtema1"])){$VAR_EMA1 = $_COOKIE["txtema1"]; }
  if(isset($_COOKIE["txtema2"])){$VAR_EMA2 = $_COOKIE["txtema2"]; }
  if(isset($_COOKIE["txtpers"])){$VAR_PERS = $_COOKIE["txtpers"]; }
  if(isset($_COOKIE["txtchil"])){$VAR_CHIL = $_COOKIE["txtchil"]; }
  if(isset($_COOKIE["txtorig1"])){$VAR_ORIG1 = $_COOKIE["txtorig1"]; }
  if(isset($_COOKIE["txtdest1"])){$VAR_DEST1 = $_COOKIE["txtdest1"]; }
  if(isset($_COOKIE["txtvehi"])){$VAR_VEHI = $_COOKIE["txtvehi"]; }
  if(isset($_COOKIE["txtdate1"])){$VAR_DATE1 = $_COOKIE["txtdate1"]; }
  if(isset($_COOKIE["txtpaym"])){$VAR_PAYM = $_COOKIE["txtpaym"]; }



 ?>

<!DOCTYPE html>
<html>
  <head>
      <?php include "zoopim.php" ?>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="keywords" content="Transfers - Private Transport and Car Hire HTML Template" />
	<meta name="description" content="Transfers - Private Transport and Car Hire HTML Template">
	<meta name="author" content="themeenergy.com">

	<title>Book a Private Tour - <?php echo $VAR_CIA ?></title>

	<link rel="stylesheet" href="css/theme-lblue.css" />
	<link rel="stylesheet" href="css/style.css" />
	<link rel="stylesheet" href="css/animate.css" />
	<link rel="stylesheet" href="css/icons.css" />
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Raleway:400,500,600,700|Montserrat:400,700">
	<link rel="shortcut icon" href="images/favicon.ico">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  
  <body>
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
	
    <!-- Header -->
    <?php include "header.php" ?>
	
	<!-- Main -->
	<main class="main" role="main">
		<!-- Search -->
<div class="output color twoway">
			<div class="wrap">
				<div>
					<p id="">PLEASE FILL ALL BOOK INFORMATION </p>
				</div>

			</div>
		</div>
		<!-- //Search -->
		
		<div class="wrap">
			<div class="row">
				<!--- Content -->
				<div class="full-width content">
					<h2>PRIVATE TOUR Passenger details</h2>
					<p>Please ensure all of the required fields are completed at the time of booking. This information is imperative to ensure a smooth journey.<br />All fields are required.</p>
				</div>
				<!--- //Content -->
				
				<div class="three-fourth">
					<form role="form" action="tour-paso2-booking" method="post" >

					<div class="f-row">
						<div class="form-group datepicker one-half" >
							<label for="txtdate1">Departure date </label>
							<!--<input required type="text" id="dep-date" name="txtdate1" />-->
							<input required type="date" id="txtdate1" name="txtdate1" value="<?php echo $VAR_DATE1; ?>" />
						</div>


							<div class="one-half">
								<label for="payment">Tour</label>
								<select id="txtdest1" >
                                        <?php mft_combo_tours('') ?>
								</select>
                                <span>* Collective tours available only on Toyota Hice</span>
							</div>

					</div>


						<div class="f-row">
							<div class="one-half">
								<label for="name">Name and surname</label>
								<input type="text" required id="txtname" value="<?php echo $VAR_NAME ?>" />
							</div>
							<div class="one-half">
								<label for="number">Mobile number</label>
								<input type="number" required id="txtmobi" value="<?php echo $VAR_MOBI ?>" />
							</div>
						</div>
						<div class="f-row">
							<div class="one-half">
								<label for="email">Email address</label>
								<input type="email" required id="txtema1" value="<?php echo $VAR_EMA1 ?>" />
							</div>
							<div class="one-half">
								<label for="email2">Confirm email address</label>
								<input type="email" required id="txtema2" value="<?php echo $VAR_EMA2 ?>" />
							</div>
						</div>


						<div class="f-row">
							<div class="one-fourth">
								<label for="txtpers">Adults</label>
								<select id="txtpers">
									<option <?php  if($VAR_PERS=="1")           { echo "selected"; }  ?> >1</option>
									<option <?php  if($VAR_PERS=="2")           { echo "selected"; }  ?> >2</option>
									<option <?php  if($VAR_PERS=="3")           { echo "selected"; }  ?> >3</option>
									<option <?php  if($VAR_PERS=="4")           { echo "selected"; }  ?> >4</option>
									<option <?php  if($VAR_PERS=="5")           { echo "selected"; }  ?> >5</option>
									<option <?php  if($VAR_PERS=="6")           { echo "selected"; }  ?> >6</option>
									<option <?php  if($VAR_PERS=="7")           { echo "selected"; }  ?> >7</option>
									<option <?php  if($VAR_PERS=="8")           { echo "selected"; }  ?> >8</option>
									<option <?php  if($VAR_PERS=="9")           { echo "selected"; }  ?> >9</option>
									<option <?php  if($VAR_PERS=="10")           { echo "selected"; }  ?> >10</option>
									<option <?php  if($VAR_PERS=="11")           { echo "selected"; }  ?> >11</option>
									<option <?php  if($VAR_PERS=="12")           { echo "selected"; }  ?> >12</option>
									<option <?php  if($VAR_PERS=="13")           { echo "selected"; }  ?> >13</option>
									<option <?php  if($VAR_PERS=="14")           { echo "selected"; }  ?> >14</option>

								</select>
							</div>

							<div class="one-fourth">
								<label for="txtchil">Child</label>
								<select id="txtchil">
									<option <?php  if($VAR_CHIL=="0")           { echo "selected"; }  ?> >0</option>
									<option <?php  if($VAR_CHIL=="1")           { echo "selected"; }  ?> >1</option>
									<option <?php  if($VAR_CHIL=="2")           { echo "selected"; }  ?> >2</option>
									<option <?php  if($VAR_CHIL=="3")           { echo "selected"; }  ?> >3</option>
									<option <?php  if($VAR_CHIL=="4")           { echo "selected"; }  ?> >4</option>
									<option <?php  if($VAR_CHIL=="5")           { echo "selected"; }  ?> >5</option>
									<option <?php  if($VAR_CHIL=="6")           { echo "selected"; }  ?> >6</option>
									<option <?php  if($VAR_CHIL=="7")           { echo "selected"; }  ?> >7</option>
									<option <?php  if($VAR_CHIL=="8")           { echo "selected"; }  ?> >8</option>
									<option <?php  if($VAR_CHIL=="9")           { echo "selected"; }  ?> >9</option>
									<option <?php  if($VAR_CHIL=="10")           { echo "selected"; }  ?> >10</option>
									<option <?php  if($VAR_CHIL=="11")           { echo "selected"; }  ?> >11</option>
									<option <?php  if($VAR_CHIL=="12")           { echo "selected"; }  ?> >12</option>
									<option <?php  if($VAR_CHIL=="13")           { echo "selected"; }  ?> >13</option>
									<option <?php  if($VAR_CHIL=="14")           { echo "selected"; }  ?> >14</option>

								</select>
							</div>



							<div class="one-half">
								<label for="payment">From</label>
          							<select name="txtorig1" id="txtorig1" >
                                             <option value="hotel-cancun">Cancun</option>
                                             <option value="hotel-pdc">Playa del Carmen</option>
                                             <option value="hotel-riviera-maya">Riviera Maya</option>
                                           <!--

                                          <optgroup label="Airports">             <?php listado("airport-cancun"        ,$VAR_ORIG1); ?>      </optgroup>
                                          <optgroup label="Cancun Hotels">        <?php  listado("hotel-cancun"   ,$VAR_ORIG1); ?> </optgroup>
                                          <optgroup label="Riviera Maya Hotels">  <?php  listado("hotel-riv-maya" ,$VAR_ORIG1); ?> </optgroup>
                                          <optgroup label="Tulum Hotels">         <?php  listado("hotel-tulum"    ,$VAR_ORIG1); ?> </optgroup>
                                          -->

          							</select>
							</div>

						</div>

                	<div class="f-row">


							<div class="one-half">
								<label for="payment">VEHICLE</label>
          							<select name="txtvehi" id="txtvehi" >

                                         <?php mft_vehiculos('') ?>
          							</select>
							</div>

							<div class="one-half">
								<label for="payment">Select payment type</label>
								<select id="txtpaym">
                                        <?php mft_payment_method($VAR_PAYM) ?>
								</select>
							</div>

						</div>



						<div class="actions">
						 <!--	<a href="transfers1-mayan-fantasy-tours"        class="btn medium back">Go back</a>
                         -->
                            <!--
                            <a href="transfers-paso3-mayan-fantasy-tours"   class="btn medium color right">Continue</a>
                            -->

                            	<button type="submit" class="btn medium color right" id="enviar">Continue</button>
						</div>
					</form>
				</div>
				
				<!--- Sidebar -->
				<aside class="one-fourth sidebar right">
					<!-- Widget -->
					<div class="widget"><?php include "wiget-promo.php" ?></div>
					<div class="widget"><?php include "wiget-needhelp.php" ?></div>
					<!-- //Widget -->
				</aside>
				<!--- //Sidebar -->
			</div>
		</div>
	</main>
	<!-- //Main -->

 	<?php include "footer.php"; ?>
	
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<script src="js/jquery.uniform.min.js"></script>
	<script src="js/jquery.slicknav.min.js"></script>
	<script src="js/wow.min.js"></script>
	<script src="js/scripts.js"></script>
    <script src="js/jquery.cookie.js"></script>


  </body>


  <script>

 $("#enviar").click(
             function(){
             if( $("#txtdest1 option:selected").val()=="tulum reef"){        $("#txtvehi").val("hiace").change(); }
             if( $("#txtdest1 option:selected").val()=="coba tulum sunset"){ $("#txtvehi").val("hiace").change(); }
             if( $("#txtdest1 option:selected").val()=="chichen sunrise"){   $("#txtvehi").val("hiace").change(); }


 }
 );


  $("#txtdest1").change(
        function(){
           // alert($("#txtdest1 option:selected").val());

             if( $("#txtdest1 option:selected").val()=="tulum reef"){        $("#txtvehi").val("hiace").change(); }
             if( $("#txtdest1 option:selected").val()=="coba tulum sunset"){ $("#txtvehi").val("hiace").change(); }
             if( $("#txtdest1 option:selected").val()=="chichen sunrise"){   $("#txtvehi").val("hiace").change(); }




        }
  );




    $("#txtpers").change(
       function(){

      //   alert();


       });




    $( "#enviar" ).click(function() {
        //alert('');


           $.cookie('txtname',   $("#txtname").val(), { expires:1 });
           $.cookie('txtmobi',   $("#txtmobi").val(), { expires:1 });
           $.cookie('txtema1',   $("#txtema1").val(), { expires:1 });
           $.cookie('txtema2',   $("#txtema2").val(), { expires:1 });
           $.cookie('txtpers',   $("#txtpers").val(), { expires:1 });
           $.cookie('txtchil',   $("#txtchil").val(), { expires:1 });
           $.cookie('txtdest1',  $("#txtdest1").val(), { expires:1 });
           $.cookie('txtorig1',  $("#txtorig1").val(), { expires:1 });
           $.cookie('txtvehi',   $("#txtvehi").val(), { expires:1 });
           $.cookie('txtdate1',  $("#txtdate1").val(), { expires:1 });
           $.cookie('txtpaym',   $("#txtpaym").val(), { expires:1 });


        });


  </script>

</html>