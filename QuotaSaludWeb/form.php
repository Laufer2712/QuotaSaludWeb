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

    <!-- ===========================
         FORMULARIO DE AFILIACIÓN   
    ============================ -->
    <form class="form-container" action="catch.php" method="POST" enctype="multipart/form-data" id="form-afiliacion">
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
                    <div class="form-col">
                        <label for="email" class="required">Correo Electrónico</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-col">
                        <label for="cargo" class="required">Cargo o función principal</label>
                        <select id="cargo" name="cargo" required>
                            <option value="">Seleccione su cargo</option>
                            <option value="director">Director/Gerente General</option>
                            <option value="administrador">Administrador</option>
                            <option value="medico_jefe">Médico Jefe / Especialista</option>
                            <option value="ventas">Personal de Ventas</option>
                            <option value="otro">Otro</option>
                        </select>
                    </div>
                    <div class="form-col">
                        <label for="ubicacion" class="required">Ubicación</label>
                        <input type="text" id="ubicacion" name="ubicacion" placeholder="Estado, Ciudad, Calle o referencia" required>
                    </div>
                    <div class="form-col">
                        <label for="maps_link" class="required">Enlace de Google Maps</label>
                        <input type="url" id="maps_link" name="maps_link" placeholder="https://maps.google.com/..." pattern="https?://.+" title="Debe ser un enlace válido de Google Maps" required>
                    </div>
                </div>
            </div>
        </div>

        <!-- ===== Paso 2: Información del Negocio ===== -->
        <div class="form-step">
            <div class="form-section">
                <h2 class="section-title">Información del Negocio</h2>

                <div class="form-row">
                    <div class="form-col">
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
                    </div>
                    <div class="form-col">
                        <label for="facturacion" class="required">Facturación aproximada (mensual o anual)</label>
                        <select id="facturacion" name="facturacion" required>
                            <option value="">Seleccione un rango</option>
                            <option value="r1">
                                < 5,000 USD</option>
                            <option value="r2">5,000 - 20,000 USD</option>
                            <option value="r3">20,000 - 50,000 USD</option>
                            <option value="r4">> 50,000 USD</option>
                        </select>
                    </div>
                    <div class="form-col">
                        <label for="presentacion" class="required">¿Dónde nos conociste?</label>
                        <select name="presentacion" id="presentacion" required>
                            <option value="" disabled selected>Selecciona una opción</option>
                            <option value="Instagram">Instagram</option>
                            <option value="Facebook">Facebook</option>
                            <option value="Evento">Evento</option>
                            <option value="Otro">Otro</option>
                        </select>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-col">
                        <label for="sucursales" class="required">Número de sucursales</label>
                        <select id="sucursales" name="sucursales" required>
                            <option value="">Seleccione</option>
                            <option value="1">1</option>
                            <option value="2-3">2 - 3</option>
                            <option value="4-5">4 - 5</option>
                            <option value="5+">5 o más</option>
                        </select>
                    </div>
                    <div class="form-col">
                        <label for="empleados" class="required">Número de empleados</label>
                        <select id="empleados" name="empleados" required>
                            <option value="">Seleccione</option>
                            <option value="0-5">0 - 5</option>
                            <option value="6-20">6 - 20</option>
                            <option value="21-50">21 - 50</option>
                            <option value="50+">Más de 50</option>
                        </select>
                    </div>
                    <div class="form-col"></div>
                </div>
            </div>
        </div>

        <!-- ===== Paso 3: Cuestionario ===== -->
        <div class="form-step">
            <div class="form-section">
                <h2 class="section-title">Cuestionario</h2>

                <div class="form-row">
                    <div class="form-col">
                        <label for="sistema_facturacion" class="required">Sistema de facturación</label>
                        <input type="text" id="sistema_facturacion" name="sistema_facturacion" placeholder="Escribe el nombre del sistema" required>
                    </div>

                    <div class="form-col">
                        <label for="adaptacion_pago" class="required">¿Permite distintos métodos de pago?</label>
                        <select name="adaptacion_pago" id="adaptacion_pago" required>
                            <option value="" disabled selected>Selecciona una opción</option>
                            <option value="1">Sí</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                    <div class="form-col">
                        <label for="figura_legal" class="required">Figura legal</label>
                        <select id="figura_legal" name="figura_legal" required>
                            <option value="">Seleccione</option>
                            <option value="Natural">Natural</option>
                            <option value="Jurídica">Jurídica</option>
                        </select>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-col">
                        <label for="rif" class="required">Número de RIF</label>
                        <input type="text" id="rif" name="rif" required>
                    </div>
                    <div class="form-col">
                        <label for="cedula" class="required">Cédula de identidad</label>
                        <input type="text" id="cedula" name="cedula" required>
                    </div>
                    <div class="form-col">
                        <label for="factura_fiscal" class="required">¿Emite facturas fiscales?</label>
                        <select name="factura_fiscal" id="factura_fiscal" required>
                            <option value="" disabled selected>Selecciona una opción</option>
                            <option value="1">Sí</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-col">
                        <label for="documentos" class="required">Documentos (RIF / CI / Certificados)</label>
                        <input type="file" id="documentos" name="documentos[]" multiple accept="application/pdf,image/*" required>
                    </div>
                </div>
            </div>
        </div>

        <!-- ===== Paso 4: Términos ===== -->
        <div class="form-step">
            <div class="form-section">
                <h2 class="section-title">Términos y Condiciones</h2>
                <p>Declaro que la información proporcionada es verídica y autorizo el uso de mis datos con fines administrativos.</p>
                <label>
                    <input type="checkbox" id="terminos" name="terminos" required> Acepto los términos y condiciones.
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

    <!-- ===== CSS ===== -->
    <style>
        .form-row {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 1rem;
            width: 100%;
            box-sizing: border-box;
        }

        .form-col {
            min-width: 250px;
            width: 100%;
            box-sizing: border-box;
        }

        @media (max-width: 1024px) {
            .form-row {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 768px) {
            .form-row {
                grid-template-columns: 1fr;
            }
        }
    </style>

</div>
<script src="js/form.js" defer></script>
<?php
// Incluir footer
include('includes/footer.php');
?>