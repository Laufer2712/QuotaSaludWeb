// =======================================================
// app-carrusel.js - Lógica Completa (General, Cintillo y Carrusel AUTOMÁTICO)
// =======================================================

document.addEventListener('DOMContentLoaded', () => {

    // --- A. ANIMACIÓN DE ENTRADA (Scroll Reveal) ---
    // Aplica la clase 'section-visible' a las secciones al entrar en el viewport.
    const sections = document.querySelectorAll('section');
    const observerOptions = { root: null, rootMargin: '0px', threshold: 0.1 };

    const sectionObserver = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            // Se excluye el carrusel para que la animación de scroll no interfiera
            if (entry.target.id === 'carrusel-paginado') return;
            
            if (entry.isIntersecting) {
                entry.target.classList.add('section-visible');
            }
        });
    }, observerOptions);

    sections.forEach(section => { sectionObserver.observe(section); });


    // --- B. LÓGICA DEL CINTILLO MOVIBLE (Marquee) ---
    // Duplica el contenido para permitir la animación CSS de scroll infinito.
    const cintilloTrack = document.querySelector('.cintillo-track');
    if (cintilloTrack) {
        const content = cintilloTrack.innerHTML;
        // Solo duplicamos si hay contenido real
        if (content.trim().length > 0) {
            cintilloTrack.innerHTML += content;
        }
    }


    // --- C. LÓGICA DEL CARRUSEL AUTOMÁTICO (Solo Imágenes) ---
    const carruselSection = document.getElementById('carrusel-paginado');
    
    if (carruselSection) {
        const track = carruselSection.querySelector('.carrusel-track');
        const slides = carruselSection.querySelectorAll('.carrusel-slide');
        const totalSlides = slides.length;
        let currentSlide = 0; // Índice inicial (0, 1, 2)
        const slideIntervalTime = 4000; // Intervalo de cambio: 4 segundos
        
        // Función para mover el carrusel al slide actual
        function moveToNextSlide() {
            // Avanza al siguiente slide (0 -> 1 -> 2 -> 0)
            currentSlide = (currentSlide + 1) % totalSlides; 
            
            // Obtener el ancho del carrusel (referencia al 100%)
            const slideWidth = carruselSection.offsetWidth; 
            
            // Calcular el desplazamiento necesario para centrar el slide
            const offset = currentSlide * slideWidth;
            
            // Aplicar la transformación (el CSS maneja la animación)
            track.style.transform = `translateX(-${offset}px)`;
        }
        
        // Inicializar el intervalo de deslizamiento automático
        const autoSlide = setInterval(moveToNextSlide, slideIntervalTime);

        // Manejar el redimensionamiento de la ventana para evitar roturas de layout (CRUCIAL)
        window.addEventListener('resize', () => {
            const offset = currentSlide * carruselSection.offsetWidth;
            
            // Deshabilitar la transición para que el ajuste de tamaño sea instantáneo
            track.style.transition = 'none'; 
            track.style.transform = `translateX(-${offset}px)`;
            
            // Reactivar la transición después de un breve delay
            setTimeout(() => {
                // Debe coincidir con el valor de transition en paciente.css
                track.style.transition = 'transform 1s ease-in-out';
            }, 50);
        });

        // Asegurar que el carrusel comienza en la primera imagen al cargar
        track.style.transform = `translateX(0px)`;
    }
});
