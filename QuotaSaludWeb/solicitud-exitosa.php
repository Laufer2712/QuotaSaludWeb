<?php
require_once 'includes/header.php';
?>

<section class="success-section">
    <div class="success-wrapper">
        <!-- Contenedor con mensaje a la izquierda -->
        <div class="success-container">
            <svg class="success-icon" xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                <path d="M20 6L9 17l-5-5" />
            </svg>

            <h1>¡Solicitud procesada con éxito!</h1>
            <p>
                Estaremos procesando y verificando toda su información para ser aceptada.
                Pronto recibirá una notificación con los próximos pasos.
            </p>

            <a href="form.php" class="btn-back">Volver</a>
        </div>

        <!-- Imagen a la derecha -->
        <div class="success-image">
            <img src="assets/wmremove-transformed-2-1536x552.jpeg" alt="Éxito" />
        </div>
    </div>
</section>

<style>
    .success-section {
        display: flex;
        justify-content: center;
        align-items: stretch;
        height: 70vh;
        /* altura por defecto para móviles/pequeñas */
        width: 100%;
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        background-color: #f0f9ff;
        opacity: 0;
        animation: fadeIn 0.6s forwards;
        margin-bottom: 20px;
    }

    /* Para pantallas grandes (desktop) */
    @media (min-width: 992px) {
        .success-section {
            height: 100vh;
            /* ocupa toda la ventana */
        }
    }


    .success-wrapper {
        display: flex;
        width: 100%;
        height: 100%;
        max-width: 1400px;
    }

    .success-container {
        flex: 1;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        padding: 60px;
        background-color: #1729ad;
        color: #fff;
        box-sizing: border-box;
        text-align: center;
    }

    .success-container h1 {
        font-size: 2.5rem;
        margin-bottom: 20px;
        font-weight: 600;
    }

    .success-container p {
        font-size: 1.2rem;
        line-height: 1.8;
        margin-bottom: 30px;
    }

    .btn-back {
        display: inline-block;
        padding: 12px 30px;
        background-color: #ffffff;
        color: #0088cc;
        text-decoration: none;
        border-radius: 8px;
        font-weight: 600;
        transition: background-color 0.3s ease, color 0.3s ease;
    }

    .btn-back:hover {
        background-color: #006699;
        color: #fff;
    }

    .success-image {
        flex: 1;
        height: 100%;
    }

    .success-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .success-icon {
        display: block;
        margin: 0 auto 20px;
        transform: scale(0);
        animation: pop 0.5s forwards 0.2s;
    }

    /* Animaciones */
    @keyframes pop {
        0% {
            transform: scale(0);
            opacity: 0;
        }

        70% {
            transform: scale(1.2);
            opacity: 1;
        }

        100% {
            transform: scale(1);
        }
    }

    @keyframes fadeIn {
        0% {
            opacity: 0;
        }

        100% {
            opacity: 1;
        }
    }

    /* Responsive */
    @media (max-width: 1200px) {
        .success-wrapper {
            flex-direction: row;
        }

        .success-container,
        .success-image {
            flex: 1;
        }
    }

    @media (max-width: 992px) {
        .success-wrapper {
            flex-direction: column;
            height: auto;
        }

        .success-container {
            padding: 40px 20px;
        }

        .success-image img {
            height: auto;
            width: 100%;
            border-radius: 0;
        }
    }

    @media (max-width: 576px) {
        .success-container h1 {
            font-size: 1.8rem;
        }

        .success-container p {
            font-size: 1rem;
        }

        .btn-back {
            padding: 10px 25px;
            font-size: 0.95rem;
        }
    }
</style>

<?php
require_once 'includes/footer.php';
?>