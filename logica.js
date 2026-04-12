// ======================================================
// ECO-LOGISTICS: MÓDULO DE LOGÍSTICA E INGENIERÍA
// Demostración de Polimorfismo y Lógica Estructurada
// ======================================================

class Residuo {
    constructor(nombre, nivelLlenado) {
        this.nombre = nombre;
        this.nivelLlenado = nivelLlenado; // Porcentaje de 0 a 100
    }

    procesar() {
        return "Procesando residuo genérico...";
    }
}

// POLIMORFISMO: Cada clase hija tiene su propia implementación de procesar()
class Vidrio extends Residuo {
    procesar() {
        return `Tratamiento de VIDRIO (${this.nivelLlenado}%): Triturado y fundido para nuevos envases.`;
    }
}

class Papel extends Residuo {
    procesar() {
        return `Tratamiento de PAPEL (${this.nivelLlenado}%): Hidratación y desfibrado para cartón reciclado.`;
    }
}

// LÓGICA ESTRUCTURADA (ALGORITMO DE RECOGIDA)
function planificarRuta(contenedores) {
    console.log("--- INICIANDO OPTIMIZACIÓN DE RUTA ---");
    
    // Usamos estructuras de iteración (forEach/for) y selección (if)
    contenedores.forEach(contenedor => {
        if (contenedor.nivelLlenado >= 70) {
            console.log(`[RECOGER] Contenedor de ${contenedor.nombre}: ${contenedor.procesar()}`);
        } else {
            console.log(`[OMITIR] Contenedor de ${contenedor.nombre}: Nivel bajo (${contenedor.nivelLlenado}%).`);
        }
    });
}

// SIMULACIÓN DE DATOS
const listaContenedores = [
    new Vidrio("Vidrio - Calle Mayor", 85),
    new Papel("Papel - Plaza Central", 40),
    new Vidrio("Vidrio - Av. Norte", 95)
];

planificarRuta(listaContenedores);