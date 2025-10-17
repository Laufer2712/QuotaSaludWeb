const showBtns = document.querySelectorAll('.show-section-btn');

showBtns.forEach(btn => {
    btn.addEventListener('click', () => {
        const target = document.querySelector(btn.dataset.target);
        if (!target) return;

        const isHidden = target.classList.contains('is-hidden');

        if (isHidden) {
            target.classList.remove('is-hidden');
            btn.innerHTML = btn.dataset.hideText; // cambia a flecha arriba
            target.scrollIntoView({ behavior: 'smooth', block: 'start' });
        } else {
            target.classList.add('is-hidden');
            btn.innerHTML = btn.dataset.showText; // cambia a flecha abajo
        }
    });
});

function toggleContent(card) {
    // 1. Alterna la clase 'open' en la tarjeta (feature-card)
    card.classList.toggle('open');

    // 2. Busca el párrafo (el contenido oculto) y el icono
    const content = card.querySelector('.hidden-content');
    const icon = card.querySelector('.toggle-icon');

    // 3. Actualiza el texto del icono (de + a - y viceversa)
    if (card.classList.contains('open')) {
        icon.textContent = '-';
    } else {
        icon.textContent = '+';
    }

    // NOTA: Con el CSS provisto, el cambio visual lo manejan las clases.
    // El JavaScript solo se encarga de alternar la clase 'open' y el texto del icono.
}


// === FUNCIÓN ACORDEÓN ===
function toggleContent(card) {
    card.classList.toggle("open");
}

// === PAGINACIÓN ===
const cards = document.querySelectorAll(".feature-card");
const cardsPerPage = 3;
let currentPage = 0;

function showPage(page) {
    cards.forEach((card, index) => {
        card.style.display =
            index >= page * cardsPerPage && index < (page + 1) * cardsPerPage
                ? "block"
                : "none";
    });
}

document.getElementById("prevPage").addEventListener("click", () => {
    if (currentPage > 0) {
        currentPage--;
        showPage(currentPage);
    }
});

document.getElementById("nextPage").addEventListener("click", () => {
    if ((currentPage + 1) * cardsPerPage < cards.length) {
        currentPage++;
        showPage(currentPage);
    }
});

// Inicializa la primera página
showPage(currentPage);
