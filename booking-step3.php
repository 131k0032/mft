	<?php include "db_conexion.php"; ?>
<!DOCTYPE html>
<html>
  <head>
      <?php include "zoopim.php" ?>           
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="keywords" content="Transfers - Private Transport and Car Hire HTML Template" />
	<meta name="description" content="Transfers - Private Transport and Car Hire HTML Template">
	<meta name="author" content="themeenergy.com">
	
	<title>Transfers - Booking step 3</title>
	
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

	<?php include "header.php" ?>

	<!-- Main -->
	<main class="main" role="main">
		<!-- Page info -->
		<header class="site-title color">
			<div class="wrap">
				<div class="container">
				<!--	<h1>Thank you. Your booking is now confirmed.</h1> -->
					<h1>Please confirm all information</h1>
				</div>
			</div>
		</header>
		<!-- //Page info -->
		
		<div class="wrap">
			<div class="row">
				<div class="three-fourth">
					<form class="box readonly">
						<h3>Passenger details</h3>
						<div class="f-row">
							<div class="one-fourth">Name and surname</div>
							<div class="three-fourth"><?php echo $_COOKIE["txtname"] ?></div>
						</div>
						<div class="f-row">
							<div class="one-fourth">Mobile number</div>
							<div class="three-fourth"><?php echo $_COOKIE["txtmobi"] ?></div>
						</div>
						<div class="f-row">
							<div class="one-fourth">Email address</div>
							<div class="three-fourth"><?php echo $_COOKIE["txtema1"] ?></div>
						</div>
						<div class="f-row">
							<div class="one-fourth">Street address</div>
							<div class="three-fourth"><?php echo $_COOKIE["txtdire"] ?></div>
						</div>
						<div class="f-row">
							<div class="one-fourth">Zip code</div>
							<div class="three-fourth"><?php echo $_COOKIE["txtzip"] ?></div>
						</div>
						<div class="f-row">
							<div class="one-fourth">City</div>
							<div class="three-fourth"><?php echo $_COOKIE["txtcity"] ?></div>
						</div>
						<div class="f-row">
							<div class="one-fourth">Country</div>
							<div class="three-fourth"><?php echo $_COOKIE["txtcoun"] ?></div>
						</div>

						<h3>Departure Transfer details</h3>
						<div class="f-row">
							<div class="one-fourth">Date</div>
							<div class="three-fourth"><?php echo $_COOKIE["txtdate1"] ?> <?php echo $_COOKIE["txttime1"] ?></div>
						</div>
						<div class="f-row">
							<div class="one-fourth">From</div>
							<div class="three-fourth"><?php echo $_COOKIE["txtorig1"]." ".$_COOKIE["txtotr1"] ?></div>
						</div>
						<div class="f-row">
							<div class="one-fourth">To</div>
							<div class="three-fourth"><?php echo $_COOKIE["txtdest1"]." ".$_COOKIE["txtotr2"] ?></div>
						</div>
                        <!--
						<div class="f-row">
							<div class="one-fourth">Airline</div>
							<div class="three-fourth"><?php echo $_COOKIE["txtairl1"] ?></div>
						</div>
                        -->
						<div class="f-row">
							<div class="one-fourth">Flight #</div>
							<div class="three-fourth"><?php echo $_COOKIE["txtvuel1"] ?></div>
						</div>

						<div class="f-row">
							<div class="one-fourth">Vehicle</div>
							<div class="three-fourth"><?php echo $_COOKIE["txtvehi"] ?></div>
						</div>
						<div class="f-row">
							<div class="one-fourth">People</div>
							<div class="three-fourth"><?php echo $_COOKIE["txtadul"] ?> Adults | <?php echo $_COOKIE["txtchil"] ?> Child | <?php echo $_COOKIE["txtenfa"] ?> Enfants</div>
						</div>
						<div class="f-row">
							<div class="one-fourth">Payment Method</div>
							<div class="three-fourth"><?php echo $_COOKIE["txtpaym"] ?> </div>
						</div>                        
						<div class="f-row">
							<div class="one-fourth">Amount</div>
							<div class="three-fourth">$<?php echo $_COOKIE["txtmont"] ?></div>
						</div>

			<div class="f-row">
							<div class="one-fourth">Cupon</div>
							<div class="three-fourth"><?php echo $_COOKIE["txtcupo"] ?></div>
						</div>


                        


                <?php if($_COOKIE["txtdate2"] != "" ){   ?>
						<h3>Return Transfer details</h3>
						<div class="f-row">
							<div class="one-fourth">Date</div>
							<div class="three-fourth"><?php echo $_COOKIE["txtdate2"] ?> <?php echo $_COOKIE["txttime1"] ?></div>
						</div>
						<div class="f-row">
							<div class="one-fourth">From</div>
							<div class="three-fourth"><?php echo $_COOKIE["txtorig2"]." ".$_COOKIE["txtotr3"] ?></div>
						</div>
						<div class="f-row">
							<div class="one-fourth">To</div>
							<div class="three-fourth"><?php echo $_COOKIE["txtdest2"]." ".$_COOKIE["txtotr4"] ?></div>
						</div>
                      <!--
						<div class="f-row">
							<div class="one-fourth">Airline</div>
							<div class="three-fourth"><?php echo $_COOKIE["txtairl2"] ?></div>
						</div>
                        -->
						<div class="f-row">
							<div class="one-fourth">Flight #</div>
							<div class="three-fourth"><?php echo $_COOKIE["txtvuel2"] ?></div>
						</div>

						<div class="f-row">
							<div class="one-fourth">Amount</div>
							<div class="three-fourth">$<?php echo $_COOKIE["txtmont"] ?></div>
						</div>





                <?php  } ?>

						<h3>TOTAL: $<?php echo $_COOKIE["txttota"] ?> USD</h3>
					</form>

						<div class="actions">
							<a href="transfers-paso2-mayan-fantasy-tours"           class="btn medium back">Go back</a>
                            <a href="transfers-paso-final-mayan-fantasy-tours"        class="btn medium color right">Confirm</a>

						</div>
				</div>
				
				<!--- Sidebar -->
				<aside class="one-fourth sidebar right">
					<!-- Widget -->
					<div class="widget">
					   <?php include "wiget-needhelp.php" ?>
					</div>
					<!-- //Widget -->
					
					<!-- Widget -->
					<div class="widget">
						 <?php include "wiget-promo.php" ?>
					</div>
					<!-- //Widget -->
				</aside>
				<!--- //Sidebar -->
			</div>
		</div>
	</main>
	<!-- //Main -->
	
 	<?php include "footer.php"; ?>
	<!-- //Footer -->

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<script src="js/jquery.uniform.min.js"></script>
	<script src="js/jquery.slicknav.min.js"></script>
	<script src="js/wow.min.js"></script>
	<script src="js/scripts.js"></script>
  </body>
</html>