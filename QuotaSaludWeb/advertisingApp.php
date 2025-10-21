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
<style>
    /* Estilos específicos para esta página */
    /* ======================================================= */
    /* ESTILOS PARA EL MODAL DE PRÓXIMAMENTE */
    /* ======================================================= */

    /* Contenedor principal del modal (overlay) */
    .custom-modal {
        display: none;
        /* Oculto por defecto */
        position: fixed;
        z-index: 1000;
        /* Asegura que esté por encima de todo */
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgba(0, 0, 0, 0.6);
        /* Fondo semi-transparente */
        justify-content: center;
        /* Centrar horizontalmente */
        align-items: center;
        /* Centrar verticalmente */
        padding: 20px;
        box-sizing: border-box;
    }

    /* Contenido del modal */
    .modal-content {
        background-color: #fefefe;
        padding: 30px;
        border-radius: 12px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        width: 90%;
        max-width: 450px;
        /* Tamaño máximo coherente */
        position: relative;
        text-align: center;
        animation: fadeInScale 0.3s ease-out;
        /* Pequeña animación */
    }

    /* Estilo para el botón de cerrar (la 'X') */
    .close-btn {
        color: var(--color-primary-dark);
        float: right;
        font-size: 28px;
        font-weight: bold;
        position: absolute;
        top: 10px;
        right: 20px;
        cursor: pointer;
        transition: color 0.3s ease;
    }

    .close-btn:hover,
    .close-btn:focus {
        color: var(--color-error);
        text-decoration: none;
    }

    /* Estilos de texto */
    .modal-title {
        color: var(--color-primary-dark);
        font-size: 1.8rem;
        font-weight: 700;
        margin-bottom: 15px;
    }

    .modal-body-text {
        color: var(--color-text);
        font-size: 1.1rem;
        line-height: 1.4;
        margin-bottom: 8px;
    }

    /* Animación de entrada */
    @keyframes fadeInScale {
        from {
            opacity: 0;
            transform: scale(0.9);
        }

        to {
            opacity: 1;
            transform: scale(1);
        }
    }
</style>
<section id="hero">
    <div class="hero-imagen"></div>

    <div class="hero-texto-columna">
        <div class="container-hero">
            <div class="hero-texto">
                <h2>Quota Salud <span style="color: #82c954;">App:</span>El Control Total de tu Bienestar Digital.</h2>
                <h2></h2>
                <p>Tu salud, organizada en tu bolsillo. Gestiona tus pagos programados, accede a tu historial de bienestar y conéctate al instante con nuestra Red de Aliados, todo desde nuestra plataforma segura.y</p>


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
            <h2>Control Total en tus Manos</h2>
            <p>Visualiza tus pagos, cuotas y servicios de forma clara y organizada. Con Quota Salud App sabrás exactamente cuándo y cuánto pagar, sin sorpresas, sin estrés y con recordatorios automáticos.</p>
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

        <!-- CTA FINAL -->
        <div class="cta-final" style="text-align: center; margin-top: 40px;">
            <h3>No pospongas más tu tranquilidad.</h3>
            <p>Descarga la App hoy y toma el control de tu bienestar.</p>
            <div class="app-buttons" style="margin-top: 20px;">
                <a href="#" target="_blank"><img src="img/appS.jpeg" alt="App Store" style="height: 60px; margin-right: 10px;"></a>
                <a href="#" target="_blank"><img src="img/play.png" alt="Google Play" style="height: 60px;"></a>
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