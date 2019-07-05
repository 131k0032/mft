<?php

    include "db_conexion.php";


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

    $VAR_OTR1 = "";
    $VAR_OTR2 = "";
    $VAR_OTR3 = "";
    $VAR_OTR4 = "";

    $VAR_CUPO = "";

    $VAR_TIPO = "";


    if(isset($_COOKIE["txtdate1"])){$VAR_DATE1 = $_COOKIE["txtdate1"]; }
    if(isset($_COOKIE["txttime1"])){$VAR_TIME1 = $_COOKIE["txttime1"]; }
    if(isset($_COOKIE["txtorig1"])){$VAR_ORIG1 = $_COOKIE["txtorig1"]; }
    if(isset($_COOKIE["txtdest1"])){$VAR_DEST1 = $_COOKIE["txtdest1"]; }
    if(isset($_COOKIE["txtvuel1"])){$VAR_VUEL1 = $_COOKIE["txtvuel1"]; }
    if(isset($_COOKIE["txtairl1"])){$VAR_AIRL1 = $_COOKIE["txtairl1"]; }

    if(isset($_COOKIE["txtdate2"])){$VAR_DATE2 = $_COOKIE["txtdate2"]; }
    if(isset($_COOKIE["txttime2"])){$VAR_TIME2 = $_COOKIE["txttime2"]; }
    if(isset($_COOKIE["txtorig2"])){$VAR_ORIG2 = $_COOKIE["txtorig2"]; }
    if(isset($_COOKIE["txtdest2"])){$VAR_DEST2 = $_COOKIE["txtdest2"]; }
    if(isset($_COOKIE["txtvuel2"])){$VAR_VUEL2 = $_COOKIE["txtvuel2"]; }
    if(isset($_COOKIE["txtairl2"])){$VAR_AIRL2 = $_COOKIE["txtairl2"]; }

    if(isset($_COOKIE["txtadul"])){$VAR_ADUL = $_COOKIE["txtadul"]; }
    if(isset($_COOKIE["txtchil"])){$VAR_CHIL = $_COOKIE["txtchil"]; }
    if(isset($_COOKIE["txtenfa"])){$VAR_ENFA = $_COOKIE["txtenfa"]; }

    if(isset($_COOKIE["txtotr1"])){$VAR_OTR1 = $_COOKIE["txtotr1"]; }
    if(isset($_COOKIE["txtotr2"])){$VAR_OTR2 = $_COOKIE["txtotr2"]; }
    if(isset($_COOKIE["txtotr3"])){$VAR_OTR3 = $_COOKIE["txtotr3"]; }
    if(isset($_COOKIE["txtotr4"])){$VAR_OTR4 = $_COOKIE["txtotr4"]; }


    if(isset($_COOKIE["txtcupo"])){$VAR_CUPO = $_COOKIE["txtcupo"]; }
    if(isset($_COOKIE["txttipo"])){$VAR_TIPO = $_COOKIE["txttipo"]; }





?>
<!DOCTYPE html>
<html>
   <head>
    <?php include "zoopim.php" ?>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="keywords" content="Mayan Fantasy Tours, is a destination management company, that operates Cancun & Rivera Maya main turistic services. For more than 20 years of experience Mayan Fantasy Tours, can offer qualified touristic services all travelers every year." />
	<meta name="description" content="Mayan Fantasy Tours, is a destination management company, that operates Cancun & Rivera Maya main turistic services. For more than 20 years of experience Mayan Fantasy Tours, can offer qualified touristic services all travelers every year.">
	<meta name="author" content="themeenergy.com">
	
	<title>Airport Transfers Playa del Carmen | <?php echo $VAR_CIA ?></title>
	
	<link rel="stylesheet" href="css/theme-lblue.css" />
	<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
	<link rel="stylesheet" href="css/jquery-ui.theme.css" />
	<link rel="stylesheet" href="css/style.css" />
	<link rel="stylesheet" href="css/animate.css" />
	<link rel="stylesheet" href="css/icons.css" />
	<link href='http://fonts.googleapis.com/css?family=Raleway:400,500,600,700|Montserrat:400,700' rel='stylesheet' type='text/css'>
	<link rel="shortcut icon" href="images/favicon.ico" />
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">




	
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
<?php include "header.php" ?>
	<!-- Main -->
	<main class="main" role="main">
		<!-- Intro -->
		<div class="intro">
			<div class="wrap">
				<div class="textwidget">
					<h1 class="wow fadeInDown">Need a Transfer?</h1>
					<h2 class="wow fadeInUp">You've come to the right place.</h2>

					<div class="actions">
						<a href="#services" title="Our services" class="btn large white wow fadeInLeft anchor">Our services</a>
						<a href="#booking2" title="Make a booking" class="btn large color wow fadeInRight anchor">Make a booking</a>
					</div>
				</div>
			</div>

<div style="padding:10px;margin-top:10px;">
      <div id="video-bg">


     <!--   <video muted autoplay controls id="myvid" >-->

     <iframe id="myvid" style="height:300px;" src="https://www.youtube.com/embed/4BBdHDIMZWg?rel=0&controls=1&autoplay=1&showinfo=0"
        frameborder="0" allowfullscreen></iframe>
         <div id="booking2" style="padding-top:50px"></div>
        <!--
          Buttons or metadata go here
        -->
      </div>


 </div>


		</div>
		<!-- //Intro -->

		<!-- Search -->




		<div class="advanced-search color" id="booking">
			<div class="wrap">
				<form role="form" action="transfers1-mayan-fantasy-tours" method="post">
					<!-- Row -->
					<div class="f-row">


           <div style="border-bottom:1px solid silver;paddin-bottom:10px;margin-bottom:10px">
            <h2 style="color:#FFFFFF;text-align:center">We have receptionist in each terminal of the airport,
            <br>who will be waiting for you with a banner with your name on it</h2>

            </div>



                      <div>
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
							<select  required name="txtorig1" id="txtorig1"  >
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
                        <div style="clear:both"></div>
                      </div>

						<div class="form-group uniform-input text one-fourth"  id="hotel1" style="">
							<label for="txtotr1">HOTEL PICKUP</label>
							<!--<input required type="text" id="dep-date" name="txtdate1" />-->
							<input  type="text"  id="txtotr1" name="txtotr1"  value="<?php echo $VAR_OTR1 ?>" />
						</div>


						<div class="form-group uniform-input text one-fourth"  id="hotel2" style="">
							<label for="txtotr2">HOTEL DROP OFF</label>
							<!--<input required type="text" id="dep-date" name="txtdate1" />-->
							<input  type="text"  id="txtotr2" name="txtotr2"  value="<?php echo $VAR_OTR2 ?>" />
						</div>


                       <!--
						<div class="form-group uniform-input text one-fourth">
							<label for="txtairl1">Airline</label>

							<input  type="text" required id="txtairl1" name="txtairl1"  value="<?php echo $VAR_AIRL1; ?>" />
						</div>
                       -->

						<div class="form-group uniform-input text one-fourth">
							<label for="txtvuel1">Flight #</label>
							<!--<input required type="text" id="dep-date" name="txtdate1" />-->
							<input  type="text"  required id="txtvuel1" name="txtvuel1"  value="<?php echo $VAR_VUEL1; ?>" />
						</div>


						<div class="form-group uniform-input text one-fourth">
							<label for="txtcupo">Cupon</label>
							<!--<input required type="text" id="dep-date" name="txtdate1" />-->
							<input  type="text"   id="txtcupo" name="txtcupo"  value="<?php echo $VAR_CUPO; ?>" />
						</div>





					</div>
					<!-- //Row -->
					
					<!-- Row -->
					<div class="f-row">
                     <div>
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
							<select name="txtorig2" id="txtorig2" >
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
                       <div style="clear:both"></div>
                      </div>

						<div class="form-group uniform-input text one-fourth"  id="hotel3" style="">
							<label for="txtotr3">HOTEL PICKUP</label>
							<!--<input required type="text" id="dep-date" name="txtdate1" />-->
							<input  type="text"  id="txtotr3" name="txtotr3"  value="<?php echo $VAR_OTR3 ?>" />
						</div>


						<div class="form-group uniform-input text one-fourth"  id="hotel4" style="">
							<label for="txtotr4">HOTEL DROP OFF</label>
							<!--<input required type="text" id="dep-date" name="txtdate1" />-->
							<input  type="text"  id="txtotr4" name="txtotr4"  value="<?php echo $VAR_OTR4 ?>" />
						</div>


                          <!--
						<div class="form-group uniform-input text one-fourth">
							<label for="txtairl2">Airline</label>
							<input  type="text" id="txtairl2" name="txtairl2" value="<?php echo $VAR_AIRL2; ?>"/>
						</div>
                        -->

						<div class="form-group uniform-input text one-fourth">
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
								<input type="radio" name="txttipo" id="return" onclick="$.cookie('txttipo',  'rt', { expires:1 });" value="round" />
								<label for="return"  >Round</label>
							</div>
							<div>
								<input type="radio" name="txttipo" id="oneway" onclick="$.cookie('txttipo',  'ow', { expires:1 });" value="oneway" checked />
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
		<!-- //Search -->
		
		<!-- Services iconic -->



		<div class="services iconic white">
			<div class="wrap">
				<div class="row">
					<!-- Item -->
					<div class="one-third wow fadeIn">
						<span class="circle"><span class="icon  icon-themeenergy_savings"></span></span>
						<h3>Fixed rates</h3>
						<p>All prices are fixed, no hidden costs</p>
					</div>
					<!-- //Item -->
					
					<!-- Item -->
					<div class="one-third wow fadeIn" data-wow-delay=".2s">
						<span class="circle"><span class="icon icon-themeenergy_lockpad"></span></span>
						<h3>Reliable transfers</h3>
						<p>We specialize in transfer within Playa del Carmen</p>
					</div>
					<!-- //Item -->
					
					<!-- Item -->
					<div class="one-third wow fadeIn" data-wow-delay=".4s">
						<span class="circle"><span class="icon icon-themeenergy_open-wallet"></span></span>
						<h3>No booking fees</h3>
						<p>Book your transfers at no extra charge</p>
					</div>
					<!-- //Item -->
					
					<!-- Item -->
					<div class="one-third wow fadeIn">
						<span class="circle"><span class="icon icon-themeenergy_heart"></span></span>
						<h3>Free cancellation</h3>
						<p>No charge for cancellations with advance notice</p>
					</div>
					<!-- //Item -->
					
					<!-- Item -->
					<div class="one-third wow fadeIn" data-wow-delay=".2s">
						<span class="circle"><span class="icon icon-themeenergy_magic-trick"></span></span>
						<h3>Booking flexibility</h3>
						<p>We make transfers tailored to the needs of your trip</p>
					</div>
					<!-- //Item -->
					
					<!-- Item -->
					<div class="one-third wow fadeIn" data-wow-delay=".4s">
						<span class="circle"><span class="icon icon-themeenergy_call"></span></span>
						<h3>24h customer service</h3>
						<p>We have a 24/7  staff ready to serve you</p>
					</div>
					<!-- //Item -->
					
					<!-- Item -->
					<div class="one-third wow fadeIn">
						<span class="circle"><span class="icon icon-themeenergy_cup"></span></span>
						<h3>Award winning service</h3>
						<p>Our service has been recognized by the international tourism industry</p>
					</div>
					<!-- //Item -->
					
					<!-- Item -->
					<div class="one-third wow fadeIn" data-wow-delay=".2s">
						<span class="circle"><span class="icon icon-themeenergy_attach"></span></span>
						<h3>Benefits for partners</h3>
						<p>We work with the most recognized brands of tourism in Mexico</p>
					</div>
					<!-- //Item -->
					
					<!-- Item -->
					<div class="one-third wow fadeIn" data-wow-delay=".4s">
						<span class="circle"><span class="icon icon-themeenergy_stars"></span></span>
						<h3>Quality vehicles</h3>
						<p>All our vehicles have high standards of safety and service.</p>
					</div>
					<!-- //Item -->
				</div>
			</div>
		</div>
		<!-- //Services iconic -->
		
		<!-- Call to action -->
		<div class="black cta">
			<div class="wrap">
				<p class="wow fadeInLeft">Ready to travel? see our services & tours</p>
				<a href="service-transfers-riviera-maya" class="btn huge color right wow fadeInRight">Our Services</a>
			</div>
		</div>
		<!-- //Call to action -->
		
		<!-- Services -->
		<div class="services boxed white" id="services">
			<!-- Item -->
			<article class="one-fourth wow fadeIn">
				<figure class="featured-image">
					<img src="images/chichen.jpg" alt="" />
					<div class="overlay">
						<a href="chichen-itza-tour-mft" class="expand">+</a>
					</div>
				</figure>
				<div class="details" style="text-align:center">
					<h4 ><a href="chichen-itza-tour-mft" >TOUR CHICHEN SUNRISE</a></h4>
					<a class="more" title="Read more" href="chichen-itza-tour-mft">Read more</a>
				</div>
			</article>
			<!-- //Item -->
			
			<!-- Item -->
			<article class="one-fourth wow fadeIn">
				<figure class="featured-image">
					<img src="images/coba.jpg" alt="" />
					<div class="overlay">
						<a href="coba-tulum-tour-mft" class="expand">+</a>
					</div>
				</figure>
				<div class="details" style="text-align:center">
					<h4 ><a href="coba-tulum-tour-mft" >TOUR COBA-TULUM SUNSET</a></h4>
					<a class="more" title="Read more" href="coba-tulum-tour-mft">Read more</a>
				</div>
			</article>
			<!-- //Item -->
			
			<!-- Item -->
			<article class="one-fourth wow fadeIn">
				<figure class="featured-image">
					<img src="images/tulum.jpg" alt="" />
					<div class="overlay">
						<a href="tulum-tour-mft" class="expand">+</a>
					</div>
				</figure>
				<div class="details" style="text-align:center">
					<h4 ><a href="tulum-tour-mft" >TOUR TULUM REEF</a></h4>
					<a class="more" title="Read more" href="tulum-tour-mft">Read more</a>
				</div>
			</article>
			<!-- //Item -->
			
			<!-- Item -->
			<article class="one-fourth wow fadeIn">
				<figure class="featured-image">
					<img src="images/transfers2.jpg" alt="" />
					<div class="overlay">
						<a href="#booking2" class="expand">+</a>
					</div>
				</figure>
				<div class="details" style="text-align:center">
					<h4 ><a href="#booking2" >AIRPORT TRANSFERS</a></h4>
					<a class="more" title="Read more" href="#booking2">Read more</a>
				</div>
			</article>
			<!-- //Item -->			
		</div>
		<!-- //Services -->
		
		<!-- Testimonials -->
		<div class="testimonials center black">
			<div class="wrap">
				<h6 class="wow fadeInDown"><i class="fa fa-quote-left"></i>Welcome to MFT Travel Services!  <i class="fa fa-quote-right"></i></h6>
				<p class="wow fadeInUp">For more than <?php echo date("Y")-1997 ?> years of experience in tourism, MFT will guarantee the highest standards of service for worldwide travelers , providing safety & facilities once you arrive to México.</p>
				<!--<p class="meta wow fadeInUp">-John Doe, themeforest</p>-->
			</div>
		</div>
		<!-- //Testimonials -->

		<div class="partners white center">
			<div class="wrap">
				<h2 class="wow fadeIn">Our partners</h2>
				<div class="one-fifth wow fadeIn">
			<a target="_blank" href="https://shareasale.com/r.cfm?b=921660&amp;u=2099877&amp;m=32794&amp;urllink=&amp;afftrack="><img src="https://static.shareasale.com/image/32794/logo_xcaret.jpg" border="0" alt="Visit Xcaret Park. A tour through mexican culture, traditions and more." /></a>
				</div>
				<div class="one-fifth wow fadeIn" data-wow-delay=".2s">
				    <a target="_blank" href="https://shareasale.com/r.cfm?b=921664&amp;u=2099877&amp;m=32794&amp;urllink=&amp;afftrack="><img src="https://static.shareasale.com/image/32794/logo_xelha.jpg" border="0" alt="Visit Xel-Há all inclusive Park. Snorquel in the carribean plus all you can eat and drink at paradise." /></a>
				</div>
				<div class="one-fifth wow fadeIn" data-wow-delay=".4s">
				    <a target="_blank" href="https://shareasale.com/r.cfm?b=922180&amp;u=2099877&amp;m=32794&amp;urllink=&amp;afftrack="><img src="https://static.shareasale.com/image/32794/logo_xplor.jpg" border="0" alt="Visit Xplor Park.  Enjoy Ziplines, Anphibios, Underground rivers and more. Buffet and soft drinks included." /></a>
				    </div>
				<div class="one-fifth wow fadeIn" data-wow-delay=".6s">
				    <a target="_blank" href="https://shareasale.com/r.cfm?b=922602&amp;u=2099877&amp;m=32794&amp;urllink=&amp;afftrack="><img src="https://static.shareasale.com/image/32794/logo_xenotes.jpg" border="0" alt="Tour Xenotes Oasis Maya conect with nature, mysticism and adventures. Kayak, Rappel all inclusive. " /></a>
				    </div>
				<div class="one-fifth" data-wow-delay=".8s">
				    <a target="_blank" href="https://shareasale.com/r.cfm?b=922596&amp;u=2099877&amp;m=32794&amp;urllink=&amp;afftrack="><img src="https://static.shareasale.com/image/32794/logo_xichen.jpg" border="0" alt="Tour Xichen guide tour to Chichen Itza pyramids, yucatan buffet meal and transportation." /></a>
				</div>
				
			</div>
		</div>
		
	</main>
	<!-- //Main -->
	
<?php include "footer.php" ?>
	 <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
	<script src="https://cdn.jsdelivr.net/jquery.ui.timepicker.addon/1.4.5/jquery-ui-timepicker-addon.min.js"></script>
    <script src="js/jquery.cookie.js"></script>

	<script src="js/jquery.uniform.min.js"></script>
	<script src="js/jquery.slicknav.min.js"></script>
	<script src="js/wow.min.js"></script>
	<script src="js/search.js"></script>
	<script src="js/scripts.js"></script>
  </body>



  <script>

    $("#hotel1").hide();
    $("#hotel2").hide();
    $("#hotel3").hide();
    $("#hotel4").hide();



    if($.cookie('txtorig1')=="* OTHER HOTEL"){ $("#hotel1").show(); }
    if($.cookie('txtdest1')=="* OTHER HOTEL"){ $("#hotel2").show(); }
    if($.cookie('txtorig2')=="* OTHER HOTEL"){ $("#hotel3").show(); }
    if($.cookie('txtdest2')=="* OTHER HOTEL"){ $("#hotel4").show(); }


 $.cookie('txttipo',  "ow", { expires:1 });
 




  $("#txtorig1").change(
        function(){
            if($("#txtorig1").val()=='* OTHER HOTEL'){
                    $("#hotel1").show("slow");
             }

            if($("#txtorig1").val()!='* OTHER HOTEL'){
                   $("#txtotr1").val("");
                   $("#hotel1").hide("slow");

            }
      });



  $("#txtdest1").change(
        function(){
            if($("#txtdest1").val()=='* OTHER HOTEL'){
                 $("#hotel2").show("slow");
            } else {

                  $("#hotel2").hide("slow");
                     $("#txtotr2").val("");
            }
      });


    $("#txtorig2").change(
        function(){
            if($("#txtorig2").val()=='* OTHER HOTEL'){
                 $("#hotel3").show("slow");
            } else {
                $("#hotel3").hide("slow");
                   $("#txtotr3").val("");
            }
      });



  $("#txtdest2").change(
        function(){
            if($("#txtdest2").val()=='* OTHER HOTEL'){
                  $("#hotel4").show("slow");
            } else {

                  $("#hotel4").hide("slow");
                     $("#txtotr4").val("");
            }
      });


    $( "#enviar" ).click(function() {
           // alert($("#txtorig1").val()+''+$("#hotel1").val());


           $.cookie('txtdate1', $("#txtdate1").val(), { expires:1 });
           $.cookie('txttime1', $("#txttime1").val(), { expires:1 });
           $.cookie('txtotr1',  $("#txtotr1").val(), { expires:1 });
           $.cookie('txtotr2',  $("#txtotr2").val(), { expires:1 });


           $.cookie('txtorig1',  $("#txtorig1").val(), { expires:1 });
           $.cookie('txtdest1',  $("#txtdest1").val(), { expires:1 });
      //     $.cookie('txtairl1',  $("#txtairl1").val(), { expires:1 });
           $.cookie('txtvuel1',  $("#txtvuel1").val(), { expires:1 });

           $.cookie('txtdate2',  $("#txtdate2").val(), { expires:1 });
           $.cookie('txttime2',  $("#txttime2").val(), { expires:1 });
           $.cookie('txtorig2',  $("#txtorig2").val(), { expires:1 });
           $.cookie('txtdest2',  $("#txtdest2").val(), { expires:1 });

           $.cookie('txtotr3',  $("#txtotr3").val(), { expires:1 });
           $.cookie('txtotr4',  $("#txtotr4").val(), { expires:1 });


     //      $.cookie('txtairl2',  $("#txtairl2").val(), { expires:1 });
           $.cookie('txtvuel2',  $("#txtvuel2").val(), { expires:1 });

           $.cookie('txtadul',  $("#txtadul").val(), { expires:1 });
           $.cookie('txtchil',  $("#txtchil").val(), { expires:1 });
           $.cookie('txtenfa',  $("#txtenfa").val(), { expires:1 });


           $.cookie('txtcupo',  $("#txtcupo").val(), { expires:1 });

//           $.cookie('txttipo',  $("#txttipo").val(), { expires:1 });




//           $.cookie('ck_nombre',    $("#txtdate1").val(), { expires: 7 });
//           $.cookie('ck_nombre',    $("#txtdate1").val(), { expires: 7 });
//           $.cookie('ck_nombre',    $("#txtdate1").val(), { expires: 7 });

         //  alert(  $.cookie('ck_nombre') );
        });

//    $("#txtdate1").val($.cookie('txtdate1'));

  </script>

</html>