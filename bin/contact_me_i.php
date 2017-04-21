<?php
// Checar por campos vacios
if(empty($_POST['name'])      ||
   empty($_POST['email'])     ||
   empty($_POST['phone'])     ||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
   echo "Faltan argumentos!";
   return false;
   }
   
$name = strip_tags(htmlspecialchars($_POST['name']));
$email_address = strip_tags(htmlspecialchars($_POST['email']));
$phone = strip_tags(htmlspecialchars($_POST['phone']));
$message = strip_tags(htmlspecialchars($_POST['message']));
   
// Crear el email y envíar el mensaje
$to = 'gemprolider@gmail.com'; // Email al que se le enviaran los mensajes del formulario
$email_subject = "Formulario de Contacto de la Web:  $name";
$email_body = "Haz recibido un nuevo mensaje de tu formulario de contacto Web.\n\n"."Aquí están los detalles:\n\nNombre: $name\n\nEmail: $email_address\n\nTélefono: $phone\n\nMensaje:\n$message";
$headers = "De: noreply@yourdomain.com\n"; // Este el email que aparecera como enviado en el contenido del mensaje - Se recomienda utilizar un correo como: noreply@eldominio.com.
$headers .= "Responda A: $email_address";
mail($to,$email_subject,$email_body);
return true;         
?>