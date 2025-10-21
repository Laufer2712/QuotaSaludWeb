<?php
// ----------------------------------------------------
// Desactivar warnings y notices
// ----------------------------------------------------
error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);
ini_set('display_errors', 0);
// ----------------------------------------------------
// Iniciar búfer para evitar output no deseado
// ----------------------------------------------------
ob_start();

// ----------------------------------------------------
// Mostrar errores solo para desarrollo (quitar en producción)
// ----------------------------------------------------
ini_set('display_errors', 1);
error_reporting(E_ALL);

// ----------------------------------------------------
// Cargar PHPMailer vía Composer
// ----------------------------------------------------
require __DIR__ . '/../vendor/autoload.php'; // Ajusta según la ubicación real de vendor

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// ----------------------------------------------------
// Función segura para enviar JSON
// ----------------------------------------------------
function sendJsonResponse($data)
{
    while (ob_get_level()) ob_end_clean(); // Limpiar cualquier output previo
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($data);
    exit;
}

// ----------------------------------------------------
// Validar método POST
// ----------------------------------------------------
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    sendJsonResponse(["success" => false, "message" => "Método no permitido"]);
}

// ----------------------------------------------------
// Captura de datos
// ----------------------------------------------------
$nombre  = trim($_POST['nombre'] ?? '');
$email   = trim($_POST['email'] ?? '');
$celular = trim($_POST['celular'] ?? '');
$mensaje = trim($_POST['mensaje'] ?? '');

if ($nombre === '' || $email === '' || $celular === '') {
    sendJsonResponse(["success" => false, "message" => "Por favor completa todos los campos."]);
}

try {
    // ----------------------------------------------------
    // 1️⃣ Correo a la empresa
    // ----------------------------------------------------
    $mailEmpresa = new PHPMailer(true);
    $mailEmpresa->isSMTP();
    $mailEmpresa->Host       = 'smtp.gmail.com';
    $mailEmpresa->SMTPAuth   = true;
    $mailEmpresa->Username   = 'laurafernandat5@gmail.com'; // 👈 Cambiar
    $mailEmpresa->Password   = 'answ rjkj eoft fuuj';     // 👈 Cambiar
    $mailEmpresa->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mailEmpresa->Port       = 587;

    $mailEmpresa->setFrom('laurafernandat5@gmail.com', 'Quota Salud');
    $mailEmpresa->addAddress('laurafernandat5@gmail.com');
    $mailEmpresa->addReplyTo($email, $nombre);

    $mailEmpresa->isHTML(true);
    $mailEmpresa->Subject = 'Nuevo mensaje de contacto - Quota Salud';
    $mailEmpresa->Body = "
        <h2>Nuevo mensaje desde el formulario de contacto</h2>
        <p><strong>Nombre:</strong> {$nombre}</p>
        <p><strong>Correo:</strong> {$email}</p>
        <p><strong>Celular:</strong> {$celular}</p>
        <p><strong>Mensaje:</strong><br>{$mensaje}</p>
    ";

    $mailEmpresa->send();

    // ----------------------------------------------------
    // 2️⃣ Correo de bienvenida al usuario
    // ----------------------------------------------------
    $mailUsuario = new PHPMailer(true);
    $mailUsuario->isSMTP();
    $mailUsuario->Host       = 'smtp.gmail.com';
    $mailUsuario->SMTPAuth   = true;
    $mailUsuario->Username   = 'laurafernandat5@gmail.com'; // 👈 Cambiar
    $mailUsuario->Password   = 'answ rjkj eoft fuuj';     // 👈 Cambiar
    $mailUsuario->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mailUsuario->Port       = 587;

    $mailUsuario->setFrom('laurafernandat5@gmail.com', 'Quota Salud');
    $mailUsuario->addAddress($email, $nombre);

    // Ruta de imagen fuera de backend
    $rutaImagen = __DIR__ . '/../img/mail.png';
    if (!file_exists($rutaImagen)) {
        sendJsonResponse(["success" => false, "message" => "La imagen de bienvenida no se encuentra en /img/mail.png"]);
    }
    $mailUsuario->addEmbeddedImage($rutaImagen, 'mailimg');

    $mailUsuario->isHTML(true);
    $mailUsuario->Subject = 'Bienvenido a Quota Salud!';
    $mailUsuario->Body = "
        <p>Estimado/a <strong>{$nombre}</strong>,</p>
        <p>¡Todo el equipo de QuotaSalud te da la más cordial bienvenida!</p>
        <p>Nos entusiasma que hayas decidido dar el paso para asegurar tu bienestar y el de tu familia. Ahora tienes acceso a nuestra plataforma diseñada para eliminar las barreras financieras en el cuidado de la salud.</p>
        <img src='cid:mailimg' alt='Bienvenido' style='width:100%; max-width:600px;'>
        <p>¡Gracias por confiar en nosotros!</p>
        <p>— El equipo de Quota Salud</p>
    ";

    $mailUsuario->send();

    // ----------------------------------------------------
    // Respuesta JSON exitosa
    // ----------------------------------------------------
    sendJsonResponse(["success" => true, "message" => "¡Mensaje enviado con éxito y correo de bienvenida enviado al usuario!"]);
} catch (\Exception $e) {
    sendJsonResponse(["success" => false, "message" => "Error al enviar el mensaje: {$e->getMessage()}"]);
}
