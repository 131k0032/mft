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
	<?php include "header.php"; ?>
	<!-- //Header -->
	
	<!-- Main -->
	<main class="main" role="main">
		<!-- Page info -->
		<header class="site-title color">
			<div class="wrap">
				<div class="container">
					<h1>About us</h1>
					<nav role="navigation" class="breadcrumbs">
						<ul>
							<li><a href="./" title="Home">Home</a></li>
							<li>About us</li>
						</ul>
					</nav>
				</div>
			</div>
		</header>
		<!-- //Page info -->
		
		<div class="wrap">
			<div class="row">
				<!--- Content -->
				<div class="content three-fourth textongrey">
					<h2>Welcome to MFTravel Services</h2>
					<p class="lead" style="text-align:justify">Let us receive you with elegance and professionalism at Cancun Airport, our drivers and tour conductors will get in charge of your first step in Mexico. We look forward to help you with your luggage and provide you all information and aswer to all your questions upon arrival.</p>
					<p class=""  style="text-align:justify">For more than 16 years of experience in tourism, MFT will guarantee the highest standards of service for worldwide travelers , providing safety & facilities once you arrive to México.</p>
					<p class=""  style="text-align:justify">MFTravel, will offer you different options of transportation units we have available at your service and will take care of plenty touristic services that you will need during your stay in the Caribbean. Welcome Home!</p>
                    <div style="text-align:center">
                             <iframe style="width:90%;height:350px" src="https://www.youtube.com/embed/4BBdHDIMZWg?rel=0&amp;controls=1&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>

                    </div>
				</div>
				<!--- //Content -->

				<!--- Sidebar -->
				<aside class="one-fourth sidebar right offset">
					<!-- Widget -->
					<div class="widget">
					   <?php include "wiget-why.php"; ?>
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
	
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<script src="js/jquery.uniform.min.js"></script>
	<script src="js/jquery.slicknav.min.js"></script>
	<script src="js/wow.min.js"></script>
	<script src="js/scripts.js"></script>
  </body>
</html>