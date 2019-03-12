<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'mail/src/Exception.php';
require 'mail/src/PHPMailer.php';
require 'mail/src/SMTP.php';


if (!isset($_POST['name']) ||
    !isset($_POST['email']) ||
    !isset($_POST['subject']) ||
    !isset($_POST['message'])) 
{

	die();
} else {
    $datos = array();
    $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
    try {
        //Server settings
        $mail->SMTPDebug = 0;                                 // Enable verbose debug output
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';                       // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'zocalosconfortline@gmail.com';  // SMTP username
        $mail->Password = 32126297;                         // SMTP password
        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;                                    // TCP port to connect to

        //Recipients
        $mail->setFrom('info@confortline.com.ar', 'Info Confortlibne');
        $mail->addAddress('zocalosconfortline@gmail.com', 'ConfortLine');     // Add a recipient
        $mail->addAddress('info@confortline.com.ar', 'Info Confortlibne');               // Name is optional
        //$mail->addReplyTo('info@example.com', 'Information');
        //$mail->addCC('cc@example.com');
        //$mail->addBCC('bcc@example.com');

        //Attachments
        //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

        //Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Mensaje web ConfortLine';
        $mail->Body    = "Conctacto desde la web<br>
                          Nombre: " . $_POST['name'] . "<br>
                          Email: " . $_POST['email'] . "<br>
                          Asunto: " . $_POST['subject'] . "<br>
                          Mensaje: " . $_POST['message'] . "<br>";

        //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
                
        $datos['respuesta']='ok';

        echo json_encode($datos);
    } catch (Exception $e) {
        echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
    }

}