<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    // Configuración del correo
    $to = "tu_correo@ejemplo.com"; // Cambia esto al correo donde deseas recibir los mensajes
    $subject = "Nuevo Mensaje de Contacto";
    $body = "Has recibido un nuevo mensaje de contacto.\n\n" .
            "Nombre: $name\n" .
            "Correo: $email\n\n" .
            "Mensaje:\n$message";

    $headers = "From: $email\r\n" .
               "Reply-To: $email\r\n" .
               "X-Mailer: PHP/" . phpversion();

    // Enviar el correo
    if (mail($to, $subject, $body, $headers)) {
        echo "<script>alert('Mensaje enviado exitosamente.');window.location.href='index.php';</script>";
    } else {
        echo "<script>alert('Hubo un problema al enviar tu mensaje. Por favor, intenta nuevamente.');window.location.href='index.php';</script>";
    }
} else {
    echo "Acceso no autorizado.";
}
?>
