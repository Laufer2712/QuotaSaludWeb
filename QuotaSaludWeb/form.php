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

    <form class="form-container" action="procesar_afiliacion.php" method="POST" enctype="multipart/form-data" id="form-afiliacion">
        <!-- Sección: Datos de Contacto -->
        <div class="form-section">
            <h2 class="section-title">Datos de Contacto</h2>

            <div class="form-row">
                <div class="form-col">
                    <div class="form-group">
                        <label for="nombre" class="required">Nombre y Apellido</label>
                        <input type="text" id="nombre" name="nombre" required>
                    </div>
                </div>
                <div class="form-col">
                    <div class="form-group">
                        <label for="whatsapp" class="required">Número de Whatsapp</label>
                        <input type="tel" id="whatsapp" name="whatsapp" required>
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="form-col">
                    <div class="form-group">
                        <label for="email" class="required">Correo Electrónico</label>
                        <input type="email" id="email" name="email" required>
                        <small>Se enviará por este medio los pasos más importantes y requisitos</small>
                    </div>
                </div>
                <div class="form-col">
                    <div class="form-group">
                        <label for="cargo" class="required">Cargo o función principal</label>
                        <input type="text" id="cargo" name="cargo" required>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="ubicacion" class="required">Ubicación</label>
                <input type="text" id="ubicacion" name="ubicacion" placeholder="Estado, Ciudad / Localidad, Calle" required>
                <small>Preferiblemente incluir Link Google Maps</small>
            </div>
        </div>

        <!-- Sección: Información del Negocio -->
        <div class="form-section">
            <h2 class="section-title">Información del Negocio</h2>

            <div class="form-group">
                <label for="sector" class="required">Sector de la Salud que representa</label>
                <select id="sector" name="sector" required>
                    <option value="">Seleccione una opción</option>
                    <option value="clinica">Clínica</option>
                    <option value="centro_imagenologia">Centro de Imagenología</option>
                    <option value="profesional_salud">Profesional de la Salud</option>
                    <option value="laboratorio">Laboratorio</option>
                    <option value="distribuidor_insumos">Distribuidor de Insumos médicos</option>
                    <option value="otro">Otro</option>
                </select>
            </div>

            <div class="form-group" id="especialidad-container" style="display: none;">
                <label for="especialidad">Especialidad</label>
                <input type="text" id="especialidad" name="especialidad">
            </div>

            <div class="form-group" id="servicios-container" style="display: none;">
                <label for="servicios">Servicios</label>
                <textarea id="servicios" name="servicios" rows="3"></textarea>
            </div>

            <div class="form-group" id="insumos-container" style="display: none;">
                <label for="insumos">Insumos</label>
                <textarea id="insumos" name="insumos" rows="3"></textarea>
            </div>

            <div class="form-group">
                <label for="facturacion" class="required">Facturación aproximada en dólares en un año</label>
                <select id="facturacion" name="facturacion" required>
                    <option value="">Seleccione un rango</option>
                    <option value="menos_50k">Menos de $50,000</option>
                    <option value="50k_100k">$50,000 - $100,000</option>
                    <option value="100k_500k">$100,000 - $500,000</option>
                    <option value="500k_1m">$500,000 - $1,000,000</option>
                    <option value="mas_1m">Más de $1,000,000</option>
                </select>
            </div>

            <div class="form-group">
                <label for="presentacion">¿Cómo se presenta al público?</label>
                <div class="checkbox-group">
                    <input type="checkbox" id="presentacion_ig" name="presentacion[]" value="instagram">
                    <label for="presentacion_ig">Instagram</label>
                </div>
                <div class="checkbox-group">
                    <input type="checkbox" id="presentacion_fb" name="presentacion[]" value="facebook">
                    <label for="presentacion_fb">Facebook</label>
                </div>
                <div class="checkbox-group">
                    <input type="checkbox" id="presentacion_directorio" name="presentacion[]" value="directorio_medico">
                    <label for="presentacion_directorio">Directorio Médico</label>
                </div>
                <div class="checkbox-group">
                    <input type="checkbox" id="presentacion_otro" name="presentacion[]" value="otro">
                    <label for="presentacion_otro">Otro</label>
                </div>
            </div>

            <div class="form-row">
                <div class="form-col">
                    <div class="form-group">
                        <label for="sucursales" class="required">¿Cuántas sucursales o puntos de venta tiene?</label>
                        <input type="number" id="sucursales" name="sucursales" min="1" required>
                    </div>
                </div>
                <div class="form-col">
                    <div class="form-group">
                        <label for="empleados" class="required">¿Cuántas personas trabajan actualmente?</label>
                        <input type="number" id="empleados" name="empleados" min="1" required>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sección: Cuestionario -->
        <div class="form-section">
            <h2 class="section-title">Cuestionario</h2>

            <div class="form-group">
                <label for="sistema_facturacion">¿Utiliza algún sistema de facturación?</label>
                <input type="text" id="sistema_facturacion" name="sistema_facturacion" placeholder="Nombre del sistema">
            </div>

            <div class="form-group">
                <label for="adaptacion_pago">¿Tu sistema de facturación se puede adaptar a nuevos métodos de pago?</label>
                <select id="adaptacion_pago" name="adaptacion_pago">
                    <option value="">Seleccione una opción</option>
                    <option value="si">Sí</option>
                    <option value="no">No</option>
                    <option value="no_se">No sé</option>
                </select>
            </div>

            <div class="form-group">
                <label for="figura_legal" class="required">¿Cuál es tu figura legal?</label>
                <select id="figura_legal" name="figura_legal" required>
                    <option value="">Seleccione una opción</option>
                    <option value="sociedad">Sociedad constituida</option>
                    <option value="persona_natural">Persona natural</option>
                </select>
            </div>

            <div class="form-row">
                <div class="form-col" id="rif-container" style="display: none;">
                    <div class="form-group">
                        <label for="rif" class="required">Número de RIF</label>
                        <input type="text" id="rif" name="rif">
                    </div>
                </div>
                <div class="form-col" id="razon_social-container" style="display: none;">
                    <div class="form-group">
                        <label for="razon_social" class="required">Razón Social</label>
                        <input type="text" id="razon_social" name="razon_social">
                    </div>
                </div>
                <div class="form-col" id="cedula-container" style="display: none;">
                    <div class="form-group">
                        <label for="cedula" class="required">Cédula de Identidad</label>
                        <input type="text" id="cedula" name="cedula">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="documentos" class="required">Adjuntar documentos</label>
                <div class="file-upload" id="file-upload-area">
                    <p>Haga clic aquí para subir sus documentos (RIF y/o Cédula)</p>
                    <input type="file" id="documentos" name="documentos[]" multiple required>
                </div>
                <small>Formatos aceptados: PDF, JPG, PNG (Máximo 5MB por archivo)</small>
            </div>

            <div class="form-group">
                <label for="factura_fiscal">¿Entrega factura fiscal?</label>
                <select id="factura_fiscal" name="factura_fiscal" required>
                    <option value="">Seleccione una opción</option>
                    <option value="si">Sí</option>
                    <option value="no">No</option>
                </select>
            </div>
        </div>

        <!-- Sección: Términos y Condiciones -->
        <div class="form-section">
            <h2 class="section-title">Términos y Condiciones</h2>

            <div class="terms">
                <p>Al enviar este formulario, acepta los términos y condiciones de afiliación a QS, que incluyen:</p>
                <ul>
                    <li>La inversión única de USD 100 + IVA para la activación de servicios</li>
                    <li>El proceso de validación de información que puede tomar hasta 20 días</li>
                    <li>La firma de contrato de afiliación posterior a la validación</li>
                    <li>La apertura de cuenta bancaria para recibir pagos</li>
                    <li>La recepción y uso adecuado del kit de afiliación</li>
                    <li>La participación en las capacitaciones programadas</li>
                    <li>El cumplimiento de las políticas de servicio y calidad establecidas por QS</li>
                </ul>
            </div>

            <div class="checkbox-group" style="margin-top: 20px;">
                <input type="checkbox" id="terminos" name="terminos" required>
                <label for="terminos" class="required">Acepto los Términos y Condiciones</label>
            </div>
        </div>

        <button type="submit" class="btn btn-block">Enviar Solicitud</button>
    </form>
</div>
<script src="js/form.js" defer></script>
<?php
// Incluir footer
include('includes/footer.php');
?>