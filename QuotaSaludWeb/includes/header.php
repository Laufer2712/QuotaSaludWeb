<?php
// =======================================================
// HEADER.PHP - Inicio de la estructura HTML y navegación
// Se incluye al inicio de cada página PHP (ej: index.php).
// =======================================================

// 🚨 Verificación de Variables: 
// Esto asegura que la página tiene un título y descripción si no se definen
// en el archivo principal (como index.php) antes de incluir este header.
$page_title = $page_title ?? "Quota Salud - Soluciones de Pago";
$page_description = $page_description ?? "Accede a tratamientos médicos y odontológicos con facilidad de pago en cuotas sin intereses.";

// Captura el estado ('exito' o 'error') del envío del formulario.
$estado_formulario = $_GET['estado'] ?? null;
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?php echo $page_title; ?></title>
    <meta name="description" content="<?php echo $page_description; ?>">

    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <header>
        <div class="contenedor header-content">
            <h1>Quota Salud</h1>
            <nav>
                <a href="#informacion-principal" class="nav-link">¿Qué es Quota?</a>
                <a href="#formulario-captacion" class="nav-link cta-link">Contáctanos</a>
            </nav>
        </div>
    </header>

    <main class="contenedor">
        <section id="mensajes-sistema">
            <?php
            if ($estado_formulario === 'exito') {
                echo '<div class="alerta exito">¡Gracias! Tu solicitud ha sido enviada con éxito. Pronto te contactaremos.</div>';
            } elseif ($estado_formulario === 'error') {
                echo '<div class="alerta error">Hubo un problema al enviar tu solicitud. Por favor, inténtalo de nuevo.</div>';
            }
            ?>
        </section>