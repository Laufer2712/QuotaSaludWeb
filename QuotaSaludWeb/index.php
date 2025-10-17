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

        <div style="text-align: center; margin-top: 30px;">
            <button class="show-section-btn arrow-btn"
                data-target="#ver-mas-section" data-show-text="Quiero conocer mas" data-hide-text="Ocultar">

                <span>Quiero conocer mas</span>
                <i class="arrow down"></i>
            </button>
        </div>
    </div>
    </div>
</section>


<!-- ================= SECCIÓN Ver Mas (inicialmente oculta) ================= -->
<section id="ver-mas-section">
    <div class="container">
        <div class="section-title">
            <h2>Nuestra Esencia y Compromiso</h2>
            <p>Conoce los pilares que nos definen y la dirección que guía nuestro servicio.</p>
        </div>

        <section id="tabs-section">
            <div class="tabs-nav">
                <button class="tab-button active" onclick="openTab(event, 'mision')">Misión</button>
                <button class="tab-button" onclick="openTab(event, 'vision')">Visión</button>
                <button class="tab-button" onclick="openTab(event, 'valores')">Valores</button>
            </div>

            <div class="tab-content active" id="mision">
                <h3>Nuestra Misión</h3>
                <p>Democratizamos el acceso a la salud eliminando barreras económicas y conectando a cada persona con la atención médica y odontológica que necesita a través de nuestra red aliada.</p>
                <p>Facilitamos la organización del costo en cuotas cómodas y seguras, garantizando equidad y bienestar para todos.</p>
            </div>

            <div class="tab-content" id="vision">
                <h3>Nuestra Visión</h3>
                <p>Aspiramos a ser el ecosistema digital de bienestar más confiable y querido de Venezuela, reconocido por eliminar las barreras de acceso a la salud.</p>
                <p>Queremos un futuro donde cada persona planifique su cuidado con certeza, y donde los centros de salud prosperen sin preocuparse por la gestión de cobros.</p>
            </div>

            <div class="tab-content" id="valores">
                <h3>Nuestros Valores</h3>
                <ul class="values-list">
                    <li><strong>Humanidad y Empatía:</strong> La persona es el centro de todo.</li>
                    <li><strong>Acceso Genuino:</strong> Simplificamos y abrimos el camino hacia el tratamiento.</li>
                    <li><strong>Confianza y Claridad Digital:</strong> Transparencia absoluta y seguridad en cada paso.</li>
                    <li><strong>Conexión y Red de Apoyo:</strong> Crecemos juntos, pacientes y aliados.</li>
                    <li><strong>Innovación con Propósito:</strong> Tecnología útil, humana y constante.</li>
                </ul>
            </div>
        </section>
    </div>
</section>

<!-- ================= SCRIPTS ================= -->
<script src="js/script.js"></script>

<?php
require_once 'includes/footer.php';
?>