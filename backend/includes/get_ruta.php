<?php
header('Content-Type: application/json');
require_once '../includes/db.php';

// RF-005: Optimización de ruta (Contenedores > 75%)
$stmt = $pdo->query("SELECT * FROM contenedores WHERE nivel_llenado > 75 ORDER BY nivel_llenado DESC");
$contenedores = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode([
    "status" => "success",
    "total_criticos" => count($contenedores),
    "data" => $contenedores
]);