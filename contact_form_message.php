<?php


include "db_conexion.php";


if(!$_POST) exit;
 $fecha = date("Y-m-d H:i:s");

      $sql="insert into _mensajes (fecha,name,mail,phone,msg) values ('".$fecha."','".$_POST["name"]."','".$_POST["email"]."','".$_POST["phone"]."','".$_POST["comments"]."')";
//    echo $sql;

    adoexecute($sql);



    $message = "
    <h2>CONTACTAR AL CLIENTE LO ANTES POSIBLE, ESTOS SON LOS DATOS DE CONTACTO Y EL MENSAJE QUE HA PROPORCIONADO, PERO ANTES:</h2>
    <ol>
      <li>Verificar que el nombre, correo o teléfono no sean sospechosos</li>
      <li>Normalmente los correos spam son similar a esto: kobus@kgbclutch.co.za</li>
      <li>Los nombres como Luthermus también pueden ser Spam</li>
      <li>Ver el contenido del mensaje (si realmente solicita información de weddings u otro servicio)</li>
      <li>Por último es recomendable contactar al cliente por su número de teléfono (si este lo proporciona)</li>
      
    </ol>
    <hr>
    <br>NOMBRE: ".$_POST["name"]."
    <br>EMAIL:  ".$_POST["email"]."
     <br>TELÉFONO:  ".$_POST["phone"]."
    <br>MENSAJE: ".$_POST["comments"]."
    <hr>
    ";

  	$to = "mitnick117@gmail.com";
	$subject = '*** Wedding info or questions';
	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	$headers .= 'From: Wedding info request or questions <reservastransfers@mft.com.mx>' . "\r\n";
  	if(mail($to, $subject, $message, $headers)) {


	// Email has sent successfully, echo a success page.
	echo "<fieldset>";
	echo "<div id='success_page' class='box'>";
	echo "<h6>Email Sent Successfully.</h6>";
	echo "<p>Thank you <b>".$_POST["name"]."</b>, your message has been submitted to us. Soon we will contact you.</p>";
	echo "</div>";
	echo "</fieldset>";
} 
else {
	echo 'ERROR!';
}

?>