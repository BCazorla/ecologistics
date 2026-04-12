# EcoLogistics Web: Manual de Calidad y Usuario
**Proyecto:** Sistema Inteligente de Gestión de Residuos (SI)  
**Curso:** ADGG086PO - Ingeniería de Software  
**Responsable:** Angelina Caballero (Project Manager)  
**Versión:** 1.0.0 (Final)

---

## I. PLAN DE CALIDAD (VERIFICACIÓN Y VALIDACIÓN)

Este apartado detalla el control de calidad aplicado para asegurar que el sistema cumple con los requisitos del curso (Fase 4).

### 1. Metodología de Pruebas
Se ha aplicado una estrategia de pruebas en cascada supervisada por los **Seniors (Perfil A)** para garantizar la estabilidad del MVP:

* **Pruebas Unitarias:** Validación de la lógica del algoritmo de rutas (Uso de estructuras de selección e iteración).
* **Pruebas de Integración:** Verificación de la comunicación entre el Ciudadano (Front) y el Administrador (Back).
* **Pruebas de Regresión:** Aseguramiento de que las refactorizaciones de los Trainees no afectaron la herencia y polimorfismo.

### 2. Informe de Verificación (Checklist)

| ID Prueba | Descripción | Resultado | Responsable |
| :--- | :--- | :--- | :--- |
| **QA-01** | El algoritmo solo selecciona contenedores con nivel > 70%. |  PASADO | Senior |
| **QA-02** | Reporte de incidencias por ciudadano (sin errores de carga). |  PASADO | Junior |
| **QA-03** | El método `reciclar()` diferencia procesos (Vidrio/Papel). |  PASADO | Senior |
| **QA-04** | El manual de instalación permite desplegar el SI en < 5 min. |  PASADO | Trainee |

---

## II. MANUAL DE USUARIO (OPERATIVA POR PERFILES)

Manual detallado para la explotación del sistema según la **Matriz de Asignación**.

### 1. Perfil: Ciudadano (Módulo Público)
* **Acceso:** No requiere credenciales para visualización.
* **Reporte de Incidencia:** 1. Localice el contenedor en el mapa.
    2. Haga clic en **"Notificar Incidencia"**.
    3. Seleccione el tipo de residuo y el problema (Ej: "Contenedor dañado").
    4. Envíe para generar el ticket en tiempo real.

### 2. Perfil: Conductor (Logística de Recogida)
* **Operativa:** 1. Inicie sesión con su identificador de flota.
    2. Haga clic en **"Generar Ruta Dinámica"**.
    3. El sistema mostrará la lista de paradas optimizada (excluyendo contenedores vacíos).
    4. Al finalizar la recogida, marque como **"Vacío"** para resetear el sensor.

### 3. Perfil: Administrador (Gestión Senior)
* **Operativa:** 1. Visualización del Dashboard global de salubridad urbana.
    2. Gestión de alertas críticas reportadas por ciudadanos.
    3. Supervisión de la eficiencia de los 10 Juniors asignados al desarrollo.

---

## III. MANUAL TÉCNICO Y DESPLIEGUE

### 1. Requisitos del Entorno
* **Navegador:** Chrome, Firefox o Edge (últimas versiones).
* **Herramientas CASE:** VS Code para la edición de lógica.
* **Control de Versiones:** Git / GitHub para el despliegue del código fuente.

### 2. Pasos de Instalación (MVP)
1.  Clonar el repositorio desde GitHub.
2.  Instalar dependencias necesarias (Node.js / Python según backend).
3.  Ejecutar el comando de inicio local (`npm start` o similar).
4.  Acceder a la URL local indicada por la terminal.

---

## IV. INFORME DE CIERRE (PLANIFICADO VS REALIZADO)
Se certifica que el proyecto ha sido ejecutado en un marco de **140 horas lectivas**. El uso de **Pair Programming** permitió reducir el tiempo de corrección de errores en un 15% respecto a lo planificado inicialmente en el diagrama de Gantt.

---
**Firma:** *Angelina Caballero* **Project Manager - EcoLogistics Web**