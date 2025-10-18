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
                <h2>Quota Salud <span style="color: #82c954;">App</span></h2>
                <h2></h2>
                <p>No pospongas tu salud un día más. Descarga Quota App y planifica tu bienestar hoy</p>
                

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
            <h2>Titulo</h2>
            <p>Conoce los beneficios que te ofrece nuestra App para tener control total sobre tu bienestar financiero y tu salud.</p>
        </div>

        <div class="content-row content-row-default"> 
            <div class="content-column content-text">
                <h3>titulo1</h3>
                <p>ed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            </div>
            <div class="content-column content-image">
                </div>
        </div>

        <div class="content-row content-row-reverse"> 
            <div class="content-column content-image">
                </div>
            <div class="content-column content-text">
                <h3>Directo y Simple</h3>
                <p>Disfruta de la tranquilidad de cuidar tu salud. Quota App organiza tus pagos y te conecta, sin complicaciones, con nuestra Red de Especialistas y Centros Aliados.</p>
            </div>
        </div>

    </div>
</section>
<script src="js/script.js"></script>
<script src="js/app-carrusel.js"></script>

<?php
require_once 'includes/footer.php';
?>