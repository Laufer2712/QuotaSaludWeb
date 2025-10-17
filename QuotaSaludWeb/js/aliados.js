const tabs = document.querySelectorAll('.tab-link');
const tabContents = document.querySelectorAll('.tab-content');

tabs.forEach(tab => {
    tab.addEventListener('click', () => {
        // Quitar active de todos
        tabs.forEach(t => t.classList.remove('active'));
        tabContents.forEach(tc => tc.classList.remove('active'));

        // Activar el seleccionado
        tab.classList.add('active');
        document.getElementById(tab.dataset.tab).classList.add('active');
    });
});

// =======================================================
// SCRIPT PARA PESTAÑAS + BOTONES DESPLEGABLES (TOGGLE)
// =======================================================
(() => {
    // --------- PESTAÑAS ---------
    const tabs = document.querySelectorAll('.tab-link');
    const tabContents = document.querySelectorAll('.tab-content');

    tabs.forEach(tab => {
        tab.addEventListener('click', () => {
            tabs.forEach(t => t.classList.remove('active'));
            tabContents.forEach(tc => tc.classList.remove('active'));

            tab.classList.add('active');
            document.getElementById(tab.dataset.tab).classList.add('active');
        });
    });

    // --------- BOTONES DESPLEGABLES (TOGGLE) ---------
    const showBtns = document.querySelectorAll('.show-section-btn');

    showBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            const target = document.querySelector(btn.dataset.target);
            if (!target) return;

            // Alternar visibilidad
            if (target.style.display === 'block') {
                target.style.display = 'none';
                btn.textContent = btn.dataset.showText || "Ver sección"; // texto original
            } else {
                target.style.display = 'block';
                target.scrollIntoView({ behavior: 'smooth' });
                btn.textContent = btn.dataset.hideText || "Ocultar sección"; // texto alternativo
            }
        });
    });
})();
