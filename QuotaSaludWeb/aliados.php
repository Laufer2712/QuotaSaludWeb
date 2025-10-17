<?php
$page_title = "Quota Salud - Facilidad de Pago para tu Tratamiento";
$page_description = "Accede a tratamientos médicos y odontológicos con facilidad de pago en cuotas sin intereses. Tu salud, sin barreras financieras.";

require_once 'includes/header.php';
?>

<link rel="stylesheet" href="css/aliados.css">

<!-- ================= SECCIÓN ALIADOS ================= -->
<section id="aliados-section">
    <div class="container">
        <div class="section-title">
            <h2>Nuestra Red de Aliados</h2>
            <p>Explora nuestros aliados certificados por categoría y descubre cómo podemos ayudarte a tu bienestar.</p>
        </div>

        <!-- Botón grande en el centro -->
        <div class="cta-central">
            <a href="aliados.php" class="cta-link cta-large">Afíliarme</a>
        </div>
        <!-- Flecha para mostrar/ocultar sección -->
        <div class="arrow-container">
            <button class="show-section-btn arrow-btn" data-target="#pilares-section"
                data-show-text="&#x25BC;"
                data-hide-text="&#x25B2;"> <!-- flecha arriba -->
                &#x25BC; <!-- inicio: flecha abajo -->
            </button>
        </div>



    </div>
</section>


<!-- ================= SECCIÓN PILARES (oculta) ================= -->
<section id="pilares-section" class="is-hidden">
    <div class="container">
        <div class="section-title">
            <h2>Haciendo posible que más paciente <br>pacientes terminen su tratamiento.</h2>
            <p>8 de cada 10 pacientes abandonan un tratamiento por o poder pagarlo completo.</p>
        </div>
        <section class="benefits-section-container">



            <!-- CONTENEDOR DE CARDS -->
            <div class="central-benefits-layout" id="benefits-container">
                <div class="feature-card" onclick="toggleContent(this)">
                    <img src="assets/ICON-5.gif" alt="Icono de Flujo de Pacientes" class="card-icon">
                    <div class="feature-header">
                        <h3>Mayor Flujo de Pacientes</h3>
                        <span class="toggle-icon">+</span>
                    </div>
                    <p class="hidden-content">Atraiga más clientes al eliminar la barrera financiera, facilitando que los pacientes accedan y paguen sus servicios.</p>
                </div>

                <div class="feature-card" onclick="toggleContent(this)">
                    <img src="assets/ICON-6.gif" alt="Icono de Cero Riesgo" class="card-icon">
                    <div class="feature-header">
                        <h3>Cero Riesgo de Impago</h3>
                        <span class="toggle-icon">+</span>
                    </div>
                    <p class="hidden-content">Garantía de pago total por sus servicios. Quota Salud asume el riesgo de cobranza y mora.</p>
                </div>

                <div class="feature-card" onclick="toggleContent(this)">
                    <img src="assets/ICON_2-1.gif" alt="Icono de Alto Costo" class="card-icon">
                    <div class="feature-header">
                        <h3>Potencial de Alto Costo</h3>
                        <span class="toggle-icon">+</span>
                    </div>
                    <p class="hidden-content">Aumente la realización de tratamientos de mayor valor, premiando a los pacientes con buen historial de pago.</p>
                </div>

                <div class="feature-card" onclick="toggleContent(this)">
                    <img src="assets/ICON_3.gif" alt="Icono de Marketing Digital" class="card-icon">
                    <div class="feature-header">
                        <h3>Apoyo en Marketing Digital</h3>
                        <span class="toggle-icon">+</span>
                    </div>
                    <p class="hidden-content">Reciba soporte estratégico para el posicionamiento de su centro o práctica y generación de nuevos leads.</p>
                </div>

                <div class="feature-card" onclick="toggleContent(this)">
                    <img src="assets/ICON_4-1.gif" alt="Icono de Ventajas Adicionales" class="card-icon">
                    <div class="feature-header">
                        <h3>Ventajas Adicionales</h3>
                        <span class="toggle-icon">+</span>
                    </div>
                    <p class="hidden-content">Acceda a alianzas para adquirir insumos médicos y recibir mejoramiento profesional con facilidades de pago.</p>
                </div>
            </div>


        </section>

        <div class="action-card-wrapper">
            <div class="feature-card action-card">
                <img src="assets/ICON_4-1.gif" alt="Icono de Requisitos" class="card-icon">
                <div class="card-content">
                    <h3>¡Únase a Nuestra Red!</h3>
                    <p>Conozca los sencillos pasos y requisitos para formalizar su alianza con Quota Salud hoy mismo.</p>
                    <a href="#seccion-requisitos" class="button-link">Ver Requisitos</a>
                </div>
            </div>
        </div>



    </div>
</section>




<script src="js/script.js"></script>
<script src="js/aliados.js"></script>

<?php require_once 'includes/footer.php'; ?>