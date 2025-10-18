// Función para mostrar/ocultar secciones
document.addEventListener('DOMContentLoaded', function () {
    // Botones para mostrar/ocultar secciones principales
    const showSectionBtns = document.querySelectorAll('.show-section-btn');
    const showRequisitosBtns = document.querySelectorAll('.show-requisitos-btn');
    const hideRequisitosBtns = document.querySelectorAll('.hide-requisitos-btn');

    // Configurar botones de secciones principales
    showSectionBtns.forEach(btn => {
        btn.addEventListener('click', function () {
            const targetId = this.getAttribute('data-target');
            const targetSection = document.querySelector(targetId);

            if (targetSection) {
                // Toggle de la clase is-hidden
                targetSection.classList.toggle('is-hidden');

                // Cambiar el ícono de la flecha
                const arrowIcon = this.querySelector('.arrow-icon');
                if (targetSection.classList.contains('is-hidden')) {
                    arrowIcon.innerHTML = '&#x25BC;'; // Flecha abajo
                } else {
                    arrowIcon.innerHTML = '&#x25B2;'; // Flecha arriba

                    // Scroll suave a la sección si se está mostrando
                    targetSection.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            }
        });
    });

    // Configurar botones para mostrar requisitos
    showRequisitosBtns.forEach(btn => {
        btn.addEventListener('click', function () {
            const targetId = this.getAttribute('data-target');
            const targetSection = document.querySelector(targetId);

            if (targetSection) {
                // Mostrar la sección de requisitos
                targetSection.classList.remove('is-hidden');

                // Scroll suave a la sección de requisitos
                setTimeout(() => {
                    targetSection.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }, 100);
            }
        });
    });

    // Configurar botones para ocultar requisitos
    hideRequisitosBtns.forEach(btn => {
        btn.addEventListener('click', function () {
            const targetId = this.getAttribute('data-target');
            const targetSection = document.querySelector(targetId);

            if (targetSection) {
                // Ocultar la sección de requisitos
                targetSection.classList.add('is-hidden');

                // Scroll de vuelta a la sección de pilares
                const pilaresSection = document.querySelector('#pilares-section');
                if (pilaresSection && !pilaresSection.classList.contains('is-hidden')) {
                    setTimeout(() => {
                        pilaresSection.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }, 100);
                }
            }
        });
    });
});

// Función para toggle del contenido de las cards
function toggleContent(card) {
    card.classList.toggle('open');

    const toggleIcon = card.querySelector('.toggle-icon');
    if (card.classList.contains('open')) {
        toggleIcon.textContent = '−';
    } else {
        toggleIcon.textContent = '+';
    }
}

// Smooth scroll para enlaces internos
document.addEventListener('DOMContentLoaded', function () {
    const internalLinks = document.querySelectorAll('a[href^="#"]');

    internalLinks.forEach(link => {
        link.addEventListener('click', function (e) {
            e.preventDefault();

            const targetId = this.getAttribute('href');
            const targetElement = document.querySelector(targetId);

            if (targetElement) {
                targetElement.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });
});

// Carrusel simplificado functionality
document.addEventListener('DOMContentLoaded', function () {
    initializeCenteredCarousel();
    // ... el resto del código existente
});

function initializeCenteredCarousel() {
    const slides = document.querySelectorAll('.centered-carousel-slide');
    const numericIndicators = document.querySelectorAll('.numeric-indicator');
    const prevBtn = document.querySelector('.prev-btn');
    const nextBtn = document.querySelector('.next-btn');
    const currentSlideEl = document.getElementById('current-slide');
    const totalSlidesEl = document.getElementById('total-slides');

    if (slides.length === 0) return;

    let currentIndex = 0;
    const totalSlides = slides.length;
    let autoPlayInterval;

    // Inicializar contador
    totalSlidesEl.textContent = totalSlides;
    updateCounter();

    // Iniciar autoplay
    startAutoPlay();

    // Event listeners
    prevBtn.addEventListener('click', prevSlide);
    nextBtn.addEventListener('click', nextSlide);

    numericIndicators.forEach((indicator, index) => {
        indicator.addEventListener('click', () => {
            goToSlide(index);
        });
    });

    // Pausar/reanudar al hacer hover
    const carouselContainer = document.querySelector('.centered-carousel-container');
    carouselContainer.addEventListener('mouseenter', pauseAutoPlay);
    carouselContainer.addEventListener('mouseleave', resumeAutoPlay);

    function startAutoPlay() {
        autoPlayInterval = setInterval(() => {
            nextSlide();
        }, 4000); // Cambia cada 4 segundos
    }

    function pauseAutoPlay() {
        clearInterval(autoPlayInterval);
    }

    function resumeAutoPlay() {
        startAutoPlay();
    }

    function goToSlide(index) {
        if (index < 0 || index >= totalSlides) return;

        // Ocultar slide actual
        slides[currentIndex].classList.remove('active');
        numericIndicators[currentIndex].classList.remove('active');

        currentIndex = index;

        // Mostrar nuevo slide
        slides[currentIndex].classList.add('active');
        numericIndicators[currentIndex].classList.add('active');

        updateCounter();
        updateButtons();
    }

    function nextSlide() {
        const nextIndex = (currentIndex + 1) % totalSlides;
        goToSlide(nextIndex);
    }

    function prevSlide() {
        const prevIndex = (currentIndex - 1 + totalSlides) % totalSlides;
        goToSlide(prevIndex);
    }

    function updateCounter() {
        currentSlideEl.textContent = currentIndex + 1;
    }

    function updateButtons() {
        // Los botones siempre están activos (carrusel circular)
    }

    // Inicializar
    updateButtons();

    // Limpiar intervalo
    window.addEventListener('beforeunload', () => {
        clearInterval(autoPlayInterval);
    });
}


