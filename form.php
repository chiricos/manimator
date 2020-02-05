<?php

$email = "coordinacionweb@fucsalud.edu.co";

if($_GET["tipo"] == "biblioteca"){
	$to = 'edward@manimatorstudio.com';
	$subject = 'Reserva de auditorio ';
	$message = 'Nombre:' . $_GET["nombre"] . "\n";
	$message .= 'Apellido:' . $_GET["apellido"] . "\n";
	$message .= 'Facultad / Servicio:' . $_GET["facultad"] . "\n";
	$message .= 'Nombre Sala o auditorio:' . $_GET["sala"] . "\n";
	$message .= 'Nombre del evento:' . $_GET["evento"] . "\n";
	$message .= 'Correo electrónico:' . $_GET["correo"] . "\n";
	$message .= 'Auditorio:' . $_GET["auditorio"] . "\n";
	$message .= 'Fecha del evento:' . $_GET["fecha_evento"] . "\n";
	$message .= 'Hora inicial:' . $_GET["inicial"] . "\n";
	$message .= 'Hora final:' . $_GET["final"] . "\n";
	$message .= 'Número de asistentes:' . $_GET["asistentes"] . "\n";
	$message .= 'Observaciones:' . $_GET["observaciones"] . "\n";
	$message .= 'Acepta condiciones:' . $_GET["condiciones"] . "\n";
	if(!empty($message)){
		$headers = 'From: ' . $email . "\r\n" .
		    'Reply-To: ' . $email . "\r\n" .
		    'X-Mailer: PHP/' . phpversion();
		mail ($to, $subject, $message, $headers);
		header("Location: http://www.fucsalud.edu.co/biblioteca");
	}else{
		header("Location: http://www.fucsalud.edu.co/biblioteca");
	}
}


if($_GET["tipo"] == "internacionalizacion"){
	$to = 'relaciones.internacionales@fucsalud.edu.co';
	$subject = 'Internacionalización formulario en línea ';
	$message = 'Nombre:' . $_GET["nombre"] . "\n";
	$message .= 'Apellido:' . $_GET["apellido"] . "\n";
	$message .= 'Fecha de nacimiento:' . $_GET["nacimiento"] . "\n";
	$message .= 'País:' . $_GET["pais"] . "\n";
	$message .= 'Ciudad:' . $_GET["ciudad"] . "\n";
	$message .= 'Correo electrónico:' . $_GET["correo"] . "\n";
	$message .= 'Observaciones:' . $_GET["observaciones"] . "\n";
	$message .= 'Acepta condiciones:' . $_GET["condiciones"] . "\n";
	if(!empty($message)){
		$headers = 'From: ' . $email . "\r\n" .
		    'Reply-To: ' . $email . "\r\n" .
		    'X-Mailer: PHP/' . phpversion();
		mail ($to, $subject, $message, $headers);
		header("Location: http://www.fucsalud.edu.co/internacionalizacion");
	}else{
		header("Location: http://www.fucsalud.edu.co/internacionalizacion");
	}
}

if($_GET["tipo"] == "continuada"){
	$to = 'edward@manimatorstudio.com';
	$subject = 'Educación continuada formulario de contacto';
	$message = 'Nombres y apellidos:' . $_GET["nombre_apellido"] . "\n";
	$message .= 'Tipo de documento:' . $_GET["tipo_documento"] . "\n";
	$message .= 'Número de documento:' . $_GET["numero_documento"] . "\n";
	$message .= 'Correo electrónico:' . $_GET["correo"] . "\n";
	$message .= 'Celular:' . $_GET["celular"] . "\n";
	$message .= 'Programa de interes:' . $_GET["programa_interes"] . "\n";
	$message .= 'Observaciones:' . $_GET["observaciones"] . "\n";
	$message .= 'Acepta condiciones:' . $_GET["condiciones"] . "\n";
	if(!empty($message)){
		$headers = 'From: ' . $email . "\r\n" .
		    'Reply-To: ' . $email . "\r\n" .
		    'X-Mailer: PHP/' . phpversion();
		mail ($to, $subject, $message, $headers);
		header("Location: http://www.fucsalud.edu.co/continuada");
	}else{
		header("Location: http://www.fucsalud.edu.co/continuada/");
	}
}
if($_GET["tipo"] == "pqrs"){
	$to = 'edward@manimatorstudio.com';
	$subject = 'Formulario PQRS';
	$message = 'Nombres y apellidos:' . $_GET["nombre_apellido"] . "\n";
	$message .= 'Documento de identidad:' . $_GET["numero_documento"] . "\n";
	$message .= 'Teléfono:' . $_GET["telefono"] . "\n";
	$message .= 'Celular:' . $_GET["celular"] . "\n";
	$message .= 'E-mail:' . $_GET["correo"] . "\n";
	$message .= 'Solicitante:' . $_GET["solicitante"] . "\n";
	$message .= 'Categoría:' . $_GET["categoria"] . "\n";
	$message .= 'Tipo de servicio:' . $_GET["tipo_servicio"] . "\n";
	$message .= 'Título o tema:' . $_GET["tema"] . "\n";
	$message .= 'Observaciones:' . $_GET["observaciones"] . "\n";
	$message .= 'Acepta condiciones:' . $_GET["condiciones"] . "\n";
	if(!empty($message)){
		$headers = 'From: ' . $email . "\r\n" .
		    'Reply-To: ' . $email . "\r\n" .
		    'X-Mailer: PHP/' . phpversion();
		mail ($to, $subject, $message, $headers);
		header("Location: http://www.fucsalud.edu.co/");
	}else{
		header("Location: http://www.fucsalud.edu.co/pqr");
	}
}

if($_GET["tipo"] == "pre-inscripcion"){
	$to = 'laboratorio.simulacion@fucsalud.edu.co';
	$subject = 'pre-inscripcion BLS-ACLS-PALS';
	$message = 'Nombres y apellidos:' . $_GET["nombre_apellido"] . "\n";
	$message .= 'Tipo de documento:' . $_GET["tipo_documento"] . "\n";
	$message .= 'Número de documento:' . $_GET["numero_documento"] . "\n";
	$message .= 'E-mail:' . $_GET["correo"] . "\n";
	$message .= 'Celular:' . $_GET["Curso al que aspira"] . "\n";
	$message .= 'Curso al que aspira:' . $_GET["curso"] . "\n";
	$message .= '¿Otro? ¡Cuál?:' . $_GET["curso_otro"] . "\n";
	$message .= 'Perfil profesional:' . $_GET["perfil_profesional"] . "\n";
	$message .= '¿Otro? ¡Cuál? :' . $_GET["perfil_otro"] . "\n";
	$message .= 'Acepta condiciones:' . $_GET["condiciones"] . "\n";
	if(!empty($message)){
		$headers = 'From: ' . $email . "\r\n" .
		    'Reply-To: ' . $email . "\r\n" .
		    'X-Mailer: PHP/' . phpversion();
		mail ($to, $subject, $message, $headers);
		header("Location: http://www.fucsalud.edu.co/cursos/");
	}else{
		header("Location: http://www.fucsalud.edu.co/cursos/");
	}
}

header("Location: http://www.fucsalud.edu.co/");
?>