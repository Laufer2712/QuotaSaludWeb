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
        <div class="hero-texto">
            <h2 style="color: #82c954ff;">Tu Salud no Espera:</h2>
            <h2 style="color: #ffffffff;">Obtén Tratamientos con un Plan de Pago por cuotas, sin intereses y con seguridad absoluta.</h2>
            <p>Quota Salud es la plataforma digital que conecta tu bienestar con una Red de Especialistas y Centros, simplificando la gestión de tus pagos.</p>

            <div class="hero-botones">
                <a href="aliados.php" class="cta-link">Deseo Afiliarme</a>
                <a href="#informacion-principal" class="cta-secondary">Conoce Cómo Funciona</a>
            </div>
        </div>
    </div>

    <!-- ================= CINTILLO MOVIBLE ================= -->
    <div class="cintillo-container">
        <div class="cintillo-track" data-duplicate="Pago Fraccionado Seguro | Sin Cargos Adicionales | Red de Aliados Certificados | Pago Fraccionado Seguro | Sin Cargos Adicionales | Red de Aliados Certificados">

            <div class="confidence-item"><span class="confidence-icon">✔️</span>Pago Fraccionado Seguro</div>
            <span class="confidence-separator">|</span>
            <div class="confidence-item"><span class="confidence-icon">✔️</span>Sin Cargos Adicionales</div>
            <span class="confidence-separator">|</span>
            <div class="confidence-item"><span class="confidence-icon">✔️</span>Red de Aliados Certificados</div>
            <div class="confidence-item"><span class="confidence-icon">✔️</span>Pago Fraccionado Seguro</div>
            <span class="confidence-separator">|</span>
            <div class="confidence-item"><span class="confidence-icon">✔️</span>Sin Cargos Adicionales</div>
            <span class="confidence-separator">|</span>
            <div class="confidence-item"><span class="confidence-icon">✔️</span>Red de Aliados Certificados</div>
        </div>
    </div>
</section>




<!-- ================= INFORMACIÓN PRINCIPAL ================= -->
<section id="informacion-principal">
    <div class="container">
        <div class="section-title">
            <h2>Tu Tratamiento en 3 Pasos Sencillos con <br>Quota Salud</h2>
            <p>Descubre cómo funciona. Simplificamos el acceso a tu bienestar. Así funciona el proceso, diseñado para tu comodidad:</p>
        </div>

        <div class="feature-grid">

            <div class="feature-card">
                <h3>1. ¡Conéctate!</h3>
                <p>Encuentra en nuestra plataforma al Centro Médico o Especialista Aliado que necesitas para iniciar tu proceso.</p>
            </div>

            <div class="feature-card">
                <h3>2. ¡Planifica!</h3>
                <p>Selecciona el tratamiento y nuestra plataforma te ayudará a estructurar el pago total en plazos convenientes, <strong>sin costos extra</strong>.</p>
            </div>

            <div class="feature-card">
                <h3>3. ¡Cuídate!</h3>
                <p>Realiza la gestión de tus pagos de forma segura y digital, y <strong>tu tratamiento sin demoras</strong>.</p>
            </div>

        </div>

    </div>
</section>




<!-- ================= SCRIPTS ================= -->
<script src="js/script.js"></script>

<?php
require_once 'includes/footer.php';
?>