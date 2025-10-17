<!-- includes/floating.php -->
<div class="floating-buttons">

    <!-- Botón Volver al Inicio -->
    <a href="#" class="floating-btn btn-top" title="Volver al inicio" id="btn-top">
        <i class="fas fa-arrow-up"></i>
    </a>

    <!-- Botón WhatsApp -->
    <a href="https://wa.me/584226077838?text=Hola,%20quiero%20información"
        target="_blank" class="floating-btn btn-whatsapp" title="WhatsApp">
        <i class="fab fa-whatsapp"></i>
    </a>

    <!-- Botón Chat -->
    <a href="#chat" class="floating-btn btn-chat" title="Chat en línea">
        <i class="fas fa-comment-dots"></i>
    </a>

</div>

<style>
    .floating-buttons {
        position: fixed;
        bottom: 30px;
        right: 30px;
        display: flex;
        flex-direction: column;
        gap: 15px;
        z-index: 99999;
    }

    .floating-btn {
        width: 55px;
        height: 55px;
        border-radius: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
        color: #fff;
        font-size: 1.5rem;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        transition: all 0.3s ease;
        text-decoration: none;
    }

    /* Oculto inicialmente */
    #btn-top {
        opacity: 0;
        pointer-events: none;
        transform: translateY(50px);
        transition: all 0.4s ease;
        background: rgba(115, 158, 87, 0.9);
    }

    #btn-top.show {
        opacity: 1;
        pointer-events: auto;
        transform: translateY(0);
    }

    /* Colores */
    .btn-whatsapp {
        background: #25D366;
    }

    .btn-chat {
        background: #1729ad;
    }

    /* Hover con transparencia */
    .floating-btn:hover {
        transform: scale(1.1);
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.3);
        background-color: rgba(0, 0, 0, 0.1);
    }

    @media (max-width: 768px) {
        .floating-btn {
            width: 45px;
            height: 45px;
            font-size: 1.2rem;
        }
    }
</style>

<script>
    // Mostrar el botón de inicio solo después de bajar cierta cantidad
    window.addEventListener('scroll', function() {
        const btnTop = document.getElementById('btn-top');
        if (window.scrollY > 50) { // cambia el umbral para hacerlo más notorio
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

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />