<?php

$datos = array();

if(isset($_POST['email'])) {

// Debes editar las próximas dos líneas de código de acuerdo con tus preferencias
$email_to = "ConfortLine <ezequiel.estigarribia@gmail.com>";
//$email_from ="MeixnerGroup";
$email_subject = "Contacto desde ConfortLine";

// Aquí se deberían validar los datos ingresados por el usuario
if(!isset($_POST['name']) ||
!isset($_POST['email']) ||
!isset($_POST['subject']) ||
!isset($_POST['message'])) {
	
die();
}

$email_message = "Detalles del formulario de contacto:\n\n";
$email_message .= "Nombre: " . $_POST['name'] . "\n";
$email_message .= "E-mail: " . $_POST['email'] . "\n";
//$email_message .= "Telefono: " . $_POST['telefono'] . "\n";
$email_message .= "Asunto: " . $_POST['subject'] . "\n";
$email_message .= "Mensaje: " . $_POST['message'] . "\n\n";


// Ahora se envía el e-mail usando la función mail() de PHP
$headers = 'From: '.$email_to."\r\n".
'Reply-To: '.$email_to."\r\n" .
'X-Mailer: PHP/' . phpversion();
mail($email_to, $email_subject, $email_message, $headers);

$datos['respuesta']='ok';

echo json_encode($datos);
}

?>