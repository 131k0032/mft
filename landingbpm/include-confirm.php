	<?php

        include "../db_conexion.php";

//$VAR_NUM = substr(time(),-5);




        ?>
<!DOCTYPE html>
<html>
  <head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="keywords" content="Transfers - Private Transport and Car Hire HTML Template" />
	<meta name="description" content="Transfers - Private Transport and Car Hire HTML Template">
	<meta name="author" content="themeenergy.com">
	
	<title>Transfers - Booking step 3</title>
	
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
		<!-- Page info -->
		<header class="site-title color">
			<div class="wrap">
				<div class="container">
				<!--	<h1>Thank you. Your booking is now confirmed.</h1> -->
					<h1>Transfer confirmed!</h1>
				</div>
			</div>
		</header>
		<!-- //Page info -->
		
		<div class="wrap">
			<div class="row">
				<div class="full-widht">
					<form class="box readonly">


                    <!-- GUARDAR EN BASE DE DATOS -->
                    <?php



                   //     $sql="insert into _transfers  (payment,num,name,mobile,email,street,zipcode,city,country,date1,time1,orig1,dest1,airl1,vuel1,date2,time2,orig2,dest2,vuel2,airl2,adul,chil,enfa,vehic,monto) values  ('".$_COOKIE["txtpaym"]."',".$VAR_NUM.",'".$_COOKIE["txtname"]."','".$_COOKIE["txtmobi"]."','".$_COOKIE["txtema1"]."','".$_COOKIE["txtdire"]."','".$_COOKIE["txtzip"]."','".$_COOKIE["txtcity"]."','".$_COOKIE["txtcoun"]."','".$_COOKIE["txtdate1"]."','".$_COOKIE["txttime1"]."','".$_COOKIE["txtorig1"]."','".$_COOKIE["txtdest1"]."','".$_COOKIE["txtairl1"]."','".$_COOKIE["txtvuel1"]."','".$_COOKIE["txtdate2"]."','".$_COOKIE["txttime2"]."','".$_COOKIE["txtorig2"]."','".$_COOKIE["txtdest2"]."','".$_COOKIE["txtvuel2"]."','".$_COOKIE["txtairl2"]."','".$_COOKIE["txtadul"]."','".$_COOKIE["txtchil"]."','".$_COOKIE["txtenfa"]."','".$_COOKIE["txtvehi"]."','".$_COOKIE["txtmont"]."')";

                        $VAR_NUM = (time());
                        $sql="insert into _transfers  (payment,num,name,mobile,email,street,zipcode,city,country,date1,time1,orig1,dest1,vuel1,adul,chil,enfa,vehic,monto,cupo) values  ('".
                        $_COOKIE["txtpaym"]."',".
                        $VAR_NUM.",'".
                        addslashes($_COOKIE["txtname"])."','".
                        addslashes($_COOKIE["txtmobi"])."','".
                        addslashes($_COOKIE["txtema1"])."','".
                        addslashes($_COOKIE["txtdire"])."','".
                        addslashes($_COOKIE["txtzip"])."','".
                        addslashes($_COOKIE["txtcity"])."','".
                        addslashes($_COOKIE["txtcoun"])."','".
                        $_COOKIE["txtdate1"]."','".
                        $_COOKIE["txttime1"]."','".
                        $_COOKIE["txtorig1"]."','".
                        $_COOKIE["txtdest1"]."','".
                        $_COOKIE["txtvuel1"]."','".
                        $_COOKIE["txtadul"]."','".
                        $_COOKIE["txtchil"]."','".
                        $_COOKIE["txtenfa"]."','".
                        $_COOKIE["txtvehi"]."','".
                        $_COOKIE["txtmont"]."','".
                        $_COOKIE["txtcupo"]."')";
                 //      echo $sql;

                         adoexecute($sql);

                    if($_COOKIE["txtdate2"]!=""){
                      $VAR_NUM2 = (time());
                        $sql="insert into _transfers  (payment,num,name,mobile,email,street,zipcode,city,country,date1,time1,orig1,dest1,vuel1,adul,chil,enfa,vehic,monto,cupo)
                        values  ('".
                        $_COOKIE["txtpaym"]."',".
                        $VAR_NUM2.",'".
                        addslashes($_COOKIE["txtname"])."','".
                        addslashes($_COOKIE["txtmobi"])."','".
                        addslashes($_COOKIE["txtema1"])."','".
                        addslashes($_COOKIE["txtdire"])."','".
                        addslashes($_COOKIE["txtzip"])."','".
                        addslashes($_COOKIE["txtcity"])."','".
                        $_COOKIE["txtcoun"]."','".
                        $_COOKIE["txtdate2"]."','".
                        $_COOKIE["txttime2"]."','".
                        $_COOKIE["txtorig2"]."','".
                        $_COOKIE["txtdest2"]."','".
                        $_COOKIE["txtvuel2"]."','".
                        $_COOKIE["txtadul"]."','".
                        $_COOKIE["txtchil"]."','".
                        $_COOKIE["txtenfa"]."','".
                        $_COOKIE["txtvehi"]."','".
                        $_COOKIE["txtmont"]."','".
                        $_COOKIE["txtcupo"]."')";
                         adoexecute($sql);

                          //   echo "<br><br>".$sql;


                     }



                   ?>



                    <!-- ENVIAR CORREO A CLIENTE -->

                          <?php


                          $message = "
                         <html>
                         <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
                         <body style='font-family:Montserrat;font-size:15px'>
                            <div style='width:80%;margin:auto;background-color:aliceblue;padding:10px;'>
                                <div><img src='http://www.mft.com.mx/images/transfers.jpg' alt='' /></div>
                                <div><p style='font-size:20px'>Dear <b>".$_COOKIE["txtname"]."</b>, your book transfer info:</p></div>
                            	<div><h3>Passenger details</h3></div>
                                <div>Name and surname:  <b>".$_COOKIE["txtname"]."</b></div>
        						<div>Mobile number:     <b>".$_COOKIE["txtmobi"]."</b></div>
                                <div>Email address:     <b>".$_COOKIE["txtema1"]."</b></div>
                                <div>Street address:    <b>".$_COOKIE["txtdire"]."</b></div>
                                <div>Zip code:          <b>".$_COOKIE["txtzip"]." </b></div>
                                <div>City:              <b>".$_COOKIE["txtcity"]."</b></div>
                                <div>Country:           <b>".$_COOKIE["txtcoun"]."</b></div>
                                <div>People:      <b>Adult ".$_COOKIE["txtadul"]." | Child ".$_COOKIE["txtchil"]." | Enfants ".$_COOKIE["txtenfa"]."</b></div>
                                <div>Vehicle:      <b>".$_COOKIE["txtvehi"]."</b></div>
                                <div>Payment Method:      <b>".$_COOKIE["txtpaym"]."</b></div>
                                <hr>
        						<div><h3>Transfer details</h3></div>
                                <div>Booking #:  <b>".substr($VAR_NUM,-5)."</b></div>
                                <div>Date:         <b>".$_COOKIE["txtdate1"]." ".$_COOKIE["txttime1"]."</b></div>
                                <div>From:         <b>".$_COOKIE["txtorig1"]."</b></div>
                                <div>To:           <b>".$_COOKIE["txtdest1"]."</b></div>
                                <div>Flight #:           <b>".$_COOKIE["txtvuel1"]."</b></div>
                                <div>Cupon:           <b>".$_COOKIE["txtcupo"]."</b></div>
                                <div>Amount:      <b>$".$_COOKIE["txtmont"]." USD</b></div>
                                ";


                         if($_COOKIE["txtdate2"]!=""){
                            $message = $message."
                                <hr>
        						<div><h3>Transfer details</h3></div>
                                 <div>Booking #:   <b>".substr($VAR_NUM2,-5)."</b></div>
                                <div>Date:         <b>".$_COOKIE["txtdate2"]." ".$_COOKIE["txttime2"]."</b></div>
                                <div>From:         <b>".$_COOKIE["txtorig2"]."</b></div>
                                <div>To:           <b>".$_COOKIE["txtdest2"]."</b></div>
                                <div>Flight #:           <b>".$_COOKIE["txtvuel2"]."</b></div>
                                <div>Amount:      <b>$".$_COOKIE["txtmont"]." USD</b></div>
                            ";

                         }


                         $message = $message ."
                            <hr>
                            <div style='padding:10px;font-size:25px;color:white;background-color:rgba(34, 34, 34, 1)'>$".$_COOKIE["txttota"]." USD</div>
                            <hr>
                            <div>
                                <p>
                                    <br><b>NEED HELP ?</b>
                                    <br>Call our customer services team on the number below to speak to one of our advisors who will help you with all of your needs. +52 (984) 155 49 20 / sales@playatoursmft.com
                                </p>
                            </div>

                            </div></body></html>";

                         //   echo $message;


                                   	$to = "sales@playatoursmft.com,bpm@mft.com.mx,".$_COOKIE['txtema1']."";
                                  //	$to = "bpm@mft.com.mx";

//                                    echo $to;

                                	$subject = '*** YOUR BPM TRANSFER INFO Booking #'.substr($VAR_NUM,-5);
                                	$headers  = 'MIME-Version: 1.0' . "\r\n";
                                	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
                                	$headers .= 'From: Sales MFT <sales@playatoursmft.com>' . "\r\n";
                                  	if(mail($to, $subject, $message, $headers)) {
                                        echo  "<br>Successfully sent!";
                                      } else {
                                        echo "<br>Mailer Error: // Please call +52 (984) 206 2754 / +52 (984) 179 2745";
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
				

			</div>
		</div>
	</main>
	<!-- //Main -->

	<!-- //Footer -->

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<script src="../js/jquery.uniform.min.js"></script>
	<script src="../js/jquery.slicknav.min.js"></script>
	<script src="../js/wow.min.js"></script>
	<script src="../js/scripts.js"></script>
  </body>
</html>