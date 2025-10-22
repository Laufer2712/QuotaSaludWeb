<?php
// backend.test.php

/**
 * Archivo que procesa el formulario y envía los datos al servicio Java
 */

// =============================================================================
// CONFIGURACIÓN DEL SERVICIO JAVA
// =============================================================================

$url = "http://3.135.179.82:8080/quota-salud-web-socket/api/QUOTASystem/insertFirstContact";

// =============================================================================
// VALIDAR MÉTODO POST
// =============================================================================

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    die("Error: Método no permitido");
}

// =============================================================================
// PROCESAR ARCHIVOS - CONVERTIR A BASE64 CON FORMATO CORRECTO
// =============================================================================

$documentRifCiBase64 = null;

// Verificar si se subió algún archivo
if (isset($_FILES['documentRifCiPath']) && $_FILES['documentRifCiPath']['error'] === UPLOAD_ERR_OK) {
    $fileTmpPath = $_FILES['documentRifCiPath']['tmp_name'];
    $fileName = $_FILES['documentRifCiPath']['name'];
    $fileType = $_FILES['documentRifCiPath']['type'];
    
    // Validar que el archivo existe
    if (file_exists($fileTmpPath)) {
        // Obtener el tipo MIME real
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $mimeType = finfo_file($finfo, $fileTmpPath);
        finfo_close($finfo);
        
        // Convertir la imagen a base64 con el formato correcto
        $fileContent = file_get_contents($fileTmpPath);
        $base64Data = base64_encode($fileContent);
        
        // Formatear como data URL (compatible con el backend)
        $documentRifCiBase64 = "data:" . $mimeType . ";base64," . $base64Data;
    }
}

// =============================================================================
// UNIFICAR CI Y RIF EN CAMPO DNI
// =============================================================================

// Determinar qué campo usar según la figura legal
$dni = '';
if ($_POST['legalFigure'] === 'Natural' && !empty($_POST['ciNumber'])) {
    $dni = $_POST['ciNumber'];
} elseif ($_POST['legalFigure'] === 'Jurídica' && !empty($_POST['rifNumber'])) {
    $dni = $_POST['rifNumber'];
}

// =============================================================================
// MAPEOS PARA CAMPOS NUMÉRICOS
// =============================================================================

// Mapeo de healthSector a números (Integer)
$healthSectorMap = [
    'clinica' => 1,
    'centro_imagenologia' => 2,
    'profesional_salud' => 3,
    'laboratorio' => 4,
    'distribuidor_insumos' => 5,
    'otro' => 6
];

// Mapeo de approximateBilling a números (String para BigDecimal)
$approximateBillingMap = [
    'r1' => '5000.00',
    'r2' => '20000.00',
    'r3' => '50000.00',
    'r4' => '100000.00'
];

// Mapeo de numberOfBranches a números (Long)
$numberOfBranchesMap = [
    '1' => 1,
    '2-3' => 2,
    '4-5' => 4,
    '5+' => 6
];

// Mapeo de numberOfWorkers a números (Long)
$numberOfWorkersMap = [
    '0-5' => 3,
    '6-20' => 13,
    '21-50' => 35,
    '50+' => 50
];

// =============================================================================
// PREPARAR DATOS PARA EL SERVICIO JAVA (CON NUEVA ESTRUCTURA)
// =============================================================================

$data = array(
    'id' => 0,
    'name' => $_POST['name'],
    'lastName' => $_POST['lastName'],
    'phone' => $_POST['phone'],
    'email' => $_POST['email'],
    'mainRole' => $_POST['mainRole'],
    'healthSector' => $healthSectorMap[$_POST['healthSector']] ?? 6, // Integer
    'approximateBilling' => $approximateBillingMap[$_POST['approximateBilling']] ?? '0.00', // String para BigDecimal
    'socialMedia' => $_POST['socialMedia'],
    'numberOfBranches' => $numberOfBranchesMap[$_POST['numberOfBranches']] ?? 1, // Long
    'numberOfWorkers' => $numberOfWorkersMap[$_POST['numberOfWorkers']] ?? 1, // Long
    'locationAddress' => $_POST['locationAddress'],
    'mapsLink' => $_POST['mapsLink'],
    'usesBillingSystem' => (int)$_POST['usesBillingSystem'], // Long
    'billingSystemName' => $_POST['billingSystemName'],
    'billingSystemAdaptable' => (int)$_POST['billingSystemAdaptable'], // Long
    'legalFigure' => $_POST['legalFigure'],
    'dni' => $dni, // NUEVO CAMPO UNIFICADO
    'deliversFiscalInvoice' => (int)$_POST['deliversFiscalInvoice'], // Long
    'termsAccepted' => isset($_POST['termsAccepted']) ? 1 : 0, // Long
    'documentPath' => $documentRifCiBase64, // CAMBIO DE NOMBRE: documentRifCiPath -> documentPath
    'createdAt' => date('Y-m-d\TH:i:s.v\Z') // Formato ISO para Java
);

$json_data = json_encode($data, JSON_UNESCAPED_SLASHES);

// =============================================================================
// ENVIAR AL SERVICIO JAVA
// =============================================================================

$options = array(
    'http' => array(
        'header' => "Content-Type: application/json\r\n",
        'method' => 'POST',
        'content' => $json_data,
        'timeout' => 30,
        'ignore_errors' => true
    )
);

$context = stream_context_create($options);

try {
    $response = file_get_contents($url, false, $context);
    
    // Obtener código HTTP
    $httpCode = 0;
    if (isset($http_response_header)) {
        foreach ($http_response_header as $header) {
            if (strpos($header, 'HTTP/') === 0) {
                $httpCode = substr($header, 9, 3);
                break;
            }
        }
    }
    
    if ($response === FALSE) {
        echo "Error: No se pudo conectar con el servicio web";
    } else {
        if ($httpCode == 200 || $httpCode == 201) {
            // Descomenta la siguiente línea para redireccionar en éxito
            // header('Location: ../form.php?estado=exito');
            // exit;
            header('Location: ../solicitud-exitosa.php');
            exit();
        } else {
            echo "❌ Error HTTP: $httpCode - " . $response;
        }
    }
} catch (Exception $e) {
    echo "Error de conexión: " . $e->getMessage();
}

?>