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
                    <a href="#" class="cta-link" id="btn-descargar-app">Descarga la App Ahora</a>
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
            <h2>Disfruta los beneficios de usar Quota App</h2>
            <p>Con Quota App, tus compras y servicios son más accesibles. Divide tus pagos, disfruta cuotas sin intereses y obtén beneficios exclusivos en los comercios aliados.</p>
        </div>

        <div class="content-row content-row-default">
            <div class="content-column content-text">
                <h3>Compra ahora, paga sin estrés</h3>
                <p>Olvídate de los pagos únicos. Con Quota App puedes dividir tus compras o servicios en cómodas cuotas sin intereses, ajustadas a tu presupuesto. Más control, más libertad financiera.</p>
            </div>
            <div class="content-column content-image"
                style="background-image: url('img/app1.png');">
            </div>
        </div>

        <div class="content-row content-row-reverse">
            <div class="content-column content-image"
                style="background-image: url('img/app2.png');">
            </div>
            <div class="content-column content-text">
                <h3>Encuentra comercios aliados cerca de ti</h3>
                <p>Descubre tiendas, clínicas y servicios que aceptan Quota App. Usa el mapa integrado para llegar directamente al sitio, muestra tu código y disfruta tus beneficios en el momento.</p>
            </div>
        </div>

        </div>
</section>


<script src="js/script.js"></script>
<script src="js/app-carrusel.js"></script>
<?php
include 'includes/floating.php';
?>

<div id="proximamenteModal" class="custom-modal">
    <div class="modal-content">
        <span class="close-btn">&times;</span>
        <h3 class="modal-title">¡Próximamente! 🚀</h3>
        <p class="modal-body-text">Estamos terminando los detalles finales para ofrecerte la mejor experiencia.</p>
        <p class="modal-body-text">¡Regresa pronto!</p>
    </div>
</div>
<?php
require_once 'includes/footer.php';
?>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const btnDescargar = document.getElementById('btn-descargar-app');
        const modal = document.getElementById('proximamenteModal');
        const closeBtn = modal.querySelector('.close-btn');

        // Función para abrir el modal
        btnDescargar.addEventListener('click', function(e) {
            e.preventDefault(); // Previene la navegación
            modal.style.display = 'flex';
        });

        // Función para cerrar el modal con la 'X'
        closeBtn.addEventListener('click', function() {
            modal.style.display = 'none';
        });

        // Función para cerrar el modal haciendo click fuera
        window.addEventListener('click', function(e) {
            if (e.target === modal) {
                modal.style.display = 'none';
            }
        });
    });
</script>