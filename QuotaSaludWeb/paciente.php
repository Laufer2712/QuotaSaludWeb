<?php
// =======================================================
// PACIENTE.PHP - LANDING PAGE PRINCIPAL DE QUOTA SALUD
// =======================================================

// 1. Variables de la página
$page_title = "Quota Salud - Facilidad de Pago para tu Tratamiento";
$page_description = "Accede a tratamientos médicos y odontológicos con facilidad de pago en cuotas sin intereses. Tu salud, sin barreras financieras.";

// 2. Header
require_once 'includes/header.php';
?>
<link rel="stylesheet" href="css/paciente.css">

<!-- ================= HERO SECTION ================= -->
<section id="hero">
    <div class="hero-imagen"></div>

    <div class="hero-texto-columna">
        <div class="container-hero"> 
            <div class="hero-texto">
                <h2>Quota <span style="color: #82c954;">Salud</span></h2>
                <h2>La Tecnología que Transforma el Acceso a tu Bienestar</h2>
                <p>Quota Salud es la plataforma digital que conecta tu bienestar con una Red de Especialistas y Centros, simplificando la gestión de tus pagos.</p>
                <p><strong>Descarga nuestra app y descubre cómo podemos facilitar tu bienestar hoy mismo.</strong></p>

                <div class="hero-botones">
                    <a href="advertisingApp.php" class="cta-link">Quota Salud App</a>
                    <a href="#informacion-principal" class="cta-secondary">Tus Beneficios</a>
                </div>
            </div>
        </div>
    </div>

    <div class="cintillo-container">
        </div>
</section>



<!-- ================= INFORMACIÓN PRINCIPAL ================= -->
<section id="informacion-principal">
    <div class="container">
        <div class="section-title">
            <h2>Tus beneficios con <br>Quota Salud</h2>
            <p>Somos el  <strong>ecosistema digital</strong> diseñado para que nunca pospongas tu cuidado.
                 <strong>Organizamos el costo de tratamientos</strong> y servicios con nuestra Red de Aliados,
                  garantizando un <strong>acceso ágil y sin complicaciones económicas.</strong>
                   No somos una institución financiera:
                    somos tu <strong>organizador de pagos de salud</strong> y tu conexión directa con la mejor atención.</p>
        </div>

        <div class="feature-grid">

            <div class="feature-card">
                <h3>1. Pago Digital</h3>
                <p> Organizado, divide el costo de tu tratamiento en <strong>cuotas cómodas y programadas</strong></p>
            </div>

            <div class="feature-card">
                <h3>2. Cero Cargos Ocultos</h3>
                <p>Lo que ves es lo que pagas. Disfruta de la <strong>facilidad de pago en plazos</strong>, sin la complejidad de un crédito</p>
            </div>

            <div class="feature-card">
                <h3>3. Red de Confianza: </h3>
                <p>Accede a tratamientos médicos, odontológicos y de bienestar a través de una <strong> Red de Profesionales y Centros Aliados </strong> rigurosamente seleccionados.</p>
            </div>

        </div>

    </div>
</section>




<!-- ================= SCRIPTS ================= -->
<script src="js/script.js"></script>
<script src="js/app-carrusel.js"></script>

<?php
require_once 'includes/footer.php';
?>