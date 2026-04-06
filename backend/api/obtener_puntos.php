<?php
header('Content-Type: application/json');
require_once '../includes/db.php'; // El archivo de conexión que creamos antes

try {
    // Seleccionamos todos los contenedores para mostrarlos en el mapa
    $stmt = $pdo->query("SELECT id, tipo_residuo, latitud, longitud, nivel_llenado FROM contenedores");
    $puntos = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    echo json_encode($puntos);
} catch (PDOException $e) {
    echo json_encode(["error" => $e->getMessage()]);
}
?>