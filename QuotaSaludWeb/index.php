<?php
// =======================================================
// INDEX.PHP - LANDING PAGE PRINCIPAL DE QUOTA SALUD
// =======================================================

// 1. Variables de la página
$page_title = "Quota Salud - Facilidad de Pago para tu Tratamiento";
$page_description = "Accede a tratamientos médicos y odontológicos con facilidad de pago en cuotas sin intereses. Tu salud, sin barreras financieras.";

// 2. Header
require_once 'includes/header.php';
?>

<!-- ================= HERO SECTION ================= -->
<section id="hero">
    <div class="hero-overlay"></div>
    <div class="container-hero">
        <div class="hero-texto ">
            <h2 style="color:  #82c954ff;">Tu Salud no Espera:
                <h2 />
                <h2>Obtén Tratamientos con un Plan de Pago a tu Medida.</h2>
                <p>Quota Salud es la plataforma digital que conecta tu bienestar con una Red de Especialistas y Centros, simplificando la gestión de tus pagos.</p>

                <div class="hero-botones">
                    <a href="#formulario-captacion" class="cta-link">Quiero Solicitar Información</a>
                    <a href="#informacion-principal" class="cta-secondary">Conoce Cómo Funciona</a>
                </div>
        </div>

    </div>
</section>




<!-- ================= INFORMACIÓN PRINCIPAL ================= -->
<section id="informacion-principal">
    <div class="container">
        <div class="section-title">
            <h2>¿Cómo Funciona Quota Salud?</h2>
            <p>Somos el puente entre tu bienestar y la facilidad de pago, colaborando con los mejores centros médicos y odontológicos.</p>
        </div>

        <div class="feature-grid">
            <div class="feature-card">
                <h3>1. Solicitud Rápida</h3>
                <p>Completa nuestro formulario de contacto en menos de 3 minutos. Nos cuentas qué tratamiento o examen necesitas.</p>
            </div>
            <div class="feature-card">
                <h3>2. Aprobación Inmediata</h3>
                <p>Nuestro equipo revisa tu solicitud y te ofrece una propuesta de cuotas sin intereses que se ajusta a tu presupuesto.</p>
            </div>
            <div class="feature-card">
                <h3>3. Tratamiento Garantizado</h3>
                <p>Una vez aprobado, coordinamos tu cita con el especialista. Empieza tu tratamiento de inmediato y paga con calma.</p>
            </div>
        </div>
    </div>
</section>
<!-- ================= SCRIPTS ================= -->
<script src="js/script.js"></script>

<?php
require_once 'includes/footer.php';
?>