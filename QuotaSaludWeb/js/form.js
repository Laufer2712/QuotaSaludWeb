// ======== VALIDACIÓN COMPLETA DEL FORMULARIO ========
document.addEventListener('DOMContentLoaded', function () {
    // Validación en tiempo real para todos los inputs
    setupRealTimeValidation();

    const form = document.getElementById('form-afiliacion');
    if (form) {
        form.addEventListener('submit', function (e) {
            if (!validateForm()) {
                e.preventDefault();
            } else {
                showLoadingState();
            }
        });
    }

    // Configurar visibilidad condicional de campos
    setupConditionalFields();
});

// ======== CONFIGURACIÓN DE CAMPOS CONDICIONALES ========
function setupConditionalFields() {
    // Mostrar/ocultar campos según figura legal
    const legalFigureSelect = document.getElementById('legalFigure');
    if (legalFigureSelect) {
        legalFigureSelect.addEventListener('change', toggleLegalDocumentFields);
        toggleLegalDocumentFields(); // Ejecutar al cargar
    }

    // Mostrar/ocultar nombre del sistema de facturación
    const usesBillingSystem = document.getElementById('usesBillingSystem');
    if (usesBillingSystem) {
        usesBillingSystem.addEventListener('change', toggleBillingSystemName);
        toggleBillingSystemName(); // Ejecutar al cargar
    }
}

function toggleLegalDocumentFields() {
    const legalFigure = document.getElementById('legalFigure').value;
    const rifGroup = document.querySelector('.form-col:has(#rifNumber)');
    const ciGroup = document.querySelector('.form-col:has(#ciNumber)');

    if (rifGroup) rifGroup.style.display = legalFigure === 'Jurídica' ? 'block' : 'none';
    if (ciGroup) ciGroup.style.display = legalFigure === 'Natural' ? 'block' : 'none';
}

function toggleBillingSystemName() {
    const usesBilling = document.getElementById('usesBillingSystem').value;
    const billingNameGroup = document.querySelector('.form-col:has(#billingSystemName)');

    if (billingNameGroup) {
        billingNameGroup.style.display = usesBilling === '1' ? 'block' : 'none';
        if (usesBilling === '0') {
            document.getElementById('billingSystemName').value = '';
        }
    }
}

// ======== FUNCIONES DE VALIDACIÓN POR TIPO DE CAMPO ========

// Validación de texto
function validateTextField(field, maxLength = 255) {
    if (!field.value.trim()) return false;
    if (field.value.length > maxLength) return false;
    return true;
}

// Validación de teléfono
function validatePhoneField(field) {
    const value = field.value.trim();
    if (!value) return false;
    return /^\d{10,15}$/.test(value);
}

// Validación de email
function validateEmailField(field) {
    const value = field.value.trim();
    if (!value) return false;
    return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(value);
}

// Validación de URL de Google Maps (versión corregida y mejorada)
function validateUrlField(field) {
    const value = field.value.trim();
    if (!value) return false;

    // Verificar si es una URL válida
    try {
        const url = new URL(value);

        // Verificar protocolos permitidos
        if (!['http:', 'https:'].includes(url.protocol)) {
            return false;
        }

        // Patrones más flexibles para Google Maps
        const googleMapsPatterns = [
            /maps\.google/i,
            /google\.com\/maps/i,
            /goo\.gl\/maps/i,
            /maps\.app\.goo\.gl/i
        ];

        // Aceptar cualquier URL válida O específicamente de Google Maps
        return googleMapsPatterns.some(pattern => pattern.test(value)) ||
            /^https?:\/\//.test(value); // Cualquier URL HTTP/HTTPS
    } catch {
        return false;
    }
}

// Validación de RIF (Formato: J-12345678-9)
function validateRifField(field) {
    const value = field.value.trim();
    if (!value) return false;
    return /^[JGVE]{1}-\d{8}-\d$/.test(value);
}

// Validación de Cédula (6-8 dígitos)
function validateCiField(field) {
    const value = field.value.trim();
    if (!value) return false;
    return /^\d{6,8}$/.test(value);
}

// Validación de figura legal y sus documentos
function validateLegalFigure() {
    const figura = document.getElementById('legalFigure').value;
    if (figura !== 'Natural' && figura !== 'Jurídica') return false;

    if (figura === 'Jurídica') {
        const rif = document.getElementById('rifNumber');
        if (!rif || !validateRifField(rif)) return false;
    } else if (figura === 'Natural') {
        const ci = document.getElementById('ciNumber');
        if (!ci || !validateCiField(ci)) return false;
    }
    return true;
}

// Validación de archivos (documentRifCiPath)
function validateFileField() {
    const fileInput = document.getElementById('documentRifCiPath');
    if (!fileInput || !fileInput.files.length) return false;

    const allowedTypes = ['application/pdf', 'image/jpeg', 'image/png', 'image/jpg'];
    const maxSize = 5 * 1024 * 1024; // 5MB

    for (let i = 0; i < fileInput.files.length; i++) {
        const file = fileInput.files[i];
        if (!allowedTypes.includes(file.type)) return false;
        if (file.size > maxSize) return false;
    }
    return true;
}

// Validación de términos aceptados
function validateTerms() {
    const termsCheckbox = document.getElementById('termsAccepted');
    return termsCheckbox && termsCheckbox.checked;
}

// ======== VALIDACIÓN PRINCIPAL DEL FORMULARIO ========
function validateForm() {
    let isValid = true;
    clearAllErrors();

    // --- Campos de texto básicos ---
    const textFields = ['name', 'lastName', 'mainRole', 'socialMedia', 'locationAddress', 'billingSystemName'];
    textFields.forEach(id => {
        const field = document.getElementById(id);
        if (field && field.offsetParent !== null && !validateTextField(field)) { // Solo validar campos visibles
            markFieldInvalid(field);
            isValid = false;
        } else if (field && field.offsetParent !== null) {
            markFieldValid(field);
        }
    });

    // --- Validaciones específicas por campo ---
    const validations = [
        { id: 'phone', validator: validatePhoneField },
        { id: 'email', validator: validateEmailField },
        { id: 'mapsLink', validator: validateUrlField },
        { id: 'healthSector', validator: (field) => field.value !== '' },
        { id: 'approximateBilling', validator: (field) => field.value !== '' },
        { id: 'numberOfBranches', validator: (field) => field.value !== '' },
        { id: 'numberOfWorkers', validator: (field) => field.value !== '' },
        { id: 'usesBillingSystem', validator: (field) => field.value !== '' },
        { id: 'billingSystemAdaptable', validator: (field) => field.value !== '' },
        { id: 'legalFigure', validator: (field) => field.value !== '' },
        { id: 'deliversFiscalInvoice', validator: (field) => field.value !== '' }
    ];

    validations.forEach(({ id, validator }) => {
        const field = document.getElementById(id);
        if (field && field.offsetParent !== null && !validator(field)) {
            markFieldInvalid(field);
            isValid = false;
        } else if (field && field.offsetParent !== null) {
            markFieldValid(field);
        }
    });

    // --- Validaciones condicionales ---
    if (!validateLegalFigure()) {
        showError("Complete correctamente la figura legal y su documento correspondiente");
        isValid = false;
    }

    if (!validateFileField()) {
        showError("Debe adjuntar al menos un archivo válido (PDF, JPG, PNG, max 5MB cada uno)");
        isValid = false;
    }

    if (!validateTerms()) {
        showError("Debe aceptar los términos y condiciones para continuar");
        isValid = false;
    }

    return isValid;
}

// ======== VALIDACIÓN EN TIEMPO REAL ========
function setupRealTimeValidation() {
    const inputs = document.querySelectorAll('input, select, textarea');
    inputs.forEach(input => {
        input.addEventListener('blur', () => validateField(input));
        if (['text', 'email', 'tel', 'number', 'url'].includes(input.type)) {
            let timeout;
            input.addEventListener('input', function () {
                clearTimeout(timeout);
                timeout = setTimeout(() => validateField(this), 500);
            });
        }
    });
}

function validateField(field) {
    if (field.offsetParent === null) return; // No validar campos ocultos

    field.classList.remove('valid', 'invalid');

    let valid = true;

    // Aplicar validadores específicos según el campo
    if (field.id === 'phone') valid = validatePhoneField(field);
    else if (field.id === 'email') valid = validateEmailField(field);
    else if (field.id === 'mapsLink') valid = validateUrlField(field);
    else if (field.id === 'rifNumber') valid = validateRifField(field);
    else if (field.id === 'ciNumber') valid = validateCiField(field);
    else if (field.type === 'select-one') valid = field.value !== '';
    else if (field.type === 'checkbox') valid = field.checked;
    else if (field.type === 'file') {
        // Para archivos, solo validar si hay archivos seleccionados
        valid = field.files.length === 0 || validateFileField();
    }
    else valid = validateTextField(field);

    if (valid) {
        field.classList.add('valid');
    } else {
        field.classList.add('invalid');
    }
}

// ======== FUNCIONES AUXILIARES ========
function markFieldInvalid(field) {
    field.classList.remove('valid');
    field.classList.add('invalid');
}

function markFieldValid(field) {
    field.classList.remove('invalid');
    field.classList.add('valid');
}

function clearAllErrors() {
    const existingError = document.querySelector('.error-message');
    if (existingError) existingError.remove();
}

// ======== MOSTRAR ERRORES ========
function showError(message) {
    clearAllErrors();

    const errorDiv = document.createElement('div');
    errorDiv.className = 'error-message';
    errorDiv.style.cssText = `
        background-color: #f8d7da;
        color: #721c24;
        padding: 12px;
        border-radius: 5px;
        margin-bottom: 20px;
        border: 1px solid #f5c6cb;
        font-weight: bold;
    `;
    errorDiv.textContent = message;

    const form = document.getElementById('form-afiliacion');
    if (form) {
        form.insertBefore(errorDiv, form.firstChild);
        errorDiv.scrollIntoView({ behavior: 'smooth', block: 'center' });
        setTimeout(() => { if (errorDiv.parentNode) errorDiv.remove(); }, 5000);
    }
}

// ======== MOSTRAR ESTADO DE CARGA ========
function showLoadingState() {
    const submitButton = document.querySelector('button[type="submit"]');
    if (submitButton) {
        submitButton.disabled = true;
        submitButton.classList.add('btn-loading');
        submitButton.textContent = 'Enviando...';
    }
}

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
            if (input.offsetParent !== null) { // Solo validar campos visibles
                validateField(input);
                if (input.classList.contains('invalid')) {
                    valid = false;
                }
            }
        });

        if (!valid) {
            showError("Por favor, completa todos los campos requeridos correctamente antes de continuar.");
        }
        return valid;
    }

    updateStep();
});

// ======== PREVISUALIZACIÓN DE ARCHIVOS ========
document.addEventListener('DOMContentLoaded', () => {
    const fileInput = document.getElementById('documentRifCiPath');
    const preview = document.getElementById('file-preview');

    if (fileInput && preview) {
        fileInput.addEventListener('change', function () {
            preview.innerHTML = '';
            for (let i = 0; i < fileInput.files.length; i++) {
                const file = fileInput.files[i];
                if (file.type.startsWith('image/')) {
                    const reader = new FileReader();
                    reader.onload = function (e) {
                        const img = document.createElement('img');
                        img.src = e.target.result;
                        img.style.maxWidth = '200px';
                        img.style.maxHeight = '150px';
                        img.style.margin = '5px';
                        preview.appendChild(img);
                    }
                    reader.readAsDataURL(file);
                } else {
                    const p = document.createElement('p');
                    p.textContent = `📄 ${file.name}`;
                    p.style.margin = '5px';
                    p.style.padding = '5px';
                    p.style.backgroundColor = '#f8f9fa';
                    p.style.borderRadius = '3px';
                    preview.appendChild(p);
                }
            }
        });
    }
});