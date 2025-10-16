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