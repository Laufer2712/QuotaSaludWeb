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
        <!-- Botón para mostrar/ocultar CTA -->
        <div class="toggle-container" style="text-align:center; margin-top:30px;">
            <button class="show-section-btn arrow-btn"
                data-target="#ver-mas-section"
                data-show-text="Quiero conocer más"
                data-hide-text="Ocultar">
                <span>Quiero conocer más</span>
                <i class="arrow down"></i>
            </button>
        </div>

    </div>
</section>

<!-- ================= SECCIÓN VER MÁS CON CARD ================= -->
<section id="ver-mas-section">
    <div id="tabs-section" class="card">
        <!-- NAV DE PESTAÑAS -->
        <div class="tabs-nav">
            <button class="tab-button active" onclick="openTab(event, 'mision')">¿Qué Somos?</button>
            <button class="tab-button" onclick="openTab(event, 'vision')">¿Qué Hacemos?</button>
            <button class="tab-button" onclick="openTab(event, 'valores')">Nuestros valores</button>
        </div>

        <!-- CONTENIDO DE PESTAÑAS -->
        <div class="tab-content active">
            <ul>
                <li><span class="bullet"></span><strong>Democratizar el acceso a la salud:</strong> Eliminamos las barreras económicas, conectando a cada persona con la atención médica y odontológica que necesita.</li>
                <li><span class="bullet"></span><strong>Cuotas cómodas y seguras:</strong> Organiza tus tratamientos sin sorpresas, garantizando equidad en el acceso al bienestar.</li>
                <li><span class="bullet"></span><strong>Puente digital confiable:</strong> Te devolvemos la tranquilidad de poder cuidarte, con soporte y seguridad en cada paso.</li>
            </ul>
        </div>

        <div id="vision" class="tab-content">
            <ul class="vision-list">
                <li><span class="bullet"></span><strong>Ecosistema digital confiable:</strong> Aspiramos a ser el ecosistema digital de bienestar más querido y confiable de Venezuela.</li>
                <li><span class="bullet"></span><strong>Planificación con certidumbre:</strong> Cada persona puede planificar su cuidado con total claridad y seguridad.</li>
                <li><span class="bullet"></span><strong>Innovación y accesibilidad:</strong> Referente en innovación, humanidad y accesibilidad continua en el sector salud.</li>
            </ul>
        </div>

        <div id="valores" class="tab-content">
            <ul class="valores-list">
                <li><span class="bullet"></span><strong>Humanidad y Empatía:</strong> Ponemos a la persona en el centro de todas nuestras decisiones.</li>
                <li><span class="bullet"></span><strong>Acceso Genuino:</strong> Facilitamos el camino hacia tu tratamiento sin obstáculos.</li>
                <li><span class="bullet"></span><strong>Confianza y Claridad Digital:</strong> Transparencia total en pagos y gestión.</li>
                <li><span class="bullet"></span><strong>Conexión y Red de Apoyo:</strong> Apoyo a pacientes y crecimiento para proveedores.</li>
                <li><span class="bullet"></span><strong>Innovación con Propósito:</strong> Soluciones tecnológicas que hacen la gestión más fácil e intuitiva.</li>
            </ul>
        </div>
    </div>
</section>


<!-- ================= SCRIPTS ================= -->
<script src="js/script.js"></script>

<?php
require_once 'includes/footer.php';
?>