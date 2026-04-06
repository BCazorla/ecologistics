<?php
header('Content-Type: application/json');
require_once '../includes/db.php';

try {
    // Unimos las tablas para tener información completa
    $sql = "SELECT i.*, c.tipo_residuo 
            FROM incidencias i 
            JOIN contenedores c ON i.contenedor_id = c.id 
            ORDER BY i.fecha_reporte DESC";
            
    $stmt = $pdo->query($sql);
    $incidencias = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    echo json_encode($incidencias);
} catch (PDOException $e) {
    echo json_encode(["error" => $e->getMessage()]);
}
?>