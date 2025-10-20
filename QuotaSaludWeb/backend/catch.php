<?php
// catch.php
include('includes/db_connect.php'); // Tu conexión a la base de datos
// include('includes/header.php'); // Si quieres mostrar algo antes

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // -----------------------------
    // Datos de Contacto
    // -----------------------------
    $fullName = trim($_POST['nombre']);
    $nameParts = explode(' ', $fullName, 2);
    $name = $nameParts[0];
    $last_name = $nameParts[1] ?? '';

    $phone = $_POST['whatsapp'] ?? '';
    $email = $_POST['email'] ?? '';
    $main_role = $_POST['cargo'] ?? '';

    // -----------------------------
    // Ubicación
    // -----------------------------
    $location_address = $_POST['ubicacion'] ?? '';
    // Extraer link Google Maps si se proporciona
    $maps_link = '';
    if (preg_match('/https?:\/\/(www\.)?google\.com\/maps[^\s]*/', $location_address, $matches)) {
        $maps_link = $matches[0];
    }

    // -----------------------------
    // Información del Negocio
    // -----------------------------
    $sectorMap = [
        'clinica' => 1,
        'centro_imagenologia' => 2,
        'profesional_salud' => 3,
        'laboratorio' => 4,
        'distribuidor_insumos' => 5,
        'otro' => 6
    ];
    $health_sector = $sectorMap[$_POST['sector']] ?? null;

    $approximate_billing = $_POST['facturacion'] ?? '';

    $social_media = '';
    if (!empty($_POST['presentacion'])) {
        $social_media = implode(',', $_POST['presentacion']);
    }

    $number_of_branches = $_POST['sucursales'] ?? null;
    $number_of_workers = $_POST['empleados'] ?? null;

    // -----------------------------
    // Cuestionario
    // -----------------------------
    $billing_system_name = $_POST['sistema_facturacion'] ?? '';
    $uses_billing_system = !empty($billing_system_name) ? 1 : 0;

    $billing_system_adaptable = null;
    if (isset($_POST['adaptacion_pago'])) {
        if ($_POST['adaptacion_pago'] === 'si') $billing_system_adaptable = 1;
        elseif ($_POST['adaptacion_pago'] === 'no') $billing_system_adaptable = 0;
        else $billing_system_adaptable = null;
    }

    $legal_figure = $_POST['figura_legal'] ?? '';
    $rif_number = $_POST['rif'] ?? '';
    $ci_number = $_POST['cedula'] ?? '';
    $delivers_fiscal_invoice = (isset($_POST['factura_fiscal']) && $_POST['factura_fiscal'] === 'si') ? 1 : 0;
    $terms_accepted = isset($_POST['terminos']) ? 1 : 0;

    // -----------------------------
    // Manejo de archivos
    // -----------------------------
    $document_rif_ci_path = '';
    if (!empty($_FILES['documentos']['name'][0])) {
        $uploadDir = 'uploads/';
        if (!is_dir($uploadDir)) mkdir($uploadDir, 0777, true);

        $files = [];
        foreach ($_FILES['documentos']['tmp_name'] as $i => $tmp) {
            $fileName = time() . '_' . basename($_FILES['documentos']['name'][$i]);
            $target = $uploadDir . $fileName;
            if (move_uploaded_file($tmp, $target)) {
                $files[] = $target;
            }
        }
        $document_rif_ci_path = implode(',', $files);
    }

    // -----------------------------
    // Insertar en la base de datos
    // -----------------------------
    $sql = "INSERT INTO app_agreement_first_contact 
        (name, last_name, phone, email, main_role, health_sector, approximate_billing, social_media,
        number_of_branches, number_of_workers, location_address, Maps_link,
        uses_billing_system, billing_system_name, billing_system_adaptable, legal_figure,
        rif_number, ci_number, delivers_fiscal_invoice, terms_accepted, document_rif_ci_path)
        VALUES
        (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param(
        'sssssi ssiiissssssiiiss',
        $name,
        $last_name,
        $phone,
        $email,
        $main_role,
        $health_sector,
        $approximate_billing,
        $social_media,
        $number_of_branches,
        $number_of_workers,
        $location_address,
        $maps_link,
        $uses_billing_system,
        $billing_system_name,
        $billing_system_adaptable,
        $legal_figure,
        $rif_number,
        $ci_number,
        $delivers_fiscal_invoice,
        $terms_accepted,
        $document_rif_ci_path
    );

    if ($stmt->execute()) {
        echo "<p>Formulario enviado correctamente.</p>";
    } else {
        echo "<p>Error al guardar los datos: " . $stmt->error . "</p>";
    }

    $stmt->close();
    $conn->close();
}
