<?php
header('Content-Type: application/json');
require_once '../includes/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $contenedor_id = $_POST['contenedor_id'] ?? null;
    $descripcion = $_POST['descripcion'] ?? '';
    $foto = $_FILES['foto'] ?? null;

    if ($foto && $foto['error'] === UPLOAD_ERR_OK) {
        // 1. Validar extensión (Seguridad)
        $ext = pathinfo($foto['name'], PATHINFO_EXTENSION);
        $allowed = ['jpg', 'jpeg', 'png'];

        if (!in_array(strtolower($ext), $allowed)) {
            echo json_encode(["status" => "error", "message" => "Formato no permitido"]);
            exit;
        }

        // 2. Crear nombre único (Evita que archivos con el mismo nombre se borren)
        $nombre_archivo = "incidencia_" . time() . "." . $ext;
        $ruta_destino = "../uploads/" . $nombre_archivo;

        // 3. Mover el archivo de la carpeta temporal a 'uploads'
        if (move_uploaded_file($foto['tmp_name'], $ruta_destino)) {
            
            // 4. Guardar en BD (Ruta relativa para que el front la encuentre)
            $foto_url = "uploads/" . $nombre_archivo;
            
            $sql = "INSERT INTO incidencias (contenedor_id, descripcion, foto_url) VALUES (?, ?, ?)";
            $stmt = $pdo->prepare($sql);
            
            if ($stmt->execute([$contenedor_id, $descripcion, $foto_url])) {
                echo json_encode(["status" => "success", "message" => "Reporte enviado con éxito"]);
            }
        } else {
            echo json_encode(["status" => "error", "message" => "Error al mover el archivo"]);
        }
    } else {
        echo json_encode(["status" => "error", "message" => "No se subió ninguna foto"]);
    }
}
?>