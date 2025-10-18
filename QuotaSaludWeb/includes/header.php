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
                <a href="aliados.php" class="nav-link">Afiliate con nosotros</a>
                <a href="paciente.php" class="nav-link">Unete a nuestros planes</a>
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