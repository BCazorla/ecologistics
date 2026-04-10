<?php
// Simulación de la Clase Contenedor (Fase 2) 
class Contenedor {
    public $id;
    public $nivelLlenado; // Porcentaje 0-100

    public function __construct($id, $nivel) {
        $this->id = $id;
        $this->nivelLlenado = $nivel;
    }

    // Algoritmo de asignación de rutas (Fase 2) [cite: 62, 63]
    public function debeRecogerse() {
        if ($this->nivelLlenado > 70) {
            return true;
        } else {
            return false;
        }
    }
}

// --- EJECUCIÓN DE LA PRUEBA UNITARIA ---
echo "Iniciando Plan de Pruebas para EcoLogistics Web...\n";

// Escenario 1: Contenedor casi lleno (Debe dar positivo)
$c1 = new Contenedor(1, 85);
if ($c1->debeRecogerse() === true) {
    echo "✅ Prueba 1 PASADA: Contenedor al 85% marcado para recogida.\n";
} else {
    echo "❌ Prueba 1 FALLIDA: El sistema ignoró un contenedor lleno.\n";
}

// Escenario 2: Contenedor medio vacío (Debe dar negativo)
$c2 = new Contenedor(2, 40);
if ($c2->debeRecogerse() === false) {
    echo "✅ Prueba 2 PASADA: Contenedor al 40% NO marcado (ahorro de combustible).\n";
} else {
    echo "❌ Prueba 2 FALLIDA: Ruta ineficiente detectada.\n";
}
?>