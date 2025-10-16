<?php
// =======================================================
// INDEX.PHP - CONTROLADOR PRINCIPAL DE LA LANDING PAGE
// =======================================================

// 1. Definición de Variables (usadas por header.php)
$page_title = "Quota Salud - Facilidad de Pago para tu Tratamiento";
$page_description = "Accede a tratamientos médicos y odontológicos con facilidad de pago en cuotas sin intereses.";

// 2. Inclusión del Header
require_once 'includes/header.php';
?>

<section id="informacion-principal">
    <h2>1. ¿Qué es Quota Salud?</h2>
    <p>Quota Salud es una solución innovadora que te permite acceder a tratamientos médicos, odontológicos y exámenes complementarios a un diagnóstico, ofreciendo Facilidad de Pago en cuotas sin intereses y de forma segura.</p>
    <p>Nuestro propósito es que nunca dejes de cuidar tu salud por motivos económicos.</p>

</section>

<section id="formulario-captacion">
    <h2>Agenda tu Consulta y Pregunta por tus Cuotas</h2>

    <form action="backend/procesar_formulario.php" method="POST">

        <label for="nombre">Nombre Completo:</label>
        <input type="text" id="nombre" name="nombre" required>

        <label for="email">Correo Electrónico:</label>
        <input type="email" id="email" name="email" required>

        <label for="telefono">Teléfono:</label>
        <input type="tel" id="telefono" name="telefono" required>

        <label for="mensaje">Describe tu Necesidad:</label>
        <textarea id="mensaje" name="mensaje" required placeholder="Ej: Necesito saber sobre tratamientos dentales o exámenes de imagen."></textarea>

        <button type="submit">Enviar Solicitud</button>
    </form>
</section>

<?php
// 3. Inclusión del Footer
require_once 'includes/footer.php';
?>