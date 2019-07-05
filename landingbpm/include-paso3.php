<?php


include "../db_conexion.php";


$VAR_NAME ="";
$VAR_MOBI ="";
$VAR_EMA1 ="";
$VAR_EMA2 ="";
$VAR_DIRE ="";
$VAR_ZIP ="";
$VAR_CITY ="";
$VAR_COUN ="";
$VAR_PAYM ="";


  if(isset($_COOKIE["txtname"])){$VAR_NAME = $_COOKIE["txtname"]; }
  if(isset($_COOKIE["txtmobi"])){$VAR_MOBI = $_COOKIE["txtmobi"]; }
  if(isset($_COOKIE["txtema1"])){$VAR_EMA1 = $_COOKIE["txtema1"]; }
  if(isset($_COOKIE["txtema2"])){$VAR_EMA2 = $_COOKIE["txtema2"]; }
  if(isset($_COOKIE["txtdire"])){$VAR_DIRE = $_COOKIE["txtdire"]; }
  if(isset($_COOKIE["txtzip"])){$VAR_ZIP = $_COOKIE["txtzip"]; }
  if(isset($_COOKIE["txtcity"])){$VAR_CITY = $_COOKIE["txtcity"]; }
  if(isset($_COOKIE["txtcoun"])){$VAR_COUN = $_COOKIE["txtcoun"]; }
  if(isset($_COOKIE["txtpaym"])){$VAR_PAYM = $_COOKIE["txtpaym"]; }



 ?>

<!DOCTYPE html>
<html>
  <head>



	<link rel="stylesheet" href="css/theme-lblue.css" />
	<link rel="stylesheet" href="../css/style.css" />
	<link rel="stylesheet" href="../css/animate.css" />
	<link rel="stylesheet" href="../css/icons.css" />
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Raleway:400,500,600,700|Montserrat:400,700">
	<link rel="shortcut icon" href="../images/favicon.ico">
    <link rel="stylesheet" href="../font-awesome/css/font-awesome.min.css">

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

	
	<!-- Main -->
	<main class="main" role="main">
		<!-- Search -->

		<!-- //Search -->
		
		<div class="wrap">
			<div class="row">
				<!--- Content -->
				<div class="full-width content">
					<h2>Passenger details</h2>
					<p>Please ensure all of the required fields are completed at the time of booking. This information is imperative to ensure a smooth journey.<br />All fields are required.</p>
				</div>
				<!--- //Content -->
				
				<div class="full-width">
					<form role="form" action="include-pasof.php" method="post" >
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
							<div class="one-half">
								<label for="address">Street address</label>
								<input type="text" required id="txtdire" value="<?php echo $VAR_DIRE ?>" />
							</div>
							<div class="one-half">
								<label for="zip">Zip code</label>
								<input type="text" required id="txtzip" value="<?php echo $VAR_ZIP ?>" />
							</div>
						</div>
						<div class="f-row">
							<div class="one-half">
								<label for="city">City</label>
								<input type="text" required  id="txtcity" value="<?php echo $VAR_CITY ?>" />
							</div>
							<div class="one-half">
								<label for="country">Country</label>
								<input type="text" required id="txtcoun" value="<?php echo $VAR_COUN ?>" />
							</div>
						</div>
						<div class="f-row">
							<div class="one-half">
								<label for="payment">Select payment type</label>
								<select id="txtpaym">
                                      <!--  <?php mft_payment_method($VAR_PAYM) ?> -->

                                      <option value='Bank Transfer'  >Bank Transfer</option>"
                                      <option value='Paypal / CC'    >Paypal / CC</option>";
								</select>
							</div>
						</div>
						
						<div class="actions">
							<a href="include-paso2.php"        class="btn medium back">Go back</a>
                            <!--
                            <a href="transfers-paso3-mayan-fantasy-tours"   class="btn medium color right">Continue</a>
                            -->

                            	<button type="submit" class="btn medium color right" id="enviar">Continue</button>
						</div>
					</form>
				</div>
				

			</div>
		</div>
	</main>
	<!-- //Main -->


    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<script src="../js/jquery.uniform.min.js"></script>
	<script src="../js/jquery.slicknav.min.js"></script>
	<script src="../js/wow.min.js"></script>
	<script src="../js/scripts.js"></script>
    <script src="../js/jquery.cookie.js"></script>


  </body>


  <script>
    $( "#enviar" ).click(function() {
        //alert('');


           $.cookie('txtname',   $("#txtname").val(), { expires:1 });
           $.cookie('txtmobi',   $("#txtmobi").val(), { expires:1 });
           $.cookie('txtema1',   $("#txtema1").val(), { expires:1 });
           $.cookie('txtema2',   $("#txtema2").val(), { expires:1 });
           $.cookie('txtdire',   $("#txtdire").val(), { expires:1 });
           $.cookie('txtzip',    $("#txtzip").val(), { expires:1 });
           $.cookie('txtcity',   $("#txtcity").val(), { expires:1 });
           $.cookie('txtcoun',   $("#txtcoun").val(), { expires:1 });
           $.cookie('txtpaym',   $("#txtpaym").val(), { expires:1 });

        });


  </script>

</html>