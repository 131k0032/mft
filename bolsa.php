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



	<title>Bolsa de Trabajo Transfers - <?php echo $VAR_CIA ?></title>

	

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

    <style>



    .cv_attached {

	background-color: white;

	padding: 10px 20px 10px;

	position: absolute;

	left: 50%;

    top: 50%;

    transform: translate(-50%,-50%);

    border: 2px solid #c0c0c0;

    }



    hr {

    	color: #c0c0c0;

    }

    	.label-form{

			color: #4bb5c1;

			font-size: 14px;

			font-weight: 600;

			padding-bottom: 5px;

			display: block;

			text-align: center;

    	}



    	.file-upload {

	position: relative;

	display: inline-block;

}



.file-upload__label {

  display: block;

  padding: 1em 2em;

  color: #fff;

  background: #4BB5C1;

  border-radius: .4em;

  transition: background .3s;

  

 

}

   

    .file-upload__label:hover {

     cursor: pointer;

    background: #191F26 !important;

    color: #fff !important;

  } 

.file-upload__input {

    position: absolute;

    left: 0;

    top: 0;

    right: 0;

    bottom: 0;

    font-size: 1;

    width:0;

    height: 100%;

    opacity: 0;

}



.cerrar {

	padding-bottom: 0px;

	padding-right: 5px;



}

    </style>

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

					<h1>Bolsa de Trabajo</h1>

					<nav role="navigation" class="breadcrumbs">

						<ul>

							<li><a href="./" title="Home">Home</a></li>

							<li>Bolsa de Trabajo</li>

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

					<h2>Bolsa de trabajo</h2>

                    <h1>¿TE GUSTARÍA FORMAR PARTE DEL EQUIPO DE MFT?</h1>

                    <br>

					<p class="lead" style="text-align:justify">Te invitamos a unirte y desarrollarte con nosotros, para juntos seguir distinguiéndonos como una empresa con un alto nivel de servicio especializado.</p>

					<h1 style="text-align:center">



                      Si estás interesado, envíanos tu CV:

                      <br><b>vacantes@mft.com.mx   </b>

					  <br>

					  <p>O adjunta tu CV y nosotros te contactaremos.</p>

					  <button id='pdf_upload' style="background-color:#4bb5c1; color: white;text-align: center;">¡Click aquí para subir tu CV!</button>





                    </h1>

                    <br>&nbsp;&nbsp;



                <div class="content fourth-fourth">

                       <?php

                         $sql="select *  from _bolsa order by bol_date desc ";

                         $rs = adoopenrecordset($sql);

                         while($rstemp = mysql_fetch_array($rs)){

                       ?>





                       <div style="border:1px double silver; padding:20px " >



                           <div style="float:left; width:100%; text-align:left">Vacante en:</div>

                           <div style="float:left; width:100%">&nbsp;&nbsp;<b style="font-size:25; color: #28509F" ><?php echo strtoupper($rstemp["bol_titu"]) ?></b> </div>

                           <div style="float:left; width:20%; text-align:right">Edad:</div> <div style="float:left; width:80%">&nbsp;&nbsp;<b><?php echo $rstemp["bol_edad"] ?></b> </div>

                           <div style="float:left; width:20%; text-align:right">Escolaridad:</div> <div style="float:left; width:80%">&nbsp;&nbsp;<b><?php echo $rstemp["bol_esco"] ?></b> </div>

                           <div style="float:left; width:20%; text-align:right">Idioma:</div> <div style="float:left; width:80%">&nbsp;&nbsp;<b><?php echo $rstemp["bol_idio"] ?></b> </div>

                           <div style="float:left; width:20%; text-align:right">Experiencia:</div> <div style="float:left; width:80%">&nbsp;&nbsp;<b><?php echo $rstemp["bol_expe"] ?></b> </div>

                           <div style="float:left; width:100%; text-align:justify"><br><?php echo $rstemp["bol_desc"] ?> </div>





                           <div style="clear:both"></div>



                       </div>





                       <?php }  ?>

				</div>

				<!-- FORM -->

				<div class="row cv_attached">

					<div class="fourth-fourth">

						<div class="full-width cerrar">

							<button  id="btn-cerrar" class="right fa fa-times btn fa-lg" style="background-color: #d9534f; color: white;"></button>

						</div>

						<form action="contact_cv.php" method="post" enctype="multipart/form-data">

						<h1 style="text-align: center;"><strong>¡Trabaje con nosotros!</strong></h1>

						<hr>

						<div class="one-half">

							<label for="name" class="label-form">*Nombre y Apellidos</label>

							<input type="text" id="name" name="name" pattern="[a-zA-Z\u00C0-\u024F\u1E00-\u1EFF\s]+" required/>

						</div>

						<div class="one-half">

							<label for="telefono" class="label-form">*Teléfono de contacto</label>

							<input type="number" id="telefono" name="telefono" required/>

						</div>

						<div class="one-half">

							<label for="email" class="label-form">*Correo electrónico</label>

							<input type="email" id="email" name="email" required/>

						</div>

						<div class="one-half">

							<label for="posicion" class="label-form">*Posición de interés</label>

							<input type="text" id="posicion" name="posicion" required/>

						</div>

						<div class="f-row">

							<div class="full-width">

								<label for="comments" class="label-form">*Mensaje</label>

								<textarea id="comments" name="comments" required></textarea>

							</div>

						</div>

						<div class="f-row">

							<div class="file-upload">

							    <label for="upload" class="file-upload__label">Adjuntar CV</label>

							    <input id="upload" class="file-upload__input" type="file" name="file-upload" required accept=".pdf,.doc">

							</div>

							<!-- <button class="btn color medium" style="text-align: left;">Adjuntar CV</button> -->

							<input type="submit" value="Enviar" id="submit" name="submit" class="btn color medium right" />

						</div>

						</form>						

					</div>

				</div>

				<!-- FORM -->



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

	<script>

		$(document).ready(function() {

    		

			$('#pdf_upload').on('click',function(){



				$('.cv_attached').show();



			});



			$('#btn-cerrar').on('click',function(){

				$('.cv_attached').hide();

			});



			$('.cv_attached').hide();



		});

	</script>

  </body>

</html>