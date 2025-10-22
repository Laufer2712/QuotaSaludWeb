<?php
// contact_form.php

/**
 * Archivo que procesa el formulario de contacto y envía los datos al servicio Java
 */

// =============================================================================
// CONFIGURACIÓN DEL SERVICIO JAVA
// =============================================================================

$url = "http://3.135.179.82:8080/quota-salud-web-socket/api/QUOTASystem/insertContactRequest";

// =============================================================================
// VALIDAR MÉTODO POST
// =============================================================================

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    die("Error: Método no permitido");
}

// ----------------------------------------------------
// Cargar PHPMailer vía Composer
// ----------------------------------------------------
require __DIR__ . '/../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// ----------------------------------------------------
// Captura de datos
// ----------------------------------------------------
$nombre  = trim($_POST['nombre'] ?? '');
$email   = trim($_POST['email'] ?? '');
$celular = trim($_POST['celular'] ?? '');
$mensaje = trim($_POST['mensaje'] ?? '');

if ($nombre === '' || $email === '' || $celular === '') {
    echo "Error: Por favor completa todos los campos.";
    exit;
}

try {
    // =============================================================================
    // 1️⃣ PRIMERO: INSERTAR EN LA BASE DE DATOS (status = 0)
    // =============================================================================
    
    $data = array(
        'id' => 0,
        'name' => $nombre,
        'email' => $email,
        'phone' => $celular,
        'message' => $mensaje,
        'status' => 0, // 0 = No enviado (por defecto)
        'createdAt' => date('Y-m-d\TH:i:s.v\Z')
    );

    $json_data = json_encode($data, JSON_UNESCAPED_SLASHES);

    $options = array(
        'http' => array(
            'header' => "Content-Type: application/json\r\n",
            'method' => 'POST',
            'content' => $json_data,
            'timeout' => 30,
            'ignore_errors' => true
        )
    );

    $context = stream_context_create($options);
    $response = file_get_contents($url, false, $context);
    
    // Verificar respuesta del servicio Java
    $httpCode = 0;
    if (isset($http_response_header)) {
        foreach ($http_response_header as $header) {
            if (strpos($header, 'HTTP/') === 0) {
                $httpCode = substr($header, 9, 3);
                break;
            }
        }
    }
    
    if ($response === FALSE || ($httpCode != 200 && $httpCode != 201)) {
        throw new Exception("Error al guardar en base de datos. HTTP Code: $httpCode");
    }
    
    // Obtener el ID del registro insertado (opcional, para luego actualizar status)
    $responseData = json_decode($response, true);
    $insertedId = $responseData['id'] ?? null;
    
    // =============================================================================
    // 2️⃣ SEGUNDO: ENVIAR CORREOS (CÓDIGO COMENTADO TEMPORALMENTE)
    // =============================================================================
    /*
    // ----------------------------------------------------
    // 2.1 Correo a la empresa
    // ----------------------------------------------------
    $mailEmpresa = new PHPMailer(true);
    $mailEmpresa->isSMTP();
    $mailEmpresa->Host       = 'smtp.gmail.com';
    $mailEmpresa->SMTPAuth   = true;
    $mailEmpresa->Username   = 'laurafernandat5@gmail.com';
    $mailEmpresa->Password   = 'answ rjkj eoft fuuj';
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
    // 2.2 Correo de bienvenida al usuario
    // ----------------------------------------------------
    $mailUsuario = new PHPMailer(true);
    $mailUsuario->isSMTP();
    $mailUsuario->Host       = 'smtp.gmail.com';
    $mailUsuario->SMTPAuth   = true;
    $mailUsuario->Username   = 'laurafernandat5@gmail.com';
    $mailUsuario->Password   = 'answ rjkj eoft fuuj';
    $mailUsuario->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mailUsuario->Port       = 587;

    $mailUsuario->setFrom('laurafernandat5@gmail.com', 'Quota Salud');
    $mailUsuario->addAddress($email, $nombre);

    // Ruta de imagen fuera de backend
    $rutaImagen = __DIR__ . '/../img/mail.png';
    if (!file_exists($rutaImagen)) {
        throw new Exception("La imagen de bienvenida no se encuentra en /img/mail.png");
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
    */
    // =============================================================================

    // =============================================================================
    // 🚨 AQUÍ PODRÍAS ACTUALIZAR EL STATUS A 1 SI EL EMAIL SE ENVIÓ CORRECTAMENTE
    // =============================================================================
    /*
    if ($insertedId) {
        $updateUrl = "http://3.135.179.82:8080/quota-salud-web-socket/api/QUOTASystem/updateContactRequestStatus";
        $updateData = array('id' => $insertedId, 'status' => 1);
        
        $updateJson = json_encode($updateData, JSON_UNESCAPED_SLASHES);
        $updateOptions = array(
            'http' => array(
                'header' => "Content-Type: application/json\r\n",
                'method' => 'POST',
                'content' => $updateJson,
                'timeout' => 30,
                'ignore_errors' => true
            )
        );
        
        $updateContext = stream_context_create($updateOptions);
        $updateResponse = file_get_contents($updateUrl, false, $updateContext);
        
        // Opcional: Verificar si la actualización fue exitosa
        $updateHttpCode = 0;
        if (isset($http_response_header)) {
            foreach ($http_response_header as $header) {
                if (strpos($header, 'HTTP/') === 0) {
                    $updateHttpCode = substr($header, 9, 3);
                    break;
                }
            }
        }
        
        if ($updateResponse === FALSE || ($updateHttpCode != 200 && $updateHttpCode != 201)) {
            // Log error pero no interrumpir el flujo
            error_log("Error al actualizar status a 1 para ID: $insertedId");
        }
    }
    */
    // =============================================================================

    // ----------------------------------------------------
    // Respuesta exitosa - MOSTRAR HTML EN LA MISMA PÁGINA
    // ----------------------------------------------------
    echo "<div style='text-align: center; padding: 30px;'>";
    echo "<h3 style='color: #28a745;'>✅ Registro insertado correctamente</h3>";
    echo "<p><strong>ID:</strong> " . ($insertedId ?? 'N/A') . "</p>";
    echo "<p><strong>Nombre:</strong> " . htmlspecialchars($nombre) . "</p>";
    echo "<p><strong>Email:</strong> " . htmlspecialchars($email) . "</p>";
    echo "<p><strong>Celular:</strong> " . htmlspecialchars($celular) . "</p>";
    if (!empty($mensaje)) {
        echo "<p><strong>Mensaje:</strong> " . htmlspecialchars($mensaje) . "</p>";
    }
    echo "<button onclick='window.location.reload()' style='margin-top: 20px; padding: 10px 20px; background: #0072c6; color: white; border: none; border-radius: 5px; cursor: pointer;'>Cerrar</button>";
    echo "</div>";
    exit();

} catch (\Exception $e) {
    echo "<div style='text-align: center; padding: 30px;'>";
    echo "<h3 style='color: #dc3545;'>❌ Error</h3>";
    echo "<p>" . htmlspecialchars($e->getMessage()) . "</p>";
    echo "<button onclick='window.location.reload()' style='margin-top: 20px; padding: 10px 20px; background: #dc3545; color: white; border: none; border-radius: 5px; cursor: pointer;'>Reintentar</button>";
    echo "</div>";
    exit;
}
?>