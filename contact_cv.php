<?php 
require 'systemv2/email/phpmailer/PHPMailerAutoload.php';  // phpmailer

$FORM_NOMBRE = $_POST['name'];

$FORM_TELEFONO = $_POST['telefono'];

$FORM_EMAIL = $_POST['email'];

$FORM_COMM = $_POST['comments'];

$FORM_POSICION = $_POST['posicion'];

$FORM_ATTATCHMENT = $_FILES["file-upload"]["tmp_name"];


$mail = new PHPMailer(true);
$mail->CharSet = 'UTF-8';
$mail->From     = "{$FORM_EMAIL}";;
$mail->FromName = "{$FORM_NOMBRE}";
$mail->AddAddress("vacantes@mft.com.mx");

$mail->WordWrap = 50;
$mail->IsHTML(true);

$mail->Subject  =  "Vacante mft para posición: {$FORM_POSICION}";
$mail->Body     =  "{$FORM_COMM}";
if (isset($_FILES["file-upload"]) && $_FILES["file-upload"]['error'] == UPLOAD_ERR_OK 
	&& ($_FILES['file-upload']['type'] == "application/pdf" ||  $_FILES['file-upload']['type'] == "application/vnd.openxmlformats-officedocument.wordprocessingml.document")) {
	
    $mail->AddAttachment($_FILES["file-upload"]['tmp_name'],
                         $_FILES["file-upload"]['name']);
}
else {
	echo "<script>
		   		alert('Su correo no es un archivo PDF o un archivo de Word');
	 				window.location.assign('bolsa-de-trabajo-transfers');
				</script>";
}



####################### MAIL 2 #######################

$mail_thanks = new PHPMailer(true);
$mail_thanks->CharSet = 'UTF-8';
$mail_thanks->From     = "vacantes@mft.com.mx";;
$mail_thanks->FromName = "Vacantes MFT";
$mail_thanks->AddAddress("{$FORM_EMAIL}");

$mail_thanks->WordWrap = 50;
$mail_thanks->IsHTML(true);

$mail_thanks->Subject  =  "Vacante mft para posición: {$FORM_POSICION}";
$mail_thanks->Body     =  "<p>Estimado/a: {$FORM_NOMBRE}</p><br>
<p>Agradecemos su interes en la posición {$FORM_POSICION}, a la brevedad nos comunicaremos con usted para seguir el proceso de selección.</p><br>
<p>Atentamente: el equipo de MFT.</p>";
$mail_thanks->send();

if(!$mail->send() ) 
		{
		    echo "Mailer Error: " . $mail->ErrorInfo;
		    echo "<script>
		   		alert('Su correo tuvo un error, intente enviar su CV de nuevo');
	 				window.location.assign('bolsa-de-trabajo-transfers');
				</script>";

		    
		} 
		else 
		{
		   echo "<script>
		   		alert('Su correo fue enviado con exito');
	 				window.location.assign('bolsa-de-trabajo-transfers');
				</script>";
		}
?>