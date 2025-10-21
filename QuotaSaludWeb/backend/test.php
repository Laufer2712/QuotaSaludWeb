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
// PROCESAR ARCHIVOS - CONVERTIR A BASE64
// =============================================================================

$documentRifCiBase64 = null;

// Verificar si se subió algún archivo
if (isset($_FILES['documentRifCiPath']) && $_FILES['documentRifCiPath']['error'] === UPLOAD_ERR_OK) {
    $fileTmpPath = $_FILES['documentRifCiPath']['tmp_name'];
    $fileName = $_FILES['documentRifCiPath']['name'];
    
    // Validar que el archivo existe
    if (file_exists($fileTmpPath)) {
        // Convertir la imagen a base64
        $documentRifCiBase64 = base64_encode(file_get_contents($fileTmpPath));
    }
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
// PREPARAR DATOS PARA EL SERVICIO JAVA
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
    'rifNumber' => $_POST['rifNumber'],
    'ciNumber' => $_POST['ciNumber'],
    'deliversFiscalInvoice' => (int)$_POST['deliversFiscalInvoice'], // Long
    'termsAccepted' => isset($_POST['termsAccepted']) ? 1 : 0, // Long
    'documentRifCiPath' => $documentRifCiBase64, // Base64 en lugar de null
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
             header('Location: ../form.php?estado=exito');
            // exit;
            
            echo "✅ Éxito: Solicitud enviada correctamente. HTTP Code: $httpCode";
            
            // Mostrar respuesta si es JSON
            $responseData = json_decode($response, true);
            if (json_last_error() === JSON_ERROR_NONE && isset($responseData['id'])) {
                echo "<br>ID generado: " . $responseData['id'];
            }
            
            // Mostrar info del archivo si se subió
            if ($documentRifCiBase64) {
                echo "<br>📎 Archivo codificado en base64 (" . strlen($documentRifCiBase64) . " caracteres)";
            } else {
                echo "<br>⚠️ No se subió ningún archivo o hubo un error al procesarlo";
            }
        } else {
            echo "❌ Error HTTP: $httpCode - " . $response;
        }
    }
} catch (Exception $e) {
    echo "Error de conexión: " . $e->getMessage();
}

?>