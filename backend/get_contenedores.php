<?php
// Configuración de conexión
$host = 'localhost';
$db   = 'ecologistics_db';
$user = 'root';
$pass = ''; 

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
    
    // Consulta para obtener contenedores críticos (>75%) como pide tu proyecto
    $query = $pdo->query("SELECT * FROM contenedores WHERE nivel_llenado > 75");
    $resultados = $query->fetchAll(PDO::FETCH_ASSOC);

    // Enviamos los datos al Front-end en formato JSON
    echo json_encode($resultados);

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>