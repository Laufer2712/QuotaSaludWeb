// =======================================================
// scripts.js - Funcionalidad del Frontend (Quota Salud)
// =======================================================

document.addEventListener('DOMContentLoaded', function () {
    const form = document.querySelector('#formulario-captacion form');

    if (form) {
        form.addEventListener('submit', function (event) {
            // Llama a la función de validación
            if (!validarFormulario()) {
                // Si la validación falla, previene el envío (POST) a PHP
                event.preventDefault();
                alert('Por favor, rellena todos los campos obligatorios del formulario correctamente.');
            }
            // Si la validación es exitosa, el formulario se envía al 'procesar_formulario.php'
        });
    }

    // Función de Validación Simple
    function validarFormulario() {
        let esValido = true;

        const nombre = document.getElementById('nombre').value.trim();
        const email = document.getElementById('email').value.trim();
        const telefono = document.getElementById('telefono').value.trim();
        const mensaje = document.getElementById('mensaje').value.trim();

        // Comprobación simple de que los campos no están vacíos
        if (nombre === '' || email === '' || telefono === '' || mensaje === '') {
            esValido = false;
        }

        // Validación básica de formato de email (se puede mejorar)
        if (!/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email)) {
            esValido = false;
        }

        // **TODO:** Aquí puedes añadir validaciones más complejas (ej: formato de teléfono).

        return esValido;
    }

    // Opcional: Función para remover los mensajes de alerta después de X segundos
    const alertas = document.querySelectorAll('.alerta');
    if (alertas.length > 0) {
        setTimeout(() => {
            alertas.forEach(alerta => {
                alerta.style.opacity = '0';
                setTimeout(() => alerta.remove(), 600);
            });
        }, 5000); // 5 segundos
    }
});

// Mostrar secciones con animación al hacer scroll
document.addEventListener('DOMContentLoaded', () => {
    const secciones = document.querySelectorAll('section');

    const observer = new IntersectionObserver((entradas, observer) => {
        entradas.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('section-visible');
                observer.unobserve(entry.target); // una vez visible, dejar de observar
            }
        });
    }, { threshold: 0.1 });

    secciones.forEach(section => observer.observe(section));
});


// =======================================================
// SCRIPT PARA BOTONES DESPLEGABLES (TOGGLE) MEJORADO Y CORREGIDO
// =======================================================
document.addEventListener('DOMContentLoaded', function () {
    const btn = document.querySelector('.show-section-btn');

    // El script lee dinámicamente el nuevo data-target="#ver-mas-section"
    if (!btn) return;

    const target = document.querySelector(btn.dataset.target);

    if (!target) return; // Asegura que la sección target exista

    const spanText = btn.querySelector('span');

    btn.addEventListener('click', function () {

        // 1. Toggle la visibilidad de la sección (maneja #ver-mas-section.visible)
        target.classList.toggle('visible');

        // 2. Toggle la clase 'is-open' en el botón (para el giro de la flecha)
        btn.classList.toggle('is-open');

        // 3. Cambiar el texto
        const isVisible = target.classList.contains('visible');

        if (isVisible) {
            spanText.textContent = btn.dataset.hideText; // Ocultar
        } else {
            spanText.textContent = btn.dataset.showText; // Quiero conocer mas
        }
    });
});

// =======================================================
// FUNCIÓN PARA PESTAÑAS DINÁMICAS (TABS)
// =======================================================
function openTab(evt, tabName) {
    const contents = document.querySelectorAll('.tab-content');
    const buttons = document.querySelectorAll('.tab-button');

    contents.forEach(c => c.classList.remove('active'));
    buttons.forEach(b => b.classList.remove('active'));

    document.getElementById(tabName).classList.add('active');
    evt.currentTarget.classList.add('active');
}
// *** IMPORTANTE: Se elimina el bloque DOMContentLoaded de las pestañas ***
// Ya no es necesario el click simulado, ya que el estado inicial está en el HTML.