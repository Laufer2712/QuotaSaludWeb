<?php
// Incluir header
include('includes/header.php');
?>
<link rel="stylesheet" href="css/form.css">
<div class="container">
    <div class="process-info">
        <h2>Pasos para la afiliación y activación como afiliado a QS</h2>
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
            <li>Kit de afiliación (código QR, etiquetas, hablador y material promocional)</li>
            <li>Acceso a la plataforma de Afiliado</li>
            <li>Acompañamiento durante todo el proceso de integración</li>
            <li>Apertura de una cuenta bancaria para recibir tus pagos de las cuotas</li>
            <li>Capacitación inicial para tu equipo</li>
        </ul>
    </div>
    <form class="form-container" action="catch.php" method="POST" enctype="multipart/form-data" id="form-afiliacion">
        <!-- ===========================
         BARRA DE PROGRESO
    ============================ -->
        <div class="form-progress">
            <div class="progress-bar" id="progress-bar"></div>
            <ul class="progress-steps">
                <li class="active">Contacto</li>
                <li>Negocio</li>
                <li>Cuestionario</li>
                <li>Términos</li>
            </ul>
        </div>

        <!-- ===========================
         PASO 1: DATOS DE CONTACTO
    ============================ -->
        <div class="form-step active">
            <div class="form-section">
                <h2 class="section-title">Datos de Contacto</h2>

                <div class="form-row">
                    <div class="form-col">
                        <label for="nombre" class="required">Nombre y Apellido</label>
                        <input type="text" id="nombre" name="nombre" required>
                    </div>
                    <div class="form-col">
                        <label for="whatsapp" class="required">Número de Whatsapp</label>
                        <input type="tel" id="whatsapp" name="whatsapp" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-col">
                        <label for="email" class="required">Correo Electrónico</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    <div class="form-col">
                        <label for="cargo" class="required">Cargo o función principal</label>
                        <input type="text" id="cargo" name="cargo" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="ubicacion" class="required">Ubicación</label>
                    <input type="text" id="ubicacion" name="ubicacion" placeholder="Estado, Ciudad, Calle o enlace de Google Maps" required>
                </div>
            </div>
        </div>

        <!-- ===========================
         PASO 2: INFORMACIÓN DEL NEGOCIO
    ============================ -->
        <div class="form-step">
            <div class="form-section">
                <h2 class="section-title">Información del Negocio</h2>

                <label for="sector" class="required">Sector al que pertenece</label>
                <select name="sector" id="sector" required>
                    <option value="">Seleccione una opción</option>
                    <option value="clinica">Clínica</option>
                    <option value="centro_imagenologia">Centro de Imagenología</option>
                    <option value="profesional_salud">Profesional de la Salud</option>
                    <option value="laboratorio">Laboratorio</option>
                    <option value="distribuidor_insumos">Distribuidor de Insumos</option>
                    <option value="otro">Otro</option>
                </select>

                <label for="facturacion">Facturación aproximada (mensual o anual)</label>
                <input type="text" id="facturacion" name="facturacion" placeholder="Ejemplo: 1000 USD / mes">

                <label for="presentacion">¿Dónde nos conociste?</label><br>
                <label><input type="checkbox" name="presentacion[]" value="Instagram"> Instagram</label><br>
                <label><input type="checkbox" name="presentacion[]" value="Facebook"> Facebook</label><br>
                <label><input type="checkbox" name="presentacion[]" value="Evento"> Evento</label><br>
                <label><input type="checkbox" name="presentacion[]" value="Otro"> Otro</label>

                <div class="form-row">
                    <div class="form-col">
                        <label for="sucursales">Número de sucursales</label>
                        <input type="number" id="sucursales" name="sucursales" min="0">
                    </div>
                    <div class="form-col">
                        <label for="empleados">Número de empleados</label>
                        <input type="number" id="empleados" name="empleados" min="0">
                    </div>
                </div>
            </div>
        </div>

        <!-- ===========================
         PASO 3: CUESTIONARIO
    ============================ -->
        <div class="form-step">
            <div class="form-section">
                <h2 class="section-title">Cuestionario</h2>

                <label for="sistema_facturacion">Nombre del sistema de facturación (si aplica)</label>
                <input type="text" id="sistema_facturacion" name="sistema_facturacion">

                <p>¿El sistema permite adaptarse a distintos métodos de pago?</p>
                <label><input type="radio" name="adaptacion_pago" value="si"> Sí</label>
                <label><input type="radio" name="adaptacion_pago" value="no"> No</label>

                <label for="figura_legal">Figura legal</label>
                <select id="figura_legal" name="figura_legal">
                    <option value="">Seleccione</option>
                    <option value="Natural">Natural</option>
                    <option value="Jurídica">Jurídica</option>
                </select>

                <div class="form-row">
                    <div class="form-col">
                        <label for="rif">Número de RIF</label>
                        <input type="text" id="rif" name="rif">
                    </div>
                    <div class="form-col">
                        <label for="cedula">Cédula de identidad</label>
                        <input type="text" id="cedula" name="cedula">
                    </div>
                </div>

                <p>¿Emite facturas fiscales?</p>
                <label><input type="radio" name="factura_fiscal" value="si"> Sí</label>
                <label><input type="radio" name="factura_fiscal" value="no"> No</label>

                <div class="form-group">
                    <label for="documentos">Documentos (RIF / CI / Certificados)</label>
                    <input type="file" id="documentos" name="documentos[]" multiple accept="application/pdf,image/*">
                </div>
            </div>
        </div>

        <!-- ===========================
         PASO 4: TÉRMINOS
    ============================ -->
        <div class="form-step">
            <div class="form-section">
                <h2 class="section-title">Términos y Condiciones</h2>
                <p>Declaro que la información proporcionada es verídica y autorizo el uso de mis datos con fines administrativos.</p>
                <label>
                    <input type="checkbox" id="terminos" name="terminos" required> Acepto los términos y condiciones.
                </label>
            </div>
        </div>

        <!-- ===========================
         BOTONES DE NAVEGACIÓN
    ============================ -->
        <div class="form-navigation">
            <button type="button" id="prevBtn" class="btn" disabled>Anterior</button>
            <button type="button" id="nextBtn" class="btn">Siguiente</button>
            <button type="submit" id="submitBtn" class="btn btn-block" style="display:none;">Enviar Solicitud</button>
        </div>
    </form>


</div>
<script src="js/form.js" defer></script>
<?php
// Incluir footer
include('includes/footer.php');
?>