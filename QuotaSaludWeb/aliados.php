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
            <h2>Impulsando tu Bienestar: <br>Nuestros Compromisos</h2>
            <p>Nuestra misión se sostiene sobre pilares fundamentales para garantizar tu salud y tranquilidad.</p>
        </div>

        <div class="feature-grid">
            <div class="feature-card">
                <h3>Accesibilidad Continua</h3>
                <p>Garantizamos que el factor económico no detenga tu salud, ofreciendo una vía tecnológica para gestionar el costo de tu bienestar.</p>
            </div>
            <div class="feature-card">
                <h3>Confianza y Transparencia</h3>
                <p>La gestión de pagos es 100% segura y transparente. Nuestras cuotas no incluyen costos adicionales ni recargos.</p>
            </div>
            <div class="feature-card">
                <h3>Ecosistema de Desarrollo</h3>
                <p>Somos el motor digital que asegura la operatividad y el crecimiento sostenible de nuestra Red de Aliados de Salud, eliminando el riesgo de impago.</p>
            </div>
        </div>

        <!-- Botón al final del section -->
        <div class="cta-container" style="display:flex; justify-content:center; margin-top:50px;">
            <a href="aliados.php" class="cta-link cta-large">Afíliate con nosotros</a>
        </div>

    </div>
</section>




<script src="js/script.js"></script>
<script src="js/aliados.js"></script>

<?php require_once 'includes/footer.php'; ?>