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
