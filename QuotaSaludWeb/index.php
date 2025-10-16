<?php
// =======================================================
// INDEX.PHP - LANDING PAGE DE DESARROLLO (QUOTA SALUD)
// Este archivo sirve como el Front-Controller de la landing.
// =======================================================
//Laura esta aqui
// 1. Definición de Variables de Contexto
// Útil para cambiar títulos o descripciones rápidamente.
$page_title = "Quota Salud - Tu Acceso a Tratamientos Médicos";
$page_description = "Solución de pagos en cuotas sin intereses para tratamientos y exámenes médicos.";

// 2. Lógica para Capturar el Estado del Backend
// Captura el estado ('exito' o 'error') después de enviar el formulario.
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
        <h1>[LOGO / NOMBRE] Quota Salud</h1>
        <nav>
        </nav>
    </header>

    <main>
        <section id="mensajes-sistema">
            <?php
            if ($estado_formulario === 'exito') {
                echo '<div class="alerta exito">¡Gracias por contactarnos! Pronto un asesor de Quota Salud se comunicará contigo.</div>';
            } elseif ($estado_formulario === 'error') {
                echo '<div class="alerta error">Hubo un problema al procesar tu solicitud. Por favor, verifica tus datos e inténtalo de nuevo.</div>';
            }
            ?>
        </section>


        <section id="informacion-principal">
            <h2>1. ¿Qué es Quota Salud?</h2>
            <p>Quota Salud es una solución innovadora que te permite acceder a tratamientos médicos, odontológicos y exámenes complementarios a un diagnóstico, ofreciendo Facilidad de Pago en cuotas sin intereses y de forma segura. Nuestro propósito es que nunca dejes de cuidar tu salud por motivos económicos.</p>
        </section>


        <section id="formulario-captacion">
            <h2>Agenda una Consulta sin Compromiso</h2>

            <form action="backend/procesar_formulario.php" method="POST">

                <label for="nombre">Nombre Completo:</label>
                <input type="text" id="nombre" name="nombre" required>

                <label for="email">Correo Electrónico:</label>
                <input type="email" id="email" name="email" required>

                <label for="telefono">Teléfono:</label>
                <input type="tel" id="telefono" name="telefono" required>

                <label for="mensaje">Describe tu Necesidad:</label>
                <textarea id="mensaje" name="mensaje" required placeholder="Ej: Necesito un tratamiento de ortodoncia o exámenes de rutina."></textarea>

                <button type="submit">Enviar Solicitud con Facilidad de Pago</button>
            </form>
        </section>

    </main>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> Quota Salud. Todos los derechos reservados.</p>
        <p>[ENLACES: Política de Privacidad | Términos y Condiciones]</p>
    </footer>

    <script src="js/scripts.js"></script>

</body>

</html>