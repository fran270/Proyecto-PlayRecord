<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once ('Exception.php');
require_once ('PHPMailer.php');
require_once ('SMTP.php');

/* Sección de variables */

//Quien envía
$cuentaRemitente = 'franjose2004@hotmail.com';
$PassCuentaRemitente = 'sbtowoefylsdpiah';

//Quien recibe
$cuentaDestinatario = "franjose2004@hotmail.com";

//Que se envía
$Asunto = "Recuperar contrasena";
$Mensaje = "Pulsa en este <a href = 'http://localhost:8088/contrasena.php?email=$email&token=$token'> enlace </a> para generar la nueva contrasena"; 



$mail = new PHPMailer(true);

try {
    // Server settings
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;
    $mail->isSMTP();
    $mail->Host = 'smtp.outlook.com';
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    $mail->Username = $cuentaRemitente;
    $mail->Password = $PassCuentaRemitente;


    $mail->setFrom($cuentaRemitente, 'Correo del sistema');
    $mail->addAddress($cuentaDestinatario, '');
    $mail->addReplyTo($cuentaRemitente, '');


    $mail->IsHTML(true);
    $mail->Subject = $Asunto;
    $mail->Body = $Mensaje;
    $mail->AltBody = $MensajeAlterno;

    $mail->send();
    echo "Mensaje enviado.";
} catch (Exception $e) {
    echo "Error in sending email. Mailer Error: {$mail->ErrorInfo}";
}