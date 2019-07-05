<?php


include "db_conexion.php";

$VAR_DEL = mft_zona($_COOKIE["txtorig1"]);
$VAR_AL  = mft_zona($_COOKIE["txtdest1"]);
$VAR_TIPO = "ow";
$VAR_PASAJEROS = $_COOKIE["txtadul"] + $_COOKIE["txtchil"] + $_COOKIE["txtenfa"];

if($_COOKIE["txtdest2"]!=""){$VAR_ROUND = 2;}else{$VAR_ROUND=1;}

if(isset($_COOKIE["txttipo"])){$VAR_TIPO = $_COOKIE["txttipo"]; }


  ?>
<!DOCTYPE html>
<html>
  <head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="keywords" content="Transfers - Private Transport and Car Hire HTML Template" />
	<meta name="description" content="Transfers - Private Transport and Car Hire HTML Template">
	<meta name="author" content="themeenergy.com">
	
	<title>Transfers - Search results</title>
	
	<link rel="stylesheet" href="css/theme-lblue.css" />
	<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
	<link rel="stylesheet" href="css/jquery-ui.theme.css" />
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

	<!-- Main -->
	<main class="main" role="main">
		<!-- Search -->
		<?php include "row-top.php" ?>



		<!-- //Search -->
		
		<div class="wrap">
			<div class="row">
				<!--- Content -->
				<div class="full-width content">
					<h2>Select transfer type for your TRIP</h2>

					<div class="results">
                    <input type="hidden" name="sel"  id="sel" />
						<!-- Item -->
            <?php
            $sql = "select * from _precios where
               ((de = '".$VAR_DEL."' and a = '".$VAR_AL."')
                or (a = '".$VAR_DEL."' and de = '".$VAR_AL."') ) and hasta >= ".$VAR_PASAJEROS." and tipo = '".$VAR_TIPO."' and vehiculo <> 'mercedes' ";

        // echo $sql;


          $rs = adoopenrecordset($sql);
          $num =  mysql_num_rows($rs);
          if($num==0){
            echo '<b>THE COMBINATION CHOSEN BETWEEN ORIGIN AND DESTINATION IS NOT VALID,
            <br>PLEASE CALL +52 (984) 155 49 20  </b>
          	<br><br><a href="./#booking2"  class="btn grey large">BACK</a>
           ';

          }

            $rs = adoopenrecordset($sql);
            while($rstemp = mysql_fetch_array($rs)){
            ?>
						<article class="result" style="height:250px">
							<div class="one-fourth heightfix"><img src="images/<?php echo $rstemp["vehiculo"]?>.png" alt="" /></div>
							<div class="one-half heightfix">
								<h3><?php echo  $rstemp["vehiculo"]?> <a href="javascript:void(0)" class="trigger color" title="Read more">?</a></h3>
								<ul>
									<li>
										<span class="icon icon-themeenergy_user-3"></span>
										<p>Max <strong><?php echo $rstemp["hasta"]?> people</strong> <br />per vehicle</p>
									</li>
									<li>
										<span class="icon icon-themeenergy_travel-bag"></span>
										<p>Max <strong><?php echo $rstemp["capacidad"]?> suitcases</strong> <br />per vehicle</p>
									</li>
									<li>
										<span class="icon icon-themeenergy_clock"></span>
										<p>Estimated time <br /><strong><?php  echo $rstemp["time"]?> mins</strong></p>
									</li>
								</ul>
							</div>
							<div class="one-fourth heightfix">
								<div>
									<div class="price"><?php echo $rstemp["precio"]?> <small>USD</small></div>
									<span class="meta">per vehicle</span>
									<a href="transfers-paso2-mayan-fantasy-tours" id="btnsel"
                                            onclick="javascript:$('#sel').val('<?php echo $rstemp["vehiculo"]?>|<?php echo $rstemp["precio"]?>|<?php echo $VAR_ROUND ?>');
                                         var data = $('#sel').val();
                                         var arr = data.split('|');
                                        $.cookie('txtvehi',  arr[0]         , { expires:1 });
                                        $.cookie('txtmont',  arr[1]  , { expires:1 });
                                        $.cookie('txttota',  arr[1]*arr[2]  , { expires:1 });


                                    "  class="btn grey large">select</a>
								</div>
							</div>
							<div class="full-width information">
								<a href="javascript:void(0)" class="close color" title="Close">x</a>
								<p>.</p>
							</div>
						</article>

<?php
    }
?>


					</div>
				</div>

			</div>
		</div>
	</main>
	<!-- //Main -->
	
	<!-- Footer -->
  <?php include "footer.php"; ?>
	<!-- //Footer -->

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
	<script src="https://cdn.jsdelivr.net/jquery.ui.timepicker.addon/1.4.5/jquery-ui-timepicker-addon.min.js"></script>
	<script src="js/jquery.uniform.min.js"></script>
	<script src="js/jquery.slicknav.min.js"></script>
	<script src="js/wow.min.js"></script>
	<script src="js/search.js"></script>
	<script src="js/scripts.js"></script>
    <script src="js/jquery.cookie.js"></script>

  </body>

<script>


</script>



</html>