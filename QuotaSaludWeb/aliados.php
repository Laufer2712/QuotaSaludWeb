<?php
$page_title = "Quota Salud - Facilidad de Pago para tu Tratamiento";
$page_description = "Accede a tratamientos médicos y odontológicos con facilidad de pago en cuotas sin intereses. Tu salud, sin barreras financieras.";

require_once 'includes/header.php';
?>

<link rel="stylesheet" href="css/aliados.css">

<!-- ================= SECCIÓN ALIADOS ================= -->
<section id="aliados-section">
    <div class="container-aliados">
        <!-- COLUMNA DE TEXTO -->
        <div class="aliados-texto-columna">
            <div class="aliados-texto">
                <h2>Impulsa tu Crecimiento y Asegura tu Ingreso</h2>
                <p>Atrae más Pacientes y Garantiza tu Flujo de Caja. Crecimiento sin riesgos con la Tecnología de Quota Salud.</p>

                <div class="cta-central">
                    <a href="form.php" class="cta-link">Quiero ser Aliado y Garantizar Mis Ingresos</a>
                </div>

                <div class="arrow-container">
                    <button class="show-section-btn arrow-btn" data-target="#pilares-section" aria-label="Mostrar más">
                        <span class="arrow-icon"></span>
                    </button>
                </div>

            </div>
        </div>

        <!-- COLUMNA DE IMAGEN -->
        <div class="aliados-imagen"></div>
    </div>
</section>



<!-- ================= SECCIÓN PILARES (Beneficios) ================= -->
<section id="pilares-section" class="is-hidden">
    <div class="benefits-section-container">

        <!-- Título -->
        <div class="section-title">
            <h2>Conoce tus beneficios como Aliado!</h2>
        </div>

        <!-- GRID DE CARDS -->
        <div class="cards-grid">
            <!-- Card 1 -->
            <div class="card-item">
                <div class="card-image">
                    <img src="img/MayorFlujo.png" alt="Flujo de Pacientes">
                </div>
                <div class="card-content">
                    <div class="feature-header">
                        <h3>Cobro Total Garantizado</h3>
                    </div>
                    <p class="card-description">
                        Nos ocupamos de todo. Tú enfócate en la salud.
                    </p>
                    <ul class="benefits-list">
                        <li>Cero Riesgo de Impago (Asumimos el riesgo).</li>
                        <li>Sin complicación de papeleo bancario.</li>
                    </ul>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="card-item">
                <div class="card-image">
                    <img src="img/Impago.png" alt="Cero Riesgo de Impago">
                </div>
                <div class="card-content">
                    <div class="feature-header">
                        <h3>Fideliza y Atrae Nuevos Pacientes</h3>
                    </div>
                    <p class="card-description">
                        Abre tu centro a nuevos pacientes que buscan flexibilidad de pago.
                    </p>
                    <ul class="benefits-list">
                        <li>Retienes a tus pacientes actuales.</li>
                        <li>Aumenta la tasa de cierre de tratamientos (ticket promedio).</li>
                    </ul>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="card-item">
                <div class="card-image">
                    <img src="img/Potencial.png" alt="Potencial de Alto Costo">
                </div>
                <div class="card-content">
                    <div class="feature-header">
                        <h3>Gestión 100% Digital y Simple</h3>
                    </div>
                    <p class="card-description">
                        Nos encargamos del proceso completo: validación del paciente y organización de pagos.
                    </p>
                    <ul class="benefits-list">
                        <li>Transferencia de fondos a tu cuenta.</li>
                        <li>Tú solo te enfocas en lo que mejor haces: brindar salud.</li>
                    </ul>
                </div>
            </div>

            <!-- Card 4 -->
            <div class="card-item">
                <div class="card-image">
                    <img src="img/Apoyo.png" alt="Apoyo en Marketing Digital">
                </div>
                <div class="card-content">
                    <div class="feature-header">
                        <h3>Soporte Estratégico y Beneficios</h3>
                    </div>
                    <p class="card-description">
                        Crecimiento operativo y beneficios exclusivos que optimizan tu operación y proyectan tu crecimiento:
                    </p>
                    <ul class="benefits-list">
                        <li>Apoyo en Marketing Digital para posicionamiento y atracción de nuevos pacientes.</li>
                        <li>Adquisición de insumos y equipos médicos con pago programado en cuotas.</li>
                        <li>Facilidades de pago exclusivas para mejoramiento profesional y operativo.</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Mensaje motivador y CTA -->
        <div class="benefits-cta">
            <ul class="nota-grid">
                <li class="nota-item">
                    <div class="nota-text">
                        <h3>Convierte tu Centro en un Aliado Estratégico.</h3>
                        <p>Únete hoy para aumentar tu flujo de pacientes y asegurar cada ingreso.</p>
                    </div>
                </li>
            </ul>

            <div class="requisitos-btn-container">
                <a href="form.php" class="show-requisitos-btn cta-link">Quiero ser Aliado</a>
                <button class="show-requisitos-btn cta-link" data-target="#seccion-requisitos">
                    Ver Requisitos para Afiliarme
                </button>
            </div>
        </div>
    </div>
</section>


<!-- ================= SECCIÓN REQUISITOS (oculta inicialmente) ================= -->
<section id="seccion-requisitos" class="is-hidden">
    <div class="container">
        <div class="section-title">
            <h2>Requisitos para Afiliación</h2>
            <p>Conozca los requisitos necesarios para formar parte de nuestra red de aliados.</p>
        </div>

        <ul class="requisitos-list requisitos-grid">
            <li class="requisito-item">
                <span class="requisito-icon">1</span>
                <div class="requisito-text">
                    <h3>Registro Formal</h3>
                    <p>Estar registrados como prestadores formales de salud.</p>
                </div>
            </li>

            <li class="requisito-item">
                <span class="requisito-icon">2</span>
                <div class="requisito-text">
                    <h3>Acuerdo de Colaboración</h3>
                    <p>Firmar un acuerdo de colaboración (Contrato entre las partes).</p>
                </div>
            </li>

            <li class="requisito-item">
                <span class="requisito-icon">3</span>
                <div class="requisito-text">
                    <h3>Punto de Contacto</h3>
                    <p>Asignar un punto de contacto para la comunicación</p>
                </div>
            </li>

            <li class="requisito-item">
                <span class="requisito-icon">4</span>
                <div class="requisito-text">
                    <h3>Difusión Digital</h3>
                    <p>Colaborar en la difusión digital de la alianza.</p>
                </div>
            </li>
        </ul>

        <div class="requisitos-btn-container">
            <button class="hide-requisitos-btn cta-link" data-target="#seccion-requisitos">
                Cerrar Requisitos
            </button>
            <a href="form.php" class="cta-link cta-large afiliate-btn">
                Quiero ser aliado
            </a>
        </div>
    </div>
</section>

<script src="js/script.js"></script>
<script src="js/aliados.js"></script>

<?php
include 'includes/floating.php';
require_once 'includes/footer.php';
?>