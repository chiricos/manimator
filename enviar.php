<?php

date_default_timezone_set('Etc/UTC');
require '/vendor/PHPMailer/PHPMailerAutoload.php';


echo "entro"; exit;/*


require(‘class.phpmailer.php’);
require(‘class.smtp.php’);

$nombre = $_POST[“nombre”];
$telefono = $_POST[“telefono”];

$mail = new PHPMailer();

$body = “Hola es una prueba”;
$body .=”ojalá funcione”;

$mail->IsSMTP();

$mail->Host = “ServidorDeCorreoSMTP”;


$mail->From = “CuentaDeEnvio”;

$mail->FromName = “Domitienda”;

$mail->Subject = “prueba de envio”;

$mail->AltBody = “prueba”;

$mail->MsgHTML($body);

$mail->AddAddress(“CuentaDestino”, “Domitienda”);

$mail->SMTPAuth = true;


$mail->Username = “CuentaDeEnvio”;
$mail->Password = “ContraseñaDeEnvio”;

if(!$mail->Send()) {
echo “Mailer Error: ” . $mail->ErrorInfo;
} else {
echo “Message sent!”;
}
*/


?>