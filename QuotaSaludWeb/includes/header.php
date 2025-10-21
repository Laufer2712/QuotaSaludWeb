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

    <!-- MODAL DE CONTACTO -->
    <div id="contactModal" class="modal">
        <div class="modal-content">
            <span class="close-modal">&times;</span>
            <h2>Contáctanos</h2>
            <form id="contactForm" class="contact-form">
                <div class="form-group">
                    <label for="nombre">Nombre completo *</label>
                    <input type="text" id="nombre" name="nombre" required>
                </div>

                <div class="form-group">
                    <label for="email">Correo electrónico *</label>
                    <input type="email" id="email" name="email" required>
                </div>

                <div class="form-group">
                    <label for="celular">Número de celular *</label>
                    <input type="tel" id="celular" name="celular" required>
                </div>

                <div class="form-group">
                    <label for="mensaje">Mensaje (opcional)</label>
                    <textarea id="mensaje" name="mensaje" rows="3" placeholder="¿En qué podemos ayudarte?"></textarea>
                </div>

                <button type="submit" class="btn btn-submit">
                    <i class="fas fa-paper-plane"></i> Enviar mensaje
                </button>
            </form>

            <!-- Mensaje de confirmación -->
            <div id="formMessage" class="form-message" style="display: none;"></div>
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
            margin: 5% auto;
            padding: 30px;
            border-radius: 12px;
            width: 90%;
            max-width: 500px;
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

        /* Estilos del formulario */
        .contact-form {
            margin-top: 20px;
        }

        .form-group {
            margin-bottom: 20px;
            text-align: left;
        }

        .form-group label {
            display: block;
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

        .btn-submit:disabled {
            background-color: #ccc;
            cursor: not-allowed;
        }

        .form-message {
            margin-top: 20px;
            padding: 15px;
            border-radius: 8px;
            text-align: center;
            font-weight: 600;
        }

        .form-message.success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .form-message.error {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .modal-content {
                margin: 10% auto;
                padding: 20px;
                width: 95%;
            }

            .form-group input,
            .form-group textarea {
                padding: 10px;
                font-size: 14px;
            }
        }

        @media (max-width: 480px) {
            .modal-content {
                margin: 5% auto;
                padding: 15px;
            }
        }
    </style>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const modal = document.getElementById('contactModal');
            const contactBtn = document.querySelector('.cta-link[href="#formulario-captacion"]');
            const closeBtn = document.querySelector('.close-modal');
            const contactForm = document.getElementById('contactForm');
            const formMessage = document.getElementById('formMessage');

            // Abrir modal al presionar Contactanos
            contactBtn.addEventListener('click', function(e) {
                e.preventDefault();
                modal.style.display = 'block';
                contactForm.reset();
                formMessage.style.display = 'none';
            });

            // Cerrar modal
            closeBtn.addEventListener('click', function() {
                modal.style.display = 'none';
            });

            window.addEventListener('click', function(e) {
                if (e.target === modal) {
                    modal.style.display = 'none';
                }
            });

            // Envío del formulario
            contactForm.addEventListener('submit', function(e) {
                e.preventDefault();

                const submitBtn = contactForm.querySelector('.btn-submit');
                const originalText = submitBtn.innerHTML;

                // Mostrar estado de carga
                submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Enviando...';
                submitBtn.disabled = true;
                formMessage.style.display = 'none';

                // Obtener datos del formulario
                const formData = new FormData(contactForm);

                // Enviar datos via AJAX
                fetch('backend/enviar-correo.php', {


                        method: 'POST',
                        body: formData
                    })
                    .then(response => response.text())
                    .then(data => {
                        if (data.success) {
                            formMessage.textContent = data.message;
                            formMessage.className = 'form-message success';
                            formMessage.style.display = 'block';
                            contactForm.reset();

                            setTimeout(() => {
                                modal.style.display = 'none';
                            }, 4000);
                        } else {
                            throw new Error(data.message);
                        }
                    })
                    .catch(error => {
                        formMessage.textContent = error.message;
                        formMessage.className = 'form-message error';
                        formMessage.style.display = 'block';
                    })
                    .finally(() => {
                        submitBtn.innerHTML = originalText;
                        submitBtn.disabled = false;
                    });
            });
        });
    </script>