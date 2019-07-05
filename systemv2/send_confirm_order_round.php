<?php include "../db_conexion.php"   ?>
<?php


          $sql= "select * from _transfers where id = ".$_GET["t"]." ";
          $sql2="select * from _transfers where id = ".$_GET["u"]." ";

            // echo $sql;
            // echo "<br>";
           	// echo $sql2;

          // muestra datos de llegada
          $rs = adoopenrecordset($sql);
          $rstemp = mysql_fetch_array($rs);
          // muestra datos de salida
          $rs2 = adoopenrecordset($sql2);
          $rstemp2 = mysql_fetch_array($rs2);
          //$VAR_ADULT =  $rstemp['adul'];
          // PAX IDA
           $VAR_ADULT = $rstemp['adul'];
           $VAR_CHILD = $rstemp['chil'];
           $VAR_ENTANT = $rstemp['enfa'];
           $INT_ADULT = (int)$VAR_ADULT;
           $INT_CHILD = (int)$VAR_CHILD;
           $INT_ENFANT = (int)$VAR_ENTANT;
           $TOTAL_PAX = strval($INT_ADULT + $INT_CHILD + $INT_ENFANT);
           //PAX VUELTA
            $VAR_ADULT2 = $rstemp2['adul'];
           $VAR_CHILD2 = $rstemp2['chil'];
           $VAR_ENTANT2 = $rstemp2['enfa'];
           $INT_ADULT2 = (int)$VAR_ADULT2;
           $INT_CHILD2 = (int)$VAR_CHILD2;
           $INT_ENFANT2 = (int)$VAR_ENTANT2;
           $TOTAL_PAX2 = strval($INT_ADULT2 + $INT_CHILD2 + $INT_ENFANT2);

          require 'email/phpmailer/PHPMailerAutoload.php';
          	$hotel_name = "MFT EXCURSIONS";
			$hotel_email = "reservastransfers@mft.com.mx";

			$message = file_get_contents('email/order_notif_round.php');


			// Airport transfer confirmation
			$message = str_replace('[idflight]',      $rstemp['id'], $message); 		// Numero de orden
			$message = str_replace('[name]',   $rstemp['name'], $message);				// Nombre de cliente
			// Arrival Date
			 $message = str_replace('[arrdate]',    $rstemp['date1'], $message);		// Fecha
			 $message = str_replace('[arrtime]',   $rstemp['time1'], $message);			// Hora
			 $message = str_replace('[arrpax]',   $TOTAL_PAX, $message);				// Numero de pasajeros
			 $message = str_replace('[arrairline]',    $rstemp['airl1'], $message);		// Aerolinea
			 $message = str_replace('[arrflightno]',    $rstemp['vuel1'], $message);	// Numero de vuelo
			 $message = str_replace('[orig]',    $rstemp['orig1'], $message);			// Origen llegada
			 $message = str_replace('[dest]',    $rstemp['dest1'], $message);			// Destino llegada
			 $message = str_replace('[arrcomments]',   $rstemp['come'], $message);		// Comentarios
			// Departure date
			 $message = str_replace('[depidflight]',    $rstemp2['id'], $message);		// Fecha salida
			 $message = str_replace('[depdate]',    $rstemp2['date1'], $message);		// Fecha salida
			 $message = str_replace('[depttime]',   $rstemp2['time1'], $message);		// Hora salida
			 $message = str_replace('[deppax]',   $TOTAL_PAX2, $message);				// PAX salida
			 $message = str_replace('[depairline]',    $rstemp2['airl1'], $message);	// Aerolinea salida
			 $message = str_replace('[depflightno]',    $rstemp2['vuel1'], $message);	// Numero de vuelo salida
			 $message = str_replace('[orig2]',   $rstemp2['orig1'], $message);		// Origen salida
			 $message = str_replace('[dest2]',   $rstemp2['dest1'], $message);		// Destino salida
			 $message = str_replace('[depcomments]',   $rstemp2['come'], $message);		// Comentarios salida

			$mail = new PHPMailer;
			$mail->setFrom($hotel_email, $hotel_name);
			$mail->addAddress($rstemp['email'], $rstemp['name']);
			$mail->addAddress('reservastransfers@mft.com.mx', 'Reservas Transfer MFT');
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