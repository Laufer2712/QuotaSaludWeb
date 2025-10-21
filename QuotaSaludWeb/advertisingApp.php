<?php
// =======================================================
// ADVERTISINGAPP.PHP - LANDING PAGE ESPECÍFICA PARA PROMOCIÓN DE APP
// =======================================================

// 1. Variables de la página
$page_title = "App Promocional - Quota Salud - Facilidad de Pago";
$page_description = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.";

// 2. Header
require_once 'includes/header.php';
?>
<link rel="stylesheet" href="css/advertisingApp.css">

<section id="hero">
    <div class="hero-imagen"></div>

    <div class="hero-texto-columna">
        <div class="container-hero">
            <div class="hero-texto">
                <h2>Quota Salud <span style="color: #82c954;">App:</span>El Control Total de tu Bienestar Digital.</h2>
                <h2></h2>
                <p>Tu salud, organizada en tu bolsillo. Gestiona tus pagos programados, accede a tu historial de bienestar y conéctate al instante con nuestra Red de Aliados, todo desde nuestra plataforma segura.y</p>


                <div class="hero-botones">
                    <a href="descarga.php" class="cta-link">Descarga la App Ahora</a>
                    <a href="#nuestra-solucion" class="cta-secondary">Mas Informacion</a>
                </div>
            </div>
        </div>
    </div>

    <div class="cintillo-container">
    </div>
</section>


<section id="nuestra-solucion">
    <div class="container">

        <div class="section-title">
            <h2>Control Total en tus Manos.
            </h2>
            <p>Visualiza tus pagos, cuotas y servicios de forma clara y organizada. Con Quota App sabrás exactamente cuándo y cuánto pagar, sin sorpresas, sin estrés y con recordatorios automáticos.
            </p>
        </div>

        <!-- BLOQUE 1 -->
        <div class="content-row content-row-default">
            <div class="content-column content-text">
                <h3>Organización de Pagos</h3>
                <p>Visualiza tu Plan de Cuotas en tiempo real. Paga tu próxima cuota y consulta el monto restante con total claridad.</p>
            </div>
            <div class="content-column content-image" style="background-image: url('img/app1.png');">
            </div>
        </div>

        <!-- BLOQUE 2 -->
        <div class="content-row content-row-reverse">
            <div class="content-column content-text">
                <h3>Conexión Directa</h3>
                <p>Busca, reserva y gestiona tus citas con nuestra Red de Especialistas y Centros Aliados.</p>
            </div>
            <div class="content-column content-image" style="background-image: url('img/app2.png');">
            </div>
        </div>

        <!-- BLOQUE 3 -->
        <div class="content-row content-row-default">
            <div class="content-column content-text">
                <h3>Historial de Bienestar</h3>
                <p>Accede a un historial digital de tus tratamientos y pagos realizados a través de la plataforma.</p>
            </div>
            <div class="content-column content-image" style="background-image: url('img/app1.png');">
            </div>
        </div>

        <!-- BLOQUE 4 -->
        <div class="content-row content-row-reverse">
            <div class="content-column content-text">
                <h3>Alerta de Tranquilidad</h3>
                <p>Recibe recordatorios automáticos para mantener tu organización de pagos impecable.</p>
            </div>
            <div class="content-column content-image" style="background-image: url('img/app2.png');">
            </div>
        </div>
    </div>
</section>


<script src="js/script.js"></script>
<script src="js/app-carrusel.js"></script>
<?php
include 'includes/floating.php';
?>
<?php
require_once 'includes/footer.php';
?>