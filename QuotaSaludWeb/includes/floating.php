<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Botones Flotantes Mejorados</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <style>
        /* Contenedor principal de botones flotantes */
        .floating-buttons {
            position: fixed;
            bottom: 30px;
            right: 30px;
            display: flex;
            flex-direction: column;
            gap: 15px;
            z-index: 99999;
        }

        /* Estilo base para botones flotantes (Volver arriba y WhatsApp) */
        .floating-btn {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            /* Se mantiene circular para los íconos */
            display: flex;
            justify-content: center;
            align-items: center;
            color: #fff;
            font-size: 1.5rem;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            transition: all 0.3s ease;
            text-decoration: none;
        }

        /* Botón Volver al Inicio (Subir) */
        .btn-top {
            background: rgba(115, 158, 87, 0.9);
            opacity: 0;
            pointer-events: none;
            transform: translateY(50px);
            transition: all 0.4s ease;
            order: 1;
        }

        .btn-top.show {
            opacity: 1;
            pointer-events: auto;
            transform: translateY(0);
        }

        /* Botón WhatsApp */
        .btn-whatsapp {
            background: #25D366;
            order: 3;
            /* Posicionado después del botón de subir y el chat */
        }

        /* Burbuja de chat con imagen del bot (NO CIRCULAR) */
        /* Burbuja de chat con imagen del bot: VUELVE A SER CIRCULAR */
        .chat-bubble {
            width: 80px;
            height: 80px;
            background-color: #fff;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
            animation: float 3s ease-in-out infinite;
            order: 2;

            /* ¡AJUSTE CLAVE! Hace el contenedor circular de nuevo */
            border-radius: 50%;
            /* Borde alrededor del círculo */
            border: 2px solid #1729ad;
            /* Para que la imagen se ajuste justo dentro del borde, quitamos el padding */
            padding: 0;
        }

        .chat-bubble img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            /* La imagen se ajustará al 100% del contenedor circular */
            /* Si la imagen tiene esquinas cuadradas, se recortarán para encajar en el círculo */
            border-radius: 50%;
            /* Asegura que la imagen también sea circular dentro del contenedor */
        }

        /* Efectos hover */
        .floating-btn:hover,
        .chat-bubble:hover {
            /* Se incluye el chat bubble para el efecto hover */
            transform: scale(1.1);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.3);
            cursor: pointer;
            /* Indica que es interactivo */
        }


        /* Animación de flotación para la burbuja */
        @keyframes float {
            0% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-5px);
            }

            100% {
                transform: translateY(0px);
            }
        }

        /* Estilos responsivos */
        @media (max-width: 768px) {

            .floating-btn,
            .chat-bubble {
                width: 50px;
                height: 50px;
                font-size: 1.2rem;
            }
        }

        /* Contenido de ejemplo para probar el scroll */
        .content {
            height: 2000px;
            padding: 20px;
            background: linear-gradient(to bottom, #f0f8ff, #e6f7ff);
        }
    </style>
</head>

<body>



    <div class="floating-buttons">
        <a href="#" class="floating-btn btn-top" title="Volver al inicio" id="btn-top">
            <i class="fas fa-arrow-up"></i>
        </a>



        <a href="https://wa.me/584226077838?text=Hola,%20quiero%20información"
            target="_blank" class="floating-btn btn-whatsapp" title="WhatsApp">
            <i class="fab fa-whatsapp"></i>
        </a>

        <a href="#" class="chat-bubble" title="Chatea con nuestro Asistente">
            <img src="img/Bot.png" alt="Bot QuiticoSalud">
        </a>
    </div>

    <script>
        // Mostrar el botón de inicio solo después de bajar cierta cantidad
        window.addEventListener('scroll', function() {
            const btnTop = document.getElementById('btn-top');
            // Muestra el botón cuando el scroll supera los 300 píxeles
            if (window.scrollY > 10) {
                btnTop.classList.add('show');
            } else {
                btnTop.classList.remove('show');
            }
        });

        // Desplazamiento suave hacia arriba
        document.getElementById('btn-top').addEventListener('click', function(e) {
            e.preventDefault();
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    </script>
</body>

</html>