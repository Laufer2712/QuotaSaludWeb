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

<!-- ================= SECCIÓN ALIADOS ================= -->
<section id="aliados-section">
    <div class="container">
        <div class="section-title">
            <h2>Nuestra Red de Usuarios</h2>
            <p>Explora nuestros aliados certificados por categoría y descubre cómo podemos ayudarte a tu bienestar.</p>
        </div>

        <!-- Pestañas existentes -->
        <div class="tabs">
            <button class="tab-link active" data-tab="clinicas">Clínicas</button>
            <button class="tab-link" data-tab="especialistas">Especialistas</button>
            <button class="tab-link" data-tab="farmacias">Farmacias</button>
        </div>

        <!-- Contenidos de pestañas -->
        <div class="tab-content active" id="clinicas">
            <div class="aliados-grid">
                <div class="aliado-logo-card"><img src="img/aliados/clinica1.png" class="aliado-logo" alt="Clínica 1"></div>
                <div class="aliado-logo-card"><img src="img/aliados/clinica2.png" class="aliado-logo" alt="Clínica 2"></div>
                <div class="aliado-logo-card"><img src="img/aliados/clinica3.png" class="aliado-logo" alt="Clínica 3"></div>
            </div>
        </div>
        <!-- resto de tab-content igual -->

        <!-- Botón para mostrar/ocultar sección de pilares -->
        <div style="text-align: center; margin-top: 30px;">
            <button class="show-section-btn" data-target="#pilares-section"
                data-show-text="Ver nuestros pilares"
                data-hide-text="Ocultar pilares">
                Ver nuestros pilares
            </button>
        </div>
    </div>
</section>

<!-- ================= SECCIÓN PILARES (inicialmente oculta) ================= -->
<section id="pilares-section" style="display: none;">
    <div class="container">
        <div class="section-title">
            <h2>Impulsando tu Bienestar: Nuestros Compromisos</h2>
            <p>Nuestra misión se sostiene sobre pilares fundamentales para garantizar tu salud y tranquilidad.</p>
        </div>

        <div class="feature-grid">
            <!-- feature-card 1 -->
            <div class="feature-card">
                <h3>Accesibilidad Continua</h3>
                <p>Garantizamos que el factor económico no detenga tu salud, ofreciendo una vía tecnológica para gestionar el costo de tu bienestar.</p>
            </div>
            <!-- feature-card 2 -->
            <div class="feature-card">
                <h3>Confianza y Transparencia</h3>
                <p>La gestión de pagos es 100% segura y transparente. Nuestras cuotas no incluyen costos adicionales ni recargos.</p>
            </div>
            <!-- feature-card 3 -->
            <div class="feature-card">
                <h3>Ecosistema de Desarrollo</h3>
                <p>Somos el motor digital que asegura la operatividad y el crecimiento sostenible de nuestra Red de Aliados de Salud, eliminando el riesgo de impago.</p>
            </div>
        </div>

        <!-- Botón para mostrar/ocultar CTA -->
        <div style="text-align: center; margin-top: 30px;">
            <button class="show-section-btn" data-target="#afiliate-cta-section"
                data-show-text="Afíliate ahora"
                data-hide-text="Ocultar CTA">
                Afíliate ahora
            </button>
        </div>
    </div>
</section>


<!-- ================= CTA AFÍLIATE CON NOSOTROS ================= -->
<section id="afiliate-cta-section" style="padding: 40px 0; text-align: center; background-color: #f0f0f0;">
    <div class="container">
        <h2 style="font-size: 1.8rem; margin-bottom: 20px; color: #333;">¿Eres un Centro Médico o Especialista?</h2>
        <a href="aliados.php" class="cta-link">Afíliate con nosotros</a>
    </div>
</section>


<!-- ================= SCRIPTS ================= -->
<script src="js/script.js"></script>
<script src="js/users.js"></script>
<?php
require_once 'includes/footer.php';
?>