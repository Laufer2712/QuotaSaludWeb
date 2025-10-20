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
            <h2 style="color: #82c954ff;">Tu Salud sin Espera:</h2>
            <h2 style="color: #ffffffff;">Acceso Completo y Pagos Flexibles.</h2>
            <p>Te conectamos con una red integral de servicios de bienestar <strong> tratamientos y consultas hasta exámenes de laboratorio e imagenología</strong> facilitamos la división digital de tus pagos para que accedas a ellos de inmediato. Tu tranquilidad no tiene que esperar.</p>

            <div class="hero-botones">
                <a href="aliados.php" class="cta-aliado">Soy Centro de Salud</a>
                <a href="paciente.php" class="cta-usuario">Soy Usuario</a>
            </div>
        </div>
    </div>

    <!-- ================= CINTILLO MOVIBLE ================= -->
    <div class="cintillo-container">
        <div class="cintillo-track">
            <div class="confidence-item"><span class="confidence-icon">✔️</span>Pago Fraccionado Seguro</div>
            <span class="confidence-separator">|</span>
            <div class="confidence-item"><span class="confidence-icon">✔️</span>Sin Cargos Adicionales</div>
            <span class="confidence-separator">|</span>
            <div class="confidence-item"><span class="confidence-icon">✔️</span>Red de Aliados Certificados</div>
            <span class="confidence-separator">|</span>
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
            <h2>Tu Acceso al Bienestar en <br>3 Pasos Sencillos con Quota Salud</h2>
            <p>Simplificamos el proceso. Descubre cómo nuestra plataforma digital organiza tu cuidado y tus pagos.</p>
        </div>

        <div class="feature-grid">

            <div class="feature-card">
                <h3>1. ¡Accede y Recibe!</h3>
                <p>Regístrate en nuestra App y conecta con el servicio (especialista, examen o tratamiento). Realiza un pago inicial y <strong>¡recibe tu atención médica sin esperar la aprobación del total!</strong></p>
            </div>

            <div class="feature-card">
                <h3>2. ¡Estructura tus Plazos!</h3>
                <p>Una vez recibido el servicio, nuestra plataforma estructura automáticamente la división del monto restante en plazos flexibles y transparentes. Revisa y acepta tu plan de organización de pago, <strong>sin costos extra ni sorpresas.</strong></p>
            </div>

            <div class="feature-card">
                <h3>3. ¡Gestiona desde la App!</h3>
                <p>Realiza la gestión de tus pagos programados de forma fácil y segura a través de la App Quota Salud. <strong>Completa el ciclo de pago y mantén tu historial de bienestar impecable.</strong></p>
            </div>

        </div>

        <!-- Botón para mostrar/ocultar CTA 
        <div class="toggle-container" style="text-align:center; margin-top:30px;">
            <button class="show-section-btn "
                data-target="#ver-mas-section"
                data-show-text="Quiero conocer más"
                data-hide-text="Ocultar">
                <span>Quiero conocer más</span>
                <i class="arrow down"></i>
            </button>
        </div>-->

    </div>
</section>
<!-- ================= SECCIÓN NUESTRO COMPROMISO ================= -->
<section id="ver-mas-section">
    <div class="section-title">
        <h2>Quota Salud: <br>Impulsando tu Bienestar con Propósito</h2>
        <p>Nuestra esencia, nuestros valores y la visión que nos mueve.</p>
    </div>

    <div class="cards-wrapper-vertical">
        <!-- CARD 1: Misión -->
        <div class="feature-card1">
            <img src="img/Mision.png" alt="Misión" class="card-img">
            <h3>Nuestra Misión</h3>
            <p>Democratizamos el acceso a la salud, eliminando barreras económicas y conectando a todos con la atención médica que merecen.</p>
        </div>

        <!-- CARD 2: Visión -->
        <div class="feature-card1">
            <img src="img/Vision.png" alt="Visión" class="card-img">
            <h3>Nuestra Visión</h3>
            <p>Ser el ecosistema digital de bienestar más confiable, donde planificar tu cuidado es claro, seguro y sin sorpresas.</p>
        </div>

        <!-- CARD 3: Valores -->
        <div class="feature-card1">
            <img src="img/Valores.png" alt="Valores" class="card-img">
            <h3>Nuestros Valores</h3>
            <p>Humanidad, Acceso Genuino y Confianza Digital guían cada acción, conectando personas y proveedores en un ecosistema confiable.</p>
        </div>

        <!-- CARD 4: Aliados -->
        <div class="feature-card2">
            <img src="img/aliados-b2b.png" alt="Aliados B2B" class="card-img">
        </div>

    </div>



    <!-- ================= TABS EXISTENTES ================= -->
    <!-- <div id="tabs-section" class="card">
        <div class="tabs-nav">
            <button class="tab-button active" onclick="openTab(event, 'mision')">¿Qué Somos?</button>
            <button class="tab-button" onclick="openTab(event, 'vision')">¿Qué Hacemos?</button>
            <button class="tab-button" onclick="openTab(event, 'valores')">Nuestros Valores</button>
        </div>

        <div id="mision" class="tab-content active">
            <ul class="feature-list">
                <li><strong>Democratizamos el acceso a la salud:</strong><span> Eliminando barreras económicas, conectando a cada persona con la atención médica y odontológica que necesita.</span></li>
                <li><strong>Cuotas cómodas y seguras:</strong><span> Organiza tus tratamientos sin sorpresas, garantizando equidad en el acceso al bienestar.</span></li>
                <li><strong>Puente digital confiable:</strong> <span>Te devolvemos la tranquilidad de poder cuidarte, con soporte y seguridad en cada paso.</span></li>
            </ul>
        </div>

        <div id="vision" class="tab-content">
            <ul class="feature-list">
                <li><strong>Ecosistema digital confiable:</strong><span> Aspiramos a ser el ecosistema digital de bienestar más querido y confiable de Venezuela.</span></li>
                <li><strong>Planificación con certidumbre:</strong><span> Cada persona puede planificar su cuidado con total claridad y seguridad.</span></li>
                <li><strong>Innovación y accesibilidad:</strong><span> Referente en innovación, humanidad y accesibilidad continua en el sector salud.</span></li>
            </ul>
        </div>

        <div id="valores" class="tab-content">
            <ul class="feature-list">
                <li><strong>Humanidad y Empatía:</strong> <span>Ponemos a la persona en el centro de todas nuestras decisiones.</span></li>
                <li><strong>Acceso Genuino:</strong><span> Facilitamos el camino hacia tu tratamiento sin obstáculos.</span></li>
                <li><strong>Confianza y Claridad Digital:</strong><span> Transparencia total en pagos y gestión.</span></li>
                <li><strong>Conexión y Red de Apoyo:</strong><span>Apoyo a pacientes y crecimiento para proveedores.</span></li>
                <li><strong>Innovación con Propósito:</strong><span>Soluciones tecnológicas que hacen la gestión más fácil e intuitiva.</span></li>
            </ul>
        </div>
    </div>-->

    <br>
    <div class="hero-botones">
        <a href="aliados.php" class="cta-aliado">Soy Centro de Salud</a>
        <a href="paciente.php" class="cta-usuario">Soy Usuario</a>
    </div>
</section>


<!-- ================= SCRIPTS ================= -->
<script src="js/script.js"></script>
<?php
include 'includes/floating.php';
?>

<?php
require_once 'includes/footer.php';
?>