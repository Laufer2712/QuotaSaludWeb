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
            <button class="show-section-btn arrow-btn" data-target="#pilares-section">
                <span class="arrow-icon">&#x25BC;</span>
            </button>
        </div>
    </div>
</section>

<!-- ================= SECCIÓN PILARES (oculta) ================= -->
<section id="pilares-section" class="is-hidden">
    <div class="container">
        <div class="section-title">
            <h2>Haciendo posible que más pacientes terminen su tratamiento</h2>
            <p style="text-align: justify;">8 de cada 10 pacientes abandonan un tratamiento por no poder pagarlo completo.</p>
        </div>

        <div class="benefits-section-container">
            <!-- CARRUSEL COMPACTO -->
            <div class="centered-carousel-container">

                <!-- Track de slides -->
                <div class="centered-carousel-track">
                    <!-- Slide 1 -->
                    <div class="centered-carousel-slide active" data-index="0">
                        <div class="centered-carousel-card">
                            <div class="card-icon">
                                <img src="assets/ICON-5.gif" alt="Icono de Flujo de Pacientes">
                            </div>
                            <div class="feature-header">
                                <h3>Mayor Flujo de Pacientes</h3>
                            </div>
                            <p class="card-description">Atraiga más clientes al eliminar la barrera financiera, facilitando que los pacientes accedan y paguen sus servicios.</p>
                        </div>
                    </div>

                    <!-- Slide 2 -->
                    <div class="centered-carousel-slide" data-index="1">
                        <div class="centered-carousel-card">
                            <div class="card-icon">
                                <img src="assets/ICON-6.gif" alt="Icono de Cero Riesgo">
                            </div>
                            <div class="feature-header">
                                <h3>Cero Riesgo de Impago</h3>
                            </div>
                            <p class="card-description">Garantía de pago total por sus servicios. Quota Salud asume el riesgo de cobranza y mora.</p>
                        </div>
                    </div>

                    <!-- Slide 3 -->
                    <div class="centered-carousel-slide" data-index="2">
                        <div class="centered-carousel-card">
                            <div class="card-icon">
                                <img src="assets/ICON_2-1.gif" alt="Icono de Alto Costo">
                            </div>
                            <div class="feature-header">
                                <h3>Potencial de Alto Costo</h3>
                            </div>
                            <p class="card-description">Aumente la realización de tratamientos de mayor valor, premiando a los pacientes con buen historial de pago.</p>
                        </div>
                    </div>

                    <!-- Slide 4 -->
                    <div class="centered-carousel-slide" data-index="3">
                        <div class="centered-carousel-card">
                            <div class="card-icon">
                                <img src="assets/ICON_3.gif" alt="Icono de Marketing Digital">
                            </div>
                            <div class="feature-header">
                                <h3>Apoyo en Marketing Digital</h3>
                            </div>
                            <p class="card-description">Reciba soporte estratégico para el posicionamiento de su centro o práctica y generación de nuevos leads.</p>
                        </div>
                    </div>

                    <!-- Slide 5 -->
                    <div class="centered-carousel-slide" data-index="4">
                        <div class="centered-carousel-card">
                            <div class="card-icon">
                                <img src="assets/ICON_4-1.gif" alt="Icono de Ventajas Adicionales">
                            </div>
                            <div class="feature-header">
                                <h3>Ventajas Adicionales</h3>
                            </div>
                            <p class="card-description">Acceda a alianzas para adquirir insumos médicos y recibir mejoramiento profesional con facilidades de pago.</p>
                        </div>
                    </div>
                </div>
                <!-- Controles compactos -->
                <div class="centered-carousel-controls">
                    <button class="centered-carousel-btn prev-btn" aria-label="Anterior">
                        <i class="fas fa-chevron-left"></i>
                    </button>

                    <div class="slide-counter">
                        <span id="current-slide">1</span>/<span id="total-slides">5</span>
                    </div>

                    <button class="centered-carousel-btn next-btn" aria-label="Siguiente">
                        <i class="fas fa-chevron-right"></i>
                    </button>
                </div>
                <!-- Indicadores numéricos compactos -->
                <div class="numeric-indicators">
                    <div class="numeric-indicators-container">
                        <button class="numeric-indicator active" data-index="0" aria-pressed="true">
                            <span class="indicator-number">1</span>
                            <span class="indicator-label">Flujo</span>
                        </button>

                        <button class="numeric-indicator" data-index="1" aria-pressed="false">
                            <span class="indicator-number">2</span>
                            <span class="indicator-label">Riesgo</span>
                        </button>

                        <button class="numeric-indicator" data-index="2" aria-pressed="false">
                            <span class="indicator-number">3</span>
                            <span class="indicator-label">Costo</span>
                        </button>

                        <button class="numeric-indicator" data-index="3" aria-pressed="false">
                            <span class="indicator-number">4</span>
                            <span class="indicator-label">Marketing</span>
                        </button>

                        <button class="numeric-indicator" data-index="4" aria-pressed="false">
                            <span class="indicator-number">5</span>
                            <span class="indicator-label">Ventajas</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- BOTÓN PARA MOSTRAR REQUISITOS -->
        <div class="requisitos-btn-container">
            <button class="show-requisitos-btn cta-link" data-target="#seccion-requisitos">
                Ver Requisitos para Afiliarme
            </button>
        </div>
    </div>
</section>

<!-- ================= SECCIÓN REQUISITOS (oculta inicialmente) ================= -->
<section id="seccion-requisitos" class="is-hidden">
    <div class="container">
        <div class="section-title">
            <h2>Requisitos para Afiliación</h2>
            <p>Conozca los requisitos necesarios para formar parte de nuestra red de aliados</p>
        </div>

        <div class="requisitos-content">
            <div class="requisitos-grid">
                <div class="requisito-item">
                    <div class="requisito-icon">📋</div>
                    <h3>Registro Formal</h3>
                    <p>Estar registrados como prestadores formales de salud.</p>
                </div>

                <div class="requisito-item">
                    <div class="requisito-icon">🏥</div>
                    <h3>Acuerdo de Colaboración</h3>
                    <p>Firmar un acuerdo de colaboración (Contrato entre las partes).</p>
                </div>

                <div class="requisito-item">
                    <div class="requisito-icon">💼</div>
                    <h3>Punto de Contacto</h3>
                    <p>Asignar un punto de contacto para la comunicación</p>
                </div>

                <div class="requisito-item">
                    <div class="requisito-icon">📍</div>
                    <h3>Difusión Digital</h3>
                    <p>Colaborar en la difusión digital de la alianza.</p>
                </div>


            </div>
        </div>

        <!-- BOTÓN PARA CERRAR REQUISITOS -->
        <div class="requisitos-btn-container">
            <button class="hide-requisitos-btn cta-link" data-target="#seccion-requisitos">
                Cerrar Requisitos
            </button>
        </div>
    </div>
</section>

<script src="js/script.js"></script>
<script src="js/aliados.js"></script>

<?php
include 'includes/floating.php';
require_once 'includes/footer.php';
?>