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
    <link rel="stylesheet" href="css/header-footer.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/aliados.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?php echo $page_title; ?></title>
    <meta name="description" content="<?php echo $page_description; ?>">

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700;900&display=swap" rel="stylesheet">
</head>

<body>

    <header>
        <div class="contenedor header-content">
            <a href="index.php" class="logo-link">
                <img src="img/QUOTALOGO.png" alt="Quota Salud Logo" class="logo-animado">
            </a>

            <nav>
                <a href="#informacion-principal" class="nav-link">¿Quienes somos?</a>
                <a href="aliados.php" class="nav-link">Afiliate con nosotros</a>
                <a href="#informacion-principal" class="nav-link">Pagar en Cuotas</a>
                <a href="#formulario-captacion" class="nav-link2 cta-link">Contactanos</a>
            </nav>
        </div>
    </header>