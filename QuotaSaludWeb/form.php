<?php
// Incluir header
include('includes/header.php');
?>
<link rel="stylesheet" href="css/form.css">
<div class="container">
    <div class="process-info">
        <h2>Ruta de activación: Pasos para unirte a la red de Aliados Quota Salud</h2>
        <p>Para comenzar, se requiere una inversión única de USD 100 + IVA, que incluye todo lo necesario para prestar su servicio de salud con la facilidad del manejo de CxC que ofrece QS.</p>
        <p>El proceso completo de activación puede demorar hasta 20 días, dentro de los cuales QS ejecuta las siguientes acciones:</p>
        <ul>
            <li>Validación de información</li>
            <li>Firma del contrato</li>
            <li>Apertura de cuenta bancaria</li>
            <li>Envío de materiales</li>
            <li>Capacitación final</li>
        </ul>
    </div>

    <div class="investment-info">
        <h3>¿Qué incluye esta inversión?</h3>
        <ul>
            <li>Kit de Inducción para Aliados (código QR, etiquetas, hablador y material promocional)</li>
            <li>Acceso a la plataforma de Aliado</li>
            <li>Acompañamiento durante todo el proceso de integración</li>
            <li>Apertura de una cuenta bancaria para recibir tus pagos de las cuotas</li>
            <li>Capacitación inicial para tu equipo</li>
        </ul>
    </div>

    <!-- ===========================
         FORMULARIO DE AFILIACIÓN   
    ============================ -->
    <form class="form-container" action="backend/test.php" method="POST" enctype="multipart/form-data" id="form-afiliacion">
        <div class="form-progress">
            <div class="progress-bar" id="progress-bar"></div>
            <ul class="progress-steps">
                <li class="active">Contacto</li>
                <li>Negocio</li>
                <li>Cuestionario</li>
                <li>Términos</li>
            </ul>
        </div>

        <!-- ===== Paso 1: Datos de Contacto ===== -->
        <div class="form-step active">
            <div class="form-row">
                <div class="form-col">
                    <label for="name" class="required">Nombre</label>
                    <input type="text" id="name" name="name" required pattern="^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$" title="Solo letras y espacios" placeholder="Ej: María José">
                </div>
                <div class="form-col">
                    <label for="lastName" class="required">Apellido</label>
                    <input type="text" id="lastName" name="lastName" required pattern="^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$" title="Solo letras y espacios" placeholder="Ej: González Pérez">
                </div>
                <div class="form-col">
                    <label for="phone" class="required">Número de Whatsapp</label>
                    <input type="tel" id="phone" name="phone" required pattern="^\d{10,15}$" title="Solo números, 10 a 15 dígitos" placeholder="Ej: 584141234567">
                </div>
                <div class="form-col">
                    <label for="email" class="required">Correo Electrónico</label>
                    <input type="email" id="email" name="email" required placeholder="Ej: maria@empresa.com">
                </div>
            </div>

            <div class="form-row">
                <div class="form-col">
                    <label for="mainRole" class="required">Cargo o función principal</label>
                    <select id="mainRole" name="mainRole" required>
                        <option value="">Seleccione su cargo</option>
                        <option value="director">Director/Gerente General</option>
                        <option value="administrador">Administrador</option>
                        <option value="medico_jefe">Médico Jefe / Especialista</option>
                        <option value="ventas">Personal de Ventas</option>
                        <option value="otro">Otro</option>
                    </select>
                </div>
                <div class="form-col">
                    <label for="locationAddress" class="required">Ubicación</label>
                    <input type="text" id="locationAddress" name="locationAddress" placeholder="Ej: Caracas, Municipio Libertador, Av. Principal" required>
                </div>
                <div class="form-col">
                    <label for="mapsLink" class="required">Enlace de Google Maps</label>
                    <input type="url" id="mapsLink" name="mapsLink" placeholder="Ej: https://maps.google.com/?q=Tu+Ubicación" pattern="https?://.+" title="Debe ser un enlace válido de Google Maps" required>
                </div>
            </div>
        </div>

        <!-- ===== Paso 2: Información del Negocio ===== -->
        <div class="form-step">
            <div class="form-row">
                <div class="form-col">
                    <label for="healthSector" class="required">Sector al que pertenece</label>
                    <select name="healthSector" id="healthSector" required>
                        <option value="">Seleccione una opción</option>
                        <option value="clinica">Clínica</option>
                        <option value="centro_imagenologia">Centro de Imagenología</option>
                        <option value="profesional_salud">Profesional de la Salud</option>
                        <option value="laboratorio">Laboratorio</option>
                        <option value="distribuidor_insumos">Distribuidor de Insumos</option>
                        <option value="otro">Otro</option>
                    </select>
                </div>
                <div class="form-col">
                    <label for="approximateBilling" class="required">Facturación aproximada (mensual o anual)</label>
                    <select id="approximateBilling" name="approximateBilling" required>
                        <option value="">Seleccione un rango</option>
                        <option value="r1">
                            < 5,000 USD</option>
                        <option value="r2">5,000 - 20,000 USD</option>
                        <option value="r3">20,000 - 50,000 USD</option>
                        <option value="r4">> 50,000 USD</option>
                    </select>
                </div>
                <div class="form-col">
                    <label for="socialMedia" class="required">¿Cuáles son tus redes?</label>
                    <input type="text" id="socialMedia" name="socialMedia" placeholder="Ej: Instagram @clinica_salud, Facebook Clínica Salud" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-col">
                    <label for="numberOfBranches" class="required">Número de sucursales</label>
                    <select id="numberOfBranches" name="numberOfBranches" required>
                        <option value="">Seleccione</option>
                        <option value="1">1</option>
                        <option value="2-3">2 - 3</option>
                        <option value="4-5">4 - 5</option>
                        <option value="5+">5 o más</option>
                    </select>
                </div>
                <div class="form-col">
                    <label for="numberOfWorkers" class="required">Número de empleados</label>
                    <select id="numberOfWorkers" name="numberOfWorkers" required>
                        <option value="">Seleccione</option>
                        <option value="0-5">0 - 5</option>
                        <option value="6-20">6 - 20</option>
                        <option value="21-50">21 - 50</option>
                        <option value="50+">Más de 50</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- ===== Paso 3: Cuestionario ===== -->
        <div class="form-step">
            <div class="form-row">
                <div class="form-col">
                    <label for="usesBillingSystem" class="required">¿Usa sistema de facturación?</label>
                    <select name="usesBillingSystem" id="usesBillingSystem" required>
                        <option value="" disabled selected>Selecciona una opción</option>
                        <option value="1">Sí</option>
                        <option value="0">No</option>
                    </select>
                </div>
                <div class="form-col">
                    <label for="billingSystemName" class="required">Nombre del sistema de facturación</label>
                    <input type="text" id="billingSystemName" name="billingSystemName" placeholder="Ej: SAP, ContSys, FacturaPlus">
                </div>
                <div class="form-col">
                    <label for="billingSystemAdaptable" class="required">¿Permite distintos métodos de pago?</label>
                    <select name="billingSystemAdaptable" id="billingSystemAdaptable" required>
                        <option value="" disabled selected>Selecciona una opción</option>
                        <option value="1">Sí</option>
                        <option value="0">No</option>
                    </select>
                </div>
            </div>

            <div class="form-row">
                <div class="form-col">
                    <label for="legalFigure" class="required">Figura legal</label>
                    <select id="legalFigure" name="legalFigure" required>
                        <option value="">Seleccione</option>
                        <option value="Natural">Natural</option>
                        <option value="Jurídica">Jurídica</option>
                    </select>
                </div>
                <!-- Persona Jurídica -->
                <div class="form-col" id="rifGroup">
                    <label for="rifNumber" class="required">RIF</label>
                    <input type="text" id="rifNumber" name="rifNumber"
                        pattern="^[JGPE]{1}-\d{8}-\d$"
                        title="Formato válido: J-12345678-9"
                        placeholder="Ej: J-12345678-9">
                </div>

                <!-- Persona Natural -->
                <div class="form-col" id="ciGroup" style="display: none;">
                    <label for="ciNumber" class="required">Cédula de Identidad</label>
                    <input type="text" id="ciNumber" name="ciNumber"
                        pattern="^\d{6,8}$"
                        title="Formato válido: 12345678"
                        placeholder="Ej: 12345678">
                </div>
            </div>

            <div class="form-row">
                <div class="form-col">
                    <label for="deliversFiscalInvoice" class="required">¿Emite facturas fiscales?</label>
                    <select name="deliversFiscalInvoice" id="deliversFiscalInvoice" required>
                        <option value="" disabled selected>Selecciona una opción</option>
                        <option value="1">Sí</option>
                        <option value="0">No</option>
                    </select>
                </div>
                <div class="form-col">
                    <label for="documentRifCiPath" class="required">Documentos (RIF / CI / Certificados)</label>
                    <input type="file" id="documentRifCiPath" name="documentRifCiPath" multiple>
                    <div id="file-preview" class="file-preview"></div>
                </div>
            </div>
        </div>

        <!-- ===== Paso 4: Términos y Condiciones ===== -->
        <div class="form-step">
            <div class="form-section">
                <h2 class="section-title">Términos y Condiciones</h2>
                <ul class="terms-list">
                    <li>La veracidad de la información proporcionada.</li>
                    <li>La formalización del Acuerdo de Colaboración posterior a la validación de la información.</li>
                    <li>La recepción y correcta implementación del Kit de Inducción para Aliados.</li>
                    <li>La autorización para el uso de sus datos con fines administrativos.</li>
                    <li>La aceptación de las políticas de privacidad y manejo de datos personales.</li>
                    <li>El compromiso de cumplir con las obligaciones y procedimientos descritos en el acuerdo.</li>
                </ul>
                <label class="terms-checkbox">
                    <input type="checkbox" id="termsAccepted" name="termsAccepted" required>
                    <span class="checkmark"></span>
                    Acepto los <a href="#" target="_blank">términos y condiciones</a> del Acuerdo de Colaboración con Quota Salud.
                </label>

            </div>
        </div>

        <!-- Navegación -->
        <div class="form-navigation">
            <button type="button" id="prevBtn" class="btn" disabled>Anterior</button>
            <button type="button" id="nextBtn" class="btn">Siguiente</button>
            <button type="submit" id="submitBtn" class="btn btn-block" style="display:none;">Enviar Solicitud</button>
        </div>
    </form>


</div>

<style>
    /* Contenedor del checkbox */
    .terms-checkbox {
        display: flex;
        align-items: center;
        gap: 10px;
        font-size: 15px;
        color: #333;
        cursor: pointer;
        position: relative;
        padding-left: 30px;
        line-height: 1.4;
        user-select: none;
    }

    /* Ocultamos el checkbox original */
    .terms-checkbox input[type="checkbox"] {
        position: absolute;
        opacity: 0;
        cursor: pointer;
        height: 0;
        width: 0;
    }

    /* Estilo visual del check */
    .terms-checkbox .checkmark {
        position: absolute;
        left: 0;
        top: 2px;
        height: 20px;
        width: 20px;
        background-color: #f0f0f0;
        border-radius: 6px;
        border: 2px solid #ccc;
        transition: all 0.2s ease-in-out;
    }

    /* Hover */
    .terms-checkbox:hover .checkmark {
        border-color: #666;
    }

    /* Estado seleccionado */
    .terms-checkbox input:checked~.checkmark {
        background-color: #0088ff;
        border-color: #0088ff;
    }

    /* Check interno (la palomita) */
    .terms-checkbox .checkmark::after {
        content: "";
        position: absolute;
        display: none;
        left: 6px;
        top: 2px;
        width: 5px;
        height: 10px;
        border: solid #fff;
        border-width: 0 2px 2px 0;
        transform: rotate(45deg);
    }

    /* Mostrar la palomita cuando está activo */
    .terms-checkbox input:checked~.checkmark::after {
        display: block;
    }

    /* Enlace de términos */
    .terms-checkbox a {
        color: #0088ff;
        text-decoration: none;
        font-weight: 500;
    }

    .terms-checkbox a:hover {
        text-decoration: underline;
    }
</style>
<script src="js/form.js" defer></script>
<?php
// Incluir footer
include('includes/footer.php');
?>