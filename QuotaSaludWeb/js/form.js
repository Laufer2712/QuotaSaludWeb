// Esperar a que el DOM esté completamente cargado
document.addEventListener('DOMContentLoaded', function () {
    // Mostrar/ocultar campos según el sector seleccionado
    const sectorSelect = document.getElementById('sector');
    if (sectorSelect) {
        sectorSelect.addEventListener('change', function () {
            toggleSectorFields(this.value);
        });
    }

    // Mostrar/ocultar campos según figura legal
    const figuraLegalSelect = document.getElementById('figura_legal');
    if (figuraLegalSelect) {
        figuraLegalSelect.addEventListener('change', function () {
            toggleFiguraLegalFields(this.value);
        });
    }

    // Manejo de subida de archivos
    const fileUploadArea = document.getElementById('file-upload-area');
    const fileInput = document.getElementById('documentos');

    if (fileUploadArea && fileInput) {
        fileUploadArea.addEventListener('click', function () {
            fileInput.click();
        });

        fileInput.addEventListener('change', function () {
            updateFileUploadDisplay(this.files);
        });
    }

    // Validación del formulario antes de enviar
    const form = document.getElementById('form-afiliacion');
    if (form) {
        form.addEventListener('submit', function (e) {
            if (!validateForm()) {
                e.preventDefault();
            } else {
                // Mostrar estado de carga
                showLoadingState();
            }
        });
    }

    // Validación en tiempo real
    setupRealTimeValidation();
});

// Función para mostrar/ocultar campos según el sector
function toggleSectorFields(sector) {
    const especialidadContainer = document.getElementById('especialidad-container');
    const serviciosContainer = document.getElementById('servicios-container');
    const insumosContainer = document.getElementById('insumos-container');

    // Ocultar todos primero
    hideElement(especialidadContainer);
    hideElement(serviciosContainer);
    hideElement(insumosContainer);

    // Mostrar según corresponda
    switch (sector) {
        case 'profesional_salud':
            showElement(especialidadContainer);
            break;
        case 'centro_imagenologia':
        case 'laboratorio':
            showElement(serviciosContainer);
            break;
        case 'distribuidor_insumos':
            showElement(insumosContainer);
            break;
    }
}

// Función para mostrar/ocultar campos según figura legal
function toggleFiguraLegalFields(figuraLegal) {
    const rifContainer = document.getElementById('rif-container');
    const razonSocialContainer = document.getElementById('razon_social-container');
    const cedulaContainer = document.getElementById('cedula-container');

    // Ocultar todos primero
    hideElement(rifContainer);
    hideElement(razonSocialContainer);
    hideElement(cedulaContainer);

    // Quitar requerido de todos
    setRequiredField('rif', false);
    setRequiredField('razon_social', false);
    setRequiredField('cedula', false);

    // Mostrar según corresponda
    switch (figuraLegal) {
        case 'sociedad':
            showElement(rifContainer);
            showElement(razonSocialContainer);
            setRequiredField('rif', true);
            setRequiredField('razon_social', true);
            break;
        case 'persona_natural':
            showElement(cedulaContainer);
            setRequiredField('cedula', true);
            break;
    }
}

// Función para actualizar la visualización de archivos subidos
function updateFileUploadDisplay(files) {
    const fileUploadArea = document.getElementById('file-upload-area');
    if (!fileUploadArea) return;

    if (files.length > 0) {
        let fileNames = [];
        for (let i = 0; i < files.length; i++) {
            fileNames.push(files[i].name);
        }
        fileUploadArea.innerHTML = `<p>Archivos seleccionados: ${fileNames.join(', ')}</p>`;
    } else {
        fileUploadArea.innerHTML = `<p>Haga clic aquí para subir sus documentos (RIF y/o Cédula)</p>`;
    }
}

// Función para validar el formulario completo
function validateForm() {
    let isValid = true;

    // Validar términos y condiciones
    const terminos = document.getElementById('terminos');
    if (!terminos.checked) {
        showError('Debe aceptar los términos y condiciones para continuar');
        isValid = false;
    }

    // Validar que se haya seleccionado al menos una opción de presentación
    const presentacionCheckboxes = document.querySelectorAll('input[name="presentacion[]"]:checked');
    if (presentacionCheckboxes.length === 0) {
        showError('Por favor, seleccione al menos una opción de cómo se presenta al público');
        isValid = false;
    }

    // Validar archivos
    const fileInput = document.getElementById('documentos');
    if (fileInput && fileInput.files.length === 0) {
        showError('Debe adjuntar al menos un documento');
        isValid = false;
    } else if (fileInput) {
        // Validar tamaño y tipo de archivos
        for (let i = 0; i < fileInput.files.length; i++) {
            const file = fileInput.files[i];
            if (!validateFile(file)) {
                isValid = false;
                break;
            }
        }
    }

    return isValid;
}

// Función para validar archivo individual
function validateFile(file) {
    const maxSize = 5 * 1024 * 1024; // 5MB
    const allowedTypes = ['application/pdf', 'image/jpeg', 'image/jpg', 'image/png'];

    if (file.size > maxSize) {
        showError(`El archivo ${file.name} es demasiado grande. Máximo 5MB permitido.`);
        return false;
    }

    if (!allowedTypes.includes(file.type)) {
        showError(`El archivo ${file.name} no es un tipo permitido. Use PDF, JPG o PNG.`);
        return false;
    }

    return true;
}

// Función para mostrar errores
function showError(message) {
    // Remover mensajes de error existentes
    const existingError = document.querySelector('.error-message');
    if (existingError) {
        existingError.remove();
    }

    // Crear y mostrar nuevo mensaje de error
    const errorDiv = document.createElement('div');
    errorDiv.className = 'error-message';
    errorDiv.style.cssText = `
        background-color: #f8d7da;
        color: #721c24;
        padding: 12px;
        border-radius: 5px;
        margin-bottom: 20px;
        border: 1px solid #f5c6cb;
    `;
    errorDiv.textContent = message;

    const form = document.getElementById('form-afiliacion');
    if (form) {
        form.insertBefore(errorDiv, form.firstChild);

        // Hacer scroll al mensaje de error
        errorDiv.scrollIntoView({ behavior: 'smooth', block: 'center' });

        // Auto-remover después de 5 segundos
        setTimeout(() => {
            if (errorDiv.parentNode) {
                errorDiv.remove();
            }
        }, 5000);
    }
}

// Función para mostrar estado de carga
function showLoadingState() {
    const submitButton = document.querySelector('button[type="submit"]');
    if (submitButton) {
        submitButton.disabled = true;
        submitButton.classList.add('btn-loading');
        submitButton.textContent = 'Enviando...';
    }
}

// Configurar validación en tiempo real
function setupRealTimeValidation() {
    const inputs = document.querySelectorAll('input, select, textarea');
    inputs.forEach(input => {
        input.addEventListener('blur', function () {
            validateField(this);
        });

        // Para campos de texto, validar mientras se escribe (después de una pausa)
        if (input.type === 'text' || input.type === 'email' || input.type === 'tel') {
            let timeout;
            input.addEventListener('input', function () {
                clearTimeout(timeout);
                timeout = setTimeout(() => {
                    validateField(this);
                }, 500);
            });
        }
    });
}

// Función para validar campo individual
function validateField(field) {
    // Remover estilos previos
    field.classList.remove('valid', 'invalid');

    if (field.checkValidity()) {
        field.classList.add('valid');
    } else {
        field.classList.add('invalid');
    }
}

// Funciones auxiliares
function hideElement(element) {
    if (element) element.style.display = 'none';
}

function showElement(element) {
    if (element) element.style.display = 'block';
}

function setRequiredField(fieldId, required) {
    const field = document.getElementById(fieldId);
    if (field) {
        field.required = required;
    }
}

// Inicialización cuando la ventana carga
window.addEventListener('load', function () {
    // Inicializar campos basados en valores existentes (en caso de recarga)
    const sectorSelect = document.getElementById('sector');
    if (sectorSelect && sectorSelect.value) {
        toggleSectorFields(sectorSelect.value);
    }

    const figuraLegalSelect = document.getElementById('figura_legal');
    if (figuraLegalSelect && figuraLegalSelect.value) {
        toggleFiguraLegalFields(figuraLegalSelect.value);
    }

    const fileInput = document.getElementById('documentos');
    if (fileInput && fileInput.files.length > 0) {
        updateFileUploadDisplay(fileInput.files);
    }
});


// ======== FORMULARIO POR PASOS ========
document.addEventListener("DOMContentLoaded", () => {
    const steps = document.querySelectorAll(".form-step");
    const nextBtn = document.getElementById("nextBtn");
    const prevBtn = document.getElementById("prevBtn");
    const submitBtn = document.getElementById("submitBtn");
    const progressBar = document.getElementById("progress-bar");
    const progressSteps = document.querySelectorAll(".progress-steps li");

    let currentStep = 0;

    function updateStep() {
        steps.forEach((step, index) => {
            step.classList.toggle("active", index === currentStep);
        });

        progressSteps.forEach((step, index) => {
            step.classList.toggle("active", index === currentStep);
            step.classList.toggle("completed", index < currentStep);
        });

        const progressPercent = (currentStep / (steps.length - 1)) * 100;
        progressBar.style.width = progressPercent + "%";

        prevBtn.disabled = currentStep === 0;
        nextBtn.style.display = currentStep === steps.length - 1 ? "none" : "inline-block";
        submitBtn.style.display = currentStep === steps.length - 1 ? "block" : "none";
    }

    nextBtn.addEventListener("click", () => {
        if (validateCurrentStep()) {
            currentStep++;
            updateStep();
            window.scrollTo({ top: 0, behavior: "smooth" });
        }
    });

    prevBtn.addEventListener("click", () => {
        currentStep--;
        updateStep();
        window.scrollTo({ top: 0, behavior: "smooth" });
    });

    function validateCurrentStep() {
        const currentInputs = steps[currentStep].querySelectorAll("input, select, textarea");
        let valid = true;

        currentInputs.forEach(input => {
            if (!input.checkValidity()) {
                input.classList.add("invalid");
                valid = false;
            } else {
                input.classList.remove("invalid");
            }
        });

        if (!valid) showError("Por favor, completa todos los campos requeridos antes de continuar.");
        return valid;
    }

    updateStep();
});
