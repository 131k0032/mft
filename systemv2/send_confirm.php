<?php include "../db_conexion.php"   ?>
<?php


          $sql="select * from _excursiones where exc_id = ".$_GET["i"]." ";

          //  echo $sql;


          $rs = adoopenrecordset($sql);
          $rstemp = mysql_fetch_array($rs);

          $VAR_ADULT = explode(".",$rstemp['exc_pax']);


    require 'email/phpmailer/PHPMailerAutoload.php';

	$hotel_name = "MFT EXCURSIONS";
	$hotel_email = "excursiones@mft.com.mx";



	// Send Email to Guest

	$message = file_get_contents('email/excur_notif.php');



	$message = str_replace('[id]',      $rstemp['exc_id'], $message);
	$message = str_replace('[excur]',   $rstemp['exc_excu'], $message);
	$message = str_replace('[fech]',    $rstemp['exc_fech'], $message);
	$message = str_replace('[nomb]',    $rstemp['exc_invi'], $message);
	$message = str_replace('[mail]',    $rstemp['exc_mail'], $message);
	$message = str_replace('[adul]',    $VAR_ADULT[0], $message);
	$message = str_replace('[nino]',    $VAR_ADULT[1], $message);
	$message = str_replace('[infa]',    $VAR_ADULT[2], $message);
	$message = str_replace('[hotel]',   $rstemp['exc_hote'], $message);
	$message = str_replace('[date2]',   $rstemp['exc_fech'], $message);
	$message = str_replace('[hora]',    $rstemp['exc_hora'], $message);


	$mail = new PHPMailer;
	$mail->setFrom($hotel_email, $hotel_name);
	$mail->addAddress($rstemp['exc_mail'], $rstemp['exc_invi']);
	$mail->addAddress('gerenciaexcursiones@mft.com.mx', 'Excursiones MFT');
	$mail->Subject = $hotel_name.' Booking Request';
	$mail->MsgHTML($message);
	$mail->IsHTML(true);
	$mail->send();



?>
