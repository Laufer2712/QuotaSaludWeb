<?php
// floating.php
?>

<!-- Contenedor flotante -->
<div class="floating-buttons">

    <!-- Botón Volver al Inicio -->
    <a href="#top" class="floating-btn btn-top" title="Volver al inicio">
        <i class="fas fa-arrow-up"></i>
    </a>

    <!-- Botón WhatsApp -->
    <a href="https://wa.me/tu-numero?text=Hola,%20quiero%20información"
        target="_blank" class="floating-btn btn-whatsapp" title="WhatsApp">
        <i class="fab fa-whatsapp"></i>
    </a>

    <!-- Botón Chat -->
    <a href="#chat" class="floating-btn btn-chat" title="Chat en línea">
        <i class="fas fa-comment-dots"></i>
    </a>

</div>

<style>
    /* Contenedor flotante */
    .floating-buttons {
        position: fixed;
        bottom: 30px;
        right: 30px;
        display: flex;
        flex-direction: column;
        gap: 15px;
        z-index: 9999;
    }

    /* Estilo común para los botones */
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

    /* Hover efecto */
    .floating-btn:hover {
        transform: scale(1.1);
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.3);
    }

    /* Botón Volver al inicio */
    .btn-top {
        background: linear-gradient(135deg, #70b642, #739e57);
    }

    /* Botón WhatsApp */
    .btn-whatsapp {
        background: #25D366;
    }

    /* Botón Chat */
    .btn-chat {
        background: #1729ad;
    }

    /* Responsive: reducir tamaño en móviles */
    @media (max-width: 768px) {
        .floating-btn {
            width: 45px;
            height: 45px;
            font-size: 1.2rem;
        }
    }
</style>

<!-- Font Awesome CDN (para iconos) -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />