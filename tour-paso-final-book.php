	<?php

        include "db_conexion.php";

//$VAR_NUM = substr(time(),-5);
$VAR_NUM = time();



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
	
	<title>Booking Tours - Final Step</title>
	
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
					<h1>Tour confirmed!</h1>
				</div>
			</div>
		</header>
		<!-- //Page info -->
		
		<div class="wrap">
			<div class="row">
				<div class="three-fourth">
					<form class="box readonly">


                    <!-- GUARDAR EN BASE DE DATOS -->
                    <?php

                        $sql="insert into _transfers
                    	(tipo,num,name,mobile,email,date1,orig1,dest1,adul,vehic,monto,payment)
                        values
                        ('tour',".$VAR_NUM.",'".$_COOKIE["txtname"]."','".$_COOKIE["txtmobi"]."','".$_COOKIE["txtema1"]."','".$_COOKIE["txtdate1"]."','".$_COOKIE["txtorig1"]."','".strtoupper($_COOKIE["txtdest1"])."',".$_COOKIE["txtpers"].",'".$_COOKIE["txtvehi"]."','".$_COOKIE["txtmont"]."','".$_COOKIE["txtpaym"]."')
                        ";

                    //    echo $sql;


                        adoexecute($sql);

                   ?>



                    <!-- ENVIAR CORREO A CLIENTE -->

                          <?php


                          $message = "
                         <html>
                         <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
                         <body style='font-family:Montserrat;font-size:15px'>
                            <div style='width:80%;margin:auto;background-color:aliceblue;padding:10px;'>
                                <div><img src='http://www.mft.com.mx/images/transfers.jpg' alt='' /></div>
                                <div><p style='font-size:20px'>Dear <b>".$_COOKIE["txtname"]."</b>, your booking info:</p></div>
                            	<div><h3>Passenger details</h3></div>
                                <div>Booking #:  <b>".substr($VAR_NUM,-5)."</b></div>
                                <div>Name and surname:  <b>".$_COOKIE["txtname"]."</b></div>
        						<div>Mobile number:     <b>".$_COOKIE["txtmobi"]."</b></div>
                                <div>Email address:     <b>".$_COOKIE["txtema1"]."</b></div>
                                <div>Adults:      <b>".$_COOKIE["txtpers"]."</b></div>
                                <div>Child:      <b>".$_COOKIE["txtchil"]."</b></div>
                                <div>Vehicle:      <b>".$_COOKIE["txtvehi"]."</b></div>
                                <div>Payment Method:      <b>".$_COOKIE["txtpaym"]."</b></div>
                                <hr>
        						<div><h3>Tour</h3></div>
                                <div>Date:         <b>".$_COOKIE["txtdate1"]."</b></div>
                                <div>From:         <b>".$_COOKIE["txtorig1"]."</b></div>
                                <div>Tour:           <b>".strtoupper($_COOKIE["txtdest1"])."</b></div>
                                ";


                         $message = $message ."
                            <hr>
                            <div style='padding:10px;font-size:25px;color:white;background-color:black'>$".$_COOKIE["txtmont"]." USD</div>
                            <hr>
                            <div>
                                <p>
                                    <br><b>NEED HELP ?</b>
                                    <br>Call our customer services team on the number below to speak to one of our advisors who will help you with all of your needs. +52 (984) 179 27 45 / reservastransfers@mft.com.mx
                                </p>
                            </div>

                            </div></body></html>";

                               //  echo $message;


                                  	$to = "reservastransfers@mft.com.mx,".$_COOKIE['txtema1']."";
                                	$subject = '*** Booking info (TOUR) #'.substr($VAR_NUM,-5);
                                	$headers  = 'MIME-Version: 1.0' . "\r\n";
                                	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
                                	$headers .= 'From: Bookings MFT <reservastransfers@mft.com.mx>' . "\r\n";
                                  	if(mail($to, $subject, $message, $headers)) {
                                        echo  "<br>Successfully sent!";
                                      } else {
                                        echo "<br>Mailer Error: // Please call +52 (984) 179 27 45";
                                      }


                          ?>




                    <!-- ENVIAR CORREO A STAFF -->



						<h3>Dear <?php echo $_COOKIE["txtname"] ?></h3>
						<div class="f-row">
							<div class="one">
                            you transfer is confirmed #<span style="font-size:25px"><?php echo substr($VAR_NUM,-5) ?></span>, you will soon receive an email with payment details.
                            <br>An executive of our company will contact you shortly.





                            <br><br>Thank you! </div>



						</div>

					</form>
                     <hr>
                     <div style="text-align:center">
                 <h2>PAY YOU NOW AND GUARANTEE YOUR RESERVATION</h2>
                                                                        <form name="frm" action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_blank">
                                                                                <!--<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">-->
                                                                                <input type="hidden"    name="cmd"           id="cmd"           value="_xclick">
                                                                                <input type="hidden"    name="business"      id="business"      value="mfsales@playatoursmft.com">
                                                                                <input type="hidden"   name="item_name"      id="item_name"     value="<?php echo $_COOKIE["txtname"] ?>">
                                                                                <input type="hidden"   name="item_number"    id="item_number"   value="TOUR: <?php echo substr($VAR_NUM,-5) ?> | <?php echo strtoupper($_COOKIE["txtdest1"])." | Adults: ".$_COOKIE["txtpers"]." | Child: ".$_COOKIE["txtchil"]  ?>">
                                                                                <input type="hidden"   name="amount"         id="amount"        value="<?php echo $_COOKIE["txtmont"] ?>">
                                                                                <input type="hidden"    name="quantity"      id="quantity"      value="1">
                                                                                <input type="hidden"   name="no_note"        id="no_note"       value="<?php echo substr($VAR_NUM,-5) ?>">
                                                                                <input type="hidden"    name="currency_code" id="currency_code" value="USD">
                                                                                <input type="hidden" name="image_url" value="http://www.playatoursmft.com/images/transfers.jpg">



                                                                                <input type="image" name="submit" id="btnpago" border="0"
                                                                                src="images/btnpago.png"  style="visibility:hidden2"
                                                                                alt="PayPal - The safer, easier way to pay online" value="comprar">
                                                                      </form>

              </div>

  <script>

  /*  borra cookies */
 /*
  var cookies = document.cookie.split(";");

    for (var i = 0; i < cookies.length; i++) {
    	var cookie = cookies[i];
    	var eqPos = cookie.indexOf("=");
    	var name = eqPos > -1 ? cookie.substr(0, eqPos) : cookie;
    	document.cookie = name + "=;expires=Thu, 01 Jan 1970 00:00:00 GMT";
    }

 */

</script>

				</div>
				
				<!--- Sidebar -->
				<aside class="one-fourth sidebar right">
					<!-- Widget -->
					<div class="widget">
					   <?php include "wiget-needhelp.php" ?>
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