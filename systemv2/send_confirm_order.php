<?php include "../db_conexion.php"   ?>
<?php


          $sql="select * from _transfers where id = ".$_GET["t"]." ";
          //$sql2="select * from _transfers where id = ".$_GET["u"]." ";

            // echo $sql;
            // echo "<br>";
           	// echo $sql2;


          $rs = adoopenrecordset($sql);
          $rstemp = mysql_fetch_array($rs);
          //$VAR_ADULT =  $rstemp['adul'];

           $VAR_ADULT = $rstemp['adul'];
           $VAR_CHILD = $rstemp['chil'];
           $VAR_ENTANT = $rstemp['enfa'];
           $INT_ADULT = (int)$VAR_ADULT;
           $INT_CHILD = (int)$VAR_CHILD;
           $INT_ENFANT = (int)$VAR_ENTANT;
           $TOTAL_PAX = strval($INT_ADULT + $INT_CHILD + $INT_ENFANT);

          require 'email/phpmailer/PHPMailerAutoload.php';
          	$hotel_name = "MFT EXCURSIONS";
			$hotel_email = "reservastransfers@mft.com.mx";

			$message = file_get_contents('email/order_notif.php');

			//replace arrival and departure
			if ( $rstemp['tipo']=='sl') {	
				$message = str_replace('Arrival Date','Departure Date', $message); 		// Cambio de nombre a etiqueta Arrival por departure
				$message = str_replace('Arrival Time','Departure Time', $message); 		// Cambio de nombre a etiqueta Arrival por departure
			}

			// Airport transfer confirmation
			$message = str_replace('[idflight]',      $rstemp['id'], $message); 		// Numero de orden
			$message = str_replace('[name]',   $rstemp['name'], $message);				// Nombre de cliente
			$message = str_replace('[orig]',    $rstemp['orig1'], $message);			// Origen
			$message = str_replace('[dest]',    $rstemp['dest1'], $message);			// Destino
			// Arrival Date
			 $message = str_replace('[arrdate]',    $rstemp['date1'], $message);		// Fecha
			 $message = str_replace('[arrpax]',   $TOTAL_PAX, $message);				// Numero de pasajeros
			 $message = str_replace('[arrairline]',    $rstemp['airl1'], $message);		// Aerolinea
			 $message = str_replace('[arrflightno]',    $rstemp['vuel1'], $message);	// Numero de vuelo
			 $message = str_replace('[arrtime]',   $rstemp['time1'], $message);			// Hora
			 $message = str_replace('[arrcomments]',   $rstemp['come'], $message);		// Comentarios
			// Departure date

			$mail = new PHPMailer;
			$mail->setFrom($hotel_email, $hotel_name);
			$mail->addAddress($rstemp['email'], $rstemp['name']);
			$mail->addAddress('reservastransfers@mft.com.mx', 'Reservas MFT');
			$mail->Subject = $hotel_name.' Confirmation Transportation Request';
			$mail->MsgHTML($message);
			$mail->IsHTML(true);
			$mail->send();


			// Mensaje de envio exitoso
			echo '<script type="text/javascript">'; 
			echo 'alert("El correo fue enviado de manera exitosa");'; 
			echo 'window.location.href = "seguimiento-orden.php";';
			echo "window.close();";
			echo '</script>';

?>