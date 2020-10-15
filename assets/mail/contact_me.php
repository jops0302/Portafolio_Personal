<?php
// Compruebe si hay campos vacíos
if(empty($_POST['name']) || empty($_POST['email']) || empty($_POST['phone']) || empty($_POST['message']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
  http_response_code(500);
  exit();
}

$name = strip_tags(htmlspecialchars($_POST['name']));
$email = strip_tags(htmlspecialchars($_POST['email']));
$phone = strip_tags(htmlspecialchars($_POST['phone']));
$message = strip_tags(htmlspecialchars($_POST['message']));

// Crea el correo electrónico y envía el mensaje
$to = "jops0302@gmail.com"; // Agregue su dirección de correo electrónico entre "" reemplazando yourname@yourdomain.com - Aquí es donde el formulario enviará un mensaje.
$subject = "Formulario de contacto del sitio web:  $name";
$body = "Ha recibido un nuevo mensaje del formulario de contacto de su sitio web.\n\n"."Aquí están los details:\n\nNombre: $name\n\nEmail: $email\n\nTelefono: $phone\n\nMensaje:\n$message";
$header = "de: noreply@yourdomain.com\n"; // Esta es la dirección de correo electrónico de la que procederá el mensaje generado. Recomendamos usar algo como noreply@yourdomain.com.
$header .= "Responder a: $email";	

if(!mail($to, $subject, $body, $header))
  http_response_code(500);
?>
