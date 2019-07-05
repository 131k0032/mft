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
	
	<title>Transfers - <?php echo $VAR_CIA ?></title>
	
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
  
  <body onload="initialize()">
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
	<?php include "header.php"; ?>
	
	<!-- Main -->
	<main class="main" role="main">
		<!-- Page info -->
		<header class="site-title color">
			<div class="wrap">
				<div class="container">
					<h1>Contact us</h1>
					<nav role="navigation" class="breadcrumbs">
						<ul>
							<li><a href="index.html" title="Home">Home</a></li>
							<li>Contact</li>
						</ul>
					</nav>
				</div>
			</div>
		</header>
		<!-- //Page info -->

		
		<div class="wrap">
			<div class="row">
				
				<!--- Content -->
				<div class="full-width content textongrey">
					<h2>Send us a message</h2>
					<!--<p>Soon one of our representatives will contact you. All fields are required.</p>-->
				</div>
				<!--- //Content -->

				<!-- Form -->
				<div class="three-fourth">
					<form method="post" action="contact_form_message.php" name="contactform" id="contactform">
						<div id="message"></div>

						<div class="f-row">
							<div class="full-width">
								<label for="name">Name and surname</label>
								<input type="text" id="name" name="name" required placeholder="Karl Smith Williams" />
							</div>

						</div>

						<div class="f-row">							
							<div class="one-half">
								<label for="email">Email address</label>
								<input type="email" id="email" name="email" required  placeholder="karl@gmail.com"/>
							</div>
							<div class="one-half">
								<label for="phone">Phone</label>
								<input type="text" id="phone" name="phone" required placeholder="765 987 8763" />
							</div>							
						</div>
						
						<div class="f-row">
							<div class="full-width">
								<label for="comments">Message</label>
								<textarea id="comments" name="comments" required placeholder="Hello I will arrive in Cancun in a few days and I would like to receive more information about their services"></textarea>
							</div>
						</div>
						<div class="f-row">
							<input type="submit" value="Submit" id="submit" name="submit" class="btn color medium right" />
						</div>
					</form>
				</div>
				<!-- //Form -->
				
				<!--- Sidebar -->
				<aside class="one-fourth sidebar right">
					<!-- Widget -->
					<div class="widget">
					  <?php include "wiget-needhelp.php"; ?>
					</div>
					<!-- //Widget -->
					
					<!-- Widget -->
					<div class="widget">
					   <?php include "wiget-promo.php"; ?>
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

	<script src="js/infobox.js"></script>
	<script src="js/wow.min.js"></script>
	<script src="js/scripts.js"></script>
	

  </body>
</html>