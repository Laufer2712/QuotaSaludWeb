<?php
// =======================================================
// HEADER.PHP - Inicio de la estructura HTML y navegación
// =======================================================

$page_title = $page_title ?? "Quota Salud - Soluciones de Pago";
$page_description = $page_description ?? "Accede a tratamientos médicos y odontológicos con facilidad de pago en cuotas sin intereses.";

$estado_formulario = $_GET['estado'] ?? null;

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <!-- Favicon -->
    <link rel="icon" href="img/LOGO-ICON.png" type="image/png">

    <!-- CSS Principal -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/header-footer.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?php echo $page_title; ?></title>
    <meta name="description" content="<?php echo $page_description; ?>">

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700;900&display=swap" rel="stylesheet">

    <!-- Font Awesome para iconos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body id="top">

    <header>
        <div class="contenedor header-content">
            <a href="index.php" class="logo-link">
                <img src="img/QUOTALOGO.png" alt="Quota Salud Logo" class="logo-animado">
            </a>

            <!-- Menú hamburguesa para móvil -->
            <div class="menu-toggle" id="mobile-menu">
                <span></span>
                <span></span>
                <span></span>
            </div>

            <nav class="nav" id="main-nav">
                <a href="index.php" class="nav-link">¿Quienes somos?</a>
                <a href="paciente.php" class="nav-link">Para Usuarios</a>
                <a href="aliados.php" class="nav-link">Para Aliados</a>
                <a href="#formulario-captacion" class="nav-link cta-link">Contactanos</a>
            </nav>
        </div>
    </header>

    <script>
        // JavaScript para el menú desplegable en móvil
        document.addEventListener('DOMContentLoaded', function() {
            const mobileMenu = document.getElementById('mobile-menu');
            const nav = document.getElementById('main-nav');

            mobileMenu.addEventListener('click', function() {
                nav.classList.toggle('active');
                mobileMenu.classList.toggle('active');
            });

            // Cerrar el menú al hacer clic en un enlace (en dispositivos móviles)
            const navLinks = document.querySelectorAll('.nav-link');
            navLinks.forEach(link => {
                link.addEventListener('click', function() {
                    if (window.innerWidth <= 768) {
                        nav.classList.remove('active');
                        mobileMenu.classList.remove('active');
                    }
                });
            });

            // Cerrar el menú al redimensionar la ventana a un tamaño mayor
            window.addEventListener('resize', function() {
                if (window.innerWidth > 768) {
                    nav.classList.remove('active');
                    mobileMenu.classList.remove('active');
                }
            });
        });
    </script>


    <!-- MODAL DE CONTACTO -->
    <div id="contactModal" class="modal">
        <div class="modal-content">
            <span class="close-modal">&times;</span>
            <h2>Contáctanos</h2>
            <p>Selecciona tu método preferido para comunicarte con nosotros:</p>
            <div class="modal-buttons">
                <a href="#" id="whatsappBtn" class="btn btn-whatsapp">
                    <i class="fab fa-whatsapp"></i> WhatsApp
                </a>
                <a href="#" id="emailBtn" class="btn btn-email">
                    <i class="fas fa-envelope"></i> Correo
                </a>
            </div>
        </div>
    </div>



    <style>
        /* ESTILOS MODAL */
        .modal {
            display: none;
            position: fixed;
            z-index: 10000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.6);
            transition: all 0.3s ease-in-out;
        }

        .modal-content {
            background-color: #fff;
            margin: 10% auto;
            padding: 30px;
            border-radius: 12px;
            width: 90%;
            max-width: 400px;
            text-align: center;
            position: relative;
            animation: slideIn 0.3s ease-out;
        }

        @keyframes slideIn {
            from {
                transform: translateY(-50px);
                opacity: 0;
            }

            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        .close-modal {
            position: absolute;
            top: 15px;
            right: 20px;
            font-size: 26px;
            cursor: pointer;
            color: #333;
        }

        .modal-buttons a {
            display: inline-block;
            margin: 15px 10px 0 10px;
            padding: 12px 20px;
            border-radius: 8px;
            text-decoration: none;
            color: #fff;
            font-weight: 600;
            transition: 0.2s;
        }

        .btn-whatsapp {
            background-color: #25D366;
        }

        .btn-whatsapp:hover {
            background-color: #1ebe5d;
        }

        .btn-email {
            background-color: #0072c6;
        }

        .btn-email:hover {
            background-color: #005a9e;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const modal = document.getElementById('contactModal');
            const contactBtn = document.querySelector('.cta-link[href="#formulario-captacion"]');
            const closeBtn = document.querySelector('.close-modal');

            // Abrir modal al presionar Contactanos
            contactBtn.addEventListener('click', function(e) {
                e.preventDefault();
                modal.style.display = 'block';
            });

            // Cerrar modal al presionar la "X"
            closeBtn.addEventListener('click', function() {
                modal.style.display = 'none';
            });

            // Cerrar modal al hacer clic fuera del contenido
            window.addEventListener('click', function(e) {
                if (e.target === modal) modal.style.display = 'none';
            });

            // Botón WhatsApp
            const whatsappBtn = document.getElementById('whatsappBtn');
            whatsappBtn.addEventListener('click', function() {
                const phone = "584226077838";
                const message = encodeURIComponent("Hola, quiero información sobre Quota Salud");
                window.open(`https://wa.me/${phone}?text=${message}`, "_blank");
            });

            // Botón Correo
            const emailBtn = document.getElementById('emailBtn');
            emailBtn.addEventListener('click', function() {
                const email = "quotasalud@quotasalud.com";
                const subject = encodeURIComponent("Información Quota Salud");
                const body = encodeURIComponent("Hola, quiero más información sobre Quota Salud");
                window.location.href = `mailto:${email}?subject=${subject}&body=${body}`;
            });
        });
    </script>