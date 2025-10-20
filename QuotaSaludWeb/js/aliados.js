document.addEventListener('DOMContentLoaded', function () {
    initializeCardsAnimation();
    setupSectionNavigation();
    enhanceCardsInteractivity();
});

function initializeCardsAnimation() {
    const cardsSection = document.getElementById('pilares-section');
    const cards = document.querySelectorAll('.card-item');
    if (!cardsSection || cards.length === 0) return;

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                cards.forEach((card, index) => {
                    setTimeout(() => {
                        card.style.animationPlayState = 'running';
                    }, index * 150);
                });
            }
        });
    }, { threshold: 0.3 });

    observer.observe(cardsSection);
}

function setupSectionNavigation() {
    const togglePilaresBtn = document.querySelector('.show-section-btn[data-target="#pilares-section"]');
    const pilaresSection = document.getElementById('pilares-section');
    const showRequisitosBtn = document.querySelector('.show-requisitos-btn[data-target="#seccion-requisitos"]');
    const hideRequisitosBtn = document.querySelector('.hide-requisitos-btn[data-target="#seccion-requisitos"]');
    const requisitosSection = document.getElementById('seccion-requisitos');

    if (togglePilaresBtn && pilaresSection) {
        togglePilaresBtn.addEventListener('click', () => {
            const isHidden = pilaresSection.classList.contains('is-hidden');
            pilaresSection.classList.toggle('is-hidden', !isHidden);
            pilaresSection.classList.toggle('is-visible', isHidden);

            if (isHidden) setTimeout(() => pilaresSection.scrollIntoView({ behavior: 'smooth', block: 'start' }), 100);

            const arrowIcon = togglePilaresBtn.querySelector('.arrow-icon');
            if (arrowIcon) togglePilaresBtn.classList.toggle('active', isHidden);
        });
    }

    if (showRequisitosBtn && requisitosSection) {
        showRequisitosBtn.addEventListener('click', () => {
            requisitosSection.classList.remove('is-hidden');
            setTimeout(() => requisitosSection.scrollIntoView({ behavior: 'smooth', block: 'start' }), 100);
        });
    }

    if (hideRequisitosBtn && requisitosSection) {
        hideRequisitosBtn.addEventListener('click', () => {
            requisitosSection.classList.add('is-hidden');
            if (pilaresSection && !pilaresSection.classList.contains('is-hidden')) {
                setTimeout(() => pilaresSection.scrollIntoView({ behavior: 'smooth', block: 'start' }), 100);
            }
        });
    }
}

function resetCardsAnimation() {
    document.querySelectorAll('.card-item').forEach(card => {
        card.style.animation = 'none';
        void card.offsetWidth;
        card.style.animation = null;
    });
}

function enhanceCardsInteractivity() {
    document.querySelectorAll('.card-item').forEach(card => {
        card.addEventListener('mouseenter', () => {
            card.style.transform = 'translateY(-8px) scale(1.02)';
            card.style.boxShadow = '0 15px 30px rgba(0,0,0,0.15)';
        });
        card.addEventListener('mouseleave', () => {
            card.style.transform = 'translateY(-5px) scale(1)';
            card.style.boxShadow = '0 12px 25px rgba(0,0,0,0.12)';
        });
        card.addEventListener('click', () => card.focus());
        card.addEventListener('keydown', e => {
            if (e.key === 'Enter' || e.key === ' ') { e.preventDefault(); card.click(); }
        });
    });
}

window.addEventListener('resize', () => {
    if (window.innerWidth < 768) resetCardsAnimation();
});


// ================= INTERACTIVIDAD DE CARDS =================
document.addEventListener('DOMContentLoaded', () => {
    const cards = document.querySelectorAll('.card-item');

    cards.forEach(card => {
        // Hover avanzado
        card.addEventListener('mouseenter', () => {
            card.style.transform = 'translateY(-6px) scale(1.03)';
            card.style.boxShadow = '0 15px 30px rgba(0,0,0,0.12)';
        });

        card.addEventListener('mouseleave', () => {
            card.style.transform = 'translateY(0) scale(1)';
            card.style.boxShadow = '0 6px 18px rgba(0,0,0,0.08)';
        });

        // Click en card para foco/accesibilidad
        card.addEventListener('click', () => {
            card.focus();
        });

        // Navegación por teclado
        card.addEventListener('keydown', (e) => {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                card.click();
            }
        });
    });
});

// ================= ANIMACIÓN AL APARECER CON INTERSECTION OBSERVER =================
document.addEventListener('DOMContentLoaded', () => {
    const cardsSection = document.getElementById('pilares-section');
    const cards = document.querySelectorAll('.card-item');

    if (!cardsSection || cards.length === 0) return;

    const observer = new IntersectionObserver(entries => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                cards.forEach((card, index) => {
                    setTimeout(() => {
                        card.style.opacity = '1';
                        card.style.transform = 'translateY(0)';
                    }, index * 150); // retraso escalonado
                });
            }
        });
    }, { threshold: 0.3 });

    observer.observe(cardsSection);
});
