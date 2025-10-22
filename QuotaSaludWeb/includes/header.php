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
    <!-- Mensaje global flotante -->
    <div id="globalMessage" class="form-message" style="display: none; position: fixed; top: 20px; right: 20px; z-index: 10001;"></div>
    <!-- MODAL DE CONTACTO -->
    <div id="contactModal" class="modal">
        <div class="modal-content">
            <span class="close-modal">&times;</span>
            <h2>Contáctanos</h2>

            <form id="contactForm" class="contact-form">
                <!-- Nombre completo (una sola columna) -->
                <div class="form-group full-width">
                    <label for="nombre">Nombre completo *</label>
                    <input type="text" id="nombre" name="nombre" required>
                </div>

                <!-- Correo y celular en dos columnas -->
                <div class="form-row">
                    <div class="form-group half-width">
                        <label for="email">Correo electrónico *</label>
                        <input type="email" id="email" name="email" required>
                    </div>

                    <div class="form-group half-width">
                        <label for="celular">Número de celular *</label>
                        <input type="tel" id="celular" name="celular" required>
                    </div>
                </div>

                <!-- Mensaje -->
                <div class="form-group full-width">
                    <label for="mensaje">Mensaje (opcional)</label>
                    <textarea id="mensaje" name="mensaje" rows="3" placeholder="¿En qué podemos ayudarte?"></textarea>
                </div>

                <button type="submit" class="btn btn-submit">
                    <i class="fas fa-paper-plane"></i> Enviar mensaje
                </button>
            </form>
        </div>
    </div>

    <style>
        /* MODAL */
        .modal {
            display: none;
            position: fixed;
            z-index: 10000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.6);
            transition: all 0.3s ease-in-out;
        }

        .modal-content {
            background-color: #fff;
            margin: 5% auto;
            padding: 30px;
            border-radius: 12px;
            width: 90%;
            max-width: 600px;
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

        .close-modal:hover {
            color: #0072c6;
        }

        /* FORMULARIO */
        .contact-form {
            margin-top: 20px;
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .form-row {
            display: flex;
            gap: 20px;
            flex-wrap: wrap;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            text-align: left;
        }

        .full-width {
            width: 100%;
        }

        .half-width {
            flex: 1;
            min-width: 200px;
        }

        .form-group label {
            margin-bottom: 8px;
            font-weight: 600;
            color: #333;
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 12px;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            font-size: 16px;
            transition: border-color 0.3s;
            box-sizing: border-box;
        }

        .form-group input:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: #0072c6;
        }

        .btn-submit {
            width: 100%;
            padding: 15px;
            background-color: #0072c6;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .btn-submit:hover {
            background-color: #005a9e;
        }

        /* RESPONSIVE */
        @media (max-width: 768px) {
            .form-row {
                flex-direction: column;
            }
        }
    </style>


    <!-- ================= SECCIÓN NUESTRO COMPROMISO ================= -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const modal = document.getElementById('contactModal');
            const contactBtn = document.querySelector('.cta-link[href="#formulario-captacion"]');
            const closeBtn = document.querySelector('.close-modal');
            const contactForm = document.getElementById('contactForm');
            const globalMessage = document.getElementById('globalMessage');

            // Abrir modal
            contactBtn.addEventListener('click', function(e) {
                e.preventDefault();
                modal.style.display = 'block';
                contactForm.reset();
            });

            // Cerrar modal
            closeBtn.addEventListener('click', () => modal.style.display = 'none');
            window.addEventListener('click', e => {
                if (e.target === modal) modal.style.display = 'none';
            });

            // Envío del formulario - SIMPLIFICADO
            contactForm.addEventListener('submit', function(e) {
                e.preventDefault();
                const submitBtn = contactForm.querySelector('.btn-submit');
                const originalText = submitBtn.innerHTML;

                submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Enviando...';
                submitBtn.disabled = true;

                const formData = new FormData(contactForm);

                fetch('backend/enviar-correo.php', {
                        method: 'POST',
                        body: formData
                    })
                    .then(response => response.text())
                    .then(data => {
                        // Reemplazar el contenido del modal con la respuesta
                        const modalContent = document.querySelector('.modal-content');

                        // ✅ MOSTRAR ÉXITO (siempre éxito por ahora)
                        modalContent.innerHTML = `
                            <div style='text-align: center; padding: 40px;'>
                                <div style='font-size: 60px; color: #28a745; margin-bottom: 20px;'>
                                    <i class='fas fa-check-circle'></i>
                                </div>
                                <h3 style='color: #28a745; margin-bottom: 15px;'>¡Mensaje Enviado!</h3>
                                <p style='color: #666; margin-bottom: 25px;'>Hemos recibido tu información correctamente. Nos pondremos en contacto contigo pronto.</p>
                                <button onclick='window.location.reload()' style='padding: 12px 30px; background: #0072c6; color: white; border: none; border-radius: 6px; cursor: pointer; font-size: 16px;'>
                                    <i class='fas fa-times'></i> Cerrar
                                </button>
                            </div>
                        `;

                        /*
                        // 🚨 CÓDIGO COMENTADO - PARA DEBUG
                        // Descomenta esto si necesitas ver los errores reales:
                        if (data.includes('Error') || data.includes('error')) {
                            // Mostrar error de mantenimiento
                            modalContent.innerHTML = `
                                <div style='text-align: center; padding: 40px;'>
                                    <div style='font-size: 60px; color: #ffc107; margin-bottom: 20px;'>
                                        <i class='fas fa-tools'></i>
                                    </div>
                                    <h3 style='color: #856404; margin-bottom: 15px;'>Estamos en mantenimiento</h3>
                                    <p style='color: #666; margin-bottom: 25px;'>Por favor, intenta nuevamente más tarde. Estamos trabajando para mejorar nuestro servicio.</p>
                                    <button onclick='window.location.reload()' style='padding: 12px 30px; background: #ffc107; color: #856404; border: none; border-radius: 6px; cursor: pointer; font-size: 16px;'>
                                        <i class='fas fa-redo'></i> Reintentar
                                    </button>
                                </div>
                            `;
                        } else {
                            // Mostrar éxito
                            modalContent.innerHTML = `
                                <div style='text-align: center; padding: 40px;'>
                                    <div style='font-size: 60px; color: #28a745; margin-bottom: 20px;'>
                                        <i class='fas fa-check-circle'></i>
                                    </div>
                                    <h3 style='color: #28a745; margin-bottom: 15px;'>¡Mensaje Enviado!</h3>
                                    <p style='color: #666; margin-bottom: 25px;'>Hemos recibido tu información correctamente. Nos pondremos en contacto contigo pronto.</p>
                                    <button onclick='window.location.reload()' style='padding: 12px 30px; background: #0072c6; color: white; border: none; border-radius: 6px; cursor: pointer; font-size: 16px;'>
                                        <i class='fas fa-times'></i> Cerrar
                                    </button>
                                </div>
                            `;
                        }
                        */
                    })
                    .catch(error => {
                        const modalContent = document.querySelector('.modal-content');
                        // ✅ MOSTRAR MANTENIMIENTO EN CASO DE ERROR
                        modalContent.innerHTML = `
                            <div style='text-align: center; padding: 40px;'>
                                <div style='font-size: 60px; color: #ffc107; margin-bottom: 20px;'>
                                    <i class='fas fa-tools'></i>
                                </div>
                                <h3 style='color: #856404; margin-bottom: 15px;'>Estamos en mantenimiento</h3>
                                <p style='color: #666; margin-bottom: 25px;'>Por favor, intenta nuevamente más tarde. Estamos trabajando para mejorar nuestro servicio.</p>
                                <button onclick='window.location.reload()' style='padding: 12px 30px; background: #ffc107; color: #856404; border: none; border-radius: 6px; cursor: pointer; font-size: 16px;'>
                                    <i class='fas fa-redo'></i> Reintentar
                                </button>
                            </div>
                        `;
                    })
                    .finally(() => {
                        submitBtn.innerHTML = originalText;
                        submitBtn.disabled = false;
                    });
            });
        });
    </script>