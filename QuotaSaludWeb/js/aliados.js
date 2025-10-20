// Lógica del carrusel centrado
document.addEventListener('DOMContentLoaded', function () {
    // 1. Inicializar el carrusel
    initializeCenteredCarousel();

    // 2. Configurar navegación entre secciones
    setupSectionNavigation();
});

function setupSectionNavigation() {
    const togglePilaresBtn = document.querySelector('.show-section-btn[data-target="#pilares-section"]');
    const pilaresSection = document.getElementById('pilares-section');
    const showRequisitosBtn = document.querySelector('.show-requisitos-btn[data-target="#seccion-requisitos"]');
    const hideRequisitosBtn = document.querySelector('.hide-requisitos-btn[data-target="#seccion-requisitos"]');
    const requisitosSection = document.getElementById('seccion-requisitos');

    // Evento para la flecha (muestra/oculta Pilares)
    if (togglePilaresBtn && pilaresSection) {
        togglePilaresBtn.addEventListener('click', () => {
            const isHidden = pilaresSection.classList.contains('is-hidden');

            if (isHidden) {
                pilaresSection.classList.remove('is-hidden');
                // Scroll suave a la sección
                setTimeout(() => {
                    pilaresSection.scrollIntoView({ behavior: 'smooth', block: 'start' });
                }, 100);
            } else {
                pilaresSection.classList.add('is-hidden');
            }

            // Cambiar ícono de flecha
            const arrowIcon = togglePilaresBtn.querySelector('.arrow-icon');

            togglePilaresBtn.classList.toggle('active', isHidden);

        });
    }

    // Eventos para Requisitos
    if (showRequisitosBtn && requisitosSection) {
        showRequisitosBtn.addEventListener('click', () => {
            requisitosSection.classList.remove('is-hidden');
            setTimeout(() => {
                requisitosSection.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }, 100);
        });
    }

    if (hideRequisitosBtn && requisitosSection) {
        hideRequisitosBtn.addEventListener('click', () => {
            requisitosSection.classList.add('is-hidden');
            // Volver al carrusel si está visible
            if (pilaresSection && !pilaresSection.classList.contains('is-hidden')) {
                setTimeout(() => {
                    pilaresSection.scrollIntoView({ behavior: 'smooth', block: 'start' });
                }, 100);
            }
        });
    }
}

// FUNCIÓN COMPLETA DEL CARRUSEL
function initializeCenteredCarousel() {
    const slides = document.querySelectorAll('.centered-carousel-slide');
    const numericIndicators = document.querySelectorAll('.numeric-indicator');

    if (slides.length === 0) return;

    let currentIndex = 0;
    const totalSlides = slides.length;
    let autoPlayInterval;

    // Iniciar autoplay
    startAutoPlay();

    // Event listeners para indicadores
    numericIndicators.forEach((indicator, index) => {
        indicator.addEventListener('click', () => {
            goToSlide(index);
            resetAutoPlay();
        });
    });

    // Pausar/reanudar al hacer hover
    const carouselContainer = document.querySelector('.centered-carousel-container');
    if (carouselContainer) {
        carouselContainer.addEventListener('mouseenter', pauseAutoPlay);
        carouselContainer.addEventListener('mouseleave', resumeAutoPlay);
    }

    function startAutoPlay() {
        autoPlayInterval = setInterval(() => {
            nextSlide();
        }, 8000);
    }

    function pauseAutoPlay() {
        clearInterval(autoPlayInterval);
    }

    function resumeAutoPlay() {
        startAutoPlay();
    }

    function resetAutoPlay() {
        pauseAutoPlay();
        resumeAutoPlay();
    }

    function goToSlide(index) {
        if (index < 0 || index >= totalSlides) return;

        // Ocultar slide actual
        slides[currentIndex].classList.remove('active');
        numericIndicators[currentIndex].classList.remove('active');
        numericIndicators[currentIndex].setAttribute('aria-pressed', 'false');

        currentIndex = index;

        // Mostrar nuevo slide
        slides[currentIndex].classList.add('active');
        numericIndicators[currentIndex].classList.add('active');
        numericIndicators[currentIndex].setAttribute('aria-pressed', 'true');
    }

    function nextSlide() {
        const nextIndex = (currentIndex + 1) % totalSlides;
        goToSlide(nextIndex);
    }

    // Limpiar intervalo al salir
    window.addEventListener('beforeunload', () => {
        clearInterval(autoPlayInterval);
    });

    // Inicializar primer slide
    goToSlide(0);
}